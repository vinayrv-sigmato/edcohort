<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Upload Customer</h4>
                           <!--  <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol> -->
                        </div>
                        <!--/Page-Header-->

                        <div class="row">                           
                            <!-- end col -->
                            <div class="col-xl-12">
                                 <?php message(); ?>
                                <div class="card m-b-20">
                                    <div class="card-header">
                                        <h3 class="card-title">Upload Customer</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        

                                            <div class="row clearfix">
                                              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                  <div class="header">
                                                    <span class="header_span">Upload Your Data File</span>
                                                   
                                                    <small> Accepted Format .csv | .xlsx</small>
                                                  </div>
                                                  <div class="body">
                                                    <div class="col-12">
                                                      <div class="col-md-9">
                                                        <form action="<?php echo base_url(); ?>admin_customer/upload_customer_submit" enctype="multipart/form-data" method="post" accept-charset="utf-8"> <?php echo csrf(); ?> <div class="form-group form-design">
                                                            <label class="control-label col-md-3 col-sm-3 col-12">Select Your File</label>
                                                            <div class="col-md-9 col-sm-9 col-12">
                                                              <input type="file" name="userfile" required="">
                                                            </div>
                                                          </div>
                                                          <div class="form-group form-design">
                                                            <label class="control-label col-md-3 col-sm-3 col-12">Select Option</label>
                                                            <div class="col-md-9 col-sm-9 col-12">
                                                              <input type="radio" value="AddUpload" id="AddUpload" name="replace_all[]" class="flat" checked>
                                                              <label for="AddUpload">Add &amp; Update:</label>
                                                            </div>
                                                          </div>
                                                          <button class="btn bg-teal waves-effect" type="submit">Upload File</button>
                                                        </form>
                                                      </div>
                                                      
                                                    </div>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

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