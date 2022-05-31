<main class="details">

	<section class="donate-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mb-5">
					<h1 class="mb-3">#KurbandiPelosok</h1>
					<img src="<?= base_url('assets/images/banner/');?>child.jpg" class="w-100">
				</div>
				<div class="col-md-4">
					<img src="<?= base_url("assets/images/background/");?>kat-yukawa-K0E6E0a0R3A-unsplash-700x990.jpg" class="w-100">
				</div>
				<div class="col-md-8">
					<em><blockquote>&ldquo;Ada yang setiap saat bisa makan daging, ada yang Idul Adhanya selalu makan daging, ada pula yang seumur-umur belum pernah mencicipi daging.&rdquo;</blockquote></em>
					<h2>Kenapa harus #KURBANdiPelosok?</h2>
					<h4>Kurban Prioritas, Nusa Tenggara Timur</h4>
					<ol>
						<li>Di wilayah pelosok Nusa Tenggara Timur, Islam adalah agama minoritas (hanya 8.8% dari total penduduk menurut BPS 2021), menjadikan jarang/sedikit yang mengadakan Kurban di wilayah tersebut.</li>
						<li>Banyak penduduk pelosok yang jarang bahkan tidak merasakan daging kurban karena keterbatasan dan sulitnya akses ke daerah tersebut.</li>
						<li>Daging kurban-mu akan didistribusikan kepada yatim dan prasejahtera di pelosok wilayah Nusa Tenggara Timur.</li>
						<li>Memberdayakan peternak lokal di wilayah Nusa Tenggara Timur.</li>
					</ol>
					<div class="row produk">
						<?php foreach($products as $row){ ?>
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<?php
									$fileName = base_url($row->post_image_thumbs);
									
									if(file_exists($row->post_image_thumbs))
										$fileName = base_url($row->post_image_thumbs);
									else
										$fileName = base_url("assets/themes/themesv2/img/product/no_image.png");
									?>
									<img src="<?= $fileName;?>" class="w-100">
									<div class="detail-content">
										<h2><?= $row->post_title; ?></h2>
										<?php 
										$basePrice = $row->price;
										
										?>
										<h4>Rp. <?php echo number_format($basePrice, 0, '.', '.');?></h4>
										<form method="get" action="<?= site_url("cart/add/".$row->id)?>">
										<div class="qty">
												<span>Jumlah :</span>
												<input type="number" name="qty" id="qty" class="form-control" min="1" required="">
											</div>
											<input class="add_cart btn btn-primary mt-3" type="submit" value="Add to cart">
										</form>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						
						
					</div>
				</div>
			</div>
		</div>
	</section>

</main>
