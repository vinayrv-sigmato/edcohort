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
            <h2>Return <small>Return Details</small></h2>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
        <?php message(); ?>
        <?php $return=$return_details['0']; ?>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="header bg-teal">
                        <span class="header_span">Return  Details</span>
                    </div>              
                    <div class="body">
                         <div class="row clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12 ">
                                <h4 class="col-teal">Return  Details</h4> 
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <p><strong>Return ID: </strong> <?php echo $return->return_id; ?></p>
                                        <p><strong>Date Added: </strong> <?php echo date('d M-Y H:i',strtotime($return->date_added)); ?></p>
                                        <p><strong>Order ID: </strong> <?php echo $return->order_id; ?></p>
                                        <p><strong>Order Date: </strong> <?php echo date('d M-Y',strtotime($return->date_ordered)); ?></p>
                                        <p><strong>Status: </strong> <?php echo $return->return_status; ?></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12 ">                          
                                <h4 class="col-teal">Product Information</h4> 
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <p><strong>Product Name: </strong><?php echo $return->product; ?></p>
                                        <p><strong>Model: </strong><?php echo $return->model; ?></p>
                                        <p><strong>Quantity: </strong><?php echo $return->quantity; ?></p>
                                    </li>
                                </ul>                              
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12 ">                          
                                <h4 class="col-teal">Reason for Return</h4> 
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <p><strong>Reason: </strong><?php echo $return->return_reason; ?></p>                                 
                                        <p><strong>Opened: </strong><?php if($return->opened==1){ echo 'Yes'; }else{ echo 'No'; } ?></p>                                 
                                        <p><strong>Action: </strong><?php echo $return->return_action; ?></p>                                 
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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 table-responsive">                          
                                <h4 class="col-teal">Return History</h4> 
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
                                                <td><?php echo date('d M-Y H:i',strtotime($row_history->date_added)); ?></td>
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
                                <h4 class="col-teal">Add Return History</h4> 
                                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin_return/add_return_history">
                                    <input type="hidden" name="return_id" value="<?php echo $return->return_id; ?>">
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="return_status">Return Status</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="return_status" name="return_status" class="form-control" required="">
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
                                            <label for="return_status">Comment</label>
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







