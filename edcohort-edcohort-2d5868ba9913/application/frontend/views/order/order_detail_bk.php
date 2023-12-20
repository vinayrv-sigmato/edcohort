<style>
	.order-header{
		  background-color: #5b5150;
    	color: #3c3c3c;
    	padding: 10px 15px;
	}
	.size-medium {
    font-size: 15px!important;
    line-height: 1.255!important;
}
  .address ul {
    list-style: none;
    padding: 0;
    margin-bottom: 24px;
}
</style>
<div id="breadcrumb" class="breadcrumb">
    <div itemprop="breadcrumb" class="container">
        <div class="row">
            <div class="col-md-24">
                <a href="<?php echo base_url(); ?>" class="homepage-link" title="Back to the frontpage"> Home </a>
                <span>/</span>
                <a href="<?php echo base_url(); ?>your-orders" class="homepage-link" title="Back to the frontpage"> Orders </a>
                <span>/</span>
                <span class="page-title"> <?php echo $page_head; ?> </span>
            </div>
        </div>
    </div>
</div>
<?php echo message(); ?>

<section class="border-bottom-light sm-text-center section-padding ">
  <div class="container">

    <div class="row">

      <?php //$this->load->view('common/sidebar'); ?>

      <div class="col-lg-12">

      	<button class="btn btn-primary radius-flat pull-right" onclick="window.history.back()"><i class="fa fa-reply"></i> Back</button>

				<?php foreach($order_details as $row): ?>
					<div class="panel panel-info radius-flat">            
            <div class="panel-body">
          		<div class="col-lg-4">
								<p><strong>Shipping Address</strong></p>
								<div class="cell address">
                  <ul>
                    <li><?php echo $row->shipping_firstname.' '.$row->shipping_lastname; ?></li>
                    <li><?php echo $row->shipping_address_1; ?></li>
                    <li>                            
                      <span class="nowrap"><?php echo $row->shipping_state; ?></span>
                      <span class="nowrap"><?php echo $row->shipping_city; ?></span>
                      <span class="nowrap"><?php echo $row->shipping_postcode; ?></span> 
                    </li>
                    <li class="country-line"><?php echo $row->shipping_country; ?></li>
                    <li class="phone-number">Phone: <?php echo $row->shipping_phone; ?></li>
                  </ul>
                </div>
          		</div>
          		<div class="col-lg-4">
          			<p><strong>Payment Method</strong></p>
          			<p>	Cash on Delivery (COD). 
          					We also accept Credit/ Debit cards on delivery subject to availability of the payment device. 
          					Please check with the delivery agent.
          			</p>
          			
          		</div>
          		<div class="col-lg-offset-1 col-lg-3">
          			<p><strong>Order Summary</strong></p>
          			<div class="cell address">
                  <ul>
                    <li>Quantity: <span class="pull-right"><?php echo $row->order_product_quantity  ; ?></span></li>
                    <li>Price: <span class="pull-right">$<?php echo $row->order_product_price; ?></span></li>
                    <li>Shipping: <span class="pull-right">$<?php echo $row->order_shipping_cost; ?></span></li>
                    <li><strong>Total:</strong> <span class="pull-right">$<?php echo $row->order_product_total; ?></span></li>
                  </ul>
          			
          		</div>
            </div>
          </div>
        </div>

          <div class="panel panel-info radius-flat">
            <div class="col-lg-12 radius-flat order-header bg-dark-gray">
            	<div class="col-lg-2 white-text"><p>Order Placed</p> <?php echo date('d M-Y',strtotime($row->date_added)); ?></div>
            	<div class="col-lg-2 white-text"><p>Ship To</p> <?php echo $row->shipping_firstname.' '.$row->shipping_lastname; ?></div>
            	<div class="col-lg-2 white-text"><p>Total </p>$ <?php echo $row->order_product_price + $row->order_shipping_cost;?></div>
            	<div class="col-lg-3 pull-right white-text">
            		<p>Order# <?php echo $row->order_reference; ?></p> 
            	</div>
            </div>
            <div class="clearfix"></div>
            <div class="panel-body">
          		<div class="col-lg-10">
          			<div class="col-lg-12 size-medium"><strong><?php echo ucwords($row->order_status); ?></strong></div>
          			<div class="col-lg-12">Delivery Description</div>
          			<div class="col-lg-12">
          				<div class="image col-md-4 col-lg-4 col-sm-4 col-12">
                      <img src="<?php echo base_url(); ?><?php echo $row->image; ?>" height="80">
                  </div>
                  <div class="col-lg-8">
                  	<a href="<?php echo base_url(); ?><?php echo $row->product_type; ?>-details/<?php echo $row->product_slug; ?>" target="_blank" > <?php echo strtoupper($row->order_product_name); ?></a>
                 	</div>                    
                </div>
          		</div>
          		<div class="col-lg-2">
          			<button class="btn btn-default radius-flat  btn-block">Track Package</button>
          			<button class="btn btn-danger radius-flat  btn-block" onclick="cancelOrder('<?php echo $row->product_type ?>','<?php echo $row->order_id; ?>')">Cancel Order</button>
          		</div>
            </div>
          </div>
        <?php endforeach ?>

        

      </div>


    </div>
  </div>
</section>

  <div class="modal fade" id="cancel_order" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-site">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo SITE_NAME; ?></h4>
        </div>
        <div class="modal-body">
          <h4 class="text-center text-site">Cancel Order</h4>
          <p class="text-danger" id="text-message"></p>
          <form class="form-horizontal" id="cancel_pop" method="post" action="<?php echo base_url(); ?>cancel-order-submit">
          	<input type="hidden" id="cancel_type" name="cancel_type">
          	<input type="hidden" id="cancel_id" name="cancel_id">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <div class="col-sm-12">Reason for cancellation:</div>
              <div class="col-sm-12">
                <select name="" id="" class="form-control radius-flat">
                	<option value="">Select Cancellation Reason</option>
									<option value="mistake">Order Created by Mistake</option>
									<option value="tooSlow">Item(s) Would Not Arrive on Time</option>
									<option value="shippingCost">Shipping Cost Too High</option>
									<option value="itemCost">Item Price Too High</option>
									<option value="foundCheaper">Found Cheaper Somewhere Else</option>
									<option value="wrongShippingAddress">Need to Change Shipping Address</option>
									<option value="wrongShippingSpeed">Need to Change Shipping Speed</option>
									<option value="wrongBillingAddress">Need to Change Billing Address</option>
									<option value="wrongPaymentMethod">Need to Change Payment Method</option>
									<option value="other">Other</option>
                </select>
              </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-4 pull-right">
              	 <button type="button" class="btn btn-danger radius-flat" data-dismiss="modal" onclick="">Cancel</button>
                <button type="submit" class="btn btn-primary radius-flat" onclick="">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer bg-site">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </div>
  </div>

<script>
  function deleteAddress(id) 
  {
    alertify.confirm(
        'Jewels Of', 
        'Are you sure ?', 
        function(evt, value)
        {
            location.href=base_url+'delete-address?address_id='+id
        }
        ,function(){ 
    });
    
  }
</script>
<script>
	function cancelOrder(type,order_id)
	{
			$('#cancel_type').val(type);
			$('#cancel_id').val(order_id);
			$('#cancel_order').modal('show');
	}
</script>