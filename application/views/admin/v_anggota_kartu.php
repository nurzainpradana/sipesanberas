<!DOCTYPE html>
<html>
<head>
  <title>Cetak Kartu Anggota</title>
</head>
<body>

  <style type="text/css">
    .card{
      border: 1px solid #000;
      width: 450px;
    }

    .card-header{
      border-bottom: 1px solid #000;
      text-align: center;
      font-weight: bold;
      padding: 10px;
      background-color: gold;

    }

    .card-body{
      padding: 20px;
      background-color: aqua;
    }
  </style>

  <div class="card">
    <div class="card-header">
      KARTU ANGGOTA PERPUSTAKAAN SMACI
    </div>
    <div class="card-body">
      <div class="container">
        <table class="table table-borderless table-sm fs-2">
          <?php 
          $no = 1;
          foreach($anggota as $a){
            ?>
            <tr>
              <td width="18%">NIS</td>
              <td width="2%">:</td>
              <td><?php echo 10000+$a->nis; ?></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><?php echo $a->nm_anggota; ?></td>
            </tr>
            <tr>
              <td>Kelas</td>
              <td>:</td>
              <td><?php echo $a->kelas; ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><?php echo $a->alamat; ?></td>
            </tr>
              
            <?php 
          }
          ?>
        </table>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    window.print();
  </script>

</body>
</html>