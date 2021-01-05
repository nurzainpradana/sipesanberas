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
		$data['produk'] = $this->m_data->edit_data($where,'produk')->result();
		$this->load->view('admin/v_header');
			$this->load->view('admin/v_produk_edit',$data);
		$this->load->view('admin/v_footer');
	}

	function produk_update(){
		$id_produk = $this->input->post('id_produk');
		$judul_produk = $this->input->post('judul_produk');
		$tahun = $this->input->post('tahun');
		$penulis = $this->input->post('penulis');
		$penerbit = $this->input->post('penerbit');
		$stock = $this->input->post('stock');

		$where = array(
			'id_produk' => $id_produk
		);

		$data = array(
			'judul_produk' => $judul_produk,
			'tahun' => $tahun,
			'penulis' => $penulis,
			'penerbit' => $penerbit,
			'stock' => $stock
		);

		// update data ke database
		$this->m_data->update_data($where,$data,'produk');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
														Update Sukses..
														</div>');

		// mengalihkan halaman ke halaman data produk
		redirect(base_url().'admin/produk');
	}

	function produk_hapus($id_produk){
		$where = array(
			'id_produk' => $id_produk
		);

		// menghapus data produk dari database sesuai id
		$this->m_data->delete_data($where,'produk');
		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
														Delete Sukses..
														</div>');

		// mengalihkan halaman ke halaman data produk
		redirect(base_url().'admin/produk');
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
	function peminjaman(){
		// mengambil data dari database
		$data['peminjaman'] = $this->db->query("select peminjaman.* ,produk.judul_produk, anggota.nm_anggota from peminjaman join produk on peminjaman.id_produk=produk.id_produk join anggota on peminjaman.id_anggota=anggota.id_anggota order by id_peminjaman desc")->result();
		// $data['peminjaman'] = $this->m_data->get_data('peminjaman')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_peminjaman',$data);
		$this->load->view('admin/v_footer');
	}

	function peminjaman_tambah(){
		// mengambil data produk yang berstatus 1 (tersedia) dari database
		$where = array('status'=>1);
		// $data['produk'] = $this->m_data->edit_data($where,'produk')->result();
		$data['produk'] = $this->db->get('produk')->result_array();
		// mengambil data anggota dari database
		// $data['anggota'] = $this->m_data->get_data('anggota')->result();
		$data['anggota'] = $this->db->get('anggota')->result_array();
		
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_peminjaman_tambah',$data);
		$this->load->view('admin/v_footer');
	}

	function peminjaman_tambah_aksi(){
		$id_produk = $this->input->post('id_produk');
		$id_anggota = $this->input->post('id_anggota');
		$tgl_peminjaman = $this->input->post('tgl_peminjaman');
		$tgl_bataspengembalian = $this->input->post('tgl_bataspengembalian');
		$jml_peminjaman = $this->input->post('jml_peminjaman');


		$data = array(
			'id_produk' => $id_produk,
			'id_anggota' => $id_anggota,
			'tgl_peminjaman' => $tgl_peminjaman,
			'tgl_bataspengembalian' => $tgl_bataspengembalian,
			'jml_peminjaman' => $jml_peminjaman

		);

		// $this->db->query("UPDATE produk SET produk.stock= produk.stock - $jml_peminjaman where produk.id_produk=$id_produk");

		// insert data ke database
		$this->m_data->insert_data($data,'peminjaman');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> 
												Peminjaman Berhasil Ditambah.. </div>');


		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'admin/pengembalian');
	}

	function peminjaman_batalkan($id_peminjaman, $id_produk){
		$this->db->delete('peminjaman',['id_peminjaman'=>$id_peminjaman]);
		
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> 
												Berhasil menghapus data ! </div>');

		// mengalihkan halaman ke halaman data produk
		redirect(base_url().'admin/pengembalian');
	}

	// produk
	function pengembalian(){
		// mengambil data dari database
		$data['peminjaman'] = $this->db->query("select peminjaman.* ,produk.judul_produk, anggota.nm_anggota, pengembalian.kondisi_produk from peminjaman join produk on peminjaman.id_produk=produk.id_produk join anggota on peminjaman.id_anggota=anggota.id_anggota left join pengembalian on peminjaman.id_peminjaman=pengembalian.id_peminjaman order by id_peminjaman desc")->result();
		// $data['peminjaman'] = $this->m_data->get_data('peminjaman')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_pengembalian',$data);
		$this->load->view('admin/v_footer');
	}

	function pengembalian_aksi($id_peminjaman){
		$data['id_peminjaman1'] = $id_peminjaman;
		$data['peminjaman'] = $this->m_data->c_peminjaman($id_peminjaman);
		

		

		$this->form_validation->set_rules('id_peminjaman', 'id_peminjaman', 'required');
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
			'id_peminjaman' => $this->input->post('id_peminjaman'),
			'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),
			'kondisi_produk'=> $this->input->post('kondisi_produk'),
			'denda' => $denda  	
		);	  	
		 // $this->db->query("UPDATE produk SET produk.stock= produk.stock + peminjaman.jml_peminjaman where produk.id_produk=$id_produk");    
		// insert data ke database
		$this->m_data->insert_data($data,'pengembalian');
		// $this->db->delete('peminjaman',['id_peminjaman'=>$id_peminjaman]);

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
	


	// peminjaman
	function peminjaman_laporan(){
		if(isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])){
			$mulai = $this->input->get('tanggal_mulai');
			$sampai = $this->input->get('tanggal_sampai');
			//mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
			$data['peminjaman'] = $this->db->query("select * from peminjaman,produk,anggota, pengembalian where peminjaman.id_produk=produk.id_produk and peminjaman.id_anggota=anggota.id_anggota and peminjaman.id_peminjaman=pengembalian.id_peminjaman and date(tgl_peminjaman) >= '$mulai' and date(tgl_peminjaman) <= '$sampai' order by peminjaman.id_peminjaman desc")->result();	
		}else{
			//mengambil data peminjaman produk dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
			$data['peminjaman'] = $this->db->query("select * from peminjaman,produk,anggota, pengembalian where peminjaman.id_produk=produk.id_produk and peminjaman.id_anggota=anggota.id_anggota and peminjaman.id_peminjaman=pengembalian.id_peminjaman order by peminjaman.id_peminjaman desc")->result();	
		}
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_peminjaman_laporan',$data);
		$this->load->view('admin/v_footer');
	}

	function peminjaman_cetak(){
		if(isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])){
			$mulai = $this->input->get('tanggal_mulai');
			$sampai = $this->input->get('tanggal_sampai');
			//mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
			$data['peminjaman'] = $this->db->query("select * from peminjaman,produk,anggota, pengembalian where peminjaman.id_produk=produk.id_produk and peminjaman.id_anggota=anggota.id_anggota and peminjaman.id_peminjaman=pengembalian.id_peminjaman and date(tgl_peminjaman) >= '$mulai' and date(tgl_peminjaman) <= '$sampai' order by peminjaman.id_peminjaman desc")->result();	
			$this->load->view('admin/v_peminjaman_cetak',$data);
		}else{
			redirect(base_url().'admin/peminjaman');
		}
	}
	// akhir peminjaman

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
	

}
