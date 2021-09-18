<?php
defined('BASEPATH') or exit('NO Direct Script Access Allowed');

class Data_admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_app');
		if ($this->session->userdata('adminstatus') != 'login') {
			$this->session->set_flashdata('pesan', 'Anda Harus Login !');
			redirect(base_url() . 'admin/login');
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	private $view = 'data_admin';
	private $table = 'admin';
	private $pk = 'adminid';
	private $controller = 'data-admin';

	function index()
	{
		$data['title'] = 'Manajamen Admin';
		$data['sub_title'] = 'Data Admin';
		$data['controller'] = $this->controller;
		$data['semua_admin'] = $this->Model_app->get_data($this->table, $this->pk, 'desc')->result();


		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/layouts/navbar', $data);
		$this->load->view('admin/layouts/sidebar', $data);
		$this->load->view('admin/' . $this->view . '/' . $this->view . '_index', $data);
		$this->load->view('admin/layouts/footer', $data);
	}


	function tambah()
	{
		$data['title'] = 'Manajamen Admin';
		$data['sub_title'] = 'Tambah Data Admin';
		$data['controller'] = $this->controller;
		$data['admin_kode'] = $this->generate_kode_admin();


		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/layouts/navbar', $data);
		$this->load->view('admin/layouts/sidebar', $data);
		$this->load->view('admin/' . $this->view . '/' . $this->view . '_tambah', $data);
		$this->load->view('admin/layouts/footer', $data);
	}

	function edit($pk)
	{
		$data['title'] = 'Manajamen Admin';
		$data['sub_title'] = 'Edit Data Admin';
		$data['controller'] = $this->controller;
		$data['data_admin'] = $this->Model_app->edit_data($this->table, array($this->pk => $pk))->row();

		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/layouts/navbar', $data);
		$this->load->view('admin/layouts/sidebar', $data);
		$this->load->view('admin/' . $this->view . '/' . $this->view . '_edit', $data);
		$this->load->view('admin/layouts/footer', $data);
	}


	function simpan()
	{
		$admin_kode		 		= $this->input->post('admin_kode');
		$admin_nama		 		= $this->input->post('admin_nama');
		$admin_password		 	= md5($this->input->post('admin_password'));
		$admin_tanggal_dibuat 	= date('Y-m-d H:i:s');


		$data = array(
			'admin_kode' 			=> $admin_kode,
			'admin_nama' 			=> $admin_nama,
			'admin_password'		=> $admin_password,
			'admin_tanggal_dibuat'	=> $admin_tanggal_dibuat
		);
		$config['upload_path'] = './assets/img/admin/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['file_name'] = 'admin' . time();
		$config['max_size'] = '2048';

		$this->load->library('upload', $config);

		if ($_FILES['admin_gambar']['name']) {
			if ($this->upload->do_upload('admin_gambar')) {
				$image = $this->upload->data();
				$data['admin_gambar'] = $image['file_name'];
			}
		}
		// print_r($data);
		// die();



		$insert = $this->Model_app->insert_data($this->table, $data);
		$this->session->set_flashdata('simpan', 'Data Berhasil di Simpan !');
		redirect(base_url('admin/') . $this->controller);
	}

	function update($pk)
	{
		$admin_kode		 		= $this->input->post('admin_kode');
		$admin_nama		 		= $this->input->post('admin_nama');
		$admin_password		 	= $this->input->post('admin_password');
		$hak_akses		 		= $this->input->post('hak_akses');
		$admin_tanggal_dibuat 	= date('Y-m-d H:i:s');

		$data_edit = $this->Model_app->edit_data($this->table, array($this->pk => $pk))->row();
		$data = array(
			'admin_nama' 			=> $admin_nama,

		);

		if ($admin_password != '') {
			$data['admin_password']		= md5($admin_password);
		}


		$config['upload_path'] = './assets/img/admin/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['file_name'] = 'admin' . time();
		$config['max_size'] = '2048';

		$this->load->library('upload', $config);

		if ($_FILES['admin_gambar']['name']) {
			if ($this->upload->do_upload('admin_gambar')) {
				$image = $this->upload->data();
				$data['admin_gambar']    = $image['file_name'];
				unlink('assets/img/admin/' . $data_edit->admin_gambar);
			}
		}

		$session = array(
			'admin_nama'		=> $admin_nama,

		);
		// print_r($session);
		// die();
		$this->session->set_userdata($session);

		$insert = $this->Model_app->update_data($this->table, array($this->pk => $pk), $data);
		$this->session->set_flashdata('update', 'Data Berhasil di Update !');
		redirect(base_url('admin/') . $this->controller);
	}

	function hapus($id)
	{
		$data_edit = $this->Model_app->edit_data($this->table, array($this->pk => $id))->row();

		if ($data_edit->admin_gambar) {
			unlink('assets/img/admin/' . $data_edit->admin_gambar);
		}

		$delete = $this->Model_app->delete_data($this->table, array($this->pk => $id));
		$this->session->set_flashdata('hapus', 'Data berhasil di Hapus ! ');
		redirect(base_url('admin/') . $this->controller);
	}



	function generate_kode_admin()
	{
		return $this->Model_app->get_kode_admin();
	}
}
