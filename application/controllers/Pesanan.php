<?php
defined('BASEPATH') or exit('NO Direct Script Access Allowed');

class Pesanan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_app');
		date_default_timezone_set("Asia/Jakarta");
	}

	private $view = 'Keranjang';

	function index()
	{
		$data['title'] = 'Register';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();


		// print_r($data['data_produk1']);
		// die();
		$plg_id = $this->session->userdata('plg_id');

		$data['data_keranjang_pesanan'] = $this->Model_app->get_data_keranjang($plg_id)->result();
		$data['total_pesanan'] = $this->db->query("SELECT sum(sub_total) as total from keranjang where plg_id = '$plg_id' ")->row()->total;


		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		// $this->load->view('front/layouts/banner',$data);
		$this->load->view('front/keranjang', $data);
		$this->load->view('front/layouts/footer', $data);
	}


	function buat_pesanan()
	{

		$as_user = strtoupper(substr($this->session->userdata('plg_nama'), 0, 3));
		// var_dump($as_user);

		$plg_id = $this->session->userdata('plg_id');

		$data['no_pesanan'] = $this->generate_no_pesanan($as_user);
		// var_dump($data['no_pesanan']);
		// die();
		$data_pesanan = $this->Model_app->get_data_keranjang($plg_id)->result();


		foreach ($data_pesanan as $pesanan_detail) {

			$data['tgl_transaksi'] = date('Y-m-d H:i:s');
			$data['plg_id'] = $this->session->userdata('plg_id');
			$data['status_pesanan'] = 0;
			$data['nama_penerima'] = $pesanan_detail->nama_penerima;
			$data['lokasi'] = $pesanan_detail->lokasi;
			$data['kota'] = $pesanan_detail->kota;
			// $data['email'] = $this->input->post('email');
			$data['notelp'] = $pesanan_detail->no_telp;
			$data['alamat'] = $pesanan_detail->alamat;
			$data['grandtotal'] = $this->db->query("SELECT sum(sub_total) as total from keranjang where plg_id = '$plg_id' ")->row()->total;
		}



		// Insert Pesanan
		$this->Model_app->insert_data('pesanan', $data);

		// Insert Detail Pesanan
		$data_pesanan = $this->Model_app->get_data_keranjang($plg_id)->result();

		foreach ($data_pesanan as $pesanan_detail) {

			$harga_beli = $this->Model_app->edit_data('produk', array('produkid' => $pesanan_detail->produkid))->row()->produk_harga;
			$detail = array(
				'no_pesanan' => $data['no_pesanan'],
				'produkid' => $pesanan_detail->produkid,
				'jumlah' => $pesanan_detail->jumlah,
				'weight' => $pesanan_detail->weight,
				'opKirim' => $pesanan_detail->opKirim,
				'opsiLayanan' => $pesanan_detail->opsiLayanan,
				'size_product' => $pesanan_detail->size_product,
				'isi_pesan' => $pesanan_detail->isi_pesan,
				'gambar' => $pesanan_detail->gambar,
				'harga' => $harga_beli,
				'sub_total' => $pesanan_detail->sub_total,
				'ongkir' => $pesanan_detail->ongkir,
			);
			$this->Model_app->insert_data('detail_pesanan', $detail);
		}

		// Hapus Keranjang
		$this->Model_app->delete_data('keranjang', array('plg_id' => $plg_id));

		$this->session->set_flashdata('no_pesanan', $data['no_pesanan']);
		redirect(base_url('pelanggan/detail-transaksi/' . $data['no_pesanan']));
	}


	function konfirmasi_pembayaran($no_pesanan)
	{
		$data['no_pesanan'] = $no_pesanan;
		$data['keterangan'] = $this->input->post('keterangan');
		$data['bayar_nominal'] = $this->input->post('jumlah_bayar');
		$plg_id = $this->session->userdata('plg_id');



		$config['upload_path'] = './assets/img/konfirmasi_pembayaran/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['file_name'] = 'konfirmasi' . time();
		$config['max_size'] = '2048';

		$this->load->library('upload', $config);

		if ($_FILES['image']['name']) {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data();
				$data['bayar_gambar'] = $image['file_name'];
				// unlink('assets/img/konfirmasi_pembayaran/'.$data_pesanan->gambar);
			}
		}

		$cek_pembayaran = $this->Model_app->edit_data('pembayaran', array('no_pesanan' => $no_pesanan));
		if ($cek_pembayaran->num_rows() > 0) {
			unlink('assets/img/konfirmasi_pembayaran/' . $cek_pembayaran->row()->bayar_gambar);
			$this->Model_app->update_data('pembayaran', array('no_pesanan' => $no_pesanan), $data);
		} else {
			$data['bayar_tanggal'] = date('Y-m-d H:i:s');

			$this->Model_app->insert_data('pembayaran', $data);
			$this->Model_app->update_data('pesanan', array('no_pesanan' => $no_pesanan), array('status_pesanan' => 1));
		}





		redirect(base_url() . 'pelanggan/detail-transaksi/' . $no_pesanan);
	}

	function hapus($id)
	{

		$data_keranjang = $this->Model_app->edit_data('keranjang', array('id' => $id))->row();
		unlink('assets/img/pesanan/' . $data_keranjang->gambar);
		$this->Model_app->delete_data('keranjang', array('id' => $id));

		redirect(base_url('keranjang'));
	}

	function edit($id)
	{
		$data['title'] = 'Katalog';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();

		$data['data_keranjang'] = $this->Model_app->edit_data('keranjang', array('id' => $id))->row();

		$produk_id = $data['data_keranjang']->produkid;

		$data['produk'] = $this->Model_app->get_produk_where($produk_id)->row();
		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		$this->load->view('front/keranjang_edit', $data);
		$this->load->view('front/layouts/footer', $data);
	}


	function update($id)
	{

		$data_pesanan = $this->Model_app->edit_data('keranjang', array('id' => $id))->row();
		$data_produk = $this->Model_app->edit_data('produk', array('produkid' => $data_pesanan->produkid))->row();


		$data['jumlah'] = $this->input->post('qty');
		$data['isi_pesan'] = $this->input->post('isi_pesan');
		$data['sub_total'] = $data_produk->produk_harga * $data['jumlah'];

		$config['upload_path'] = './assets/img/pesanan/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['file_name'] = 'desain' . time();
		$config['max_size'] = '2048';

		$this->load->library('upload', $config);

		if ($_FILES['image']['name']) {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data();
				$data['gambar'] = $image['file_name'];
				unlink('assets/img/pesanan/' . $data_pesanan->gambar);
			}
		}

		$this->Model_app->update_data('keranjang', array('id' => $id), $data);
		redirect(base_url('keranjang'));
	}

	function selesai()
	{
		$data['title'] = 'Pesanan';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();


		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		// $this->load->view('front/layouts/banner',$data);
		$this->load->view('front/Register', $data);
		$this->load->view('front/layouts/footer', $data);
	}


	function generate_no_pesanan($as_user)
	{
		return $this->Model_app->get_no_pesanan($as_user);
	}
}
