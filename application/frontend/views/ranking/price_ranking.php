
<!--Section-->
			<div class="cover-image bg-background-1" data-bs-image-src="assets/images/banners/banner1.jpg">

				

				<!--Section-->
				<div>
					<div class="sptb-1">
						<div class="header-text1 mb-0">
							<div class="container">
								<!-- <div class="row">
									<div class="col-xl-12 col-lg-12 col-md-12 d-block mx-auto">
										<div class="text-center text-white text-property">
											<h1 class=""><span class="font-weight-bold">2000+</span> Best  Courses Available Here!</h1>
										</div>
										<div class="search-background bg-transparent">
                                        	<form action="" method="get" name="comparison_search" id="comparison_search">
                                            	<?php $getbrand = $this->uri->segment(2); 
                                                	  $getproduct = $this->uri->segment(3);
													  $course = $this->input->get('course');
													  $getclass = $this->input->get('class');
													   ?>
                                                
                                                <input type="hidden" name="getbrand" id="getbrand" value="<?php echo $getbrand; ?>">
												<div class="form row g-0 ">
												
												<div class="form-group col-xl-5 col-lg-5 col-md-12 select2-lg br-ts-7 br-bs-7 mb-0">
													<select class="form-control select2-show-search border-bottom-0" data-placeholder="Select Category" name="class" id="class" onChange="doAction(this.value);" required>
														<optgroup label="Class">
															 <?php foreach($class_records as $record){ ?> 
                                                              <option value="<?php echo $record->class_id; ?>" <?php if($getclass  == $record->class_id){ echo "selected"; } ?>><?php echo $record->title; ?></option>
                                 							 <?php } ?>
														</optgroup>
													</select>
												</div>
                                                <?php //print_ex($product_list); ?>
                                                <?php $b1 = $this->input->get('brand1'); ?>
                                                 <div class="form-group col-xl-2 col-lg-2 col-md-12 select2-lg mb-0 bg-white">
													<select class="form-control select2-show-search  border-bottom-0" data-placeholder="Select Course" name="brand" id="brand" required>
														<optgroup label="Brand">
                                                            <?php foreach($brand_list1 as $brand1){ ?>
															<option value="<?php echo $brand1->brand_id; ?>" <?php if($b1  == $brand1->brand_id){ echo "selected"; } ?>><?php echo $brand1->brand_name; ?></option>
                                                            <?php } ?>
															
														</optgroup>
													</select>
												</div> 
												<?php //print_ex($brand_list2); ?>
                                                <?php $b2 = $this->input->get('brand2'); ?>
												<div class="form-group col-xl-2 col-lg-2 col-md-12 select2-lg mb-0 bg-white">
													<select class="form-control select2-show-search  border-bottom-0" data-placeholder="Select Category" name="brand2" id="brand2" required>
														<optgroup label="Brand">
															 <?php foreach($brand_list2 as $brand2){ ?>
															<option value="<?php echo $brand2->brand_id; ?>" <?php if($b2  == $brand2->brand_id){ echo "selected"; } ?>><?php echo $brand2->brand_name; ?></option>
                                                            <?php } ?>
														</optgroup>
													</select>
												</div>-->
												<!-- <div class="form-group col-xl-2 col-lg-2 col-md-12 select2-lg mb-0 bg-white">
													<select class="form-control select2-show-search  border-bottom-0" data-placeholder="Select Category">
														<optgroup>
															<option>Class</option>
															<option value="1">5th</option>
															<option value="2">6th</option>
														</optgroup>
													</select>
												</div>	 -->
                                                
                                                <!-- 											
												<div class="col-xl-2 col-lg-2 col-md-12 mb-0">
													<input type="submit" value="Search Here" class="btn btn-xl btn-block btn-secondary br-ts-md-0 br-bs-md-0" />
                                                    <a href="javascript:void(0)" class="btn btn-xl btn-block btn-secondary br-ts-md-0 br-bs-md-0">Search Here</a>
												</div> 
                                                
                                                
											</div>
                                            </form>
										</div>
									</div>
								</div> -->
							</div>
						</div><!-- /header-text -->
					</div>
				</div><!--/Section-->
			</div>
		</div>
		<!--/Section-->
		<!--Breadcrumb-->
		<div class="bg-white border-bottom">
			<div class="container">
				<div class="page-header">
					<h4 class="page-title">Price Wise Ranking</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Price Wise Ranking</li>
					</ol>
				</div>
			</div>
		</div>
		<!--/Breadcrumb-->

		<!--Section-->
		<section class="sptb">
			<div class="container">
				<div class="row">
					<!--Left Side Content-->
					<div class="col-xl-4 col-lg-4 col-md-12">
						<div class="card stick-section">
							<div class="card-header">
								<h3 class="card-title">Relevant Blog</h3>
							</div>
							<div class="card-body pt-3 list-catergory1">
								<div class="item-list">
									<ul class="">
                                    	<?php foreach($blog_records as $blog){ ?>
										<li class="item list-group-item d-flex p-2">
											<img src="<?php echo base_url(); ?>uploads/blog/<?php echo $blog->blog_image; ?>" class="avatar br-7 avatar-lg me-3 my-auto" alt="avatar-img">
											<div class="">
												<small class="d-block"><?php $blog->category; ?></small>
												<a href="<?php echo base_url(); ?>blog-detail/<?php echo $blog->blog_slug; ?>" class="text-default fs-16 font-weight-bold"><?php echo $blog->blog_title; ?></a>
												<small class="d-block text-muted"><?php  $date = $blog->created_at;
											$start  = date_create($date);
											$end    = date_create(); // Current time and date
											$diff   = date_diff( $start, $end );

											//echo 'The difference is ';

											if($diff->d > 0){ echo  $diff->d . ' days '; }

											?> day ago</small>
											</div>
										</li>
                                        <?php } ?>
									</ul>
								</div>
							</div>
							<div class="card-header">
								<h3 class="card-title">Filter</h3>
							</div>
							<aside class="app-sidebar doc-sidebar my-dash">
								<div class="app-sidebar__user clearfix">
									<ul class="side-menu">
										<li class="slide">
											<a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Class</span><i class="angle fa fa-angle-right"></i></a>
											<ul class="slide-menu">
												<li><a class="slide-item" href="#"><i class="fa fa-angle-right me-2"></i>X</a></li>
												<li><a class="slide-item" href="#"><i class="fa fa-angle-right me-2"></i>XI</a></li>
												<li><a class="slide-item" href="#"><i class="fa fa-angle-right me-2"></i>XII</a></li>
											</ul>
										</li>
										<li class="slide">
											<a class="side-menu__item slide-show" href="javascript:void(0)"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Course Duration</span><i class="angle fa fa-angle-right"></i></a>
											<ul class="slide-menu">
												<li><a class="slide-item" href="#"><i class="fa fa-angle-right me-2"></i>12 Month</a></li>
												<li><a class="slide-item" href="#"><i class="fa fa-angle-right me-2"></i>11 Month</a></li>
												<li><a class="slide-item" href="#"><i class="fa fa-angle-right me-2"></i>10 Month</a></li>
											</ul>
										</li>
									</ul>
								</div>
							</aside>
						</div>
					</div>
					<!--/Left Side Content-->
					<div class="col-xl-8 col-lg-8 col-md-12">
						<!-- Value Button -->
						<div class="mb-lg-0">
							<div class="card mb-0 border-0 shadow-none p-5">
								<div class="card-header">
									<h3 class="card-title">Ranking</h3>
								</div>
								<div class="card-body p-0 pt-5">
								<div class="table-responsive ranking-table">
									<table class="table card-table table-bordered table-hover table-vcenter text-nowrap text-center">
										<tr>
											<thead class="bg-primary">
												<th class="text-white">Last Month</th>
												<th class="text-white">This Month</th>
												<th class="text-white">Brand Name</th>
											</thead>											
										</tr>
										<tr>
											<td>2</td>
											<td>1</td>
											<td>Byju's</td>
										</tr>
										<tr>
											<td>1</td>
											<td>2</td>
											<td>Byju's</td>
										</tr>
										<tr>
											<td>4</td>
											<td>3</td>
											<td>Byju's</td>
										</tr>
										<tr>
											<td>5</td>
											<td>4</td>
											<td>Byju's</td>
										</tr>
										<tr>
											<td>3</td>
											<td>5</td>
											<td>Byju's</td>
										</tr>
										<tr>
											<td>9</td>
											<td>6</td>
											<td>Byju's</td>
										</tr>
										<tr>
											<td>10</td>
											<td>7</td>
											<td>Byju's</td>
										</tr>
										<tr>
											<td>6</td>
											<td>8</td>
											<td>Byju's</td>
										</tr>
										<tr>
											<td>8</td>
											<td>9</td>
											<td>Byju's</td>
										</tr>
										<tr>
											<td>7</td>
											<td>10</td>
											<td>Byju's</td>
										</tr>
									</table>
								</div>															
							</div>
				            </div>
						</div>		
					</div>
				</div>
			</div>
		</section>

		<!--/Coursed Listings-->

<script type="text/javascript"><!--
    function doAction(val){
        //Forward browser to new url
        
        var course_type = $('#course_type').val();
		var getclass = $('#getclass').val();
		var getbrand = $('#getbrand').val();

		window.location= base_url+'counselling/'+getbrand+'?class='+val+'';;
       // window.location= base_url+'review/' +val+'?course_type='+course_type+'&class='+getclass+'';
    }
	
	function bookCounselling(counsellingId,userId){   

    // alert();  
	 //$(".alert-outline-success").hide();
     //$("#text-message-success").html(''); 


       // var value_form = $('#product_comparison').serialize();

          $.ajax({
            url: base_url+'counselling-submit',
            dataType: 'json',
            type: 'post',            
            data: {counsellingId: counsellingId,userId:userId},                                          
            success: function(data){             
                 if(data.status=='1')
                 {  
                     $(".reg-message-success").show();
                      $("#text-message-success").html(data.message);                   
                     setTimeout(function() {
                      $(".reg-message-success").hide();
                      $("#text-message-success").html('');
                      $(".reg-message-success").hide('blind', {}, 500)
                  }, 5000);                 
                 }
                 else if(data.status=='0')
                 {  
                    $(".reg-message-error").show();              
                    $("#text-message-error").html(data.message);
                    setTimeout(function() {
                       $(".reg-message-error").hide();              
                       $("#text-message-error").html('');
                      $(".reg-message-error").hide('blind', {}, 500)
                  }, 5000); 
                 }            
            },
            beforeSend: function () {
                $("#global-loader").show();
                $("#body").addClass('opacity-body');
            },
            complete: function () {
                $("#global-loader").hide();
                $("#body").removeClass('opacity-body');
            } 

        });                 
        
	}
	

</script>	

