    <div class="row">
        <div class="col-md-12">
            <?php
            $brand_id   = "";
            $name       = "";
            $email      = "";
            $address1   = "";
            $address2   = "";
            $provinsi   = "";
            $kode_pos   = "";                        
            $notelp     = "";                        
            $tipe_unit  = "";                
            $date_buying= "";
            $serial_number = "";
            $model      = "";
            $outlet     = "";

            if (isset($guarantee)){
                $brand_id   = $guarantee->id;
                $name       = $guarantee->name;
                $email      = $guarantee->email;
                $address1   = $guarantee->address1;
                $address2   = $guarantee->address2;
                $provinsi   = $guarantee->provinsi;
                $kode_pos   = $guarantee->kode_pos;
                $notelp     = $guarantee->notelp;
                $tipe_unit  = $guarantee->tipe_unit;
                $date_buying = $guarantee->date_buying;
                $serial_number = $guarantee->serial_number;
                $model      = $guarantee->model;
                $outlet     = $guarantee->outlet;
            }

            $attributes = array('class' => 'form-horizontal form-row-seperated', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");
                                
                echo form_open(site_url($urlBase.'/save'),$attributes);
            ?>
            <input type="hidden" name="id" id="id" value="<?php echo $brand_id; ?>" />
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> 
                    </div>
                    <div class="actions btn-set">
                        <a href="<?php echo site_url($urlBase) ?>" id="back" class="btn default">
                            <i class="fa fa-angle-left"></i> Back</a>
                        <button class="btn btn-success" type="submit">
                            <i class="fa fa-check"></i> Save</button>
                            
                    </div>
                </div>
                
                <div class="portlet-body">     
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo $this->lang->line('name')?> :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="name" placeholder="" value="<?php echo $name ?>"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo $this->lang->line('email')?> :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="email" placeholder="" value="<?php echo $email ?>"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo $this->lang->line('address1')?> :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="address1" placeholder="" value="<?php echo $address1 ?>"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo $this->lang->line('address2')?> :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="address2" placeholder="" value="<?php echo $address2 ?>"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo $this->lang->line('provinsi')?> :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="provinsi" placeholder="" value="<?php echo $provinsi ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo $this->lang->line('kode_pos')?> :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="kode_pos" placeholder="" value="<?php echo $kode_pos ?>"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo $this->lang->line('notelp')?> :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="notelp" placeholder="" value="<?php echo $notelp ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo $this->lang->line('tipe_unit')?> :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="tipe_unit" placeholder="" value="<?php echo $tipe_unit ?>"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo $this->lang->line('date_buying')?> :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="date_buying" placeholder="" value="<?php echo $date_buying ?>"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo $this->lang->line('serial_number')?> :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="serial_number" placeholder="" value="<?php echo $serial_number ?>"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo $this->lang->line('model')?> :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="model" placeholder="" value="<?php echo $model ?>"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo $this->lang->line('outlet')?> :
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="outlet" placeholder="" value="<?php echo $outlet ?>"> 
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <?php
            echo form_close();
            ?>
            <!-- END Portlet PORTLET-->
        </div>
    </div>