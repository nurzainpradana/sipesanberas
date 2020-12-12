<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Tambah Buku Baru</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'admin/buku' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <form method="post" action="<?php echo base_url().'admin/admin_tambah_aksi'; ?>">
        <div class="form-group">
          <label class="font-weight-bold" for="judul_buku">Judul Buku</label>
          <input type="text" class="form-control" name="judul_buku" placeholder="Masukkan judul buku" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="penulis">Penulis</label>
          <input type="text" class="form-control" name="penulis" placeholder="Masukkan penulis" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="tahun">Tahun</label>
          <input type="text" class="form-control" name="tahun" placeholder="Masukkan tahun" required="required">
        </div>
		<div class="form-group">
          <label class="font-weight-bold" for="penerbit">Penerbit</label>
          <input type="text" class="form-control" name="penerbit" placeholder="Masukkan penerbit" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="stock">Stock</label>
          <input type="text" class="form-control" name="stock" placeholder="Masukkan stock" required="required">
        </div>
        <input type="submit" class="btn btn-primary" value="Simpan">
      </form>

    </div>
  </div>
</div>