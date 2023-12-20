<link href="<?php echo base_url(); ?>assets/css/image_preview.css" rel="stylesheet" />
<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Testimonial</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_testimonial') ?>" class="btn btn-info">Manage</a>
                            </h1>
                            </section>
                            </ol>
                        </div>
                        <!--/Page-Header-->

                        <div class="row">                           
                            <!-- end col -->
                            <div class="col-xl-12">
                                 <?php message(); ?>
                                <div class="card m-b-20">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Testimonial</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        <?php //print_ex($testimonial_detail);
                                        foreach ($testimonial_detail as $testimonial){  ?>
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_testimonial/edit_testimonial_submit" method="post" enctype="multipart/form-data">
                                            <div class="form-group ">
                                                 <input type="hidden" name="testimonial_id" value="<?php echo @$testimonial->testimonial_id ?>">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Name <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="testimonial_name" name="testimonial_name" value="<?php echo $testimonial->testimonial_by; ?>" placeholder="Enter Name" required>
                                                    </div>
                                                </div>
                                            </div>


                                           
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Testimonial</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea id="editor1" class="form-control no-resize" name="testimonial" rows="3" cols="80" placeholder="Testimonial Description"><?php echo $testimonial->testimonial; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Image <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="hid_image" value="<?php echo $testimonial->image; ?>">
                                                         <?php 
                                                         $preview_image = '';
                                                         $currentUrl = base_url();  // Your current URL
                                                         // Use dirname to navigate one step back in the URL
                                                         $newUrl = dirname($currentUrl);
                                                         if($testimonial->image!=""){ 
                                                            $preview_image = $newUrl.'/uploads/testimonial/'.$testimonial->image;
                                                            ?>
                                                          <img id="upload_pic" width="100" height="100" class="img-thumbnail" src="<?php echo base_url(); ?>../uploads/testimonial/<?php echo $testimonial->image; ?>" alt="no-image" onclick="showImagePreview()">
                                                        <?php } else{  
                                                            $preview_image = $newUrl.'/camera_icon.png';
                                                            ?>
                                                        <img id="upload_pic" class="img-thumbnail" src="<?php echo base_url() ?>../camera_icon.png" alt="no-image">
                                                        <?php } ?>                                                        
                                                       <input type="file" name="img_upload" id="img_upload" onchange="readURL(this);" style="outline:none;margin-top:6px" onclick="showImagePreview()">
                                                    </div>

                                                    <div id="imageModal" class="modal">
                                                        <div class="modal-content">
                                                            <span class="close" onclick="closeImagePreview()">&times;</span>
                                                            <img src="<?php echo $preview_image; ?>" alt="Full-size Image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                           
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Rating</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                         <div class="star-ratings start-ratings-main clearfix me-3">
                                                        <div class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                                            <select class="example-fontawesome" name="rating" id="rating" autocomplete="on">
                                                                <option value="1" <?php if($testimonial->rating == 1){ echo 'selected';} ?>>1</option>
                                                                <option value="2" <?php if($testimonial->rating == 2){ echo 'selected';} ?>>2</option>
                                                                <option value="3" <?php if($testimonial->rating == 3){ echo 'selected';} ?>>3</option>
                                                                <option value="4" <?php if($testimonial->rating == 4){ echo 'selected';} ?>>4</option>
                                                                <option value="5" <?php if($testimonial->rating == 5){ echo 'selected';} ?>>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                        
                                                    </div>

                                                </div>
                                            </div>
                                            

                                            
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Status</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="status" id="status" required>
                                                          <option value="1" <?php if($testimonial->status=="1"){ echo "selected"; } ?>>Active</option>
                                                          <option value="0" <?php if($testimonial->status=="0"){ echo "selected"; } ?>>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group mb-0 row justify-content-end">
                                                <div class="col-md-9 float-end">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                     <button type="button" class="btn btn-danger waves-effect waves-light" onclick="window.history.back()">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<script>
    function category_slug_name(value)
    {
        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>admin_testimonial/get_testimonial_slug_name",
                data: {testimonial_name: value},
                async: false,
                success: function(data)
                {
                    //alert(data);
                    var slug=data.slug_name;
                    $("#testimonial_slug").val(slug);
                }
            });
    }

    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#upload_pic')
                    .attr('src', e.target.result)
                    .width(160)
                    .height(140);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script src="<?php echo base_url(); ?>assets/js/image_preview.js"></script>