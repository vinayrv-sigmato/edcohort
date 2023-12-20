  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Appointment
        <small>Appointment List</small>
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
              <!--<a href="<?php echo base_admin(); ?>group/add_group" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-plus"></i> Add Group</a>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">              
                <div class="row">
                  <div class="col-sm-12 table-responsive">
                    <table id="example2" class="table table-bordered table-hover table-condensed dataTable" role="grid" aria-describedby="example2_info">
                      <thead class="bg-primary text-uppercase">
                        <tr role="row">                        
                          <th class="sorting" >Name</th>
                          <th class="sorting" >Email</th>
                          <th class="sorting" >Phone</th>                           
                          <th class="sorting" >Date</th>
                          <th class="sorting" >Time</th>                          
                          <th class="sorting" >Message</th>
                          <th class="sorting" >Added Date</th>
                          <th class="sorting" >Action</th>

                          
                        </tr>
                      </thead>
                      <tbody>  
                      <?php foreach ($appointment_list as $appointment): ?>
                        <tr role="row" class="text-bold">
                          <td class=""><?php echo $appointment->first_name .' '.$appointment->last_name; ?></td>
                          <td class=""><?php echo $appointment->email; ?></td> 
                          <td class=""><?php echo $appointment->phone; ?></td>
                          <td class=""><?php echo date('Y-m-d',strtotime($appointment->date)); ?></td>   
                          <td class=""><?php echo date('h:i A',strtotime($appointment->time)); ?></td>
                          <td class=""><?php echo $appointment->comment; ?></td>                                               
                          <td class=""><?php echo date('Y-m-d h:i A',strtotime($appointment->created_at)); ?></td>
                          
                          <td class=""><!-- <a href="<?php echo base_admin(); ?>blog/edit_blog/<?php echo $enquiry->blog_id; ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</a> &nbsp; -->
                          <a href="<?php echo base_admin(); ?>appointment/delete_enquiry/<?php echo $appointment->appointment_id; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-pencil"></i> Delete</a></td>
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