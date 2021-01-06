<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Edit Pemesanan</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'admin/pemesanan' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <?php foreach($pemesanan as $b){ ?>
        <form method="post" action="<?php echo base_url().'admin/pemesanan_update'; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label class="font-weight-bold" for="id_pemesanan">ID Pemesanan</label>
            <input type="text" class="form-control" value="<?php echo $b->id_pemesanan; ?>" name="id_pemesanan" readonly>
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="tgl_pemesanan">Tanggal Pemesanan</label>
            <input type="date" class="form-control" name="tgl_pemesanan" placeholder="Masukkan Nama Pemesanan" required="required" value="<?php echo $b->tgl_pemesanan; ?>"readonly>
          </div>
          <div class="form-group">  
            <label class="font-weight-bold" for="ukuran">Nama Pembeli</label>
            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pembeli" required="required" value="<?php echo $b->nama; ?>" readonly>
          </div>
          <div class="form-group">  
            <label class="font-weight-bold" for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Pembeli" required="required" value="<?php echo $b->alamat; ?>" readonly>
          </div>
          
          <div class="form-group">  
            <label class="font-weight-bold" for="no_telp">Nomor Telepon</label>
            <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No Telp Pembeli" required="required" value="<?php echo $b->no_telp; ?>" readonly>
          </div>
          <div class="form-group">  
            <label class="font-weight-bold" for="ukuran">Total</label>
            <input type="text" class="form-control" name="total" placeholder="Masukkan Ukuran" required="required" value="<?php echo $b->total; ?>" readonly>
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="status">Status</label>
            <select name="status" class="form-control">
                <option hidden="hidden">- Status -</option>
                <option value="Menunggu Pembayaran" <?= ($b->status)=="Menunggu Pembayaran"? "selected" : ""?>>Menunggu Pembayaran</option>
                <option value="Verifikasi Pembayaran" <?= ($b->status)=="Verifikasi Pembayaran"? "selected" : ""?>>Verifikasi Pembayaran</option>
                <option value="Pengiriman" <?= ($b->status)=="Pengiriman"? "selected" : ""?>>Pengiriman</option>
                <option value="Selesai" <?= ($b->status)=="Selesai"? "selected" : ""?>>Selesai</option>
                <option value="Dibatalkan" <?= ($b->status)=="Menunggu Pembayaran"? "selected" : ""?>>Dibatalkan</option>
            </select>
          </div>
           
          <div class="form-group" <?=$b->bukti_pembayaran==""?"hidden":""?>>
            <img class="img-fluid" width="300px" src="<?= base_url().'assets/images/bukti_pembayaran/'.$b->bukti_pembayaran?>">
            <br><br>
            <input type="text" class="form-control" name="bukti_pembayaran_lama" required="required" value="<?php echo $b->bukti_pembayaran; ?>" disabled >
           </div>

           <div class="form-group">
            <label class="font-weight-bold" for="bukti_pembayaran">Bukti Pembayaran</label>
            <input type="file" class="form-control" name="bukti_pembayaran" placeholder="Masukkan Bukti Pembayaran">
          </div>

          

          <input type="submit" class="btn btn-primary" value="Simpan">
          <a href="<?php echo base_url().'admin/pemesanan_cetak/'.$b->id_pemesanan; ?>" class="btn btn-md btn-warning">Cetak </a>
          <?php } ?>
          </form>

      <div class="table-responsive mt-3">
      <table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
								<th>Gambar</th>
						        <th>Produk</th>
						        <th>Harga</th>
						        <th>Jumlah</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
							<?php 
								foreach ($detail_pemesanan as $p) {
								 ?>
						      <tr class="text-center">
								<td class="image-prod"><img class="img" width="200px" src="<?= base_url().'assets/images/produk/'.$p->gambar?>"></td>

						        <td class="product-name">
						        	<p><?= $p->nama ?><br>
						        	<?= $p->ukuran ?></br>
						        </td>
						        
						        <td class="price"><?= "Rp. ".number_format($p->harga,2,',','.') ?></td>
						        
						        <td class="quantity">
										<p><?= $p->quantity ?></p>
					          </td>
						        
						        <td class="total"><?= "Rp. ".number_format($p->subtotal,2,',','.') ?></td>
						      </tr><!-- END TR-->
							<?php } ?>
						    </tbody>
						  </table>
      </div>
    </div>
  </div>
</div>