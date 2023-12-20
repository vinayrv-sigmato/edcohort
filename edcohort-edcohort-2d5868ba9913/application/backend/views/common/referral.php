<!--<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5a2a35c6680f010012eb12e3&product=inline-share-buttons"></script>-->
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5a2a3e7ed0739000123accba&product=inline-share-buttons"></script>
<style>
.msg-green{
	color:#0C0;
	}
</style>


 <span class="input-group-btn"><label id="check" class="msg-green"> </label></span>
 
  <!--<input id="ref_url" class="form-control" name="ref_url" type="text" value="<?php echo base_url(); ?>register?referrer=<?php echo $this->session->userdata('ucc_user_name'); ?>">-->
 
  <!--<button id="copy-ref-url" onclick="myCopy()" class="btn bg-teal btn-block btn-sm waves-effect" type="button">Copy</button>-->
  

<div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="sharethis-inline-share-buttons" data-url="<?php echo base_url(); ?>register?referrer=<?php echo $this->session->userdata('ucc_user_name'); ?>" data-title="Referrer" data-image="<?php echo base_url(); ?>assets/images/logo.png" data-description="Referrer and Earn Money"></div>

</div>
<div class="col-lg-6 col-md-6 col-sm-4 col-xs-8">
    <div class="form-group">
        <div class="form-line">
            <input id="ref_url" class="form-control" name="ref_url" type="text" value="<?php echo base_url(); ?>register?referrer=<?php echo $this->session->userdata('ucc_user_name'); ?>">
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 hover-expand-effect">
            <button id="copy-ref-url" onclick="myCopy()" class="btn bg-teal btn-block btn-sm waves-effect" type="button">Copy</button>
</div>


<script>
function myCopy() {
  var copyText = document.getElementById("ref_url");
  copyText.select();
  document.execCommand("Copy");
   document.getElementById("check").innerHTML="<h5>Copied Text </h5>";  
  	setTimeout(function(){
         document.getElementById("check").innerHTML="";
         },1000); 
}
</script>