<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Product </h4>
                             <ol class="breadcrumb">
                             <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_product/add_product') ?>" class="btn btn-info">Add New</a>
                            </h1>
                            </section>
                            </ol> 
                        </div>
                        <!--/Page-Header-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Product List</h3> 

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
                                                        <th>Name</th>
                                                        <th>Category</th>
                                                        <th>Brand</th>
                                                       <!--  <th>Image</th> -->
                                                        <th>Viewed</th>
                                                        <th>Short Dec</th>                                                                                         
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
                                                        <td><?php //echo getMenuList($rec->category_id);?></td>
                                                        <td><?php echo getBrandList($rec->brand_id);?></td>
                                                       <!--  <td><img src="<?php echo base_url(); ?>../uploads/product/image/<?php echo $rec->product_image; ?>" width="120"></td> -->
                                                        <td><?php //echo $rec->product_view; ?></td>
                                                        <td><?php echo $rec->product_short_description; ?></td>
                                                        <td><?php if($rec->product_status == 'active'){ ?>
                                                                <a href="javascript:void(0)" class="btn btn-success btn-sm">Active</a>
                                                            <?php }else{ ?>
                                                                <a href="javascript:void(0)" class="btn btn-warning btn-sm">Inactive</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>admin_product/edit_product/<?php echo $rec->product_id; ?>" class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                                                            <a href="<?php echo base_url(); ?>admin_product/delete_product/<?php echo $rec->product_id; ?>" onclick="return confirm('Are you sure?')" class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
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