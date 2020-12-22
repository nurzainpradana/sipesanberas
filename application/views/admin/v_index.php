<div class="container">
  <div class="jumbotron bg-muted text-center">
    <div class="col-sm-9 mx-auto">
     <div class="gambar text-center">
</div>
      <h1>Selamat Datang!</h5>
      <p> Di Aplikasi Perpustakaan SMA Negeri 1 Cibitung. </p>
      <p>
        Anda telah login sebagai <b><?php echo $this->session->userdata('username'); ?></b> [admin]. 
      </p>
       <div class="row">
    <div class="col-md-4">
      <div class="card bg-danger text-light">
        <div class="card-body">
          <h1>
            <?php echo $this->m_data->get_data('tb_produk')->num_rows(); ?>
            <div class="pull-right">
              
            <i class="fa fa-book"></i>
            </div>
          </h1>
          Jumlah Buku
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-warning text-light">
        <div class="card-body">
          <h1>
            <?php echo $this->m_data->get_data('tb_pembeli')->num_rows(); ?>
            <div class="pull-right">
              
            <i class="fa fa-users"></i>
            </div>
          </h1>
          Jumlah Anggota
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-success text-light">
        <div class="card-body">
          <h1>
            <?php echo $this->m_data->get_data('tb_pemesanan')->num_rows(); ?>
            <div class="pull-right">
              
            <i class="fa fa-book"></i>
            </div>
          </h1>
          Jumlah Total Peminjaman
        </div>
      </div>
    </div>
    </div>
  </div>
 
  </div>
  
  
</div>