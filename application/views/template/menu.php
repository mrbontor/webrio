<!-- HEADER -->
    <div class="header header-1">

    	<!-- TOPBAR -->
    	<div class="topbar d-none d-md-block">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-sm-8 col-md-10 col-lg-9">
						<div class="info">
							<div class="info-item">
								<i class="fa fa-phone"></i> <?php echo $setting->contact ?>
							</div>
							<div class="info-item">
								<i class="fa fa-envelop"></i> <?php echo $setting->email ?>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-md-2 col-lg-3">
						<div class="sosmed-icon pull-right d-inline-flex">
							<a href="#"><i class="fa fa-facebook"></i></a> 
							<a href="#"><i class="fa fa-twitter"></i></a> 
							<a href="#"><i class="fa fa-instagram"></i></a> 
							<a href="#"><i class="fa fa-linkedin"></i></a> 
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- NAVBAR SECTION -->
		<div class="navbar-main">
			<div class="container">
			    <nav id="navbar-example" class="navbar navbar-expand-lg">
			        <a class="navbar-brand" href="<?php echo base_url() ?>">
						<img src="<?php echo base_url()?>assets/images/logo.png" alt="">
					</a>
			        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			            <span class="navbar-toggler-icon"></span>
			        </button>
			        <div class="collapse navbar-collapse" id="navbarNavDropdown">
			            <ul class="navbar-nav ml-auto">
			            	<li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>">HOME</a></li>
			            	<li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>news">NEWS</a></li>
			            	<li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>contact">CONTACT</a></li>
			            	
			            </ul>
			            <!-- <a href="#" class="btn btn-primary btn-nav ml-auto">GET FREE QUOTE</a> -->
			        </div>
			    </nav>
		     	<!-- End Navbar -->
			</div>
		</div>

    </div>