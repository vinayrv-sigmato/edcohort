  <style>
    .x_panel {
    width: 100%;
    padding: 10px 17px;
    display: inline-block;
    background: #fff;
    border: 1px solid #E6E9ED;
    -webkit-column-break-inside: avoid;
    -moz-column-break-inside: avoid;
    column-break-inside: avoid;
    opacity: 1;
    transition: all .2s ease;
}

.x_panel, .x_title {
    margin-bottom: 10px;
}

.degrees:after, .x_content, .x_panel {
    position: relative;
}
.x_title {
    border-bottom: 2px solid #E6E9ED;
    padding: 1px 5px 6px;
}

.x_panel, .x_title {
    margin-bottom: 10px;
}
.custom_heading h2 {
    float: none !important;
}

.x_title h2 {
    margin: 5px 0 6px;
    float: left;
    display: block;
}

.overflow_hidden, .sidebar-widget, .site_title, .tile, .weather-days .col-sm-2, .x_title h2, table.tile_info td p {
   /* overflow: hidden;*/
}

h2 {
    font-size: 18px;
    font-weight: 400;
}
.small, small {
    font-size: 15px;
    display: inline-block;
    padding-left: 4px;
    font-weight: 300;
}
.form-design {
    display: flex;
}
.form-group {
    margin-bottom: 10px;
}
.import_csv img {
    margin: auto auto 16px;
    width: 93px;
}
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Diamond Management
        <small>Diamond Upload History</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box box-primary">
                    <!-- <div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div> -->
                    <div class="box-body">
                           <div class="col-12">
                              
                              <ul class="nav nav-tabs">
                                  <li class="active"><a data-toggle="tab" href="#home">Diamond Upload</a></li>                                  
                                  <li><a data-toggle="tab" href="#menu1">Image Upload</a></li>
                                  <li><a data-toggle="tab" href="#menu2">Video Upload</a></li>
                                  <li><a data-toggle="tab" href="#menu3">Certificate Upload</a></li>
                                </ul>


                                <div class="tab-content">
                                  <div id="home" class="tab-pane fade in active">
                                    <h4>Diamond Upload<button type="button" href="<?php echo base_admin(); ?>diamond/delete_history/excel" onclick="return confirm_boot_a($(this))" data-message="Are You Sure?"  class="btn btn-flat btn-primary pull-right"><i class="fa fa-trash"></i> Clear History</button></h4>
                                     <table id="example1" class="example1 table table-bordered table-hover table-condensed">
                                      <thead class="bg-primary text-uppercase">
                                      <tr>
                                        <th>Date</th>
                                        <th class="">Total Record</th>
                                        <th class="">Total Updated</th>
                                        <th class="">Total Added</th>
                                        <th>File</th>
                                        
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php foreach ($excel_history as $row): ?>
                                        <tr>
                                        <td><?php echo date('Y-m-d H:i',$row->log_time); ?></td>
                                        <td><?php echo $row->total_record; ?></td>
                                        <td><?php echo $row->total_update; ?></td>
                                        <td><?php echo $row->total_insert; ?></td>
                                        <td><a href="<?php echo base_url(); ?>uploads/diamond/excel/<?php echo $row->file; ?>" download><?php echo $row->file; ?></a></td>
                                      </tr> 
                                      <?php endforeach ?>                                                                            
                                      
                                      </tfoot>
                                    </table>
                                  </div>
                                  <div id="menu1" class="tab-pane fade">
                                    <h4>Image Upload<button type="button" href="<?php echo base_admin(); ?>diamond/delete_history/image" onclick="return confirm_boot_a($(this))" data-message="Are You Sure?"  class="btn btn-flat btn-primary pull-right"><i class="fa fa-trash"></i> Clear History</button></h4>
                                     <table id="example1" class="example1 table table-bordered table-hover table-condensed">
                                      <thead class="bg-primary text-uppercase">
                                      <tr>
                                        <th>Date</th>
                                        <th class="">Total Record</th>
                                        <!-- <th class="">Total Update</th> -->
                                        <th class="">Total Added</th>
                                        <!-- <th>File</th> -->
                                        
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php foreach ($image_history as $row): ?>
                                        <tr>
                                        <td><?php echo date('Y-m-d H:i',strtotime($row->created_at)); ?></td>
                                        <td><?php echo $row->total_record; ?></td>
                                        <!-- <td><?php //echo $excel->total_update; ?></td> -->
                                        <td><?php echo $row->total_insert; ?></td>
                                        <!-- <td><?php //echo $row->file; ?></td> -->
                                      </tr> 
                                      <?php endforeach ?>                                                                            
                                      
                                      </tfoot>
                                    </table>
                                  </div>
                                  <div id="menu2" class="tab-pane fade">
                                   <h4>Video Upload<button type="button" href="<?php echo base_admin(); ?>diamond/delete_history/video" onclick="return confirm_boot_a($(this))" data-message="Are You Sure?"  class="btn btn-flat btn-primary pull-right"><i class="fa fa-trash"></i> Clear History</button></h4>
                                     <table id="example1" class="example1 table table-bordered table-hover table-condensed">
                                      <thead class="bg-primary text-uppercase">
                                      <tr>
                                        <th>Date</th>
                                        <th class="">Total Record</th>
                                        <!-- <th class="">Total Update</th> -->
                                        <th class="">Total Added</th>
                                        <!-- <th>File</th> -->
                                        
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php foreach ($video_history as $row): ?>
                                        <tr>
                                        <td><?php echo date('Y-m-d H:i',strtotime($row->created_at)); ?></td>
                                        <td><?php echo $row->total_record; ?></td>
                                        <!-- <td><?php //echo $row->total_update; ?></td> -->
                                        <td><?php echo $row->total_insert; ?></td>
                                        <!-- <td><?php //echo $row->file; ?></td> -->
                                      </tr> 
                                      <?php endforeach ?>                                                                            
                                      
                                      </tfoot>
                                    </table>
                                  </div>
                                  <div id="menu3" class="tab-pane fade">
                                    <h4>Certificate Upload<button type="button" href="<?php echo base_admin(); ?>diamond/delete_history/certificate" onclick="return confirm_boot_a($(this))" data-message="Are You Sure?"  class="btn btn-flat btn-primary pull-right"><i class="fa fa-trash"></i> Clear History</button></h4>
                                     <table id="example1" class="example1 table table-bordered table-hover table-condensed">
                                      <thead class="bg-primary text-uppercase">
                                      <tr>
                                        <th>Date</th>
                                        <th class="">Total Record</th>
                                        <!-- <th class="">Total Update</th> -->
                                        <th class="">Total Added</th>
                                        <!-- <th>File</th> -->
                                        
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php foreach ($certificate_history as $row): ?>
                                        <tr>
                                        <td><?php echo date('Y-m-d H:i',strtotime($row->created_at)); ?></td>
                                        <td><?php echo $row->total_record; ?></td>
                                        <!-- <td><?php //echo $row->total_update; ?></td> -->
                                        <td><?php echo $row->total_insert; ?></td>
                                        <!-- <td><?php //echo $row->file; ?></td> -->
                                      </tr> 
                                      <?php endforeach ?>                                                                            
                                      
                                      </tfoot>
                                    </table>
                                  </div>
                                </div>

                            </div>          
                    </div>
                </div>
            </div>
        </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->