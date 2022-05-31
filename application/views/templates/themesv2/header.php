    <section>

        <div class="top-header-nav">

            <div class="container">

                <div class="row">

                    <div class="col-md-6 hide-mobile">

                        <ul class="top-header-nav-left">

                            <?php $class_value = '1';//ceil($statusmode[0]['mode']); ?>

                            <li class="<?php if ($class_value >= 1) { echo ''; }else{ echo 'hide'; } ?>"><a href="<?php echo base_url('cart/index');?>">Shopping Cart</a></li>

                            <li><a href="<?php echo site_url('privacy-policy');?>">Policy</a></li>
			    <li><a href="<?php echo site_url('software-timbangan');?>">Software Timbangan</a></li>
                        </ul>

                    </div>

                    <div class="col-md-6 text-right">

                        <ul class="top-header-nav-right">

                            <?php 

                            $userId = $this->session->userdata('f_userid');

                            if( $userId )

                            {

                                ?>

                                <li><a href="<?php echo site_url("myaccount")?>">Welcome, <?php echo $this->session->userdata('f_username');?></a></li>

                                <li><a href="<?php echo site_url('myaccount/logout') ?>">Logout</a></li>

                            <?php }else{ ?>

                                <li>Welcome Customer!</li>

                                <li><a href="<?php echo site_url("login"); ?>">Login</a></li>

                                <li><a href="<?php echo site_url("register"); ?>">Register</a></li>

                            <?php } ?>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

        <div class="container">

            <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

                <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top ">

                    <a class="navbar-brand" href="<?php echo base_url()."index.php"; ?>"><img src="<?php echo base_url("assets/themes/themesv2/") ?>img/logo.png" class="img70" alt=""></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">

                        <span class="navbar-toggler-icon"></span>

                    </button>

                    <div class="collapse navbar-collapse" id="navbarCollapse">

                        <div class="form-inline mt-2 mt-md-0 mr-auto margin-auto psrelformar">

                            <div class="formarquee"><marquee behavior="scroll" direction="left" scrollamount="3">Best Solution of Weight | Timbangan Digital Bergaransi Pasti</marquee></div>

                            <!--<div class="titleExcellent">Best Solution of Weight</div>-->

                            <!--<div class="subtitleExcellent">Timbangan Digital Bergaransi Pasti</div>-->

                            <?php

                            $info = unserialize($webinfo->value);

                            ?>

                            <ul class="for-contact-top">



                                <li>Contact Us :</li>

                                <li><i class="fab fa-whatsapp"></i>&nbsp;&nbsp;<?php echo $info['phone'];?></li>

                                <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $info['fax'];?></li>

                            </ul>

                            

                            <?php

                            if ($categories){

                            ?>

        					<ul class="menus menus-1">

                                <?php foreach($categories as $c) {?>

        						<li onclick="location.href = '<?php echo site_url('product/category/'.$c->slug);?>';"><a href="<?php echo site_url('product/category/'.$c->slug)?>"><?php echo $c->category_name; ?></a></li>

                                <?php } ?>

        

        					</ul>

                            <?php

                            }

                            ?>

                        </div>

                        <?php $class_value = "1";//ceil($statusmode[0]['mode']); ?>

                        <?php
			$catalogMode = 0;
                        if ($catalogMode == 0){

                            

                        $totalCart = $cart->totalOrder($userId);

                       

                        $totalQty = 0;

                        $grand_total= 0;

                        if ($totalCart){

                            $totalQty = !empty($totalCart->totalQty) ? $totalCart->totalQty : "0";

                            $grand_total = number_format($totalCart->grand_total,0);

                        }

                        ?>

                        <div class="<?php if ($class_value >= 1) { echo 'shopcart'; }else{ echo 'hide'; } ?>">

                            <span class="handle pull-left">

                                <a href="<?php echo site_url('cart/index');?>"><img src="<?php echo base_url("assets/themes/themesv2/") ?>img/cart.png" class="img30px" alt=""></a>

                            </span>

                            <span class="number-shopping-cart"><?php echo $totalQty;?></span>

                            <span class="titless">My Cart</span>

                            <p class="text-shopping-cart cart-total-full"> Rp. <?php echo $grand_total;?> </p>

                        </div>

                        <?php } ?>

                    </div>

                </nav>

            </header>

        </div>

    </section>

    <section>

        <div class="list-white-cart">

            <div class="container">

                <ul class="main-menu">

                    <?php

                    foreach($headerMenu as $h){

                    ?>

                    

                    <li><a href="<?php echo site_url($h->slug);?>"><?php echo $h->menu_label ?></a></li>

                    <?php } ?>

                    

                </ul>

                <div class="search-form mobile-hide">

                    <?php echo form_open('home/search') ?>

                    <input type="text" class="form-control form-control-3" name="keyword" placeholder="Find Product in here">

                    <button class="btn btn-blue-search" type="submit" name="search_submit"><i class="fas fa-search"></i></button>

                    <?php echo form_close() ?>

                </div>

            </div>

        </div>

        <div class="formarquee deskhide"><marquee behavior="scroll" direction="left" scrollamount="3">Best Solution of Weight | Timbangan Digital Bergaransi Pasti</marquee></div>

    </section>

    

    



    

