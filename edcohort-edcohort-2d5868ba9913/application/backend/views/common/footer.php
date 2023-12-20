
      <!--Footer-->
      <footer class="footer">
        <div class="container">
          <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center">
              Copyright © 2022 <a href="javascript:void(0)"  class="fs-14 text-primary">Edcohort</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0)" class="fs-14 text-primary"> Delta Clue </a> All rights reserved.
            </div>
          </div>
        </div>
      </footer>
      <!--/Footer-->
    </div>

    <!-- Back to top -->
    <a href="#top" id="back-to-top" ><i class="fa fa-long-arrow-up"></i></a>

   
     <!-- JQuery js-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
        
    <!-- Bootstrap js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!--JQuery Sparkline Js-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.min.js"></script>

    <!-- Circle Progress Js-->
    <script src="<?php echo base_url(); ?>assets/js/circle-progress.min.js"></script>

    <!-- Star Rating Js-->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-bar-rating/jquery.barrating.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-bar-rating/js/rating.js"></script>

    <!-- Fullside-menu Js-->
    <script src="<?php echo base_url(); ?>assets/plugins/sidemenu/sidemenu.js"></script>
    
    <!-- Tag Input js -->
	 <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>

    <!--Select2 js -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/select2.js"></script>

    <!-- Timepicker js -->
    <script src="<?php echo base_url(); ?>assets/plugins/time-picker/jquery.timepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/time-picker/toggles.min.js"></script>

    <!-- Datepicker js -->
    <script src="<?php echo base_url(); ?>assets/plugins/date-picker/spectrum.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/date-picker/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.maskedinput.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/date-picker.js"></script>
    <!-- Inline js -->
    <script src="<?php echo base_url(); ?>assets/js/formelements.js"></script>

     <!--InputMask Js-->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>

    <!-- Custom scroll bar Js-->
    <script src="<?php echo base_url(); ?>assets/plugins/pscrollbar/pscrollbar.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pscrollbar/pscroll.js"></script>

    <!-- Data tables -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
   	<script src="<?php echo base_url(); ?>assets/js/datatable.js"></script>
    
    <!--Counters -->
    <script src="<?php echo base_url(); ?>assets/plugins/counters/counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/counters/waypoints.min.js"></script>

    <!-- CHARTJS CHART -->
    <script src="<?php echo base_url(); ?>assets/plugins/chart/Chart.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/chart/utils.js"></script>

    <!-- ECharts Plugin -->
    <script src="<?php echo base_url(); ?>assets/js/index1.js"></script>

    <!-- Custom Js-->
    <script src="<?php echo base_url(); ?>assets/js/admin-custom.js"></script>

    <!-- file uploads js -->
    <script src="<?php echo base_url(); ?>assets/plugins/fileuploads/js/fileupload.js"></script>
    
    
    
     <script>
      function alert_boot(message) {
         alertify.alert(siteName, message);
      }  

    function confirm_boot_a(obj)
    { 
        alertify.confirm(siteName, obj.attr('data-message'), 
          function(){ 
            location.href=obj.attr('data-href');       
        }, 
        function(){  });
    }

    

    </script>
    
  </body>
</html>