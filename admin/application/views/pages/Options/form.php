                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $option_id     = "";
                                    $option_name   = "";
                                    $option_type   = "";
                                    
                                    if (isset($options)){
                                        $option_id      = $options->option_id;
                                        
                                        $option_type    = $options->type;
                                        
                                        $option_name    = $optionsdesc[0]->option_name;
                                        
                                    }
                                    
                                    $attributes = array('class' => 'form-horizontal form-row-seperated', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");
                                                        
                                     echo form_open(site_url($urlBase.'/save'),$attributes);
                                    ?>
                                    <input type="hidden" name="id" id="id" value="<?php echo $option_id; ?>" />
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                            
                                                <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>
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
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('option_name')?><span class="required"> * </span> :
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="option_name" placeholder="" value="<?php echo  $option_name ?>"> 
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('parent')?><span class="required"> * </span> :</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="option_type">
                                                            <option value="0">None</option>
                                                            <?php foreach($optionchoose as $op){?> 
                                                            <option value="<?php echo $op->option_type ?>" <?php echo $option_type == $op->option_type ? "selected" : "" ?> ><?php echo trim($op->option_label) ?></option>
                                                            <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <table class="table table-hover table-bordered" id="listValue">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 75%;"><?php echo $this->lang->line('option_name')?></th>
                                                            <th style="width: 20%;"><?php echo $this->lang->line('order')?></th>
                                                            <th style="width: 5%;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="3">
                                                                <button type="button" class="btn btn-info" id="adddValue"><i class="fa fa-plus"></i></button>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
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