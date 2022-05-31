<?php
$sosmed = unserialize($webinfo->sosmed);
$webinfo = unserialize($webinfo->value);

?>

<div class="floatwa">
    <ul class="wa">
        <li><a href="https://api.whatsapp.com/send?phone=6281387238949&text=Hi%20Excellent%20Scale,%20saya%20ingin%20bertanya" target="_blank"><img src="<?= base_url("assets/images/");?>wa-penjualan.png" class="new-wa-float"></a></li>
        <li><a href="https://api.whatsapp.com/send?phone=6285107060728&text=Hi%20Excellent%20Scale,%20saya%20ingin%20bertanya" target="_blank"><img src="<?= base_url("assets/images/");?>wa-technical.png" class="new-wa-float"></a></li>
    </ul>
</div>

<section class="socmed">
    <?php
    if (isset($webinfo["email"])){?> 
    <div class="email"><a href="mailto:<?php echo $webinfo["email"]?>?cc=inti@cbn.net.id">
        <img src="<?= base_url("assets/images/");?>email-ico.png"></a></div>
    <?php } ?>
    <?php
    if (isset($sosmed["youtube"])){?> 
    <div class="youtube"><a href="<?php echo $sosmed["youtube"]?>" target="_blank"><img src="<?= base_url("assets/images/");?>youtube-ico.png"></a></div>
    <?php } ?>
</section>
<section>
    <footer>
        <div class="bg-white footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 text-justify">  <!-- col-1-footer-->
                        <img src="<?php echo base_url("assets/themes/themesv2");?>/img/logo-footer.png" class="img70 mb-20" alt="">
                        <p>Excellent scale adalah sebuah merk produk timbangan digital yang bergaransi pasti selama 1 tahun  termasuk service dan sparepart. Memberi Jaminan Bebas Biaya  selama masa garansi.  Serta sebuah produk yang handal dengan harga yang cukup terjangkau dan kompetitif.</p>
                    </div>
                    <div class="col-md-6 col-1-footer">
                        <div class="footerpt">
                            <h2>PT. Indah Sakti</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Showroom & Service center</span>
                                    JL. Sunter Jaya I No 3 Komplek Ruko Danau Sunter Mas Blok E No 8A Jakarta Utara 14350
                                    - Indonesia  
                                    <table>
                                        <tr>
                                            <td>Telp</td>
                                            <td>: 021 - 6530 1662 , 6530 1484, 0813 8723 8949</td>
                                        </tr>
                                        <tr>
                                            <td>Fax</td>
                                            <td>: 021 - 6530 1484</td>
                                        </tr>
                                        <tr>
                                            <td>Website</td>
                                            <td>: www.excellent-scale.com</td>
                                        </tr>
                                        <tr>
                                            <td>E-mail</td>
                                            <td>: sales@excellent-scale.com<br>inti@cbn.net.id</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <span>Workshop</span>
                                    Pantai Indah Dadap Blok L no.5  
                                    <table>
                                        <tr>
                                            <td>Telp</td>
                                            <td>: 021 - 5595 3550 , 5596 0157, 5595 3511</td>
                                        </tr>
                                        <tr>
                                            <td>Fax</td>
                                            <td>: 021 - 5596 0157</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h2>Information</h2>
                        <div class="row footer-menu">
                            <div class="col-md-12">
                                <a href="<?php echo base_url()."home/faq";?>">FAQs</a>
                                <br><br>
                                <div>
                                    <span>Jam Operasional</span>
                                    <table>
                                        <tr>
                                            <td>Senin s.d Jum'at </td>
                                            <td>: 08.00 - 17.00 WIB</td>
                                        </tr>
                                        <tr>
                                            <td>Sabtu </td>
                                            <td>: 08.00 - 13.00 WIB</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
						<div class="row footer-menu">
                            <div class="col-md-6">
								<a href="https://play.google.com/store/apps/details?id=com.haribima.excellentscale">
									<img src="https://excellent-scale.com/assets/themes/themesv2/img/googleplay.jpg" class="img-fluid" width="135" alt="googleplay">
								</a>                               
							</div>
    						
                        </div>
                    </div>
                </div>
                <div class="bottom-footer text-center">
                    <?php //foreach ($footercontent as $e) { ?>
                    <h3>Official Shipping Partner<?php //echo $e['name']; ?></h3>
                    <ul class="shipping-partner">
                        <li><img src="<?php echo base_url("assets/themes/themesv2") ?>/img/pcp.png" class="img70" alt=""></li>
                        <li><img src="<?php echo base_url("assets/themes/themesv2") ?>/img/pos.png" class="img70" alt=""></li>
                        <li><img src="<?php echo base_url("assets/themes/themesv2") ?>/img/jne.png" class="img70" alt=""></li>
                        <li><img src="<?php echo base_url("assets/themes/themesv2") ?>/img/ems.png" class="img70" alt=""></li>
                    </ul>
                    <?php //} ?>
                    <hr class="hr-blue">
                    <span class="blues">Copyright &copy; 2020 PT. Excellent-Scale, All Rights Reserved.</span>
                </div>
            </div>
        </div>
    </footer>
</section>

<script>
    $(document).ready(function () {
        var url = window.location;
        $('ul.main-menu a[href="index.php/'+ url +'"]').parent().addClass('active');
        $('ul.main-menu a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script>
      
