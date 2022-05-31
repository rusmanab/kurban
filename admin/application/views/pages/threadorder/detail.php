        <div class="order-detail-project">
          <div class="row item-detail">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Client</h4>
                              <hr>
                              <?php
                              $avatar = base_url("assets/themes/default/avatar_default.jpg");
                              if (@getimagesize($orderinfo->avatar_thumbs)){
                                $avatar = $orderinfo->avatar_thumbs;
                              }
                              ?>
                              <img src="<?php echo $avatar?>" class="img-designer" alt="">
                              <div class="information">
                                    <h4 class="name"><?php echo $orderinfo->full_name ?></h4>                            
                              </div>  
                        </div>
                    </div>
                    <div class="row">
                        <br />
                        <div class="col-md-12">
                            <h4>Fitter</h4>
                            <hr>
                            <?php
                            if (@getimagesize($hasilukur->avatar_thumbs)){
                                $avatar = $hasilukur->avatar_thumbs;
                             }
                             ?>
                            <img src="<?php echo $avatar?>" class="img-designer" alt="">
                            <div class="information">
                                <h4 class="name"><?php echo $hasilukur->full_name ?>;</h4>                            
                            </div>               
                        </div>
                    </div>
                      
                      
                             
                </div>
                <div class="col-md-9 brief">
                     <?php
                     if ($comments){
                        $imageChoosen = "";
                        $image_thumbsC= "";
                     ?>
                      
                     <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                            <i class="fa fa-<?php echo $icon?>"></i>Penjelasan Design</div>
                            
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab" aria-expanded="true"> <?php echo $this->lang->line('list_desain') ?> </a>
                                </li>
                                <?php
                                if ($desainerDesc->is_close != 1){
                                ?>                              
                                <li class="">
                                    <a href="#tab_1_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add_desain') ?> </a>
                                </li>                             
                                <?php
                                }else{ ?>
                                <li class="">
                                    <a href="#tab_1_3" data-toggle="tab" aria-expanded="false"><i class="fa fa-check"></i> Desaign Choose <?php //echo $this->lang->line('add_desain') ?> </a>
                                </li>    
                                <?php }?>                
                            </ul>
                        </div>
                        <div class="portlet-body form">  
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="tab_1_1">
                                    <div class="portfolio-content portfolio-1">                                    
                                        <div id="js-grid-juicy-projects" class="cbp">
                                            <?php foreach($image as $i){?>  
                                            <?php
                                            if ( $i->id == $desainerDesc->jobdesc_image){
                                                $imageChoosen = $i->image; 
                                                $image_thumbsC= $i->image_thumbs;
                                            }
                                             
                                            ?>                                     
                                              <div class="cbp-item graphic">
                                                <div class="cbp-caption">
                                                    <div class="cbp-caption-defaultWrap">
                                                        <img src="<?php echo ROOT . ($i->image_thumbs)?>" alt=""> </div>
                                                    <div class="cbp-caption-activeWrap">
                                                        <div class="cbp-l-caption-alignCenter">
                                                            <div class="cbp-l-caption-body">
                                                                <a href="<?php echo ROOT . ($i->image)?>" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">view larger</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center"><?php echo $i->title?></div>
                                            </div><?php } ?>                                        
                                        </div>                                    
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_1_2">
                                    <?php
                                    $attributes = array('class' => 'form-horizontal form-row-seperated', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data");
                                   
                                    echo form_open(site_url($urlBase.'/addDesain'),$attributes);
                                    ?>
                                        <input type="hidden" name="noorder" value="<?php echo $desainerDesc->no_order ?>" />
                                        <input type="hidden" name="jobdesc_id" value="<?php echo $desainerDesc->id ?>" />
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"><?php echo $this->lang->line('post_title')?> :
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="title" placeholder="" value=""> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label class="col-md-3 control-label"><?php echo $this->lang->line('image')?> :
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="controls">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> 
                                                                
                                                                </div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="userfile"> </span>
                                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                </div>
                                                            </div>
                  										</div>
                                                    </div>
                                                </div>
                                        </div>   
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">
                                                    <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                        </div>     
                                    <?php
                                    echo form_close();
                                    ?>
                                </div>
                                <?php
                                if ($desainerDesc->is_close == 1){
                                ?>  
                                <div class="tab-pane fade" id="tab_1_3">
                                    <?php // $image_thumbsC ?>
                                    <img src="<?php echo ROOT . ($imageChoosen)?>" class="img-responsive" />
                                    
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                      
                      <hr>
                      <?php 
                     
                      echo $comments[0]->comment
                      ?>
                      <br>
                      <h4>Komentar</h4>
                      <hr>
                      <?php
                      for($i=1; $i < count($comments); $i++){?>
                      <div class="item-komentar">
                        <?php
                        $avatar = base_url($comments[$i]->avatar_thumbs);
                        if (!@getimagesize($avatar)){
                            $avatar = base_url("assets/themes/default/avatar_default.jpg");
                        }
                        ?>
                        <img src="<?php echo $avatar?>" class="img-designer" alt="">
                        <div class="komentar">
                          <p class="desk">
                            <?php echo $comments[$i]->comment?>
                          </p>
                          <p class="name">
                            Posted by:  <?php echo !empty($comments[$i]->full_name) ? $comments[$i]->full_name:"User" ?>
                          </p>
                          <hr />
                        </div>
                        <div class="clearfix"></div>
                      </div> 
                      <?php } 
                      if ($desainerDesc->is_close != 1){
                      ?>
                      <div class="item-komentar">
                        <div class="komentar">
                          <?php
                          $attr = array("class"=>'form-horizontal');
                          echo form_open(site_url('threadorder/submitcomment'), $attr )
                          ?>
                          <input type="hidden" value="<?php echo $comments[0]->id?>" name="parent_id" /> 
                          <input type="hidden" value="<?php echo $noorder?>" name="noorder" /> 
                          <textarea class="form-control" name="comment" id="comment" cols="30" rows="4">Balas komentar ...</textarea>
                          <br />
                          <button type="submit" class="pull-right btn btn-prm btn-default btn-reply"><i class="fa fa-envelope"></i> Submit Komentar</button>
                          </form>
                        </div>
                      </div>
                      <?php } }else{ ?>
                      <h4>Deskripsi Fitter</h4>
                      <hr/>
                      <?php
                      echo $hasilukur->description;
                      ?>
                      <hr/>
                      <h4>First Comment[Designer]</h4>
                      <?php
                      $attr = array("class"=>'form-horizontal');
                      echo form_open(site_url('threadorder/submitcomment'), $attr )
                      ?>
                       <input type="hidden" value="<?php echo $noorder?>" name="noorder" /> 
                                    <input type="hidden" name="jobdescid" value="<?php echo $desainerDesc->id ?>" />
                                    
                      <div class="tabbable-bordered">
                          <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_general" data-toggle="tab"> General </a>
                            </li>
                            <li>
                                <a href="#tab_images" data-toggle="tab"> Images </a>
                            </li>                    
                          </ul>
                          <div class="tab-content">
                                <div class="tab-pane active" id="tab_general">
                                   <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="15" name="comment"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_images">
                                    <div class="alert alert-success margin-bottom-10">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                        <i class="fa fa-warning fa-lg"></i> Image type and information need to be specified. 
                                    </div>
                                    <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
                                        <a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn btn-success" data-upload="<?php echo site_url('mytask/doupload')?>">
                                            <i class="fa fa-plus"></i> Select Files </a>
                                        <a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn btn-primary">
                                        <i class="fa fa-share"></i> Upload Files </a>
                                    </div>
                                    <div class="row">
                                        <div id="tab_images_uploader_filelist" class="col-md-12 col-sm-12"> </div>
                                    </div>
                                    <table class="table table-bordered table-hover" id="listImage">
                                        <thead>
                                            <tr role="row" class="heading">
                                                <th width="8%"> Image </th>
                                                <th width="25%"> Label </th>
                                                <th width="10%"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // id
                                            $image = "";
                                            if ($image){
                                            foreach($image as $i){
                                            ?>
                                            <tr id="<?php echo $i->id ?>">
                                                <td>
                                                    <a href="<? echo ROOT . $i->image?>" class="fancybox-button" data-rel="fancybox-button">
                                                        <img class="img-responsive" src="<? echo ROOT . $i->image_thumbs?>" alt=""> </a>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="image[]" value="<? echo $i->title?>"> 
                                                </td>                                                                                                                        
                                                <td>
                                                    <a href="javascript:;" class="btn btn-default btn-sm removeimage" data-url="<?php echo site_url('mytask')?>" data-trid="<?php echo $i->id ?>" data-id="<?php echo $i->id ?>">
                                                    <i class="fa fa-times"></i> Remove </a>
                                                </td>
                                            </tr>
                                            <?php } } ?>                                                                                                                                
                                        </tbody>
                                    </table>
                                </div>
                          </div>
                      </div>
                      <br />
                      <button type="submit" class="btn green">Submit</button>
                      <?php 
                      echo form_close();
                      } ?>
                      
                </div>
          </div>
      </div>  
      