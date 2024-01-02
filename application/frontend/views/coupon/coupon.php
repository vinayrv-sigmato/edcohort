<?php $course = $this->input->get('course'); 
$brandID = $this->input->get('brand');
$product_type = $this->input->get('product_type');
$board = $this->input->get('board');
$class = $this->input->get('class');
$batch = $this->input->get('batch');
$customer_rating = $this->input->get('customer_rating');
$date_posted = $this->input->get('date_posted');
$sort_by = $this->input->get('sort_by');
$segment = $this->input->get('segment');

  //  print_ex($product_list);
?>
<!--banner start-->
<div class="inner-banner ">
    <div class="col-md-3 breadcrumb-design">

        <div class="breadcrumb">
            <ul>
                <li>Home</li>
                <li><?php echo @$product_list['0']->brand_name; ?></li>
                <li><a href="#"><?php echo @$product_list['0']->product_name; ?></a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">

        <div class="tab-menu">
            <ul>
                <li><a
                        href="<?php echo base_url(); ?>complaint?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Complaint
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>comparison?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Compare
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>counselling?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Counselling
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>cohort?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Cohort
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>review?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Reviews
                    </a></li>
                <li class="active"><a
                        href="<?php echo base_url(); ?>coupon?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Coupons
                    </a></li>
            </ul>
        </div>
    </div>
</div>
<!--banner end-->
<div class="content">

    <?php
   /* print_R(get_breadcrumb_value());
    exit;*/
?>


    <div class="container-fluid review-top-section">

        <div class="row">
            <div class="col-md-1 course-img p-3 text-center">

                <img src="<?php echo base_url(); ?>assets/images/edcohort_tp_review_logo.png" alt="">
            </div>
            <div class="col-md-6 pt-3 course-name-display">
                <h1>Course Name</h1>
                <div>
                    <span class="rating-btn-display">4.9</span>
                    <label for="rating2" class="rating-display"><img
                            src="<?php echo base_url(); ?>assets/images/rating-4.png" alt=""> </label>
                </div>
                <div class="pt-3 total-review-display">
                    <h4> Excellent Based on 155 - Review </h4>
                </div>
            </div>
            <div class="col-md-4 pt-3 write-review-icon mb-3">
                <a href="<?php echo base_url(); ?>write-a-review?course=<?php echo @$course; ?>&segment=<?php echo $segment; ?>&brand=<?php echo $brandID; ?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board; ?>&class=<?php echo $class; ?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>"
                    class="review-btns text-decoration-none">
                    <i class="fa-solid fa-circle-user fa-2xl design-user"></i> <span> Write a review </span>
                    <label for="rating2"><img src="<?php echo base_url(); ?>assets/images/rating-1.png" alt="">
                    </label>
                </a>

            </div>

        </div>
    </div>
    <!--start-->
    <div class="review-main-box d-flex">

        <button type="button" class="filter-btn">Filter</button>

        <!--left start-->
        <div class="container-fluid review-top-section">
            <div class="row review-top-next">
                <!--- Filtr Starts  --->
                <div class="col-md-2 review-left">

                    <h3 class="filter-title">Filter</h3>
                    <form action="<?php echo base_url(); ?>coupon-search" method="post" name="form" id="form">
                        <?php echo csrf_field(); ?>

                        <div class="filter-col">
                            <h3 class="filter-col-title">BRAND</h3>
                            <div class="select-box">
                                <select name="brand" id="brand">
                                    <?php foreach($brand_records as $brands){?>
                                    <option value="<?php echo $brands->brand_id; ?>"
                                        <?php if($brands->brand_id == @$product_list['0']->brand_id){ echo 'selected'; } ?>>
                                        <?php echo $brands->brand_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="filter-col">

                            <div class="btn-group btn-toggle filter-toggle-box">
                                <div class="input-toggle <?php if(@$product_list['0']->product_type == 1){ echo 'active';} ?>"
                                    id="online-toggle">
                                    <label>Online</label>
                                    <input class="btn btn-lg btn-default" type="radio" name="product_type"
                                        <?php if(@$product_list['0']->product_type == 1){ echo 'checked';} ?>
                                        id="online" value="1" onClick="prodcutType(1)">
                                </div>
                                <div class="input-toggle <?php if(@$product_list['0']->product_type == 2){ echo 'active';} ?>"
                                    id="offline-toggle">
                                    <label>Offline</label>
                                    <input class="btn btn-lg btn-primary active" type="radio" name="product_type"
                                        <?php if(@$product_list['0']->product_type == 2){ echo 'checked';} ?>
                                        id="offline" value="2" onClick="prodcutType(2)">
                                </div>
                            </div>
                            <!-- <p class="online-results">Showing <span>(2677)</span> Online Cohort results for BYJU’s</p>-->
                        </div>

                        <div class="filter-col">
                            <h3 class="filter-col-title">BOARD</h3>
                            <div class="select-box">
                                <select name="board" id="board">
                                    <?php foreach($board_records as $boards){?>
                                    <option value="<?php echo $boards->board_id; ?>"
                                        <?php if($boards->board_id == @$product_list['0']->board_id){ echo 'selected'; } ?>>
                                        <?php echo $boards->board_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="filter-col">
                            <h3 class="filter-col-title">CLASS</h3>
                            <div class="select-box">
                                <select name="class" id="class">
                                    <?php foreach($class_records as $classes){?>
                                    <option value="<?php echo $classes->class_id; ?>"
                                        <?php if($classes->class_id == @$product_list['0']->class_id){ echo 'selected'; } ?>>
                                        <?php echo $classes->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                        <div class="filter-col">
                            <h3 class="filter-col-title">BATCH (Cohort) <span>Running Year</span></h3>
                            <div class="select-box">
                                <select name="batch" id="batch">
                                    <?php foreach($batch_records as $batches){?>
                                    <option value="<?php echo $batches->batch_id; ?>"
                                        <?php if($batches->batch_id == @$product_list['0']->batch_id){ echo 'selected'; } ?>>
                                        <?php echo $batches->batch_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class=" filter-col ">
                            <div class="filter-list-box">
                                <button type="submit" class="apply-btn">Apply Filter</button>
                            </div>
                        </div>
                    </form>

                </div>
                <!--left end-->
                <div class="col-md-8">
                    <!--center start-->
                    <div class="review-center coupon-center">
                        <div class="across-row">
                            <div class="across-col-box d-flex justify-content-between">
                                <!--left-->
                                <div class="across">
                                    <div class="standard-box">
                                        <div class="standard-content">
                                            <div class="standard-header">Course Details </div>
                                            <div>
                                                <h4 class="text-center mb-3">
                                                    <?php echo @$product_list['0']->product_name; ?>
                                                </h4>
                                                <p><?php echo @$product_list['0']->product_short_description; ?></p>
                                                <p><?php echo @$product_list['0']->product_description; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--right-->
                                <!-- <div class="across-right">                        
							<div class="standard-content">
								<div class="standard-header">I am Buying</div>
								<form action="">
									<div class="select-box">                            	
										<select name="confirm_bying" id="brand" class="mb-3">
                                        <?php foreach($coupon_records as $coupon){ ?> 
                                            <option value="<?php echo $coupon->coupon_id; ?>" onClick="couponconfirm_bying(<?php echo $coupon->coupon_id; ?>)"><?php echo $coupon->coupon_code ?></option>
                                        <?php } ?>
										</select>
										<a href="javascript:void(0)" class="review-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button">Apply Now</a>
									</div>
								</form>
							</div>
						</div> -->
                            </div>
                        </div>
                        <div class="across-row">
                            <h2 class="across-title" style="margin-left:20px"><span></span> Status Bar</h2>
                            <div class=" card-body">
                                <?php echo message(); ?>
                                <div class="alert alert-outline alert-outline-success reg-message-success"
                                    id="reg-message-success" role="alert" style="display:none;">
                                    <button type="button" class="close" data-bs-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <p id="text-message-success"></p>
                                </div>
                                <div class="alert alert-outline alert-outline-danger reg-message-error"
                                    id="reg-message-error" role="alert" style="display:none">
                                    <button type="button" class="close" data-bs-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <p id="text-message-error"></p>
                                </div>

                                <div class="table-responsive coupon_table">
                                    <table class="table table-bordered border-top mb-0">

                                        <tr>
                                            <?php //print_ex($coupon_records); ?>
                                            <td>Confirm Buying</td>
                                            <?php foreach($coupon_records as $coupon){ ?>
                                            <td class="text-center">
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="confirm_bying"
                                                        id="confirm_bying_<?php echo $coupon->coupon_id; ?>"
                                                        onClick="couponconfirm_bying(<?php echo $coupon->coupon_id; ?>)"
                                                        value="<?php echo $coupon->coupon_id; ?>">
                                                    <label class="btn btn-outline-primary"
                                                        for="confirm_bying_<?php echo $coupon->coupon_id; ?>"><?php echo $coupon->coupon_code ?></label>
                                                </div>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                        <tr id="buyer_tr" style="display:none">
                                            <td>Ready Buyers</td>
                                            <?php foreach($coupon_records as $coupon){ ?>
                                            <td class="text-center">
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <!-- <input type="radio" class="btn-check" name="ready_buying" id="ready_buying_<?php echo $coupon->coupon_id; ?>" value="<?php echo $coupon->coupon_id; ?>"> -->
                                                    <label class="btn btn-outline-primary"
                                                        id="label_ready_buying_<?php echo $coupon->coupon_id; ?>"
                                                        for="ready_buying_<?php echo $coupon->coupon_id; ?>"><?php echo $coupon->coupon_count; ?></label>
                                                </div>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                    </table>
                                    <input type="hidden" class="form-control" name="course" id="course"
                                        placeholder="Your Name" value="<?php echo $product_list['0']->product_id; ?>">
                                    <input type="hidden" class="form-control" name="user_id" id="user_id"
                                        placeholder="Your Name"
                                        value="<?php echo $this->session->userdata('user_id'); ?>">
                                    <input type="hidden" class="form-control" name="coupon_count" id="coupon_count"
                                        placeholder="Your Name" value="<?php echo $coupon->coupon_count; ?>">
                                </div>


                                <br />
                                <!-- <div class="btn-list text-right">


                                </div> -->
                            </div>
                            <div class="text-center">
                                <?php if($this->session->userdata('user_id')){ ?>

                                <button type=" button" onClick="conformCoupon()"
                                    class="btn btn-primary text-right btn-md mb-1">Get
                                    Your
                                    Coupon Here </button>
                                <?php }else{ ?>
                                <a href="javascript:void(0)" class="btn btn-primary text-right btn-md mb-1"
                                    data-bs-effect="effect-scale" data-bs-toggle="modal"
                                    data-bs-target="#login-button">Get
                                    Your
                                    Coupon Here</a>
                                <!--     <button type="button" class="review-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#exampleModal3">Get Your Coupon Here</button> -->
                                <?php } ?>
                                <!-- <a href="javascript:void(0)" class="review-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button">Get Your Coupon Here</a> -->
                                <a href="#" class="text-decoration-none ms-1"><svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.5004 3.74998C16.5003 2.87013 16.8096 2.01826 17.3741 1.3434C17.9386 0.668542 18.7225 0.213678 19.5885 0.0583884C20.4546 -0.0969011 21.3476 0.0572728 22.1115 0.493936C22.8753 0.9306 23.4613 1.62195 23.7669 2.44702C24.0725 3.27209 24.0783 4.17835 23.7832 5.00724C23.4881 5.83613 22.9109 6.53487 22.1527 6.9812C21.3945 7.42753 20.5034 7.59304 19.6355 7.44876C18.7675 7.30448 17.978 6.85961 17.4049 6.19198L7.3279 10.872C7.55956 11.6061 7.55956 12.3938 7.3279 13.128L17.4049 17.808C18.0107 17.1035 18.8564 16.6489 19.7782 16.5325C20.7 16.416 21.6322 16.6458 22.3942 17.1775C23.1561 17.7092 23.6936 18.5048 23.9024 19.4102C24.1112 20.3155 23.9764 21.2662 23.5243 22.0778C23.0721 22.8895 22.3347 23.5044 21.455 23.8034C20.5753 24.1024 19.6159 24.0642 18.7628 23.6961C17.9097 23.328 17.2236 22.6564 16.8375 21.8113C16.4513 20.9662 16.3927 20.0079 16.6729 19.122L6.5959 14.442C6.09705 15.0233 5.43212 15.438 4.69057 15.6301C3.94901 15.8222 3.1664 15.7827 2.448 15.5167C1.72961 15.2507 1.10991 14.7711 0.672259 14.1424C0.234606 13.5137 0 12.766 0 12C0 11.2339 0.234606 10.4863 0.672259 9.85755C1.10991 9.22884 1.72961 8.74923 2.448 8.48326C3.1664 8.21729 3.94901 8.17772 4.69057 8.36985C5.43212 8.56199 6.09705 8.97663 6.5959 9.55798L16.6729 4.87798C16.5582 4.51298 16.5 4.13258 16.5004 3.74998Z"
                                            fill="#A0A0A0" />
                                    </svg> Share</a>
                            </div>
                        </div>

                    </div>
                </div>
                <!--center end-->

                <!-- Review right side content -->
                <div class="col-md-2">
                    <div class="review-right">
                        <div class="stick-right">
                            <div class="community-side-col">
                                <h3>10th PCM Community</h3>
                                <p>48 Students from your classdiscussing on your interested course</p>
                                <button type="button" class="discussing-btn">Start discussing</button>
                            </div>
                            <div class="star-box">
                                <h3 class="star-title">Star %</h3>
                                <div class="star-col">
                                    <div class="star-col-image"></div>
                                    <h4>41% </h4>
                                    <p>Willing to refer at BYJU's</p>
                                </div>
                                <div class="star-col">
                                    <div class="star-col-image"></div>
                                    <h4>Top 3 Courses</h4>
                                    <ul class="top-courses-list">
                                        <li>Cohort 1</li>
                                        <li>Cohort 2</li>
                                        <li>Cohort 3</li>
                                    </ul>
                                </div>
                                <div class="star-col">
                                    <div class="star-col-image"></div>
                                    <h4>43%</h4>
                                    <p>Willing to refer at BYJU's</p>
                                </div>
                                <div class="progress-bar-box">
                                    <div class="d-flex progress-bar">
                                        <div style="width: 75%;"><span>75%</span></div>
                                        <div style="width: 25%;"><span>25%</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="score-box">
                                <h3>Brand score card</h3>
                                <div class="score-content"></div>
                                <button class="score-btn">View report</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Review right side content Ends-->


            </div>

            <!--end-->


            <div class="helpful-box">
                <div class="container">

                    <h2 class="helpful-title">You might find this helpful!</h2>

                    <div class="helpful-inner-box d-flex">
                        <div class="helpful-left">
                        </div>

                        <div class="helpful-center">
                            <h3>Article topic title related to Search “Byju’s”</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum
                                has
                                been the
                                indus.....</p>
                        </div>

                        <div
                            class="helpful-right d-flex flex-wrap justify-content-center align-items-center text-center">
                            Quick Read<br /> 1 min
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--content end-->
    </div>
    <!--wrapper end-->


    <script>
    $(document).ready(function() {

        $('#category').change(function() {
            var category_id = $('#category').val();
            if (category_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>get-class-list",
                    method: "POST",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        $('#board').html(data);
                        // $('#city').html('<option value="">Select City</option>');
                    }
                });
            } else {
                $('#state').html('<option value="">Select State</option>');
                $('#city').html('<option value="">Select City</option>');
            }
        });

        $('#brand').change(function() {
            var brand_id = $('#brand').val();
            if (brand_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>get-board-list",
                    method: "POST",
                    data: {
                        brand_id: brand_id
                    },
                    success: function(data) {
                        $('#board').html(data);
                        // $('#city').html('<option value="">Select City</option>');
                    }
                });
            } else {
                // $('#state').html('<option value="">Select State</option>');
                // $('#city').html('<option value="">Select City</option>');
            }
        });

        // $('#brand').change(function() {
        //     var brand_id = $('#brand').val();
        //     if (brand_id != '') {
        //         $.ajax({
        //             url: "<?php echo base_url(); ?>get-board-list",
        //             method: "POST",
        //             data: {
        //                 brand_id: brand_id
        //             },
        //             success: function(data) {
        //                 $('#board').html(data);
        //                 // $('#city').html('<option value="">Select City</option>');
        //             }
        //         });
        //     } else {
        //        // $('#state').html('<option value="">Select State</option>');
        //        // $('#city').html('<option value="">Select City</option>');
        //     }
        // });


        $('#board').change(function() {
            var brand_id = $('#brand').val();
            var product_type = $('input[name="product_type"]:checked').val();
            var board_id = $('#board').val();
            //alert(product_type);
            if (board_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>get-class-list",
                    method: "POST",
                    data: {
                        board_id: board_id,
                        product_type: product_type,
                        brand_id: brand_id
                    },
                    success: function(data) {
                        $('#class').html(data);
                    }
                });
            }
        });


        $('#class').change(function() {
            var brand_id = $('#brand').val();
            var product_type = $('input[name="product_type"]:checked').val();
            var board_id = $('#board').val();
            var class_id = $('#class').val();
            if (class_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>get-batch-class",
                    method: "POST",
                    data: {
                        board_id: board_id,
                        product_type: product_type,
                        brand_id: brand_id,
                        class_id: class_id
                    },
                    success: function(data) {
                        $('#batch').html(data);
                    }
                });
            }
        });

        // $('#board').change(function(){
        //     var board_id = $('#board').val();
        //     if(board_id != '')
        //     {
        //         $.ajax({
        //             url:"<?php echo base_url(); ?>get-course-batch",
        //             method:"POST",
        //             data:{board_id:board_id},
        //             success:function(data)
        //             {
        //                 $('#batch').html(data);
        //             }
        //         });
        //     }
        // }); 



        // $('#state').change(function() {
        //     var state_id = $('#state').val();
        //     if (state_id != '') {
        //         $.ajax({
        //             url: "<?php echo base_url(); ?>dynamic_dependent/fetch_city",
        //             method: "POST",
        //             data: {
        //                 state_id: state_id
        //             },
        //             success: function(data) {
        //                 $('#city').html(data);
        //             }
        //         });
        //     } else {
        //         $('#city').html('<option value="">Select City</option>');
        //     }
        // });




    });

    function productReviewReadMore(val) {
        //Forward browser to new url
        $("#reviewShort_" + val).hide();
        $("#review-read_" + val).hide();
        $("#reviewFull_" + val).show();


    }

    function productReviewReadShort(val) {
        //Forward browser to new url
        $("#reviewFull_" + val).hide();
        $("#reviewShort_" + val).show();
        $("#review-read_" + val).show();

    }

    function productReviewReplyReadMore(val) {
        //Forward browser to new url
        $("#reviewReplyShort_" + val).hide();
        $("#reviewReplyFull_" + val).show();

    }

    function productReviewReplyReadShort(val) {
        //Forward browser to new url
        $("#reviewReplyFull_" + val).hide();
        $("#reviewReplyShort_" + val).show();

    }

    function divShow(val) {
        //Forward browser to new url
        if ($('#commentDiv_' + val).css('display') == 'none') {
            $('#commentDiv_' + val).css('display', 'block');
        } else {
            $('#commentDiv_' + val).css('display', 'none');
        }

    }

    function productReviewLike(review_id, user_id, action) {
        // alert(review_id+' '+user_id);  
        //$(".alert-outline-success").hide();
        //$("#text-message-success").html(''); 
        //var value_form = $('#product_review').serialize();          
        $.ajax({
            url: base_url + 'review-like',
            dataType: 'json',
            type: 'post',
            data: {
                review_id: review_id,
                user_id: user_id,
                action: action
            },
            success: function(data) {
                if (data.status == '1') {
                    // alert('1'); 
                    location.reload();
                } else if (data.status == '0') {
                    //alert('0'); 
                }
            },
            beforeSend: function() {
                $("#global-loader").show();
                $("#body").addClass('opacity-body');
            },
            complete: function() {
                $("#global-loader").hide();
                $("#body").removeClass('opacity-body');
            }
        });

    }

    function productReviewReply(id) { // alert();  
        //$(".alert-outline-success").hide();
        //$("#text-message-success").html(''); 
        var value_form = $('#product_review_reply_' + id).serialize();
        $.ajax({
            url: base_url + 'review-reply-submit',
            dataType: 'json',
            type: 'post',
            data: value_form,
            success: function(data) {
                if (data.status == '1') {
                    $("#reg-message-success_" + id).show();
                    $("#text-message-success_" + id).html(data.message);
                    setTimeout(function() {
                        $("#reg-message-success_" + id).hide();
                        $("#text-message-success_" + id).html('');
                        $("#reg-message-success_" + id).hide('blind', {}, 500)
                    }, 5000);
                } else if (data.status == '0') {
                    $("#reg-message-error_" + id).show();
                    $("#text-message-error_" + id).html(data.message);
                    setTimeout(function() {
                        $("#reg-message-error_" + id).hide();
                        $("#text-message-error_" + id).html('');
                        $("#reg-message-error_" + id).hide('blind', {}, 500)
                    }, 5000);
                }
            },
            beforeSend: function() {
                $("#global-loader").show();
                $("#body").addClass('opacity-body');
            },
            complete: function() {
                $("#global-loader").hide();
                $("#body").removeClass('opacity-body');
            }
        });

    }


    function prodcutType(val) {
        //Some code
        //alert(val);
        var product_type = val;
        var brand_id = $('#brand').val();

        if (product_type == 1) {
            $("#offline-toggle").removeClass('active');
            $("#online-toggle").addClass('active');

        } else {
            $("#online-toggle").removeClass('active');
            $("#offline-toggle").addClass('active');
        }

        $.ajax({
            url: base_url + 'get-board-list',
            dataType: 'json',
            type: 'post',
            data: {
                product_type: product_type,
                brand_id: brand_id
            },
            success: function(data) {
                $('#board').html(data);
                // $('#city').html('<option value="">Select City</option>');
            },
            beforeSend: function() {
                $("#global-loader").show();
                $("#body").addClass('opacity-body');
            },
            complete: function() {
                $("#global-loader").hide();
                $("#body").removeClass('opacity-body');
            }
        });
    }
    </script>




    <!--Section-->

</div>
<!--/Section-->



<!--/Coursed Listings-->

<script type="text/javascript"><!--
function doAction(val){
        //Forward browser to new url
        window.location= base_url+'coupon/' + val;
    }

    function conformCoupon(){   

    // alert();  
	 //$(".alert-outline-success").hide();
     //$("#text-message-success").html(''); 

     var course_type = $('#course_type').val();
     var course = $('#course').val();
     var brand = $('#brand').val();
     var user_id = $('#user_id').val();
     var confirm_bying = $('input[name="confirm_bying"]:checked').val();
     var coupon_count = parseInt($("#label_ready_buying_"+confirm_bying).text());
       //var value_form = $('#product_comparison').serialize();

       $.ajax({
        url: base_url+'coupon-submit',
        dataType: 'json',
        type: 'post',            
        data:{ 'course' : ''+course+'', 'brand' : ''+brand+'','confirm_bying' : ''+confirm_bying+'','user_id' : ''+user_id+'' },                                         
        success: function(data){             
           if(data.status=='1')
           {  
              var newcount = parseInt(coupon_count)+1;
              $("#label_ready_buying_"+confirm_bying).empty();
              $("#label_ready_buying_"+confirm_bying).append(newcount);
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

   function couponconfirm_bying(id){ 
      $("#buyer_tr").show();
  }

</script>	