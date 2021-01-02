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
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');

		// Cek Kelengkapan formulir
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('no_telp','Nomor Telepon','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run()!=false){
			$checkdatausername = $this->m_data->get_data_where("tb_pembeli", "username = '".$username."'")->num_rows();
			if($checkdatausername == 0){
				$data_input = array(
					'nama' => $nama,
					'alamat' => $alamat,
					'no_telp' => $no_telp,
				   'email' => $email,
				   'username' => $username,
				   'password' => $password);
				   $this->m_data->insert_data($data_input,'tb_pembeli');

				   
					$getusername = $this->m_data->get_data_where("tb_pembeli", "nama = '".$nama."'")->result();
					foreach ($getusername as $g){
						$id_pembeli = $g->id_pembeli;
					}

					
					$data_session = array(
						'id_pembeli' => $id_pembeli,
						'nama' => $nama,
						'username' => $username,
						'status' => 'pembeli_login'
					);

					$this->session->set_userdata($data_session);
					redirect(base_url());
					
				   
			} else {	
				redirect(base_url().'registrasi?alert=1');
			}
			// $id = $this->session->userdata('id_admin');

			// $where = array('id_admin' => $id_admin);

			// $data = array('password' => md5($baru));

			// $this->m_data->update_data($where,$data,'admin');

			// redirect(base_url().'admin/ganti_password/?alert=sukses');

		}else{
			redirect(base_url().'registrasi?alert=2');
		}

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