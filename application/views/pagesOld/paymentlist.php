<div class="container bg-white">
    <h1 class="title-product">
        Transaction
    </h1>
    <hr class="dashed">
    
    <?php
   
    foreach ($transaksi as $row) { 
        $date = new DateTime($row->order_date);
        $dateOrder = $date->format('d F Y');     
    ?>
    <div class="related-product row product-featured">
        <div class="col-xl-12 col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    No. Tagihan : #<?php echo $row->no_order;?>
                    <span class="f-white text-right f-right">Status : <?php echo $row->nama_status ?></span>
                </div>
                <div class="card-body">
                    <table class="table100">
                        <tr>
                            <td width="30%">Date Order : <?php echo $dateOrder;?> WIB</td>
                            <td width="40%" class="text-center">Rp. <?php 
                             $total_price = $row->total_price - $row->total_diskon;
                                                    echo number_format($total_price);?></td>
                            <td width="30%" class="text-center">
                                <a href="<?php echo site_url("myaccount/order_detail/".$row->no_order);?>" role="button" class="btn btn-lihatdetail">
                                Lihat Detail
                                </a>
                                <a href="<?php echo site_url("myaccount/payment_confirmation");?>" role="button" class="btn btn-lihatdetail1">
                                Konfirmasi Pembayaran
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>