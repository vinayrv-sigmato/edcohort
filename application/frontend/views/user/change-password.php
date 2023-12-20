
<div class="breadcrumb ">  
   <div class="container">
    <div class="d-flex justify-content-between align-items-center">
    <div> <h2><span>Change Password </span></h2></div>
     <div><ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>" title="Back to the frontpage">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=""><?php echo $page_head; ?></a>
      </li>
    </ul></div>
     </div>
   </div>
</div>

<?php echo message(); ?>

<section class="section-top-inner change-password-page">

  <div class="container">

    <div class="row">

      <?php $this->load->view('common/sidebar'); ?>

      <div class="col-lg-9">

        <form class="form-horizontal" action="<?php echo base_url(); ?>update-password" id="profile_form" method="post">
          <div class="card">
            <div class="card-header">Password Change </div>
            <div class="panel-body">
              <?php echo csrf_field(); ?>
              <div class="card-body">                    
                <div class="form-group">
                  <div class="row">
                    <label for="inputEmail3" class="col-sm-3 control-label">Current Password*</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control radius-flat" name="oldpassword" id="oldpassword" required >
                    </div>
                  </div>
                </div>
                <div class="form-group">
                   <div class="row">
                    <label for="inputEmail3" class="col-sm-3 control-label">New Password*</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control radius-flat" name="newpassword" id="newpassword" required >
                    </div>
                   </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label for="inputEmail3" class="col-sm-3 control-label">Confirm Password*</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control radius-flat" name="cnfpassword" id="cnfpassword" required >
                    </div>
                    </div>
                </div> 
                <div class="form-group">
                  <div class="col-md-12">                      
                    <div class="text-danger" id="password_message"></div>
                  </div>
                </div>                 
              </div>            
            </div>
            <div class="card-footer">
              <button type="submit" class="btn-orange" onclick="return validateEditPassword()">Update</button>
              <button type="button" class="secondary-btn" onclick="window.history.back()">Cancel</button>
            </div>
          </div>
        </form>

      </div>

    </div>

  </div>

</section>





