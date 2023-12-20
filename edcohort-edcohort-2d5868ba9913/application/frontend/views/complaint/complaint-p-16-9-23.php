<?php $course = $this->input->get('course'); 
          $brandID = $this->input->get('brand');
          $product_type = $this->input->get('product_type');
          $board = $this->input->get('board');
          $class = $this->input->get('class');
          $batch = $this->input->get('batch');
          $customer_rating = $this->input->get('customer_rating');
          $date_posted = $this->input->get('date_posted');
          $sort_by = $this->input->get('sort_by');
          $complaint_resolved = $this->input->get('complaint_resolved');
          
    ?>
<!--banner start-->
<div class="inner-banner">

    <div class="breadcrumb">
        <ul>
            <li>Home</li>
            <li><?php echo @$product_list['0']->brand_name; ?></li>
            <li><a href="#"><?php echo @$product_list['0']->product_name; ?></a></li>
        </ul>
    </div>

    <div class="tab-menu">
        <ul>
             <li class="active"><a href="<?php echo base_url(); ?>complaint?course=<?php echo @$product_list['0']->product_id; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Complain <?php echo $review_count; ?></a></li>
            <li><a href="<?php echo base_url(); ?>comparison?course=<?php echo @$product_list['0']->product_id; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Compare </a></li>
            <li><a href="<?php echo base_url(); ?>counselling?course=<?php echo @$product_list['0']->product_id; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Counselling </a></li>
            <li><a href="<?php echo base_url(); ?>cohort?course=<?php echo @$product_list['0']->product_id; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Cohort</a></li>
            <li><a href="<?php echo base_url(); ?>review?course=<?php echo @$product_list['0']->product_id; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Reviews </a></li>
            <li><a href="<?php echo base_url(); ?>coupon?course=<?php echo @$product_list['0']->product_id; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Coupons</a></li>
        </ul>
    </div>

</div>
<!--banner end-->

<!--content start-->
<div class="content">
    
    <!--start-->
    <div class="review-main-box d-flex">

        <button type="button" class="filter-btn">Filter</button>
        <?php //print_ex($product_list); ?>
        <!--left start-->
        <div class="review-left">
            <form action="<?php echo base_url(); ?>complaint-search" method="get" name="form" id="form">
                <h3 class="filter-title">Filter</h3>
                <?php echo csrf_field(); ?>
                <div class="filter-col">
                    <h3 class="filter-col-title">BRAND</h3>
                    <div class="select-box">
                        <select name="brand" id="brand">
                            <?php foreach($brand_records as $brand){?>
                                <option value="<?php echo $brand->brand_id; ?>" <?php if($brand->brand_id == @$product_list['0']->brand_id){ echo 'selected'; } ?>><?php echo $brand->brand_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="filter-col"> 

                    <div class="btn-group btn-toggle filter-toggle-box">
                            <div class="input-toggle <?php if(@$product_list['0']->product_type == 1){ echo 'active';} ?>" id="online-toggle"  >
                                <label>Online</label>
                                <input class="btn btn-lg btn-default" type="radio" name="product_type" <?php if(@$product_list['0']->product_type == 1){ echo 'checked';} ?> id="online" value="1" onClick="prodcutType(1)">
                            </div>
                            <div class="input-toggle <?php if(@$product_list['0']->product_type == 2){ echo 'active';} ?>" id="offline-toggle"  >
                                <label>Offline</label>
                                <input class="btn btn-lg btn-primary active" type="radio" name="product_type" <?php if(@$product_list['0']->product_type == 2){ echo 'checked';} ?> id="offline" value="2"  onClick="prodcutType(2)">
                            </div>
                    </div>
                    <!-- <p class="online-results">Showing <span>(2677)</span> Online Cohort results for BYJU’s</p> -->
                </div>

                <div class="filter-col">
                    <h3 class="filter-col-title">BOARD</h3>
                    <div class="select-box">
                        <select name="board" id="board">
                            <?php foreach($board_records as $boards){?>
                                <option value="<?php echo $boards->board_id; ?>" <?php if($boards->board_id == @$product_list['0']->board_id){ echo 'selected'; } ?>><?php echo $boards->board_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="filter-col">
                    <h3 class="filter-col-title">CLASS</h3>
                    <div class="select-box">
                        <select name="class" id="class">
                            <?php foreach($class_records as $classes){?>
                                <option value="<?php echo $classes->class_id; ?>" <?php if($classes->class_id == @$product_list['0']->class_id){ echo 'selected'; } ?>><?php echo $classes->title; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="filter-col">
                    <h3 class="filter-col-title">BATCH (Cohort) <span>Running Year</span></h3>
                    <div class="select-box">
                        <select name="batch" id="batch">
                            <?php foreach($batch_records as $batches){?>
                                <option value="<?php echo $batches->batch_id; ?>" <?php if($batches->batch_id == @$product_list['0']->batch_id){ echo 'selected'; } ?>><?php echo $batches->batch_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="filter-col">
                    <h3 class="filter-col-title">TYPE</h3>
                    <div class="filter-list-box">
                        <ul>
                            <li>
                                <input type="radio" name="complaint_resolved" id="type1" value="0" <?php if(@$complaint_resolved == 0){ echo 'checked';} ?>>
                                <label for="type1">Unresolved </label>
                            </li>

                            <li>
                                <input type="radio" name="complaint_resolved" id="type2" value="1" <?php if(@$complaint_resolved == 1){ echo 'checked';} ?>>
                                <label for="type2">Resolved </label>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="filter-col">
                    <h3 class="filter-col-title">CUSTOMER RATING</h3>
                    <div class="filter-list-box">
                    <div class="filter-list-box">
                        <ul>
                            <li>
                                <input type="radio" name="customer_rating" id="rating1" value="5" <?php if(@$customer_rating == 5){ echo 'checked';} ?>>
                                <label for="rating1"><img src="<?php echo base_url();?>assets/images/rating-5.png"    alt=""> & up</label>
                            </li>
                            <li>
                                <input type="radio" name="customer_rating" id="rating2" value="4" <?php if(@$customer_rating == 4){ echo 'checked';} ?>>
                                <label for="rating2"><img src="<?php echo base_url();?>assets/images/rating-4.png"  alt=""> & up</label>
                            </li>
                            <li>
                                <input type="radio" name="customer_rating" id="rating3" value="3" <?php if(@$customer_rating == 3){ echo 'checked';} ?>>
                                <label for="rating3"><img src="<?php echo base_url();?>assets/images/rating-3.png"  alt=""> & up</label>
                            </li>
                            <li>
                                <input type="radio" name="customer_rating" id="rating4" value="2" <?php if(@$customer_rating == 2){ echo 'checked';} ?>>
                                <label for="rating4"><img src="<?php echo base_url();?>assets/images/rating-2.png" alt=""> & up</label>
                            </li>
                            <li>
                                <input type="radio" name="customer_rating" id="rating5" value="1" <?php if(@$customer_rating == 1){ echo 'checked';} ?>>
                                <label for="rating5"><img src="<?php echo base_url();?>assets/images/rating-1.png"   alt=""> & up</label>
                            </li>
                        </ul>
                    </div>
                                        </div>
                                    </div>


                                    <!-- <div class="filter-col">
                                        <h3 class="filter-col-title">DATE POSTED</h3>
                                        <div class="filter-list-box">
                                            <ul>
                                                <li>
                                                    <input type="radio" name="date_posted" id="Custom1">
                                                    <label for="Custom1">Custom</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->


                                    <div class="filter-col">
                                        <h3 class="filter-col-title">SORT BY</h3>
                                        <div class="filter-list-box">
                                        <ul>
                                                <li>
                                                    <input type="radio" name="sort_by" id="sort1" value="desc" <?php if(@$sort_by == 'desc'){ echo 'checked';} ?>>
                                                    <label for="sort1">Trending first</label>
                                                </li>

                                                <li>
                                                    <input type="radio" name="sort_by" id="sort2" value="asc" <?php if(@$sort_by == 'asc'){ echo 'checked';} ?>>
                                                    <label for="sort2">Most Critical </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="filter-btn-col">
                                        <button type="submit" class="apply-btn">Apply Filter</button>
                                    </div>
                                </form>

                            </div>
                            <!--left end-->


                            <!--center start-->
                            <div class="review-center">

                                <div class="review-btn-box">
                                	<?php if($this->session->userdata('user_id')){ ?>
<a href="<?php echo base_url();?>write-a-complaint?course=<?php echo @$product_list['0']->product_id; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>" class="review-btn"><img src="<?php echo base_url();?>assets/images/review-icon2.png" alt=""> Write a Complain</a>
<?php } else{ ?>
    <a href="javascript:void(0)" class="review-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button"><img src="<?php echo base_url();?>assets/images/review-icon2.png" alt="" >Write a
review</a>

<?php } ?>
                                    
                                </div>
                                <div class="review-inner-center">

                                    <div class="tab-link">

                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url(); ?>complaint?course=<?php echo $course; ?>" class="active">All</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>my-complaint?course=<?php echo $course; ?>">My complains</a>
                                            </li>
                                            
                                        </ul>

                                    </div>


                                    <div class="total-review">
                                        <!-- 9 of --><?php echo $review_count;?> Review<?php if($review_count > 1){ echo "s"; } ?> 
                                    </div>
                                    <?php //print_ex($review_list); ?>
                                    <div class="review-box">
                                        <?php if($review_list){ ?>
                                            <?php foreach($review_list as $review){?>
                                                <!--review row start-->
                                                <div class="review-row">
                                                    <div class="review-user-image"><span></span></div>
                                                    <div class="review-title-row d-flex flex-wrap justify-content-between align-items-center">
                                                        <h2 class="review-title">
                                                            <?php echo ucwords($review->user_name); ?> <span><img src="<?php  base_url() ?>assets/images/verifyicon.png" alt=""></span>
                                                            <div class="review-title-dropdown">

                                                                <h2 class="review-title">
                                                                    <div class="review-user-image"><span></span></div>
                                                                    <?php echo ucwords($review->user_name); ?> <span><img src="<?php  base_url() ?>assets/images/verifyicon.png" alt=""></span>
                                                                    <p>Counsellor</p>
                                                                </h2>

                                                                <div class="review-info-box">
                                                                    <div class="review-info-left">Followers 180</div>
                                                                    <div class="review-info-right"><a href="#">Visit Profile</a></div>
                                                                </div>
                                                                <a href="#" class="follow-btn">Follow</a>

                                                            </div>
                                                        </h2>

                                                        <?php   $current = strtotime(date("Y-m-d"));
                                                        $date    = strtotime($review->product_complaint_added);
                                                        $today = '';
                                                        $datediff = $current - $date;
                                                        $difference = floor($datediff/(60*60*24));
                                                        if($difference==0)
                                                        {
                                                            $today = 'today';
                                                        } ?>
                                                        <div class="d-flex">
                                                            <?php if($review->complaint_resolved == 1){ ?>
                                                                <span class="badge bg-resolved">Resolved</span>
                                                           <?php } else{?>
                                                            <span class="badge bg-unresolved">Unresolved</span>
                                                            <?php } ?>
                                                            
                                                            <div class="review-date <?php echo $today ?>"> <?php if(!empty($today)){ echo "Today"; }else{ echo $difference. 'Days'; /*date('d F Y',strtotime($review->product_complaint_added));*/  }?> </div>
                                                        </div>
                                                    </div>
                                                    <div class="review-rating">
                                                        <?php if($review->product_rating == 1){?>
                                                            <i class="fa fa-star text-yellow"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                        <?php } ?>
                                                        <?php if($review->product_rating == 2){?>
                                                            <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                        <?php } ?>
                                                        <?php if($review->product_rating == 3){?>
                                                            <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                        <?php } ?>
                                                        <?php if($review->product_rating == 4){?>
                                                            <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star"></i>
                                                        <?php } ?>
                                                        <?php if($review->product_rating == 5){?>
                                                            <i class="fa fa-star text-yellow"></i><i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>
                                                        <?php } ?>
                                                    </div>
                                                    <div><h2 class="review-title"><?php echo $review->product_complaint_title;?></h2></div>
                                                    <div class="review-content" id="reviewShort_<?php echo $review->product_complaint_id;?>">
                                                        <?php echo substr($review->product_complaint,0,185); ?>
                                                    </div>
                                                    <?php  $words = substr_count($review->product_complaint, " ");
                                                    if($words > 30){
                                                        ?>
                                                        <div class="review-read" id="review-read_<?php echo $review->product_complaint_id;?>"><a href="javascript:void(0)" id="reviewShortRM_<?php echo $review->product_complaint_id;?>" onclick="productReviewReadMore('<?php echo $review->product_complaint_id;?>')">(Read more)</a></div>
                                                    <?php } ?>

                                                    <div class="review-content" style="display:none" id="reviewFull_<?php echo $review->product_complaint_id;?>"> <?php echo $review->product_complaint; ?> <small class="text-yellow"><a href="javascript:void(0)" id="reviewShortRS_<?php echo $review->product_complaint_id;?>" onclick="productReviewReadShort('<?php echo $review->product_complaint_id;?>')">Read Short</small></a> </div>

                                                    <div class="review-footer d-flex flex-wrap justify-content-between align-items-center">
                                                        <?php 
                                            
                                                        $where_review_reply = 'tbl_product_complaint_reply.status = 1 and complaint_id = '.$review->product_complaint_id.'';
                                                        $orderby = 'tbl_customer.customer_type ASC, tbl_product_complaint_reply.prr_id ASC';
                                                        $review_reply = $this->complaint_model->selectJoinWhereOrderby('tbl_product_complaint_reply','user_id','tbl_customer','customer_id',$where_review_reply,$orderby);
                                                        
            											//echo  $this->db->last_query();
                                                        ?>
                                                        <div class="review-footer-left"><?php echo sizeof($review_reply); ?> Replies <a href="#">View all replies</a></div>

                                                        <div class="review-footer-right d-flex">
                                                            <?php 
                                                            $likeCount = 0;
                                                            $likeCountCheck =0;

                                                            $where_like = 'review_id = '.$review->product_complaint_id.' and action = 1';
                                                            $review_reply_cnt = $this->review_model->review_like_count($where_like);
                                                            $likeCount = $review_reply_cnt['0']->like_count;

                                                            if($this->session->userdata('user_id')){

                                                                $where_like_check = 'review_id = '.$review->product_complaint_id.' and user_id = '.$this->session->userdata('user_id').' and action = 1';
                                                                $review_reply_check = $this->review_model->review_like_count($where_like_check);
//echo  $this->db->last_query();
                                                                $likeCountCheck = $review_reply_check['0']->like_count;

                                                            }

                                                            ?>
                                                            <?php if($this->session->userdata('user_id')){ ?>
                                                                <?php if($likeCount > 0 ){ ?> 
                                                                    <a href="javascript:void(0)" onclick="productReviewLike('<?php echo $review->product_complaint_id;?>','<?php echo $this->session->userdata('user_id'); ?>',1)"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M21.6 7.57895H14.8656L16.2132 3.32589C16.4556 2.55789 16.3332 1.70653 15.8832 1.04968C15.4332 0.392842 14.7036 0 13.9344 0H12C11.6436 0 11.3064 0.166737 11.0772 0.454737L5.4372 7.57895H2.4C1.0764 7.57895 0 8.712 0 10.1053V21.4737C0 22.8669 1.0764 24 2.4 24H18.3684C18.8567 23.9983 19.3329 23.8406 19.7343 23.5479C20.1356 23.2551 20.443 22.8411 20.616 22.3604L23.9244 13.0749C23.9746 12.9331 24.0002 12.7829 24 12.6316V10.1053C24 8.712 22.9236 7.57895 21.6 7.57895ZM2.4 10.1053H4.8V21.4737H2.4V10.1053Z" fill="#3554FE"/>
                                                                    </svg> <?php   echo $likeCount; ?></a>
                                                                    <!-- <i class="fa fa-thumbs-up <?php if($likeCountCheck == 1){ echo 'btn-success';} ?>" ></i> <?php   echo $likeCount; ?></a> -->
                                                                <?php } ?>

                                                                <?php if($likeCount < 1 ) { ?>
                                                                  <a href="javascript:void(0)" onclick="productReviewLike('<?php echo $review->product_complaint_id;?>','<?php echo $this->session->userdata('user_id'); ?>',1)"><svg width="24" height="24" class="fa fa-thumbs-up <?php if($likeCountCheck == 1){ echo 'btn-success';} ?> viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M21.6 7.57895H14.8656L16.2132 3.32589C16.4556 2.55789 16.3332 1.70653 15.8832 1.04968C15.4332 0.392842 14.7036 0 13.9344 0H12C11.6436 0 11.3064 0.166737 11.0772 0.454737L5.4372 7.57895H2.4C1.0764 7.57895 0 8.712 0 10.1053V21.4737C0 22.8669 1.0764 24 2.4 24H18.3684C18.8567 23.9983 19.3329 23.8406 19.7343 23.5479C20.1356 23.2551 20.443 22.8411 20.616 22.3604L23.9244 13.0749C23.9746 12.9331 24.0002 12.7829 24 12.6316V10.1053C24 8.712 22.9236 7.57895 21.6 7.57895ZM2.4 10.1053H4.8V21.4737H2.4V10.1053ZM21.6 12.4029L18.3684 21.4737H7.2V9.29937L12.5616 2.52632H13.9368L12.0624 8.44168C12.0016 8.63156 11.9846 8.83396 12.0129 9.03212C12.0412 9.23027 12.114 9.41847 12.2252 9.58111C12.3364 9.74374 12.4828 9.87612 12.6524 9.96728C12.8219 10.0584 13.0096 10.1057 13.2 10.1053H21.6V12.4029Z" fill="#A0A0A0"/> 
                                                                </svg> <?php echo $likeCount; ?></a>
                                                            <?php } ?>
                                                        <?php }else { ?> 
                                                            <a href="javascript:void(0)" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button" ><svg width="24" height="24" class="fa fa-thumbs-up <?php if($likeCountCheck == 1){ echo 'btn-success';} ?> viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M21.6 7.57895H14.8656L16.2132 3.32589C16.4556 2.55789 16.3332 1.70653 15.8832 1.04968C15.4332 0.392842 14.7036 0 13.9344 0H12C11.6436 0 11.3064 0.166737 11.0772 0.454737L5.4372 7.57895H2.4C1.0764 7.57895 0 8.712 0 10.1053V21.4737C0 22.8669 1.0764 24 2.4 24H18.3684C18.8567 23.9983 19.3329 23.8406 19.7343 23.5479C20.1356 23.2551 20.443 22.8411 20.616 22.3604L23.9244 13.0749C23.9746 12.9331 24.0002 12.7829 24 12.6316V10.1053C24 8.712 22.9236 7.57895 21.6 7.57895ZM2.4 10.1053H4.8V21.4737H2.4V10.1053ZM21.6 12.4029L18.3684 21.4737H7.2V9.29937L12.5616 2.52632H13.9368L12.0624 8.44168C12.0016 8.63156 11.9846 8.83396 12.0129 9.03212C12.0412 9.23027 12.114 9.41847 12.2252 9.58111C12.3364 9.74374 12.4828 9.87612 12.6524 9.96728C12.8219 10.0584 13.0096 10.1057 13.2 10.1053H21.6V12.4029Z" fill="#A0A0A0"/> 
                                                            </svg> <?php echo $likeCount; ?></a>
                                                        <?php } ?>
                                                        <?php if($this->session->userdata('user_id')){ ?>
                                                            <a href="javascript:void(0)" class="me-2" id="reply-" onclick="divShow(<?php echo $review->product_complaint_id;?>);" ><svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.34069 1.81943C9.38116 1.80193 9.42546 1.7947 9.46951 1.79841C9.51357 1.80212 9.55597 1.81665 9.59281 1.84068C9.62966 1.8647 9.65977 1.89744 9.68038 1.93588C9.70099 1.97433 9.71143 2.01725 9.71076 2.0607V4.13667C9.71076 4.37544 9.80726 4.60442 9.97905 4.77325C10.1508 4.94208 10.3838 5.03692 10.6268 5.03692C11.8487 5.03692 14.3146 5.04593 16.6723 6.51693C18.475 7.64044 20.318 9.68581 21.4264 13.4957C19.5577 11.7258 17.4235 10.7661 15.5548 10.2566C14.4062 9.94479 13.2259 9.75999 12.0356 9.70561C11.5483 9.68458 11.0603 9.68939 10.5736 9.72002H10.5498L10.5407 9.72182H10.5388L10.6268 10.6185L10.5352 9.72182C10.3091 9.74415 10.0995 9.84828 9.94712 10.014C9.79477 10.1797 9.71053 10.3951 9.71076 10.6185V12.6944C9.71076 12.8889 9.50924 13.0113 9.34069 12.9357L2.04202 7.65484C2.01725 7.63678 1.99157 7.61996 1.96508 7.60443C1.92525 7.5809 1.89228 7.54765 1.8694 7.50789C1.84652 7.46814 1.83449 7.42324 1.83449 7.37757C1.83449 7.33189 1.84652 7.287 1.8694 7.24724C1.89228 7.20749 1.92525 7.17423 1.96508 7.15071C1.99158 7.13519 2.01726 7.11836 2.04202 7.10029L9.34069 1.81943ZM11.5428 11.4935C11.6673 11.4935 11.8047 11.4989 11.9513 11.5043C12.7464 11.5403 13.8456 11.6592 15.0657 11.9922C17.4949 12.6548 20.3711 14.1564 22.2837 17.5378C22.3872 17.7203 22.552 17.8618 22.7499 17.938C22.9478 18.0142 23.1666 18.0204 23.3686 17.9554C23.5707 17.8905 23.7435 17.7586 23.8574 17.5822C23.9713 17.4058 24.0192 17.1959 23.993 16.9886C23.1429 10.3088 20.5378 6.79421 17.6543 4.99731C15.3735 3.57492 13.0248 3.30124 11.5428 3.24903V2.0607C11.5429 1.68992 11.4413 1.32597 11.2485 1.00726C11.0557 0.688538 10.779 0.426871 10.4475 0.249866C10.116 0.0728604 9.74199 -0.0129205 9.36502 0.00157497C8.98804 0.0160704 8.62203 0.130304 8.30562 0.332223L0.988627 5.62568C0.686128 5.81126 0.436658 6.06944 0.263703 6.37593C0.0907489 6.68241 0 7.02711 0 7.37757C0 7.72803 0.0907489 8.07273 0.263703 8.37921C0.436658 8.68569 0.686128 8.94388 0.988627 9.12945L8.30562 14.4229C8.62203 14.6248 8.98804 14.7391 9.36502 14.7536C9.74199 14.7681 10.116 14.6823 10.4475 14.5053C10.779 14.3283 11.0557 14.0666 11.2485 13.7479C11.4413 13.4292 11.5429 13.0652 11.5428 12.6944V11.4935Z" fill="#A0A0A0"/>
                                                                </svg>
                                                            Reply</a>
                                                    <?php }else{ ?>
                                                        <a href="javascript:void(0)" class="me-2" data-bs-toggle="modal" data-bs-target="#login-button"><svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.34069 1.81943C9.38116 1.80193 9.42546 1.7947 9.46951 1.79841C9.51357 1.80212 9.55597 1.81665 9.59281 1.84068C9.62966 1.8647 9.65977 1.89744 9.68038 1.93588C9.70099 1.97433 9.71143 2.01725 9.71076 2.0607V4.13667C9.71076 4.37544 9.80726 4.60442 9.97905 4.77325C10.1508 4.94208 10.3838 5.03692 10.6268 5.03692C11.8487 5.03692 14.3146 5.04593 16.6723 6.51693C18.475 7.64044 20.318 9.68581 21.4264 13.4957C19.5577 11.7258 17.4235 10.7661 15.5548 10.2566C14.4062 9.94479 13.2259 9.75999 12.0356 9.70561C11.5483 9.68458 11.0603 9.68939 10.5736 9.72002H10.5498L10.5407 9.72182H10.5388L10.6268 10.6185L10.5352 9.72182C10.3091 9.74415 10.0995 9.84828 9.94712 10.014C9.79477 10.1797 9.71053 10.3951 9.71076 10.6185V12.6944C9.71076 12.8889 9.50924 13.0113 9.34069 12.9357L2.04202 7.65484C2.01725 7.63678 1.99157 7.61996 1.96508 7.60443C1.92525 7.5809 1.89228 7.54765 1.8694 7.50789C1.84652 7.46814 1.83449 7.42324 1.83449 7.37757C1.83449 7.33189 1.84652 7.287 1.8694 7.24724C1.89228 7.20749 1.92525 7.17423 1.96508 7.15071C1.99158 7.13519 2.01726 7.11836 2.04202 7.10029L9.34069 1.81943ZM11.5428 11.4935C11.6673 11.4935 11.8047 11.4989 11.9513 11.5043C12.7464 11.5403 13.8456 11.6592 15.0657 11.9922C17.4949 12.6548 20.3711 14.1564 22.2837 17.5378C22.3872 17.7203 22.552 17.8618 22.7499 17.938C22.9478 18.0142 23.1666 18.0204 23.3686 17.9554C23.5707 17.8905 23.7435 17.7586 23.8574 17.5822C23.9713 17.4058 24.0192 17.1959 23.993 16.9886C23.1429 10.3088 20.5378 6.79421 17.6543 4.99731C15.3735 3.57492 13.0248 3.30124 11.5428 3.24903V2.0607C11.5429 1.68992 11.4413 1.32597 11.2485 1.00726C11.0557 0.688538 10.779 0.426871 10.4475 0.249866C10.116 0.0728604 9.74199 -0.0129205 9.36502 0.00157497C8.98804 0.0160704 8.62203 0.130304 8.30562 0.332223L0.988627 5.62568C0.686128 5.81126 0.436658 6.06944 0.263703 6.37593C0.0907489 6.68241 0 7.02711 0 7.37757C0 7.72803 0.0907489 8.07273 0.263703 8.37921C0.436658 8.68569 0.686128 8.94388 0.988627 9.12945L8.30562 14.4229C8.62203 14.6248 8.98804 14.7391 9.36502 14.7536C9.74199 14.7681 10.116 14.6823 10.4475 14.5053C10.779 14.3283 11.0557 14.0666 11.2485 13.7479C11.4413 13.4292 11.5429 13.0652 11.5428 12.6944V11.4935Z" fill="#3554FE"/>
                                                        </svg>
                                                    Reply</a>
                                                <?php } ?>
                                                <a href="#"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.5004 3.74998C16.5003 2.87013 16.8096 2.01826 17.3741 1.3434C17.9386 0.668542 18.7225 0.213678 19.5885 0.0583884C20.4546 -0.0969011 21.3476 0.0572728 22.1115 0.493936C22.8753 0.9306 23.4613 1.62195 23.7669 2.44702C24.0725 3.27209 24.0783 4.17835 23.7832 5.00724C23.4881 5.83613 22.9109 6.53487 22.1527 6.9812C21.3945 7.42753 20.5034 7.59304 19.6355 7.44876C18.7675 7.30448 17.978 6.85961 17.4049 6.19198L7.3279 10.872C7.55956 11.6061 7.55956 12.3938 7.3279 13.128L17.4049 17.808C18.0107 17.1035 18.8564 16.6489 19.7782 16.5325C20.7 16.416 21.6322 16.6458 22.3942 17.1775C23.1561 17.7092 23.6936 18.5048 23.9024 19.4102C24.1112 20.3155 23.9764 21.2662 23.5243 22.0778C23.0721 22.8895 22.3347 23.5044 21.455 23.8034C20.5753 24.1024 19.6159 24.0642 18.7628 23.6961C17.9097 23.328 17.2236 22.6564 16.8375 21.8113C16.4513 20.9662 16.3927 20.0079 16.6729 19.122L6.5959 14.442C6.09705 15.0233 5.43212 15.438 4.69057 15.6301C3.94901 15.8222 3.1664 15.7827 2.448 15.5167C1.72961 15.2507 1.10991 14.7711 0.672259 14.1424C0.234606 13.5137 0 12.766 0 12C0 11.2339 0.234606 10.4863 0.672259 9.85755C1.10991 9.22884 1.72961 8.74923 2.448 8.48326C3.1664 8.21729 3.94901 8.17772 4.69057 8.36985C5.43212 8.56199 6.09705 8.97663 6.5959 9.55798L16.6729 4.87798C16.5582 4.51298 16.5 4.13258 16.5004 3.74998Z" fill="#A0A0A0" /> Share
                                                    </svg>
                                                  </a>
                                                </div>
                                            </div>
                                            <div id="comment-form" class="row">
                                                <div class="mt-5" style="display:none" id="commentDiv_<?php echo $review->product_complaint_id; ?>">
                                                    <div class="alert alert-outline alert-outline-success reg-message-success" id="reg-message-success_<?php echo $review->product_complaint_id; ?>" role="alert"  style="display:none;">
                                                        <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                                                        <p id="text-message-success_<?php echo $review->product_complaint_id; ?>"></p>
                                                    </div>
                                                    <div class="alert alert-outline alert-outline-danger reg-message-error" id="reg-message-error_<?php echo $review->product_complaint_id; ?>" role="alert" style="display:none">
                                                        <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                                                        <p id="text-message-error_<?php echo $review->product_complaint_id; ?>"></p>
                                                    </div>
                                                    <form class="form-horizontal" name="product_review_reply_<?php echo $review->product_complaint_id; ?>"  id="product_review_reply_<?php echo $review->product_complaint_id; ?>" action="javascript:void(0)"  method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" class="form-control" name="product_id" id="product_id" placeholder="Your Name" value="<?php echo $course; ?>">
                                                        <input type="hidden" class="form-control" name="user_id" id="userid" placeholder="Your Name"  value="<?php echo $this->session->userdata('user_id'); ?>">
                                                        <input type="hidden" class="form-control" name="complaint_id"  id="complaint_id_<?php echo $review->product_complaint_id; ?>" placeholder="Your Name"   value="<?php echo $review->product_complaint_id; ?>">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="comment" rows="6" placeholder="Comment" required="required"  maxlength="250"></textarea>
                                                        </div>
                                                        <?php if ($this->session->userdata('user_id')) { ?>
                                                            <a href="javascript:void(0)" class="btn btn-primary" id="review_reply_submit"  onclick="productReviewReply(<?php echo $review->product_complaint_id; ?>)">Reply</a>
                                                        <?php }else{ ?>
                                                            <a href="javascript:void(0)" class="btn btn-primary" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button">Reply</a>
                                                        <?php } ?>
                                                    </form>
                                                </div>
                                            </div>

<?php //print_ex($review_reply);
foreach($review_reply as $reply){
    ?>
    <div class="review-row">
        <div class="review-user-image"><span></span></div>
        <div class="review-title-row d-flex flex-wrap justify-content-between align-items-center">
            <h2 class="review-title"><?php echo ucfirst($reply->firstname.' '.$reply->lastname); ?></h2>
            <div class="review-date"><?php echo  date('d F Y',strtotime($reply->reply_date)); ?></div>
        </div>
        <div class="review-content" >
            <div id="reviewReplyShort_<?php echo $reply->prr_id;?>">
                <?php echo substr($reply->reply,0,185); ?>
                <?php  $words = substr_count($reply->reply, " ");
                if($words > 30){
                    ?>
                    <small class="text-yellow"></small><a href="javascript:void(0)" id="reviewReplyShortRM_<?php echo $reply->prr_id;?>" onclick="productReviewReplyReadMore('<?php echo $reply->prr_id;?>')">Read More</a>
                <?php } ?>
            </div>
            <div class="review-content" style="display:none" id="reviewReplyFull_<?php echo $reply->prr_id;?>"> <?php echo $reply->reply; ?> <small class="text-yellow"><a href="javascript:void(0)" id="reviewReplyShortRS_<?php echo $reply->prr_id;?>" onclick="productReviewReplyReadShort('<?php echo $reply->prr_id;?>')">Read Short</small></a> </div>

        </div>
    </div>
<?php } ?>
</div>

<!--review row end-->
<?php } ?>
<div id="pagination-div-id" class="dataTables_paginate paging_simple_numbers"><?php echo $page_link; ?></div>
<?php }else{?> 
    <div class="review-row"><h4>No result found..!!</h4></div>


<?php } ?>




</div>


</div>


</div>
<!--center end-->


<!--right start-->
<div class="review-right">

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
        <div class="score-content">
        </div>
        <button class="score-btn">View report</button>
    </div>



</div>
<!--right end-->

</div>
<!--end-->


<!-- <div class="helpful-box">
    <div class="container">
        <div id="summernote"></div>
        <h2 class="helpful-title">You might find this helpful!</h2>

        <div class="helpful-inner-box d-flex">
            <div class="helpful-left">
            </div>

            <div class="helpful-center">
                <h3>Article topic title related to Search “Byju’s”</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                the indus.....</p>
            </div>

            <div class="helpful-right">
                <a href="#" class="d-flex flex-wrap justify-content-center align-items-center text-center">Quick
                    Read<br /> 1 min</a>
                </div>
            </div>

        </div>
    </div> -->

    <!-- <div class="add-review-box">
        <div class="container">
            <div class="reply-box">
                <div class="reply-editor">
                    <img src="images/editor.png" alt="">
                </div>
                <div class="reply-footer d-flex flex-wrap justify-content-between align-items-center">
                    <div class="reply-footer-left">
                        <div class="checkbox-col">
                            <div class="checkbox">
                                <input type="checkbox" value="" id="checkbox-2"><label for="checkbox-2"></label>
                            </div>
                            Get updates on this discussion
                        </div>
                    </div>
                    <div class="reply-footer-right"><button type="submit" class="reply-footer-btn">Post</button></div>
                </div>
            </div>

        </div>
    </div> -->

</div>
<!--content end-->

<!-- <script src="<?php echo base_url(); ?>assets/js/ajax/manage_review_ajax.js"></script> -->

<script>
    $(document).ready(function() {
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

        $('#board').change(function(){
            var brand_id = $('#brand').val();
            var product_type = $('input[name="product_type"]:checked').val();
            var board_id = $('#board').val();
            //alert(product_type);
            if(board_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>get-class-list",
                    method:"POST",
                    data:{board_id:board_id,product_type:product_type,brand_id:brand_id},
                    success:function(data)
                    {
                        $('#class').html(data);
                    }
                });
            }
        });

        $('#class').change(function(){
            var brand_id = $('#brand').val();
            var product_type = $('input[name="product_type"]:checked').val();
            var board_id = $('#board').val();
            var class_id = $('#class').val();
            if(class_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>get-batch-class",
                    method:"POST",
                    data:{board_id:board_id,product_type:product_type,brand_id:brand_id,class_id:class_id},
                    success:function(data)
                    {
                        $('#batch').html(data);
                    }
                });
            }
        }); 



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

    function productReviewReadMore(val){
//Forward browser to new url
        $("#reviewShort_"+val).hide();
        $("#review-read_"+val).hide();
        $("#reviewFull_"+val).show();


    }
    function productReviewReadShort(val){
//Forward browser to new url
        $("#reviewFull_"+val).hide();
        $("#reviewShort_"+val).show();
        $("#review-read_"+val).show();

    } 

    function productReviewReplyReadMore(val){
//Forward browser to new url
        $("#reviewReplyShort_"+val).hide();
        $("#reviewReplyFull_"+val).show();

    }
    function productReviewReplyReadShort(val){
//Forward browser to new url
        $("#reviewReplyFull_"+val).hide();
        $("#reviewReplyShort_"+val).show();

    }

    function divShow(val){
//Forward browser to new url
        if($('#commentDiv_'+val).css('display') == 'none')
        {
            $('#commentDiv_'+val).css('display', 'block');
        }else{
            $('#commentDiv_'+val).css('display', 'none');
        }

    }

    function productReviewLike(complaint_id,user_id,action)
    {       
// alert(review_id+' '+user_id);  
//$(".alert-outline-success").hide();
//$("#text-message-success").html(''); 
//var value_form = $('#product_review').serialize();          
        $.ajax({
            url: base_url+'complaint-like',
            dataType: 'json',
            type: 'post',            
            data: {complaint_id: complaint_id,user_id:user_id,action:action},                                        
            success: function(data){             
                if(data.status=='1')
                {  
// alert('1'); 
                    location.reload();                 
                }
                else if(data.status=='0')
                {
//alert('0'); 
                }            
            },
            beforeSend: function () {
                $("#global-loader").show();
                $("#body").addClass('opacity-body');
            },
            complete: function () {
                $("#global-loader").hide();
                $("#body").removeClass('opacity-body');
            }         });                 

    }

function productReviewReply(id){       // alert();  
//$(".alert-outline-success").hide();
//$("#text-message-success").html(''); 
    var value_form = $('#product_review_reply_'+id).serialize();          $.ajax({
        url: base_url+'complaint-reply-submit',
        dataType: 'json',
        type: 'post',            
        data: value_form,                                         
        success: function(data){             
            if(data.status=='1')
            {  
                $("#reg-message-success_"+id).show();
                $("#text-message-success_"+id).html(data.message);                   
                setTimeout(function() {
                    $("#reg-message-success_"+id).hide();
                    $("#text-message-success_"+id).html('');
                    $("#reg-message-success_"+id).hide('blind', {}, 500)
                }, 5000);                 
            }
            else if(data.status=='0')
            {  
                $("#reg-message-error_"+id).show();              
                $("#text-message-error_"+id).html(data.message);
                setTimeout(function() {
                    $("#reg-message-error_"+id).hide();              
                    $("#text-message-error_"+id).html('');
                    $("#reg-message-error_"+id).hide('blind', {}, 500)
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
        }         });                 

}

function prodcutType(val){
    //Some code
    //alert(val);
    var product_type = val;
    var brand_id = $('#brand').val();

    if(product_type == 1){
        $("#offline-toggle").removeClass('active');
        $("#online-toggle").addClass('active');

    }else{
        $("#online-toggle").removeClass('active');
        $("#offline-toggle").addClass('active');
    }

    $.ajax({
            url: base_url+'get-board-list',
            dataType: 'json',
            type: 'post',            
            data: {product_type: product_type,brand_id:brand_id},                                        
            success: function(data) {
                        $('#board').html(data);
                        // $('#city').html('<option value="">Select City</option>');
                    },
            beforeSend: function () {
                $("#global-loader").show();
                $("#body").addClass('opacity-body');
            },
            complete: function () {
                $("#global-loader").hide();
                $("#body").removeClass('opacity-body');
            }         }); 
}
</script>