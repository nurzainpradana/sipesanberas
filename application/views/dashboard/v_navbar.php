<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Toko Beras Sriwijaya</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
	          <li class="nav-item <?php echo ($segment == "") ? "active" : "";?>" ><a href="<?php echo base_url(); ?>" class="nav-link">Beranda</a></li>
	          <li class="nav-item <?php echo ($segment == "belanja") ? "active" : "";?>"><a href="<?php echo base_url().'belanja'; ?>" class="nav-link">Belanja</a></li>
			  <li class="nav-item"><a href="blog.html" class="nav-link">Transaksi</a></li>
	          <li class="nav-item" <?php echo ($this->session->userdata('status')!="pembeli_login") ? "hidden" : "active";?>>
			  	<a href="contact.html" class="nav-link">Hi!, <?php echo $this->session->userdata('username')?></a>
			  </li>
	          <li class="nav-item cta cta-colored <?php echo ($segment == "cart") ? "active" : "";?>" <?php echo ($total_cart == "") ? "hidden" : "";?>><a href="<?php echo base_url().'cart'; ?>" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo $total_cart ?>]</a></li>
			  <li class="nav-item" <?php echo ($this->session->userdata('status')=="pembeli_login") ? "hidden" : "active";?>>
			  <a href="<?php echo base_url().'login'; ?>" class="nav-link">Login</a></li>
			  <li class="nav-item" <?php echo ($this->session->userdata('status')!="pembeli_login") ? "hidden" : "active";?>>
			  <a href="<?php echo base_url().'dashboard/logout'; ?>" class="nav-link">Logout</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->