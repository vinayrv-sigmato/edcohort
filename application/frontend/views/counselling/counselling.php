<?php $course = $this->input->get('course'); 
$brandID = $this->input->get('brand');
$product_type = $this->input->get('product_type');
$board = $this->input->get('board');
$class = $this->input->get('class');
$batch = $this->input->get('batch');
$customer_rating = $this->input->get('customer_rating');
$date_posted = $this->input->get('date_posted');
$sort_by = $this->input->get('sort_by');
$c_date = $this->input->get('c_date');
$segment = $this->input->get('segment');

   // print_ex($_GET);
?>
<!--banner start-->
<div class="inner-banner row">
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
                <li class="active"><a
                        href="<?php echo base_url(); ?>counselling?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Counselling
                        <?php echo $counselling_count; ?></a></li>
                <li><a
                        href="<?php echo base_url(); ?>cohort?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Cohort</a>
                </li>
                <li><a
                        href="<?php echo base_url(); ?>review?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Reviews</a>
                </li>
                <li><a
                        href="<?php echo base_url(); ?>coupon?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Coupons</a>
                </li>
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
            <div class="col-md-4 pt-3 write-review-icon ">
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
                    <div class="review-left" id="sideleft-fix">
                        <form action="<?php echo base_url(); ?>counselling-search" id="form" name="form" method="post">
                            <h3 class="filter-title">Filter</h3>
                            <?php echo csrf_field(); ?>
                            <div class="filter-col">
                                <h3 class="filter-col-title">COUNSELLING TYPE</h3>
                                <div class="select-box">
                                    <select>
                                        <option>Looking for admission</option>
                                    </select>
                                </div>
                            </div>
                            <div class="filter-col">
                                <h3 class="filter-col-title">BRAND</h3>
                                <div class="select-box">
                                    <select name="brand" id="brand">
                                        <?php foreach($brand_records as $brand){?>
                                        <option value="<?php echo $brand->brand_id; ?>"
                                            <?php if($brand->brand_id == @$product_list['0']->brand_id){ echo 'selected'; } ?>>
                                            <?php echo $brand->brand_name; ?></option>
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
                                <!-- <p class="online-results">Showing <span>(2677)</span> Online Cohort results for BYJU’s</p> -->
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
                            <div class="filter-col">
                                <h3 class="filter-col-title">CUSTOMER RATING</h3>
                                <div class="filter-list-box">
                                    <ul>
                                        <li>
                                            <input type="radio" name="customer_rating" id="rating1" value="5"
                                                <?php if(@$customer_rating == 5){ echo 'checked';} ?>>
                                            <label for="rating1"><img
                                                    src="<?php echo base_url();?>assets/images/rating-5.png" alt=""> &
                                                up</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="customer_rating" id="rating2" value="4"
                                                <?php if(@$customer_rating == 4){ echo 'checked';} ?>>
                                            <label for="rating2"><img
                                                    src="<?php echo base_url();?>assets/images/rating-4.png" alt=""> &
                                                up</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="customer_rating" id="rating3" value="3"
                                                <?php if(@$customer_rating == 3){ echo 'checked';} ?>>
                                            <label for="rating3"><img
                                                    src="<?php echo base_url();?>assets/images/rating-3.png" alt=""> &
                                                up</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="customer_rating" id="rating4" value="2"
                                                <?php if(@$customer_rating == 2){ echo 'checked';} ?>>
                                            <label for="rating4"><img
                                                    src="<?php echo base_url();?>assets/images/rating-2.png" alt=""> &
                                                up</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="customer_rating" id="rating5" value="1"
                                                <?php if(@$customer_rating == 1){ echo 'checked';} ?>>
                                            <label for="rating5"><img
                                                    src="<?php echo base_url();?>assets/images/rating-1.png" alt=""> &
                                                up</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-col date-filter">
                                <h3 class="filter-col-title">Date</h3>
                                <label for="datepicker">Pick a Date
                                    <input type="text" name="cdate" id="datepicker" autocomplete="off">
                                </label>
                            </div>
                            <div class=" filter-col ">
                                <div class="filter-list-box">
                                    <button type="submit" class="apply-btn">Apply Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--left end-->


                    <!--right start-->
                    <div class="review-right">
                    </div>
                    <!--right end-->
                </div>
                <!--end-->
                <!--center start-->
                <div class="col-md-8">
                    <div class="review-center">
                        <div class="review-btn-box p-3">
                            <?php if($this->session->userdata('user_id')){ ?>
                            <a href="<?php echo base_url(); ?>create-a-counselling?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&pickupdate=<?php echo $c_date; ?>&sort_by=<?php echo $sort_by; ?>"
                                class="review-btn"> Get counselling
                            </a>
                            <?php } else{ ?>
                            <a href="javascript:void(0)" class="review-btn" data-bs-effect="effect-scale"
                                data-bs-toggle="modal" data-bs-target="#login-button">Get counselling
                            </a>
                            <?php } ?>
                        </div>
                        <!-- <div class="select-filter-box">
                <ul class="select-filter">
                    <li>ICSE <a href="#"><img src="images/close.png" alt=""></a></li>
                    <li>10th Standard <a href="#"><img src="images/close.png" alt=""></a></li>
                    <li>Exam 2022-23 SEPT <a href="#"><img src="images/close.png" alt=""></a></li>
                </ul>
                <a href="#" class="clear-btn">Clear filter selection</a>
            </div> -->
                        <?php //print_pre($counselling_list); ?>
                        <?php if(!empty($cdate)){ ?>
                        <div class="availability-col"><a
                                href="javascript:void(0)"><?php echo date('d-M-Y',strtotime($cdate)); ?>
                                You are Selected </a>
                        </div>
                        <?php } ?>
                        <div class="counselling-col-box d-flex flex-wrap p-3">
                            <!--col-->
                            <?php if($counselling_list){ ?>
                            <?php foreach($counselling_list as $counselling){ ?>
                            <div class="counselling-col">
                                <div class="counselling-col-img">
                                    <!-- <img src="images/counselling-img.jpg" alt=""> -->
                                    <img src="<?php echo base_url(); ?>uploads/user/<?php echo $counselling->image; ?>"
                                        alt="">
                                    <div class="review-rating">
                                        <?php if($counselling->product_rating == 1){?>
                                        <i class="fa fa-star text-yellow"></i><i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <?php } ?>
                                        <?php if($counselling->product_rating == 2){?>
                                        <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <?php } ?>
                                        <?php if($counselling->product_rating == 3){?>
                                        <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                        <i class="fa fa-star text-yellow"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i>
                                        <?php } ?>
                                        <?php if($counselling->product_rating == 4){?>
                                        <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                        <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>
                                        <i class="fa fa-star"></i>
                                        <?php } ?>
                                        <?php if($counselling->product_rating == 5){?>
                                        <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                        <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>
                                        <i class="fa fa-star text-yellow"></i>
                                        <?php } ?>
                                    </div>
                                    <!-- <span class="rating-number"><img src="images/Star.png" alt=""> 3.2</span> -->
                                </div>
                                <div class="counselling-col-content">
                                    <div class="content-top-row d-flex justify-content-between align-items-start">
                                        <div class="top-left">
                                            <h3><?php echo ucwords($counselling->firstname); ?></h3>
                                            <p><?php echo ucwords($counselling->brand_name); ?></p>
                                        </div>
                                        <div class="top-right">Free/hr</div>
                                    </div>
                                    <div class="content-bottom-row d-flex justify-content-between align-items-center">
                                        <!-- <div class="bottom-left">No. Of Counselling <b>150+</b></div> -->
                                        <div class="bottom-right"><a href="#">Check availability</a></div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>counselling-confirm/<?php echo $counselling->c_id;  ?>"
                                        class="book-btn">Book now</a>
                                    <!--   <?php if($this->session->userdata('user_id')){ ?>
                                            <button type="button" class="book-btn" onclick="bookCounselling('<?php echo $counselling->c_id; ?>','<?php echo $this->session->userdata('user_id'); ?>')">Book Now</button>
                                            <?php }else{ ?>
                                            <button type="button" class="book-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button">Book Now</button>
                                            <?php } ?> -->
                                </div>
                            </div>
                            <?php } ?>
                            <div id="pagination-div-id" class="dataTables_paginate paging_simple_numbers">
                                <?php echo $page_link; ?></div>
                            <?php }else{?>
                            <div class="review-row">
                                <h4>No result found..!!</h4>
                            </div>
                            <?php } ?>

                            <!--    <?php if($this->session->userdata('user_id')){ ?>
                                <div>
                                    <a href="<?php echo base_url(); ?>create-a-counselling"><button type="button" class="book-btn">I am a YouTuber </button></a> 
                                </div>
                            <?php }else{ ?>
                                <button type="button" class="book-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button">Book Now</button>
                            <?php } ?> -->
                            <!--col-->

                            <!--col-->
                            <!--     <div class="counselling-col">
                        <div class="counselling-col-img">
                            <img src="images/counselling-img.jpg" alt="">
                            <span class="rating-number"><img src="images/Star.png" alt=""> 3.2</span>
                        </div>
                        <div class="counselling-col-content">
                            <div class="content-top-row d-flex justify-content-between align-items-start">
                                <div class="top-left"><h3>John Doe</h3> <p>Profession</p></div>
                                <div class="top-right">Free/hr</div>
                            </div>
                            <div class="content-bottom-row d-flex justify-content-between align-items-center">
                                <div class="bottom-left">No. Of Counselling <b>150+</b></div>
                                <div class="bottom-right"><a href="#">Check availability</a></div>
                            </div>
                            <a href="#" class="book-btn">Book now</a>
                        </div>          
                    </div> -->
                            <!--col-->
                            <!-- <div class="counselling-col">
                        <div class="counselling-col-img">
                            <img src="images/counselling-img.jpg" alt="">
                            <span class="rating-number"><img src="images/Star.png" alt=""> 3.2</span>
                        </div>
                        <div class="counselling-col-content">
                            <div class="content-top-row d-flex justify-content-between align-items-start">
                                <div class="top-left"><h3>John Doe</h3> <p>Profession</p></div>
                                <div class="top-right">Free/hr</div>
                            </div>
                            <div class="content-bottom-row d-flex justify-content-between align-items-center">
                                <div class="bottom-left">No. Of Counselling <b>150+</b></div>
                                <div class="bottom-right"><a href="#">Check availability</a></div>
                            </div>
                            <a href="#" class="book-btn">Book now</a>
                        </div>
                    </div> -->
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

                <div class="helpful-box">
                    <div class="container">
                        <!-- <div id="summernote"></div> -->
                        <h2 class="helpful-title">You might find this helpful!</h2>
                        <div class="helpful-inner-box d-flex">
                            <div class="helpful-left">
                            </div>
                            <div class="helpful-center">
                                <h3>Article topic title related to Search “Byju’s”</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has
                                    been
                                    the indus.....
                                </p>
                            </div>
                            <div class="helpful-right">
                                <a href="#"
                                    class="d-flex flex-wrap justify-content-center align-items-center text-center">Quick
                                    Read<br /> 1 min</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--content end-->

            <!-- Modal -->
            <div class="modal fade calendar-modal" id="dateModal" tabindex="-1" aria-labelledby="dateModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">

                            <h2 class="date-title"><span>Please select confirm your availability by selecting date
                                    and
                                    time</span></h2>
                            <div class="calendar-main-box d-flex justify-content-between">

                                <div class="calendar-box">
                                    <input class="form-control fc-datepicker" name="date" placeholder="MM/DD/YYYY"
                                        type="text">

                                </div>

                                <div class="select-time-box">
                                    <h4 class="time-title">Selected date</h4>

                                    <div class="time-box">
                                        <input class="form-control" id="tpBasic" placeholder="Set time"
                                            name="start_time" type="text">
                                    </div>

                                    <a href="javascript:void(0)" class="time-btn" data-bs-dismiss="modal"
                                        data-bs-toggle="modal" data-bs-target="#TimeModal">Select time</a>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade calendar-modal" id="TimeModal" tabindex="-1" aria-labelledby="TimeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <h2 class="date-title"><span>Please select confirm your availability by selecting date and
                                time</span>
                        </h2>

                        <div class="time-main-box d-flex">

                            <div class="select-time-box">
                                <h4 class="time-title">Selected date</h4>

                                <div class="time-box">
                                    <h2>10<span>th</span></h2>
                                    <p>August</p>
                                    <p>2022</p>
                                </div>
                            </div>

                        </div>


                        <div class="updates-title">
                            You will recieve updates on your registered phone number and on email-id
                        </div>

                        <div class="updates-field d-flex align-items-center">
                            <input type="text" value="+91 8237412256">
                            <a href="#">Edit</a>
                        </div>

                        <div class="updates-field d-flex align-items-center">
                            <input type="text" value="Example@gmail.com">
                            <a href="#">Edit</a>
                        </div>

                        <a href="#" class="confirm-btn">Confirm</a>


                    </div>
                </div>
            </div>


            <script>
            $('.btn-toggle').click(function() {

                if ($(this).find('.btn-primary').length > 0) {
                    $(this).find('.btn').toggleClass('btn-primary');
                }


            });

            $(".filter-btn").click(function() {
                $(".review-left").toggleClass("open");
                $(".filter-btn").toggleClass("open");
            });
            </script>

            <script>
            $(document).ready(function() {

                $('#category').change(function() {
                    var category_id = $('#category').val();
                    if (category_id != '') {
                        $.ajax({
                            url: "<?php echo base_url(); ?>get-counselling-class",
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
                        // $('#state').html('<option value="">Select State</option>');
                        // $('#city').html('<option value="">Select City</option>');
                    }
                });

                $('#brand').change(function() {
                    var brand_id = $('#brand').val();
                    if (brand_id != '') {
                        $.ajax({
                            url: "<?php echo base_url(); ?>get-counselling-board",
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

                $('#board').change(function() {
                    var brand_id = $('#brand').val();
                    var product_type = $('input[name="product_type"]:checked').val();
                    var board_id = $('#board').val();
                    // alert(board_id);
                    if (board_id != '') {
                        $.ajax({
                            url: "<?php echo base_url(); ?>get-counselling-class",
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
                    // alert(class_id);
                    if (class_id != '') {
                        $.ajax({
                            url: "<?php echo base_url(); ?>get-counselling-batch",
                            method: "POST",
                            data: {
                                board_id: board_id,
                                product_type: product_type,
                                brand_id: brand_id,
                                class_id: class_id
                            },
                            success: function(data) {
                                //console.log(data);
                                $('#batch').html(data);
                            }
                        });
                    }
                });
            });

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
                    url: base_url + 'get-counselling-board',
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

            <script type="text/javascript">
            $(document).ready(function() {
                $('.dateinput').datepicker({
                    format: "yyyy/mm/dd"
                });
            });
            </script>