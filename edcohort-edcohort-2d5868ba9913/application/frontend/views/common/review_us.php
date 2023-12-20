<!--Topbar-->
    <div class="header-main"> 
        <!--Section-->
        <div class="cover-image bg-background-1" data-bs-image-src="assets/images/banners/banner1.jpg">
        <section>
          <div class="sptb-2 bannerimg">
            <div class="header-text mb-0">
              <div class="container">
                <div class="text-center text-white py-7">
                  <h1 class="">Review Us</h1>
                  <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Review Us</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </section><!--/Section-->
      </div>
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

    <!--section-->
    <section class="sptb position-relative bg-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-xl-7 col-md-12 mx-auto">
            <div class="card mb-0 single-page customerpage contact">
              <div class="card-body wrapper wrapper2 box-shadow-0">
              
               <form class="contact-form pt-5" action="javascript:void(0)" method="post" name="testimonial_form" id="testimonial_form">
               
               		 <span>
                  <span class="text-dark fs-23">Overall Rating</span>
                  <div class="star-ratings start-ratings-main clearfix me-3">
                    <div class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                      <div class="br-wrapper br-theme-fontawesome-stars">
                        <select class="example-fontawesome" name="rating" autocomplete="off" style="display: none;">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4" selected="">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </span>
               
                	
                    <div class="alert alert-outline alert-outline-success reg-message-success" id="reg-message-success" role="alert" style="display:none;">
                      <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                      <p id="text-message-success"></p>
                    </div>
                    <div class="alert alert-outline alert-outline-danger reg-message-error" id="reg-message-error"  role="alert" style="display:none">
                      <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                      <p id="text-message-error"></p>
                    </div>
                    <?php echo csrf_field(); ?>
 
 
                	 <input type="hidden" id="user_id" name="user_id" value="<?php  echo $this->session->userdata('user_id'); ?>" >
                  <div class="name">
                    <label>Feedback</label>
                    <textarea name="testimonial" id="testimonial" required="required" min="10"></textarea>
                  </div>
                  <div class="name">
                    <label>Name</label>
                    <input type="text" id="name" name="name" value="<?php  echo $this->session->userdata('user_fullname'); ?>" required="">
                  </div>
                  <div class="mail">
                    <label>Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $this->session->userdata('user_email'); ?>" required="">
                  </div>
                  <div class="name">
                    <label>Phone</label>
                    <input type="text" id="phone" name="phone" required="">
                  </div>
                  <div class="submit">
                  <?php if($this->session->userdata('user_id')){ ?>
                    <button type="submit" class="btn btn-primary" onclick="testimonialSubmit()"><span class="fa fa-send"></span> Submit </button>  
                      <?php }else{ ?>
              		<button type="button" class="btn btn-primary" data-bs-effect="effect-scale" data-bs-toggle="modal" data-bs-target="#exampleModal3">Submit</button>
             	  <?php } ?>               
                  </div>
                </form>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/section-->
    
    <script>
		function testimonialSubmit(){   

    // alert();  
	 //$(".alert-outline-success").hide();
     //$("#text-message-success").html(''); 


        var value_form = $('#testimonial_form').serialize();

          $.ajax({
            url: base_url+'testimonial-submit',
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
                      $("#reg-message-success").html('');
                      $(".reg-message-success").hide('blind', {}, 500);
					  $('#reviewModal').modal('hide');
                  }, 5000);                 
                 }
                 else if(data.status=='0')
                 {  
                    $(".reg-message-error").show();              
                    $("#text-message-error").html(data.message);
                    setTimeout(function() {
                       $(".reg-message-error").hide();              
                       $("#reg-message-error").html('');
                      $(".reg-message-error").hide('blind', {}, 500);
					 // $('#reviewModal').modal('hide');
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
	</script>

    