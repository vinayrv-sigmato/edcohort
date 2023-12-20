  <?php 
      $group_f=$this->input->get('group_f');
   ?>
 <section class="content">
    <div class="container-fluid">
        
    <?php message(); ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="header">
                        <span class="header_span">Vendor List </span>                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-12 pull-right">
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
                                  <th class="sorting" >Image</th>
                                  <th class="sorting" >Name</th>
                                  <th class="sorting" >Email</th>
                                  <th class="sorting" >Created By</th>
                                  <th class="sorting" >Created At</th>
                                  <th class="sorting" >Edited By</th>
                                  <th class="sorting" >Edited At</th>
                                  <th class="sorting" >Status</th>
                                  <th class="sorting" >Email Verify</th>
                                  <th class="sorting" >Action</th>
                                </tr>
                              </thead>
                              <tbody>  
                              <?php foreach ($vendor_list as $vendor): ?>
                                <tr role="row" class="text-bold" >
                                  <td><input type="checkbox" id="check_<?php echo $vendor->CD_USER_ID; ?>" name="">
                                      <label for="check_<?php echo $vendor->CD_USER_ID; ?>"></label>
                                  </td> 
                                  <td class=""><img src="../../../uploads/chat/profile/<?php echo $vendor->profile_pic; ?>" width="50px"></td>
                                  <td class=""><?php echo $vendor->NM_USER_FULLNAME; ?></td>
                                  <td class=""><?php echo $vendor->NM_USER_EMAIL; ?></td>
                                  <td class=""><?php 
                                      $a=$this->admin_model->selectOne('tbl_user','CD_USER_ID',$vendor->SN_CREATED_BY);
                                      echo @$a['0']->NM_USER_FULLNAME; ?>
                                  </td>
                                  <td class=""><?php echo date('Y-m-d h:i A',strtotime($vendor->TS_CREATED_AT)); ?></td>
                                  <td class=""><?php 
                                      $b=$this->admin_model->selectOne('tbl_user','CD_USER_ID',$vendor->SN_EDITED_BY);
                                      echo @$b['0']->NM_USER_FULLNAME; ?>
                                  </td>
                                  <td class=""><?php if($vendor->TS_EDITED_AT!=""){ echo date('Y-m-d h:i A',strtotime($vendor->TS_EDITED_AT)); } ?></td>
                                  <td class=""><?php if($vendor->FL_USER_ACTIVE){ echo "ACTIVE"; }else{ echo "INACTIVE"; } ?></td>
                                  <td class=""><?php if($vendor->EMAIL_VERIFY=='1'){ echo "YES"; }else{ echo "NO"; } ?></td>
                                  <td class="">
                                    <a href="<?php echo base_url(); ?>admin_chat/edit_vendor/<?php echo $vendor->CD_USER_ID; ?>" class="btn btn-primary btn-sm btn-flat upper"><i class="fa fa-pencil"></i> Edit</a>
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
  