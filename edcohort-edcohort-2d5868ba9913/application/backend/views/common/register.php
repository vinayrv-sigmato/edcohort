<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up | UCC</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/custom/css/intlTelInput.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/custom/css/demo.css">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>UCC</b></a>
            <!--<small>Admin BootStrap Based - Material Design</small>-->
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" action="<?php echo base_url(); ?>register-submit" method="post">
                    <div class="msg">Register a new membership</div>
                    <?php if($this->session->flashdata('alert')!=""){ ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <?php echo $this->session->flashdata('alert'); ?> 
                    </div>
                    <?php } ?>
                    <?php if($this->session->flashdata('success')){ ?>
                    
                        <div class="alert bg-green alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    
                     <?php } ?>
                    <?php echo csrf(); ?>
                   
                    <?php 
                      $referrer = $this->input->get('referrer', TRUE);
                      if(!empty($referrer)){  ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                         <input type="text" class="form-control" name="referrer" id="referrer"  maxlength="40" value="<?php echo $referrer; ?>" required placeholder="referrer" readonly>
                        </div>
                    </div>
                    <?php }  ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                        <input type="text" class="form-control" name="username" id="username" minlength="5" maxlength="40" required placeholder="Username" onblur="checkUsername(this.value)" autofocus>
                            <p class="font-italic col-pink" id="username_message"></p>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" id="email" minlength="5" maxlength="40"  required placeholder="Email" onblur="checkEmail(this.value)">
                            <p class="font-italic col-pink" id="email_message"></p>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                            <input type="hidden" name="country_code" id="country_code">
                             <input type="tel" class="form-control" name="phone" id="phone" required minlength="5" maxlength="20" placeholder="Phone">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="fname" id="fname" required minlength="3" maxlength="40" placeholder="Full name">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" minlength="5" maxlength="40" required placeholder="Password">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="repassword" id="repassword" minlength="5" maxlength="40" required placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?php echo base_url(); ?>login">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/examples/sign-up.js"></script>
    
    <script>
  function checkUsername(username)
  {      
    $.ajax({
      url: '<?php echo base_url(); ?>check-username',
      dataType: 'json',
      type: 'post',            
      data: { username: username },                                         
      success: function(data){             
           if(data.status=='0')
           { 
               $("#username_message").html(data.message);
               $("#username").addClass('glowing_border_red');
           }
           else if(data.status=='1')
           {                
              $("#username_message").html('');
              $("#username").removeClass('glowing_border_red');
           }            
      }
    }); 
  }
  function checkEmail(email)
  {      
    $.ajax({
      url: '<?php echo base_url(); ?>check-email',
      dataType: 'json',
      type: 'post',            
      data: { email: email },                                         
      success: function(data){             
           if(data.status=='0')
           { 
               $("#email_message").html(data.message);
               $("#email").addClass('glowing_border_red');
           }
           else if(data.status=='1')
           {                
              $("#email_message").html('');
              $("#email").removeClass('glowing_border_red');
           }            
      }
    }); 
  }
</script>

 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
  <script src="<?php echo base_url(); ?>assets/custom/js/intlTelInput.js"></script>
  <script>
    $("#phone").intlTelInput({

      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: "body",
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "<?php echo base_url(); ?>assets/custom/js/utils.js"
    });

 

 // $(".selected-flag").change(function () {
 //   alert();
 //        var end = this.value;
 //        var firstDropVal = $('#pick').val();
 //    });
//     $('#phone').live('onchange', function() {

//     var ide = $(this).attr('data-dial-code');
//     alert (ide);
// });
  </script>
  <script>
      
$( "ul.level-2" ).children().css( "background-color", "red" );

$( "ul.country-list" ).children().click(function ( event ) {
 
 var code= $(this).attr('data-country-code');

 $('#country_code').val(code);

});

  </script>
</body>

</html>