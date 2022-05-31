<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="lolkittens" />

	<title>Tagihan</title>
</head>

<body>
<table style="border-spacing:0;border-collapse:collapse;font-size:14px" height="100%" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody><tr>
        <td style="border-collapse:collapse" valign="top" align="center">
            <table style="border-spacing:0;border-collapse:collapse;font-size:14px;max-width:600px" width="600" border="0" cellspacing="0" cellpadding="0">

                <tbody>
                <tr>
                    <td style="border-collapse:collapse">

                        <table style="border-spacing:0;border-collapse:collapse;font-size:14px;border-bottom:1px solid #dee2e3;width:100%!important" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody><tr>
                                <td style="border-collapse:collapse;width:50%" valign="middle" height="49" width="50%">
                                    <a href="" target="_blank">
                                    <img src="<?php echo base_url('assets/themes/modelines/img/logo.png')?>" alt="modelines" class="CToWUd" width="100"></a>
                                </td>
                                <td class="m_3785503336415073848txt-right" style="border-collapse:collapse;text-align:right;width:50%" valign="bottom" height="49" width="50%">
                                    <a href="" target="_blank">
                                    <img src="" alt="modelines App" style="vertical-align:bottom" width="150"></a>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>

                <tr>
                    <td style="border-collapse:collapse">
                        <table style="border-spacing:0;border-collapse:collapse;font-size:14px" border="0" cellspacing="0" cellpadding="0" align="left">                            
                            <tbody><tr>
                                <td style="border-collapse:collapse" valign="top">
                                    <div style="margin-top:20px"><strong class="m_3785503336415073848txt-big" style="font-size:16px">Hi <?php echo $memberProfile->full_name ?>,</strong></div>
                                    <div style="margin-top:10px;margin-bottom:20px">
                                        Terima kasih telah berbelanja dengan kami! Kami informasikan bahwa seluruh pesanan Anda dengan nomor order <strong style="color:#f36f21"><?php echo $noorder?></strong> telah sukses diterima. Semoga Anda senang berbelanja di <a href="" target="_blank" >modelines!</a>
                                    </div>
                                    
                                </td>
                            </tr>
                            
                            <tr>
                                <td style="border-collapse:collapse;padding:0" align="left">
                                    <div style="margin-top:20px;margin-bottom:10px;margin-right:10px"><strong>Rincian pesanan:</strong></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-collapse:collapse;border:1px dashed #e7ebed;border-bottom:none">
                                    <table style="border-spacing:0;border-collapse:collapse;font-size:14px" width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                                        <tbody>
                                            <?php  // $profile 
                                            $subtotal = 0;
                                            foreach($orderDetail as $det){
                                                $subtotal+= $det->total_price;
                                                $image = base_url($det->post_image_thumbs);
                                                if (!@getimagesize($image)){
                                                    $image = base_url('assets/themes/modelines/img/logo.png');
                                                }
                                            ?>
                                            <tr>
                                                <td style="border-collapse:collapse;padding-top:10px;padding-bottom:10px" valign="top" height="120" align="center">
                                                    <a href="" target="_blank">
                                                        <img src="<?php echo $image ?>" alt="image-notavailable" style="width:120px">
                                                    </a>
                                                </td>
                                                <td style="border-collapse:collapse;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px" valign="top">
                                                    <div style="margin-bottom:5px"><a href="" style="text-decoration:none;color:#292929" target="_blank" ><?php echo $det->post_title ?></a></div>
                                                    <div style="margin-bottom:5px;color:#646464">Jumlah: <?php echo $det->qty ?></div>
                                                    
                                                    
                                                </td>
                                                <td style="border-collapse:collapse;padding-top:10px;padding-right:10px" valign="top" align="right">
                                                    <strong>RP <?php echo number_format($det->total_price) ?></strong>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-collapse:collapse;border:1px dashed #e7ebed">
                                    <div>
                                        <table style="border-spacing:0;border-collapse:collapse;font-size:14px;width:100%!important" width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                                            <tbody><tr>
                                                <td style="border-collapse:collapse;padding-top:10px;padding-right:10px;color:#646464;width:80%" valign="top" align="right">Subtotal:</td>
                                                <td style="border-collapse:collapse;padding-top:10px;padding-right:10px;color:#292929;min-width:140px" valign="top" align="right">RP <?php echo number_format($subtotal) ?></td>
                                            </tr>
                                            <?php /*<tr>
                                                <td style="border-collapse:collapse;padding-top:5px;padding-right:10px;color:#646464;width:80%" valign="top" align="right">Ongkos kirim:</td>
                                                <td style="border-collapse:collapse;padding-top:5px;padding-right:10px;color:#292929;min-width:140px" valign="top" align="right">RP 0 </td>
                                            </tr>
                                            <tr>
                                                <td style="border-collapse:collapse;padding-top:5px;padding-right:10px;color:#646464;width:80%" valign="top" align="right">Voucher:</td>
                                                <td style="border-collapse:collapse;padding-top:5px;padding-right:10px;color:#292929;min-width:140px" valign="top" align="right">RP 0</td>
                                            </tr> */ ?>
                                            <tr>
                                                <td style="border-collapse:collapse;padding-top:10px;padding-right:10px;font-size:16px;width:80%" valign="top" align="right"><strong>Total:</strong></td>
                                                <td style="border-collapse:collapse;padding-top:10px;padding-right:10px;font-size:16px;color:#646464;min-width:140px" valign="top" align="right"><strong style="color:#f36f21">RP <?php echo number_format($orders['total_price']) ?> </strong></td>
                                            </tr>
                                            <tr>
                                                <td style="border-collapse:collapse;width:80%" valign="top" align="right"></td>
                                                <td style="border-collapse:collapse;padding-top:5px;padding-right:10px;padding-bottom:10px;font-size:13px;color:#646464;min-width:140px" valign="top" align="right">Harga sudah termasuk PPN</td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                </td>
                            </tr>

                            
                            <tr>
                                <td style="border-collapse:collapse;padding:0;colspan=2" align="left">
                                    <table style="border-spacing:0;border-collapse:collapse;font-size:14px;width: 100%;" border="0" cellspacing="0" cellpadding="0" align="left">
                                        <tbody>
                                        <tr>
                                            <td style="border-collapse:collapse" valign="top">
                                                <strong>Silahkan lakukan pembayaran melalui transfer.</strong>
                                                <ul>
                                                    <li><p><strong>BCA</strong></p>
                                                        <p>No. Rekening: xxxxxx</p>
                                                        <p>a.n: PT. Lorem Ipsum</p>
                                                        <p>Berita : No Invoice</p>
                                                    </li>
                                                </ul>
                                                <p>Untuk konfirmasi pembayaran, silakan kunjungi link berikut:</p>
                                                <p><a href="<?php echo site_url('order/confirmpayment') ?>"><?php echo site_url('order/confirmpayment') ?></a></p>
                                                <p style="padding-top:30px">
                                                Hormat Kami <br />
                                                modelines
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="background: #514F57;text-align: center;padding: 20px;color: #ffff;">
                                                    Ini adalah notifikasi otomatis. Jangan membalas langsung email ini.
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody>
</table>
</body>
</html>