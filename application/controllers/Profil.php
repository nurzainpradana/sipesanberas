<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status')!="pembeli_login"){
			redirect(base_url().'login?alert=belum_login');
		}
	}

	public function index(){
		$current_id_pembeli = $this->session->userdata('id_pembeli');

		$data['segment'] = $this->uri->segment(1);
        // Ambil Data Profil
        if ($this->session->userdata('status') == 'pembeli_login'){
			$data['total_cart'] = $this->m_data->get_data_where('tb_cart', ("id_pembeli ='".$current_id_pembeli."'"))->num_rows();
		} else {
			$data['total_cart']="";
		}
		$data['profil'] = $this->m_data->get_data_where("tb_pembeli", "id_pembeli = ".$current_id_pembeli)->result();
		
        $this->load->view('dashboard/v_navbar', $data);
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_profil', $data);
		$this->load->view('dashboard/v_footer');
	}

	public function update(){
		$current_id_pembeli = $this->session->userdata('id_pembeli');

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
			// Check Password
			$checkpassword = $this->m_data->get_data_where("tb_pembeli", "id_pembeli = '".$current_id_pembeli."'")->result();
			foreach ($checkpassword as $c) {
				$old_password = $c->password;
				$old_username = $c->username;
			}

			if ($password == $old_password){
				$new_password = $password;
			} else {
				$new_password = md5($password);
			}
			
			if ($old_username == $username){
				$checkdatausername = 0;
			} else {
				$checkdatausername = $this->m_data->get_data_where("tb_pembeli", "username = '".$username."'")->num_rows();
			}

			if($checkdatausername == 0){
				$data_input = array(
					'nama' => $nama,
					'alamat' => $alamat,
					'no_telp' => $no_telp,
				   'email' => $email,
				   'username' => $username,
				   'password' => $new_password);
				   $this->m_data->update_data("id_pembeli='".$current_id_pembeli."'", $data_input,'tb_pembeli');
					redirect(base_url()."profil");
			} else {	
				redirect(base_url().'profil?alert=1');
			}
		}else{
			redirect(base_url().'profil?alert=2');
		}
	}

}
?>