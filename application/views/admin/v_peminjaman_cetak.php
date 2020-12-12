<!DOCTYPE html>
<html>
<head>
  <title>Cetak Laporan Peminjaman Buku</title>
</head>
<body>
  <?php 
    $tanggal_mulai = date("d M Y", strtotime($this->input->get('tanggal_mulai')));
    $tanggal_sampai = date("d M Y", strtotime($this->input->get('tanggal_sampai')));
  ?>
  <div>
    <label><h4><b>Laporan Tanggal : <?php echo $tanggal_mulai ." - ". $tanggal_sampai ?></b></h4></label>
  </div>

  <style type="text/css">
  table{
    border-collapse: collapse;
    background-color: azure; 
  }

  table th,td{
    border: 1px solid #000;
  }
</style>

<center>
  <h2>LAPORAN PEMINJAMAN & PENGEMBALIAN BUKU PERPUSTAKAAN SMACI</h2>
</center>

<table>
  <tr>
    <th width="1%">No</th>
    <th>Buku</th>
    <th>Peminjam</th>
    <th>Mulai Pinjam</th>
    <th>Pinjam Sampai</th>
    <th width="10%">Jumlah Peminjaman</th>
    <th width="10%">Kondisi Buku</th>
    <th>Tanggal Kembali</th>
    <th>Status</th>

  </tr>
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
       
      <?php 
                  $id_peminjaman = $p->id_peminjaman;
                  
                  $query = "SELECT `pengembalian`.* 
                            from `pengembalian` 
                              WHERE `pengembalian`.`id_peminjaman` = $id_peminjaman
                              group by `pengembalian`.`id_peminjaman`
                              ";
                              $link = $this->db->query($query)->result();
                   ?>

                    <?php foreach($link as $l) : ?>
                       <td><?php echo $p->kondisi_buku; ?></td>
                    <td><?php echo $l->tgl_pengembalian ?></td>
                    <td><?php echo $l->denda ?></td>
                   <?php endforeach; ?>
  </tr>
  <?php 
}
?>
</table>

<script type="text/javascript">
  window.print();
</script>

</body>
</html>