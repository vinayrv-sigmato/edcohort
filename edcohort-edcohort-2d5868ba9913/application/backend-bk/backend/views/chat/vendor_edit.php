    <section class="content">
        <div class="container-fluid">
            <div class="row row-header">
                <div class="col-md-6">
                <h2>Chat Vendor <small>Edit Vendor</small></h2>
                </div>
                <div class="col-md-6">                 
                   
                  
                </div>
            </div>
            <?php message(); ?>
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Chat Vendor</h2>                            
                        </div>
                        <div class="body">
                          <form class="form-horizontal" action="<?php echo base_url(); ?>admin_chat/edit_vendor_submit" enctype="multipart/form-data" method="post">
            
                            <input type="hidden" name="vendor_id" value="<?php echo @$vendor_details['0']->CD_USER_ID ?>">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Name<span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" id="name" name="name" required value="<?php echo @$vendor_details['0']->NM_USER_FULLNAME ?>" placeholder="Name" maxlength="40">
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
                                                <input type="email" class="form-control" id="email" disabled name="email" value="<?php echo @$vendor_details['0']->NM_USER_EMAIL ?>" required placeholder="Email" maxlength="40">
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Password </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" id="password" name="password" placeholder="Password" maxlength="10">
                                                <p class="help-block text-red text-bold">* Leave Blank In Case you Don't Want to Change It!</p>
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Status * <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <select class="form-control" name="status" id="status">
                                                  <option value="1" <?php if(@$vendor_details['0']->FL_USER_ACTIVE=="1"){ echo "selected"; } ?>>Active</option>
                                                    <option value="0" <?php if(@$vendor_details['0']->FL_USER_ACTIVE=="0"){ echo "selected"; } ?>>Inactive</option>
                                                </select>
                                            </div>                                           
                                        </div>
                                    </div>
                                </div> 
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Profile Pic</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <?php if(@$vendor_details['0']->profile_pic!=""){
                                                ?>
                                                <img src="../../../uploads/chat/profile/<?php echo $vendor_details['0']->profile_pic; ?>" class="img-fluid" width="100px">
                                                <?php
                                                 }?>
                                                 <input type="file" name="userfile" class="form-control">
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
