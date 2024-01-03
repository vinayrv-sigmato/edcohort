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
<div class="inner-banner d-flex">
    <div class="col-md-3 col-sm-12 breadcrumb-design">

        <div class="breadcrumb">
            <ul>
                <li>Home</li>
                <li><?php echo @$product_list['0']->brand_name; ?></li>
                <li><a href="#"><?php echo @$product_list['0']->product_name; ?></a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-9 col-sm-12">

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
                <li class="active"><a
                        href="<?php echo base_url(); ?>cohort?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Cohort
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>review?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Reviews
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>coupon?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Coupons
                    </a></li>
            </ul>
        </div>
    </div>
</div>
<!--banner end-->

<!--content start-->
<div class="content">

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
        <?php //print_ex($product_list); ?>
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
                <!--left end-->
                <div class="col-md-8">
                    <!--center start-->
                    <div class="review-center p-3">
                        <?php echo message(); ?>
                        <?php if($this->session->userdata('user_id')){ ?>
                        <div class="review-btn-box">
                            <a href="<?php echo base_url(); ?>create-cohort?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>"
                                class="review-btn"> <img src="<?php echo base_url();?>assets/images/review-icon2.png"
                                    alt="">
                                Create a discussion</a>
                        </div>
                        <?php }else{ ?>

                        <a href="javascript:void(0)" class="review-btn" data-bs-effect="effect-scale"
                            data-bs-toggle="modal" data-bs-target="#login-button"> <img
                                src="<?php echo base_url();?>assets/images/review-icon2.png" alt=""> Create a
                            discussion</a>
                        <?php } ?>



                        <!-- <div class="select-filter-box">
                <ul class="select-filter">
                    <li>ICSE <a href="#"><img src="<?php echo base_url();?>assets/images/close.png" alt=""></a></li>
                    <li>10th Standard <a href="#"><img src="<?php echo base_url();?>assets/images/close.png" alt=""></a></li>
                    <li>Exam 2022-23 SEPT <a href="#"><img src="<?php echo base_url();?>assets/images/close.png" alt=""></a></li>
                </ul>
                <a href="#" class="clear-btn">Clear filter selection</a>
            </div> -->

                        <?php if($group_list){ ?>

                        <div class="across-row mt-2">
                            <h2 class="across-title">Connect with students from your class across all brands</h2>

                            <div class="across-col-box d-flex justify-content-between">
                                <?php //print_ex($group_list);
                        $i = 1;
                    foreach($group_list as $group){ 
                            if($i == 1){
                        ?>
                                <!--left-->
                                <div class="across-left">
                                    <div class="standard-box">
                                        <div class="standard-content">
                                            <div class="standard-header">
                                                <?php echo  $group->board_name.' : '.$group->title.' : '.$group->batch_name; ?>
                                            </div>
                                            <p><img src="<?php echo base_url();?>assets/images/group.png" alt="" /></p>
                                            <div class="standard-header"><?php echo  $group->title.' : '.$group->tag; ?>
                                            </div>
                                        </div>
                                        <?php if($this->session->userdata('user_id')){ ?>
                                        <a href="<?php echo base_url(); ?>cohort-group/<?php echo $group->cg_id;?>">
                                            <div class="standard-footer"><button type="button"
                                                    class="join-btn">Join</button>
                                            </div>
                                        </a>
                                        <?php }else{ ?>

                                        <a href="javascript:void(0)" class="standard-footer"
                                            data-bs-effect="effect-scale" data-bs-toggle="modal"
                                            data-bs-target="#login-button">
                                            <div class="standard-footer"><button type="button"
                                                    class="join-btn">Join</button>
                                            </div>
                                        </a>
                                        <?php } ?>
                                    </div>

                                </div>
                                <?php } $i++; } ?>
                                <!--right-->
                                <div class="across-right">

                                    <h3 class="room-title">Trending Rooms</h3>
                                    <ul class="room-list-box">
                                        <?php //print_ex($group_list);
                            $j = 1;
                        foreach($group_list as $group){ 
                                if($j == 2 || $j == 3 || $j == 4){
                            ?>
                                        <li class="room-list">

                                            <?php if($this->session->userdata('user_id')){ ?>
                                            <a href="<?php echo base_url(); ?>view-cohort-group/<?php echo $group->cg_id;?>"
                                                class="anchor"></a><span><?php echo $group->tag; ?></span>
                                            <?php }else{ ?>

                                            <a href="javascript:void(0)" class="standard-footer anchor"
                                                data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                data-bs-target="#login-button"></a><span><?php echo $group->tag; ?></span>
                                            <?php } ?>

                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <img src="<?php echo base_url();?>assets/images/dotts.png" alt="">
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <!-- <li><a class="dropdown-item" href="#">Mute</a></li> -->
                                                    <li><a class="dropdown-item"
                                                            href="<?php echo base_url(); ?>leave-group/<?php echo $group->cg_id;?>">Leave</a>
                                                    </li>
                                                    <!-- <li><a class="dropdown-item" href="#">Publish in General</a></li> -->
                                                    <li>
                                                        <div class="sharethis-inline-share-buttons"></div>
                                                    </li>
                                                    <!-- <li><a class="dropdown-item" href="#">Pin to top</a></li> -->
                                                </ul>
                                            </div>
                                        </li>
                                        <?php } $j++; } ?>
                                    </ul>

                                </div>

                            </div>

                        </div>


                        <div class="across-row">
                            <h2 class="across-title"><span>#</span> Ongoing discussion</h2>

                            <ul class="room-list-box discussion-room-list d-flex flex-wrap justify-content-between">
                                <?php //print_ex($ongoing_group_list);
                            $k = 1;
                    foreach($ongoing_group_list as $ongoinggroup){ 
                       // if($k > 5){
                            ?>
                                <li class="room-list">
                                    <?php if($this->session->userdata('user_id')){ ?>
                                    <a href="<?php echo base_url(); ?>view-cohort-group/<?php echo $ongoinggroup->cg_id;?>"
                                        class="anchor"></a>
                                    <span><?php echo $ongoinggroup->tag; ?></span>
                                    <?php }else{ ?>

                                    <a href="javascript:void(0)" class="standard-footer anchor"
                                        data-bs-effect="effect-scale" data-bs-toggle="modal"
                                        data-bs-target="#login-button"></a>
                                    <span><?php echo $group->tag; ?></span>
                                    <?php } ?>

                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="<?php echo base_url();?>assets/images/dotts.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <!-- <li><a class="dropdown-item" href="#">Mute</a></li> -->
                                            <li><a class="dropdown-item"
                                                    href="<?php echo base_url(); ?>leave-group/<?php echo $group->cg_id;?>">Leave</a>
                                            </li>
                                            <!-- <li><a class="dropdown-item" href="#">Publish in General</a></li> -->
                                            <li>
                                                <div class="sharethis-inline-share-buttons"></div>
                                            </li>
                                            <!-- <li><a class="dropdown-item" href="#">Pin to top</a></li> -->
                                        </ul>
                                    </div>
                                </li>
                                <?php } $k++; //} ?>

                                <?php if($this->session->userdata('user_id')){ ?>
                                <li class="room-list btn-room-list">
                                    <a href="<?php echo base_url(); ?>create-cohort?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>"
                                        class="discussion-btn"> <img
                                            src="<?php echo base_url();?>assets/images/review-icon2.png" alt=""> Create
                                        a
                                        discussion</a>
                                </li>
                                <?php }else{ ?>
                                <li class="room-list btn-room-list">
                                    <a href="javascript:void(0)" class="discussion-btn" data-bs-effect="effect-scale"
                                        data-bs-toggle="modal" data-bs-target="#login-button">Create a discussion</a>
                                </li>
                                <?php } ?>

                            </ul>

                        </div>

                        <?php }else{ echo "<div class='across-row'><h3>No Cohort Found..!</h3></div>"; } ?>

                    </div>
                </div>
                <!--center end-->


                <!--right start-->
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

                <!--right end-->

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
                                been the indus.....</p>
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
                    url: "<?php echo base_url(); ?>get-cohort-class",
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
                    url: "<?php echo base_url(); ?>get-cohort-board",
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
                    url: "<?php echo base_url(); ?>get-cohort-class",
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
                    url: "<?php echo base_url(); ?>get-cohort-batch",
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
            url: base_url + 'get-cohort-board',
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