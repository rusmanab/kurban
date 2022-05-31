           
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							My Profile <small>your detail profile</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.html">Home</a> 
								<i class="icon-angle-right"></i>
							</li>							
							<li><a href="#">My Profile</a></li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
                
                
                <?php
                $tipe_pesan = $this->session->flashdata('tipe');
                $pesan = $this->session->flashdata('pesan');
                if ( $tipe_pesan && $pesan ){
                ?>  
                    <div class="row-fluid">
                          <div class="alert alert-<?php echo $tipe_pesan?>">
                                <?php echo $pesan ?>
                          </div>
                    </div>
                <?php
                }
                ?>
                
				<div class="row-fluid profile">
					<div class="span12">
						<!--BEGIN TABS-->
                        
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1_2" data-toggle="tab">Profile Info</a></li>
								<li><a href="#tab_1_3" data-toggle="tab">Account</a></li>
							</ul>
							<div class="tab-content">
								
								<div class="tab-pane profile-classic row-fluid active" id="tab_1_2">
									<div class="span2">
                                        <img src="<?php echo $avatar?>" alt="" />
                                    </div>
									<ul class="unstyled span10">
										<li><span>First Name:</span> <?php echo $fname?></li>
										<li><span>Last Name:</span> <?php echo $lname?></li>
										<li><span>Mobile Number:</span> <?php echo $hp?></li>						
										<li><span>Email:</span> <a href="#"><?php echo $email?></a></li>
                                        <li><span>Website:</span> <a href="#"><?php echo $website?></a></li>
										<li><span>Address:</span> <a href="#"><?php echo $address?></a></li>
										<li><span>About:</span><?php echo $about?></li>
									</ul>
								</div>
								<!--tab_1_2-->
								<div class="tab-pane row-fluid profile-account" id="tab_1_3">
									<div class="row-fluid">
										<div class="span12">
											<div class="span3">
												<ul class="ver-inline-menu tabbable margin-bottom-10">
													<li class="active">
														<a data-toggle="tab" href="#tab_1-1">
														<i class="icon-cog"></i> 
														Personal info
														</a> 
														<span class="after"></span>                                    
													</li>
													<li ><a data-toggle="tab" href="#tab_2-2"><i class="icon-picture"></i> Change Avatar</a></li>
													<li ><a data-toggle="tab" href="#tab_3-3"><i class="icon-lock"></i> Change Password</a></li>
												</ul>
											</div>
											<div class="span9">
												<div class="tab-content">
													<div id="tab_1-1" class="tab-pane active">
														<div style="height: auto;" id="accordion1-1" class="accordion collapse">
                                                             <?php
                                                                $attributes = array('class' => 'frm-profile',"method"=>"post", 'id' => 'frm-profile', "name"=>"frm-profile");
                                                                        
                                                                echo form_open(site_url('profile/save'),$attributes);
                                                            ?>
                                                                <div class="control-group">
                                                                    <label class="control-label">First Name</label>
                                                                    <div class="controls">
                                                                        <input type="text" placeholder="John" class="m-wrap span8" name="fname" id="fname" value="<?php echo $fname?>" />
																    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Last Name</label>
																    <div class="controls">
                                                                        <input type="text" placeholder="Doe" class="m-wrap span8" name="lname" id="lname" value="<?php echo $lname?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Mobile Number</label>																
                                                                    <div class="controls">
                                                                        <input type="text" placeholder="+1 646 580 DEMO (6284)" class="m-wrap span8" name="ph" id="ph" value="<?php echo $hp?>" />																
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Email</label>																
                                                                    <div class="controls">
                                                                        <input type="text" placeholder="john@example.com" class="m-wrap span8" name="email" id="email" value="<?php echo $email?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Website Url</label>
                                                                    <div class="controls">
                                                                        <input type="text" placeholder="http://www.mywebsite.com" class="m-wrap span8" name="website" id="website" value="<?php echo $website?>" />
                                                                    </div>
                                                                </div>
																<div class="control-group">
                                                                    <label class="control-label">Address</label>
                                                                    <div class="controls">
                                                                        <textarea class="span8 m-wrap" rows="3"  name="address" id="address"><?php echo $address?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">About</label>
                                                                    <div class="controls">
                                                                        <textarea class="span8 m-wrap" rows="3"  name="about" id="about"><?php echo $about?></textarea>
                                                                    </div>
                                                                </div>
																<div class="submit-btn">
                                                                    <button class="btn green" id="save-profile" type="submit">Save Changes</button>
																</div>
															</form>
														</div>
													</div>
													<div id="tab_2-2" class="tab-pane">
														<div style="height: auto;" id="accordion2-2" class="accordion collapse">
															<?php
                                                                $attributes = array('class' => 'frm-chava',"method"=>"post");
                                                                        
                                                                echo form_open_multipart(site_url('profile/change_avatar'),$attributes);
                                                            ?>
                                                           	    
																<div class="controls">
																	<div class="thumbnail" style="width: 291px; height: 170px;">
																		<img src="<?php echo $avatar?>" alt="" style="width: 291px; height: 170px;" />
																	</div>
																</div>
																<div class="space10"></div>
																<div class="fileupload fileupload-new" data-provides="fileupload">
																	<div class="input-append">
																		<div class="uneditable-input">
																			<i class="icon-file fileupload-exists"></i> 
																			<span class="fileupload-preview"></span>
																		</div>
																		<span class="btn btn-file">
																		<span class="fileupload-new">Select file</span>
																		<span class="fileupload-exists">Change</span>
																		<input type="file" class="default" name="userfile" id="userfile" />
																		</span>
																		<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
																	</div>
																</div>
																<div class="submit-btn">
                                                                    <button type="submit" class="btn green" >Submit</button>
																
																</div>
															</form>
														</div>
													</div>
													<div id="tab_3-3" class="tab-pane">
														<div style="height: auto;" id="accordion3-3" class="accordion collapse">
															<?php
                                                                $attributes = array('class' => 'frm-chpass',"method"=>"post", 'id' => 'frm-chpass', "name"=>"frm-chpass");
                                                                        
                                                                echo form_open(site_url('profile/save_change'),$attributes);
                                                            ?>
																<div class="control-group">
                                                                    <label class="control-label">Current Password</label>
                                                                    <div class="controls">
                                                                        <input type="password" class="m-wrap span8" name="opass" id="opass" />
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">New Password</label>
                                                                    <div class="controls">
                                                                        <input type="password" class="m-wrap span8" name="npass" id="npass"  />
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Re-type New Password</label>
                                                                    <div class="controls">
                                                                        <input type="password" class="m-wrap span8" name="cpass" id="cpass"  />
                                                                    </div>
                                                                </div>
																
																<div class="submit-btn">
                                                                    <button type="submit" class="btn green">Change Password</button>
																	
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!--end span9-->                                   
										</div>
									</div>
								</div>
								
							</div>
						</div>
						<!--END TABS-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER--> 