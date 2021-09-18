<?php
defined('BASEPATH') or exit ('NO Direct Script Access Allowed');

class Testimoni extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_app');
		
	}

	private $view = '';

	function index(){
		$data['title'] = 'Testimoni';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();
		$data['data_testi'] = $this->Model_app->get_testimoni_aktif()->result();

		// $data['data_produk1'] = $this->Model_app->get_produk_limit(10,0)->result();
		// $data['data_produk2'] = $this->Model_app->get_produk_random(20,10)->result();
		// $data['data_produk3'] = $this->Model_app->get_produk_random(30,20)->result();

		// $data['data_kategori'] = $this->Model_app->get_data('kategori','kategori_id','desc')->result();
		// print_r($data['data_produk1']);
		// die();

		
		$this->load->view('front/layouts/header',$data);
		$this->load->view('front/layouts/menu_and_sidebar',$data);
		// $this->load->view('front/layouts/banner',$data);
		$this->load->view('front/testimoni',$data);
		$this->load->view('front/layouts/footer',$data);
	}


	function create()
	{
		$data['isi_testi'] = $this->input->post('isi_testi');
		$data['plg_id'] = $this->session->userdata('plg_id');
		$data['email'] = $this->session->userdata('plg_email');
		$data['tgl_post'] = date('Y-m-d H:i:s');

		$this->Model_app->insert_data('testimoni',$data);

		$this->session->set_flashdata('pesan', 'Data Berhasil dikirim , Testimoni akan di tinjau oleh admin ');
		redirect(base_url('testimoni'));
	}


	 

	


}