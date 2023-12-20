<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Category </h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_category/add_category') ?>" class="btn btn-info">Add New</a>
                            </h1>
                            </section>
                            </ol>
                        </div>
                        <!--/Page-Header-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Category List</h3> 

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
                                                        <th>Category</th>
                                                        <th>Image</th>
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                        <th>Date</th>                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  $cnt = 1; //print_pre($category_list)?>
                                                    <?php foreach ($category_list as $category) { ?>
                                                        <tr id="category_row_id_<?php echo $category->category_id;  ?>">
                                                        <td><?php echo $cnt; ?></td>                                                         
                                                        <td><?php echo getMenuList($category->category_id);?></td>
                                                        <td><img src="<?php echo base_url(); ?>../uploads/category/<?php echo $category->category_image; ?>" width="120"></td>
                                                        <td><?php echo $category->category_description; ?></td>
                                                        <td><?php if($category->category_status == 'active'){ ?>
                                                                <a href="javascript:void(0)" class="btn btn-success btn-sm">Active</a>
                                                            <?php }else{ ?>
                                                                <a href="javascript:void(0)" class="btn btn-warning btn-sm">Inactive</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo date('d-m-Y',strtotime($category->category_added)); ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>admin_category/edit_category/<?php echo $category->category_id; ?>" class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                                                            <a href="<?php echo base_url(); ?>admin_category/delete_category/<?php echo $category->category_id; ?>" onclick="return confirm('Are you sure?')" class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
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