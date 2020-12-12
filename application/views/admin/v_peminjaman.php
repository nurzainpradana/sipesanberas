<div class="container-fluid">
  <div class="card">
    <div class="card-header bg-primary text-center text-light">
      <h4>Data Peminjaman Buku</h4>
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
            <th>Jumlah Peminjaman</th>
            
            <th width="16%">Opsi</th>
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

                
                  
                  <a href="<?php echo base_url().'admin/peminjaman_batalkan/'.$p->id_peminjaman.'/'.$p->id_buku; ?>" class="btn btn-sm btn-danger"><i class="fa fa-close"></i> Batalkan</a>
                  <?php 
                
                ?>
              </td>
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