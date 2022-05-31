<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--Favicon-->
        <link rel="shortcut icon" href="<?php echo ROOT.('assets/themes/themesv2') ?>/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo ROOT.('assets/themes/themesv2') ?>/img/favicon.ico" type="image/x-icon">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo ROOT.('assets/themes/themesv2') ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">

        <!-- Style -->
        <link rel="stylesheet" href="<?php echo ROOT.('assets/themes/themesv2') ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo ROOT.('assets/themes/themesv2') ?>/css/mobile-style.css">

        <link rel="stylesheet" href="<?php echo ROOT.('assets/themes/themesv2') ?>/css/style-alternatif.css">
        <link rel="stylesheet" href="<?php echo ROOT.('assets/themes/themesv2') ?>/css/mobile-style-alternatif.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

        <!-- <title>Mustela - Detail Product</title> -->
        <title>Email Template</title>
        <style>
            body {
                background: url('https://wallpaperplay.com/walls/full/2/4/c/112280.jpg');
                background-size: cover;
                background-repeat: no-repeat;
            }
            img.img20email {
                width: 20%;
                height: auto;
                margin: auto;
                margin-bottom: 30px;
            }
            table {
                width: 100%;
            }
            td {
                border-bottom: 1px solid #f8f8f8;
            }
            tr.bg-blues {
                background: #004d9d;
                color: #fff;
                text-align: center;
            }

            tr.bg-blues > th {
                padding: 10px;
            }
            .padding-30 {
                padding: 5% 20%;
            }
            .back-blue {
                background: #004d9d;
                padding: 20px 30px 20px 30px;
                color: #fff;
                width: 100%;
            }
            p.mb-0 {
                margin-bottom: 0rem;
            }
            .divgrey {
                background: #f8f8f8;
                padding: 5%;
                text-align: center;
                margin-top: 20px;
            }
            /*.divgrey a {
                background: #004d9d;
                color: #fff;
                padding: 20px 30px;
            }*/
            .text-footer {
                font-size: .6rem;
                padding: 0 10%;
                text-align: center
            }
            .f-8 {
                font-size: .8rem;
            }
            .f-1 {
                font-size: 1rem;
            }
            .text-right {
                text-align: right;
            }
            .text-left {
                text-align: left;
            }
            .text-center {
                text-align: center;
            }
            .mt-20 {
                margin-top: 20px;
            }
            .btn-email {
                background: #004d9d;
                color: #fff;
                padding: 5% 12%;
            }
            ul.socmed > li {
                display: inline;
                margin-right: 10px;
            }
            img.wid20 {
                width: 30px;
            }
            img.height40 {
                height: 25px !important;
                width: auto !important;
            }
            .form-info {
                width: 100%;
                border: 0px !important;
                padding: 5px 0px;
                /*background: #fff;*/
                color: #004d9d;
                /*margin: auto;*/
                font-size: 14px;
                text-align: left;
            }
            .mb-10 {
                margin-bottom: 10px;
                margin: auto;
                /*text-align: center;*/
            }
            .blues {
                color: #004d9d !important;
                font-weight: bold;
                font-size: .8rem;
                /*text-align: center;*/
                margin: auto;
                width: 100%;
            }
            .btn-blue {
            	background: #004d9d;
                color: #fff !important;
                border: none;
                padding: 10px 20px;
                border-radius: 30px;
                text-decoration: none;
            }
            .btn-blue:hover {
                color: #fff;
            }
            .btn-blue:focus {
                color: #fff;
            }
            .btn-blue:active {
                color: #fff;
            }
            .btn-blue a {
                color: #fff !important;
                text-decoration: none !important;
            }
            .backgrayf1 {
            	background: #fafafa;
            	padding: 40px 30px 20px 30px;
            	border-radius: 30px
            }
            .backgrayf1 h1 {
				color: #004d9d;
				margin-bottom: 20px;
            }
        </style>
    </head>
    <body>

        <section>
            <div class="container">
                <div class="bg-white padding-30">
                    <div class=""><img src="<?php echo ROOT.('assets/themes/themesv2/img/logo-footer.png')?>" class="img20email" alt=""></div>
                    <div class="backgrayf1">
                        <h1 class="text-left">Welcome to Excellent Scale</h1>
                        <p>
                            Dear <?php echo $full_name;?>,
                            Welcome to Excellent Scale. Thank you for registering to our website. We look forward to having you as a part of our community!
                        </p>
                        <div class="mb-10">
                            <p class="mb-0">Name</p>
                            <div class="form-info"><?php echo $full_name;?></div>
                        </div>
                        <div class="mb-10">
                            <p class="mb-0">Email</p>
                            <div class="form-info"><?php echo $email;?></div>
                        </div>
                        <p> To activate your account. Please, click the link or copy paste below</p>
                        <a href="<?php echo ROOT .  ('index.php/email_verification?code=' . $genecode)?>">
                            <?php echo ROOT .('index.php/email_verification?code=' . $genecode)?>
                        </a>
                        <br><br>
                        <p>
                        <div class="text-center"><a href="<?php echo ROOT?>" role="button" class="btn btn-blue">Mulai Belanja</a></div>
                        </p><br><br>
                        <div class="blues text-center">Copyright &copy; 2020 PT. Excellent Scale , All Rights Reserved.</div>
                        <br>
                    </div>
                </div>
            </div>
        </section>

        <!-- Whatsapp -->
        <script async data-id="5706" src="https://cdn.widgetwhats.com/script.min.js"></script>  

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?php echo ROOT ?>assets/js/jquery-3.3.1.slim.min.js"></script>
        <script src="<?php echo ROOT ?>assets/js/popper.min.js"></script>
        <script src="<?php echo ROOT ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src='https://unpkg.com/xzoom/dist/xzoom.min.js'></script>
        <script src='https://hammerjs.github.io/dist/hammer.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js'></script>

    </body>
</html>