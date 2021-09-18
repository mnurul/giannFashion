<?php
defined('BASEPATH') or exit ('NO Direct Script Access Allowed');

class Tentang_kami extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_app');
		if ($this->session->userdata('adminstatus') != 'login') {
			$this->session->set_flashdata('pesan', 'Anda Harus Login !');
			redirect(base_url().'admin/login');
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	private $view = 'data_testimoni';
	private $table = 'testimoni';
	private $pk = 'idtesti';
	private $controller = 'tentang-kami';

	function index(){
		$data['title'] = 'Tentang Kami';
		$data['sub_title'] = 'Tentang Kami';
		$data['controller'] = $this->controller;
		$data['data'] = $this->Model_app->get_data('tentang_kami','id','desc')->row();

		
		$this->load->view('admin/layouts/header',$data);
		$this->load->view('admin/layouts/navbar',$data);
		$this->load->view('admin/layouts/sidebar',$data);
		$this->load->view('admin/tentang_kami',$data);
		$this->load->view('admin/layouts/footer',$data);
	}


	function ubah()
	{
		$isi = $this->input->post('isi');

		// Di cek ke Database
		$cek = $this->Model_app->get_data('tentang_kami','id','desc');

		if ($cek->num_rows() > 0) {
			// Update
			$data_id = $cek->row()->id;
			$this->Model_app->update_data('tentang_kami',array('id'=>$data_id),array('isi'=>$isi));
			$this->session->set_flashdata('update','Data Berhasil di Update !');
			redirect(base_url('admin/').$this->controller);
			
		}else{
			

			$this->Model_app->insert_data('tentang_kami',array('isi'=>$isi));
			$this->session->set_flashdata('simpan','Data Berhasil di Simpan !');
			redirect(base_url('admin/').$this->controller);
		}


	}
	function status_aktif($idtesti)
	{
		$this->Model_app->update_data('testimoni',array('idtesti'=>$idtesti),array('status_testi'=>1));
		redirect(base_url('admin/').$this->controller);
	}

	function status_nonaktif($idtesti)
	{
		$this->Model_app->update_data('testimoni',array('idtesti'=>$idtesti),array('status_testi'=>0));
		redirect(base_url('admin/').$this->controller);
	}


	function tambah(){
		$data['title'] = 'Manajamen Kategori';
		$data['sub_title'] = 'Tambah Data Kategori';
		$data['controller'] = $this->controller;

		
		$this->load->view('admin/layouts/header',$data);
		$this->load->view('admin/layouts/navbar',$data);
		$this->load->view('admin/layouts/sidebar',$data);
		$this->load->view('admin/'.$this->view.'/'.$this->view.'_tambah',$data);
		$this->load->view('admin/layouts/footer',$data);
	}

	function edit($pk){
		$data['title'] = 'Manajamen Kategori';
		$data['sub_title'] = 'Edit Data Kategori';
		$data['controller'] = $this->controller;
		$data['data_edit'] = $this->Model_app->edit_data($this->table,array($this->pk=>$pk))->row();
		
		$this->load->view('admin/layouts/header',$data);
		$this->load->view('admin/layouts/navbar',$data);
		$this->load->view('admin/layouts/sidebar',$data);
		$this->load->view('admin/'.$this->view.'/'.$this->view.'_edit',$data);
		$this->load->view('admin/layouts/footer',$data);
	}


	function simpan()
	{
		$kategori_nama		 		= $this->input->post('kategori_nama');
	

		$data = array(
			'kategori_nama' 			=> $kategori_nama,
		);

		$insert = $this->Model_app->insert_data($this->table,$data);
		$this->session->set_flashdata('simpan','Data Berhasil di Simpan !');
		redirect(base_url('admin/').$this->controller);
	}

	function update($pk)
	{
		$kategori_nama		 		= $this->input->post('kategori_nama');
	

		$data = array(
			'kategori_nama' 			=> $kategori_nama,
		);

	
		$insert = $this->Model_app->update_data($this->table,array($this->pk=>$pk),$data);
		$this->session->set_flashdata('update','Data Berhasil di Update !');
		redirect(base_url('admin/').$this->controller);
	}

	function hapus($id)
	{
		$data_edit = $this->Model_app->edit_data($this->table,array($this->pk=>$id))->row();

		
		$delete = $this->Model_app->delete_data($this->table,array($this->pk=>$id));
		$this->session->set_flashdata('hapus','Data berhasil di Hapus ! ');
		redirect(base_url('admin/').$this->controller);
	}



	function generate_kode_admin()
	{
		return $this->Model_app->get_kode_admin();
	}


	 

	


}