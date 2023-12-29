<?php $course = $this->input->get('course');
$brandID = $this->input->get('brand');
$product_type = $this->input->get('product_type');
$board = $this->input->get('board');
$class = $this->input->get('class');
$batch = $this->input->get('batch');
$customer_rating = $this->input->get('customer_rating');
$date_posted = $this->input->get('date_posted');
$sort_by = $this->input->get('sort_by');
$comparison_id = count(explode(',', $this->input->get('brandID') ?? ''));
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
                        href="<?php echo base_url(); ?>complaint?course=<?php echo @$course; ?>&brand=<?php echo $brandID; ?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board; ?>&class=<?php echo $class; ?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Complaint
                    </a></li>
                <li class="active"><a
                        href="<?php echo base_url(); ?>comparison?course=<?php echo @$course; ?>&brand=<?php echo $brandID; ?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board; ?>&class=<?php echo $class; ?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Compare
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>counselling?course=<?php echo @$course; ?>&brand=<?php echo $brandID; ?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board; ?>&class=<?php echo $class; ?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Counselling
                    </a></li>
                <li><a
                        href="<?php echo base_url(); ?>cohort?course=<?php echo @$course; ?>&brand=<?php echo $brandID; ?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board; ?>&class=<?php echo $class; ?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Cohort</a>
                </li>
                <li><a
                        href="<?php echo base_url(); ?>review?course=<?php echo @$course; ?>&brand=<?php echo $brandID; ?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board; ?>&class=<?php echo $class; ?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Reviews
                        <?php //echo $review_count; 
                                                                                                                                                                                                                                                                                                                                                                                ?></a>
                </li>
                <li><a
                        href="<?php echo base_url(); ?>coupon?course=<?php echo @$course; ?>&brand=<?php echo $brandID; ?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board; ?>&class=<?php echo $class; ?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Coupons</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--banner end-->
<!--content start-->
<?php
   /* print_R(get_breadcrumb_value());
    exit;*/
?>
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
    <div class="container-fluid review-top-section">
        <div class="row review-top-next">
            <!--left start-->
            <div class="col-md-2 review-left">

                <h3 class="filter-title">Filter</h3>
                <div class="" id="sideleft-fix">
                    <form action="<?php echo base_url(); ?>comparison-search" method="POST">
                        <button type="button" class="filter-btn">Filter</button>
                        <!--left start-->
                        <!-- <div class="review-left">
                        <h3 class="filter-title">Filter</h3> -->
                        <?php echo csrf_field(); ?>
                        <div class="filter-col">
                            <h3 class="filter-col-title">BRAND</h3>
                            <div class="select-box">
                                <select name="brand" id="brand">
                                    <?php foreach ($brand_records as $brand) { ?>
                                    <option value="<?php echo $brand->brand_id; ?>" <?php if ($brand->brand_id == @$product_list['0']->brand_id) {
                                                                                        echo 'selected';
                                                                                    } ?>>
                                        <?php echo $brand->brand_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="filter-col">
                            <div class="btn-group btn-toggle filter-toggle-box">
                                <div class="input-toggle <?php if (@$product_list['0']->product_type == 1) {
                                                            echo 'active';
                                                        } ?>" id="online-toggle">
                                    <label>Online</label>
                                    <input class="btn btn-lg btn-default" type="radio" name="product_type" <?php if (@$product_list['0']->product_type == 1) {
                                                                                                            echo 'checked';
                                                                                                        } ?>
                                        id="online" value="1" onClick="prodcutType(1)">
                                </div>
                                <div class="input-toggle <?php if (@$product_list['0']->product_type == 2) {
                                                            echo 'active';
                                                        } ?>" id="offline-toggle">
                                    <label>Offline</label>
                                    <input class="btn btn-lg btn-primary active" type="radio" name="product_type" <?php if (@$product_list['0']->product_type == 2) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>
                                        id="offline" value="2" onClick="prodcutType(2)">
                                </div>
                            </div>
                            <!-- <p class="online-results">Showing <span>(2677)</span> Online Cohort results for BYJU’s</p> -->
                        </div>
                        <div class="filter-col">
                            <h3 class="filter-col-title">BOARD</h3>
                            <div class="select-box">
                                <select name="board" id="board">
                                    <?php foreach ($board_records as $boards) { ?>
                                    <option value="<?php echo $boards->board_id; ?>" <?php if ($boards->board_id == @$product_list['0']->board_id) {
                                                                                            echo 'selected';
                                                                                        } ?>>
                                        <?php echo $boards->board_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="filter-col">
                            <h3 class="filter-col-title">CLASS</h3>
                            <div class="select-box">
                                <select name="class" id="class">
                                    <?php foreach ($class_records as $classes) { ?>
                                    <option value="<?php echo $classes->class_id; ?>" <?php if ($classes->class_id == @$product_list['0']->class_id) {
                                                                                            echo 'selected';
                                                                                        } ?>>
                                        <?php echo $classes->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="filter-col">
                            <h3 class="filter-col-title">BATCH (Cohort) <span>Running Year</span></h3>
                            <div class="select-box">
                                <select name="batch" id="batch">
                                    <?php foreach ($batch_records as $batches) { ?>
                                    <option value="<?php echo $batches->batch_id; ?>" <?php if ($batches->batch_id == @$product_list['0']->batch_id) {
                                                                                            echo 'selected';
                                                                                        } ?>>
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
                </div>
                </form>
            </div>
            <!--left end-->
            <!--center start-->
            <div class="col-md-8">

                <div class="review-center">
                    <div class="review-btn-box">

                    </div>
                    <!-- <div class="review-btn-box">
                <button type="button" class="review-btn" data-bs-toggle="modal" data-bs-target="#compareModal"><img
                        src="<?php echo base_url(); ?>assets/images/review-icon2.png" alt=""> Add a brand to
                    compare</button>
            </div> -->
                    <div class="brand-add-box d-flex justify-content-center align-items-center">
                        <?php //print_ex($compare_list1); 
                ?>
                        <!--col-->
                        <?php if (!empty($compare_list1)) {
                    foreach ($compare_list1 as $comp_list1) { ?>
                        <div class="popular-col">
                            <a href="<?php echo $comp_list1->brand_slug; ?>">
                                <div class="popular-col-image"><img
                                        src="<?php echo base_url(); ?>uploads/brand/<?php echo $comp_list1->brand_image; ?>"
                                        alt="" /></div>
                                <h3><?php echo $comp_list1->brand_name; ?></h3>
                                <div>
                                    <?php if ($comp_list1->overall_ranking == 1) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <?php } ?>
                                    <?php if ($comp_list1->overall_ranking == 2) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <?php } ?>
                                    <?php if ($comp_list1->overall_ranking == 3) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <?php } ?>
                                    <?php if ($comp_list1->overall_ranking == 4) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star"></i>
                                    <?php } ?>
                                    <?php if ($comp_list1->overall_ranking >= 5) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i>
                                    <?php } ?>
                                </div>
                            </a>
                        </div>
                        <?php }
                } ?>
                        <!--col-->
                        <?php if (!empty($compare_list2)) {
                    foreach ($compare_list2 as $comp_list2) { ?>
                        <div class="popular-col">
                            <a href="<?php echo $comp_list2->brand_slug; ?>">
                                <div class="popular-col-image"><img
                                        src="<?php echo base_url(); ?>uploads/brand/<?php echo $comp_list2->brand_image; ?>"
                                        alt="" /></div>
                                <h3><?php echo $comp_list2->brand_name; ?></h3>
                                <div>
                                    <?php if ($comp_list2->overall_ranking == 1) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <?php } ?>
                                    <?php if ($comp_list2->overall_ranking == 2) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <?php } ?>
                                    <?php if ($comp_list2->overall_ranking == 3) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <?php } ?>
                                    <?php if ($comp_list2->overall_ranking == 4) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star"></i>
                                    <?php } ?>
                                    <?php if ($comp_list2->overall_ranking >= 5) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i>
                                    <?php } ?>
                                </div>
                            </a>
                        </div>
                        <?php }
                } ?>
                        <?php if (!empty($compare_list3)) {
                    foreach ($compare_list3 as $comp_list3) { ?>
                        <div class="popular-col">
                            <a href="<?php echo $comp_list3->brand_slug; ?>">
                                <div class="popular-col-image"><img
                                        src="<?php echo base_url(); ?>uploads/brand/<?php echo $comp_list3->brand_image; ?>"
                                        alt="" /></div>
                                <h3><?php echo $comp_list3->brand_name; ?></h3>
                                <div>
                                    <?php if ($comp_list3->overall_ranking == 1) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <?php } ?>
                                    <?php if ($comp_list3->overall_ranking == 2) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <?php } ?>
                                    <?php if ($comp_list3->overall_ranking == 3) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i>
                                    <?php } ?>
                                    <?php if ($comp_list3->overall_ranking == 4) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star"></i>
                                    <?php } ?>
                                    <?php if ($comp_list3->overall_ranking >= 5) { ?>
                                    <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i>
                                    <?php } ?>
                                </div>
                            </a>
                        </div>
                        <?php }
                } ?>
                        <?php if ($comparison_id >= 3) { ?>
                        <?php } else { ?>
                        <button type="button" class="add-brand-icon" data-bs-toggle="modal"
                            data-bs-target="#compareModal">
                            <img src="<?php echo base_url(); ?>assets/images/add-icon.png" alt="">
                            Add brand to compare
                        </button>
                        <?php } ?>
                    </div>
                    <div class="brand-review-table">
                        <table>
                            <tr>
                                <th colspan="4">Overall</th>
                            </tr>
                            <tr>
                                <td>Overall ratings</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td><span
                                        class="rating-number"><?php echo @$compare_list1[0]->overall_ranking; ?></span>
                                </td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td><span
                                        class="rating-number"><?php echo @$compare_list2[0]->overall_ranking; ?></span>
                                </td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td><span
                                        class="rating-number"><?php echo @$compare_list3[0]->overall_ranking; ?></span>
                                </td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <th colspan="4">Faculty</th>
                            </tr>
                            <tr>
                                <td>Faculty</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td><?php echo @$compare_list1[0]->faculty_quality; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td><?php echo @$compare_list2[0]->faculty_quality; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td><?php echo @$compare_list3[0]->faculty_quality; ?></td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <th colspan="4">Aging of Co.</th>
                            </tr>
                            <tr>
                                <td>Aging of Co.</td>
                                <?php if (!empty($compare_list1)) {
                            print_R($compare_list1);
                            ?>
                                <td><?php echo @$compare_list1[0]->course_complition; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td><?php echo @$compare_list2[0]->course_complition; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td><?php echo @$compare_list3[0]->course_complition; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th colspan="4">Academic Results</th>
                            </tr>
                            <tr>
                                <td>Academic Results</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td><?php echo @$compare_list1[0]->academic_results; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td><?php echo @$compare_list2[0]->academic_results; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td><?php echo @$compare_list3[0]->academic_results; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th colspan="4">Referral Score</th>
                            </tr>
                            <tr>
                                <td>Referral Score</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td><?php echo @$compare_list1[0]->referral_score; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td><?php echo @$compare_list2[0]->referral_score; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td><?php echo @$compare_list3[0]->referral_score; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th colspan="4">Complaint Score</th>
                            </tr>
                            <tr>
                                <td>Complaint Score</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td><?php echo @$compare_list1[0]->complaint_score; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td><?php echo @$compare_list2[0]->complaint_score; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td><?php echo @$compare_list3[0]->complaint_score; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th colspan="4">Market Reputation</th>
                            </tr>
                            <tr>
                                <td>Market Reputation</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td><?php echo @$compare_list1[0]->market_reputation; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td><?php echo @$compare_list2[0]->market_reputation; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td><?php echo @$compare_list3[0]->market_reputation; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th colspan="4">Edcohort Rating</th>
                            </tr>
                            <tr>
                                <td>Edcohort Rating</td>
                                <?php if (!empty($compare_list1)) { ?>
                                <td><?php echo @$compare_list1[0]->edcohort_rating; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list2)) { ?>
                                <td><?php echo @$compare_list2[0]->edcohort_rating; ?></td>
                                <?php } ?>
                                <?php if (!empty($compare_list3)) { ?>
                                <td><?php echo @$compare_list3[0]->edcohort_rating; ?></td>
                                <?php } ?>
                            </tr>


                        </table>
                    </div>
                </div>

                <!--center end-->

            </div>
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
                                been
                                the indus.....</p>
                        </div>
                        <div class="helpful-right">
                            <a href="#"
                                class="d-flex flex-wrap justify-content-center align-items-center text-center">Quick
                                Read<br /> 1 min</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--content end-->
            <!--wrapper end-->
            <!-- Modal -->
            <div class="modal fade compare-modal-box" id="compareModal" tabindex="-1"
                aria-labelledby="compareModalModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <h3 class="search-title">
                            <!--Search--> Brands to compare
                        </h3>
                        <input type="hidden" class="form-control" name="course" id="course" placeholder="Your Name"
                            value="<?php echo $course; ?>">
                        <input type="hidden" class="form-control" name="brand" id="brand" placeholder="Your Name"
                            value="<?php echo $brandID; ?>">
                        <input type="hidden" class="form-control" name="product_type" id="product_type"
                            placeholder="Your Name" value="<?php echo $product_type; ?>">
                        <input type="hidden" class="form-control" name="board" id="board" placeholder="Your Name"
                            value="<?php echo $board; ?>">
                        <input type="hidden" class="form-control" name="class" id="class" placeholder="Your Name"
                            value="<?php echo $class; ?>">
                        <input type="hidden" class="form-control" name="batch" id="batch" placeholder="Your Name"
                            value="<?php echo $batch; ?>">
                        <input type="hidden" class="form-control" name="customer_rating" id="customer_rating"
                            placeholder="Your Name" value="<?php echo $customer_rating; ?>">
                        <input type="hidden" class="form-control" name="date_posted" id="date_posted"
                            placeholder="Your Name" value="<?php echo $date_posted; ?>">
                        <input type="hidden" class="form-control" name="sort_by" id="sort_by" placeholder="Your Name"
                            value="<?php echo $sort_by; ?>">
                        <input type="hidden" class="form-control" name="segment" id="segment" placeholder="Your Name"
                            value="<?php echo $segment; ?>">

                        <!-- <div class="brand-search-box">
                <div class="search-result-col" id="search-1" style="display: none;"><a href="#"><img src="<?php echo base_url(); ?>assets/images/close3.png" alt=""></a></div>
                <div class="search-result-col" id="search-2" style="display: none;"> <a href="#"><img src="<?php echo base_url(); ?>assets/images/close3.png" alt=""></a></div>
                <div class="search-result-col" id="search-3" style="display: none;"> <a href="#"><img src="<?php echo base_url(); ?>assets/images/close3.png" alt=""></a></div>
                <input class="brand-search-input" type="text" placeholder="Ex.Vedantu, unacademy ">
            </div> -->
                        <div class="popular-row">
                            <!--col-->
                            <?php 
                            $res_brand_list = getseg_brand_list($segment);
                            ?>
                            <?php foreach ($res_brand_list as $brand) { ?>
                            <div class="popular-col">
                                <a href="javascript:void(0)"
                                    onclick="compare_brand('<?php echo $brand->brand_name; ?>','<?php echo $brand->brand_id; ?>')">
                                    <input type="checkbox" name="brand_select[]" id="brand_select"
                                        value="<?php echo $brand->brand_id; ?>"
                                        <?php if ($brand->brand_id == $brandID) { ?> checked <?php } ?>>
                                    <div class="popular-col-image"><img
                                            src="<?php echo base_url(); ?>uploads/brand/<?php echo $brand->brand_image; ?>">
                                    </div>
                                    <h3><?php echo $brand->brand_name; ?></h3>
                                    <!--<div class="popular-col-rating">
                                        <div class="popular-star-rating">
                                            <?php if ($brand->overall_ranking == 1) { ?>
                                            <i class="fa fa-star text-yellow"></i><i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i>
                                            <?php } ?>
                                            <?php if ($brand->overall_ranking == 2) { ?>
                                            <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i>
                                            <?php } ?>
                                            <?php if ($brand->overall_ranking == 3) { ?>
                                            <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i>
                                            <?php } ?>
                                            <?php if ($brand->overall_ranking == 4) { ?>
                                            <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i> <i
                                                class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star"></i>
                                            <?php } ?>
                                            <?php if ($brand->overall_ranking >= 5) { ?>
                                            <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i> <i
                                                class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i>
                                            <?php } ?>
                                        </div>
                                        <span class="rating-number">
                                            <img src="<?php echo base_url(); ?>assets/images/Star.png" alt="">
                                            <?php echo $brand->overall_ranking; ?></span>
                                    </div> -->
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="compare-info">
                            <div class="compare-info-left">You can compare maximum 3 brands</div>
                            <div class="compare-info-right"><span id="selectCount">0</span> of 3 selected</div>
                            <div class="compare-info-left-error" id="compare-info-left-error"
                                style="color:red; display: none;">
                                You can compare maximum only 3 brands</div>
                        </div>
                        <a href="javascript:void(0)" class="confirm-btn" id="compareBtn">Compare</a>
                    </div>
                </div>
            </div>
            <!--libs-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
            <!--plugin js-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous">
            </script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/ScrollToFixed/1.0.8/jquery-scrolltofixed-min.js'>
            </script>
            <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
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

            function viewRepliesAll(val) {
                if ($('.review_reply_' + val).css('display') == 'none') {
                    $('.review_reply_' + val).css('display', 'block');
                } else {
                    $('.review_reply_' + val).css('display', 'none');
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
                                location.reload();
                            }, 3000);

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


            //   window.onscroll = function() {myFunction()};

            // var header = document.getElementById("sideleft-fix");
            // var sticky = header.offsetTop;

            // function myFunction() {
            //   if (window.pageYOffset > sticky) {
            //     header.classList.add("sticky");
            //   } else {
            //     header.classList.remove("sticky");
            //   }
            // }

            $('#compareBtn').click(function() {
                var numberChecked = $("input[name='brand_select[]']:checked").length;
                //alert(numberChecked);
                if (numberChecked > 3) {
                    //alert(numberChecked);
                    $("#compare-info-left-error").show();
                } else {
                    $("#compare-info-left-error").hide();
                    var srs = [];
                    $("input[name='brand_select[]']:checked").each(function() {
                        //alert( $(this).val() );
                        srs.push($(this).val());
                    });
                    // alert(srs);
                    var brandID = srs.toString();
                    var course = $('#course').val();
                    var brand = $('#brand').val();
                    var product_type = $('#product_type').val();
                    var board = $('#board').val();
                    var classid = $('#class').val();
                    var batch = $('#batch').val();
                    var customer_rating = $('#customer_rating').val();
                    var date_posted = $('#date_posted').val();
                    var sort_by = $('#sort_by').val();
                    var segment = $('#segment').val();
                    window.location = base_url + 'comparison?brandID=' + brandID + '&course=' + course +
                        '&brand=' +
                        brand + '&product_type=' + product_type + '&board=' + board + '&classid=' +
                        classid +
                        '&batch=' + batch + '&customer_rating=' + customer_rating + '&date_posted=' +
                        date_posted + '&segment=' + segment ;
                    //    $.ajax({
                    //         url:"<?php echo base_url(); ?>comparison-search",
                    //         method:"POST",
                    //         data:{brandID:brandID},
                    //         success:function(data)
                    //         {
                    //             $('#batch').html(data);
                    //         }
                    //     });
                }
            });
            </script>


            <script type="text/javascript">
            var count = 0;

            function compare_brand(name, id) {
                //count++;
                // alert(count);
                if (count < 3) {
                    $("input[name='brand_select[]']:checked").on('change', function() {
                        var $el = $(this);
                        if ($el.prop('checked')) {
                            count++;
                            $('#selectCount').html("");
                            $('#selectCount').html("<span>" + count + "</span>");
                            //alert(count);

                            // $('#search-'+count+'').append("<p>"+name+"</p>");  
                            // $('#search-'+count+'').show(); 
                        } else {
                            count--;
                            // $('#search-'+count+'').append();  
                            // $('#search-'+count+'').hide(); 
                            $('#selectCount').html("");
                            $('#selectCount').html("<span>" + count + "</span>");
                        }
                    });
                } else {
                    $('#compare-info-left-error').show();
                }
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