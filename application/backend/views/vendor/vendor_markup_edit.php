    <section class="content">
        <div class="container-fluid">
            <div class="row row-header">
                <div class="col-md-6">
                <h2>Vendor<small>Add Markup</small></h2>
                </div>
                <div class="col-md-6">                 
                   
                  
                </div>
            </div>
            <?php message();
			//print_ex($markup_list);
			 ?>
            
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Markup</h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="<?php echo base_url()?>admin_vendor/edit_markup_submit" id="main" method="post">
                                <input type="hidden" value="<?php echo $vendor_id; ?>" name="vendor_id"  />
                                <?php foreach($markup_list as $markup){ ?>
                                <?php  if($markup->from_ct == '0.18'){ ?>
                                	<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">0.18-0.22 Markup %</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $markup->markup; ?>" required="" name="0.18-0.22" id="0.18-0.22">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                 <?php  if($markup->from_ct == '0.23'){ ?>
                               		 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">0.23-0.49 Markup %</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $markup->markup; ?>" required="" name="0.23-0.49" id="0.23-0.49">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                 <?php  if($markup->from_ct == '0.5'){ ?>
                               		 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">0.50-0.69 Markup %</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $markup->markup; ?>" required="" name="0.50-0.69" id="0.50-0.69">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                 <?php  if($markup->from_ct == '0.7'){ ?>
                               		 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">0.70-0.89 Markup %</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $markup->markup; ?>" required="" name="0.70-0.89" id="0.70-0.89">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                 <?php  if($markup->from_ct == '0.9'){ ?>
                               		 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">0.90-0.99 Markup %</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $markup->markup; ?>" required="" name="0.90-0.99" id="0.90-0.99">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                 <?php  if($markup->from_ct == '1'){ ?>
                               		 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">1.00-1.49 Markup %</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $markup->markup; ?>" required="" name="1.00-1.49" id="1.00-1.49">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                 <?php  if($markup->from_ct == '1.5'){ ?>
                                	<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">1.50-1.99 Markup %</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $markup->markup; ?>" required="" name="1.50-1.99" id="1.50-1.99">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                 <?php  if($markup->from_ct == '2'){ ?>
                                	<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">2.00-2.99 Markup %</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $markup->markup; ?>" required="" name="2.00-2.99" id="2.00-2.99">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                 <?php  if($markup->from_ct == '3'){ ?>
                                	<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">3.00 - 3.99 Markup %</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $markup->markup; ?>" required="" name="3.00-3.99" id="3.00-3.99">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                 <?php  if($markup->from_ct == '4'){ ?>
                                	<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">4.00-4.99 Markup %</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $markup->markup; ?>" required="" name="4.00-4.99" id="4.00-4.99">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                 <?php  if($markup->from_ct == '5'){ ?>
                                	<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">5.00-5.99 Markup %</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $markup->markup; ?>" required="" name="5.00-5.99" id="5.00-5.99">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                 <?php  if($markup->from_ct == '6'){ ?>
                                	<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">6.00-50 Markup %</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $markup->markup; ?>" required="" name="6.00-50" id="6.00-50">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                
                                <?php } ?>
                               
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4  col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect">Submit</button>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <!-- <a href="<?php //echo base_url()?>admin_category" class="btn bg-red btn-block btn-lg waves-effect" style="">Cancel</a> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>
