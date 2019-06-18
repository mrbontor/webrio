<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title><?=$title ?></title>
		<meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url() ?>assets/favicon.ico">
		<link rel="icon" href="<?php echo base_url() ?>assets/favicon.ico" type="image/x-icon">
		
		<!-- Toggles CSS -->
		<link href="<?php echo base_url() ?>assets/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url() ?>assets/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
		
		<!-- Custom CSS -->
		<link href="<?php echo base_url() ?>assets/dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- Preloader -->
		<div class="preloader-it">
			<div class="loader-pendulums"></div>
		</div>
		<!-- /Preloader -->
		
		<!-- HK Wrapper -->
		<div class="hk-wrapper">
			
			<!-- Main Content -->
			<div class="hk-pg-wrapper hk-auth-wrapper">
				
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 pa-0">
							<div class="auth-form-wrap pt-xl-0 pt-70">
								<div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
									<a class="auth-brand text-center d-block mb-20" href="<?php echo base_url() ?>assets/#">
										<img class="brand-img" src="<?php echo base_url() ?>assets/dist/img/logo-light.png" alt="brand"/>
									</a>
									<form id="logForm">
										<h1 class="display-4 text-center mb-10">Welcome Back :)</h1>
										<p class="text-center mb-30">Sign in to your account .</p> 
										
										<div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
		                                    <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
		                                    <span id="message"></span>
		                                </div>  
										<!-- <div id="responseDiv"  class="alert alert-inv alert-wth-icon alert-dismissible fade show" role="alert" style="display:none;">
	                                        <span class="alert-icon-wrap" id="message"><i class="zmdi zmdi-check-circle"></i></span>
	                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="clearMsg">
	                                            <span aria-hidden="true">×</span>
	                                        </button>
	                                    </div> -->
										<div class="form-group">
											<input class="form-control" placeholder="Username" type="text" id="username" name="username">
										</div>
										<div class="form-group">
											<div class="input-group">
												<input class="form-control" placeholder="Password" type="password" id="password" name="password">
												<div class="input-group-append">
													<span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
												</div>
											</div>
										</div>
										<div class="custom-control custom-checkbox mb-25">
											<input class="custom-control-input" id="same-address" type="checkbox" checked>
											<label class="custom-control-label font-14" for="same-address">Keep me logged in</label>
										</div>
										<button class="btn btn-primary btn-block" type="submit"><span id="logText"></span></button>
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /HK Wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
		<script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="<?php echo base_url() ?>assets/dist/js/jquery.slimscroll.js"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="<?php echo base_url() ?>assets/dist/js/dropdown-bootstrap-extended.js"></script>
		
		<!-- FeatherIcons JavaScript -->
		<script src="<?php echo base_url() ?>assets/dist/js/feather.min.js"></script>
		
		<!-- Init JavaScript -->
		<script src="<?php echo base_url() ?>assets/dist/js/init.js"></script>
	</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
        $('#logText').html('Login');
        $('#logForm').submit(function(e){
            e.preventDefault();
            $('#logText').html('Checking...');
            var url = '<?=base_url(); ?>';
            var user = $('#logForm').serialize();
            var login = function(){
                $.ajax({
                    type: 'POST',
                    url: 'index.php/auth/login',
                    dataType: 'json',
                    data: user,
                    success:function(response){
                    console.log(url);
                        $('#message').html(response.message);
                        $('#logText').html('Login');
                        if(response.error){
                            $('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
                        }
                        else{
                            $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
                            $('#logForm')[0].reset();
                            setTimeout(function(){
                                location.reload();
                            }, 2000);
                        }
                    }
                });
            };
            setTimeout(login, 2000);
        });
 
        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });
    });
</script>