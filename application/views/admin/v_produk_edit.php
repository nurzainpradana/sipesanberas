<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Edit Produk</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'admin/produk' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <?php foreach($produk as $b){ ?>
        <form method="post" action="<?php echo base_url().'admin/produk_update'; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label class="font-weight-bold" for="id_produk">ID Produk</label>
            <input type="text" class="form-control" value="<?php echo $b->id_produk; ?>" name="id_produk" readonly>
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="nama">Nama Produk</label>
            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Produk" required="required" value="<?php echo $b->nama; ?>">
          </div>
          <div class="form-group">  
            <label class="font-weight-bold" for="ukuran">Ukuran</label>
            <input type="text" class="form-control" name="ukuran" placeholder="Masukkan Ukuran" required="required" value="<?php echo $b->ukuran; ?>">
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="harga">Harga</label>
            <input type="number" class="form-control" name="harga" placeholder="Masukkan Harga" required="required" value="<?php echo $b->harga; ?>">
          </div>
           <div class="form-group">
            <label class="font-weight-bold" for="stock">Stock</label>
            <input type="number" class="form-control" name="stock" placeholder="Masukkan Stock" required="required" value="<?php echo $b->stock; ?>">
          </div>

           <div class="form-group">
            <img class="img-fluid" width="300px" src="<?= base_url().'assets/images/produk/'.$b->gambar?>">
            <br><br>
            <input type="text" class="form-control" name="gambar_lama" required="required" value="<?php echo $b->gambar; ?>" disabled >
           </div>

           <div class="form-group">
            <label class="font-weight-bold" for="stock">Gambar</label>
            <input type="file" class="form-control" name="gambar" placeholder="Masukkan gambar" value="<?php echo $b->gambar; ?>">
          </div>

          <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
      <?php } ?>

    </div>
  </div>
</div>