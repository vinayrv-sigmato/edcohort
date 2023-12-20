<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Customer</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol>
                        </div>
                        <!--/Page-Header-->

                        <div class="row">                           
                            <!-- end col -->
                            <div class="col-xl-6">
                                 <?php message(); ?>
                                <div class="card m-b-20">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_customer/edit_customer_submit" method="post">
                                            <div class="form-group ">
                                                 <input type="hidden" name="customer_id" value="<?php echo @$customer_detail['0']->customer_id ?>">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo@$customer_detail['0']->firstname; ?>"   placeholder="Enter Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Email</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="email" id="email" name="email" value="<?php echo@$customer_detail['0']->email; ?>" required class="form-control" placeholder="Email" >
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Phone</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo@$customer_detail['0']->phone; ?>" required  placeholder="Phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Password</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>                                            
                                           
                                            <div class="form-group ">
                                                <div class="row">
                                                   <div class="col-md-3">
                                                        <label class="form-label">Role</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="role_id" id="role_id"  onchange="doAction(this)"  required>
                                                          <?php foreach ($role_list as  $role) { ?>
                                                              <option value="<?php echo $role->role_id ?>" <?php if(@$customer_detail['0']->customer_type==$role->role_id){ echo "selected"; } ?>><?php echo $role->title ?></option>
                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group " id="role_div" <?php if(@$customer_detail['0']->customer_type != 2){ ?> style="display:none" <?php }?>>
                                                <div class="row">
                                                   <div class="col-md-3">
                                                        <label class="form-label">Brand</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="brand_id" id="brand_id" required>
                                                          <?php foreach ($brand_list as  $brand) { ?>
                                                              <option value="<?php echo $brand->brand_id ?>" <?php if($brand->brand_id == @$customer_detail['0']->brand_id){ echo 'selected="selected"';} ?> ><?php echo $brand->brand_name ?></option>
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
                                                        <select class="form-control" name="status" id="status" required>
                                                          <option value="1" <?php if(@$customer_detail['0']->status=="1"){ echo "selected"; } ?>>Active</option>
                                                          <option value="0" <?php if(@$customer_detail['0']->status=="0"){ echo "selected"; } ?>>Inactive</option>
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