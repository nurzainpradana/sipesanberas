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

	function get_data_pagination_like($limit, $start, $table, $like){
		$this->db->where("nama LIKE '%".$like."%'");
		return $this->db->get($table, $limit, $start);
	}

	function get_data($table){
		return $this->db->get($table);
	}

	function get_data_where($where, $table){
		return $this->db->get($table, $where);
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

	// fungsi untuk menghapus data dari database
	function delete_data($where,$table){
		$this->db->delete($table,$where);
	}
	// AKHIR FUNGSI CRUD


	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

	function c_peminjaman($id_peminjaman){
		$query = "SELECT peminjaman.* , buku.judul_buku , anggota.nm_anggota from peminjaman join buku on peminjaman.id_buku=buku.id_buku join anggota on peminjaman.id_anggota=anggota.id_anggota WHERE peminjaman.id_peminjaman = $id_peminjaman;";
        return $this->db->query($query)->row_array();
	}
	// function terlambat($id_peminjaman){
	// 	$query ="SELECT datediff(`pengembalian`.`tgl_pengembalian`,`peminjaman`.`tgl_bataspengembalian`) from `pengembalian` join `peminjaman` on `peminjaman`.`id_peminjaman` = `pengembalian`.`id_peminjaman`";
	// 	return $this->db->query($query);
	// }

}

?>