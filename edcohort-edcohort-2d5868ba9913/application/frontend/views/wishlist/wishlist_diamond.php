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
    <div> <h2><span>Wishlist Diamond</span></h2></div>
     <div><ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>" class="homepage-link" title="Back to the frontpage">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" >Wishlist Diamond</a>
      </li>
    </ul></div>
     </div>
   </div>
</div>



<?php echo message(); ?>
<section id="productDetails" class="product-details section-top-inner">
    <!-- <div class="container">
        <div class="wish-list-view">
            <div class="grid-view">
            <div class=""> 
                <div class=""> 
                    <div class="product-grid">  -->
                       <table  class="table table-bordered"> 
                        <thead>                 
                            <tr>
                                <th>Image</th>
                                <th >Stock#</th>
                                <th >Shape</th>
                                <th >Cts</th>
                                <th >Color</th>                  
                                <th >Clarity</th>
                                <th >Cut</th>
                                <th >Pol</th>                    
                                <th >Sym</th>
                                <th >Fluor</th>                  
                                <th >Disc%</th>                    
                                <th >Depth%</th>
                                <th >Table%</th>
                                <th >Rap.($)</th>                               
                                <th >$/Carat</th>                  
                                <th >Amount $</th>   
                                <th >Thai Baht &#3647;</th>                     
                                <th >Lab</th>                                
                                <th >Measurements</th>     
                                <th >Action</th>     
                            </tr>
                        </thead> 
                         <?php foreach ($wishlist as $row): ?>           
                        <tbody> 
                         <tr>
                                <td ><img src="<?php echo base_url($row->image); ?>" style="width:50px;"></td>
                                <td><?php echo $row->stock_id; ?></td>
                                <td><?php echo $row->shape; ?></td>                  
                                <td><?php echo $row->weight; ?></td>
                                <td><?php echo $row->color; ?></td>
                                <td><?php echo $row->grade; ?></td>
                                <td><?php echo $row->cut; ?></td>
                                <td><?php echo $row->polish; ?></td>
                                <td><?php echo $row->symmetry; ?></td>
                                <td><?php echo $row->fluorescence_int; ?></td>
                                <td><?php echo $row->new_discount; ?></td>
                                <td><?php echo $row->depth; ?></td>
                                <td><?php echo $row->table_d; ?></td>
                                <td><?php echo $row->rapnet; ?></td>
                                <td><?php echo $row->cost_carat; ?></td>
                                <td>$<?php echo $row->total_price; ?></td>
                                <td><?php echo $row->currency; ?></td>
                                <td><?php echo $row->lab; ?></td>
                                <td><?php echo $row->measurements; ?></td>
                                <td> 
                                 <a onclick="a_boot('Are You Sure?','<?php echo base_url(); ?>wishlist-delete-diamond/<?php echo $row->product_choice; ?>/<?php echo $row->diamond_wish_id; ?>')"  class="btn secondary-btn text-white" rel="nofollow">Remove</a></td>
                                 
                            </tr>
                        </tbody> 
                        <?php endforeach ?>       
                    </table>                    
<!-- 
                    </div> 
                </div> 
            </div>
        </div>
    </div>
    </div> -->
</section>