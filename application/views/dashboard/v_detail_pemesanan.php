
    <div class="hero-wrap hero-bread" style="background-image: url('<?= base_url().'assets/images/bg_6.jpg' ?>');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url(); ?>">Toko Beras Sriwijaya</a></span></p>
            <h1 class="mb-0 bread">Detail Pemesanan</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 col-sm-12 ftco-animate">
    				<div class="cart-list">
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
								$total_cart += $p->subtotal;
								 ?>
						      <tr class="text-center">
								<td class="image-prod"><div class="img" style="background-image:url(<?= base_url().'assets/images/produk/'.$p->gambar ?>);"></div></td>

						        <td class="product-name">
						        	<h3><?= $p->nama ?></h3>
						        	<p><?= $p->ukuran ?></p>
						        </td>
						        
						        <td class="price"><?= "Rp. ".number_format($p->harga,2,',','.') ?></td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3 align-items-center justify-content-center">
										<span class="p-3 border"><?= $p->quantity ?></span>
					          	</div>
					          </td>
						        
						        <td class="total"><?= "Rp. ".number_format($p->subtotal,2,',','.') ?></td>
						      </tr><!-- END TR-->
							<?php } ?>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-start">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
						<?php foreach ($pemesanan as $pms) { ?>		
						<h3>Detail Pemesanan</h3>
						<p class="d-flex total-price">
    						<span>ID Pemesanan</span>
    						<span><?= $pms->id_pemesanan ?></span>
						</p>
						<p class="d-flex total-price">
    						<span>Tanggal Pemesanan</span>
    						<span><?= $pms->tgl_pemesanan ?></span>
						</p>
						<p class="d-flex total-price">
    						<span>Status</span>
    						<span><?= $pms->status ?></span>
						</p>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span><?= "Rp. ".number_format($pms->total,2,',','.') ?></span>
						</p>
						<hr>
						<div <?= (($pms->status) != "Menuggu Pembayaran") ? "" : "hidden";?> >
						<p class="d-flex" >
							<span><h5>Tata Cara Pembayaran</h5>
							<p>Silahkan transfer ke nomor rekening <br> <b>BCA : 1234567890 a.n Jemmi Harian Sapta</b> <br>
							Jika sudah, silahkan kirim bukti transfer melalui Whatsapp dengan mengklik tombol di bawah ini <br><br>
							<a href="https://wa.link/6x90if" class="btn btn-primary py-3 px-4" >Kirim Bukti Transfer</a>
							</span>
						</p>
						</div>
    					
						
						<?php } ?>
    				</div>
					
				</div>
    		</div>
			</div>
		</section>
		

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    
  </body>
</html>