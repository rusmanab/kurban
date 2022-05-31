<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Excellentscale</title>
    <?php
    if (isset($metadata)){
        $metaTitle = "";
        $metaDesc  = "";
        $metaImage = "";
    }else{  
        $metaTitle = $webinfo->meta_title;
        $metaDesc  = $webinfo->meta_description;
        $metaImage = $webinfo->meta_image;
    }
    ?>
     
    <meta name="url" content="<?php echo base_url();?>">
    <meta itemprop="name" content="<?php echo $metaTitle; ?>">
    <meta itemprop="description" content="<?php echo $metaDesc; ?>">
    <meta itemprop="image" content="<?php echo base_url('assets/img/logo.png');?>">
     
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="<?php echo base_url();?>">
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
<body class="<?php echo isset($classBody) ? $classBody : ''?>">
	<!-- HEADER -->
	<?php echo $header?>
	<!-- /HEADER -->
    <!-- NAVIGATION -->
    <?php echo $navigation ?>
    <!-- END NAVIGATION -->
	<!-- NAVIGATION -->
	<!-- MAIN CONTENT -->
    
    <main role="main" class="user-hero">
        <div class="user-hero-image-container">
            <div class="profile-container">
                <div class="container">
                    <div class="row position-relative">
                        <div class="col-md-4 top-profile-mbl">
                            <h2>
                                <a href="<?php echo site_url("myaccount")?>"><?php echo $this->session->userdata('f_username');?> </a>
                            </h2>
                        </div>
                        <div class="col-md-8 top-profile-mbr pml-0">
                            <!-- <h2><a href="<?php echo site_url("profile/profile/".$this->session->userdata('customerid'))?>"><?php echo $this->session->userdata('f_username');?> </a></h2> -->
                            <div class="profile-icon-edit">
                            <ul class="notifprofile">
                                <li><a href="<?php echo site_url("myaccount/paymentlist"); ?>"><i class="fas fa-file-signature"></i></a></li>
                                <li><a href="<?php echo site_url("myaccount/wishlist"); ?>"><i class="fas fa-heart fa-heart-2"></i></a></li>
                                <li><a href="<?php echo site_url("myaccount/profile_edit"); ?>"><i class="fas fa-user-edit"></i></a></li>
                                <li><a href="<?php echo site_url("myaccount/changepassword"); ?>"><i class="fas fa-key"></i></a></li>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-20">
            <?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success" id="success-alert">
                <a href="" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php }else if($this->session->flashdata('error')){  ?>
                <div class="alert alert-danger" id="error-alert">
                    <a href="" class="close" data-dismiss="alert">&times;</a>
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>
            <div class="row bg-white profile-pd-20 mb-20">
                <?php echo $maincontent; ?>
            </div>
        </div>
    </main>
	<!-- FOOTER -->
	<?php echo $footer ?>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
    <script src="<?php echo base_url("assets/themes/themesv2/") ?>/js/popper.min.js"></script>
    <script src="<?php echo base_url("assets/themes/themesv2/") ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {

            $("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
                $("#success-alert").slideUp(500);
            });

            $("#error-alert").fadeTo(5000, 500).slideUp(500, function(){
                $("#error-alert").slideUp(500);
            });
        
        });
    </script>

    <script>
    $(document).ready(function(){
        $(".hide").remove();
    });
    </script>
    
	
    <?php echo $jsclosing . "\r\n" ?>
    <?php echo $addjs . "\r\n" ?>
</body>
</html>
