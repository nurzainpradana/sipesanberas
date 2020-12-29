<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct(){
        parent::__construct();
        
        // cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')!="pembeli_login"){
			redirect(base_url().'login?alert=belum_login');
		}
		
	}

	public function index(){
        $data['segment'] = $this->uri->segment(1);
        // Ambil Data Total Cart
        if ($this->session->userdata('status') == 'pembeli_login'){
			$data['total_cart'] = $this->m_data->get_data('tb_cart')->num_rows();
		} else {
			$data['total_cart']="";
        }

        $data['cart'] = $this->m_data->get_cart_detail($this->session->userdata('id_pembeli'));

        $this->load->view('dashboard/v_navbar', $data);
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_cart', $data);
		$this->load->view('dashboard/v_footer');
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
		redirect(base_url().'cart');
	}

	public function kurang_qty_cart($id_cart){
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

		if ($quantity > 1) {
			$data = array(
				'quantity' => $quantity - 1
			);
			$this->m_data->update_data( $where , $data,"tb_cart");
		}

		redirect(base_url().'cart');
	}

	public function hapus_cart($id_cart){
		// Mencari ID_PRODUK dari ID_CART
		$this->m_data->delete_data('id_cart = '.$id_cart, 'tb_cart');
		redirect(base_url().'cart');
	}
}
?>