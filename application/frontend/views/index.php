<?php
$course = $this->input->get('segment');
$brandID = $this->input->get('brand');
$product_type = $this->input->get('product_type');
$board = $this->input->get('board');
$class = $this->input->get('class');
$batch = $this->input->get('batch');
$customer_rating = $this->input->get('customer_rating');
$date_posted = $this->input->get('date_posted');
$sort_by = $this->input->get('sort_by');
?>
<!-- adding owl.carousel.css CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
    integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- adding owl.theme.default.css CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
    integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
/* Your existing styles */
.pt-5 {
    padding-top: 5px;
}

.logo-content {
    text-align: center;
}

.logo-slider {
    width: 100%;
    overflow: hidden;
}

.logo-slide-track {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.slide {
    flex: 0 0 auto;
    margin-right: 15px;
    /* Adjust as needed */
}

.top-brands img {
    max-width: 100%;
    height: auto;
}

/* Responsive styles for smaller screens */
@media (max-width: 768px) {
    .pt-5 {
        padding-top: 10px;
        /* Adjust as needed */
    }

    .logo-content h2 {
        font-size: 1.5em;
        /* Adjust as needed */
    }

    .logo-slide-track {
        flex-wrap: nowrap;
        height: 176px
    }

    .top-brands img {

        max-width: 50%;

        /* Adjust as needed */
    }

    .how-section1 .subheading {
        font-size: 18px;

    }

    .img-sub-heading {
        font-size: 16px;
    }
}

@media (min-width: 786px) and (max-width: 1024px) {
    .img-sub-heading {
        font-size: 16px;
    }



    .how-section1 .subheading {
        font-size: 16px;

    }
}
</style>


<!--banner start-->
<!-- <div class="banner">
    <div class="container pt-5">
        <h1>Got something to say?</h1>
        <h1>We Are Here to Listen..</h1>
        <p class='w-50 text-dark'>In our educational world, knowledge meets technology. Discover 'Expert Insights,'
            'Side-by-Side' comparisons, 'User Experiences,' and 'Issues & Solutions.' Your guide to 'Top-Rated'
            resources, a 'Resource Hub' for all things education, 'Trends & Analysis,' 'Student Stories,' 'Educational
            Choices,' and 'In-Depth Info.' Join us on a journey to elevate your learning experience!</p>
        <?php if ($this->session->userdata('user_id')) { ?>
        <a href="<?php echo base_url(); ?>write-a-review?course=<?php echo @$course; ?>&brand=<?php echo $brandID; ?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board; ?>&class=<?php echo $class; ?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>"
            class="banner-btn"><img src="<?php echo base_url(); ?>assets/images/review-icon.png" alt="" /> Write a
            review
        </a>
        <?php } else { ?>
        <a href="javascript:void(0)" class="banner-btn" data-bs-effect="effect-scale" data-bs-toggle="modal"
            data-bs-target="#login-button">
            <img src="<?php echo base_url(); ?>assets/images/review-icon2.png" alt="">Write a review
        </a>
        <?php } ?> -->
<!-- <a href="#" class="banner-btn"><img src="<?php echo base_url(); ?>assets/images/review-icon.png" alt="" /> Write a review</a> -->
<!-- </div>
</div> -->
<!--banner end-->
<!--Logo Sectiont-->
<!-- imageCarousell -->


<div id="imageCarousel" class="carousel slide" data-ride="carousel" style="max-height: 600px; margin: 0 auto;">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://img-c.udemycdn.com/notices/web_carousel_slide/image/e6cc1a30-2dec-4dc5-b0f2-c5b656909d5b.jpg"
                class="d-block w-100" alt="Image 1" style="max-height:500px; width: auto; object-fit:cover;">
        </div>
        <div class="carousel-item">
            <img src="https://img-c.udemycdn.com/notices/web_carousel_slide/image/10ca89f6-811b-400e-983b-32c5cd76725a.jpg"
                class="d-block w-100" alt="Image 2" style="max-height:500px; width: auto; object-fit:cover;">
        </div>
        <!-- <div class="carousel-item">
            <img src="https://placekitten.com/800/402" class="d-block w-100" alt="Image 3"
                style="max-height:500px; width: auto;object-fit:cover;">
        </div> -->
    </div>
    <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="pt-5 logo-content brand-align">
    <h2>Top Brands</h2>
</div>

<?php 
 $resp_getall_brand = get_all_brand();
?>

<div class="logo-slider">
    <div class="logo-slide-track">
        <?php
        if ($resp_getall_brand) {
            foreach ($resp_getall_brand as $r) {
        ?>
        <div class="slide top-brands text-center">
            <div class="image-container">
                <img src="<?php echo base_url(); ?>uploads/brand/<?php echo $r->brand_image; ?>" alt=""
                    class="img-fluid">
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</div>




<!--End Logo Sectiont-->

<div class="content content-bg pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <?php
            $class_records_count = count($segment_record);
            if ($class_records_count > 0) {
                foreach ($segment_record as $class) { ?>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card text-center">
                    <div class="card-img-top card-img-size img-size mt-5">
                        <?php echo $class->segment_img; ?>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title"><?php echo $class->segment_name; ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="<?php echo base_url(); ?>?segment=<?php echo $class->id; ?>"
                            class="btn btn-primary mt-auto">Select</a>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>






<?php $courseid = $this->input->get('segment');
if (empty($courseid)) {


?>
<!-- Overlay image -->

<div class="over-lay text-center">
    <div class="course-category-overlay">
        <div class="text-over-lay">
            <svg width="36" height="41" viewBox="0 0 36 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.8333 3.00033L17.8333 37.667M33 18.167L17.8333 3.00033L2.66667 18.167" stroke="#E8F9FD"
                    stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <h2>Please select your course catagory for curated viewsssss</h2>
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
                            <img src="<?php echo base_url(); ?>/uploads/brand/084303700_1650530610.jpg" width="50"
                                alt="Buyjs">
                        </div>
                        <h3>Buyjsss</h3>
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
                            <img src="<?php echo base_url(); ?>/uploads/brand/066533300_1650530932.png" width="50"
                                alt="Career point">
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
                            <img src="<?php echo base_url(); ?>/uploads/brand/002345000_1650531005.png" width="50"
                                alt="Safalta">
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
                            <img src="<?php echo base_url(); ?>/uploads/brand/065041600_1650530864.jpg" width="50"
                                alt="Unacademy">
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
                            <img src="<?php echo base_url(); ?>/uploads/brand/082543200_1650531102.png" width="50"
                                alt="Adda247">
                        </div>
                        <h3>
                            Adda247 </h3>
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
                            <img src="<?php echo base_url(); ?>/uploads/brand/073155400_1650531207.png" width="50"
                                alt="Exampur">
                        </div>
                        <h3>
                            Exampur </h3>
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
                            <img src="<?php echo base_url(); ?>/uploads/brand/065112400_1650531318.png" width="50"
                                alt="Career launcher">
                        </div>
                        <h3>
                            Career launcher </h3>
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
                            <img src="<?php echo base_url(); ?>/uploads/brand/045179100_1650531407.png" width="50"
                                alt="TIME">
                        </div>
                        <h3>
                            TIME </h3>
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
                            <img src="<?php echo base_url(); ?>/uploads/brand/052746400_1650538170.png" width="50"
                                alt="Career Power">
                        </div>
                        <h3>
                            Career Power </h3>
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
    <!--right start-->
    <div class="course-right">
        <?php if (!empty($courseid)) { ?>
        <?php
            $resp_get_brand = getseg_brand_list($courseid);
            if ($resp_get_brand) {
            ?>
        <!--row start-->
        <div class="course-row article-section" id="Popular-Brands">
            <div class="course-inner-row">

                <div class="course-section-title">


                    <div class="d-flex  justify-content-center ">
                        <h2>Popular Brands</h2>

                    </div>
                    <div class="d-flex  justify-content-center ">

                        <p>Got the course, but worried about the brand?<br />
                            Read about all brands and their offerings here.</p>
                    </div>
                </div>

                <div class="container p-0">
                    <div class="row">
                        <?php foreach ($resp_get_brand as $brand) { ?>
                        <div class="col-sm-4 col-xl-3 col-lg-4 mb-3">
                            <div class="card ">
                                <img class="card-img-top " style="height: 260px;"
                                    src="<?php echo base_url(); ?>uploads/brand/<?php echo $brand->brand_image; ?>"
                                    alt="<?php echo $brand->brand_name; ?>">
                                <div class="card-body text-center ">
                                    <h5 class="card-title"><?php echo $brand->brand_name; ?></h5>
                                    <div class="popular-star-rating m-2">
                                        <i class="fa fa-star text-yellow"></i>
                                        <i class="fa fa-star text-yellow"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <hr>
                                    <a href="#" style="text-decoration:none; ">
                                        <h6>VEIW BRAND</h6>
                                    </a>
                                    <!-- <p class=" card-text rating-number">
                                        <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2
                                        </p> -->
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="d-flex justify-content-center m-5">
                    <a href="<?php echo base_url(); ?>brands" class="btn btn-primary">
                        VIEW ALL BRANDS
                    </a>
                </div>

                <?php }
                    ?>
            </div>
        </div>
        <!--row end-->

        <!--row start-->
        <?php
                $resp_get_course = getseg_course_list($courseid);

                if ($resp_get_course) {
                    // print_R($resp_get_brand);
                    //exit;
                ?>
        <div class="course-row article-section" id="Popular-Courses">
            <div class="course-inner-row">

                <div class="course-section-title ">
                    <div class="d-flex  justify-content-center ">
                        <h2>Popular Courses</h2>

                    </div>
                    <div class="d-flex  justify-content-center ">

                        <p>Got the course, but worried about the brand?</p>
                    </div>

                </div>

                <div class="container p-0">
                    <div class="row">
                        <?php foreach ($resp_get_course as $r)  { ?>
                        <div class="col-sm-4 col-xl-3 col-lg-4 mb-3">
                            <div class="card">

                                <img class="card-img-top" style="height: 260px;"
                                    src="<?php echo base_url(); ?>uploads/product/image/<?php echo $r->product_image; ?>"
                                    alt="<?php echo $r->product_name; ?>">
                                <div class="card-body text-center">
                                    <h5><?php echo $r->product_name; ?></h5>
                                    <div class="popular-star-rating m-2">
                                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                                        <i
                                            class="fa fa-star<?php echo ($r->product_rating >= $i) ? ' text-yellow' : ''; ?>"></i>
                                        <?php } ?>
                                    </div>
                                    <hr>
                                    <a href="<?php echo base_url(); ?>review?course=<?php echo $r->product_id; ?>&segment=<?php echo $course; ?>"
                                        style="text-decoration:none; ">
                                        <h6>VIEW PROGRAM</h6>
                                    </a>
                                    <!-- <p class="card-text rating-number">
                                            <img src="<?php echo base_url(); ?>/assets/images/Star.png" alt="">3.2
                                            </p> -->
                                </div>

                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="d-flex justify-content-center m-5"><a href="<?php echo base_url(); ?>course"
                        class="btn btn-primary">VIEW ALL COURSES</a>
                </div>

            </div>
        </div>
        <!--row end-->
        <?php
                }
            }  ?>
    </div>
</div>

<div class="container pt-5">
    <div class="row">
        <div class="col-md-4 col-lg-6">
            <div class="how-section1s ">
                <div class="brand-align pt-3 ">
                    <h4>Popular Brands</h4>

                    <p class="text-muted img-sub-heading pt-3">Thousands of people, everyday, make a
                        career
                        choice their friend has made. In this world full of trials and errors, we dived
                        deep
                        to
                        find out how mentoring and well planned out career choices has and can help any
                        individual hit their goals and achieve their ambitions as planned.</p>
                    <a href="https://staging.edcohort.com/" class="img-btn-explore">EXPLORE BRAND</a>
                </div>
            </div>

        </div>

        <div class="col-md-8 col-lg-6">
            <div class="row">
                <?php if ($brand_records) {
                                foreach ($brand_records as $brand) { ?>
                <div class="col-3 col-md-3 pt-3 pb-3 text-center">
                    <img src="<?php echo base_url(); ?>uploads/brand/<?php echo $brand->brand_image; ?>"
                        class="img-fluid" alt="<?php echo $brand->brand_name; ?>" style="height: 50px; width:auto;">

                </div>
                <?php }
                            } ?>
            </div>
        </div>

    </div>
</div>

<!-- Ends Popular Brands --->

<!--Choose Course Sectiont-->


<!-- **** Choose Course Section  **** --->

<div class="container">
    <div class="how-section1 ">
        <div class="row ">
            <div class="col-12 col-sm-3 col-lg-4 how-img">
                <img src="<?php echo base_url(); ?>assets/images/cst-review.webp" class="rounded-circle img-fluid"
                    alt="" style="width: 400px;" />
            </div>
            <div class="col-12 col-sm-9 col-lg-8 ">
                <h4>Review</h4>
                <h4 class="subheading">Thousands of people, everyday, make a career choice their friend
                    has
                    made. In this world full of trials and errors, we dived deep to find out how
                    mentoring
                    and
                    well planned out career choices has and can help any individual hit their goals and
                    achieve
                    their ambitions as planned.</h4>
                <p class="text-muted img-sub-heading">We have prepared an analytics driven real life
                    case
                    study
                    here, find out how it can work for you too!</p>
                <a href="https://staging.edcohort.com/" class="img-btn-explore">EXPLORE</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h4>Complain</h4>
                <h4 class="subheading">Thousands of people, everyday, make a career choice their friend
                    has
                    made. In this world full of trials and errors, we dived deep to find out how
                    mentoring
                    and
                    well planned out career choices has and can help any individual hit their goals and
                    achieve
                    their ambitions as planned.</h4>
                <p class="text-muted img-sub-heading">We have prepared an analytics driven real life
                    case
                    study
                    here, find out how it can work for you too!</p>
                <a href="https://staging.edcohort.com/" class="img-btn-explore">EXPLORE</a>
            </div>
            <div class="col-md-4 how-img">
                <img src="<?php echo base_url(); ?>assets/images/cmp-img.jpg" class="rounded-circle img-fluid" alt="" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 how-img">
                <img src="<?php echo base_url(); ?>assets/images/cmpr-img.jpg" class="rounded-circle img-fluid"
                    alt="" />
            </div>
            <div class="col-md-8">
                <h4>Compare</h4>
                <h4 class="subheading">With GetLance, you have the freedom and flexibility to control
                    when,
                    where, and how you work. Each project includes an online workspace shared by you and
                    your
                    client, allowing you to:</h4>
                <p class="text-muted img-sub-heading">Send and receive files. Deliver digital assets in
                    a
                    secure
                    environment.
                    Share feedback in real time. Use GetLance Messages to communicate via text, chat, or
                    video.
                    Use our mobile app. Many features can be accessed on your mobile phone when on the
                    go.
                </p>
                <a href="https://staging.edcohort.com/" class="img-btn-explore">EXPLORE</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h4>Counselling</h4>
                <h4 class="subheading">All projects include GetLance Payment Protection � helping ensure
                    that
                    you get paid for all work successfully completed through the freelancing website.
                </h4>
                <p class="text-muted img-sub-heading">All invoices and payments happen through GetLance.
                    Count
                    on a simple and streamlined process.
                    Hourly and fixed-price projects. For hourly work, submit timesheets through
                    GetLance.
                    For
                    fixed-price jobs, set milestones and funds are released via GetLance escrow
                    features.
                    Multiple payment options. Choose a payment method that works best for you, from
                    direct
                    deposit or PayPal to wire transfer and more.</p>
                <a href="https://staging.edcohort.com/" class="img-btn-explore">EXPLORE</a>
            </div>
            <div class="col-md-4 how-img">
                <img src="<?php echo base_url(); ?>assets/images/cnslng-img.jpg" class="rounded-circle img-fluid"
                    alt="" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 how-img">
                <img src="<?php echo base_url(); ?>assets/images/cohort-study-img.jpeg" class="rounded-circle img-fluid"
                    alt="" />
            </div>
            <div class="col-md-8">
                <h4>Cohort</h4>
                <h4 class="subheading">With GetLance, you have the freedom and flexibility to control
                    when,
                    where, and how you work. Each project includes an online workspace shared by you and
                    your
                    client, allowing you to:</h4>
                <p class="text-muted img-sub-heading">Send and receive files. Deliver digital assets in
                    a
                    secure
                    environment.
                    Share feedback in real time. Use GetLance Messages to communicate via text, chat, or
                    video.
                    Use our mobile app. Many features can be accessed on your mobile phone when on the
                    go.
                </p>
                <a href="https://staging.edcohort.com/" class="img-btn-explore">EXPLORE</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h4>Coupons</h4>
                <h4 class="subheading">All projects include GetLance Payment Protection � helping ensure
                    that
                    you get paid for all work successfully completed through the freelancing website.
                </h4>
                <p class="text-muted img-sub-heading">All invoices and payments happen through GetLance.
                    Count
                    on a simple and streamlined process.
                    Hourly and fixed-price projects. For hourly work, submit timesheets through
                    GetLance.
                    For
                    fixed-price jobs, set milestones and funds are released via GetLance escrow
                    features.
                    Multiple payment options. Choose a payment method that works best for you, from
                    direct
                    deposit or PayPal to wire transfer and more.</p>
                <a href="https://staging.edcohort.com/" class="img-btn-explore">EXPLORE</a>
            </div>
            <div class="col-md-6 how-img">
                <img src="<?php echo base_url(); ?>assets/images/coupons-img.jpg" class="rounded-circle img-fluid"
                    alt="" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 how-img">
                <img src="<?php echo base_url(); ?>assets/images/mntring-work.png" class="rounded-circle img-fluid"
                    alt="" />
            </div>
            <div class="col-md-6">
                <h4>Mentoring Works! Read how</h4>
                <h4 class="subheading">With GetLance, you have the freedom and flexibility to control
                    when,
                    where, and how you work. Each project includes an online workspace shared by you and
                    your
                    client, allowing you to:</h4>
                <p class="text-muted img-sub-heading">Send and receive files. Deliver digital assets in
                    a
                    secure
                    environment.
                    Share feedback in real time. Use GetLance Messages to communicate via text, chat, or
                    video.
                    Use our mobile app. Many features can be accessed on your mobile phone when on the
                    go.
                </p>
                <a href="https://staging.edcohort.com/" class="img-btn-explore">EXPLORE</a>
            </div>
        </div>
    </div>
</div>

<!-- **** End Choose Course Section  **** --->


<!--row start-->
<!--<div class="course-row article-section content-bg" id="Review">
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
                                                    <img src="<?php //echo base_url(); 
                                                                ?>assets/images/work-image.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div> -->
<!--row end-->


<!--row start-->
<!-- <div class="course-row article-section panel" id="Complain">
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
                                                    <img src="<?php //echo base_url(); 
                                                                ?>assets/images/work-image.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div> -->
<!--row end-->


<!--row start-->
<!--<div class="course-row article-section content-bg" id="Compare">
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
                                                    <img src="<?php //echo base_url(); 
                                                                ?>assets/images/work-image.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div> -->
<!--row end-->


<!--row start-->
<!-- <div class="course-row article-section " id="Counselling">
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
                                                    <img src="<?php //echo base_url(); 
                                                                ?>assets/images/work-image.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div> -->
<!--row end-->
<!-- <div class="content-bg">
            <div class="brand-align pt-5">
                <h2>Popular Courses</h2>
            </div>
            <div class="owl-carousel owl-theme">
                <?php if ($courses_records) {
            foreach ($courses_records as $course) { ?>
                <div class="item item-owl">
                    <img src="<?php echo base_url(); ?>uploads/brand/<?php echo $course->image_show; ?>"
                        class="img-fluid" alt="<?php echo $course->product_name; ?>">
                    <div class="img-content-align">
                        <h5><?php echo $course->product_name; ?></h5>
                    </div>
                </div>
                <?php }
        } ?>
            </div>
        </div> -->


<!--row start-->
<!--  <div class="course-row article-section" id="Cohort">
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
                                                    <img src="<?php //echo base_url(); 
                                                                ?>assets/images/work-image.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div> -->
<!--row end-->


<!--row start-->
<!-- <div class="course-row article-section content-bg" id="Coupons">
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
                                                    <img src="<?php //echo base_url(); 
                                                                ?>assets/images/work-image.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div> -->
<!--row end-->


<!--row start-->
<!--<div class="course-row article-section" id="Mentoring">
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
                                                    <img src="<?php //echo base_url(); 
                                                                ?>assets/images/work-image.jpg" alt="">
                                                </div>

                                            </div>

                                        </div>
                                    </div> -->


<!--row end-->



<div class="brand-align pt-5 ">
    <h2>Get In Touch</h2>
</div>

<div class="grey-bg grey-light-bg pt-4 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-lg-4 text-center">
                <img class="img-fluid" src="<?php //echo base_url(); 
                                                        ?>assets/images/get-in-touch.jpg">
                <p class="get-touch-font pt-2"><b>Find Our Expierance Center</b></p>
                <p>Talk To Our Experts for a Free Consultation</p>
            </div>
            <div class="col-md-4 col-sm-12 col-lg-4 text-center">
                <img class="img-fluid" src="<?php //echo base_url(); 
                                                        ?>assets/images/get-in-touch.jpg">
                <p class="get-touch-font pt-2"><b>Find Our Expierance Center</b></p>
                <p>Talk To Our Experts for a Free Consultation</p>
            </div>
            <div class="col-md-4 col-sm-12 col-lg-4 text-center">
                <img class="img-fluid" src="<?php //echo base_url(); 
                                                        ?>assets/images/get-in-touch.jpg">
                <p class="get-touch-font pt-2"><b>Find Our Expierance Center</b></p>
                <p>Talk To Our Experts for a Free Consultation</p>
            </div>

        </div>

    </div>
</div>

</div>
<!--right end-->

</div>
<!--end-->



</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
    integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
< script src = "https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity = "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin = "anonymous" >
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script>
$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    /* here you can set the settings for responsive
       items */
    responsive: {
        0: {
            items: 2
        },
        768: {
            items: 4
        }
    }
})
</script>

<!--content end