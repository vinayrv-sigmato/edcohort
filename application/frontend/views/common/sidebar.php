<?php $url = $this->uri->segment('1');?>

<div class="col-lg-3">

  <div class="sidenav-user">

    <ul>

	    <li class="margin-two"><a href="<?php echo base_url('edit-profile');?>" class="<?php if($url == "edit-profile"){echo 'active';} ?>">Profile</a></li>

	    <li class="margin-two"><a href="<?php echo base_url('change-password');?>" class="<?php if($url == "change-password"){echo 'active';} ?>">Change Password</a></li>

	    </a></li>                

	</ul>

  </div>

</div>

 