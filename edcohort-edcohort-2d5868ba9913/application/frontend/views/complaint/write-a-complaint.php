<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--banner start-->
<div class="banner inner-banner-box">
<div class="container">

    <h1>Complaint</h1>

</div>
</div>
<!--banner end-->

<!--content start-->
<div class="content">
<?php 	  $course = $this->input->get('course'); 
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

    <!--start-->
    <div class="review-box">
    <div class="container">
    <?php echo message(); ?>
<form action="<?php echo base_url(); ?>complaint-submit" method="post" enctype="multipart/form-data">
   
    <?php echo csrf_field(); ?>
    <input type="hidden" class="form-control" name="product_id" id="product_id" placeholder="Your Name" value="<?php echo $course; ?>">
    <input type="hidden" class="form-control" name="user_id" id="userid" placeholder="Your Name" value="<?php echo $this->session->userdata('user_id'); ?>">
    <input type="hidden" class="form-control" name="email" id="email"  value="<?php echo $this->session->userdata('user_email'); ?>">
    <input type="hidden" class="form-control" name="name" id="name"  value="<?php echo $this->session->userdata('user_fullname'); ?>">
    <input type="hidden" class="form-control" id="phone" name="phone" value="<?php echo $this->session->userdata('user_phone'); ?>">
        <div class="review-field-row d-flex column-2">

            <div class="review-col col-4">
                <label class="input-title">Write a*</label>
                <div class="select-box">
                    <select name="write_complaint" id="write_review">
                        <option selected>Complaint</option>
                    </select>
                </div>
            </div>
            <div class="review-col col-6">
                <label class="input-title">Catagory*</label>
                <div class="select-box">
                    <select name="category" id="category">
                <?php foreach($category_records as $category){ ?>
                        <option value="<?php echo $category->class_id; ?>" <?php if($category->class_id == $class){ echo 'selected'; } ?>><?php echo $category->title; ?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="review-field-row">
            <label class="input-title">Select Board</label>
            <div class="select-box">
            <select name="board" id="board">
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
                    <select name="brand" id="brand">
                        <?php foreach($brand_records as $brands){?>
                        <option value="<?php echo $brands->brand_id; ?>" <?php if($brands->brand_id == $brandID){ echo 'selected'; } ?>><?php echo $brands->brand_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="review-col col-6">
                <label class="input-title">Course (Optional)</label>
                <div class="select-box">
                <select name="class" id="class">
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
                <select name="batch" id="batch">
                        <?php foreach($batch_records as $batchs){?>
                        <option value="<?php echo $batchs->batch_id; ?>" <?php if($batchs->batch_id == $batch){ echo 'selected'; } ?>><?php echo $batchs->batch_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="review-field-row">
            <div class="review-col">
                <label class="input-title">Title</label>
                <input type="text" placeholder="Title related to review " name="complaint_title" class="review-input">
                <div class="checkbox-col">
                    <div class="checkbox">
                        <input type="checkbox" value="1" name="complaint_associated_offline" id="checkbox-1" <?php if($product_type == 2){ echo 'checked'; } ?>><label for="checkbox-1"></label>
                    </div>
                    Is this complaint associated with offline course
                </div>
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
                <textarea class="summernote" name="comment"></textarea>
            </div>
            <div class="reply-footer d-flex flex-wrap justify-content-between align-items-center">
                <div class="reply-footer-left">
                    <div class="checkbox-col">
                        <div class="checkbox">
                            <input type="checkbox" name="complaint_discussion" value="1" id="checkbox-2"><label for="checkbox-2"></label>
                        </div>
                        Get updates on this discussion
                    </div>
                </div>
                <?php if($this->session->userdata('user_id')){ ?>
                 <div class="reply-footer-right"><button type="submit" class="reply-footer-btn">Post</button></div>
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
<script>

$(document).ready(function() {
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

$('.rating').on('click', '.ratings_stars', function () {
  var star = $(this)
  star.addClass('selected')
  star.prevAll().addClass('selected')
  star.nextAll().removeClass('selected')
  $('#rating').val(star.data('rating'))
});
</script>