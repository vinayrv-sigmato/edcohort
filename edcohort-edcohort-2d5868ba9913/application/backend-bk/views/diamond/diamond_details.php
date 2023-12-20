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

            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card">
                    <div class="header">
                        <span class="header_span">Diamond List</span>
                    </div> 
                                         
                    <div class="body">
                        <div class="table-responsive1">
                            <table id="example" class="table table-bordered table-responsive table-striped table-hover table-condensed js-basic-example1 dataTable">
                              <tbody>                      
                                <tr >
                                  <td scope="row" class="text-left col-md-1">Lab</td>
                                  <td class="Lab text-right col-md-4"> <?php if($records['0']->lab != null){ echo $records['0']->lab; }?> </td>         
                                              
                                  <td scope="row" class="text-left col-md-1">Stock#</td>                   
                                  <td class="text-right col-md-4"> <?php if($records['0']->stock_id != null){ echo $records['0']->stock_id; }  ?></td>   
                                </tr>                          
                                <tr > 
                                  <td scope="row" class="text-left">$ Total</td>                    
                                  <td class="text-right"><?php if($records['0']->total_price!=null){ echo number_format($records['0']->total_price,2); } ?></td>

                                  <td scope="row" class="text-left">Report No</td>   
                                  <td class="REPORTNO text-right"><?php if($records['0']->report_no != null){ echo $records['0']->report_no; }?></td>   
                                
                                  
                                </tr>  
                                <!-- <tr>
                                  <td scope="row" class="text-left">$ total</td>                    
                                  <td class="text-right"><?php //if($records['0']->total_price!=null){ echo number_format($records['0']->total_price,2); } ?></td>                                
                                   
                                </tr> -->
                                <td scope="row" class="text-left">$/Carat</td>
                                  <td class="text-right"><?php if($records['0']->cost_carat!=null){ echo number_format($records['0']->cost_carat,2); } ?></td>
                                <td scope="row" class="text-left">Disc %</td> 
                                  <td class="text-right"><?php if($records['0']->new_discount != null){ echo number_format($records['0']->new_discount,1); } ?></td>  
                                <tr > 
                                  <td scope="row" class="text-left">Shape</td> 
                                  <td class="text-right"><?php if($records['0']->shape_full != null){ echo $records['0']->shape_full; }  ?></td>   
                               
                                  <td scope="row" class="text-left">Cts</td> 
                                  <td class="text-right"><?php if($records['0']->weight != null){ echo number_format($records['0']->weight,2); }  ?></td>   
                                </tr> 
                                <tr > 
                                  <td scope="row" class="text-left">Color</td> 
                                  <td class="text-right"><?php if($records['0']->color != null){ echo $records['0']->color; } ?></td>   
                                 
                                  <td scope="row" class="text-left">Clarity</td> 
                                  <td class="text-right"><?php if($records['0']->grade != null){ echo $records['0']->grade; } ?></td>   
                                </tr> 
                                <tr > 
                                  <td scope="row" class="text-left">Cut</td> 
                                  <td class="text-right"><?php if($records['0']->cut_full != null){ echo $records['0']->cut_full; } ?></td> 
                                
                                  <td scope="row" class="text-left">Polish</td> 
                                  <td class="text-right"><?php if($records['0']->polish_full != null){ echo $records['0']->polish_full; } ?>  </td> 
                                </tr>
                                <tr > 
                                  <td scope="row" class="text-left">Symmetry</td> 
                                  <td class="text-right"><?php if($records['0']->symmetry_full != null){ echo $records['0']->symmetry_full; } ?></td> 
                               
                                  <td scope="row" class="text-left">Fluorescence</td> 
                                  <td class="text-right"><?php if($records['0']->fluor_full != null){ echo $records['0']->fluor_full; }  ?></td> 
                                </tr> 
                                <tr > 
                                  <td scope="row" class="text-left">Depth%</td> 
                                  <td class="text-right"><?php if($records['0']->depth != null){ echo number_format($records['0']->depth,1); } ?></td> 
                               
                                  <td scope="row" class="text-left">Table%</td> 
                                  <td class="text-right"><?php if($records['0']->table_d != null){ echo (int)$records['0']->table_d; }  ?> </td> 
                                </tr>
                                <tr > 
                                  <td scope="row" class="text-left">Measurements</td> 
                                  <td class="text-right"><?php if($records['0']->measurements != null){ echo $records['0']->measurements; }  ?> </td> 
                               
                                  <td scope="row" class="text-left">Girdle Thin</td> 
                                  <td class="text-right"><?php if($records['0']->girdle_thin != null){ echo $records['0']->girdle_thin; }  ?></td> 
                                </tr>
                                <tr > 
                                  <td scope="row" class="text-left">Girdle Thick</td> 
                                  <td class="text-right"><?php if($records['0']->girdle_thick != null){ echo $records['0']->girdle_thick; } ?></td> 
                               
                                  <td scope="row" class="text-left">Culet</td> 
                                  <td class="text-right"><?php if($records['0']->culet != null){ echo $records['0']->culet; } ?></td> 
                                </tr>
                                <tr > 
                                  <td scope="row" class="text-left">Shade</td> 
                                  <td class="text-right"><?php if($records['0']->shade != null){ echo $records['0']->shade; } ?></td> 
                                
                                  <td scope="row" class="text-left">Crown Height</td> 
                                  <td class="text-right"><?php  if($records['0']->crown_height != null){ echo $records['0']->crown_height; } ?>  </td> 
                                </tr>
                                <tr > 
                                  <td scope="row" class="text-left">Crown Angle</td> 
                                  <td class="text-right"><?php  if($records['0']->crown_angle != null){ echo $records['0']->crown_angle; } ?> </td> 
                                
                                  <td scope="row" class="text-left">Pavilion Angle</td> 
                                  <td class="text-right"><?php if($records['0']->pavillion_angle != null){ echo $records['0']->pavillion_angle; }   ?>   </td> 
                                </tr> 
                                <tr > 
                                  <td scope="row" class="text-left">Pavilion Depth</td> 
                                  <td class="text-right"><?php if($records['0']->pavillion_depth != null){ echo $records['0']->pavillion_depth; } ?>   </td> 
                                
                                  <td scope="row" class="text-left">Key To Symbols</td> 
                                  <td class="text-right"><?php if($records['0']->keytosymb != null){ echo $records['0']->keytosymb; }  ?></td> 
                                </tr>
                                <tr > 
                                  <td scope="row" class="text-left">Comments</td> 
                                  <td class="text-right" colspan="3"><?php if($records['0']->notes != null){ echo $records['0']->notes; } ?>  </td> 
                                </tr>
                              </tbody>        
                            </table>

<!--                             <table id="example" class="table table-bordered table-responsive table-striped table-hover table-condensed js-basic-example1 dataTable">
                              <tbody>
                                <tr> 
                                  <td scope="row" class="text-center" colspan="4"><h4>Rapnet Details</h4></td>
                                </tr>                      
                                <tr> 
                                  <td scope="row" class="text-left">Rapnet Seller Name</td> 
                                  <td class="text-right"><?php if($records['0']->rap_seller != null){ echo $records['0']->rap_seller; } ?>   </td> 
                                
                                  <td scope="row" class="text-left">Rapnet Seller Code</td> 
                                  <td class="text-right"><?php if($records['0']->rap_seller_code != null){ echo $records['0']->rap_seller_code; }  ?></td> 
                                </tr>
                                <tr> 
                                  <td scope="row" class="text-left">Rapnet Seller Id</td> 
                                  <td class="text-right"><?php if($records['0']->rap_seller_id != null){ echo $records['0']->rap_seller_id; } ?>   </td> 
                                
                                  <td scope="row" class="text-left">Rapnet Diamond Id</td> 
                                  <td class="text-right"><?php if($records['0']->rap_diamond_id != null){ echo $records['0']->rap_diamond_id; }  ?></td> 
                                </tr>
                              </tbody>        
                            </table> -->

                        </div>
                    </div>
                </div>
            </div>

        </div>

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