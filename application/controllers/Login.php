<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$this->load->view('dashboard/v_header');
		$this->load->view('v_login');
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
				$cek = $this->m_data->cek_login('tb_admin',$where)->num_rows();
				$data = $this->m_data->cek_login('tb_admin',$where)->row();

				if($cek > 0){
					$data_session = array(
						'id_admin' => $data->id,
						'username' => $data->username,
						'nama' => $data->nama,
						'status' => 'admin_login'
					);

					$this->session->set_userdata($data_session);

					redirect(base_url().'admin');
				}else{
					redirect(base_url().'login?alert=gagal');
				}

			}else if($sebagai == "pembeli"){
				$cek = $this->m_data->cek_login('tb_pembeli',$where)->num_rows();
				$data = $this->m_data->cek_login('tb_pembeli',$where)->row();

				if($cek > 0){
					$data_session = array(
						'id_pembeli' => $data->id_anggota,
						'nama' => $data->nm_anggota,
						'username' => $data->username,
						'status' => 'pembeli_login'
					);

					$this->session->set_userdata($data_session);

					redirect(base_url());
				}else{
					redirect(base_url().'login?alert=gagal');
				}

			}
		}else{
			$this->load->view('v_login');
		}

	}
}
