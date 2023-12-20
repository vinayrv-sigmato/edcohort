<style>
th, td {
  text-align: center;
}
.text-danger {
  color: #e6110d;
}
.sample-text {
  color: #3cc1be;
  font-size: 18px;
  font-weight: normal;
  margin: 5px 0 0;
  padding: 0 0 0 150px;
}
</style>
  <!-- CUSTOM CSS for diamond -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/easyzoom.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/products.css" />
<link href="<?php echo base_url(); ?>assets/css/print.css" media="print" rel="stylesheet" type="text/css" >
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme.css" />-->

<!-- breadcrumb -->

<div class="breadcrumb ">  
   <div class="container">
    <div class="d-flex justify-content-between align-items-center">
    <div> <h2><span>Diamond Details</span></h2></div>
     <div><ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>" class="homepage-link" title="Back to the frontpage">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>diamond" title="Back to the Diamond">Diamond</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo $page_head; ?></a>
      </li>
    </ul></div>
     </div>
   </div>
</div>



<div id="print" class="no-print pt-5">
  <section id="productDetails" class="product-detail">
    <div class="container">
      <div class="row narrow-content">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 clearfix">
          <div class="product-gallery vertical-pager1">
            <ul style="height: 450px;padding-left: 0;">
              <!-- <?php //foreach($image_link as $k => $value){  ?>
               <li class="mySlides easyzoom easyzoom--overlay easyzoom--with-thumbnails" id="slides_<?php echo $count; ?>" > <a href="<?php echo $value; ?>"> <img src="<?php echo $value; ?>" alt="No Image Available" width="80%"  /> </a> </li>
             <?php //$count++; } ?> -->
              <?php  $count=0; foreach($image_array as $k => $value){  ?>
              <li class="mySlides easyzoom easyzoom--overlay easyzoom--with-thumbnails" id="slides_<?php echo $count; ?>" > <a href="<?php echo $value; ?>"> <img src="<?php echo $value; ?>" alt="" width="80%"  /> </a> </li>
              <?php $count++; } ?>

              <?php  foreach($sample_image_array as $k => $value){  ?>
              <li class="mySlides " id="slides_<?php echo $count; ?>" >  
                <figure>
                  <img src="<?php echo $value; ?>" alt="" width="80%" style="margin: auto;display: block;" />
                  <figcaption style="text-align: center;">Sample Image</figcaption>
                </figure>
              </li>
              <?php $count++; } ?>

              <?php foreach($video_link as $k => $value){  ?>
              <li class="mySlides" id="slides_<?php echo $count; ?>" style="height: 400px;">
                <iframe src="<?php echo $value; ?>" frameborder="0" width="100%" height="100%"></iframe>
              </li>
              <?php $count++; } ?>
            </ul>
            <div id="bx-pager" class="product-gallery_preview">
              
              <?php $count=0; foreach($image_array as $k => $value){?>
              <a data-slide-index="0" href="javascript:void(0)"><img src="<?php echo $value; ?>" onclick="showSlides('<?php echo $count; ?>')" title="Image" data-toggle="tooltip" /></a>
              <?php $count++; } ?>
              <?php foreach($sample_image_array as $k => $value){?>
              <a data-slide-index="0" href="javascript:void(0)"><img src="<?php echo $value; ?>"  onclick="showSlides('<?php echo $count; ?>')" title="Sample Image" data-toggle="tooltip" /></a>
              <?php $count++; } ?>
              <?php foreach($video_link as $l => $value){  $j++; ?>
              <a><img class="details_thumb " src="<?php echo base_url(); ?>assets/vdobig.png" onclick="showSlides('<?php echo $count; ?>')" width="" height="" title="Video " data-toggle="tooltip"></a>
              <?php $count++; } ?>
              <?php foreach($image_link as $k => $value){  ?>
              <a href="javascript:void(0)" onclick="open_windows('<?php echo $value; ?>')"><img class="details_thumb " src="<?php echo base_url(); ?>assets/diamond-128.png"  title="Image Link" data-toggle="tooltip"></a>
              <?php $count++; } ?>
              
              <?php foreach($certificate_array as $j => $value){  ?>
              <a href="javascript:void(0)" onclick="open_windows('<?php echo $value; ?>')"  title="Certificate" data-toggle="tooltip"><img class="details_thumb" src="<?php echo base_url(); ?>assets/GIA-Logo.jpg"></a>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="product-cart product-details-narrow col-lg-6 col-md-6 col-sm-12 col-12 clearfix">
          <div class="product-options_header clearfix wow fadeInUp" data-wow-delay="0.3s">
            <h3 class="font-additional font-weight-bold text-uppercase">
              <?php if($records['0']->weight != null){ echo number_format($records['0']->weight,2); }  ?>
              Carat
              <?php if($records['0']->shape_full != null){ echo $records['0']->shape_full; }  ?>
              Diamond
              <?php if($records['0']->color != null){ echo $records['0']->color.' Color '; } ?>
              <?php if($records['0']->cut_full != null && $records['0']->cut_full != 'NA'){ echo $records['0']->cut_full.' Cut '; } ?>
              <img src="<?php echo base_url(); ?>assets/images/back-icon.png" alt="Back" class="my-tooltip my-dropdown pull-right" data-toggle="tooltip"  onclick="window.history.back()" data-placement="top" title="Back" data-tooltip="true"> </h3>
              <small class="font-additional font-weight-bold text-uppercase">Sku#:
                <?php if($records['0']->stock_id != null){ echo $records['0']->stock_id; }  ?>
              </small>
              <?php if($this->session->userdata('user_id')!=""){ ?>
              <div class="product-price font-additional font-weight-normal customColor">$
                <?php if($records['0']->total_price!=""){ echo round($records['0']->total_price); } ?>
                    <span>&#3647;</span>
                <?php if($records['0']->currency!=""){ echo round($records['0']->currency); } ?>
              </div>

              <?php }else{ ?>
              <div class="product-price font-additional font-weight-normal customColor">$
                <span class="login" onclick="loginFunction()">Login</span>
              </div>
              <?php } ?> 
              <!-- <div class="product-price font-additional font-weight-normal customColor">$
                <?php if($records['0']->total_price!=""){  echo round($records['0']->total_price - ($records['0']->total_price * (2/100))); }//round($records['0']->total_price); } ?> Wire Price
              </div> -->
          </div>
          <div class="product-options_body clearfix wow fadeInUp" data-wow-delay="0.3s">
            <h4 class="font-additional font-weight-bold text-uppercase">PRODUCT DESCRIPTION</h4>
            <div class="product-options_desc font-main color-third"><?php echo $records['0']->shape_full.' shape '.number_format($records['0']->weight,2).' carat diamond';  ?></div>
            <ul class="bullet-list">
              <li>Lab:
                <?php if($records['0']->lab != null){ $lab=$records['0']->lab; }else{ $lab=""; } ?>               
                <?php  echo $lab; ?>
              </li>
              <?php if($records['0']->stock_id != null){ echo '<li>Stock#: '.$records['0']->stock_id.'</li>'; }  ?>
              <?php if($this->session->userdata('user_id')!=""){ ?>
              <?php if($records['0']->cost_carat != null){ echo '<li>$/Carat: $'.round($records['0']->cost_carat).'</li>'; } ?>
              <?php }else{ ?>
              <?php if($records['0']->cost_carat != null){ echo '<li>$/Carat: <span class="login" onclick="loginFunction()">Login</span> </li>'; } ?>
              <?php } ?>
              <?php if($this->session->userdata('user_id')!=""){ ?>
              <?php if($records['0']->total_price != null){ echo '<li>$/Carat: $'.round($records['0']->total_price).'</li>'; } ?>
              <?php }else{ ?>
              <?php if($records['0']->total_price != null){ echo '<li>Total: <span class="login" onclick="loginFunction()">Login</span> </li>'; } ?>
              <?php } ?>
              <?php if($records['0']->shape_full != null){ echo '<li>Shape: '.$records['0']->shape_full.'</li>'; }  ?>
              <?php if($records['0']->weight != null){ echo '<li>Cts: '.number_format($records['0']->weight,2).'</li> '; }  ?>
              <?php if($records['0']->color != null){ echo '<li>Color: '.$records['0']->color.'</li> '; } ?>
              <?php if($records['0']->grade != null){ echo '<li>Clarity: '.$records['0']->grade.'</li> '; } ?>
              <?php if($records['0']->cut_full != null){ echo '<li>Cut: '.$records['0']->cut_full.'</li>'; } ?>
              <?php if($records['0']->polish_full != null){ echo '<li>Polish: '.$records['0']->polish_full.'</li>'; } ?>
              <?php if($records['0']->symmetry_full != null){ echo '<li>Symmetry: '.$records['0']->symmetry_full.'</li>'; } ?>
              <?php if($records['0']->fluor_full != null){ echo '<li>Fluorescence: '.$records['0']->fluor_full.'</li> '; }  ?>
              <li><a href="#description"><strong>See more details</strong></a></li>
            </ul>
          </div>
          <div class="product-options_cart clearfix wow fadeInUp" data-wow-delay="0.3s">
            <div class="product-options_row col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="" style="display: inline-block;"> 
                     <a data-email-address="<?php echo SITE_EMAIL ?>" data-toggle="modal" data-target="#myModalinquiry" class="btn button-additional button-big font-additional font-weight-normal text-uppercase hvr-rectangle-out hover-focus-bg before-bg"><i class="fa fa-envelope"></i><span> Contact to Seller for Inquiry</span></a>
                </div>
              <ul class="product-links">
                <li> <a href="javascript:void(0)" onclick="add_wish('<?php echo $records['0']->diamond_id; ?>')" class="font-additional font-weight-normal hover-focus-color"> <span aria-hidden="true" class="fa fa-heart"></span> add to wishlist </a> </li>               
               <!--  <li> <a href="javascript:void(0)" onclick="add_cart('<?php echo $records['0']->diamond_id; ?>')" class="font-additional font-weight-normal hover-focus-color"> <span aria-hidden="true" class="fa fa-shopping-cart"></span> add to cart </a> </li>   -->              
                <li> <a href="javascript:void(0)" data-toggle="modal" data-target="#myModaldiamond" class="font-additional font-weight-normal hover-focus-color"> <span class="fa fa-envelope" aria-hidden="true"></span> Email to friend </a> </li>
                <li> <a href="javascript:void(0)" onclick="print_detail('<?php echo $records['0']->diamond_id; ?>')"> <span class="fa fa-print" aria-hidden="true"></span>Print Details</a> </li>                
                <li> <a href="javascript:void(0)" data-toggle="modal" data-target="#myModalappointment" class="font-additional font-weight-normal hover-focus-color"> <span class="fa fa-clock-o" aria-hidden="true"></span> APPOINTMENT   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> </li>
                <li> <a href="javascript:void(0)" onclick="add_compare('<?php echo $records['0']->diamond_id; ?>')"> <span class="fa fa-exchange" aria-hidden="true"></span> Compare</a> </li>
              </ul>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModaldiamond" role="dialog" >
      <div class="modal-dialog"> 
        
        <!-- Modal content-->
        <div class="modal-content radius-flat">
          <div class="modal-header bg-site radius-flat">
            <h4 class="modal-title">Send Email To Friend</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div id="email_response" class="text-center"></div>
            <form action="javascript:void(0)" method="post" enctype="multipart/form-data" id="email_form" class="form-horizontal contact-form form-design">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="inventory_id" value="<?php echo $records['0']->diamond_id; ?>" />
              <div class="form-group">
                <div class="row">
                  <label class="col-md-3" > Name :</label>
                <div class="col-md-9">
                  <input type="text" class="form-control radius-flat"  name="name"  placeholder="Name" required="required" autofocus="">
                </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-md-3" > Email :</label>
                <div class="col-md-9">
                  <input type="email" class="form-control radius-flat"  name="email"  placeholder="Email" required="required">
                </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-md-3" > Phone :</label>
                <div class="col-md-9">
                  <input type="text" class="form-control radius-flat" name="phone"    maxlength="10" placeholder="Mobile No." required="required">
                </div>
                </div>
              </div>
              <div class="form-group">
               <div class="row">
                  <label class="col-md-3" > Comment :</label>
                <div class="col-md-9">
                  <textarea class="form-control textarea-contact radius-flat" rows="5"  name="comment" placeholder="Type Your Message/Feedback here..." required=""></textarea>
                </div>
               </div>
              </div>
              <button class="btn btn-primary radius-flat"> <span class="fa fa-send"></span> Send </button>
            </form>
          </div>
          
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModalinquiry" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content radius-flat">
          <div class="modal-header bg-site">
            <h4 class="modal-title">Email Us</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div id="inquiry_response" class="text-center"></div>
            <form action="javascript:void(0)" method="post" enctype="multipart/form-data" id="inquiry_form" class="form-horizontal contact-form form-design">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="inventory_id" value="<?php echo $records['0']->diamond_id; ?>" />
              <div class="form-group">
                <div class="row">
                  <label class="col-md-4" > Name :</label>
                <div class="col-md-8">
                  <input type="text" class="form-control radius-flat"  name="name"  placeholder="Name" required="required" autofocus="">
                </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-md-4" > Email :</label>
                <div class="col-md-8">
                  <input type="email" class="form-control radius-flat"  name="email"  placeholder="Email" required="required">
                </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="col-md-4" > Phone :</label>
                <div class="col-md-8">
                  <input type="text" class="form-control radius-flat" name="phone"   maxlength="10" placeholder="Mobile No." required="required">
                </div>
                </div>
              </div>
              <div class="form-group">
            <div class="row">
                  <label class="col-md-4" > Message :</label>
                <div class="col-md-8">
                  <textarea class="form-control textarea-contact radius-flat" rows="5"  name="comment" placeholder="Type Your Message/Feedback here..." required=""></textarea>
                </div>
            </div>
              </div>
              <button class="btn btn-primary radius-flat"> <span class="fa fa-send"></span> Send </button>
            </form>
          </div>
          
        </div>
      </div>
    </div>
    <!--Appointment model-->
    <div class="modal fade" id="myModalappointment" role="dialog" >
      <div class="modal-dialog"> 
        
        <!-- Modal content-->
        <div class="modal-content radius-flat">
          <div class="modal-header bg-site">
            <h4 class="modal-title">Appointment</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div id="appointment_response" class="text-center"></div>
            <form action="javascript:void(0)" method="post" enctype="multipart/form-data" id="appointment_form" class="form-horizontal contact-form form-design">
      <div class="form-list">
        <?php echo csrf_field(); ?>
        <div class="form-schedule">
          <div class="col-lg-12 inner-form-schedule">
            <div class="form-group">
             <div class="row">
                <label class="col-md-4" > First Name :</label>
              <div class="col-md-8">
                  <input name="firstname" class="input-text required-entry name form-control radius-flat" required="required" placeholder="First Name*" type="text">
              </div>
             </div>
            </div>
          </div>
          <div class="col-lg-12 inner-form-schedule">
            <div class="form-group">
             <div class="row">
                <label class="col-md-4" > Last Name :</label>
              <div class="col-md-8">
               <input name="lastname" class="input-text required-entry name form-control radius-flat" required="required" placeholder="Last Name*" type="text">
              </div>
             </div>
            </div>
          </div>
        </div>
        <div class="form-schedule">
          <div class="col-lg-12 inner-form-schedule">
            <div class="form-group">
            <div class="row">
                <label class="col-md-4" > Email :</label>
              <div class="col-md-8">
              <input name="email" class="input-text required-entry email validate-email form-control radius-flat" required="required" placeholder="Email*" type="email">
              </div>
            </div>
            </div>
          </div>
          <div class="col-lg-12 inner-form-schedule">
            <div class="form-group">
             <div class="row">
                <label class="col-md-4" > Phone :</label>
              <div class="col-md-8">
               <input name="phone" class="input-text telephone validate-phoneLax required-entry form-control radius-flat" required="required" placeholder="Phone*" type="text">
              </div>
             </div>
            </div>
          </div>
        </div>
        <div class="form-schedule">
          <div class="col-lg-12 inner-form-schedule">
            <div class="dropdown form-group">
              <div class="row">
                <label class="col-md-4" > Time :</label>
              <div class="col-md-8">
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
          </div>

          <div class="col-lg-12 inner-form-schedule">
            <div class="form-group">
              <div class="row">
                <label class="col-md-4" > Preferred Date :</label>
              <div class="col-md-8">
                  <input name="date" id="datepicker" class="validate-date input-text date_from required-entry form-control radius-flat" required="required"  placeholder="Preferred Date*" type="text">
              </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 inner-form-schedule">
            <div class="form-group">
             <div class="row">
                <label class="col-md-4" > Comment :</label>
              <div class="col-md-8">
                 <textarea type="text" name="comment" class="input-text comment form-control radius-flat" placeholder="Comments" style="height:80px;"></textarea>
              </div>
             </div>
            </div>
          </div>
        </div>

        <div class="button-set">
          <button class="btn btn-primary radius-flat" value="" type="submit"> <span class="fa fa-send"></span> Send </button>
        </div>
      </div>
    </form>
          </div>
         
        </div>
      </div>
    </div>
  </section>
  <section class="need-help">
        <div class="container">
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12 clearfix no-padding-left">
                  <div class="text">
                      <h4>Questions?</h4>
                  </div>
                  <div class="links">
                    <div class="link-wrapper">
                        <a rel="nofollow" data-fallback-url="" href="tel:<?php echo SITE_PHONE ?>" style="display: inline-table;padding-right: 15px"><i class="fa fa-phone"></i><span><?php echo SITE_PHONE ?></span></a>
                        <a data-email-address="<?php echo SITE_EMAIL ?>" data-toggle="modal" data-target="#myModalinquiry" style="cursor:pointer; display: inline-table;"><i class="fa fa-envelope"></i><span>Email Us</span></a>                       
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 clearfix">
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
              </div>
      </section>
  <section id="tabsPanel" class="tabs-container background-container my-4">
    <div class="container">
      <div class="tabs-panel" role="tabpanel">
        <div class="tab-content wow" data-wow-delay="0.3s">
          <div id="description" class="tab-pane in active" role="tabpanel">
            <div class="col-md-12 col-lg-12 col-sm-12 col-12">
              <h3>Product Details</h3>
              <ul class="bullet-list">
                <li>Lab: <?php if($records['0']->lab != null){echo $records['0']->lab; }?></li>
                <?php if($records['0']->stock_id != null){ echo '<li>Stock#: '.$records['0']->stock_id.'</li>'; }  ?>
                <?php if($records['0']->total_rapnet!=null){ echo '<li>Total: $'.(int)$records['0']->total_rapnet.'</li>'; } ?>
                <?php //if($records['0']->FL_RAPNET_DISCOUNT != null){ echo '<li>Disc %: '.number_format($records['0']->FL_RAPNET_DISCOUNT,0).'</li>'; } ?>
                <?php if($records['0']->shape_full != null){ echo '<li>Shape: '.$records['0']->shape_full.'</li>'; }  ?>
                <?php if($records['0']->weight != null){ echo '<li>Cts: '.number_format($records['0']->weight,2).'</li> '; }  ?>
                <?php if($records['0']->color != null){ echo '<li>Color: '.$records['0']->color.'</li> '; } ?>
                <?php if($records['0']->grade != null){ echo '<li>Clarity: '.$records['0']->grade.'</li> '; } ?>
                <?php if($records['0']->cut_full != null){ echo '<li>Cut: '.$records['0']->cut_full.'</li>'; } ?>
                <?php if($records['0']->polish_full != null){ echo '<li>Polish: '.$records['0']->polish_full.'</li>'; } ?>
                <?php if($records['0']->symmetry_full != null){ echo '<li>Symmetry: '.$records['0']->symmetry_full.'</li>'; } ?>
                <?php if($records['0']->fluor_full != null){ echo '<li>Fluorescence: '.$records['0']->fluor_full.'</li> '; }  ?>
                <?php if($records['0']->depth != null){ echo '<li>Depth%: '.number_format($records['0']->depth,1).'</li>'; } ?>
                <?php if($records['0']->table_d != null){ echo '<li>Table%: '.(int)$records['0']->table_d.'</li>'; }  ?>
                <!-- </ul>
                <ul class="bullet-list"> -->
                <?php if($records['0']->measurements != null){ echo '<li>Measurements: '.$records['0']->measurements.'</li>'; }  ?>
                <?php if($records['0']->girdle_thin != null){ echo '<li>Girdle Thin: '.$records['0']->girdle_thin.'</li>'; }  ?>
                <?php if($records['0']->girdle_thick != null){ echo '<li>Girdle Thick: '.$records['0']->girdle_thick.'</li>'; } ?>
                <?php if($records['0']->culet != null){ echo '<li>Culet: '.$records['0']->culet.'</li>'; } ?>
                <?php if($records['0']->shade != null){ echo '<li>Shade: '.$records['0']->shade.'</li>'; } ?>
                <?php if($records['0']->crown_ht != null){ echo '<li>Crown Height: '.$records['0']->crown_ht.'</li>'; } ?>
                <?php if($records['0']->crown_angle != null){ echo '<li>Crown Angle: '.$records['0']->crown_angle.'</li>'; } ?>
                <?php if($records['0']->pavillion_angle != null){ echo '<li>Pavilion Angle: '.$records['0']->pavillion_angle.'</li>'; }   ?>
                <?php if($records['0']->pavillion_depth != null){ echo '<li>Pavilion Depth: '.$records['0']->pavillion_depth.'</li>'; } ?>
                <?php if($records['0']->keytosymb != null){ echo '<li>Key To Symbols: '.$records['0']->keytosymb.'</li>'; }  ?>
              </ul>
              <?php if($records['0']->notes != null){ echo '<strong>Comments</strong>: '.$records['0']->notes.''; } ?>
            </div>
          </div>
          <div id="reviews" class="tab-pane fade" role="tabpanel">
            <p>No Reviews Available</p>
          </div>
          <div id="delivery-returns" class="tab-pane fade" role="tabpanel">
            <p>We understand how important it is for you to receive your jewelry purchase promptly and safely. At Holder, our priority is to serve your needs in the manner you request.</p>
            <ul class="bullet-list">
              <li>Complimentary ground Shipping (4-7 days) </li>
              <li>Express Shipping Service (3-5 days) </li>
              <li>Expedited Shipping Service (1-2 days) </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

    <!-- <section class="tabs-container">
    <div class="container">
      <div class="tabs-panel" role="tabpanel">
        <div class="tab-content wow fadeInUp" data-wow-delay="0.3s">
          <div id="description" class="tab-pane fade in active" role="tabpanel">
            <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
              <h3>Included with your order</h3>
              <ul class="bullet-list"> 
              <li>Free Shipping </li>
              <li> Free Returns </li>
              <li>Free Gift Packaging</li>
              <li>Free Setting service</li>
              <li>30 Day Money Back Guarantee</li>
              <li>Life Time Upgrades</li>
              <li>Secure Payment</ul>
              <h3>Flexible Financing</h3>
              We offer an easy and affordable financing plan to help you buy a ring she will cherish forever. Call <?php echo SITE_PHONE; ?> to learn more and apply.
            </div>
             <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
              <img style="margin-top: 95px" src="<?php echo base_url(); ?>assets/images/logo.png" class="img-responsive">
             </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  
  <section id="slider" class="slider-products">
    <div class="container-fluid">
      <div class="starSeparatorBox clearfix">
        <div class="starSeparator wow zoomIn" data-wow-delay="0.3s"> <span aria-hidden="true" class="icon-star"></span> </div>
        <h3 class="title font-additional font-weight-bold text-uppercase wow zoomIn" data-wow-delay="0.3s">Similar Products</h3>
        <div class="table-responsive cart-table">
          <table id="" class="tablesorter table display nowrap box-shadow table-bordered table-hover table-striped table-condensed">
            <thead  class="bg-site">
              <tr>
                <th class="header">View</th>
                <th class="header sorting">Shape</th>
                <th class="header sorting">Cts</th>
                <th class="header sorting">Color</th>
                <th class="header sorting">Clarity</th>
                <th class="header sorting">Cut</th>
                <th class="header sorting">Polish</th>
                <th class="header sorting">Symmetry</th>
                <th class="header sorting">Fluor.</th>
                <th class="header sorting">Depth%</th>
                <th class="header sorting">Table%</th>
                <th class="header sorting">$/Carat</th>
                <th class="header sorting">Total $</th>
                <th class="header sorting">Thai Baht  &#3647;</th>
                <th class="header sorting">Lab</th>
                <th class="header sorting">Measurements</th>
              </tr>
            </thead>
            <tbody id="" style="">
              <?php foreach ($similar_records as $row): ?>
              <tr style="font-size:12px; font-weight:bold;" id="tr_<?php echo $row->diamond_id; ?>">
                <td><a href="<?php echo base_url(); ?>diamond-details/<?php echo $row->diamond_id; ?>"> <i class="fa fa-search-plus"  title="View details" data-toggle="tooltip" style=""></i> </a></td>
                <td><?php if($row->shape_full!=""){ echo $row->shape_full ; } ?></td>
                <td><?php if($row->weight!=""){ echo number_format($row->weight,2); } ?></td>
                <td><?php if($row->color!=""){ echo $row->color; } ?></td>
                <td><?php if($row->grade!=""){ echo $row->grade; } ?></td>
                <td><?php if($row->cut_full!=""){ echo $row->cut_full; } ?></td>
                <td><?php if($row->polish_full!=""){ echo $row->polish_full; } ?></td>
                <td><?php if($row->symmetry_full!=""){ echo $row->symmetry_full; } ?></td>
                <td><?php if($row->fluor_full!=""){ echo $row->fluor_full; } ?></td>
                <td><?php if($row->depth!=""){ echo number_format($row->depth,1); } ?></td>
                <td><?php if($row->table_d!=""){ echo $row->table_d; } ?></td>
                <td><?php if($row->cost_carat!=""){ echo round($row->cost_carat); } ?></td>
                <td><?php if($row->total_price!=""){ echo round($row->total_price); } ?></td>
                <td><?php if($row->currency!=""){ echo round($row->currency); } ?></td>             
                <td><?php if($row->lab !=""){ echo $row->lab; }?></td>
                <td><?php if($row->measurements!=""){ echo $row->measurements; } ?></td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

<script src="<?php echo base_url(); ?>assets/js/ajax/manage_diamond_ajax.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/easyzoom.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.PrintArea.js"></script> 
<script>
$(document).ready(function(){
  n=0;
  $(".mySlides").hide();
  $("#slides_"+n).show();
  showSlides(n);
  //$("#easy_zoom").hide();
});
function  showZoom()
{  
  $(".mySlides").hide();
  $("#easy_zoom").show();
}
</script> 
<script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function(e) {
      var $this = $(this);

      e.preventDefault();

      // Use EasyZoom's `swap` method
      api1.swap($this.data('standard'), $this.attr('href'));
    });   
  </script> 
<script>
    $(document).ready(function(){
    $("#email_form").submit(function(){
        
      $.ajax({
            type: 'POST',
            url: '<?php echo base_url('email-to-friend') ?>', 
            data: $(this).serialize()
        })
        .done(function(data){
            //alert(data);
            // show the response
            $('#email_response').html(data);
             setTimeout(function(){
            $('#myModaldiamond').modal('hide');
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
    
    $("#inquiry_form").submit(function(){
    
      $.ajax({
            type: 'POST',
            url: '<?php echo base_url('email-to-vendor') ?>', 
            data: $(this).serialize()
        })
        .done(function(data){
       
            // show the response
            $('#inquiry_response').html(data);
            setTimeout(function(){
            $('#myModalinquiry').modal('hide');
            //location.reload();
                }, 2000);
            
             
        });
        return false;
    });
    });
    </script> 
<script>
      $(document).ready(function(){
        setTimeout(function(){
          $("#phplive_btn_1508842437").html('<a href="javascript:void(0)"><i class="fa fa-comment"></i><span> Chat</span></a>');
        }, 3000);
      });
    </script> 
<script type="text/javascript">
    var shared_url ="<?php echo current_url() ?>";
    $(document).on("click", "#fb_share", function(e){
      window.open("https://www.facebook.com/sharer/sharer.php?u="+shared_url,"MsgWindow","width=500, height=500,resize-able=yes");
    });
    $(document).on("click", "#tw_tweet", function(e){
      window.open("https://twitter.com/intent/tweet?url="+ shared_url+"&text=Certificate","MsgWindow","width=500, height=500,resize-able=yes");
    });
    $(document).on("click", "#g_plus", function(e){
      window.open("https://plus.google.com/share?url="+ encodeURIComponent(shared_url)+"&text=Certificate",'Share to Google+','width=500,height=500,menubar=no,location=no,status=no');
    });   
</script> 
<script>
  $(document).ready(function(){
      $("#loadingDiv").fadeOut();
      $("#body").removeClass('opacity-body');


  });

  
</script> 
<script>
$(document).ready(function(){
    $("#printButton").click(function(){

        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = { mode : mode, popClose : close};
        //$('.img1 img').attr('src');
      // var image_link =  $('#print').find('img').attr('src');
       //alert(image_link);
        $('#sim').css('display', 'none');
        $("#print").printArea( options );
    });
});
// $(document).ready(function(){
//     $("#printButton").click(function(){       
//         var html=$("#productDetails").html();
//         print(html);
//     });
// });


</script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy',minDate: 0, });

  } );
  </script>