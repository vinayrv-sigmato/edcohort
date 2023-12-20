<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Blog</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_blog') ?>" class="btn btn-info">Manage</a>
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
                                        <h3 class="card-title">Add Blog </h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_blog/add_blog_submit" method="post" enctype="multipart/form-data">
                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Title <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="title" name="title" required onkeyup="category_slug_name(this.value)"  placeholder="Title" maxlength="50">
                                                     <input type="hidden" class="form-control" id="category_slug" name="blog_slug"  placeholder="Slug" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>


                                            
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                       <textarea class="form-control"  name="product_description" id="product_description"  rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Image <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <img id="upload_pic" class="img-thumbnail" src="<?php echo base_url() ?>../camera_icon.png" alt="no-image">
                                                        <input type="file" name="img_upload" id="img_upload" onchange="readURL(this);" style="outline:none;margin-top:6px" required>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Title</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Tag Title">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control no-resize" id="meta_description" name="meta_description" rows="3" cols="80" placeholder="Meta Tag Description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Keyword</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control no-resize" id="meta_keyword" name="meta_keyword" rows="3" cols="80" placeholder="Meta Tag Keyword"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Tag</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                       <div class="bootstrap-tagsinput form-control">
                                                            <input type="text" value="" name="tag" id="tag" data-role="tagsinput" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Category <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                       <div class=" w-100">
                                                        <select class="form-control select2 " name="cateory[]" id="category" data-bs-placeholder="Choose Browser" multiple required >
                                                            <?php foreach($blog_cat_records as $cat_records){ ?>

                                                                <option value="<?php echo $cat_records->cat_title; ?>"><?php echo $cat_records->cat_title; ?></option>

                                                            <?php } ?>
                                                        </select>
													   </div>
                                                    </div>
                                                </div>
                                            </div>

											
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Brand <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                       <div class=" w-100">
                                                        <select class="form-control select2 " name="brand[]" id="brand" data-bs-placeholder="Choose Browser" multiple required>
                                                            <?php foreach($brand_records as $records){ ?>

                                                                <option value="<?php echo $records->brand_name; ?>"><?php echo $records->brand_name; ?></option>

                                                            <?php } ?>
                                                        </select>
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
                                                          <option value="1" >Active</option>
                                                          <option value="0" >Inactive</option>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<script>
    CKEDITOR.replace( 'product_description' );
</script>

<script>
    function category_slug_name(value)
    {
        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>admin_brand/get_brand_slug_name",
                data: {brand_name: value},
                async: false,
                success: function(data)
                {
                    //alert(data);
                    var slug=data.slug_name;
                    $("#brand_slug").val(slug);
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

