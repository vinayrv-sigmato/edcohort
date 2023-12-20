<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Blog</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol>
                        </div>
                        <!--/Page-Header-->
						<?php //print_ex($blog_details); ?>
                        <div class="row">                           
                            <!-- end col -->
                            <div class="col-xl-12">
                                 <?php message(); ?>
                                <div class="card m-b-20">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Blog</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_blog/edit_blog_submit" method="post" enctype="multipart/form-data">
                                           <input type="hidden" name="blog_id" value="<?php echo @$blog_details['0']->blog_id; ?>">
                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Title</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="title" name="title" required onkeyup="category_slug_name(this.value)"  placeholder="Title" value="<?php echo @$blog_details['0']->blog_title; ?>" maxlength="50">
                                                        <input type="hidden" class="form-control" id="category_slug" name="blog_slug" value="<?php echo @$blog_details['0']->blog_slug; ?>"  placeholder="Slug" maxlength="50">
                                                    </div>
                                                </div>
                                            </div>


                                            
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                       <textarea class="form-control"  name="product_description" id="product_description"  rows="4"><?php echo @$blog_details['0']->blog_dec; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Image</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                      <input type="hidden" name="hid_image" value="<?php echo @$blog_details['0']->blog_image; ?>">
                                                        <?php if(@$blog_details['0']->blog_image!=""){ ?>
                                                          <img id="upload_pic" width="100" height="100" class="img-thumbnail" src="<?php echo base_url(); ?>../uploads/blog/<?php echo @$blog_details['0']->blog_image; ?>" alt="no-image">
                                                        <?php } else{  ?>
                                                        <img id="upload_pic" class="img-thumbnail" src="<?php echo base_url() ?>../camera_icon.png" alt="no-image">
                                                        <?php } ?>
                                                         <input type="file" name="img_upload" id="img_upload" onchange="readURL(this);" style="outline:none;margin-top:6px">
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Title</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo @$blog_details['0']->meta_title; ?>" placeholder="Meta Tag Title">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control no-resize" id="meta_description" value="<?php echo @$blog_details['0']->meta_description; ?>" name="meta_description" rows="3" cols="80" placeholder="Meta Tag Description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Keyword</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control no-resize" id="meta_keyword" name="meta_keyword" value="<?php echo @$blog_details['0']->meta_keyword; ?>" rows="3" cols="80" placeholder="Meta Tag Keyword"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Tag </label>
                                                    </div>
                                                    <div class="col-md-9">
                                                       <div class="bootstrap-tagsinput form-control">
                                                            <input type="text" name="tag" id="tag" data-role="tagsinput" value="<?php echo @$blog_details['0']->tag; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Category</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                       <div class=" w-100">
                                                       <?php $category = explode(",",$blog_details['0']->category); ?>
                                                        <select class="form-control select2 " name="cateory[]" id="category" data-bs-placeholder="Choose Browser" multiple>
                                                            <?php foreach($blog_cat_records as $cat_records){ ?>

                                                                <option value="<?php echo $cat_records->cat_title; ?>" <?php if(in_array($cat_records->cat_title,$category)){ echo "selected"; }?>><?php echo $cat_records->cat_title; ?></option>

                                                            <?php } ?>
                                                        </select>
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Brand</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                       <div class=" w-100">
                                                       <?php $brand = explode(",",$blog_details['0']->brand); ?>
                                                        <select class="form-control select2 " name="brand[]" id="brand" data-bs-placeholder="Choose Browser" multiple>
                                                            <?php foreach($brand_records as $record){ ?>

                                                                <option value="<?php echo $record->brand_name; ?>" <?php if(in_array($record->brand_name,$brand)){ echo "selected"; }?>><?php echo $record->brand_name; ?></option>

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
                                                        <select class="form-control" name="status" id="status">
                                                          <option value="1" <?php if(@$blog_details['0']->status=='1'){ echo "selected"; } ?>>Active</option>
                                                          <option value="0" <?php if(@$blog_details['0']->status=='0'){ echo "selected"; } ?>>Inactive</option>
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