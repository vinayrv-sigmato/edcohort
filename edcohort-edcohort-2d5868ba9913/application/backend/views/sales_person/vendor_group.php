  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vendor Management
        <small>Vendor Group</small>
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
              <a href="<?php echo base_admin(); ?>vendor/add_group" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-plus"></i> Add Group</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">              
                <div class="row">
                  <div class="col-sm-12 table-responsive">
                    <table id="example2" class="table table-bordered table-hover table-condensed table-responsive dataTable" role="grid" aria-describedby="example2_info">
                      <thead class="bg-primary text-uppercase">
                        <tr role="row">                        
                          <th class="sorting" >Vendor Group Name</th>                          
                          
                          <th class="sorting" >Created By</th>
                          <th class="sorting" >Created At</th>
                          <th class="sorting" >Edited By</th>
                          <th class="sorting" >Edited At</th>
                         
                          <th class="sorting" >Action</th>
                        </tr>
                      </thead>
                      <tbody>  
                      <?php foreach ($group_list as $group): ?>
                        <tr role="row" class="text-bold" >
                          <td class=""><?php echo $group->SN_VENDOR_GROUP_NAME; ?></td>                                                 
                          <td class=""><?php 
                              $a=$this->common_model->selectOne('tbl_user','CD_USER_ID',$group->SN_CREATED_BY);
                              echo @$a['0']->NM_USER_FULLNAME; ?>
                          </td>
                          <td class=""><?php echo date('Y-m-d h:i A',strtotime($group->TS_CREATED_AT)); ?></td>
                          <td class=""><?php 
                              $b=$this->common_model->selectOne('tbl_user','CD_USER_ID',$group->SN_EDITED_BY);
                              echo @$b['0']->NM_USER_FULLNAME; ?>
                          </td>
                          <td class=""><?php if($group->TS_EDITED_AT!=""){ echo date('Y-m-d h:i A',strtotime($group->TS_EDITED_AT)); } ?></td>                          
                          <td class="">
                            <a href="<?php echo base_admin(); ?>vendor/edit_group/<?php echo $group->CD_VENDOR_GROUP_ID; ?>" class="btn btn-primary btn-sm btn-flat upper"><i class="fa fa-pencil"></i> Edit</a>
                          </td>
                        </tr>
                      <?php endforeach ?>  
                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
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
 
