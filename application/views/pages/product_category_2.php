<main class="details">

	<section class="donate-top">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="<?= base_url('' . $catgory->image_big);?>" class="w-100">
				</div>
				<div class="col-md-8">
					<?= $catgory->category_desc ;?>
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
										$fileName = base_url("admin/assets/themes/default/no_image.png");
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
