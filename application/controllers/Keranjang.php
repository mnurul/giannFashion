<?php
defined('BASEPATH') or exit('NO Direct Script Access Allowed');

class Keranjang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_app');
		date_default_timezone_set("Asia/Jakarta");
	}

	private $view = 'Keranjang';
	private $api_key = '81e6e26ae728c50249f5447ed6e449a8';


	function index()
	{
		$data['title'] = 'Keranjang';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();



		$plg_id = $this->session->userdata('plg_id');

		$data['data_keranjang_pesanan'] = $this->Model_app->get_data_keranjang($plg_id)->result();
		$data['total_pesanan'] = $this->db->query("SELECT sum(sub_total) as total from keranjang where plg_id = '$plg_id' ")->row()->total;

		// var_dump($data['data_keranjang_pesanan'][0]->kota, $update['tipe_lokasi'], $update['kota'], $update['opsiLayanan']);
		// die();


		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		// $this->load->view('front/layouts/banner',$data);
		$this->load->view('front/keranjang', $data);
		$this->load->view('front/layouts/footer', $data);
	}

	function edit($id)
	{
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();
		$data['title'] = 'Katalog';
		$data['data_keranjang'] = $this->Model_app->edit_data('keranjang', array('id' => $id))->row();
		$data_keranjang = $this->Model_app->edit_data('keranjang', array('id' => $id))->row();

		$data['province'] = $this->province();
		$province = $this->province();
		foreach ($province['rajaongkir']['results'] as $prov) {
			if ($data_keranjang->lokasi == $prov['province']) {
				$lokasi = $prov['province_id'];
				// echo $update['lokasi'];
				// $this->Model_app->update_data('keranjang', array('id' => $id), $update);
			}
		}
		$data['city'] = $this->get_city($lokasi);
		$kota = $this->get_city($lokasi);

		$weight = $data_keranjang->weight;
		$opKirim = $data_keranjang->opKirim;
		foreach ($kota->rajaongkir->results as $kota1) {
			if ($data_keranjang->kota == $kota1->city_name) {
				$data['kota'] = $kota1->city_id;
				// $data['tipe_lokasi'] = $kota1['type'];
			}
		}
		// $city = $data['kota'];
		// $ongkos = $this->cost($city, $weight, $opKirim);
		// $opsiLayanan = explode(" ", $data_keranjang->opsiLayanan);

		// foreach ($ongkos['rajaongkir']['results'][0]['costs'] as $opKirim1) {
		// 	foreach ($opKirim1['cost'] as $tarif) {
		// 		if ($opsiLayanan[5] == $tarif['value']) {
		// 			$data['opsiLayanan'] = $opKirim1['service'] . ' Estimasi ' . $tarif['etd'] . ' hari Harga ' . $tarif['value'];
		// 			// $this->Model_app->update_data('keranjang', array('id' => $id), $update);
		// 		}
		// 	}
		// }

		// var_dump($opsiLayanan[5], $data['opsiLayanan']);
		// die();



		$produk_id = $data['data_keranjang']->produkid;

		$data['produk'] = $this->Model_app->get_produk_where($produk_id)->row();
		$this->load->view('front/layouts/header', $data);
		$this->load->view('front/layouts/menu_and_sidebar', $data);
		$this->load->view('front/keranjang_edit', $data);
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
		$data['data_keranjang'] = $this->Model_app->edit_data('keranjang', array('plg_id' => $plg_id))->row();
		$data['type_lokasi'] = $data['data_keranjang']->plg_typeLokasi;
		$data['kota'] = $data['data_keranjang']->kota;
		// '"' . '"'
		foreach ($city->rajaongkir->results as $cty) {
			if ($data['kota'] == $cty->city_name) {
				$output .= '<option selected value="' . $cty->city_id . '">' . $cty->type . " " . $cty->city_name . '</option>';
				$output .= '<h1 >' . $cty->city_id . '</h1>';
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


		$plg_id = $this->session->userdata('plg_id');
		$data['data_keranjang'] = $this->Model_app->edit_data('keranjang', array('plg_id' => $plg_id))->row();
		$opsiLayanan = $data['data_keranjang']->opsiLayanan;
		$opsiLayanan1 = explode(" ", $opsiLayanan);


		foreach ($cost['rajaongkir']['results'][0]['costs'] as $cty) {
			foreach ($cty['cost'] as $tarif) {
				if ($opsiLayanan1[5] == $tarif['value']) {
					$output .= '<option selected value="' . $tarif['value']  . '">' . $cty['service'] . ' Estimasi ' . $tarif['etd'] . ' hari Harga ' . $tarif['value'] . '</option>';
				} else {
					$output .= '<option value="' . $tarif['value']  . '">' . $cty['service'] . ' Estimasi ' . $tarif['etd'] . ' hari Harga ' . $tarif['value'] . '</option>';
				}
			}
		}

		echo $output;
	}


	function tambah($produkid)
	{

		$data_produk = $this->Model_app->edit_data('produk', array('produkid' => $produkid))->row();
		$plg_id = $this->session->userdata('plg_id');

		$data['produkid'] = $produkid;
		$data['jumlah'] = $this->input->post('qty');
		$bahan = $this->input->post('bahan');
		$ongkos = $this->input->post('ongkos');
		$data['ongkir'] = $this->input->post('ongkos');
		$data['size_product'] = $this->input->post('size');
		$data['lokasi'] = $this->input->post('destination_provice');
		$data['kota'] = $this->input->post('destination_city');
		$data['nama_penerima'] = $this->input->post('nama_penerima');
		$data['no_telp'] = $this->input->post('no_telp');
		$data['alamat'] = $this->input->post('alamat');
		$data['weight'] = $this->input->post('weight');
		$data['opKirim'] = $this->input->post('opKirim');
		$data['opsiLayanan'] = $this->input->post('ongkos');
		$opKirim = $this->input->post('opKirim');
		$data['isi_pesan'] = $this->input->post('isi_pesan');
		$data['sub_total'] = ($data_produk->produk_harga * $data['jumlah']) + $ongkos;

		$province = $this->province();
		$kota = $this->get_city($data['lokasi']);
		$opKirim = $this->cost($data['kota'], $data['weight'], $data['opKirim']);
		// var subtotal = ((bahan * qty) + (harga * qty)) + parseInt(ongkos);
		// var_dump($bahan, $opKirim, $ongkos, $data_produk->harga_digital, $data['jumlah'], $data['sub_total']);
		// var_dump($kota->rajaongkir->results);
		// die();

		foreach ($province['rajaongkir']['results'] as $prov) {
			if ($data['lokasi'] == $prov['province_id']) {
				$data['lokasi'] = $prov['province'];
				// echo $update['lokasi'];
				// $this->Model_app->update_data('keranjang', array('id' => $id), $update);
			}
		}


		// foreach ($kota['rajaongkir']['results'] as $kota1) {
		foreach ($kota->rajaongkir->results as $kota1) {
			// echo $kota['city_name'];
			if ($data['kota'] == $kota1->city_id) {
				$data['kota'] = $kota1->city_name;
				$data['tipe_lokasi'] = $kota1->type;
				// echo $update['kota'];
				// $this->Model_app->update_data('keranjang', array('id' => $id), $update);
			}
		}


		foreach ($opKirim['rajaongkir']['results'][0]['costs'] as $opKirim1) {
			foreach ($opKirim1['cost'] as $tarif) {
				if ($data['opsiLayanan'] == $tarif['value']) {
					$data['opsiLayanan'] = $opKirim1['service'] . ' Estimasi ' . $tarif['etd'] . ' hari Harga ' . $tarif['value'];
					// $this->Model_app->update_data('keranjang', array('id' => $id), $update);
				}
			}
		}



		$data['plg_id'] = $this->session->userdata('plg_id');

		// $config['upload_path'] = './assets/img/pesanan/';
		// $config['allowed_types'] = 'jpg|png|jpeg';
		// $config['file_name'] = 'desain' . time();
		// $config['max_size'] = '2048';

		// $this->load->library('upload', $config);

		// if ($_FILES['image']['name']) {
		// 	if ($this->upload->do_upload('image')) {
		// 		$image = $this->upload->data();
		// 		$data['gambar'] = $image['file_name'];
		// 		// unlink('assets/img/pelanggan/'.$this->session->userdata('plg_foto'));
		// 	}
		// }
		// var_dump($data);
		// die();
		$this->Model_app->insert_data('keranjang', $data);
		redirect(base_url('keranjang'));
	}
	function tambahDigital($produkid)
	{

		$data_produk = $this->Model_app->edit_data('produk', array('produkid' => $produkid))->row();
		$plg_id = $this->session->userdata('plg_id');

		$data['produkid'] = $produkid;
		$data['jumlah'] = $this->input->post('qty');
		$bahan = $this->input->post('bahan');
		$ongkos = $this->input->post('ongkos');
		$opKirim = $this->input->post('opKirim');
		$data['isi_pesan'] = $this->input->post('isi_pesan');
		$data['sub_total'] = (($data_produk->harga_digital * $data['jumlah']) + ($bahan * $data['jumlah'])) + $ongkos;
		// var subtotal = ((bahan * qty) + (harga * qty)) + parseInt(ongkos);
		// var_dump($bahan, $opKirim, $ongkos, $data_produk->harga_digital, $data['jumlah'], $data['sub_total']);
		// die();
		$data['plg_id'] = $this->session->userdata('plg_id');

		$config['upload_path'] = './assets/img/pesanan/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['file_name'] = 'desain' . time();
		$config['max_size'] = '2048';

		$this->load->library('upload', $config);

		if ($_FILES['image']['name']) {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data();
				$data['gambar'] = $image['file_name'];
				// unlink('assets/img/pelanggan/'.$this->session->userdata('plg_foto'));
			}
		}

		$this->Model_app->insert_data('keranjang', $data);
		redirect(base_url('keranjang'));
	}
	function tambahOffset($produkid)
	{

		$data_produk = $this->Model_app->edit_data('produk', array('produkid' => $produkid))->row();
		$plg_id = $this->session->userdata('plg_id');

		$data['produkid'] = $produkid;
		$data['jumlah'] = $this->input->post('qty');
		$bahan = $this->input->post('bahan');
		$ongkos = $this->input->post('ongkos');
		$opKirim = $this->input->post('opKirim');
		$data['isi_pesan'] = $this->input->post('isi_pesan');
		$data['sub_total'] = (($data_produk->harga_offset * $data['jumlah']) + ($bahan * $data['jumlah'])) + $ongkos;

		// var subtotal = ((bahan * qty) + (harga * qty)) + parseInt(ongkos);
		// var_dump($bahan, $opKirim, $ongkos, $data_produk->harga_digital, $data['jumlah'], $data['sub_total']);
		// die();
		$data['plg_id'] = $this->session->userdata('plg_id');

		$config['upload_path'] = './assets/img/pesanan/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['file_name'] = 'desain' . time();
		$config['max_size'] = '2048';

		$this->load->library('upload', $config);

		if ($_FILES['image']['name']) {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data();
				$data['gambar'] = $image['file_name'];
				// unlink('assets/img/pelanggan/'.$this->session->userdata('plg_foto'));
			}
		}

		$this->Model_app->insert_data('keranjang', $data);
		redirect(base_url('keranjang'));
	}

	function hapus($id)
	{

		$data_keranjang = $this->Model_app->edit_data('keranjang', array('id' => $id))->row();
		unlink('assets/img/pesanan/' . $data_keranjang->gambar);
		$this->Model_app->delete_data('keranjang', array('id' => $id));

		redirect(base_url('keranjang'));
	}




	function update($id)
	{

		$data_pesanan = $this->Model_app->edit_data('keranjang', array('id' => $id))->row();
		$data_produk = $this->Model_app->edit_data('produk', array('produkid' => $data_pesanan->produkid))->row();


		$data['jumlah'] = $this->input->post('qty');
		$data['size_product'] = $this->input->post('size');
		$data['lokasi'] = $this->input->post('destination_provice');
		$data['kota'] = $this->input->post('destination_city');
		$data['isi_pesan'] = $this->input->post('isi_pesan');
		$data['no_telp'] = $this->input->post('no_telp');
		$data['nama_penerima'] = $this->input->post('nama_penerima');
		$data['alamat'] = $this->input->post('alamat');
		$data['weight'] = $this->input->post('weight');
		$data['opKirim'] = $this->input->post('opKirim');
		$data['opsiLayanan'] = $this->input->post('ongkos');
		$data['isi_pesan'] = $this->input->post('isi_pesan');
		// $data['sub_total'] = $data_produk->produk_harga * $data['jumlah'];
		$data['ongkir'] = $this->input->post('ongkos');

		$ongkos = $this->input->post('ongkos');
		$data['sub_total'] = ($data_produk->produk_harga * $data['jumlah']) + $ongkos;

		$province = $this->province();
		$kota = $this->get_city($data['lokasi']);
		$opKirim = $this->cost($data['kota'], $data['weight'], $data['opKirim']);

		foreach ($province['rajaongkir']['results'] as $prov) {
			if ($data['lokasi'] == $prov['province_id']) {
				$data['lokasi'] = $prov['province'];
				// echo $update['lokasi'];
				// $this->Model_app->update_data('keranjang', array('id' => $id), $update);
			}
		}


		foreach ($kota->rajaongkir->results as $kota1) {
			// echo $kota['city_name'];
			if ($data['kota'] == $kota1->city_id) {
				$data['kota'] = $kota1->city_name;
				$data['tipe_lokasi'] = $kota1->type;
				// echo $update['kota'];
				// $this->Model_app->update_data('keranjang', array('id' => $id), $update);
			}
		}


		foreach ($opKirim['rajaongkir']['results'][0]['costs'] as $opKirim1) {
			foreach ($opKirim1['cost'] as $tarif) {
				if ($data['opsiLayanan'] == $tarif['value']) {
					$data['opsiLayanan'] = $opKirim1['service'] . ' Estimasi ' . $tarif['etd'] . ' hari Harga ' . $tarif['value'];
					// $this->Model_app->update_data('keranjang', array('id' => $id), $update);
				}
			}
		}



		$data['plg_id'] = $this->session->userdata('plg_id');

		// var_dump($opKirim, $data['opsiLayanan']);
		// die();

		$this->Model_app->update_data('keranjang', array('id' => $id), $data);
		redirect(base_url('keranjang'));
	}


	function generate_id()
	{
		return $this->Model_app->get_kode_pelanggan();
	}
}
