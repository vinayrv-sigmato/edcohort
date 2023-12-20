<style>
    .radius-flat{
        border-radius: 0px !important;
    }
    .panel-info>.panel-heading {
    color: #ffffff;
    background-color: #041e42;
    border-color: #041e42;
    padding: 5px 15px;
    margin-bottom: 20px;
    font-size: 18px;
}
    .panel-info {
        border-color: #041e42;
        border: 1px solid  #041e42;
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
    background: #041e42;
}
.step_complete a.check-bc, .step_complete a.check-bc:hover,.afix-1,.afix-1:hover{
    color: #fff;
     margin-left: 12px;
}
.step_line.step_complete {
    background: 0;
    border-left: 16px solid #041e42;
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
.row.cart-body .col-lg-8.col-md-8.col-sm-8.col-12 {
    margin-bottom: 20px;
}

</style>
<style>
.address {
    padding-left: 6px;

}
.check-address {
    padding-left: 6px;
}
.address-box {   
    border: 1px solid #041e42;
    margin-top: 5px;
     margin-bottom: 5px;
         padding: 10px;
}
.address ul {
    list-style: none;
    padding: 0;
    margin-bottom: 24px;
}
form#address-form {
    padding: 15px;
}
.address-form {
    background-color: #041e42;
}
</style>

<div class="breadcrumb ">  
   <div class="container">
    <div class="d-flex justify-content-between align-items-center">
    <div> <h2><span>Shipping Address</span></h2></div>
     <div><ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>" title="Back to the frontpage">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $page_head; ?>"><?php echo $page_head; ?></a>
      </li>
    </ul></div>
     </div>
   </div>
</div>


    <section id="pageContent" class="page-content section-top-inner">
        <div class="container">
            <div class="">               
                <div style="display: table; margin: auto;" class="mb-4">
                    <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                    <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> <span class="step_line backline"></span> </span>
                    <span class="step_thankyou check-bc step_complete">Payment </span>
                    <span class="step_thankyou check-bc step_complete">Thank you</span>
                </div>                
            </div>    
            <div class="cart-body">

                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>checkout-address-save">
                    <?php echo csrf_field(); ?>
                  <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12">
                        
                              <div class="">
                                <button type="button" class="btn btn-primary radius-flat btn-block main-btn" onclick="editAddress('0')"><i class="fa fa-plus"></i> Add New Address</button>
                              </div>
                              <?php foreach ($address as $key => $addressRow): ?>
                                <div class="col-sm-12">
                                    <div class="row address-box">
                                      <div class="cell title text-center">
                                        <h5>Address: <?php echo $key+1; ?></h5>
                                      </div>
                                      <div class="cell address">
                                        <ul>
                                          <li><?php echo $addressRow->firstname.' '.$addressRow->lastname; ?></li>
                                          <li><?php echo $addressRow->address_1; ?></li>
                                          <li>                            
                                            <span class="nowrap"><?php echo $addressRow->state; ?></span>
                                            <span class="nowrap"><?php echo $addressRow->city; ?></span>
                                            <span class="nowrap"><?php echo $addressRow->zip; ?></span> 
                                          </li>
                                          <li class="country-line"><?php echo $addressRow->country; ?></li>
                                          <li class="phone-number">Phone: <?php echo $addressRow->phone; ?></li>
                                        </ul>
                                      </div>
                                      <!-- <div class="check-address">
                                        <label for="check_address_<?php echo $addressRow->address_id; ?>"><input type="checkbox" name="ckeckbox" <?php if($addressRow->default_ship=='1'){ echo 'checked'; } ?> onclick="makeDefault('sad','<?php echo $addressRow->address_id; ?>',this.checked)" id="check_address_<?php echo $addressRow->address_id; ?>"> Default Shipping Address</label>
                                        <label for="check_baddress_<?php echo $addressRow->address_id; ?>"><input type="checkbox" name="ckeckbox" <?php if($addressRow->default_bill=='1'){ echo 'checked'; } ?> onclick="makeDefault('bad','<?php echo $addressRow->address_id; ?>',this.checked)" id="check_baddress_<?php echo $addressRow->address_id; ?>"> Default Billing Address</label>
                                      </div> -->
                                      <div class="cell edit">
                                      <div class="row">
                                            <div class="col-sm-12 ">
                                          <button type="button" class="btn btn-primary radius-flat btn-block main-btn" onclick="editAddress('<?php echo $addressRow->address_id; ?>')"><i class="fa fa-pencil"></i> USE THIS</button>
                                        </div>
                                      </div>
                                        
                                      </div>
                                    </div>
                                </div>
                               <?php endforeach ?>
                            
                 </div>
               <div class="col-lg-8 col-md-12 col-sm-12">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info radius-flat">
                        <div class="panel-heading radius-flat">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                             <input type="hidden" id="address_id" name="address_id" value="<?php echo @$shipping_address['0']->address_id; ?>">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Country:</strong></div>
                                <div class="col-md-12">
                                    <select name="ship_country" id="ship_country" class="form-control radius-flat"  onchange="get_state(this.value,'ship_state')">
                                        <option value="">Select Country</option>
                                        <?php foreach ($country as $row): ?>
                                            <option value="<?php echo $row->name; ?>" <?php if(@$shipping_address['0']->country==$row->name){ echo 'selected';} ?>><?php echo $row->name; ?></option>
                                        <?php endforeach ?>                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                               <div class="row mx-0">
                                    <div class="col-md-6 col-12">
                                    <strong>First Name:</strong>
                                    <input type="text" name="ship_fname" id="ship_fname" class="form-control radius-flat" value="<?php echo @$shipping_address['0']->firstname; ?>" />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-12">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="ship_lname" id="ship_lname" class="form-control radius-flat" value="<?php echo @$shipping_address['0']->lastname; ?>" />
                                </div>
                               </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="ship_address" id="ship_address" class="form-control radius-flat" value="<?php echo @$shipping_address['0']->address_1; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="ship_city" id="ship_city" class="form-control radius-flat" value="<?php echo @$shipping_address['0']->city; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>State:</strong></div>
                                <div class="col-md-12">
                                    <select name="ship_state" id="ship_state" class="form-control radius-flat" required="" >
                                        <option value="">Select State</option>
                                        <?php foreach ($ship_states as $row): ?>
                                            <option value="<?php echo $row->name; ?>" <?php if(@$shipping_address['0']->state==$row->name){ echo 'selected';} ?>><?php echo $row->name; ?></option>
                                        <?php endforeach ?>                                                                                
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="ship_zip" id="ship_zip" class="form-control radius-flat" value="<?php echo @$shipping_address['0']->zip; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input type="text" id="ship_phone" name="ship_phone" class="form-control radius-flat" value="<?php echo @$shipping_address['0']->phone; ?>" required /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                <div class="col-md-12"><input type="email" id="ship_email" name="ship_email" class="form-control radius-flat" value="<?php echo @$shipping_address['0']->email; ?>" required/></div>
                            </div>
                            <?php if(!$this->session->userdata('user_id')){ ?>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Password:</strong></div>
                                <div class="col-md-12"><input type="password" id="password" name="password" class="form-control radius-flat" /></div>
                            </div>
                            <?php } ?>

                            <div class="form-group">
                                <div class="col-md-12 checkbox-ch"><input type="checkbox" class="form-control radius-flat" value="1" name="bill_check" checked="" id="chkPassport" /> Billing address is same as shipping address </div>
                            </div>

                        </div>
                    </div>


                    <div>
                        <div class="panel panel-info radius-flat" id="dvPassport" style="display: none">
                        <div class="panel-heading radius-flat">Additional Address Details</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Country:</strong></div>
                                <div class="col-md-12">
                                    <select name="bill_country" id="bill_country" class="form-control radius-flat" onchange="get_state(this.value,'bill_state')">
                                        <option value="">Select Country</option>
                                        <?php foreach ($country as $row): ?>
                                            <option value="<?php echo $row->name; ?>" <?php if(@$billing_address['0']->country==$row->name){ echo 'selected';} ?>><?php echo $row->name; ?></option>
                                        <?php endforeach ?>                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-12">
                                    <strong>First Name:</strong>
                                    <input type="text" name="bill_fname" id="bill_fname" class="form-control radius-flat" value="<?php echo @$billing_address['0']->firstname; ?>" />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-12">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="bill_lname" class="form-control radius-flat" value="<?php echo @$billing_address['0']->lastname; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="bill_address" id="bill_address" class="form-control radius-flat" value="<?php echo @$billing_address['0']->address_1; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="bill_city" id="bill_city" class="form-control radius-flat" value="<?php echo @$billing_address['0']->city; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>State:</strong></div>
                                <div class="col-md-12">
                                    <select name="bill_state" id="bill_state" class="form-control radius-flat"  >
                                        <option value="">Select State</option>
                                        <?php foreach ($bill_states as $row): ?>
                                            <option value="<?php echo $row->name; ?>" <?php if(@$billing_address['0']->state==$row->name){ echo 'selected';} ?>><?php echo $row->name; ?></option>
                                        <?php endforeach ?>                                                                                
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="bill_zip" id="bill_zip" class="form-control radius-flat" value="<?php echo @$billing_address['0']->zip; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input type="text" name="bill_phone" id="bill_phone" class="form-control radius-flat" value="<?php echo @$billing_address['0']->phone; ?>" /></div>
                            </div>                           
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                <div class="col-md-12"><input type="email" name="bill_email" id="bill_email" class="form-control radius-flat" value="" /></div>
                            </div>                           
                        </div>
                    </div>
                    </div>                    

                    <button type="submit" class="btn btn-primary radius-flat main-btn mt-4" onclick="return validate()">Save & continue</button>
                  
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-12">

                 </div>
                  </div>
                </form>
            </div>
            <div class=" cart-footer">
        
            </div>
    </div>
</section>

<script type="text/javascript">
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").hide();
            } else {
                $("#dvPassport").show();
            }
        });
    });
</script>
<script>
    function get_state(value,id)
    {
        var html="";
            $.ajax({
            url: base_url+'order/get_state',
            dataType: 'json',
            type: 'get',            
            data: { "country": value, },                                         
            success: function(data){
                //alert(data);                
                var details=data.records;        
                var details_length=details.length; 
                for (var i = 0; i < details_length; i++) 
                {
                    html +='<option value="'+details[i].name+'">'+details[i].name+'</option>';
                }       
                //alert(html);     
                $("#"+id).html(html);
            },
            beforeSend: function () {
                $("#loadingDiv").show();
                $("#body").addClass('opacity-body');
            },
            complete: function () {
                $("#loadingDiv").hide();
                $("#body").removeClass('opacity-body');
            }  

        });
    }
    function get_state1(value,select)
    {
        var html="";
        var selected='';
            $.ajax({
            url: base_url+'order/get_state',
            dataType: 'json',
            type: 'get',            
            data: { "country": value },                                         
            success: function(data){
                //alert(data);                
                var details=data.records;        
                var details_length=details.length; 
                html +='<option value="">Select State</option>';
                for (var i = 0; i < details_length; i++) 
                {
                    if(details[i].name===select){ selected='selected'; } else { selected=''; }
                    html +='<option value="'+details[i].name+'" '+selected+' >'+details[i].name+'</option>';
                }    
                $("#ship_state").html(html);
            },  

        });
    }
</script>
<script>
        function validate() {  

            if ($("#ship_country").val().trim() == "") { 
                $("#ship_country").addClass('glowing-border-red');
                return false;
            }
            else {
                $("#ship_country").removeClass('glowing-border-red');
            }
            if ($("#ship_fname").val().trim() == "") { 
                $("#ship_fname").addClass('glowing-border-red');
                return false;
            }
            else {
                $("#ship_fname").removeClass('glowing-border-red');
            } 
            if ($("#ship_address").val().trim() == "") { 
                $("#ship_address").addClass('glowing-border-red');
                return false;
            }
            else {
                $("#ship_address").removeClass('glowing-border-red');
            }
            if ($("#ship_city").val().trim() == "") { 
                $("#ship_city").addClass('glowing-border-red');
                return false;
            }
            else {
                $("#ship_city").removeClass('glowing-border-red');
            }
            if ($("#ship_state").val().trim() == "") { 
                $("#ship_state").addClass('glowing-border-red');
                return false;
            }
            else {
                $("#ship_state").removeClass('glowing-border-red');
            }  
            if ($("#ship_zip").val().trim() == "") { 
                $("#ship_zip").addClass('glowing-border-red');
                return false;
            }
            else {
                $("#ship_zip").removeClass('glowing-border-red');
            }    
            if ($("#ship_phone").val().trim() == "") { 
                $("#ship_phone").addClass('glowing-border-red');
                return false;
            }
            else {
                $("#ship_phone").removeClass('glowing-border-red');
            }
            if ($("#ship_email").val().trim() == "") { 
                $("#ship_email").addClass('glowing-border-red');
                return false;
            }
            else {
                $("#ship_email").removeClass('glowing-border-red');
            }

            if(!$("#chkPassport").is(":checked")){

                if ($("#bill_country").val().trim() == "") { 
                    $("#bill_country").addClass('glowing-border-red');
                    return false;
                }
                else {
                    $("#bill_country").removeClass('glowing-border-red');
                }
                if ($("#bill_fname").val().trim() == "") { 
                    $("#bill_fname").addClass('glowing-border-red');
                    return false;
                }
                else {
                    $("#bill_fname").removeClass('glowing-border-red');
                } 
                if ($("#bill_address").val().trim() == "") { 
                    $("#bill_address").addClass('glowing-border-red');
                    return false;
                }
                else {
                    $("#bill_address").removeClass('glowing-border-red');
                }
                if ($("#bill_city").val().trim() == "") { 
                    $("#bill_city").addClass('glowing-border-red');
                    return false;
                }
                else {
                    $("#bill_city").removeClass('glowing-border-red');
                }
                if ($("#bill_state").val().trim() == "") { 
                    $("#bill_state").addClass('glowing-border-red');
                    return false;
                }
                else {
                    $("#bill_state").removeClass('glowing-border-red');
                }  
                if ($("#bill_zip").val().trim() == "") { 
                    $("#bill_zip").addClass('glowing-border-red');
                    return false;
                }
                else {
                    $("#bill_zip").removeClass('glowing-border-red');
                }    
                if ($("#bill_phone").val().trim() == "") { 
                    $("#bill_phone").addClass('glowing-border-red');
                    return false;
                }
                else {
                    $("#bill_phone").removeClass('glowing-border-red');
                } 
                if ($("#bill_email").val().trim() == "") { 
                    $("#bill_email").addClass('glowing-border-red');
                    return false;
                }
                else {
                    $("#bill_email").removeClass('glowing-border-red');
                } 
            }   
            

        }


</script>
<script>
    function editAddress(address_id)
    {
        var html="";
            $.ajax({
            url: base_url+'user/get_address',
            dataType: 'json',
            type: 'get',            
            data: { "address_id": address_id, },                                         
            success: function(data){
                //console.log(data);                
                var details=data.records; 
                var details_length=details.length; 
                if(details_length)
                {
                  get_state1(details[0].country,details[0].state);
                  $('#ship_fname').val(details[0].firstname);
                  $('#ship_lname').val(details[0].lastname);
                  $('#ship_phone').val(details[0].phone);
                  $('#ship_address').val(details[0].address_1);
                  $('#ship_country').val(details[0].country);
                  $('#ship_city').val(details[0].city);
                  $('#ship_zip').val(details[0].zip);
                  $('#address_id').val(details[0].address_id);

                  if(details[0].default_ship!=0){
                    $('#check_address').prop('checked',true);
                  }
                  else{
                    $('#check_address').prop('checked',false);  
                  }

                  if(details[0].default_bill!=0){
                    $('#check_baddress').prop('checked',true);
                  }
                  else{
                    $('#check_baddress').prop('checked',false);
                  }

                }
                else
                {
                  $('#ship_fname').val('');
                  $('#ship_lname').val('');
                  $('#ship_phone').val('');
                  $('#ship_address').val('');
                  $('#ship_country').val('');
                  $('#ship_state').val('');
                  $('#ship_city').val('');
                  $('#ship_zip').val('');
                  $('#address_id').val('');
                  
                  $('#check_address').prop('checked',false);                  
                  $('#check_baddress').prop('checked',false);                  
                }    
                $(".address-form").show();
            },  

        });
    }
</script>
