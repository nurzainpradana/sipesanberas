<div class="container-fluid">
  <div class="card">
    <div class="card-header bg-primary text-center text-light">
      <h4>Daftar Peminjaman Buku</h4>
    </div>

    <div class="card-body"> 

     <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover table-datatable">
        <thead>
          <tr>
            <th width="1%">No</th>
            <th>Buku</th>
            <th>Peminjam</th>
            <th>Mulai Pinjam</th>
            <th>Pinjam Sampai</th>
            
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