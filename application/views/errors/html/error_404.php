<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$ci = & get_instance();
$ci->load->library(array('session','cart'));
$ci->load->model(array('mtemplate','mcart'));

$data['categories'] = $ci->mtemplate->getKategory();
$data['webinfo']    = $ci->mtemplate->getWebsiteInfo();
$data['cart']       = $ci->mcart; 
$data['headerMenu'] = $ci->mtemplate->getMenu(1);

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Excellentscale</title>

 
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
<title>404 Page Not Found</title>

</head>
<body>
    <?php
    $templateDir = "themesv2";
    
    $ci->load->view('templates/'.$templateDir.'/header',$data);
    $ci->load->view('templates/'.$templateDir.'/navigation',$data);
    $ci->load->view('pages/err404',$data);
    $ci->load->view('templates/'.$templateDir.'/footer',$data);
    
    ?>
</body>
</html>