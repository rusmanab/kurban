<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="zambonapp" />

	<title>Aktifasi Akun</title>
</head>

<body>
    <div>
        <p>Hi <?php echo $email ?>,</p>
        <p>
        Kamu telah mendaftarkan email <?php echo $email ?> sebagai alamat email kamu di Excellentscale.
        </p>
        <p>
        Ayo verifikasi email kamu dan langganan newsletter Excellentscale untuk mendapatkan update terbaru, 
        berbagai penawaran ekslusif! Klik tautan atau copy paste berikut ini
        </p>
        <a href="<?php echo site_url('email_verification?code=' . $genecode)?>">
            <?php echo site_url('email_verification?code=' . $genecode)?>
        </a>
        
    </div>
</body>
</html>