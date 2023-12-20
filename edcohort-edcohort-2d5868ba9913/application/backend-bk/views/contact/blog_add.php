  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Add Blog</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-12">
          <div class="box box-primary">
            <div class="box-header">
              <!-- <h3 class="box-title">Hover Data Table</h3> -->
            </div>
            <!-- /.box-header -->          
              
            <form class="form-horizontal" action="<?php echo base_admin(); ?>blog/add_blog_submit" enctype="multipart/form-data" method="post">
            <?php echo csrf_field(); ?>
              <div class="box-body">
              <div class="row col-sm-8">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-1 text-bold">:-</div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="title" name="title" required onkeyup="category_slug_name(this.value)"  placeholder="Title" maxlength="50">
                    <input type="hidden" class="form-control" id="category_slug" name="blog_slug"  placeholder="Slug" maxlength="50">
                  </div>
                </div>  

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Content</label>
                  <div class="col-sm-1 text-bold">:-</div>
                  <div class="col-sm-8">
                    <?php echo $this->ckeditor->editor('blog_dec');?> 
                    <?php echo form_error('blog_dec','<p class="error">'); ?>
                  </div>
                </div> 

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Banner</label>
                  <div class="col-sm-1 text-bold">:-</div>
                  <div class="col-sm-8">
                    <img id="upload_pic" class="img-thumbnail" src="<?php echo base_url() ?>assets/front/camera-icon.png" width="100px";  alt="no-image">
                    <input type="file" name="img_upload" id="img_upload" onchange="readURL(this);" style="outline:none;margin-top:6px">
                  </div>
                </div>
                        
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-1 text-bold">:-</div>
                  <div class="col-sm-8">
                  <select class="form-control" name="status" id="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                  </div>
                </div>
              </div>
                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <div class="col-md-8">
                <button type="button" class="btn btn-danger btn-flat col-sm-1" onclick="window.history.back()">Cancel</button>
                <button type="submit" class="btn btn-primary pull-right btn-flat col-sm-1">Add</button>
              </div>
                
              </div>
              <!-- /.box-footer -->
            </form>          
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">

     function category_slug_name(value)
    {
        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>admin/blog/get_blog_slug_name",
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