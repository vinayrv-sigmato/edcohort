<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Class</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_class') ?>" class="btn btn-info">Manage</a>
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
                                        <h3 class="card-title">Edit Class</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        <?php //print_ex($class_detail);
                                        foreach ($class_detail as $class){  ?>
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_class/edit_class_submit" method="post" enctype="multipart/form-data">
                                            <div class="form-group ">
                                                 <input type="hidden" name="class_id" value="<?php echo @$class->class_id ?>">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Class Name <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="class_name" name="class_name" value="<?php echo $class->title; ?>" placeholder="Enter Name" required onkeyup="category_slug_name(this.value)" required>
                                                    </div>
                                                </div>
                                            </div>

                                          <!--  <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Parent</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="parent_id" id="parent_id" >
                                                          <option value="0" >Select</option>
                                                          <?php/* foreach($parent_list as $parent){ ?> 
                                                          <option value="<?php echo $parent->class_id; ?>" <?php if($parent->class_id == $class->class_id){ echo "selected"; } ?> ><?php echo $parent->title; ?></option>
                                                          <?php } */?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> -->

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Status</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="status" id="status" required>
                                                          <option value="1" <?php if($class->status=="1"){ echo "selected"; } ?>>Active</option>
                                                          <option value="0" <?php if($class->status=="0"){ echo "selected"; } ?>>Inactive</option>
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
                url:"<?php echo base_url();?>admin_class/get_class_slug_name",
                data: {class_name: value},
                async: false,
                success: function(data)
                {
                    //alert(data);
                    var slug=data.slug_name;
                    $("#class_slug").val(slug);
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