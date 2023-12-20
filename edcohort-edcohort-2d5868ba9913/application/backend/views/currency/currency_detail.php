<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <!-- <h1>Product</h1>-->
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/admin_dashboard"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboad</a></li>
            <li class="active">Product Details</li>
        </ol>
    </section>

<div class="clearfix">&nbsp;</div>
    <!-- Main content -->
    <section class="content">
        <div class="row ">
            <div class="col-12 table-responsive">
                <div class="box">
                    <div class="box-header bg-blue">
                        <h3 class="box-title ">Product Details</h3>
                    </div>
                    <div class="clearfix"></div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover table-condensed table-responsive">
                            <thead>

                            </thead>
                            <tbody>
                            <?php foreach($product_detail as $product){ ?>
                            <tr>
                                <th class="col-md-2">Name </th>
                                <td class="col-md-4"><?php echo $product->product_name; ?></td>
                            </tr>
                            <tr>
                                <th class="col-md-2">Manufacturer</th>
                                <td class="col-md-4"><?php echo $product->manufacturer_name; ?></td>
                                <th class="col-md-2">Brand</th>
                                <td class="col-md-4"><?php echo $product->brand_name; ?></td>
                            </tr>
                            <tr>
                                <th>Model</th>
                                <td><?php echo $product->product_model; ?></td>
                                <th>Sku</th>
                                <td><?php echo $product->product_sku; ?></td>
                            </tr>
                            <tr>
                                <th>Condition</th>
                                <td><?php echo ucwords($product->product_condition); ?></td>
                                <th>Allow Sale</th>
                                <td><?php echo ucwords($product->product_sale_allow); ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?php echo ucwords($product->product_status); ?></td>
                                <th>Price</th>
                                <td><?php echo $product->product_price; ?></td>
                            </tr>
                            <tr>
                                <th>Quantity</th>
                                <td><?php echo $product->product_quantity; ?></td>
                                <th>Minimum Quantity</th>
                                <td><?php echo $product->product_minimum_quantity; ?></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="example1_paginate" class="dataTables_paginate paging_simple_numbers">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
