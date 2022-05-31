<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
                <?php
                $show = "";
                if (isset($mcategoryHidden)){
                    $show = "show-on-click";
                } ;
                ?>
				<div class="category-nav <?php echo $show?>">
					<span class="category-header">Kategori <i class="fa fa-list"></i></span>
                    <?php
                    if ($categories){
                    ?>
					<ul class="category-list">
                        <?php foreach($categories as $c) {?>
						<li><a href="<?php echo site_url('product/category/'.$c->slug)?>"><?php echo $c->category_name; ?></a></li>
                        <?php } ?>

					</ul>
                    <?php
                    }
                    ?>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="<?php echo site_url('home')?>">Home</a></li>						
						<li><a href="<?php echo site_url('garansi')?>">Garansi</a></li>
                        <li><a href="#">About Us</a></li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->