<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_beranda');
		$this->load->view('dashboard/v_footer');
	}

	public function belanja(){
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_belanja');
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
