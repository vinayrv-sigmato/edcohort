<!--banner start-->
<div class="banner">
<div class="container">
    <h1>Got something to say?</h1>
    <p>We are here to listen!</p>
    <a href="#" class="banner-btn"><img src="<?php echo base_url(); ?>assets/images/review-icon.png" alt="" /> Write a review</a>
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
        <img src="<?php echo base_url(); ?>assets/images/over-image.png">
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
                                <img src="https://edcohort.sarvajeetsingh.com/dev/assets/images/Star.png" alt="">3.2</span>
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
                                    <i class="fa fa-star text-yellow"></i>
                                    <i class="fa fa-star text-yellow"></i> 
                                    <i class="fa fa-star"></i> 
                                    <i class="fa fa-star"></i> 
                                    <i class="fa fa-star"></i>
                                </div>
                                    <span class="rating-number">
                                        <img src="https://edcohort.sarvajeetsingh.com/dev/assets/images/Star.png" alt="">3.2</span>
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