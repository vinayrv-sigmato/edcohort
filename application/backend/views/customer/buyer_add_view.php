<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Customer</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_customer') ?>" class="btn btn-info">Manage</a>
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
                                        <h3 class="card-title">Add Customer</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_customer/add_customer_submit" method="post" enccounselling="multipart/form-data">
                                            
                                             <?php $brand_id = $this->input->get('brand_id', TRUE); ?>

                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                    <label for="">Name <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input type="text" class="form-control" id="name" name="name" required placeholder="Name" maxlength="40">
                                                        </div>                                           
                                                    </div>
                                                </div>
                                            </div>

											<div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                    <label for="">Email <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input type="email" class="form-control" id="email" name="email" required placeholder="Email" maxlength="40">
                                                        </div>                                           
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                    <label for="">Phone <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input type="text" class="form-control" id="phone" name="phone" required placeholder="Phone" maxlength="10">
                                                        </div>                                           
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                    <label for="">Password <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input type="text" class="form-control" id="password" name="password" required placeholder="Password" maxlength="10">
                                                        </div>                                           
                                                    </div>
                                                    </div>
                                            </div>

                                            <div class="form-group ">
                                                <div class="row">
                                                   <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label">Role</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <select class="form-control" name="role_id" id="role_id"  onchange="doAction(this)"  required>
                                                          <?php foreach ($role_list as  $role) { ?>
                                                              <option value="<?php echo $role->role_id ?>"><?php echo $role->title ?></option>
                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group " id="role_div" style="display:none">
                                                <div class="row">
                                                   <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label">Brand</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <select class="form-control" name="brand_id" id="brand_id" >
                                                          <?php foreach ($brand_list as  $brand) { ?>
                                                              <option value="<?php echo $brand->brand_id ?>" <?php if($brand->brand_id == $brand_id){ echo 'selected="selected"';} ?> ><?php echo $brand->brand_name ?></option>
                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                           

                                            
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                                        <label class="form-label">Status</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                        <select class="form-control" name="status" id="status" required>
                                                          <option value="1" >Active</option>
                                                          <option value="0" >Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                           
                                            
                                           
                                            <div class="form-group mb-0 row justify-content-end">
                                                <div class="col-md-9 float-end">
                                                    <button counselling="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                     <button counselling="button" class="btn btn-danger waves-effect waves-light" onclick="window.history.back()">Cancel</button>
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
    
    

    function doAction(val){
        //Forward browser to new url
       
        var roleId = $('#role_id').val();

        if(roleId == 2){
             $("#role_div").show();
         }else{
          $("#role_div").hide();  
         }
       //alert(roleId);
        //window.location= base_url+'admin_counselling/add_counselling/'+getbrand+'?brand_id='+getbrand+'&create_for='+create_for+'';
       // window.location= base_url+'review/' +val+'?course_type='+course_type+'&class='+getclass+'';
    }
</script>