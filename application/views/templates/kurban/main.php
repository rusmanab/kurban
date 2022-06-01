<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php
    
    if (isset($metadata)){
        $title     = isset($metadata->post_title) ? $metadata->post_title: "Kurbandipelosok.com";
        $metaTitle = "";
        $metaDesc  = "";
        $metaImage = "";
    }else{  
        $title     = "Kurbandipelosok.com";
        $metaTitle = $webinfo->meta_title;
        $metaDesc  = $webinfo->meta_description;
        $metaImage = $webinfo->meta_image;
    }
    ?>
    <title><?php echo $title ?> </title> 
    <meta name="url" content="<?php echo site_url();?>">
    <meta itemprop="name" content="<?php echo $metaTitle; ?>">
    <meta itemprop="description" content="<?php echo $metaDesc; ?>">
    <meta itemprop="image" content="<?php echo base_url('assets/img/logo.png');?>">
     
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="<?php echo site_url();?>">
    <meta property="og:type" content="website">
    <meta property="og:property" content="Interbat">
    <meta property="og:title" content="<?php echo $metaTitle; ?>">
    <meta property="og:description" content="<?php echo $metaDesc; ?>">
    <meta property="og:site_name" content="Excellent">
    <meta property="og:image" content="<?php echo base_url('assets/themes/themesv2/img/logo.png');?>">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
     
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $metaTitle; ?>">
    <meta name="twitter:description" content="<?php echo $metaDesc; ?>">
    <meta name="twitter:image" content="<?php echo base_url('assets/themes/themesv2/img/logo.png');?>">
    
    
    <!--Favicon-->
    <link rel="icon" href="<?= base_url('assets/');?>images/favicon.png"  type="image/png">
    <title>kurbandipelosok.com</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbar-fixed/">

	<!-- Bootstrap -->
	<link href="<?= base_url('assets/vendor/node_modules/bootstrap/dist/');?>css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom -->
	<link href="<?= base_url('assets/');?>css/custom.css" rel="stylesheet">
	<!-- Mobile -->
	<link href="<?= base_url('assets/');?>css/mobile.css" rel="stylesheet">

	<!-- Favicons -->
	<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
	<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
	<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
	<meta name="theme-color" content="#712cf9">

	<!-- Fontawesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <!-- DataTable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
	
    <?php echo $csshead ."\r\n"?>
  </head>
  <?php
  $class = $this->uri->segment('1');
	if ( $class == "myaccount"){
		$class = "profile";
	}elseif( $class == "product" || $class == 'cart'){
		$class = "detail";
	}
  ?>
  
  <body class="<?= $class?>">
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

	<!-- FOOTER -->
	<?php echo $footer ?>
