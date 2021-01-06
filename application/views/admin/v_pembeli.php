<div class="container-fluid">
  <div class="card">
    <div class="card-header bg-primary text-center text-light">
      <h4>Data Pembeli</h4>
     
    </div>

    <div class="card-body">
      <div class="text-center">
      
      <?php echo $this->session->flashdata('message'); ?>
    </div>
      <br/>
      <br/>
      <?php 
          if(isset($_GET['alert'])){
            if($_GET['alert']=="1"){
              echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Reset Password</div>";
            }else if($_GET['alert']=="belum_login"){
              echo "<div class='alert alert-success font-weight-bold text-center'>Akun Sudah Dihapus</div>";
            }else if($_GET['alert']=="logout"){
              echo "<div class='alert alert-success font-weight-bold text-center'>ANDA TELAH LOGOUT!</div>";
            }
          } 
          ?>
      
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-datatable">
          <thead>
          <tr>
          <th width="1%">No</th>
          <th width="1%">ID</th>
          <th>Nama</th>
          <th>No Telp</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>Username</th>
          <th width="10%">Opsi</th>
        </tr>
        </thead>
        <?php 
        $no = 1;
        foreach($pembeli as $a){
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $a->id_pembeli; ?></td>
            <td><?php echo $a->nama; ?></td>
            <td><?php echo $a->no_telp; ?></td>
            <td><?php echo $a->alamat; ?></td>
            <td><?php echo $a->email; ?></td>
            <td><?php echo $a->username; ?></td>
            <td>
              <a href="<?php echo base_url().'admin/pembeli_resetpassword/'.$a->id_pembeli; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> </a>
              <a href="<?php echo base_url().'admin/pembeli_hapus/'.$a->id_pembeli; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
            </td>
          </tr>
          <?php 
        }
        ?>
      </table>

    </div>
  </div>
</div>