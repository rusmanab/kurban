    <?php
    $error      = $data['error'];
    $error_no   = $data['error_no']; 
    ?>
    <main role="main" class="mains mains-2">
        <div class="container pd-20-10">
            <div class="row no-padding">
                <div class="col-md-12">
                    <div class="alert-box">
                    <?php if (!$error){ ?>
                    <div class="alert alert-success" role="alert"> 
                        <h2>Selamat</h2> 
                        Akun anda sudah aktif, email anda sudah terverifikasi.
                    </div>
                    <?php }else{ ?>    
                            <?php if ( $error_no == 404 ){?>
                                <div class="alert alert-success" role="alert"> 
                                    <h2>Opps.. Error</h2> 
                                    Verifikasi email gagal. link ada sudah tidak berlaku.  
                                </div>
                            <?php } ?>
                            <?php if ( $error_no == 500 ){?>
                                <div class="alert alert-success" role="alert"> 
                                    <h2>Opps.. Error</h2> 
                                    Verifikasi email gagal. coba bebera saat lagi, atau hubungi cs kami. 
                                </div>
                            <?php } ?>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
