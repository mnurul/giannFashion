<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_app extends CI_Model
{

	function edit_data($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function get_data($table, $by = 'ID', $order = 'desc')
	{
		$this->db->order_by($by, $order);
		return $this->db->get($table);
	}

	function insert_data($table, $data)
	{

		$this->db->insert($table, $data);
	}

	function write_data($table, $data)
	{
		$this->db->insert($table, $data);

		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function update_data($table, $where, $data)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	function update_data_tagmd($table, $where1, $where2, $data)
	{
		$this->db->where($where1);
		$this->db->where($where2);
		$this->db->update($table, $data);
	}

	function delete_data($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function delete_data_suffix_tag($table, $where, $where2)
	{
		$this->db->where($where);
		$this->db->where($where2);
		$this->db->delete($table);
	}





	// Additional

	function get_produk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.kategori_id = produk.kategori_id', 'left');
		$this->db->where('produk.produk_status', '1');
		// $this->db->where('produk.produk_status','1');
		$this->db->order_by('produk.produkid', 'desc');
		$query = $this->db->get();
		return $query;
	}

	function get_produk_admin()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.kategori_id = produk.kategori_id', 'left');
		$this->db->order_by('produk.produkid', 'desc');
		$query = $this->db->get();
		return $query;
	}

	function get_pesanan_admin()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('pelanggan', 'pelanggan.plg_id = pesanan.plg_id', 'left');
		$this->db->order_by('pesanan.tgl_transaksi', 'desc');
		$query = $this->db->get();
		return $query;
	}

	function get_pesanan_admin_periode($dari, $sampai)
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('pelanggan', 'pelanggan.plg_id = pesanan.plg_id', 'left');
		$this->db->where('pesanan.tgl_transaksi BETWEEN "' . $dari . ' 00:00:00' . '" and "' . $sampai . ' 23:59:59' . '"');
		$this->db->order_by('pesanan.tgl_transaksi', 'desc');
		$query = $this->db->get();
		return $query;
	}


	function get_data_keranjang($plg_id)
	{
		$this->db->select('*');
		$this->db->from('keranjang');
		$this->db->join('produk', 'produk.produkid = keranjang.produkid', 'left');
		$this->db->where('keranjang.plg_id', $plg_id);
		$this->db->order_by('keranjang.id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	function get_riwayat_transaksi($plg_id)
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('pelanggan', 'pelanggan.plg_id = pesanan.plg_id', 'left');
		$this->db->where('pesanan.plg_id', $plg_id);
		$this->db->order_by('pesanan.tgl_transaksi', 'desc');
		$query = $this->db->get();
		return $query;
	}


	function get_riwayat_transaksi_detail($plg_id, $no_pesanan)
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('pelanggan', 'pelanggan.plg_id = pesanan.plg_id', 'left');
		$this->db->where('pesanan.plg_id', $plg_id);
		$this->db->where('pesanan.no_pesanan', $no_pesanan);
		$this->db->order_by('pesanan.tgl_transaksi', 'desc');
		$query = $this->db->get();
		return $query;
	}

	function get_detail_transaksi($no_pesanan)
	{
		$this->db->select('*');
		$this->db->from('detail_pesanan');
		$this->db->join('produk', 'produk.produkid = detail_pesanan.produkid', 'left');
		// $this->db->where('detail_pesanan.plg_id', $plg_id);
		$this->db->where('detail_pesanan.no_pesanan', $no_pesanan);
		$this->db->order_by('detail_pesanan.id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	function get_testimoni()
	{
		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->join('pelanggan', 'pelanggan.plg_id = testimoni.plg_id', 'left');
		// $this->db->where('detail_pesanan.plg_id', $plg_id);
		// $this->db->where('detail_pesanan.no_pesanan', $no_pesanan);
		$this->db->order_by('testimoni.idtesti', 'desc');
		$query = $this->db->get();
		return $query;
	}

	function get_testimoni_aktif()
	{
		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->join('pelanggan', 'pelanggan.plg_id = testimoni.plg_id', 'left');
		// $this->db->where('detail_pesanan.plg_id', $plg_id);
		$this->db->where('testimoni.status_testi', 1);
		$this->db->order_by('testimoni.idtesti', 'desc');
		$query = $this->db->get();
		return $query;
	}



	function get_produk_where($id)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.kategori_id = produk.kategori_id', 'left');
		$this->db->where('produk.produk_status', '1');
		$this->db->where('produk.produkid', $id);
		$this->db->order_by('produk.produkid', 'desc');
		$query = $this->db->get();
		return $query;
	}

	function get_produk_pagination($number, $offset)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.kategori_id = produk.kategori_id', 'left');
		$this->db->where('produk.produk_status', '1');
		$this->db->order_by('produk.produkid', 'desc');
		$this->db->limit($number, $offset);
		$query = $this->db->get();
		return $query;
	}

	function get_produk_pagination_kategori_and_name($number, $offset, $id_kategori, $produk_nama)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.kategori_id = produk.kategori_id', 'left');
		$this->db->like('produk.produk_nama', $produk_nama);
		$this->db->where('produk.produk_status', '1');
		if ($id_kategori != 0) {
			$this->db->where('produk.kategori_id', $id_kategori);
		}
		$this->db->order_by('produk.produkid', 'desc');
		$this->db->limit($number, $offset);
		$query = $this->db->get();
		return $query;
	}

	function get_produk_pagination_kategori($number, $offset, $id_kategori)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.kategori_id = produk.kategori_id', 'left');
		$this->db->where('produk.produk_status', '1');
		$this->db->where('produk.kategori_id', $id_kategori);
		$this->db->order_by('produk.produkid', 'desc');
		$this->db->limit($number, $offset);
		$query = $this->db->get();
		return $query;
	}

	function data($number, $offset)
	{
		return $query = $this->db->get('user', $number, $offset)->result();
	}

	function get_produk_limit($start, $end)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.kategori_id = produk.kategori_id', 'left');
		$this->db->where('produk.produk_status', '1');
		$this->db->order_by('produk.produkid', 'desc');
		$this->db->limit($start, $end);
		$query = $this->db->get();
		return $query;
	}

	function get_produk_random()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.kategori_id = produk.kategori_id', 'left');
		$this->db->where('produk.produk_status', '1');
		$this->db->order_by('rand()');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query;
	}

	public function get_kode_admin()
	{
		$this->db->select('RIGHT(admin.admin_kode,4) as kode', FALSE);
		$this->db->order_by('admin_kode', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('admin');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "ADM" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function get_kode_pelanggan()
	{
		$this->db->select('RIGHT(pelanggan.plg_id,4) as kode', FALSE);
		$this->db->order_by('plg_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('pelanggan');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PLG" . date('ymd') . $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function get_no_pesanan($as_user)
	{
		$this->db->select('RIGHT(pesanan.no_pesanan,4) as kode', FALSE);
		$this->db->order_by('tgl_transaksi', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('pesanan');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 2;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "ORD" . $as_user . date('ymd') . $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function get_kode_produk($as_produk)
	{
		$this->db->select('RIGHT(produk.produk_kode,4) as kode', FALSE);
		$this->db->order_by('produk_tanggal_dibuat', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('produk');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = $as_produk . date('ymd') . $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}


	function get_users()
	{
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_role', 'tbl_role.idrole = tbl_users.idrole', 'left');
		$this->db->order_by('tbl_users.iduser', 'desc');
		$query = $this->db->get();

		return $query;
	}

	function get_data_komik()
	{
		$this->db->select('*');
		$this->db->from('tbl_komik');
		$this->db->join('tbl_kategori', 'tbl_kategori.idkategori = tbl_komik.idkategori', 'left');
		$this->db->order_by('tbl_komik.idkomik', 'desc');
		$query = $this->db->get();

		return $query;
	}

	function get_process()
	{
		$this->db->select('*,tbl_unit.description as unit_desc,tbl_process.description as process_desc');
		$this->db->from('tbl_process');
		$this->db->join('tbl_unit', 'tbl_unit.idunit = tbl_process.idunit', 'left');
		$this->db->order_by('tbl_process.idprocess', 'desc');
		$query = $this->db->get();

		return $query;
	}

	function edit_process($id)
	{
		$this->db->select('*,tbl_unit.description as unit_desc,tbl_process.description as process_desc');
		$this->db->from('tbl_process');
		$this->db->join('tbl_unit', 'tbl_unit.idunit = tbl_process.idunit', 'left');
		$this->db->where('tbl_process.idprocess', $id);
		$this->db->order_by('tbl_process.idprocess', 'desc');
		$query = $this->db->get();

		return $query;
	}


	function get_detail_recipe($id)
	{
		$this->db->select('*,tbl_recipe.name as recipename,tbl_users.name as user_name');
		$this->db->from('tbl_recipe');
		$this->db->join('tbl_users', 'tbl_users.iduser = tbl_recipe.iduser', 'left');
		$this->db->where('tbl_recipe.idrecipe', $id);
		$this->db->order_by('tbl_recipe.idrecipe', 'desc');
		$query = $this->db->get();

		return $query;
	}

	function get_recipe($status)
	{
		$this->db->select('*,tbl_recipe.name as recipename,tbl_users.name as user_name,tbl_recipe.date_created as recipecreateddate,');
		$this->db->from('tbl_recipe');
		$this->db->join('tbl_users', 'tbl_users.iduser = tbl_recipe.iduser', 'left');
		$this->db->where('tbl_recipe.status', $status);
		$this->db->order_by('tbl_recipe.idrecipe', 'desc');
		$query = $this->db->get();

		return $query;
	}


	function get_planning($status)
	{
		$this->db->select('*,tbl_recipe.name as recipename,tbl_users.name as user_name,tbl_recipe.date_created as recipecreateddate,tbl_planning.status as status_planning,');
		$this->db->from('tbl_planning');
		$this->db->join('tbl_recipe', 'tbl_recipe.idrecipe = tbl_planning.idrecipe', 'left');
		$this->db->join('tbl_tank', 'tbl_tank.idtank = tbl_planning.idtank', 'left');
		$this->db->join('tbl_users', 'tbl_users.iduser = tbl_planning.iduser', 'left');
		$this->db->where('tbl_planning.status', $status);
		$this->db->order_by('tbl_planning.idplanning', 'desc');
		$query = $this->db->get();

		return $query;
	}
}
