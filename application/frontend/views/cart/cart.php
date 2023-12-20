<style>
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
    background-color: #041e42;
    color: #fff;
}

.cart-table table.table tbody tr td a.fa.fa-times.fa-2x {
    color: #041e42;
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


<div class="breadcrumb ">  
   <div class="container">
    <div class="d-flex justify-content-between align-items-center">
    <div> <h2><span>Cart</span></h2></div>
     <div><ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>" class="homepage-link" title="Back to the frontpage">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" >Cart</a>
      </li>
    </ul></div>
     </div>
   </div>
</div>


<?php echo message(); ?>
<?php $user_id=$this->session->userdata('user_id'); ?>
	<section id="pageContent" class="page-content section-top-inner">
		<div class="container">
			<div class="">
				<div class="cart-table table-responsive">
					<?php $sum=0.00; $total=0; ?>
					<table class="table table-condensed  table-hover">
						<thead>
							<tr>
								<th class="items">Product </th>
								<th class="items">Description </th>
								<th class="items" style="text-align: center;">Quantity</th>
								<th class="total">Total</th>
								<th class="delete"></th>
							</tr>
						</thead>			
						<?php foreach ($cart as $row): 
								
								$cart_diamond=array(); 
								$total_price=$row->total_price;

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
										<span>$<?php echo number_format($row->total_price); ?></span>
									</div>		
									<?php if (count($cart_diamond)): ?>					
										<div>
											<h3><?php echo $cart_diamond['0']->name; ?></h3>											
											<p><?php echo substr($cart_diamond['0']->description,0,100); ?></p>
											<p>Stock #: <?php echo $cart_diamond['0']->stock_id; ?></p>	
											<span>$<?php echo number_format($cart_diamond['0']->total_price); ?></span>			
										</div>
									<?php endif ?>										
								</td>						
								<td style="text-align: center;">
									<?php if (!$row->is_ring_builder){ ?>
										<form action="<?php echo base_url(); ?>cart-update-quantity" method="post">
											<?php echo csrf_field(); ?>
											<?php if ($user_id){ ?>												
												<input type="hidden" name="cart_id" value="<?php echo $row->cart_id ?>">
											<?php } else { ?>
												<input type="hidden" name="cart_id" value="<?php echo $row->cart_cookie_id; ?>">
											<?php } ?>
										    <select name="quantity" class="input-sm" onchange="$(this).parent().submit()">
										    	<?php for ($i=1; $i <=10; $i++) { ?>									    	
												<option value="<?php echo $i; ?>" <?php if($row->quantity==$i){ echo 'selected'; } ?> ><?php echo $i; ?></option>
												<?php } ?>
										    </select>
									    </form>
									<?php }else{ echo '1'; } ?>
								</td>
								<td>$<?php echo number_format($total_price); ?></td>
								<?php if ($user_id){ ?>		
									<td><a onclick="a_boot('Are You Sure?','<?php echo base_url(); ?>cart-delete/<?php echo $row->product_type; ?>/<?php echo $row->cart_id; ?>')" class="fa fa-times fa-2x"></a></td>
								<?php } else { ?>
									<td><a onclick="a_boot('Are You Sure?','<?php echo base_url(); ?>cart-delete/<?php echo $row->product_type; ?>/<?php echo $row->cart_cookie_id; ?>')" class="fa fa-times fa-2x"></a></td>
								<?php } ?>							
							</tr>
							<?php endforeach ?>


						</tbody>
					</table>
				</div>

				<div class="total-count">
					<!-- <h4>Subtotal: $0.00</h4> -->
					<!-- <p>+shippment: $0.00</p> -->
					<h3>Total to pay: <strong id="total_pay">$<?php echo number_format(round($sum)); ?></strong></h3>
					<?php if($sum<1){ ?>
					<a href="javascript:void(0)" class="btn main-btn btn-primary">Checkout</a>					
					<?php }else{ ?>									
					<a href="<?php echo base_url(); ?>checkout" class="btn btn-primary main-btn radius-flat">Checkout</a>
					<?php } ?>
				</div>
		
			</div>
			<!-- / content -->
		</div>
		<!-- / container -->
	</section>
	<!-- / body -->