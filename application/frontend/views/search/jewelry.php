<div id="breadcrumb" class="breadcrumb">
  <div itemprop="breadcrumb" class="container">
    <div class="row">
      <div class="col-md-24">
        <a href="<?php echo base_url(); ?>" class="homepage-link" title="Back to the frontpage">Home</a>  
        <span>/</span>
        <span class="page-title">Jewelry</span>  
      </div>
    </div>
  </div>
</div>
<?php 
	$mcf=$this->input->get('mcf');
	$pcf=$this->input->get('pcf');

?>
<?php $category = $this->uri->segment(2); ?>

<section id="top-filter-jewelry">
    <input type="hidden" id="compare_session" value="<?php echo @implode(',',$this->session->userdata('compare_jewelry')); ?>">
	<div class="container">
		<div class="row">
			<div class="main-heading">
				<h3><?php $cat = str_replace("-"," ",$category);
								 echo ucwords($cat); ?></h3>
				<!-- <p>Get inspired with our collection of completed Jewelry. Select a similar diamond and make it your own.</p> -->
			</div>				
			<div class="clearfix"></div>
			<form action="" method="post" id="form">
				<div class="col-lg-2 col-md-2 col-sm-2 col-12"></div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-12">
<!-- 					<div class="col-lg-3 col-md-3 col-sm-3 col-12">
						<div class="col-1">
		          			<div class="dropdown pull-left" data-control-type="boot-filter-drop-down" data-control-name="category-filter" data-control-action="filter">
								<button class="dropdown-toggle" type="button" data-toggle="dropdown"  aria-expanded="false">					
									<span data-type="selected-text">Jewelry Type</span>
									<span class="caret"></span>						
								</button>
								<ul class="dropdown-menu section-1-bg" role="menu" >
		              				<li role="presentation">
										<a href="<?php echo base_url(); ?>jewelry/Rings" ><label class="checkbox checkbox1" ><img src="<?php echo base_url(); ?>assets/images/diamond-ring.svg"> Rings</label></a>
									</li>
									<li role="presentation">
										<a href="<?php echo base_url(); ?>jewelry/Earrings" ><label class="checkbox checkbox1" ><img src="<?php echo base_url(); ?>assets/images/earring.svg">  Earrings</label></a>
									</li>
									<li role="presentation">
										 <a href="<?php echo base_url(); ?>jewelry/Pendants" ><label class="checkbox checkbox1" ><img src="<?php echo base_url(); ?>assets/images/pendant.svg"> Pendants</label></a>
									</li>									
									<li role="presentation">
										<a href="<?php echo base_url(); ?>jewelry/Bracelets" ><label class="checkbox checkbox1" ><img src="<?php echo base_url(); ?>assets/images/bracelet.svg"> Bracelets</label></a>
									</li>									
									<li role="presentation">								
		                 				<a href="<?php echo base_url(); ?>jewelry/Necklace" ><label class="checkbox checkbox1" ><img src="<?php echo base_url(); ?>assets/images/necklace.svg"> Necklace</label></a>
									</li>
									<li role="presentation">
										 <a href="<?php echo base_url(); ?>jewelry/Bridal" ><label class="checkbox checkbox1" ><img src="<?php echo base_url(); ?>assets/images/exercise-bands.svg"> Bridal</label></a>
									</li>
									<li role="presentation">
										 <a href="<?php echo base_url(); ?>jewelry/Bands" ><label class="checkbox checkbox1" ><img src="<?php echo base_url(); ?>assets/images/wedding-rings.svg">  Bands</label></a>
									</li>
									<li role="presentation">
										 <a href="<?php echo base_url(); ?>jewelry/Bangles" ><label class="checkbox checkbox1" ><img src="<?php echo base_url(); ?>assets/images/round-bracelet.svg"> Bangles</label></a>
									</li>
								</ul>						  
							</div>
						</div>								
					</div>
-->
<!-- 					<div class="col-lg-3 col-md-3 col-sm-3 col-12">
						<div class="col-1">
		          			<div class="dropdown pull-left" data-control-type="boot-filter-drop-down" data-control-name="category-filter" data-control-action="filter">
								
								<button class="dropdown-toggle" type="button" data-toggle="dropdown"  aria-expanded="false">					
									<span data-type="selected-text">Metal Color</span>
									<span class="caret"></span>						
								</button>
								<ul class="dropdown-menu section-1-bg" role="menu">
		              				<li role="presentation">
										<label class="checkbox"><input type="checkbox"  name="metal_color_filter[]" <?php if($mcf=='ROSE GOLD') { echo "checked"; }  ?> value="Rose Gold" data-item="ROSE GOLD"><i></i>ROSE GOLD</label>
									</li>
									<li role="presentation">
										<label class="checkbox"><input type="checkbox"  name="metal_color_filter[]" <?php if($mcf=='14K White Gold') { echo "checked"; }  ?> value="14K White Gold" data-item="14K White Gold"><i></i>14K White Gold</label>
									</li>
									<li role="presentation">
										 <label class="checkbox"><input type="checkbox"  name="metal_color_filter[]" <?php if($mcf=='YELLOW GOLD') { echo "checked"; }  ?> value="Yellow Gold" data-item="YELLOW GOLD"><i></i>YELLOW GOLD</label>
									</li>									
									<li role="presentation">
										<label class="checkbox"><input type="checkbox"  name="metal_color_filter[]" <?php if($mcf=='SILVER') { echo "checked"; }  ?> value="Silver" data-item="SILVER"><i></i>SILVER</label>
									</li>	
								</ul>						  
							</div>
						</div>								
					</div> -->

					<div class="col-lg-3 col-md-3 col-sm-3 col-12">
						<div class="col-1">
		          			<div class="dropdown pull-left" data-control-type="boot-filter-drop-down" data-control-name="category-filter" data-control-action="filter">
								<button class="dropdown-toggle" type="button" data-toggle="dropdown"  aria-expanded="false">					
									<span data-type="selected-text">Metal Type</span>
									<span class="caret"></span>						
								</button>
								<ul class="dropdown-menu section-1-bg" role="menu" >
		              				<?php foreach ($metal_type as $mtrow) { ?>
		              				<li role="presentation">
										<label class="checkbox"><input type="checkbox"  name="metal_type_filter[]" <?php if($mcf==$mtrow->value) { echo "checked"; }  ?> value="<?php echo $mtrow->value; ?>" data-item="<?php echo $mtrow->value; ?>"><i></i><?php echo $mtrow->value; ?></label>
									</li>
									<?php } ?>

								</ul>
							</div>
						</div>								
					</div>

					<div class="col-lg-3 col-md-3 col-sm-3 col-12">
						<div class="col-1">
		          			<div class="dropdown pull-left" data-control-type="boot-filter-drop-down" data-control-name="category-filter" data-control-action="filter">
								
								<button class="dropdown-toggle" type="button" data-toggle="dropdown"  aria-expanded="false">					
									<span data-type="selected-text">Budget</span>
									<span class="caret"></span>						
								</button>
								<ul class="dropdown-menu section-1-bg" role="menu" >
									<li data-pricefilter="$0 to $50">
										<label><input id="price-reset" type="radio" name="total" value="0,50" data-item="$0 to $50"> $0 to $50</label>
									</li>
									<li data-pricefilter="$50 to $750">
										<label><input type="radio" name="total" <?php if($pcf=='50-750') { echo "checked"; }  ?> value="50,750" data-item="$50 to $750"> $50 to $750 </label>
									</li>
									<li data-pricefilter="$750 to $1500">
										<label><input type="radio" name="total" <?php if($pcf=='750-1500') { echo "checked"; }  ?> value="750,1500" data-item="$750 to $1500"> $750 to $1500 </label>
									</li>
									<li data-pricefilter="$1500 to $2500">
										<label><input type="radio" name="total" <?php if($pcf=='1500-2500') { echo "checked"; }  ?> value="1500,2500" data-item="$1500 to $2500"> $1500 to $2500 </label>
									</li>
									<li data-pricefilter="$2500 to $5000">
										<label><input type="radio" name="total" <?php if($pcf=='2500-5000') { echo "checked"; }  ?> value="2500,5000" data-item="$2500 to $5000"> $2500 to $5000 </label>
									</li>
									<li data-pricefilter="$5000 to above">
										<label><input type="radio" name="total" value="5000,500000" data-item="Above $5000">Above $5000 </label>
									</li>																						
								</ul>
							</div>
						</div>								
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-12"></div>
				<?php if ($this->uri->segment(3)): ?>
				<input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="scf">
				<?php endif ?>
				<input type="hidden" value="<?php echo $this->uri->segment(2); ?>" name="segment_2">
				<input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="segment_3">
				<input type="hidden" value="<?php echo $this->uri->segment(4); ?>" name="segment_4">
			</form>
		</div>
		<div class="filtered-data"> 
			<div class="col-lg-10 col-md-10 col-sm-10 col-12 "> 
				<span class="f-by">FILTERED BY:</span> 
				<?php //if ($page_head): ?>
				<span class="form-item last"> 
					<span> 
						<span class="filterDisplayName"><?php echo $page_head; ?> <!-- <i class="fa fa-close"></i> --></span>
					</span> 
				</span>
				<?php endif ?>
				<span id="filter_item"></span>
			</div> 
			<div class="col-lg-2 col-md-2 col-sm-2 col-12 pull-right">
				<div class="col-1">
          			<div class="dropdown pull-left" data-control-type="boot-filter-drop-down" data-control-name="category-filter" data-control-action="filter">						
						<select name="sort" id="sort" class="select-field font-main color-third" onchange="submitForm()">
						    <option value="p_low">Price Low to High</option>
						    <option value="p_high">Price High to low</option>									    								    
						</select>
					</div>
				</div>								
			</div>
		</div>		
	</div>	
</section>
<div class="clearfix"></div>

<section id="product-showcase" class="light-bg section-padding">

	<div class="container">
		<div class="main-heading">
			<h3>Showing <span class="total_records"></span> <?php if($page_head){ echo $page_head; }else{ echo "Jewelry"; }  ?>  
				<a href="<?php echo base_url() ?>compare-jewelry" class="btn btn-primary radius-flat pull-right">Compare</a></h3>
			<p>A variety of stunning Jewelry to suit every taste; from the sheer brilliance of the round cut to the regal symmetry of the princess cut and everything in between.</p>
		</div>

		<div class="">
			<div class="content-box">
				<div class="category-filter clearfix wow fadeInUp" data-wow-delay="0.3s">							
					<a href="javascript:void(0)" id="list" class="pull-right grid-type hover-focus-border"  onclick="set_display('list')">
						<span class="icon-list" aria-hidden="true"></span>
					</a>
					<a href="javascript:void(0)" id="grid" class="pull-right grid-type hover-focus-border customBgColor color-main" onclick="set_display('grid')">
						<span class="icon-grid" aria-hidden="true"></span>
					</a>
	        		<input type="hidden" name="display" id="display" value="grid">
				</div>
				<div class="products-cat clearfix">
					<ul class="products-grid" id="add_data">
						<?php foreach ($records as $rec) {
						 ?>
						<li class="wow fadeInUp" data-wow-delay="0.3s">
							<div class="product-col product-space item position-relative product-overlay">  
								<div class="product-div product-bg position-relative product-overlay"> 
									<a href="http://172.16.1.52:8080/european_b2c/jewelry-details/blue-topaz-ring-6">    
										<figcaption class="product-image"> 
											<img src="http://172.16.1.52:8080/european_b2c/ftp_upload/admin_jewelstree/product/image/qbr17dec.jpg"> 
										</figcaption>    
									</a>    
									<div class="quick-buy">      
										<div class="product-share">        
											<a href="javascript:void(0)" onclick="add_wish(400,this,0)" class="highlight-button-dark btn btn-small no-margin-right quick-buy-btn" title="Add to Wishlist" data-wow-duration="300ms"><i class="fa fa-heart-o"></i></a>        
											<a href="javascript:void(0)" onclick="add_compare(400,this,0)" class="highlight-button-dark btn btn-small no-margin-right quick-buy-btn" title="Add To Compare" data-wow-duration="600ms"><i class="fa fa-refresh"></i></a>        
											<a href="http://172.16.1.52:8080/european_b2c/jewelry-details/blue-topaz-ring-6" class="highlight-button-dark btn btn-small no-margin-right quick-buy-btn" title="View Details" data-wow-duration="900ms"><i class="fa fa-eye"></i></a>      
										</div>    
									</div>  
								</div>  
								<div class="card-body">    
									<h4 class="card-title fixed-height"> <a href="http://172.16.1.52:8080/european_b2c/jewelry-details/400"><?php echo $rec->product_name; ?></a> </h4>    
									<div class="card-text price-font-type" data-test-info-type="price">      
										<div class="price-section price-section--withoutTax ">  
											<span class="price price--withoutTax">$31.00</span> 
										</div>    
									</div>  
								</div>
							</div> 
						</li>
						<li class="helper-justify"></li>
						<?php } ?>
					</ul>
				</div>
				<div class="pagination-container wow fadeInUp" data-wow-delay="0.3s">
					<div class="pagination-info font-additional pull-left"><span id="total_records"></span> Designs</div>
					<div class="pagination-list pull-right" id="pagination-div-id">	 </div>									
				</div>
			</div>
		</div>
	</div>				
</section>
<!-- <script src="<?php //echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/js/ajax/manage_jewelry_ajax.js"></script>

<script>
$(function () {
    $(".open-this").click(function () {   
    		var html=$(this).html(); 	
    	 	$(".open-this").html('+'); 
        $(".collapse").collapse('hide');
        if(html=="+") 
        {
        	$(this).html('-');
        } 
        else
        {
        	$(this).html('+');
        }	
    });
});

</script>

  <script>
$(function () {
	 $("#loadingDiv").fadeOut();
   $("#body").removeClass('opacity-body');
    $(".open-this").click(function () {   

    		var html=$(this).html(); 
    		//alert(html);  	
    	 	//$(".open-this").html('+'); 
        //$(".collapse").collapse('hide');
        /*if(html=="+") 
        {
        	$(this).html('-');
        } 
        else
        {
        	$(this).html('+');
        }	*/
    });
});
</script>