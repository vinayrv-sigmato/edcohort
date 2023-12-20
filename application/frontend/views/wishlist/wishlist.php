<style>
.radius-flat{
        border-radius: 0px !important;
    }
 /*   .product-grid {
    clear: both;
    display: block;
    list-style: outside none none;
    margin: 0;
    padding: 0;
    position: relative;
    z-index: 1;
}*/

.product-grid .pgi {
    margin-bottom: 10px;
}

.wish-list-view .product-grid .inner-outer {
    border: 2px solid #CCC;
    overflow: hidden;
    box-shadow: -3px 3px 1px 0px #ccc;
}

.product-grid .inner {
    border: 1px solid #f0f0f0;
    padding-bottom: 80px;
    position: relative;
    padding: 0 !important;
}

.wish-list-view .product-grid .inner .pr-i {
    border: 0 none;
}
.product-grid .inner.pd-gray-bg .pr-i {
    background-color: transparent !important;
}
.grid-view .pr-i {
    /*display: block !important;
    height: 0;*/
    /*padding-bottom: 100%;*/
}
.product-grid .pr-i {
    background-attachment: scroll;
    background-clip: border-box;
    background-color: transparent !important;
    background-image: none;
    background-origin: padding-box;
    background-position: center top;
    background-repeat: no-repeat;
    background-size: cover;
    border-bottom: 1px solid #f0f0f0;
}
.grid-view .pr-i {
    border-bottom: 1px solid #f0f0f0;
    /*display: block !important;
    height: 0;*/
    /*padding-bottom: 100%;*/
}
.product-grid .pr-i {
    background-attachment: scroll;
    background-clip: border-box;
    background-color: transparent !important;
    background-image: none;
    background-origin: padding-box;
    background-position: center top;
    background-repeat: no-repeat;
    background-size: cover;
}

/*.product-grid .pr-i a.p-image {
    display: block;
    height: 0;
    text-align: center;
}*/
/*.product-grid .pr-i a {
    display: block;
    height: 0;
}*/

.product-grid .pr-i img {
    opacity: 1;
}
.product-grid .pr-i img {
    opacity: 1;
    width: auto;
    max-height: 238px;
}
.center-block {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.img-responsive {
    display: block;
    height: auto;
    max-width: 100%;
}
.img-responsive {
    display: block;
    height: auto;
    max-width: 100%;
}
.center-block {
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.wish-list-view .product-grid .inner.pd-gray-bg .pr-d {
    background: none repeat scroll 0 0 #ffffff;
}
.wish-list-view .with-detail .inner, .wish-list-view .grid-view .product-grid .pr-d {
    box-shadow: none !important;
}
/*.wish-list-view .grid-view .product-grid .pr-d {
    display: block !important;
    left: auto !important;
    right: -100% !important;
}
.wish-list-view .grid-view .product-grid .pr-d {
    bottom: auto;
    height: 100%;
    top: 0;
}
.grid-view .product-grid .pr-d {
    bottom: 0;
    box-sizing: content-box;
    display: none;
    left: 0;
    padding: 0;
    position: absolute;
    width: 100%;
    z-index: 100;
}*/

/*.product-grid .pr-d-inner {
    padding-left: 15px;
    padding-right: 15px;
}
*/
.wish-list-view .product-grid .cat {
    margin-bottom: 9px;
    padding-top: 43px;
}
.product-grid .cat {
    color: #9dadc6;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 2px;
    line-height: 17px;
    padding-top: 10px;
    text-transform: uppercase;
}

.wish-list-view .product-grid .cat a, .wish-list-view .product-grid .cat a:link, .wish-list-view .product-grid .cat a:visited {
    color: #272b65;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.2em;
    line-height: 18px;
}

.wish-list-view .product-grid .title {
    font-size: 16px;
    line-height: 22px;
    padding-bottom: 11px;
    text-align: left;
}

.wish-list-view .product-grid .p-wrap {
    text-align: left;
}
.product-grid .p-wrap {
    color: #666;
    display: block;
    float: left;
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 2px;
    line-height: 17px;
    padding-bottom: 10px;
    text-align: center;
    width: 100%;
}

.clear {
    clear: both;
    display: block;
    height: 0;
    visibility: hidden;
    width: 100%;
}

.wish-list-view .product-grid .desc {
    color: #272b65;
    font-size: 13px;
    line-height: 19px;
    padding-top: 13px;
}

.wish-list-view .action {
    bottom: 15px;
   /* position: absolute;*/
}
.product-grid .action {
    padding:17px 0;
}

.wish-list-view .product-grid .p-wrap .new-price {
    color: black;
    font-size: 20px;
    line-height: 28px;
}

.wish-list-view .product-grid.row .action a.main-btn, .wish-list-view .product-grid.row .action .secondary-btn {
    padding: 5px 12px;
}

</style>


<div class="breadcrumb ">  
   <div class="container">
    <div class="d-flex justify-content-between align-items-center">
    <div> <h2><span>Wishlist</span></h2></div>
     <div><ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>" class="homepage-link" title="Back to the frontpage">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" >Wishlist</a>
      </li>
    </ul></div>
     </div>
   </div>
</div>



<?php echo message(); ?>
<section id="productDetails" class="product-details section-top-inner">
    <div class="container">
        <div class="wish-list-view">
            <div class="grid-view">
            <div class=""> 
                <div class=""> 
                    <div class="product-grid row"> 
                        <?php foreach ($wishlist as $row): ?>
                        <div class="col-12 col-md-12  col-sm-12  col-lg-6 pgi"> 
                            <div class="inner-outer mb-4"> 
                                <div class="inner pd-gray-bg"> 
                                    <div class="row">
                                        <div alt="" class="pr-i lazyOwl lazy-bg col-12 col-md-6  col-sm-6  col-lg-6"> 
                                        <a class="p-image"><img src="<?php echo base_url($row->image); ?>">
                                    </div> 
                                    <div class="col-12 col-md-6  col-sm-6  col-lg-6"> 
                                        <div class="pr-d-inner"> 
                                            <div class="cat"><a><?php echo $row->product_type; ?></a></div> 
                                            <div class="title"><a itemprop="itemListElement"><?php echo $row->name; ?></a></div> 
                                            <div class="p-wrap"> 
                                                <span class="price"> 
                                                    <span class="b-price-wrapper"> 
                                                        <span class="new-price">
                                                            <?php if ($row->product_sale_price > 0): ?>
                                                                <span class="price price--rrp">$<?php echo $row->product_price; ?></span>
                                                            <?php endif ?>
                                                            <span class="WebRupee"></span>$<?php echo $row->product_price_show; ?>                                 
                                                        </span> 
                                                    </span> 
                                                </span> 
                                            </div> 
                                            <i class="clear"></i> 
                                            <div class="desc"> <?php echo substr($row->description,0,100); ?> </div> 
                                            <?php if (!$row->product_available): ?>
                                                <div class="text-danger">Sorry This Product Is Not Available!</div>                                                 
                                            <?php endif ?> 
                                            <div class="action"> 
                                                <?php if ($row->product_available): ?>
                                                    <a  href="<?php echo base_url(); ?><?php echo $row->product_type; ?>-details/<?php echo $row->product_slug; ?>" target="_blank" class="btn btn-orange" > View Product </a> 
                                                <?php endif ?>
                                                <a onclick="a_boot('Are You Sure?','<?php echo base_url(); ?>wishlist-delete/<?php echo $row->product_type; ?>/<?php echo $row->wishlist_id; ?>')"  class="btn secondary-btn text-white" rel="nofollow">Remove</a> 
                                            </div> 
                                        </div> 
                                  </div> 
                                    </div>
                                </div> 
                            </div> 
                        </div> 
                        <?php endforeach ?>                     

                    </div> 
                </div> 
            </div>
        </div>
    </div>
    </div>
</section>