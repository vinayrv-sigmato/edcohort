<style>
.text-red{
  color: #fb0202;
}
/*DIAMOND*/
.table-condensed > thead > tr > th, .table-condensed > tbody > tr > td {
    padding: 10px 7px !important;
}
/*.table-condensed > tbody > tr > td {
    font-weight: 600;
}*/
.condensed > tbody > tr > td {
    padding: 8px 7px !important;
    padding-right: 30px;
}
.condensed > thead > tr > th {
    padding: 8px 7px !important;
    padding-right: 30px;
}
#example > thead > tr > th {
    padding: 0px 7px !important;
}

input[type=checkbox], input[type=radio] {
    margin: 0px 0 0; 
    margin-top: 1px\9;
    line-height: normal;
}
#search_div .col-md-1{
  /*border: 1px solid #b8b8b8 !important;*/
    padding-right: 0px;
    padding-left: 0px;
    width: 5.8%;
}
.btn.btn-flat {
    border-radius: 0;
    /*-webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;*/
    border-width: 1px;
}
.range-input{
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
.box-shadow{
  background: none repeat scroll 0 0 #fff;
    border: 1px solid #ccc;
}
#example.box-shadow td {
    border: medium none;
}
.header.sorting{ cursor: pointer; }
.row.p-remove {
    margin-bottom: 0px !important;
}
.filter_button{
    margin: auto;
    width: 150px;
}
table.dataTable.no-footer {
    border-bottom: 1px solid #fff !important;
}
/*MATCH DIAMOND*/
.table-condensed > thead > tr > th, .table-condensed > tbody > tr > td {
    padding: 10px 7px !important;
}
.table-condensed > tbody > tr > td {
    font-weight: 600;
}
.condensed > tbody > tr > td {
    padding: 8px 7px !important;
    padding-right: 30px;
}
.condensed > thead > tr > th {
    padding: 8px 7px !important;
    padding-right: 30px;
}
#example > thead > tr > th {
    padding: 0px 7px !important;
}

input[type=checkbox], input[type=radio] {
    margin: 0px 0 0; 
    margin-top: 1px\9;
    line-height: normal;
}
#search_div .col-md-1{
  /*border: 1px solid #b8b8b8 !important;*/
    padding-right: 0px;
    padding-left: 17px;
    width: 8.33333333%;
}
.btn.btn-flat {
    border-radius: 0;
    /*-webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;*/
    border-width: 1px;
}
.range-input{
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
.box-shadow{
  background: none repeat scroll 0 0 #fff;
    border: 1px solid #ccc;
}
#example.box-shadow td {
    border: medium none;
}
.header.sorting{ cursor: pointer; }
.row.p-remove {
    margin-bottom: 0px !important;
}
.filter_button{
    margin: auto;
    width: 150px;
}
.tr_color_even {
    background-color: #d0d0d0 !important;
}
.tr_color_odd {
    background-color: #ffffff !important;
}
.hide_show1 {
    position: absolute;
    bottom: -10px;
    right: 155px;
    font-size: 14px;
}
.hide_show1 a span {
    width: 25px;
    height: 25px;
    background: #30908f;
    padding: 7px 7px 7px 7px;
    color: #FFF;
    cursor: pointer;
}
.hide_show1 a span:hover {
    background: #3AC0BD;
}
table.dataTable.no-footer {
    border-bottom: 1px solid #fff !important;
}
table.dataTable thead th {
    border-bottom: 1px solid #ccc !important;
}
.dataTables_wrapper.no-footer .dataTables_scrollBody {
    border-bottom: 1px solid #c1c1c1 !important;
}

</style>
<?php $sf=$this->uri->segment(2); ?>
<!-- <link rel="stylesheet" href="<?php //echo base_url(); ?>assets/css/custom.css"> -->
    <!-- Range slider CSS -->
<link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/manage_diamond.css">  
  <!-- RANGE SLIDER -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/ion.rangeSlider.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/ion.rangeSlider.skinFlat.css" />
<!-- CUSTOM CSS for diamond -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom/style.css">
<!--   <script type="text/javascript" src="<?php //echo base_url(); ?>assets/slider/engine1/jquery.js"></script> -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">

<div id="breadcrumb" class="breadcrumb">
  <div itemprop="breadcrumb" class="container">
    <div class="row">
      <div class="col-md-24">
        <a href="<?php echo base_url(); ?>" class="homepage-link" title="Back to the frontpage">Home</a>        
        <span>/</span>
        <span class="page-title">Lab Grown Diamond</span>        
      </div>
    </div>
  </div>
</div>
<section class="">
      <div class="container">
    <div id="exTab1"> 
    <ul class="nav nav-pills">
      <li class="active">
        <a  href="#1a" data-toggle="tab">Lab Grown Diamond</a>
      </li>
     <!--  <li><a href="#2a" data-toggle="tab">Fancy Color Diamonds</a>
      </li> -->
    </ul>
    <input type="hidden" id="compare_session" value="<?php echo @implode(',',$this->session->userdata('compare_diamond')); ?>">
      <div class="tab-content clearfix">
        <div class="tab-pane active" id="1a">
          <section class="" id="search_div" style="">
             <div class="filter">
               <form action="javascript:void(0)" method="post" id="form">
                 <div class="row">
                         <div class="col-lg-12 col-sm-12 col-md-12 col-12">
                             <div class="tps_inputrange_shape">
                             <ul class="tps_diamond_shapes" id="tps_diamond_shapes">
                                 <li>
                                  <label for="idshaperound">
                                    <input type="checkbox" name="checkbox[]"  id="idshaperound"  onchange="submitForm()" value="Round" <?php if ($sf=='Round') { echo "checked"; } ?> >
                                    <a title="Round" class=""><span class="img_shape round"><i class="icon-diamond-round"></i></span><span class="text_shape">Round</span></a>
                                 </label>
                                 </li>
                                 <li>
                                  <label for="idshapeprinces">
                                   <input type="checkbox" name="checkbox[]" id="idshapeprinces"  onchange="submitForm()" value="PRINCESS" <?php if ($sf=='PRINCESS') { echo "checked"; } ?>>
                                 <a  title="Princess"><span class="img_shape princess"><i class="icon-diamond-princess"></i></span><span class="text_shape">Princess</span></a></label> </li>
                                 <li>
                                   <label for="idshapecushion">
                                    <input type="checkbox" name="checkbox[]" id="idshapecushion"  onchange="submitForm()" value="CUSHION" <?php if ($sf=='CUSHION') { echo "checked"; } ?>>
                                 <a  title="Cushion"><span class="img_shape cushion"><i class="icon-diamond-cushion"></i></span><span class="text_shape">Cushion</span></a></label></li>
                                 <li>
                                  <label for="idshaperadiant"  >
                                    <input type="checkbox" name="checkbox[]" id="idshaperadiant"  onchange="submitForm()" value="RADIANT" <?php if ($sf=='RADIANT') { echo "checked"; } ?>>
                                 <a  title="Radiant"><span class="img_shape radiant"><i class="icon-diamond-radiant"></i></span><span class="text_shape">Radiant</span></a></label></li>
                                 <li><label for="idshapeasscher"  >
                                    <input type="checkbox" name="checkbox[]" id="idshapeasscher"  onchange="submitForm()" value="ASSCHER" <?php if ($sf=='ASSCHER') { echo "checked"; } ?>>
                                    <a  title="Asscher"><span class="img_shape asscher"><i class="icon-diamond-asscher"></i></span><span class="text_shape">Asscher</span></a></li>
                                  </label><li>
                                 <label for="idshapeemerald" >
                                    <input type="checkbox" name="checkbox[]" id="idshapeemerald"  onchange="submitForm()" value="EMERALD" <?php if ($sf=='EMERALD') { echo "checked"; } ?>>
                                 <a  title="Emerald"><span class="img_shape emerald"><i class="icon-diamond-emerald"></i></span><span class="text_shape">Emerald</span></a></label></li>
                                 <li>
                                  <label for="idshapeoval">
                                      <input type="checkbox" name="checkbox[]" id="idshapeoval"  onchange="submitForm()" value="OVAL" <?php if ($sf=='OVAL') { echo "checked"; } ?>>
                                 <a  title="Oval"><span class="img_shape oval"><i class="icon-diamond-oval"></i></span><span class="text_shape">Oval</span></a></label></li>
                                 <li>
                                 <label for="idshapepear">
                                  <input type="checkbox" name="checkbox[]" id="idshapepear"  onchange="submitForm()" value="PEAR" <?php if ($sf=='PEAR') { echo "checked"; } ?>>
                                 <a  title="Pear"><span class="img_shape pear"><i class="icon-diamond-pear"></i></span><span class="text_shape">Pear</span></a></label></li>
                                 <li>
                                  <label for="idshapemarquise"  >
                                    <input type="checkbox" name="checkbox[]" id="idshapemarquise"  onchange="submitForm()" value="MARQUISE" <?php if ($sf=='MARQUISE') { echo "checked"; } ?>>
                                 <a  title="Marquise"><span class="img_shape marquies"><i class="icon-diamond-marquise"></i></span><span class="text_shape">Marquise</span></a></label></li>
                                 <li>
                                 <label for="idshapeheart">
                                    <input type="checkbox" name="checkbox[]" id="idshapeheart"  onchange="submitForm()" value="HEART" <?php if ($sf=='HEART') { echo "checked"; } ?>>
                                 <a  title="Heart"><span class="img_shape heart"><i class="icon-diamond-heart"></i></span><span class="text_shape">Heart</span></a></label></li>
                                 <li>
                                 <label for="idshapeother">
                                    <input type="checkbox" name="checkbox[]" id="idshapeother"  onchange="submitForm()" value="Other" <?php if ($sf=='Other') { echo "checked"; } ?>>
                                 <a  title="Other"><span class="img_shape other"><i class="icon-diamond-bag-o-s"></i></span><span class="text_shape">Other</span></a></label></li>
                               </ul>
                           </div>
                             <div class="search_filter_cut tps_filter">
                             <div class="col-sm-2 col-md-2 col-lg-2 col-12">
                                 <label>Price</label>
                               </div>
                               
                             <div class="col-sm-10 col-md-10 col-lg-10 col-12">
                                 <input type="text" id="range_55" value="" name="price" />
                                 <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6 input-style">
                                 <input type="text" id="range_55_input_from"  onkeyup="setSliderFromTo()" class=" pull-left text-design"/>
                               </div>
                                 <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6 input-style">
                                 <input type="text" id="range_55_input_to"  onkeyup="setSliderFromTo()" class="pull-right text-design"/>
                               </div>
                               </div>
                           </div>
                             <div class="search_filter_cut tps_filter">
                             <div class="col-sm-2 col-md-2 col-lg-2 col-12">
                                 <label>Carat</label>
                               </div>
                             <div class="col-sm-10 col-md-10 col-lg-10 col-12">
                                 <input type="text" id="range_56" value="" name="size" />
                                 <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6 input-style">
                                 <input type="text" id="range_56_input_from"  onkeyup="setSliderFromTo1()"  class=" pull-left text-design"/>
                               </div>
                                 <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6 input-style">
                                 <input type="text" id="range_56_input_to"  onkeyup="setSliderFromTo1()" class="pull-right text-design"/>
                               </div>
                               </div>
                           </div>
                             <div class="search_filter_cut tps_filter">
                             <div class="col-sm-2 col-md-2 col-lg-2 col-12">
                                 <label>Color</label>
                               </div>
                             <div class="col-sm-10 col-md-10 col-lg-10 col-12">
                                 <input type="text" id="range_50a" value="" name="color" />
                               </div>
                           </div>
                             <div class="search_filter_cut tps_filter">
                             <div class="col-sm-2 col-md-2 col-lg-2 col-12">
                                 <label>Cut</label>
                               </div>
                             <div class="col-sm-10 col-md-10 col-lg-10 col-12">
                                 <input type="text" id="range_51a" value="" name="cut" />
                               </div>
                           </div>
                             <div class="search_filter_cut tps_filter">
                             <div class="col-sm-2 col-md-2 col-lg-2 col-12">
                                 <label>Clarity</label>
                               </div>
                             <div class="col-sm-10 col-md-10 col-lg-10 col-12">
                                 <input type="text" id="range_52a" value="" name="clarity" />
                               </div>
                           </div>
                             <div class="search_filter_cut tps_filter">
                             <div class="col-sm-3 col-md-3 col-lg-3 col-12">
                                 <label>Certificate By</label>
                               </div>
                             <div class="col-sm-9 col-md-9 col-lg-9 col-12">
                                 <ul class="certified-icon">
                                 <li data-shape="round" data-shape-delta="0">
                                    <input type="checkbox" name="cert[]"  onchange="submitForm()" value="GIA">
                                    <img src="<?php echo base_url(); ?>assets/img/gia.jpg"> </li>
                                  <li data-shape="round" data-shape-delta="0">
                                    <input type="checkbox" name="cert[]"  onchange="submitForm()" value="EGLUSA">
                                    <img src="<?php echo base_url(); ?>assets/img/egl.jpg"> </li>
                                  <li data-shape="round" data-shape-delta="0">
                                    <input type="checkbox" name="cert[]"  onchange="submitForm()" value="AGS">
                                    <img src="<?php echo base_url(); ?>assets/img/american.jpg"> </li>                                  
                                  
                                    <li data-shape="round" data-shape-delta="0">
                                    <input type="checkbox" name="cert[]"  onchange="submitForm()" value="IGI">
                                    <img src="<?php echo base_url(); ?>assets/img/igi.jpg"> </li>                                  
                                  <li data-shape="round" data-shape-delta="0">
                                    <input type="checkbox" name="cert[]" onchange="submitForm()" value="OTHER">
                                    <img src="<?php echo base_url(); ?>assets/img/none.jpg"> </li> 
                               </ul>
                               </div>
                           </div>
                             <div id="more_filter" style="display: none;">
                             <div class="search_filter_cut tps_filter">
                                 <div class="col-sm-2 col-md-2 col-lg-2 col-12">
                                 <label>Fluor</label>
                               </div>
                                 <div class="col-sm-10 col-md-10 col-lg-10 col-12">
                                 <input type="text" id="range_58a" value="" name="fluorescence" />
                               </div>
                               </div>
                             <div class="search_filter_cut tps_filter">
                                 <div class="col-sm-2 col-md-2 col-lg-2 col-12">
                                 <label>Polish</label>
                               </div>
                                 <div class="col-sm-10 col-md-10 col-lg-10 col-12">
                                 <input type="text" id="range_51ab" value="" name="polish" />
                               </div>
                               </div>
                             <div class="search_filter_cut tps_filter">
                                 <div class="col-sm-2 col-md-2 col-lg-2 col-12">
                                 <label>Sym</label>
                               </div>
                                 <div class="col-sm-10 col-md-10 col-lg-10 col-12">
                                 <input type="text" id="range_52ac" value="" name="symmetry" />
                               </div>
                               </div>
                             <div class="search_filter_cut tps_filter">
                                 <div class="col-sm-2 col-md-2 col-lg-2 col-12">
                                 <label>Make</label>
                               </div>
                                 <div class="col-sm-10 col-md-10 col-lg-10 col-12 line-normal">
                                 <label for="idmake3X" id="label_make_3X" class="yellow-color  label_make_3X">3X</label>
                                 <label for="idmake3EX-NONE" id="label_make_3EX" class="yellow-color label_make_3EX label_make_3X">3EX-NONE</label>
                                 <label for="idmakereset" id="label_make_reset" class="yellow-color label_make_reset active">Reset</label>
                               </div>
                               </div>
                           </div>
                             <div class="hide_show"> <a href="#down"><span id="show_advance" class="" onclick="show_search()"> <i class="plus-toggle fa fa-plus"> </i> More Filters </span> </a> </div>
                           </div>

                       </div>
                 </form>
             </div>
            </section>
        </div>
        <div class="tab-pane" id="2a">
          <section class="">
            <div class="filter"><h2 class="section-padding" style="margin: 0 20px;">Coming soon</h2></div>
          </section>
        </div>
       
      </div>
  </div>
    </div>
</section>
<section class="top-35">
  <div class="table-design">
    <div class="container-fluid">
    <div class="row" style="padding-left: 15px;padding-right: 15px;">
     <div class="col-sm-3 col-md-3 col-lg-3 col-12">
      <div class="margin-24">
      
      <form action="" id="per_page_form">
      <span>Show <select name="per_page" id="per_page" class=" input-sm" onchange="submitForm()">
          <option value="20" >20</option>
          <option value="50" >50</option>
          <option value="100" >100</option>
          <option value="200" selected >200</option>
          <option value="500"  >500</option>
          </select> entries</span></form>
        </div>
    </div> 
      
    <div class="col-sm-6 col-md-6 col-lg-6 col-12">
      <div class="image-width">
        <div class="row image-icon">
          <div class="col-lg-12 spacer-bottom"> 
            <nav  style="background-color: #ffffff;padding: 3px; text-align:center">
              <img src="<?php echo base_url(); ?>assets/images/download.png" onclick="export_list()" title="Download" alt="Download" class="my-tooltip my-dropdown" data-toggle="tooltip">
              <img src="<?php echo base_url(); ?>assets/images/print.png" alt="Print" onclick="print_data()" class="my-tooltip my-dropdown" data-toggle="tooltip" data-placement="top" title="Print">
              <!-- <img src="<?php echo base_url(); ?>assets/images/view-icon.png" alt="View" onclick="view_data()" class="my-tooltip my-dropdown" data-toggle="tooltip" data-placement="top" title="View">  -->                  
              <img src="<?php echo base_url(); ?>assets/images/send.png" alt="Send" onclick="send_data()" class="my-tooltip my-dropdown"  title="Send" data-toggle="tooltip"> 
              <a href="<?php echo base_url(); ?>compare-diamond"><img src="<?php echo base_url(); ?>assets/images/compare.png" alt="Compare" class="my-tooltip my-dropdown" title="Compare List" data-toggle="tooltip"> </a>  
              <!-- <img src="<?php echo base_url(); ?>assets/images/back-icon.png" alt="Back" class="my-tooltip my-dropdown" onclick="window.history.back()" title="Back" data-toggle="tooltip"> -->
              <a href="<?php echo base_url(); ?>lab-grown-diamond"><img src="<?php echo base_url(); ?>assets/images/refresh-icon.png" alt="Refresh" id="refreshpage" class="my-tooltip my-dropdown" data-toggle="tooltip" title="Refresh"></a>
            </nav>
          </div>
        </div>
      </div>
    </div>
      
          <div class="col-sm-3 col-md-3 col-lg-3 col-12 pull-right">
              <div class="margin-24">
                <p style="font-weight: bold;text-align:right"><span id="total_records"></span> <label> Stones Found</label></p>         
              </div>
          </div>
     </div>
      <div class="dataTables_scroll">
        <div class="panel-body table-responsive">          
          <table id="example" class="tablesorter table box-shadow table-bordered table-hover table-striped table-responsive table-condensed"> 
              <thead  class="">                 
                  <tr>
                      <th class="header"><input type="checkbox" id="checkAll" class="th_checkbox"></th>                     
                      <th class="header">View</th>
                      <th class="header sorting">Shape</th>
                      <th class="header sorting">Cts</th>
                      <th class="header sorting">Color</th>                  
                      <th class="header sorting">Clarity</th>
                      <th class="header sorting">Cut</th>
                      <th class="header sorting">Polish</th>                    
                      <th class="header sorting">Symmetry</th>
                      <th class="header sorting">Fluor.</th>                    
                      <th class="header sorting">Depth%</th>                    
                      <th class="header sorting">Table%</th>
                      <th class="header sorting">Price</th>                  
                      <th class="header sorting">Lab</th>                  
                      <th class="header sorting">Measurements</th> 
                  </tr>
              </thead>            
                
              <tbody id="add_data" style=""> 
                  <!-- List goes here -->
             </tbody>        
          </table>
         
          <div id="pagination-div-id" class="dataTables_paginate paging_simple_numbers"></div>
        </div>
    </div>
    </div>
  </div>
</section>

<!--  Email box  -->
  <div class="modal fade" id="alert_emailmodal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content" style="border-radius: 0;">
        <div  class="modal-header bg-site">          
          <h4 class="modal-title">Send Email <button type="button" class="close" data-dismiss="modal">&times;</button> </h4>    
        </div>    
        <div class="modal-body" style="padding: 15px 15px 0">
         <center> <p id="alert_emailmodal_message"></p></center>
        <hr />
        <form action="<?php echo base_url('send-data'); ?>" name="sendemail" class="form-horizontal" id="sendemail" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control " id="checkbox_arr" name="checkbox_arr" value="" >
            <?php echo csrf_field(); ?>
            <div class="form-group">              
                <div class="col-md-2">
                    <label for="Clarity"  class="DiamondtypeColor">Name </label>
                </div>
                <div class="col-md-9">
                      <input type="text" class="form-control " id="name" name="name" required="required" value="" placeholder="Name">
                </div>                   
            </div>
            <div class="form-group"> 
                <div class="col-md-2">
                    <label for="Clarity"  class="DiamondtypeColor">Email </label>
                </div>
                <div class="col-md-9">
                      <input type="email" class="form-control " id="email" name="email" required="required" value="" placeholder="Email">
                </div>            
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    <label for="Clarity"  class="DiamondtypeColor">Message </label>
                </div>
                <div class="col-md-9">
                    <textarea name="message" id="message" class="form-control " cols="25" style=""></textarea>  
                </div>       
            </div>
            <div class="form-group"> 
                <div class="col-md-9">                         
                    <button type="submit" class="btn btn-primary" style="border-radius: 0;" > Send </button>                       
                </div>       
            </div>              
        </form>
        </div>
        <div class="modal-footer bg-site"> 

        </div>
      </div>
    </div>
  </div>

<script src="<?php echo base_url(); ?>assets/js/ion.rangeSlider.js"></script> 

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
        var to_price = 10000000; 
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
  var to_size = 3.5; 
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
    max: 3.5,
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
    max: 3.5,
    from: from,
    to: to,
    step: 0.01,
     max_postfix:'+',
    });
};


///////////////////////////////////////////////////////////

        /*****Cut*******/
        var from_cut = 0;
        var to_cut = 4; 
        var from_cut_val = 'Ideal';
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
          
          var price_value1=["Ideal","Excellent", "Very+Good", "Good", "Fair"];
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
            values: ["Ideal","Excellent", "Very Good", "Good", "Fair"],  
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
              to: 4,
              values: ["Ideal","Excellent", "Very Good", "Good", "Fair"]
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

<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/ajax/manage_lab_grown_diamond_ajax.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ajax/manage_diamond.js"></script>