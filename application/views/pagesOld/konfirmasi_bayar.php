
        <div class="container bg-white">
            <div class="row">
                
                <div class="col-md-12">
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
                </div>

                <div class="col-md-12">
                    <h1 class="title-product">
                        Confirmation Payment
                    </h1>
                    <hr class="dashed">
                </div>
                <div class="col-md-12">
                    <h4 style="margin-top: 10px;">Confirm your payment</h4>
                    <div class="row">
                       <div class="col-md-12">
                            
                            <form method="POST" action="<?php echo site_url("myaccount/submit_payment_confirmation") ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="">No Order</label>
                                    <input type="text" class="form-control mb-3" id="no_order" name="no_order" placeholder="Masukkan No Order Anda" required>
                                </div> 
                                <div class="form-group">
                                    <label class="">Fullname</label>
                                    <input type="text" class="form-control mb-3" id="nama_pengirim" name="nama_pengirim" placeholder="Masukkan Nama Anda" required>
                                </div>
                                <div class="form-group">
                                    <label class="">Total Payment</label>
                                    <input type="text" class="form-control mb-3" id="nominal" name="nominal" placeholder="Masukkan Total Payment Anda" required>
                                </div>
                                <div class="form-group">
                                    <label class="">Total Payment</label>
                                    <input type="text" class="form-control mb-3" id="bank_pengirim" name="bank_pengirim" placeholder="Masukkan Bank Anda" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control mb-3" id="statusorder" name="statusorder" value="1">
                                </div>
                                <div class="form-group">
                                    <label class="">Total Payment</label>
                                    <input type="file" id="files" name="userfile" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" name="fileSubmit" value="UPLOAD">Submit</button>
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    