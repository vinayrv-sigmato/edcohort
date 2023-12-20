<!doctype html>
<html lang="en">
    <head>
        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       

        <!-- Favicon -->
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/brand/favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/brand/favicon.ico" />

        <!-- Title -->
        <title><?php if(@$title!=""){ echo $title." | "; } echo "Admin"; ?></title>

        <!-- Bootstrap css -->
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

        <!-- Sidemenu Css -->
        <link href="<?php echo base_url(); ?>assets/css/sidemenu.css" rel="stylesheet" />

        <!-- Dashboard Css -->
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/admin-custom.css" rel="stylesheet" />

        <!-- c3.js Charts Plugin -->
        <link href="<?php echo base_url(); ?>assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

        <!-- P-scroll bar css-->
        <link href="<?php echo base_url(); ?>assets/plugins/pscrollbar/pscrollbar.css" rel="stylesheet" />

        <!-- Data table css -->
        <link href="<?php echo base_url(); ?>assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/datatable/css/jquery.dataTables.min.css" rel="stylesheet" />

        <!---Font icons-->
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet"/>

        <!--Select2 css -->
        <link href="<?php echo base_url(); ?>assets/plugins/select2/select2.css" rel="stylesheet" />

        <!-- Color Skin css -->
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/color-skins/color.css" />

        <!-- Time picker Plugin -->
        <link href="<?php echo base_url(); ?>assets/plugins/time-picker/jquery.timepicker.css" rel="stylesheet" />

        <!-- Date Picker Plugin -->
        <link href="<?php echo base_url(); ?>assets/plugins/date-picker/spectrum.css" rel="stylesheet" />
        <script>
        var siteName='Edcohort';
        var base_url='<?php echo base_url(); ?>';
    </script>
    </head>

    <body class="app sidebar-mini">

        <!--Loader-->
        <div id="global-loader">
            <img src="<?php echo base_url(); ?>assets/images/loader.svg" class="loader-img" alt="">
        </div>
        <!--/Loader-->

        <!--Page-->
        <div class="page">
            <div class="page-main h-100">

                <!--App-Header-->
                <div class="app-header1 header py-2 d-flex">
                    <div class="container-fluid">
                        <div class="d-flex">
                            <a class="header-brand" href="index.html">
                                <img src="<?php echo base_url(); ?>assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                                <img src="<?php echo base_url(); ?>assets/images/brand/favicon.png" class="header-brand-img mobile-logo" alt="logo">
                            </a>
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"><i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg></i></a>
                            
                            <div class="d-flex order-lg-2 ms-auto heaader-right">
                                <button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                                </button>
                                <div class="p-0 mb-0 navbar navbar-expand-lg  responsive-navbar navbar-dark  ">
                                    <div class="navbar-collapse collapse" id="navbarSupportedContent-4">
                                        <div class="d-flex">
                                            <!--<div class="header-navsearch">
                                                <a href="javascript:void(0)" class=" "></a>
                                                <form class="form-inline me-auto">
                                                    <div class="nav-search">
                                                        <input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" >
                                                        <button class="btn" type="submit"><i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></i></button>
                                                    </div>
                                                </form>
                                            </div> -->
                                            <div class="header-navicon">
                                                <a href="javascript:void(0)" data-bs-toggle="search" class="nav-link d-lg-none navsearch-icon">
                                                    <i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></i>
                                                </a>
                                            </div>
                                            <div class="dropdown d-flex" >
                                                <a  class="nav-link icon full-screen-link">
                                                    <i class=""  id="fullscreen-button"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/></svg></i>
                                                </a>
                                            </div>
                                            <!--<div class="dropdown header-notification d-flex">
                                                <a class="nav-link icon" data-bs-toggle="dropdown">
                                                    <i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/></svg></i>
                                                    <span class=" nav-unread badge badge-danger  badge-pill">4</span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center">You have 4 notification</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                                        <div class="notify-img">
                                                            <i class="fa fa-envelope-o"></i>
                                                        </div>
                                                        <div>
                                                            <strong>2 new Messages</strong>
                                                            <div class="small text-muted">17:50 Pm</div>
                                                        </div>
                                                    </a>
                                                    <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                                        <div class="notify-img">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <div>
                                                            <strong> 1 Event Soon</strong>
                                                            <div class="small text-muted">19-10-2021</div>
                                                        </div>
                                                    </a>
                                                    <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                                        <div class="notify-img">
                                                            <i class="fa fa-comment-o"></i>
                                                        </div>
                                                        <div>
                                                            <strong> 3 new Comments</strong>
                                                            <div class="small text-muted">05:34 Am</div>
                                                        </div>
                                                    </a>
                                                    <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                                        <div class="notify-img">
                                                            <i class="fa fa-exclamation-triangle"></i>
                                                        </div>
                                                        <div>
                                                            <strong> Application Error</strong>
                                                            <div class="small text-muted">13:45 Pm</div>
                                                        </div>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:void(0)" class="dropdown-item text-center">See all Notification</a>
                                                </div> 
                                            </div>-->
                                            <!--<div class="dropdown header-message d-flex">
                                                <a class="nav-link icon" data-bs-toggle="dropdown">
                                                    <i class=""><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/></svg></i>
                                                    <span class=" nav-unread badge badge-warning  badge-pill">3</span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <a href="javascript:void(0)" class="dropdown-item font-weight-bold text-center">You have 3 Messages</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                                        <img src="<?php echo base_url(); ?>assets/images/users/male/41.jpg" alt="avatar-img" class="avatar brround me-3 align-self-center">
                                                        <div>
                                                            <strong>Blake</strong> I've finished it! See you so.......
                                                            <div class="small text-muted">30 mins ago</div>
                                                        </div>
                                                    </a>
                                                    <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                                        <img src="<?php echo base_url(); ?>assets/images/users/female/1.jpg" alt="avatar-img" class="avatar brround me-3 align-self-center">
                                                        <div>
                                                            <strong>Caroline</strong> Just see the my Admin....
                                                            <div class="small text-muted">12 mins ago</div>
                                                        </div>
                                                    </a>
                                                    <a href="javascript:void(0)" class="dropdown-item d-flex pb-3">
                                                        <img src="<?php echo base_url(); ?>assets/images/users/male/18.jpg" alt="avatar-img" class="avatar brround me-3 align-self-center">
                                                        <div>
                                                            <strong>Jonathan</strong> Hi! I'am singer......
                                                            <div class="small text-muted">1 hour ago</div>
                                                        </div>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:void(0)" class="dropdown-item text-center">View all Messages</a>
                                                </div>
                                            </div> -->
                                            
                                            <div class="dropdown header-user ">
                                                <a href="javascript:void(0)" class="nav-link leading-none user-img" data-bs-toggle="dropdown">
                                                    <img src="<?php echo base_url(); ?>assets/images/users/female/20.jpg" alt="profile-img" class="avatar">
                                                </a>
                                                     <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow ">
                                                   <!-- <a class="dropdown-item" href="profile.html">
                                                        <i class="dropdown-icon icon icon-user"></i> My Profile
                                                    </a>
                                                    <a class="dropdown-item" href="emailservices.html">
                                                        <i class="dropdown-icon icon icon-speech"></i> Inbox
                                                    </a>
                                                    <a class="dropdown-item" href="editprofile.html">
                                                        <i class="dropdown-icon  icon icon-settings"></i> Account Settings
                                                    </a> -->
                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>admin_login/logout">
                                                        <i class="dropdown-icon  icon icon-power"></i> Log out
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/App-Header-->