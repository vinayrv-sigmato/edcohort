<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dia-home/css/global.css">
<div  class="breadcrumb ">  
   <div itemprop="breadcrumb" class="container">
    <div class="d-flex justify-content-between align-items-center">
    <div> <h2><span>Design Details</span></h2></div>
     <div><ul class="nav">
      <li class="nav-item">
        <a title="Back to the frontpage" class="homepage-link" href="<?php echo base_url(); ?>">Home</a>  
      </li>
      <li class="nav-item">
        <a title="Back to the frontpage" class="homepage-link" href="">Design Details</a>
      </li>
    </ul></div>
     </div>
   </div>
</div>
<section class="border-bottom-light sm-text-center section-padding login-design">
  <div class="container">
    <div class="row">
      <?php $this->load->view('common/sidebar'); ?>
      <div class="col-lg-9">
        <?php echo message(); ?>
        <!-- <?php if(!empty($this->session->flashdata('alert_message'))){
            ?>
                
            <p align="center" class="login-box-msg"><span class="text-maroon text-center text-bold" style="color:#000"><?php echo $this->session->flashdata('alert_message'); ?></span> </p>
            <?php } ?> -->
      
        <script>
            $(function () {
                $('#jprt-ind').jportilio({ratio: 1});
            });
        </script>

 <?php //print_pre($details); print_pre($images); ?>   
    <div class="gtco-section"  id='demo_on_start' style="padding-top:0;">
        <div class="gtco-container">
            
            <div class="sh-portfolio-single-default">
                <div class="sh-portfolio-single row">
                    <div class="sh-portfolio-single-right col-md-8">
                        <div class="preview-pic tab-content">
                            <?php if(empty($details[0]->product_id)){    ?>
                            <?php foreach ($images as $key => $value): ?>                              
                              <div class="tab-pane <?php echo ($key=='0')? 'active' : ''; ?>" id="pic-<?php echo $value->image_id; ?>"><img src="<?php echo base_url(); ?>ftp_upload/design/<?php echo $value->image; ?>" class="img-fluid" /></div>
                            <?php endforeach ?>
                              <?php }else{ ?> 
                               <?php foreach ($images as $key => $value): ?>                                
                              <div class="tab-pane <?php echo ($key=='0')? 'active' : ''; ?>" id="pic-<?php echo $value->image_id; ?>"><img src="<?php echo base_url(); ?>uploads/product/image/<?php echo $value->name; ?>" class="img-fluid" /></div>
                            <?php endforeach ?>
                              <?php } ?>


                            <?php if(!empty($details[0]->video)){ ?>

                            <div style="width: 480px" class="tab-pane <?php if(empty($images)){ echo 'active'; } ?>" id="video-<?php echo $details[0]->product_id; ?>">
                              <video width="100%" height="100%" controls="" autoplay loop name="media"><source src="<?php echo base_url(); ?>ftp_upload/design/video/<?php echo $details[0]->video; ?>?autoplay=1&controls=0&loop=1" type="video/mp4">
                               Your browser does not support the video tag.
                              </video>

                             <!--  <iframe src="<?php echo base_url(); ?>uploads/design/video/<?php echo $details[0]->video; ?>?autoplay=1&controls=0&loop=1" allow="autoplay; fullscreen" frameborder="0" width="100%" height="100%"></iframe> --></div>
                            <?php } ?>
                        </div>
                        <div>
                            <ul class="preview-thumbnail nav nav-tabs">
                            <?php if(empty($details[0]->product_id)){ ?>
                            <?php foreach ($images as $key => $value): ?>
                                <li class="<?php echo ($key=='0')? 'active' : ''; ?>"><a data-target="#pic-<?php echo $value->image_id; ?>" data-toggle="tab"><img src="<?php echo base_url(); ?>ftp_upload/design/<?php echo $value->image; ?>" class="img-fluid"/></a></li>
                            <?php endforeach ?>
                            <?php }else{ ?> 
                              <?php foreach ($images as $key => $value): ?>
                                <li class="<?php echo ($key=='0')? 'active' : ''; ?>"><a data-target="#pic-<?php echo $value->image_id; ?>" data-toggle="tab"><img src="<?php echo base_url(); ?>uploads/product/image/<?php echo $value->name; ?>" class="img-fluid"/></a></li>
                            <?php endforeach ?>
                            <?php } ?>  

                            <?php if(!empty($details[0]->video)){ ?>

                              <li class="<?php if(empty($images)){ echo 'active'; } ?>" style="background: url('<?php echo base_url(); ?>ftp_upload/design/image/<?php echo $images[0]->name; ?>');background-size: cover;"><a data-target="#video-<?php echo $details[0]->product_id; ?>" data-toggle="tab"><img src="<?php echo base_url(); ?>assets/images/video.png"></a></li>

                           <?php } ?>
                        </ul>
                        </div>
                        
                    </div>
                  <?php foreach ($details as $row): ?>                             
                    <div class="sh-portfolio-single-left col-md-4">
                        <div class="preview-pic tab-content">
                            <div class="sh-portfolio-single-whitespace hidden-md hidden-lg"></div>

                              <?php if($row->reference_number!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Reference Number</strong></div>
                                    <div><?php echo $row->reference_number; ?></div>
                                </div>
                            </li> 
                            <?php endif ?> 

                            <?php if($row->job_no!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Job#</strong></div>
                                    <div><?php echo $row->job_no; ?></div>
                                </div>
                            </li> 
                            <?php endif ?> 

                            
                             <?php if($row->frame!=""): ?>
                                <li class="sh-portfolio-single-info-item sh-table">
                                    <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                        <div><strong>Timeframe</strong></div>
                                        <div><?php echo $row->frame; ?></div>
                                    </div>
                                </li> 
                            <?php endif ?> 
                             <?php if($row->budget!=""): ?>
                                <li class="sh-portfolio-single-info-item sh-table">
                                    <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                        <div><strong>Price</strong></div>
                                        <div><?php echo $row->budget; ?> <i class="fa fa-key" aria-hidden="true"></i><i class="fa fa-key" aria-hidden="true"></i><i class="fa fa-key" aria-hidden="true"></i></div>
                                    </div>
                                </li> 
                            <?php endif ?> 
                           

                              <?php if($row->center_diamond!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Center shape/size</strong></div>
                                    <div><?php echo $row->center_diamond; ?></div>
                                </div>
                            </li> 
                            <?php endif ?> 
                             <?php if($row->status!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Status</strong></div>
                                    <div><?php echo $row->status; ?></div>
                                </div>
                            </li> 
                            <?php endif ?>  
                             <?php if($row->item_no!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Item No</strong></div>
                                    <div><?php echo $row->item_no; ?></div>
                                </div>
                            </li> 
                            <?php endif ?>

                            <?php if($row->product_title!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Project</strong></div>
                                    <div><?php echo $row->product_title; ?></div>
                                </div>
                            </li> 
                            <?php endif ?> 
                             <?php if($row->size!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Finger Size</strong></div>
                                    <div><?php echo $row->size; ?></div>
                                </div>
                            </li> 
                            <?php endif ?>
                             <?php if($row->metal!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Metal</strong></div>
                                    <div><?php echo $row->metal; ?></div>
                                </div>
                            </li> 
                            <?php endif ?> 
                            <?php if($row->diamond_weight!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Diamond Total Weight</strong></div>
                                    <div><?php echo $row->diamond_weight; ?></div>
                                </div>
                            </li> 
                            <?php endif ?> 
                            <?php if($row->color_diamond_weight!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Color Total Weight</strong></div>
                                    <div><?php echo $row->color_diamond_weight; ?></div>
                                </div>
                            </li> 
                            <?php endif ?> 
                            <?php if($row->diamond_clarity!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Diamond Clarity</strong></div>
                                    <div><?php echo $row->diamond_clarity; ?></div>
                                </div>
                            </li> 
                            <?php endif ?> 
                            <?php if($row->engraving!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Engraving</strong></div>
                                    <div><?php echo $row->engraving; ?></div>
                                </div>
                            </li> 
                            <?php endif ?> 
                            <?php if($row->msg!=""): ?>
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Message</strong></div>
                                    <div><?php echo $row->msg; ?></div>
                                </div>
                            </li>
                            <?php endif ?>
                            <?php if($row->create_date!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Request Date</strong></div>
                                    <div>
                                      <?php echo date('m/d/Y',strtotime($row->create_date)); ?>
                                    </div>
                                </div>
                            </li> 
                            <?php endif ?> 
                            <?php if($row->is_approved!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Approval Status</strong></div>
                                    <div><?php 
                                          if($row->is_approved == 0){ $approval = "Panding"; }
                                          if($row->is_approved == 1){ $approval = "Approved"; }
                                          if($row->is_approved == 2){ $approval = "Reject"; }
                                    echo $approval; ?></div>
                                </div>
                            </li> 
                            <?php endif ?> 
                            <?php if($row->approved_date!=""): ?>                                                          
                            <li class="sh-portfolio-single-info-item sh-table">
                                <div class="sh-portfolio-single-info-right sh-table-cell-top">
                                    <div><strong>Approval Date</strong></div>
                                    <div>
                                       <?php echo date('m/d/Y',strtotime($row->approved_date)); ?>
                                    </div>
                                </div>
                            </li> 
                            <?php endif ?> 

                            
                        </div>
                    </div>
               <?php endforeach ?>
                <?php //print_ex($details); ?>
               <!--  <a class="btn btn-primary" href="<?php echo base_url(); ?>send-images/<?php echo $details[0]->design_id; ?>">Send Images in Email</a> -->
           </div>
<div class="clearfix"></div>
                <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="margin-bottom:10px;">Send Images in Email</button>

<div class="clearfix"></div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                
                <h4 class="modal-title">Send Images in Email</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form id="form-project-planner" name="thisform" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>send-images/<?php echo $details[0]->design_id; ?>">
                    <div class="input-wrap">
                   <?php echo csrf_field(); ?>
                   <input type="hidden" name="design_id" value="<?php echo $details[0]->design_id; ?>">
                  <input data-parsley-error-message="A valid email address is required." class="form-control input-lg" placeholder="Email Address*" id="email" name="email" required data-parsley-id="6" type="email" >
                  <br />
                  <button class="btn btn-primary" name="Submit" id="plan" type="submit">Send Your Project</button> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
              </div>
             
            </div>

          </div>
        </div>
                
               

            </div>

        </div>
    </div>
      </div>
    </div>


     <div class="row">                  
                    <div class="col-sm-12">
                        <div class="table-responsive">
                     <table cellpadding="0" cellspacing="0" border="0" style="" class="table table-condensed table-hover table-striped">
                    <tr>
                      <td colspan="6"><h2> Process </h2></td>
                    </tr>
                    <tr>
                      <td>Image</td>
                      <td>Message</td>
                      <td>Status</td>
                      <td>Processing Status</td>
                      <td>Date</td>
                      <td>Reply By</td>
                    </tr>
                  <?php foreach ($process as  $pro) {
                    ?>
                    <tr>
                      <td>
                        <?php   $where2=array('process_id'=>$pro->process_id);
                        $processimg = $this->common_model->selectWhere('tbl_process_image',$where2); ?>
                         <?php //print_ex($processimg);    ?>
                         <?php foreach ($processimg as $img) { ?>
                           <a href="<?php echo base_url(); ?>ftp_upload/design/<?php echo $img->image; ?>" target="_blank" ><img src="<?php echo base_url(); ?>ftp_upload/design/<?php echo $img->image; ?>" width="100px" > </a>
                       <?php  } ?>
                      </td>
                      <td><?php  echo  $pro->message; ?></td>
                      <td><?php  echo  $pro->status; ?></td>
                      <td>
                         <?php if($pro->processing_status == 1){ echo 'New Quote'; } ?>
                         <?php if($pro->processing_status == 2){ echo 'Sent Quote'; } ?>
                         <?php if($pro->processing_status == 3){ echo 'Approved'; } ?>
                         <?php if($pro->processing_status == 4){ echo 'Sent CAD'; } ?>
                         <?php if($pro->processing_status == 5){ echo 'CAD Approved'; } ?>
                         <?php if($pro->processing_status == 6){ echo 'Finished'; } ?>
                      </td>
                      <td><?php  echo  date('m-d-Y',strtotime($pro->create_date)); ?></td>
                      <td><?php  if($this->session->userdata('user_id') == $pro->created_by){ echo "<span style='color: red;'>You</span>";}else{ echo "<span style='color: green;'>Admin</span>";} ?></td>
                    </tr>
                  <?php } ?>

                  </table>
                    
                    </div>
                </div>
                </div>
                <br />
                <br />
                <div class="row">
                <form action="<?php echo base_url(); ?>myorder/design_process_submit" method="post" enctype="multipart/form-data" style="width:100%;">

                  <div class="table-responsive">
                      <table cellpadding="0" cellspacing="0" border="0" style="" class="table table-condensed table-hover table-striped">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="design_id" value="<?php echo $details[0]->design_id; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
                   
                   
                    <tr> 
                      <td style="vertical-align:top;width: 100%;">
                       Reply: <textarea style="width: 100%;height: 100px;" name="reply"></textarea>
                      </td> 
                    </tr>
                    
                    <tr> 
                        <td>
                          <input type="file" name="img_upload[]" id="userfile" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                          <label style="max-width: 110% !important"  for="userfile"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="50" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Add More Images  <span id="filecnt"></span></strong></label>
                       </td> 
                    </tr>

                    <tr style=""> 
                       <th scope="row" class="text-left"></th> 
                      <td class="text-right">                    
                       <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                      </td> 
                    </tr>

                  </table>
                  </div>
                  
                </form>
                </div>


                <script type="text/javascript">
    $(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>

 
<script type="text/javascript">
  $('input#userfile').change(function(){
    var files = $(this)[0].files;
    var cnt = (files.length);
    //alert(cnt);
     $("#filecnt").text(cnt+" files selected")

    
});
</script>
  </div>
</section>









