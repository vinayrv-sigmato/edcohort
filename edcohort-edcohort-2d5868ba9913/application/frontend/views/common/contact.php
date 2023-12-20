<script src='https://www.google.com/recaptcha/api.js'></script>



    <!--Topbar-->
    <div class="header-main">
      <!--Section-->
      <div class="cover-image bg-background-1" data-bs-image-src="assets/images/banners/banner1.jpg">
        <!--Section-->
        <section>
          <div class="sptb-2 bannerimg">
            <div class="header-text mb-0">
              <div class="container">
                <div class="text-center text-white py-7">
                  <h1 class="">Contact Us</h1>
                  <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Contact Us</li>
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
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="#fff"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

    <!--Contact-->
    <div class="sptb bg-white contacts">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row text-white">
              <div class="col-lg-3 col-md-12">
                <div class="card border-0 mb-lg-0">
                  <div class="support-service mb-0  text-center bg-primary">
                    <i class="fa fa-phone"></i>
                    <h5><?php echo SITE_PHONE; ?></h5>
                    <P>Free Support!</P>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-12">
                <div class="card border-0 mb-lg-0">
                  <div class="support-service mb-0 text-center bg-secondary">
                    <i class="fa fa-clock-o"></i>
                    <h5>Mon-Sat(10:00-19:00)</h5>
                    <p>Working Hours!</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-12">
                <div class="card border-0 mb-lg-0">
                  <div class="support-service mb-0 text-center bg-success">
                    <i class="fa fa-map-marker"></i>
                    <h5>872 School-Street, TN 37072</h5>
                    <p> New York, USA</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-12">
                <div class="card border-0 mb-0">
                  <div class="support-service mb-0 text-center bg-orange">
                    <i class="fa fa-envelope-o"></i>
                    <h5><?php echo SITE_EMAIL; ?></h5>
                    <p>Support us!</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Contact-->

    <!--Contact-->
    <div class="sptb">
      <div class="container">
        <div class="row">
            <div class="col-lg-7 col-xl-7 col-md-12 mx-auto">
            <div class="card mb-0 single-page customerpage contact">
              <div class="card-body wrapper wrapper2 box-shadow-0">
                <div class="mb-6 text-dark">
                  <h5 class="fs-25 font-weight-semibold">Contact Us</h5>
                  <!-- <p class="fs-16">If you are going to use a passage of Lorem Ipsum</p> -->
                  <?php echo message(); ?>
                </div>
                <form class="contact-form" action="<?php echo base_url('contact-submit') ?>" method="post" name="validate_form" enctype="multipart/form-data" id="contact_form" tabindex="500">
                  <?php echo csrf_field(); ?> 
                  <div class="name">
                    <label>Name</label>
                    <input type="text" id="name" name="fullname"  required>
                  </div>
                  <div class="mail">
                    <label>Mail</label>
                    <input type="email" id="email" name="email" required>
                  </div>
                  <div class="name">
                    <label>Phone</label>
                    <input type="text" id="phone" name="mobile" required>
                  </div>
                  <div class="Message">
                    <label>Message</label>
                    <textarea rows="6" id="comment" name="message" placeholder="Message" required></textarea>
                  </div>
                  <!-- <div class="name">
                    <label></label>
                     <div class="g-recaptcha" data-sitekey="66LeJ4ugdAAAAAKj1lpFiRAkFbpT6J3gpIifBYFuo"></div>
                  </div> -->
                  <div class="submit">
                    <button type="submit" class="btn btn-primary"><span class="fa fa-send"></span> Send </button>
                   
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/Contact-->

  
<script src="<?php echo base_url()?>assets/front/js/jquery.validate.min.js"></script>

