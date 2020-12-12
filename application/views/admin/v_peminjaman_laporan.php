<div class="container-fluid">
  <div class="card">
    <div class="card-header bg-primary text-center text-light">
      <h4>Laporan Peminjaman Buku</h4>
    </div>
    <div class="card-body">

      <br/>

      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header text-center">
              <h6>Filter Berdasarkan Tanggal</h6>
            </div>
            <div class="card-body"> 

              <form method="get" action="">
                <div class="form-group">
                  <label class="font-weight-bold" for="tanggal_mulai">Tanggal Mulai Pinjam</label>
                  <input type="date" class="form-control" name="tanggal_mulai" placeholder="Masukkan tanggal mulai pinjam">
                </div>
                <div class="form-group">
                  <label class="font-weight-bold" for="tanggal_sampai">Tanggal Pinjam Sampai</label>
                  <input type="date" class="form-control" name="tanggal_sampai" placeholder="Masukkan tanggal pinjam sampai">
                </div>
                <input type="submit" class="btn btn-primary" value="Filter">
              </form>

            </div>
          </div>
        </div>
      </div>

      <br/>
      <?php 
      // membuat tombol cetak jika data sudah di filter
      if(isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])){
        $mulai = $_GET['tanggal_mulai'];
        $sampai = $_GET['tanggal_sampai'];
        ?>
        <a class='btn btn-primary' target="_blank" href='<?php echo base_url().'admin/peminjaman_cetak/?tanggal_mulai='.$mulai.'&tanggal_sampai='.$sampai ?>'><i class='fa fa-print'></i> CETAK</a>
        <?php
      }
      ?>
      <br/>
      <br/>

      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-datatable">
          <thead>
            <tr>
              <th width="1%">No</th>
              <th>Buku</th>
              <th>Peminjam</th>
              <th>Mulai Pinjam</th>
              <th>Pinjam Sampai</th>
              <th width="10%">Jumlah Peminjaman</th>
              <th>Kondisi Buku</th>
              <th width="10%">Tanggal Kembali</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach($peminjaman as $p){
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $p->judul_buku; ?></td>
                <td><?php echo $p->nm_anggota; ?></td>
                <td><?php echo date('d-m-Y',strtotime($p->tgl_peminjaman)); ?></td>
                <td><?php echo date('d-m-Y',strtotime($p->tgl_bataspengembalian)); ?></td>
                <td><?php echo $p->jml_peminjaman; ?></td>
                <td><?php echo $p->kondisi_buku; ?></td>
                <?php 
                  $id_peminjaman = $p->id_peminjaman;
                  
                  $query = "SELECT `pengembalian`.* 
                            from `pengembalian` 
                              WHERE `pengembalian`.`id_peminjaman` = $id_peminjaman
                              group by `pengembalian`.`id_peminjaman`";
                              $link = $this->db->query($query)->result();
    
                   ?>
                    <?php foreach($link as $l) : ?>
                    <td><?php echo $l->tgl_pengembalian ?></td>
                    <td><?php echo $l->denda ?></td>
                   <?php endforeach; ?>
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