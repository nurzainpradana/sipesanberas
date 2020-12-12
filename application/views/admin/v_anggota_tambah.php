<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Tambah Anggota Baru</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'admin/anggota' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <form method="post" action="<?php echo base_url().'admin/anggota_tambah_aksi'; ?>">
        <div class="form-group">
          <label class="font-weight-bold" for="username">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Masukkan username" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Masukkan nama password" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="nama">Nama Anggota</label>
          <input type="text" class="form-control" name="nm_anggota" placeholder="Masukkan nama" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="nis">NIS</label>
          <input type="text" class="form-control" name="nis" placeholder="Masukkan nis" required="required">
        </div>

        <div class="form-group">
          <label class="font-weight-bold" for="kelas">Kelas</label>
          <input type="text" class="form-control" name="kelas" placeholder="Masukkan kelas" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="no_telp">Alamat</label>
          <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="email">No Telepon</label>
          <input type="text" class="form-control" name="no_telp" placeholder="Masukkan no telepon" required="required">
        </div>



        <input type="submit" class="btn btn-primary" value="Simpan">
      </form>

    </div>
  </div>
</div>