<?php
defined('BASEPATH') or exit ('NO Direct Script Access Allowed');

class Katalog extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_app');


	}

	private $view = 'katalog';

	function index(){
		$data['title'] = 'Katalog';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();
		$data['data_produk'] 	= $this->Model_app->get_produk()->result();
		$data['jumlah_produk'] 	= $this->Model_app->get_produk()->num_rows();
		
		$jumlah_data = $data['jumlah_produk'];
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

		$config['base_url'] = base_url().'katalog/index/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 9;
        $config['uri_segment'] = 3;
        $start = $this->uri->segment(3, 0);
		$this->pagination->initialize($config);	
		$data['data_produk'] = $this->Model_app->get_produk_pagination($config['per_page'],$start)->result();
		$data['data_kategori'] = $this->Model_app->get_data('kategori','kategori_id','desc')->result();
		// print_r($data['data_produk1']);
		// die();
		
		$this->load->view('front/layouts/header',$data);
		$this->load->view('front/layouts/menu_and_sidebar',$data);
		$this->load->view('front/katalog',$data);
		$this->load->view('front/layouts/footer',$data);
	}

	function kategori($id_kategori){
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

		$config['base_url'] = base_url().'katalog/kategori/'.$id_kategori.'/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 9;
        $config['uri_segment'] = 4;
        $start = $this->uri->segment(4, 0);
		$this->pagination->initialize($config);	
		$data['data_produk'] = $this->Model_app->get_produk_pagination_kategori($config['per_page'],$start,$id_kategori)->result();
		$data['data_kategori'] = $this->Model_app->get_data('kategori','kategori_id','desc')->result();

		$data['jumlah_produk'] 	= count($data['data_produk']);
		// print_r($data['data_produk1']);
		// die();
		
		$this->load->view('front/layouts/header',$data);
		$this->load->view('front/layouts/menu_and_sidebar',$data);
		$this->load->view('front/katalog',$data);
		$this->load->view('front/layouts/footer',$data);
	}

	function search(){

		
		$data['title'] = 'Katalog';
		// get_produk_pagination_kategori_and_name
		$data['jumlah_produk'] 	= $this->Model_app->get_produk()->num_rows();
		$id_kategori = $this->input->get('kategori');
		$produk_nama = $this->input->get('produk');
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();


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

		$config['base_url'] = base_url().'katalog/search?produk='.$produk_nama.'&kategori='.$id_kategori.'/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 9;
        $config['uri_segment'] = 4;
        $start = $this->uri->segment(4, 0);
		$this->pagination->initialize($config);	
		$data['data_produk'] = $this->Model_app->get_produk_pagination_kategori_and_name($config['per_page'],$start,$id_kategori,$produk_nama)->result();
		$data['data_kategori'] = $this->Model_app->get_data('kategori','kategori_id','desc')->result();

		$data['jumlah_produk'] 	= count($data['data_produk']);
		// print_r($data['data_produk1']);
		// die();
		
		$this->load->view('front/layouts/header',$data);
		$this->load->view('front/layouts/menu_and_sidebar',$data);
		$this->load->view('front/katalog',$data);
		$this->load->view('front/layouts/footer',$data);
	}


	 

	


}