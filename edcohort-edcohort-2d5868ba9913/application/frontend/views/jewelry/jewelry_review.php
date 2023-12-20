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

  </style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/products.css" />
<div class="breadcrumb" id="breadcrumb">
  <div class="container" itemprop="breadcrumb">
    <div class="row">
      <div class="col-md-24">
        <a title="Back to the frontpage" class="homepage-link" href="<?php echo base_url(); ?>">Home</a>
        <span>/</span>
        <a title="Back to the frontpage" class="homepage-link" href="<?php echo base_url(); ?>jewelry">Jewelry</a>
        <span>/</span>
        <span class="page-title">Jewelry Review</span>
      </div>
    </div>
  </div>
</div>
      <section id="productDetails" class="product-detail">
        <div class="container">
          <div class="row narrow-content">          
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 clearfix">
              <div class="product-gallery vertical-pager1">               
                <ul>
                  <?php $count=0; foreach ($image_array as $key => $value) { ?>     
                    <li class="mySlides easyzoom easyzoom--overlay easyzoom--with-thumbnails" id="slides_<?php echo $count; ?>" >
                      <img src="<?php echo base_url().$value; ?>" alt="" width="60%"  />
                  </li>         
                <?php $count++; } ?>
                </ul>

              </div>
 
            </div>
            <div class="product-cart product-details-narrow col-lg-6 col-md-6 col-sm-12 col-12 clearfix">
                                                 
              <div class="product-options_header clearfix wow fadeInUp" data-wow-delay="0.3s">
                <h3 class="font-additional font-weight-bold text-uppercase"></h3>
                <small class="font-additional font-weight-bold text-uppercase"> <?php if($records['0']->product_name != ""){ echo $records['0']->product_name; }  ?>   </small>
                <img src="<?php echo base_url(); ?>assets/images/back-icon.png" alt="Back" class="my-tooltip my-dropdown pull-right" data-toggle="modal" data-target="" onclick="window.history.back()" data-placement="top" title="Back" data-tooltip="true">
                <?php if ($review_rating>0): ?>  
                <div class="rewiew_star"> 
                      <?php for ($i=1; $i <= 5 ; $i++) { 
                        if($i<=$review_rating){
                          echo '<i class="fa fa-star"></i>';
                        }else{
                          echo '<i class="fa fa-star-o"></i>';
                        }
                      } ?> 
                    <span> <?php echo number_format($review_count); ?> Customer Reviews</span> 
                </div> 
                <?php endif ?>
		
                <div class="product-price font-additional font-weight-normal customColor">  
                <?php if ($records['0']->product_sale_price > 0): ?>
                  <span class="price price--rrp">$<?php echo $records['0']->product_price; ?></span>
                <?php endif ?> <?php echo $product_price_show; ?></div>
              </div>
              <div class="product-options_body clearfix wow fadeInUp" data-wow-delay="0.3s">
                <h4 class="font-additional font-weight-bold text-uppercase">PRODUCT DESCRIPTION</h4>
                <div class="product-options_desc font-main color-third"><?php if($records['0']->product_short_description != ""){ echo $records['0']->product_short_description; }  ?></div>
              	<input type="hidden" id="product_id" value="<?php echo $records['0']->product_id; ?>">
              </div>
            </div>
          </div>
        </div>

      </section>
      <section id="tabsPanel" class="tabs-container background-container padding-two">
        <div class="container">
          <div class="tabs-panel" role="tabpanel">

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
                	<a class="btn btn-primary radius-flat" href="<?php echo base_url(); ?>login?referer=<?php echo urlencode(current_url()); ?>">Write Review</a>
                <?php } ?>
                <div class="col-md-12 col-lg-12 col-sm-12 col-12"><strong><span id="total_records"></span> Customer Reviews</strong></div>				
				<div class="col-md-12 col-lg-12 col-sm-12 col-12" id="add_data">
					<!-- list goes here -->
                </div>
                <div class="pagination-container wow fadeInUp">					
					<div class="pagination-list pull-right" id="pagination-div-id"></div>									
				</div>

          </div>
        </div>
      </section>

  <script src="<?php echo base_url(); ?>assets/js/ajax/manage_jewelry_review_ajax.js"></script>

  <script>
    $(document).ready(function(){
      $(".star_list label").on('click',function(){
        $(".star_list label").removeClass('active_rating');
        $(this).toggleClass('active_rating');        
      });
    });
  </script>