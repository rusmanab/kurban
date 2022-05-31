                       <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            
                            
                            <li class="nav-item<?php echo $urlBase=='' ? " active":"" ?>">
                                <a href="<?php echo site_url() ?>">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                    <?php echo $urlBase=='' ? '<span class="selected"></span>':'' ?>
                                </a>
                            </li>
                            <?php
                            if ($this->level==3){?> 
                            <li class="nav-item<?php echo $urlBase=='post' || $urlBase=='category' ? " active open":"" ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-docs"></i>
                                    <span class="title"><?php echo $this->lang->line('post')?></span>
                                    <span class="arrow<?php echo $urlBase=='post' || $urlBase=='category' ? " open":"" ?>"></span>
                                    <?php echo $urlBase=='post' ? '<span class="selected"></span>':'' ?>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item<?php echo $urlBase=='post' && !$url ? " active open":"" ?>">
                                        <a href="<?php echo site_url('post') ?>" class="nav-link "> List Post </a>
                                    </li>
                                    <li class="nav-item<?php echo $url=='add' && $urlBase=='post' ? " active open":"" ?>">
                                        <a href="<?php echo site_url('post/add') ?>" class="nav-link "> Add Post</a>
                                    </li>
                                    <li class="nav-item<?php echo $urlBase=='category'? " active open":"" ?>">
                                        <a href="<?php echo site_url('category') ?>" class="nav-link "> <?php echo $this->lang->line('category')?></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item<?php echo $urlBase=='product' || $urlBase=='categoryproduct' ? " active open":"" ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-briefcase"></i>
                                    <span class="title"><?php echo $this->lang->line('clothes')?></span>
                                    <span class="arrow<?php echo $urlBase=='product' || $urlBase=='categoryproduct' ? " open":"" ?>"></span>
                                    <?php echo $urlBase=='product' || $urlBase=='categoryproduct' ? '<span class="selected"></span>':'' ?>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item<?php echo $urlBase=='product' && !$url ? " active open":"" ?>">
                                        <a href="<?php echo site_url('product') ?>" class="nav-link "> List Product </a>
                                    </li>
                                    <li class="nav-item<?php echo $urlBase=='product' && $url=='add' ? " active open":"" ?> ">
                                        <a href="<?php echo site_url('product/add') ?>" class="nav-link "> Add Product</a>
                                    </li>
                                    <li class="nav-item<?php echo $urlBase=='categoryproduct'? " active open":"" ?>">
                                        <a href="<?php echo site_url('categoryproduct') ?>" class="nav-link "> <?php echo $this->lang->line('category')?></a>
                                    </li>
                                </ul>
                            </li>
                            
                            
                            <li class="nav-item<?php echo $urlBase=='coupon' ? " active open":"" ?>">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-tag"></i>
                                    <span class="title">Coupon</span>
                                    <span class="arrow<?php echo $urlBase=='coupon' ? " open":"" ?>"></span>
                                    <?php echo $urlBase=='coupon' ? '<span class="selected"></span>':'' ?>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item<?php echo $urlBase=='coupon' && !$url ? " active open":"" ?>">
                                        <a href="<?php echo site_url('coupon') ?>" class="nav-link "> List Coupon </a>
                                    </li>
                                    <li class="nav-item<?php echo $url=='add'? " active open":"" ?>">
                                        <a href="<?php echo site_url('coupon/add') ?>" class="nav-link "> Add Coupon</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="nav-item<?php echo $urlBase=='pages' ? " active":"" ?>">
                                <a href="<?php echo site_url('pages') ?>">
                                    <i class="icon-layers"></i>
                                    <span class="title">Pages</span>
                                    <?php echo $urlBase=='pages' ? '<span class="selected"></span>':'' ?>
                                </a>
                            </li>
                            

                            <li class="nav-item<?php echo $urlBase=='ourclients' ? " active open":"" ?>">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-tag"></i>
                                    <span class="title">Client</span>
                                    <span class="arrow<?php echo $urlBase=='ourclients' ? " open":"" ?>"></span>
                                    <?php echo $urlBase=='ourclients' ? '<span class="selected"></span>':'' ?>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item<?php echo $urlBase=='ourclients' && !$url ? " active open":"" ?>">
                                        <a href="<?php echo site_url('ourclients') ?>" class="nav-link "> List Client </a>
                                    </li>
                                    <li class="nav-item<?php echo $url=='add'? " active open":"" ?>">
                                        <a href="<?php echo site_url('ourclients/add') ?>" class="nav-link "> Add Client</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item<?php echo $urlBase=='orders' ? " active":"" ?>">
                                <a href="<?php echo site_url('orders') ?>">
                                    <i class="icon-basket"></i>
                                    <span class="title">Order</span>
                                    <?php echo $urlBase=='orders' ? '<span class="selected"></span>':'' ?>
                                </a>
                            </li>
                            <li class="nav-item <?php echo $urlBase=='setting' ? " active":"" ?>">
                                <a href="<?php echo site_url('setting') ?>">
                                    <i class="icon-wrench"></i>
                                    <span class="title">Setting</span>
                                    <?php echo $urlBase=='setting' ? '<span class="selected"></span>':'' ?>
                                </a>
                            </li>
                            <li class="nav-item <?php echo $urlBase=='menu' ? " active":"" ?>">
                                <a href="<?php echo site_url('menu') ?>">
                                    <i class="icon-wrench"></i>
                                    <span class="title">Menu</span>
                                    <?php echo $urlBase=='menu' ? '<span class="selected"></span>':'' ?>
                                </a>
                            </li>
                            <li class="nav-item<?php echo $urlBase=='users' ? " active open":"" ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-users "></i>
                                    <span class="title">User</span>
                                    <span class="arrow<?php echo $urlBase=='users' ? " open":"" ?>"></span>
                                    <?php echo $urlBase=='users' ? '<span class="selected"></span>':'' ?>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item<?php echo $urlBase=='users' && !$url ? " active open":"" ?>">
                                        <a href="<?php echo site_url('users') ?>" class="nav-link "> List User </a>
                                    </li>
                                    <li class="nav-item<?php echo $urlBase=='users' && $url=='add'? " active open":"" ?>">
                                        <a href="<?php echo site_url('users/add') ?>" class="nav-link "> Add User</a>
                                    </li>
                                </ul>
                            </li>
                            <?php }elseif ($this->level==1) {?>
                            <li class="nav-item<?php echo $urlBase=='mytask' ? " active":"" ?>">
                                <a href="<?php echo site_url('mytask') ?>">
                                    <i class="icon-layers"></i>
                                    <span class="title">My Task</span>
                                    <?php echo $urlBase=='mytask' ? '<span class="selected"></span>':'' ?>
                                </a>
                            </li>
                            <?php }elseif ($this->level==2) {?>
                            <li class="nav-item<?php echo $urlBase=='threadorder' ? " active":"" ?>">
                                <a href="<?php echo site_url('threadorder') ?>">
                                    <i class="icon-layers"></i>
                                    <span class="title">My Task</span>
                                    <?php echo $urlBase=='threadorder' ? '<span class="selected"></span>':'' ?>
                                </a>
                            </li>
                            <?php } ?>
                            
                        </ul>