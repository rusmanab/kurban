            <tr id="row<?php echo $rowid ?>">
                <td>
                    <select name="option_value_id[]" class="form-control">
                    <?php foreach($optionval as $op){?> 
                        <option value="<?php echo $op->option_value_id ?>"><?php echo $op->name ?></option>
                    <?php } ?>
                    </select>
                    <input type="hidden" name="product_option_value_id[]" value="" />
                </td>
                <td>                   
                    <input type="text" name="optionQty[]" class="form-control input-xsmall" />
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
                    <button type="button" class="btn btn-info minOptionValue" id="minOptionValue" data-url="" data-rowid="row<?php echo $rowid ?>" data-id="0"><i class="fa fa-minus"></i></button>
                </td>
            </tr>  