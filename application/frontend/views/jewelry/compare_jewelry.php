<style>
th, td {
  text-align: center;
}
.text-danger {
  color: #e6110d;
}
.sample-text {
  color: #3cc1be;
  font-size: 18px;
  font-weight: normal;
  margin: 5px 0 0;
  padding: 0 0 0 150px;
}
.diamond.column.labels {
    width: 150px;
}
.diamond.column.labels {
    border-right: 1px solid #CCC;
    border-bottom:1px solid #CCC;    
    border-top:1px solid #CCC;   
    z-index: 2;
}
.diamond.column {
    border-right: 1px solid #979797;
    display:inline-block;
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
    border-left: 1px solid #CCC;
}

.c_head.a {
    padding: 23px !important;
}
.c_head.img{
    padding: 60px !important;
}
.c_head.name{    
    padding-top: 37px !important;
    padding-bottom: 37px !important;
}
.c_body{
    text-align: center;
    min-height: 38px;
}
.c_body.name{    
    min-height: 92px;
    max-height: 92px;
}
.c_body span.fa{
    padding-left: 20px;
    padding-right: 20px;
}

a.btn.btn-primary.btn-xs.radius-flat {
    padding: 9px;
}

button.btn.btn-danger.btn-xs.radius-flat {
    padding: 9px;
}
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/easyzoom.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/products.css" />
<!-- <div class="breadcrumb" id="breadcrumb">
  <div class="container" itemprop="breadcrumb">
    <div class="row">
      <div class="col-sm-12"> <a title="Back to the frontpage" class="homepage-link" href="<?php echo base_url(); ?>">Home</a> <span>/</span> <a title="Back to the frontpage" class="homepage-link" href="<?php echo base_url(); ?>jewelry">Jewelry</a> <span>/</span> <span class="page-title">Compare Jewelry</span> </div>
    </div>
  </div>
</div> -->
<div  class="breadcrumb ">  
   <div itemprop="breadcrumb" class="container">
    <div class="d-flex justify-content-between align-items-center">
    <div> <h2><span>Jewelry Details</span></h2></div>
     <div><ul class="nav">
      <li class="nav-item">
        <a title="Back to the frontpage" class="homepage-link" href="<?php echo base_url(); ?>">Home</a>  
      </li>
      <li class="nav-item">
        <a title="Back to the frontpage" class="homepage-link" href="<?php echo base_url(); ?>jewelry">Jewelry</a>
      </li>
      <li class="nav-item">
        <span class="page-title">Compare Jewelry</span>
      </li>
    </ul></div>
     </div>
   </div>
</div>
<div class="">
   <?php echo message(); ?>
</div>
<div class="container">
  <div class="row">
   <button type="button" class="btn btn-danger radius-flat pull-right" onclick="window.history.back()"><i class="fa fa-reply"></i> Back</button>
 </div>
</div>
   
  <section class="border-bottom-light sm-text-center padding-two">

    <div class="container-fluid">
      <h3 class="title font-additional font-weight-bold text-uppercase wow zoomIn padding-two no-padding-top text-center"> Compare </h3>
      <div class="starSeparatorBox clearfix text-center ">
          <div class="diamond column labels" id="add_data">
            <div class="c_head a"><span>Remove</span></div>
            <div class="c_head img"><span></span></div>
            <div class="c_head a"><span>View Details</span></div>
            <div class="c_head"><span>Add to</span></div>
            <div class="c_head name"><span>Name</span></div>
            <div class="c_head"><span>Price $</span></div>
            <div class="c_head"><span>Metal Color</span></div>
            <div class="c_head"><span>Metal Type</span></div>
            <!-- <div class="c_head"><span>Description</span></div> -->
<!--             <div class="c_head"><span>Stone Weight</span></div>
            <div class="c_head"><span>Diamond Weight</span></div>
            <div class="c_head"><span>Net Alloy</span></div> -->
      </div>
    </div>
  </section>

<script src="<?php echo base_url(); ?>assets/js/ajax/compare_jewelry_ajax.js"></script>

