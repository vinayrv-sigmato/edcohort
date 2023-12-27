<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Add Compare Data</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_compare') ?>" class="btn btn-info">Manage</a>
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
                                        <h3 class="card-title">Add Compare</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_compare/edit_compare_submit" method="post" enctype="multipart/form-data">
                                        <?php
                                        if($compare_detail)
                                        {
                                         foreach ($compare_detail as $compare){  
                                            ?>
                                            <?php 
                                                        $resp_get_seg_list = '';
                                                        $resp_get_seg_list = getSegmentList();
                                                    ?>   

                                                <input type="hidden" value="<?php echo $compare->id; ?>" name="id" id="id">
                                             <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Select Segement  <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="segment" id="segment" onchange="" required>
                                                            <option value="0">Select</option>
                                                              <?php if($resp_get_seg_list){ ?>
                                                            <?php foreach ($resp_get_seg_list as $r) { ?>
                                                            <option value="<?php echo $r->id; ?>" <?php if($r->id == $compare->segment_id){ echo 'selected="selected"';} ?>><?php echo $r->segment_name ;?></option>
                                                            <?php } } ?>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div>


                                            <?php 
                                                        $resp_get_brand_list = '';
                                                        $get_all_brand = get_all_brand();
                                                        
                                                    ?>   
                                             <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Select Brand  <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="brand" id="brand" onchange="" required>
                                                            <option value="0">Select</option>
                                                              <?php if($get_all_brand){ ?>
                                                            <?php foreach ($get_all_brand as $r) { ?>
                                                            <option value="<?php echo $r->brand_id;?>" <?php if($r->brand_id == $compare->brand_id){ echo 'selected="selected"';} ?>><?php echo $r->brand_name;?></option>
                                                            <?php } } ?>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div>

                                            <?php 
                                               $resp_num_list = get_num_list(); 
                                               
                                            ?>                           
                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Select Aging of Co.  <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="aging" id="aging" onchange="" required>
                                                            <option value="0">Select</option>
                                                              <?php if($resp_num_list){ ?>
                                                            <?php foreach ($resp_num_list as $r) { ?>
                                                            <option value="<?php echo $r->id; ?>" <?php if($r->id == $compare->aging){ echo 'selected="selected"';} ?>><?php echo $r->value ;?></option>
                                                            <?php } } ?>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Select Over All Brand  <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ov_brand" id="ov_brand" onchange="" required>
                                                            <option value="0">Select</option>
                                                              <?php if($resp_num_list){ ?>
                                                            <?php foreach ($resp_num_list as $r) { ?>
                                                            <option value="<?php echo $r->id; ?>" <?php if($r->id == $compare->overall_brand){ echo 'selected="selected"';} ?> ><?php echo $r->value ;?></option>
                                                            <?php } } ?>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                               $resp_grade_list = get_grade_list(); 
                                               
                                            ?>                         
                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Select Faculty Quality  <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="faculty_quality" id="faculty_quality" onchange="" required>
                                                            <option value="0">Select</option>
                                                              <?php if($resp_grade_list){ ?>
                                                            <?php foreach ($resp_grade_list as $r) { ?>
                                                            <option value="<?php echo $r->id; ?>" <?php if($r->id == $compare->faculty_quality){ echo 'selected="selected"';} ?> ><?php echo $r->value ;?></option>
                                                            <?php } } ?>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Select Course Quality <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="course_quality" id="course_quality" onchange="" required>
                                                            <option value="0">Select</option>
                                                              <?php if($resp_num_list){ ?>
                                                            <?php foreach ($resp_num_list as $r) { ?>
                                                            <option value="<?php echo $r->id; ?>" <?php if($r->id == $compare->course_quality){ echo 'selected="selected"';} ?>><?php echo $r->value ;?></option>
                                                            <?php } } ?>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Select Academic Quality Result  <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="acadmic_quality" id="acadmic_quality" onchange="" required>
                                                            <option value="0">Select</option>
                                                              <?php if($resp_grade_list){ ?>
                                                            <?php foreach ($resp_grade_list as $r) { ?>
                                                            <option value="<?php echo $r->id; ?>" <?php if($r->id == $compare->acadmic_quality){ echo 'selected="selected"';} ?>><?php echo $r->value ;?></option>
                                                            <?php } } ?>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Select Referal Score <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="referal_score" id="referal_score" onchange="" required>
                                                            <option value="0">Select</option>
                                                              <?php if($resp_num_list){ ?>
                                                            <?php foreach ($resp_num_list as $r) { ?>
                                                            <option value="<?php echo $r->id; ?>" <?php if($r->id == $compare->referal_score){ echo 'selected="selected"';} ?>><?php echo $r->value ;?></option>
                                                            <?php } } ?>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Complaint Score <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="complaint_score" value ="<?php echo $compare->complaint_score; ?>"name="complaint_score" placeholder="Enter Complaint Score" required onkeyup="category_slug_name(this.value)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Select Market Reputation  <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="market_repu" id="market_repu" onchange="" required>
                                                            <option value="0">Select</option>
                                                              <?php if($resp_grade_list){ ?>
                                                            <?php foreach ($resp_grade_list as $r) { ?>
                                                            <option value="<?php echo $r->id; ?>" <?php if($r->id == $compare->market_reputation){ echo 'selected="selected"';} ?>><?php echo $r->value ;?></option>
                                                            <?php } } ?>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Select Edcohort Rating<span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="edcohort_rating" id="edcohort_rating" onchange="" required>
                                                            <option value="0">Select</option>
                                                              <?php if($resp_grade_list){ ?>
                                                            <?php foreach ($resp_grade_list as $r) { ?>
                                                            <option value="<?php echo $r->id; ?>" <?php if($r->id == $compare->edcohort_rating){ echo 'selected="selected"';} ?>><?php echo $r->value ;?></option>
                                                            <?php } } ?>
                                                        </select>  
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Select Student Rating <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="student_rating" id="student_rating" onchange="" required>
                                                            <option value="0">Select</option>
                                                              <?php if($resp_num_list){ ?>
                                                            <?php foreach ($resp_num_list as $r) { ?>
                                                            <option value="<?php echo $r->id; ?>" <?php if($r->id == $compare->student_rating){ echo 'selected="selected"';} ?>><?php echo $r->value ;?></option>
                                                            <?php } } ?>
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
                                                        <select class="form-control" name="status" id="status" required>
                                                        <option value="active" <?php if ($compare->status==1) { echo 'selected'; } ?> >Active</option>
                                                            <option value="inactive" <?php if ($compare->status==2) { echo 'selected'; } ?>>Inactive</option>
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
                                        <?php } } ?>
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
                    $("#segment_slug").val(slug);
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