        <div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
						  <i class="icon-<?php echo $Icon[0]?>"></i> <?php echo $title?> <small><?php echo $title?>  </small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo site_url('home')?>">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="<?php echo site_url($sublink)?>"><?php echo $sub?></a>
								<i class="icon-angle-right"></i>
							</li>
                            <li>
                                <a href=""><?php echo $title?></a> 
								
							</li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="portlet box blue">
								<div class="portlet-title">
									<div class="caption">
                                        <i class="icon-<?php echo $Icon[1]?>"></i><?php echo $title?>
                                    </div>
									<div class="tools">
										<a class="collapse" href=""></a>	
										<a class="remove" href=""></a>
									</div>
								</div>
								<div class="portlet-body form">
                                    <?php
                                  
                        				if (isset($category) ) {
                        					foreach ($category as $xrow){
                                                $id                 = $xrow->id;
                                                $category_name         = $xrow->category_name;
                                                
                        					}
                        				}else{
                        				    $id                 = set_value('id');
                                            $category_name         = set_value('category_name');                                            
                        				
                        				}
                        			?>
                                    <?php
                                        $attributes = array('class' => 'input valid-normal horizontal-form myform', 'id' => 'myform', "name"=>"myform","enctype"=>"multipart/form-data");
                                                
                                        echo form_open(site_url($urlBase.'/save'),$attributes);
                                        
                                    ?>
                                        <hr />         
                                        
                                        <input type="hidden" name="id" id="id" value="<?php echo (!empty($id) ? $id : ''); ?>" />
                                        										
										                                
                                       
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <?php
                                                $u=form_error('category_name');
                                                ?>
                                                <div class="control-group<?php echo $u ? " error":"" ?>">
            										<label class="control-label"><?php echo $this->lang->line('category_name') ?> <span class="required">*</span></label>
            										<div class="controls">
														<input type="text" placeholder="<?php echo $this->lang->line('category_name') ?>" name="category_name" id="category_name" class="required span12  m-wrap" value="<?php echo $category_name; ?>" maxlength="30" />
                                                        <?php if ($id){
                                                        ?>
                                                        <input type="hidden" name="category_name_edit" id="category_name_edit" value="<?php echo $category_name; ?>" />    
                                                        <?php };
            											 echo $u; ?>    
            										</div>
            									</div>
                                            </div> 
                                                                                      
                                        </div>
								        <button class="btn blue" type="submit"><i class="icon-ok"></i> Save</button>
								        <button class="btn" type="button" id="btn-frmcancel">Cancel</button>
										
                            			<?php
                                        echo form_close();
                                       ?>
                                      
                                </div>
                        </div>
                    </div>
                </div>
        </div>