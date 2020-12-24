

    <div class="hero-wrap hero-bread" style="background-image: url('<?php echo base_url().'assets/images/bg_6.jpg'?>');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Toko Beras Sriwijaya</span></p>
            <h1 class="mb-0 bread">Produk Kami</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">
                    <?php foreach($produk->result() as $p){ ?>
		    			<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
		    				<div class="product d-flex flex-column">
		    					<a href="#" class="img-prod h-55"><img class="img-fluid" src="<?= base_url().'assets/images/produk/'.$p->gambar?>" alt="Colorlib Template">
		    						<div class="overlay"></div>
                                </a>
		    					<div class="text py-3 pb-4 px-3">
		    						<div class="d-flex">
			    					</div>
		    						<h3><a href="#"><?= $p->nama ?></a></h3>
		    						<div class="pricing">
                                        <p class="price"><span><?= "Rp. ".number_format($p->harga,2,',','.') ?></span> <br> 
                                        <?= $p->ukuran ?>
                                        </p>
			    					</div>
			    					<p class="bottom-area d-flex px-3">
		    							<a href="<?php echo base_url()."dashboard/tambah_keranjang/".$p->id_produk; ?>" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
		    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
		    						</p>
                                </div>
                                
		    				</div>
		    			</div>
		    			<?php } ?>
		    		</div>
		    		<div class="row mt-1">
		        </div>
				

				<?php echo $pagination; ?>
				<!-- <div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
						
					   
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div> -->

				

		    	</div>

		    	<div class="col-md-4 col-lg-2">
		    		<div class="sidebar">
							<div class="sidebar-box-2">
								<h2 class="heading">Cari Produk</h2>
								<form method="post" class="colorlib-form-2" action="<?php echo base_url().'belanja/cari'; ?>">
		              <div class="row">
		                <div class="col-md-12">
		                  <div class="form-group">
		                    <label for="guests">Nama Produk :</label>
		                    <div class="form-field">
		                      <i class="icon icon-arrow-down3"></i>
                                 <input name="nama_produk" id="nama_produk" class="form-control">
                                 <input class="btn btn-black py-2 px-5 mr-2 mt-3" type="submit" value="Cari"/>
                                </input>
		                    </div>
		                  </div>
		                </div>
		                </div>
		              </div>
		            </form>
							</div>
						</div>
    			</div>
    		</div>
    	</div>
    </section>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>