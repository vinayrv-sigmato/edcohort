<?php $user_id = $this->session->userdata('user_id'); ?>

<!--Section-->
 <div class="header-main"> 
        <!--Section-->
        <div class="cover-image bg-background-1" data-bs-image-src="assets/images/banners/banner1.jpg">
        <section>
          <div class="sptb-2 bannerimg">
            <div class="header-text mb-0">
              <div class="container">
                <div class="text-center text-white py-7">
                  <h1 class="">Course Detail</h1>
                  <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page"><?php echo $page_head; ?></li>
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

        <!--Section-->
        <section class="sptb">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="card blog-detail">
                            <div class="card-body">
                                <div class="item7-card-img br-7 mb-5">
                                    <img src="<?php echo base_url(); ?>uploads/blog/<?php echo $course_list[0]->blog_image; ?>" alt="<?php echo $course_list[0]->blog_title; ?>" class="w-100">
                                     <div class="item-card-text-bottom me-0">
                                    <?php $category = explode(",",$blog_list[0]->category); foreach($category as $cat){ ?>  <h4 class="mb-0"><?php echo ucfirst($cat); ?> </h4> <?php  } ?>
                                     </div>
                                </div>
                                <a href="javascript:void(0)" class="text-dark"><h2 class="font-weight-semibold"><?php echo $course_list[0]->blog_title; ?></h2></a>
                                <div class="item7-card-desc d-md-flex mb-2 mt-3">
                                    <a href="javascript:void(0)" class="font-weight-semibold fs-16"><i class="fe fe-calendar me-2 text-primary"></i><?php echo date('d M Y',strtotime($course_list[0]->created_at)); ?></a>
                                    <a href="javascript:void(0)" class="font-weight-semibold fs-16"><i class="fe fe-user me-2 text-primary"></i>Admin</a>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0)" class="font-weight-semibold fs-16"><i class="fe fe-message-circle me-2 text-primary"></i><?php echo $course_list[0]->comment_count; ?> Comments</a>
                                    </div>
                                </div>
                                <p><?php echo $course_list[0]->blog_dec; ?></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Comments</h3>
                            </div>
                            <div class="card-body">
                            	<?php //print_ex($blog_comment_list);?>
                               <?php foreach($course_comment_list as $comment){ ?>
                               
                                <div class="media mt-0 p-5 border br-7 review-media">
                                    <div class="d-flex me-3">
                                        <a href="javascript:void(0)"><img class="media-object brround avatar-lg" alt="64x64" src="<?php echo base_url(); ?>assets/images/users/user.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1 font-weight-semibold"><?php echo ucwords($comment->name); ?>
                                        
                                            <span class="fs-14 float-md-end d-block d-md-flex">
                                            	<?php if($comment->rating == 1){ ?>
                                                	<i class="fa fa-star text-yellow"></i>
                                                     <i class="fa fa-star-o"></i>
                                               		 <i class="fa fa-star-o"></i>
                                               		 <i class="fa fa-star-o"></i>
                                               		 <i class="fa fa-star-o"></i> 
                                                  <?php } ?>
                                                  <?php if($comment->rating == 2){ ?>
                                                	<i class="fa fa-star text-yellow"></i>
                                                    <i class="fa fa-star text-yellow"></i>
                                                    <i class="fa fa-star-o"></i> 
                                                    <i class="fa fa-star-o"></i> 
                                                    <i class="fa fa-star-o"></i> 
                                                  <?php } ?>
                                                  <?php if($comment->rating == 3){ ?>
                                                	<i class="fa fa-star text-yellow"></i>
                                                     <i class="fa fa-star text-yellow"></i>
                                                	<i class="fa fa-star text-yellow"></i>
                                                    <i class="fa fa-star-o"></i> 
                                                    <i class="fa fa-star-o"></i> 
                                                  <?php } ?>
                                                  <?php if($comment->rating == 4){ ?>
                                                	 <i class="fa fa-star text-yellow"></i>
                                                     <i class="fa fa-star text-yellow"></i>
                                                	 <i class="fa fa-star text-yellow"></i>
                                                	 <i class="fa fa-star text-yellow"></i>
                                                     <i class="fa fa-star-o"></i> 
                                               
                                                  <?php } ?>
                                                  <?php if($comment->rating == 5){ ?>
                                                	 <i class="fa fa-star text-yellow"></i>
                                                     <i class="fa fa-star text-yellow"></i>
                                               		 <i class="fa fa-star text-yellow"></i>
                                               		 <i class="fa fa-star text-yellow"></i>
                                               		 <i class="fa fa-star text-yellow"></i>	
                                                  <?php } ?>
                                                
                                               
                                            </span>
                                        </h4>
                                        <small class="text-muted fs-14">
                                            <i class="fa fa-clock-o"></i> Reviewed <?php  $date = $comment->date_added;
											 $start  = date_create($date);
$end    = date_create(); // Current time and date
$diff   = date_diff( $start, $end );

//echo 'The difference is ';
if($diff->y > 0){ echo  $diff->y . ' years, '; }
if($diff->m > 0){ echo  $diff->m . ' months, '; }
if($diff->d > 0){ echo  $diff->d . ' days, '; }
if($diff->h > 0){ echo  $diff->h . ' hours, '; }
if($diff->i > 0){ echo  $diff->i . ' minutes, '; }
?>   Ago
                                        </small>
                                        <p class="font-13 fs-15 mb-2 mt-2">
                                           <?php echo $comment->comment; ?>
                                        </p>
                                        <div class="d-md-flex">
                                            <a href="javascript:void(0)" class="me-2 text-primary mt-1"><i class="fa fa-mail-reply me-2"></i>Reply</a>
                                            <div class="d-md-flex ms-auto my-auto">
                                                <span href="javascript:void(0)" class="me-2 mt-1">Recommended ?</span>
                                                <a href="" class="me-2"><span class="btn btn-success btn-sm"><i class="fa fa-thumbs-o-up me-2"></i>Yes</span></a>
                                                <a href="" class="me-2"><span class="btn btn-danger btn-sm"><i class="fa fa-thumbs-o-down me-2"></i>No</span></a>
                                            </div>
                                        </div>
                                        <?php foreach($comment->reply_list as $reply){ ?>
                                        <div class="media mt-5">
                                            <div class="d-flex me-3">
                                                <a href="javascript:void(0)"> <img class="media-object brround" alt="64x64" src="<?php echo base_url(); ?>assets/images/users/user.jpg"> </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="mt-0 mb-1 font-weight-semibold"> Admin </h4>
                                                <small class="text-muted fs-14">
                                                    <i class="fa fa-clock-o"></i>  Reviewed <?php  $date = $reply->date_added;
											 $start  = date_create($date);
$end    = date_create(); // Current time and date
$diff   = date_diff( $start, $end );

//echo 'The difference is ';
if($diff->y > 0){ echo  $diff->y . ' years, '; }
if($diff->m > 0){ echo  $diff->m . ' months, '; }
if($diff->d > 0){ echo  $diff->d . ' days, '; }
if($diff->h > 0){ echo  $diff->h . ' hours, '; }
if($diff->i > 0){ echo  $diff->i . ' minutes, '; }
?> Ago
                                                </small>
                                                <p class="font-13  mb-2 mt-2">
                                                  <?php echo $reply->reply; ?>
                                                </p>
                                                <a href="javascript:void(0)" class="me-2 text-primary"><i class="fa fa-mail-reply me-2"></i>Reply</a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        
                                        
                                    </div>
                                </div>
                                
                                <?php } ?>
                                
                            </div>
                        </div>
                        
                        <div class="card mb-lg-0">
                            <div class="card-header">
                                <h3 class="card-title">Write Your Comments</h3>
                                 
                            </div>
                            <form class="form-horizontal" name="blog_comment" id="blog_comment" action="javascript:void(0)" method="post">                       
                            <div class="alert alert-outline alert-outline-success reg-message-success" id="reg-message-success" role="alert" style="display:none;"><button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button><p id="text-message-success"></p></div>
                            	 <div class="alert alert-outline alert-outline-danger reg-message-error" id="reg-message-error"  role="alert" style="display:none"><button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button><p id="text-message-error"></p></div>    

               				 <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                <input type="hidden" class="form-control" name="blog_id" id="blog_id" placeholder="Your Name" value="<?php echo $blog_list[0]->blog_id; ?>">
                                 <input type="hidden" class="form-control" name="user_id" id="userid" placeholder="Your Name" value="<?php echo $this->session->userdata('user_id'); ?>">
                                    <input type="text" class="form-control" name="name" id="name1" placeholder="Your Name" required="required" value="<?php  echo $this->session->userdata('user_fullname'); ?>">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Course address" required="required" value="<?php echo $this->session->userdata('user_email'); ?>">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone Number" required="required" maxlength="13">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="comment" rows="6" placeholder="Write Your Comment" required="required" maxlength="250"></textarea>
                                </div>
                                
                                <div class="form-group">
                                	<div class="br-wrapper br-theme-fontawesome-stars"><select class="example-fontawesome" name="rating" autocomplete="off" style="display: none;">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4" selected="">4</option>
													<option value="5">5</option>
												</select>
                                    </div>
                              </div>
                                             
                                                <a href="javascript:void(0)" id="blog_comment_submit" onclick="blogComment()" class="btn btn-primary">Submit</a>
                                
                            </div>
                            </form>
                            
                        </div>
                    </div>
                    <!--Rightside Content-->
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <!--<div class="card">
                            <div class="card-body">
                                <div class="input-group">
                                    <input type="text" class="form-control br-ts-7  br-bs-7" placeholder="Search">
                                     <div class="input-group-text ">
                                          <button type="button" class="btn btn-primary br-te-7 br-be-7"> Search </button>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Blog Categories</h3>
                            </div>
                            <div class="card-body">
                                <div class="list-catergory">
                                    <div class="item-list">
                                        <ul class="list-group mb-0">
                                            <li class="list-group-item pt-0">
                                                <a href="javascript:void(0)" class="text-default-dark fs-14 font-weight-bold">
                                                    <i class="fa fa-code bg-primary-light text-primary"></i> IT Services
                                                    <span class="badgetext badge badge-pill mb-0 mt-1 text-muted font-weight-normal">14 Posts</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="javascript:void(0)" class="text-default-dark fs-14 font-weight-bold">
                                                    <i class="fa fa-language bg-success-light text-success"></i>Language
                                                    <span class="badgetext badge badge-pill mb-0 mt-1 text-muted font-weight-normal">63 Posts</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="javascript:void(0)" class="text-default-dark fs-14 font-weight-bold">
                                                    <i class="fa fa-heartbeat bg-info-light text-info"></i> Health
                                                    <span class="badgetext badge badge-pill mb-0 mt-1 text-muted font-weight-normal">25 Posts</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="javascript:void(0)" class="text-default-dark fs-14 font-weight-bold">
                                                    <i class="fa fa-camera bg-warning-light text-warning"></i> Photoshop
                                                    <span class="badgetext badge badge-pill mb-0 mt-1 text-muted font-weight-normal">74 Posts</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="javascript:void(0)" class="text-default-dark fs-14 font-weight-bold">
                                                    <i class="fa fa-flask bg-danger-light text-danger"></i> Data Science
                                                    <span class="badgetext badge badge-pill mb-0 mt-1 text-muted font-weight-normal">18 Posts</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="javascript:void(0)" class="text-default-dark fs-14 font-weight-bold">
                                                    <i class="fa fa-mobile bg-purple-light text-purple"></i> Mobile computing
                                                    <span class="badgetext badge badge-pill mb-0 mt-1 text-muted font-weight-normal">32 Posts</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item border-bottom-0 pb-0 br-bs-7 br-be-7">
                                                <a href="javascript:void(0)" class="text-default-dark fs-14 font-weight-bold">
                                                    <i class="fa fa-paint-brush  bg-secondary-light text-pink"></i> Beautician
                                                    <span class="badgetext badge badge-pill mb-0 mt-1 text-muted font-weight-normal">08 Posts</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Popular Blog</h3>
                            </div>
                            <div class="card-body pt-3 list-catergory1">
                                <div class="item-list">
                                    <ul class="vertical-scroll">
                                    	<?php foreach($similar_blog_list as $similar_blog){ ?>
                                        <li class="item list-group-item d-flex p-2">
                                            <img src="<?php echo base_url(); ?>uploads/blog/<?php echo $similar_blog->blog_image; ?>" class="avatar br-7 avatar-lg me-3 my-auto" alt="avatar-img">
                                            <div class="">
                                                <small class="d-block"><?php $similar_blog->category; ?></small>
                                                <a href="<?php echo base_url(); ?>blog-detail/<?php echo $similar_blog->blog_slug; ?>" class="text-default fs-16 font-weight-bold"><?php echo $similar_blog->blog_title; ?></a>
                                                <small class="d-block text-muted"><?php  $date = $similar_blog->created_at;
											 $start  = date_create($date);
$end    = date_create(); // Current time and date
$diff   = date_diff( $start, $end );

//echo 'The difference is ';

if($diff->d > 0){ echo  $diff->d . ' days '; }

?> ago</small>
                                            </div>
                                        </li>
                                        <?php } ?>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Rightside Content-->
                </div>
            </div>
        </section><!--/Section-->

<script type="text/javascript">
function blogComment(){   

    // alert();  
	 //$(".alert-outline-success").hide();
     //$("#text-message-success").html(''); 


        var value_form = $('#blog_comment').serialize();

          $.ajax({
            url: base_url+'blog-comment',
            dataType: 'json',
            type: 'post',            
            data: value_form,                                         
            success: function(data){             
                 if(data.status=='1')
                 {  
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
</script>