<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Proses Transaksi Peminjaman Buku</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'admin/peminjaman' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <form method="post" action="<?php echo base_url().'admin/peminjaman_tambah_aksi'; ?>">
        <div class="form-group">
          <label class="font-weight-bold" for="buku">Buku</label>
          <select name="id_buku" id="id_buku" class="form-control">
            <option hidden="hidden">- Pilih buku</option>
            <?php foreach($buku as $b){ ?>
              <option value="<?php echo $b['id_buku']; ?>"><?php echo $b['judul_buku'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="anggota">Anggota</label>
          <select name="id_anggota" class="form-control">
            <option hidden="hidden">- Pilih anggota</option>
            <?php foreach($anggota as $a){ ?>
              <option value="<?php echo $a['id_anggota']; ?>"><?php echo "Nama : ". $a['nm_anggota'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="tgl_peminjaman">Tanggal Mulai Pinjam</label>
          <input type="date" class="form-control" name="tgl_peminjaman" placeholder="Masukkan tanggal mulai pinjam">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="tgl_bataspengembalian">Tanggal Pinjam Sampai</label>
          <input type="date" class="form-control" name="tgl_bataspengembalian" placeholder="Masukkan tanggal pinjam sampai">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="jml_peminjaman">Jumlah Peminjaman</label>
          <input type="text" class="form-control" name="jml_peminjaman" placeholder="Masukkan jumlah buku">
        </div>
       <!--  <div class="form-group">
          <label class="font-weight-bold" for="kondisi_buku">Kondisi Buku</label>
          <input type="text" class="form-control" name="kondisi_buku" placeholder="Masukkan jumlah buku">
        </div> -->

        <input type="submit" class="btn btn-primary" value="Simpan">
      </form>

    </div>
  </div>
</div>