<style>
    .order-price-list ul {
        list-style: none;
        padding: 0;
        margin-bottom: 0;
        border: 3px solid #ddd;
    }
    .order-price-list ul li {        
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 5px;
        padding-top: 5px;
        border-bottom: 1px solid #ddd;
    }
    .list-group p{
        margin: 0 0 2px;
    }
    .list-group-item {
        position: relative;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        background-color: #fff;
        border: 3px solid #ddd;
    }
    .list-group {
        padding-left: 0;
        margin-bottom: 0px;
    }
    .card .body .col-12, .card .body .col-sm-12, .card .body .col-md-12, .card .body .col-lg-12 {
        margin-bottom: 0;
    }
</style>

 <section class="content">
    <div class="container-fluid">
        <div class="row row-header">
            <div class="col-md-8">
            <h2>Order <small>Order Details</small></h2>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
        <?php message(); ?>
        <?php $order=$order_details['0']; ?>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="header bg-teal">
                        <span class="header_span">Order Details</span>
                    </div>              
                    <div class="body">
                         <div class="row clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12 ">
                                <h4 class="col-teal">Customer Details</h4> 
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <p><?php echo $order->firstname.' '.$order->lastname; ?></p>
                                        <p><strong>Email: </strong> <?php echo $order->email; ?></p>
                                        <p><strong>Phone: </strong> <?php echo $order->telephone; ?></p>
                                        <p><strong>Fax: </strong> <?php echo $order->fax; ?></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12 ">                          
                                <h4 class="col-teal">Billing Details</h4> 
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <p><?php echo $order->payment_firstname.' '.$order->payment_lastname; ?></p>
                                        <p><?php echo $order->payment_address_1; ?></p>
                                        <p><?php echo $order->payment_city; ?></p>
                                        <p><?php echo $order->payment_state; ?></p>
                                        <p><?php echo $order->payment_country; ?></p>
                                        <p><strong>Postal Code: </strong><?php echo $order->payment_postcode; ?></p>
                                    </li>
                                </ul>                              
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12 ">                          
                                <h4 class="col-teal">Shipping Details</h4> 
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <p><?php echo $order->shipping_firstname.' '.$order->shipping_lastname; ?></p>
                                        <p><?php echo $order->shipping_address_1; ?></p>
                                        <p><?php echo $order->shipping_city; ?></p>
                                        <p><?php echo $order->shipping_state; ?></p>
                                        <p><?php echo $order->shipping_country; ?></p>
                                        <p><strong>Postal Code: </strong><?php echo $order->shipping_postcode; ?></p>                                 
                                    </li>
                                </ul>                              
                            </div>
                        </div>                        

                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">              
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12 ">                          
                                <h4 class="col-teal">Order Details</h4> 
                                <ul class="list-group">
                                    <li class="list-group-item">
                                         <p><strong>Placed Date Time: </strong><?php echo date('d M-Y H:i',strtotime($order->date_added)); ?></p>
                                         <p><strong>Order Status: </strong><?php echo $order->order_status; ?></p>
                                         <p><strong>Payment Method: </strong><?php echo $order->payment_method; ?></p>
                                         <p><strong>Shipping Method: </strong><?php echo $order->shipping_method; ?></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12 ">                          
                                <h4 class="col-teal">Product Summary</h4> 
                                <ul class="list-group">
                                    <li class="list-group-item">
                                         <p><strong>Product Name: </strong><?php echo $order->order_product_name; ?></p>
                                         <p><strong>Product Model: </strong><?php echo $order->order_product_model; ?></p>
                                         <p><strong>Quantity: </strong><?php echo $order->order_product_quantity; ?></p>
                                         <p><strong>Product Description: </strong><?php //echo $order->order_product_model; ?></p>
                                         <p><strong>Vendor: </strong><?php echo $order->NM_USER_FULLNAME; ?></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="order-price-list col-lg-4 col-md-4 col-sm-4 col-12">  
                                <h4 class="col-teal">Bill Summary</h4>                           
                                <ul class="">
                                    <li class=""><strong>Quantity:</strong> <span class="pull-right"><?php echo $order->order_product_quantity ?></span></li>
                                    <li class=""><strong>Price:</strong> <span class="pull-right"><?php echo $order->order_product_price ?></span></li>
                                    <li class=""><strong>Shipping:</strong> <span class="pull-right">0.00</span></li>
                                    <li class=""><strong>Discount:</strong> <span class="pull-right">0.00</span></li>
                                    <li class=""><strong>Tax:</strong> <span class="pull-right">0.00</span></li>
                                    <li class=""><strong>Total:</strong> <span class="pull-right"><?php echo $order->order_product_total ?></span></li>
                                </ul>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">              
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 table-responsive">                          
                                <h4 class="col-teal">Order History</h4> 
                                <table class="table table-bordered table-condensed table-hover table-striped">
                                    <thead class="bg-teal">
                                        <tr>
                                            <th>Date Added</th>
                                            <th>Comment</th>
                                            <th>Status</th>
                                            <th>Customer Notified</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($status_history as $row_history): ?>
                                            <tr>
                                                <td><?php echo date('d M-Y H:i',strtotime($row_history->date)); ?></td>
                                                <td><?php echo $row_history->comment; ?></td>
                                                <td><?php echo $row_history->status; ?></td>
                                                <td><?php if($row_history->notify){ echo 'Yes'; }else{ echo 'No'; } ?></td>
                                            </tr>
                                        <?php endforeach ?>                                        
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">                          
                                <h4 class="col-teal">Add Order History</h4> 
                                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin_order/add_order_history">
                                    <input type="hidden" name="order_id" value="<?php echo $order->order_id; ?>">
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="order_status">Order Status</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="order_status" name="order_status" class="form-control" required="">
                                                        <option value="">Select</option>
                                                        <?php foreach ($status_list as $status): ?>
                                                            <option value="<?php echo $status->name; ?>"><?php echo $status->name; ?></option>
                                                        <?php endforeach ?>                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="order_status">Comment</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea name="comment" id="comment" class="form-control" cols="" rows="5"  required=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="notify_customer">Notify Customer</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="checkbox" id="notify_customer" name="notify_customer" class="filled-in">
                                                    <label for="notify_customer"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect"><i class="fa fa-plus"></i> Add History</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>
<!-- Custom JS -->







