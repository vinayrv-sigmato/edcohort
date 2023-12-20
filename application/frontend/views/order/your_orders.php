<style>
.order-header{
  background-color: #5b5150;
  color: #fff;
  padding: 10px 15px;
}
.size-medium {
  font-size: 15px!important;
  line-height: 1.255!important;
}

section.section-top-inner.order-page .card-body button.btn.main-btn.search {
  padding: 5px 20px;
  border-radius: 0px;
}

section.section-top-inner.order-page .card-body input#search_order {border-radius: 0px;}

.card .row.order-header div.pull-right p a.text-white {
  color: #041e42 !important;
}


</style>


<div class="breadcrumb ">  
 <div class="container">
  <div class="d-flex justify-content-between">
    <div> <h2><span>Orders</span></h2></div>
    <div><ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>" title="Back to the frontpage">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=""><?php echo $page_head; ?></a>
      </li>
    </ul></div>
  </div>
</div>
</div>


<?php echo message(); ?>
<section class="section-top-inner order-page">
  <div class="container">
    <div class="row">
      <?php $this->load->view('common/sidebar'); ?>

      <div class="col-lg-9 ">
        <div class="card mb-4">
          <div class="card-body">
          <!-- Orders Placed In <select name="" id="" class="form-control">
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
          </select> -->
          <div class="row">
            <div class="col-lg-12">
              <span id="total_records"></span>
              <form class="form-inline pull-right" id="form_order" action="javascript:void(0)">
                <div class="form-group">
                  <input type="text" class="form-control radius-flat" name="search" id="search_order" placeholder="Enter Order ID">
                </div>              
                <button type="button" onclick="submitForm()" class="btn main-btn search">Search Orders</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      
       <div id="add_data" style=""> 
        <!-- List goes here -->
      </div>        
   


  </div>


</div>
</div>
</section>

<div class="modal fade" id="cancel_order" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header bg-site">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Shakti Jewel</h4>
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
      'Shakti Jewel', 
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
<script src="<?php echo base_url(); ?>assets/js/ajax/manage_order_ajax.js"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.js"></script>