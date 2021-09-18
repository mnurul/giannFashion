<?php
defined('BASEPATH') or exit('NO Direct Script Access Allowed');

class Produk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_app');
		$this->load->library('session');
	}

	private $view = 'Produk';
	private $api_key = '81e6e26ae728c50249f5447ed6e449a8';

	function index($id)
	{
		$province_id = $this->input->get('province_id');
		$data['title'] = 'Katalog';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();
		$data['produk'] = $this->Model_app->get_produk_where($id)->row();
		$jenis_bahan = $this->Model_app->get_produk_where($id)->row();
		$harga_bahan = $this->Model_app->get_produk_where($id)->row();
		$data['province'] = $this->province();
		$data['city'] = $this->get_city($province_id);
		$data['jenis_bahan'] = (explode(",", $jenis_bahan->jenis_bahan));

		$data['data_pelanggan'] = $this->Model_app->edit_data('pelanggan', array('plg_id' => $plg_id))->row();
		$data['nama_lokasi'] = $data['data_pelanggan']->plg_lokasi;
		$data['type_lokasi'] = $data['data_pelanggan']->plg_typeLokasi;
		$data['kota'] = $data['data_pelanggan']->plg_kota;
		$data['alamat'] = $data['data_pelanggan']->plg_alamat;
		$data['telepon'] = $data['data_pelanggan']->plg_telepon;
		$data['nama'] = $data['data_pelanggan']->plg_nama;


		// if (isset($province['rajaongkir']['results'])) {
		// 	foreach ($province['rajaongkir']['results'] as $prov) {
		// 		if ($data['data_pelanggan']->plg_lokasi == $prov['province']) {
		// 			$data['id_lokasi'] = $prov['province_id'];
		// 			$data['nama_lokasi'] = $prov['province'];
		// 			// echo "ini lokasi" . " " . $prov['province'] . " " . $update['lokasi'];
		// 			// $this->Model_app->update_data('keranjang', array('id' => $id), $update);
		// 		}
		// 	}
		// }


		// $data['harga_bahan'] = (explode(",", $harga_bahan->harga_bahan));
		// var_dump($data['type_lokasi'], $data['kota'], $data['city']);
		// die();
		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		$this->load->view('front/detail_produk', $data);
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
			return json_decode($response);
		}
	}



	function cetakDigital($id)
	{
		$province_id = $this->input->get('province_id');
		$data['title'] = 'Katalog';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();
		$data['produk'] = $this->Model_app->get_produk_where($id)->row();
		$jenis_bahan = $this->Model_app->get_produk_where($id)->row();
		$harga_bahan = $this->Model_app->get_produk_where($id)->row();
		$data['province'] = $this->province();
		$data['city'] = $this->get_city($province_id);
		$data['jenis_bahan'] = (explode(",", $jenis_bahan->jenis_bahan));
		$data['harga_bahan'] = (explode(",", $harga_bahan->harga_bahan));
		// foreach ($a as $ab => $value) {
		// 	echo $value;
		// }
		// foreach ($b as $ab => $value) {
		// 	echo $value;
		// }
		// var_dump($jenis_bahan);
		// die();
		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		$this->load->view('front/Detail_produk_digital', $data);
		$this->load->view('front/layouts/footer', $data);
	}

	function cetakOffset($id)
	{
		$province_id = $this->input->get('province_id');
		$data['title'] = 'Katalog';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();
		$data['produk'] = $this->Model_app->get_produk_where($id)->row();
		$jenis_bahan = $this->Model_app->get_produk_where($id)->row();
		$harga_bahan = $this->Model_app->get_produk_where($id)->row();
		$data['province'] = $this->province();
		$data['city'] = $this->get_city($province_id);
		$data['jenis_bahan'] = (explode(",", $jenis_bahan->jenis_bahan));
		$data['harga_bahan'] = (explode(",", $harga_bahan->harga_bahan));
		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		$this->load->view('front/Detail_produk_offset', $data);
		$this->load->view('front/layouts/footer', $data);
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
		$data['data_pelanggan'] = $this->Model_app->edit_data('pelanggan', array('plg_id' => $plg_id))->row();
		$data['type_lokasi'] = $data['data_pelanggan']->plg_typeLokasi;
		$data['kota'] = $data['data_pelanggan']->plg_kota;
		// '"' . '"'
		foreach ($city->rajaongkir->results as $cty) {
			if ($data['kota'] == $cty->city_name) {
				$output .= '<option selected value="' . $cty->city_id . '">' . $cty->type . " " . $cty->city_name . '</option>';
			} else {
				$output .= '<option  value="' . $cty->city_id . '">' . $cty->type . " " . $cty->city_name . '</option>';
			}
			// $output .= '<option value="' . $cty->city_id . '">' . $cty->city_name . '</option>';
		}

		echo $output;
	}

	public function cost($city, $weight, $opKirim)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=55&destination=$city&weight=$weight&courier=$opKirim",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: $this->api_key"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			// echo $response;
			var_dump($response);
			return json_decode($response, true);
		}
	}

	public function get_ongkos($city, $weight, $opKirim)
	{
		$cost = $this->cost($city, $weight, $opKirim);
		$output = '<option value="">- Opsi Layanan -</option>';

		foreach ($cost['rajaongkir']['results'][0]['costs'] as $cty) {
			foreach ($cty['cost'] as $tarif) {
				$output .= '<option value="' . $tarif['value']  . '">' . $cty['service'] . ' Estimasi ' . $tarif['etd'] . ' hari Harga ' . $tarif['value'] . '</option>';
			}
		}

		echo $output;
	}

	function cetakCustom()
	{
		$data['title'] = 'Katalog';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();
		$id = 31;
		$data['produk'] = $this->Model_app->get_produk_where($id)->row();
		// var_dump($data['produk']);
		// die();
		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		$this->load->view('front/Detail_produk_custom', $data);
		$this->load->view('front/layouts/footer', $data);
	}

	function kategori($id_kategori)
	{
		$data['title'] = 'Katalog';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();

		$data['jumlah_produk'] 	= $this->Model_app->get_produk()->num_rows();

		$jumlah_data = $data['jumlah_produk'];

		// $jumlah_data = $data['jumlah_produk'];
		$this->load->library('pagination');

		$config['full_tag_open'] = '<ul style="width: 300px;" class="pager secondary">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="pager-item"><p>';
		$config['first_tag_close'] = '</p></li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="pager-item prev"><p>';
		$config['prev_tag_close'] = '</p></li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="pager-item"><p>';
		$config['next_tag_close'] = '</p></li>';
		$config['last_tag_open'] = '<liclass="pager-item"><p>';
		$config['last_tag_close'] = '</p></li>';
		$config['cur_tag_open'] = '<li class="pager-item active"><p>';
		$config['cur_tag_close'] = '</p></li>';
		$config['num_tag_open'] = '<li class="pager-item"><p>';
		$config['num_tag_close'] = '</p></li>';

		$config['base_url'] = base_url() . 'katalog/kategori/' . $id_kategori . '/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 9;
		$config['uri_segment'] = 4;
		$start = $this->uri->segment(4, 0);
		$this->pagination->initialize($config);
		$data['data_produk'] = $this->Model_app->get_produk_pagination_kategori($config['per_page'], $start, $id_kategori)->result();
		$data['data_kategori'] = $this->Model_app->get_data('kategori', 'kategori_id', 'desc')->result();

		$data['jumlah_produk'] 	= count($data['data_produk']);
		// print_r($data['data_produk1']);
		// die();

		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		$this->load->view('front/katalog', $data);
		$this->load->view('front/layouts/footer', $data);
	}

	function search()
	{


		$data['title'] = 'Katalog';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();
		// get_produk_pagination_kategori_and_name
		$data['jumlah_produk'] 	= $this->Model_app->get_produk()->num_rows();
		$id_kategori = $this->input->get('kategori');
		$produk_nama = $this->input->get('produk');



		$jumlah_data = $data['jumlah_produk'];

		// $jumlah_data = $data['jumlah_produk'];
		$this->load->library('pagination');

		$config['full_tag_open'] = '<ul style="width: 300px;" class="pager secondary">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="pager-item"><p>';
		$config['first_tag_close'] = '</p></li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="pager-item prev"><p>';
		$config['prev_tag_close'] = '</p></li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="pager-item"><p>';
		$config['next_tag_close'] = '</p></li>';
		$config['last_tag_open'] = '<liclass="pager-item"><p>';
		$config['last_tag_close'] = '</p></li>';
		$config['cur_tag_open'] = '<li class="pager-item active"><p>';
		$config['cur_tag_close'] = '</p></li>';
		$config['num_tag_open'] = '<li class="pager-item"><p>';
		$config['num_tag_close'] = '</p></li>';

		$config['base_url'] = base_url() . 'katalog/search?produk=' . $produk_nama . '&kategori=' . $id_kategori . '/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 9;
		$config['uri_segment'] = 4;
		$start = $this->uri->segment(4, 0);
		$this->pagination->initialize($config);
		$data['data_produk'] = $this->Model_app->get_produk_pagination_kategori_and_name($config['per_page'], $start, $id_kategori, $produk_nama)->result();
		$data['data_kategori'] = $this->Model_app->get_data('kategori', 'kategori_id', 'desc')->result();

		$data['jumlah_produk'] 	= count($data['data_produk']);
		// print_r($data['data_produk1']);
		// die();

		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		$this->load->view('front/katalog', $data);
		$this->load->view('front/layouts/footer', $data);
	}
}
