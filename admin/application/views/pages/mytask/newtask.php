<?php 
            $attr = array('class'=>'form-horizontal myform', 'id'=>'frm-accept');
            
            echo form_open( site_url('mytask/assign') ,$attr);
            ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">New Task</h4>
</div>
<div class="modal-body">
    
            <input type="hidden" name="no_order" value="<?php echo $no_order ?>" />
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3">
                        Accept This <span class="required" aria-required="true"> * </span>
                    </label>
                    <div class="col-md-5">
                        <select name="accepted" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <?php /*<div class="form-group">
                    <label class="control-label col-md-3">
                        Star Date <span class="required" aria-required="true"> * </span>
                    </label>
                    <div class="col-md-5">
                           
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">
                        End Date <span class="required" aria-required="true"> * </span>
                    </label>
                    <div class="col-md-5">
                           
                    </div>
                </div> */ ?>
            </div>
            
           
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary btn-accept">Submit</button>
</div>
 <?php echo form_close() ?>