<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
<style>
	section#top-filter-jewelry ul.dropdown-menu.section-1-bg.show li label {
    font-size: 11px;
}
#pagination-div-id a {
    line-height: 25px;
}
</style>
<?php 
	$mcf=$this->input->get('mcf');
	$pcf=$this->input->get('pcf');
?>
<?php $category = $this->uri->segment(2); ?>
<?php $segment_1 = $this->uri->segment(1); ?>
<?php $segment_3 = $this->uri->segment(3); ?>
<?php $segment_4 = $this->uri->segment(4); ?>

<div  class="breadcrumb ">  
   <div itemprop="breadcrumb" class="container">
    <div class="d-flex justify-content-between align-items-center">
    <div> <h2><span>Jewelry</span></h2></div>
     <div><ul class="nav">
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>" class="homepage-link" >Home</a>  
      </li>
      <li class="nav-item">
      	<?php foreach ($bread as $row): ?>
        	<!-- <span>/</span> -->
			<a href="<?php echo $row['href']; ?>" class="homepage-link" ><?php echo ucfirst($row['name']); ?></a>
        <?php endforeach ?>
      </li>
    </ul></div>
     </div>
   </div>
</div>

<!-- <div id="breadcrumb" class="breadcrumb">
  <div itemprop="breadcrumb" class="container">
    <div class="row">
      <div class="col-md-24">
        <a href="<?php echo base_url(); ?>" class="homepage-link" >Home</a>  
        <?php foreach ($bread as $row): ?>
        	<span>/</span>
			<a href="<?php echo $row['href']; ?>" class="homepage-link" ><?php echo ucfirst($row['name']); ?></a>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div> -->
<?php echo message(); ?>
<section id="top-filter-jewelry" class="light-bg">
    <input type="hidden" id="compare_session" value="<?php echo @implode(',',$this->session->userdata('compare_jewelry')); ?>">
	<div class="container">
		<div class="">
			 <div class="main-heading">
				<h3><?php echo $page_head; ?></h3>
				<p>Get inspired with our collection of completed Jewelry. Select a similar diamond and make it your own.</p>
			</div>				
			<div class="clearfix"></div>
			<form action="" method="post" id="form">
				<input type="hidden" value="<?php echo $this->input->get('query'); ?>" name="query">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 remove-mobile"></div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-12">
					<?php if (!empty($cat_list)): ?>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div class="col-1">
		          			<div class="dropdown pull-left" data-control-type="boot-filter-drop-down" data-control-name="category-filter" data-control-action="filter">
								<button class="dropdown-toggle" type="button" data-toggle="dropdown"  aria-expanded="false">					
									<span data-type="selected-text">Jewelry Type</span>
									<span class="caret"></span>						
								</button>
								<ul class="dropdown-menu section-1-bg" role="menu" >
									<?php foreach ($cat_list as $row): ?>										
			              				<li role="presentation">
											<a href="<?php echo current_url(); ?>/<?php echo $row->category_slug; ?>" ><label class="checkbox checkbox1" > <?php echo $row->category_name; ?></label></a>
										</li>
									<?php endforeach ?>
								</ul>						  
							</div>
						</div>								
					</div>
					<?php endif ?>
					<div  style="display: table-cell; vertical-align: middle;">
						<div class="col-1">
		          			<div class="dropdown pull-left" data-control-type="boot-filter-drop-down" data-control-name="category-filter" data-control-action="filter">
								
								<button class="dropdown-toggle" type="button" data-toggle="dropdown"  aria-expanded="false">					
									<span data-type="selected-text">Budget</span>
									<span class="caret"></span>						
								</button>
								<ul class="dropdown-menu section-1-bg" role="menu" >
									<li data-pricefilter="$1 to $250">
										<label><input id="price-reset" type="radio" name="total" value="1,250" data-item="Under $250"> Under $250</label>
									</li>
									<li data-pricefilter="$250 to $500">
										<label><input type="radio" name="total" <?php if($pcf=='250-500') { echo "checked"; }  ?> value="250,500" data-item="$250 to $500"> $250 to $500 </label>
									</li>
									<li data-pricefilter="$500 to $1000">
										<label><input type="radio" name="total" <?php if($pcf=='500-1000') { echo "checked"; }  ?> value="500,1000" data-item="$500 to $1000"> $500 to $1000 </label>
									</li>
									<li data-pricefilter="$1000 to $2000">
										<label><input type="radio" name="total" <?php if($pcf=='1000-2000') { echo "checked"; }  ?> value="1000,2000" data-item="$1000 to $2000"> $1000 to $2000 </label>
									</li>
									<li data-pricefilter="$2000 to $50000">
										<label><input type="radio" name="total" <?php if($pcf=='2000-50000') { echo "checked"; }  ?> value="2000,50000" data-item="$2000+"> $2000+ </label>
									</li>
									<!-- <li data-pricefilter="$5000 to above">
										<label><input type="radio" name="total" value="5000,500000" data-item="Above $5000">Above $5000 </label>
									</li> -->																						
								</ul>
							</div>
						</div>								
					</div>
				</div>


				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3  remove-mobile"></div>
				<?php if ($this->uri->segment(3)): ?>
				<input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="scf">
				<?php endif ?>
				<input type="hidden" value="<?php echo $this->uri->segment(2); ?>" name="segment_2">
				<input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="segment_3">
				<input type="hidden" value="<?php echo $this->uri->segment(4); ?>" name="segment_4">
			</form>
		</div>
		<div class="filtered-data"> 
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-6 no-padding "> 
				<span class="f-by">FILTERED BY:</span> 
				<?php if ($page_head): ?>
				<span class="form-item last"> 
					<span> 
						<span class="filterDisplayName"><?php echo $page_head; ?> </span>
					</span> 
				</span>
				<?php endif ?>
				<span id="filter_item"></span>
			</div> 
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 pull-right" style="padding-left: 0">
				<div style="float: right;">
          			<div class="dropdown" data-control-type="boot-filter-drop-down" data-control-name="category-filter" data-control-action="filter">						
						<select name="sort" id="sort" class="select-field font-main color-third" onchange="submitForm()">
							<option value="p_low">Price Low to High</option>
							<option value="p_high">Price High to Low</option>
						    <!-- <option value="p_low">Price Low to High</option> -->
						    									    								    
						</select>
					</div> 
				</div>								
			</div>
		</div>		
	</div>	
</section>
<div class="clearfix"></div>

<section id="product-showcase" class="section-padding">

	<div class="container">
		<div class="main-heading">
			<h3> <!-- Showing <span class="total_records"></span> --> <?php //if($page_head){ echo $page_head; }else{ echo "Jewelry"; }  ?>  
				<a href="<?php echo base_url() ?>compare-jewelry" class="btn btn-primary radius-flat pull-right">Compare</a></h3>
			<!-- <p>A variety of stunning Jewelry to suit every taste; from the sheer brilliance of the round cut to the regal symmetry of the princess cut and everything in between.</p> -->
		</div>

		<div class="">
			<div class="content-box">
				<div class="category-filter clearfix wow fadeInUp" data-wow-delay="0.3s">							
					<a href="javascript:void(0)" id="list" class="pull-right grid-type hover-focus-border"  onclick="set_display('list')">
						<span class="fa fa-icon-list" aria-hidden="true"></span>
					</a>
					<a href="javascript:void(0)" id="grid" class="pull-right grid-type hover-focus-border customBgColor color-main" onclick="set_display('grid')">
						<span class="fa fa-grid" aria-hidden="true"></span>
					</a>
	        		<input type="hidden" name="display" id="display" value="grid">
				</div>
				<div class="products-cat clearfix">
					<!-- <ul class="products-grid" id="add_data">
						list goes here
						<li class="helper-justify"></li>
					</ul> -->
					<div id="add_data" class="custom-dheight row">
						
					</div>
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