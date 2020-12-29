<!DOCTYPE html>
<html>
<head>
  <title>Login - SI Pesan Beras</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/custom.css' ?>">

  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js' ?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js' ?>"></script>
</head>
<body style="background-image: url(<?= base_url().'assets/images/bg_6.jpg' ?>); background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">

  <div class="container"> 

    <br/><br/>

    
      <br>


    <div class="col-md-5 offset-md-4">
      <div class="card mb-5">
        <div class="card-body">
          <?php 
          if(isset($_GET['alert'])){
            if($_GET['alert']=="gagal"){
              echo "<div class='alert alert-danger font-weight-bold text-center'>LOGIN GAGAL!</div>";
            }else if($_GET['alert']=="belum_login"){
              echo "<div class='alert alert-danger font-weight-bold text-center'>SILAHKAN LOGIN TERLEBIH DULU!</div>";
            }else if($_GET['alert']=="logout"){
              echo "<div class='alert alert-success font-weight-bold text-center'>ANDA TELAH LOGOUT!</div>";
            }
          } 
          ?>
          <h3 class="font-weight-normal text-center text">Toko Beras
          </h3>
          <h2 class="font-weight-normal text-center text mb-4"><b>Sriwijaya</b></h2>
          
          <h4 class="font-weight text-center mb-3 mt-0">LOGIN</h4>
          <div class="text-center">

      <?php echo $this->session->flashdata('message'); ?>
    </div>

          <!-- validasi error -->
          <?php echo validation_errors(); ?>

          <form method="post" action="<?php echo base_url().'login/login_aksi'; ?>">
            
              <div class="card-body p-1">
      
             <div class="form-group col-sm-12">
              
              <input name="username" type="text" class="form-control form-control-sm" placeholder="Masukkan username">
            </div>
            <div class="form-group col-sm-12">
              
              <input name="password" type="password" class="form-control form-control-sm" placeholder="Masukkan Password">
            </div>

            <div class="form-group col-sm-12">

              <label for="sebagai">Login Sebagai :</label>

              <select name="sebagai" class="form-control form-control-sm">
                <option value="pembeli">Pembeli</option>
                <option value="admin">Admin</option>
              </select>
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-black btn-md btn-primary">Login</button>
            <br>
            <a class="btn btn-sm mt-2 btn-md" href="<?= base_url().'registrasi' ?>">Daftar Akun</a>
          </div>
          
            <marquee class="mt-3 p-3" bgcolor="#FFFACD" scrolldelay="80">~ Silahkan Login Terlebih Dahulu ~</marquee>
                  </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>

</body>
</html>