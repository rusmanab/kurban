<style>
    .register_status .navbar {
        background: rgb(68, 68, 68);
        /* background: rgba(0, 0, 0, 0.78); */
        background: rgba(4, 107, 165, 1);
        box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
    }
</style>
<main class="details">
	
	<section>
		<div class="dalil">
			<div class="row no-gutter">
				<div class="col-md-6" style="background: url(<?= base_url('assets/images/banner/');?>rendang.jpg); background-size: cover; background-position: center center; background-repeat: no-repeat;">
				</div>
				<div class="col-md-6 bg-login-white">
					<div class="p-5">
                    <?php
                    $flasMsg = $this->session->flashdata('error_msg');
                    $error = $this->session->flashdata('error');
                    $code = $this->session->flashdata('code');
                    $success = $this->session->flashdata('success');
                    //  error_msg code
                    if ($flasMsg){
                    ?>
                    <div class="col-md-12">
                        <div class="alert-box">
                            <div class="alert alert-<?php echo $error?>" role="alert"> 
                                <h2><?php echo $success ?></h2>
                                <p><?php echo $flasMsg ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>				
					</div>
				</div>
			</div>
		</div>	
	</section>
</main>