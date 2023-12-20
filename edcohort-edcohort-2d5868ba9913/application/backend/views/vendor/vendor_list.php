<?php 

      $group_f=$this->input->get('group_f');

   ?>

<section class="content">
  <div class="container-fluid">
    <div class="row row-header">
      <div class="col-md-8">
        <h2>Vendor <small>Vendor List</small></h2>
      </div>
      <div class="col-md-4">
        <div class=""> <a href="<?php echo base_url(); ?>admin_vendor/add_vendor" class="btn btn-sm btn-primary btn-flat pull-left"><i class="fa fa-plus"></i> Add Vendor</a> </div>
       <!--  <div class="">
          <form action="" method="get">
            <select class="btn bg-gray btn-flat" name="group_f" id="group_f" style="height: 30px;" onchange="form.submit()">
              <option value="">Select Group</option>
              <?php foreach ($group_list as $group): ?>
              <option value="<?php echo $group->CD_VENDOR_GROUP_ID; ?>" <?php if($group_f==$group->CD_VENDOR_GROUP_ID){ echo "selected"; } ?>><?php echo $group->SN_VENDOR_GROUP_NAME; ?></option>
              <?php endforeach ?>
            </select>
          </form>
        </div> -->
      </div>
    </div>
    <?php message(); ?>
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="header"> <span class="header_span">Vendor List (Total:
            <total id="total_records"></total>
            )</span>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 pull-right"> 
              
              <!-- <form class="form-inline" action="javascript:void(0)" method="post">

                                <div class="row clearfix col-lg-12 col-md-12 col-sm-12 col-12 ">

                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-9">

                                        <div class="form-group">

                                            <div class="form-line">

                                                <select class="form-control" name="action" id="action">

                                                    <option value="">Select Action</option>

                                                    <option value="active">Active</option>

                                                    <option value="inactive">Inactive</option>

                                                </select>                            

                                            </div>      

                                            <input type="hidden" name="vendor_id" id="vendor_id" value="">                                     

                                        </div>

                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3">

                                        <button class="btn bg-red btn-sm" type="button" onclick="delete_vendor()"> Submit</button>

                                    </div>

                                </div>                            

                            </form> --> 
              
            </div>
          </div>
          <div class="body">
            <div class="table-responsive1">
              <table id="example" class="table table-bordered table-responsive table-striped table-hover table-condensed js-basic-example1 dataTable">
                <thead class="bg-teal">
                  <tr>
                    <th><input type="checkbox" id="selectall" name="checkAll" onclick="checkAll(this.checked)">
                      <label for="selectall"></label>
                    </th>
                    <th class="sorting" >Company Name</th>
                    <th class="sorting" >Sales Person</th>
                    <th class="sorting" >Group</th>
                    <th class="sorting" >Email</th>
                    <th class="sorting" >Phone</th>
                    <th class="sorting" >Created By</th>
                    <th class="sorting" >Created At</th>
                    <th class="sorting" >Edited By</th>
                    <th class="sorting" >Edited At</th>
                    <th class="sorting" >Status</th>                    
                    <th class="sorting" >Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($vendor_list as $vendor): ?>
                  <tr role="row" class="text-bold" >
                    <td><input type="checkbox" id="check_<?php echo $vendor->CD_USER_ID; ?>" name="">
                      <label for="check_<?php echo $vendor->CD_USER_ID; ?>"></label></td>
                    <td class=""><?php echo $vendor->NM_COMPANY_NAME; ?></td>
                    <td class=""><?php echo $vendor->NM_PRIMARY_CONTACT_NAME; ?></td>
                    <?php $vendor_group=$this->vendor_model->vendor_group($vendor->CD_USER_ID);

                                        $group_array=array();

                                        foreach ($vendor_group as $row){

                                            $group_array[]= $row->SN_VENDOR_GROUP_NAME;

                                        } ?>
                    <td class=""><?php echo implode(',',$group_array); ?></td>
                    <td class=""><?php echo $vendor->NM_USER_EMAIL; ?></td>
                    <td class=""><?php echo $vendor->SN_USER_MOBILE; ?></td>
                    <td class=""><?php 

                                      $a=$this->admin_model->selectOne('tbl_user','CD_USER_ID',$vendor->SN_CREATED_BY);

                                      echo @$a['0']->NM_USER_FULLNAME; ?></td>
                    <td class=""><?php echo date('Y-m-d h:i A',strtotime($vendor->TS_CREATED_AT)); ?></td>
                    <td class=""><?php 

                                      $b=$this->admin_model->selectOne('tbl_user','CD_USER_ID',$vendor->SN_EDITED_BY);

                                      echo @$b['0']->NM_USER_FULLNAME; ?></td>
                    <td class=""><?php if($vendor->TS_EDITED_AT!=""){ echo date('Y-m-d h:i A',strtotime($vendor->TS_EDITED_AT)); } ?></td>
                    <td class=""><?php if($vendor->FL_USER_ACTIVE){ echo "ACTIVE"; }else{ echo "INACTIVE"; } ?></td>
                    <td class=""><a href="<?php echo base_url(); ?>admin_vendor/edit_vendor/<?php echo $vendor->CD_USER_ID; ?>" class="btn btn-primary btn-sm btn-flat upper"><i class="fa fa-pencil"></i> Edit</a>
                      <button class="btn btn-primary btn-sm btn-flat upper" type="button" onclick="vendor_details('<?php echo $vendor->CD_USER_ID; ?>')"><i class="fa fa-eye"></i> View</button>
                       <?php   
					  		$wheremrkup = ' vendor_id = '.$vendor->CD_USER_ID.'';  
					  		$makup =$this->admin_model->selectWhere('tbl_pricing',$wheremrkup);
							 if(count($makup)>0){ ?>
                             <a href="<?php echo base_url(); ?>admin_vendor/edit_markup/<?php echo $vendor->CD_USER_ID; ?>" class="btn btn-primary btn-sm btn-flat upper"><i class="fa fa-pencil"></i> Markup</a>                             
                             <?php }else{ ?> 
                              <a href="<?php echo base_url(); ?>admin_vendor/add_markup/<?php echo $vendor->CD_USER_ID; ?>" class="btn btn-primary btn-sm btn-flat upper"><i class="fa fa-pencil"></i> Markup</a>
                              <?php }  ?> 
                      
                       
                      </td>
                  </tr>
                  <?php endforeach ?>
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
<script>

    function vendor_details(id) {

      var html="";

      var last_activity="";

      $.ajax({

        url: base_url+'admin_vendor/vendor_details_ajax',

        dataType: 'json',

        type: 'post',            

        data: {'vendor_id': id,},                                         

        success: function(data){

          //alert(data);

          var data_login=data.last_login;

          var details=data.result;

          var v_group=data.v_group;

          

          //alert(v_group);

          if(data_login.length)

          {

            last_activity= data_login[0].TS_CREATED_AT;

          }

          $("#last_activity").text(last_activity);

                          

          for(i=0;i<details.length;i++)

          {

              html +='<tr><th class="col-md-2">Logo :-</th>';

              html +='  <td></td></tr>';

              html +='<tr><th>Banner :-</th>';

              html +='  <td></td></tr>';

              html +='<tr><th>Company Name :-</th>';

              html +='  <td>'+details[i].NM_COMPANY_NAME+'</td></tr>';

              html +='<tr><th>Email :-</th>';

              html +='  <td>'+details[i].NM_USER_EMAIL+'</td></tr>';

              html +='<tr><th>Phone :-</th>';

              html +='  <td>'+details[i].SN_USER_MOBILE+'</td></tr>';

              html +='<tr><th>Sales Person :-</th>';

              html +='  <td>'+details[i].NM_PRIMARY_CONTACT_NAME+'</td></tr>';

              html +='<tr><th>Tagline :-</th>';

              html +='  <td>'+details[i].COMPANY_TAGLINE+'</td></tr>';

              html +='<tr><th>Company Bio :-</th>';

              html +='  <td>'+details[i].NM_COMPANY_BIO+'</td></tr>';

              html +='<tr><th>Website :-</th>';

              html +='  <td>'+details[i].NM_COMPANY_WEBSITE+'</td></tr>';

              html +='<tr><th>Group :-</th>';

              html +='  <td>'+v_group+'</td></tr>';

              html +='<tr><th>Ftp Folder :-</th>';

              html +='  <td>'+details[i].NM_FOLDER_NAME+'</td></tr>';               

          }               



          $('#vendor_details_tbody').html(html);

        },

      });

      $("#vendor_details_modal").modal('show');

    }

  </script>
<div class="example-modal">
  <div class="modal  fade" id="vendor_details_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Vendor Details</h4>
        </div>
        <div class="modal-body">
          <table class="table table-condensed">
            <tbody>
              <tr>
                <th>Total Stone :- <span id="" class="text-danger">0</span></th>
                <th>Total Retailer :- <span id="" class="text-danger">0</span></th>
                <th>Last Activity :- <span id="last_activity" class="text-danger"></span></th>
              </tr>
            </tbody>
          </table>
          <table class="table table-condensed">
            <tbody id="vendor_details_tbody">
            </tbody>
          </table>
        </div>
        <div class="modal-footer bg-primary">
          <button type="button" class="btn btn-flat btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
