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

 <section class="content">
    <div class="container-fluid">
         <?php  message(); ?>
        <div class="row row-header">
            <div class="col-md-8">
           <h1>
        Design With Us Management
        <small>Design List</small>
      </h1>
            </div>
           
            <div class="col-md-4">
                <h2><a class="btn bg-pink waves-effect m-b-15 collapsed" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-filter"></i> Filter
                </a></h2>
            </div>
        </div>
   
        <!-- Basic Examples -->
<div class="row collapse in" id="collapseExample" aria-expanded="false">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="body ">
                <form id="form">
                <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Name </label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                        <div class="form-group">
                            <div class="form-line">
                          <input type="text" class="form-control " id="" name="stock" value="<?php print_r(@$post['name']); ?>" placeholder="Name">
                            </div>                                           
                        </div>
                    </div>
                </div> 

                <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Company Name </label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                        <div class="form-group">
                            <div class="form-line">
                               <input type="text" class="form-control" id="" name="company" value="<?php print_r(@$post['company']); ?>" placeholder="Company Name">                              
                            </div>                                           
                        </div>
                    </div>
                </div>
                 <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Reference Number </label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control " id="" name="reference_number" value="<?php print_r(@$post['reference_number']); ?>" placeholder="Reference Number">                             
                            </div>                                           
                        </div>
                    </div>
                </div>
                <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Status </label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                        <div class="form-group">
                            <div class="form-line" id="status">
                              
                          <input type="checkbox" id="quote" name="checkboxlab[]" value="Quote" <?php if (@in_array("Quote", @$post['checkboxlab'])) { echo "checked"; } ?>>
                          <label for="quote" id="quote" class="SYD-ColorStyle btn">Quote</label>

                          <input type="checkbox" id="order" name="checkboxlab[]" value="Order" <?php if (@in_array("Order", @$post['checkboxlab'])) { echo "checked"; } ?>>
                          <label for="order" id="order" class="SYD-ColorStyle btn">Order</label> 

                          <input type="checkbox" id="processed" name="checkboxlab[]" value="Processed" <?php if (@in_array("Processed", @$post['checkboxlab'])) { echo "checked"; } ?>>
                          <label for="processed" id="processed" class="SYD-ColorStyle btn">Processed</label> 

                          <input type="checkbox" id="completed" name="checkboxlab[]" value="Completed" <?php if (@in_array("Completed", @$post['checkboxlab'])) { echo "checked"; } ?>>
                          <label for="completed" id="completed" class="SYD-ColorStyle btn">Completed</label>                             
                            </div>                                           
                        </div>
                    </div>
                </div>

                      <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Approval </label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                        <div class="form-group">
                            <div class="form-line" id="approval_status">
                          <input type="checkbox" id="pending_status" name="checkboxpolish[]" value="0" <?php if (@in_array("0", @$post['checkboxpolish'])) { echo "checked"; } ?>>
                        <label for="pending_status" id="pending_status" class="SYD-ColorStyle btn ">Pending</label>
                        <input type="checkbox" id="approved_status" name="checkboxpolish[]" value="1" <?php if (@in_array("1", @$post['checkboxpolish'])) { echo "checked"; } ?>>
                        <label for="approved_status" id="approved_status" class="SYD-ColorStyle btn ">Approved</label>                             
                            </div>                                           
                        </div>
                    </div>
                </div> 

                     <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 form-control-label">
                        <label for="">Processing Status </label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-12">
                        <div class="form-group">
                            <div class="form-line" id="processing_status">
                              
                          <input type="checkbox" id="new_quote" name="checkboxpps[]" value="1" <?php if (@in_array("1", @$post['checkboxpps'])) { echo "checked"; } ?>>
                        <label for="new_quote" id="new_quote" class="SYD-ColorStyle btn ">New Quote</label>

                        <input type="checkbox" id="sent_quote" name="checkboxpps[]" value="2" <?php if (@in_array("2", @$post['checkboxpps'])) { echo "checked"; } ?>>
                        <label for="sent_quote" id="sent_quote" class="SYD-ColorStyle btn ">Sent Quote</label>

                       <input type="checkbox" id="approved" name="checkboxpps[]" value="3" <?php if (@in_array("3", @$post['checkboxpps'])) { echo "checked"; } ?>>
                        <label for="approved" id="approved" class="SYD-ColorStyle btn ">Approved</label>

                         <input type="checkbox" id="sent_cad" name="checkboxpps[]" value="4" <?php if (@in_array("4", @$post['checkboxpps'])) { echo "checked"; } ?>>
                        <label for="sent_cad" id="sent_cad" class="SYD-ColorStyle btn ">Sent CAD</label> 

                        <input type="checkbox" id="cad_approved" name="checkboxpps[]" value="5" <?php if (@in_array("5", @$post['checkboxpps'])) { echo "checked"; } ?>>
                        <label for="cad_approved" id="cad_approved" class="SYD-ColorStyle btn ">CAD Approved</label> 

                        <input type="checkbox" id="finished" name="checkboxpps[]" value="6" <?php if (@in_array("6", @$post['checkboxpps'])) { echo "checked"; } ?>>
                        <label for="finished" id="finished" class="SYD-ColorStyle btn ">Finished</label>                            
                            </div>                                           
                        </div>
                    </div>
                </div>

                <div class="row clearfix col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">                        
                        <a href="<?php echo base_url() ?>design" class="btn bg-red btn-block waves-effect" ><i class="material-icons">refresh</i><span>RESET</span></a>
                    </div>
                </div>

                <div class="row clearfix"></div>               
                    </form>
            </div>
        </div>
    </div>
</div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="header">
                        <span class="header_span">Product (Total: <span id="total_records"></span>)</span>     
                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                          <form action="" id="per_page_form">
                          <span>Show <select name="per_page" id="per_page" class="" onchange="submitForm()">
                            <option value="10" >10</option>
                            <option value="20" >20</option>
                            <option value="30" >30</option>
                            <option value="50" >50</option>
                            <option value="100" selected>100</option>
                            <option value="200" >200</option>
                            <option value="500" >500</option>
                        </select> entries</span></form>
                        </div>                    
                                          
                    </div> 
                                         
                    <div class="body">
                        <div class="table-responsive1">
                            <table id="example" class="table table-bordered table-responsive table-striped table-hover table-condensed js-basic-example1 dataTable">
                              <thead class="bg-teal">
                                 <tr> 
                              <th>Action</th>
                              <!-- <th style="" class="remove-icon"><input style="background-color:#fff" type="checkbox" class="th_checkbox" name="checkAll" id="checkAll"></th> -->
                              <!-- <th>#</th> -->
                              <!-- <th class="header" style="">Stock #</th> -->
                              <th>Date</th>
                              <th>Status</th>
                              <th>Processing Status</th>
                              <th>Approval</th>
                              <th>Job#</th>   
                              <th>Reference Number</th>                              
                              <th>Company</th>
                              <th>Name</th>
                              <th>Contact</th>
                              <th>Email</th> 
                                                         
                              <th>Project</th>
                              <th>Frame</th>                              
                              <th>Finger Size</th>
                              <th>Metal</th>
                              <th>Center shape/size</th>
                              <th>Remark</th>
                              <!-- <th class="header" style="">Type</th>
                              <th class="header" style="">Item No</th>
                              <th class="header" style="">Product Name</th>                              
                              <th class="header" style="">Size</th>
                              <th class="header" style="">Metal</th>
                              <th class="header" style="">Diamond Clarity</th>                              
                              <th class="header" style="">Diamond Weight</th>
                              <th class="header" style="">Engraving</th> -->                              
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
                              <tbody id="add_data">
                                             
                              </tbody>          
                            </table>
                        </div>
                        <div id="pagination-div-id"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>


<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/manage_product.css"> 
<script src="<?php echo base_url() ?>assets/ajax/manage_product.js"></script> 
<script src="<?php echo base_url() ?>assets/ajax/manage_design_ajax.js"></script>

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
  <script>
      
  </script>