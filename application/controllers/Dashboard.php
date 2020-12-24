<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$data['segment'] = $this->uri->segment(1);
		if ($this->session->userdata('status') == 'pembeli_login'){
			$data['total_cart'] = $this->m_data->get_data('tb_cart')->num_rows();
		} else {
			$data['total_cart']="";
		}

		$this->load->view('dashboard/v_navbar', $data);
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_beranda');
		$this->load->view('dashboard/v_footer');
	}

	public function tambah_keranjang($id_produk){	
		// cek session yang login, jika session status tidak sama dengan session anggota_login,maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')!="pembeli_login"){
			$data['status'] = "Harus Login";
			redirect(base_url().'login');
			$this->load->view('v_login', $data);
		} else {
				$data_input = array(
					'id_produk' => $id_produk,
					'id_pembeli' => $this->session->userdata('id_pembeli'),
					'quantity' => 1);

				$where = array('id_produk' => $data_input['id_produk'],
								'id_pembeli' => $data_input['id_pembeli']);
				
				// mengambil data dari database sesuai id
				$get_cart = $this->m_data->cek_login('tb_cart', $where);
				echo $get_cart->num_rows();
				
				if (($get_cart->num_rows()) > 0) {
					$current_quantity = 0;
					foreach(($get_cart->result()) as $g){
						$current_quantity = ($g->quantity) + 1;
					}
					$data_input2 = array (
						'quantity' => $current_quantity
					);
					$this->m_data->update_data($where, $data_input2, 'tb_cart');
				} else if (($get_cart->num_rows()) < 1){
					$this->m_data->insert_data($data_input,'tb_cart');
					
				}
				redirect(base_url().'belanja');
			}

		

		
	}

	public function keranjang(){
		$this->load->view('dashboard/v_header');
			
		$this->load->view('dashboard/v_footer');
	}

	function login_aksi(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$sebagai = $this->input->post('sebagai');

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() != false){
			$where = array(
				'username' => $username,
				'password' => md5($password)
			);

			if($sebagai == "admin"){
				$cek = $this->m_data->cek_login('admin',$where)->num_rows();
				$data = $this->m_data->cek_login('admin',$where)->row();

				if($cek > 0){
					$data_session = array(
						'id' => $data->id,
						'username' => $data->username,
						'status' => 'admin_login'
					);

					$this->session->set_userdata($data_session);

					redirect(base_url().'admin');
				}else{
					redirect(base_url().'login?alert=gagal');
				}

			}else if($sebagai == "anggota"){
				$cek = $this->m_data->cek_login('anggota',$where)->num_rows();
				$data = $this->m_data->cek_login('anggota',$where)->row();

				if($cek > 0){
					$data_session = array(
						'id_anggota' => $data->id_anggota,
						'nm_anggota' => $data->nm_anggota,
						'username' => $data->username,
						'status' => 'anggota_login'
					);

					$this->session->set_userdata($data_session);

					redirect(base_url().'anggota');
				}else{
					redirect(base_url().'login?alert=gagal');
				}

			}
		}else{
			$this->load->view('v_login');
		}

	}
}
