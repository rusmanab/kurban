
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
                        <h2 class="user-accounts-form__title">Daftar Sekarang</h2>
                        <label class="user-accounts-form__text">Sudah punya akun Execelentscale? <a href="<?php echo site_url('login')?>" id="link-page" class="fw-semibold">Masuk</a></label>
                    </div>
                    <?php echo form_open('register_submit'); ?>
                                                
                        <div class="unf-user-input mb-10">
                            <label class="unf-user-input__label" for="register">Nama Lengkap</label>
                            <input type="text" id="register" name="full_name" value="" autocomplete="off" class="js__input-register unf-user-input__control" csh_init_length="18">
                           
                        </div>
                        <div class="unf-user-input mb-10">
                            <label class="unf-user-input__label" for="register">Email</label>
                            <input type="email" id="register" name="email" value="" autocomplete="off" class="js__input-register unf-user-input__control" csh_init_length="18">
                            <div class="unf-user-input__info">
                                <small class="js__register-help unf-user-input__info-msg">Contoh: email@excellent.com</small>		
                            </div>
                        </div>
                        
                        <div class="unf-user-input mb-10">
                            <label class="unf-user-input__label" for="register">Nomor Ponsel</label>
                            <input type="text" id="ponsel" name="ponsel" value="" autocomplete="off" class="unf-user-input__control" csh_init_length="18">
                            <div class="unf-user-input__info">
                                <small class="js__register-help unf-user-input__info-msg">Contoh: 08123123</small>		
                            </div>
                        </div>
                        <div class="unf-user-input mb-10">
                            <label class="unf-user-input__label" for="register">Password</label>
                            <input type="password" id="password" name="password" value="" autocomplete="off" class="js__input-register unf-user-input__control" csh_init_length="18">
                           
                        </div>
                        
                        <button type="submit" class="js__submit-register mt-15 unf-user-btn unf-user-btn--primary unf-user-btn--block">Daftar</button>
                        <p class="fs-12 lh-18 mt-15 unf-black-disabled ta-center">
                            Dengan mendaftar, saya menyetujui<br><a id="terms-button" class="unf-green" href="<?php echo site_url('terms')?>" target="_blank">Syarat dan Ketentuan</a> serta <a id="privacy-button" class="unf-green" href="<?php echo site_url('privacy')?>" target="_blank">Kebijakan Privasi</a>.
                        </p>
                        <div class="user-accounts-alt">
                            <div class="user-accounts-alt__separator">
                                <span class="user-accounts-hline"></span>
                                <span class="user-accounts-alt__separator-text">atau daftar dengan</span>
                                <span class="user-accounts-hline"></span>
                            </div>
                        </div>
                        <ul class=" user-accounts-alt__list--register">
                            <li class="user-accounts-alt__list-item user-accounts-alt__list-item--register">
                                <a id="fb-button" data-url="https://accounts.tokopedia.com/api/authorize?response_type=code&amp;client_id=1001&amp;state=eyJyZWYiOiJodHRwczovL3d3dy50b2tvcGVkaWEuY29tIiwidXVpZCI6ImQ3OGIyMGY5LWQ5YjAtNDMyZi04ZGFhLTU4MDU5OTllMzg0NCIsInAiOiJodHRwczovL3d3dy50b2tvcGVkaWEuY29tIn0&amp;redirect_uri=https%3a%2f%2fwww.tokopedia.com%2fappauth%2fcode&amp;login_type=fb&amp;is_reg=1" class="unf-user-btn unf-user-btn--secondary user-accounts-alt__button" fb-id="126665634029576">
                                    <i class="user-accounts-alt__icon user-icon-facebook"></i>
                                    <span id="fb-btn" class="user-accounts-alt__button-text">Facebook</span>
                                </a>
                            </li>
                            <li class="user-accounts-alt__list-item user-accounts-alt__list-item--register">
                                <a id="google-button" data-url="https://accounts.tokopedia.com/api/authorize?response_type=code&amp;client_id=1001&amp;state=eyJyZWYiOiJodHRwczovL3d3dy50b2tvcGVkaWEuY29tIiwidXVpZCI6ImQ3OGIyMGY5LWQ5YjAtNDMyZi04ZGFhLTU4MDU5OTllMzg0NCIsInAiOiJodHRwczovL3d3dy50b2tvcGVkaWEuY29tIn0&amp;redirect_uri=https%3a%2f%2fwww.tokopedia.com%2fappauth%2fcode&amp;login_type=google&amp;is_reg=1" class="unf-user-btn unf-user-btn--secondary user-accounts-alt__button">
                                    <i class="user-accounts-alt__icon user-icon-google"></i>
                                    <span class="user-accounts-alt__button-text">Google</span>
                                </a>
                            </li>
                        </ul>
                    <?php echo form_close(); ?>
                  
                </div>
            </div>
        </div>
    </div>

</body>
</html>