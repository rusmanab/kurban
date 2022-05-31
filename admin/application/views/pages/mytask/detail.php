    <div class="row">   
        <div class="col-md-12">
            <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>
                        
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <?php echo $this->lang->line('billing_address') ?>
                                           
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <ul class="list-unstyled">
                                            <li><h4><?php echo $orderdetail->full_name ?></h4></li>
                                            <li><?php echo $orderdetail->address ?></li>
                                            <li><?php echo $orderdetail->phone_number ?></li>
                                            <li><?php echo $orderdetail->email ?></li>
                                            <?php //echo $orderdetail->nama_kota ?>
                                            <?php //echo $orderdetail->nama_provinsi ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <?php echo $this->lang->line('shipping_address') ?>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <ul class="list-unstyled">
                                            <li><h4><?php echo $orderdetail->nama_pemesan ?></h4></li>
                                            <li><?php echo $orderdetail->alamat ?></li>
                                            <li><?php echo $orderdetail->nomor_telepon ?></li>
                                            <li><?php echo $orderdetail->email ?></li>
                                            <li><?php echo $orderdetail->catatan ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>Item</td>
                                    <td>Qty</td>
                                </tr>   
                            </thead>
                            <tbody>
                                <?php foreach($dataorder as $o) {?> 
                                <tr>
                                    <td><?php echo $o->post_title . "<br /><small>[" . $o->options ."]<small>" ?></td>
                                    <td><?php echo $o->qty ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        
                    <div class="row">
                        <div class="col-md-12">
                        <?php 
                            $attr = array('class'=>'form-horizontal myform form', 'id'=>'frm-accept');
                            
                            echo form_open( site_url('mytask/assign2') ,$attr);
                            ?>
                            <input type="hidden" name="id" value="<?php echo $jobdesc->id ?>" />
                            <input type="hidden" name="noorder" value="<?php echo $noorder?>" />
                            <div class="form-body">
                                <h3 class="form-section">Verify Task</h3>
                                <div class="form-group">
                                    <label class="control-label col-md-2">
                                        Accept This <span class="required" aria-required="true"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <select name="accepted" class="form-control">
                                            <option value="2">Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> 
                            </div>
                                       
                            
                             <?php echo form_close() ?>
                            </div>
                        </div>            
                
                    </div>
            </div>
        </div>
    </div>