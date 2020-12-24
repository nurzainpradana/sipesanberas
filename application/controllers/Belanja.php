<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	function __construct(){
		parent::__construct();
		
	}

	public function index(){
        $data['segment'] = $this->uri->segment(1);
        
        // Ambil Data Total Cart
        if ($this->session->userdata('status') == 'pembeli_login'){
			$data['total_cart'] = $this->m_data->get_data('tb_cart')->num_rows();
		} else {
			$data['total_cart']="";
		}

        //konfigurasi pagination
        $this->load->library('pagination');	
        $config['base_url'] = base_url().('belanja/index'); //site url
        $config['total_rows'] = $this->db->count_all('tb_produk'); //total row
        $config['per_page'] = 3;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
     	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '>';
        $config['prev_link']        = '<';
        $config['full_tag_open']    = '<div class="row mt-5"><div class="col text-center"><div class="block-27"><ul>';
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
        $data['produk'] = $this->m_data->get_data_pagination($config["per_page"], $data['page'], 'tb_produk');           
        $data['pagination'] = $this->pagination->create_links();
 
        //load view mahasiswa view
		$this->load->view('dashboard/v_navbar', $data);
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_belanja', $data);
		$this->load->view('dashboard/v_footer');
    }
    
    function cari() {
        $data['segment'] = $this->uri->segment(1);
        
        // Ambil Data Total Cart
        if ($this->session->userdata('status') == 'pembeli_login'){
			$data['total_cart'] = $this->m_data->get_data('tb_cart')->num_rows();
		} else {
			$data['total_cart']="";
        }
        
        
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //konfigurasi pagination
        $this->load->library('pagination');	
        $config['base_url'] = base_url().('belanja/cari/index'); //site url
        $config['per_page'] = 3;  //show record per halaman
        $config['total_rows'] = $this->m_data->get_data_pagination_like($config["per_page"], $data['page'], 'tb_produk', ($this->input->post('nama_produk')))->num_rows(); //total row  
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
     	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '>';
        $config['prev_link']        = '<';
        $config['full_tag_open']    = '<div class="row mt-5"><div class="col text-center"><div class="block-27"><ul>';
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
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['produk'] = $this->m_data->get_data_pagination_like($config["per_page"], $data['page'], 'tb_produk', ($this->input->post('nama_produk')));           
        $data['pagination'] = $this->pagination->create_links();
 
        //load view mahasiswa view
		$this->load->view('dashboard/v_navbar', $data);
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_belanja', $data);
		$this->load->view('dashboard/v_footer');
    }

}
?>