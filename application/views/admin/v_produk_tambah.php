<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Tambah Produk Baru</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'admin/produk' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>
      <?php 
          if(isset($_GET['alert'])){
            if($_GET['alert']=="1"){
              echo "<div class='alert alert-danger font-weight-bold text-center'>Gagal Upload</div>";
            }else if($_GET['alert']=="belum_login"){
              echo "<div class='alert alert-success font-weight-bold text-center'>Akun Sudah Dihapus</div>";
            }else if($_GET['alert']=="logout"){
              echo "<div class='alert alert-success font-weight-bold text-center'>ANDA TELAH LOGOUT!</div>";
            }
          } 
          ?>

      <form method="post" action="<?php echo base_url().'admin/produk_tambah_aksi'; ?>"enctype="multipart/form-data">
        <div class="form-group">
          <label class="font-weight-bold" for="nama">Nama Produk</label>
          <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama produk" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="ukuran">Ukuran</label>
          <input type="text" class="form-control" name="ukuran" placeholder="Masukkan Ukuran" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="harga">Harga</label>
          <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="stock">Stock</label>
          <input type="text" class="form-control" name="stock" placeholder="Masukkan stock" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="gambar"></label>
          <input type="file" class="form-control" name="gambar" placeholder="Masukkan Gambar" required="required">
        </div>
        <input type="submit" class="btn btn-primary" value="Simpan">
      </form>

    </div>
  </div>
</div>