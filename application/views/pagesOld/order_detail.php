
    <div class="container bg-white">
        <h1 class="title-product">
            Transaction
        </h1>
        <hr class="dashed">
        <div class="mt-20">
            <div class="card">
                
                <div class="card-header">Detail Order #<?php echo $orderSum->no_order;?></div>
               
                <div class="card-body">
                    Payment to : <br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Billing Address</h4>
                            <?php echo $orderSum->full_name ?><br />
                            <?php echo $orderSum->address_b ?><br />
                            <?php echo $orderSum->provinsi ?>, <?php echo $orderSum->kota ?> <?php echo $orderSum->postal_code_b ?> <br />
                            Phone <?php echo $orderSum->phone_number_b ?><br />
                                
                        </div>
                        <div class="col-md-6">
                            <h4>Shipment Address</h4>
                            <?php echo $orderSum->recipient ?><br />
                            <?php echo $orderSum->address ?><br />
                            <?php echo $orderSum->province ?>, <?php echo $orderSum->city ?> <?php echo $orderSum->postal_code ?> <br />
                            Phone <?php echo $orderSum->phone_number ?><br />
                        </div>
                    </div>
                   
                    <br>
                    <?php //foreach ($payment as $row) { ?>
                    Payment Method : Tranfer via <?php echo $orderSum->nama_pembayaran;?> <br>
                    Noted from Excellent : <?php // echo $row->comment;?>
                    <?php //} ?>
                    <hr>
                    <table class="table100">
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th class="text-right">Total</th>
                        </tr>
                        <?php 
                        $subTotal = 0;
                        foreach ($orderdet1 as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $row->pruduct_name;?></td>
                            <td><?php echo $row->qty;?></td>
                            <td>
                                <?php
                                $price = number_format($row->price);
                                if ( $row->diskon_price > 0 ){
                                    $price = "<strike>".number_format($row->price)."</strike> Rp. ";
                                    $price.= number_format($row->price - $row->diskon_price);
                                }
                                ?>
                                Rp. <?php echo $price;?>
                            </td>
                            <td class="text-right">Rp. <?php 
                                  
                                    echo number_format($row->total_price);?></td>
                        </tr>
                        <?php
                                $subTotal+= $row->total_price;
                            }
                        ?>
                        <tr>
                            <td colspan="3" class="text-right-s"><strong>Sub Total</strong></td>
                            <td class="text-right">Rp. <?php echo number_format($subTotal);?></td>
                        </tr>
                        <?php foreach($orderdet2 as $row) { ?>
                        
                        <tr>
                            <td colspan="3" class="text-right-s"><strong><?php echo $row->alias_name;?></strong></td>
                            <td class="text-right">Rp. <?php echo number_format($row->price);?></td>
                        </tr>
                            <tr>
                            <td colspan="3" class="text-right-s"><strong>Total</strong></td>
                            <td class="text-right">Rp. <?php 
                                    $totalTagihan = $orderSum->total_price - $orderSum->total_diskon;
                                    echo number_format($totalTagihan);?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div> 
                <!-- <div class="card-footer">Footer</div> -->

                <div class="container">
                    <h2 class="titlestatus">Status Pesanan</h2>
                 
                    <ul class="progress--bar">
                        <?php $rating_value = $orderSum->status_id; ?>
                        <li id="track1" class="<?php if ($rating_value <= 4) { echo 'active'; }else{ echo ''; } ?>">Pesanan sedang di proses</li>
                        <li id="track2" class="<?php if ($rating_value > 5) { echo 'active'; }else{ echo ''; } ?>">Pesanan telah di kirim</li>
                        <li id="track3" class="<?php if ($rating_value > 6) { echo 'active'; }else{ echo ''; } ?>">Pesanan telah di terima</li>
                        <li id="track4" class="<?php if ($rating_value >= 8) { echo 'active'; }else{ echo ''; } ?>">Pesanan telah selesai</li>
                    </ul>
                </div>

            </div>
            <div class="container bg-white mt-20 padlr-0">
                <div class="greysuccess">Daftar Nomor Rekening</div>
                <div class="row rowlr-01">
                    <?php
                    foreach($listBank as $bank){
                        $norek = empty($bank->norek)? "123123123" : $bank->norek;
                    ?>
                    <div class="col-md-6 no-padding border-1">
                        <div class="listbanksuccess">
                            <img src="<?php echo base_url($bank->image)?>">
                            Bank <?php echo $bank->bank_name;?>, <?php echo $bank->kcp;?> <br>
                            <strong><?php echo $norek;?></strong>
                        </div>
                    </div>
                       
                    <?php
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
            