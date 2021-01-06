<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();

		// cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')!="admin_login"){
			redirect(base_url().'login?alert=belum_login');
		}
	}

	function index(){
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_index');
		$this->load->view('admin/v_footer');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'login?alert=logout');
	}

	function ganti_password(){
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_ganti_password');
		$this->load->view('admin/v_footer');
	}

	function ganti_password_aksi(){
		$baru = $this->input->post('password_baru');
		$ulang = $this->input->post('password_ulang');

		$this->form_validation->set_rules('password_baru','Password Baru','required|matches[password_ulang]');
		$this->form_validation->set_rules('password_ulang','Ulangi Password','required');

		if($this->form_validation->run()!=false){
			$id = $this->session->userdata('id_admin');

			$where = array('id_admin' => $id_admin);

			$data = array('password' => md5($baru));

			$this->m_data->update_data($where,$data,'admin');

			redirect(base_url().'admin/ganti_password/?alert=sukses');

		}else{
			$this->load->view('admin/v_header');
			$this->load->view('admin/v_ganti_password');
			$this->load->view('admin/v_footer');
		}

	}

	// Produk
	function produk(){
		// mengambil data dari database
		$data['produk'] = $this->m_data->get_data('tb_produk')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_produk',$data);
		$this->load->view('admin/v_footer');
	}
	// akhir produk

	function produk_tambah(){
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_produk_tambah');
		$this->load->view('admin/v_footer');
	}

	function produk_tambah_aksi(){
		$nama = $this->input->post('nama');
		$ukuran = $this->input->post('ukuran');
		$harga = $this->input->post('harga');
		$stock = $this->input->post('stock');
		//$gambar = $this->input->post('gambar');


		$data = array(
			'nama' => $nama,
			'ukuran' => $ukuran,
			'harga' => $harga,
			'stock' => $stock
		);

		
        if (!empty($_FILES['gambar']['name'])) {
            $image = $this->_do_upload($nama);
            $data['gambar'] = $image;
        }
        
		// insert data ke database
		$this->m_data->insert_data($data,'tb_produk');

		$this->session->set_flashdata('message','<div class="alert alert-primary" role="alert">
														 Produk Berhasil Ditambah..
														</div>');

		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'admin/produk');
	}

	function produk_edit($id_produk){
		$where = array('id_produk' => $id_produk);
		// mengambil data dari database sesuai id
		$data['produk'] = $this->m_data->edit_data($where,'tb_produk')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_produk_edit',$data);
		$this->load->view('admin/v_footer');
	}

	function produk_update(){
		$id_produk = $this->input->post('id_produk');
		$nama = $this->input->post('nama');
		$ukuran = $this->input->post('ukuran');
		$harga = $this->input->post('harga');
		$stock = $this->input->post('stock');
		$gambar_lama = $this->input->post('gambar_lama');


		$data = array(
			'nama' => $nama,
			'ukuran' => $ukuran,
			'harga' => $harga,
			'stock' => $stock
		);

		
        if (!empty($_FILES['gambar']['name'])) {
            $image = $this->_do_upload($nama);
            $data['gambar'] = $image;
        } else {
			$data['gambar'] = $gambar_lama;
		}

		$where = array(
			'id_produk' => $id_produk
		);
        
		// insert data ke database
		$this->m_data->update_data($where, $data,'tb_produk');

		$this->session->set_flashdata('message','<div class="alert alert-primary" role="alert">
														 Produk Berhasil Diubah..
														</div>');

		echo $id_produk.$nama;
		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'admin/produk');

	}

	function produk_hapus($id_produk){
		$this->m_data->delete_data("id_produk='".$id_produk."'",'tb_produk');
		redirect(base_url().'admin/produk?alert=2');
	}


	// CRUD petugas
	function pembeli(){
		// mengambil data dari database
		$data['pembeli'] = $this->m_data->get_data('tb_pembeli')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_pembeli',$data);
		$this->load->view('admin/v_footer');
	}

	function pembeli_resetpassword($id_pembeli){
		//Reset Password (Default 123456)
		$data = array(
			'password' => 'e10adc3949ba59abbe56e057f20f883e'
		);
		$this->m_data->update_data("id_pembeli='".$id_pembeli."'",$data,'tb_pembeli');
		redirect(base_url().'admin/pembeli?alert=1');
	}

	function pembeli_hapus($id_pembeli){
		$this->m_data->delete_data("id_pembeli='".$id_pembeli."'",'tb_pembeli');
		redirect(base_url().'admin/pembeli?alert=2');
	}
	// produk
	function pemesanan(){
		// mengambil data dari database
		// $data['pemesanan'] = $this->db->query("select pemesanan.* ,produk.judul_produk, anggota.nm_anggota from pemesanan join produk on pemesanan.id_produk=produk.id_produk join anggota on pemesanan.id_anggota=anggota.id_anggota order by id_pemesanan desc")->result();
		if(isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])){
			$mulai = $this->input->get('tanggal_mulai');
			$sampai = $this->input->get('tanggal_sampai');
			//mengambil data pemesanan berdasarkan tanggal mulai sampai tanggal sampai
			$data['pemesanan'] = $this->m_data->get_data_where('tb_pemesanan',"'tgl_pemesanan' >= '".$mulai."' and 'tgl_pemesanan' <= '".$sampai."'")->result();	
		}else{
			//mengambil data pemesanan produk dari database | dan mengurutkan data dari id pemesanan terbesar ke terkecil (desc)
			
		$data['pemesanan'] = $this->m_data->get_data('tb_pemesanan')->result();
		}
		
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_pemesanan',$data);
		$this->load->view('admin/v_footer');
	}

	function pemesanan_edit($id_pemesanan){
		$where = array('id_pemesanan' => $id_pemesanan);
		// mengambil data dari database sesuai id
		
		$data['detail_pemesanan'] = $this->m_data->get_pemesanan_detail($id_pemesanan);
		$data['id_pemesanan'] = $id_pemesanan;
		$data['pemesanan'] = $this->m_data->get_pemesanan_admin($id_pemesanan);
		
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_pemesanan_edit',$data);
		$this->load->view('admin/v_footer');
	}

	function pemesanan_update(){
		$id_pemesanan = $this->input->post('id_pemesanan');
		$status = $this->input->post('status');
		$bukti_pembayaran_lama = $this->input->post('bukti_pembayaran_lama');
		$bukti_pembayaran = $this->input->post('bukti_pembayaran');

		if ($bukti_pembayaran == null){
			$bukti_pembayaran = $bukti_pembayaran_lama;
		}
		$data = array(
			'status' => $status,
		);
		
	
        if (!empty($_FILES['bukti_pembayaran']['name'])) {
            $image = $this->_do_upload_2($id_pemesanan);
            $data['bukti_pembayaran'] = $image;
        } else {
			$data['bukti_pembayaran'] = $bukti_pembayaran_lama;
		}


		$where = array(
			'id_pemesanan' => $id_pemesanan
		);
        
		// insert data ke database
		$this->m_data->update_data($where, $data,'tb_pemesanan');

		$this->session->set_flashdata('message','<div class="alert alert-primary" role="alert">
														 Produk Berhasil Diubah..
														</div>');

		
		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'admin/pemesanan');

	}

	function pemesanan_tambah_aksi(){
		$id_produk = $this->input->post('id_produk');
		$id_anggota = $this->input->post('id_anggota');
		$tgl_pemesanan = $this->input->post('tgl_pemesanan');
		$tgl_bataspengembalian = $this->input->post('tgl_bataspengembalian');
		$jml_pemesanan = $this->input->post('jml_pemesanan');


		$data = array(
			'id_produk' => $id_produk,
			'id_anggota' => $id_anggota,
			'tgl_pemesanan' => $tgl_pemesanan,
			'tgl_bataspengembalian' => $tgl_bataspengembalian,
			'jml_pemesanan' => $jml_pemesanan

		);

		// $this->db->query("UPDATE produk SET produk.stock= produk.stock - $jml_pemesanan where produk.id_produk=$id_produk");

		// insert data ke database
		$this->m_data->insert_data($data,'pemesanan');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> 
												Pemesanan Berhasil Ditambah.. </div>');


		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'admin/pengembalian');
	}

	function pemesanan_batalkan($id_pemesanan, $id_produk){
		$this->db->delete('pemesanan',['id_pemesanan'=>$id_pemesanan]);
		
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> 
												Berhasil menghapus data ! </div>');

		// mengalihkan halaman ke halaman data produk
		redirect(base_url().'admin/pengembalian');
	}

	// produk
	function pengembalian(){
		// mengambil data dari database
		$data['pemesanan'] = $this->db->query("select pemesanan.* ,produk.judul_produk, anggota.nm_anggota, pengembalian.kondisi_produk from pemesanan join produk on pemesanan.id_produk=produk.id_produk join anggota on pemesanan.id_anggota=anggota.id_anggota left join pengembalian on pemesanan.id_pemesanan=pengembalian.id_pemesanan order by id_pemesanan desc")->result();
		// $data['pemesanan'] = $this->m_data->get_data('pemesanan')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_pengembalian',$data);
		$this->load->view('admin/v_footer');
	}

	function pengembalian_aksi($id_pemesanan){
		$data['id_pemesanan1'] = $id_pemesanan;
		$data['pemesanan'] = $this->m_data->c_pemesanan($id_pemesanan);
		

		

		$this->form_validation->set_rules('id_pemesanan', 'id_pemesanan', 'required');
if($this->form_validation->run() == false){
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_pengembalian_aksi',$data);
		$this->load->view('admin/v_footer');
	}else{
		$id_produk = $this->input->post('id_produk');
		$tgl_bataspengembalian = $this->input->post('tgl_bataspengembalian');
              $tgl_pengembalian = $this->input->post('tgl_pengembalian');
              $kondisi_produk = $this->input->post('kondisi_produk');
              

              if($tgl_bataspengembalian >= $tgl_pengembalian){
                $denda = 'Tidak Denda';
              } else{
                $denda = 'Denda Rp. 20000';
              }

		 $data = array(
			'id_pemesanan' => $this->input->post('id_pemesanan'),
			'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),
			'kondisi_produk'=> $this->input->post('kondisi_produk'),
			'denda' => $denda  	
		);	  	
		 // $this->db->query("UPDATE produk SET produk.stock= produk.stock + pemesanan.jml_pemesanan where produk.id_produk=$id_produk");    
		// insert data ke database
		$this->m_data->insert_data($data,'pengembalian');
		// $this->db->delete('pemesanan',['id_pemesanan'=>$id_pemesanan]);

		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'admin/pengembalian');

	}

	}

	function anggota_kartu($id_anggota){
		$where = array('id_anggota' => $id_anggota);
		// mengambil data dari database sesuai id
		$data['anggota'] = $this->m_data->edit_data($where,'anggota')->result();
		$this->load->view('admin/v_anggota_kartu',$data);
	}
	


	// pemesanan
	function pemesanan_laporan(){
		if($_GET['tanggal_mulai']!=null&& $_GET['tanggal_sampai']!=null){
			$mulai = $this->input->get('tanggal_mulai');
			$sampai = $this->input->get('tanggal_sampai');
			//mengambil data pemesanan berdasarkan tanggal mulai sampai tanggal sampai
			$data['pemesanan'] = $this->db->query("select * from tb_pemesanan where tgl_pemesanan >= '".$mulai."' and tgl_pemesanan <= '".date($sampai)."'")->result();
		
		}else{
			//mengambil data pemesanan produk dari database | dan mengurutkan data dari id pemesanan terbesar ke terkecil (desc)
			$data['pemesanan'] = $this->db->get_pemesanan('tb_pemesanan');	
		}
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_pemesanan',$data);
		$this->load->view('admin/v_footer');
	}
	function pemesanan_laporan_cetak(){
		if($_GET['tanggal_mulai']!=null&& $_GET['tanggal_sampai']!=null){
			$mulai = $this->input->get('tanggal_mulai');
			$sampai = $this->input->get('tanggal_sampai');
			//mengambil data pemesanan berdasarkan tanggal mulai sampai tanggal sampai
			$data['pemesanan'] = $this->db->query("select * from tb_pemesanan where tgl_pemesanan >= '".$mulai."' and tgl_pemesanan <= '".date($sampai)."'")->result();
		
		}else{
			//mengambil data pemesanan produk dari database | dan mengurutkan data dari id pemesanan terbesar ke terkecil (desc)
			$data['pemesanan'] = $this->db->get_pemesanan('tb_pemesanan');	
		}
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_pemesanan_laporan_cetak',$data);
		$this->load->view('admin/v_footer');
	}

	function pemesanan_cetak($id_pemesanan){
		$where = array('id_pemesanan' => $id_pemesanan);
		// mengambil data dari database sesuai id
		
		$data['detail_pemesanan'] = $this->m_data->get_pemesanan_detail($id_pemesanan);
		$data['id_pemesanan'] = $id_pemesanan;
		$data['pemesanan'] = $this->m_data->get_pemesanan_admin($id_pemesanan);
		
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_pemesanan_cetak',$data);
		$this->load->view('admin/v_footer');
	}
	// akhir pemesanan

	private function _do_upload($nama)
    {
        $image_name = time().'_'.$nama;

        $config['upload_path'] 		= 'assets/images/produk/';
        $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
        $config['file_name'] 		= $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect(base_url().'admin/produk_tambah?alert=1');
        }
        return $this->upload->data('file_name');
	}
	
	private function _do_upload_2($nama)
    {
        $image_name = time().'_'.$nama;

        $config['upload_path'] 		= 'assets/images/bukti_pembayaran/';
        $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
        $config['file_name'] 		= $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_pembayaran')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            //redirect(base_url().'admin/pemesanan_edit?alert=1');
        }
        return $this->upload->data('file_name');
    }
	

}
