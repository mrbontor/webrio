<!-- FOOTER SECTION -->
	<div class="footer">
		<div class="content-wrap pb-0">
			<div class="container">
				
				<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="footer-item">
							<img src="<?php echo base_url()?>assets/images/logo_w.png" alt="logo bottom" class="logo-bottom">
							<div class="spacer-30"></div>
							<p><?php echo $setting->bio ?></p>
							<div class="sosmed-icon icon-bg-primary d-inline-flex">
								<a href="#"><i class="fa fa-facebook"></i></a> 
								<a href="#"><i class="fa fa-twitter"></i></a> 
								<a href="#"><i class="fa fa-instagram"></i></a> 
								<a href="#"><i class="fa fa-pinterest"></i></a> 
								<a href="#"><i class="fa fa-linkedin"></i></a> 
							</div>
						</div>
					</div>					

					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								Contact Info
							</div>
							
							<div class="row mb-3">
								<div class="col-5">Address :</div>
								<div class="col-7"><?php echo $setting->address ?></div>
							</div>
							<div class="row mb-3">
								<div class="col-5">Office  :</div>
								<div class="col-7"><?php echo $setting->contact ?></div>
							</div>
							<div class="row mb-3">
								<div class="col-5">Email :</div>
								<div class="col-7"><?php echo $setting->email ?></div>
							</div>

						</div>
					</div>

					<div class="col-sm-6 col-md-6 col-lg-3">
						<div class="footer-item">
							<div class="footer-title">
								Opening Hours
							</div>
							
							<div class="row mb-3">
								<div class="col-5">Mon - Sat :</div>
								<div class="col-7">08:00 - 17:00</div>
							</div>							
						</div>
					</div>
					
					<div class="col-sm-6 col-md-6 col-lg-3">
						<img src="<?php echo base_url()?>assets/images/dummy-img-600x800.jpg" alt="" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
		
		<div class="fcopy">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<p class="ftex">Copyright <?php echo date('Y') ?> &copy; <span class="color-primary"><?php echo $setting->title ?></span>. Develop by <span class="color-primary">Mr. Bontor</span></p> 
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
	<!-- JS VENDOR -->
	<script src="<?php echo base_url()?>assets/js/vendor/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/vendor/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/vendor/owl.carousel.js"></script>
	<script src="<?php echo base_url()?>assets/js/vendor/jquery.magnific-popup.min.js"></script>

	<!-- SENDMAIL -->
	<script src="<?php echo base_url()?>assets/js/vendor/validator.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/vendor/form-scripts.js"></script>

	<script src="<?php echo base_url()?>assets/js/script.js"></script>

</body>
</html>