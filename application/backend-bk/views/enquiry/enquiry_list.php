<section class="content">
    <div class="container-fluid">
        <div class="row row-header">
            <div class="col-md-8">
            <h2>Enquiry <small>Enquiry List</small></h2>
            </div>
            <div class="col-md-4">
                <h2><a class="btn bg-pink waves-effect m-b-15 collapsed" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-filter"></i> Filter
                </a></h2>
            </div>
        </div>
        <?php message(); ?>
    <?php
      $filter_name=$this->input->get('filter_name');
      $filter_email=$this->input->get('filter_email');
      $filter_phone=$this->input->get('filter_phone');
      $filter_status=$this->input->get('filter_status');
      $filter_stock=$this->input->get('filter_stock');
    ?>
        <!-- Basic Examples -->
<div class="row collapse" id="collapseExample" aria-expanded="false">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="body ">
                <form id="form">
                <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Stock </label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input name="filter_stock" id="filter_stock" value="<?php echo  $filter_stock; ?>" class="form-control">                                                            
                            </div>                                           
                        </div>
                    </div>
                </div> 
                <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Name </label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input name="filter_name" id="filter_name" value="<?php echo  $filter_name; ?>" class="form-control">                                                            
                            </div>                                           
                        </div>
                    </div>
                </div> 

                <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Email </label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input name="filter_email" id="filter_email" value="<?php echo  $filter_email; ?>"  class="form-control">                              
                            </div>                                           
                        </div>
                    </div>
                </div>

                <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Phone </label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input name="filter_phone" id="filter_phone" value="<?php echo  $filter_phone; ?>"  class="form-control">                               
                            </div>                                           
                        </div>
                    </div>
                </div>

                <!-- <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Status </label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control" name="filter_status" id="filter_status">
                                    <option value="" >Select</option>
                                    <option value="1" <?php if($filter_status=='1'){ echo 'selected'; } ?>>Active</option>
                                    <option value="0" <?php if($filter_status=='0'){ echo 'selected'; } ?>>Inactive</option>  
                                </select>                            
                            </div>                                           
                        </div>
                    </div>
                </div> -->

                <div class="row clearfix col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="col-lg-offset-8 col-md-offset-8 col-sm-offset-8 col-lg-2 col-md-2 col-sm-2 col-xs-6">                        
                        <button type="button" class="btn bg-teal btn-block waves-effect" onclick="submitForm()"><i class="material-icons">search</i><span>SEARCH</span></button>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">                        
                        <a href="<?php echo base_url() ?>admin_enquiry" class="btn bg-red btn-block waves-effect" ><i class="material-icons">refresh</i><span>RESET</span></a>
                    </div>
                </div>

                <div class="row clearfix"></div>               
                </form>
            </div>
        </div>
    </div>
</div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="header">
                        <span class="header_span">Enquiry List</span>
                        
                        <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-12 pull-right">
                            <form class="form-inline" action="<?php echo base_url(); ?>/admin_customer/customer_action" method="post">
                                <div class="row clearfix col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="action" id="action">
                                                    <option value="">Select Action</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>                                                    
                                                </select>                            
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3">
                                        <button class="btn bg-red btn-sm" type="button" onclick="setAction()"> Submit</button>
                                    </div>
                                </div>                            
                            </form>
                        </div> -->  
                                                    
                    </div> 
                                         
                    <div class="body">
                        <div class="table-responsive1">
                            <table id="example" class="table table-bordered table-responsive table-striped table-hover table-condensed js-basic-example1 dataTable">
                              <thead class="bg-teal">
                              <tr>
                               <!--  <th><input type="checkbox" id="selectall" name="checkAll" onclick="checkAll(this.checked)">
                                    <label for="selectall"></label>
                                </th> -->
                                  <th>SKU</th>
                                  <th>Product Name</th>
                                  <th>Type</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone</th> 
                                  <th>Message</th>    
                                  <th>Description</th>                       
                                  <th>Date</th>
                                 
                                  <!-- <th>Action</th> -->
                              </tr>
                              </thead>
                              <tbody id="add_data">
                                             
                              </tbody>          
                            </table>
                        </div>
                        <div id="pagination-div-id"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>


<!-- Custom JS -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/ajax/manage_enquiry_ajax.js"></script>
<script type="text/javascript">
    function checkAll(chk)
    {
        if(chk==true)
        {
          $('.multi-chk-complete').each(function() {
              this.checked = true;
          });
        }
        else
        {
          $('.multi-chk-complete').each(function() {
              this.checked = false;
          });
        }
    }
</script>






