<link href="<?php echo base_url(); ?>assets/css/image_preview.css" rel="stylesheet" />
<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Category</h4>
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_category') ?>" class="btn btn-info">Manage</a>
                            </h1>
                            </section>
                        </div>
                        <!--/Page-Header-->

                        <div class="row">                           
                            <!-- end col -->
                            <div class="col-xl-12">
                                 <?php message(); ?>
                                <div class="card m-b-20">
                                    <div class="card-header">
                                        <h3 class="card-title">Category Brand</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        <?php //print_ex($brand_detail);
                                        foreach ($category_detail as $category){  ?>
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_category/edit_category_submit" id="main" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="category_id" value="<?php echo $category->category_id; ?>">

                                          <!-- <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Parent Category</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="parent_category" id="parent_category" onchange="get_subcategory(this.value)">
                                                            <option value="0">Select</option>
                                                            <?php /*foreach ($parent_category_list as $parent_category) { ?>
                                                            <?php if(checkMenuList($parent_category->category_id)){ ?>
                                                            <option value="<?php echo $parent_category->category_id; ?>" <?php if($category->parent_category==$parent_category->category_id){ echo "selected"; }  ?>><?php echo getMenuList($parent_category->category_id);?></option>
                                                            <?php } } */?>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div> -->

                                            <div class="form-group ">
                                                 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Category Name <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                       <input type="text" class="form-control" name="category" id="category" required="" value="<?php echo $category->category_name; ?>" onkeyup="category_slug_name(this.value)" required>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Category Slug <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="category_slug" id="category_slug" value="<?php echo $category->category_slug; ?>" required >
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Category Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                       <textarea class="form-control no-resize" id="editor1" name="category_description" rows="5" cols="80"><?php echo $category->category_description; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Image <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="hid_image" value="<?php echo $category->category_image; ?>">
                                                        <?php 
                                                        $preview_image = '';
                                                        $currentUrl = base_url();  // Your current URL
                                                        // Use dirname to navigate one step back in the URL
                                                        $newUrl = dirname($currentUrl);
                                                        if($category->category_image!=""){ 
                                                            $preview_image = $newUrl.'/uploads/category/'.$category->category_image;
                                                            ?>
                                                          <img id="upload_pic" width="100" height="100" class="img-thumbnail" src="<?php echo base_url(); ?>../uploads/category/<?php echo $category->category_image; ?>" alt="no-image" onclick="showImagePreview()">
                                                        <?php } else{ 
                                                            $preview_image = $newUrl.'/camera_icon.png';
                                                            ?>
                                                        <img id="upload_pic" class="img-thumbnail" src="<?php echo base_url() ?>../camera_icon.png" alt="no-image" onclick="showImagePreview()">
                                                        <?php } ?>
                                                        <input type="file" name="img_upload" id="img_upload" onchange="readURL(this);" style="outline:none;margin-top:6px" >
                                                        <div id="imageModal" class="modal">
                                                        <div class="modal-content">
                                                            <span class="close" onclick="closeImagePreview()">&times;</span>
                                                            <img src="<?php echo $preview_image; ?>" alt="Full-size Image">
                                                        </div>
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
                                                        <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo $category->category_meta_title; ?>" placeholder="Meta Tag Title">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control no-resize" id="meta_description" name="meta_description" rows="3" cols="80" placeholder="Meta Tag Description"><?php echo $category->category_meta_description; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Keyword</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control no-resize" id="meta_keyword" name="meta_keyword" rows="3" cols="80" placeholder="Meta Tag Keyword"><?php echo $category->category_meta_keyword; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Sort Order <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="sort_order" id="sort_order" placeholder="Sort Order" value="<?php echo $category->category_sort_order; ?>" required>
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
                                                            <option value="active" <?php if($category->category_status=="active"){ echo "selected"; } ?>>Active</option>
                                                            <option value="inactive" <?php if($category->category_status=="inactive"){ echo "selected"; } ?>>Inactive</option>
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
function get_subcategory(value)
{
    var html='<option value="0">Select</option>';
    if(value>0)
    {
      $.ajax(
          {
              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>admin_category/get_subcategory",
              data: {category_id: value},
              async: false,
              success: function(data)
              {

                  //alert(data[0].category_id);
                  for(var i=0; i<data.length; i++)
                  {
                      html+='<option value="'+data[i].category_id+'">'+data[i].category_name+'</option>';
                  }
                  $("#sub_category").html(html);

              }
          });
    }
    else
    {
        $("#sub_category").html(html);
    }


}
</script>

<script>
    function category_slug_name(value)
    {
        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>admin_category/get_category_slug_name",
                data: {category_name: value},
                async: false,
                success: function(data)
                {
                    //alert(data);
                    var slug=data.slug_name;
                    $("#category_slug").val(slug);
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