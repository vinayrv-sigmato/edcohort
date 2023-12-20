  <style>
    .owl-carousel-similar .item{
      margin: 3px;
    }
    .form-control{
      border-radius: 0px;
    }
    .form-horizontal .form-group {
    
        margin-left: 0px;
    }
    .product-options_desc {
        margin-bottom: 10px;
    }
    .addon_group_name {
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 5px;
    }
    .addon_group_description {
        font-size: 14px;
    }
    .padding-left-0{
      padding-left: 0px !important;
    }
    .variation_price {
        font-size: 17px;
        color: #3ac0bd;
    }
    .variation_price span {
        color: #565656;
    }
    .addon_label{
      font-weight: 400;
      margin-right: 15px;
    }
    .cart_quantity {
      background-color: #fff;
      border: 1px solid #7d7b7b;      
      height: 30px;
      width: 30px;
      text-align: center;
    }
    .qty{
      text-align: center;
    }
  
    ul.star_list li {
      color: #666;
      float: left;
      font-size: 13px;
      line-height: 14px;
      list-style: none;
      /*margin: 4px 0;*/
      width: 100%;
    }
    .star_list > li {
        float: left;
        line-height: 23px !important;
        font-size: 14px !important;
        position: relative;
    }  
    .star_list > li > label {
        cursor: pointer;
    }
    .star_list > li::before {
        color: #428bca;
        content: "\f105";
        font-family: fontawesome;
        left: -14px;
        position: absolute;
    }
    .star_list > li > label:hover {
        color: #428bca;
    }
    .active_rating {
        color: #428bca;
    }
    .rewiew_name {
        color: #428bca;
        font-size: 15px;
    }
    .rewiew_star {
        color: #428bca;
        font-size: 15px;
    }
    .rewiew_date {
        color: #428bca;
        font-size: 15px;
    }
    .description-title{
      font-size: 13px;
      font-weight: bold;
      font-family: sans-serif;
      text-transform: uppercase;
      color: #000;
      margin-top: 0;
      margin-bottom: 0;
    }
    .cart-form-control {
        height: 26px !important;
        padding: 1px 5px !important;
        font-size: 14px !important;
    }
    #cart_form > .form-group {
        margin-bottom: 5px !important;
    }
    .table-breakdown>thead>tr>td {
        border-bottom: 1px solid #ececec !important;
    }
    .table>tbody>tr>td {
        border-top: 0px !important;
    }
    .table-breakdown {
        border: 0px;
    }
    .table-breakdown>tbody>tr>td, .table-breakdown>thead>tr>td {
        padding-left: 0px;
    }
    #cart_form > .form-group > div > label {
        text-transform: uppercase; 
        font-size: 12px;
        font-family: sans-serif;
        font-weight: bold;
    }
  </style>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/easyzoom.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/products.css" />
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme.css" />-->
<div class="breadcrumb" id="breadcrumb">
  <div class="container" itemprop="breadcrumb">
    <div class="row">
      <div class="col-md-24">
        <a title="Back to the frontpage" class="homepage-link" href="<?php echo base_url(); ?>">Home</a>
        <span>/</span>
        <a title="Back to the frontpage" class="homepage-link" href="<?php echo base_url(); ?>jewelry">Jewelry</a>
        <span>/</span>
        <span class="page-title">Jewelry Details</span>
      </div>
    </div>
  </div>
</div>
<?php echo message(); ?>
      <section id="productDetails" class="product-detail">
        <div class="container">
          <div class="row narrow-content">          
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 clearfix">
              <div class="product-gallery vertical-pager1">               
                <ul>
                  <?php $count=0; foreach ($image_array as $key => $value) { ?>     
                  <li class="mySlides easyzoom easyzoom--overlay easyzoom--with-thumbnails" id="slides_<?php echo $count; ?>" style="height: 400px;">                      
                    <a href="<?php echo $value; ?>">
                      <img src="<?php echo $value; ?>" alt="<?php echo $records['0']->product_name;  ?>" width="100%" height="100%"  />
                    </a>
                  </li>         
                  <?php $count++; } ?>
                  <?php foreach ($video_array as $key => $value) { ?> 
                    <li class="mySlides" id="slides_<?php echo $count; ?>" style="height: 400px;">
                      <video width="100%" height="100%" autoplay loop>
                        <source src="<?php echo $value ?>" type="video/mp4">                     
                      </video>
                    </li>
                  <?php $count++; } ?>                  
                  <?php foreach ($video_link as $key => $value) { ?> 
                    <li class="mySlides" id="slides_<?php echo $count; ?>" style="height: 400px;">
                      <video width="100%" height="100%" autoplay loop>
                        <source src="<?php echo $value ?>" type="video/mp4">                     
                      </video>
                    </li>
                  <?php $count++; } ?>
                </ul>
                <div id="bx-pager" class="product-gallery_preview">                         
                  <?php $count=0; foreach ($image_array as $key => $value) { ?>                        
                    <a href="javascript:void(0)"><img src="<?php echo $value; ?>" onclick="showSlides('<?php echo $count; ?>')" alt="<?php echo $records['0']->product_name;  ?>" /></a>        
                  <?php $count++; } ?>
                  <?php foreach ($video_array as $key => $value) { ?>                   
                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/360_degree.jpg" onclick="showSlides('<?php echo $count; ?>')" width="" height="" title="Video" data-toggle="tooltip"></a>
                  <?php $count++; } ?>                  
                  <?php foreach ($video_link as $key => $value) { ?>                   
                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/360_degree.jpg" onclick="showSlides('<?php echo $count; ?>')" width="" height="" title="Video" data-toggle="tooltip"></a>
                  <?php $count++; } ?>
                </div>
              </div>
            </div>
            <div class="product-cart product-details-narrow col-lg-6 col-md-6 col-sm-12 col-12 clearfix">                                                 
              <div class="product-options_header clearfix wow fadeInUp" data-wow-delay="0.3s">
                <!--  <h3 class="font-additional font-weight-bold text-uppercase"></h3> -->
                <h3 class="font-additional font-weight-bold text-uppercase">Style# <?php if($records['0']->product_sku != ""){ echo $records['0']->product_sku; }  ?>   </h3>
                <img src="<?php echo base_url(); ?>assets/images/back-icon.png" alt="Back" class="my-tooltip my-dropdown pull-right" data-toggle="modal" data-target="" onclick="window.history.back()" data-placement="top" title="Back" data-tooltip="true">
                <?php if ($review_rating>0): ?>  
                <div class="rewiew_star"> 
                    <?php for($i=1;$i<=5;$i++){ 
                      if($i<=$review_rating){
                        echo '<i class="fa fa-star"></i>';
                      }else{
                        echo '<i class="fa fa-star-o"></i>';
                      }
                    } ?> 
                    <span> <?php echo number_format($review_count); ?> Customer Reviews</span> 
                </div> 
                <?php endif ?>
                <?php if($records['0']->product_is_price=="1"){ ?>
                <div class="product-price font-additional font-weight-normal customColor" id="total_price">  
                <?php if ($records['0']->product_sale_price > 0): ?>
                  <span class="price price--rrp">$<?php echo $records['0']->product_price; ?></span>
                <?php endif ?> <?php echo $product_price_show; ?></div> 
              <?php } ?>
                <p>
                <!-- <small class="font-additional font-weight-bold text-uppercase">SKU Number:
                <?php //if($records['0']->product_sku != null){ echo $records['0']->product_sku; }  ?>
              </small> -->   
              </p>            
              </div>

              <div class="product-options_body clearfix wow fadeInUp" data-wow-delay="0.3s">
                <h4 class="description-title">PRODUCT DESCRIPTION</h4>
                <div class="product-options_desc font-main color-third"><?php if($records['0']->product_short_description != ""){ echo $records['0']->product_short_description; }  ?>
                  
                  <p><?php echo $records['0']->product_description; ?></p>
                  <?php if (!empty($product_feature)): ?>
                    <p class="padding-two"> 
                      <?php foreach ($product_feature as $feature): ?>
                        <?php if($feature->product_feature != ""){ echo '<li>'.$feature->product_feature.'</li>'; } ?>       
                      <?php endforeach ?>                      
                    </p>
                  <?php endif ?>
                  
                  <!-- <?php if($records['0']->semi_mount_dwt != ""){ ?> 
                    <h4 class="description-title">Approximate Semi Mount dwt</h4>
                    <p><?php echo number_format($records['0']->semi_mount_dwt,2); ?></p>
                  <?php }  ?> -->
                  <?php if($records['0']->stone_breakdown != ""){ ?> 
                    <h4 class="description-title">Stone Breakdown</h4>
                    <table class="table table-condensed table-responsive table-breakdown">
                      <thead>
                        <tr>                        
                          <td>COMPONENTS</td>
                          <td>QTY</td>
                          <td>QUALITY</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $stone_breakdown = explode(',', $records['0']->stone_breakdown); 
                          foreach ($stone_breakdown as $key => $value) { ?>
                            <?php $values = explode('-', $value); ?>
                            <tr>
                              <td><?php echo @$values['1']; ?></td>
                              <td><?php echo @$values['0']; ?></td>
                              <td><?php //echo ($records['0']->diamond_quality) ? $records['0']->diamond_quality : ''; ?>
                                VS-SI F-G
                              </td>
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  <?php }  ?>

                  <?php if($records['0']->diamond_cttw_provided != ""){ ?> 
                    <h4 class="description-title">Total Weight of Diamonds</h4>
                    <p><?php echo $records['0']->diamond_cttw_provided; ?></p>
                  <?php }  ?>

                  <p class="padding-two"> <?php echo $product_option; ?> </p>
                </div>
               
                <form action="" id="cart_form" class="form-horizontal"> 
                <input type="hidden" id="cart_product_id" name="cart_product_id" value="<?php echo $records['0']->product_id; ?>">    
                  <div class="form-group">
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 padding-left-0">   
                      <label>Metal Color : </label>
                    </div>
                    <input type="hidden" name="cart_option[]" value="Metal Color">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 select-width1">  
                      <select name="cart_metal_color" id="cart_metal_color" class="form-control cart-form-control">     
                        <?php foreach ($metal_color_list as $row): ?>                          
                          <option value="<?php echo $row->value; ?>"><?php echo $row->value; ?></option>     
                        <?php endforeach ?> 
                      </select>
                    </div>
                  </div>           
                  <?php echo $var_html; ?>
                  <?php echo $addon_html; ?>
                  <?php if ($records['0']->product_minimum_quantity){
                      $product_minimum_quantity=$records['0']->product_minimum_quantity;
                    }else{
                      $product_minimum_quantity=1;
                    }
                    if ($records['0']->product_maximum_quantity){
                      $product_maximum_quantity=$records['0']->product_maximum_quantity;
                    }else{
                      $product_maximum_quantity=10;
                    } ?>
                  <div class="quantity buttons_added" style="display: <?php if($product_maximum_quantity==1){ echo 'none'; } ?>">                    
                    <button type="button" class="minus cart_quantity" id="cart_quantity_minus"><i class="fa fa-minus"></i></button>
                    <input type="text" step="1" min="<?php echo $product_minimum_quantity; ?>" max="<?php echo $product_maximum_quantity; ?>" name="quantity" id="cart_quantity" readonly="" value="1" title="Qty" class="input-text qty text" size="1">
                    <button type="button" class="plus cart_quantity" id="cart_quantity_plus"><i class="fa fa-plus"></i></button>
                  </div>
                </form> 
                <?php if($records['0']->product_is_price=="1"){ ?>              
                   <div class="col-md-12 variation_price" id="option_price" style="display: none;"></div> 
                   <!-- <div class="col-md-12 variation_price" id="total_price" style="display: none;"></div>  -->
                <?php } ?>
              </div>
              <div class="product-options_cart clearfix wow fadeInUp" data-wow-delay="0.3s" style="padding-bottom: 10px;">
                
                <?php $user_id = $this->session->userdata('user_id'); ?>
                        
                <?php if($records['0']->product_is_price=="1"){ ?>     
                <div class="" style="display: inline-block;"> 
                    <a href="javascript:void(0)" onclick="add_cart('<?php echo $records['0']->product_id; ?>',this)" class="btn button-additional button-big font-additional font-weight-normal text-uppercase hvr-rectangle-out hover-focus-bg before-bg">
                    <span class="fa fa-shopping-cart" aria-hidden="true"></span> Add To Cart</a>                  
                </div>
                <?php }?>
                 <?php if($records['0']->product_is_get_quote=="1"){ ?>      
                <div class="" style="display: inline-block;"> 
                    <a href="javascript:void(0)" onclick="get_quote_modal('<?php echo $records['0']->product_id; ?>',this)" class="btn button-additional button-big font-additional font-weight-normal text-uppercase hvr-rectangle-out hover-focus-bg before-bg">
                    <span class="fa fa-money" aria-hidden="true"></span> Request a Quote</a>                  
                </div>
                <?php } ?> 

                <div class="" style="margin-top: 13px;">  
                  <ul class="product-links" style="padding-bottom: 0">
                    <?php if($records['0']->product_is_price=="1"){ ?>
                    <li>                      
                        <a href="javascript:void(0)" onclick="add_wish('<?php echo $records['0']->product_id; ?>',this)" class="font-additional font-weight-normal hover-focus-color">
                          <span aria-hidden="true" class="fa fa-heart"></span> Add To Wishlist</a>                                        
                    </li>
                    <li>
                      <a href="#"  data-toggle="modal" data-target="#myModaljewelry" class="font-additional font-weight-normal hover-focus-color">
                        <span class="fa fa-envelope" aria-hidden="true"></span>
                        email to friend
                      </a>
                    </li>
                    <li> <a href="javascript:void(0);" onclick="print_detail('<?php echo $records['0']->product_id; ?>')"> <span class="fa fa-print" aria-hidden="true"></span>Print Details </a> </li>                    
                    <li> <a href="javascript:void(0);" onclick="add_compare('<?php echo $records['0']->product_id; ?>')"> <span class="fa fa-exchange" aria-hidden="true"></span> Compare</a> </li>
                    <?php } ?>
                    <li> <a href="javascript:void(0)"  data-toggle="modal" data-target="#myModalappointment" class="font-additional font-weight-normal hover-focus-color"> <span class="fa fa-clock-o" aria-hidden="true"></span> APPOINTMENT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> </li>
                  </ul> 
                                  
                </div>
              </div>
              <!-- <div class="product-options_header clearfix wow fadeInUp">
                <h3 class="font-additional font-weight-bold text-uppercase"><a href="#slider">Similar Products</a></h3>                 
              </div> -->             
            </div>      
          </div>
        </div>

          <div class="modal fade" id="get_quote_modal" role="dialog" >            
            <div class="modal-dialog">
              <div class="modal-content radius-flat">
                <div class="modal-header bg-site">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h4 class="modal-title">Get Quote</h4>
                </div>
                <div class="modal-body">
                    <div id="get_quote_response" class="text-center"></div>
                    <form action="<?php echo base_url(); ?>get-quote-jewelry" method="post" onsubmit="overlay()" id="get_quote_form" class="form-horizontal contact-form form-design">
                      <?php echo csrf_field(); ?>                 
                      <input type="hidden" name="product_id" value="<?php echo $records['0']->product_id; ?>" />                          
                      <div class="form-group">
                          <label class="col-md-3"> Name :</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control radius-flat"  name="name" placeholder="Name" required="required" autofocus="">
                          </div>
                      </div>                  
                      <div class="form-group">
                          <label class="col-md-3"> Email :</label>
                          <div class="col-md-9">
                              <input type="email" class="form-control radius-flat"  name="email" placeholder="Email" required="required">
                          </div>
                      </div>                    
                      <div class="form-group">
                          <label class="col-md-3"> Phone :</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control radius-flat" name="phone"  onkeypress="" maxlength="12" placeholder="Mobile No." required="required">
                          </div>
                      </div>                      
                      <div class="form-group">
                          <label class="col-md-3"> Message :</label>
                          <div class="col-md-9">
                              <textarea class="form-control textarea-contact radius-flat" rows="5"  name="comment" placeholder="Type Your Message/Feedback here..."></textarea>
                          </div>                      
                      </div>                    
                      <button class="btn btn-primary radius-flat" onclick="get_quote()" type="button"> <span class="fa fa-send"></span> Send </button>
                    </form>
                </div>
              <div class="modal-footer bg-site"></div>
            </div>
          </div>
      </div>
                   
      <div class="modal fade" id="myModaljewelryinquiry" role="dialog" >            
        <div class="modal-dialog"> 
          <div class="modal-content radius-flat">
            <div class="modal-header bg-site">
              <button type="button" class="close" data-dismiss="modal">×</button>
              <h4 class="modal-title">Email Us</h4>
            </div>
            <div class="modal-body">
              <div id="emailus_response" class="text-center"></div>
              <form action="<?php echo base_url('emailus-jewelry') ?>" method="post" onsubmit="overlay()"  id="emailus_form1" class="form-horizontal contact-form form-design">
              <?php echo csrf_field(); ?>                 
              <input type="hidden" name="product_id" value="<?php echo $records['0']->product_id; ?>" />                     
              <div class="form-group">
                <label class="col-md-3"> Name :</label>
                <div class="col-md-9">
                  <input type="text" class="form-control radius-flat"  name="name" placeholder="Name" required="required" autofocus="">
                </div>
              </div>                  
              <div class="form-group">
                <label class="col-md-3"> Email :</label>
                <div class="col-md-9">
                  <input type="email" class="form-control radius-flat"  name="email" placeholder="Email" required="required">
                </div>
              </div>                    
              <div class="form-group">
                <label class="col-md-3"> Phone :</label>
                <div class="col-md-9">
                  <input type="text" class="form-control radius-flat" name="phone"  onkeypress="" maxlength="12" placeholder="Mobile No." required="required">
                </div>
              </div>                      
              <div class="form-group">
                <label class="col-md-3"> Message :</label>
                <div class="col-md-9">
                  <textarea class="form-control textarea-contact radius-flat" rows="5"  name="comment" placeholder="Type Your Message/Feedback here..." required=""></textarea>
                </div>                      
              </div>                    
              <button class="btn btn-primary radius-flat" type="submit"> <span class="fa fa-send"></span> Send </button>
            </form>
            </div>
            <div class="modal-footer bg-site"> </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="myModaljewelry" role="dialog" >            
        <div class="modal-dialog">            
          <!-- Modal content-->
          <div class="modal-content radius-flat">
            <div class="modal-header bg-site">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Send Email To Friend</h4>
            </div>
            <div class="modal-body"> 
              <div id="email_response" class="text-center"></div>
              <form action="<?php echo base_url(); ?>email-jewelry-details" method="post" onsubmit="overlay()" id="email_form1" class="form-horizontal contact-form form-design">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="product_id" value="<?php echo $records['0']->product_id; ?>" />
                <div class="form-group">
                  <label class="col-md-3">Name :</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control radius-flat"  name="name"  placeholder="Name" required="required" autofocus="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Email :</label>
                  <div class="col-md-9">
                    <input type="email" class="form-control radius-flat"  name="email"  placeholder="Email" required="required">
                  </div>
                </div>                    
                <div class="form-group">
                  <label class="col-md-3">Phone :</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control radius-flat" name="phone" maxlength="10" placeholder="Mobile No." required="required">
                  </div>
                </div>                      
                <div class="form-group">
                  <label class="col-md-3">Comment :</label>
                  <div class="col-md-9">
                    <textarea class="form-control textarea-contact radius-flat" rows="5"  name="comment" placeholder="Type Your Message/Feedback here..." required=""></textarea>
                  </div>                      
                </div>                    
                <button class="btn btn-primary radius-flat" type="submit"> <span class="fa fa-send"></span> Send </button>
              </form>
            </div>
            <div class="modal-footer bg-site">                 
            <!--  <button type="btn blue button-additional button-small font-additional font-weight-normal text-uppercase hvr-rectangle-out hover-focus-bg before-bg" data-dismiss="modal">Close</button> -->                
            </div> 
          </div>              
        </div>
      </div>

    <!-- Appointment model -->
    <div class="modal fade" id="myModalappointment" role="dialog" >
      <div class="modal-dialog">
        <div class="modal-content radius-flat">
          <div class="modal-header bg-site">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Appointment</h4>
          </div>
          <div class="modal-body">
            <div id="appointment_response" class="text-center"></div>
            <form action="<?php echo base_url('appointment-form') ?>" method="post" onsubmit="overlay()"  id="appointment_form1" class="form-horizontal contact-form form-design">
              <div class="form-list">
                <?php echo csrf_field(); ?>
                <div class="form-schedule">
                  <div class="col-lg-12 inner-form-schedule">
                    <div class="form-group">
                      <label class="col-md-3" > First Name :</label>
                      <div class="col-md-9">
                          <input name="firstname" class="input-text required-entry name form-control radius-flat" required="required" placeholder="First Name*" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 inner-form-schedule">
                    <div class="form-group">
                      <label class="col-md-3" > Last Name :</label>
                      <div class="col-md-9">
                       <input name="lastname" class="input-text required-entry name form-control radius-flat" required="required" placeholder="Last Name*" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-schedule">
                  <div class="col-lg-12 inner-form-schedule">
                    <div class="form-group">
                      <label class="col-md-3" > Email :</label>
                      <div class="col-md-9">
                      <input name="email" class="input-text required-entry email validate-email form-control radius-flat" required="required" placeholder="Email*" type="email">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 inner-form-schedule">
                    <div class="form-group">
                      <label class="col-md-3" > Phone :</label>
                      <div class="col-md-9">
                       <input name="phone" class="input-text telephone validate-phoneLax required-entry form-control radius-flat" required="required" placeholder="Phone*" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-schedule">
                  <div class="col-lg-12 inner-form-schedule">
                    <div class="dropdown form-group">
                      <label class="col-md-3" > Time :</label>
                      <div class="col-md-9">
                        <select name="time" class="required-entry validate-select form-control radius-flat" required="required" id="dropdownval">
                          <option value="0">Preferred Time*</option>
                          <option value="10am">10am </option>
                          <option value="10:30am">10:30am</option>
                          <option value="11am">11am</option>
                          <option value="11:30am">11:30am</option>
                          <option value="12pm">12pm</option>
                          <option value="12:30pm">12:30pm</option>
                          <option value="1pm">1pm</option>
                          <option value="1:30pm">1:30pm</option>
                          <option value="2pm">2pm</option>
                          <option value="2:30pm">2:30pm</option>
                          <option value="3pm">3pm</option>
                          <option value="3:30pm">3:30pm</option>
                          <option value="4pm">4pm</option>
                          <option value="4:30pm">4:30pm</option>
                          <option value="5pm">5pm</option>
                          <option value="5:30pm">5:30pm</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12 inner-form-schedule">
                    <div class="form-group">
                      <label class="col-md-3 no-padding-right" > Preferred Date :</label>
                      <div class="col-md-9">
                          <input name="date" id="datepicker" class="validate-date input-text date_from required-entry form-control radius-flat" required="required"  placeholder="Preferred Date*" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 inner-form-schedule">
                    <div class="form-group">
                      <label class="col-md-3" > Comment :</label>
                      <div class="col-md-9">
                         <textarea type="text" name="comment" class="input-text comment form-control radius-flat" placeholder="Comments" style="height:80px;"></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="button-set">
                  <button class="btn btn-primary radius-flat" value="" type="submit" > <span class="fa fa-send"></span> Send </button>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer bg-site"> </div>
        </div>
      </div>
    </div>
      </section>
      <section class="need-help">
        <div class="container">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 clearfix no-padding-left">
                  <div class="text">
                      <h4>Questions?</h4>
                  </div>
                  <div class="links">
                    <div class="link-wrapper">
                        <a rel="nofollow" data-fallback-url="" href="tel:<?php echo SITE_PHONE ?>" style="display: inline-table;padding-right: 15px"><i class="fa fa-phone"></i><span><?php echo SITE_PHONE ?></span></a>
                        <a data-email-address="<?php echo SITE_EMAIL ?>" data-toggle="modal" data-target="#myModaljewelryinquiry" style="cursor:pointer; display: inline-table;"><i class="fa fa-envelope"></i><span>Email Us</span></a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 clearfix border-left">
                  <div class="product-options_row">
                    <div class="clearfix"></div>
                    <h4 class="">Share this product</h4>
                    <ul class="social-list">
                      <li><a href="javascript:void(0)" class="hover-focus-border hover-focus-bg hvr-rectangle-out before-bg" id="fb_share"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
                      <li><a href="javascript:void(0)" class="hover-focus-border hover-focus-bg hvr-rectangle-out before-bg" id="tw_tweet"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
      </section>
      <section id="tabsPanel" class="tabs-container background-container padding-two">
        <div class="container">
          <div class="tabs-panel" role="tabpanel">
            <ul class="nav-tabs wow fadeInUp" data-wow-delay="0.3s" role="tablist">
              <!-- <li role="presentation" class="active">
                <a class="hover-focus-border hover-focus-bg font-additional font-weight-normal hvr-rectangle-out before-bg" href="#description" aria-controls="home" role="tab" data-toggle="tab">description</a>
              </li>
              <li role="presentation">
                <a class="hover-focus-border hover-focus-bg font-additional font-weight-normal hvr-rectangle-out before-bg" href="#features" aria-controls="profile" role="tab" data-toggle="tab">Features</a>
              </li>
              <li role="presentation">
                <a class="hover-focus-border hover-focus-bg font-additional font-weight-normal hvr-rectangle-out before-bg" href="#attributes" aria-controls="profile" role="tab" data-toggle="tab">Attributes</a>
              </li> -->
              <li role="presentation" class="active">
                <a class="hover-focus-border hover-focus-bg font-additional font-weight-normal hvr-rectangle-out before-bg" href="#reviews" aria-controls="profile" role="tab" data-toggle="tab">REVIEWS (<?php echo ($review_count) ? $review_count : 0 ;  ?>)</a>
              </li>
            </ul>
            <div class="tab-content no-padding-top wow fadeInUp" data-wow-delay="0.3s">
              <!-- <div id="description" class="tab-pane fade in active" role="tabpanel">  
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                  <h4>Product Description</h4>
                  <div><?php //echo $records['0']->product_description; ?></div>
                </div>
              </div>
              <div id="features" class="tab-pane fade" role="tabpanel">  
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">                            
                  <h4>Product Features</h4>            
                  <ul class="bullet-list">                        
                      <?php //foreach ($product_feature as $feature): ?>
                      <?php //if($feature->product_feature != ""){ echo '<li>'.$feature->product_feature.'</li>'; } ?>       
                    <?php //endforeach ?>
                  </ul>
                </div>
              </div>
              <div id="attributes" class="tab-pane fade" role="tabpanel">  
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">                            
                  <h4>Product Attributes</h4>            
                  <ul class="bullet-list">                        
                      <?php //echo $product_option; ?>
                  </ul>
                </div>
              </div> -->
              <div id="reviews" class="tab-pane fade in active" role="tabpanel">
                <?php foreach ($product_review as $prkey): ?> 
                <div>
                  <div>
                    <span class="rewiew_name"><strong><i class="fa fa-user-circle-o"></i> <?php echo $prkey->firstname." ".$prkey->lastname; ?> </strong></span> Gave 
                    <span class="rewiew_star"> 
                      <?php for ($i=1; $i <= 5 ; $i++) { 
                        if($i<=$prkey->product_rating){
                          echo '<i class="fa fa-star"></i>';
                        }else{
                          echo '<i class="fa fa-star-o"></i>';
                        }
                      } ?> 
                    </span> On
                    <span class="rewiew_date"><strong> <?php echo date('d-M-Y',strtotime($prkey->product_review_added)); ?> </strong></span>
                  </div>
                  <div>
                    <strong><?php echo ($prkey->product_review_title!=null) ? $prkey->product_review_title : ""; ?></strong>
                    <p><?php echo $prkey->product_review; ?></p>
                  </div>
                </div>
                <?php endforeach ?>

                <?php if ($review_count==0){ ?>
                  <p>No Reviews Available.</p>
                <?php } ?>
                <?php if ($review_count>10){ ?>
                <div><a class="btn btn-danger radius-flat pull-right" href="<?php echo base_url(); ?>product-review/<?php echo $records['0']->product_slug; ?>">See More Review</a></div> 
                <?php } ?>

                <?php if ($this->session->userdata('user_id') != "") { ?>
                <div class="col-md-offset-2 col-lg-offset-2 col-sm-offset-1 col-md-8 col-lg-8 col-sm-10 col-12">
                  <form action="<?php echo base_url(); ?>send-product-review" method="post" class="form-horizontal">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="product_id" value="<?php echo $records['0']->product_id; ?>">
                      <div class="form-group">                                    
                          <div class="col-md-12">
                            <ul class="star_list">
                              <li><span> 5 Star </span><label for="rating_star_5" class="active_rating">
                                <input type="radio" id="rating_star_5" name="review_rating[]" value="5" checked=""  style="opacity: 0">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></label>                                                              
                              </li>                  
                              <li><span> 4 Star </span><label for="rating_star_4">
                                <input type="radio" id="rating_star_4" name="review_rating[]" value="4"  style="opacity: 0">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></label>
                              </li>                  
                              <li><span> 3 Star </span><label for="rating_star_3">
                                <input type="radio" id="rating_star_3" name="review_rating[]" value="3"  style="opacity: 0">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></label>
                              </li> 
                              <li><span> 2 Star </span><label for="rating_star_2">
                                <input type="radio" id="rating_star_2" name="review_rating[]" value="2" style="opacity: 0">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></label>
                              </li> 
                              <li><span> 1 Star </span><label for="rating_star_1">
                                <input type="radio" id="rating_star_1" name="review_rating[]" value="1" style="opacity: 0">
                                <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></label>
                              </li>                 
                            </ul> 
                          </div>
                      </div>
                      <div class="form-group">                                    
                          <div class="col-md-12">
                              <input type="text" class="form-control radius-flat" id="review_title" name="review_title" placeholder="Review Tag Line" required="">                              
                          </div>
                      </div>
                      <div class="form-group">                                    
                          <div class="col-md-12">
                              <textarea class="form-control radius-flat" name="review_content" id="review_content" cols="30" rows="10" placeholder="Your Review"  required=""></textarea>                              
                          </div>
                      </div>
                      <div class="form-group">                                    
                          <div class="col-md-12">
                              <button type="submit" class="btn btn-primary radius-flat pull-right">Submit Review</button>
                          </div>
                      </div>
                  </form>
                </div>                
                <?php }else { ?>
                  <a class="btn btn-primary radius-flat" href="<?php echo base_url(); ?>login?referer=<?php echo urlencode(base_url().'product-review/'.$records['0']->product_slug); ?>">Write Review</a>
                <?php } ?>                
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="slider" class="slider-products padding-two">
        <div class="container">
          <div class="starSeparatorBox clearfix">
            <div class="starSeparator wow zoomIn" data-wow-delay="0.3s">
              <span aria-hidden="true" class="icon-star"></span>
            </div>
            <h3 class="title font-additional text-uppercase wow zoomIn no-padding-top padding-two" data-wow-delay="0.3s">Similar Products</h3>
            <div id="" class="owl-carousel owl-carousel-engagement" >
            <?php foreach ($similar_records as $row): ?>
              <?php if($row->image_show!=""){ ?>

              <div class="product-col product-space item position-relative product-overlay">
            <div class="product-div product-bg position-relative product-overlay">
              <a href="<?php echo base_url(); ?>jewelry-details/<?php echo $row->product_slug; ?>">
              <figcaption class="product-image">
              <img src="<?php echo base_url(); ?><?php echo $row->image_show; ?>">
              </figcaption>
              </a>             
            </div>
            <div class="card-body">
                    <h4 class="card-title">
                        <a href="<?php echo base_url(); ?>jewelry-details/<?php echo $row->product_slug; ?>">Style# <?php if($row->product_sku!=""){ echo $row->product_sku;} ?></a>
                    </h4>
                    <div class="card-text price-font-type" data-test-info-type="price">
                      <?php if($row->product_is_price=="1"){ ?>
                      <div class="price-section price-section--withoutTax ">                            
                          <?php if ($row->product_sale_price > 0): ?>
                            <span class="price price--rrp">$<?php echo $row->product_price; ?></span>
                          <?php endif ?>
                          <span class="price price--withoutTax"><?php echo $row->product_price_show; ?></span>
                      </div>
                      <?php } ?>
                    </div>
                </div>
          </div>

              <?php } ?>
              <?php endforeach ?>


            </div>
          </div>
        </div>
      </section> 
      <script src="<?php echo base_url(); ?>assets/js/ajax/manage_jewelry_ajax.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/easyzoom.js"></script>
  <script>
    $(document).ready(function(){
      $(".star_list label").on('click',function(){
        $(".star_list label").removeClass('active_rating');
        $(this).toggleClass('active_rating');        
      });
    });
  </script>
  <script>
  $(document).ready(function(){
    n=0;
    $(".mySlides").hide();
    $("#slides_"+n).show(); 

    showSlides(n);
    //$("#easy_zoom").hide();
  });
  function showZoom()
  {  
    $(".mySlides").hide();
    $("#easy_zoom").show();
  }
  </script> 

  <script>
    var $easyzoom = $('.easyzoom').easyZoom();
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');
    $('.thumbnails').on('click', 'a', function(e) {
      var $this = $(this);
      e.preventDefault();
      api1.swap($this.data('standard'), $this.attr('href'));
    });   
  </script>
        
<script>
    $(document).ready(function(){
        $("#email_form").submit(function(){          
          $.ajax({
                type: 'POST',
                url: '<?php echo base_url('email-jewelry-details') ?>', 
                data: $(this).serialize()
            })
            .done(function(data){             
                $('#email_response').html(data);                
                setTimeout(function(){
                $('#myModaljewelry').modal('hide');
                //location.reload();
                    }, 2000);                 
            });
            return false;
        });

        $("#appointment_form").submit(function(){            
          $.ajax({
                type: 'POST',
                url: '<?php echo base_url('appointment_form') ?>', 
                data: $(this).serialize()
            })
            .done(function(data){
                //alert(data);
                // show the response
                $('#appointment_response').html(data);
                 setTimeout(function(){
                $('#myModalappointment').modal('hide');
                //location.reload();
                    }, 2000);                   
            });
            return false;
        });
    
        $("#emailus_form").submit(function(){      
          $.ajax({
                type: 'POST',
                url: '<?php echo base_url('emailus-jewelry') ?>', 
                data: $(this).serialize()
            })
            .done(function(data){         
                $('#emailus_response').html(data);
                setTimeout(function(){
                $('#myModaljewelryinquiry').modal('hide');
                //location.reload();
                    }, 2000); 
            });
            return false;
        });    
    });
</script>

<script type="text/javascript">
    var shared_url ="<?php echo current_url() ?>";
    $(document).on("click", "#fb_share", function(e){
      window.open("https://www.facebook.com/sharer/sharer.php?u="+shared_url,"MsgWindow","width=500, height=500,resize-able=yes");
    });
    $(document).on("click", "#tw_tweet", function(e){
      window.open("https://twitter.com/intent/tweet?url="+ shared_url+"&text=platinumdays","MsgWindow","width=500, height=500,resize-able=yes");
    });
</script>        
<script>
//   $(document).ready(function(){
//     $(".owl-carousel-similar").owlCarousel({
//         items:5,
//         itemsDesktop:[1000,4],
//         itemsDesktopSmall:[979,4],
//         itemsTablet:[768,3],
//         pagination:true,
//         autoPlay:2000,
//         margin: 15,
//     });
// });
</script>  
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd',minDate: 0, });

  } );
  </script>
  <script>
    $(document).ready(function(){
      variation();
    });
    function variation(){
      var value_form = $('#cart_form').serialize();
      
      $.ajax({
            url: base_url+'product-variation-price',
            dataType: 'json',
            type: 'get',            
            data: value_form, 
                                      
            success: function(data){             
              var variation_price=data.variation_price;
              var option_price=data.option_price;
              var total_price=data.total_price;
              if(parseInt(total_price)){
                //$("#total_price").html('Grand total: <span>$'+total_price+'</span>');
                $("#total_price").html('$'+total_price);
                $("#total_price").show();
              }else{
                $("#total_price").html('');
                $("#total_price").hide();
              }
              // if(parseInt(option_price)){
              //   $("#option_price").html('Option Price: <span>$'+option_price+'</span>');
              //   $("#option_price").show();
              // }else{
              //   $("#option_price").html('');
              //   $("#option_price").hide();
              // }
            }
          });
    }
  </script>
<script>
  $(document).ready(function(){    
    $(".cart_quantity").on('click',function(){
      var cart_quantity=$("#cart_quantity").val();
      var cart_quantity_min=$("#cart_quantity").attr('min');
      var cart_quantity_max=$("#cart_quantity").attr('max');
      var id=$(this).attr('id');      
      if(id=='cart_quantity_plus'){
        if(parseInt(cart_quantity) < parseInt(cart_quantity_max)){        
          $("#cart_quantity").val(parseInt(cart_quantity)+1);
        }
      }
      else if(id=='cart_quantity_minus'){
        if(parseInt(cart_quantity) > parseInt(cart_quantity_min)){        
          $("#cart_quantity").val(parseInt(cart_quantity)-1);
        }
      }      
    });
  });

  $(document).ready(function () {   
    $('#cart_metal_type').on('change', function() {
        var metal_type = this.value;
        if(metal_type == 'Platinum'){
          $("#cart_metal_color").val('White');
          $("#cart_metal_color").prop("disabled", true);
        }else{
           $("#cart_metal_color").prop("disabled", false);
        }
    });
});
</script>