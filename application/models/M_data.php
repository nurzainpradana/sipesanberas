<?php 

// WWW.MALASNGODING.COM === Author : Diki Alfarabi Hadi
// Model yang terstruktur. agar bisa digunakan berulang kali untuk membuat CRUD. 
// Sehingga proses pembuatan CRUD menjadi lebih cepat dan efisien.

class M_data extends CI_Model{
	
	// FUNGSI CRUD
	// fungsi untuk mengambil data dari database
	function get_data_pagination($limit, $start, $table){
		return $this->db->get($table, $limit, $start);
	}

	function get_data_pagination_where($limit, $start, $table, $where){
		$this->db->where($where);
		return $this->db->get($table, $limit, $start);
	}

	function get_data_pagination_like($limit, $start, $table, $like, $where){
		$this->db->where("nama LIKE '%".$like."%'");
		return $this->db->get($table, $limit, $start);
	}

	function get_data($table){
		return $this->db->get($table);
	}

	
	function get_data_join($select, $table, $table_join, $join ){
		$query = $this->db->select($select)->from($table)->join($table_join, $join)->get();
		return $query->result();
	}
	
	function get_data_join_where($select, $table, $table_join, $join, $where){
		$query = $this->db->select($select)->from($table)->join($table_join, $join)->where($where)->get();
		return $query->result();
	}

	function get_data_where($table, $where){
		$this->db->where($where);
		return $this->db->get($table);
	}
	
	function get_search_data($like, $table){
		$this->db->get($table);
		return $this->db->where("nama LIKE \'".$like."\'");
	}

	// fungsi untuk menginput data ke database
	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	// fungsi untuk mengedit data
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	// fungsi untuk mengupdate atau mengubah data di database
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// fungsi untuk mengupdate atau mengubah data di database
	function update_data_multiple_where($where1, $where2,$data,$table){
		$this->db->where($where1)->where($where2);
		$this->db->update($table,$data);
	}

	function get_select_data($select, $where, $table) {
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get();
	}

	// fungsi untuk menghapus data dari database
	function delete_data($where,$table){
		$this->db->delete($table,$where);
	}
	// AKHIR FUNGSI CRUD

	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

	function stock_now($id_produk){
		$this->db->select("stock");
		$this->db->from("tb_produk");
		return $this->db->get();
	}

	function c_peminjaman($id_peminjaman){
		$query = "SELECT peminjaman.* , buku.judul_buku , anggota.nm_anggota from peminjaman join buku on peminjaman.id_buku=buku.id_buku join anggota on peminjaman.id_anggota=anggota.id_anggota WHERE peminjaman.id_peminjaman = $id_peminjaman;";
        return $this->db->query($query)->row_array();
	}
	// function terlambat($id_peminjaman){
	// 	$query ="SELECT datediff(`pengembalian`.`tgl_pengembalian`,`peminjaman`.`tgl_bataspengembalian`) from `pengembalian` join `peminjaman` on `peminjaman`.`id_peminjaman` = `pengembalian`.`id_peminjaman`";
	// 	return $this->db->query($query);
	// }
	
	// CART DETAIL
	function get_cart_detail($id_pembeli){
		$query = "SELECT c.id_cart , p.gambar, p.nama, p.ukuran, p.harga, quantity, stock as qty_produk, quantity * p.harga as subtotal from tb_cart as c join tb_produk as p on c.id_produk = p.id_produk WHERE c.id_pembeli = $id_pembeli;";
        return $this->db->query($query)->result();
	}

	// GET LAST ID
	function get_last_id($selected_id, $table_name, $id_pembeli) {
		$query = $this->db->query("SELECT MAX(".$selected_id.") as last_id FROM ".$table_name." where id_pembeli ='".$id_pembeli."'");
		// $this->db->select("MAX(".$selected_id.") as last_id");
		// $this->db->from("tb_cart");
		// $this->db->where("id_cart", $id_pembeli);
		return $query->result();
	}

}

?>