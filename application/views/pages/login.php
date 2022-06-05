<main class="details">
	
	<section>
		<div class="dalil">
			<div class="row no-gutter">
				<div class="col-md-6" style="background: url(<?= base_url('assets/images/banner/');?>rendang.jpg); background-size: cover; background-position: center center; background-repeat: no-repeat;">
				</div>
				<div class="col-md-6 bg-login-white">
					<div class="p-5">
						<h2 class="mb-4">Selamat datang di kurbandipelosok.com. Silahkan login.</h2>
						<?php
						$info = $this->session->flashdata('info');                                   
						if(!empty($info)) {
							$type = $this->session->flashdata('error'); 
							$alert = '<div class="col-md-12">';
							$alert.= '<div class="alert alert-'.$type.'">';
							if ( $type == 'danger' ){
								$type = 'Error!';
							}else{
								$type = 'Succes';
							}
							$alert.= '<a href="" class="close" data-dismiss="alert">&times;</a>';
							$alert.= '<strong>'.$type.'</strong> '.$info.'</div>';
							$alert.= '</div>';
							echo $alert;
						}
						?>
						<?php
						$attr = array(
									'id'    => "login-step-one-form",
									'name'  => "login_form",
									'method'=> "post",
									);
						echo form_open('login_submit', $attr);
						?> 
							<div class="mb-3">
								<label for="email" class="form-label">Nomor Handphone</label>
								<input type="text" name="email" class="form-control" id="email" aria-describedby="email">
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" class="form-control" name="password" id="password">
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
						<div class="logreg">Belum punya Akun, silahkan <a href="<?= site_url('register');?>">Register disini!</a></div>
					</div>
				</div>
			</div>
		</div>	
	</section>
</main>

