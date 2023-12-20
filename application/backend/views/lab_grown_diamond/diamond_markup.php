    <section class="content">
        <div class="container-fluid">
            <div class="row row-header">
                <div class="col-md-6">
                <h2>Diamond <small>Add Markup</small></h2>
                </div>
                <div class="col-md-6">                 
                   
                  
                </div>
            </div>
            <?php message(); ?>
            
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Markup</h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="<?php echo base_url()?>admin_diamond/add_markup_submit" id="main" method="post">
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Markup %</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $pricing['0']->markup; ?>" required="" name="markup" id="markup">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Last Updated:</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <strong><?php echo date('Y-m-d h:i A',strtotime($pricing['0']->created_at)); ?></strong>
                                        </div>
                                    </div>
                                </div>
                               
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
