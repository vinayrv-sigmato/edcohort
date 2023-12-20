
<?php 
    $group_f=$this->input->get('group_f');
?>
<style>
  #pagination-div-id .active {
      background:#1a2b47  !important;
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
      color: #304465;
  }

  .brl-loose-diamonds {
      margin-top: 0 !important;
      margin-bottom: 0 !important;
      padding-left: 0 !important;
  }
  .row.p-remove {
      margin-bottom: 15px !important;
  }
  #form .row.p-remove .col-sm-6.col-md-4.col-lg-4.col-12, #form .row.p-remove .col-sm-10.col-md-9.col-lg-10.col-12 {
      min-height: 90px;
      padding-left: 5px !important;
      padding-right: 5px !important;
      position: relative;
  }
  .certified-icon input {
      display: block;
      height: 100%;
      left: 0;
      margin: auto;
      opacity: 0;
      position: absolute;
      right: 0;
      width: 108px;
  }
  table.table-bordered.dataTable th, table.table-bordered.dataTable td {
      border-left-width: 0;
      text-align: center;
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
  .certified-icon input[type="checkbox"] {  
      left: 0 !important;
  }
</style>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css" />
  <link href="<?php echo base_url(); ?>assets/plugins/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />

 <section class="content">
    <div class="container-fluid">
        <div class="row row-header">
            <div class="col-md-8">
            <h2>Lab Grown Diamond <small>Diamond List</small></h2>
            </div>
        </div>
        <?php message(); ?>

        <!-- Basic Examples -->
<div class="row collapse1" id="collapseExample" aria-expanded="false">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="body ">
                <form id="form">
                    <div class="row p-remove">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-12">
                          <div class="shape-icon">
                            <ul class="brl-loose-diamonds text-center fade-items clearfix">
                              <li data-shape="round" data-shape-delta="0">
                               <label for="idshaperound">
                               <input type="checkbox" name="checkbox[]" id="idshaperound" onchange="submitForm()" value="Round" <?php if (@in_array('Round',@$post['checkbox'])) { echo "checked"; } ?> >
                                <i class="icon-diamond-round"></i> <span>Round</span> </label></li>
                              <li data-shape="princess" data-shape-delta="1">
                              <label for="idshapeprinces">
                                 <input type="checkbox" name="checkbox[]" id="idshapeprinces" onchange="submitForm()" value="PRINCESS" <?php if (@in_array('PRINCESS', @$post['checkbox'])) { echo "checked"; } ?>>
                                <i class="icon-diamond-princess"></i> <span>Princess</span> </label> </li>
                              <li data-shape="cushion" data-shape-delta="2">
                              <label for="idshapecushion">
                                 <input type="checkbox" name="checkbox[]" id="idshapecushion" onchange="submitForm()" value="CUSHION" <?php if (@in_array('CUSHION', @$post['checkbox'])) { echo "checked"; } ?>>
                                <i class="icon-diamond-cushion"></i> <span>Cushion</span> </label></li>
                              <li data-shape="oval" data-shape-delta="3">                  
                                 <label for="idshapeoval">
                                  <input type="checkbox" name="checkbox[]" id="idshapeoval" onchange="submitForm()" value="OVAL" <?php if (@in_array('OVAL', @$post['checkbox'])) { echo "checked"; } ?>>
                                <i class="icon-diamond-oval"></i> <span>Oval</span> </label></li>
                              <li data-shape="emerald" data-shape-delta="4">
                               <label for="idshapeemerald" >
                                <input type="checkbox" name="checkbox[]" id="idshapeemerald" onchange="submitForm()" value="EMERALD" <?php if (@in_array('EMERALD', @$post['checkbox'])) { echo "checked"; } ?>>
                                <i class="icon-diamond-emerald"></i> <span>Emerald</span></label> </li>
                              <li data-shape="heart" data-shape-delta="5">
                               <label for="idshapeheart">
                                <input type="checkbox" name="checkbox[]" id="idshapeheart" onchange="submitForm()" value="HEART" <?php if (@in_array('HEART', @$post['checkbox'])) { echo "checked"; } ?>>
                                <i class="icon-diamond-heart"></i> <span>Heart</span> </label></li>
                              <li data-shape="pear" data-shape-delta="6">
                              <label for="idshapepear">
                               <input type="checkbox" name="checkbox[]" id="idshapepear" onchange="submitForm()" value="PEAR" <?php if (@in_array('PEAR', @$post['checkbox'])) { echo "checked"; } ?>>
                                <i class="icon-diamond-pear"></i> <span>Pear</span> </label> </li>
                              <li data-shape="marquise" data-shape-delta="7">
                              <label for="idshapemarquise"  >
                                <input type="checkbox" name="checkbox[]" id="idshapemarquise" value="MARQUISE" <?php if (@in_array('MARQUISE', @$post['checkbox'])) { echo "checked"; } ?>>
                                <i class="icon-diamond-marquise"></i> <span>Marquise</span> </label></li>
                              <li data-shape="asscher" data-shape-delta="8">
                              <label for="idshapeasscher"  >
                                <input type="checkbox" name="checkbox[]" id="idshapeasscher" onchange="submitForm()" value="ASSCHER" <?php if (@in_array('ASSCHER', @$post['checkbox'])) { echo "checked"; } ?>>
                                <i class="icon-diamond-asscher"></i> <span>Asscher</span> </label></li>
                              <li data-shape="radiant" data-shape-delta="9">
                              <label for="idshaperadiant"  >
                                <input type="checkbox" name="checkbox[]" id="idshaperadiant" onchange="submitForm()" value="RADIANT" <?php if (@in_array('RADIANT', @$post['checkbox'])) { echo "checked"; } ?>>
                                <i class="icon-diamond-radiant"></i> <span>Radiant</span> </label></li>
                                <li data-shape="radiant" data-shape-delta="9">
                              <label for="idshapeother">
                                <input type="checkbox" name="checkbox[]" id="idshapeother" onchange="submitForm()" value="Other" <?php if (@in_array('Other', @$post['checkbox'])) { echo "checked"; } ?>>
                                <i class="icon-diamond-bag-o-s"></i> <span>Other</span> </label></li>
                            </ul>
                          </div>
                        </div>
                     </div>
                    <div class="row p-remove">
                      <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                        <div class="col-sm-2 col-md-3 col-lg-2 col-12">
                          <label>Price</label>
                        </div>
                        <div class="col-sm-10 col-md-9 col-lg-10 col-12">
                            <input type="text" id="range_55" value="" name="price" />
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                              <input type="text" id="range_55_input_from"  onkeyup="setSliderFromTo()" class=" pull-left text-design"/>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                              <input type="text" id="range_55_input_to"  onkeyup="setSliderFromTo()" class="pull-right text-design"/>
                            </div>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                        <div class="col-sm-2 col-md-3 col-lg-2 col-12">
                          <label>Carat</label>
                        </div>
                        <div class="col-sm-10 col-md-9 col-lg-10 col-12">
                            <input type="text" id="range_56" value="" name="size" />
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                            <input type="text" id="range_56_input_from"  onkeyup="setSliderFromTo1()"  class=" pull-left text-design"/>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                            <input type="text" id="range_56_input_to"  onkeyup="setSliderFromTo1()" class="pull-right text-design"/> 
                            </div>
                        </div>
                      </div>                      
                      
                      <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                        <div class="col-sm-2 col-md-3 col-lg-2 col-12">
                          <label>Color</label>
                        </div>
                        <div class="col-sm-10 col-md-9 col-lg-10 col-12">
                          <input type="text" id="range_50a" value="" name="color" />
                        </div>
                      </div>
                      
                      <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                        <div class="col-sm-2 col-md-3 col-lg-2 col-12">
                          <label>Clarity</label>
                        </div>
                        <div class="col-sm-10 col-md-9 col-lg-10 col-12">
                          <input type="text" id="range_52a" value="" name="clarity" />
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                        <div class="col-sm-2 col-md-3 col-lg-2 col-12">
                          <label>Cut</label>
                        </div>
                        <div class="col-sm-10 col-md-9 col-lg-10 col-12">
                         <input type="text" id="range_51a" value="" name="cut" />
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                        <!-- <div class="col-sm-2 col-md-3 col-lg-2 col-12">
                          <label>Vendor</label>
                        </div>
                        <div class="col-sm-10 col-md-9 col-lg-10 col-12">
                         <select class="form-control" name="vendor" id="vendor" onchange="submitForm()">
                           <option value="">Select</option>
                           <?php foreach ($vendor_list as $rowv): ?>
                             <option value="<?php echo $rowv->CD_USER_ID; ?>"><?php echo $rowv->NM_USER_FULLNAME; ?></option>
                           <?php endforeach ?>
                         </select>
                        </div> -->
                      </div>

                    </div>
                      
                    <div class="row p-remove" id="more_filter" style="display:none">
                      
                      <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                        <div class="col-sm-2 col-md-3 col-lg-2 col-12">
                          <label>Fluorescence</label>
                        </div>
                        <div class="col-sm-10 col-md-9 col-lg-10 col-12">
                        <input type="text" id="range_58a" value="" name="fluorescence" /> 
                        </div>
                      </div>        
                           
                      <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-12">
                          <label>Make</label>
                        </div>
                        <div class="col-sm-9 col-md-9 col-lg-9 col-12">
                          <!-- <label for="idmake3X" id="label_make_3X" class="yellow-color  label_make_3X">3X</label>
                          <label for="idmake3EX-NONE" id="label_make_3EX" class="yellow-color label_make_3EX label_make_3X">3EX-NONE</label>
                           <label for="idmakereset" id="label_make_reset" class="yellow-color label_make_reset">Reset</label> -->
                           <label for="idmake3X" id="label_make_3X" class="yellow-color bg-teal label_make_3X">3X</label>
                                 <label for="idmake3EX-NONE" id="label_make_3EX" class="yellow-color bg-teal label_make_3EX label_make_3X">3EX-NONE</label>
                                 <label for="idmakereset" id="label_make_reset" class="yellow-color bg-teal label_make_reset active">Reset</label>
                        </div>
                      </div>

                      <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                        <div class="col-sm-2 col-md-3 col-lg-2 col-12">
                          <label>Polish</label>
                        </div>
                        <div class="col-sm-10 col-md-9 col-lg-10 col-12">
                        <input type="text" id="range_51ab" value="" name="polish" /> 
                        </div>
                      </div>      
                    
                      <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                        <div class="col-sm-2 col-md-3 col-lg-2 col-12">
                          <label>Symmetry</label>
                        </div>
                        <div class="col-sm-10 col-md-9 col-lg-10 col-12">
                         <input type="text" id="range_52ac" value="" name="symmetry" />
                        </div>
                      </div>
                    
                      <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                        <div class="col-sm-2 col-md-3 col-lg-2 col-12">
                          <label>Certified</label>
                        </div>
                        <div class="col-sm-10 col-md-9 col-lg-10 col-12">
                          <ul class="certified-icon">
                            <li data-shape="round" data-shape-delta="0">
                              <input type="checkbox" name="cert[]" onchange="submitForm()" value="GIA">
                              <img src="<?php echo base_url(); ?>assets/img/gia.jpg"> </li>
                            <li data-shape="round" data-shape-delta="0">
                              <input type="checkbox" name="cert[]" onchange="submitForm()" value="EGLUSA">
                              <img src="<?php echo base_url(); ?>assets/img/egl.jpg"> </li>
                            <li data-shape="round" data-shape-delta="0">
                              <input type="checkbox" name="cert[]" onchange="submitForm()" value="AGS">
                              <img src="<?php echo base_url(); ?>assets/img/american.jpg"> </li>
                            <li data-shape="round" data-shape-delta="0">
                              <input type="checkbox" name="cert[]" onchange="submitForm()" value="IGI">
                              <img src="<?php echo base_url(); ?>assets/img/igi.jpg"> </li>
                            <li data-shape="round" data-shape-delta="0">
                              <input type="checkbox" name="cert[]" onchange="submitForm()" value="Other">
                              <img src="<?php echo base_url(); ?>assets/img/none.jpg"> </li>                            
                          </ul>
                        </div>
                      </div>
                    
                      <div class="col-sm-6 col-md-4 col-lg-4 col-12">
                        <div class="col-sm-2 col-md-3 col-lg-2 col-12">
                          <label>Stock#</label>
                        </div>
                        <div class="col-sm-10 col-md-9 col-lg-10 col-12">
                          <input type="text" class="form-control text-design" name="stock" value="" onblur="submitForm()" placeholder="EX: 121,122,123" style="margin-top: 10px;">            
                        </div>
                      </div>            
                         
                    </div>

                <div class="row clearfix"></div>               
                </form>
            </div>
        </div>
    </div>
</div>
          <div class="row image-icon clearfix">
            
            <div class="col-lg-12 spacer-bottom"> 
              <div class="col-lg-5">
                <nav  style="">                  
                  <img src="<?php echo base_url(); ?>assets/images/download.png" onclick="export_list()" alt="Download" class="my-tooltip my-dropdown" title="Download Excel" data-toggle="tooltip">
                  <img src="<?php echo base_url(); ?>assets/images/print.png" alt="Print" onclick="print_data()" class="my-tooltip my-dropdown" data-toggle="tooltip" title="Print">
                  <img src="<?php echo base_url(); ?>assets/images/view-icon.png" alt="View" onclick="view_data()" class="my-tooltip my-dropdown" data-toggle="tooltip" title="View">                   
                  <img src="<?php echo base_url(); ?>assets/images/delete-icon.png" alt="Delete" onclick="delete_data()" class="my-tooltip my-dropdown" data-toggle="tooltip"  title="Delete">
                  <a href="<?php echo base_url(); ?>admin_diamond"><img src="<?php echo base_url(); ?>assets/images/refresh-icon.png" alt=Refresh"" id="refreshpage" class="my-tooltip my-dropdown" data-toggle="tooltip" title="Refresh"></a>
                  <img src="<?php echo base_url(); ?>assets/images/back-icon.png" alt="Back" onclick="window.history.back()"  title="Back" data-toggle="tooltip">

                </nav>
              </div>
              <div class="col-md-3 hide_show p15-top">
                  <span  class="btn btn-primary btn-flat" onclick="show_advance()" id="show_advance"><i class="fa fa-arrow-circle-down"></i> More Filter</span>                       
              </div>
              <div class="col-md-4 pull-right p15-top">
                  <p  style="font-weight: bold;text-align:right"><span id="total_records"></span> &nbsp;&nbsp;<label style="text-align: right"> Stones Found</label></p>         
              </div>   
          </div>

          <div class="col-lg-12">
            <div class="col-lg-2">

              <div class="dataTables_length" id="example1_length">
                <label> <select name="per_page" id="per_page" aria-controls="example1" class="form-control input-sm" onchange="submitForm()">
                    <option value="25" >25 Items</option>
                    <option value="50">50 Items</option>
                    <option value="100" selected>100 Items</option>
                    <option value="200" >200 Items</option>
                    <option value="500" >500 Items</option>
                </select> </label></div>
            </div> 
            <div class="col-lg-10">       
              <div id="pagination-div-id" class="dataTables_paginate paging_simple_numbers pull-right"><?php echo @$page_link; ?></div>
            </div>
          </div>
        </div>
          
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <!-- <div class="header">
                        <span class="header_span">Diamond List</span>
                    </div>  -->
                                         
                    <div class="body">
                        <div class="table-responsive1">
                            <table id="example" class="table table-bordered table-responsive table-striped table-hover table-condensed js-basic-example1 dataTable">
                              <thead class="bg-teal">
                              <tr>
                                <th style="" class="remove-icon"></th>
                                <th><input type="checkbox" id="selectall" name="checkAll" onclick="checkAll(this.checked)">
                                      <label for="selectall"></label></th>
                                <th class="header1" style="">Stock #</th>
                                <th class="header1" style="">Shape</th>
                                <th class="header1" style="">Cts</th>
                                <th class="header1" style="">Color</th>                              
                                <th class="header1" style="">Clarity</th>
                                <th class="header1" style="">Cut</th>
                                <th class="header1" style="">Polish</th>                              
                                <th class="header1" style="">Symmetry</th>
                                <th class="header1" style="">Flour</th>
                                <!-- <th class="header1" style="">Disc%</th> -->
                                <th class="header1" style="">Depth%</th>                           
                                <th class="header1" style="">Table%</th>
                                <!-- <th class="header1" style="">$/Carat</th> -->
                                <th class="header1" style="">Total $</th>
                                <th class="header1" style="">Lab</th>
                                <th class="header1" style="">Measurements</th>
                                <!-- <th class="header1" style="">Vendor</th>
                                <th class="header1" style="">Date</th> -->
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
        
    </div>
</section>


<!-- Custom JS -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    function checkAll(chk)
    {
        if(chk==true)
        {
          $('.multi-chk-complete').each(function() {
              this.checked = true;
          });
        }
        else
        {
          $('.multi-chk-complete').each(function() {
              this.checked = false;
          });
        }
    }
</script>

    <!-- RangeSlider Plugin Js -->
<script src="<?php echo base_url(); ?>assets/plugins/ion-rangeslider/js/ion.rangeSlider.js"></script>


<script>
$(document).ready(function(){
  $('th.header').click(function(){
        //var table = $(this).parents('table').eq(0)
        var table = $("#example").eq(0)
        var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
        this.asc = !this.asc
        if (!this.asc){rows = rows.reverse()}
        for (var i = 0; i < rows.length; i++){table.append(rows[i])}
    });
  });
    function comparer(index) {
        return function(a, b) {
            var valA = getCellValue(a, index), valB = getCellValue(b, index)
            return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
        }
    }
    function getCellValue(row, index) { 
        return $(row).children('td').eq(index).html() 
    }  
</script>

 <script>
    var parseQueryString = function(url) {
  var urlParams = {};
  url.replace(
    new RegExp("([^?=&]+)(=([^&]*))?", "g"),
    function($0, $1, $2, $3) {
      urlParams[$1] = $3;
    }
  );
  
  return urlParams;
}

var result_url;
var urlToParse='';
  $(document).ready(function () {

     urlToParse = location.search;  
     result_url = parseQueryString(urlToParse ); 

    if(urlToParse.length)
     {
         var shape_url=result_url.shape;
         var shape_url=shape_url.split('%2C');    
         if(shape_url.length)
         {
             for(var i=0;i<shape_url.length;i++)
             {
                 $('input[type=checkbox][value="'+shape_url[i]+'"]').prop("checked",true);
             }
         }
 
         var certificate_url=result_url.certificate;
         var certificate_url=certificate_url.split('%2C'); 
         if(certificate_url.length)
         {
             for(var i=0;i<certificate_url.length;i++)
             {
                 var str = String(certificate_url[i]);
                 var res = str.replace("+", " ");
 
                 $('input[type=checkbox][value="'+res+'"]').prop("checked",true);
             }
         }
         
     }

 
 if(urlToParse.length){
    //show_search1()
  }
  
});

  var price_value=[0,1,3,5,7,10,30,40,50,60,70,80,90,100,150,200,283,300,350,400,450,500,550,600,650,700,750,800,850,900,950,1000,1050,1100,1150,1200,1300,1400,1500,1600,1700,1800,1900,2000,2100,2200,2300,2400,2500,2600,2700,2800,2900,3000,3100,3200,3300,3400,3500,3600,3700,3800,3900,4000,4100,4200,4300,4400,4500,4600,4700,4800,4900,5000,5100,5200,5300,5400,5500,5600,5700,5800,5900,6000,6100,6200,6300,6400,6500,6600,6700,6800,6900,7000,7100,7200,7300,7400,7500,7600,7700,7800,7900,8000,8100,8200,8300,8400,8500,8600,8700,8800,8900,9000,9100,9200,9300,9400,9500,9600,9700,9800,9900,10000,10100,10200,10300,10400,10500,10600,10700,10800,10900,11000,11100,11200,11300,11400,11500,11600,11700,11800,11900,12000,12500,13000,13500,14000,14500,15000,15500,16000,16500,17000,17500,18000,18500,19000,19500,20000,20500,21000,21500,22000,22500,23000,23500,24000,25000,26000,27000,28000,29000,30000,31000,32000,33000,34000,35000,36000,37000,38000,39000,40000,45000,50000,55000,60000,65000,70000,75000,80000,85000,90000,95000,100000,150000,200000,250000,300000,350000,400000,450000,500000,600000,700000,800000,900000,1000000];

  function find_range(range_from,range_to)
  {
      var array=[];
      from_index = price_value.indexOf(range_from);
      to_index = price_value.indexOf(range_to);
      for (i=from_index; i <= to_index; i++) { 
          array.push(price_value[i]);
      }
      price_value=array;  

      // $('#range_55_input_from').val(range_from);
      // $('#range_55_input_to').val(range_to);

      return array;          
  }

 </script>
<script>
    $(document).ready(function () {
      /***Color*****/
        var from_color = 0;
        var to_color = 9; 
      //console.log(urlToParse)
        if(urlToParse.length){
        var color_url=result_url.color;
        var color_url=color_url.split('%3B');

        if(color_url[1]!="")
        {
          from_color = color_url[0];
          to_color = color_url[1]; 
          
          var price_value1=["D", "E", "F", "G", "H", "I", "J", "K", "L", "M" ];
          from_color = price_value1.indexOf(from_color);
          to_color = price_value1.indexOf(to_color);
          
        }
      }
        var $range = $("#range_50a"),
            $update_btn = $(".js-update-50a");

        $range.ionRangeSlider({
            type: "double",
            grid: true,
            from: from_color,
            to: to_color,
          
            values: ["D", "E", "F", "G", "H", "I", "J", "K", "L", "M" ],  
            onStart: function (data) {              
                 $("#range_50a").val('D;M');
            },
            onFinish:  function (data) {
              submitForm();
                //console.log(data);
            },
            onUpdate:  function (data) {
               submitForm();
            }
        });

        var slider = $range.data("ionRangeSlider");

        $update_btn.on("click", function () {
            slider.update({
                values: ["D", "E", "F", "G", "H", "I", "J", "K", "L", "M"]
            });
        });
    

/////////////////Price ///////////////////////////
        var from_price = 0;
        var to_price = 1000000; 
        //console.log(urlToParse.length)
        if(urlToParse.length){
          var price_url=result_url.price;
          var price_url=price_url.split('%3B');
          if(price_url[1]!="")
          {
            from_price = price_url[0];
            to_price = price_url[1]; 
          }
        }
        var price_value1 = [parseInt(from_price),parseInt(to_price)];  
        var price_value2 = price_value.concat(price_value1);
        price_value2.sort(function(a, b){return a-b});
        //console.log(price_value2);
        from_price = price_value2.indexOf(parseInt(from_price));
        to_price = price_value2.indexOf(parseInt(to_price));

    $("#range_55").ionRangeSlider({
        type: "double",
        from: from_price,
        to: to_price,
        values : price_value2,
        onStart: function (data){
            from_value = data.from_value;
            to_value = data.to_value;    
            $('#range_55_input_from').val(from_value);
            $('#range_55_input_to').val(to_value);
        },
        onChange:  function (data){
      
            from_value = data.from_value;
            to_value = data.to_value;    
            $('#range_55_input_from').val(from_value);
            $('#range_55_input_to').val(to_value);        
        },
        onFinish:  function (data) {
          submitForm();
            //console.log(data);
        },
        onUpdate:  function (data) {
           submitForm();
        }
    });
    var slider_range_55 = $("#range_55").data("ionRangeSlider");
    setSliderFromTo = function() {

    var from=$('#range_55_input_from').val();

    var to=$('#range_55_input_to').val();

    var price_value1 = [from,to];  
    var price_value2 = price_value.concat(price_value1);
        price_value2.sort(function(a, b){return a-b});  

        from = price_value2.indexOf(from);
        to = price_value2.indexOf(to);

        slider_range_55.update({
            min: 0,
            max: 100,
            from: from,
            to: to,
            values : price_value2
        });
    };


    ////////////////// Size /////////////////////////////
  var from_size = 0;
  var to_size = 20; 
  //console.log(urlToParse.length)
  if(urlToParse.length){
    var size_url=result_url.size;
    var size_url=size_url.split('%3B');
    if(size_url[1]!="")
    {
      from_size = size_url[0];
      to_size = size_url[1]; 
    }
  }       

$("#range_56").ionRangeSlider({
    type: "double",
     min: 0,
    max: 6,
    from: from_size,
    to: to_size,
    step: 0.01,
    max_postfix:'+',
    onStart: function (data) {
        from = data.from;
        to = data.to;      
           
        $('#range_56_input_from').val(from);
        $('#range_56_input_to').val(to);
    },
    onChange:  function (data) {
        from = data.from;
        to = data.to;    
        $('#range_56_input_from').val(from);
        $('#range_56_input_to').val(to);
    },
    onFinish:  function (data) {
      submitForm();
        //console.log(data);
    },
    onUpdate:  function (data) {
       submitForm();
    }
});
var slider_range_56 = $("#range_56").data("ionRangeSlider");
setSliderFromTo1 = function() {    
    var from=$('#range_56_input_from').val();
    var to=$('#range_56_input_to').val();
    slider_range_56.update({
        min: 0,
    max: 6,
    from: from,
    to: to,
    step: 0.01,
     max_postfix:'+',
    });
};


///////////////////////////////////////////////////////////

        /*****Cut*******/
        var from_cut = 0;
        var to_cut = 3; 
        var from_cut_val = 'Excellent';
        var to_cut_val = 'Fair'; 
        if(urlToParse.length){
        var cut_url=result_url.cut;
        var cut_url=cut_url.split('%3B');
        if(cut_url[1]!="")
        {
          from_cut = cut_url[0];
          to_cut = cut_url[1]; 
          from_cut_val = from_cut;
          to_cut_val = to_cut; 
          
          var price_value1=["Excellent", "Very+Good", "Good", "Fair"];
          from_cut = price_value1.indexOf(from_cut);
          to_cut = price_value1.indexOf(to_cut);

          //console.log(from_index)
        }
      }

         var $range_51a = $("#range_51a"),
             $update_btn = $(".label_make_3X");
             $reset_btn = $(".label_make_reset");

        $range_51a.ionRangeSlider({
            type: "double",
            grid: true,
            from: from_cut,
            to: to_cut,
            values: ["Excellent", "Very Good", "Good", "Fair"],  
            onStart: function (data) {              
                 $("#range_51a").val(from_cut_val+';'+to_cut_val);
            },
            onFinish:  function (data) {
              submitForm();
                //console.log(data);
            },
            onUpdate:  function (data) {
                setTimeout(function() {
                 submitForm();
                },1000);
            }
        });

        var rangeCut = $range_51a.data("ionRangeSlider");

        $update_btn.on("click", function () {
            rangeCut.update({
              from: 0,
              to: 0
            });
        });
        $reset_btn.on("click", function () {

            rangeCut.update({
              from: 0,
              to: 3,
              values: ["Excellent", "Very Good", "Good", "Fair"]
            });
        });
 
         /*****polish*******/

        var from_polish = 0;
        var to_polish = 3;
        var from_polish_val = 'Excellent';
        var to_polish_val = 'Fair'; 
        if(urlToParse.length){
        var polish_url=result_url.polish;
        var polish_url=polish_url.split('%3B');
        if(polish_url[1]!="")
        {
          from_polish = polish_url[0];
          to_polish = polish_url[1];
          from_polish_val = from_polish;
          to_polish_val = to_polish;  
          //console.log(from_polish)
          
          var price_value1=["Excellent", "Very+Good", "Good", "Fair"];
          from_polish = price_value1.indexOf(from_polish);
          to_polish = price_value1.indexOf(to_polish);
          
        }
      }


    var $range_51ab = $("#range_51ab"),
            $update_btn = $(".label_make_3X");
            $reset_btn = $(".label_make_reset");

        $range_51ab.ionRangeSlider({
            type: "double",
            grid: true,
            from: from_polish,
            to:   to_polish,
            values: ["Excellent", "Very Good", "Good", "Fair"],  
            onStart: function (data) {              
                 $("#range_51ab").val(from_polish_val+';'+to_polish_val);
            },
            onFinish:  function (data) {
              submitForm();
                //console.log(data);
            },
            onUpdate:  function (data) {
               setTimeout(function() {
                 submitForm();
                },1000);
            }
        });

        var rangePolish = $range_51ab.data("ionRangeSlider");

        $update_btn.on("click", function () {
            rangePolish.update({
              from: 0,
              to: 0
            });
        });

        $reset_btn.on("click", function () {
            rangePolish.update({
              from: 0,
              to: 3,
              values: ["Excellent", "Very Good", "Good", "Fair"]
            });
        });
    
    /*****symmetry*******/

    var from_symmetry = 0;
    var to_symmetry = 3; 
    var from_symmetry_val = 'Excellent';
    var to_symmetry_val = 'Fair'; 
    if(urlToParse.length){
    var symmetry_url=result_url.symmetry;
    var symmetry_url=symmetry_url.split('%3B');
    if(symmetry_url[1]!="")
    {
      from_symmetry = symmetry_url[0];
      to_symmetry = symmetry_url[1]; 
      from_symmetry_val = from_symmetry;
      to_symmetry_val = to_symmetry; 
      //console.log(from_symmetry)
      
      var price_value1=["Excellent", "Very+Good", "Good", "Fair"];
      from_symmetry = price_value1.indexOf(from_symmetry);
      to_symmetry = price_value1.indexOf(to_symmetry);

      
    }
  }
    var $range_52ac = $("#range_52ac"),
            $update_btn = $(".label_make_3X");
            $reset_btn = $(".label_make_reset");

        $range_52ac.ionRangeSlider({
            type: "double",
            grid: true,
            from: from_symmetry,
              to: to_symmetry,
            values: ["Excellent", "Very Good", "Good", "Fair"],  
            onStart: function (data) {              
                 $("#range_52ac").val(from_symmetry_val+';'+to_symmetry_val);
            },
            onFinish:  function (data) {
              submitForm();
                //console.log(data);
            },
            onUpdate:  function (data) {
               setTimeout(function() {
                 submitForm();
                },1000);
            }
        });

        var rangeSymmetry = $range_52ac.data("ionRangeSlider");

        $update_btn.on("click", function () {
            rangeSymmetry.update({
              from: 0,
              to: 0
            });
        });
        $reset_btn.on("click", function () {
            rangeSymmetry.update({
              from: 0,
              to: 3,
              values: ["Excellent", "Very Good", "Good", "Fair"]
            });
        });


        /*****Clarity**********/
        var from_clarity = 0;
        var to_clarity = 11; 
        if(urlToParse.length){
        var clarity_url=result_url.clarity;
        var clarity_url=clarity_url.split('%3B');
        if(clarity_url[1]!="")
        {
          from_clarity = clarity_url[0];
          to_clarity = clarity_url[1]; 
          
          var price_value1=["FL", "IF", "VVS1", "VVS2", "VS1", "VS2", "SI1", "SI2", "SI3", "I1", "I2", "I3"];
          from_clarity = price_value1.indexOf(from_clarity);
          to_clarity = price_value1.indexOf(to_clarity);
          //console.log(from_index)
        }
      }
        var $range = $("#range_52a"),
            $update_btn = $(".js-update-50a");

        $range.ionRangeSlider({
            type: "double",
            grid: true,
            from: from_clarity,
              to: to_clarity,
            values: ["FL", "IF", "VVS1", "VVS2", "VS1", "VS2", "SI1", "SI2", "SI3", "I1", "I2", "I3"],  
            onStart: function (data) {              
                 $("#range_52a").val('FL;I3');
            },
            onFinish:  function (data) {
              submitForm();
                //console.log(data);
            },
            onUpdate:  function (data) {
               submitForm();
            }
        });

        var slider = $range.data("ionRangeSlider");

        $update_btn.on("click", function () {
            slider.update({
                values: ["FL", "IF", "VVS1", "VVS2", "VS1", "VS2", "SI1", "SI2", "SI3", "I1", "I2", "I3"]
            });
        });

        /*****Fluorescence**********/
        var from_fluorescence = 0;
        var to_fluorescence = 4;
        var from_fluorescence_val = 'None';
        var to_fluorescence_val = 'Very Strong'; 
        if(urlToParse.length){
        var fluorescence_url=result_url.fluorescence;
        var fluorescence_url=fluorescence_url.split('%3B');
        if(fluorescence_url[1]!="")
        {
          from_fluorescence = fluorescence_url[0];
          to_fluorescence = fluorescence_url[1];
          from_fluorescence_val = from_fluorescence;
          to_fluorescence_val = to_fluorescence;  
          
          var price_value1=["None", "Faint", "Medium", "Strong","Very Strong"];
          from_fluorescence = price_value1.indexOf(from_fluorescence);
          to_fluorescence = price_value1.indexOf(to_fluorescence);
          //console.log(from_index)
        }
      }
       var $range_58a = $("#range_58a"),
       $update_btn = $(".label_make_3EX");
       $update_button = $("#label_make_3X ");
       $reset_btn = $(".label_make_reset");

        $range_58a.ionRangeSlider({
            type: "double",
            grid: true,
            from: from_fluorescence,
              to: to_fluorescence,
            values: ["None", "Faint", "Medium", "Strong","Very Strong"],  
            onStart: function (data) {              
                 $("#range_58a").val(from_fluorescence_val+';'+to_fluorescence_val);
            },
            onFinish:  function (data) {
              submitForm();
                //console.log(data);
            },
            onUpdate:  function (data) {
               setTimeout(function() {
                 submitForm();
                },1000);
            }
        });

        var rangeFluor = $range_58a.data("ionRangeSlider");

        // $update_btn.on("click", function () {
        //     if($(this).is(':checked'))
        //     {
        //       rangeFluor.update({
        //         from: 0,
        //         to: 0
        //       });
        //     }
        //     else
        //     {
        //       rangeFluor.update({
        //         from: 0,
        //         to: 4
        //       });
        //     }
        // });
        $update_btn.on("click", function () {
            rangeFluor.update({
               from: 0,
               to: 0
            });
        });

        $reset_btn.on("click", function () {
            rangeFluor.update({
               from: 0,
               to: 4,
               values: ["None", "Faint", "Medium", "Strong","Very Strong"]
            });
        });

        $update_button.on("click", function () {
            rangeFluor.update({
               from: 0,
               to: 4,
               values: ["None", "Faint", "Medium", "Strong","Very Strong"]
            });
        });
    });
</script> 
<script src="<?php echo base_url(); ?>assets/ajax/manage_product.js"></script>
<script src="<?php echo base_url(); ?>assets/ajax/manage_lab_grown_diamond_ajax.js"></script>



