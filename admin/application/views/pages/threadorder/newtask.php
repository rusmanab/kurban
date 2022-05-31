    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-<?php echo $icon?>"></i><?php echo $formtitle ?> </div>
                        
                    </div>
                    <div class="portlet-body">
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
                        <h3>Hasil Ukur</h3>
                        <?php echo $descFitter->description ?>
                    <div class="row">
                        <div class="col-md-12">
                        <?php 
                            $attr = array('class'=>'form-horizontal myform form', 'id'=>'frm-accept');
                            
                            echo form_open( site_url('threadorder/accept') ,$attr);
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