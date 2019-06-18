<?php include 'template/header.php' ?>
	
	<!-- BANNER -->
	<div class="section banner-page" data-background="<?php echo base_url() ?>assets/images/dummy-img-1920x300.jpg">
		<div class="content-wrap pos-relative">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="d-flex bd-highlight mb-3">
							<div class="title-page">News</div>
						</div>
						<div class="d-flex bd-highlight mb-3">
						    <nav aria-label="breadcrumb">
							  <ol class="breadcrumb ">
							    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
							    <li class="breadcrumb-item active" aria-current="page">Contact</li>
							  </ol>
							</nav>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- CONTENT -->
	<div id="class" class="">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-12 col-sm-12 col-md-12">

						<!-- MAPS -->
						<div class="maps-wraper">
							<div id="cd-zoom-in"></div>
							<div id="cd-zoom-out"></div>
							<div id="maps" class="maps" data-lat="-7.452278" data-lng="112.708992" data-marker="images/cd-icon-location.png">
							</div>
						</div>
						<div class="spacer-90"></div>

					</div>
				</div>

				<div class="spacer-content"></div>

				<div class="row">
					<div class="col-sm-12 col-md-12 mb-5">
						<h2 class="section-heading text-center mb-5">
							Send Us A Message
						</h2>
						<p class="subheading text-center">Consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc lacinia.</p>
					</div>

					<div class="col-12 col-sm-12 col-md-12 col-lg-8 offset-lg-2">
						<form action="#" class="form-contact" id="contactForm" data-toggle="validator" novalidate="true">
							<div class="row">
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="p_name" placeholder="Enter Name" required="">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<input type="email" class="form-control" id="p_email" placeholder="Enter Email" required="">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="p_subject" placeholder="Subject">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="p_phone" placeholder="Enter Phone Number">
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								 <textarea id="p_message" class="form-control" rows="6" placeholder="Enter Your Message"></textarea>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<div class="text-center">
									<div id="success"></div>
									<button type="submit" class="btn btn-primary">SEND MESSAGE</button>
								</div>
							</div>
						</form>

					</div>
				</div>

			</div>
		</div>
	</div>

<?php include 'template/footer.php' ?>						