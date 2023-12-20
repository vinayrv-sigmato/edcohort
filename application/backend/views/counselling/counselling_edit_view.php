<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Counselling</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_counselling') ?>" class="btn btn-info">Manage</a>
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
                                        <h3 class="card-title">Edit Counselling</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        <?php //print_ex($type_detail);
                                        foreach ($counselling_detail as $counsel){  ?>
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_counselling/edit_counselling_submit" method="post" enctype="multipart/form-data">
                                             <?php $brand_id = $this->input->get('brand_id', TRUE);
											 	 $con_id =$this->uri->segment(3); 
											  ?>
                                             
                                                 <input type="hidden" name="c_id" id="c_id" value="<?php echo @$counsel->c_id ?>">
                                                 
                                            <?php if(empty($brand_id)){ ?>    
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Brand <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="brand_id" id="brand_id" onChange="doAction(this.value);" required>
                                                          <?php foreach ($brand_list as  $brand) { ?>
                                                              <option value="<?php echo $brand->brand_id ?>" <?php if($brand->brand_id == $counsel->brand_id){ echo 'selected="selected"';} ?> ><?php echo $brand->brand_name ?></option>
                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }else{ ?>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Brand <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="brand_id" id="brand_id" onChange="doAction(this.value);" required>
                                                          <?php foreach ($brand_list as  $brand) { ?>
                                                              <option value="<?php echo $brand->brand_id ?>" <?php if($brand->brand_id == $brand_id){ echo 'selected="selected"';} ?> ><?php echo $brand->brand_name ?></option>
                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Class <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="class_id" id="class_id" required>
                                                          <?php foreach ($class_list as  $class) { ?>
                                                              <option value="<?php echo $class->class_id ?>" <?php if($class->class_id == $counsel->class_id){ echo 'selected="selected"';} ?>><?php echo $class->title ?></option>
                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">User <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="user_id" id="user_id" required>
                                                          <?php foreach ($customer_list as  $customer) { ?>
                                                              <option value="<?php echo $customer->customer_id ?>" <?php if($customer->customer_id == $counsel->user_id){ echo 'selected="selected"';} ?>><?php echo $customer->firstname ?></option>
                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Status</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="c_status" id="c_status" required>
                                                          <option value="1" <?php if($counsel->c_status == 1){ echo 'selected="selected"';} ?>>Active</option>
                                                          <option value="0" <?php if($counsel->c_status == 0){ echo 'selected="selected"';} ?>>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Date <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <?php echo date('d-m-Y',strtotime($counsel->c_date)); ?>
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <div class="input-group-text timepicker1">
                                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                                </div>
                                                            </div><input class="form-control fc-datepicker" name="date" value ='<?php echo $counsel->c_date; ?>' placeholder="MM/DD/YYYY" type="text" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Time Start <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <?php echo  date('h:i A',strtotime($counsel->start_time)); ?>
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <div class="input-group-text timepicker1">
                                                                    <i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
                                                                </div>
                                                            </div><!-- input-group-text -->
                                                            <input class="form-control" id="tpBasic"  value ='<?php echo $counsel->start_time; ?>'  name="start_time" type="text" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

											<div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Time End <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <?php echo date('h:i A',strtotime($counsel->end_time)); ?>
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <div class="input-group-text timepicker1">
                                                                    <i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
                                                                </div>
                                                            </div><!-- input-group-text -->
                                                            <input class="form-control" id="tpBasic1" value ='<?php echo $counsel->end_time; ?>'  placeholder="Set time" name="end_time" type="text" required>
                                                        </div>
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
                url:"<?php echo base_url();?>admin_type/get_type_slug_name",
                data: {type_name: value},
                async: false,
                success: function(data)
                {
                    //alert(data);
                    var slug=data.slug_name;
                    $("#type_slug").val(slug);
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
	
	 function doAction(val){
        //Forward browser to new url
       
        var getbrand = $('#brand_id').val();
		var conid = $('#c_id').val();

        window.location= base_url+'admin_counselling/edit_counselling/'+conid+'?brand_id='+getbrand+'';;
       // window.location= base_url+'review/' +val+'?course_type='+course_type+'&class='+getclass+'';
    }
</script>