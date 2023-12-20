<div class="breadcrumb ">  
   <div class="container">
    <div class="d-flex justify-content-between align-items-center">
    <div> <h2><span>Completed Orders</span></h2></div>
     <div><ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>" title="Back to the frontpage">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=""><?php echo $page_head; ?></a>
      </li>
    </ul></div>
     </div>
   </div>
</div>
<section class="border-bottom-light sm-text-center section-padding login-design">
  <div class="container">
    <div class="row">
      <?php $this->load->view('common/sidebar'); ?>
      <div class="col-lg-9">
        <?php echo message(); ?>
        
      <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables/dataTables.bootstrap.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery.dataTables.min.css"> 

       <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dia-home/css/style_watch.css">  
<?php 
    $group_f=$this->input->get('group_f');
?>
<style>
    #example .btn-gray {
    background: linear-gradient(#255180, #255180) repeat scroll 0 0%, none repeat scroll 0 0 #255180;
    background: -moz-linear-gradient(#255180, #255180) repeat scroll 0 0%, none repeat scroll 0 0 #255180;
    background: #041e42;
    color: #fff;
    font-size: 14px;
    font-weight: 100;
}
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
      font-weight: 500;
  }
  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th {
      padding: 3px;
      line-height: 1.0 !important;
      vertical-align: middle;
      border-top: 1px solid #ddd;
      font-size: 11px;
      font-weight: 500;
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
            <?php echo csrf_field(); ?>
              
           
             
              
           
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
                  <!-- <div class="col-md-12">  
                  <div class="col-md-8">
                      <label for="Clarity"  class="DiamondtypeColor">Customization </label>
                      <input type="checkbox" id="idlabGIA" name="checkboxlab[]" value="custom" <?php if (@in_array("custom", @$post['checkboxlab'])) { echo "checked"; } ?>>
                      <label for="idlabGIA" class="SYD-ColorStyle btn">Yes</label>
                      <input type="checkbox" id="idlabother" name="checkboxlab[]" value="" <?php if (@in_array("", @$post['checkboxlab'])) { echo "checked"; } ?>>
                      <label for="idlabother" class="SYD-ColorStyle btn">No</label>                    
                  </div>
                  </div> -->              
              </div>

                  
                  </div>              
              </div>
             
              
                <div class="row border-top">
                    <div class="col-md-12">
                        
                        <div class="col-md-8">
                            
                        </div>
                         
                        <div class="col-md-2 pull-right">
                            <!-- <button type="submit" class="btn btn-flat btn-primary"><i class="fa fa-search"></i> Search</button> -->
                            <a href="<?php echo base_admin(); ?>design"><button type="button" class="btn btn-flat btn-primary"><i class="fa fa-refresh"></i> Reset</button></a>
                        </div>
                    </div>                
                </div>
             
              </form>
          </div>
          <div class="clearfix">  </div>
          <div class="row image-icon">
            <div class="col-lg-12 spacer-bottom"> 
              
             <!--  <div class="col-md-4 pull-right p15-top">
                  <p  style="font-weight: bold;text-align:right"><span id="total_records"></span> &nbsp;&nbsp;<label style="text-align: right"> Enquiry Found</label></p>         
              </div>    -->
          </div> 
         <!--  <div class="col-sm-12">
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
          </div> -->
        </div>


              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap" style="min-height: 500px;">              
                <div class="row">
                  <div class="col-sm-12 ">
                    <div class="table-responsive">          
                      <table id="example" class="tablesorter table display nowrap table-bordered table-condensed"> 
                          <thead  class="btn-gray text-uppercase"> 
                          <tr>                          
                                                      
                              <th class="header" style="">Detail</th>  
                              <th class="header" style="">Date</th>
                              <th class="header" style="">Your Reference</th>
                              <th class="header" style="">Finger Size</th>
                              <th class="header" style="">Metal</th>
                              <th class="header" style="">DTW</th> 
                              <th class="header" style="">CTW</th>
                              <!-- <th class="header" style="">Center diamond</th>      -->                         
                              <th class="header" style="">Price</th>
                              <th class="header" style="">Status</th>    
                                                        
                                                                                    
                          </tr>
                          </thead>
                      <tbody id="add_data" style=""> 
                      <?php if(!empty($records)){
                          foreach ($records as $rec) {
                        ?>
                       <tr style="font-size:12px; font-weight:bold;" role="row">  
                        <td><a class="btn btn-default" href="<?php echo base_url(); ?>design-detail/<?php echo $rec->design_id; ?>"><i class="fa fa-search-plus" title="" data-toggle="tooltip" style="" data-original-title="View details"></i>View Detail</a></td>  
                        <td><?php echo date('m/d/Y',strtotime($rec->create_date)); ?></td>
                        <td><?php echo $rec->reference_number; ?></td>    
                        <td><?php echo $rec->size; ?></td>     
                        <td><?php echo $rec->metal; ?></td>    
                       <!--  <td><?php echo $rec->center_diamond; ?></td> -->
                       <td><?php echo $rec->diamond_weight; ?></td>    
                        <td><?php echo $rec->color_diamond_weight; ?></td>  
                        <td><?php echo $rec->budget; ?> <i class="fa fa-key" aria-hidden="true"></i><i class="fa fa-key" aria-hidden="true"></i><i class="fa fa-key" aria-hidden="true"></i></td>    
                        <td><?php echo $rec->status; ?></td>
                         
                      </tr> 
                      <?php } } ?>
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
        <!-- <form class="form-horizontal" action="<?php echo base_url(); ?>update-password" id="profile_form" method="post">
          <div class="panel panel-info radius-flat">
            <div class="panel-heading bg-dark-gray padding-two text-center"><h4 class="white-text text-extra-large">Password Change </h4></div>
            <div class="panel-body">
              <?php echo csrf_field(); ?>
              <div class="box-body">                    
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Current Password*</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control radius-flat" name="oldpassword" id="oldpassword" required >
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">New Password*</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control radius-flat" name="newpassword" id="newpassword" required >
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Confirm Password*</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control radius-flat" name="cnfpassword" id="cnfpassword" required >
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-md-12">                      
                        <div class="text-danger" id="password_message"></div>
                    </div>
                </div>                 
              </div>            
            </div>
            <div class="panel-footer">
              <button type="submit" class="btn btn-primary radius-flat" onclick="return validateEditPassword()">Update</button>
              <button type="button" class="btn btn-danger radius-flat" onclick="window.history.back()">Cancel</button>
            </div>
          </div>
        </form> -->

      </div>
    </div>
  </div>
</section>


