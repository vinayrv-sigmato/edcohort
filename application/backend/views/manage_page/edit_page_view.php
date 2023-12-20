    <section class="content">
        <div class="container-fluid">
            <div class="row row-header">
                <div class="col-md-6">
                <h2>Manage Page <small>Edit Page</small></h2>
                </div>
                <div class="col-md-6"> </div>
            </div>
            <?php message(); ?>
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Page</h2>
                            
                        </div>
                        <div class="body">
                            <?php foreach ($page_details as $row){  ?>
                            <form class="form-horizontal" action="<?php echo base_url()?>admin_manage_page/page_edit_submit" id="main" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Slug</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input class="form-control" type="text" name="slug" id="slug" readonly="" value="<?php echo $row->slug; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Meta Title</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input class="form-control" type="text" name="meta_title" id="meta_title" required="" value="<?php echo $row->page_title; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Meta Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <textarea class="form-control" id="meta_description" name="meta_description" rows="2" cols="80"><?php echo $row->meta_description; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Meta Keyword</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <textarea class="form-control" id="meta_keyword" name="meta_keyword" rows="2" cols="80"><?php echo $row->meta_keyword; ?></textarea>
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
                                                <input class="form-control" type="text" name="canonical" id="canonical" placeholder="http://example.com/segment-1/segment-2/" value="<?php echo $row->canonical; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>                               
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect" onclick="return validate()">Submit</button>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <a href="<?php echo base_url()?>admin_manage_page" class="btn bg-red btn-block btn-lg waves-effect" style="">Cancel</a>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>
<script>
    function validate()
    {
        var slug=$('#slug').val();
        var title=$('#meta_title').val();

        if(title=="")
        {
            $("#meta_title").addClass("glowing-border-red");
            return false;
        }
        else
        {
            $("#meta_title").removeClass("glowing-border-red");
        }

        if(slug=="")
        {
            $("#slug").addClass("glowing-border-red");
            return false;
        }
        else
        {
            $("#slug").removeClass("glowing-border-red");
        }

    }
</script>

<script>
    function clear_form()
    {
         document.getElementById("main").reset();
    }
</script>
<script>
    function content_slug(value)
    {

        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>index.php/admin_content/get_content_slug_name",
                data: {content_name: value},
                async: false,
                success: function(data)
                {

                    var slug=data.slug_name;
                    $("#slug").val(slug);
                }
            });
    }
    </script>