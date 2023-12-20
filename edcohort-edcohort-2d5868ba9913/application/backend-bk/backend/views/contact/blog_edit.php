  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Blog Edit</small>
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
              
            <form class="form-horizontal" action="<?php echo base_admin(); ?>blog/edit_blog_submit" method="post">
            <?php echo csrf_field(); ?>
              <div class="box-body">
              <div class="row col-sm-8">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-1 text-bold">:-</div>
                  <div class="col-sm-8">
                  <input type="hidden" name="blog_id" value="<?php echo @$blog_details['0']->blog_id; ?>">
                    <input type="text" class="form-control" id="title" name="title" required placeholder="Title" value="<?php echo @$blog_details['0']->blog_title; ?>" maxlength="50" onkeyup="category_slug_name(this.value)">
                    <input type="text" class="form-control" name="blog_slug" id="category_slug" value="<?php echo @$blog_details['0']->blog_slug; ?>" >
                  </div>
                  
                  
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Content</label>
                  <div class="col-sm-1 text-bold">:-</div>
                  <div class="col-sm-8">
                 	  <?php
							   	if(@$blog_details['0']->blog_dec)
								{
									$display = @$blog_details['0']->blog_dec;
							   ?>
                               
							   <?php echo $this->ckeditor->editor('description',$display);?> 
							   
							   <?php
								} else {
							   ?>
                               
                        <?php echo $this->ckeditor->editor('description'); ?>
                               
							   <?php } ?>
                               
							   <?php echo form_error('description','<p class="error">'); ?>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Banner</label>
                  <div class="col-sm-1 text-bold">:-</div>
                  <div class="col-sm-8">
                    <input type="hidden" name="hid_image" value="<?php echo @$blog_details['0']->blog_image; ?>">
                        <?php if(@$blog_details['0']->blog_image!=""){ ?>
                          <img id="upload_pic" width="100" height="100" class="img-thumbnail" src="<?php echo base_url(); ?>uploads/blog/<?php echo @$blog_details['0']->blog_image; ?>" alt="no-image">
                        <?php } else{  ?>
                        <img id="upload_pic" class="img-thumbnail" src="<?php echo base_url() ?>assets/front/camera_icon.png" alt="no-image">
                        <?php } ?>
                         <input type="file" name="img_upload" id="img_upload" onchange="readURL(this);" style="outline:none;margin-top:6px">
                  </div>
                </div>
                              
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-1 text-bold">:-</div>
                  <div class="col-sm-8">
                  <select class="form-control" name="status" id="status">
                    <option value="1" <?php if(@$blog_details['0']->status=='1'){ echo "selected"; } ?>>Active</option>
                    <option value="0" <?php if(@$blog_details['0']->status=='0'){ echo "selected"; } ?>>Inactive</option>
                  </select>
                  </div>
                </div>
              </div>
                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <div class="col-md-8">
                <button type="button" class="btn btn-danger btn-flat col-sm-1" onclick="window.history.back()">Cancel</button>
                <button type="submit" class="btn btn-primary btn-flat col-sm-1 pull-right">Save</button>
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