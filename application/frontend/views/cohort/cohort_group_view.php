<!--content start-->
<div class="content">

    <!--start-->
    <div class="review-main-box chat-main-box d-flex">

        <button type="button" class="filter-btn">Group</button>

        <!--left start-->
        <div class="review-left chat-left">

            <div class="group-name-box">
            <?php foreach($groupdetails as $gdetails){ ?> 
                <h4><?php echo $gdetails->group_name.' '.$gdetails->tag; ?> </h4>
                <p><?php echo $gdetails->brand_name.' : '.$gdetails->class_name.' : '.$gdetails->batch_name; ?></p>
                <?php } ?>
            </div>
            <h3 class="room-title"># Discussions you joined</h3>
            <ul class="room-list-box">
            <?php //print_ex($mygroup_list);
                foreach($mygroup_list as $mygroup){ ?> 
                <li class="room-list">
                    <a href="<?php echo base_url(); ?>cohort-group/<?php echo $mygroup->cg_id;?>" class="anchor"></a><span><?php echo $mygroup->title?></span>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo base_url(); ?>assets/images/dotts.png" alt="">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <!-- <li><a class="dropdown-item" href="#">Mute</a></li> -->
                          <li><a class="dropdown-item" href="<?php echo base_url(); ?>leave-group/<?php echo $mygroup->cg_id;?>">Leave</a></li>
                          <!-- <li><a class="dropdown-item" href="#">Publish in General</a></li> -->
                          <li><div class="sharethis-inline-share-buttons"></div></li>
                          <!-- <li><a class="dropdown-item" href="#">Pin to top</a></li> -->
                        </ul>
                      </div>
                </li>
                <?php } ?>
            </ul>
            <!-- <div class="filter-btn-col">
                <button type="submit" class="apply-btn">Apply Filter</button>
            </div> -->
        </div>
        <!--left end-->
        <!--center start-->
        <div class="review-center">
            <div class="chat-box">
 
            <?php //print_ex($message_list);
             foreach($message_list as $message){?> 

                <div class="chat-col <?php if($message->user_id == $this->session->userdata('user_id')){ ?> reply <?php } ?>">
                    <?php if($message->user_id != $this->session->userdata('user_id')){ ?>
                     <div class="review-user-image"><span></span></div>
                    <?php } ?>
                    <h3><?php echo ucfirst($message->firstname);  ?></h3>
                    <p><?php echo $message->message;  ?></p>
                </div>

            <?php } ?>

                <!-- <div class="unread-message">1 new unread message</div> -->

                <!-- <div class="chat-col">
                    <div class="review-user-image"><span></span></div>
                    <h3>Swapnil W</h3>
                    <div class="note">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                    </div>
                    <p> Lorem Ipsum has been the industry's standard dummy.</p>
                </div>

                <div class="chat-col reply">
                    <p>I Agree :)</p>
                </div>

                <div class="chat-col">
                    <div class="review-user-image"><span></span></div>
                    <h3>Swapnil W</h3>
                    <p>I have a confusion</p>
                </div>

                <div class="chat-col reply important">
                    <p>Http??InappropriateLink</p>
                </div> -->


            </div>


        </div>
        <!--center end-->


        <!--right start-->
        <div class="review-right">

         

            

        </div>
        <!--right end-->
    
    </div>
    <!--end-->
    <div class="chat-footer">
        <a href="<?php echo base_url(); ?>cohort-group/<?php echo $this->uri->segment(2);?>" class="group-btn">Join group</a>
    </div>
    <!-- <form action="<?php echo base_url(); ?>message-send" method="post" enctype="multipart/form-data">
        <div class="chat-footer">
            <div class="reply-editor">
                     <?php echo csrf_field(); ?>
                    <input type="hidden" name="group_id" id="group_id" value="<?php echo $this->uri->segment(2); ?>">
                    <input type="hidden" name="user_id" id="user_id"  value="<?php echo $this->session->userdata('user_id'); ?>">
                     <div id="summernote"></div> 
                    <textarea class="summernote" name="comment" required></textarea>
                    
                    <input type="submit" name="submit" value="Submit" class="rate-submit-btn" />
                </div>
        </div>
    </form> -->
      


</div>
<!--content end-->

<script>

$(document).ready(function() {
//     $("form").on('submit', function(){
//    $('#rateModal').show();
// })
    $('.summernote').summernote({
height: 300,
});
   

   
});
</script>