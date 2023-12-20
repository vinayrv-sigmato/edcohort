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
    .product-options_header h3 {
      font-size: 20px;
      font-weight: 500;
      line-height: 27px;
      letter-spacing: 0px;
    }

  </style>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/easyzoom.css" />
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
                <h3 class="font-additional font-weight-bold"><?php if($name != ""){ echo $name; } ?></h3>
                
                <div class="product-price font-additional font-weight-normal customColor"><?php if($price != ""){ echo '$'.number_format($price); } ?></div> 
                <small class="font-additional">(Setting: <?php echo '$'.number_format($price_setting); ?> + Diamond: <?php echo '$'.number_format($price_diamond); ?>)</small>          
              </div>

              <div class="product-options_body clearfix wow fadeInUp" data-wow-delay="0.3s">
                
                <div class="product-options_desc font-main color-third">
                  <?php if($description != ""){ echo $description; }  ?>
                  <?php echo $attributes; ?>
                </div>
               
                <form action="" id="cart_form" class="form-horizontal"> 
                  <input type="hidden" id="cart_product_id" name="cart_product_id" value="<?php echo $records['0']->product_id; ?>">
                </form> 

              </div>
              <div class="product-options_cart clearfix wow fadeInUp" data-wow-delay="0.3s" style="padding-bottom: 10px;">                
                <?php $user_id = $this->session->userdata('user_id'); ?> 
                <div class="" style="display: inline-block;"> 
                    <a href="javascript:void(0)" onclick="ringToBag('<?php echo $records['0']->product_id; ?>',this)" class="btn button-additional button-big text-uppercase">
                    <span class="fa fa-shopping-cart" aria-hidden="true"></span> Add To Cart</a>                  
                </div> 
              </div>           
            </div>      
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
                  
                </div>
              </div>
      </section>

<script src="<?php echo base_url(); ?>assets/js/ajax/manage_ring_builder_ajax.js"></script>
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

<script type="text/javascript">
    var shared_url ="<?php echo current_url() ?>";
    $(document).on("click", "#fb_share", function(e){
      window.open("https://www.facebook.com/sharer/sharer.php?u="+shared_url,"MsgWindow","width=500, height=500,resize-able=yes");
    });
    $(document).on("click", "#tw_tweet", function(e){
      window.open("https://twitter.com/intent/tweet?url="+ shared_url+"&text=Shakti Jewel","MsgWindow","width=500, height=500,resize-able=yes");
    });
    $(document).on("click", "#g_plus", function(e){
      window.open("https://plus.google.com/share?url="+ encodeURIComponent(shared_url)+"&text=Shakti Jewel",'Share to Google+','width=500,height=500,menubar=no,location=no,status=no');
    });   
</script>        

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
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
                $("#total_price").html('Grand total: <span>$'+total_price+'</span>');
                $("#total_price").show();
              }else{
                $("#total_price").html('');
                $("#total_price").hide();
              }
              if(parseInt(option_price)){
                $("#option_price").html('Option Price: <span>$'+option_price+'</span>');
                $("#option_price").show();
              }else{
                $("#option_price").html('');
                $("#option_price").hide();
              }
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
</script>