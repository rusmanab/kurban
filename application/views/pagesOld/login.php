<main role="main" class="mains mains-2">
        <div class="container pd-20-10">
            <div class="row">
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
                <div class="col-md-8">
                    Selamat datang di Excellent Scale! Silahkan login.
                </div>
                <div class="col-md-4 ml-wr f-8 goes-a">
                    Member baru? <a href="<?php echo site_url("register"); ?>">Register</a> disini
                </div>
            </div>
        </div>
        <div class="container bg-white pd-20-10">
           
            <?php
            $attr = array(
                        'id'    => "login-step-one-form",
                        'name'  => "login_form",
                        'method'=> "post",
                        'class' => "js__login-form-one"
                        );
            echo form_open('login_submit', $attr);
            ?> 
            <div class="row no-padding">
                <div class="col-md-8">
                        <div class="form-group">
                            <label for="email">Username or Email :</label>
                            <input type="text" class="form-control form-login" id="email" name="email" placeholder="Silahkan masukkan email Anda" Required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input type="password" class="form-control form-login" id="password" name="password" placeholder="Mohon isi kata sandi Anda" Required>
                        </div>
                        
                </div>
                <div class="col-md-4">
                    <div class="text-center mt-10p goes-a">
                        <button type="submit" class="btn btn-login" name="btnSubmit">Login</button>
                        or <br>
                        <a href="<?php echo site_url('register'); ?>">Register</a>
                    </div>
                </div>
            </div>
            <?php echo form_close();?>
        </div>
        <div class="text-center mt-20 f-8 forgot-password"><a href="<?php echo site_url('forgot_password'); ?>">Lupa Kata Sandi ?</a></div>
    </main>