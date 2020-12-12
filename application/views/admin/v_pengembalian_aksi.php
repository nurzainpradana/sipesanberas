<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Proses Transaksi Peminjaman Buku</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'admin/pengembalian' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <form method="post" action="<?php echo base_url().'admin/pengembalian_aksi'.'/'.$id_peminjaman1; ?>">
        <div class="form-group">
          <input type="text" name="id_peminjaman" id="id_peminjaman" class="form-control" hidden readonly value="<?php echo $peminjaman['id_peminjaman'] ?>">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="tgl_peminjaman">Nama Buku</label>
          <input type="text" name="" class="form-control" readonly value="<?php echo $peminjaman['judul_buku'] ?>">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="tgl_peminjaman">Nama Anggota</label>
          <div class="form-group">
          <input type="text" name="" class="form-control"  readonly value="<?php echo $peminjaman['nm_anggota'] ?>">
        </div>
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="tgl_peminjaman">Tanggal Mulai Pinjam</label>
          <input type="date" class="form-control" readonly onkeyup="cek_denda()" id="tgl_peminjaman" name="tgl_peminjaman" value="<?php echo $peminjaman['tgl_peminjaman'] ?>" placeholder="Masukkan tanggal mulai pinjam">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="tgl_bataspengembalian">Tanggal Pinjam Sampai</label>
          <input type="date" class="form-control" readonly onkeyup="cek_denda()" id="tgl_bataspengembalian" name="tgl_bataspengembalian" value="<?php echo $peminjaman['tgl_bataspengembalian'] ?>" placeholder="Masukkan tanggal pinjam sampai">
        </div>

        <div class="form-group">
          <label class="font-weight-bold" for="tgl_bataspengembalian">Tanggal Kembali</label>
          <input type="date" class="form-control" name="tgl_pengembalian" id="tgl_pengembalian"  value="" placeholder="Masukkan tanggal pinjam sampai">
        </div>
        <div class="form-group">
        <label class="font-weight-bold for="kondisi_buku">Kondisi Buku</label>
            <select name="kondisi_buku" class="form-control">
                <option hidden="hidden">- Kondisi Buku</option>
                <option value="Bagus">Bagus</option>
                <option value="Rusak">Rusak</option>
            </select>
          </div>
      

        <!-- <?php $tgl_bataspengembalian = $this->input->post('tgl_bataspengembalian');
              $tgl_pengembalian = $this->input->post('tgl_pengembalian');
              if($tgl_bataspengembalian >= $tgl_pengembalian){
                $denda = 'tidak denda';
              } else{
                $denda = 'denda';
              } ?> -->

        <!-- <div class="form-group">
          <label class="font-weight-bold" for="">Status</label>
          <input type="text" class="form-control" value="" onkeyup="cek_denda()"  name="denda" id="denda" >
        </div> -->
        

        <input type="submit" class="btn btn-primary" value="Simpan">
      </form>

    </div>
  </div>
</div>