
    <div class="hero-wrap hero-bread" style="background-image: url('<?= base_url().'assets/images/bg_6.jpg' ?>');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url(); ?>">Toko Beras Sriwijaya</a></span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-11 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
								<th>&nbsp;</th>
								<th>&nbsp;</th>
						        <th>Produk</th>
						        <th>Harga</th>
						        <th>Jumlah</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
							<?php foreach ($cart as $c) { 
								$total_cart += $c->subtotal; ?>
						      <tr class="text-center">
						        <td class="product-remove"><a href="<?= base_url().'cart/hapus_cart/'.$c->id_cart ?>"><span class="ion-ios-close"></span></a></td>
								
								<td class="image-prod"><div class="img" style="background-image:url(<?= base_url().'assets/images/produk/'.$c->gambar ?>);"></div></td>

						        <td class="product-name">
						        	<h3><?= $c->nama ?></h3>
						        	<p><?= $c->ukuran ?></p>
						        </td>
						        
						        <td class="price"><?= "Rp. ".number_format($c->harga,2,',','.') ?></td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
									<a href="<?= base_url().'cart/kurang_qty_cart/'.$c->id_cart ?>" class="btn-primary p-3">-</a>
									 <input type="text" name="quantity" class="quantity form-control input-number" value="<?= $c->quantity ?>" min="1" max="100" disabled>
									<a href="<?= base_url().'cart/tambah_qty_cart/'.$c->id_cart ?>" class="btn-primary p-3">+</a>
					          	</div>
					          </td>
						        
						        <td class="total"><?= "Rp. ".number_format($c->subtotal,2,',','.') ?></td>
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
    					<h3>Cart Totals</h3>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span><?= "Rp. ".number_format($total_cart,2,',','.') ?></span>
    					</p>
    				</div>
    				<p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
			</div>
		</section>
		

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    
  </body>
</html>