<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

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
			$data['total_cart'] = $this->m_data->get_data_where('tb_cart', ("id_pembeli ='".$this->session->userdata('id_pembeli')."'"))->num_rows();
		} else {
			$data['total_cart']="";
		}
		
		
        //konfigurasi pagination
        $this->load->library('pagination');	
        $config['base_url'] = base_url().('pemesanan/index'); //site url
        $config['total_rows'] = $this->db->count_all('tb_pemesanan'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
     	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '>';
        $config['prev_link']        = '<';
        $config['full_tag_open']    = '<div class="row"><div class="col text-center"><div class="block-27"><ul>';
        $config['full_tag_close']   = '</ul></div></div></div>';
        $config['num_tag_open']     = '<li class="m-1">';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="active m-1"><span>';
        $config['cur_tag_close']    = '</span></li>';
        $config['next_tag_open']    = '<li class="m-1">';
        $config['next_tagl_close']  = '</li>';
        $config['prev_tag_open']    = '<li class="m-1">';
        $config['prev_tagl_close']  = '</li>';
        $config['first_tag_open']   = '<li class="m-1">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open']    = '<li class="m-1">';
        $config['last_tagl_close']  = '</li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['pemesanan'] = $this->m_data->get_data_pagination_where($config["per_page"], $data['page'], 'tb_pemesanan', ("id_pembeli ='".$this->session->userdata('id_pembeli')."'"));           
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('dashboard/v_navbar', $data);
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pemesanan', $data);
		$this->load->view('dashboard/v_footer');
	}

	function detail($id_pemesanan){
		$data['segment'] = $this->uri->segment(1);
        // Ambil Data Total Cart
        if ($this->session->userdata('status') == 'pembeli_login'){
			$data['total_cart'] = $this->m_data->get_data_where('tb_cart', ("id_pembeli ='".$this->session->userdata('id_pembeli')."'"))->num_rows();
		} else {
			$data['total_cart']="";
        }

		$data['detail_pemesanan'] = $this->m_data->get_pemesanan_detail($id_pemesanan);
		$data['id_pemesanan'] = $id_pemesanan;
		$data['pemesanan'] = $this->m_data->get_data_where("tb_pemesanan", "id_pemesanan = ".$id_pemesanan)->result();

        $this->load->view('dashboard/v_navbar', $data);
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_detail_pemesanan', $data);
		$this->load->view('dashboard/v_footer');
	}
	

}
?>