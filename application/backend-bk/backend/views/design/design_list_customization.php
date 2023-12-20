<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_watch.css">  
<?php 
    $group_f=$this->input->get('group_f');
?>
<style>
  #pagination-div-id .active {
      background:#ffa600 !important;
      color: #fff;
      cursor: pointer;
      margin: 2px;
      text-decoration: none;
  }
  #pagination-div-id a {
      border-right: 1px solid #fff !important;
  }
  .dataTables_paginate a {
      padding: 6px 9px!important;
      background: #ddd!important;
      border-color: #ddd!important;
  }
  thead {
      background-color: #091931;
      color: #ffffff;
  }
  .table>thead>tr>td, .table>thead>tr>th {
      padding: 5px;
      vertical-align: middle;
      border-top: 1px solid #ddd;
      font-size: 14px;
      font-weight: bold;
  }
  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th {
      padding: 3px;
      line-height: 1.0 !important;
      vertical-align: middle;
      border-top: 1px solid #ddd;
      font-size: 11px;
      font-weight: bold;
  }
  .diamond_list {
      width: 1400px;
  }
  input[type=checkbox], input[type=radio] {
      margin: 0px 0 0; 
      margin-top: 1px\9;
      line-height: normal;
  }
  #search_div .col-md-1 {  
      padding-right: 0px;
      padding-left: 0px;
      width: 5.8%;
  }
  .btn.btn-flat {
      border-radius: 0;    
      border-width: 1px;
  }
  .range-input {
      border: 2px solid #d9d9d9;
      border-radius: 0px;
      font-weight:bold;
      width: 60px;
      height: 33px;
      text-align: center;
  }
  .page-border#search_div {
      border: 1px solid #091931;
      border-bottom: 5px solid #091931;
      border-top: 5px solid #091931;
      box-shadow: -4px 5px 5px #888888;
      margin-bottom: 15px;
  }
  .box-shadow {
      box-shadow: -4px 5px 5px #888888;
  }
  .dropdown-menu {
      box-shadow: none;
      display: none;
      float: left;
      font-size: 12px;
      left: 0;
      list-style: none;
      padding: 0;
      position: absolute;
      text-shadow: none;
      top: 100%;
      z-index: 9998;
      border: 1px solid #D9DEE4;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
      margin-top: 17px;
  }
  .dropdown-menu button {
      margin-bottom: 0;
      border-bottom: 1px solid #FFF !important;
      outline: none;
      border-radius: 0;
  }
  .btn-gray {
      background: linear-gradient(#255180, #255180) repeat scroll 0 0%, none repeat scroll 0 0 #255180;
      background: -moz-linear-gradient(#255180, #255180) repeat scroll 0 0%, none repeat scroll 0 0 #255180;
      background: -webkit-linear-gradient(#255180, #255180) repeat scroll 0 0%, none repeat scroll 0 0 #255180;
      color: #fff;
      font-size: 14px;
  }
  .btn-gray:hover {
        background:#172d44;
        color:#FFF;
  }
  i.fa.fa-search-plus {
      font-size: 17px;
      margin-top: 2px;
      cursor: pointer;
      color: #02a602;
  }
</style>
<style>
  .column {
      float: left;
      width: 100%;
  }
  .cursor {
      cursor: pointer
  }
  .image-icon img {
      width: 52px;
      cursor: pointer;
  }
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customization Design Management
        <small>Design List</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-12">
          <div class="box box-primary">
            <div class="box-header">
              <!-- <h3 class="box-title">Hover Data Table</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="container page-border col-md-12" id="search_div" style="display: none;">
            <form action="" method="post" id="form">
           
              
           
             
              
           
              <div class="row border-top">
                  <div class="col-md-12">             
                      <!--  <div class="col-md-6 search-border-right">
                      <label for="Color Group" class="DiamondtypeColor">Polish</label>
                      <input type="checkbox" id="idpolishEX" name="checkboxpolish[]" value="EX" <?php if (@in_array("EX", @$post['checkboxpolish'])) { echo "checked"; } ?>>
                      <label for="idpolishEX" class="SYD-ColorStyle btn PaddingCut">EX</label>
                      <input type="checkbox" id="idpolishVG" name="checkboxpolish[]" value="VG" <?php if (@in_array("VG", @$post['checkboxpolish'])) { echo "checked"; } ?>>
                      <label for="idpolishVG" class="SYD-ColorStyle btn PaddingCut">VG</label>
                      <input type="checkbox" id="idpolishGD" name="checkboxpolish[]" value="GD" <?php if (@in_array("GD", @$post['checkboxpolish'])) { echo "checked"; } ?>>
                      <label for="idpolishGD" class="SYD-ColorStyle btn PaddingCut">GD</label>
                      <input type="checkbox" id="idpolishFR-" name="checkboxpolish[]" value="FR-" <?php if (@in_array("FR-", @$post['checkboxpolish'])) { echo "checked"; } ?>>
                      <label for="idpolishFR-" class="SYD-ColorStyle btn PaddingCut">FR-</label> 
                  </div> -->
                   <div class="col-md-6">                  
                      <div class="pull-left">
                          <label for="Clarity"  class="DiamondtypeColor">Name</label>
                      </div>
                      <div class="col-md-5">
                          <input type="text" class="form-control " id="" name="stock" value="<?php print_r(@$post['name']); ?>" placeholder="Name">
                      </div>
                      
                  </div>
                  <div class="col-md-6">                  
                      <div class="pull-left">
                          <label for="Clarity"  class="DiamondtypeColor">Company</label>
                      </div>
                      <div class="col-md-5">
                          <input type="text" class="form-control " id="" name="company" value="<?php print_r(@$post['company']); ?>" placeholder="Company Name">
                      </div>
                      
                  </div>

                   <div class="row border-top">
                    <div class="col-md-6">                  
                          <div class="pull-left">
                              <label for="Clarity"  class="DiamondtypeColor">Reference Number</label>
                          </div>
                          <div class="col-md-5">
                              <input type="text" class="form-control " id="" name="reference_number" value="<?php print_r(@$post['reference_number']); ?>" placeholder="Reference Number">
                          </div>
                          
                      </div>
                      <div class="col-md-6">
                          <label for="Clarity"  class="DiamondtypeColor">Status </label>                      
                          <input type="checkbox" id="idlabGIA" name="checkboxlab[]" value="Quote" <?php if (@in_array("Quote", @$post['checkboxlab'])) { echo "checked"; } ?>>
                          <label for="idlabGIA" class="SYD-ColorStyle btn">Quote</label>
                          <input type="checkbox" id="idlabother" name="checkboxlab[]" value="Order" <?php if (@in_array("Order", @$post['checkboxlab'])) { echo "checked"; } ?>>
                          <label for="idlabother" class="SYD-ColorStyle btn">Order</label>  

                          <input type="checkbox" id="idlabotherp" name="checkboxlab[]" value="Processed" <?php if (@in_array("Processed", @$post['checkboxlab'])) { echo "checked"; } ?>>
                          <label for="idlabotherp" class="SYD-ColorStyle btn">Processed</label> 

                          <input type="checkbox" id="idlabotherc" name="checkboxlab[]" value="Completed" <?php if (@in_array("Completed", @$post['checkboxlab'])) { echo "checked"; } ?>>
                          <label for="idlabotherc" class="SYD-ColorStyle btn">Completed</label>                  
                      </div>
                  <!-- <div class="col-md-12">  
                  <div class="col-md-8">
                      <label for="Clarity"  class="DiamondtypeColor">Customization </label>
                      <input type="checkbox" id="idlabGIA" name="checkboxlab[]" value="custom" <?php if (@in_array("custom", @$post['checkboxlab'])) { echo "checked"; } ?>>
                      <label for="idlabGIA" class="SYD-ColorStyle btn">Yes</label>
                      <input type="checkbox" id="idlabother" name="checkboxlab[]" value="" <?php if (@in_array("", @$post['checkboxlab'])) { echo "checked"; } ?>>
                      <label for="idlabother" class="SYD-ColorStyle btn">No</label>                    
                  </div>
                  </div>  -->             
              </div>

                  
                  </div>              
              </div>
             
              <div class="row border-top">
                      <div class="col-md-12">  
                        
                         <div class="col-md-6 search-border-right">
                        <label for="Color Group" class="DiamondtypeColor">Approval</label>
                        <input type="checkbox" id="idpolishEX" name="checkboxpolish[]" value="0" <?php if (@in_array("0", @$post['checkboxpolish'])) { echo "checked"; } ?>>
                        <label for="idpolishEX" class="SYD-ColorStyle btn">Pending</label>
                        <input type="checkbox" id="idpolishVG" name="checkboxpolish[]" value="1" <?php if (@in_array("1", @$post['checkboxpolish'])) { echo "checked"; } ?>>
                        <label for="idpolishVG" class="SYD-ColorStyle btn">Approved</label>
                       <!--  <input type="checkbox" id="idpolishGD" name="checkboxpolish[]" value="2" <?php if (@in_array("2", @$post['checkboxpolish'])) { echo "checked"; } ?>>
                        <label for="idpolishGD" class="SYD-ColorStyle btn PaddingCut">Reject</label> -->
                        <!-- <input type="checkbox" id="idpolishFR-" name="checkboxpolish[]" value="FR-" <?php if (@in_array("FR-", @$post['checkboxpolish'])) { echo "checked"; } ?>>
                        <label for="idpolishFR-" class="SYD-ColorStyle btn PaddingCut">FR-</label> --> 
                    </div>

                     <div class="col-md-6 search-border-right">
                        <label for="Color Group" class="DiamondtypeColor">Processing Status</label>

                        <input type="checkbox" id="idpolish1" name="checkboxpps[]" value="1" <?php if (@in_array("1", @$post['checkboxpps'])) { echo "checked"; } ?>>
                        <label for="idpolish1" class="SYD-ColorStyle btn ">New Quote</label>

                        <input type="checkbox" id="idpolish2" name="checkboxpps[]" value="2" <?php if (@in_array("2", @$post['checkboxpps'])) { echo "checked"; } ?>>
                        <label for="idpolish2" class="SYD-ColorStyle btn ">Sent Quote</label>

                       <input type="checkbox" id="idpolish3" name="checkboxpps[]" value="3" <?php if (@in_array("3", @$post['checkboxpps'])) { echo "checked"; } ?>>
                        <label for="idpolish3" class="SYD-ColorStyle btn ">Approved</label>

                         <input type="checkbox" id="idpolish4" name="checkboxpps[]" value="4" <?php if (@in_array("4", @$post['checkboxpps'])) { echo "checked"; } ?>>
                        <label for="idpolish4" class="SYD-ColorStyle btn ">Sent CAD</label> 

                        <input type="checkbox" id="idpolish5" name="checkboxpps[]" value="5" <?php if (@in_array("5", @$post['checkboxpps'])) { echo "checked"; } ?>>
                        <label for="idpolish5" class="SYD-ColorStyle btn ">CAD Approved</label> 

                        <input type="checkbox" id="idpolishF6" name="checkboxpps[]" value="6" <?php if (@in_array("6", @$post['checkboxpps'])) { echo "checked"; } ?>>
                        <label for="idpolish6" class="SYD-ColorStyle btn ">Finished</label> 

                    </div>
                  </div>              
              </div>
              
                <div class="row border-top">
                    <div class="col-md-12">
                        
                        <div class="col-md-8">
                            
                        </div>
                         
                        <div class="col-md-2 pull-right">
                            <!-- <button type="submit" class="btn btn-flat btn-primary"><i class="fa fa-search"></i> Search</button> -->
                            <a href="<?php echo base_url(); ?>design_customization"><button type="button" class="btn btn-flat btn-primary"><i class="fa fa-refresh"></i> Reset</button></a>
                        </div>
                    </div>                
                </div>
             
              </form>
          </div>
          <div class="clearfix">  </div>
          <div class="row image-icon">
            <div class="col-lg-12 spacer-bottom"> 
              <div class="col-lg-5">
                <nav  style="background-color: #ffffff;padding: 3px;">                  
                 <!-- <span class="dropdown">
                    <img src="<?php echo base_url(); ?>assets/front/images/download.png" alt="Download" class="my-tooltip my-dropdown" data-toggle="dropdown" data-placement="top">
                    <ul class="dropdown-menu">
                      <li><button type="button" class="btn btn-sm btn-block btn-gray" onclick="export_list()">Stock</button></li>
                      <li><button type="button" class="btn btn-sm btn-block btn-gray" onclick="download('image')">Image</button></li>
                      <li><button type="button" class="btn btn-sm btn-block btn-gray" onclick ="download('certificate')">Certificate</button></li>
                      <li><button type="button" class="btn btn-sm btn-block btn-gray" onclick ="download('video')">Video</button></li> 
                    </ul>
                  </span>
                  <img src="<?php echo base_url(); ?>assets/front/images/print.png" alt="Print" onclick="print_data()" class="my-tooltip my-dropdown" data-toggle="tooltip" data-placement="top" title="Print">

                  <img src="<?php echo base_url(); ?>assets/front/images/view-icon.png" alt="View" onclick="view_data()" class="my-tooltip my-dropdown" data-toggle="tooltip" data-placement="top" title="View">                   
                  <img src="<?php echo base_url(); ?>assets/front/images/delete-icon.png" alt="Delete" onclick="delete_data()" class="my-tooltip my-dropdown" data-toggle="tooltip" data-placement="top" title="Delete">
                  <a href=""><img src="<?php echo base_url(); ?>assets/front/images/refresh-icon.png" alt=Refresh"" id="refreshpage" class="my-tooltip my-dropdown" data-toggle="tooltip" data-placement="top" title="Refresh"></a>
                  <img src="<?php echo base_url(); ?>assets/front/images/back-icon.png" alt="Back" data-toggle="modal" data-target="" onclick="window.history.back()" data-placement="top" title="Back" data-tooltip="true">-->
                  <!-- <img src="<?php echo base_url(); ?>assets/front/images/send.png" alt="Send" onclick="send_data()" data-placement="top" title="Send" data-tooltip="true"> -->
                <!-- <a href="" onclick="return confirm_boot_a($(this))" data-message="Are You Sure?">confirm</a> -->
                </nav>
              </div>
              <div class="col-md-3 hide_show p15-top">
                  <span  class="btn btn-primary btn-flat" onclick="show_search()" id="show_advance"><i class="fa fa-arrow-circle-down"></i> Show Filter</span>                       
              </div>
              <div class="col-md-4 pull-right p15-top">
                  <p  style="font-weight: bold;text-align:right"><span id="total_records"></span> &nbsp;&nbsp;<label style="text-align: right"> Enquiry Found</label></p>         
              </div>   
          </div> 
          <div class="col-sm-12">
            <div class="col-sm-6">
              <div class="dataTables_length" id="example1_length">
                <?php $per_page= ($this->input->get('per_page')) ? $this->input->get('per_page') : 35 ; ?>
                <form action="" id="per_page_form">
                <span>Show <select name="per_page" id="per_page" aria-controls="example1" class="form-control input-sm" onchange="submitForm()">
                    <option value="10" <?php if($per_page==10){ echo "selected"; } ?>>10</option>
                    <option value="25" <?php if($per_page==25){ echo "selected"; } ?>>25</option>
                    <option value="35" <?php if($per_page==35){ echo "selected"; } ?>>35</option>
                    <option value="50" <?php if($per_page==50){ echo "selected"; } ?>>50</option>
                    <option value="100" <?php if($per_page==100){ echo "selected"; } ?>>100</option>
                    </select> entries</span></form>
              </div>
            </div> 
            <div class="col-sm-6">       
              <div id="pagination-div-id" class="dataTables_paginate paging_simple_numbers"><?php echo @$page_link; ?></div>
            </div>
          </div>
        </div>


              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">              
                <div class="row">
                  <div class="col-sm-12 ">
                    <div class="table-responsive1">          
                      <table id="example" class="tablesorter table display nowrap table-bordered table-responsive table-condensed"> 
                          <thead  class="btn-gray text-uppercase"> 
                          <tr> 
                              <th style="" class="remove-icon">Action</th>
                              <!-- <th style="" class="remove-icon"><input style="background-color:#fff" type="checkbox" class="th_checkbox" name="checkAll" id="checkAll"></th> -->
                              <!-- <th>#</th> -->
                              <!-- <th class="header" style="">Stock #</th> -->
                              <th class="header col-md-1" style="">Date</th>
                              <th class="header" style="">Status</th>
                              <th class="header" style="">Processing Status</th>
                              <th class="header" style="">Approval</th>  
                              <th class="header col-md-2" style="">Company</th>
                              <th class="header col-md-2" style="">Name</th>
                              <th class="header col-md-6" style="">Contact</th>
                              <th class="header col-md-1" style="">Email</th>
                              
                              <!-- <th class="header" style="">Frame</th>                              
                              <th class="header" style="">Budget</th> -->
                              <!-- <th class="header" style="">Type</th> -->
                              
                              <th class="header" style="">Item No</th>
                              <!-- <th class="header" style="">Product Name</th> -->                              
                              <th class="header" style="">Size</th>
                              <th class="header" style="">Metal</th>
                              <!-- <th class="header" style="">Diamond Clarity</th> -->                              
                              <th class="header" style="">Diamond Weight</th>
                              <th class="header" style="">Center shape/size</th>
                              <!-- <th class="header" style="">Engraving</th> -->
                              <th class="header" style="">Note</th>
                              
                             <!-- <th class="header" style="">Flour</th>
                              <th class="header" style="">Disc%</th>
                              <th class="header" style="">Depth%</th>
                           
                              <th class="header" style="">Table%</th>-->
                              <!-- <th class="header" style="width: 107px;">Rap.($)</th> -->
                              <!--<th class="header" style="">$/Carat</th>-->
                             <!-- <th class="header" style="">Total $</th>-->
                              <!-- <th class="header" style="width: 98px;">Descrip</th> -->
                              <!--<th class="header" style="">Lab</th>-->
                              <!-- <th class="header" style="width: 96px;">Pic</th>
                              <th class="header" style="width: 97px;">Brand</th> -->
                              <!--<th class="header" style="">Measurements</th>-->
                              <!-- <th class="header" style="">Vendor</th> -->
                              <!-- <th class="header col-md-1" style="">Date</th> -->
                          </tr>
                          </thead>

                      <tbody id="add_data" style=""> 
                          
                      </tbody>        
                  </table>
                  
                  <input type="hidden" value="<?php echo $where; ?>" id="where" name="where">
                 <!--  <div id="pagination-div-id" class="dataTables_paginate paging_simple_numbers"><?php //echo @$page_link; ?></div>   -->
                 </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>


<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/manage_product.css"> 
<script src="<?php echo base_url() ?>assets/ajax/manage_product.js"></script> 
<script src="<?php echo base_url() ?>assets/ajax/manage_design_ajax_customization.js"></script>

<script>
// $(function(){   
//    $('#pagination-div-id a').each(function () {
//       var a=$(this).attr("href");
//       $(this).attr("onclick",'pagination("'+a+'")');
//       $(this).attr("href","javascript:void(0)");
//   });
// });
// function pagination(argument) {
//   //alert(argument);

//   loadMoreData(argument);
// }
</script>
<script>
// $(document).ready(function(){
//   $('th.header').click(function(){
//         var table = $(this).parents('table').eq(0)
//         var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
//         this.asc = !this.asc
//         if (!this.asc){rows = rows.reverse()}
//         for (var i = 0; i < rows.length; i++){table.append(rows[i])}
//     });
//   });
//     function comparer(index) {
//         return function(a, b) {
//             var valA = getCellValue(a, index), valB = getCellValue(b, index)
//             return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
//         }
//     }
//     function getCellValue(row, index) { 
//         return $(row).children('td').eq(index).html() 
//     }  
</script>
<script>
// $(document).ready(function(){
//    $('#example').DataTable( { 
//       "scrollY": 600,
//       "scrollX": true,
//   });
//  });
</script>
<?php   
    $range_arr = explode(';', @$post['range']);
    $total_arr = explode(';', @$post['total']);
 ?>
<input type="hidden" value="<?php echo @$range_arr['0'] ?>" id="range_from">
<input type="hidden" value="<?php echo @$range_arr['1'] ?>" id="range_to">
<input type="hidden" value="<?php echo @$total_arr['0'] ?>" id="total_from">
<input type="hidden" value="<?php echo @$total_arr['1'] ?>" id="total_to">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    var range_from=$("#range_from").val();
        if(range_from=="")
        {
            range_from=0;
        }
        var range_to=$("#range_to").val();
        if(range_to=="")
        {
            range_to=6;
        }
    $( "#slider-range" ).slider({
      range: true,
      step: 0.01,
      min: 0,
      max: 6,
      values: [ range_from, range_to ],
      slide: function( event, ui ) {
        $( "#range1" ).val( ui.values[ 0 ] );
        if(ui.values[1] >= 6)
        {
            $( "#range2" ).val( ui.values[ 1 ] +'+');
        }
        else
        {
           $( "#range2" ).val( ui.values[ 1 ]);
        }
        //$( "#range2" ).val( ui.values[ 1 ] );
        $( "#range" ).val( ui.values[ 0 ]+";"+ui.values[ 1 ] );
      },
      change: function(event, ui) { 
        submitForm(); 
      }

    });
    $( "#range1" ).val( $( "#slider-range" ).slider( "values", 0 ) );
    if($("#slider-range").slider("values",1)>=6)
    {
        $( "#range2" ).val( $( "#slider-range" ).slider( "values", 1 )+'+' );
    }
    else
    {
       $( "#range2" ).val( $( "#slider-range" ).slider( "values", 1 ) ); 
    }
    
    $( "#range" ).val( $( "#slider-range" ).slider( "values", 0 )+";"+$( "#slider-range" ).slider( "values", 1 ) );

  } );
  </script>
  <script>
  $( function() {
    var total_from=$("#total_from").val();
        if(total_from=="")
        {
            total_from=0;
        }
        var total_to=$("#total_to").val();
        if(total_to=="")
        {
            total_to=500000;
        }
    $( "#slider-total" ).slider({
      range: true,
      step: 1,
      min: 0,
      max: 500000,
      values: [ total_from, total_to ],
      slide: function( event, ui ) {
        $( "#total1" ).val( ui.values[ 0 ] );
        $( "#total2" ).val( ui.values[ 1 ] );
        $( "#total" ).val( ui.values[ 0 ]+";"+ui.values[ 1 ] );
      },
      change: function(event, ui) { 
        submitForm(); 
      }

    });
    $( "#total1" ).val( $( "#slider-total" ).slider( "values", 0 ) );
    $( "#total2" ).val( $( "#slider-total" ).slider( "values", 1 ) );
    $( "#total" ).val( $( "#slider-total" ).slider( "values", 0 )+";"+$( "#slider-total" ).slider( "values", 1 ) );

  } );
  </script>