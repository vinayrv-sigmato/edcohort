<style>
.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
    color: #fff !important;
    background-color: #041e42  !important;
    padding: 10px 60px;
}
    .radius-flat{
        border-radius: 0px !important;
    }
    .panel-info>.panel-heading {
        color: #ffffff;
       border-color: #041e42;
    background-color: #041e42;
    padding: 5px 15px;
    margin-bottom: 20px;
    font-size: 16px;
    }
    .panel-info {
        border-color: #041e42 ;
            border: 1px solid #041e42;
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
    background: white;
    padding: 10px 7px;
    border-radius: 0px;
    text-align: center;
    width: 130px;
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
    left: 130px;
    top: 1px;
}
.step_line.backline {
    border-left: 20px solid #f7f7f7;
    border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    z-index: 1;
    position: absolute;
    left: 130px;
    top: -3px
}
.step_complete {
    background: #041e42 ;
}
.step_complete a.check-bc, .step_complete a.check-bc:hover,.afix-1,.afix-1:hover{
    color: #fff;
     margin-left: 12px;
}
.step_line.step_complete {
    background: 0;
    border-left: 16px solid #041e42 ;
}
.step_thankyou {
    float: left;
    background: #5b5150;
    padding: 10px 11px;
    border-radius: 1px;
    text-align: center;
    width: 130px;
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
.error{
    color: #ff0000;
}
</style>



<div class="breadcrumb ">  
   <div class="container">
    <div class="d-flex justify-content-between align-items-center">
    <div> <h2><span>Payment Option</span></h2></div>
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


    <section id="pageContent" class="page-content section-top-inner">
        <div class="container">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="">
                    <div style="display: table; margin: auto; " class="mb-4">
                        <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span></span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Payment </a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span></span>
                        <span class="step_thankyou check-bc step_complete">Thank you</span>
                    </div>
                </div>
                <div class="row">
                    <p><?php echo message(); 

                        //echo $this->session->flashdata('error_message');
                    ?></p>
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
    <ul class="nav nav-pills nav-stacked col-md-12 col-lg-2 full-screen-width mt-2">
  <li class="active radius-flat"><a href="#tab_c" data-toggle="pill" class="radius-flat">Cash On Delivery</a></li> 
 <!--  <li class=" radius-flat"><a href="#tab_wire" data-toggle="pill">Wire bank</a></li> -->
<!--   <li class="active radius-flat"><a href="#tab_a" data-toggle="pill">Paypal</a></li>
 --> <!--  <li><a href="#tab_b" data-toggle="pill">Debit Card</a></li> -->
</ul>
<div class="tab-content col-md-12 col-lg-10">
<div class="tab-pane " id="tab_wire">
            <div class="panel panel-info">
                <div class="panel-heading"><span><i class="fa fa-lock"></i></span> Wire Bank</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12"><strong>Wire bank:</strong></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-12">
                            <a href="<?php echo base_url('checkout-confirm-wire'); ?>"><button type="submit" class="btn btn-primary btn-submit-fix">Submit</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane active" id="tab_a">
            <div class="panel panel-info">
                <div class="panel-heading"><span><i class="fa fa-lock"></i></span> Secure Payment</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12"><strong>Paypal:</strong></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-12">
                            <a href="<?php echo base_url('payment'); ?>"><button type="submit" class="btn btn-primary btn-submit-fix main-btn">Pay Now</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_b">
              <!--DEBIT CART PAYMENT-->
                    <div class="panel panel-info">
                        <div class="panel-heading"><span><i class="fa fa-lock"></i></span> Secure Payment</div>
                        <div class="panel-body">
                            <form action="<?php echo base_url('card-payment'); ?>" method="post" id="paymentForm">
                            <!-- <div class="form-group">
                                <div class="col-md-12"><strong>Card Type:</strong></div>
                                <div class="col-md-12">
                                    <select id="CreditCardType" name="CreditCardType" class="form-control">
                                        <option value="5">Visa</option>
                                        <option value="6">MasterCard</option>
                                        <option value="7">American Express</option>
                                        <option value="8">Discover</option>
                                    </select>
                                </div>
                            </div> -->
                            <?php echo csrf_field(); ?> 
                            <div class="form-group">
                                <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="card_number" id="card_number" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Card CVV:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="card_cvv" maxlength="3" id="card_cvv" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Expiration Date</strong>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <select class="form-control" name="card_month" id="card_month" required="required">
                                        <option value="">Month</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <select class="form-control" name="card_year" id="card_year" required="required">
                                        <option value="">Year</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                        <option value="2033">2033</option>
                                        <option value="2034">2034</option>
                                        <option value="2035">2035</option>
                                        <option value="2036">2036</option>
                                </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-md-12"><strong>Name on Card:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="name_on_card" id="name_on_card" required="required" /></div>
                            </div>
                            <!-- <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="address" id="address" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>State:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="state" id="state" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="zip" id="zip" required="required" /></div>
                            </div> -->
                             <div class="form-group"><div class="col-md-12">&nbsp;</div></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Pay Now</button>
                                    <!-- <input type="button" id="cardSubmitBtn" value="Pay Now" class="payment-btn" disabled="true"> -->
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!--Debit CART PAYMENT END-->
        </div>
        <div class="tab-pane" id="tab_c">
            <div class="panel panel-info radius-flat">
                <div class="panel-heading radius-flat"><span><i class="fa fa-lock"></i></span> Cash On Delivery</div>
                <div class="panel-body ">
                     <h4>Confirm order with One Time Password</h4>
                    <p>We will send One Time Password(OTP) to your mobile number and email address</p>
                    <form action="javascript:void(0)" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12"><strong>Phone Number:</strong></div>
                            <div class="col-md-12"><input type="text" name="phone_number" class="form-control radius-flat" value="<?php echo @$user_details['0']->SN_USER_MOBILE; ?>" /></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Email Address:</strong></div>
                            <div class="col-md-12"><input type="email" name="phone_number" class="form-control radius-flat" value="<?php echo @$user_details['0']->NM_USER_EMAIL; ?>" /></div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-12">
                                <a href="<?php echo base_url(); ?>checkout-confirm" class="btn btn-primary  radius-flat">Confirm</a>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
</div>
</div><!-- tab content -->
</div><!-- end of container -->
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


<script>
  $(document).ready(function(){
    jQuery.validator.addMethod("lettersonly", function(value, element)
    {
       return this.optional(element) || /^[a-z," "]+$/i.test(value);
    }, "Please enter only letters.");

    jQuery.validator.addMethod("numbersonly", function(value, element)
    {
      return this.optional(element) || /^[0-9,+]+$/i.test(value);
    }, "Please enter only numbers.");

       $("#paymentForm").validate({
        rules: {
            card_number: {
                required: true,
                maxlength: 20,
                numbersonly:true,
          },
            card_cvv: { 
               required: true,
                maxlength: 5,
                numbersonly:true,
          },
           card_month: { 
                required: true,
          }, 
           card_year: { 
                required: true,
          },
           name_on_card: { 
                required: true,
                lettersonly:true,
          }, 
           address: { 
                required: true,               
          }, 
           state: { 
                required: true,
          }, 
           zip: { 
                required: true,
          }, 
             
        },
        messages: {         
            phone: {                        
                minlength:"Please enter at least 10 digits.",
                maxlength:"Please enter no more than 15 digits.",
            },
            },  
     });
 }); 
  </script>