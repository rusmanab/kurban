<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="lolkittens" />
    <!--Favicon-->
        <link rel="shortcut icon" href="<?php echo base_url('assets/themes/themesv2/') ?>img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url('assets/themes/themesv2/') ?>assets/img/favicon.ico" type="image/x-icon">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/themes/themesv2/') ?>node_modules/bootstrap/dist/css/bootstrap.min.css">

        <!-- Style -->
        <link rel="stylesheet" href="<?php echo base_url('assets/themes/themesv2/') ?>css/style.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/themes/themesv2/') ?>css/mobile-style.css">

        <link rel="stylesheet" href="<?php echo base_url('assets/themes/themesv2/') ?>css/style-alternatif.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/themes/themesv2/') ?>css/mobile-style-alternatif.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

        <!-- <title>Mustela - Detail Product</title> -->
        <title>Email Template</title>
	<style>
            img.img20email {
                width: 30%;
                height: auto;
                border-radius: 5px;
                margin-right: 5px;
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
                padding: 5% 20%;
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
        </style>
</head>

<body>
    <?php
    $orders = $info['orders'];
    $orderDetail = $info['orderDetail'];
    $orderDetail2 = $info['orderDetail2'];
  
    ?>
    <section>
        <div class="container">
            <div class="bg-white padding-30">
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?php echo base_url('assets/themes/themesv2/img/logo.png')?>" class="" alt="">
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-md-12">
                <h3>Pesanan #<?php echo $orders->no_order;?> Sukses</h3>
                <div class="mt-20">
                        <p>Hai <?php echo $orders->full_name;?>,</p>
                        <p>Terima kasih atas kepercayaanmu telah berbelanja di Excellentscale.com. Mohon segera lakukan pembayaran pesanan Anda.</p>
                        <br>
                        <p>Berikut adalah penjelasan tagihan pembayaran:</p>
                        <table>
                            <tr class="bg-blues">
                                <th colspan="2" style="padding:10px">Tagihan #<?php echo $orders->no_order;?></th>
                            </tr>
                            <tr>
                                <td style="padding:10px">Waktu Transaksi</td>
                                <td style="padding:10px" class="text-right"><?php echo $orders->order_date;?> WIB</td>
                            </tr>
                            <tr>
                                <td style="padding:10px">Pembeli</td>
                                <td style="padding:10px" class="text-right"><?php echo $orders->full_name;?> </td>
                            </tr>
                            <tr>
                                <td style="padding:10px">Metode Pembayaran</td>
                                <td style="padding:10px" class="text-right"><?php echo $orders->nama_pembayaran;?></td>
                            </tr>
                            <tr>
                                <td style="padding:10px">Metode Pengiriman</td>
                                <td style="padding:10px" class="text-right"><?php echo $orderDetail2[0]->keterangan;?></td>
                            </tr>
                        </table>
                        <table>
                            <tr class="bg-blues">
                                <td class="text-left" style="padding:10px;width: 15%;" ></td>
                                <td class="text-left" style="padding:10px;width: 35%;">Nama Produk</td>
                                <td class="text-center" style="padding:10px;width: 25%;">Price</td>
                                <td class="text-center" style="padding:10px;width: 10%;">Quantity</td>
                                <td class="text-right" style="padding:10px;width: 25%;">Total Belanja</td>
                            </tr>
                            <?php
                            $totalPrice = 0;
                           
                            foreach($orderDetail as $o){
                            ?>
                            <tr>
                                <td style="padding:10px"><img src="<?php echo base_url($o->image)?>" style="height: 70px;" /></td>
                                <td style="padding:10px;text-align: left;vertical-align: top;"><?php echo $o->pruduct_name ; ?></td>
                                <td style="padding:10px;text-align: right;vertical-align: top;">
                                    <?php
                                    $price = number_format($o->price,0);
                                    if ( $o->diskon_price > 0 ){
                                        $price = "<strike>" . number_format($o->price,0)."</strike> ";
                                        $price.= number_format($o->price - $o->diskon_price,0);
                                    }
                                    ?>
                                    Rp <?php echo $price; ?>
                                </td>
                                <td style="padding:10px;text-align: center;vertical-align: top;"><?php echo $o->qty;?></td>
                                <td style="padding:10px;text-align: right;vertical-align: top;">Rp
                                 
                                    <?php
                                         
                                        echo number_format($o->total_price,0);
                                    ?>
                                </td>
                            </tr>
                            <?php
                                $totalPrice+= $o->total_price;
                            }
                            ?>
                            <tr>
                                <td colspan="4" style="padding:10px">Harga Total Belanja</td>
                                <td style="padding:10px" class="text-right">Rp. <?php echo number_format($totalPrice);?></td>
                            </tr>
                            <?php
                            foreach($orderDetail2 as $o2){
                            ?>
                            <tr>
                                <td colspan="4" style="padding:10px"><?php echo $o2->keterangan;?></td>
                                <td style="padding:10px" class="text-right">
                                    Rp. <?php echo number_format($o2->price);?>
                                </td>
                            </tr>
                            <?php 
                            } 
                            $total_price = $orders->total_price - $orders->total_diskon;
                            ?>
                            
                            
                            <tr>
                                <td colspan="4" style="padding:10px">Total Pembayaran</td>
                                <td style="padding:10px" class="text-right">
                                    <strong>Rp. <?php  echo number_format ($total_price,0); 
                                    ?></strong>
                                </td>
                            </tr>
                        </table>
                        <div class="text-center">
                            <p>Lakukan pembayaran sebesar:</p>
                            <h1><strong>Rp. <?php 
                                        echo number_format ($total_price);
                                    ?></strong></h1>
                            <p>Pembayaran dapat dilakukan ke salah satu nomor rekening a/n PT Excellentscale.com:</p>
                            <table style="width: 60%;margin: auto;">
                                <?php
                                foreach($listBank as $b)
                                {?>
                                <tr>
                                    <td class="text-left"><img src="<?php echo base_url($b->image);?>" class="height40"></td>
                                    <td class="text-right">
                                        Bank <?php echo $b->bank_name ?>, <?php echo $b->kcp ?> <br>
                                        <strong><?php echo $b->norek ?></strong>
                                    </td>
                                </tr><?php
                                }
                                ?>
                            </table>
                        </div>
                    <div class="divgrey">
                        <!-- <a href="#"><button>Detail Tagihan</button></a> -->
                        <a href="<?php echo site_url("home");?>"><button class="btn-email">Visit Exellence Scale</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-20 f-1">
                Segala bentuk informasi seperti nomor kontak, alamat e-mail, atau password kamu bersifat rahasia. Jangan menginformasikan data-data tersebut kepada siapa pun, termasuk kepada pihak yang mengatasnamakan Exellence Scale.
            </div>
        </div>
        <div class="row mt-20">
            <table width="100%">
                <tr>
                    <td>
                        <div class="f-8">
                            Copyright © 2018 PT Exellence Scale. All Rights Reserved <br>
                            Lorem ipsum dolor sit Amet<br>
                            Jakarta Selatan Indonesia 12xxx
                        </div>
                    </td>
                    <td>
                        <ul class="socmed">
                            <li><a href="#"><img src="http://develsync.com/interbat/assets/img/emailcon-fb.png" class="wid20"></a></li>
                            <li><a href="#"><img src="http://develsync.com/interbat/assets/img/emailcon-ig.png" class="wid20"></a></li>
                            <li><a href="#"><img src="http://develsync.com/interbat/assets/img/emailcon-wa.png" class="wid20"></a></li>
                            <li><a href="#"><img src="http://develsync.com/interbat/assets/img/emailcon-tw.png" class="wid20"></a></li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="row mt-20">
            <div class="col-md-12 text-footer">
                Anda memperoleh e-mail ini karena keanggotaan Anda pada Exellencescale.com. Anda bisa mengubah pengaturan notifikasi kapan pun. Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem.
            </div>
        </div>
    </section>


</body>
</html>