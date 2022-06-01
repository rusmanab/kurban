<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
		
            <div class="container-fluid">
				
                <?php
                $msg_type   = $this->session->flashdata('msg_type');
                $msg_content= $this->session->flashdata('msg_content');
                
                $icon = "ok";
                if ($msg_type=='error'){
                    $icon = 'exclamation-sign';
                }
                if ($msg_type){
                    echo "<div class='alert alert-".$msg_type."' id='alert'>";
                    echo "<i class='icon-".$icon."'></i> <strong>".$msg_content."</strong>";
                    echo "</div>";
                }
                
                ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel-group accordion" id="accordion3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_0"> Custom </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_0" class="panel-collapse in">
                                    <div class="panel-body">
                                        <?php
                                            $attributes = array('class' => 'input valid-normal horizontal-form myform', 'id' => 'myform', "name"=>"myform","enctype"=>"multipart/form-data");
                                                    
                                            echo form_open(site_url($urlBase.'/save'),$attributes);
                                            
                                        ?>
                                            
                                            <div class="form-body">
                                                <input type="hidden" value="3" name="type" />
                                                <div class="form-group">
                                                    <label class="control-label">Menu Label</label>
                                                    <input type="text" class="form-control" name="menu" />
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Link</label>
                                                    <input type="text" class="form-control" name="link_menu" />
                                                    
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <input type="submit" class="btn btn-default mini" value="Add to menu" />
                                            </div>
                                        <?php echo form_close();?>
                                    
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1"> Pages </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php
                                            $attributes = array('class' => 'input valid-normal horizontal-form myform', 'id' => 'myform', "name"=>"myform","enctype"=>"multipart/form-data");
                                                    
                                            echo form_open(site_url($urlBase.'/save'),$attributes);
                                            
                                        ?>
                                        <input type="hidden" value="0" name="type" />
    									
                                        <div class="mt-checkbox-list">
                                        <?php foreach($pages as $p) { ?> 
                                            <label class="mt-checkbox mt-checkbox-outline"><?php echo $p->post_title?><input type="checkbox" value="<?php echo $p->id?>" name="menu[]" /><span></span></label>
                                        <?php } ?>
                                        </div>
                                        <hr />
                                        <input type="submit" class="btn btn-default mini" value="Add to menu" />
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2"> Category </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_2" class="panel-collapse collapse">
                                    <div class="panel-body" style="height:200px; overflow-y:auto;">
                                        <?php
                                            $attributes = array('class' => 'input valid-normal horizontal-form myform', 'id' => 'myform', "name"=>"myform","enctype"=>"multipart/form-data");
                                                    
                                            echo form_open(site_url($urlBase.'/save'),$attributes);
                                            
                                        ?>
                                        <input type="hidden" value="1" name="type" />
										<div class="mt-checkbox-list">
                                        <?php foreach($category as $c) { ?> 
                                            <label class="mt-checkbox mt-checkbox-outline"><?php echo $c->category_name?><input type="checkbox" value="<?php echo $c->id?>" name="menu[]" /> <span></span></label>
                                        <?php } ?>
                                        </div>
                                        <hr />
                                        <input type="submit" class="btn btn-default mini" value="Add to menu" />
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    
                        
                    </div>
                    <div class="col-md-8">
                        <!-- BEGIN PORTLET-->
							<div class="portlet box blue">
								<div class="portlet-title">
									<div class="caption">
                                        <i class="icon-<?php echo $Icon[1]?>"></i> <?php echo $title?> Structure
                                    </div>
                                    <div class="tools">
										<a class="collapse" href=""></a>										
										<a class="reload" href=""></a>
										<a class="remove" href=""></a>										
									</div>
                                   
								</div>
								<div class="portlet-body">     
                                     <div class="panel-group accordion" id="accordion_menu">
                                        <?php 
                                        $x = 0;
                                        foreach($menu as $m){ 
                                            $collapsed = "";
                                            $in = "in";
                                            if ($x > 0){
                                                $collapsed = "collapsed";
                                                $in = "collapse";
                                            }
                                            $x++
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled <?php echo $collapsed?>" data-toggle="collapse" data-parent="#accordion3" href="#menu_<?php echo $m->id ?>"> <?php echo $m->menu_label ?> </a>
                                                </h4>
                                            </div>
                                            <div id="menu_<?php echo $m->id ?>" class="panel-collapse <?php echo $in?>">
                                                <div class="panel-body">
                                                    <?php
                                                        $attributes = array('class' => 'input valid-normal horizontal-form myform', 'id' => 'myform', "name"=>"myform","enctype"=>"multipart/form-data");
                                                                
                                                        echo form_open(site_url($urlBase.'/update'),$attributes);
                                                        
                                                    ?>
                                                    <div class="form-body">
                                                    <input type="hidden" value="<?php echo $m->id ?>" name="id" />
                                                    
    												<div class="form-group">
														<label for="MenuPosition" class="control-label">Navigation Label</label>
														<input type="text" class="form-control" name="menu_label" value="<?php echo $m->menu_label ?>" />
													
													</div>
                                                    
                                                    
                                                    <div class="form-group">
														<label for="MenuPosition" class="control-label">Menu Position</label>
														<select name="menu_type" class="form-control input-small">
                                                            <option value="1" <?php echo $m->type == "1" ? "selected" : "" ?>>Header</option>
                                                            <option value="2" <?php echo $m->type == "2" ? "selected" : "" ?>>Footer</option>
                                                        </select>
														
													</div>
                                                    <div class="form-group">
														<label for="MenuPosition" class="control-label">Sort</label>
														<input type="number" class="form-control input-xsmall" name="order" value="<?php echo $m->order ?>" />
														
													</div>
                                                    <div class="form-group">
														<a href="<?php echo site_url('menu/delete/'.$m->id )?>">Delete Menu</a>
														
													</div>
                                                    <input type="submit" class="btn btn-default" value="Save" />
                                                    </div>
                                                    <?php echo form_close();?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                                               
                                     
                                                                    
								</div>
							</div>
							<!-- END PORTLET-->
                    </div>
                </div>
            </div>
