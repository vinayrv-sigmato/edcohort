<div class="" style="margin-top: 10em;">
		<div class="gtco-container">
			<div class="row row-pb-md">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading" style="margin-bottom: 0">
								<h2> Get Customize Quote</h2>
								<p>Start a custom jewelry project with us. Get a quote and learn how we can partner with you to build your vision.</p>
				</div>
			</div>
		</div>
	</div>

	<div id="gtco-history" class="border-bottom animate-box">
		<div class="gtco-container">
				
			<p align="center" class="login-box-msg"><span class="text-maroon text-bold" style="color:#F00"><?php echo $this->session->flashdata('alert_message'); ?></span> </p>
			<div id="modal-project-planner" class="">
      <div class="container-fluid modal-form-wrapper">
        <form id="form-project-planner" name="thisform" method="post" enctype="multipart/form-data" action="<?php echo base_url('custom-design-submit'); ?>">
          <div class="container modal-form-body">
            <div class="col-sm-12 col-sm-centered">
             
              

              <div class="col-md-6 col-md-centered" >
                <?php echo csrf_field(); ?>
                <fieldset class="col-md-centered">
                <legend> Name and Contact Info <span class="hint">Tell us about yourself</span> </legend>                
                <div class="input-wrap">
                  <label>Company/Organization*</label>
                  <input data-parsley-error-message="This field is required. Don't have one? Just write &quot;NA&quot;" class="form-control input-lg" placeholder="Company/Organization*" id="company" required  name="company" value="<?php echo @$record[0]->NM_COMPANY; ?>">
                </div>
                
                <div class="input-wrap">
                  <label>Email Address*</label>
                  <input data-parsley-error-message="A valid email address is required." class="form-control input-lg" placeholder="Email Address*" id="email" name="email" required data-parsley-id="6" type="email" value="<?php echo @$record[0]->NM_USER_EMAIL; ?>">
                </div>
               
              </fieldset>


                
              


              </div>

              <div class="col-md-6 col-md-centered" >
                <fieldset class="col-md-centered">
                <legend> &nbsp; <span class="hint">&nbsp;</span> </legend>

                <div class="input-wrap">
                  <label>Full Name*</label>
                  <input class="form-control input-lg" placeholder="Full Name*" required id="name" name="name"  value="<?php echo @$record[0]->NM_USER_FULLNAME; ?>" data-parsley-id="4" type="text">
                </div>

                 <div class="input-wrap">
                  <label>Phone Number*</label>
                  <input class="form-control input-lg" placeholder="Phone Number*" required id="contact" name="contact" maxlength="12" type="phone" value="<?php echo @$record[0]->SN_USER_MOBILE; ?>">
                </div>

              <!--   <div class="input-wrap">
                  <input placeholder="Tell us about the project, requirements and objectives." name="msg" id="msg" data-parsley-error-message=" Please tell us abot your project." class="form-control input-lg">
                </div>
                <div class="input-wrap">
                  <input data-parsley-error-message="Timeframe is an important part of understanding project feasibility and fit." class="form-control input-lg" placeholder="What is your timeframe?"  id="frame" value="" name="frame" data-parsley-id="31">
                </div>
                <div class="input-wrap">
                  <input data-parsley-error-message="Your budget is vital in order for us to identify the best solutions for you." class="form-control input-lg" placeholder="What is your budget?"  id="budget" value="" name="budget" data-parsley-id="29">
                </div> -->
                
                
              </fieldset>


               <!--  <fieldset id="project-types" class="project-types-wrapper relative">
                <legend class="text-center"> Upload your design <span class="hint">select all that apply</span> </legend>
                    <div class="box">
          <input type="file" name="userfile[]" id="userfile" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
          <label for="userfile"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Upload your images</strong></label>
        </div>
          </legend>
        </fieldset>
 -->
        
              </div>

              <div class="col-md-12 col-md-centered" >

                <div class="input-wrap">
                  <label>Note</label>
                  <textarea class="form-control input-lg" placeholder="Note" name="msg" id="msg"></textarea>
                </div>
              </div>

              <div class="col-md-6 col-md-centered" > 
              <div class="input-wrap">
                  <label>Item Number</label>
                  <input data-parsley-error-message="This field is required. Don't have one? Just write &quot;NA&quot;" class="form-control input-lg" placeholder="" readonly="readonly" id="item_no" value="<?php echo $this->input->get('item_no'); ?>" name="item_no">
                  <input type="hidden" value="<?php echo $this->input->get('product_id'); ?>" name="product_id">
                  <input type="hidden" value="<?php echo $this->input->get('product_title'); ?>" name="product_title">
                </div>

                 <div class="input-wrap">
                  <label>Metal</label>
                  <input data-parsley-error-message="This field is required. Don't have one? Just write &quot;NA&quot;" class="form-control input-lg" placeholder="" readonly="readonly" id="metal" value="<?php echo $this->input->get('metal'); ?>" name="metal">                 
                </div>

                 <!-- <div class="input-wrap">
                  <label>Diamond Clarity</label>
                  <input data-parsley-error-message="This field is required. Don't have one? Just write &quot;NA&quot;" class="form-control input-lg" placeholder="" readonly="readonly" id="diamond_clarity" value="<?php echo $this->input->get('diamond_clarity'); ?>" name="diamond_clarity">                 
                </div> -->
                <div class="input-wrap">
                  <label>Center diamond shape/size</label>
                  <input data-parsley-error-message="This field is required. Don't have one? Just write &quot;NA&quot;" class="form-control input-lg" placeholder="Center diamond shape/size" readonly="readonly" id="center_diamond" value="<?php echo $this->input->get('center_diamond'); ?>" name="center_diamond">                 
                </div>
              </div>

              <div class="col-md-6 col-md-centered" > 
              <div class="input-wrap">
                <label>Size</label>
                  <input data-parsley-error-message="This field is required. Don't have one? Just write &quot;NA&quot;" class="form-control input-lg" placeholder="" readonly="readonly" id="size" value="<?php echo $this->input->get('size'); ?>" name="size">                 
                </div>

                 <!-- <div class="input-wrap">
                  <label>Diamond Weight</label>
                  <input data-parsley-error-message="This field is required. Don't have one? Just write &quot;NA&quot;" class="form-control input-lg" placeholder="" readonly="readonly" id="diamond_weight" value="<?php echo $this->input->get('diamond_weight'); ?>" name="diamond_weight">                 
                </div> -->
                <div class="input-wrap">
                  <label>Reference Number</label>
                  <input data-parsley-error-message="This field is required. Don't have one? Just write &quot;NA&quot;" class="form-control input-lg" placeholder="Reference Number" readonly="readonly" id="reference_number" value="<?php echo $this->input->get('reference_number'); ?>" name="reference_number">                 
                </div>

                 <div class="input-wrap">
                 <!--  <label>Engraving</label>
                  <input data-parsley-error-message="This field is required. Don't have one? Just write &quot;NA&quot;" class="form-control input-lg" placeholder="" readonly="readonly" id="engraving" value="<?php echo $this->input->get('engraving'); ?>" name="engraving"> -->                 
                </div>
              </div>
              
               <div class="col-md-4 col-md-centered" > 
               </div>
                <div class="col-md-4 col-md-centered" > 
                  <div class="btn-animated">
                    <?php  $user_id = $this->session->userdata('user_id'); ?>
                <?php if(!empty($user_id)){ ?>
                  <button class="btn btn-primary btn-lg btn-block" name="Submit" id="plan" type="submit">Click to get customize quote</button>
                <?php }else{ ?>
                   <!-- <a class="btn btn-primary btn-lg btn-block" href="<?php echo base_url(); ?>login">Login First </a>  -->
                   <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#login_modal">
                    Login First
                  </button>                   
               <?php } ?>
                  
                </div>
               </div>
               <div class="col-md-4 col-md-centered" > 
               </div>
            
               <p>&nbsp;</p>
              <p>&nbsp;</p>
              
               
        
              <!-- <div class="col-md-8 col-md-centered actions">
                <div class="btn-animated">
                  <button class="btn btn-primary btn-lg btn-block" name="Submit" id="plan" type="submit">Submit Design</button>
                </div>
              </div> -->
            </div>
          </div>
        </form>
      </div>
    </div>

			
		</div>
	</div>

  
