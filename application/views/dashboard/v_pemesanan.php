
    <div class="hero-wrap hero-bread" style="background-image: url('<?= base_url().'assets/images/bg_6.jpg' ?>');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url(); ?>">Toko Beras Sriwijaya</a></span></p>
            <h1 class="mb-0 bread">Pemesananan Saya</h1>
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
						        <th>ID Pemesanan</th>
						        <th>Tanggal</th>
						        <th>Total</th>
						        <th>Status</th>
						      </tr>
						    </thead>
						    <tbody>
							<?php 
								foreach ($pemesanan->result() as $p) { 
								 ?>
						      <tr class="text-center">
						        <td>
						        	<a href="<?= base_url().'pemesanan/detail/'.$p->id_pemesanan ?>" class="btn-primary p-3 text-white"><?= $p->id_pemesanan ?></a>
						        </td>
						        
						        <td ><?= $p->tgl_pemesanan ?></td>
						        
						        <td><?= "Rp. ".number_format($p->total,2,',','.') ?></td>
						        
						        <td><?= $p->status ?></td>
						      </tr><!-- END TR-->
							<?php } ?>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
			</div>
		</section>
		

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    
  </body>
</html>