    <main role="main" class="user-hero">
        <div class="user-hero-image-container">
            <div class="profile-container">
                <div class="container">
                    <div class="row position-relative">
                        <div class="col-md-4 top-profile-mbl">
                            <h2>
                                GARANSI EXCELLENT SCALE
                            </h2>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-20">
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
            
            <div class="row bg-white profile-pd-20 mb-20">
                <div class="col-md-12">
                    <?php
                    $attr = array(
                            'class' => "contact100-form validate-form"
                            );
                    echo form_open('',$attr);
                    ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Pembeli *</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_pembeli" id="nama_pembeli" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat Email *</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" id="email" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat Rumah 1 *</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address1" id="address1" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat Rumah 2 *</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address1" id="address1" />
                        </div>
                    </div>
        			<?php
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </main>