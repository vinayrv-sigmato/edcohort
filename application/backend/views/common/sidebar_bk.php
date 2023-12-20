<?php $segment=$this->uri->segment(1); ?>
<?php $segment2=$this->uri->segment(2); ?>
 <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
<!--             <div class="user-info">
                
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('jw_user_fname'); ?></div>
                    <div class="email"><?php echo $this->session->userdata('jw_user_email'); ?></div>

                </div>
            </div> -->
            <!-- #User Info -->
            <!-- Menu -->
            <?php $group_id=$this->session->userdata('jw_admin_group'); ?>
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?php if($segment=='admin_dashboard' || $segment==''){ echo 'active'; } ?>">
                        <a href="<?php echo base_url(); ?>admin_dashboard">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <?php if($group_id=='1'){ ?>
                    <li class="<?php if($segment=='admin_category'){ echo 'active'; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Category </span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if($segment=='admin_category' && $segment2==''){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_category" class="">
                                    <span><i class="fa fa-list-ul"></i> Category list </span>
                                </a>                                
                            </li>
                            <li class="<?php if($segment2=='add_category'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_category/add_category" class="">
                                    <span><i class="fa fa-pencil"></i> Add Category </span>
                                </a>                                
                            </li>
                            
                        </ul>
                    </li>
                    <?php } ?>
                    <li class="<?php if($segment=='admin_diamond'){ echo 'active'; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="fa fa-diamond material-icons"></i>
                            <span>Diamond </span>
                        </a>
                        <ul class="ml-menu">                           
                            <li class="<?php if($segment=='admin_diamond' && $segment2==''){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_diamond" class="">
                                    <span><i class="fa fa-list-ul"></i> Diamond List</span>
                                </a>                                
                            </li>
                            <li class="<?php if($segment2=='upload_diamond'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_diamond/upload_diamond" class="">
                                    <span><i class="fa fa-upload"></i> Upload Diamond </span>
                                </a>                                
                            </li>
                            <li class="<?php if($segment2=='upload_history'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_diamond/upload_history" class="">
                                    <span><i class="fa fa-list-ul"></i> Diamond Upload History </span>
                                </a>                                
                            </li>
                            <li class="<?php if($segment2=='add_markup'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_diamond/add_markup" class="">
                                    <span><i class="fa fa-list-ul"></i> Diamond Markup </span>
                                </a>                                
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if($segment=='admin_product'){ echo 'active'; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">shopping_basket</i>
                            <span>Product </span>
                        </a>
                        <ul class="ml-menu">                           
                            <li class="<?php if($segment=='admin_product' && $segment2==''){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_product" class="">
                                    <span><i class="fa fa-list-ul"></i> Product List</span>
                                </a>                                
                            </li>
                            <li class="<?php if($segment2=='add_product'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_product/add_product" class="">
                                    <span><i class="fa fa-pencil"></i> Add Product </span>
                                </a>                                
                            </li>
                            <li class="<?php if($segment2=='product_reviews'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_product/product_reviews" class="">
                                    <span><i class="fa fa-list-ul"></i> Product Reviews</span>
                                </a>                                
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if($segment=='admin_order' || $segment=='admin_return'){ echo 'active'; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">shopping_cart</i>
                            <span>Sales </span>
                        </a>
                        <ul class="ml-menu">                           
                            <li class="<?php if($segment=='admin_order'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_order" class="">
                                    <span><i class="fa fa-list-ul"></i> Order List</span>
                                </a>                                
                            </li>
                            <li class="<?php if($segment=='admin_return'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_return" class="">
                                    <span><i class="fa fa-list-ul"></i> Return</span>
                                </a>                                
                            </li>
                        </ul>
                    </li>
                    <?php if($group_id=='1'){ ?>
                    <li class="<?php if($segment=='admin_customer'){ echo 'active'; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Customer </span>
                        </a>
                        <ul class="ml-menu">                           
                            <li class="<?php if($segment=='admin_customer'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_customer" class="">
                                    <span><i class="fa fa-list-ul"></i> Customer List</span>
                                </a>                                
                            </li>                            
                        </ul>
                    </li>

                    <li class="<?php if($segment=='admin_attribute' || $segment=='admin_options' || $segment=='admin_addons' || $segment=='admin_menu'){ echo 'active'; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings_applications</i>
                            <span>Setting Master </span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if($segment=='admin_options' && $segment2==''){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_options" class="">
                                    <span><i class="fa fa-list-ul"></i> Options List</span>
                                </a>                                
                            </li> 
                            <li class="<?php if($segment=='admin_addons' && $segment2==''){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_addons" class="">
                                    <span><i class="fa fa-list-ul"></i> Global Addons List</span>
                                </a>                                
                            </li>

                            <li class="<?php if($segment=='admin_menu' && $segment2==''){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_menu" class="">
                                    <span><i class="fa fa-list-ul"></i> Menus List</span>
                                </a>                                
                            </li>

                        </ul>
                    </li>
                    <?php } ?>
                    <li class="<?php if($segment=='admin_appointment'){ echo 'active'; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">event</i>
                            <span>Appointment </span>
                        </a>
                        <ul class="ml-menu">                           
                            <li class="<?php if($segment=='admin_appointment'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_appointment" class="">
                                    <span><i class="fa fa-list-ul"></i> Appointment List</span>
                                </a>                                
                            </li>                            
                        </ul>
                    </li>
                    <li class="<?php if($segment=='admin_contact'){ echo 'active'; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">contacts</i>
                            <span>Contact </span>
                        </a>
                        <ul class="ml-menu">                           
                            <li class="<?php if($segment=='admin_contact'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_contact" class="">
                                    <span><i class="fa fa-list-ul"></i> Contact List</span>
                                </a>                                
                            </li>                            
                        </ul>
                    </li>
                    <li class="<?php if($segment=='admin_enquiry'){ echo 'active'; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">list</i>
                            <span>Enquiry </span>
                        </a>
                        <ul class="ml-menu">                           
                            <li class="<?php if($segment=='admin_enquiry'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_enquiry" class="">
                                    <span><i class="fa fa-list-ul"></i> Enquiry List</span>
                                </a>                                
                            </li>                            
                        </ul>
                    </li>
                    <li class="<?php if($segment=='admin_testimonial' || $segment=='add_testimonial'){ echo 'active'; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">insert_comment</i>
                            <span>Testimonials </span>
                        </a>
                        <ul class="ml-menu">                           
                            <li class="<?php if($segment=='admin_testimonial' && $segment2==''){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_testimonial" class="">
                                    <span><i class="fa fa-list-ul"></i> Testimonials List</span>
                                </a>                                
                            </li> 
                            <li class="<?php if($segment2=='add_testimonial'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_testimonial/add_testimonial" class="">
                                    <span><i class="fa fa-list-ul"></i>Add Testimonials </span>
                                </a>                                
                            </li>  

                        </ul>                        
                    </li>

                    <li class="<?php if($segment=='admin_subscribe' || $segment=='add_subscribe'){ echo 'active'; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Subscriber </span>
                        </a>
                        <ul class="ml-menu">                           
                            <li class="<?php if($segment=='admin_subscribe' && $segment2==''){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_subscribe" class="">
                                    <span><i class="fa fa-list-ul"></i> Subscriber List</span>
                                </a>                                
                            </li> 
                        </ul>                        
                    </li>                    
                    <li class="<?php if($segment=='admin_manage_page' || $segment=='edit_page'){ echo 'active'; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings_applications</i>
                            <span>Manage Page </span>
                        </a>
                        <ul class="ml-menu">                           
                            <li class="<?php if($segment=='admin_manage_page' && $segment2==''){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_manage_page" class="">
                                    <span><i class="fa fa-list-ul"></i> Page List</span>
                                </a>                                
                            </li> 
                        </ul>                        
                    </li>  
                    <li class="<?php if($segment=='admin_blog' || $segment=='add_blog'){ echo 'active'; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">insert_comment</i>
                            <span>Blog </span>
                        </a>
                        <ul class="ml-menu">                           
                            <li class="<?php if($segment=='admin_blog' && $segment2==''){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_blog" class="">
                                    <span><i class="fa fa-list-ul"></i> Blog List</span>
                                </a>                                
                            </li> 
                            <li class="<?php if($segment2=='add_blog'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>admin_blog/add_blog" class="">
                                    <span><i class="fa fa-list-ul"></i> Add Blog </span>
                                </a>                                
                            </li>  

                        </ul>                        
                    </li>                  
                    <li class="">
                        <a href="<?php echo base_url(); ?>admin_login/logout">
                            <i class="material-icons">input</i>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul>

            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 - 2019 <a href="javascript:void(0);"></a>.
                </div>
                
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>