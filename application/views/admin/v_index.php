<div class="container">
  <div class="jumbotron bg-muted text-center">
    <div class="col-sm-9 mx-auto">
     <div class="gambar text-center">
</div>
      <h1>Selamat Datang!</h5>
      <p> Di Aplikasi Sistem Informasi Pesan Beras. <br> <h5> Toko Beras Sriwijaya </h5></p>
      
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
          Jumlah Produk
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
          Jumlah Pembeli
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
          Jumlah Pesanan
        </div>
      </div>
    </div>
    </div>
  </div>
 
  </div>
  
  
</div>