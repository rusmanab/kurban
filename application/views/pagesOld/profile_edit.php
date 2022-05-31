                <div class="container bg-white">
                    <nav class="w-100">
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Edit Profile</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Alamat</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0 w-100" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="container mtb-20 mt-30">
                                <a href="<?php echo site_url('myaccount/address/add') ?>" class="btn btn-primary">Tambah Alamat</a>
                                <hr />
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Utama</th>
                                                <th style="min-width: 165px;">Penerima</th>
                                                <th>Alamat Pengiriman</th>
                                                <th>Daerah Pengiriman</th>
                                                <th style="min-width: 165px;"></th>
                                            </tr>    
                                        </thead>
                                        <tbody>
                                            <?php foreach($listAddress as $a){?> 
                                            <tr>
                                                <td><input type="radio" value="1" name="is_default" <?php echo $a->is_default ? "checked" :"" ?> /></td>
                                                <td><strong><?php echo $a->recipient ?></strong><br /><?php echo $a->phone_number ?></td>
                                                <td><strong><?php echo $a->nama_alamat ?></strong><br /><?php echo $a->address ?></td>
                                                <td><?php echo $a->province ?>,<?php echo $a->city ?><br />Indonesia</td>
                                                <td>
                                                    <a href="<?php echo site_url('myaccount/address/edit/'.$a->id)?>" class="btn btn-info btn-sm fa fa-pencil"> Ubah</a>
                                                    <a href="<?php echo site_url('myaccount/address/delete/'.$a->id)?>" class="btn btn-warning btn-sm fa fa-trash"> Hapus</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>