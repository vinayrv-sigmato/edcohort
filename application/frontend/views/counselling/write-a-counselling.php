<!--banner start-->
<div class="banner inner-banner-box">
    <div class="container">

        <h1>Counselling</h1>

    </div>
</div>
<!--banner end-->

<!--content start-->
<div class="content">
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
    ?>

    <!--start-->
    <div class="review-box">
        <div class="container">
            <?php echo message(); ?>
            <form action="<?php echo base_url(); ?>create-counselling-submit" method="post" enctype="multipart/form-data">

                <?php echo csrf_field(); ?>
                <input type="hidden" class="form-control" name="product_id" id="product_id" placeholder="Your Name" value="<?php echo $course; ?>">
                <input type="hidden" class="form-control" name="user_id" id="userid" placeholder="Your Name" value="<?php echo $this->session->userdata('user_id'); ?>">
                <input type="hidden" class="form-control" name="email" id="email"  value="<?php echo $this->session->userdata('user_email'); ?>">
                <input type="hidden" class="form-control" name="name" id="name"  value="<?php echo $this->session->userdata('user_fullname'); ?>">
                <input type="hidden" class="form-control" id="phone" name="phone" value="<?php echo $this->session->userdata('user_phone'); ?>">
                <div class="review-field-row d-flex column-2">

                    <div class="review-col col-4">
                        <label class="input-title">Counselling a*</label>
                        <div class="select-box">
                            <select name="write_counselling" id="write_counselling">
                                <option selected>Counselling</option>
                            </select>
                        </div>
                    </div>
                    <div class="review-col col-6">
                        <label class="input-title">Catagory*</label>
                        <div class="select-box">
                            <select name="category" id="category" required>
                                <?php foreach($category_records as $category){ ?>
                                    <option value="<?php echo $category->class_id; ?>"><?php echo $category->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="review-field-row">
                    <label class="input-title">Select Board</label>
                    <div class="select-box">
                        <select name="board" id="board" required>
                            <?php foreach($board_records as $boards){?>
                                <option value="<?php echo $boards->board_id; ?>" <?php if($boards->board_id == $board){ echo 'selected'; } ?>><?php echo $boards->board_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="review-field-row d-flex column-2">

                    <div class="review-col col-4">
                        <label class="input-title">Brand name*</label>
                        <div class="select-box">
                            <select name="brand" id="brand" required>
                                <?php foreach($brand_records as $brands){?>
                                    <option value="<?php echo $brands->brand_id; ?>" <?php if($brands->brand_id == $brandID){ echo 'selected'; } ?>><?php echo $brands->brand_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="review-col col-6">
                        <label class="input-title">Course (Optional)</label>
                        <div class="select-box">
                            <select name="class" id="class" required>
                                <?php foreach($class_records as $classes){?>
                                    <option value="<?php echo $classes->class_id; ?>" <?php if($classes->class_id == $class){ echo 'selected'; } ?>><?php echo $classes->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="review-field-row">
                    <div class="review-col">
                        <label class="input-title">Batch (Cohort) <span>Please select year that you will be appearing exam</span></label>
                        <div class="select-box">
                            <select name="batch" id="batch" required>
                                <?php foreach($batch_records as $batches){?>
                                    <option value="<?php echo $batches->batch_id; ?>" <?php if($batches->batch_id == $batch){ echo 'selected'; } ?>><?php echo $batches->batch_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="review-field-row">
                    <div class="review-col">
                        <label class="input-title">Title</label>
                        <input type="text" placeholder="Title related to review " name="counselling_title" class="review-input" required>               
                    </div>
                </div>
                <div class="review-field-row">
                    <div class="review-col">
                        <label class="input-title">Date</label>
                        <input type="text" name="cdate" value="<?php echo $c_date; ?>" id="datepicker" autocomplete="off" placeholder="Title related to Counselling " class="review-input" required>
                    </div>
                </div>
                <div class="review-field-row">
                    <div class="review-col">
                        <label class="input-title">Start Time</label>
                        <div class="select-box">
                            <select name="start_time" class="review-input" required>
                                <option>Select</option>
                                <option value="00:00:00">12:00 am</option>
                                <option value="00:30:00">12:30 am</option>
                                <option value="01:00:00">01:00 am</option>
                                <option value="01:30:00">01:30 am</option>
                                <option value="02:00:00">02:00 am</option>
                                <option value="02:30:00">02:30 am</option>
                                <option value="03:00:00">03:00 am</option>
                                <option value="03:30:00">03:30 am</option>
                                <option value="04:00:00">04:00 am</option>
                                <option value="04:30:00">04:30 am</option>
                                <option value="05:00:00">05:00 am</option>
                                <option value="05:30:00">05:30 am</option>
                                <option value="06:00:00">06:00 am</option>
                                <option value="06:30:00">06:30 am</option>
                                <option value="07:00:00">07:00 am</option>
                                <option value="07:30:00">07:30 am</option>
                                <option value="08:00:00">08:00 am</option>
                                <option value="08:30:00">08:30 am</option>
                                <option value="09:00:00">09:00 am</option>
                                <option value="09:30:00">09:30 am</option>
                                <option value="10:00:00">10:00 am</option>
                                <option value="10:30:00">10:30 am</option>
                                <option value="11:00:00">11:00 am</option>
                                <option value="11:30:00">11:30 am</option>
                                <option value="12:00:00">12:00 pm</option>
                                <option value="12:30:00">12:30 pm</option>
                                <option value="13:00:00">12:00 pm</option>
                                <option value="13:30:00">12:30 pm</option>
                                <option value="14:00:00">01:00 pm</option>
                                <option value="14:30:00">01:30 pm</option>
                                <option value="15:00:00">02:00 pm</option>
                                <option value="15:30:00">02:30 pm</option>
                                <option value="16:00:00">03:00 pm</option>
                                <option value="16:30:00">03:30 pm</option>
                                <option value="17:00:00">04:00 pm</option>
                                <option value="17:30:00">04:30 pm</option>
                                <option value="18:00:00">05:00 pm</option>
                                <option value="18:30:00">05:30 pm</option>
                                <option value="19:00:00">06:00 pm</option>
                                <option value="19:30:00">06:30 pm</option>
                                <option value="20:00:00">07:00 pm</option>
                                <option value="20:30:00">07:30 pm</option>
                                <option value="21:00:00">08:00 pm</option>
                                <option value="21:30:00">08:30 pm</option>
                                <option value="22:00:00">09:00 pm</option>
                                <option value="22:30:00">09:30 pm</option>
                                <option value="23:00:00">10:00 pm</option>
                                <option value="23:30:00">10:30 pm</option>
                                <option value="24:00:00">11:00 pm</option>
                                <option value="24:30:00">11:30 pm</option>
                            </select>  
                        </div>             
                    </div>
                </div>
                <div class="review-field-row">
                    <div class="review-col">
                        <label class="input-title" >End Time</label>
                        <div class="select-box">
                            <select name="end_time" class="review-input" required>
                                <option>Select</option>
                                <option value="00:00:00">12:00 am</option>
                                <option value="00:30:00">12:30 am</option>
                                <option value="01:00:00">01:00 am</option>
                                <option value="01:30:00">01:30 am</option>
                                <option value="02:00:00">02:00 am</option>
                                <option value="02:30:00">02:30 am</option>
                                <option value="03:00:00">03:00 am</option>
                                <option value="03:30:00">03:30 am</option>
                                <option value="04:00:00">04:00 am</option>
                                <option value="04:30:00">04:30 am</option>
                                <option value="05:00:00">05:00 am</option>
                                <option value="05:30:00">05:30 am</option>
                                <option value="06:00:00">06:00 am</option>
                                <option value="06:30:00">06:30 am</option>
                                <option value="07:00:00">07:00 am</option>
                                <option value="07:30:00">07:30 am</option>
                                <option value="08:00:00">08:00 am</option>
                                <option value="08:30:00">08:30 am</option>
                                <option value="09:00:00">09:00 am</option>
                                <option value="09:30:00">09:30 am</option>
                                <option value="10:00:00">10:00 am</option>
                                <option value="10:30:00">10:30 am</option>
                                <option value="11:00:00">11:00 am</option>
                                <option value="11:30:00">11:30 am</option>
                                <option value="12:00:00">12:00 pm</option>
                                <option value="12:30:00">12:30 pm</option>
                                <option value="13:00:00">12:00 pm</option>
                                <option value="13:30:00">12:30 pm</option>
                                <option value="14:00:00">01:00 pm</option>
                                <option value="14:30:00">01:30 pm</option>
                                <option value="15:00:00">02:00 pm</option>
                                <option value="15:30:00">02:30 pm</option>
                                <option value="16:00:00">03:00 pm</option>
                                <option value="16:30:00">03:30 pm</option>
                                <option value="17:00:00">04:00 pm</option>
                                <option value="17:30:00">04:30 pm</option>
                                <option value="18:00:00">05:00 pm</option>
                                <option value="18:30:00">05:30 pm</option>
                                <option value="19:00:00">06:00 pm</option>
                                <option value="19:30:00">06:30 pm</option>
                                <option value="20:00:00">07:00 pm</option>
                                <option value="20:30:00">07:30 pm</option>
                                <option value="21:00:00">08:00 pm</option>
                                <option value="21:30:00">08:30 pm</option>
                                <option value="22:00:00">09:00 pm</option>
                                <option value="22:30:00">09:30 pm</option>
                                <option value="23:00:00">10:00 pm</option>
                                <option value="23:30:00">10:30 pm</option>
                                <option value="24:00:00">11:00 pm</option>
                                <option value="24:30:00">11:30 pm</option>
                            </select>    
                        </div>                          
                    </div>
                </div>
                <div class="review-field-row">
                    <div class="review-col">
                        <label class="input-title">YouTube Channel Name</label>
                        <input type="text" placeholder="Title related to review " name="youtube_channel_name" class="review-input" required>               
                    </div>
                </div>
                <div class="review-field-row">
                    <div class="review-col">
                        <label class="input-title">YouTube Channel Link</label>
                        <input type="text" placeholder="Title related to review " name="youtube_channel_link" class="review-input" required>               
                    </div>
                </div>
                <div class="review-field-row">
                    <div class="review-col">
                        <label class="input-title">YouTube Meeting Link</label>
                        <input type="text" placeholder="Title related to review " name="youtube_meeting_name" class="review-input" required>               
                    </div>
                </div>
                       <div class="review-field-row">
            <div class="review-col">
                <label class="input-title">Ratings (Optional)</label>
                <div class="review-checkbox rating-style">
                <input type="hidden" id="rating" name="rating" value="<?php echo $customer_rating; ?>">
                    <div class="rating">
                    <i class="ratings_stars fa fa-star <?php if($customer_rating >= 1){ echo 'selected'; } ?>" data-rating="1"></i>
                    <i class="ratings_stars fa fa-star <?php if($customer_rating >= 2){ echo 'selected'; } ?>" data-rating="2"></i>
                    <i class="ratings_stars fa fa-star <?php if($customer_rating >= 3){ echo 'selected'; } ?>" data-rating="3"></i>
                    <i class="ratings_stars fa fa-star <?php if($customer_rating >= 4){ echo 'selected'; } ?>" data-rating="4"></i>
                    <i class="ratings_stars fa fa-star <?php if($customer_rating >= 5){ echo 'selected'; } ?>" data-rating="5"></i>
                    </div>
                </div>
            </div>
        </div>
                <div class="reply-box">
                    <div class="reply-editor">
                        <!-- <div id="summernote"></div> -->
                        <textarea class="summernote" name="comment" required></textarea>
                    </div>
                    <div class="reply-footer d-flex flex-wrap justify-content-between align-items-center">
                <!-- <div class="reply-footer-left">
                    <div class="checkbox-col">
                        <div class="checkbox">
                            <input type="checkbox" name="review_discussion" value="1" id="checkbox-2"><label for="checkbox-2"></label>
                        </div>
                        Get updates on this discussion
                    </div>
                </div> -->
                <?php if($this->session->userdata('user_id')){ ?>
                   <div class="reply-footer-right">
                    <button type="submit"  data-bs-effect="effect-scale" data-bs-toggle="modal" class="reply-footer-btn">Post</button>
                </div>
            <?php }else{ ?>
                <div class="reply-footer-right">
                    <a href="javascript:void(0)" class="reply-footer-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button">Post</a></div>
                <?php } ?>
                
            </div>
        </div>
    </form>
</div>
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
<script>

    $(document).ready(function() {
//     $("form").on('submit', function(){
//    $('#rateModal').show();
// })
$('.summernote').summernote({
    height: 300,
});
$('#category').change(function() {
    var category_id = $('#category').val();
    if (category_id != '') {
        $.ajax({
            url: "<?php echo base_url(); ?>get-category-list",
            method: "get",
            data: {
                category_id: category_id
            },
            success: function(data) {
                $('#board').html(data);
                   // $('#city').html('<option value="">Select City</option>');
               }
           });
    }
});

$('#board').change(function() {
    var board_id = $('#board').val();
    if (board_id != '') {
        $.ajax({
            url: "<?php echo base_url(); ?>get-category-list",
            method: "get",
            data: {
                board_id: board_id
            },
            success: function(data) {
                $('#brand').html(data);
                   // $('#city').html('<option value="">Select City</option>');
               }
           });
    }
});
$('#brand').change(function() {
    var brand_id = $('#brand').val();
    if (brand_id != '') {
        $.ajax({
            url: "<?php echo base_url(); ?>get-category-list",
            method: "get",
            data: {
                brand_id: brand_id
            },
            success: function(data) {
                $('#class').html(data);
                   // $('#city').html('<option value="">Select City</option>');
               }

           });
    }
});

$('#class').change(function(){
    var class_id = $('#class').val();
    if(class_id != '')
    {
        $.ajax({
            url:"<?php echo base_url(); ?>get-category-list",
            method:"get",
            data:{class_id:class_id},
            success:function(data)
            {
                $('#batch').html(data);
            }
        });
    }
}); 
});
</script>