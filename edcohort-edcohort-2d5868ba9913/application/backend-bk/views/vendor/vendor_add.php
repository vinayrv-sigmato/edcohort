    <section class="content">
        <div class="container-fluid">
            <div class="row row-header">
                <div class="col-md-6">
                <h2>Vendor <small>Add Vendor</small></h2>
                </div>
                <div class="col-md-6">                 
                </div>
            </div>
            <?php message(); ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Vendor</h2>                            
                        </div>
                        <div class="body">
                          <form class="form-horizontal" action="<?php echo base_url(); ?>admin_vendor/add_vendor_submit" method="post">                              
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Company Name <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" id="company" name="company" required placeholder="Company Name" maxlength="40">
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Sales Person <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" id="name" name="name" required placeholder="Sales Person" maxlength="40">
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
                                        <label for="">Website <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" id="website" name="website" required placeholder="Website" maxlength="40">
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
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Group <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" name="group[]" id="group" readonly="" value="Diamond">
                                               <!--  <select class="form-control select2" data-placeholder="Select Group" multiple="multiple" name="group[]" id="group" required onchange="show_new_group(this.value)">
                                                  <?php foreach ($group_list as $group): ?>
                                                    <option value="<?php echo $group->CD_VENDOR_GROUP_ID; ?>" ><?php echo $group->SN_VENDOR_GROUP_NAME; ?></option>
                                                  <?php endforeach ?> 
                                                </select> -->
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix" id="new_group_div" style="display: none">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">New Group * <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" id="new_group" name="new_group"  placeholder="New Group" maxlength="20">
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                               <!--  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Markup% <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" id="markup" name="markup" required placeholder="Markup %" maxlength="10">
                                            </div>                                           
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Status <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
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
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4  col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <!-- <a href="<?php echo base_url()?>admin_options" class="btn bg-red btn-block btn-lg waves-effect" style="">Cancel</a> -->
                                        <button type="button" class="btn bg-red btn-block btn-lg waves-effect" onclick="window.history.back()">Cancel</button>
                                    </div>
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
    function show_new_group(value) 
    {
      //alert(value);
      if(value=='0')
      {
        $("#new_group_div").show();
      }
      else
      {
        $("#new_group_div").hide();
      }
    }
  </script>