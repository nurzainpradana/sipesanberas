<div class="container">
  <div class="card">
    <div class="card-header bg-primary text-center text-light">
      <h4>Data Anggota</h4>
    </div>
    <div class="card-body">
      <div class="text-center">

      <?php echo $this->session->flashdata('message'); ?>
    </div>
      <a href="<?php echo base_url().'admin/anggota_tambah' ?>" class='btn btn-sm btn-primary pull-left'><i class="fa fa-plus"></i> Anggota Baru</a>
      <br/>
      <br/>
      

      <table class="table table-bordered table-striped table-hover">
        <tr>
          <th width="1%">No</th>
          <th>Nama Anggota</th>
          <th>NIS</th>
          <th>Username</th>
          <th>Kelas</th>
          <th>Alamat</th>
          <th>No Telepon</th>
          <th width="13%">Opsi</th>
        </tr>
        <?php 
        $no = 1;
        foreach($anggota as $a){
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $a->nm_anggota; ?></td>
            <td><?php echo $a->nis; ?></td>
            <td><?php echo $a->username; ?></td>
            <td><?php echo $a->kelas; ?></td>
            <td><?php echo $a->alamat; ?></td>
            <td><?php echo $a->no_telp; ?></td>
            <td>
              <a href="<?php echo base_url().'admin/anggota_edit/'.$a->id_anggota; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> </a>
              <a href="<?php echo base_url().'admin/anggota_hapus/'.$a->id_anggota; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
              <a target="_blank" href="<?php echo base_url().'admin/anggota_kartu/'.$a->id_anggota; ?>" class="btn btn-sm btn-primary"><i class="fa fa-id-card"></i> </a>
            </td>
          </tr>
          <?php 
        }
        ?>
      </table>

    </div>
  </div>
</div>