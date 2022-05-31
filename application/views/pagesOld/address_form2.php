    
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
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title-product">
                        Confirmation Payment
                    </h1>
                    <hr class="dashed">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="container mtb-20 mt-30">
                        <?php
                        $attributes = array(
                                    'class' => "form-horizontal" ,
                                    'method'=> "post"
                                    );
                        echo form_open(site_url('myaccount/profile_update'),$attributes);
                        ?>
                            <input type="hidden" name="id" value="<?php echo $userInfo->id;?>" />
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="customername">Full Name :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="<?php echo $userInfo->full_name;?>" value="<?php echo $userInfo->full_name;?>">
                                </div>
                            </div>
                          
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="email">Email :</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $userInfo->email; ?>" value="<?php echo $userInfo->email; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="number">Mobile :</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="<?php echo $userInfo->phone_number; ?>" value="<?php echo $userInfo->phone_number; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="number">Province :</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="province_id" name="province_id">
                                        <option value="0" selected="selected">--Pilih Provinsi--</option>
                                        <?php foreach($provinces as $p => $k){ ?>
                                        <option value="<?php echo $k->province_id ?>" <?php echo $userInfo->provinsi_id == $k->province_id ? "selected" : "" ?>><?php echo $k->province ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="province" id="province" value="<?php echo $userInfo->provinsi ?>" />  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="number">Kota / Kab :</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="city_id" name="city_id"></select>
                                    <input type="hidden" name="city" id="city" value="<?php echo $userInfo->kota ?>" />
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="number">Kode Pos :</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="postal_code" name="postal_code" placeholder="<?php echo $userInfo->phone_number; ?>" value="<?php echo $userInfo->phone_number; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="number">Alamat :</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="address" id="address"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-2">
                                  <button type="submit" class="btn btn-primary" name="submit">Save</button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    
    
    <div class="page-header">
      <h3>Tambah Alamat <small>Subtext for header</small></h3>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Form Alamat</h3>
        </div>
        <div class="panel-body">
            <?php
            
            $id          = 0;
            $nama_alamat = '';
            $recipient   = '';
            $phone_number= '';
            $province_id = '';
            $province    = '';
            $city_id     = '';
            $city        = '';
            $postal_code = '';
            $address     = '';
            
            if ($detail){
                $id             = $detail->id;
                $nama_alamat    = $detail->nama_alamat;
                $recipient      = $detail->recipient;
                $phone_number   = $detail->phone_number;
                $province_id    = $detail->province_id;
                $province       = $detail->province;
                $city_id        = $detail->city_id ;
                $city           = $detail->city;
                $postal_code    = $detail->postal_code;
                $address        = $detail->address;
            }
            
            $att = array('class' => 'form-horizontal');
            echo form_open('myaccount/address/save',$att);
            ?>
                <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />     
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="col-sm-10 form-control" name="nama_alamat" id="nama_alamat" value="<?php echo $nama_alamat ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Penerima</label>
                            <div class="col-sm-8">
                                <input type="text" class="col-sm-10 form-control" name="recipient" id="recipient" value="<?php echo $recipient ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nomor Ponsel</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $phone_number ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Propinsi</label>
                            <div class="col-sm-8">
                                 
                                <select class="form-control" id="province_id" name="province_id">
                                    <option value="0" selected="selected">--Pilih Provinsi--</option>
                                <?php
                                    
                                foreach($provinces as $p => $k){
                                ?>
                                    <option value="<?php echo $k->province_id ?>" <?php echo $province_id == $k->province_id ? "selected" : "" ?>><?php echo $k->province ?></option>
                                <?php } ?>
                                </select>
                                <input type="hidden" name="province" id="province" value="<?php echo $province ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Kota / Kab</label>
                            <div class="col-sm-8"> 
                                <select class="form-control" id="city_id" name="city_id"></select>
                                <input type="hidden" name="city" id="city" value="<?php echo $city ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Kode Pos</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="postal_code" id="postal_code" value="<?php echo  $postal_code; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Default</label>
                            <div class="col-sm-6">
                                <label class="radio-inline">
                                  <input type="radio" name="is_default" id="inlineRadio1" value="0" checked> Tidak
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="is_default" id="inlineRadio2" value="1"> Ya
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-8">
                    <textarea class="form-control" name="address" id="address"><?php echo $address?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Save</button>
                    </div>
                  </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
    
    