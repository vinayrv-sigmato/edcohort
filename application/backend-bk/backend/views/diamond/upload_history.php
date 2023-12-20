<style>
        .card .body .col-xs-8, .card .body .col-sm-8, .card .body .col-md-8, .card .body .col-lg-8 {
            margin-bottom: 0px;
        }
        label {
            display: block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: bold;
        }
        #collapseProductOption.dropdown-menu {
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            -ms-border-radius: 0;
            border-radius: 0;
            margin-top: 0px !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            border: none;
            width: 386px;
            margin-left: 10px;
            background-color: #e9e9e9;
        }
        label.droplist {
            padding-left: 12px;
            padding-bottom: 5px;
            border-bottom: 1px solid #d4dcdb;
        }
        [type="checkbox"] + label {
            vertical-align: middle;
        }
</style>
 <section class="content">
    <div class="container-fluid">
        <div class="row row-header">
            <div class="col-md-4">
            <h2>Diamond <small>Diamond Upload History</small></h2>
            </div>
        </div>
        <?php message(); ?>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                                            
                    <div class="body">
                        <form action="<?php echo base_url(); ?>admin_product/add_product_submit" role="form" method="post" enctype="multipart/form-data">
          
                    <div class="">
                        <ul class="nav nav-tabs tab-nav-right">
                            <li class="active"><a data-toggle="tab" href="#home">Diamond Upload</a></li>                                  
                            <li><a data-toggle="tab" href="#menu1">Image Upload</a></li>
                            <li><a data-toggle="tab" href="#menu2">Video Upload</a></li>
                            <li><a data-toggle="tab" href="#menu3">Certificate Upload</a></li>
                        </ul>
                    </div>
             
                    <div class="clearfix" style="margin-top: 15px;">
                        <div class="tab-content clearfix">
                           <div id="home" class="tab-pane fade in active">
                              <h4>Diamond Upload<button type="button" data-href="<?php echo base_url(); ?>admin_diamond/delete_history/excel" onclick="return confirm_boot_a($(this))" data-message="Are You Sure?"  class="btn bg-red waves-effect pull-right"><i class="fa fa-trash"></i> Clear History</button></h4>
                               <table id="example1" class="example1 table table-bordered table-hover table-condensed">
                                <thead class="bg-teal text-uppercase">
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
                                  <?php 
                                  if($row->file == 'JB_brothers_API')
                                  {
                                      $row->file = 'jbb';
                                  }
                                  $filexls = '../uploads/diamond/excel/'.$row->file.'.xls';
                                  $filexlsx = '../uploads/diamond/excel/'.$row->file.'.xlsx';
                                  $filecsv = '../uploads/diamond/excel/'.$row->file.'.csv';
                                  
                                  if(file_exists($filexls)){
                                  $urlfile = str_replace("admin","",base_url().'uploads/diamond/excel/'.$row->file.'.xls');
                                  }elseif(file_exists($filexlsx)){
                                  $urlfile = str_replace("admin","",base_url().'uploads/diamond/excel/'.$row->file.'.xlsx');
                                  }else if(file_exists($filecsv)){
                                  $urlfile = str_replace("admin","",base_url().'uploads/diamond/excel/'.$row->file.'.csv');
                                  }
                                  
                                  ?>
                                  <td><a href="<?php echo $urlfile; ?>" download><?php echo $row->file; ?></a></td>
                                </tr> 
                                <?php endforeach ?>
                                </tfoot>
                              </table>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                              <h4>Image Upload<button type="button" data-href="<?php echo base_url(); ?>admin_diamond/delete_history/image" onclick="return confirm_boot_a($(this))" data-message="Are You Sure?"  class="btn bg-red waves-effect pull-right"><i class="fa fa-trash"></i> Clear History</button></h4>
                               <table id="example1" class="example1 table table-bordered table-hover table-condensed">
                                <thead class="bg-teal text-uppercase">
                                <tr>
                                  <th>Date</th>
                                  <th class="">Total Record</th>
                                  <th class="">Total Added</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($image_history as $row): ?>
                                  <tr>
                                  <td><?php echo date('Y-m-d H:i',strtotime($row->created_at)); ?></td>
                                  <td><?php echo $row->total_record; ?></td>
                                  <td><?php echo $row->total_insert; ?></td>
                                </tr> 
                                <?php endforeach ?>
                                </tfoot>
                              </table>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                             <h4>Video Upload<button type="button" data-href="<?php echo base_url(); ?>admin_diamond/delete_history/video" onclick="return confirm_boot_a($(this))" data-message="Are You Sure?"  class="btn bg-red waves-effect pull-right"><i class="fa fa-trash"></i> Clear History</button></h4>
                               <table id="example1" class="example1 table table-bordered table-hover table-condensed">
                                <thead class="bg-teal text-uppercase">
                                <tr>
                                  <th>Date</th>
                                  <th class="">Total Record</th>
                                  <th class="">Total Added</th>                                       
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($video_history as $row): ?>
                                  <tr>
                                  <td><?php echo date('Y-m-d H:i',strtotime($row->created_at)); ?></td>
                                  <td><?php echo $row->total_record; ?></td>
                                  <td><?php echo $row->total_insert; ?></td>
                                </tr> 
                                <?php endforeach ?>
                                </tfoot>
                              </table>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                              <h4>Certificate Upload<button type="button" data-href="<?php echo base_url(); ?>admin_diamond/delete_history/certificate" onclick="return confirm_boot_a($(this))" data-message="Are You Sure?"  class="btn bg-red waves-effect pull-right"><i class="fa fa-trash"></i> Clear History</button></h4>
                               <table id="example1" class="example1 table table-bordered table-hover table-condensed">
                                <thead class="bg-teal text-uppercase">
                                <tr>
                                  <th>Date</th>
                                  <th class="">Total Record</th>
                                  <th class="">Total Added</th>                                       
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($certificate_history as $row): ?>
                                  <tr>
                                  <td><?php echo date('Y-m-d H:i',strtotime($row->created_at)); ?></td>
                                  <td><?php echo $row->total_record; ?></td>
                                  <td><?php echo $row->total_insert; ?></td>
                                </tr> 
                                <?php endforeach ?>                                                                            
                                
                                </tfoot>
                              </table>
                            </div>

                    </div>
                    
                    </form>

                </div>

                </div>
            </div>
        </div>
    </div>

</div>
</section>