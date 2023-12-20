<?php 
$course = $this->input->get('course'); 
$brandID = $this->input->get('brand');
$product_type = $this->input->get('product_type');
$board = $this->input->get('board');
$class = $this->input->get('class');
$batch = $this->input->get('batch');
$customer_rating = $this->input->get('customer_rating');
$date_posted = $this->input->get('date_posted');
$sort_by = $this->input->get('sort_by');
?>
<!--banner start-->
<div class="banner">
    <div class="container">
        <h1>Got something to say?</h1>
        <p>We are here to listen!</p>
        <?php if($this->session->userdata('user_id')){ ?>
         <a href="<?php echo base_url();?>write-a-review?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>" class="banner-btn"><img src="<?php echo base_url(); ?>assets/images/review-icon.png" alt="" /> Write a review
         </a>
     <?php } else{ ?>
         <a href="javascript:void(0)" class="banner-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button">
           <img src="<?php echo base_url();?>assets/images/review-icon2.png" alt="" >Write a review
       </a>
   <?php } ?>
   <!-- <a href="#" class="banner-btn"><img src="<?php echo base_url(); ?>assets/images/review-icon.png" alt="" /> Write a review</a> -->
</div>
</div>
<!--banner end-->
<!--content start-->
<div class="content">

    <!--start-->
    <div class="course-box">
        <div class="container">

            <h1 class="section-title text-center">Choose your course</h1>

            <div class="d-flex justify-content-between align-items-center">
               <?php foreach($class_records as $class){ ?>
                <!--col start-->
                <div class="course-col d-flex justify-content-center align-items-center text-center">
                    <a href="<?php echo base_url(); ?>?course=<?php echo $class->class_id; ?>">
                        <div class="course-col-image"><?php echo $class->class_image; ?></div>
                        <p><?php echo $class->title; ?></p>
                    </a>
                </div>
                <!--col end-->
            <?php } ?>       

        </div>

    </div>
</div>
<!--end-->

<?php $courseid = $this->input->get('course'); 
if(empty($courseid)){
	?>
    <!-- Overlay image -->

    <div class="over-lay text-center">
        <div class="course-category-overlay">
            <div class="text-over-lay">
                <svg width="36" height="41" viewBox="0 0 36 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.8333 3.00033L17.8333 37.667M33 18.167L17.8333 3.00033L2.66667 18.167" stroke="#E8F9FD" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h2>Please select your course catagory for curated view</h2>
                <span>You can change this later anytime</span>
            </div>
        </div>
        <!-- <img src="<?php echo base_url(); ?>assets/images/over-image.png"> -->
        <div class="course-row article-section" id="Popular-Brands">
            <div class="course-inner-row">
                <div class="popular-row">
                    <!--col-->
                    <div class="popular-col">
                        <a href="#">
                            <div class="popular-col-image">
                                <img src="<?php echo base_url(); ?>/uploads/brand/084303700_1650530610.jpg" width="50" alt="Buyjs">
                            </div>
                            <h3>Buyjs</h3>
                            <div class="popular-col-rating">
                                <div class="popular-star-rating">
                                    <i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i> 
                                    <i class="fa fa-star"></i> 
                                    <i class="fa fa-star"></i> 
                                    <i class="fa fa-star"></i>
                                </div>
                                <span class="rating-number">
                                    <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2</span>
                                </div>
                            </a>
                        </div>
                        <!--col-->
                        <div class="popular-col">
                            <a href="#">
                                <div class="popular-col-image">
                                    <img src="<?php echo base_url(); ?>/uploads/brand/066533300_1650530932.png" width="50" alt="Career point">
                                </div>
                                <h3>Career point</h3>
                                <div class="popular-col-rating">
                                    <div class="popular-star-rating">
                                        <i class="fa fa-star text-yellow"></i>
                                        <i class="fa fa-star text-yellow"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span class="rating-number">
                                        <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2</span>
                                    </div>
                                </a>
                            </div>
                            <!--col-->
                            <div class="popular-col">
                                <a href="#">
                                    <div class="popular-col-image">
                                        <img src="<?php echo base_url(); ?>/uploads/brand/002345000_1650531005.png" width="50" alt="Safalta">
                                    </div>
                                    <h3>Safalta</h3>
                                    <div class="popular-col-rating">
                                        <div class="popular-star-rating">
                                            <i class="fa fa-star text-yellow"></i>
                                            <i class="fa fa-star text-yellow"></i> 
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <span class="rating-number">
                                            <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2</span>
                                        </div>
                                    </a>
                                </div>
                                <!--col-->
                                <div class="popular-col">
                                    <a href="#">
                                        <div class="popular-col-image">
                                            <img src="<?php echo base_url(); ?>/uploads/brand/065041600_1650530864.jpg" width="50" alt="Unacademy">
                                        </div>
                                        <h3>Unacademy </h3>
                                        <div class="popular-col-rating">
                                            <div class="popular-star-rating">
                                                <i class="fa fa-star text-yellow"></i>
                                                <i class="fa fa-star text-yellow"></i> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <span class="rating-number">
                                                <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2</span>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col-->
                                    <div class="popular-col">
                                        <a href="#">
                                            <div class="popular-col-image">
                                                <img src="<?php echo base_url(); ?>/uploads/brand/082543200_1650531102.png" width="50" alt="Adda247">
                                            </div>
                                            <h3>
                                            Adda247                        </h3>
                                            <div class="popular-col-rating">
                                                <div class="popular-star-rating">
                                                    <i class="fa fa-star text-yellow"></i>
                                                    <i class="fa fa-star text-yellow"></i> 
                                                    <i class="fa fa-star"></i> 
                                                    <i class="fa fa-star"></i> 
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <span class="rating-number">
                                                    <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2</span>
                                                </div>
                                            </a>
                                        </div>
                                        <!--col-->
                                        <div class="popular-col">
                                            <a href="#">
                                                <div class="popular-col-image">
                                                    <img src="<?php echo base_url(); ?>/uploads/brand/073155400_1650531207.png" width="50" alt="Exampur">
                                                </div>
                                                <h3>
                                                Exampur                        </h3>
                                                <div class="popular-col-rating">
                                                    <div class="popular-star-rating">
                                                        <i class="fa fa-star text-yellow"></i>
                                                        <i class="fa fa-star text-yellow"></i> 
                                                        <i class="fa fa-star"></i> 
                                                        <i class="fa fa-star"></i> 
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <span class="rating-number">
                                                        <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <!--col-->
                                            <div class="popular-col">
                                                <a href="#">
                                                    <div class="popular-col-image">
                                                        <img src="<?php echo base_url(); ?>/uploads/brand/065112400_1650531318.png" width="50" alt="Career launcher">
                                                    </div>
                                                    <h3>
                                                    Career launcher                        </h3>
                                                    <div class="popular-col-rating">
                                                        <div class="popular-star-rating">
                                                            <i class="fa fa-star text-yellow"></i>
                                                            <i class="fa fa-star text-yellow"></i> 
                                                            <i class="fa fa-star"></i> 
                                                            <i class="fa fa-star"></i> 
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <span class="rating-number">
                                                            <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <!--col-->
                                                <div class="popular-col">
                                                    <a href="#">
                                                        <div class="popular-col-image">
                                                            <img src="<?php echo base_url(); ?>/uploads/brand/045179100_1650531407.png" width="50" alt="TIME">
                                                        </div>
                                                        <h3>
                                                        TIME                        </h3>
                                                        <div class="popular-col-rating">
                                                            <div class="popular-star-rating">
                                                                <i class="fa fa-star text-yellow"></i>
                                                                <i class="fa fa-star text-yellow"></i> 
                                                                <i class="fa fa-star"></i> 
                                                                <i class="fa fa-star"></i> 
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <span class="rating-number">
                                                                <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <!--col-->
                                                    <div class="popular-col">
                                                        <a href="#">
                                                            <div class="popular-col-image">
                                                                <img src="<?php echo base_url(); ?>/uploads/brand/052746400_1650538170.png" width="50" alt="Career Power">
                                                            </div>
                                                            <h3>
                                                            Career Power                        </h3>
                                                            <div class="popular-col-rating">
                                                                <div class="popular-star-rating">
                                                                    <i class="fa fa-star text-yellow"></i>
                                                                    <i class="fa fa-star text-yellow"></i> 
                                                                    <i class="fa fa-star"></i> 
                                                                    <i class="fa fa-star"></i> 
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                                <span class="rating-number">
                                                                    <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2</span>
                                                                </div>
                                                            </a>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!--start-->
                                    <div class="all-course-box">

                                        <!--left start-->
                                        <div class="course-left article-sidebar js-sidebar-menu">
                                            <ul class="article-sidebar-menu js-navigation-list">
                                               <?php if(!empty($courseid)){?>
                                                <li><a href="#Popular-Brands" class="js-navigation-item active">Popular Brands</a></li>
                                                <li><a href="#Popular-Courses" class="js-navigation-item">Popular courses</a></li>
                                            <?php } ?>
                                            <li><a href="#Review" class="js-navigation-item <?php if(empty($courseid)){ echo 'active'; }?>">Review</a></li>
                                            <li><a href="#Complain" class="js-navigation-item">Complain</a></li>
                                            <li><a href="#Compare" class="js-navigation-item">Compare</a></li>
                                            <li><a href="#Counselling" class="js-navigation-item">Counselling</a></li>
                                            <li><a href="#Cohort" class="js-navigation-item">Cohort</a></li>
                                            <li><a href="#Coupons" class="js-navigation-item">Coupons</a></li>
                                        </ul>
                                    </div>
                                    <!--left end-->





                                    <!--right start-->
                                    <div class="course-right">
                                       <?php if(!empty($courseid)){?>
                                        <!--row start-->
                                        <div class="course-row article-section" id="Popular-Brands">
                                            <div class="course-inner-row">

                                                <div class="course-section-title">
                                                    <h2>Popular Brands</h2>
                                                    <p>Got the course, but worried about the brand?<br/>
                                                    Read about all brands and their offerings here.</p>
                                                </div>

                                                <div class="popular-row">
                                                 <?php foreach($brand_records as $brand){?>
                                                    <!--col-->
                                                    <div class="popular-col">
                                                        <a href="#">
                                                            <div class="popular-col-image">
                                                                <img src="<?php echo base_url(); ?>uploads/brand/<?php echo $brand->brand_image; ?>" width="50" alt="<?php echo $brand->brand_name; ?>">
                                                            </div>
                                                            <h3>
                                                                <?php echo $brand->brand_name; ?>
                                                            </h3>
                                                            <div class="popular-col-rating">
                                                                <div class="popular-star-rating">
                                                                    <i class="fa fa-star text-yellow"></i>
                                                                    <i class="fa fa-star text-yellow"></i> 
                                                                    <i class="fa fa-star"></i> 
                                                                    <i class="fa fa-star"></i> 
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                                <span class="rating-number">
                                                                    <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    <?php } ?>

                                                </div>

                                                <div class="see-row"><a href="<?php echo base_url(); ?>brands">See all <img src="<?php echo base_url(); ?>assets/images/see-arrow.png" alt="" /></a></div>

                                            </div>
                                        </div>
                                        <!--row end-->

                                        <!--row start-->
                                        <div class="course-row article-section" id="Popular-Courses">
                                            <div class="course-inner-row">

                                                <div class="course-section-title">
                                                    <h2>Popular Courses</h2>
                                                    <p>Got the course, but worried about the brand?<br/>
                                                    Read about all brands and their offerings here.</p>
                                                </div>

                                                <div class="popular-row">
                                                 <?php foreach($courses_records as $course){?>
                                                    <!--col-->
                                                    <div class="popular-col">
                                                        <a href="<?php echo base_url(); ?>review?course=<?php echo $course->product_id; ?>">
                                                            <div class="popular-col-image">
                                                                <img src="<?php echo base_url(); ?><?php echo $course->image_show; ?>" alt="<?php echo $course->product_name; ?>" width="50">
                                                            </div>
                                                            <h3>
                                                                <?php echo $course->product_name; ?>
                                                            </h3>
                                                            <div class="popular-col-rating">
                                                                <div class="popular-star-rating">
                                                                	<?php if($course->product_rating == 1){ ?>
                                                                        <i class="fa fa-star text-yellow"></i>
                                                                        <i class="fa fa-star"></i> 
                                                                        <i class="fa fa-star"></i> 
                                                                        <i class="fa fa-star"></i> 
                                                                        <i class="fa fa-star"></i>
                                                                    <?php } ?>
                                                                    <?php if($course->product_rating == 2){ ?>
                                                                        <i class="fa fa-star text-yellow"></i>
                                                                        <i class="fa fa-star text-yellow"></i> 
                                                                        <i class="fa fa-star"></i> 
                                                                        <i class="fa fa-star"></i> 
                                                                        <i class="fa fa-star"></i>
                                                                    <?php } ?>
                                                                    <?php if($course->product_rating == 3){ ?>
                                                                        <i class="fa fa-star text-yellow"></i>
                                                                        <i class="fa fa-star text-yellow"></i> 
                                                                        <i class="fa fa-star text-yellow"></i> 
                                                                        <i class="fa fa-star"></i> 
                                                                        <i class="fa fa-star"></i>
                                                                    <?php } ?>
                                                                    <?php if($course->product_rating == 4){ ?>
                                                                        <i class="fa fa-star text-yellow"></i>
                                                                        <i class="fa fa-star text-yellow"></i> 
                                                                        <i class="fa fa-star text-yellow"></i> 
                                                                        <i class="fa fa-star text-yellow"></i> 
                                                                        <i class="fa fa-star"></i>
                                                                    <?php } ?>
                                                                    <?php if($course->product_rating == 5){ ?>
                                                                        <i class="fa fa-star text-yellow"></i>
                                                                        <i class="fa fa-star text-yellow"></i> 
                                                                        <i class="fa fa-star text-yellow"></i> 
                                                                        <i class="fa fa-star text-yellow"></i>  
                                                                        <i class="fa fa-star text-yellow"></i> 
                                                                    <?php } ?>                                                                   
                                                                </div>
                                                                <span class="rating-number">
                                                                    <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt=""><?php echo $course->product_rating; ?></span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <!--col-->
                                                    <?php } ?>

                                                </div>

                                                <div class="see-row"><a href="<?php echo base_url(); ?>course">See all <img src="<?php echo base_url(); ?>assets/images/see-arrow.png" alt="" /></a></div>

                                            </div>
                                        </div>
                                        <!--row end-->
                                    <?php } ?>

                                    <!--row start-->
                                    <div class="course-row article-section" id="Review">
                                        <div class="course-inner-row">

                                            <div class="course-section-title">
                                                <h2>Review</h2>
                                            </div>

                                            <div class="video-row d-flex justify-content-between">

                                                <div class="video-content">
                                                    <p>Thousands of people, everyday, make a career choice their friend has made. In this world full of trials and errors, we dived deep to find out how mentoring and well planned out career choices has and can help any individual hit their goals and achieve their ambitions as planned.</p>
                                                    <p>We have prepared an analytics driven real life case study here, find out how it can work for you too!</p>
                                                </div>

                                                <div class="video-box">
                                                    <img src="<?php echo base_url(); ?>assets/images/video.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!--row end-->


                                    <!--row start-->
                                    <div class="course-row article-section" id="Complain">
                                        <div class="course-inner-row">

                                            <div class="course-section-title">
                                                <h2>Complain</h2>
                                            </div>

                                            <div class="video-row d-flex justify-content-between">

                                                <div class="video-content">
                                                    <p>Thousands of people, everyday, make a career choice their friend has made. In this world full of trials and errors, we dived deep to find out how mentoring and well planned out career choices has and can help any individual hit their goals and achieve their ambitions as planned.</p>
                                                    <p>We have prepared an analytics driven real life case study here, find out how it can work for you too!</p>
                                                </div>

                                                <div class="video-box">
                                                    <img src="<?php echo base_url(); ?>assets/images/video.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!--row end-->


                                    <!--row start-->
                                    <div class="course-row article-section" id="Compare">
                                        <div class="course-inner-row">

                                            <div class="course-section-title">
                                                <h2>Compare</h2>
                                            </div>

                                            <div class="video-row d-flex justify-content-between">

                                                <div class="video-content">
                                                    <p>Thousands of people, everyday, make a career choice their friend has made. In this world full of trials and errors, we dived deep to find out how mentoring and well planned out career choices has and can help any individual hit their goals and achieve their ambitions as planned.</p>
                                                    <p>We have prepared an analytics driven real life case study here, find out how it can work for you too!</p>
                                                </div>

                                                <div class="video-box">
                                                    <img src="<?php echo base_url(); ?>assets/images/video.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!--row end-->


                                    <!--row start-->
                                    <div class="course-row article-section" id="Counselling">
                                        <div class="course-inner-row">

                                            <div class="course-section-title">
                                                <h2>Counselling</h2>
                                            </div>

                                            <div class="video-row d-flex justify-content-between">

                                                <div class="video-content">
                                                    <p>Thousands of people, everyday, make a career choice their friend has made. In this world full of trials and errors, we dived deep to find out how mentoring and well planned out career choices has and can help any individual hit their goals and achieve their ambitions as planned.</p>
                                                    <p>We have prepared an analytics driven real life case study here, find out how it can work for you too!</p>
                                                </div>

                                                <div class="video-box">
                                                    <img src="<?php echo base_url(); ?>assets/images/video.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!--row end-->

                                    <!--row start-->
                                    <div class="course-row article-section" id="Cohort">
                                        <div class="course-inner-row">

                                            <div class="course-section-title">
                                                <h2>Cohort</h2>
                                            </div>

                                            <div class="video-row d-flex justify-content-between">

                                                <div class="video-content">
                                                    <p>Thousands of people, everyday, make a career choice their friend has made. In this world full of trials and errors, we dived deep to find out how mentoring and well planned out career choices has and can help any individual hit their goals and achieve their ambitions as planned.</p>
                                                    <p>We have prepared an analytics driven real life case study here, find out how it can work for you too!</p>
                                                </div>

                                                <div class="video-box">
                                                    <img src="<?php echo base_url(); ?>assets/images/video.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!--row end-->


                                    <!--row start-->
                                    <div class="course-row article-section" id="Coupons">
                                        <div class="course-inner-row">

                                            <div class="course-section-title">
                                                <h2>Coupons</h2>
                                            </div>

                                            <div class="video-row d-flex justify-content-between">

                                                <div class="video-content">
                                                    <p>Thousands of people, everyday, make a career choice their friend has made. In this world full of trials and errors, we dived deep to find out how mentoring and well planned out career choices has and can help any individual hit their goals and achieve their ambitions as planned.</p>
                                                    <p>We have prepared an analytics driven real life case study here, find out how it can work for you too!</p>
                                                </div>

                                                <div class="video-box">
                                                    <img src="<?php echo base_url(); ?>assets/images/video.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!--row end-->


                                    <!--row start-->
                                    <div class="course-row article-section" id="Mentoring">
                                        <div class="course-inner-row">

                                            <div class="video-row d-flex justify-content-between">

                                                <div class="video-content">
                                                    <div class="course-section-title">
                                                        <h2>Mentoring Works! Read how</h2>
                                                    </div>

                                                    <p>Thousands of people, everyday, make a career choice their friend has made. In this world full of trials and errors, we dived deep to find out how mentoring and well planned out career choices has and can help any individual hit their goals and achieve their ambitions as planned.</p>
                                                    <p>We have prepared an analytics driven real life case study here, find out how it can work for you too!</p>
                                                </div>

                                                <div class="video-box">
                                                    <img src="<?php echo base_url(); ?>assets/images/work-image.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!--row end-->


                                </div>
                                <!--right end-->

                            </div>
                            <!--end-->



                        </div>
<!--content end