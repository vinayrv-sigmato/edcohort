

<div class="breadcrumb ">  
   <div class="container">
    <div class="d-flex justify-content-between">
    <div> <h2><span>Register</span></h2></div>
     <div><ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>" class="homepage-link" title="Back to the frontpage">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" >Register</a>
      </li>
    </ul></div>
     </div>
   </div>
</div>


<?php echo message(); ?>
<section class="border-bottom-light sm-text-center section-padding ">
  <div class="container">
    <div class="row">
      <?php $this->load->view('common/sidebar'); ?>

      <div class="col-lg-9">
        <form class="form-horizontal" action="<?php echo base_url(); ?>update-billing-address" id="profile_form" method="post" name="validate_profile" enctype="multipart/form-data">
          <div class="panel panel-info radius-flat">
            <div class="panel-heading radius-flat"><h4>Address Info. </h4></div>
            <div class="panel-body">
              <?php echo csrf_field(); ?>
              <div class="box-body">  
               <h4 class="text-center">Shipping Address</h4>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">First Name *</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control radius-flat" name="firstname" id="ship_fname" value="<?php echo $shipping_address['0']->first_name ;?>" maxlength="40" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode === 32)">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Last Name </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control radius-flat" name="lastname" id="ship_lname" value="<?php echo $shipping_address['0']->last_name ;?>" maxlength="40">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Phone No*</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control radius-flat" name="phone" id="ship_phone" onkeypress="return event.charCode >=8 && event.charCode <=57" value="<?php echo $shipping_address['0']->phone ;?>" maxlength="13">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Address*</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control radius-flat" name="address1" id="ship_address" value="<?php echo $shipping_address['0']->address_1 ;?>" required maxlength="200">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Country*</label>
                    <div class="col-sm-9">
                        <select name="country" id="ship_country" class="form-control radius-flat" onchange="get_state(this.value,'ship_state')">
                            <option value="">Select Country</option>
                            <?php foreach ($country as $row):?>                            
                                <option value="<?php echo $row->name; ?>" <?php if($shipping_address['0']->country==$row->name){ echo 'selected';}?>><?php echo $row->name; ?></option>
                            <?php endforeach ?>                                        
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">State*</label>
                    <div class="col-sm-9">
                        <select name="state" id="ship_state" class="form-control radius-flat">
                            <option value="">Select State</option>
                            <?php foreach ($ship_states as $row ): ?>
                                <option value="<?php echo $row->name; ?>" <?php if($shipping_address['0']->state==$row->name){ echo 'selected';} ?>><?php echo $row->name; ?></option>
                            <?php endforeach ?>                                                                                
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">City*</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control radius-flat" name="city" id="ship_city" value="<?php echo $shipping_address['0']->city ;?>" required maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Zip</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control radius-flat" name="zip" id="ship_zip" value="<?php echo $shipping_address['0']->zip ;?>" maxlength="13">
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label"><input type="checkbox" value="1" name="bill_check" checked="" id="chkPassport" /> Billing address is same as shipping address </label>
                </div>

            </div>            
            </div>
            <div class="panel-footer">
              <button type="submit" class="btn btn-primary radius-flat" onclick="return validate()">Update</button>
              <button type="button" class="btn btn-danger radius-flat" onclick="window.history.back()">Cancel</button>
            </div>
          </div>
        </form>
      </div>


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
            }   
            

        }


</script>
