
    <main role="main" class="mains mains-2">
        <div class="container pd-20-10">
            <div class="row no-padding">
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
    </main>
