<!--banner start-->
<div class="banner inner-banner-box">
    <div class="container">

        <h1>Create a Discussion</h1>

    </div>
</div>
<!--banner end-->

<!--content start-->
<div class="content">
    <?php  $course = $this->input->get('course');
    $brandID = $this->input->get('brand');
    $product_type = $this->input->get('product_type');
    $board = $this->input->get('board');
    $class = $this->input->get('class');     
    $batch = $this->input->get('batch');
    ?>
    <!--start-->
    <div class="review-box">
        <div class="container">
            <?php echo message(); ?>
            <form action="<?php echo base_url(); ?>create-cohort-submit" method="post" enctype="multipart/form-data">
             
                <?php echo csrf_field(); ?>
                <input type="hidden" class="form-control" name="product_id" id="product_id" placeholder="Your Name" value="<?php echo $course; ?>">
                <input type="hidden" class="form-control" name="user_id" id="userid" placeholder="Your Name" value="<?php echo $this->session->userdata('user_id'); ?>">
                <input type="hidden" class="form-control" name="email" id="email"  value="<?php echo $this->session->userdata('user_email'); ?>">
                <input type="hidden" class="form-control" name="name" id="name"  value="<?php echo $this->session->userdata('user_fullname'); ?>">
                <input type="hidden" class="form-control" id="phone" name="phone" value="<?php echo $this->session->userdata('user_phone'); ?>">
                <div class="review-field-row">

            <!-- <div class="review-col col-4">
                <label class="input-title">Write a*</label>
                <div class="select-box">
                    <select name="write_review" id="write_review">
                        <option selected>Review</option>
                    </select>
                </div>
            </div> -->
            <div class="review-col">
                <label class="input-title">Catagory*</label>
                <div class="select-box">
                    <select name="category" id="category">
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
            <input type="text" placeholder="Title related to review " name="review_title" id="review_title" class="review-input">
        </div>
        <div class="review-col">
            <label class="input-title">#Tag</label>
            <input type="text" placeholder="#tag " name="review_tag" id="review_tag" class="review-input" onBlur="checkAvailability()">
            <span id="user-availability-status"></span> 
        </div>
    </div>
    
    <div class="reply-box">
        <div class="reply-editor">
            <!-- <div id="summernote"></div> -->
            <textarea class="summernote" name="comment"></textarea>
        </div>
        <div class="reply-footer d-flex flex-wrap justify-content-between align-items-center">
            <div class="reply-footer-left">
                
            </div>
            <?php if($this->session->userdata('user_id')){ ?>
               <div class="reply-footer-right">
                <button type="submit"  data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#rateModal" class="reply-footer-btn">Post</button>
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

    function checkAvailability() {

        jQuery.ajax({
            url: "<?php echo base_url(); ?>check-tag-availability",
            data:'review_tag='+$("#review_tag").val(),
            type: "POST",
            success:function(data){
                $("#user-availability-status").html(data);
                
            },
            error:function (){}
        });
    }
</script>