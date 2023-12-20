<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dashboard.css">
<section class="dashboard-section padding-top-100">
  <!--start heading-dashborad-->
  <div class="dashboard-heading">
    <div class="container">
      <!-- <h1>Welcome to Belgium Dia LLC</h1> -->
    </div>
  </div>
  <!--close heading-dashborad-->
<?php $is_mobile = $this->agent->is_mobile(); ?>
<?php $user_type = $this->session->userdata('user_type'); ?>
  <!--start body-dashborad-->
  <div class="dashboard-boad">
    <div class="container">
      <div class="row">

        
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="box-dashboard">
            <a href="<?php echo base_url(); ?>diamond" class="text-decoration">
              <div class="dashboard-list">
                <img src="<?php echo base_url(); ?>assets/images/dashboard/search-inventory.png">
                <div class="content">
                  <p class="list-style">Natural Diamonds <br>
                    <span class="count hides" id="dash_total_count"></span>
                     <span class="loader loader-1" id="loader_total_count"></span>
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>
        
       <!--  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="box-dashboard">
            <a href="<?php echo base_url(); ?>diamond/new" class="text-decoration">
              <div class="dashboard-list">
                <img src="<?php echo base_url(); ?>assets/images/dashboard/new-arrival.png">
                <div class="content">
                  <p class="list-style">New Arrival Natural  </p>
                </div>
              </div>
            </a>
          </div>
        </div> -->
        
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="box-dashboard">
              <a href="<?php echo base_url(); ?>edit-profile" class="text-decoration">
                <div class="dashboard-list">
                  <img src="<?php echo base_url(); ?>assets/images/dashboard/profile.png">
                  <div class="content">
                    <p class="list-style">Edit Profile</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
       
          

          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="box-dashboard">
              <a href="<?php echo base_url(); ?>wishlist" class="text-decoration">
                <div class="dashboard-list">
                  <img src="<?php echo base_url(); ?>assets/images/dashboard/wishlist.png">
                  <div class="content">
                    <p class="list-style">Wishlist <?php $user_id = $this->session->userdata('user_id'); ?>
                  <?php if($user_id){ ?>
                            <?php $sum_wish='0.00'; $total_wish='0'; ?>
                            <?php 
                            $where=array('customer_id'=>$user_id);
                            $wish_details=$this->wishlist_model->get_wishlist($where);  
                            if(!empty(array_filter($wish_details)))
                            {
                              $sum_wish=$wish_details['total_price'];
                              $total_wish=$wish_details['quantity'];
                            } ?>(<span class="count"><?php echo $total_wish; ?>)<?php } ?></span></p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          

        
        
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="box-dashboard">
            <a href="<?php echo base_url(); ?>change-password" class="text-decoration">
              <div class="dashboard-list">
                <img src="<?php echo base_url(); ?>assets/images/dashboard/password.png">
                <div class="content">
                  <p class="list-style"> Change Password</p>
                </div>
              </div>
            </a>
          </div>
        </div>

        
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="box-dashboard">
              <a href="<?php echo base_url(); ?>bank-wire" class="text-decoration">
                <div class="dashboard-list wire-ash-bank-info">
                  <img src="<?php echo base_url(); ?>assets/images/dashboard/bank.png">
                  <div class="content">
                    <p class="list-style">Wire/Ach Bank info</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
         
       
          <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="box-dashboard">
              <a href="<?php echo base_url(); ?>diamond/sd" class="text-decoration">
                <div class="dashboard-list">
                  <img src="<?php echo base_url(); ?>assets/images/dashboard/sparkling-deal.png">
                  <div class="content">
                    <p class="list-style"> Sparkling Deals</p>
                  </div>
                </div>
              </a>
            </div>
          </div> -->
         
          <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="box-dashboard">
              <a href="<?php echo base_url(); ?>diamond/ps" class="text-decoration">
                <div class="dashboard-list">
                  <img src="<?php echo base_url(); ?>assets/images/dashboard/premium-stone.png">
                  <div class="content">
                    <p class="list-style"> Premium Stones </p>
                  </div>
                </div>
              </a>
            </div>
          </div> -->
        

      </div>
    </div>
  </div>
  <!--close body-dashborad-->    
</section>
<!--start dashboard-->

<?php if (!$is_mobile): ?>
<!-- Modal -->
<!-- <div id="dash-modal" class="modal fade" role="dialog">
  <div class="modal-dialog dashboard-popup">
    <div class="modal-content">
      <div class="modal-body custom-set-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <a href="https://web.whatsapp.com/send?phone=13477010415" target="_blank">
          <img src="<?php //echo base_url(); ?>assets/images/whatsapp-dashboard.png" width="100%" class="img-responsive">
        </a>
      </div>
    </div>
  </div>
</div> -->
<?php endif ?>

<?php if ($user_type!='ADMIN1' && $user_type!='ADMIN' && !$is_mobile): ?>
<script>
/*$(document).ready(function(){
  if(!getCookie('whatsappModal')) {
    $("#dash-modal").modal('show');
    document.cookie = "whatsappModal=1";
  }
});*/
</script>
<?php endif ?>
 <script>
  $(document).ready(function(){
    loadDashboardData();
  });
  function loadDashboardData(){ 
    $.ajax({         
        url: base_url+"/dashboard-count",
        method: 'get' ,
        dataType: "json",
        success: function(data){
           var total_records = data.records_count;
            $("#loader_total_count").hide();
            $("#loader_lab_count").hide();
            $("#dash_total_count").show();

            $("#dash_lab_count").show();
            if(total_records){
                $("#dash_total_count").html(total_records);
            }else{
                $("#dash_total_count").html('0');
            }            
            /*if(details[0].total_new_records){
                $("#dash_new_count").html(details[0].total_new_records);
            }else{
                $("#dash_new_count").html('0');
            }
            if(details[0].total_new_lab){
                $("#dash_new_lab_count").html(details[0].total_new_lab);
            }else{
                $("#dash_new_lab_count").html('0');
            }*/
            // if(data['0'].total_lab){
            //     $("#dash_lab_count").html(data['0'].total_lab);
            // }else{
            //     $("#dash_lab_count").html('0');
            // }

        },
        beforeSend: function () {            
            //$("#loading").show();
        },
        complete: function () {
            //$("#loading").fadeOut();
        }
    });
}
</script>

