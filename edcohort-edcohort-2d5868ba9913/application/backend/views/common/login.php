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
        <title>Sign In | Admin</title>

        <!-- Bootstrap css -->
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

        <!-- Sidemenu Css -->
        <link href="<?php echo base_url(); ?>assets/css/sidemenu.css" rel="stylesheet" />

        <!-- Dashboard css -->
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/admin-custom.css" rel="stylesheet" />

        <!-- c3.js Charts Plugin -->
        <link href="<?php echo base_url(); ?>assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

        <!---Font icons-->
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet"/>

        <!--Select2 css -->
        <link href="<?php echo base_url(); ?>assets/plugins/select2/select2.css" rel="stylesheet" />

        <!-- Color Skin css -->
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/color-skins/color.css" />

    </head>

    <body class="construction-image">

        <!--Loader-->
        <div id="global-loader">
            <img src="<?php echo base_url(); ?>assets/images/loader.svg" class="loader-img" alt="">
        </div>
        <!--/Loader-->

        <!--Page-->
        <div class="page page-h">
            <div class="page-content z-documentation-10">
                <div class="container">
                    <div class="logo" >
                        <img src="<?php echo base_url(); ?>logo-white.png" style="margin: auto; display: block; margin-bottom: 10px; ">                                  
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-md-12 col-md-12 d-block mx-auto">
                            <div class="card">
                                    <div class="card-header">
                                         <h2 class="msg">Admin Panel</h2>
                                    </div>
                                    <div class="card-body">
                                            <form id="sign_up" action="<?php echo base_url(); ?>login-submit" method="post">
                                               
                                                <?php if($this->session->flashdata('alert')!=""){ ?>
                                                <div class="alert alert-warning alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    <?php echo $this->session->flashdata('alert'); ?> 
                                                </div>
                                                <?php } ?>
                                                <?php if($this->session->flashdata('success')){ ?>                    
                                                <div class="alert bg-green alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    <?php echo $this->session->flashdata('success'); ?>
                                                </div>                    
                                                <?php } ?>
                                                <?php echo csrf(); ?>
                                                <div class="form-group">
                                                    <label class="form-label">Username</label>
                                                    <input type="text" class="form-control" name="username" id="username" required  placeholder="Enter User Name">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">
                                                    Password
                                                   <!--  <a href="forgot-password.html" class="float-end small text-primary">I forgot password</a> -->
                                                    </label>
                                                    <input type="password" class="form-control" name="password" id="password" required placeholder="Password">
                                                </div>
                                               <!--  <div class="form-group">
                                                    <label class="custom-control form-checkbox">
                                                        <input type="checkbox" class="custom-control-input" />
                                                        <span class="custom-control-label">Remember me</span>
                                                    </label>
                                                </div> -->
                                                <div class="form-footer">
                                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JQuery js-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>

        <!-- Bootstrap js -->
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!--JQuery Sparkline Js-->
        <script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.min.js"></script>

        <!-- Circle Progress Js-->
        <script src="<?php echo base_url(); ?>assets/js/circle-progress.min.js"></script>

        <!-- Star Rating Js-->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-bar-rating/jquery.barrating.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-bar-rating/js/rating.js"></script>

        <!-- Custom scroll bar Js-->
        <script src="<?php echo base_url(); ?>assets/plugins/pscrollbar/pscrollbar.js"></script>

        <!-- Fullside-menu Js-->
        <script src="<?php echo base_url(); ?>assets/plugins/sidemenu/sidemenu.js"></script>

        <!--Select2 js -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/select2.js"></script>

        <!--Counters -->
        <script src="<?php echo base_url(); ?>assets/plugins/counters/counterup.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/counters/waypoints.min.js"></script>

        <!-- Custom Js-->
        <script src="<?php echo base_url(); ?>assets/js/admin-custom.js"></script>

    </body>
</html>