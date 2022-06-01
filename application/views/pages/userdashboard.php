<main class="details">

	<section class="profiles">
		<div class="container">
			<div class="row">
				<div class="col-md-2 profilemobile">
					<img src="<?= base_url("assets/images/profile/");?>man.png" class="w-100">
				</div>
				<div class="col-md-10">
					<h2>Detail Profile</h2>
					<div class="row produk">
						<div class="col-md-12">
							<form class="row g-3" method="POST" action="<?php echo base_url("myaccount/update_profile");?>" enctype="multipart/form-data">
								<div class="col-md-6">
									<label for="full_name" class="form-label">Nama Lengkap</label>
									<input type="text" class="form-control" id="full_name" name="full_name" value="<?= $userInfo->full_name;?>">
								</div>
								<div class="col-md-6">
									<label for="phone_number" class="form-label">Nomor Telepon</label>
									<input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $userInfo->phone_number;?>" readonly>
								</div>
								<div class="col-md-6">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control" id="email" name="email" value="<?= $userInfo->email;?>">
								</div>
								<div class="col-12">
									<label for="address" class="form-label">Alamat</label>
									<input type="text" class="form-control" id="address" name="address" value="<?= $userInfo->address;?>">
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-md-12">
					<h2 class="mb-3">History Order</h2>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Tanggal Order</th>
								<th scope="col">Produk</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>24 Mei 2022</td>
								<td>#KURBANdiPelosok Kambing</td>
								<td><span class="badge bg-success">Paid</span></td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>24 Mei 2022</td>
								<td>#KURBANdiKota</td>
								<td><span class="badge bg-success">Paid</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>

</main>
