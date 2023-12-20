<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Review</h4>
                            <!-- <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol> -->
                        </div>
                        <!--/Page-Header-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Product Review List</h3> 

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
                                                        <th>Product Name</th>
                                                        <th>Review Title</th>
                                                        <th>Reply</th> 
                                                        <th>Brand</th> 
                                                        <th>Class</th>                                      
                                                        <th>Course Type</th>
                                                        <th>User name</th> 
                                                        <th>User Email</th> 
                                                        <th>User Phone</th>
                                                        <th>Date</th> 
                                                        <th>Status</th>                                      
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  $cnt = 1; //print_pre($category_list)?>
                                                    <?php foreach ($records as $rec) { ?>
                                                        <tr id="product_id_<?php echo $rec->product_id;  ?>">
                                                        <td><?php echo $cnt; ?></td>  
                                                        <td><?php echo $rec->product_name; ?></td>
                                                        <td><?php echo $rec->product_review_title; ?></td>
                                                        <td><?php echo $rec->reply; ?></td> 

                                                         <td><?php echo $rec->brand_name; ?></td>
                                                        <td><?php echo $rec->title; ?></td>
                                                        <td><?php //echo $rec->product_type;
                                                                    if($rec->product_type == 1){ echo "Online"; }
                                                                    if($rec->product_type == 2){ echo "Offline"; }
                                                         ?></td>
                                                          <td><?php echo $rec->firstname; ?></td>
                                                        <td><?php echo $rec->email; ?></td>
                                                         <td><?php echo $rec->phone; ?></td>
                                                         <td><?php echo date('d-m-Y H:i',strtotime($rec->date_added)); ?></td>
                                                        <td><?php if($rec->status == '1'){ ?>
                                                                <a href="javascript:void(0)" class="btn btn-success btn-sm">Active</a>
                                                            <?php }else{ ?>
                                                                <a href="javascript:void(0)" class="btn btn-warning btn-sm">Inactive</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>admin_review/edit_product_review_reply/<?php echo $rec->prr_id; ?>" class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                                                            <a href="<?php echo base_url(); ?>admin_review/delete_product_review_reply/<?php echo $rec->prr_id; ?>" onclick="return confirm('Are you sure?')" class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
                                                             
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