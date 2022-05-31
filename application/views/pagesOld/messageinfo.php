<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-payment-info">
                    <div class="heading">
                        <div>Menunggu Pembayaran!</div>
                        <img src="<?php echo base_url($orderSum->bank_image) ?>" />
                    </div>
                    
                    <div class="info-bank">
                        <div class="head">
                            Informasi Pembayaran
                        </div>
                        <div class="body">
                            <div> 
                                <div class="keterangan">Bank</div><label>: <?php echo $orderSum->bank_name?></label>
                            </div>
                            <div>
                                <div class="keterangan">Kode Perusahaan </div><label>: 12346</label>
                            </div>
                            <div>
                                <div class="keterangan">Nomor Rekening</div> <label>: 445566788</label>
                            </div>
                            <div>
                                <div class="keterangan">Nama Rekening</div> <label>: PT Perusahaan</label>
                            </div>
                            <hr />
                            <div>
                                <div class="keterangan">Nilai Transfer</div> <label>: Rp <?php echo number_format( $orderSum->total_price)?></label>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>