<!--Section-->
    <!-- <section class="cover-image sptb bg-background-1" data-bs-image-src="<?php echo base_url(); ?>assets/images/banners/banner5.jpg">
      <div class="content-text mb-0">
        <div class="container">
          
        </div>
      </div>
    </section> -->
    <!--/Section-->

    <!--Section-->
    <div class="position-relative">
            <div class="shape overflow-hidden bottom-footer-shape">
                <svg viewBox="0 0 2880 48" fill="none" xmsns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
    <!--/Section-->

	<!--Footer Section-->
    <footer class="bg-dark">
      <div class="footer-main footer-main1 pb-1">
        <div class="bg-dark text-white p-0">
          <div class="container">
            <div class="text-white">
            <div class="row">
              <div class="col-lg-12 text-center">
                <div class="mt-0">
                  <h1 class="mb-2 font-weight-semibold text-white">Subscribe</h1>
                  <p class="fs-18 mb-0">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-6">
                <div class="mt-4">
                  <div class="join-email" id="joinus"></div>
                  <form action="javascript:void(0)" class="footer-email" method="post" name="subscriber_form" id="subscriber_form">
                    <div class="input-group sub-input mt-1">
                      <input class="form-control input-lg  br-ts-7  br-bs-7" id="newsletter" type="email" name="user_subs_email" placeholder="Enter your Email">
                      <div class="input-group-text ">                       
                        <button class="btn btn-secondary btn-lg br-te-7  br-be-7" type="submit" aria-label="Subscribe">Subscribe </button>
                      </div>
                    </div>
                </form>
                </div>
              </div>
              <div class="col-lg-3"></div>
            </div>
          </div>
            <ul class="list-unstyled list-inline mt-5 mb-lg-0 mb-5 text-center">
              <li class="list-inline-item">
                <a class="social-icons btn-sm rgba-white-slight waves-effect waves-light">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="social-icons btn-sm rgba-white-slight waves-effect waves-light">
                  <i class="fa fa-whatsapp"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="social-icons btn-sm rgba-white-slight waves-effect waves-light">
                  <i class="fa fa-telegram"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="social-icons btn-sm rgba-white-slight waves-effect waves-light">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
            </ul>
            <div class="p-2 text-center footer-links">
              <a href="javascript:void(0)" class="btn btn-link">Contact Us</a>
              <a href="javascript:void(0)" class="btn btn-link">Review Us</a>
              <a href="javascript:void(0)" class="btn btn-link">Partner Us</a>
              <a href="javascript:void(0)" class="btn btn-link">About Us</a>
            </div>

          </div>
        </div>
      </div>

      
      <div class="py-3 bg-dark">
        <div class="container">
          <div class="row d-flex">
            <div class="col-lg-12 col-sm-12  mt-2 mb-2 text-center text-white">
              Copyright © 2022 <a href="javascript:void(0)"  class="fs-14 text-white">Edcohort</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0)" class="fs-14 text-white"> Delta Clue </a> All rights reserved.
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--Footer Section-->
    
    <!-- Message Modal -->
			<div class="modal fade" id="exampleModal3" tabdocumentation="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="example-Modal3">Login</h5>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
            <form id="loginPopup" class="" action="javascript:void(0)" method="post" tabindex="500">
              <div class="modal-body">
                <div class="alert alert-outline alert-outline-success login-message-success" id="#login-message-success" role="alert" style="display:none;"><button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button><p id="text-message-login-success"></p></div>
                <div class="alert alert-outline alert-outline-danger login-message-error" id="#login-message-error"  role="alert" style="display:none"><button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button><p id="text-message-login-error"></p></div>
                <div class="mail form-group">
                  <label>Email</label>
                  <input type="email" name="username" required="required" class="form-control">
                </div>
                <div class="passwd form-group">
                  <label>Password</label>
                  <input type="password" name="password" required="required" class="form-control">
                </div>
              </div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" onclick="loginPopup()">Login</button>
              <a class="btn btn-secondary" href="<?php echo base_url(); ?>login">Register</a>
						</div>
          </form>
					</div>
				</div>
			</div>
	<!-- Message Modal -->

    <!-- Back to top -->
    <a href="#top" id="back-to-top" ><i class="fa fa-long-arrow-up"></i></a>

    <!-- JQuery js-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

    <!-- Bootstrap js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!--JQuery IT Coursesrkline js-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.min.js"></script>

    <!-- Circle Progress js-->
    <script src="<?php echo base_url(); ?>assets/js/circle-progress.min.js"></script>

    <!-- Star Rating js-->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-bar-rating/jquery.barrating.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-bar-rating/js/rating.js"></script>

    <!--Owl Carousel js -->
    <script src="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl.carousel.js"></script>

    <!--Horizontal Menu js-->
    <script src="<?php echo base_url(); ?>assets/plugins/horizontal-menu/horizontal-menu.js"></script>

    <!--Counters -->
    <script src="<?php echo base_url(); ?>assets/plugins/counters/counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/counters/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/counters/numeric-counter.js"></script>

    <!--JQuery TouchSwipe js-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.touchSwipe.min.js"></script>

    <!--Select2 js -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/select2.js"></script>

    <!-- Cookie js -->
    <script src="<?php echo base_url(); ?>assets/plugins/cookie/jquery.ihavecookies.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/cookie/cookie.js"></script>

    <!-- Internal :::   Jquery flexdatalist js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery.flexdatalist/jquery.flexdatalist.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery.flexdatalist/data-list.js"></script>

    <!-- sticky js-->
    <script src="<?php echo base_url(); ?>assets/js/sticky.js"></script>

    <!-- Scripts js-->
    <script src="<?php echo base_url(); ?>assets/js/owl-carousel.js"></script>

    <!-- Typewritter js-->
    <script src="<?php echo base_url(); ?>assets/js/typewritter.js"></script>

    <!-- Custom js-->
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

    <!-- Vertical scroll bar js-->
    <script src="<?php echo base_url(); ?>assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/vertical-scroll/vertical-scroll.js"></script>

    <!-- Timepicker js -->
    <script src="<?php echo base_url(); ?>assets/plugins/time-picker/jquery.timepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/time-picker/toggles.min.js"></script>

    <!-- Datepicker js -->
    <script src="<?php echo base_url(); ?>assets/plugins/date-picker/spectrum.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/date-picker/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.maskedinput.js"></script>

    <!-- Inline js -->
    <script src="<?php echo base_url(); ?>assets/js/formelements.js"></script>

    <!--fileupload js -->
    <script src="<?php echo base_url(); ?>assets/js/file-upload.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/date-picker.js"></script>

    <!-- file uploads js -->
    <script src="<?php echo base_url(); ?>assets/plugins/fileuploads/js/fileupload.js"></script>

    <!--InputMask Js-->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>

  	
    <!--File-Uploads js-->
    <script src="<?php echo base_url(); ?>assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/fancyuploder/jquery.fileupload.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/fancyuploder/fancy-uploader.js"></script>

		
<script type="text/javascript">

     function registration(){   

    // alert();  
	 //$(".alert-outline-success").hide();
     //$("#text-message-success").html(''); 


        var value_form = $('#register').serialize();

          $.ajax({
            url: base_url+'signup-submit',
            dataType: 'json',
            type: 'post',            
            data: value_form,                                         
            success: function(data){             
                 if(data.status=='1')
                 {  
                     $(".reg-message-success").show();
                      $("#text-message-success").html(data.message);                   
                     setTimeout(function() {
                      $(".reg-message-success").hide();
                      $("#text-message-success").html('');
                      $(".reg-message-success").hide('blind', {}, 500)
                  }, 5000);                 
                 }
                 else if(data.status=='0')
                 {  
                    $(".reg-message-error").show();              
                    $("#text-message-error").html(data.message);
                    setTimeout(function() {
                       $(".reg-message-error").hide();              
                       $("#text-message-error").html('');
                      $(".reg-message-error").hide('blind', {}, 500)
                  }, 5000); 
                 }            
            },
            beforeSend: function () {
                $("#global-loader").show();
                $("#body").addClass('opacity-body');
            },
            complete: function () {
                $("#global-loader").hide();
                $("#body").removeClass('opacity-body');
            } 

        });                 
        
}

	 function login(){   

    // alert();  
	 //$(".alert-outline-success").hide();
     //$("#text-message-success").html(''); 


        var value_form = $('#login').serialize();

          $.ajax({
            url: base_url+'login-pop',
            dataType: 'json',
            type: 'post',            
            data: value_form,                                         
            success: function(data){             
                 if(data.status=='1')
                 {  
				 	window.location.replace(base_url);
                     $(".login-message-success").show();
                      $("#text-message-login-success").html(data.message);                   
                     setTimeout(function() {
                      $(".login-message-success").hide();
                      $("#text-message-login-success").html('');
                      $(".login-message-success").hide('blind', {}, 500)
                  }, 5000);                 
                 }
                 else if(data.status=='0')
                 {  
                    $(".login-message-error").show();              
                    $("#text-message-login-error").html(data.message);
                    setTimeout(function() {
                       $(".login-message-error").hide();              
                       $("#text-message-login-error").html('');
                      $(".login-message-error").hide('blind', {}, 500)
                  }, 5000); 
                 }            
            },
            beforeSend: function () {
                $("#global-loader").show();
                $("#body").addClass('opacity-body');
            },
            complete: function () {
                $("#global-loader").hide();
                $("#body").removeClass('opacity-body');
            } 

        });                 
        
}

 function loginPopup(){   

    // alert();  
	 //$(".alert-outline-success").hide();
     //$("#text-message-success").html(''); 


        var value_form = $('#loginPopup').serialize();

          $.ajax({
            url: base_url+'login-pop',
            dataType: 'json',
            type: 'post',            
            data: value_form,                                         
            success: function(data){             
                 if(data.status=='1')
                 {  
				 	location.reload();
				 	//window.location.replace(base_url);
                     $(".login-message-success").show();
                      $("#text-message-login-success").html(data.message);                   
                     setTimeout(function() {
                      $(".login-message-success").hide();
                      $("#text-message-login-success").html('');
                      $(".login-message-success").hide('blind', {}, 500)
                  }, 5000);                 
                 }
                 else if(data.status=='0')
                 {  
                    $(".login-message-error").show();              
                    $("#text-message-login-error").html(data.message);
                    setTimeout(function() {
                       $(".login-message-error").hide();              
                       $("#text-message-login-error").html('');
                      $(".login-message-error").hide('blind', {}, 500)
                  }, 5000); 
                 }            
            },
            beforeSend: function () {
                $("#global-loader").show();
                $("#body").addClass('opacity-body');
            },
            complete: function () {
                $("#global-loader").hide();
                $("#body").removeClass('opacity-body');
            } 

        });                 
        
}



$(document).ready(function(){
     $('#subscriber_form').submit(function(){ 

     // alert();
      $('#joinus').html('');
 
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('subscribe-submit') ?>', 
            data: $(this).serialize()
        })
        .done(function(data){
        
            $('#joinus').html(data);
             $('#joinus').show();
      setTimeout(function(){
            $('#joinus').hide();
            $('#joinus').fadeOut('fast');

            //location.reload();
                }, 1500);
         
        })
        
        return false;

    });

    
});

</script>


  </body>
</html>