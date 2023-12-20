
<style>/*
#pagination-div-id .active {
    background:#2a3f54 !important;
    color: #fff;
    cursor: pointer;
    margin: 2px;
    text-decoration: none;
}
.footer-div{
    
    padding: 10px;
}
.footer-div button{
    text-align: center;
    padding-left: 10px;
}*/
</style>

   

             
        <div class="col-md-9 col-sm-9 col-lg-9 col-12">   
    <!-- Main content -->
     <h1 class="aside-heading">
      
        <small>Edit Profile</small>
      </h1>
              <?php echo $this->session->flashdata('update_message');?>
    <form class="form-horizontal" action="<?php echo base_url('update-profile'); ?>" method="post">
            <?php echo csrf_field(); ?>
              <div class="box-body">
              <div class="">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Full Name *</label>
                  <div class="col-sm-1 text-bold">:-</div>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="userfullname" id="userfullname" value="<?php echo $vendor_list['0']->NM_USER_FULLNAME ;?>"  required placeholder="Contact Name" maxlength="40">
                  </div>
                </div>
                  
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Phone No*</label>
                  <div class="col-sm-1 text-bold">:-</div>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="phone" id="phone" onkeypress="return event.charCode >=8 && event.charCode <=57" value="<?php echo $vendor_list['0']->SN_USER_MOBILE ;?>"  required placeholder="Phone" maxlength="13">
                  </div>
                </div>
                  

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email*</label>
                  <div class="col-sm-1 text-bold">:-</div>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" value="<?php echo $vendor_list['0']->NM_USER_EMAIL ;?>" name="email" required placeholder="Email" maxlength="40">
                  
                    <button type="submit" class="btn button-additional button-small font-additional font-weight-normal text-uppercase hvr-rectangle-out hover-focus-bg before-bg margin-15">Update</button>
                   <button type="button" class="btn btn-danger button-additional button-small font-additional font-weight-normal text-uppercase hvr-rectangle-out hover-focus-bg before-bg  margin-15 pull-right color-red" onclick="window.history.back()">Cancel</button>

                  </div>

                </div>
                
                
                
<!--                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password *</label>
                  <div class="col-sm-1 text-bold">:-</div>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" value="<?php/* echo $vendor_list['0']->USER_PASSWORD ;*/?>" id="password" name="password" required placeholder="Password">
                  </div>
                </div>-->
                
               

              </div>
                
                
              </div>
              <!-- /.box-body -->
            
              <!-- /.box-footer -->
            </form>    
          

    <!-- /.content -->
</div>  
          

    
 <!-- STYLESWITCHER - REMOVE -->
<!-- REVOLUTION SLIDER -->

</div>

    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->