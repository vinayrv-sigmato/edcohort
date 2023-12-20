<style>

.address {

    padding-left: 6px;

}

.check-address {

    padding-left: 6px;

}

.address-box {   

    border: 1px solid #03619e;

    background-color: #f5f5f5;

    margin-top: 5px;

     margin-bottom: 5px;

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

    background-color: #f5f5f5;
    padding: 15px;

}

</style>

<div class="breadcrumb ">  
   <div class="container">
    <div class="d-flex justify-content-between">
    <div> <h2><span>Address</span></h2></div>
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

<section class="section-top-inner address-page">

  <div class="container">

    <div class="row">

      <?php $this->load->view('common/sidebar'); ?>



        <div class="col-lg-9">

          <div class="card">

            <div class="card-header">Address Info.</div>

            <div class="card-body">

              <div class="box-body">                  
<div class="row">
  
                <div class="col-sm-12 col-md-4">

                  <div class="">

                    <button class="main-btn add-address" onclick="editAddress('0')"><i class="fa fa-plus"></i> Add New Address</button>

                  </div>

                  <?php foreach ($address as $key => $addressRow): ?>

                  <div class="row">
                      <div class="col-sm-12">

                        <div class="address-box">

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

                          <div class="check-address">

                            <label for="check_address_<?php echo $addressRow->address_id; ?>"><input type="checkbox" name="ckeckbox" <?php if($addressRow->default_ship=='1'){ echo 'checked'; } ?> onclick="makeDefault('sad','<?php echo $addressRow->address_id; ?>',this.checked)" id="check_address_<?php echo $addressRow->address_id; ?>"> Default Shipping Address</label>

                            <label for="check_baddress_<?php echo $addressRow->address_id; ?>"><input type="checkbox" name="ckeckbox" <?php if($addressRow->default_bill=='1'){ echo 'checked'; } ?> onclick="makeDefault('bad','<?php echo $addressRow->address_id; ?>',this.checked)" id="check_baddress_<?php echo $addressRow->address_id; ?>"> Default Billing Address</label>

                          </div>

                          <div class="cell edit">

                            <div class="row">
                              <div class="col-sm-6">

                              <button class="btn main-btn" onclick="editAddress('<?php echo $addressRow->address_id; ?>')"><i class="fa fa-pencil"></i> Edit</button>

                            </div>

                            <div class="col-sm-6">

                              <button class="btn secondary-btn" onclick="deleteAddress('<?php echo $addressRow->address_id; ?>')"><i class="fa fa-trash"></i> Delete</button>

                            </div>
                            </div>

                          </div>

                        </div>

                    </div>
                  </div>

                   <?php endforeach ?>

                </div>

                

                <div class="col-sm-12 col-md-8 address-form" style="display: none">

                  <form class="form-horizontal" action="<?php echo base_url(); ?>update-billing-address" id="address-form" method="post" name="validate_profile">

                    <?php echo csrf_field(); ?>

                    <input type="hidden" id="address_id" name="address_id">

                    <div class="form-group">

                    <div class="row">
                        <label for="inputEmail3" class="col-sm-3 control-label">First Name *</label>

                      <div class="col-sm-9">

                          <input type="text" class="form-control radius-flat" name="firstname" id="ship_fname"  maxlength="40" >

                      </div>
                    </div>

                    </div>

                    <div class="form-group">

                        <div class="row">
                          <label for="inputEmail3" class="col-sm-3 control-label">Last Name </label>

                        <div class="col-sm-9">

                            <input type="text" class="form-control radius-flat" name="lastname" id="ship_lname"  maxlength="40">

                        </div>
                        </div>

                    </div>

                    <div class="form-group">

                      <div class="row">
                          <label for="inputPassword3" class="col-sm-3 control-label">Phone No*</label>

                        <div class="col-sm-9">

                            <input type="text" class="form-control radius-flat" name="phone" id="ship_phone"   maxlength="13">

                        </div>

                      </div>
                    </div>

                    <div class="form-group">

                       <div class="row">
                          <label for="inputPassword3" class="col-sm-3 control-label">Address*</label>

                        <div class="col-sm-9">

                            <input type="text" class="form-control radius-flat" name="address1" id="ship_address"  required maxlength="200">

                        </div>
                       </div>

                    </div>

                    <div class="form-group">

                       <div class="row">
                          <label for="inputPassword3" class="col-sm-3 control-label">Country*</label>

                        <div class="col-sm-9">

                            <select name="country" id="ship_country" class="form-control radius-flat" onchange="get_state(this.value)">

                                <option value="">Select Country</option>

                                <?php foreach ($country as $row):?>                            

                                    <option value="<?php echo $row->name; ?>" ><?php echo $row->name; ?></option>

                                <?php endforeach ?>                                        

                            </select>

                        </div>
                       </div>

                    </div>

                    <div class="form-group">

                       <div class="row">
                          <label for="inputPassword3" class="col-sm-3 control-label">State*</label>

                        <div class="col-sm-9">

                            <select name="state" id="ship_state" class="form-control radius-flat">

                                <option value="">Select State</option>                                                                                                               

                            </select>

                        </div>
                       </div>

                    </div>

                    <div class="form-group">

                        <div class="row">
                          <label for="inputPassword3" class="col-sm-3 control-label">City*</label>

                        <div class="col-sm-9">

                            <input type="text" class="form-control radius-flat" name="city" id="ship_city"  required maxlength="50">

                        </div>
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="row">
                          <label for="inputPassword3" class="col-sm-3 control-label">Zip</label>

                        <div class="col-sm-9">

                            <input type="text" class="form-control radius-flat" name="zip" id="ship_zip"  maxlength="13">

                        </div>
                        </div>

                    </div>

                    <div class="form-group">                        

                     
                        <div class="row">
                             <div class="col-sm-6">

                            <label for="check_address" class="font-normal"><input type="checkbox" name="ds_address" id="check_address" value="1"> Default Shipping Address</label>                            

                          </div>

                          <div class="col-sm-6">                            

                            <label for="check_baddress"><input type="checkbox" name="db_address" id="check_baddress" value="1"> Default Billing Address</label>

                          </div>
                        </div>

                       

                    </div>

                    <div class="form-group">

                        <div class="col-sm-12">

                            <button type="submit" class="btn main-btn pull-right" onclick="return validate()">Save</button>

                        </div>

                    </div>

                  </form>

                </div>

</div>
            </div>            

            </div>

           <!--  <div class="card-footer">
 -->
              <!-- <button type="button" class="btn btn-danger radius-flat" onclick="window.history.back()">Cancel</button> -->

           <!--  </div> -->

          </div>

      </div>





    </div>

  </div>

</section>



<script>

    function get_state(value,select)

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

    function makeDefault(type,address_id,value)

    {

      if(value){

        value=1;

      }

      else{

        value=0;

      }

        var html="";

        var selected='';

            $.ajax({

            url: base_url+'make-default-address',

            dataType: 'json',

            type: 'get',            

            data: { "address_id": address_id, 'type': type ,'value':value},                                         

            success: function(data){

                location.href=base_url+'address' 

            }, 

        });

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

                  get_state(details[0].country,details[0].state);

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

        function validate() {  

            

            if ($("#ship_fname").val().trim() == "") { 

                $("#ship_fname").addClass('glowing-border-red');

                return false;

            }

            else {

                $("#ship_fname").removeClass('glowing-border-red');

            } 

            if ($("#ship_phone").val().trim() == "") { 

                $("#ship_phone").addClass('glowing-border-red');

                return false;

            }

            else {

                $("#ship_phone").removeClass('glowing-border-red');

            }

            if ($("#ship_address").val().trim() == "") { 

                $("#ship_address").addClass('glowing-border-red');

                return false;

            }

            else {

                $("#ship_address").removeClass('glowing-border-red');

            }

            if ($("#ship_country").val().trim() == "") { 

                $("#ship_country").addClass('glowing-border-red');

                return false;

            }

            else {

                $("#ship_country").removeClass('glowing-border-red');

            }

            

            if ($("#ship_state").val().trim() == "") { 

                $("#ship_state").addClass('glowing-border-red');

                return false;

            }

            else {

                $("#ship_state").removeClass('glowing-border-red');

            }  

            if ($("#ship_city").val().trim() == "") { 

                $("#ship_city").addClass('glowing-border-red');

                return false;

            }

            else {

                $("#ship_city").removeClass('glowing-border-red');

            }

            if ($("#ship_zip").val().trim() == "") { 

                $("#ship_zip").addClass('glowing-border-red');

                return false;

            }

            else {

                $("#ship_zip").removeClass('glowing-border-red');

            }    

             



        }





</script>

