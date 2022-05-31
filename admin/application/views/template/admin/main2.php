<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Kurbandipelosok.com</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/themes/metro47/global/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/themes/metro47/global/plugins/simple-line-icons/simple-line-icons.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/themes/metro47/global/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/themes/metro47/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <?php echo $csshead ."\r\n"?>
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url('assets/themes/metro47/global/css/components.min.css')?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url('assets/themes/metro47/global/css/plugins.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <?php echo $csshead2 ."\r\n"?>
        <!-- BEGIN THEME LAYOUT STYLES -->

        <link href="<?php echo base_url('assets/themes/metro47/layouts/layout4/css/layout.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/themes/metro47/layouts/layout4/css/themes/default.css')?>" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url('assets/themes/metro47/layouts/layout4/css/custom.css')?>" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-fixed">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <?php echo $header . "\r\n" ?>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <div class="page-sidebar navbar-collapse collapse">
                        
                        <?php echo $sidebar ."\r\n" ?>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <div class="page-head">
                            <div class="page-title">
                                <h1> <?php echo $title?>
                                    <small><?php echo strtolower( $subTitle ) ?></small>
                                </h1>
                            </div>
                        </div>
                        
                        <?php echo $breadcrumb ."\r\n" ?>     
                        <?php /*<div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                
                            </div>
                        </div> */ ?>
                        
                        
                        <?php
                        echo $maincontent ."\r\n";
                        ?>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
               
                
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> 
                    2019 &copy; Excellent
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
                <div id="result"></div>
            </div>
            <!-- END FOOTER -->
        </div>
       
        
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url('assets/themes/default/global/plugins/respond.min.js')?>"></script>
        <script src="<?php echo base_url('assets/themes/default/global/plugins/excanvas.min.js')?>"></script> 
        <script src="<?php echo base_url('assets/themes/default/global/plugins/ie8.fix.min.js')?>"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url('assets/themes/default/global/plugins/jquery.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/themes/default/global/plugins/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/themes/default/global/plugins/js.cookie.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/themes/default/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/themes/default/global/plugins/jquery.blockui.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/themes/default/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <?php echo $jsclosing . "\r\n" ?>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url('assets/themes/default/global/scripts/app.min.js')?>" type="text/javascript"></script>
        <?php echo $jsclosing2 ."\r\n" ?>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url('assets/themes/default/layouts/layout/scripts/layout.min.j')?>s" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/themes/default/layouts/layout/scripts/demo.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/themes/default/layouts/global/scripts/quick-sidebar.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/themes/default/layouts/global/scripts/quick-nav.min.js')?>" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <?php echo $addjs . "\r\n"; ?>
        <script type="text/javascript">

            window.onload = function(){
                var x = 0;        
                var source = new EventSource("<?php echo site_url('home/getStream')?>?id=" + x);
        
                source.onmessage = function(event){        
                    document.getElementById("result").innerHTML += "New time received from web server: "+ x + " ==> " + event.data + "<br>";
                    x++;        
                };        
            };
        
        </script>
    </body>

</html>