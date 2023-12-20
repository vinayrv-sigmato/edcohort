  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/easyzoom.css" />
     <link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/style.css">
<style>
    .column.text-left {
    position: absolute;
    bottom: 0px;
    left: 0px;
}
  </style>  
<style>

</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_product.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Design With Us Management
        <small>Design Details</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-12">
          <div class="box box-primary">
            <div class="box-header">
              <!-- <h3 class="box-title">Hover Data Table</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <div id="content" class="full">
        <div class="product">
          <div class="image">
                  <?php //echo $image_array['0']->name; ?>
                  <div style="width:100%;text-align: center;" >
                    <?php for ($a = 0;$a < 1;$a++)
                      { ?>
                      <?php if (($records['0']->product_id == 0) || ($records['0']->product_id == ''))
                        { ?> 
                           <div class="easyzoom easyzoom--with-thumbnails" style="display: block !important;" id="easy_zoom"> <a href="<?php echo base_url() . '../ftp_upload/design/' . $image_array['0']->image; ?>"> <img src="<?php echo base_url() . '../ftp_upload/design/' . $image_array['0']->image; ?>" alt="" width="90%" height="50%" /> </a> </div>
                        <?php } else { ?> 
                      <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails" id="easy_zoom"> <a href="<?php echo base_url() . 'uploads/product/image/' . $image_array['0']->name; ?>"> <img src="<?php echo base_url() . 'uploads/product/image/' . $image_array['0']->name; ?>" alt="" width="90%" height="50%" /> </a> </div>
                        <?php } ?>
                    <?php } ?>
                    
                    <div class="column text-left">
                      <ul class="thumbnails">
                        <?php //print_r($image_array); ?>
                        <?php foreach ($image_array as $k => $value)
                          {  ?>

                            <?php if (($records['0']->product_id == 0) || ($records['0']->product_id == ''))
                              { ?> 
                                  <li> <a href="<?php echo base_url() . '../ftp_upload/design/' . $value->image; ?>" data-standard="<?php echo base_url() . '../ftp_upload/design/' . $value->image; ?>"> <img onclick="showZoom()"  src="<?php echo base_url() . '../ftp_upload/design/' . $value->image; ?>" alt="" /> </a> </li>
                            <?php  } else { ?>
                                  <li> <a href="<?php echo base_url() . 'uploads/product/image/' . $value->name; ?>" data-standard="<?php echo base_url() . 'uploads/product/image/' . $value->name; ?>"> <img onclick="showZoom()"  src="<?php echo base_url() . 'uploads/product/image/' . $value->name; ?>" alt="" /> </a> </li>
                            <?php } ?>  
                        <?php }  ?>
                      </ul>
                    </div>
                  </div>
                  <!-- <img src="images/5.jpg" alt=""> --> 
                </div>
          <div class="details">
          <?php if($records['0']->design_id != null){ $design_id=$records['0']->design_id; }else{ $design_id=""; }  ?>    
           <!--  <span class="h1">Request ID#<?php echo $design_id; ?>  </span> -->
           <div class="entry">
              <p></p>
              <div class="tabs">
                <div class="nav">
                  <ul>
                    <li class="active"><a href="#desc"></a></li>
                    <li><!-- <a href="#spec">Specification</a> --></li>
                    <li><!-- <a href="#ret">Returns</a> --></li>
                  </ul>
                </div>
                <div class="tab-content active" id="desc">
                  
                  
                  <div class="DiamondDetail" id="DiamondDetail table-responsive" style="">
                  <table cellpadding="0" cellspacing="0" border="0" style="" class="table table-responsive table-condensed table-hover table-striped">    
                     <tbody>
                              <?php if($records['0']->design_id != null){ $design_id=$records['0']->design_id; }else{ $design_id=""; }  ?>
                              <!-- <tr style=""> 
                        <th scope="row" class="text-left">Request ID#</th>                   
                        <td class="text-right"><?php echo $design_id; ?></td>   
                      </tr> -->
                              <?php if($records['0']->company != null){ $company=$records['0']->company; }else{ $company=""; }  ?>
                              <tr style="">
                                <th scope="row" class="text-left">Company</th>
                                <td class="REPORTNO text-right"><?php echo $company; ?></td>
                              </tr>
                              <?php if($records['0']->name!=null){ ?>
                              <tr>
                                <th scope="row" class="text-left">Name</th>
                                <td class="text-right"><?php echo $records['0']->name;  ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->email!=null){ ?>
                              <tr>
                                <th scope="row" class="text-left">Email</th>
                                <td class="text-right"><?php echo $records['0']->email;  ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->contact != null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Contact</th>
                                <td class="text-right"><?php echo $records['0']->contact; ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->reference_number!=null){ ?>
                              <tr>
                                <th scope="row" class="text-left">Reference Number</th>
                                <td class="text-right"><?php echo $records['0']->reference_number;  ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->msg != null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Objective</th>
                                <td class="text-right"><?php echo $records['0']->msg; ?></td>
                              </tr>
                              <?php  }  ?>
                              <?php if($records['0']->frame==null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Timeframe</th>
                                <td class="text-right"><?php if($records['0']->frame != null){ echo $records['0']->frame; }  ?></td>
                              </tr>
                              <?php }  ?>
                              <?php if($records['0']->budget != null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Price</th>
                                <td class="text-right"><?php if($records['0']->budget != null){ echo $records['0']->budget; } ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->type !=null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Type</th>
                                <td class="REPORTNO text-right"><?php if($records['0']->type!=null){ echo $records['0']->type; } ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->item_no!=null){ ?>
                              <tr>
                                <th scope="row" class="text-left">Item No</th>
                                <td class="text-right"><?php if($records['0']->item_no!=null){ echo $records['0']->item_no; } ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->product_title != null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Product Title</th>
                                <td class="text-right"><?php if($records['0']->product_title != null){ echo $records['0']->product_title; } ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->metal != null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Metal</th>
                                <td class="text-right"><?php if($records['0']->metal != null){ echo $records['0']->metal; }  ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->diamond_clarity != null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Diamond Clarity</th>
                                <td class="text-right"><?php if($records['0']->diamond_clarity != null){ echo $records['0']->diamond_clarity; }  ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->size != null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Size</th>
                                <td class="text-right"><?php if($records['0']->size != null){ echo $records['0']->size; } ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->diamond_weight != null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Diamond Total Weight</th>
                                <td class="text-right"><?php if($records['0']->diamond_weight != null){ echo $records['0']->diamond_weight; }  ?></td>
                              </tr>
                              <?php } ?>
                               <?php if($records['0']->color_diamond_weight != null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Color Total Weight</th>
                                <td class="text-right"><?php if($records['0']->color_diamond_weight != null){ echo $records['0']->color_diamond_weight; }  ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->engraving != null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Engraving</th>
                                <td class="text-right"><?php if($records['0']->engraving != null){ echo $records['0']->engraving; } ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->center_diamond != null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Center Diamond</th>
                                <td class="text-right"><?php if($records['0']->center_diamond != null){ echo $records['0']->center_diamond; }  ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->status != null){  ?>
                              <tr style="">
                                <th scope="row" class="text-left">Status</th>
                                <td class="text-right"><?php if($records['0']->status != null){ echo $records['0']->status; } ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->is_approved != null){  ?>
                              <tr style="">
                                <th scope="row" class="text-left">Approval</th>
                                <td class="text-right"><?php if($records['0']->is_approved != null){ 
                              if($records['0']->is_approved == 0){ echo "Panding"; }
                              if($records['0']->is_approved == 1){ echo "Approved"; }
                              if($records['0']->is_approved == 2){ echo "Reject"; }
                              //echo $records['0']->is_approved; 
                              } 

                              ?></td>
                              </tr>
                              <?php } ?>

                               <?php if($records['0']->processing_status != null){  ?>
                              <tr style="">
                                <th scope="row" class="text-left">Processing Status</th>
                                <td class="text-right"><?php if($records['0']->processing_status != null){ 
                                if($records['0']->processing_status == 1){ echo "New Quote"; }
                                if($records['0']->processing_status == 2){ echo "Sent Quote"; }
                                if($records['0']->processing_status == 3){ echo "Approved"; }
                                if($records['0']->processing_status == 4){ echo "Sent CAD"; }
                                if($records['0']->processing_status == 5){ echo "CAD Approved"; }
                                if($records['0']->processing_status == 6){ echo "Finished"; }
                              //echo $records['0']->is_approved; 
                              } 

                                ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->create_date != null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Request Date</th>
                                <td class="text-right"><?php if($records['0']->create_date != null){ echo date('m-d-Y',strtotime($records['0']->create_date)); } ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->edit_date != '0000-00-00 00:00:00'){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Modifi Date</th>
                                <td class="text-right"><?php if($records['0']->edit_date != '0000-00-00 00:00:00'){ echo date('m-d-Y',strtotime($records['0']->edit_date)); } ?></td>
                              </tr>
                              <?php } ?>
                              <?php if($records['0']->reply != null){ ?>
                              <tr style="">
                                <th scope="row" class="text-left">Reply</th>
                                <td class="text-right"><?php if($records['0']->reply != null){ echo $records['0']->reply; } ?></td>
                              </tr>
                              <?php } ?>
                            </tbody>
                  </table>
                  </div>
                  
                  <table cellpadding="0" cellspacing="0" border="0" style="" class="table table-responsive table-condensed table-hover table-striped">
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
                        $processimg = $this->admin_model->selectWhere('tbl_process_image',$where2); ?>
                         <?php //print_ex($processimg);    ?>
                         <?php foreach ($processimg as $img) { ?>
                           <a href="<?php echo base_url().'../ftp_upload/design/' . $img->image; ?>" target="_blank" >
                            <img src="<?php echo base_url() .'../ftp_upload/design/' . $img->image; ?>" width="100px" > </a>
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
                      <td><?php  if($pro->created_by != 1 ){ echo "<span style='color: red;'>User</span>";}else{ echo "<span style='color: green;'>Admin</span>";} ?></td>
                    </tr>
                  <?php } ?>

                  </table>


                </div>
                <div class="tab-content" id="spec">
                  <p>Specification.</p>
                </div>
                <div class="tab-content" id="ret">
                  <p>Return</p>
                </div>
              </div>
            </div>
            <div class="actions">
            <?php if($records['0']->is_approved == 0){ ?>
            <form action="<?php echo base_url(); ?>design/design_edit_submit" method="post" enctype="multipart/form-data">

              <table cellpadding="0" cellspacing="0" border="0" style="" class="table table-responsive table-condensed table-hover table-striped">
              
                <input type="hidden" name="design_id" value="<?php echo $records['0']->design_id; ?>">
                <?php if($records['0']->is_approved == 0){ ?>
                <tr style=""> 
                   <th scope="row" class="text-left">Approve</th> 
                  <td class="text-right">                    
                    <select name="is_approved" class="form-control">
                      <option value="0" <?php if($records['0']->is_approved == 0){ echo 'selected="selected"'; } ?> >Pending</option>
                      <option value="1" <?php if($records['0']->is_approved == 1){ echo 'selected="selected"'; } ?> >Approve</option>
                  </select> 
                  </td> 
                </tr>
              <?php } ?>

               <?php //if($records['0']->processing_status == 0){ ?>
                <tr style=""> 
                   <th scope="row" class="text-left">Processing Status</th> 
                  <td class="text-right">                    
                    <select name="processing_status" class="form-control">
                      <option value="1" <?php if($records['0']->processing_status == 1){ echo 'selected="selected"'; } ?> >New Quote</option>
                      <option value="2" <?php if($records['0']->processing_status == 2){ echo 'selected="selected"'; } ?> >Sent Quote</option>
                      <option value="3" <?php if($records['0']->processing_status == 3){ echo 'selected="selected"'; } ?> >Approved</option>
                      <option value="4" <?php if($records['0']->processing_status == 4){ echo 'selected="selected"'; } ?> >Sent CAD</option>
                      <option value="5" <?php if($records['0']->processing_status == 5){ echo 'selected="selected"'; } ?> >CAD Approved</option>
                      <option value="6" <?php if($records['0']->processing_status == 6){ echo 'selected="selected"'; } ?> >Finished</option>
                  </select> 
                  </td> 
                </tr>
              <?php //} ?>

               <tr style=""> 
                   <th scope="row" class="text-left">DTW</th> 
                  <td class="text-right">                    
                  <input type="text" name="diamond_weight" id="diamond_weight" class="form-control" >
                  </td> 
                </tr>

                 <tr style=""> 
                   <th scope="row" class="text-left">CTW</th> 
                  <td class="text-right">                    
                    <input type="text" name="color_diamond_weight" id="color_diamond_weight" class="form-control" >
                  </td> 
                </tr>

                 <tr style=""> 
                   <th scope="row" class="text-left">Metal</th> 
                  <td class="text-right">                    
                    <input type="text" name="metal" id="metal" class="form-control" >
                  </td> 
                </tr>

                 <tr style=""> 
                   <th scope="row" class="text-left">Center Diamond</th> 
                  <td class="text-right">                    
                    <input type="text" name="center_diamond" id="center_diamond" class="form-control" >
                  </td> 
                </tr>

                 <tr style=""> 
                   <th scope="row" class="text-left">Reference Number</th> 
                  <td class="text-right">                    
                    <input type="text" name="reference_number" id="reference_number" class="form-control" >
                  </td> 
                </tr>

                 <tr style=""> 
                   <th scope="row" class="text-left">Price</th> 
                  <td class="text-right">                    
                   <input type="text" name="budget" id="budget" class="form-control">
                  </td> 
                </tr>

                 <tr style=""> 
                   <th scope="row" class="text-left">Images</th> 
                  <td class="text-right">                    
                   <input type="file" multiple="" class="form-control" id="img_upload" name="img_upload[]">
                  </td> 
                </tr>
               
                <tr style=""> 
                   <th scope="row" class="text-left">Reply</th> 
                  <td class="text-right">                    
                   <textarea rows="10" cols="100" name="reply"><?php echo $records['0']->reply; ?></textarea>
                  </td> 
                </tr>



                <tr style=""> 
                   <th scope="row" class="text-left"></th> 
                  <td class="text-right">                    
                   <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                  </td> 
                </tr>

              </table>
              
            </form>
          <?php } ?>
           <?php if($records['0']->is_approved == 1){ ?>
            <form action="<?php echo base_url(); ?>design/design_process_submit" method="post" enctype="multipart/form-data">

              <table cellpadding="0" cellspacing="0" border="0" style="" class="table table-responsive table-condensed table-hover table-striped">
               
                <input type="hidden" name="design_id" value="<?php echo $records['0']->design_id; ?>">
               
                <?php if($records['0']->is_approved == 1){ ?>
                <tr style=""> 
                   <th scope="row" class="text-left">Status</th> 
                  <td class="text-right">                    
                    <select name="status" class="form-control">
                      <!-- <option value="Quote" <?php if($records['0']->status == 'Quote'){ echo 'selected="selected"'; } ?> >Quote</option> -->
                      <option value="Order" <?php if($records['0']->status == 'Order'){ echo 'selected="selected"'; } ?> >Order</option>
                      <option value="Processed" <?php if($records['0']->status == 'Processed'){ echo 'selected="selected"'; } ?> >Processed</option>
                      <option value="Completed" <?php if($records['0']->status == 'Completed'){ echo 'selected="selected"'; } ?> >Completed</option>
                  </select> 
                  </td> 
                </tr>
                <?php } ?>
                 <tr style=""> 
                   <th scope="row" class="text-left">Processing Status</th> 
                  <td class="text-right">                    
                    <select name="processing_status" class="form-control">
                      <option value="1" <?php if($records['0']->processing_status == 1){ echo 'selected="selected"'; } ?> >New Quote</option>
                      <option value="2" <?php if($records['0']->processing_status == 2){ echo 'selected="selected"'; } ?> >Sent Quote</option>
                      <option value="3" <?php if($records['0']->processing_status == 3){ echo 'selected="selected"'; } ?> >Approved</option>
                      <option value="4" <?php if($records['0']->processing_status == 4){ echo 'selected="selected"'; } ?> >Sent CAD</option>
                      <option value="5" <?php if($records['0']->processing_status == 5){ echo 'selected="selected"'; } ?> >CAD Approved</option>
                      <option value="6" <?php if($records['0']->processing_status == 6){ echo 'selected="selected"'; } ?> >Finished</option>
                  </select> 
                  </td> 
                </tr>
                <tr style=""> 
                   <th scope="row" class="text-left">Job#</th> 
                  <td class="text-right">                    
                  <input type="text" name="job_no" id="job_no" value="<?php echo $records['0']->job_no; ?>" class="form-control" >
                  </td> 
                </tr>
                <tr style=""> 
                   <th scope="row" class="text-left">Image Type</th> 
                  <td class="text-right">                    
                    <select name="type" class="form-control">
                      <option value="">Select</option>
                      <option value="CAD">CAD</option>
                      <option value="Completed">Completed</option>
                  </select> 
                  </td> 
                </tr>
                 <tr style=""> 
                   <th scope="row" class="text-left">Images</th> 
                  <td class="text-right">                    
                   <input type="file" multiple="" class="form-control" id="img_upload" name="img_upload[]">
                  </td> 
                </tr>
                <tr style=""> 
                   <th scope="row" class="text-left">Reply</th> 
                  <td class="text-right">                    
                   <textarea rows="10" cols="100" name="reply"></textarea>
                  </td> 
                </tr>
                

                <tr style=""> 
                   <th scope="row" class="text-left"></th> 
                  <td class="text-right">                    
                   <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                  </td> 
                </tr>

              </table>
              
            </form>
          <?php } ?>


            </div>
          </div>
        </div>
      </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <div class="example-modal">
        <div class="modal  fade" id="diamond_details_modal">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Diamond Details</h4>
              </div>
              <div class="modal-body">
                <!-- <table class="table table-condensed">
                  <tbody>
                    <tr>
                      <th>Total Stone :- <span id="" class="text-danger">0</span></th>
                      <th>Total Retailer :- <span id="" class="text-danger">0</span></th>
                      <th>Last Activity :- <span id="last_activity" class="text-danger"></span></th>
                    </tr>
                  </tbody>
                </table> -->

                <table class="table table-condensed">
                  <tbody id="diamond_details_tbody">                  
                    
                  </tbody>                  
                </table>

                             
              </div>
              <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-flat btn-primary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-outline">Save changes</button> -->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.js"></script> -->

<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/manage_product.css">
<script src="<?php echo base_url() ?>assets/ajax/manage_product.js"></script> 
<script src="<?php echo base_url() ?>assets/ajax/manage_diamond_ajax.js"></script>


<script>
$(document).ready(function(){
  var n=10;
    $(".mySlides").hide();
    //$("#slides_"+n).show(); 

    //showSlides(n);
});
function  showZoom()
{
  //alert();
   $("#easy_zoom").show();
   $(".mySlides").hide();
}
</script>
<script src="<?php echo base_url(); ?>assets/js/easyzoom.js"></script>
<script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();
    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');
    $('.thumbnails').on('click', 'a', function(e) {
      var $this = $(this);
      e.preventDefault();
      // Use EasyZoom's `swap` method
      api1.swap($this.data('standard'), $this.attr('href'));
    });
</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

