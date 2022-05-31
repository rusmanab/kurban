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
            <tr id="row0">
                <td>
                    <select name="option_value_id[]" class="form-control">
                    <?php foreach($optionval as $op){?> 
                        <option value="<?php echo $op->option_value_id ?>"><?php echo $op->name ?></option>
                    <?php } ?>
                    </select>
                    <input type="hidden" name="product_option_value_id[]" value="" />
                </td>
                <td>                   
                    <input type="text" name="optionQty[]" class="form-control input-xsmall inputNumber" />
                </td>
                <td>
                    <select name="optionPricePrefix[]" class="form-control">
                        <option value="+">+</option>
                        <option value="-">-</option>
                    </select> <br />
                    <input type="text" name="optionPrice[]" class="form-control" />
                </td>
                <td>
                    <select name="optionPointsPrefix[]" class="form-control">
                        <option value="+">+</option>
                        <option value="-">-</option>
                    </select> <br />
                    <input type="text" name="optionPoints[]" class="form-control input-xsmall" />
                </td>
                <td>
                    <input type="text" name="optionWeight[]" class="form-control input-xsmall" />
                </td>
                <td>
                    
                    <button type="button" class="btn btn-info minOptionValue" id="minOptionValue" data-url="" data-rowid="row0" data-id="0"><i class="fa fa-minus"></i></button>
                </td>
            </tr>    
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