<!doctype html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Kurban di Tcare">
		<meta name="author" content="T.care">
		<meta name="generator" content="tcare-kurban v.1">
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
		
	</head>
	<body class="login">
		<nav class="navbar navbar-expand-md navbar-dark fixed-top">
			<div class="container">
				<a class="navbar-brand" href="<?= site_url();?>">
					<img src="<?= base_url('assets/images/');?>logo-white.png">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					
				</div>
			</div>
		</nav>

		<main class="details">
	
	<section>
		<div class="dalil">
			<div class="row no-gutter">
				<div class="col-md-6" style="background: url(<?= base_url('assets/images/banner/');?>child.jpg); background-size: cover; background-position: center center; background-repeat: no-repeat;">
				</div>
				<div class="col-md-6 bg-login-white">
					<div class="p-5">
						<h2 class="mb-4">Selamat datang di kurbandipelosok.com. Silahkan login.</h2>
						<?php
						echo form_open('login/submit');
						?>
							<div class="mb-3">
								<label for="email" class="form-label">Username</label>
								<input type="text" name="username" class="form-control" id="email" aria-describedby="email">
							</div>  
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" name="password" class="form-control" id="password">
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</section>

</main>
		<footer>
			<div class="container">
				
				<div class="copyright">
					Copyright &copy; 2022 <a href="https://tcare.id/" target="_blank">T.CARE</a>. All Rights Reserved.
				</div>
			</div>
			
		</footer>
		<script src="<?= base_url('assets/vendor/node_modules/bootstrap/dist/');?>js/bootstrap.bundle.min.js"></script>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script>
			/**
			 * Listen to scroll to change header opacity class
			 */
			function checkScroll(){
			    var startY = $('.navbar').height() * 2; //The point where the navbar changes in px

			    if($(window).scrollTop() > startY){
			        $('.navbar').addClass("scrolled");
			    }else{
			        $('.navbar').removeClass("scrolled");
			    }
			}

			if($('.navbar').length > 0){
			    $(window).on("scroll load resize", function(){
			        checkScroll();
			    });
			}
		</script>


	</body>
	</html>
