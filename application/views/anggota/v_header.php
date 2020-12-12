<!DOCTYPE html>
<html>
<head>
  <title>Anggota - Program Aplikasi Perpustakaan</title>
  <!-- css bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">

  <!-- css datatables -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/DataTables/datatables.css' ?>">

  <!-- icon font awesome -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/awesome/css/font-awesome.css' ?>">

  <!-- jquery dan bootstrap js -->
  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js' ?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js' ?>"></script>
  
  <!-- js datatables -->
  <script type="text/javascript" src="<?php echo base_url().'assets/DataTables/datatables.js' ?>"></script>
</head>
<body style="background-image: url(assets/img/ppr.jpg); background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo base_url().'anggota'; ?>"><b>Aplikasi</b>Perpustakaan</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'anggota'; ?>"><i class="fa fa-home"></i> Menu Utama</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'anggota/buku'; ?>"><i class="fa fa-book"></i> Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'anggota/peminjaman'; ?>"><i class="fa fa-calendar"></i> Peminjaman</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'anggota/buku'; ?>"><i class="fa fa-book"></i> Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'anggota/peminjaman_laporan'; ?>"><i class="fa fa-book"></i> Laporan Peminjaman</a>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo base_url().'anggota/ganti_password' ?>" class="nav-link"><i class="fa fa-lock"></i> Ganti Password</a>
          </li>
        </ul>

        <span class="navbar-text mr-3 text-center">
          Hallo, <?php echo $this->session->userdata('username'); ?> [Anggota]
        </span>

        <a href="<?php echo base_url().'anggota/logout' ?>"class="btn btn-outline-light ml-1"><i class="fa fa-power-off"></i> Logout</a>

      </div>
    </div>
  </nav>

  <br/>
  <br/> 