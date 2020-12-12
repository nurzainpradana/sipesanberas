<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Edit Anggota</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'admin/anggota' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <?php foreach($anggota as $p){ ?>
        <form method="post" action="<?php echo base_url().'admin/anggota_update'; ?>">
          <div class="form-group">
            <label class="font-weight-bold" for="nama">Nama Anggota</label>
            <input type="hidden" value="<?php echo $p->id_anggota; ?>" name="id_anggota">
            <input type="text" class="form-control" name="nm_anggota" placeholder="Masukkan nama anggota" required="required" value="<?php echo $p->nm_anggota; ?>">
          </div>

          <div class="form-group">
            <label class="font-weight-bold" for="nis">NIS</label>
            <input type="text" class="form-control" name="nis" placeholder="Masukkan nis anggota" required="required" value="<?php echo $p->nis; ?>">
          </div>
           
          <div class="form-group">
            <label class="font-weight-bold" for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Masukkan username" required="required" value="<?php echo $p->username; ?>">
          </div>

          <div class="form-group">
            <label class="font-weight-bold" for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan password">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="kelas">Kelas</label>
            <input type="text" class="form-control" name="kelas" placeholder="Masukkan kelas anggota" required="required" value="<?php echo $p->kelas; ?>">
          </div>

          <div class="form-group">
            <label class="font-weight-bold" for="email">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat" required="required" value="<?php echo $p->alamat; ?>">
          </div>

          <div class="form-group">
            <label class="font-weight-bold" for="no_telp">No Telepon</label>
            <input type="text" class="form-control" name="no_telp" placeholder="Masukkan no telepon" required="required" value="<?php echo $p->no_telp; ?>">
          </div>
         
          <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
      <?php } ?>

    </div>
  </div>
</div>