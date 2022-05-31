<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--Favicon-->
        <link rel="shortcut icon" href="<?php echo base_url('assets/themes/themesv2') ?>/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url('assets/themes/themesv2') ?>/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="<?php echo base_url('assets/themes/themesv2') ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">
		<meta name="author" content="Kurbandipelosok.com" />
		<title>Reset Password Akun</title>
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
			#box-password {
				margin: 10px auto;
				display: inline-block;
				font-size: 2rem;
				padding: 10px 25px;
				border-style: double;
				font-weight: bold;
    			letter-spacing: 0.5em;
				font-family: ui-serif;
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
							<td><label class="hallo">Hallo <b><?php echo $email;?></b></label></td>
						</tr>
						<tr>
							<td>
								<p>Anda telah meminta mengatur ulang kata sandi, berikut kata sandi baru anda:</p>
							</td>
						</tr>
						<tr>
							<td style="text-align: center;">
								<div id="box-password"><?php echo $genecode?></div>
								<p><strong>Perhatikan penulisan huruf besar dan kecil!</strong></p>
							</td>
						</tr>
						<tr>
							<td>
								<p>Silahkan ganti kanti sandi di menu profil.</p>
							</td>
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
						<tr>
							<td style="padding:24px 20px 0;">
								<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top:1px solid #e5e7e9">
									<tbody><tr>
										<td style="padding:24px 0;font-family:sans-serif;font-size:12px;line-height:18px;color:#bdbec0;text-align:center">
											<p style="margin:0">2022, Kurbandipelosok.com</p>
										</td>
									</tr>
								</tbody></table>
							</td>
						</tr>
					</table> 
					    
				</div>
			</div>
		</div>
    </body>
</html>
