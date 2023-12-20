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
                            <div>
                                <img src="<?php echo base_url(); ?>assets/images/users/female/20.jpg"alt="user-img" class="avatar avatar-lg brround">
                                <span class="avatar-status profile-status bg-green"></span>
                            </div>
                            <div class="user-info">
                                <h2><?php echo ucwords($this->session->userdata('jw_admin_name'));  ?></h2>
                                
                            </div>
                        </div>
                    </div>
                    <ul class="side-menu">
                    
                    	<li class="slide">
                            <a class="side-menu__item" href="<?php echo base_url(); ?>admin_dashboard"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg></i><span class="side-menu__label"> Dashboard</span></a>
                        </li>                        
                        
                        
                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Customer</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_customer">Customer List</a></li>
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_customer/add_customer">Add Customer</a></li>                                
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Product Category</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_category">Product Category List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_category/add_category">Add Product Category</a></li>                              
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Product</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_product">Product List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_product/add_product">Add Product</a></li>                             
                                         
                            </ul>
                        </li>
                        
                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Review</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_review">Review List</a></li>  
                               <!-- <li><a class="slide-item" href="<?php echo base_url(); ?>admin_product/add_product">Add Product</a></li>                            --> 
                                         
                            </ul>
                        </li>
                        
                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Complaint</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_complaint">Complaint List</a></li>  
                               <!-- <li><a class="slide-item" href="<?php echo base_url(); ?>admin_product/add_product">Add Product</a></li>                            --> 
                                         
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Brand</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_brand">Brand List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_brand/add_brand">Add Brand</a></li>                              
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Type</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_type">Type List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_type/add_type">Add Type</a></li>                              
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Class</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_class">Class List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_class/add_class">Add Class</a></li>                              
                            </ul>
                        </li>
                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Board</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_board">Board List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_board/add_board">Add Board</a></li>                              
                            </ul>
                        </li>
                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Batch</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_batch">Batch List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_batch/add_batch">Add Batch</a></li>                              
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Counselling</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_counselling">Counselling List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_counselling/add_counselling">Add Counselling</a></li>
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_counselling/counselling_booking">Counselling Booking</a></li>                              
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Banner</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_banner">Banner</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_banner/add_banner">Add Banner</a></li>                              
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Sponsors</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_sponsors">Sponsors List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_sponsors/add_sponsors">Add Sponsors</a></li>                              
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Ranking</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_ranking/brand_wise">Ranking Brand Wise List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_ranking/add_brand_wise">Add Ranking Brand Wise</a></li>                              
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Testimonials</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_testimonial">Testimonials List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_testimonial/add_testimonial">Add Testimonials</a></li>                              
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Partner</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_partner">Partners Request</a></li>  
                                <!-- <li><a class="slide-item" href="<?php echo base_url(); ?>admin_partner/add_partner">Add partners</a></li> -->                              
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Counseller</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_counseller">Counseller Request</a></li>  
                                <!-- <li><a class="slide-item" href="<?php echo base_url(); ?>admin_partner/add_partner">Add partners</a></li> -->                              
                            </ul>
                        </li>
                        
                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Compare</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_counseller">Compare</a></li>  
                                <!-- <li><a class="slide-item" href="<?php echo base_url(); ?>admin_partner/add_partner">Add partners</a></li> -->                              
                            </ul>
                        </li>

                        <li class="slide">
                            <a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM10 5.47l4 1.4v11.66l-4-1.4V5.47zm-5 .99l3-1.01v11.7l-3 1.16V6.46zm14 11.08l-3 1.01V6.86l3-1.16v11.84z"/></svg></i><span class="side-menu__label">Blog</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_blog">Blog List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_blog/add_blog">Add Blog</a></li>                              	<li><a class="slide-item" href="<?php echo base_url(); ?>admin_blog/blog_category_list">Blog Category List</a></li>  
                                <li><a class="slide-item" href="<?php echo base_url(); ?>admin_blog/add_blog_category">Add Blog Category</a></li>                              	
                            </ul>
                        </li>

                         <li class="slide">
                            <a class="side-menu__item" href="<?php echo base_url(); ?>admin_subscribe"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg></i><span class="side-menu__label"> Subscriber</span></a>
                        </li>
                        
                        <li class="slide">
                            <a class="side-menu__item" href="<?php echo base_url(); ?>admin_contact"><i class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg></i><span class="side-menu__label"> Contact</span></a>
                        </li>



                        
                        
                    </ul>
                </aside>
                <!-- /Sidebar menu-->