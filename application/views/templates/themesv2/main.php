<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php
    
    if (isset($metadata)){
        $title     = isset($metadata->post_title) ? $metadata->post_title: "ExcellentScale";
        $metaTitle = "";
        $metaDesc  = "";
        $metaImage = "";
    }else{  
        $title     = "ExcellentScale";
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
    <link rel="shortcut icon" href="<?php echo base_url("assets/themes/themesv2/") ?>img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url("assets/themes/themesv2/") ?>img/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/themes/themesv2/") ?>node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url("assets/themes/themesv2/") ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/themes/themesv2/") ?>css/mobile-style.css">

    <link rel="stylesheet" href="<?php echo base_url("assets/themes/themesv2/") ?>css/style-alternatif.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/themes/themesv2/") ?>css/mobile-style-alternatif.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <?php echo $csshead ."\r\n"?>
  </head>
  <body>
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
	<!-- /FOOTER -->
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url("assets/themes/themesv2/") ?>js/jquery-3.5.0.min.js"></script>
    <script src="<?php echo base_url("assets/themes/themesv2/") ?>js/popper.min.js"></script>
    <script src="<?php echo base_url("assets/themes/themesv2/") ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <?php echo $jsclosing . "\r\n" ?>
    <?php echo $addjs . "\r\n" ?>
    <script>
        $(document).ready(function(){
            $(".hide").remove();
        });
    </script>
    <!-- Whatsapp -->
    <div class="loading" id="loadingProgress" style="display: none;">Loading&#8230;</div>
<script async data-id="5706" src="https://cdn.widgetwhats.com/script.min.js"></script>
    </body>
</html>