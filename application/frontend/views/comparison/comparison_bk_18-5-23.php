
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
            <li><a href="<?php echo base_url(); ?>complaint?course=<?php echo @$product_list['0']->brand_id; ?>">Complain 350</a></li>
            <li class="active"><a href="<?php echo base_url(); ?>comparison?course=<?php echo @$product_list['0']->brand_id; ?>">Compare 350</a></li>
            <li><a href="#">Counselling 350</a></li>
            <li><a href="#">Cohort</a></li>
            <li><a href="<?php echo base_url(); ?>review?course=<?php echo @$product_list['0']->brand_id; ?>">Reviews 350</a></li>
            <li><a href="#">Coupons</a></li>
        </ul>
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
    $comparison_id = count(explode(",",$this->input->get('brandID')));
    
    ?>

    <!--start-->
    <div class="review-main-box d-flex">
        <form action="" method="POST">
            <button type="button" class="filter-btn">Filter</button>

            <!--left start-->
            <div class="review-left">

                <h3 class="filter-title">Filter</h3>

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
                    <p class="online-results">Showing <span>(2677)</span> Online Cohort results for BYJU's</p>
                </div>

                <div class="filter-col">
                    <h3 class="filter-col-title">BOARD</h3>
                    <div class="select-box">
                        <select name="board" id="board">
                            <?php foreach($board_records as $board){?>
                                <option value="<?php echo $board->board_id; ?>" <?php if($board->board_id == @$product_list['0']->board_id){ echo 'selected'; } ?>><?php echo $board->board_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="filter-col">
                    <h3 class="filter-col-title">CLASS</h3>
                    <div class="select-box">
                        <select name="class" id="class">
                            <?php foreach($class_records as $class){?>
                                <option value="<?php echo $class->class_id; ?>" <?php if($class->class_id == @$product_list['0']->class_id){ echo 'selected'; } ?>><?php echo $class->title; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="filter-col">
                    <h3 class="filter-col-title">BATCH (Cohort) <span>Running Year</span></h3>
                    <div class="select-box">
                        <select name="batch" id="batch">
                            <?php foreach($batch_records as $batch){?>
                                <option value="<?php echo $batch->batch_id; ?>" <?php if($batch->batch_id == @$product_list['0']->batch_id){ echo 'selected'; } ?>><?php echo $batch->batch_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>



                <div class="filter-btn-col">
                    <button type="submit" class="apply-btn">Apply Filter</button>
                </div>
            </div>
        </form>
        <!--left end-->


        <!--center start-->
        <div class="review-center">

            <div class="review-btn-box">
                <button type="button" class="review-btn" data-bs-toggle="modal" data-bs-target="#compareModal"><img src="<?php echo base_url(); ?>assets/images/review-icon2.png" alt=""> Add a brand to compare</button>
            </div> 

            <div class="brand-add-box d-flex justify-content-center align-items-center">
                <?php //print_ex($brand_records); ?>

                <!--col-->
                <?php if(!empty($compare_list1)){
                   foreach($compare_list1 as $comp_list1){ ?>
                    <div class="popular-col">
                        <a href="<?php echo $comp_list1->brand_slug; ?>">
                            <div class="popular-col-image"><img src="<?php echo base_url(); ?>uploads/brand/<?php echo $comp_list1->brand_image; ?>" alt=""/></div>
                            <h3><?php echo $comp_list1->brand_name; ?></h3>
                            <div><img src="<?php echo base_url(); ?>assets/images/rating.png" alt=""></div>
                        </a>
                    </div>
                <?php } } ?>
                <!--col-->
                <?php if(!empty($compare_list2)){
                   foreach($compare_list2 as $comp_list2){ ?>
                    <div class="popular-col">
                        <a href="<?php echo $comp_list2->brand_slug; ?>">
                            <div class="popular-col-image"><img src="<?php echo base_url(); ?>uploads/brand/<?php echo $comp_list2->brand_image; ?>" alt=""/></div>
                            <h3><?php echo $comp_list2->brand_name; ?></h3>
                            <div><img src="<?php echo base_url(); ?>assets/images/rating.png" alt=""></div>
                        </a>
                    </div>
                <?php } }?>
                <?php if(!empty($compare_list3)){
                    foreach($compare_list3 as $comp_list3){ ?>
                      <div class="popular-col">
                        <a href="<?php echo $comp_list3->brand_slug; ?>">
                            <div class="popular-col-image"><img src="<?php echo base_url(); ?>uploads/brand/<?php echo $comp_list3->brand_image; ?>" alt=""/></div>
                            <h3><?php echo $comp_list3->brand_name; ?></h3>
                            <div><img src="<?php echo base_url(); ?>assets/images/rating.png" alt=""></div>
                        </a>
                    </div>
                <?php } } ?>
                <?php if($comparison_id >= 3) { ?>               
                <?php } else{ ?>
                   <button type="button" class="add-brand-icon" data-bs-toggle="modal" data-bs-target="#compareModal">
                    <img src="<?php echo base_url(); ?>assets/images/add-icon.png" alt="">
                    Add brand to compare
                </button>
            <?php } ?>

        </div>

        <div class="brand-review-table">
            <table>
                <tr>
                  <th colspan="4">Overall</th>
              </tr>
              <tr>
                  <td>Overall ratings</td>
                  <?php if(!empty($compare_list1)){ ?>
                      <td><span class="rating-number"><img src="<?php echo base_url(); ?>assets/images/Star.png" alt=""><?php echo @$compare_list1->overall_ranking; ?></span></td>
                  <?php } ?>
                  <?php if(!empty($compare_list2)){ ?>
                      <td><span class="rating-number"><img src="<?php echo base_url(); ?>assets/images/Star.png" alt=""><?php echo @$compare_list12->overall_ranking; ?></span></td>
                  <?php } ?>
                  <?php if(!empty($compare_list3)){ ?>
                      <td><span class="rating-number"><img src="<?php echo base_url(); ?>assets/images/Star.png" alt=""><?php echo @$compare_list3->overall_ranking; ?></span></td>
                  <?php } ?>
              </tr>
              <?php if(!empty($compare_list1)){ ?>
                  <!-- <tr>
                      <td>Aspect 1</td>
                      <td><img src="<?php echo base_url(); ?>assets/images/check.png" alt=""></td>
                      <td></td>
                      <td></td>
                  </tr> -->
              <?php } ?>
              <?php if(!empty($compare_list2)){ ?>
                  <!-- <tr>
                    <td>Aspect 1</td>
                    <td><img src="<?php echo base_url(); ?>assets/images/check.png" alt=""></td>
                    <td></td>
                    <td></td>
                </tr> -->
            <?php } ?>
            <?php if(!empty($compare_list3)){ ?>
                <tr>
                    <td>Aspect 1</td>
                    <td><img src="<?php echo base_url(); ?>assets/images/check.png" alt=""></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
            <tr>
                <th colspan="4">Faculty</th>
            </tr>
            <tr>
                <td>Faculty</td>
                <?php if(!empty($compare_list1)){ ?>
                    <td>Excellent</td>
                <?php } ?>
                <?php if(!empty($compare_list2)){ ?>
                    <td>Excellent</td>
                <?php } ?>
                <?php if(!empty($compare_list3)){ ?>
                    <td>Excellent</td>
                <?php } ?>
            </tr>
            <?php if(!empty($compare_list1)){ ?>
                <!-- <tr>
                    <td>Faculty</td>
                    <td>Excellent</td>
                    <td></td>
                    <td></td>
                </tr> -->
            <?php } ?>
            <?php if(!empty($compare_list2)){ ?>
                <!-- <tr>
                    <td>Aspect 1</td>
                    <td>Excellent</td>
                    <td></td>
                    <td></td>
                </tr> -->
            <?php } ?>
            <?php if(!empty($compare_list3)){ ?>
                <!-- <tr>
                    <td>Aspect 1</td>
                    <td>Excellent</td>
                    <td></td>
                    <td></td>
                </tr> -->
            <?php } ?>
            <tr>
                <th colspan="4">Academic Results</th>
            </tr>
            <?php if(!empty($compare_list1)){ ?>
                <tr>
                    <td>Academic Results</td>
                    <td>Excellent</td>
                    <td>Fair</td>
                    <td></td>
                </tr>

				
            <?php } ?>
            <?php if(!empty($compare_list2)){ ?>
                <!-- <tr>
                    <td>Academic Results</td>
                    <td>Excellent</td>
                    <td></td>
                    <td></td>
                </tr> -->
            <?php } ?>
            <?php if(!empty($compare_list3)){ ?>
                <!-- <tr>
                    <td>Academic Results</td>
                    <td>Excellent</td>
                    <td>Poor</td>
                    <td></td>
                </tr> -->
            <?php } ?>
			<tr>
                <th colspan="4">Referral Score</th>
            </tr>
            <?php if(!empty($compare_list1)){ ?>
                <tr>
                    <td>Referral Score</td>
                    <td>9</td>
                    <td>8</td>
                    <td></td>
                </tr>

				
            <?php } ?>
			<tr>
                <th colspan="4">Complaint Score</th>
            </tr>
            <?php if(!empty($compare_list1)){ ?>
                <tr>
                    <td>Complaint Score</td>
                    <td>Not much complaint</td>
                    <td>Not much complaint</td>
                    <td></td>
                </tr>

				
            <?php } ?>
			<tr>
                <th colspan="4">Market Reputation</th>
            </tr>
            <?php if(!empty($compare_list1)){ ?>
                <tr>
                    <td>Market Reputation</td>
                    <td>Excellent</td>
                    <td>Average</td>
                    <td></td>
                </tr>

				
            <?php } ?>
			<tr>
                <th colspan="4">Edcohort Rating</th>
            </tr>
            <?php if(!empty($compare_list1)){ ?>
                <tr>
                    <td>Edcohort Rating</td>
                    <td>Average</td>
                    <td>Excellent</td>
                    <td></td>
                </tr>

				
            <?php } ?>
        </table> 
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

            <div class="helpful-right">
                <a href="#" class="d-flex flex-wrap justify-content-center align-items-center text-center">Quick Read<br/> 1 min</a>
            </div>
        </div>

    </div>
</div>


<!--content end-->
<!--wrapper end-->
<!-- Modal -->
<div class="modal fade compare-modal-box" id="compareModal" tabindex="-1" aria-labelledby="compareModalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h3 class="search-title">Search Brands to compare</h3>
            <div class="brand-search-box">
                <div class="search-result-col" id="search-1" style="display: none;"><a href="#"><img src="<?php echo base_url(); ?>assets/images/close3.png" alt=""></a></div>
                <div class="search-result-col" id="search-2" style="display: none;"> <a href="#"><img src="<?php echo base_url(); ?>assets/images/close3.png" alt=""></a></div>
                <div class="search-result-col" id="search-3" style="display: none;"> <a href="#"><img src="<?php echo base_url(); ?>assets/images/close3.png" alt=""></a></div>
                <input class="brand-search-input" type="text" placeholder="Ex.Vedantu, unacademy ">
            </div>

            <div class="popular-row">
                <!--col-->
                <?php foreach($brand_records as $brand){ ?>
                    <div class="popular-col"> 
                        <a href="javascript:void(0)" onclick="compare_brand('<?php echo $brand->brand_name; ?>','<?php echo $brand->brand_id; ?>')">
                            <input type="checkbox" name="brand_select[]" id="brand_select" value="<?php echo $brand->brand_id; ?>" >
                            <div class="popular-col-image"><img src="<?php echo base_url();?>uploads/brand/<?php echo $brand->brand_image; ?>"></div>
                            <h3><?php echo $brand->brand_name; ?></h3>
                            <div class="popular-col-rating">
                                <div class="popular-star-rating"><img src="<?php echo base_url(); ?>assets/images/rating.png" alt=""></div>
                                <span class="rating-number"><img src="<?php echo base_url(); ?>assets/images/Star.png" alt=""><?php echo $brand->overall_ranking; ?></span>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>

            <div class="compare-info">
                <div class="compare-info-left">You can compare maximum 3 brands</div>
                <div class="compare-info-right"><span id="selectCount">0</span> of 3 selected</div>
                <div class="compare-info-left-error" id="compare-info-left-error" style="color:red; display: none;" >You can compare maximum only 3 brands</div>
            </div>

            <a href="javascript:void(0)" class="confirm-btn" id="compareBtn" >Compare</a>      
        </div>
    </div>
</div>

<!--libs-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<!--plugin js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/ScrollToFixed/1.0.8/jquery-scrolltofixed-min.js'></script>

<script  src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script>
    $('.btn-toggle').click(function() {
        if ($(this).find('.btn-primary').length>0) {
            $(this).find('.btn').toggleClass('btn-primary');
        } 
    });

    $(".filter-btn").click(function(){
        $(".review-left").toggleClass("open");
        $(".filter-btn").toggleClass("open");
    });
    $('.popular-col').click(function(){

    });

</script>

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
                $('#state').html('<option value="">Select State</option>');
                $('#city').html('<option value="">Select City</option>');
            }
        });

        $('#board').change(function(){
            var board_id = $('#board').val();
            if(board_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>get-course-class",
                    method:"POST",
                    data:{board_id:board_id},
                    success:function(data)
                    {
                        $('#class').html(data);
                    }
                });
            }
        }); 

        $('#board').change(function(){
            var board_id = $('#board').val();
            if(board_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>get-course-batch",
                    method:"POST",
                    data:{board_id:board_id},
                    success:function(data)
                    {
                        $('#batch').html(data);
                    }
                });
            }
        }); 



        $('#compareBtn').click(function(){

            var numberChecked =  $("input[name='brand_select[]']:checked").length;
            //alert(numberChecked);
            if(numberChecked > 3){

                //alert(numberChecked);

                $("#compare-info-left-error").show();

            }else{

                $("#compare-info-left-error").hide();

                var srs = [];

                $("input[name='brand_select[]']:checked").each( function () {
                    //alert( $(this).val() );
                    srs.push($(this).val());
                });
              // alert(srs);
                var brandID = srs.toString();

                window.location = base_url+'comparison?brandID='+brandID;


            //    $.ajax({
            //         url:"<?php echo base_url(); ?>comparison-search",
            //         method:"POST",
            //         data:{brandID:brandID},
            //         success:function(data)
            //         {
            //             $('#batch').html(data);
            //         }
            //     });

            }



        });

    });
</script>
<script type="text/javascript">
   var count = 0;
   function compare_brand(name,id){
       //count++;
       // alert(count);
    if(count < 3)
    {

        $("input[name='brand_select[]']:checked").on('change', function() {
            var $el = $(this);
            if ($el.prop('checked')) {
                count++;
                $('#selectCount').html("");
                $('#selectCount').html("<span>"+count+"</span>");
                //alert(count);
                
                    // $('#search-'+count+'').append("<p>"+name+"</p>");  
                    // $('#search-'+count+'').show(); 

            } else {
                count--;
                // $('#search-'+count+'').append();  
                // $('#search-'+count+'').hide(); 
                $('#selectCount').html("");
                $('#selectCount').html("<span>"+count+"</span>");

            }
        });




    }else{
        $('#compare-info-left-error').show(); 
    }

} 



</script>