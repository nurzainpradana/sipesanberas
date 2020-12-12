<div class="container-fluid">
  <div class="card">
    <div class="card-header bg-primary text-center text-light">
      <h4>Data Buku</h4>
     
    </div>

    <div class="card-body">
      <div class="text-center">
      
      <?php echo $this->session->flashdata('message'); ?>
    </div>
      <a href="<?php echo base_url().'admin/buku_tambah' ?>" class='btn btn-sm btn-primary pull-left'><i class="fa fa-plus"></i> Buku Baru</a>
      <br/>
      <br/>
      
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-datatable">
          <thead>
            <tr>
              <th width="1%">No</th>
              <th>Judul Buku</th>
              <th>Tahun Terbit</th>
              <th>Penulis</th>
              <th>Penerbit</th>
              <th width="7%">Stock</th>
              <th width="7%">Opsi</th>

            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach($buku as $b){
              ?>
              <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td align="center"><?php echo $b->judul_buku; ?></td>
                <td align="center"><?php echo $b->tahun; ?></td>
                <td align="center"><?php echo $b->penulis; ?></td>
                <td align="center"><?php echo $b->penerbit; ?></td>
                <td align="center"><?php echo $b->stock; ?>
                  
                </td>
                <td>
                      <a href="<?php echo base_url().'admin/buku_edit/'.$b->id_buku; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> </a>
                      <a href="<?php echo base_url().'admin/buku_hapus/'.$b->id_buku; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
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