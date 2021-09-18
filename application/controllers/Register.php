<?php
defined('BASEPATH') or exit('NO Direct Script Access Allowed');

class Register extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_app');
		date_default_timezone_set("Asia/Jakarta");
	}

	private $view = 'Register';
	private $api_key = '81e6e26ae728c50249f5447ed6e449a8';


	function index()
	{
		$data['title'] = 'Register';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();
		$data['province'] = $this->province();



		// print_r($data['data_produk1']);
		// die();


		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		// $this->load->view('front/layouts/banner',$data);
		$this->load->view('front/Register', $data);
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
		$city = $this->get_city($province_id);
		$output = '<option value="" selected>- Kota -</option>';

		$plg_id = $this->session->userdata('plg_id');
		foreach ($city->rajaongkir->results as $cty) {
			$output .= '<option  value="' . $cty->city_id . '">' . $cty->type . " " . $cty->city_name . '</option>';
			// $output .= '<option value="' . $cty->city_id . '">' . $cty->city_name . '</option>';
		}

		echo $output;
	}


	function create()
	{
		$data['plg_id'] = $this->generate_id();
		$data['plg_email'] = $this->input->post('email');
		$data['plg_username'] = $this->input->post('username');
		$data['plg_password'] = md5($this->input->post('password'));
		$data['plg_nama'] = $this->input->post('nama');
		$data['plg_kelamin'] = $this->input->post('jkelamin');
		$data['plg_alamat'] = $this->input->post('alamat');
		$destination_provice = $this->input->post('destination_provice');
		$destination_city = $this->input->post('destination_city');

		$province = $this->province();
		foreach ($province['rajaongkir']['results'] as $prov) {
			if ($destination_provice == $prov['province_id']) {
				$data['plg_lokasi'] = $prov['province'];
				// echo $update['lokasi'];
				// $this->Model_app->update_data('keranjang', array('id' => $id), $update);
			}
		}

		$kota = $this->get_city($destination_provice);
		var_dump($destination_city, $destination_provice);

		foreach ($kota->rajaongkir->results as $kota1) {
			if ($destination_city == $kota1->city_id) {
				$data['plg_typeLokasi'] = $kota1->type;
				$data['plg_kota'] = $kota1->city_name;
			}
		}
		$data['plg_telepon'] = $this->input->post('notelp');
		$data['plg_tanggal_dibuat'] = date('Y-m-d H:i:s');

		$config['upload_path'] = './assets/img/pelanggan/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['file_name'] = 'pelanggan' . time();
		$config['max_size'] = '2048';

		$this->load->library('upload', $config);

		if ($_FILES['image']['name']) {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data();
				$data['plg_foto'] = $image['file_name'];
			}
		}

		// Cek Username dan email
		$cek_username = $this->db->where('plg_username', $data['plg_username'])->get('pelanggan')->num_rows();
		$cek_email = $this->db->where('plg_email', $data['plg_email'])->get('pelanggan')->num_rows();

		if ($cek_username > 0) {
			$this->session->set_flashdata('error', 'Username Sudah ada');
			redirect(base_url('register'));
		}

		if ($cek_email > 0) {
			$this->session->set_flashdata('error', 'Email Sudah ada');
			redirect(base_url('register'));
		}
		// var_dump($data);
		// die();
		$this->Model_app->insert_data('pelanggan', $data);
		$this->session->set_flashdata('berhasil', 'Data Berhasil didaftarkan silahkan Login');
		redirect(base_url('login'));
	}


	function generate_id()
	{
		return $this->Model_app->get_kode_pelanggan();
	}
}
