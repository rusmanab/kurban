<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--Favicon-->
        <link rel="shortcut icon" href="<?php echo base_url('assets/themes/themesv2') ?>/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url('assets/themes/themesv2') ?>/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="<?php echo base_url('assets/themes/themesv2') ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">

        <title>Email Template</title>
        <style>
			body{
				font-size: 1rem;
			}
			p, .hallo{
				font-size: 1rem;
				margin:0.5rem 0;
			}
			a{
				font-size: 1rem;
			}
			a .btn{
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
			.img20email{
				margin-bottom: 20px;
				width: 300px;
			}
			.btn2 {
				display: inline-block;
				font-weight: 400;
				color: #fff;
				text-align: center;
				vertical-align: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
				background-color: transparent;
				border: 1px solid transparent;
				padding: .375rem .75rem;
				font-size: 1rem;
				line-height: 1.5;
				border-radius: .25rem;
				transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
			}
			.btn-primary {
				color: #fff !important;
				background-color: #007bff;
				border-color: #007bff;
			}
        </style>
    </head>
    <body>
		<div class="container backgrayf1">
			<div class="row">
				<div class="col-md-12">				
					<table style="width: 100%;">
						<tr>
							<td style="text-align: center;">
								<img src="<?php echo base_url('assets/themes/themesv2/img/logo.png')?>" class="img20email" alt="">
							</td>
						</tr>
						<tr>
							<td><label class="hallo">Hallo <b><?php echo $full_name;?></b></label></td>
						</tr>
						<tr>
							<td>
								<h2>Yuk, mulai aktivasi akun Kurbandipelosok.com kamu</h2>
								<p>Sedikit lagi akunmu akan aktif. Cukup klik atau copy paste ke browser tautan berikut.</p>
							</td>
						</tr>
						<tr>
							<td><a href="<?php echo site_url('email_verification?code=' . $genecode)?>"> 
								<?php echo site_url('email_verification?code=' . $genecode)?>
									</a></td>
						</tr>
						<tr>
							<td><p>Atau klik tombol aktifasi</p>
							<a href="<?php echo site_url('email_verification?code=' . $genecode)?>" role="button" class="btn2 btn-primary">Aktifkan Akun</a></td>
						</tr>
						
						<tr>
							<td><p>E-mail ini dibuat otomatis, mohon tidak membalas. Jika butuh bantuan, silakan hubungi kami 
								<a href="https://kurbandipelosok.com/">disini</a></p></td>
						</tr>
						
						<!-- <tr>
							<td><p><small>Download Aplikasi Excellent-Scale</small></p></td>
						</tr>
						<tr>
							<td>
								<a href="https://play.google.com/store/apps/details?id=com.haribima.excellentscale">
								<img src="<?php echo base_url('assets/themes/themesv2/img/googleplay.jpg')?>" class="img10email" alt="googleplay">
								</a>
							</td>
						</tr> -->
						<td style="padding:24px 20px 0;">
							<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top:1px solid #e5e7e9">
								<tbody><tr>
									<td style="padding:24px 0;font-family:sans-serif;font-size:12px;line-height:18px;color:#bdbec0;text-align:center">
										<p style="margin:0">2022, Kurbandipelosik.com by T.CARE</p>
									</td>
								</tr>
							</tbody></table>
						</td>
					</table> 
					    
				</div>
			</div>
		</div>
    </body>
</html>
