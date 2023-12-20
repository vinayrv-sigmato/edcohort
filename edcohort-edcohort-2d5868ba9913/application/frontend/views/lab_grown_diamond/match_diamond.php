<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <!-- Range slider CSS -->
  <link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/manage_diamond.css">
    <link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/match-diamond.css">
  <!-- RANGE SLIDER -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/ion.rangeSlider.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/ion.rangeSlider.skinFlat.css" />
<div id="breadcrumb" class="breadcrumb">
  <div itemprop="breadcrumb" class="container">
    <div class="row">
      <div class="col-md-24">
        <a href="<?php echo base_url(); ?>" class="homepage-link" title="Back to the frontpage">Home</a>        
        <span>/</span>
        <span class="page-title">Diamond Studs</span>        
      </div>
    </div>
  </div>
</div>

<section class="">
  <div class="container">
    <div id="exTab1"> 
      <ul class="nav nav-pills">
        <li class="active">
          <a  href="#1a" data-toggle="tab">Diamond Studs </a>
        </li>
      </ul>

      <div class="tab-content clearfix">
        <div class="tab-pane active" id="1a">
        	<section class="" id="search_div" style="">
         		 <div class="filter">
         			 <form action="javascript:void(0)" method="post" id="form">
         				 <div class="row">
                         <?php $sf=$this->input->get('sf'); ?>
                         <div class="col-lg-12 col-sm-12 col-md-12 col-12">
                             <div class="tps_inputrange_shape">
                             <ul class="tps_diamond_shapes" id="tps_diamond_shapes">
                                 <li>
                                  <label for="idshaperound">
                 					          <input type="checkbox" name="checkbox[]" id="idshaperound"  onchange="submitForm()" value="Round" <?php if ($sf=='Round') { echo "checked"; } ?> >
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
                                  <input type="checkbox" name="checkbox[]" id="idshapeasscher"  onchange="submitForm()" value="ASSCHER" <?php if ($sf=='ASSCHER') { echo "checked"; } ?>><a  title="Asscher"><span class="img_shape asscher"><i class="icon-diamond-asscher"></i></span><span class="text_shape">Asscher</span></a></li>


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
                             <div class="col-sm-2 col-md-2 col-lg-2 col-12">
                                 <label>Certified</label>
                               </div>
                             <div class="col-sm-10 col-md-10 col-lg-10 col-12">
                                 <ul class="certified-icon">
                                 <li data-shape="round" data-shape-delta="0">
                                <input type="checkbox" name="cert[]"  onchange="submitForm()" value="GIA">
                                <img src="<?php echo base_url(); ?>assets/img/gia.jpg"> </li>
                              <li data-shape="round" data-shape-delta="0">
                                <input type="checkbox" name="cert[]"  onchange="submitForm()" value="EGL USA">
                                <img src="<?php echo base_url(); ?>assets/img/egl.jpg"> </li>
                              <li data-shape="round" data-shape-delta="0">
                                <input type="checkbox" name="cert[]"  onchange="submitForm()" value="AGS">
                                <img src="<?php echo base_url(); ?>assets/img/american.jpg"> </li>
                              <!-- <li data-shape="round" data-shape-delta="0">
                                <input type="checkbox" name="cert[]" value="GIL">
                                <img src="<?php echo base_url(); ?>assets/img/gil.jpg"> </li> -->
                                 <!--<li data-shape="round" data-shape-delta="0">
                                <input type="checkbox" name="cert[]" value="IGI">
                                <img src="<?php //echo base_url(); ?>assets/img/igi.jpg"> </li>-->
                                 <li data-shape="round" data-shape-delta="0">
                                <input type="checkbox" name="cert[]" onchange="submitForm()" value="None">
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
                             <div class="hide_show"> 
                                <a href="javascript:void(0)"><span id="show_advance" class="nav-toggle" onclick="show_search()"> 
                                  <i class="plus-toggle fa fa-plus"> </i> More Filter
                                </span> 
                              </a> 
                            </div>
                             <div class="hide_show1" style="display: inline-block;"> 
                                <a href="javascript:void(0)"><span id="show_parameters" class="nav-toggle" onclick="show_parameters()">
                                <i class="fa fa-arrow-circle-down"></i> Show Parameters
                                </span>  
                                </a>
                              </div>
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

    <div id="MatchFilterDiv" class="dia-filter dia-input blue" style="display:none">
      <form action="#" id="form1">
      <div class="col-sm-12">
        <div class="match-title">
          <div class="row">
            <div class="col-lg-10 col-md-9 col-sm-12 col-12">
                <div class="col-sm-6 col-md-6 col-lg-6 col-12">
                 <h4>No. Of Diamonds To Match(+/-)</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-12 ">
                 <input type="text" value="2" id="matching_count" name="matching_count">
                </div>
            </div>
            <!-- <div class="col-lg-2 col-md-3 col-sm-12 col-12" style="padding: 20px;">  
              <a aria-controls="match" aria-expanded="false" href="#match" data-toggle="collapse" role="button"  class="filter-btn" id="show_paramrters" onclick="show_parameters();"><i class="fa fa-arrow-circle-down"></i> Show Parameters</a> 
            </div> -->
          </div>
        </div>
        <div class="clearfix"></div>
        <div id="match" class=" ">
          <div class="well">
            <div class="input-block">
              <ul class="match-ul">
                <li>
                  <h4 class="filter-title">Weight% (+/-)</h4>
                  <select onchange="submitForm()" id="matching_weight" name="matching_weight" class="bg">
                    <option value="0">Same</option>
                    <option value="1">1%</option>
                    <option value="2">2%</option>
                    <option value="3">3%</option>
                    <option value="4">4%</option>
                    <option selected="selected" value="5">5%</option>
                    <option value="6">6%</option>
                    <option value="7">7%</option>
                  </select>
                </li>
                <li>
                  <h4 class="filter-title">Color (+/-)</h4>
                  <select onchange="submitForm()" id="matching_color" name="matching_color" class="bg">
                    <option value="0">Same</option>
                    <option selected="selected" value="1">1 grade</option>
                    <option value="2">2 grades</option>
                  </select>
                </li>
                <li>
                  <h4 class="filter-title">Clarity (+/-)</h4>
                  <select onchange="submitForm()" id="matching_clarity" name="matching_clarity" class="bg">
                    <option value="0">Same</option>
                    <option selected="selected" value="1">1 grade</option>
                    <option value="2">2 grades</option>
                  </select>
                </li>
                <li>
                  <h4 class="filter-title">Cut (+/-)</h4>
                  <select onchange="submitForm()" id="matching_cut" name="matching_cut" class="bg">
                    <option value="0">Same</option>
                    <option selected="selected" value="1">1 grade</option>
                    <option value="2">2 grades</option>
                  </select>
                </li>
                <li>
                  <h4 class="filter-title">Polish (+/-)</h4>
                  <select onchange="submitForm()" id="matching_polish" name="matching_polish" class="bg">
                    <option value="0">Same</option>
                    <option selected="selected" value="1">1 grade</option>
                    <option value="2">2 grades</option>
                  </select>
                </li>
                <li>
                  <h4 class="filter-title">Symmetry (+/-)</h4>
                  <select onchange="submitForm()" id="matching_symmetry" name="matching_symmetry" class="bg">
                    <option value="0">Same</option>
                    <option selected="selected" value="1">1 grade</option>
                    <option value="2">2 grades</option>
                  </select>
                </li>
                <li>
                  <h4 class="filter-title">Fluorescence (+/-)</h4>
                  <select onchange="submitForm()" id="matching_fluorescence" name="matching_fluorescence" class="bg">
                    <option value="0">Same</option>
                    <option selected="selected" value="1">1 intensity</option>
                    <option value="2">2 intensities</option>
                  </select>
                </li>
                <li>
                  <h4 class="filter-title">Depth% (+/-)</h4>
                  <select onchange="submitForm()" id="matching_depth" name="matching_depth" class="bg">
                    <option value="0">0%</option>
                    <option value="0.1">0.1%</option>
                    <option value="0.2">0.2%</option>
                    <option value="0.3">0.3%</option>
                    <option value="0.4">0.4%</option>
                    <option value="0.5">0.5%</option>
                    <option value="0.7">0.7%</option>
                    <option value="0.9">0.9%</option>
                    <option value="1">1%</option>
                    <option value="1.2">1.2%</option>
                    <option value="1.4">1.4%</option>
                    <option value="1.5">1.5%</option>
                    <option value="1.8">1.8%</option>
                    <option value="2">2%</option>
                    <option value="2.3">2.3%</option>
                    <option value="2.5">2.5%</option>
                    <option selected="selected" value="2.7">2.7%</option>
                  </select>
                </li>
                <li>
                  <h4 class="filter-title">Table%  (+/-)</h4>
                  <select onchange="submitForm()" id="matching_table" name="matching_table" class="bg">
                    <option value="0">0%</option>
                    <option value="1">1%</option>
                    <option value="2">2%</option>
                    <option selected="selected" value="3">3%</option>
                  </select>
                </li>
                <!-- <li>
                  <h4 class="filter-title">Length (+/-)</h4>
                  <select onchange="submitForm()" id="matching_margin_length" name="matching_margin_length" class="bg">
                    <option value="0">Exact</option>
                    <option value="1">1% Max</option>
                    <option value="2">2% Max</option>
                    <option value="3">3% Max</option>
                    <option value="4">4% Max</option>
                    <option selected="selected" value="5">5% Max</option>
                    <option value="6">6% Max</option>
                    <option value="7">7% Max</option>
                  </select>
                </li>
                <li>
                  <h4 class="filter-title">Width (+/-)</h4>
                  <select onchange="submitForm()" id="matching_margin_width" name="matching_margin_width" class="bg">
                    <option value="0">Exact</option>
                    <option value="1">1% Max</option>
                    <option value="2">2% Max</option>
                    <option value="3">3% Max</option>
                    <option value="4">4% Max</option>
                    <option selected="selected" value="5">5% Max</option>
                    <option value="6">6% Max</option>
                    <option value="7">7% Max</option>
                  </select>
                </li>
                <li>
                  <h4 class="filter-title">Depth (+/-)</h4>
                  <select onchange="submitForm()" id="matching_margin_depth" name="matching_margin_depth" class="bg">
                    <option value="0">Exact</option>
                    <option value="1">1% Max</option>
                    <option value="2">2% Max</option>
                    <option value="3">3% Max</option>
                    <option value="4">4% Max</option>
                    <option selected="selected" value="5">5% Max</option>
                    <option value="6">6% Max</option>
                    <option value="7">7% Max</option>
                  </select>
                </li> -->
                <!-- <li style="padding-top:10px; width:114px;">
                  <input type="checkbox" class="match_checkbox" onclick="submitForm()" checked="checked" autocomplete="off" value="Same" id="matching_shade2" name="matching_shade2">Same Shade
                  <br>
                  <input type="checkbox" class="match_checkbox" onclick="submitForm()" autocomplete="off" value="Same" id="matching_location2" name="matching_location2">Same Location
                  <br>
                  <input type="checkbox" class="match_checkbox" onclick="submitForm()" autocomplete="off" value="Same" id="matching_lab2" name="matching_lab2">Same Lab
                  <br>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </form>
      <div class="clearfix"></div>
    </div>
    </div>


</section>


<section class="section-padding top-35">


  <div class="">
    <div class="container1">
    <div class="row">
     <div class="col-sm-3 col-md-3 col-lg-3 col-12">
      <div class="margin-24">
      
      <form action="" id="per_page_form" hidden="true">
      <span>Show <select name="per_page" id="per_page" class=" input-sm" onchange="submitForm()">
          <option value="10" >10</option>
           <option value="20" >20</option>
          <option value="35" >35</option>
          <option value="50" >50</option>
          <option value="100" >100</option>
          <option value="200" selected>200</option>
          <option value="500"  >500</option>
          </select> entries</span></form></div>
    </div> 
      
            <div class="col-sm-6 col-md-6 col-lg-6 col-12">
        <div class="image-width">
          <div class="row image-icon">
        <div class="col-lg-12 spacer-bottom"> 
            <nav  style="background-color: #ffffff;padding: 3px; text-align:center">

              <span class="dropdown">
              <img src="<?php echo base_url(); ?>assets/images/download.png" onclick="export_list()" alt="Download" class="my-tooltip my-dropdown" data-toggle="dropdown" data-placement="top">
            </span>
            <img src="<?php echo base_url(); ?>assets/images/print.png" alt="Print" onclick="print_data()" class="my-tooltip my-dropdown" data-toggle="tooltip" data-placement="top" title="Print">
            <img src="<?php echo base_url(); ?>assets/images/view-icon.png" alt="View" onclick="view_data()" class="my-tooltip my-dropdown" data-toggle="tooltip" data-placement="top" title="View">                   
            <a href="<?php echo base_url(); ?>match-diamond"><img src="<?php echo base_url(); ?>assets/images/refresh-icon.png" alt=Refresh"" id="refreshpage" class="my-tooltip my-dropdown" data-toggle="tooltip" data-placement="top" title="Refresh"></a>
            <img src="<?php echo base_url(); ?>assets/images/send.png" alt="Send" onclick="send_data()" class="my-tooltip my-dropdown" data-placement="top" title="Send" data-tooltip="true">  
            <img src="<?php echo base_url(); ?>assets/images/back-icon.png" alt="Back" class="my-tooltip my-dropdown" data-toggle="modal" data-target="" onclick="window.history.back()" data-placement="top" title="Back" data-tooltip="true">
             
           </nav>

            
        </div>    
    
</div>
    </div>
      </div>
      
         <div class="col-sm-3 col-md-3 col-lg-3 col-12 pull-right">
          <div class="margin-24">
                <p  style="font-weight: bold;text-align:right"><span id="total_records">0</span> &nbsp;&nbsp;<label style="text-align: right"> Stones Found</label></p>         
                </div>
            </div>
     </div>
      <div class="dataTables_scroll">
     <div class="panel-body table-responsive" id="divdata" >          
        <table id="example" class="tablesorter table display nowrap box-shadow table-bordered table-responsive table-condensed"> 
            <thead  class="">                 
                <tr>
                    <th class="header"><input type="checkbox" id="checkAll" class="th_checkbox"></th>                     
                    <th class="header">View</th>
                    <th class="header">Stock#</th>
                    <th class="header sorting">Shape</th>
                    <th class="header sorting">Cts</th>
                    <th class="header sorting">Total Cts</th>
                    <th class="header sorting">Color</th>                  
                    <th class="header sorting">Clarity</th>
                    <th class="header sorting">Cut</th>
                    <th class="header sorting">Polish</th>                    
                    <th class="header sorting">Symmetry</th>
                    <th class="header sorting">Fluor.</th>                    
                    <th class="header sorting">Depth%</th>                    
                    <th class="header sorting">Table%</th>
                    <!-- <th class="header sorting">Rapnet $</th>   -->
                   <!--  <th class="header sorting">Disc%</th>  -->              
                    <th class="header sorting">$/Carat</th>
                    <th class="header sorting">Price $</th>    
                    <th class="header sorting">Total Price $</th>                  
                    <th class="header sorting">Lab</th>                  
                    <th class="header sorting">Measurements</th> 
                </tr>
            </thead>
            
              
            <tbody id="add_data" style=""> 
                <!-- List goes here -->
           </tbody>           
        </table>        
       
        <div id="pagination-div-id" class="dataTables_paginate paging_simple_numbers"></div>
        <input type="hidden" id="page" name="page" value="0">
      </div>
      <div id="table-loader" class="text-center" style="display: none">Loading...</div> 
</div>
    </div>
  </div>
</section>


<!--  Email box  -->
  <div class="modal fade" id="alert_emailmodal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content" style="border-radius: 0;">
        <div  class="modal-header">          
          <h4 class="modal-title">Shakti Jewel </h4> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>   
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
        <div class="modal-footer">  

                    </div> 
        
      </div>
    </div>
  </div>



<script src="<?php echo base_url(); ?>assets/js/ion.rangeSlider.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/index.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/load.js"></script> 

<script>
  // $(document).ready(function(){
  //           $(':checkbox:checked').each(function(){
  //             var id = $(this).attr("id");
  //             $('label[for="' + id + '"]').toggleClass("active1");
  //           });
  //       });

  // $(document).ready(function(){
  //          $("label input[name='checkbox[]']").click(function(){
  //             //console.log(this);
  //             var id = $(this).attr("id");
  //             $('label[for="' + id + '"]').toggleClass("active1"); 
  //          });
  //       });
</script>
  <script>
  $(document).ready(function(){            
              //$('#footer').hide();            
        });

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

      $("#matching_count").ionRangeSlider({
        type: "single",
        min: 2,
        max: 10,
        step: 1,
        grid: true,
        grid_snap: true
      });

      /***Color*****/
        var from_color = 0;
        var to_color = 9; 
      //console.log(urlToParse.length)
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
        if(urlToParse.length){
        var cut_url=result_url.cut;
        var cut_url=cut_url.split('%3B');
        if(cut_url[1]!="")
        {
          from_cut = cut_url[0];
          to_cut = cut_url[1]; 
          
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
                 $("#range_51a").val('Excellent;Fair');
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
        if(urlToParse.length){
        var polish_url=result_url.polish;
        var polish_url=polish_url.split('%3B');
        if(polish_url[1]!="")
        {
          from_polish = polish_url[0];
          to_polish = polish_url[1]; 
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
                 $("#range_51ab").val('Excellent;Fair');
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
    if(urlToParse.length){
    var symmetry_url=result_url.symmetry;
    var symmetry_url=symmetry_url.split('%3B');
    if(symmetry_url[1]!="")
    {
      from_symmetry = symmetry_url[0];
      to_symmetry = symmetry_url[1]; 
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
                 $("#range_52ac").val('Excellent;Fair');
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
        if(urlToParse.length){
        var fluorescence_url=result_url.fluorescence;
        var fluorescence_url=fluorescence_url.split('%3B');
        if(fluorescence_url[1]!="")
        {
          from_fluorescence = fluorescence_url[0];
          to_fluorescence = fluorescence_url[1]; 
          
          var price_value1=["NON", "FNT", "MED", "STG","VST"];
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
            values: ["NON", "FNT", "MED", "STG","VST"],  
            onStart: function (data) {              
                 $("#range_58a").val('NON;VST');
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
               values: ["NON", "FNT", "MED", "STG","VST"]
            });
        });

        $update_button.on("click", function () {
            rangeFluor.update({
               from: 0,
               to: 4,
               values: ["NON", "FNT", "MED", "STG","VST"]
            });
        });
    });
</script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/custom/css/jquery.dataTables.min.css">
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/manage_match_diamond_ajax.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/manage_diamond.js"></script>