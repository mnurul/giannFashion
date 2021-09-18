<?php
defined('BASEPATH') or exit ('NO Direct Script Access Allowed');

class Laporan_transaksi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_app');
		if ($this->session->userdata('adminstatus') != 'login') {
			$this->session->set_flashdata('pesan', 'Anda Harus Login !');
			redirect(base_url().'admin/login');
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	private $view = 'data_pemesanan';
	private $table = 'pesanan';
	private $pk = 'no_pesanan';
	private $controller = 'data-pemesanan';

	function index(){
		$data['title'] = 'Laporan';
		$data['sub_title'] = 'Laporan Transaksi';
		$data['controller'] = $this->controller;

		if ($this->input->get('dari')) {
			$dari = $this->input->get('dari');
			$sampai = $this->input->get('sampai');

			$data['data_pesanan'] = $this->Model_app->get_pesanan_admin_periode($dari,$sampai)->result();
		}else{
			$data['data_pesanan'] = $this->Model_app->get_pesanan_admin()->result();
		}
	
		$this->load->view('admin/layouts/header',$data);
		$this->load->view('admin/layouts/navbar',$data);
		$this->load->view('admin/layouts/sidebar',$data);
		$this->load->view('admin/laporan_transaksi',$data);
		$this->load->view('admin/layouts/footer',$data);
	}

	function detail($no_pesanan){
		$data['title'] = 'Manajamen Pesanan';
		$data['sub_title'] = 'Detail Pesanan';
		$data['controller'] = $this->controller;
		$data['no_pesanan'] = $no_pesanan;
		$data['pesanan'] 	= $this->Model_app->edit_data('pesanan',array('no_pesanan'=>$no_pesanan))->row();
		$data['detail_pesanan'] = $this->Model_app->get_detail_transaksi($no_pesanan)->result();
		$data['data_pembayaran'] = $this->Model_app->edit_data('pembayaran',array('no_pesanan'=>$no_pesanan))->row();
		// print_r($data['detail_pesanan']);
		// die();
	
		$this->load->view('admin/layouts/header',$data);
		$this->load->view('admin/layouts/navbar',$data);
		$this->load->view('admin/layouts/sidebar',$data);
		$this->load->view('admin/'.$this->view.'/'.$this->view.'_detail',$data);
		$this->load->view('admin/layouts/footer',$data);
	}


	function tambah(){
		$data['title'] = 'Manajamen Produk';
		$data['sub_title'] = 'Tambah Data Produk';
		$data['controller'] = $this->controller;
		// $data['produk_kode'] = $this->generate_kode_produk();
		$data['data_kategori'] = $this->Model_app->get_data('kategori','kategori_id','desc')->result();

		
		$this->load->view('admin/layouts/header',$data);
		$this->load->view('admin/layouts/navbar',$data);
		$this->load->view('admin/layouts/sidebar',$data);
		$this->load->view('admin/'.$this->view.'/'.$this->view.'_tambah',$data);
		$this->load->view('admin/layouts/footer',$data);
	}

	function edit($pk){
		$data['title'] = 'Manajamen Produk';
		$data['sub_title'] = 'Edit Data Produk';
		$data['controller'] = $this->controller;
		$data['data_kategori'] = $this->Model_app->get_data('kategori','kategori_id','desc')->result();
		$data['data_edit'] = $this->Model_app->edit_data($this->table,array($this->pk=>$pk))->row();
		
		$this->load->view('admin/layouts/header',$data);
		$this->load->view('admin/layouts/navbar',$data);
		$this->load->view('admin/layouts/sidebar',$data);
		$this->load->view('admin/'.$this->view.'/'.$this->view.'_edit',$data);
		$this->load->view('admin/layouts/footer',$data);
	}


	function simpan()
	{
		// $produk_kode		 		= $this->input->post('produk_kode');
		$kategori_id		 		= $this->input->post('kategori_id');
		$produk_nama		 		= $this->input->post('produk_nama');
		$produk_harga		 		= $this->input->post('produk_harga');
		$produk_berat		 		= $this->input->post('produk_berat');
		$produk_deskripsi		 	= $this->input->post('produk_deskripsi');
		$produk_status		 		= $this->input->post('produk_status');
	 	

	 	$as_produk = strtoupper(substr($produk_nama,0,3));

		$produk_tanggal_dibuat 	= date('Y-m-d H:i:s');
	

		$data = array(
			'produk_kode' 			=> $this->generate_kode_produk($as_produk),
			'produk_nama' 			=> $produk_nama,
			'kategori_id'			=> $kategori_id,
			'produk_status'	 			=> $produk_status,
			'produk_deskripsi'	 			=> $produk_deskripsi,
			'produk_harga'	 			=> $produk_harga,
			'produk_berat'	 			=> $produk_berat,
			'produk_tanggal_dibuat'	=> $produk_tanggal_dibuat
		);

		$config['upload_path'] = './assets/img/produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = 'produk'.time();
        $config['max_size'] = '2048';

        $this->load->library('upload',$config);

        if ($_FILES['produk_gambar']['name']) {
        	if ($this->upload->do_upload('produk_gambar')) {
                $image = $this->upload->data();
                $data['produk_gambar'] = $image['file_name'];
            }
		}
		// print_r($data);
		// die();

		
	
		$insert = $this->Model_app->insert_data($this->table,$data);
		$this->session->set_flashdata('simpan','Data Berhasil di Simpan !');
		redirect(base_url('admin/').$this->controller);
	}

	function update($no_pesanan)
	{	
		// echo $this->input->post('status_pesanan');
		// die();
		$update = $this->Model_app->update_data('pesanan',array('no_pesanan'=>$no_pesanan),array('status_pesanan'=>$this->input->post('status_pesanan')));
		$this->session->set_flashdata('update','Data Berhasil di Update !');
		redirect(base_url('admin/').$this->controller.'/detail/'.$no_pesanan);
	}

	function hapus($id)
	{

		$delete = $this->Model_app->delete_data($this->table,array($this->pk=>$id));
		$this->session->set_flashdata('hapus','Data berhasil di Hapus ! ');
		redirect(base_url('admin/').$this->controller);
	}



	function generate_kode_produk($as_produk)
	{
		return $this->Model_app->get_kode_produk($as_produk);
	}


	 

	


}