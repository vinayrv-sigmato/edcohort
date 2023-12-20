<!--Section-->
                <section>
                    <div class="sptb-2 bannerimg">
                        <div class="header-text mb-0">
                            <div class="container">
                                <div class="text-center text-white py-7">
                                    <h1 class="">Set New Password</h1>
                                    <ol class="breadcrumb text-center">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Set New Password</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><!--/Section-->
            </div>
        </div>
        
<!-- Shape Start -->
        <div class="relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmsns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="#f5f4f9"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

        <!--Forgot password-->
        <section class="sptb">
            <div class="container">
                <div class="row">
                
                    <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                        <?php echo message(); ?>
                        <div class="single-page w-100 p-0" >
                            <div class="wrapper wrapper2">
                                <form id="forgotpsd" action="<?php echo base_url(); ?>forgot-password" method="post" class="card-body">
                                <?php echo csrf_field(); ?>
                                    <div class="mail">
                                        <label>New Password</label>
                                        <input type="password"  id="newpassword" name="newpassword" placeholder="New Password" required="">
                                    </div>
                                     <div class="mail">
                                        <label>Confirm Password</label>
                                         <input type="password" class="form-control radius-flat" id="conpassword" data-match="#sign_up_password" data-match-error="Whoops, these don't match" name="conpassword" placeholder="Confirm Password" required="">
                                    </div>
                                    <div class="submit">
                                        
                                        <button type="submit" class="btn btn-primary btn-block" onclick="return validatePassword()">Submit</button>                            
                                    </div>
                                    <div class="text-center text-dark mb-0">
                                        Forget it, <a href="<?php echo base_url('login'); ?>" class="text-primary">send me back</a> to the sign in.
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/Forgot password-->



   



<script type="text/javascript">  

  var password = document.getElementById("newpassword")

  , confirm_password = document.getElementById("conpassword");



function validatePassword(){

  if(password.value != confirm_password.value) {

    confirm_password.setCustomValidity("Passwords Don't Match");

  } else {

    confirm_password.setCustomValidity('');

  }

}



password.onchange = validatePassword;

confirm_password.onkeyup = validatePassword;

</script>