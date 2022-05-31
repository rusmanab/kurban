    <?php
    //var_dump($orderSum);
    
    ?>
    <main role="main" class="mains mains-2">
        <div class="container pd-20-10 border-1">
            <div class="row">
                <div class="col-md-2 alignu325">
                    <img src="<?php echo base_url("assets/themes/themesv2/");?>img/padlock.png" class="padlocku325">
                </div>
                <div class="col-md-8">
                    <strong><h4 class="f-blue">Selalu waspada terhadap pihak tidak bertanggung jawab</h4></strong>
                    <ul>
                        <li>Jangan lakukan pembayaran dengan nominal yang berbeda dengan yang tertera pada tagihan kamu.</li>
                        <li>Jangan lakukan transfer di luar nomor rekening atas nama Mustela</li>
                    </ul>
                    <!-- <a href="#">Pelajari selengkapnya</a> -->
                </div>
            </div>
        </div>
        <div class="container bg-white mt-20 padlr-0">
            <div class="bluesuccess">Pembayaran via Transfer Bank</div>
            <div class="row rowlr-0">
                
                <div class="col-md-12 text-center">
                    <div><p class="f-blue">
                        <?php
                        $orderDate = $orderSum->order_date;
                        $stop_date = date('Y-m-d H:i:s',strtotime($orderDate));
                        $stop_date = date('j F Y - H:i', strtotime($stop_date . ' +1 day')) . ' WIB';
                        echo 'Silahkan bayarkan tagihan Anda sebelum: ' . $stop_date;
                        ?>
                    </p></div>
                    
                    <p class="success-mb-0">Jumlah tagihan:</p>
                    <?php
                    $totalTagihan = $orderSum->total_price - $orderSum->total_diskon;
                    ?>
                    <h1>Rp. <?php echo number_format($totalTagihan);?></h1>
                    <div class="success-backblack">Silahkan Transfer dengan nominal yang tertera berikut diatas.</div>
                    <p class="success-nomor">Nomor tagihan</p>
                    <h2 class="f-blue">#<?php echo $orderSum->no_order;?></h2>
                </div>
            
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
    </main>