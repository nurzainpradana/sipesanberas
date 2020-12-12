<div class="container-fluid">
  <div class="card">
    <div class="card-header bg-primary text-center text-light">
      <h4>Daftar Buku</h4>
     
    </div>

    <div class="card-body">
      <div class="text-center">
      
      <?php echo $this->session->flashdata('message'); ?>
    </div>
     
      
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-datatable">
          <thead>
            <tr>
              <th width="1%">No</th>
              <th>Judul Buku</th>
              <th>Tahun Terbit</th>
              <th>Penulis</th>
              <th>Penerbit</th>
              <th width="10%">Stock</th>
              

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