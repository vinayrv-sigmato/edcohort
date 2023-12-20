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
            <h2>Customer <small>Customer Details</small></h2>
            </div>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="header">
                        <h2>Customer Details </h2>                            
                    </div>                        
                    <div class="body">
          
                    <div class="">
                        <ul class="nav nav-tabs tab-nav-right">
                            <li class="active"><a data-toggle="tab" href="#general">General Info</a></li>
                            <li><a data-toggle="tab" href="#address">Address</a></li>      
                            <!-- <li><a data-toggle="tab" href="#login">Log</a></li> -->                           
                            <li><a data-toggle="tab" href="#order">Orders</a></li>                           
                            <li><a data-toggle="tab" href="#wishlist">Wishlist</a></li>
                            <li><a data-toggle="tab" href="#cart">Cart</a></li>
                            <!-- <li><a data-toggle="tab" href="#other_detail">Other Details</a></li> -->
                        </ul>
                    </div>
             
                    <div class="clearfix" style="margin-top: 15px;">
                        <div class="tab-content clearfix">
                            <div id="general" class="tab-pane fade in active">
                                <div class="body">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="col-md-2"><strong>Name : </strong></td>
                                                <td><?php echo @$customer_detail['0']->firstname.' '.@$customer_detail['0']->lastname; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2"><strong>Email : </strong></td>
                                                <td><?php echo @$customer_detail['0']->email; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2"><strong>Phone : </strong></td>
                                                <td><?php echo @$customer_detail['0']->phone; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2"><strong>Fax : </strong></td>
                                                <td><?php echo @$customer_detail['0']->fax; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2"><strong>Status : </strong></td>
                                                <td><?php if(@$customer_detail['0']->status=='1'){ echo 'Active'; }else{ echo 'Inactive'; } ?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2"><strong>Date Joined : </strong></td>
                                                <td><?php echo date('d M-Y',strtotime(@$customer_detail['0']->date_added)); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-2"><strong>Date Modified : </strong></td>
                                                <td><?php if(@$customer_detail['0']->date_edited!=""){ echo date('d M-Y',strtotime(@$customer_detail['0']->date_edited)); } ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                                   
                            </div>

                            <div id="address" class="tab-pane fade in ">
                                <div class="body">
                                    <?php $i=1; foreach ($address_detail as $address): ?>
                                        <div class="col-md-4">
                                            <button class="btn btn-block bg-teal" type="button">Address <?php echo $i; ?></button>
                                            <ul class="list-unstyled list-group-item">                                                
                                                <li><strong><?php echo $address->firstname.' '.$address->lastname; ?></strong></li>
                                                <li><?php echo $address->address_1; ?></li>                                            
                                                <li><?php echo $address->state; ?> <?php echo $address->city; ?> <?php echo $address->zip; ?></li> 
                                                <li><?php echo $address->country; ?></li>                                           
                                                <li><strong>Phone: </strong><?php echo $address->phone; ?></li>                                           
                                                <?php if($address->default_bill=='1'){ ?>
                                                    <li><span class="badge bg-teal">Default Billing</span></li>
                                                <?php } ?> 
                                                <?php if($address->default_ship=='1'){ ?>
                                                    <li><span class="badge bg-teal">Default Shipping</span></li>
                                                <?php } ?>                                        
                                            </ul>
                                        </div>
                                    <?php $i++; endforeach ?>
                                </div>                                   
                            </div>

                            <div id="login" class="tab-pane fade in ">
                                <div class="body">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td><strong>Name : </strong>

                                                </td>                                                
                                            </tr>                                            
                                        </tbody>
                                    </table>
                                </div>                                   
                            </div>

                            <div id="order" class="tab-pane fade in ">
                                <div class="body">
                                    <table id="example" class="table table-bordered table-responsive table-striped table-hover table-condensed js-basic-example dataTable">
                                      <thead class="bg-teal">
                                      <tr>
                                        <th>Order Id</th>
                                        <th>Ship To</th>
                                        <th>Status</th>
                                        <th>Total Price</th>
                                        <th>Date Added</th>
                                       
                                        <th>Action</th>
                                      </tr>
                                      </thead>
                                      <tbody id="">
                                        <?php foreach ($order_detail as $order): ?> 
                                         <tr id="">  
                                            <td><strong><?php echo $order->order_reference; ?></strong></td>
                                            <td><?php echo $order->shipping_firstname; ?> <?php echo $order->shipping_lastname; ?></td>       
                                            <td><strong><?php echo $order->order_status; ?></strong></td>                                
                                            <td><?php echo $order->total; ?></td>
                                            <td><?php echo date('d M-Y H:i',strtotime($order->date_added)); ?></td>
                                            
                                            <td>
                                                <a target="_blank" href="<?php echo base_url(); ?>admin_order/order_details/<?php echo $order->order_id; ?>" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i> View</a>
                                            </td>
                                        </tr>  
                                        <?php endforeach ?>          
                                      </tbody>          
                                    </table>
                                </div>                                   
                            </div>

                            <div id="wishlist" class="tab-pane fade in ">
                                <div class="body">
                                    <table id="example" class="table table-bordered table-responsive table-striped table-hover table-condensed js-basic-example dataTable">
                                      <thead class="bg-teal">
                                      <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>description</th>
                                        <th>Total Price</th>
                                        <th>Date Added</th>
                                      </tr>
                                      </thead>
                                      <tbody id="">
                                        <?php foreach ($wishlist_detail as $wishlist): ?> 
                                         <tr id="">  
                                            <td><strong><?php echo $wishlist->name; ?></strong></td>
                                            <td><?php echo $wishlist->product_type; ?></td>       
                                            <td><strong><?php echo $wishlist->description; ?></strong></td>                                
                                            <td><?php echo $wishlist->total_price; ?></td>
                                            <td><?php echo date('d M-Y H:i',strtotime($wishlist->created_at)); ?></td>

                                        </tr>  
                                        <?php endforeach ?>          
                                      </tbody>          
                                    </table>
                                </div>                                   
                            </div>

                            <div id="cart" class="tab-pane fade in ">
                                <div class="body">
                                    <table id="example" class="table table-bordered table-responsive table-striped table-hover table-condensed js-basic-example dataTable">
                                      <thead class="bg-teal">
                                      <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>description</th>
                                        <th>Total Price</th>
                                        <th>Date Added</th>
                                      </tr>
                                      </thead>
                                      <tbody id="">
                                        <?php foreach ($cart_detail as $cart): ?> 
                                         <tr id="">  
                                            <td><strong><?php echo $cart->name; ?></strong></td>
                                            <td><?php echo $cart->product_type; ?></td>       
                                            <td><strong><?php echo $cart->description; ?></strong></td>                                
                                            <td><?php echo $cart->total_price; ?></td>
                                            <td><?php echo date('d M-Y H:i',strtotime($cart->created_at)); ?></td>

                                        </tr>  
                                        <?php endforeach ?>          
                                      </tbody>          
                                    </table>
                                </div>                                   
                            </div>

                            <div id="other_detail" class="tab-pane fade in ">
                                <div class="body">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td><strong>Name : </strong>

                                                </td>                                                
                                            </tr>                                            
                                        </tbody>
                                    </table>
                                </div>                                   
                            </div>

                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                            <a href="<?php echo base_url()?>admin_customer" class="btn bg-red btn-block btn-lg waves-effect" style="">Cancel</a>
                        </div>
                    </div>

                </div>

                </div>
            </div>
        </div>
    </div>

</div>
</section>