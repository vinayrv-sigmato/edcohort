<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/easyzoom.css" />

<style>

    .column.text-left {

        position: absolute;

        bottom: 0px;

        left: 0px;

    }

    td.text-left {

      border-left: 5px solid #a2a9ad !important;

      font-size: 16px !important;

      font-weight: 600 !important;

    }

</style>

 <style>

   .product-gallery li {

    list-style: none;

}



.vertical-pager1 ul li.easyzoom {

    width: 100%;

}

.product-gallery_preview {

    float: left;

    width: 100%;

}

.product-gallery_preview a {

    float: left;

    margin-right: 7px;

    width: 30%;

}

.product-gallery_preview a {

    border: 1px solid #ccc;

    padding: 5px;

    width: 12% !important;

    min-height: 64px;

}

.product-gallery_preview a img {

    width: 100% !important;

    object-fit: contain;

}

 </style>

 <section class="content">

    <div class="container-fluid">

        <div class="row row-header">

            <div class="col-md-8">

            <h2>Diamond <small>Diamond List</small></h2>

            </div>

        </div>

        <?php message(); ?>
        <div class="row clearfix">

              <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                <div class="card">

                    <div class="header">

                        <span class="header_span">Diamond List</span>

                    </div>              

                    <div class="body">

                      <div class="table-responsive">

                        <div class="product-gallery vertical-pager1">

                          <ul style="min-height: 400px;">

                             <!-- <?php //foreach($image_link as $k => $value){  ?>

                             <li class="mySlides easyzoom easyzoom--overlay easyzoom--with-thumbnails" id="slides_<?php echo $count; ?>" > <a href="<?php echo $value; ?>"> <img src="<?php echo $value; ?>" alt="No Image Available" width="80%"  /> </a> </li>

                            <?php //$count++; } ?> -->

                            <?php  $count=0; foreach($image_array as $k => $value){  ?>

                            <li class="mySlides easyzoom easyzoom--overlay easyzoom--with-thumbnails" id="slides_<?php echo $count; ?>"  > <a href="<?php echo $value; ?>"> <img src="<?php echo $value; ?>" alt="" height="400"   /> </a> </li>

                            <?php $count++; } ?>

                            <?php  foreach($sample_image_array as $k => $value){  ?>

                            <li class="mySlides " id="slides_<?php echo $count; ?>" >  

                              <figure>

                                <img src="<?php echo $value; ?>" alt="" height="400" style="margin: auto;display: block;" />

                                <figcaption style="text-align: center;margin-top: -53px;">Sample Image</figcaption>

                              </figure>

                            </li>

                            <?php $count++; } ?>

                            <?php foreach($video_link as $k => $value){  ?>

                            <li class="mySlides" id="slides_<?php echo $count; ?>" style="height: 400px;">

                              <iframe src="<?php echo $value; ?>" frameborder="0" width="100%" height="100%"></iframe>

                            </li>

                            <?php $count++; } ?>

                          </ul>

                          <div id="bx-pager" class="product-gallery_preview">

                            <?php $count=0; foreach($image_array as $k => $value){?>

                            <a data-slide-index="0" href="javascript:void(0)"><img src="<?php echo $value; ?>" onclick="showSlides('<?php echo $count; ?>')" title="Image" data-toggle="tooltip" /></a>

                            <?php $count++; } ?>

                            <?php foreach($sample_image_array as $k => $value){?>

                            <a data-slide-index="0" href="javascript:void(0)"><img src="<?php echo $value; ?>"  onclick="showSlides('<?php echo $count; ?>')" title="Sample Image" data-toggle="tooltip" /></a>

                            <?php $count++; } ?>

                            <?php foreach($image_link as $k => $value){  ?>

                            <a href="javascript:void(0)" onclick="open_windows('<?php echo $value; ?>')"><img class="details_thumb " src="<?php echo base_url(); ?>assets/diamond-128.png"  title="Image Link" data-toggle="tooltip"></a>

                            <?php $count++; } ?>

                            <?php foreach($video_link as $l => $value){  $j++; ?>

                            <a><img class="details_thumb " src="<?php echo base_url(); ?>assets/vdobig.png" onclick="showSlides('<?php echo $count; ?>')" width="" height="" title="Video " data-toggle="tooltip"></a>

                            <?php $count++; } ?>

                            <?php foreach($certificate_array as $j => $value){  ?>

                            <a href="javascript:void(0)" onclick="open_windows('<?php echo $value; ?>')"  title="Certificate" data-toggle="tooltip"><img class="details_thumb" src="<?php echo base_url(); ?>assets/GIA-Logo.jpg"></a>

                            <?php } ?>

                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
       <form action="<?php echo base_url(); ?>admin_diamond/edit_diamond_submit" role="form" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="header">                       
                        <h2 class="">Edit Diamond </h2>
                        <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4 pull-right">
                            <a href="<?php echo base_url()?>admin_diamond" class="btn bg-red btn-block btn-lg waves-effect" style="">Cancel</a>
                        </div>                         
                        <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4 pull-right">
                            <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect" onclick="return validateForm()">Update</button>
                        </div>                                                   
                    </div> 
              <input type="hidden" name="diamond_id" id="diamond_id" value="<?php echo $records[0]->diamond_id; ?>">
                           <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Stock# <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" type="text" value="<?php echo $records[0]->stock_id; ?>" required="" name="stock_id" id="stock_id" readonly >                                                 
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                   <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">$/Carat <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" type="text" value="<?php echo $records[0]->cost_carat; ?>" required="" name="cost_carat" id="cost_carat" >                                                 
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                   <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">$ Total <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" type="text" value="<?php echo $records[0]->total_price; ?>" required="" name="total_price" id="total_price" >                                                 
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                   <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Disc % <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" type="text" value="<?php echo $records[0]->new_discount; ?>" required="" name="new_discount" id="new_discount" >                                                 
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                
                         
                  </div>
                </form>

    </div>



</section>

<script>

$(document).ready(function(){

  var n=10;

    $(".mySlides").hide();

});

function  showZoom()

{

   $("#easy_zoom").show();

   $(".mySlides").hide();

}

$(document).ready(function(){

    n=0;

    $(".mySlides").hide();

    $("#slides_"+n).show(); 



    showSlides(n);

});

function showSlides(n) 

{

    $(".mySlides").hide();

    $("#easy_zoom").hide();

    

    $("#slides_"+n).show();  

}

</script>

<script src="<?php echo base_url(); ?>assets/js/easyzoom.js"></script>

<script>

    var $easyzoom = $('.easyzoom').easyZoom();

    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function(e) {

      var $this = $(this);

      e.preventDefault();

      api1.swap($this.data('standard'), $this.attr('href'));

    });

</script>

<script src="<?php echo base_url(); ?>assets/ajax/manage_diamond_ajax.js"></script>