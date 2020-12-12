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

	// buku
	function buku(){
		// mengambil data dari database
		$data['buku'] = $this->m_data->get_data('buku')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_buku',$data);
		$this->load->view('admin/v_footer');
	}
	// akhir buku

	function buku_tambah(){
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_buku_tambah');
		$this->load->view('admin/v_footer');
	}

	function admin_tambah_aksi(){
		$judul_buku = $this->input->post('judul_buku');
		$penulis = $this->input->post('penulis');
		$tahun = $this->input->post('tahun');
		$penerbit = $this->input->post('penerbit');
		$stock = $this->input->post('stock');

		$data = array(
			'judul_buku' => $judul_buku,
			'penulis' => $penulis,
			'tahun' => $tahun,
			'penerbit' => $penerbit,
			'stock' => $stock
		);

		// insert data ke database
		$this->m_data->insert_data($data,'buku');
		$this->session->set_flashdata('message','<div class="alert alert-primary" role="alert">
														 Buku Berhasil Ditambah..
														</div>');

		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'admin/buku');
	}

	function buku_edit($id_buku){
		$where = array('id_buku' => $id_buku);
		// mengambil data dari database sesuai id
		$data['buku'] = $this->m_data->edit_data($where,'buku')->result();
		$this->load->view('admin/v_header');
			$this->load->view('admin/v_buku_edit',$data);
		$this->load->view('admin/v_footer');
	}

	function buku_update(){
		$id_buku = $this->input->post('id_buku');
		$judul_buku = $this->input->post('judul_buku');
		$tahun = $this->input->post('tahun');
		$penulis = $this->input->post('penulis');
		$penerbit = $this->input->post('penerbit');
		$stock = $this->input->post('stock');

		$where = array(
			'id_buku' => $id_buku
		);

		$data = array(
			'judul_buku' => $judul_buku,
			'tahun' => $tahun,
			'penulis' => $penulis,
			'penerbit' => $penerbit,
			'stock' => $stock
		);

		// update data ke database
		$this->m_data->update_data($where,$data,'buku');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
														Update Sukses..
														</div>');

		// mengalihkan halaman ke halaman data buku
		redirect(base_url().'admin/buku');
	}

	function buku_hapus($id_buku){
		$where = array(
			'id_buku' => $id_buku
		);

		// menghapus data buku dari database sesuai id
		$this->m_data->delete_data($where,'buku');
		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
														Delete Sukses..
														</div>');

		// mengalihkan halaman ke halaman data buku
		redirect(base_url().'admin/buku');
	}


	// CRUD petugas
	function anggota(){
		// mengambil data dari database
		$data['anggota'] = $this->m_data->get_data('anggota')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_anggota',$data);
		$this->load->view('admin/v_footer');
	}

	function anggota_tambah(){
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_anggota_tambah');
		$this->load->view('admin/v_footer');
	}

	function anggota_tambah_aksi(){
		$nm_anggota = $this->input->post('nm_anggota');
		$nis = $this->input->post('nis');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$kelas= $this->input->post('kelas');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');



		$data = array(
			'nm_anggota' => $nm_anggota,
			'nis' => $nis,
			'username' => $username,
			'password' => md5($password),
			'kelas' => $kelas,
			'alamat' => $alamat,
			'no_telp' => $no_telp
		

		);

		// insert data ke database
		$this->m_data->insert_data($data,'anggota');
		// mengalihkan halaman ke halaman data anggota
		$this->session->set_flashdata('message','<div class="alert alert-primary" role="alert">
														Anggota Berhasil Ditambah..
														</div>');
		redirect(base_url().'admin/anggota');
	}

	function anggota_edit($id_anggota){
		$where = array('id_anggota' => $id_anggota);
		// mengambil data dari database sesuai id
		$data['anggota'] = $this->m_data->edit_data($where,'anggota')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_anggota_edit',$data);
		$this->load->view('admin/v_footer');
	}

	function anggota_update(){
		$id_anggota = $this->input->post('id_anggota');
		$nm_anggota = $this->input->post('nm_anggota');
		$nis = $this->input->post('nis');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$kelas = $this->input->post('kelas');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		
		$where = array(
			'id_anggota' => $id_anggota
		);

		// cek apakah form password di isi atau tidak
		if($password==""){
			$data = array(
				'nm_anggota' => $nm_anggota,
				'nis' =>$nis,
				'username' => $username,
				'kelas' => $kelas,
				'alamat' => $alamat,
				'no_telp' => $no_telp
			);

			// update data ke database
			$this->m_data->update_data($where,$data,'anggota');
		}else{
			$data = array(
				'nm_anggota' => $nm_anggota,
				'nis' => $nis,
				'username' => $username,
				'password' => md5($password),
				'kelas' => $kelas,
				'alamat' => $alamat,
				'no_telp' => $no_telp
			);

			// update data ke database
			$this->m_data->update_data($where,$data,'anggota');

		}

		// mengalihkan halaman ke halaman data anggota
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
														Update Sukses!
														</div>');
		redirect(base_url().'admin/anggota');
	}


	function anggota_hapus($id_anggota){
		$where = array(
			'id_anggota' => $id_anggota
		);

		// menghapus data anggota dari database sesuai id
		$this->m_data->delete_data($where,'anggota
');

		// mengalihkan halaman ke halaman data anggota
		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
														 Anggota Terhapus..
														</div>');
		redirect(base_url().'admin/anggota
');
	}

	// buku
	function peminjaman(){
		// mengambil data dari database
		$data['peminjaman'] = $this->db->query("select peminjaman.* ,buku.judul_buku, anggota.nm_anggota from peminjaman join buku on peminjaman.id_buku=buku.id_buku join anggota on peminjaman.id_anggota=anggota.id_anggota order by id_peminjaman desc")->result();
		// $data['peminjaman'] = $this->m_data->get_data('peminjaman')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_peminjaman',$data);
		$this->load->view('admin/v_footer');
	}

	function peminjaman_tambah(){
		// mengambil data buku yang berstatus 1 (tersedia) dari database
		$where = array('status'=>1);
		// $data['buku'] = $this->m_data->edit_data($where,'buku')->result();
		$data['buku'] = $this->db->get('buku')->result_array();
		// mengambil data anggota dari database
		// $data['anggota'] = $this->m_data->get_data('anggota')->result();
		$data['anggota'] = $this->db->get('anggota')->result_array();
		
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_peminjaman_tambah',$data);
		$this->load->view('admin/v_footer');
	}

	function peminjaman_tambah_aksi(){
		$id_buku = $this->input->post('id_buku');
		$id_anggota = $this->input->post('id_anggota');
		$tgl_peminjaman = $this->input->post('tgl_peminjaman');
		$tgl_bataspengembalian = $this->input->post('tgl_bataspengembalian');
		$jml_peminjaman = $this->input->post('jml_peminjaman');


		$data = array(
			'id_buku' => $id_buku,
			'id_anggota' => $id_anggota,
			'tgl_peminjaman' => $tgl_peminjaman,
			'tgl_bataspengembalian' => $tgl_bataspengembalian,
			'jml_peminjaman' => $jml_peminjaman

		);

		// $this->db->query("UPDATE buku SET buku.stock= buku.stock - $jml_peminjaman where buku.id_buku=$id_buku");

		// insert data ke database
		$this->m_data->insert_data($data,'peminjaman');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> 
												Peminjaman Berhasil Ditambah.. </div>');


		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'admin/pengembalian');
	}

	function peminjaman_batalkan($id_peminjaman, $id_buku){
		$this->db->delete('peminjaman',['id_peminjaman'=>$id_peminjaman]);
		
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> 
												Berhasil menghapus data ! </div>');

		// mengalihkan halaman ke halaman data buku
		redirect(base_url().'admin/pengembalian');
	}

	// buku
	function pengembalian(){
		// mengambil data dari database
		$data['peminjaman'] = $this->db->query("select peminjaman.* ,buku.judul_buku, anggota.nm_anggota, pengembalian.kondisi_buku from peminjaman join buku on peminjaman.id_buku=buku.id_buku join anggota on peminjaman.id_anggota=anggota.id_anggota left join pengembalian on peminjaman.id_peminjaman=pengembalian.id_peminjaman order by id_peminjaman desc")->result();
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
		$id_buku = $this->input->post('id_buku');
		$tgl_bataspengembalian = $this->input->post('tgl_bataspengembalian');
              $tgl_pengembalian = $this->input->post('tgl_pengembalian');
              $kondisi_buku = $this->input->post('kondisi_buku');
              

              if($tgl_bataspengembalian >= $tgl_pengembalian){
                $denda = 'Tidak Denda';
              } else{
                $denda = 'Denda Rp. 20000';
              }

		 $data = array(
			'id_peminjaman' => $this->input->post('id_peminjaman'),
			'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),
			'kondisi_buku'=> $this->input->post('kondisi_buku'),
			'denda' => $denda  	
		);	  	
		 // $this->db->query("UPDATE buku SET buku.stock= buku.stock + peminjaman.jml_peminjaman where buku.id_buku=$id_buku");    
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
			$data['peminjaman'] = $this->db->query("select * from peminjaman,buku,anggota, pengembalian where peminjaman.id_buku=buku.id_buku and peminjaman.id_anggota=anggota.id_anggota and peminjaman.id_peminjaman=pengembalian.id_peminjaman and date(tgl_peminjaman) >= '$mulai' and date(tgl_peminjaman) <= '$sampai' order by peminjaman.id_peminjaman desc")->result();	
		}else{
			//mengambil data peminjaman buku dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
			$data['peminjaman'] = $this->db->query("select * from peminjaman,buku,anggota, pengembalian where peminjaman.id_buku=buku.id_buku and peminjaman.id_anggota=anggota.id_anggota and peminjaman.id_peminjaman=pengembalian.id_peminjaman order by peminjaman.id_peminjaman desc")->result();	
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
			$data['peminjaman'] = $this->db->query("select * from peminjaman,buku,anggota, pengembalian where peminjaman.id_buku=buku.id_buku and peminjaman.id_anggota=anggota.id_anggota and peminjaman.id_peminjaman=pengembalian.id_peminjaman and date(tgl_peminjaman) >= '$mulai' and date(tgl_peminjaman) <= '$sampai' order by peminjaman.id_peminjaman desc")->result();	
			$this->load->view('admin/v_peminjaman_cetak',$data);
		}else{
			redirect(base_url().'admin/peminjaman');
		}
	}
	// akhir peminjaman
	

}
