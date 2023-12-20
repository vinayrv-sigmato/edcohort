<style>
  .std h1, .std h2 {
    padding: 10px 0;
    font-size: 30px;
    margin-bottom: 20px;
  }
  .std p {
      margin-bottom: 30px;
  }
  .std img {
      margin: auto;
      display: block;
      padding: 20px 0;
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
<section class="border-bottom-light sm-text-center padding-two">
  <div class="container">      
    <div class="row">
  <div class="schedu-appo col-sm-6">

    <form action="<?php echo base_url('appointment-submit'); ?>" method="post" id="customemailform" name="customemailform">
      <div class="form-list">
        <?php echo csrf_field(); ?>
        <div class="form-schedule">
          <div class="col-12 inner-form-schedule">
            <div class="form-group">
              <input name="firstname" class="input-text required-entry name form-control radius-flat" required="required" placeholder="First Name*" type="text">
            </div>
          </div>
          <div class="col-12 inner-form-schedule">
            <div class="form-group">
              <input name="lastname" class="input-text required-entry name form-control radius-flat" required="required" placeholder="Last Name*" type="text">
            </div>
          </div>
        </div>
        <div class="form-schedule">
          <div class="col-12 inner-form-schedule">
            <div class="form-group">
              <input name="email" class="input-text required-entry email validate-email form-control radius-flat" required="required" placeholder="Email*" type="email">
            </div>
          </div>
          <div class="col-12 inner-form-schedule">
            <div class="form-group">
              <input name="phone" class="input-text telephone validate-phoneLax required-entry form-control radius-flat" required="required" placeholder="Phone*" type="text">
            </div>
          </div>
        </div>
        <div class="form-schedule">
          <div class="col-12 inner-form-schedule">
            <div class="dropdown form-group">
              <select name="time" class="required-entry validate-select form-control radius-flat" required="required" id="dropdownval">
                <option value="0">Preferred Time*</option>
                <option value="10am">10am </option>
                <option value="10:30am">10:30am</option>
                <option value="11am">11am</option>
                <option value="11:30am">11:30am</option>
                <option value="12pm">12pm</option>
                <option value="12:30pm">12:30pm</option>
                <option value="1pm">1pm</option>
                <option value="1:30pm">1:30pm</option>
                <option value="2pm">2pm</option>
                <option value="2:30pm">2:30pm</option>
                <option value="3pm">3pm</option>
                <option value="3:30pm">3:30pm</option>
                <option value="4pm">4pm</option>
                <option value="4:30pm">4:30pm</option>
                <option value="5pm">5pm</option>
                <option value="5:30pm">5:30pm</option>
              </select>
            </div>
          </div>

          <div class="col-12 inner-form-schedule">
            <div class="form-group">
              <input name="date" id="datepicker" class="validate-date input-text date_from required-entry form-control radius-flat" required="required"  placeholder="Preferred Date*" type="text">
            </div>
          </div>
          <div class="col-12 inner-form-schedule">
            <div class="form-group">
              <textarea type="text" name="comment" class="input-text comment form-control radius-flat" placeholder="Comments" style="height:80px;"></textarea>
            </div>
          </div>
        </div>

        <div class="button-set">
          <button class="btn btn-primary btn-send radius-flat please-wait" value="" type="submit"> <span class="fa fa-send"></span> Send </button>
        </div>
      </div>
    </form>
  </div>
   <div class="format-terms col-sm-6">
              <h2 class="padding-three">Appointment</h2>
              <p>As a brand that understands luxury, we know that your time is invaluable and that’s why we offer the option to schedule an appointment for you—with absolutely no obligation.
When you make an appointment, we will be able to personalize your visit by already having products to match your wishes, backed with our decades of experience in creating joyful one-of-a-kind memories for our customers.

At Shakti Jewel, you will find luxury … redefined.</p>

          </div>
    </div>
  </div>
</section>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy',minDate: 0, });

  } );
  
  </script>

