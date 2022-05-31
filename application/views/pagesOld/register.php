<script src='https://www.google.com/recaptcha/api.js' async defer ></script>
<main role="main" class="mains mains-2">
        <div class="container pd-20-10">
            <div class="row">

                <div class="col-md-8">
                    Buat akun Excellent Scale Anda.
                </div>
                <div class="col-md-4 ml-wr f-8 goes-a">
                    Sudah menjadi member? <a href="<?php echo site_url("login"); ?>">Login</a> disini
                </div>
            </div>
        </div>
        <div class="container bg-white pd-20-10">
            <!-- <form method="POST" action=""> -->
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
            <div class="row no-padding">
                <div class="col-md-8">
                        <div class="form-group">
                            <label for="full_name">Full Name : <?php echo form_error('full_name'); ?></label>
                            <input type="text" class="form-control form-login" id="full_name" value="<?php echo $full_name?>" name="full_name" placeholder="Silahkan masukkan nama lengkap Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email : <?php echo form_error('email'); ?></label>
                            <input type="text" class="form-control form-login" id="email" value="<?php echo $email?>" name="email" placeholder="Silahkan masukkan email Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile : <?php echo form_error('ponsel'); ?></label>
                            <input type="text" class="form-control form-login" id="ponsel" value="<?php echo $ponsel?>" name="ponsel" placeholder="Silahkan masukkan nomor handphone Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password : <?php echo form_error('password'); ?></label>
                            <input type="password" class="form-control form-login" id="password" name="password" placeholder="Mohon isi kata sandi Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirm Password : <?php echo form_error('cpassword'); ?></label>
                            <input type="password" class="form-control form-login" id="cpassword" name="cpassword" placeholder="Mohon isi kata sandi Anda" required>
                        </div>
						
                </div>
                <div class="col-md-4">
                    <div class="text-center mt-10p goes-a">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">Saya telah membaca dan menyetujui Aturan Penggunaan dan Kebijakan Privasi Excellent Scale</label>
                        </div>
                        <div class="form-group form-check"> 
                            <input type="checkbox" class="form-check-input" name="newsletter" id="newsletter">
                            <label class="form-check-label" for="newsletter">Saya setuju untuk diberikan informasi terkait Excellent Scale newsletter</label>
                        </div>
						<div class="form-group form-check"> 
							<div class="g-recaptcha" data-sitekey="6LcXXD4aAAAAAKqbhCBrENReH91X3jdZ4NUn6WGu"></div>
						</div>
                        <button class="btn btn-login" type='submit' id="btn-regis">Register</button>
                        or <br>
                        <a href="<?php echo site_url("login");?>">Login</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close();?>
            <!-- </form> -->
        </div>
    </main>
	
