<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$data['segment'] = $this->uri->segment(1);

		$this->load->view('dashboard/v_navbar', $data);
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_beranda');
		$this->load->view('dashboard/v_footer');
	}

	public function tambah_keranjang($id_produk){
		$data = $this->m_data->get_data_where($id_produk, 'tb_produk')->result();

		
		// cek session yang login, jika session status tidak sama dengan session anggota_login,maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')!="pembeli_login"){
			$data['status'] = "Harus Login";
			redirect(base_url().'login');
			$this->load->view('v_login', $data);
		} else {
			foreach($data as $d){
				$data_input = array(
					'id_produk' => $d->id_produk	
				);
			}
	
			$this->m_data->insert_data($data_input,'tb_cart');

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
