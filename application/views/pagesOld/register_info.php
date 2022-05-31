<div class="section">
		<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- section title -->
			<div class="col-md-12">
                <div class="alert-box">
                <?php if ($error){ ?>
                <div class="alert alert-danger" role="alert"> 
                    <h2>Selamat</h2> 
                    Akun anda sudah aktif, email anda sudah terverifikasi.
                </div>
                <?php }else{ ?>    
                    <div class="alert alert-success" role="alert"> 
                        <h2>Selamat</h2> 
                    Akun anda sudah aktif, email anda sudah terverifikasi.  
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <!-- row -->
            <?php if ($latestProduk){?>
            <!-- Product Single -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Produk Terbaru</h2>
					</div>
				</div>
				<?php foreach($latestProduk as $l){?>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<img src="<?php echo base_url($l->post_image_thumbs)?>" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-name"><a href="<?php echo site_url('product/' . $l->url_slug) ?>"><?php echo $l->post_title?></a></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
                            <?php
                            $price = number_format($l->price);
                            ?>
							<h4 class="product-price">Rp. <?php echo $price?></h4>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>
								<a class="acart" href="<?php echo site_url('product/' . $l->url_slug) ?>"> Lihat Produk</button></a>
							</div>
						</div>
					</div>
				</div>
                <?php } ?>
            </div>
            <!-- End Product Single -->
            <?php } ?>
    </div>
</div>
