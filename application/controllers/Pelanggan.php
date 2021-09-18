<?php
defined('BASEPATH') or exit('NO Direct Script Access Allowed');

class Pelanggan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_app');
		date_default_timezone_set("Asia/Jakarta");
	}

	private $api_key = '81e6e26ae728c50249f5447ed6e449a8';



	// function index(){
	// 	$data['title'] = 'Pelanggan';



	// 	// print_r($data['data_produk1']);
	// 	// die();


	// 	$this->load->view('front/layouts/header',$data);
	// 	$this->load->view('front/layouts/menu_and_sidebar',$data);
	// 	// $this->load->view('front/layouts/banner',$data);
	// 	$this->load->view('front/Register',$data);
	// 	$this->load->view('front/layouts/footer',$data);
	// }

	function edit()
	{

		$data['title'] = 'Edit Profil';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();
		$plg_id = $this->session->userdata('plg_id');
		$data['province'] = $this->province();


		$data['data_edit'] = $this->Model_app->edit_data('pelanggan', array('plg_id' => $plg_id))->row();
		$data['city'] = $this->get_city($data['data_edit']->plg_lokasi);


		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		// $this->load->view('front/layouts/banner',$data);
		$this->load->view('front/edit_profil', $data);
		$this->load->view('front/layouts/footer', $data);
	}

	function province()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->api_key"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			return json_decode($response, true);
		}
	}

	public function get_city($province_id)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$province_id",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->api_key" // sesuai dengan api raja ongkir
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			return json_decode($response);
		}
	}

	public function get_city_by_province($province_id)
	{
		// $city = $this->get_city($province_id);
		// $output = '<option value="">- Kota -</option>';

		// foreach ($city->rajaongkir->results as $cty) {
		// 	$output .= '<option value="' . $cty->city_id . '">' . $cty->city_name . '</option>';
		// }

		// echo $output;

		$city = $this->get_city($province_id);
		$output = '<option value="" selected>- Kota -</option>';

		$plg_id = $this->session->userdata('plg_id');
		$data['data_edit'] = $this->Model_app->edit_data('pelanggan', array('plg_id' => $plg_id))->row();
		$data['lokasi'] = $data['data_keranjang']->plg_lokasi;
		// '"' . '"'
		foreach ($city->rajaongkir->results as $cty) {
			if ($data['lokasi'] == $cty->city_name) {
				$output .= '<option selected value="' . $cty->city_id . '">' . $cty->type . " " . $cty->city_name . '</option>';
			} else {
				$output .= '<option  value="' . $cty->city_id . '">' . $cty->type . " " . $cty->city_name . '</option>';
			}
			// $output .= '<option value="' . $cty->city_id . '">' . $cty->city_name . '</option>';
		}

		echo $output;
	}


	function riwayat_transaksi()
	{
		$data['title'] = 'Riwayat Transaksi';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();
		$plg_id = $this->session->userdata('plg_id');

		$data['riwayat_transaksi'] = $this->Model_app->get_riwayat_transaksi($plg_id)->result();

		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		// $this->load->view('front/layouts/banner',$data);
		$this->load->view('front/riwayat_transaksi', $data);
		$this->load->view('front/layouts/footer', $data);
	}

	function detail_transaksi($no_pesanan)
	{
		$data['title'] = 'Riwayat Transaksi';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();
		$data['no_pesanan'] = $no_pesanan;
		$data['data_transaksi'] = $no_pesanan;

		$plg_id = $this->session->userdata('plg_id');

		$data['data_transaksi'] = $this->Model_app->get_riwayat_transaksi_detail($plg_id, $no_pesanan)->row();
		$data['data_pembayaran'] = $this->Model_app->edit_data('pembayaran', array('no_pesanan' => $no_pesanan))->row();


		$data['detail_transaksi2'] = $this->Model_app->get_detail_transaksi($no_pesanan)->row();
		$data['detail_transaksi'] = $this->Model_app->get_detail_transaksi($no_pesanan)->result();
		// var_dump($data['detail_transaksi']);
		// die();

		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		// $this->load->view('front/layouts/banner',$data);
		$this->load->view('front/detail_transaksi', $data);
		$this->load->view('front/layouts/footer', $data);
	}

	function updateStatus($no_pesanan)
	{
		// echo $this->input->post('status_pesanan');
		// die();
		$update = $this->Model_app->update_data('pesanan', array('no_pesanan' => $no_pesanan), array('status_pesanan' => $this->input->post('status_pesanan')));
		$this->session->set_flashdata('update', 'Data Berhasil di Update !');
		// redirect(base_url('admin/').$this->controller.'/detail/'.$no_pesanan);
		redirect(base_url('pelanggan/detail_transaksi/') . $no_pesanan);
	}


	function update()
	{
		$plg_id = $this->session->userdata('plg_id');
		$data['plg_email'] = $this->input->post('email');
		$data['plg_username'] = $this->input->post('username');

		$data['plg_nama'] = $this->input->post('nama');
		$data['plg_kelamin'] = $this->input->post('jkelamin');
		$data['plg_alamat'] = $this->input->post('alamat');
		$destination_provice = $this->input->post('destination_provice');
		$destination_city = $this->input->post('destination_city');

		$province = $this->province();
		foreach ($province->rajaongkir->results as $prov) {
			if ($destination_provice == $prov['province_id']) {
				$data['plg_lokasi'] = $prov['province'];
				// echo $update['lokasi'];
				// $this->Model_app->update_data('keranjang', array('id' => $id), $update);
			}
		}

		$kota = $this->get_city($destination_city);


		foreach ($kota->rajaongkir->results as $kota1) {
			if ($destination_city == $kota1['city_id']) {
				$data['plg_typeLokasi'] = $kota1['type'];
				$data['plg_kota'] = $kota1['city_name'];
			}
		}
		$data['plg_telepon'] = $this->input->post('notelp');


		if ($this->input->post('password') != '') {
			$data['plg_password'] = md5($this->input->post('password'));
		}
		$config['upload_path'] = './assets/img/pelanggan/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['file_name'] = 'pelanggan' . time();
		$config['max_size'] = '2048';

		$this->load->library('upload', $config);

		if ($_FILES['image']['name']) {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data();
				$data['plg_foto'] = $image['file_name'];
				unlink('assets/img/pelanggan/' . $this->session->userdata('plg_foto'));
			}
		}

		// Cek Username dan email
		$cek_username = $this->db->where('plg_username', $data['plg_username'])->get('pelanggan')->num_rows();
		$cek_email = $this->db->where('plg_email', $data['plg_email'])->get('pelanggan')->num_rows();


		if ($this->input->post('old_username') != $this->input->post('username')) {
			if ($cek_username > 0) {
				$this->session->set_flashdata('error', 'Username Sudah ada');
				redirect(base_url('pelanggan/edit'));
			}
		}

		if ($this->input->post('old_email') != $this->input->post('email')) {
			if ($cek_email > 0) {
				$this->session->set_flashdata('error', 'Email Sudah ada');
				redirect(base_url('pelanggan/edit'));
			}
		}


		$this->session->set_userdata($data);




		$this->Model_app->update_data('pelanggan', array('plg_id' => $plg_id), $data);
		$this->session->set_flashdata('berhasil', 'Data Berhasil diubah');
		redirect(base_url('pelanggan/edit'));
	}


	function generate_id()
	{
		return $this->Model_app->get_kode_pelanggan();
	}
}
