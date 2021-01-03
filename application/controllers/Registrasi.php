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
				   'password' => md5($password));
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
		}else{
			redirect(base_url().'registrasi?alert=2');
		}
	}

}
?>