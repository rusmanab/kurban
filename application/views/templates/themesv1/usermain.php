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
    
    <div class="section">
        <div class="container">
    		<div class="row">            
    			<div class="col-md-12">
                    <ul class="user-menu">
                        <?php
                        $menuactive = isset($menuactive) ? $menuactive : '';
                        ?>
                        <li><span class="header-menu">Data Diri </span>
                            <ul>
                                <li><a href="<?php echo site_url('myaccount') ?>">Profile</a></li>
                                <li><a href="<?php echo site_url('myaccount/address') ?>" class="<?php echo $menuactive=='address'? 'active':'' ?>">Alamat</a></li>
                                <li><a href="<?php echo site_url('myaccount/changepassword') ?>" class="<?php echo $menuactive=='changepassword'? 'active':'' ?>" >Kata Sandi</a></li>
                            </ul>
                        </li>
                        <li><span class="header-menu">Transaksi </span>
                            <ul>
                                <li><a href="<?php echo site_url('myaccount/paymentlist') ?>" class="<?php echo $menuactive=='paymentlist'? 'active':'' ?>" >Menunggu Pembayaran</a></li> 
                                <li><a href="<?php echo site_url('myaccount/daftar_transaksi') ?>" class="<?php echo $menuactive=='daftar_transaksi'? 'active':'' ?>" >Daftar Transaksi</a></li>
                                <li><a href="<?php echo site_url('myaccount/') ?>">Ulasan</a></li>
                            </ul>
                        </li>
                        <li><span class="header-menu">Favorit</span> 
                            <ul> 
                                <li><a href="<?php echo site_url('myaccount/lastseen') ?>" class="<?php echo $menuactive=='lastseen'? 'active':'' ?>">Terakhir Dilihat</a></li>
                                <li><a href="<?php echo site_url('myaccount/wishlist') ?>" class="<?php echo $menuactive=='wishlist'? 'active':'' ?>">Wishlist</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="user-content">
                        <div class="page-content">
                        <?php echo $maincontent; ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>        
        </div>
    </div>
	
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
