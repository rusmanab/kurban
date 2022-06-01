                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $id                 = "";
                                    $client_name        = "";
                                    $client_image       = "";
                                    $client_url         = "";
                                    $client_description = "";
                                    $personal_image     = "";
                                    $contact_name       = "";
                                    $foreword           = "";
                                    $position           = "";
                                                            
                                    if (isset($client)){
                                        $id                 = $client[0]->id;
                                        $client_name        = $client[0]->client_name;
                                        $client_image       = ROOT . $client[0]->client_image;
                                        $client_url         = $client[0]->client_url;
                                        $client_description = $client[0]->client_description;
                                        $contact_name       = $client[0]->contact_name;
                                        $personal_image     = ROOT . $client[0]->personal_image;
                                        $foreword           = $client[0]->foreword ;
                                        $position           = $client[0]->position;    
                                    }  
                                    
                                    $attributes = array('class' => 'form-horizontal form-row-seperated', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");
                                                        
                                     echo form_open(site_url($urlBase.'/save'),$attributes);
                                    ?>
                                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                                        <div class="portlet">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>
                                                <div class="actions btn-set">
                                                    <a href="<?php echo site_url($urlBase) ?>" id="back" class="btn default">
                                                        <i class="fa fa-angle-left"></i> Back</a>
                                                    <button class="btn btn-default" type="submit">
                                                        <i class="fa fa-check"></i> Save</button>
                                                   
                                                    
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tabbable-bordered">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active">
                                                            <a href="#tab_general" data-toggle="tab"> <?php echo $this->lang->line('general_info') ?> </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_meta" data-toggle="tab"> <?php echo $this->lang->line('personal_info') ?> </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab_general">
                                                            
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label"> <?php echo $this->lang->line('client_name') ?>:
                                                                        <span class="required"> * </span>
                                                                    </label>
                                                                    <div class="col-md-10">
                                                                        <input type="text" class="form-control" name="client_name" value="<?php echo $client_name?>" placeholder=""> </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label"> <?php echo $this->lang->line('client_image') ?>:
                                                                        <span class="required"> * </span>
                                                                    </label>
                                                                    <div class="col-md-10">
                                                                        <div class="controls">
                                                                            <div class="fileinput fileinput-<?php echo $client_image ? "exists":"new" ?>" data-provides="fileinput">
                                                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> 
                                                                                    <?php
                                                                                    if ($client_image){
                                                                                        echo '<img src="'.$client_image.'" alt="" />';
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                                <div>
                                                                                    <span class="btn default btn-file">
                                                                                        <span class="fileinput-new"> Select image </span>
                                                                                        <span class="fileinput-exists"> Change </span>
                                                                                        <input type="file" name="userfile"> </span>
                                                                                    <a href="javascript:;" class="btn default   fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">Image type .jpg,.png,.jpeg, Max 4Mb</span>
                                                                            </div>
                                										</div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label"> <?php echo $this->lang->line('client_url') ?>:
                                                                        <span class="required"> * </span>
                                                                    </label>
                                                                    <div class="col-md-10">
                                                                        <input type="text" class="form-control" name="client_url" value="<?php echo $client_url?>" placeholder=""> </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label"> <?php echo $this->lang->line('client_description') ?>:
                                                                        <span class="required"> * </span>
                                                                    </label>
                                                                    <div class="col-md-10">
                                                                        <textarea class="form-control" name="client_description"><?php echo $client_description?></textarea>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab_meta">
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label"><?php echo $this->lang->line('contact_name') ?>:</label>
                                                                    <div class="col-md-10">
                                                                        <input type="text" class="form-control maxlength-handler" name="contact_name" value="<?php echo $contact_name?>" maxlength="100" placeholder="">
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label"><?php echo $this->lang->line('position') ?>:</label>
                                                                    <div class="col-md-10">
                                                                        <input type="text" class="form-control maxlength-handler" name="position" value="<?php echo $position?>" maxlength="100" placeholder="">
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label"><?php echo $this->lang->line('personal_image') ?>:</label>
                                                                    <div class="col-md-10">
                                                                        <div class="controls">
                                                                            <div class="fileinput fileinput-<?php echo $personal_image ? "exists":"new" ?>" data-provides="fileinput">
                                                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> 
                                                                                    <?php
                                                                                    if ($personal_image){
                                                                                        echo '<img src="'.$personal_image.'" alt="" />';
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                                <div>
                                                                                    <span class="btn default btn-file">
                                                                                        <span class="fileinput-new"> Select image </span>
                                                                                        <span class="fileinput-exists"> Change </span>
                                                                                        <input type="file" name="personal_image"> </span>
                                                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="clearfix margin-top-10">
                                                                                <span class="label label-danger">NOTE! </span>
                                                                                <span>
                                                                                Please select image if you want changeit.
                                                                                </span> 
                                                                            </div>
                                										</div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label"><?php echo $this->lang->line('foreword') ?>:</label>
                                                                    <div class="col-md-10">
                                                                        <textarea class="form-control maxlength-handler" rows="8" name="foreword" maxlength="1000"><?php echo $foreword?></textarea>
                                                                        
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>