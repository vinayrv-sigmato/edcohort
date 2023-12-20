    <section class="content">
        <div class="container-fluid">
            <div class="row row-header">
                <div class="col-md-6">
                <h2>Category <small>Add Category</small></h2>
                </div>
                <div class="col-md-6">                 
                   
                  
                </div>
            </div>
            <?php message(); ?>
            
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Category</h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="<?php echo base_url()?>admin_category/add_category_submit" id="main" method="post" enctype="multipart/form-data">
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Parent Category <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="No need to select any category to upload Parent Category"></i></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="parent_category" id="parent_category" onchange="get_subcategory(this.value)">
                                                    <option value="0">Select</option>
                                                    <?php foreach ($parent_category_list as $parent_category) { ?>
                                                    <?php if(checkMenuList($parent_category->category_id)){ ?>
                                                    <option value="<?php echo $parent_category->category_id; ?>"><?php echo getMenuList($parent_category->category_id);?></option>
                                                    <?php } } ?>
                                                </select>                                                 
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Category Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" required="" name="category" id="category" onkeyup="category_slug_name(this.value)">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Category Slug</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" name="category_slug" id="category_slug">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Category Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                               <textarea id="editor1" class="form-control no-resize" name="category_description" rows="3" cols="80"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Category Banner</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <img id="upload_pic" class="img-thumbnail" src="<?php echo base_url() ?>../camera_icon.png" alt="no-image">
                                            </div>                                            
                                            <input type="file" name="img_upload" id="img_upload" onchange="readURL(this);" style="outline:none;margin-top:6px">                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Meta Tag Title</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                               <input class="form-control" type="text" name="meta_title" id="meta_title">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Meta Tag Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                               <textarea class="form-control no-resize" id="meta_description" name="meta_description" rows="3" cols="80"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Meta Tag Keyword</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                               <textarea class="form-control no-resize" id="meta_keyword" name="meta_keyword" rows="3" cols="80"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Canonical</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input class="form-control" type="text" name="canonical" id="canonical" placeholder="http://example.com/segment-1/segment-2/">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Sort Order</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                               <input class="form-control" type="text" name="sort_order" id="sort_order">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Show In Menu</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <select class="form-control show-tick" name="show_menu" id="show_menu">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Status</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <select class="form-control" name="status" id="status">
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4  col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect">Submit</button>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <a href="<?php echo base_url()?>admin_category" class="btn bg-red btn-block btn-lg waves-effect" style="">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>
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