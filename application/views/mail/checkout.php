<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="zambonapp" />

	<title>Menunggu Pembayaran</title>
</head>

<body>
    <div>
        <?php
        $order_date = date_create($info['orders']->order_date);
        $orderDate  = date_format($order_date, 'l , d F Y, H:m');
        
        ?>
        <h2>Mohon segera selesaikan pembayaran Anda</h2>
        <p>
        Checkout berhasil pada tanggal <?php echo $orderDate?> WIB
        </p>
        <p>Detail Pesanan</p>
       <table>
            <?php
            foreach($info['orderDetail'] as $odeta){
            ?>
            <tr>
                <td style="padding-right: 10px;">
                    <?php echo $odeta->pruduct_name ?><br />
                    <?php echo $odeta->qty ?> x Rp <?php echo number_format($odeta->price,0) ?>
                </td>
                <td style="text-align: right;vertical-align: top;">Rp</td>
                <td style="text-align: right;vertical-align: top;"> <?php echo number_format($odeta->total_price,0)?></td>
            </tr>
            <?php
            }
            ?>
            <?php
            foreach($info['orderDetail2'] as $odeta2){
            ?>
            <tr>
                <td style="padding-right: 10px;">
                    <?php echo $odeta2->keterangan ?>
                </td>
                <td style="text-align: right;vertical-align: top;">Rp</td>
                <td style="text-align: right;vertical-align: top;"> <?php echo number_format($odeta2->price,0)?></td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="3"><hr /></td>
            </tr>
            <tr>
                <td style="padding-right: 10px;">
                    <b>Total Pembayaran</b>
                </td>
                <td style="text-align: right;vertical-align: top;">Rp</td>
                <td style="text-align: right;vertical-align: top;"> <?php echo number_format($info['orders']->total_price,0) ?></td>
            </tr>
       </table>
        <p>Pantau status pembayaran anda pada halaman Status Pembayaran.</p>
        <hr />
        <p>Email dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.</p>
    </div>
</body>
</html>