<?php
require_once APPPATH.'third_party/Facebook/autoload.php';
$fb = new Facebook\Facebook([
    'app_id' => fbAppId,
    'app_secret' => fbAppSecret,
    'default_graph_version' => 'v2.2',
  ]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; 
$loginUrl = $helper->getLoginUrl(base_url().'facebook-login/', $permissions);
$authUrl = $loginUrl;
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
include_once APPPATH.'third_party/google-api-php-client-2/vendor/autoload.php';
$clientId = GoogleClientId;
$clientSecret = GoogleClientSecret;
$redirectUrl1 = base_url().'google-login';
// Google Client Configuration
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Edcohort');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl1);
$gClient->setScopes(array(
                "https://www.googleapis.com/auth/plus.login",
                "https://www.googleapis.com/auth/userinfo.email",
                "https://www.googleapis.com/auth/userinfo.profile",
                "https://www.googleapis.com/auth/plus.me"
                ));
$authUrl1 = $gClient->createAuthUrl();
?>

<!--Section-->
                <section>
                    <div class="banner-1 cover-image bg-background-1" data-bs-image-src="<?php echo base_url(); ?>assets/images/banners/5.jpg">
                        <div class="header-text mb-0">
                            <div class="container">
                                <div class="text-center text-white py-7">
                                    <h1 class="">Login</h1>
                                    <ol class="breadcrumb text-center">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                        <li class="breadcrumb-item active text-white" aria-current="page">Login</li>
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
<?php //echo message(); ?>


   <!--Login-Section-->
        <section class="sptb">
            <div class="container customerpage">
                <div class="row">
                    <div class="col-lg-5 col-xl-5 col-md-6 d-block mx-auto">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-md-12 register-right">
                                <ul class="nav nav-tabs nav-justified mb-5 p-2 border" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active m-1 border" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link m-1 border" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="card">
                                            <div class="card-body p-6">
                                                <div class="mb-6">
                                                    <h5 class="fs-25 font-weight-semibold">Login</h5>
                                                   <div class="alert alert-outline alert-outline-success login-message-success" id="#login-message-success" role="alert" style="display:none;"><button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button><p id="text-message-login-success"></p></div>
                                                    <div class="alert alert-outline alert-outline-danger login-message-error" id="#login-message-error"  role="alert" style="display:none"><button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button><p id="text-message-login-error"></p></div>
                                                </div>
                                                <div class="single-page customerpage">
                                                    <div class="wrapper wrapper2 box-shadow-0">
                                                        <form id="login" class="" action="javascript:void(0)" method="post" tabindex="500">
                                                            <div class="mail">
                                                                <label>Email</label>
                                                                <input type="email" name="username" required="required">
                                                            </div>
                                                            <div class="passwd">
                                                                <label>Password</label>
                                                                <input type="password" name="password" required="required">
                                                            </div>
                                                            <div class="submit">
                                                                <a class="btn btn-primary btn-block fs-16" onclick="login()">Login</a>
                                                            </div>
                                                            <div class="d-flex mb-0">
                                                                <p class="mb-0"><a href="<?php echo base_url('forgot-password'); ?>" >Forgot Password</a></p>
                                                                <!-- <p class="text-dark mb-0 ms-auto">Don't have account?<a href="#profile" class="text-primary ms-1">Signup</a></p> -->
                                                                    <!-- <div class="row">
                                                                    <p>

                                                                        <span class="fblogin">
                                                                            <a href="<?php echo $authUrl; ?>" class="btn btn-primary radius-flat fb"><i class="fa fa-facebook" aria-hidden="true"></i> Continue with Facebook</a>
                                                                        </span>
                                                                        <span class="googlepluslogin">
                                                                            <a href="<?php echo $authUrl1; ?>" class="btn btn-primary radius-flat google"> Continue with Google</a>
                                                                        </span>
                                                                    </p>
                                                                </div> -->
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body p-6 border-top">
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="modal-title fs-20 font-weight-semibold">Login with Social</h5>
                                                        <p class="fs-16">If you are going to use a passage of Lorem Ipsum</p>
                                                        <div class="">
                                                            <div class="btn-group mb-3 mb-lg-0">
                                                                <a href="<?php echo $authUrl; ?>" class="social-button"><span class="fa fa-facebook"></span> Facebook</a>

                                                            </div>
                                                            <div class="btn-group mb-3 mb-lg-0">
                                                                <a href="<?php echo $authUrl1; ?>" class="social-button"> <span class="fa fa-google"></span> Google</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="card">
                                            <div class="card-body p-6">
                                                <div class="mb-6">
                                                    <h5 class="fs-25 font-weight-semibold">Register</h5>                                                    
                                                    <div class="alert alert-outline alert-outline-success reg-message-success" id="reg-message-success" role="alert" style="display:none;"><button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button><p id="text-message-success"></p></div>
                                                    <div class="alert alert-outline alert-outline-danger reg-message-error" id="reg-message-error"  role="alert" style="display:none"><button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button><p id="text-message-error"></p></div>
                                                </div>
                                                <div class="single-page customerpage">
                                                    <div class="wrapper wrapper2 box-shadow-0">
                                                        <form id="register" class="" action="javascript:void(0)" method="post" tabindex="500">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="name">
                                                                <label>Name</label>
                                                                <input type="text" id="sign_up_name" name="name" required>
                                                            </div>
                                                            <div class="mail">
                                                                <label>Email</label>
                                                                <input type="email" id="sign_up_email" name="email" required>
                                                            </div>
                                                            <div class="passwd">
                                                                <label>Phone</label>
                                                                <input type="number" name="phone" id="sign_up_phone" placeholder="Phone" required="">
                                                            </div>
                                                            <div class="passwd">
                                                                <label>Password</label>
                                                                <input type="password" name="password" id="sign_up_password" placeholder="Password" required="">
                                                            </div>
                                                             
                                                            <div class="passwd">
                                                                <label>Confirm Password</label>
                                                                <input type="password" name="password_confirm" id="sign_up_password_confirm" placeholder="Confirm Password" required="">
                                                            </div>
                                                            
                                                            <div class="passwd">
                                                                <label>Type</label>
                                                                <select class="form-control" name="role_id" id="role_id"  onchange="doAction(this)"  required>
                                                                <option>Select</option>
                                                          <?php foreach ($role_list as  $role) { ?>
                                                              <option value="<?php echo $role->role_id ?>"><?php echo $role->title ?></option>
                                                         <?php } ?>
                                                        </select>
                                                            </div>
                                                            
                                                            <div class="passwd" id="role_div" style="display:none">
                                                                <label>Brand</label>
                                                                <select class="form-control" name="brand_id" id="brand_id" required>
                                                          <?php foreach ($brand_list as  $brand) { ?>
                                                              <option value="<?php echo $brand->brand_id ?>" ><?php echo $brand->brand_name ?></option>
                                                         <?php } ?>
                                                        </select>
                                                            </div>
                                                            
                                                            <div class="submit">
                                                                <a class="btn btn-primary btn-block" id="registraton" onclick="registration()">Register</a>
                                                            </div>
                                                            <!-- <p class="text-dark mb-0">Already have an account?<a href="#home" class="text-primary ms-1">Sign In</a></p> -->
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body p-6 border-top">
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="modal-title fs-20 font-weight-semibold">Login with Social</h5>
                                                        <p class="fs-16">If you are going to use a passage of Lorem Ipsum</p>
                                                        <div class="">
                                                            <div class="btn-group mb-3 mb-lg-0">
                                                                <a href="<?php echo $authUrl; ?>" class="social-button"><span class="fa fa-facebook"></span> Facebook</a>

                                                            </div>
                                                            <div class="btn-group mb-3 mb-lg-0">
                                                                <a href="<?php echo $authUrl1; ?>" class="social-button"> <span class="fa fa-google"></span> Google</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/Login-Section-->
        <!--Section-->


<script>
    
    

    function doAction(val){
        //Forward browser to new url
       
        var roleId = $('#role_id').val();

        if(roleId == 2){
             $("#role_div").show();
         }else{
          $("#role_div").hide();  
         }
       //alert(roleId);
        //window.location= base_url+'admin_counselling/add_counselling/'+getbrand+'?brand_id='+getbrand+'&create_for='+create_for+'';
       // window.location= base_url+'review/' +val+'?course_type='+course_type+'&class='+getclass+'';
    }
</script>