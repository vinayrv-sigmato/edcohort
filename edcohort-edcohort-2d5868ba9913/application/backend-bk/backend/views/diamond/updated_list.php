
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
            <h2>Diamond <small>Diamond List</small></h2>
            </div>
        </div>
        <?php message(); ?>

        <!-- Basic Examples -->
<div class="row collapse1" id="collapseExample" aria-expanded="false">
  
</div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="body">
                        <table id='DiamondTable' class="table table-bordered table-responsive table-striped table-hover table-condensed js-basic-example1 dataTable"> 
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Report No</th>
                                <th>Status</th>
                                <th>Updated Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>


<!-- Custom JS -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function(){
    $('#DiamondTable').DataTable({
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('Admin_diamondH/load_more_data/'); ?>",
            "type": "POST"
        },
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [0],
            "orderable": false
        }]
    });
});
</script>    <!-- RangeSlider Plugin Js -->



