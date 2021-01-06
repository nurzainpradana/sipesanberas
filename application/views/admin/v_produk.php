<div class="container-fluid">
  <div class="card">
    <div class="card-header bg-primary text-center text-light">
      <h4>Data produk</h4>
     
    </div>

    <?php 
          if(isset($_GET['alert'])){
            if($_GET['alert']=="1"){
              echo "<div class='alert alert-success font-weight-bold text-center'>Produk Berhasil Ditambah</div>";
            }else if($_GET['alert']=="2"){
              echo "<div class='alert alert-success font-weight-bold text-center'>Produk Berhasil Dihapus</div>";
            }else if($_GET['alert']=="logout"){
              echo "<div class='alert alert-success font-weight-bold text-center'>ANDA TELAH LOGOUT!</div>";
            }
          } 
          ?>

    <div class="card-body">
      <div class="text-center">
      
      <?php echo $this->session->flashdata('message'); ?>
    </div>
      <a href="<?php echo base_url().'admin/produk_tambah' ?>" class='btn btn-sm btn-primary pull-left'>
      <i class="fa fa-plus"></i> produk Baru</a>
      <br/>
      <br/>
      
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-datatable">
          <thead>
            <tr>
              <th width="1%">No</th>
              <th>ID</th>
              <th>Gambar</th>
              <th>Nama</th>
              <th>Ukuran</th>
              <th>Harga</th>
              <th width="7%">Stock</th>
              <th width="7%">Opsi</th>

            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach($produk as $b){
              ?>
              <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td align="center">
		    					<img class="img" width="200px" src="<?= base_url().'assets/images/produk/'.$b->gambar?>"> </td>
                <td align="center"><?php echo $b->gambar; ?></td>
                <td align="center"><?php echo $b->nama; ?></td>
                <td align="center"><?php echo $b->ukuran; ?></td>
                <td align="center"><?php echo $b->harga; ?></td>
                <td align="center"><?php echo $b->stock; ?>
                  
                </td>
                <td>
                      <a href="<?php echo base_url().'admin/produk_edit/'.$b->id_produk; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> </a>
                      <a href="<?php echo base_url().'admin/produk_hapus/'.$b->id_produk; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
                </td>
              </tr>
              <?php 
            }
            ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>