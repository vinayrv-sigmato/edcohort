<style>
th, td {
  text-align: center;
}
.text-danger {
  color: #e6110d;
}
.sample-text {
  color: #428bca;
  font-size: 18px;
  font-weight: normal;
  margin: 5px 0 0;
  padding: 0 0 0 150px;
}
.diamond.column.labels {
    width: 150px;
}
.diamond.column.labels {
border-right: 1px solid #428bca;
    border-bottom: 0;
    z-index: 2;
}
.diamond.column {
    border-right: 1px solid #979797;
    display: inline-block;
    line-height: 18px;
    overflow: hidden;
    width: 100px;
}
.diamond.column.labels > div:nth-of-type(2n+1) {
    background: rgba(0,0,0,.1) !important    
}
.diamond.column.labels > div {
    background-color: #ffffff !important;
    padding: 10px;
}
.c_head{
    text-align: right;
    font-weight: 500;
    border-left: 1px solid #428bca;
}
.c_head.a{
    padding: 12px !important;
}
.c_head.img{
    padding: 60px !important;
}
.c_body{
    text-align: center;
    min-height: 38px;
}
.c_body span.fa{
    padding-left: 20px;
    padding-right: 20px;
}
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/easyzoom.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/products.css" />
<div class="breadcrumb" id="breadcrumb">
  <div class="container" itemprop="breadcrumb">
    <div class="row">
      <div class="col-md-24"> <a title="Back to the frontpage" class="homepage-link" href="<?php echo base_url(); ?>">Home</a> <span>/</span> <a title="Back to the frontpage" class="homepage-link" href="<?php echo base_url(); ?>diamond">Diamond</a> <span>/</span> <span class="page-title">Compare Diamond</span> </div>
    </div>
  </div>
</div>
<div class="row">
   <?php echo message(); ?>
</div>
<div class="row">
  <div class="container">
   <button type="button" class="btn btn-danger radius-flat pull-right" onclick="window.history.back()"><i class="fa fa-reply"></i> Back</button>
 </div>
</div>
   
  <section class="border-bottom-light sm-text-center section-padding">

    <div class="container-fluid ">
      <h3 class="title font-additional font-weight-bold text-uppercase wow zoomIn text-center"> Compare </h3>
      <div class="starSeparatorBox clearfix text-center ">
          <div class="diamond column labels" id="add_data">
            <div class="c_head a"><span>Remove</span></div>
            <div class="c_head img"><span></span></div>
            <div class="c_head a"><span>View Details</span></div>
            <div class="c_head"><span>Add to</span></div>
            <div class="c_head"><span>Price $</span></div>
            <div class="c_head"><span>Carat Weight</span></div>
            <div class="c_head"><span>Shape</span></div>
            <div class="c_head"><span>Cut</span></div>
            <div class="c_head"><span>Color</span></div>
            <div class="c_head"><span>Clarity</span></div>
            <div class="c_head"><span>Depth %</span></div>
            <div class="c_head"><span>Table %</span></div>
            <div class="c_head"><span>Polish</span></div>
            <div class="c_head"><span>Symmetry</span></div>
            <div class="c_head"><span>Fluorescence</span></div>
            <div class="c_head"><span>Measurements</span></div>
          </div>

      </div>
    </div>
  </section>

<script src="<?php echo base_url(); ?>assets/js/ajax/compare_diamond_ajax.js"></script>
<script src="<?php echo base_url(); ?>assets/js/easyzoom.js"></script> 

<script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function(e) {
      var $this = $(this);

      e.preventDefault();

      // Use EasyZoom's `swap` method
      api1.swap($this.data('standard'), $this.attr('href'));
    });   
  </script> 
