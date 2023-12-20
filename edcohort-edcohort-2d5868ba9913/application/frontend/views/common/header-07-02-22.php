<?php
$segment1 = $this->uri->segment(1);
$segs = $this->uri->segment_array();
$title=$this->url->page_title($segment1);
$meta_keyword=$this->url->meta_key($segment1);
$meta_description=$this->url->meta_desc($segment1);
$canonical=$this->url->canonical($segment1);
if($segment1=="")
{
  $title=$this->url->page_title($this->url->slug(1));
  $meta_keyword=$this->url->meta_key($this->url->slug(1));
  $meta_description=$this->url->meta_desc($this->url->slug(1));
  $canonical=$this->url->canonical($this->url->slug(1));
}
else if($segment1==$this->url->slug(15))
{
  $product_name = @$records['0']->product_name;
  $title = ($records['0']->product_meta_title) ? $records['0']->product_meta_title : $product_name;
  $meta_keyword = (@$records['0']->product_meta_keyword) ? $records['0']->product_meta_keyword : $product_name;
  $meta_description = (@$records['0']->product_meta_description) ? $records['0']->product_meta_description : $product_name;
}
else if($segment1==$this->url->slug(13))
{
  $segment = end($segs);
  $category_seo = $this->common_model->categoryMeta($segment);
  $category = $segment;
  $cat_title = @strtr($category, '-', ' ');
  $title = (@$category_seo['0']->category_meta_title) ?  : $cat_title;
  $meta_keyword = (@$category_seo['0']->category_meta_keyword) ?  : $cat_title;
  $meta_description = (@$category_seo['0']->category_meta_description) ?  : $cat_title;
  $canonical = (@$category_seo['0']->category_canonical) ?  : '';
}
$seg_title = @strtr($segment1, '-', ' ');
if(empty($title)){
  $title = $seg_title;
}
if(empty($meta_keyword)){
  $meta_keyword = $seg_title;
}
if(empty($meta_description)){
  $meta_description = $seg_title;
}
?> 


<!doctype html>
<html lang="en">
  <head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="author" content=""/>
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="keywords" content="<?php echo $meta_keyword; ?>">
    <link rel="canonical" href="<?php echo $canonical; ?>" />
    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/brand/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/brand/favicon.ico" />
    <!-- Title -->
    <title> <?php if($title!=""){ echo ucwords($title); } ?></title>
    <!-- Bootstrap css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <!-- Style css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <!-- Font-awesome  css -->
    <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet"/>
    <!--Select2 css -->
    <link href="<?php echo base_url(); ?>assets/plugins/select2/select2.css" rel="stylesheet" />
    <!-- Cookie css -->
    <link href="<?php echo base_url(); ?>assets/plugins/cookie/cookie.css" rel="stylesheet">
    <!-- Owl Theme css-->
    <link href="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />
    <!--Jquery flexdatalist  css -->
    <link href="<?php echo base_url(); ?>assets/plugins/jquery.flexdatalist/jquery.flexdatalist.css" rel="stylesheet">
    <!-- Color Skin css -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/color-skins/color.css" />


  <script type="text/javascript">
    var base_url = "<?php echo base_url() ?>"
    var segment_1 = "<?php echo $this->uri->segment(1); ?>"    
  </script>  
  
  
</head>
<body>
  <?php $url=$this->uri->segment(1); ?>
  <?php $user_id = $this->session->userdata('user_id'); ?>
  <?php $user_fullname = $this->session->userdata('user_fullname'); ?>
  <?php $jewelry_menu = $this->session->userdata('jewelry_menu'); ?>
  <?php  $segment_1=$this->uri->segment(1); ?>


<!--Loader-->
    <div id="global-loader">
      <img src="<?php echo base_url(); ?>assets/images/loader.svg" class="loader-img" alt="img">
    </div><!--/Loader-->
    
   <!--Topbar-->
    <div class="header-main">
      <div class="top-bar top-bar-light">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 col-lg-8 col-sm-4 col-12">
              <div class="top-bar-start d-flex">
                <div class="clearfix">
                  <ul class="socials">
                    <li>
                      <a class="social-icon text-dark" href="javascript:void(0)"><i class="fe fe-facebook"></i></a>
                    </li>
                    <li>
                      <a class="social-icon text-dark" href="javascript:void(0)"><i class="fe fe-twitter"></i></a>
                    </li>
                    <li>
                      <a class="social-icon text-dark" href="javascript:void(0)"><i class="fe fe-linkedin"></i></a>
                    </li>
                    <li>
                      <a class="social-icon text-dark" href="javascript:void(0)"><i class="fe fe-instagram"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-8 col-12">
              <div class="top-bar-end">
                <ul class="custom">
                  <?php if(empty($user_id)){?>
                  <li>
                    <a href="<?php echo base_url(); ?>login" class="text-dark"><i class="fe fe-user me-1"></i> <span>Register</span></a>
                  </li>
                  <li>
                    <a href="<?php echo base_url(); ?>login" class="text-dark"><i class="fe fe-log-in me-1"></i> <span>Login</span></a>
                  </li>
                  <?php }else{ ?>
                  <li class="dropdown">
                    <a href="javascript:void(0)" class="text-dark" data-bs-toggle="dropdown"><i class="fe fe-home me-1"></i><span> My Dashboard<i class="fe fe-chevron-down  ms-1"></i></span></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <a href="<?php echo base_url(); ?>edit-profile" class="dropdown-item" >
                        <i class="dropdown-icon icon icon-user"></i> My Profile
                      </a>                    
                      <a class="dropdown-item" href="<?php echo base_url(); ?>logout">
                        <i class="dropdown-icon icon icon-power"></i> Log out
                      </a>
                    </div>
                  </li>
                <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div><!--/Topbar-->

      <!--Section-->     
    </div>

  </div>
    <div  class="banner-1 cover-image bg-background-1" data-bs-image-src="<?php echo base_url(); ?>assets/images/banners/5.jpg">
      <!--Topbar-->
      <div class="header-main">
        <!-- Mobile Header -->
        <div class="sticky">
          <div class="horizontal-header clearfix ">
            <div class="container">
              <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
              <span class="smllogo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/brand/logo1.png" width="120" alt="img"/></a></span>
              <span class="smllogo-white"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/brand/logo.png" width="120" alt="img"/></a></span>
              <a href="tel:245-6325-3256" class="callusbtn"><i class="icon icon-phone" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
        <!-- /Mobile Header -->
        <!--Horizontal-main -->
        <div class="horizontal-main header-style1 bg-dark-transparent clearfix p-0 pt-4">
          <div class="horizontal-mainwrapper container clearfix">
            <div class="desktoplogo">
              <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/brand/logo1.png" alt="img">
                <img src="<?php echo base_url(); ?>assets/images/brand/logo.png" class="header-brand-img header-white" alt="logo">
              </a>
            </div>
            <div class="desktoplogo-1">
              <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/brand/logo.png" alt="img"></a>
            </div>
            <nav class="horizontalMenu clearfix d-md-flex">
              <ul class="horizontalMenu-list">
                <li aria-haspopup="true"><a href="<?php echo base_url(); ?>">Home </a></li>
                <li aria-haspopup="true"><a href="<?php echo base_url(); ?>about-us">About Us </a></li>
                <li><a href="javascript:void(0)">Find your Cohort</a></li>
                <li><a href="javascript:void(0)">Complaint</a></li>
                <li><a href="javascript:void(0)">Value for you</a></li>
                <li aria-haspopup="true"><a href="<?php echo base_url(); ?>blog">Blog</a></li>
                <li aria-haspopup="true"><a href="<?php echo base_url(); ?>contact-us"> Contact Us</a></li>
               <!--  <li aria-haspopup="true" class="p-0 mt-1">
                  <span><a class="btn btn-secondary" href="javascript:void(0)">Register Now</a></span>
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
      </div>
    
      <script>
       /* $(document).ready(function () {
          $("#header-search").autocomplete({
            source: function(request,response){
              var url=base_url+'get-header-search'; 
              $.ajax({
                url: url,
                dataType: "json",
                data: {
                  searchText: request.term,
                  select: 'keyword'
                },
                success: function (data) {
                  response($.map(data.list, function (item) {
                    return {
                      label: item.keyword
                    };
                  }));
                }
              });
            },
            minLength: 2,
            select: function(event,ui){
              $('#header-search').val(ui.item.value);
              $("#searchform").submit(); 
            }
          });
        });*/
      </script>
