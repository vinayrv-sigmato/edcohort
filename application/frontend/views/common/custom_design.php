<style>
  .form-horizontal .form-group {
       margin-right: 0px;
       margin-left: 0px;
  }
</style>
<div class="breadcrumb ">  
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div> <h2><span>Design With Us</span></h2></div>
            <div><ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>" title="Back to the frontpage">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Design With Us</a>
                    </li>
                </ul></div>
        </div>
    </div>
</div>
<?php echo message(); ?>
    <section class="border-bottom-light sm-text-center">
        <div class="container">
            <div class="row justify-content-center">
              <div class="format-terms padding-two no-padding-top mt-5"> 
                  <h2>Design With Us</h2>
                </div>
              <!-- <div class="sm-12">
                <video muted="" autoplay="" loop="" playsinline="" preload="none" poster="<?php echo base_url(); ?>assets/images/lela-rose-collections-hero-v3.jpg" class="hidden-xs" id="home_video">
                    <source src="<?php echo base_url(); ?>assets/video/Video.mp4" ype="video/mp4">
                  </video>
              </div> -->
              <div class="col-sm-12">
                
        <form id="form-project-planner" class="form-horizontal" name="thisform" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>custom-design-submit">
          <?php echo csrf_field(); ?>  
          <div class="row">
              <div class="col-md-6 ">
                  <legend> Name and Contact Info  </legend>
                  <span class="hint">Tell us about yourself</span>
                  <div class="form-group">
                    <input  class="form-control " placeholder="Company/Organization*" id="company" required="" name="company">
                  </div>
                  <div class="form-group">
                    <input class="form-control " placeholder="Full Name*" required="" id="name" name="name"  type="text">
                  </div>
                  <div class="form-group">
                    <input class="form-control " placeholder="Email Address*" id="email" value="" name="email" required="" type="email">
                  </div>
                  <div class="form-group">
                    <input class="form-control " placeholder="Phone Number*" required="" id="contact" value="" name="contact" maxlength="12" type="phone">
                  </div>
              </div>

              <div class="col-md-6 ">
                  <legend> Project Details  </legend>
                  <span class="hint">Tell us about your project</span>
                  <div class="form-group">
                    <input placeholder="Tell us about the project, requirements and objectives." name="msg" id="msg" class="form-control ">
                  </div>
                  <div class="form-group">
                    <input class="form-control " placeholder="What is your timeframe?" id="frame" value="" name="frame">
                  </div>
                  <div class="form-group">
                    <input class="form-control " placeholder="What is your budget?" id="budget" value="" name="budget">
                  </div>
                  <div class="box">
                    <input type="file" name="img_upload[]" id="userfile" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple="" style="display: none;">
                    <label for="userfile"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> Upload your images</strong></label>
                  </div>        
        
              <!-- <div class="col-md-8 col-md-centered actions">
                <div class="btn-animated">
                  <button class="btn btn-primary btn-lg btn-block" name="Submit" id="plan" type="submit">Submit Design</button>
                </div>
              </div> -->
            </div>
             <div class="col-md-3 col-md-centered"> 
               </div>
                <div class="col-md-3 col-md-centered"> 
               </div>
                <div class="col-md-6 col-md-centered"> 
              <div class="btn-animated">
                  <button class="btn btn-primary btn-lg btn-block" name="Submit" id="plan" type="submit">Send Your Project</button>
                </div>
              </div>
              
            
               <p>&nbsp;</p>
              <p>&nbsp;</p>
          </div>
        </form>
              </div>
              

            </div>
        </div>
    </section>

    <section class="border-bottom-light sm-text-center">
        <div class="container">
            <div class="row">
              <div class="col-sm-12">
                
              </div>
            </div>
        </div>
    </section>

    