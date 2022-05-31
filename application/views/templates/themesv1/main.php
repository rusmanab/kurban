<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Excellent Scale</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/themes/themesv1")?>/css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/themes/themesv1")?>/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/themes/themesv1")?>/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/themes/themesv1")?>/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="<?php echo base_url("assets/themes/themesv1")?>/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/themes/themesv1")?>/css/style.css" />
    <?php echo $csshead ."\r\n"?>
</head>
<body class="<?php echo isset($classBody) ? $classBody : ''?>">
	<!-- HEADER -->
	<?php echo $header?>
	<!-- /HEADER -->
    <!-- NAVIGATION -->
    <?php echo $navigation ?>
    <!-- END NAVIGATION -->
	<!-- NAVIGATION -->
	<!-- MAIN CONTENT -->
	<?php echo $maincontent; ?>
	<!-- /MAIN CONTENT -->
	<hr>
	<!-- FOOTER -->
	<?php echo $footer ?>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="<?php echo base_url("assets/themes/themesv1")?>/js/jquery.min.js"></script>
	<script src="<?php echo base_url("assets/themes/themesv1")?>/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url("assets/themes/themesv1")?>/js/slick.min.js"></script>
	<script src="<?php echo base_url("assets/themes/themesv1")?>/js/nouislider.min.js"></script>
	<script src="<?php echo base_url("assets/themes/themesv1")?>/js/jquery.zoom.min.js"></script>
	<script src="<?php echo base_url("assets/themes/themesv1")?>/js/main.js"></script>
    <?php echo $jsclosing . "\r\n" ?>
    <?php echo $addjs . "\r\n" ?>
</body>
</html>
