
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edcohort</title>
    <!--font css-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!--plugin css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!--custom css-->
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/responsive.css" type="text/css" rel="stylesheet">
</head>

<body>

    <!--wrapper start-->
    <div class="wrapper">
        <!--content start-->
        <div class="content">

            <!--start-->
            <div class="review-main-box d-flex">

                <button type="button" class="filter-btn">Filter</button>

                <!--left start-->
                <div class="review-left">

                    <h3 class="filter-title">Filter</h3>
                   <form action="javascript:void(0)" id="form" name="form" method="post">
                    <div class="filter-col">

                        <div class="btn-group btn-toggle filter-toggle-box"> 
                            <button class="btn btn-lg btn-default">Online </button>
                            <button class="btn btn-lg btn-primary active">Offline</button>
                        </div>
                        <p class="online-results">Showing <span>(2677)</span> Online Cohort results for BYJU’s</p>
                    </div>
                  <?php if(!empty($board_list)){ ?>
                    <div class="filter-col">
                        <h3 class="filter-col-title">BOARD</h3>
                        <div class="select-box">
                               <select name="board" id="board">
                                <option value="">Select Board</option>
                                <?php foreach($board_list as $board){ ?>
                                <option value="<?php echo $board->board_id; ?>"><?php echo $board->board_name; ?></option>
                    <?php } ?>
                            </select>
                        </div>
                    </div>
                <?php } ?>
                    <?php if(!empty($class_list)){ ?>
                    <div class="filter-col">
                        <h3 class="filter-col-title">CLASS</h3>
                        <div class="select-box">
                            <select name="class" id="class">
                                <option value="">Select Class</option>
                            </select>
                        </div>
                    </div>
                <?php } ?>
                 <?php if(!empty($batch_list)){ ?>
                    <div class="filter-col">
                        <h3 class="filter-col-title">BATCH (Cohort) <span>Running Year</span></h3>
                        <div class="select-box">
                                <select name="batch" id="batch">
                                    <option value="">Select Batch</option>
                         </select>
                        </div>
                    </div>
                     <?php } ?>
                    <div class="filter-btn-col">
                        <button type="submit" onclick="submitForm()" class="apply-btn">Apply Filter</button>
                    </div>
</form>

                </div>
                <!--left end-->


                <!--center start-->
                <div class="review-center">

                    <div class="tab-link">
                        <ul>
                            <li><a href="#" class="active">All Brands</a></li>
                            <li><a href="#">All Courses</a></li>
                        </ul>
                    </div>

                    <div class="all-search-box">
                        <input type="text" placeholder="" value="BYJU’s. vedantu etc." class="all-search-input">
                        <input type="submit" class="all-search-submit">
                    </div> 

                    <div class="select-filter-box">
                        <span class="filterDisplayName"></span>
                        <span id="filter_item"></span>
                   <!--      <ul class="select-filter">

                            <li>ICSE <a href="#"><img src="images/close.png" alt=""></a></li>
                            <li>10th Standard <a href="#"><img src="images/close.png" alt=""></a></li>
                            <li>Exam 2022-23 SEPT <a href="#"><img src="images/close.png" alt=""></a></li>
                        </ul> -->
                        <a href="#" class="clear-btn">Clear filter selection</a>
                    </div>

                <!-- <div class="all-col-box">
                    <h2 class="all-col-title">Popular trending courses</h2>

                    <div class="popular-row" id="add_data">
            
                    </div>

                </div> -->
                <section id="product-showcase" class="all-col-box">
                    <h2 class="all-col-title">Top Brands</h2>
               <div class="container">
        <div class="">
         <div class="content-box">
           <div class="category-filter clearfix wow fadeInUp" data-wow-delay="0.3s">                            
               <a href="javascript:void(0)" id="list" class="pull-right grid-type hover-focus-border"  onclick="set_display('list')">
                  <span class="fa fa-icon-list" aria-hidden="true"></span>
              </a>
              <a href="javascript:void(0)" id="grid" class="pull-right grid-type hover-focus-border customBgColor color-main" onclick="set_display('grid')">
                  <span class="fa fa-grid" aria-hidden="true"></span>
              </a>
              <input type="hidden" name="display" id="display" value="grid">
          </div>
          <div class="products-cat clearfix">
                    <div id="add_data" class="popular-row">
                        
                    </div>
                </div>
                <div class="pagination-container wow fadeInUp d-flex justify-content-between robot-family" data-wow-delay="0.3s">
                    <div class="pagination-info font-additional align-self-center">
                        <span id="total_records"></span> Popular Brands
                    </div>
                    <div class="pagination-list align-self-center d-flex pagination-design" id="pagination-div-id">   </div>                                 
                </div>
            </div>
        </div>
    </div>              
</section>


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



<!--libs-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<!--plugin js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/ScrollToFixed/1.0.8/jquery-scrolltofixed-min.js'></script>

<script src="<?php echo base_url(); ?>/assets/js/ajax/manage_brands_ajax.js"></script>


<script  src="<?php echo base_url(); ?>/assets/js/script.js"></script>
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

</script>
<script>
$(document).ready(function(){
 $('#board').change(function(){
  var board_id = $('#board').val();
  if(board_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>get-brands-class",
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
    url:"<?php echo base_url(); ?>get-brands-batch",
    method:"POST",
    data:{board_id:board_id},
    success:function(data)
    {
     $('#batch').html(data);
    }
   });
  }
 }); 

});
</script>
</body>
</html>