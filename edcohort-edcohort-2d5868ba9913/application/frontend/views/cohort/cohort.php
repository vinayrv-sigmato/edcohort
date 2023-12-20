<?php $course = $this->input->get('course'); 
 $brandID = $this->input->get('brand');
 $product_type = $this->input->get('product_type');
 $board = $this->input->get('board');
 $class = $this->input->get('class');
 $batch = $this->input->get('batch');
 $customer_rating = $this->input->get('customer_rating');
 $date_posted = $this->input->get('date_posted');
 $sort_by = $this->input->get('sort_by');
  //  print_ex($product_list);
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
         <li class="active"><a href="<?php echo base_url(); ?>cohort?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Cohort </a></li>
         <li><a href="<?php echo base_url(); ?>review?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Reviews </a></li>
         <li><a href="<?php echo base_url(); ?>coupon?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Coupons </a></li>
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
      <div class="review-left main-header">
         <form action="<?php echo base_url(); ?>cohort-search" method="post" name="form" id="form">
            <h3 class="filter-title">Filter</h3>
           <?php echo csrf_field(); ?>
            <div class="filter-col">
               <h3 class="filter-col-title">BRAND</h3>
               <div class="select-box">
                  <select name="brand" id="brand">
                     <?php foreach($brand_records as $brands){?>
                        <option value="<?php echo $brands->brand_id; ?>" <?php if($brands->brand_id == @$product_list['0']->brand_id){ echo 'selected'; } ?>><?php echo $brands->brand_name; ?></option>
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
            <div class="filter-btn-col">
               <button type="submit" class="apply-btn">Apply Filter</button>
            </div>
         </form>
      </div>
                <!--left end-->
        <!--center start-->
        <div class="review-center main-content">
        <?php echo message(); ?>
        <?php if($this->session->userdata('user_id')){ ?>
                    <div class="review-btn-box">
                        <a href="<?php echo base_url(); ?>create-cohort?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>" class="review-btn"> <img src="<?php echo base_url();?>assets/images/review-icon2.png" alt=""> Create a discussion</a>
                    </div>
                <?php }else{ ?>
                    
                    <a href="javascript:void(0)" class="review-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button"> <img src="<?php echo base_url();?>assets/images/review-icon2.png" alt=""> Create a discussion</a>
                <?php } ?>
            
          

            <!-- <div class="select-filter-box">
                <ul class="select-filter">
                    <li>ICSE <a href="#"><img src="<?php echo base_url();?>assets/images/close.png" alt=""></a></li>
                    <li>10th Standard <a href="#"><img src="<?php echo base_url();?>assets/images/close.png" alt=""></a></li>
                    <li>Exam 2022-23 SEPT <a href="#"><img src="<?php echo base_url();?>assets/images/close.png" alt=""></a></li>
                </ul>
                <a href="#" class="clear-btn">Clear filter selection</a>
            </div> -->

            <?php if($group_list){ ?> 

            <div class="across-row">
                <h2 class="across-title">Connect with students from your class across all brands</h2>

                <div class="across-col-box d-flex justify-content-between">
                    <?php //print_ex($group_list);
                        $i = 1;
                    foreach($group_list as $group){ 
                            if($i == 1){
                        ?>
                    <!--left-->
                    <div class="across-left">
                        <div class="standard-box">
                            <div class="standard-content">
                                <div class="standard-header"><?php echo  $group->board_name.' : '.$group->title.' : '.$group->batch_name; ?> </div>
                                <p><img src="<?php echo base_url();?>assets/images/group.png" alt="" /></p>
                                <div class="standard-header"><?php echo  $group->title.' : '.$group->tag; ?> </div>
                            </div>
                            <?php if($this->session->userdata('user_id')){ ?>
                                <a href="<?php echo base_url(); ?>cohort-group/<?php echo $group->cg_id;?>"><div class="standard-footer"><button type="button" class="join-btn">Join</button></div></a>
                            <?php }else{ ?>
                                
                                <a href="javascript:void(0)" class="standard-footer" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button"><div class="standard-footer"><button type="button" class="join-btn">Join</button></div></a>
                            <?php } ?>
                        </div>

                    </div>
                    <?php } $i++; } ?>            
                    <!--right-->
                    <div class="across-right">

                        <h3 class="room-title">Trending Rooms</h3>
                        <ul class="room-list-box">
                        <?php //print_ex($group_list);
                            $j = 1;
                        foreach($group_list as $group){ 
                                if($j == 2 || $j == 3 || $j == 4){
                            ?>
                            <li class="room-list">

                            <?php if($this->session->userdata('user_id')){ ?>
                                <a href="<?php echo base_url(); ?>view-cohort-group/<?php echo $group->cg_id;?>" class="anchor"></a><span><?php echo $group->tag; ?></span>
                            <?php }else{ ?>
                               
                                <a href="javascript:void(0)" class="standard-footer anchor" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button"></a><span><?php echo $group->tag; ?></span>
                            <?php } ?>
                               
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="<?php echo base_url();?>assets/images/dotts.png" alt="">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                      <!-- <li><a class="dropdown-item" href="#">Mute</a></li> -->
                                      <li><a class="dropdown-item" href="<?php echo base_url(); ?>leave-group/<?php echo $group->cg_id;?>">Leave</a></li>
                                      <!-- <li><a class="dropdown-item" href="#">Publish in General</a></li> -->
                                      <li><div class="sharethis-inline-share-buttons"></div></li>
                                      <!-- <li><a class="dropdown-item" href="#">Pin to top</a></li> -->
                                    </ul>
                                  </div>
                            </li>
                            <?php } $j++; } ?> 
                        </ul>

                    </div>

                </div>

            </div>


            <div class="across-row">
                <h2 class="across-title"><span>#</span> Ongoing discussion</h2>

                <ul class="room-list-box discussion-room-list d-flex flex-wrap justify-content-between">
                <?php //print_ex($ongoing_group_list);
                            $k = 1;
                    foreach($ongoing_group_list as $ongoinggroup){ 
                       // if($k > 5){
                            ?>
                    <li class="room-list">
                        <?php if($this->session->userdata('user_id')){ ?>
                            <a href="<?php echo base_url(); ?>view-cohort-group/<?php echo $ongoinggroup->cg_id;?>" class="anchor"></a>
                            <span><?php echo $ongoinggroup->tag; ?></span>
                        <?php }else{ ?>
                            
                            <a href="javascript:void(0)" class="standard-footer anchor" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button"></a>
                            <span><?php echo $group->tag; ?></span>
                        <?php } ?>
                       
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo base_url();?>assets/images/dotts.png" alt="">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <!-- <li><a class="dropdown-item" href="#">Mute</a></li> -->
                              <li><a class="dropdown-item" href="<?php echo base_url(); ?>leave-group/<?php echo $group->cg_id;?>">Leave</a></li>
                              <!-- <li><a class="dropdown-item" href="#">Publish in General</a></li> -->
                              <li><div class="sharethis-inline-share-buttons"></div></li>
                              <!-- <li><a class="dropdown-item" href="#">Pin to top</a></li> -->
                            </ul>
                          </div>
                    </li>
                    <?php } $k++; //} ?>
                    
                    <?php if($this->session->userdata('user_id')){ ?>
                    <li class="room-list btn-room-list">
                    <a href="<?php echo base_url(); ?>create-cohort?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>" class="discussion-btn"> <img src="<?php echo base_url();?>assets/images/review-icon2.png" alt=""> Create a discussion</a>
                    </li>
                <?php }else{ ?>
                    <li class="room-list btn-room-list">
                    <a href="javascript:void(0)" class="discussion-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button">Create a discussion</a></li>
                <?php } ?>

                </ul>

            </div>
            
            <?php }else{ echo "<div class='across-row'><h3>No Cohort Found..!</h3></div>"; } ?>

        </div>
        <!--center end-->


            <!--right start-->
            <div class="review-right">





            </div>
            <!--right end-->

        </div>
        <!--end-->


        <div class="helpful-box">
            <div class="container">

                <h2 class="helpful-title">You might find this helpful!</h2>

                <div class="helpful-inner-box d-flex">
                    <div class="helpful-left">
                    </div>

                    <div class="helpful-center">
                        <h3>Article topic title related to Search “Byju’s”</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indus.....</p>
                    </div>

                    <div class="helpful-right d-flex flex-wrap justify-content-center align-items-center text-center">
                        Quick Read<br/> 1 min
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--content end-->
</div>
<!--wrapper end-->
<script>
    $(document).ready(function() {

          $('#category').change(function() {
            var category_id = $('#category').val();
            if (category_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>get-cohort-class",
                    method: "POST",
                    data: {
                        category_id: category_id
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

        $('#brand').change(function() {
            var brand_id = $('#brand').val();
            if (brand_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>get-cohort-board",
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
           // alert(board_id);
            if(board_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>get-cohort-class",
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
           // alert(class_id);
            if(class_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>get-cohort-batch",
                    method:"POST",
                    data:{board_id:board_id,product_type:product_type,brand_id:brand_id,class_id:class_id},
                    success:function(data)
                    {
                        //console.log(data);
                        $('#batch').html(data);
                    }
                });
            }
        }); 
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
    var value_form = $('#product_review_reply_'+id).serialize();          $.ajax({
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
        url: base_url+'get-cohort-board',
        dataType: 'json',
        type: 'post',            
        data: {product_type: product_type,brand_id: brand_id},                                        
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
