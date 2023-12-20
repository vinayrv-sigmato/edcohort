<style>
  li {
        list-style: none;
  }
  .panel {
    margin-bottom: 0px;
    background-color: #fff;
    border: 1px solid #c1c1c100;
     border-radius: 0px; 
     -webkit-box-shadow: none; 
     box-shadow: none; 
}
.panel > li {
    padding: 6px;
    background: #f0f8ff;
}
.panel-body {
    background: #e9f1ff;
}
</style>
    <section class="content">
        <div class="container-fluid">
            <div class="row row-header">
                <div class="col-md-4">
                <h2>Menu <small>Menu List</small></h2>
                </div>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
              <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="card">   
                        <div class="header">
                          <span class="header_span">Custom Link</span>                          
                        </div>                     
                        <div class="body">
                              <form class="form-horizontal" action="<?php echo base_url()?>admin_menu/add_menu_submit" id="main" method="post" >                              
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 form-control-label">
                                        <label for="">URL</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" required="" value="http://" name="url" id="url">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 form-control-label">
                                        <label for="">Link Text</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" required="" name="url_text" id="url_text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="custom_parent_id" id="custom_parent_id" value="0">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 pull-right">
                                        <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect" onclick="return add_custom_link()">Add to menu</button>
                                    </div>
                                </div>
                              </form>
                        </div>
                    </div>

                    <div class="card">   
                        <div class="header">
                          <span class="header_span">Categories</span>                          
                        </div>                     
                        <div class="body">
                              <form class="form-horizontal" action="<?php echo base_url()?>admin_menu/add_menu_cat_submit" id="main" method="post" >
                                <div class="row clearfix">                                    
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <ul id="list_category">
                                          
                                        </ul>
                                    </div>
                                </div>

                                <input type="hidden" name="cat_parent_id" id="cat_parent_id" value="0">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 pull-right">
                                        <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect" onclick="return add_cat_link()">Add to menu</button>
                                    </div>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                    <div class="card" style="overflow: hidden;">
                        <div class="header">
                          <span class="header_span">Menu List</span>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-12 pull-right">                            
                                <div class="row clearfix col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-right">
                                      <form class="form-inline" action="javascript:void(0)" method="post">
                                          
                                              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
                                                  <div class="form-group">
                                                      <div class="form-line">
                                                          <select class="form-control" name="action" id="action">
                                                              <option value="">Select Action</option>
                                                              <option value="active">Active</option>
                                                              <option value="inactive">Inactive</option>
                                                              <option value="delete">Delete</option>
                                                          </select>                            
                                                      </div>      
                                                      <input type="hidden" name="product_id" id="product_id" value="">                                     
                                                  </div>
                                              </div>
                                              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                                                  <button class="btn bg-red btn-sm" type="button" onclick="delete_menu()"> Submit</button>
                                              </div>
                                                                    
                                      </form>
                                    </div>
  
                                </div> 
                            </div>
                        </div>                        
                        <div class="body">
                            <div class="" style="width: 100%;height:100%;max-height: 600px;overflow-x: scroll;">
                                    <?php foreach ($menu_list as $menu): ?>
                                      <?php $status = ($menu->is_active) ? 'active' : 'inactive'; ?>
                                      <div class="panel">
                                      <li id='menu_row_id_<?php echo $menu->menu_id; ?>'>
                                        <input type='checkbox' class='multi-chk-complete' id='basic_<?php echo $menu->menu_id; ?>' name='chk_status' value='<?php echo $menu->menu_id; ?>' onclick='get_category(this.value,this.checked)' />   
                                        <label for="basic_<?php echo $menu->menu_id; ?>"><?php echo $menu->label; ?></label>
                                        <a role="button" data-toggle="collapse" data-parent="#accordion_<?php echo $menu->menu_id; ?>" href="#collapseOne_<?php echo $menu->menu_id; ?>" aria-expanded="false" aria-controls="collapseOne_<?php echo $menu->menu_id; ?>" class="collapsed">
                                              Edit </a>
                                        <strong id="status_<?php echo $menu->menu_id; ?>"> <?php echo $status; ?> </strong>        
                                      </li>
                                        <div id="collapseOne_<?php echo $menu->menu_id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_<?php echo $menu->menu_id; ?>" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                              <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                                <form class="form-horizontal" action="<?php echo base_url()?>admin_menu/edit_menu_submit" id="main" method="post" >
                                                  <?php if ($menu->link): ?>
                                                    <div class="row clearfix">                                                      
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 form-control-label">
                                                            <label for="">URL</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                            <div class="form-group">
                                                                <div class="form-line ">
                                                                    <input type="text" class="form-control" required="" value="<?php echo $menu->link; ?>" name="url" id="url">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <?php endif ?>
                                                  <div class="row clearfix">
                                                      <div class="col-lg-4 col-md-4 col-sm-6 col-12 form-control-label">
                                                          <label for="">Link Text / Label</label>
                                                      </div>
                                                      <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                          <div class="form-group">
                                                              <div class="form-line ">
                                                                  <input type="text" class="form-control" required="" value="<?php echo $menu->label; ?>" name="url_text" id="url_text">
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>                                                 
                                                  <div class="row clearfix">
                                                      <div class="col-lg-4 col-md-4 col-sm-6 col-12 form-control-label">
                                                          <label for="">Sort</label>
                                                      </div>
                                                      <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                          <div class="form-group">
                                                              <div class="form-line ">
                                                                  <input type="text" class="form-control" required="" value="<?php echo $menu->sort; ?>" name="sort" id="sort">
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>                                                  
                                                  <div class="row clearfix">
                                                      <div class="col-lg-4 col-md-4 col-sm-6 col-12 form-control-label">
                                                          <label for="">Block / Segment</label>
                                                      </div>
                                                      <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                          <div class="form-group">
                                                              <div class="form-line ">
                                                                  <input type="text" class="form-control" required="" value="<?php echo $menu->block; ?>" name="block" id="block">
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>                                                  
                                                  <div class="row clearfix">
                                                      <div class="col-lg-4 col-md-4 col-sm-6 col-12 form-control-label">
                                                          <label for="">Css Class</label>
                                                      </div>
                                                      <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                                          <div class="form-group">
                                                              <div class="form-line ">
                                                                  <input type="text" class="form-control" required="" value="<?php echo $menu->css_class; ?>" name="css_class" id="css_class">
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <input type="hidden" name="menu_id" id="menu_id" value="<?php echo $menu->menu_id; ?>">
                                                  <div class="row clearfix">
                                                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 pull-right">
                                                          <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect" >Edit</button>
                                                      </div>
                                                  </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                      </div>



                                      <?php echo $this->menu_model->get_menu_tree($menu->menu_id,'') ?>
                                    <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

        </div>
    </section>
<script type="text/javascript">
function parent_check_checked(chk)
  {
      var oTable = $("#example1").dataTable();
      if(chk==true)
      {
          $('.multi-chk-complete', oTable.fnGetNodes()).each(function() {
              this.checked = true;
          });
      }
      else
      {
          $('.multi-chk-complete', oTable.fnGetNodes()).each(function() {
              this.checked = false;
          });
      }
  }
</script>
<script>
  function multi_action()
  {
      var checkboxValue=[];
      $.each($("input[name='chk_status']:checked"), function()
      {
          checkboxValue.push($(this).val());
      });
      var checkboxValue=checkboxValue.join(",");
      $("#hid_id").val(checkboxValue);
      //return false;
  }
</script>
<script type="text/javascript">
function delete_menu()
{
    var checkboxValue=[];
    var action =$("#action").val();
    $("input[name='chk_status']:checked").each( function()
    {
        checkboxValue.push($(this).val());
    });     

    if(!checkboxValue.length)
    {
        alert_boot("Please Select Product!");
    }
    else if(action=="")
    {
        alert_boot("Please Select Action!");
    }
    else 
    {
        alertify.confirm(
            siteName, 
            'Are you sure ?', 
            function(evt, value)
            {                             
                $.ajax({
                    url: base_url+'admin_menu/delete_menu',
                    dataType: 'json',
                    type: 'post',            
                    data: { "id": checkboxValue, action: action},                                         
                    success: function(data){
                        checkboxValue.forEach(function(element,index) {        
                            if(action=='delete') 
                            {
                                $("#menu_row_id_"+element).remove();
                                $("#collapseOne_"+element).remove();
                            } 
                            else if(action=='active' || action=='inactive' ) 
                            {
                                $("#status_"+element).html(action);
                            }                   
                            
                        });                            
                    } 
                });                          
            }
            ,function(){ 
         });
    }

}
</script>
<script>
  function add_custom_link() {
    var checkboxValue=[];
    $.each($("input[name='chk_status']:checked"), function()
    {
        checkboxValue.push($(this).val());
    });
    if(checkboxValue.length > 1){
        alert_boot('Please Select Maximum One Menu!')
        return false;
    }else if(checkboxValue.length==1){    
        $("#custom_parent_id").val(checkboxValue[0]);
        return true; 
    }else{
        $("#custom_parent_id").val(0);
        return true;
    }
  }
</script>
<script>
  function add_cat_link() {
    var checkboxValue=[];
    $.each($("input[name='chk_status']:checked"), function()
    {
        checkboxValue.push($(this).val());
    });
    if(checkboxValue.length>1){
        alert_boot('Please Select Maximum One Menu!')
        return false;
    }else if(checkboxValue.length==1){    
        $("#cat_parent_id").val(checkboxValue[0]);
        return true; 
    }else{
        $("#cat_parent_id").val(0);
        return true;
    }   
  }
</script>
<script>
  $(document).ready(function(){
    get_category();
  })
function get_category(value,status)
{
    var html='';
    var checkboxValue=[];
    $.each($("input[name='chk_status']:checked"), function()
    {
        checkboxValue.push($(this).val());
    });

      $.ajax(
          {
              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>admin_menu/get_category",
              data: {category_id: checkboxValue[0]},
              async: false,
              success: function(data)
              {
                  for(var i=0; i<data.length; i++)
                  {
                      html+='<li><input type="checkbox" class="multi-chk-complete" id="cat_list_'+data[i].category_id+'" name="cat_list[]" value="'+data[i].category_id+'"  />';   
                      html+='<label for="cat_list_'+data[i].category_id+'">'+data[i].category_name+'<label></li>';
                  }
                  //console.log(html)
                  $("#list_category").html(html);

              }
          });

}
</script>