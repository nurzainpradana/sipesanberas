<div class="container-fluid">
  <div class="card">
    <div class="card-header bg-primary text-center text-light">
      <h4>Data Peminjaman & Pengembalian Buku</h4>
    </div>
    <div class="card-body">
     <a href="<?php echo base_url().'admin/peminjaman_tambah' ?>" class='btn btn-sm btn-primary pull-left'><i class="fa fa-plus"></i> Peminjaman Baru</a>
     <div class="text-center">
     <?php echo $this->session->flashdata('message'); ?>
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
            <th width="8%">Opsi</th>
            <th>Kondisi Buku</th>
            <th width="10%">Tanggal Pengembalian</th>
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

              <td class="text-center">
                  <a href="<?php echo base_url().'admin/pengembalian_aksi/'.$p->id_peminjaman; ?>" class="btn btn-sm btn-warning"><i class="fa fa-check-square"></i></a>
                  <a href="<?php echo base_url().'admin/peminjaman_batalkan/'.$p->id_peminjaman.'/'.$p->id_buku; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash  "></i></a>
              </td>
              
  
                  <?php 
                  $id_peminjaman = $p->id_peminjaman;
                  
                  $query = "SELECT `pengembalian`.* 
                            from `pengembalian` 
                              WHERE `pengembalian`.`id_peminjaman` = $id_peminjaman
                              group by `pengembalian`.`id_peminjaman`";
                              $link = $this->db->query($query)->result();
                   ?>
                    <?php foreach($link as $l) : ?>
                    <td><?php echo $p->kondisi_buku;?></td>
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