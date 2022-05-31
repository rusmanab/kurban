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
                        Add Address
                    </h1>
                    <hr class="dashed">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="container mtb-20 mt-30">
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
                        $action = 'myaccount/address/save';
                        if (isset($return_url)){
                            $action.= "?return_url=".$return_url;
                        }
                        
                        $att = array('class' => 'form-horizontal');
                        echo form_open($action,$att);
                        ?>
                            <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_alamat" id="nama_alamat" value="<?php echo $nama_alamat ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Penerima</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="recipient" id="recipient" value="<?php echo $recipient ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nomor Ponsel</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $phone_number ?>" />
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Propinsi</label>
                                <div class="col-sm-4">
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
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kota / Kab</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="city_id" name="city_id">
                                        <option value="0" selected="selected">--Pilih Kota / Kab--</option>
                                    </select>
                                    <input type="hidden" name="city" id="city" value="<?php echo $city ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="postal_code" id="postal_code" value="<?php echo  $postal_code; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form--label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="address" id="address"><?php echo $address?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Default</label>
                                <div class="col-sm-8">
                                    <label class="radio-inline">
                                        <input type="radio" name="is_default" id="inlineRadio1" value="0" checked> Tidak
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="is_default" id="inlineRadio2" value="1"> Ya
                                    </label>
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
    