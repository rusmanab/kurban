    <div class="form-group">
        <label class="col-md-3 control-label">Required :
        </label>
        <div class="col-md-9">
            <select name="optionrequired" class="form-control">
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select>
        </div>
    </div>
    <table class="table table-bordered table-hover table-striped" id="listOptionProduct">
        <thead>
            <tr>
                <th>Option Value</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Points</th>
                <th>Weight</th>    
                <th></th>             	 	
            </tr>
        </thead>
        <tbody>
            <?php $i=0; foreach($productoptionValue as $ov){ ?> 
            <tr id="row<?php echo $i?>">
                <td>
                    <select name="option_value_id[]" class="form-control">
                    <?php foreach($optionval as $op){?> 
                        <option value="<?php echo $op->option_value_id ?>" <?php echo $op->option_value_id == $ov->option_value_id ? "selected" : "" ?> ><?php echo $op->name ?></option>
                    <?php } ?>
                    </select>
                    <input type="hidden" name="product_option_value_id[]" value="<?php echo $ov->product_option_value_id ?>" />
                </td>
                <td>                   
                    <input type="text" name="optionQty[]" class="form-control input-xsmall inputNumber" value="<?php echo $ov->quantity ?>" />
                </td>
                <td>
                    <select name="optionPricePrefix[]" class="form-control">
                        <option value="+" <?php echo $ov->price_prefix == "+"? "selected" : "" ?>>+</option>
                        <option value="-" <?php echo $ov->price_prefix == "-" ? "selected" : "" ?>>-</option>
                    </select> <br />
                    <input type="text" name="optionPrice[]" class="form-control" value="<?php echo $ov->price ?>" />
                </td>
                <td>
                    <select name="optionPointsPrefix[]" class="form-control">
                        <option value="+" <?php echo $ov->points_prefix == "+" ? "selected" : "" ?>>+</option>
                        <option value="-" <?php echo $ov->points_prefix == "-" ? "selected" : "" ?>>-</option>
                    </select> <br />
                    <input type="text" name="optionPoints[]" class="form-control input-xsmall" value="<?php echo $ov->points ?>" />
                </td>
                <td>
                    <input type="text" name="optionWeight[]" class="form-control input-xsmall" value="<?php echo $ov->weight ?>" />
                </td>
                <td>
                    
                    <button type="button" class="btn btn-info minOptionValue" id="minOptionValue" data-url="<?php echo site_url('options/deleteProductOption') ?>" data-rowid="row<?php echo $i?>" data-id="<?php echo $ov->product_option_value_id ?>"><i class="fa fa-minus"></i></button>
                </td>
            </tr>    
            <?php $i++; } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"></td>
                <td>
                    <button type="button" class="btn btn-info" id="addOptionValue" data-url="<?php echo site_url('options/loadrowoption') ?>" ><i class="fa fa-plus"></i></button>
                    
                </td>
            </tr>
        </tfoot>
    </table>