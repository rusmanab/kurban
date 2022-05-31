        <!-- BEGIN HEADER -->
        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">                
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?php echo site_url('home')?>">
                            <?php /* <img src="<?php echo base_url('assets/themes/metronic/layouts/layout3/img/logo-default.jpg')?>" alt="logo" class="logo-default"> */?>
                            <img src="<?php echo base_url('assets/themes/default/logo.png')?>" alt="logo" class="logo-default" style="margin: 0 !important;">
                        </a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            
                            <li class="droddown dropdown-separator">
                                <span class="separator"></span>
                            </li>
                            <!-- BEGIN INBOX DROPDOWN -->
                            <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="circle">0</span>
                                    <span class="corner"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>You have
                                            <strong>0 New</strong> Messages</h3>
                                        <a href="<?php echo site_url('inbox')?>">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                            
                                            
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <?php
                                    $avatar = $this->session->userdata('avatar_penyidik');
                                    if (empty($this->username)){
                                        $this->username = "No name";
                                    }
                                    if (!@getimagesize($avatar)){
                                        $avatar = base_url('assets/themes/metronic/layouts/layout3/img/avatar9.jpg');
                                    }
                                    ?>
                                    <img alt="" class="img-circle" src="<?php echo $avatar?>">
                                    <span class="username username-hide-mobile"><?php echo $this->username ?></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?php echo site_url('myprofile')?>">
                                            <i class="icon-user"></i> <?php echo $this->lang->line('myprofile') ?> </a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo site_url('login/logout')?>">
                                            <i class="icon-key"></i> <?php echo $this->lang->line('logout') ?></a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                <div class="container">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <?php
                    /* $attributes = array('class' => 'search-form myform', 'id' => 'myform','role'=>'form', "name"=>"myform","enctype"=>"multipart/form-data", "method"=>"GET");                                                                
                    echo form_open(site_url('search/result'),$attributes);
                    // <form class="search-form" action="page_general_search.html" method="GET">
                    ?>
                    
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="nama_karyawan">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    */ ?>
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN MEGA MENU -->
                    <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                    <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                    <div class="hor-menu  ">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="<?php echo site_url('home')?>"> <?php echo $this->lang->line('home') ?></a>                                
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="<?php echo site_url('post')?>"> <?php echo $this->lang->line('post') ?></a>                                
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="<?php echo site_url('batik')?>"> <?php echo $this->lang->line('batik') ?></a>                                
                            </li>
                            
                        </ul>
                    </div>
                   
                    <!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->