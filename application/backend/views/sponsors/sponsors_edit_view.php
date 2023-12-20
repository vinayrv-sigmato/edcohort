<link href="<?php echo base_url(); ?>assets/css/image_preview.css" rel="stylesheet" />
<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Sponsors</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_sponsors') ?>" class="btn btn-info">Manage</a>
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
                                        <h3 class="card-title">Edit Sponsors</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        <?php //print_ex($sponsors_detail);
                                        foreach ($sponsors_detail as $sponsors){  ?>
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_sponsors/edit_sponsors_submit" method="post" enctype="multipart/form-data">
                                            <div class="form-group ">
                                                 <input type="hidden" name="sponsors_id" value="<?php echo @$sponsors->sponsors_id ?>">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">sponsors Name <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="sponsors_name" name="sponsors_name" value="<?php echo $sponsors->sponsors_name; ?>" placeholder="Enter Name" required onkeyup="category_slug_name(this.value)" required>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">sponsors Slug <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="sponsors_slug" id="sponsors_slug" placeholder="Slug" value="<?php echo $sponsors->sponsors_slug; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">sponsors Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea id="editor1" class="form-control no-resize" name="sponsors_description" rows="3" cols="80" placeholder="sponsors Description"><?php echo $sponsors->sponsors_description; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Image</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="hid_image" value="<?php echo $sponsors->sponsors_image; ?>">
                                                         <?php 
                                                         $preview_image = '';
                                                         $currentUrl = base_url();  // Your current URL
                                                         // Use dirname to navigate one step back in the URL
                                                         $newUrl = dirname($currentUrl);
                                                         if($sponsors->sponsors_image!=""){ 
                                                            $preview_image = $newUrl.'/uploads/sponsors/'.$sponsors->sponsors_image;
                                                            ?>
                                                          <img id="upload_pic" width="100" height="100" class="img-thumbnail" src="<?php echo base_url(); ?>../uploads/sponsors/<?php echo $sponsors->sponsors_image; ?>" alt="no-image" onclick="showImagePreview()">
                                                        <?php } else{  
                                                              $preview_image = $newUrl.'/camera_icon.png';
                                                            ?>
                                                        <img id="upload_pic" class="img-thumbnail" src="<?php echo base_url() ?>../camera_icon.png" alt="no-image" onclick="showImagePreview()">
                                                        <?php } ?>                                                        
                                                       <input type="file" name="img_upload" id="img_upload" onchange="readURL(this);" style="outline:none;margin-top:6px">
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
                                                        <label class="form-label" id="inputEmail3">Meta Tag Title</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo $sponsors->sponsors_meta_title; ?>" placeholder="Meta Tag Title">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control no-resize" id="meta_description" name="meta_description" rows="3" cols="80" placeholder="Meta Tag Description"><?php echo $sponsors->sponsors_meta_description; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Keyword</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control no-resize" id="meta_keyword" name="meta_keyword" rows="3" cols="80" placeholder="Meta Tag Keyword"><?php echo $sponsors->sponsors_meta_keyword; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Sort Order <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="sort_order" id="sort_order" placeholder="Sort Order" value="<?php echo $sponsors->sponsors_sort_order; ?>" required>
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
                                                          <option value="1" <?php if($sponsors->sponsors_status=="1"){ echo "selected"; } ?>>Active</option>
                                                          <option value="0" <?php if($sponsors->sponsors_status=="0"){ echo "selected"; } ?>>Inactive</option>
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
                url:"<?php echo base_url();?>admin_sponsors/get_sponsors_slug_name",
                data: {sponsors_name: value},
                async: false,
                success: function(data)
                {
                    //alert(data);
                    var slug=data.slug_name;
                    $("#sponsors_slug").val(slug);
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