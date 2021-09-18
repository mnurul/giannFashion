<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();

	}


	function index()
	{
		$this->load->view('admin/login');
	}

	function buat_login()
	{
		$admin_kode = $this->input->post('admin_kode');
		$password = $this->input->post('password');

		if($admin_kode == '' && $password != ''  ){
			$this->session->set_flashdata('pesan', 'Username tidak boleh kosong');
			redirect(base_url().'admin/login');
		}elseif($password == '' && $admin_kode != ''){
			$this->session->set_flashdata('pesan', 'Password tidak boleh kosong');
			redirect(base_url().'admin/login');
		}elseif($password == '' && $admin_kode == ''){
			$this->session->set_flashdata('pesan', 'Username dan Password tidak boleh kosong');
			redirect(base_url().'admin/login');
		}else{
			$data = array(
				'admin_kode' => $admin_kode,
				'password'=> md5($password),
			);
			$password = md5($password);
			
			// Cek data login

			$cek_login = $this->db->where('admin_kode',$admin_kode)->where('admin_password',$password)->get('admin')->num_rows();

			// $cek_login = $this->db->query("SELECT username,password from tabel_admin where username = '$username' and password='$password'")->num_rows();


			if ($cek_login > 0) {
				// Jika LoginBerhasil
				$data_admin = $this->db->where('admin_kode',$admin_kode)->where('admin_password',$password)->get('admin')->row();
				// Membuat Session Login
				$session = array(
					'adminstatus' 		=> 'login',
					'adminid'	 		=> $data_admin->adminid,	
					'admin_nama'		=> $data_admin->admin_nama,
					'admin_kode'		=> $data_admin->admin_kode,
					'admin_gambar'		=> $data_admin->admin_gambar,
					'hak_akses'	    	=> $data_admin->hak_akses,
				);
				$this->session->set_userdata($session);

				// MASALAH JIKA MESINMATI DAN BARU LOGIN SESSION SHIFT DAN DATETIME TIDAK TERBACA
				redirect(base_url().'admin/dashboard');
			}else{
				// jika Login Gagal
				$this->session->set_flashdata('pesan', 'Username atau Password salah');
				redirect(base_url().'admin/login');
			}

		}
	}


	function logout()
	{
		$this->session->unset_userdata('adminstatus');
		// $this->session->sess_destroy();
		$this->session->set_flashdata('pesan', 'Anda telah Logout');
		redirect(base_url().'admin/login');
	}




}


 ?>