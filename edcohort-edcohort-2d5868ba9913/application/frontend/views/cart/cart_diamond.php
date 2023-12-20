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
		<div class="container-fluid">
				<div class="cart-table table-responsive"> 
					<?php $sum=0.00; $total=0; ?>
					<table class="table table-bordered">
						<thead  class="">                 
                            <tr>
                                <th>Image</th>
                                <th >Stock#</th>
                                <th >Shape</th>
                                <th >Cts</th>
                                <th >Color</th>                  
                                <th >Clarity</th>
                                <th >Cut</th>
                                <th >Pol</th>                    
                                <th >Sym</th>
                                <th >Fluor</th>                  
                                <th >Disc%</th>                    
                                <th >Depth%</th>
                                <th >Table%</th>
                                <th >Rap.($)</th>                               
                                <th >$/Carat</th>                  
                                <th >Amount $</th>   
                                <th >Thai Baht &#3647;</th>                     
                                <th >Lab</th>                                
                                <th >Measurements</th>     
                                <th >Action</th>     
                            </tr>
                        </thead> 
                        <?php foreach ($cart as $row):

                                $cart_diamond=array(); 
								$total_price=$row->total_price;
                                        
                                $cart_diamond=$this->common_model->selectOne('tbl_wish_cart_diamond','diamond_wish_id',$row->diamond_wish_id);
                                  
									$total_price=$cart_diamond['0']->total_price;
								    $sum=$sum+$total_price; 
						?>  
						 <tbody> 
                         <tr>
                                <td ><img src="<?php echo base_url($row->image); ?>" style="width:50px;"></td>
                                <td><?php echo $row->stock_id; ?></td>
                                <td><?php echo $row->shape; ?></td>                  
                                <td><?php echo $row->weight; ?></td>
                                <td><?php echo $row->color; ?></td>
                                <td><?php echo $row->grade; ?></td>
                                <td><?php echo $row->cut; ?></td>
                                <td><?php echo $row->polish; ?></td>
                                <td><?php echo $row->symmetry; ?></td>
                                <td><?php echo $row->fluorescence_int; ?></td>
                                <td><?php echo $row->new_discount; ?></td>
                                <td><?php echo $row->depth; ?></td>
                                <td><?php echo $row->table_d; ?></td>
                                <td><?php echo $row->rapnet; ?></td>
                                <td><?php echo $row->cost_carat; ?></td>
                                <td>$<?php echo $row->total_price; ?></td>
                                <td><?php echo $row->currency; ?></td>
                                <td><?php echo $row->lab; ?></td>
                                <td><?php echo $row->measurements; ?></td>
                                <td><a onclick="a_boot('Are You Sure?','<?php echo base_url(); ?>cart-delete-diamond/<?php echo $row->product_choice; ?>/<?php echo $row->diamond_wish_id; ?>')" class="fa fa-times fa-2x"></a></td>
                                
                            
             
                            </tr>
                        </tbody> 
                        <?php endforeach ?>       
					</table>
				 </div>

				<div class="total-count">
					<!-- <h4>Subtotal: $0.00</h4> -->
					<!-- <p>+shippment: $0.00</p> -->
					<h3>Total to pay: <strong id="total_pay">$<?php echo number_format(round($sum)); ?></strong></h3>
					<?php if($sum<1){ ?>
					<a href="javascript:void(0)" class="btn main-btn btn-primary">Checkout</a>					
					<?php }else{ ?>									
					<a href="<?php echo base_url(); ?>diamond-orders" class="btn btn-primary main-btn radius-flat">Checkout</a>
					<?php } ?>
				</div>
		
<!-- 			</div>
 -->			<!-- / content -->
	</div>
 
	</section>
	<!-- / body -->