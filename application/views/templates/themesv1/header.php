<header>
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="<?php echo site_url('home')?>">
							<img src="<?php echo base_url("assets/themes/themesv1")?>/img/logo.png" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form>
							<input class="input search-input" type="text" placeholder="Cari Produk">
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
                        <li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
								
                                <strong class="text-uppercase">
                                    <a href="<?php echo site_url('cart')?>">Keranjang <i class="fa fa-caret-down"></i></a>
                                </strong>
                                
							</div>
                            <div>
                                <?php
                                $userId = $this->session->userdata('f_userid');
                                if ($userId){
                                    $total = number_format($cart->totalPrice($userId),0);
                                }else{
                                    $total = 0;
                                }
                                
                                ?>
                                <a href="<?php echo site_url('cart')?>"><span class="pull-left">Rp</span><span class="pull-right"><?php echo $total ?></span></a>
                            </div>
							<!--<a href="#" class="text-uppercase">12</a>
							<ul class="custom-menu">
								<li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>
								<li><a href="#"><i class="fa fa-user-plus"></i> Buat Akun Baru</a></li>
							</ul>
                            -->
						</li>
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">Akun Saya <i class="fa fa-caret-down"></i></strong>
							</div>
                            <?php
                            $userId = $this->session->userdata('f_userid');
                            if (!$userId){
                            ?>
							<a href="<?php echo site_url('login')?>" class="text-uppercase">Login</a> / <a href="<?php echo site_url('register')?>" class="text-uppercase">Join</a>
                            <?php 
                            }else{
                            $username = $this->session->userdata('f_username');    
                            ?>
                             <a href="<?php echo site_url('myaccount')?>" class="text-uppercase welcome-uname"><?php echo $username?></a>  
                             <ul class="custom-menu">
								<li><a href="<?php echo site_url('myaccount')?>"><i class="fa fa-user-o"></i> My Account</a></li>
								<li><a href="<?php echo site_url('myaccount/wishlist')?>"><i class="fa fa-heart-o"></i> My Wishlist</a></li>								
								<li><a href="<?php echo site_url('myaccount/logout')?>"><i class="fa fa-unlock-alt"></i> Logout</a></li>
							</ul>
                            <?php } ?>
							
						</li>
						<!-- /Account -->
						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
    