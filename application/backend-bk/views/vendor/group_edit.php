  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vendor Management
        <small>Group Edit</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-12">
          <div class="box box-primary">
            <div class="box-header">
              <!-- <h3 class="box-title">Hover Data Table</h3> -->
            </div>
            <!-- /.box-header -->          
              
            <form class="form-horizontal" action="<?php echo base_admin(); ?>vendor/edit_group_submit" method="post">
            <?php echo csrf_field(); ?>
              <div class="box-body">
                <div class="row col-sm-8">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Group Name</label>
                    <div class="col-sm-1 text-bold">:-</div>
                    <div class="col-sm-8">
                      <input type="hidden" name="group_id" value="<?php echo @$group_details['0']->CD_VENDOR_GROUP_ID; ?>">
                      <input type="text" class="form-control" id="name" name="name" required placeholder="Group Name" value="<?php echo @$group_details['0']->SN_VENDOR_GROUP_NAME; ?>" maxlength="15">
                    </div>
                  </div>              
                  
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <div class="col-md-8">
                <button type="button" class="btn btn-danger btn-flat col-sm-1" onclick="window.history.back()">Cancel</button>
                <button type="submit" class="btn btn-primary btn-flat pull-right col-sm-1">Save</button>
              </div>
                
              </div>
              <!-- /.box-footer -->
            </form>          
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->