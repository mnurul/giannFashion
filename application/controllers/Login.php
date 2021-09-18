<?php
defined('BASEPATH') or exit ('NO Direct Script Access Allowed');

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_app');


	}

	private $view = 'Login';

	function index(){
		$data['title'] = 'Login';
		$plg_id = $this->session->userdata('plg_id');
		$data['jumlah_dikeranjang'] = $this->Model_app->get_data_keranjang($plg_id)->num_rows();


		// print_r($data['data_produk1']);
		// die();

		
		$this->load->view('front/layouts/header',$data);
		$this->load->view('front/layouts/menu_and_sidebar',$data);
		// $this->load->view('front/layouts/banner',$data);
		$this->load->view('front/login',$data);
		$this->load->view('front/layouts/footer',$data);
	}

	function buat_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($username == '' && $password != ''  ){
			$this->session->set_flashdata('pesan', 'Username tidak boleh kosong');
			redirect(base_url().'login');
		}elseif($password == '' && $username != ''){
			$this->session->set_flashdata('pesan', 'Password tidak boleh kosong');
			redirect(base_url().'login');
		}elseif($password == '' && $username == ''){
			$this->session->set_flashdata('pesan', 'Username dan Password tidak boleh kosong');
			redirect(base_url().'login');
		}else{
			$data = array(
				'plg_username' => $username,
				'plg_password'=> md5($password),
			);
			$password = md5($password);
			
			// Cek data login

			$cek_login = $this->db->where('plg_username',$username)->where('plg_password',$password)->get('pelanggan')->num_rows();

			// $cek_login = $this->db->query("SELECT username,password from tabel_admin where username = '$username' and password='$password'")->num_rows();


			if ($cek_login > 0) {
				// Jika LoginBerhasil
				$data_pelanggan = $this->db->where('plg_username',$username)->where('plg_password',$password)->get('pelanggan')->row();
				// Membuat Session Login
				$session = array(
					'login_pelanggan' 	=> 'login',
					'plg_id'	 		=> $data_pelanggan->plg_id,	
					'plg_nama'			=> $data_pelanggan->plg_nama,
					'plg_username'		=> $data_pelanggan->plg_username,
					'plg_email'			=> $data_pelanggan->plg_email,
					'plg_foto'			=> $data_pelanggan->plg_foto,
					'plg_telepon'			=> $data_pelanggan->plg_telepon,
					'plg_alamat'			=> $data_pelanggan->plg_alamat,
					'plg_kelamin'			=> $data_pelanggan->plg_kelamin,
				);
				$this->session->set_userdata($session);

				// MASALAH JIKA MESINMATI DAN BARU LOGIN SESSION SHIFT DAN DATETIME TIDAK TERBACA
				redirect(base_url());
			}else{
				// jika Login Gagal
				$this->session->set_flashdata('pesan', 'Username atau Password salah');
				redirect(base_url().'login');
			}

		}
	}

	function logout()
	{
		$this->session->unset_userdata('login_pelanggan');
		// $this->session->sess_destroy();
		$this->session->set_flashdata('pesan', 'Anda telah Logout');
		redirect(base_url().'login');
	}


	 

	


}