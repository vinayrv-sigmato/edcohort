<!--Topbar-->
    <div class="header-main"> 
        <!--Section-->
        <div class="cover-image bg-background-1" data-bs-image-src="assets/images/banners/banner1.jpg">
        <section>
          <div class="sptb-2 bannerimg">
            <div class="header-text mb-0">
              <div class="container">
                <div class="text-center text-white py-7">
                  <h1 class="">Edit Profile</h1>
                  <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Edit Profile</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </section><!--/Section-->
      </div>
    </div>
</div>
    <!-- Shape Start -->
        <div class="relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmsns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="#f5f4f9"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

<?php //echo message(); ?>


<!--User Profile-->
    <section class="sptb  profile-1">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body pattern-2">
                <div class="wideget-user">
                  <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="wideget-user-desc text-center">
                        <div class="wideget-user-img">
                          <img class="brround" src="<?php echo base_url(); ?>uploads/user/<?php echo $customer_list['0']->image; ?>" alt="img" width="150">
                        </div>
                        <div class="user-wrap wideget-user-info">
                          <a href="javascript:void(0)"><h4 class="font-weight-semibold text-white"><?php echo ucfirst($customer_list['0']->firstname).' '.ucfirst($customer_list['0']->lastname); ?></h4></a>
                          <span class="text-white">Member Since <?php echo date('M Y',strtotime($customer_list['0']->date_added)); ?></span>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-lg-12 col-md-12 text-center">
                      <div class="wideget-user-info ">
                        <div class="wideget-user-icons mt-2">
                          <a href="javascript:void(0)" class="mt-0"><i class="fa fa-facebook"></i></a>
                          <a href="javascript:void(0)" class=""><i class="fa fa-twitter"></i></a>
                          <a href="javascript:void(0)" class=""><i class="fa fa-google"></i></a>
                          <a href="javascript:void(0)" class=""><i class="fa fa-dribbble"></i></a>
                          <a href="javascript:void(0)" class=""><i class="fa fa-share"></i></a>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="">
              <div class="ps-0 pb-5">
                <div class="wideget-user-tab">
                  <div class="tab-menu-heading">
                    <div class="tabs-menu1">
                      <ul class="nav">
                        <li class="ms-0"><a href="#tab-1" class="active ms-0" data-bs-toggle="tab">Profile</a></li>
                        <li><a href="#tab-2" data-bs-toggle="tab" class="">Change Password</a></li>
                        <li><a href="#tab-3" data-bs-toggle="tab" class="">Change Image</a></li>
                        <li><a href="#tab-4" data-bs-toggle="tab" class="">Reviews</a></li>
                        <li><a href="#tab-5" data-bs-toggle="tab" class="">Complaint</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php echo message(); ?>
            <div class="alert alert-outline alert-outline-success edit-message-success" id="#edit-message-success" role="alert" style="display:none;"><button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button><p id="text-message-edit-success"></p></div>
            <div class="alert alert-outline alert-outline-danger edit-message-error" id="#edit-message-error"  role="alert" style="display:none"><button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button><p id="text-message-edit-error"></p></div>
                                                    
            <div class="border-0">
              <div class="tab-content">
                <div class="tab-pane active" id="tab-1">
                  <div class="card mb-0">
                    <div class="card-body">
                      <div class="profile-log-switch">
                        <div class="media-heading">
                          <h3 class="card-title mb-3 font-weight-bold card-header">Personal Details</h3>
                        </div>
                        <form class="form-horizontal" action="javascript:void(0)" id="profile_form" method="post" name="validate_profile" enctype="multipart/form-data">
                          <div class="info-detail">
                            <div class="card-body">
                              <?php echo csrf_field(); ?>
                              <div class="box-body">                  
                                <div class="form-group">
                                 <div class="row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">First Name *</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control radius-flat" name="userfirstname" id="userfirstname" value="<?php echo $customer_list['0']->firstname; ?>" placeholder="First Name" maxlength="50" onkeypress="">
                                  </div>
                                 </div>
                                </div>
                                <div class="form-group">
                                <div class="row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Last Name </label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control radius-flat" name="userlastname" id="userlastname" value="<?php echo $customer_list['0']->lastname; ?>" placeholder="Last Name" maxlength="50" onkeypress="">
                                  </div>
                                </div>
                                </div>
                                <div class="form-group">
                                 <div class="row">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Phone No*</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control radius-flat" name="phone" id="phone"  value="<?php echo $customer_list['0']->phone; ?>" required placeholder="Phone" maxlength="13">
                                  </div>
                                 </div>
                                </div>
                                <div class="form-group">
                                 <div class="row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email*</label>                            
                                  <div class="col-sm-8">
                                    <input type="email" readonly="" class="form-control radius-flat" id="email" value="<?php echo $customer_list['0']->email; ?>" name="email" required placeholder="Email" maxlength="40">
                                  </div>
                                 </div>
                                </div>                    
                              </div>             
                            </div>
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary mt-3" onclick="editProfile()">Update</button>
                              <button type="button" class="btn btn-light mt-3" onclick="window.history.back()">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane userprof-tab" id="tab-2">
                  <div class="card mb-0">
                    <div class="card-body">
                      <div class="profile-log-switch">
                        <div class="media-heading">
                          <h3 class="card-title mb-3 font-weight-bold card-header">Update Password</h3>
                        </div>
                        <form class="form-horizontal" action="javascript:void(0)" id="update_password_form" method="post">
                          <div class="update-password">
                            <div class="panel-body">
                              <?php echo csrf_field(); ?>
                              <div class="card-body">                    
                                <div class="form-group">
                                  <div class="row">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Current Password*</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control radius-flat" name="oldpassword" id="oldpassword" required >
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                   <div class="row">
                                    <label for="inputEmail3" class="col-sm-3 control-label">New Password*</label>
                                    <div class="col-sm-8">
                                      <input type="password" class="form-control radius-flat" name="newpassword" id="newpassword" required >
                                    </div>
                                   </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Confirm Password*</label>
                                    <div class="col-sm-8">
                                      <input type="password" class="form-control radius-flat" name="cnfpassword" id="cnfpassword" required >
                                    </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                  <div class="col-md-12">                      
                                    <div class="text-danger" id="password_message"></div>
                                  </div>
                                </div>                 
                              </div>            
                            </div>
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary mt-3" onclick="updatePassword()">Update</button>
                              <button type="button" class="btn btn-light mt-3" onclick="window.history.back()">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab-3">
                  <div class="card mb-0">
                    <div class="card-body">
                      <div class="profile-log-switch">
                        <div class="media-heading">
                          <h3 class="card-title mb-3 font-weight-bold card-header">Profile Pic</h3>
                        </div>
                        <form class="form-horizontal" action="<?php echo base_url(); ?>edit-image-submit" id="profile_image_form" method="post" name="profile_image_form" enctype="multipart/form-data">
                          <div class="info-detail">
                            <div class="card-body">
                              <?php echo csrf_field(); ?>
                              <div class="box-body">                  
                                <div class="form-group">
                                 <div class="row">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Image *</label>
                                  <div class="col-sm-8">
                                    <input type="file" id="profile_image" name="profile_image" required accept="jpg,jpeg,png"/>
                                  </div>
                                 </div>
                                </div>          
                              </div>             
                            </div>
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary mt-3" onclick="editImage()">Update</button>
                              <button type="button" class="btn btn-light mt-3" onclick="window.history.back()">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane userprof-tab" id="tab-4">
                  <div class="card  bg-transparent border-0 shadow-none mb-0">
                    <div class="card-body p-0 ">
                      <?php //print_ex($review_records); ?>
                      <?php foreach($review_records as $review){ ?>
                      <div class="media mb-5 p-5 border br-7 bg-white review-media">
                        
                        <div class="media-body">
                          <h4 class="mt-0 mb-1 font-weight-semibold"><?php echo $review->brand_name.' > '.$review->class_name.' > '.$review->product_name; ?>
                            <span class="fs-14 float-end ">
                              <?php if($review->product_rating == 1){ ?>
                              <i class="fa fa-star text-yellow"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                              <?php } ?>
                              <?php if($review->product_rating == 2){ ?>
                              <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                              <?php } ?>
                              <?php if($review->product_rating == 3){ ?>
                              <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                              <?php } ?>
                              <?php if($review->product_rating == 4){ ?>
                              <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star-o"></i>
                              <?php } ?>
                              <?php if($review->product_rating == 5){ ?>
                              <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>
                              <?php } ?>
                            </span>
                          </h4>
                          <small class="text-muted fs-14">
                            <i class="fa fa-clock-o"></i>  Reviewed  <?php echo  date('d-m-Y',strtotime($review->product_review_added)); ?>
                          </small>
                          <p class="font-13 fs-15 mb-2 mt-2">
                            <b><?php echo $review->product_review_title; ?></b>

                          </p>
                          
                          
                           <p class="font-13 fs-15 mb-2 mt-2 review-tag" id="reviewShort_<?php echo $review->product_review_id;?>"> <?php echo substr($review->product_review,0,85); ?>
                              <?php  $words = substr_count($review->product_review, " ");
                                  if($words > 30){
                              ?>
                             <small class="text-yellow">Read More</small><a href="javascript:void(0)" id="reviewShortRM_<?php echo $review->product_review_id;?>" onclick="productReviewReadMore('<?php echo $review->product_review_id;?>')">Read More</a>
                            <?php } ?>
                          </p>
                          <p class="font-13 fs-15 mb-2 mt-2 review-tag" style="display:none" id="reviewFull_<?php echo $review->product_review_id;?>"> <?php echo $review->product_review; ?> <small class="text-yellow"><a href="javascript:void(0)" id="reviewShortRS_<?php echo $review->product_review_id;?>" onclick="productReviewReadShort('<?php echo $review->product_review_id;?>')">Read Short</small></a> </p>
                           <p>
                            <?php if($review->product_review_type == 2){
                                                    if(!empty($review->media)){
                                                   ?>
                            <audio controls>
                              <source src="<?php echo base_url(); ?>uploads/review/<?php echo $review->media ?>" type="audio/mpeg">
                              Your browser does not support the audio tag. </audio>
                            <?php } } ?>
                            <?php if($review->product_review_type == 3){
                                                    if(!empty($review->media)){
                                                   ?>
                            <video controls width="250">
                              <source src="<?php echo base_url(); ?>uploads/review/<?php echo $review->media ?>"
                                            type="video/mp4">
                              Sorry, your browser doesn't support embedded videos. </video>
                            <?php } } ?>
                          </p>

                              <?php 
                            $where_like = 'review_id = '.$review->product_review_id.' and action = 1';
                            $review_reply = $this->review_model->review_like_count($where_like);
                            $likeCount = $review_reply['0']->like_count;                    
                            
                            $where_dislike = 'review_id = '.$review->product_review_id.' and action = 2';
                            $review_reply_dislike = $this->review_model->review_like_count($where_dislike);
                            $dislikeCount = $review_reply_dislike['0']->like_count;
                            
                            $likeCountCheck = 0;
                            $dislikeCountCheck = 0;
                            if($this->session->userdata('user_id')){
                            $where_like_check = 'review_id = '.$review->product_review_id.' and user_id = '.$this->session->userdata('user_id').' and action = 1';
                            $review_reply_check = $this->review_model->review_like_count($where_like_check);
                             $likeCountCheck = $review_reply_check['0']->like_count;
                             
                             $where_dislike_check = 'review_id = '.$review->product_review_id.' and user_id = '.$this->session->userdata('user_id').' and action = 2';
                            $review_reply_discheck = $this->review_model->review_like_count($where_dislike_check);
                            $dislikeCountCheck = $review_reply_discheck['0']->like_count;
                            
                            }
                            
                            ?>
                        <?php if($this->session->userdata('user_id')){ ?>
                        <a href="javascript:void(0)" class="me-2" onclick="productReviewLike('<?php echo $review->product_review_id;?>','<?php echo $this->session->userdata('user_id'); ?>',1)" ><span class="btn <?php if($likeCountCheck == 1){ echo 'btn-success';}else{ echo 'btn-light';} ?> btn-sm"><i class="fa fa-thumbs-o-up me-2"></i>
                        <?php   echo $likeCount; ?>
                        </span></a>
                        <?php }else{ ?>
                        <a href="javascript:void(0)" class="me-2" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#exampleModal3"><span class="btn <?php if($likeCountCheck == 1){ echo 'btn-success';}else{ echo 'btn-light';} ?> btn-sm"><i class="fa fa-thumbs-o-up me-2"></i>
                        <?php   echo $likeCount; ?>
                        </span></a>
                        <?php } ?>
                        <?php if($this->session->userdata('user_id')){ ?>
                        <a href="javascript:void(0)" class="me-2" onclick="productReviewLike('<?php echo $review->product_review_id;?>','<?php echo $this->session->userdata('user_id'); ?>',2)"><span class="btn <?php if($dislikeCountCheck == 1){ echo 'btn-danger';}else{ echo 'btn-light';} ?> btn-sm"><i class="fa fa-thumbs-o-down me-2"></i>
                        <?php   echo $dislikeCount; ?>
                        </span></a>
                        <?php }else{ ?>
                        <a href="javascript:void(0)" class="me-2" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#"><span class="btn <?php if($dislikeCountCheck == 1){ echo 'btn-danger';}else{ echo 'btn-light';} ?> btn-sm"><i class="fa fa-thumbs-o-down me-2"></i>
                        <?php   echo $dislikeCount; ?>
                        </span></a>
                        <?php } ?>
                        <?php if($this->session->userdata('user_id')){ ?>
                        <a href="javascript:void(0)" class="me-2" onclick="divShow(<?php echo $review->product_review_id;?>);" ><span class="badge badge-default">Comment</span></a>
                        <?php }else{ ?>
                        <a href="javascript:void(0)" class="me-2" data-bs-toggle="modal" data-bs-target="#exampleModal3"><span class="badge badge-default">Comment</span></a>
                        <?php } ?>
                        <div class="mt-5" style="display:none"  id="commentDiv_<?php echo $review->product_review_id;?>">
                          <div class="alert alert-outline alert-outline-success reg-message-success" id="reg-message-success_<?php echo $review->product_review_id;?>" role="alert" style="display:none;">
                            <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            <p id="text-message-success_<?php echo $review->product_review_id;?>"></p>
                          </div>
                          <div class="alert alert-outline alert-outline-danger reg-message-error" id="reg-message-error_<?php echo $review->product_review_id;?>"  role="alert" style="display:none">
                            <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            <p id="text-message-error_<?php echo $review->product_review_id;?>"></p>
                          </div>
                          <form class="form-horizontal" name="product_review_reply_<?php echo $review->product_review_id;?>" id="product_review_reply_<?php echo $review->product_review_id;?>" action="javascript:void(0)" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" class="form-control" name="product_id" id="product_id" placeholder="Your Name" value="<?php echo $review->product_id; ?>">
                            <input type="hidden" class="form-control" name="user_id" id="userid" placeholder="Your Name" value="<?php echo $this->session->userdata('user_id'); ?>">
                            <input type="hidden" class="form-control" name="review_id" id="review_id_<?php echo $review->product_review_id;?>" placeholder="Your Name" value="<?php echo $review->product_review_id; ?>">
                            <div class="form-group">
                              <textarea class="form-control" name="comment" rows="6" placeholder="Comment" required="required" maxlength="250"></textarea>
                            </div>
                            <?php if($this->session->userdata('user_id')){ ?>
                            <a href="javascript:void(0)" class="btn btn-primary" id="review_reply_submit" onclick="productReviewReply(<?php echo $review->product_review_id;?>)">Reply</a>
                            <?php }else{ ?>
                            <a href="javascript:void(0)" class="btn btn-primary" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#exampleModal3">Reply</a>
                            <?php } ?>
                          </form>
                        </div>
                  
                       <?php 
                       $where_review_reply = 'tbl_product_review_reply.status = 1 and review_id = '.$review->product_review_id.'';
                       $orderby = 'tbl_customer.customer_type ASC, tbl_product_review_reply.prr_id ASC';
    $review_reply = $this->review_model->selectJoinWhereOrderby('tbl_product_review_reply','user_id','tbl_customer','customer_id',$where_review_reply,$orderby);
        
            
                    //  print_ex($review_reply);
                    foreach($review_reply as $reply){
                     ?>
                           <div class="media mt-5">
                            <div class="d-flex me-3">
                              <a href="javascript:void(0)"> <img class="media-object brround" alt="64x64" src="<?php echo base_url(); ?>uploads/user/<?php echo $reply->image; ?>"> </a>
                            </div>
                            <div class="media-body">
                              <h4 class="mt-0 mb-1 font-weight-semibold"><?php echo ucfirst($reply->firstname.' '.$reply->lastname); ?> 
                <?php if($reply->customer_type == 1){ ?>
                        <span class="badge badge-primary"> Company's Reply </span>
                        <?php } ?> </h4>
                              <small class="text-muted fs-14">
                                <i class="fa fa-clock-o"></i>  Reviewed <?php echo  date('d-m-Y',strtotime($reply->reply_date)); ?>
                                <i class=" ms-3 fa fa-envelope-o"></i> <?php echo hideEmailAddress($reply->email); ?><i class=" ms-3 fe fe-phone"></i>
                      <?php $mobnum = $reply->phone;
for($i=2;$i<8;$i++)
{
  $mobnum = substr_replace($mobnum,"*",$i,1);
}
echo $mobnum;

 ?>
                              </small>                              
                              <p class="font-13  mb-2 mt-2 review-tag" id="reviewReplyShort_<?php echo $reply->prr_id;?>"> <?php echo substr($reply->reply,0,85); ?>
                        <?php  $words = substr_count($reply->reply, " ");
                              if($words > 30){
                          ?>
                        <small class="text-yellow">Read More</small><a href="javascript:void(0)" id="reviewReplyShortRM_<?php echo $reply->prr_id;?>" onclick="productReviewReplyReadMore('<?php echo $reply->prr_id;?>')">Read More</a>
                        <?php } ?>
                      </p>
                          <p class="font-13  mb-2 mt-2 review-tag" style="display:none" id="reviewReplyFull_<?php echo $reply->prr_id;?>"> <?php echo $reply->reply; ?> <small class="text-yellow"><a href="javascript:void(0)" id="reviewReplyShortRS_<?php echo $reply->prr_id;?>" onclick="productReviewReplyReadShort('<?php echo $reply->prr_id;?>')">Read Short</small></a> </p>
                             
                            </div>
                          </div>
                           <?php } ?>
                        </div>
                      </div>
                      <?php } ?>

                    </div>
                  </div>
                </div>
                <div class="tab-pane userprof-tab" id="tab-5">
                  <div class="card  bg-transparent border-0 shadow-none mb-0">
                    <div class="card-body p-0 ">
                    <?php foreach($complaint_records as $complaint){ ?>
                      <div class="media mb-5 p-5 border br-7 bg-white review-media">
                       
                        <div class="media-body">
                          <h4 class="mt-0 mb-1 font-weight-semibold"><?php echo $complaint->firstname.' '.$complaint->lastname;?>
                            <span class="fs-14 float-end ">
                              <?php if($complaint->product_rating == 1){ ?>
                                <i class="fa fa-star text-yellow"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                <?php } ?>
                                <?php if($complaint->product_rating == 2){ ?>
                                <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                <?php } ?>
                                <?php if($complaint->product_rating == 3){ ?>
                                <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                <?php } ?>
                                <?php if($complaint->product_rating == 4){ ?>
                                <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star-o"></i>
                                <?php } ?>
                                <?php if($complaint->product_rating == 5){ ?>
                                <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i>
                                <?php } ?>
                            </span>
                          </h4>
                          <small class="text-muted fs-14">
                            <i class="fa fa-clock-o"></i>  Complaint <?php echo  date('d-m-Y',strtotime($complaint->product_complaint_added)); ?>
                          </small>
                           <h5 class="pt-2"><?php echo $complaint->product_complaint_title; ?></h5>
                          
                          <p class="font-13 fs-15 mb-2 mt-2 review-tag" id="complaintShort_<?php echo $complaint->product_complaint_id;?>"> <?php echo substr($complaint->product_complaint,0,85); ?>
                    <?php  $words = substr_count($complaint->product_complaint, " ");
                          if($words > 30){
                      ?>
                    <small class="text-yellow">Read More</small> <a href="javascript:void(0)" id="complaintShortRM_<?php echo $complaint->product_complaint_id;?>" onclick="productComplaintReadMore('<?php echo $complaint->product_complaint_id;?>')">Read More</a>
                    <?php } ?>
                  </p>
                  <p class="font-13 fs-15 mb-2 mt-2 review-tag" style="display:none" id="complaintFull_<?php echo $complaint->product_complaint_id;?>"> <?php echo $complaint->product_complaint; ?> <a href="javascript:void(0)" id="complaintShortRS_<?php echo $complaint->product_complaint_id;?>" onclick="productComplaintReadShort('<?php echo $complaint->product_complaint_id;?>')">Read Short</a> </p>
                  <p>
                         
                         <p>
                    <?php if($complaint->product_complaint_type == 2){
                                            if(!empty($complaint->media)){
                                           ?>
                    <audio controls>
                      <source src="<?php echo base_url(); ?>uploads/complaint/<?php echo $complaint->media ?>" type="audio/mpeg">
                      Your browser does not support the audio tag. </audio>
                    <?php } } ?>
                    <?php if($complaint->product_complaint_type == 3){
                                            if(!empty($complaint->media)){
                                           ?>
                    <video controls width="250">
                      <source src="<?php echo base_url(); ?>uploads/complaint/<?php echo $complaint->media ?>"
                                    type="video/mp4">
                      Sorry, your browser doesn't support embedded videos. </video>
                    <?php } } ?>
                  </p>
                       <?php if($complaint->complaint_resolved == 1){ ?>
                  <a href="javascript:void(0)" class="me-2"><span class="badge badge-default">Resolved</span></a> 
                  <?php } ?>
                  <?php if($complaint->complaint_resolved == 0){ ?>
                  <a href="javascript:void(0)" class="me-2" >Unresolved Since <i class="fe fe-calendar"></i>  
          <?php  $date = $complaint->product_complaint_added;
                       $start  = date_create($date);
              $end    = date_create(); // Current time and date
              $diff   = date_diff( $start, $end );
              
              //echo 'The difference is ';
              
               echo  $diff->d . ' days '; 

?> </span></a>
                  <?php } ?>

                       <?php 
                    $where_like = 'complaint_id = '.$complaint->product_complaint_id.' and action = 1';
                    $complaint_reply = $this->complaint_model->complaint_like_count($where_like);
                    $likeCount = $complaint_reply['0']->like_count;                   
                    
                    $where_dislike = 'complaint_id = '.$complaint->product_complaint_id.' and action = 2';
                    $complaint_reply_dislike = $this->complaint_model->complaint_like_count($where_dislike);
                    $dislikeCount = $complaint_reply_dislike['0']->like_count;
                    
                    $likeCountCheck = 0;
                    $dislikeCountCheck = 0;
                    if($this->session->userdata('user_id')){
                    $where_like_check = 'complaint_id = '.$complaint->product_complaint_id.' and user_id = '.$this->session->userdata('user_id').' and action = 1';
                    $complaint_reply_check = $this->complaint_model->complaint_like_count($where_like_check);
                     $likeCountCheck = $complaint_reply_check['0']->like_count;
                     
                     $where_dislike_check = 'complaint_id = '.$complaint->product_complaint_id.' and user_id = '.$this->session->userdata('user_id').' and action = 2';
                    $complaint_reply_discheck = $this->complaint_model->complaint_like_count($where_dislike_check);
                    $dislikeCountCheck = $complaint_reply_discheck['0']->like_count;
                    
                    }
                    
                    ?>
                  <?php if($this->session->userdata('user_id')){ ?>
                  <a href="javascript:void(0)" class="me-2" onclick="productComplaintLike('<?php echo $complaint->product_complaint_id;?>','<?php echo $this->session->userdata('user_id'); ?>',1)" ><span class="btn <?php if($likeCountCheck == 1){ echo 'btn-success';}else{ echo 'btn-light';} ?> btn-sm"><i class="fa fa-thumbs-o-up me-2"></i>
                  <?php   echo $likeCount; ?>
                  </span></a>
                  <?php }else{ ?>
                  <a href="javascript:void(0)" class="me-2" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#exampleModal3"><span class="btn <?php if($likeCountCheck == 1){ echo 'btn-success';}else{ echo 'btn-light';} ?> btn-sm"><i class="fa fa-thumbs-o-up me-2"></i>
                  <?php   echo $likeCount; ?>
                  </span></a>
                  <?php } ?>
                  <?php if($this->session->userdata('user_id')){ ?>
                  <a href="javascript:void(0)" class="me-2" onclick="productComplaintLike('<?php echo $complaint->product_complaint_id;?>','<?php echo $this->session->userdata('user_id'); ?>',2)"><span class="btn <?php if($dislikeCountCheck == 1){ echo 'btn-danger';}else{ echo 'btn-light';} ?> btn-sm"><i class="fa fa-thumbs-o-down me-2"></i>
                  <?php   echo $dislikeCount; ?>
                  </span></a>
                  <?php }else{ ?>
                  <a href="javascript:void(0)" class="me-2" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#"><span class="btn <?php if($dislikeCountCheck == 1){ echo 'btn-danger';}else{ echo 'btn-light';} ?> btn-sm"><i class="fa fa-thumbs-o-down me-2"></i>
                  <?php   echo $dislikeCount; ?>
                  </span></a>
                  <?php } ?>
                  <?php if($this->session->userdata('user_id')){ ?>
                  <a href="javascript:void(0)" class="me-2" onclick="divShowComplaint(<?php echo $complaint->product_complaint_id;?>);" ><span class="badge badge-default">Comment</span></a> 
                  <?php }else{ ?>
                  <a href="javascript:void(0)" class="me-2" data-bs-toggle="modal" data-bs-target="#exampleModal3"><span class="badge badge-default">Comment</span></a> <a href="javascript:void(0)" class="me-2" data-bs-toggle="modal" data-bs-target="#exampleModal3"><span class="badge badge-default">Resolved In</span></a> <a href="javascript:void(0)" class="me-2" data-bs-toggle="modal" data-bs-target="#exampleModal3"><span class="badge badge-default">Unresolved Since <i class="fe fe-calendar"></i> 55 days</span></a>
                  <?php } ?>
                  <?php if($complaint->complaint_resolved == 1){ ?>
                  <a href="javascript:void(0)" class="me-2"><span class="badge badge-default">Resolved</span></a> 
                  <?php } ?>
                  <?php if($complaint->complaint_resolved == 0){ ?>
                  <a href="javascript:void(0)" class="me-2" >Unresolved Since <i class="fe fe-calendar"></i>  
          <?php  $date = $complaint->product_complaint_added;
                       $start  = date_create($date);
              $end    = date_create(); // Current time and date
              $diff   = date_diff( $start, $end );
              
              //echo 'The difference is ';
              
               echo  $diff->d . ' days '; 

?> </span></a>
                  <?php } ?>
                  <div class="mt-5" style="display:none"  id="commentDivComplaint_<?php echo $complaint->product_complaint_id;?>">
                    <div class="alert alert-outline alert-outline-success Complaint-message-success" id="Complaint-message-success_<?php echo $complaint->product_complaint_id;?>" role="alert" style="display:none;">
                      <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                      <p id="Complaint-text-message-success_<?php echo $complaint->product_complaint_id;?>"></p>
                    </div>
                    <div class="alert alert-outline alert-outline-danger Complaint-message-error" id="Complaint-message-error_<?php echo $complaint->product_complaint_id;?>"  role="alert" style="display:none">
                      <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                      <p id="Complaint-text-message-error_<?php echo $complaint->product_complaint_id;?>"></p>
                    </div>
                    <form class="form-horizontal" name="product_complaint_reply_<?php echo $complaint->product_complaint_id;?>" id="product_complaint_reply_<?php echo $complaint->product_complaint_id;?>" action="javascript:void(0)" method="post">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" class="form-control" name="product_id" id="product_id" placeholder="Your Name" value="<?php echo $complaint->product_id; ?>">
                      <input type="hidden" class="form-control" name="user_id" id="userid" placeholder="Your Name" value="<?php echo $this->session->userdata('user_id'); ?>">
                      <input type="hidden" class="form-control" name="complaint_id" id="complaint_id_<?php echo $complaint->product_complaint_id;?>" placeholder="Your Name" value="<?php echo $complaint->product_complaint_id; ?>">
                      <div class="form-group">
                        <textarea class="form-control" name="comment" rows="6" placeholder="Comment" required="required" maxlength="250"></textarea>
                      </div>
                      <?php if($this->session->userdata('user_id')){ ?>
                      <a href="javascript:void(0)" class="btn btn-primary" id="complaint_reply_submit" onclick="productComplaintReply(<?php echo $complaint->product_complaint_id;?>)">Reply</a>
                      <?php }else{ ?>
                      <a href="javascript:void(0)" class="btn btn-primary" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#exampleModal3">Reply</a>
                      <?php } ?>
                    </form>
                  </div>

                       <?php 
                       $where_complaint_reply = 'tbl_product_complaint_reply.status = 1 and complaint_id = '.$complaint->product_complaint_id.'';
                       $orderby = 'tbl_customer.customer_type ASC, tbl_product_complaint_reply.prr_id ASC';
    $complaint_reply = $this->complaint_model->selectJoinWhereOrderby('tbl_product_complaint_reply','user_id','tbl_customer','customer_id',$where_complaint_reply,$orderby);
        //echo $this->db->last_query();
            
                      //print_pre($complaint_reply);
                    foreach($complaint_reply as $reply){
                     ?>
                              <div class="media mt-5">
                            <div class="d-flex me-3">
                              <a href="javascript:void(0)"> <img class="media-object brround" alt="64x64" src="<?php echo base_url(); ?>uploads/user/<?php echo $reply->image; ?>"> </a>
                            </div>
                            <div class="media-body">
                              <h4 class="mt-0 mb-1 font-weight-semibold"><?php echo ucfirst($reply->firstname.' '.$reply->lastname); ?> 
                              <?php if($reply->customer_type == 1){ ?>
                        <span class="badge badge-primary"> Company's Reply </span>
                        <?php } ?>
                               </h4>
                              <small class="text-muted fs-14">
                                <i class="fa fa-clock-o"></i>  Reviewed <?php echo  date('d-m-Y',strtotime($reply->reply_date)); ?>
                                <i class=" ms-3 fa fa-envelope-o"></i> <?php echo hideEmailAddress($reply->email); ?><i class=" ms-3 fe fe-phone"></i>
                      <?php $mobnum = $reply->phone;
for($i=2;$i<8;$i++)
{
  $mobnum = substr_replace($mobnum,"*",$i,1);
}
echo $mobnum;

 ?>
                              </small>
                              
                              <p class="font-13  mb-2 mt-2 review-tag" id="complaintReplyShort_<?php echo $reply->prr_id;?>"> <?php echo substr($reply->reply,0,85); ?>
                        <?php  $words = substr_count($reply->reply, " ");
                              if($words > 30){
                          ?>
                        <small class="text-yellow">Read More</small><a href="javascript:void(0)" id="complaintReplyShortRM_<?php echo $reply->prr_id;?>" onclick="productcomplaintReplyReadMore('<?php echo $reply->prr_id;?>')">Read More</a>
                        <?php } ?>
                      </p>
                      <p class="font-13  mb-2 mt-2 review-tag" style="display:none" id="complaintReplyFull_<?php echo $reply->prr_id;?>"> <?php echo $reply->reply; ?> <small class="text-yellow"><a href="javascript:void(0)" id="complaintReplyShortRS_<?php echo $reply->prr_id;?>" onclick="productcomplaintReplyReadShort('<?php echo $reply->prr_id;?>')">Read Short</small></a> </p>
                              
                            </div>
                          </div>
                           <?php } ?>  
                        </div>
                      </div>
                     <?php } ?>  
                      

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <script>
   function editProfile(){   

    // alert();  
   //$(".alert-outline-success").hide();
     //$("#text-message-success").html(''); 


        var value_form = $('#profile_form').serialize();

          $.ajax({
            url: base_url+'edit-profile-submit',
            dataType: 'json',
            type: 'post',            
            data: value_form,                                         
            success: function(data){             
                 if(data.status=='1')
                 {  
          
                     $(".edit-message-success").show();
                      $("#text-message-edit-success").html(data.message);                   
                     setTimeout(function() {
                      $(".edit-message-success").hide();
                      $("#text-message-edit-success").html('');
                      $(".edit-message-success").hide('blind', {}, 500)
                  }, 5000);                 
                 }
                 else if(data.status=='0')
                 {  
                    $(".edit-message-error").show();              
                    $("#text-message-edit-error").html(data.message);
                    setTimeout(function() {
                       $(".edit-message-error").hide();              
                       $("#text-message-edit-error").html('');
                      $(".edit-message-error").hide('blind', {}, 500)
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

 function updatePassword(){   

    // alert();  
   //$(".alert-outline-success").hide();
     //$("#text-message-success").html(''); 


        var value_form = $('#update_password_form').serialize();

          $.ajax({
            url: base_url+'update-password',
            dataType: 'json',
            type: 'post',            
            data: value_form,                                         
            success: function(data){             
                 if(data.status=='1')
                 {  
          
                     $(".edit-message-success").show();
                      $("#text-message-edit-success").html(data.message);                   
                     setTimeout(function() {
                      $(".edit-message-success").hide();
                      $("#text-message-edit-success").html('');
                      $(".edit-message-success").hide('blind', {}, 500)
                  }, 5000);                 
                 }
                 else if(data.status=='0')
                 {  
                    $(".edit-message-error").show();              
                    $("#text-message-edit-error").html(data.message);
                    setTimeout(function() {
                       $(".edit-message-error").hide();              
                       $("#text-message-edit-error").html('');
                      $(".edit-message-error").hide('blind', {}, 500)
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

 function editImage(){   

    // alert();  
   //$(".alert-outline-success").hide();
     //$("#text-message-success").html(''); 


       // var value_form = $('#profile_image').serialize();
       var formData = new FormData($("#profile_image_form")[0]);

          $.ajax({
            url: base_url+'edit-image-submit',
            dataType: 'json',
            type: 'post',            
            data: formData,                                         
            success: function(data){             
                 if(data.status=='1')
                 {  
          
                     $(".edit-message-success").show();
                      $("#text-message-edit-success").html(data.message);                   
                     setTimeout(function() {
                      $(".edit-message-success").hide();
                      $("#text-message-edit-success").html('');
                      $(".edit-message-success").hide('blind', {}, 500)
                  }, 5000);                 
                 }
                 else if(data.status=='0')
                 {  
                    $(".edit-message-error").show();              
                    $("#text-message-edit-error").html(data.message);
                    setTimeout(function() {
                       $(".edit-message-error").hide();              
                       $("#text-message-edit-error").html('');
                      $(".edit-message-error").hide('blind', {}, 500)
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

function productReviewReadMore(val){
        //Forward browser to new url
     $("#reviewShort_"+val).hide();
     $("#reviewFull_"+val).show();
        
    }
  function productReviewReadShort(val){
        //Forward browser to new url
    $("#reviewFull_"+val).hide();
    $("#reviewShort_"+val).show();
        
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
  
  function productComplaintReadMore(val){
        //Forward browser to new url
     $("#complaintShort_"+val).hide();
     $("#complaintFull_"+val).show();
        
    }
  function productComplaintReadShort(val){
        //Forward browser to new url
    $("#complaintFull_"+val).hide();
    $("#complaintShort_"+val).show();
        
    }

    function productcomplaintReplyReadMore(val){
        //Forward browser to new url
     $("#complaintReplyShort_"+val).hide();
     $("#complaintReplyFull_"+val).show();
        
    }
  function productcomplaintReplyReadShort(val){
        //Forward browser to new url
    $("#complaintReplyFull_"+val).hide();
    $("#complaintReplyShort_"+val).show();
        
    }

    function productReviewLike(review_id,user_id,action){   

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
            } 

        });                 
        
  }
  
  function productReviewReply(id){   

    // alert();  
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
            } 

        });                 
        
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

      function productComplaintLike(complaint_id,user_id,action){   

    // alert(complaint_id+' '+user_id);  
   //$(".alert-outline-success").hide();
     //$("#text-message-success").html(''); 


        //var value_form = $('#product_complaint').serialize();

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
            } 

        });                 
        
  }
  
  function productComplaintReply(id){   

    // alert();  
   //$(".alert-outline-success").hide();
     //$("#text-message-success").html(''); 


        var value_form = $('#product_complaint_reply_'+id).serialize();

          $.ajax({
            url: base_url+'complaint-reply-submit',
            dataType: 'json',
            type: 'post',            
            data: value_form,                                         
            success: function(data){             
                 if(data.status=='1')
                 {  
                     $("#Complaint-message-success_"+id).show();
                      $("#Complaint-text-message-success_"+id).html(data.message);                   
                     setTimeout(function() {
                      $("#Complaint-message-success_"+id).hide();
                      $("#Complaint-text-message-success_"+id).html('');
                      $("#Complaint-message-success_"+id).hide('blind', {}, 500)
                  }, 5000);                 
                 }
                 else if(data.status=='0')
                 {  
                    $("#Complaint-message-error_"+id).show();              
                    $("#Complaint-text-message-error_"+id).html(data.message);
                    setTimeout(function() {
                       $("#Complaint-message-error_"+id).hide();              
                       $("#Complaint-text-message-error_"+id).html('');
                      $("#Complaint-message-error_"+id).hide('blind', {}, 500)
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
  
  function divShowComplaint(val){
        //Forward browser to new url
    if($('#commentDivComplaint_'+val).css('display') == 'none')
    {
      $('#commentDivComplaint_'+val).css('display', 'block');
    }else{
      $('#commentDivComplaint_'+val).css('display', 'none');
      }
        
    }
  
    </script>