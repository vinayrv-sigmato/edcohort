<!--Topbar-->
    <div class="header-main"> 
        <!--Section-->
        <div class="cover-image bg-background-1" data-bs-image-src="assets/images/banners/banner1.jpg">
        <section>
          <div class="sptb-2 bannerimg">
            <div class="header-text mb-0">
              <div class="container">
                <div class="text-center text-white py-7">
                  <h1 class="">Partner Us</h1>
                  <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Partner Us</li>
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
    <?php echo message(); ?>
    <section class="sptb position-relative">
      <div class="container">
        <div class="section-title d-md-flex mb-5">
          <div class="mx-auto text-center">
            <h2>Institute</h2>
            <p class="fs-18 lead">Partner us to offer the best valued educational services to the learners</p>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-7 col-xl-7 col-md-12 mx-auto">
            <div class="card mb-0 single-page customerpage contact">
              <div class="card-body wrapper wrapper2 box-shadow-0">
                <form class="contact-form" action="<?php echo base_url('partner-submit') ?>" method="post" name="validate_form">
                   <?php echo csrf_field(); ?>
                  <div class="name">
                    <label>Name</label>
                    <input type="text" id="name" name="name" required="">
                  </div>
                  <div class="mail">
                    <label>Designation</label>
                    <input type="text" id="designation" name="designation" required="">
                  </div>
                  <div class="mail">
                    <label>Email</label>
                    <input type="email" id="email" name="email" required="">
                  </div>
                  <div class="name">
                    <label>Phone</label>
                    <input type="text" id="phone" name="mobile" required="">
                  </div>
                  <div class="institute">
                    <label>Institution Name</label>
                    <input type="text" id="institution" name="institution" required="">
                  </div>
                  <!-- <div class="name">
                    <label></label>
                     <div class="g-recaptcha" data-sitekey="66LeJ4ugdAAAAAKj1lpFiRAkFbpT6J3gpIifBYFuo"></div>
                  </div> -->
                  <div class="submit">
                    <button type="submit" class="btn btn-primary"><span class="fa fa-send"></span> Submit </button>                   
                  </div>
                </form>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/section-->


    <!--section-->
    <section class="sptb position-relative bg-white">
      <div class="container">
        <div class="section-title d-md-flex mb-5">
          <div class="mx-auto text-center">
            <h2>Counseller</h2>
            <p class="fs-18 lead">Partner us to assist with the best valued educational services to the learners</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-7 col-xl-7 col-md-12 mx-auto">
            <div class="card mb-0 single-page customerpage contact">
              <div class="card-body wrapper wrapper2 box-shadow-0">
                <form class="contact-form" action="<?php echo base_url('counseller-submit') ?>" method="post" name="validate_form">
                   <?php echo csrf_field(); ?>
                  <div class="name">
                    <label>Name</label>
                    <input type="text" id="name" name="name" required="">
                  </div>
                  <div class="mail">
                    <label>Organisation</label>
                    <input type="text" id="organisation" name="organisation" required="">
                  </div>
                  <div class="mail">
                    <label>Email</label>
                    <input type="email" id="email" name="email" required="">
                  </div>
                  <div class="name">
                    <label>Phone</label>
                    <input type="text" id="phone" name="mobile" required="">
                  </div>
                  <div class="institute">
                    <label>Experience</label>
                    <input type="text" id="experience" name="experience" required="">
                  </div>
                  <!-- <div class="name">
                    <label></label>
                     <div class="g-recaptcha" data-sitekey="66LeJ4ugdAAAAAKj1lpFiRAkFbpT6J3gpIifBYFuo"></div>
                  </div> -->
                  <div class="submit">
                    <button type="submit" class="btn btn-primary"><span class="fa fa-send"></span> Submit </button>
                   
                  </div>
                </form>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/section-->






    