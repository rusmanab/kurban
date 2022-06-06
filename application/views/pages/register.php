<script src='https://www.google.com/recaptcha/api.js' async defer ></script>
<main class="details">
	
	<section>
		<div class="dalil">
			<div class="row no-gutter">
				<div class="col-md-6" style="background: url(<?= base_url('assets/images/banner/');?>child.jpg); background-size: cover; background-position: center center; background-repeat: no-repeat;">
				</div>
				<div class="col-md-6 bg-login-white">
					<div class="p-5">
						<h2 class="mb-4">Selamat datang di kurbandipelosok.com. Silahkan Register.</h2>
						<?php if($this->session->flashdata('success')){ ?>
						<div class="alert alert-success" id="success-alert">
							<a href="" class="close" data-dismiss="alert">&times;</a>
							<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
						</div>
						<?php }else if($this->session->flashdata('error')){  ?>
							<div class="alert alert-danger" id="error-alert">
								<a href="" class="close" data-dismiss="alert">&times;</a>
								<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
							</div>
						<?php } ?>  
					
						<?php
						$full_name 	= set_value('full_name');
						$email  	= set_value('email');
						$ponsel     = set_value('ponsel'); 
					
						?>
						<?php echo form_open('register_submit', array('id' => 'form-register'));?>
							<div class="mb-3">
								<label for="text" class="form-label">Nama Lengkap <?php echo form_error('full_name'); ?></label>
                            	<input type="text" class="form-control" id="text" aria-describedby="text" value="<?php echo $full_name?>" name="full_name" placeholder="Silahkan masukkan nama lengkap Anda" required>
							</div>
							<div class="mb-3">
								<label for="nomor" class="form-label">Nomor Telepon <?php echo form_error('ponsel'); ?></label>
                            	<input type="text" class="form-control" id="nomor" aria-describedby="nomor" value="<?php echo $ponsel?>" name="ponsel" placeholder="Silahkan masukkan nomor handphone Anda" required>
                   
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email <?php echo form_error('email'); ?></label>							
                            	<input type="email" class="form-control" id="email" aria-describedby="email" value="<?php echo $email?>" name="email" placeholder="Silahkan masukkan email Anda" required>
							</div>
							<div class="mb-3">
								<label for="password">Password <?php echo form_error('password'); ?></label>
                            	<input type="password" class="form-control" id="password" name="password" placeholder="Mohon isi kata sandi Anda" required>
							</div>
							<div class="mb-3">
								<label for="cpassword">Confirm Password <?php echo form_error('cpassword'); ?></label>
                            	<input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Mohon isi kata sandi Anda" required>
							</div>
							<div class="mb-3">
								<div class="g-recaptcha" data-sitekey="6LcCR0sgAAAAAOCSl9zytn7xGIGzZztTdYSPAWXq"></div>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
						<div class="logreg">Sudah punya Akun, silahkan <a href="<?= site_url('login');?>">Login disini!</a></div>
					</div>
				</div>
			</div>
		</div>	
	</section>

</main>

	
