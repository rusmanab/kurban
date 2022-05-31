<!DOCTYPE HTML>
<html>
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
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/themes/themesv1")?>/css/style.css" />
</head>

<body>
    
    <div class="container login">
        
        <div class="row">
            <div class="col-md-12 logo mb-10">
                <a href="<?php echo site_url('home')?>">
					<img src="<?php echo base_url("assets/themes/themesv1")?>/img/logo.png" alt="">
				</a>
            </div>
        </div>
        <div class="row user-accounts-container">
            <div class="col-md-6">
                <div class="user-accounts-logo">
                    
                    <img class="user-accounts-logo__img" src="<?php echo base_url("assets/themes/themesv1")?>/img/background.png" alt="tokopedia register">
                    <h2>Excellent scale</h2>
                    <p>Partner yang bersahabat  dalam Solusi penimbangan</p>
                </div>
            </div>
            <div class="col-md-6 ta-center">
                <div class="user-accounts-form user-accounts-form--register user-accounts-form--border">
                    <div class="user-accounts-form__header">
                        <h2 class="user-accounts-form__title">Selamat Datang</h2>
                        <label class="user-accounts-form__text">Silahkan masukan email dan password untuk mangakses halaman user anda</label>
                    </div>
                    
                    <?php
                    $attr = array(
                                'id'    => "login-step-one-form",
                                'name'  => "login_form",
                                'method'=> "post",
                                'class' => "js__login-form-one"
                                );
                    echo form_open('login_submit', $attr);
                    ?>
                        <div class="unf-user-input mb-16">
                            <label class="unf-user-input__label" for="email">
                                Email                    
                            </label>
                            <input type="email" id="email" name="email" value="" class="js__input-form unf-user-input__control">
                            <div class="unf-user-input__info">
                                <small class="js__input-help unf-user-input__info-msg">Contoh: 
                                		email@excellent.com                            	
                                </small>
                            </div>
                        </div>
                        <div class="unf-user-input mb-16">
                            <label class="unf-user-input__label" for="email">
                                Password                    
                            </label>
                            <input type="password" id="password" name="password" value="" class="js__input-form unf-user-input__control">
                         
                        </div>
                        <button type="submit" class="js__continue-login-form unf-user-btn unf-user-btn--medium unf-user-btn--primary unf-user-btn--block" >Selanjutnya</button>
                   
                    <?php echo form_close(); ?>
                    
                    <div class="user-accounts-alt">
                        <div class="user-accounts-alt__separator">
                            <span class="user-accounts-hline"></span>
                            <span class="user-accounts-alt__separator-text">atau masuk dengan</span>
                            <span class="user-accounts-hline"></span>
                        </div>
                        <ul class="user-accounts-alt__list">
                            <li class="user-accounts-alt__list-item">
                                <a id="google-button" class="unf-user-btn unf-user-btn--secondary unf-user-btn--medium unf-user-btn--block user-accounts-alt__button" data-url="https://accounts.tokopedia.com/api/authorize?response_type=code&amp;client_id=1001&amp;state=eyJsZCI6Imh0dHBzOi8vd3d3LnRva29wZWRpYS5jb20vIiwicmVmIjoiaHR0cHM6Ly93d3cudG9rb3BlZGlhLmNvbS8iLCJ1dWlkIjoiZTMwMTNhZTYtOTg1NS00ODE4LWJiNDEtNTAxMDFmZDIxNmZmIiwicCI6Imh0dHBzOi8vd3d3LnRva29wZWRpYS5jb20ifQ&amp;redirect_uri=https%253A%252F%252Fwww.tokopedia.com%252Fappauth%252Fcode">
                                <i class="user-accounts-alt__icon user-icon-google"></i>
                                <span class="user-accounts-alt__button-text">Google</span>
                                </a>
                            </li>
                            <li class="user-accounts-alt__list-item">
                                <a id="fb-button" class="unf-user-btn unf-user-btn--secondary unf-user-btn--medium unf-user-btn--block user-accounts-alt__button" data-url="https://accounts.tokopedia.com/api/authorize?response_type=code&amp;client_id=1001&amp;state=eyJsZCI6Imh0dHBzOi8vd3d3LnRva29wZWRpYS5jb20vIiwicmVmIjoiaHR0cHM6Ly93d3cudG9rb3BlZGlhLmNvbS8iLCJ1dWlkIjoiZTMwMTNhZTYtOTg1NS00ODE4LWJiNDEtNTAxMDFmZDIxNmZmIiwicCI6Imh0dHBzOi8vd3d3LnRva29wZWRpYS5jb20ifQ&amp;redirect_uri=https%253A%252F%252Fwww.tokopedia.com%252Fappauth%252Fcode&amp;login_type=fb" fb-id="126665634029576">
                                <i class="user-accounts-alt__icon user-icon-facebook"></i>
                                <span id="fb-btn" class="user-accounts-alt__button-text">Facebook</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="user-accounts-form__footer">
                        <p class="user-accounts-form__text fs-13">Belum punya akun Excellent? 
                            <a href="<?php echo site_url('register') ?>">Daftar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>