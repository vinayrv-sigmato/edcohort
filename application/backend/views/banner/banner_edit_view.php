
<link href="<?php echo base_url(); ?>assets/css/image_preview.css" rel="stylesheet" />
<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Banner</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_banner') ?>" class="btn btn-info">Manage</a>
                            </h1>
                            </section>
                            </ol>
                        </div>
                        <!--/Page-Header-->

                        <div class="row">                           
                            <!-- end col -->
  
 							 <div class="col-xl-12">
                             	 <div class="card m-b-20">
                                	<div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                  <form action="<?php echo base_url(); ?>admin_banner/edit_product_submit" role="form" method="post" enctype="multipart/form-data">
                                    <div class="card">
                                    <div class="header">
                                      <h2 class="">Edit Banner </h2>
                                    
                                    </div>
                                    <div class="body">
                                    <?php foreach ($product_detail as $row): ?>
                                    <input type="hidden" value="<?php echo $row->home_slider_id; ?>" name="home_slider_id" id="home_slider_id">
                                    <div class="clearfix" style="margin-top: 15px;">
                                      <div class="tab-content">
                                        <div id="vital_info" class="tab-pane fade in active">
                                          <div class="col-md-12">
                                          <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                              <label for="">Banner</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                              <div class="col-md-3" style="border: 1px solid #DDDDDD;width:193px;padding-top:12px;padding-bottom:12px"> <img id="upload_pic" src="<?php echo base_url() ?>../camera_icon.png" alt="no-image"> </div>
                                              <div class="col-md-3" style="background-color:#CCCCCC;width:300px">
                                                <input type="file" class="img_upload" name="img_upload[]" id="img_upload" onchange="readURL(this);" style="padding: 12px 0px;width:206px;margin-left:0px;outline:none">
                                              </div>
                                            </div>
                                            
                                            <div class="col-md-12" id="output_img" style="margin-bottom: 12px;">
                                              <output id="result" />
                                            </div>
                                            <input type="hidden" id="product_image_count" value="<?php //echo count($row->home_slider_image); ?>">
                                            <div>
                                                 <!--<img style='height:170px;float:left;' class='thumbnail' src='<?php //echo base_url(); ?>../uploads/banner/<?php //echo $row->home_slider_image; ?>' title=''/> <a style="float:left;margin-right: 10px;font-weight: bold;" href="javascript:void(0)" class="remove_pict btn bg-red" onclick="removeImage('<?php //echo $row->home_slider_image; ?>',this)">X</a> </div> -->
                                                <?php 
                                                /* $a = base_url() . '../uploads/banner/' . $row->home_slider_image; ?>
                                                 <img src='<?php echo $a ?>' class="thumbnail" alt="Thumbnail Image" id="thumbnail" onclick="showPreview()" width = 200>*/
                                                
                                              
                                              $currentUrl = base_url();  // Your current URL

                                              // Use dirname to navigate one step back in the URL
                                              $newUrl = dirname($currentUrl);
                                              
                                              $c = $newUrl.'/uploads/banner/'.$row->home_slider_image;

                                                ?>
                                                 

                                                 <img src="<?php echo $c; ?>" alt="Thumbnail Image" id="thumbnail" onclick="showImagePreview()" width = 200> 
    
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeImagePreview()">&times;</span>
            <img src="<?php echo $c; ?>" alt="Full-size Image">
        </div>
    </div>


                                                 <div class="clearfix"></div>
                                            <div class="box-footer"> </div>
                                          </div>
                                          
                                          
                                          
                                          <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                              <label for="">Banner Status <span style="color:red">*</span></label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                              <div class="form-group">
                                                <div class="form-line">
                                                  <select class="form-control"  name="status" id="status" >
                                                    <option value="active" <?php if ($row->status=='active') { echo 'selected'; } ?> >Active</option>
                                                    <option value="inactive" <?php if ($row->status=='inactive') { echo 'selected'; } ?>>Inactive</option>
                                                  </select>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          
                                          <div class="form-group mb-0 row justify-content-end">
                                                <div class="col-md-9 float-end">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                     <button type="button" class="btn btn-danger waves-effect waves-light" onclick="window.history.back()">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <?php endforeach ?>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                           		 </div>
                            </div>

						</div>
                    </div>
                </div>



<!-- #END# Basic Examples -->

</div>

<script src="<?php echo base_url(); ?>assets/js/image_preview.js"></script>


    </script>
