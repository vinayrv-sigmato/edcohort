<!--content start-->
 <!-- Data table css -->
 <link href="<?php echo base_url(); ?>assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/datatable/css/jquery.dataTables.min.css" rel="stylesheet" />

 <!-- Time picker Plugin -->
 <link href="<?php echo base_url(); ?>assets/plugins/time-picker/jquery.timepicker.css" rel="stylesheet" />

<!-- Date Picker Plugin -->
<link href="<?php echo base_url(); ?>assets/plugins/date-picker/spectrum.css" rel="stylesheet" />



<!--banner start-->
<div class="inner-banner">
    
<?php $course = $this->input->get('course'); 
          $brandID = $this->input->get('brand');
          $product_type = $this->input->get('product_type');
          $board = $this->input->get('board');
          $class = $this->input->get('class');
          $batch = $this->input->get('batch');
          $customer_rating = $this->input->get('customer_rating');
          $date_posted = $this->input->get('date_posted');
          $sort_by = $this->input->get('sort_by');
    
    ?>

    <!-- <div class="breadcrumb">
        <ul>
            <li>Home</li>
            <li>Popular brands</li>
            <li><a href="#">BYJU's</a></li>
        </ul>
    </div> -->

    <div class="tab-menu">
     <ul>
   <li><a href="<?php echo base_url(); ?>complaint?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Complaint </a></li>
   <li><a href="<?php echo base_url(); ?>comparison?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Compare </a></li>
   <li class="active"><a href="<?php echo base_url(); ?>counselling?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Counselling <?php echo $counselling_count; ?></a></li>
   <li><a href="<?php echo base_url(); ?>cohort?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Cohort</a></li>
   <li><a href="<?php echo base_url(); ?>review?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Reviews</a></li>
   <li><a href="<?php echo base_url(); ?>coupon?course=<?php echo @$course; ?>&brand=<?php echo $brandID;?>&product_type=<?php echo  $product_type; ?>&board=<?php echo $board;?>&class=<?php echo $class;?>&batch=<?php echo $batch; ?>&customer_rating=<?php echo  $customer_rating; ?>&date=<?php echo $date_posted; ?>&sort_by=<?php echo $sort_by; ?>">Coupons</a></li>
</ul>
    </div>

</div>
<!--banner end-->


<!--content start-->
<div class="content">

    <!--start-->
    <div class="counselling-detail-box">
    <div class="container">

    <?php echo message(); ?>

    <?php foreach($counselling_list as $counselling){ ?>
        <div class="counselling-detail-banner d-flex">
            <div class="counselling-banner-image">
                <img src="<?php echo base_url(); ?>uploads/user/<?php echo $counselling->image; ?>" alt="">
            </div>
            <div class="counselling-banner-content">
                <h3><?php echo ucwords($counselling->firstname); ?></h3> <p></h3>
                <p>Faculty at <?php echo ucwords($counselling->brand_name); ?></p>
                <span class="rating-number"><img src="images/Star.png" alt=""> 3.2</span>
            </div>
        </div>

        <div class="select-filter-box">
            <ul class="select-filter">
                <li>ICSE <a href="#"></a></li>
                <li>10th Standard <a href="#"></a></li>
                <li>Exam 2022-23 SEPT <a href="#"></a></li>
            </ul>
        </div>    

        <!-- <div class="counselling-detail-description">
            <?php echo ucwords($counselling->title); ?>
        </div> -->

        
            <div class="counselling-date-box">
                <div class="calendar-main-box d-flex justify-content-between g-4">

                    <div class="calendar-box">
                        <h3 class="mb-4"><?php echo ucwords($counselling->title); ?></h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                    <div class="select-time-box">
                    <a href="javascript:void(0)" class="time-btn mb-4" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#TimeModal"><?php echo date('d-M-Y',strtotime($counselling->c_date)); ?> </a>
                    <a href="javascript:void(0)" class="time-btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#TimeModal">
                    <?php echo date('h:i a',strtotime($counselling->start_time)); ?> to
                        <?php echo date('h:i a',strtotime($counselling->end_time)); ?>
                    </a>
                    
                        <div class="time-box mt-4">
                        <div class="card">
                            <div class="form">
                                <div class="right-side">
                                    <h3>Payment details</h3>
                                    <div class="input-text">
                                        <input type="text" id="user_name_input" onkeyup="userName(this.value)" placeholder="Username" require>
                                        <span>Cardholder name</span>
                                    </div>
                                    <div class="input-text">
                                        <input type="text" id="user_card_number_input" placeholder="0000 0000 0000 0000" onkeyup="userCardNumber(this.value)" data-slots="0" data-accept="\d" require>
                                        <span>Card number</span>
                                    </div> 
                                    <div class="input-div">
                                        <div class="input-text">
                                           <input type="text" onkeyup="usercardcvv(this.value)" placeholder="MM/YYYY" data-slots="MY" require>
                                           <span>Valid upto</span>
                                        </div>
                                        <div class="input-text ">
                                           <input type="text" placeholder="000" data-slots="0" data-accept="\d" size="3" require>
                                           <span>CVV</span>
                                        </div>
                                    </div> 
                                    <div class="button">
                                        <button class="click-pay">Pay $25.99</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- <h4 class="time-title">Date</h4> -->
                    <!-- <input class="form-control fc-datepicker" name="date" placeholder="MM/DD/YYYY" type="text" > -->
                    
                    <!-- </div> -->

                    <!-- <div class="select-time-box">
                        <h4 class="time-title">Time</h4>

                        <div class="time-box">
                        
                        
            
                        </div>

                        <a href="javascript:void(0)" class="time-btn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#TimeModal">Select time</a>
                    </div> -->

                </div>
            </div>
            <form action="<?php echo base_url(); ?>counselling-submit" method="post" enctype="multipart/form-data">
   
                <?php echo csrf_field(); ?>
                <input type="hidden" class="form-control" name="counselling_id" id="counselling_id" placeholder="Your Name" value="<?php echo $this->uri->segment(2); ?>">
                <input type="hidden" class="form-control" name="user_id" id="userid" placeholder="Your Name" value="<?php echo $this->session->userdata('user_id'); ?>">
                <input type="hidden" class="form-control" name="email" id="email"  value="<?php echo $this->session->userdata('user_email'); ?>">
                <input type="hidden" class="form-control" name="name" id="name"  value="<?php echo $this->session->userdata('user_fullname'); ?>">
                <input type="hidden" class="form-control" id="phone" name="phone" value="<?php echo $this->session->userdata('user_phone'); ?>">
                <div class="description-editor-box">
                    <p>Add description (Optional)</p>
                    <div class="editor-box">
                        <textarea class="summernote" name="comment"></textarea>
                    </div>
                </div>
                <?php if($this->session->userdata('user_id')){ ?>
                 <div class="reply-footer-right">
                    <button type="submit"  data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#rateModal" class="reply-footer-btn">Submit</button>
                </div>
                <?php }else{ ?>
                    <div class="reply-footer-right">
                    <a href="javascript:void(0)" class="reply-footer-btn" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#login-button">Submit</a></div>
                <?php } ?>
            </form>
    <?php } ?>

    </div>
    </div>
    <!--end-->

    <script>
 var enabledDates = new Array('2020-01-12', '2020-01-16', '2020-01-18', '2020-01-30', '2020-02-05', '2020-02-10');

$(document).ready(function() {
    $('.summernote').summernote({
        height: 300,
        });

  $("#newOrderDates").datepicker({
    todayHighlight: true,
    format: 'yyyy-mm-dd',
    multidate: true,
    startDate: new Date(),
    beforeShowDay: function(date) {
      var sdate = moment(date).format('YYYY-MM-DD');
      if ($.inArray(sdate, enabledDates) !== -1) {
        return {
          enabled: true
        }
      } else {
        return {
          enabled: false
        }
      }
    }
  });
});


    </script>


   

    



    

   


</div>
<!--content end-->

<!-- Timepicker js -->
<script src="<?php echo base_url(); ?>assets/plugins/time-picker/jquery.timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/time-picker/toggles.min.js"></script>

<!-- Datepicker js -->
<script src="<?php echo base_url(); ?>assets/plugins/date-picker/spectrum.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/date-picker/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.maskedinput.js"></script>
<script src="<?php echo base_url(); ?>assets/js/date-picker.js"></script>


