    <section class="content">
        <div class="container-fluid">
            <div class="row row-header">
                <div class="col-md-6">
                <h2>Add Testimonial <small>Add Testimonial</small></h2>
                </div>6
                <div class="col-md-6">                 
                   
                  
                </div>
            </div>
            <?php message(); ?>
            
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Testimonial</h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="<?php echo base_url()?>admin_testimonial/add_testimonial_submit" id="main" method="post" enctype="multipart/form-data">
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" required="" name="name" id="name" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Testimonial</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                               <textarea id="editor1" class="form-control no-resize" name="testimonial" rows="3" cols="80"></textarea>
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
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
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