<nav class="navbar navbar-expand-md navbar-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="<?= site_url();?>">
			<img src="<?= base_url('assets/images/');?>logo-white.png">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav me-auto mb-2 mb-md-0">
				<!-- <li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled">Disabled</a>
				</li> -->
			</ul>
			<form class="d-flex" role="search">
				<ul class="navbarmenu">
					<li>
						<a class="nav-link" href="<?= site_url();?>">Home</a>
					</li>
					<li>
						<a class="nav-link" href="<?= site_url('history');?>">History</a>
					</li>
					<li>
						<a class="nav-link" href="https://tcare.id/" target="_blank">T.CARE</a>
					</li>
					<?php 
					$userId = $this->session->userdata('f_userid');
					if( $userId ){
						?>
						<li><a class="nav-link" href="<?php echo site_url("myaccount")?>">Welcome, <?php echo $this->session->userdata('f_username');?></a></li>

						<li><a class="nav-link navlogin" href="<?php echo site_url('myaccount/logout') ?>">Logout</a></li>
						<li><a class="nav-link" href="cart"><span class="fa fa-shopping-cart"></span></a></li>
					<?php }else{ ?>
						<li>
							<a class="nav-link navlogin" href="<?= site_url('login');?>">Login</a>
						</li>
					<?php } ?>
				</ul>
			</form>
		</div>
	</div>
</nav>
