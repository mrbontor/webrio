<?php
    // $setting = $this->Home_model->find_setting();
    // extract($setting);
    // echo $username;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $setting->title ?></title>
    <meta name="description" content="<?php echo $setting->description ?>">
    <meta name="keywords" content="<?php echo $setting->keyword ?>">
    <meta name="author" content="raksaciptasentosa.co.id"> 
	
	<!-- ==============================================
	Favicons
	=============================================== -->
	<link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo base_url()?>assets/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>assets/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>assets/images/apple-touch-icon-114x114.png">
	
	<!-- ==============================================
	CSS VENDOR
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendor/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendor/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendor/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendor/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendor/animate.min.css">
	
	<!-- ==============================================
	Custom Stylesheet
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css" />
	
    <script src="<?php echo base_url()?>assets/js/vendor/modernizr.min.js"></script>

</head>

<body>

	<!-- LOAD PAGE -->
	<div class="animationload">
		<div class="loader"></div>
	</div>
	<!-- BACK TO TOP SECTION -->
	<a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>
	<?php include 'menu.php'; ?>