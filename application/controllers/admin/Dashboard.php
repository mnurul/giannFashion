<?php
defined('BASEPATH') or exit('NO Direct Script Access Allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('adminstatus') != 'login') {
			$this->session->set_flashdata('pesan', 'Anda Harus Login !');
			redirect(base_url() . 'admin/login');
		}
	}

	private $view = 'dashboard';

	function index()
	{
		$data['title'] = 'Dashboard';

		$data['order_baru'] = $this->db->query("SELECT * from pesanan where status_pesanan = 0")->num_rows();
		$data['order_berhasil'] = $this->db->query("SELECT * from pesanan where status_pesanan = 4")->num_rows();
		$data['jumlah_user'] = $this->db->query("SELECT * from pelanggan ")->num_rows();
		$data['jumlah_produk'] = $this->db->query("SELECT * from produk ")->num_rows();

		$data['belum_bayar'] = $this->db->query("SELECT * from pesanan where status_pesanan = 0")->num_rows();
		$data['menunggu_konfirmasi'] = $this->db->query("SELECT * from pesanan where status_pesanan = 1")->num_rows();
		$data['diproses'] = $this->db->query("SELECT * from pesanan where status_pesanan = 2")->num_rows();
		$data['dikirim'] = $this->db->query("SELECT * from pesanan where status_pesanan = 3")->num_rows();
		$data['selesai'] = $this->db->query("SELECT * from pesanan where status_pesanan = 4")->num_rows();
		$data['batal'] = $this->db->query("SELECT * from pesanan where status_pesanan = 5")->num_rows();
		$data['transaksi'] = $this->db->query("SELECT* , sum(grandtotal) as total_penjualan FROM pesanan WHERE tgl_transaksi >= DATE(NOW()) - INTERVAL 7 DAY GROUP by YEAR(tgl_transaksi),MONTH(tgl_transaksi),DATE(tgl_transaksi) order by tgl_transaksi")->result();

		// print_r($data['transaksi']);
		// die();



		$this->load->view('admin/layouts/header', $data);
		$this->load->view('admin/layouts/navbar', $data);
		$this->load->view('admin/layouts/sidebar', $data);
		$this->load->view('admin/' . $this->view . '/' . $this->view . '_index', $data);
		$this->load->view('admin/layouts/footer', $data);
	}
}
