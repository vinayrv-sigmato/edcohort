<div class="breadcrumb ">  
   <div class="container">
    <div class="d-flex justify-content-between align-items-center">
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
    <section id="pageContent" class="page-content padding-two form-design section-top-inner">
        <div class="container">
            <div class=" cart-body">
               <form class="form-horizontal" action="<?php echo base_url(); ?>signup-submit" method="post">
                <?php echo csrf_field(); ?>
               <div class="row justify-content-center">
                   <div class="col-lg-4 col-md-6 col-sm-6 col-12">                   
                        <div class="">
                            <div class="panel-heading padding-two text-center text-uppercase"><h4>Create Account</h4></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-12">
                                       <!--  <h4>Registration Form :</h4> -->
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="">
                                        <input type="text" class="form-control radius-flat" id="sign_up_name" name="name" placeholder="Name" required="">
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="">
                                        <input type="email" class="form-control radius-flat" id="sign_up_email" name="email" placeholder="Email"  required="">
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="">
                                        <select class="form-control radius-flat" data-placeholder="Select Country" name="country" id="country">
                                                    <option value="">Select Country</option>
                                                  <?php foreach ($country_list as $country): ?>
                                                    <option value="<?php echo $country->id; ?>" ><?php echo $country->name; ?></option>
                                                  <?php endforeach ?> 
                                                </select>
                                    </div>
                                </div>
                           <div class="form-group">                                    
                                    <div class="">
                                        <select class="form-control radius-flat" data-placeholder="Select Country" name="currency" id="currency">
                                                    <option value="">Select Currency</option>
                                                  <?php foreach ($currency_list as $currency): ?>
                                                    <option value="<?php echo $currency->currency_id; ?>" ><?php echo $currency->currency_name; ?></option>
                                                  <?php endforeach ?> 
                                                </select>
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="">
                                         <input type="password" data-toggle="validator" data-minlength="6" class="form-control radius-flat" id="sign_up_password" name="password" placeholder="Password" required="">
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="">
                                         <input type="password" class="form-control radius-flat" id="sign_up_password_confirm" data-match="#sign_up_password" data-match-error="Whoops, these don't match" name="password_confirm" placeholder="Confirm password" required="">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="">
                                        <label>
                                            <input type="checkbox" class="" id="terms" data-error="Before you wreck yourself" required="">
                                            I have read and accept terms of use.
                                        </label>
                                        <div class="text-danger" id="sign_up_message"></div>
                                    </div>
                                </div>
                           </div>
                           <div>
                            <button type="submit" class="btn btn-orange btn-block padding-two text-med radius-flat main-btn" onclick="return validateSignUp()">Sign Up</button>
                           </div>
                        </div> 
                   </div>
               </div>
               </form>
            </div>
    </div>
</section>
