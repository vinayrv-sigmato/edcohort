<?php $segment=$this->uri->segment(1); ?>
<?php $segment2=$this->uri->segment(2); ?>
<?php $user_id = $this->session->userdata('jw_admin_id'); ?>

      
<!-- Sidebar menu-->
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <aside class="app-sidebar doc-sidebar">
                    <a class="header-brand sidemenu-header-brand" href="index.html">
                        <img src="<?php echo base_url(); ?>assets/images/brand/logo-white.png" class="header-brand-img desktop-logo" alt="Lmslist logo">
                        <img src="<?php echo base_url(); ?>assets/images/brand/favicon.png" class="header-brand-img mobile-logo" alt="Lmslist logo">
                    </a>
                    <div class="app-sidebar__user clearfix">
                        <div class="dropdown user-pro-body">
                           <!-- <div>
                                <img src="<?php //echo base_url(); ?>assets/images/users/female/20.jpg"alt="user-img" class="avatar avatar-lg brround">
                                <span class="avatar-status profile-status bg-green"></span>
                            </div> -->
                          <!--  <div class="user-info">
                                <h2><?php //echo ucwords($this->session->userdata('jw_admin_name'));  ?></h2>
                                
                            </div>-->
                        </div>
                    </div>
                    <ul class="side-menu">
                    
                    	<li class="slide">
                            <a class="side-menu__item" href="<?php echo base_url(); ?>admin_dashboard"> <span class="nav-label"><i class="fa fa-tachometer" > </i>   Dashboard </span></a>
                        </li>                        
                        
                        
                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><span class="side-menu__label"> <i class="fa fa-user" aria-hidden="true"></i> Customer</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_customer">Customer List</a></li>
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_customer/add_customer">Add Customer</a></li>                                
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><span class="side-menu__label"><i class="fa fa-life-ring" aria-hidden="true"></i> Product Category</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_category">Product Category List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_category/add_category">Add Product Category</a></li>                              
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><span class="side-menu__label"> <i class="fa fa-product-hunt" aria-hidden="true"></i> Product</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_product">Product List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_product/add_product">Add Product</a></li>                             
                                         
                            </ul>
                        </li>
                        
                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"><i class="fa fa-eye" aria-hidden="true"></i> Review</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_review">Review List</a></li>  
                               <!-- <li><a class="slide-item" href="<?php echo base_url(); ?>admin_product/add_product">Add Product</a></li>                            --> 
                                         
                            </ul>
                        </li>
                        
                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-list-alt" aria-hidden="true"></i> Complaint</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_complaint">Complaint List</a></li>  
                               <!-- <li><a class="slide-item" href="<?php echo base_url(); ?>admin_product/add_product">Add Product</a></li>                            --> 
                                         
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-superpowers" aria-hidden="true"></i> Brand</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_brand">Brand List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_brand/add_brand">Add Brand</a></li>                              
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-file-archive-o" aria-hidden="true"></i> Type</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_type">Type List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_type/add_type">Add Type</a></li>                              
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-bullseye" aria-hidden="true"></i> Class</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_class">Class List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_class/add_class">Add Class</a></li>                              
                            </ul>
                        </li>
                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><span class="side-menu__label"> <i class="fa fa-barcode" aria-hidden="true"></i> Board</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_board">Board List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_board/add_board">Add Board</a></li>                              
                            </ul>
                        </li>
                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-forumbee" aria-hidden="true"></i> Batch</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_batch">Batch List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_batch/add_batch">Add Batch</a></li>                              
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-compress" aria-hidden="true"></i> Counselling</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_counselling">Counselling List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_counselling/add_counselling">Add Counselling</a></li>
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_counselling/counselling_booking">Counselling Booking</a></li>                              
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-bandcamp" aria-hidden="true"></i> Banner</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_banner">Banner</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_banner/add_banner">Add Banner</a></li>                              
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-adjust" aria-hidden="true"></i> Sponsors</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_sponsors">Sponsors List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_sponsors/add_sponsors">Add Sponsors</a></li>                              
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-certificate" aria-hidden="true"></i> Ranking</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_ranking/brand_wise">Ranking Brand Wise List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_ranking/add_brand_wise">Add Ranking Brand Wise</a></li>                              
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-database" aria-hidden="true"></i> Testimonials</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_testimonial">Testimonials List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_testimonial/add_testimonial">Add Testimonials</a></li>                              
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-globe" aria-hidden="true"></i> Partner</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_partner">Partners Request</a></li>  
                                <!-- <li><a class="slide-item" href="<?php echo base_url(); ?>admin_partner/add_partner">Add partners</a></li> -->                              
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-cube" aria-hidden="true"></i> Counseller</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_counseller">Counseller Request</a></li>  
                                <!-- <li><a class="slide-item" href="<?php echo base_url(); ?>admin_partner/add_partner">Add partners</a></li> -->                              
                            </ul>
                        </li>
                        
                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-ils" aria-hidden="true"></i> Compare</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_counseller">Compare</a></li>  
                                <!-- <li><a class="slide-item" href="<?php echo base_url(); ?>admin_partner/add_partner">Add partners</a></li> -->                              
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"></i><span class="side-menu__label"> <i class="fa fa-gg" aria-hidden="true"></i>
 Blog</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_blog">Blog List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_blog/add_blog">Add Blog</a></li>                              	<li><a class="slide-item" href="<?php echo base_url(); ?>admin_blog/blog_category_list">Blog Category List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_blog/add_blog_category">Add Blog Category</a></li>                              	
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item" href="<?php echo base_url(); ?>admin_subscribe"></i><span class="side-menu__label"><i class="fa fa-steam" aria-hidden="true"></i> Subscriber</span></a>
                        </li>
                        
                        <li class="slide">
                            <a class="side-menu__item" href="<?php echo base_url(); ?>admin_contact"></i><span class="side-menu__label"><i class="fa fa-tty" aria-hidden="true"></i>
 Contact</span></a>
                        </li>



                        
                        
                    </ul>
                </aside>
                <!-- /Sidebar menu-->