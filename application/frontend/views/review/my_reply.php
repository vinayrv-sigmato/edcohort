<?php $course = $this->input->get('course'); 
$brandID = $this->input->get('brand');
$product_type = $this->input->get('product_type');
$board = $this->input->get('board');
$class = $this->input->get('class');
$batch = $this->input->get('batch');
$customer_rating = $this->input->get('customer_rating');
$date_posted = $this->input->get('date_posted');
$sort_by = $this->input->get('sort_by');
   // print_ex($_GET);
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
            <li><a href="<?php echo base_url(); ?>complaint?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Complaint </a></li>
            <li><a href="<?php echo base_url(); ?>comparison?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Compare </a></li>
            <li><a href="<?php echo base_url(); ?>counselling?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Counselling </a></li>
            <li><a href="<?php echo base_url(); ?>cohort?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Cohort</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>review?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Reviews <?php echo $review_count; ?></a></li>
            <li><a href="<?php echo base_url(); ?>coupon?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Coupons</a></li>
        </ul>
    </div>

</div>
<!--banner end-->


<!--content start-->
<div class="content">
    <?php $course = $this->input->get('course'); ?>
    <!--start-->
    <div class="review-main-box d-flex">


        <!--center start-->
        <div class="review-center">

          <div class="review-btn-box">
             <?php if($this->session->userdata('user_id')){ ?>
                <a href="<?php echo base_url();?>write-a-review?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>" class="review-btn">
                    <img src="<?php echo base_url();?>assets/images/review-icon2.png" alt=""> Write a review
                </a>
            <?php } else{ ?>
                <a href="javascript:void(0)" class="review-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button">
                    <img src="<?php echo base_url();?>assets/images/review-icon2.png" alt="" >Write a review
                </a>
            <?php } ?>
        </div>
        <div class="review-inner-center">

            <div class="tab-link">

                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>review?course=<?php echo $course; ?>">All</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>my-review?course=<?php echo $course; ?>">My Review</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>my-review-reply?course=<?php echo $course; ?>" class="active">My replies</a>
                    </li>
                </ul>

            </div>


            <div class="total-review">
                <?php echo $review_count;?> Review<?php if($review_count > 1){ echo "s"; } ?> 
            </div>

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
                                $date    = strtotime($review->product_review_added);
                                $today = '';
                                $datediff = $date - $current;
                                $difference = floor($datediff/(60*60*24));
                                if($difference==0)
                                {
                                    $today = 'today';
                                } ?>
                                <div class="review-date <?php echo $today ?>"> <?php if(!empty($today)){ echo "Today"; }else{ echo date('d F Y',strtotime($review->product_review_added));  }?> </div>
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
                            <div class="review-content" id="reviewShort_<?php echo $review->product_review_id;?>">
                                <?php echo substr($review->product_review,0,185); ?>
                            </div>
                            <?php  $words = substr_count($review->product_review, " ");
                            if($words > 30){
                                ?>
                                <div class="review-read" id="review-read_<?php echo $review->product_review_id;?>"><a href="javascript:void(0)" id="reviewShortRM_<?php echo $review->product_review_id;?>" onclick="productReviewReadMore('<?php echo $review->product_review_id;?>')">(Read more)</a></div>
                            <?php } ?>

                            <div class="review-content" style="display:none" id="reviewFull_<?php echo $review->product_review_id;?>"> <?php echo $review->product_review; ?> <div class="review-read"><a href="javascript:void(0)" id="reviewShortRS_<?php echo $review->product_review_id;?>" onclick="productReviewReadShort('<?php echo $review->product_review_id;?>')">(Read Short)</div></a> </div>

                            <div class="review-footer d-flex flex-wrap justify-content-between align-items-center">
                                <?php 
                                $where_review_reply = 'tbl_product_review_reply.status = 1 and review_id = '.$review->product_review_id.'';
                                $orderby = 'tbl_customer.customer_type ASC, tbl_product_review_reply.prr_id ASC';
                                $review_reply = $this->review_model->selectJoinWhereOrderby('tbl_product_review_reply','user_id','tbl_customer','customer_id',$where_review_reply,$orderby);
                                ?>
                                <div class="review-footer-left"><?php echo sizeof($review_reply); ?> Replies <a href="#">Go to discussion page</a></div>

                                <div class="review-footer-right d-flex">
                                    <?php 
                                    $likeCount = 0;
                                    $likeCountCheck =0;

                                    $where_like = 'review_id = '.$review->product_review_id.' and action = 1';
                                    $review_reply_cnt = $this->review_model->review_like_count($where_like);
                                    $likeCount = $review_reply_cnt['0']->like_count;
                                    
                                    if($this->session->userdata('user_id')){

                                        $where_like_check = 'review_id = '.$review->product_review_id.' and user_id = '.$this->session->userdata('user_id').' and action = 1';
                                        $review_reply_check = $this->review_model->review_like_count($where_like_check);
                                    //echo  $this->db->last_query();
                                        $likeCountCheck = $review_reply_check['0']->like_count; 
                                    }?>
                                    <?php if($this->session->userdata('user_id')){ ?>
                                      <?php if($likeCount > 0 ){ ?> 
                                        <a href="javascript:void(0)" onclick="productReviewLike('<?php echo $review->product_review_id;?>','<?php echo $this->session->userdata('user_id'); ?>',1)">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Filled" class="fa fa-thumbs-up <?php if($likeCountCheck == 1){ echo 'active-svg';} ?>" viewBox="0 0 24 24" width="24" height="24"><path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z"/></svg> <?php   echo $likeCount; ?>
                                        </a>
                                    <?php } ?>
                                    <?php if($likeCount < 1 ) { ?>
                                        <a href="javascript:void(0)" onclick="productReviewLike('<?php echo $review->product_review_id;?>','<?php echo $this->session->userdata('user_id'); ?>',1)">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="24" height="24"><path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"/></svg> <?php echo $likeCount; ?>
                                        </a>
                                    <?php } ?>
                                <?php }else{ ?>   
                                    <a href="javascript:void(0)" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Outline"  viewBox="0 0 24 24" width="24" height="24"><path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"/></svg> <?php echo $likeCount; ?>
                                    </a>
                                <?php } ?>
                                <?php if($this->session->userdata('user_id')){ ?>
                                    <a href="javascript:void(0)" onclick="divShow(<?php echo $review->product_review_id;?>);">
                                       <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="24" height="24"><path d="M11,9.5v3.5c0,2.206-1.794,4-4,4-.552,0-1-.447-1-1s.448-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5Zm5.5-1.5h-1.5c-1.105,0-2,.895-2,2v1.5c0,.828,.672,1.5,1.5,1.5h1.5c0,1.103-.897,2-2,2-.553,0-1,.447-1,1s.447,1,1,1c2.206,0,4-1.794,4-4v-3.5c0-.828-.672-1.5-1.5-1.5Zm7.5,4.34v6.66c0,2.757-2.243,5-5,5h-5.917C6.082,24,.47,19.208,.03,12.854-.211,9.378,1.057,5.977,3.509,3.521,5.96,1.066,9.364-.202,12.836,.028c6.26,.426,11.164,5.833,11.164,12.312Zm-2,0c0-5.431-4.085-9.962-9.299-10.315-.229-.016-.458-.023-.685-.023-2.657,0-5.209,1.049-7.092,2.934-2.043,2.046-3.1,4.882-2.899,7.781,.373,5.38,5.023,9.284,11.058,9.284h5.917c1.654,0,3-1.346,3-3v-6.66Z"/></svg> Reply
                                   </a>
                               <?php }else{ ?>
                                 <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#login-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="24" height="24"><path d="M12.836,.028C9.364-.202,5.96,1.066,3.509,3.521,1.057,5.977-.211,9.378,.03,12.854c.44,6.354,6.052,11.146,13.053,11.146h5.917c2.757,0,5-2.243,5-5v-6.66C24,5.861,19.097,.454,12.836,.028Zm-1.836,12.972c0,2.206-1.794,4-4,4-.552,0-1-.447-1-1s.448-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5v3.5Zm7,0c0,2.206-1.794,4-4,4-.553,0-1-.447-1-1s.447-1,1-1c1.103,0,2-.897,2-2h-1.5c-.828,0-1.5-.672-1.5-1.5v-1.5c0-1.105,.895-2,2-2h1.5c.828,0,1.5,.672,1.5,1.5v3.5Z"/></svg> Reply
                                </a>
                            <?php } ?>
                            <a href="#" class="share-button">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="24" height="24"><path d="M19.333,14.667a4.66,4.66,0,0,0-3.839,2.024L8.985,13.752a4.574,4.574,0,0,0,.005-3.488l6.5-2.954a4.66,4.66,0,1,0-.827-2.643,4.633,4.633,0,0,0,.08.786L7.833,8.593a4.668,4.668,0,1,0-.015,6.827l6.928,3.128a4.736,4.736,0,0,0-.079.785,4.667,4.667,0,1,0,4.666-4.666ZM19.333,2a2.667,2.667,0,1,1-2.666,2.667A2.669,2.669,0,0,1,19.333,2ZM4.667,14.667A2.667,2.667,0,1,1,7.333,12,2.67,2.67,0,0,1,4.667,14.667ZM19.333,22A2.667,2.667,0,1,1,22,19.333,2.669,2.669,0,0,1,19.333,22Z"/></svg> Share
                                <div class="sharethis-inline-share-buttons"></div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-5" style="display:none" id="commentDiv_<?php echo $review->product_review_id; ?>">
                            <div class="alert alert-outline alert-outline-success reg-message-success" id="reg-message-success_<?php echo $review->product_review_id; ?>" role="alert"  style="display:none;">
                                <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                                <p id="text-message-success_<?php echo $review->product_review_id; ?>"></p>
                            </div>
                            <div class="alert alert-outline alert-outline-danger reg-message-error" id="reg-message-error_<?php echo $review->product_review_id; ?>" role="alert" style="display:none">
                                <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                                <p id="text-message-error_<?php echo $review->product_review_id; ?>"></p>
                            </div>
                            <form class="form-horizontal" name="product_review_reply_<?php echo $review->product_review_id; ?>"  id="product_review_reply_<?php echo $review->product_review_id; ?>" action="javascript:void(0)"  method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" class="form-control" name="product_id" id="product_id" placeholder="Your Name" value="<?php echo $course; ?>">
                                <input type="hidden" class="form-control" name="user_id" id="userid" placeholder="Your Name"  value="<?php echo $this->session->userdata('user_id'); ?>">
                                <input type="hidden" class="form-control" name="review_id"  id="review_id_<?php echo $review->product_review_id; ?>" placeholder="Your Name"   value="<?php echo $review->product_review_id; ?>">
                                <div class="form-group">
                                    <textarea class="form-control" name="comment" rows="6" placeholder="Comment" required="required"  maxlength="250"></textarea>
                                </div>
                                <?php if ($this->session->userdata('user_id')) { ?>
                                    <a href="javascript:void(0)" class="btn btn-primary" id="review_reply_submit"  onclick="productReviewReply(<?php echo $review->product_review_id; ?>)"> Reply</a>
                                <?php }else{ ?>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#exampleModal3"> Reply</a>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                    <div class="reply-box">
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
                                                    <small class="review-read remove-bg"><a href="javascript:void(0)" id="reviewReplyShortRM_<?php echo $reply->prr_id;?>" onclick="productReviewReplyReadMore('<?php echo $reply->prr_id;?>')"> (Read More)</a></small>
                                                <?php } ?>
                                            </div>
                                            <div class="review-content remove-bg" style="display:none" id="reviewReplyFull_<?php echo $reply->prr_id;?>"> <?php echo $reply->reply; ?> <small class="review-read"><a href="javascript:void(0)" id="reviewReplyShortRS_<?php echo $reply->prr_id;?>" onclick="productReviewReplyReadShort('<?php echo $reply->prr_id;?>')">(Read Short)</a></small> </div>

                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!--review row end-->
                    <?php } ?>
                <?php }else{?> 
                    <div class="review-row"><h4>No result found..!!</h4></div>
                    
                    
                <?php } ?>

            </div>












        </div>


    </div>
    <!--center end-->

</div>
<!--end-->




</div>
<!--content end-->





</div>
<!--wrapper end-->


<!--Star Rating Modal -->
<div class="modal rateModal-box fade" id="rateModal" tabindex="-1" aria-labelledby="rateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">

                <h2 class="rateModal-title">How would you like to rate BYJU's?</h2>
                <div class="rateModal-container">

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">How was your experience with BYJU’s</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Faculty</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Customer support</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Refund policy</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Ease of use</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Aspect 6</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Aspect 7</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="rate-row d-flex justify-content-between align-items-center">
                        <div class="rate-col rate-title">Aspect 8</div>

                        <div class="rate-col d-flex">
                            <div class="rate-rating"><img src="images/rate-rating.png" alt=""></div>
                            <button type="button" class="rate-close"><img src="images/close2.png" alt=""></button>
                        </div>
                    </div>

                    <div class="editor-box">
                        <p class="editor-title">(Optional)</p>
                        <div class="editor-inner-box">
                            <img src="images/editor3.png" alt="">
                        </div>
                    </div>

                    <div class="rate-checkbox checkbox-col">
                        <div class="checkbox">
                            <input type="checkbox" value="" id="checkbox-2"><label for="checkbox-2"></label>
                        </div>
                        Get updates on this discussion
                    </div>

                    <div>
                        <button type="button" class="rate-submit-btn">Submit</button>
                    </div>



                </div>

            </div>


        </div>
    </div>
</div>



<!--libs-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->

<!--plugin js-->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/ScrollToFixed/1.0.8/jquery-scrolltofixed-min.js'></script>

<script src="js/script.js"></script> -->
<script>
 $(document).ready(function() {
     
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
     
     function viewRepliesAll(val){
         if($('.review_reply_'+val).css('display') == 'none')
         {
             $('.review_reply_'+val).css('display', 'block');
         }else{
             $('.review_reply_'+val).css('display', 'none');
         }
     }
     
     function productReviewLike(review_id,user_id,action)
     {       
   // alert(review_id+' '+user_id);  
   //$(".alert-outline-success").hide();
   //$("#text-message-success").html(''); 
   //var value_form = $('#product_review').serialize();          
         $.ajax({
             url: base_url+'review-like',
             dataType: 'json',
             type: 'post',            
             data: {review_id: review_id,user_id:user_id,action:action},                                        
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
     var value_form = $('#product_review_reply_'+id).serialize();
     $.ajax({
         url: base_url+'review-reply-submit',
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
                     location.reload(); 
                 }, 10000);
                 
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
});

</script>
<script>
    $('.btn-toggle').click(function () {

        if ($(this).find('.btn-primary').length > 0) {
            $(this).find('.btn').toggleClass('btn-primary');
        }


    });

    $(".filter-btn").click(function () {
        $(".review-left").toggleClass("open");
        $(".filter-btn").toggleClass("open");
    });

</script>


</body>

</html>