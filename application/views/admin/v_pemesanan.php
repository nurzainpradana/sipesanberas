<div class="container-fluid">
  <div class="card">
    <div class="card-header bg-primary text-center text-light">
      <h4>Data Pemesanan</h4>
    </div>
    <div class="card-body">
    
     <div class="text-center">
     <?php echo $this->session->flashdata('message'); ?>
     <br/>
     <br/>

     <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover table-datatable">
        <thead>
          <tr>
            <th width="1%">No</th>
            <th>ID</th>
            <th>Tanggal</th>
            <th>ID Pembeli</th>
            <th>Total</th>
            <th>Status</th>
            <th>Bukti Transfer</th>
            
            <th >Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          foreach($pemesanan as $p){
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $p->id_pemesanan; ?></td>
              <td><?php echo date('d-m-Y',strtotime($p->tgl_pemesanan)); ?></td>
              <td><?php echo $p->id_pembeli; ?></td>
              <td><?= "Rp. ".number_format($p->total,2,',','.') ?></td>
              <td><?php echo $p->status; ?></td>
              <td align="center">
              <div
                  <?= $p->bukti_pembayaran ==""? "hidden":"";?>>
		    					<img 
                  class="img" width="200px" src="<?= base_url().'assets/images/bukti_pembayaran/'.$p->bukti_pembayaran?>"> </td>
              </div>
              <td>
                      <a href="<?php echo base_url().'admin/pemesanan_edit/'.$p->id_pemesanan; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> </a>
                      <a href="<?php echo base_url().'admin/pemesanan_hapus/'.$p->id_pemesanan; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
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