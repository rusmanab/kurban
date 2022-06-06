<main class="details">
	
	<section>
		<div class="dalil">
			<div class="row no-gutter">
				<div class="col-md-6" style="background: url(<?= base_url('assets/images/banner/');?>rendang.jpg); background-size: cover; background-position: center center; background-repeat: no-repeat;">
				</div>
				<div class="col-md-6 bg-login-white">
					<div class="p-5">
						<h2 class="mb-4">Terima Kasih sudah melakukan pembayaran.</h2>
						
						<?php
						$pesan = "Pembayaran gagal";
						$status = "Gagal";
						$alert  = 'alert-danger';
						$icon   = '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"></use></svg>';
						if ($statusPay){
							$pesan = "Pembayaran sudah kami terima, terima kasih";
							$status = "Berhasil";
							$icon   = '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"></use></svg>';
							$alert  = 'alert-success';
						}
						?>
						<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
							<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
								<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
							</symbol>
							<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
								<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
							</symbol>
							<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
								<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
							</symbol>
						</svg>

						<div class="alert <?=$alert?>" role="alert">
							<h4 class="alert-heading"><?= $icon ." ". $status ?></h4>
							<hr>
							<p class="mb-0"><?= $pesan ?></p>
						</div>
												
					</div>
				</div>
			</div>
		</div>	
	</section>
</main>

