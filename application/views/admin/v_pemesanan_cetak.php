
<div class="card">
    <div class="card-header text-center">
      <h4>Toko Beras Sriwijaya</h4>
      <h2>Invoice Pemesanan</h2>
    </div>
    <div class="card-body">
      
          <div class="table-responsive mt-3">
      <table class="table">
						    <tbody>
							<?php 
								foreach ($pemesanan as $p) {
								 ?>
						      <tr>
								    <td class="image-prod"width="20%"><b>ID Pemesanan<b></td>
						        <td class="product-name">
						        	<?= $p->id_pemesanan ?></br>
						        </td>
						      </tr>

                  <tr>
								    <td class="image-prod"width="20%"><b>Tanggal Pemesanan<b></td>
						        <td class="product-name">
						        	<?= $p->tgl_pemesanan ?></br>
						        </td>
						      </tr>

                  <tr>
                    <td class="image-prod"width="20%"><b>Nama Pembeli<b></td>
                    <td class="product-name">
                      <?= $p->nama ?></br>
                    </td>
                  </tr>

                  <tr>
                    <td class="image-prod"width="20%"><b>Alamat Pembeli<b></td>
                    <td class="product-name">
                      <?= $p->alamat ?></br>
                    </td>
                  </tr>

                  <tr>
                    <td class="image-prod"width="20%"><b>Nomor Telepon<b></td>
                    <td class="product-name">
                      <?= $p->no_telp ?></br>
                    </td>
                  </tr>

                  <tr>
                    <td class="image-prod"width="20%"><b>Total<b></td>
                    <td class="product-name">
                    <?= "Rp. ".number_format($p->total,2,',','.') ?>
                    </td>
                  </tr>
							<?php } ?>
						    </tbody>
						  </table>
      </div>

      <div class="table-responsive mt-3">
      <table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
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

<script type="text/javascript">
  window.print();
</script>
