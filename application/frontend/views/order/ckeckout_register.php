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
    background: white;
    padding: 10px 7px;
    border-radius: 0px;
    text-align: center;
    width: 102px;
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
    left: 99px;
    top: 1px;

}
.step_line.backline {
    border-left: 20px solid #f7f7f7;
    border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    z-index: 1;
    position: absolute;
    left: 99px;
    top: -3px
}
.step_complete {
    background: #428bca;
}
.step_complete a.check-bc, .step_complete a.check-bc:hover,.afix-1,.afix-1:hover{
    color: #fff;
     margin-left: 12px;
}
.step_line.step_complete {
    background: 0;
    border-left: 16px solid #428bca;
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
}
</style>
<div id="breadcrumb" class="breadcrumb">
  <div itemprop="breadcrumb" class="container">
    <div class="row">
      <div class="col-md-24"> <a href="<?php echo base_url(); ?>" class="homepage-link" title="Back to the frontpage">Home</a> <span>/</span> <span class="page-title"><?php echo $page_head; ?></span> </div>
    </div>
  </div>
</div>
<?php echo message(); ?>
    <section id="pageContent" class="page-content">
        <div class="container">
            <div class="row">               
                <div style="display: table; margin: auto; margin-bottom: 6px;">
                    <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                    <span class="step step_complete"> <a href="#" class="check-bc">Sign Up</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> <span class="step_line backline"></span> </span>
                    <span class="step_thankyou check-bc step_complete">Checkout </span>
                    <span class="step_thankyou check-bc step_complete">Payment </span>
                    <span class="step_thankyou check-bc step_complete">Thank you</span>
                </div>                
            </div>    
            <div class="row cart-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>checkout-signup-submit">
                        <?php echo csrf_field(); ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">                        
                            <div class="">
                                <a type="button" class="btn btn-primary radius-flat btn-block" href="<?php echo base_url(); ?>checkout-login"> Sign In</a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                            <div class="panel panel-info radius-flat">
                                <div class="panel-heading radius-flat">Sign Up</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-md-6 col-12">
                                            <strong>First Name:</strong>
                                            <input type="text" name="fname" id="fname" class="form-control radius-flat" value="" />
                                        </div>
                                        <div class="span1"></div>
                                        <div class="col-md-6 col-12">
                                            <strong>Last Name:</strong>
                                            <input type="text" name="lname" id="lname" class="form-control radius-flat" value="" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Email:</strong></div>
                                        <div class="col-md-12">
                                            <input type="email" class="form-control radius-flat" id="email" name="email" placeholder="Email" required="">
                                            <input type="hidden" value="<?php echo base_url(); ?>checkout-signup" name="referer">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="col-md-6 col-12">
                                            <strong>Password:</strong>
                                            <input type="password" class="form-control radius-flat" id="password" name="password"  required="">
                                        </div>
                                        <div class="span1"></div>
                                        <div class="col-md-6 col-12">
                                            <strong>Confirm Password:</strong>
                                            <input type="password" class="form-control radius-flat" id="password_confirm" name="password_confirm"  required="">
                                        </div>
                                    </div>  
                                   
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary radius-flat" >Continue</button>
                        </div>
                    </form>
            </div>
            <div class="row cart-footer"> </div>
    </div>
</section>


