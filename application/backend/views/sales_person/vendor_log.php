  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vendor Management
        <small>Vendor Log</small>
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
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">              
                <div class="row">
                  <div class="col-sm-12 table-responsive">
                    <table id="example3" class="table table-bordered table-hover table-condensed dataTable" role="grid" aria-describedby="example2_info">
                      <thead class="bg-primary text-uppercase">
                        <tr role="row">                        
                          <th class="" >Company Name</th>
                          <th class="" >Ip Address</th>
                          <th class="" >Browser</th>
                          <th class="" >Operating System</th>                          
                          <th class="" >Date</th>                         
                          
                        </tr>
                      </thead>
                      <tbody>  
                      <?php foreach ($log_list as $log): ?>
                        <tr role="row" class="text-bold" >
                          <td class=""><?php echo $log->NM_COMPANY_NAME; ?></td>
                          <td class=""><?php echo $log->SN_IPADDRESS; ?></td>
                          <td class=""><?php echo $log->SN_BROWSER; ?></td>                          
                          <td class=""><?php echo $log->SN_OS; ?></td>                          
                          <td class=""><?php echo date('Y-m-d h:i A',strtotime($log->TS_CREATED_AT)); ?></td>                          
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
