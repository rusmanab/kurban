    <div class="container bg-white">
        <h1 class="title-product">
            Edit Password
        </h1>
        <hr class="dashed">
        <div class="related-product row product-featured">
            <div class="col-xl-12 col-md-12 col-xs-12">
                <?php
                $att = array('class' => 'form-horizontal');
                echo form_open('myaccount/address/save',$att);
                ?>
                    
                    <div class="form-group">
                        <label class="control-label">Kata Sandi Lama</label>
                        <div>
                            <input type="text" class="form-control" name="nama_alamat" id="nama_alamat"  />
                        </div>
                    </div>
                    <hr />
                    <div class="form-group">
                        <label class="control-label">Kata Sandi Baru</label>
                        <div>
                            <input type="text" class="form-control" name="nama_alamat" id="nama_alamat"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Konfirmasi Kata Sandi Baru</label>
                        <div>
                            <input type="text" class="form-control" name="nama_alamat" id="nama_alamat"  />
                        </div>
                    </div>
                    <hr />
                    <div class="form-group">
                        <div class="text-center button-edit-save">
                          
                          <button type="submit" class="btn btn-beli" name="submit">Save</button>
                        </div>
                      </div>
                <?php
                echo form_close();
                ?>
               
            </div>
        </div>
    </div>
    <d