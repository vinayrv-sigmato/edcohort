<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Counselling </h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_counselling/add_counselling') ?>" class="btn btn-info">Add New</a>
                            </h1>
                            </section>
                            </ol>
                        </div>
                        <!--/Page-Header-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Counselling List</h3> 

                                        <div class="col-md-6 pull-right">
                                        <?php message(); ?>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive mb-0 ">
                                            <table class="data-table-example table table-striped table-bordered table-hover text-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>S.no</th>
                                                        <th>Brand</th> 
                                                        <th>Class</th> 
                                                        <th>User</th>
                                                        <th>Date</th>
                                                        <th>S Time</th> 
                                                        <th>E Time</th>  
                                                        <th>Status</th>  
                                                        <th>Date Added</th>                                                     
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  $cnt = 1; //print_pre($records)?>
                                                    <?php foreach ($records as $rec) { 
                                                        //print_R($rec);
                                                        ?>
                                                        <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo ucfirst($rec->brand_name); ?></td>
                                                        <td><?php echo ucfirst($rec->title); ?></td>
                                                        <td><?php echo ucfirst($rec->firstname); ?></td>
                                                        <td><?php echo date('d-m-Y',strtotime($rec->c_date)); ?></td>
                                                        <td><?php echo date('h:i A',strtotime($rec->start_time)); ?></td>
                                                        <td><?php echo date('h:i A',strtotime($rec->end_time)); ?></td>
                                                        <td><?php if($rec->c_status == 1){ ?>
                                                                <a href="javascript:void(0)" class="btn btn-success btn-sm">Active</a>
                                                            <?php }else{ ?>
                                                                <a href="javascript:void(0)" class="btn btn-warning btn-sm">Inactive</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo date('d-m-Y',strtotime($rec->date_added)); ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>admin_counselling/edit_counselling/<?php echo $rec->c_id; ?>" class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                                                            <a href="<?php echo base_url(); ?>admin_counselling/delete_counselling/<?php echo $rec->c_id; ?>" onclick="return confirm('Are you sure?')" class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php $cnt++; } ?>
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>