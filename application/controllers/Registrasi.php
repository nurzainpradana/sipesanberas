<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	function __construct(){
        parent::__construct();
        
		
	}

	public function index(){
        $this->load->view('dashboard/v_header');
		$this->load->view('v_registrasi');
        $this->load->view('dashboard/v_footer');
	}

	public function daftar(){
		// Cek Kelengkapan formulir

		// Verifikasi username

		// Simpan Data
	}
	
	public function tambah_qty_cart($id_cart){
		// Mencari ID_PRODUK dari ID_CART
		$where = array(
			'id_cart' => $id_cart
		);
		$result = $this->m_data->get_select_data('id_produk, quantity', 'id_cart = '.$id_cart, 'tb_cart')->result();
		foreach ($result as $r) {
			$id_produk = $r->id_produk;
			$quantity = $r->quantity;
		}
		echo $id_produk." ".$quantity;

		// Cek Stock
		$where2 = array(
			'id_produk' => $id_produk
		);
		$result2 = $this->m_data->get_select_data('stock', 'id_produk = '.$id_produk, 'tb_produk')->result();
		foreach ($result2 as $r) {
			$stock = $r->stock;
		}
		echo $stock;

		if ($quantity < $stock) {
			$data = array(
				'quantity' => $quantity + 1
			);
			$this->m_data->update_data( $where , $data,"tb_cart");
		}

		// $stock = $this->m_data->update_data($id_produk);

		// if ($quantity < $stock) {
		// 	$data = array(
		// 		'quantity' => 'quantity + 1'
		// 	);
			
		// 	$this->m_data->update_data($where, "tb_cart", $data);
		// }
		
	}
}
?>