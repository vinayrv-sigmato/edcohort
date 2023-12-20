<style>
.border-top{
    border-top:2px solid gray;
}
	img.watch {
    float: none;
    padding-right: 20px;
    height: 110px;
    /* width: 88px; */
}

.total-count h3 {
	letter-spacing: -.7px;
	color: #666668;
	font-size: 36px;
	padding: 49px 0 57px;
}

.total-count h3 strong {
	font-weight: 600;
}
.total-count {
	display: block;
	max-width: 568px;
	border: 1px solid #d3d3d3;
	margin: 48px auto 30px;
	font-family: "Novecentowide";
	text-align: center;
	font-size: 18px;
	color: #949697;
	padding-bottom: 35px;
	line-height: 20px;
}

.total-count h4 {
	color: #939597;
	font-size: 24px;
	padding: 32px 0 12px;
}

.cart-table .table-condensed>thead>tr>th {
    padding: 10px;
}
.cart-table .table-condensed>thead {
    background-color: #353244;
    color: #fff;
}
.cart-table h3 {
    font-size: 18px;
    padding: 10px 0;
    font-weight: 600;
    margin-top: 0px;
}
.radius-flat{
    border-radius: 0px !important;
}
</style>
<style>

    .radius-flat{

        border-radius: 0px !important;

    }

    .panel-info>.panel-heading {

        color: #ffffff;

        background-color: #428bca;

        border-color: #428bca;

    }

    .panel-info {

        border-color: #428bca;

    }

    .form-control.radius-flat{

        color: #333;

    }

    .steps {

    margin-top: -41px;

    display: inline-block;

    float: right;

    font-size: 16px

}

.step {
    float: left;
    background: #5b5150;
    padding: 10px 7px;
    border-radius: 0px;
    text-align: center;
    width: 160px;
    position: relative;
    font-weight: 700;
    line-height: 100%;
}

.step_line {
    margin: 0;
    width: 0;
    height: 0;
    border-left: 16px solid #fff;
    border-top: 16px solid transparent;
    border-bottom: 16px solid transparent;
    z-index: 2;
    position: absolute;
    left: 160px;
    top: 1px;
}

.step_line.backline {
    border-left: 20px solid #f7f7f7;
    border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    z-index: 1;
    position: absolute;
    left: 160px;
    top: -3px;
}

.step_line {
    background: 0;
    border-left: 16px solid #5b5150;
}

.step_complete {

    background: #03619e;

}

.step_complete a.check-bc, .step_complete a.check-bc:hover,.afix-1,.afix-1:hover{

    color: #fff;

     margin-left: 12px;

}

.step_line.step_complete {

    background: 0;

    border-left: 16px solid #03619e;

}

.step a {
    color: #fff;
    font-size: 12.5px;
    padding-left: 15px;
}

.step_thankyou {

    float: left;

    background: #5b5150;

    padding: 10px 11px;

    border-radius: 1px;

    text-align: center;

    width: 100px;

    font-weight: 700;

    color: #fff;

    line-height: 100%;

}

.step.check_step {

    margin-left: 5px;

}

.checkbox-ch .form-control {

    float: left;

    line-height: 12px;

    margin: -6px 3px 0;

    width: 15px;

}



</style>

<div id="breadcrumb" class="breadcrumb">

  <div itemprop="breadcrumb" class="container">

    <div class="row">

      <div class="col-md-24"> <a href="<?php echo base_url(); ?>" class="homepage-link" title="Back to the frontpage">Home</a> <span>/</span> <span class="page-title"><?php echo $page_head; ?></span> </div>

    </div>

  </div>

</div>

<div class="container wrapper">

            <div class="row cart-head">

                <div class="container">

                <div class="row">

                    <p></p>

                </div>

                <div class="row">

                    <div style="display: table; margin: auto;margin-bottom: 6px;">

                        <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>

                        <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span></span>

                        <span class="step step_complete"> <a href="#" class="check-bc">Payment </a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span></span>
                        <span class="step"> <a href="#" class="check-bc">Review and Confirm</a> <span class="step_line "> </span> <span class="step_line"> </span> <span class="step_line backline"> </span></span>

                        <span class="step"> <a href="#" class="check-bc">Thank you </a> <span class="step_line "> </span> <span class="step_line"> </span> <span class="step_line backline"> </span></span>



                    </div>

                </div>

                <div class="row">

                    <p></p>

                </div>

                </div>

            </div>    

            <div class="row cart-body">

                <form class="form-horizontal" method="post" action="">

	                <div class="col-lg-2 col-md-2 col-sm-2 col-12">



	                </div>

	                <div class="col-lg-8 col-md-8 col-sm-8 col-12">



	                

	                  

	                </div>

	                <div class="col-lg-2 col-md-2 col-sm-2 col-12">



	                </div>

                </form>

            </div>

            <div class="row cart-footer">

        

            </div>

    </div>

    <div class="container">
			<div class="row">
				<div class="cart-table">
					<?php $sum=0.00; $total=0; ?>
					<table class="table table-condensed  table-hover">
						<thead>
							<tr>
								<th class="items">Product </th>
								<th class="items">Description </th>
								<th class="items" style="text-align: center;">Quantity</th>
								<th class="items">Price per Quantity</th>
								<th class="items">Wire Bank Discount</th>
								<th class="total">Total</th>
							</tr>
						</thead>			
						<?php foreach ($cart as $row): 
								
								$cart_diamond=array(); 
								
								//$total_price=$row->total_price;
								$total_price = round($row->total_price - ($row->total_price * (2/100)));

								if ($row->is_ring_builder){
									if($user_id){
										$cart_diamond=$this->common_model->selectOne('tbl_cart_diamond','cart_id',$row->cart_id);
									} else {
										$cart_diamond=$this->common_model->selectOne('tbl_cart_cookie_diamond','cart_id',$row->cart_cookie_id);
									}
									$total_price=$row->total_price+$cart_diamond['0']->total_price;
								} 
								$sum=$sum+$total_price; 
						?>
						<tbody>
							<tr>
								<td>
									<div class="image1">
										<img src="<?php echo base_url(); ?><?php echo $row->image; ?>" alt="" width="100">
									</div>
								</td>
								<td>
									<div>
										<h3><?php echo $row->name; ?> </h3>										
										<p><?php echo substr($row->description,0,100); ?></p>
										<p>Stock #: <?php echo $row->stock_id; ?></p>
										<?php if ($row->attributes){
											echo $row->attributes;
										} ?>
										
									</div>		
									<?php if (count($cart_diamond)): ?>					
										<div>
											<h3><?php echo $cart_diamond['0']->name; ?></h3>											
											<p><?php echo substr($cart_diamond['0']->description,0,100); ?></p>
											<p>Stock #: <?php echo $cart_diamond['0']->stock_id; ?></p>	
											<span>$<?php echo number_format(round($cart_diamond['0']->total_price - ($cart_diamond['0']->total_price * (2/100)))); ?></span>			
										</div>
									<?php endif ?>										
								</td>						
								<td style="text-align: center;">
									<?php echo $row->quantity;  ?>
								</td>
								<td style="text-align: center;">$<?php echo $row->total_price;?></td>
								<td style="text-align: center;">
									2%
								</td>
								<td>$<?php echo number_format($total_price); ?></td>
							</tr>
							<?php endforeach ?>


						</tbody>
					</table>
				</div>
				<div class="col-md-6 border-top">
				    <h4><b>Shipping Address</b></h4>
				    <?php if(isset($shipping)){ ?>
				    <div>
				        <h3><?php echo $shipping[0]->firstname.' '.$shipping[0]->lastname; ?> </h3>										
						<p><?php echo $shipping[0]->address_1; ?></p>
						<p><?php echo $shipping[0]->city.', '.$shipping[0]->state.' - '.$shipping[0]->zip; ?></p>
						<p><?php echo $shipping[0]->phone; ?></p>
						
					</div>		
					<?php } ?>
				</div>
				<div class="col-md-6 border-top">
				    <h4><b>Billing Address</b></h4>
				    <?php if(isset($shipping) && $shipping[0]->default_bill == 1){ ?>
				    <div>
				        <h3><?php echo $shipping[0]->firstname.' '.$shipping[0]->lastname; ?> </h3>										
						<p><?php echo $shipping[0]->address_1; ?></p>
						<p><?php echo $shipping[0]->city.', '.$shipping[0]->state.' - '.$shipping[0]->zip; ?></p>
						<p><?php echo $shipping[0]->phone; ?></p>
						
					</div>		
					<?php } ?>
				</div>
                <div class="col-md-12">
				<div class="total-count">
					<!-- <h4>Subtotal: $0.00</h4> -->
					<!-- <p>+shippment: $0.00</p> -->
					<h3>Total to pay: <strong id="total_pay">$<?php echo number_format(round($sum)); ?></strong></h3>
					<?php if($sum<1){ ?>
					<a href="javascript:void(0)" class="btn btn-primary">Place Order</a>					
					<?php }else{ ?>									
					<a href="<?php echo base_url(); ?>checkout-submit-wire" class="btn btn-primary radius-flat">Place Order</a>
					<?php } ?>
				</div>
				</div>
		
			</div>
			<!-- / content -->
		</div>
		<!-- / container -->


