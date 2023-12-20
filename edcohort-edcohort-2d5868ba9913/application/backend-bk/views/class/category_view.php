    <section class="content">
        <div class="container-fluid">
            <div class="row row-header">
                <div class="col-md-4">
                <h2>Category <small>Category List</small></h2>
                </div>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="header">
                          <span class="header_span">Category List</span>
                          <div class="col-lg-3 col-md-3 col-sm-3 col-12 pull-right">                            
                                <div class="row clearfix col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 pull-right">
                                      <button class="btn btn-danger btn-sm" type="button" onclick="delete_category()"><i class="fa fa-trash" aria-hidden="true"></i> Delete Category</button>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 pull-right">
                                        <a href="<?php echo base_url(); ?>admin_category/add_category" class="">
                                          <span><button class="btn bg-teal btn-sm" ><i class="fa fa-plus"></i> Add Category </button> </span>
                                        </a> 
                                    </div>
                                </div> 
                            </div>
                        </div>                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered  table-responsive table-striped table-hover table-condensed js-basic-example dataTable">
                                  <thead class="bg-teal">
                                  <tr>
                                    <th><input type="checkbox" id="checkAll" name="checkAll" onclick="parent_check_checked(this.checked)">
                                            <label for="checkAll"></label>                 
                                    </th>
                                    <th>Category</th>                                    
                                    <th>Category Code</th>                                    
                                    <th>Sort Order</th>
                                    <th>Menu</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($category_list as $category): ?>
                                        <tr id="category_row_id_<?php echo $category->category_id;  ?>">
                                            <td class="col-md-1">                                            
                                              <input type="checkbox" class="multi-chk-complete" id="basic_<?php echo $category->category_id;  ?>" name="chk_status" value="<?php echo $category->category_id;  ?>" />   
                                              <label for="basic_<?php echo $category->category_id;  ?>"></label>
                                            </td>
                                            
                                            <td><strong><?php echo getMenuList($category->category_id);?></strong></td>
                                            <td><strong><?php echo $category->category_id;?></strong></td>
                                            <td><?php echo $category->category_sort_order;  ?></td>
                                            <td><?php if($category->show_menu=="1"){ ?>
                                                  <span class="label label-success">Enabled</span>
                                                <?php } else { ?>
                                                  <span class="label label-danger">Disabled</span>
                                                <?php } ?>
                                            </td>
                                            <td><?php if($category->category_status=="active"){ ?>
                                                  <span class="label label-success">Active</span>
                                                <?php } else { ?>
                                                  <span class="label label-danger">Inactive</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url()?>admin_category/edit_category/<?php echo $category->category_id;  ?>" class="btn-sm btn btn-primary waves-effect"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>                
                                  </tbody>          
                                </table>

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
    function delete_category()
    {
      var conf=confirm('Are You Sure ?');
      if(conf)
      {
        var checkboxValue=[];
        $.each($("input[name='chk_status']:checked"), function()
        {
            checkboxValue.push($(this).val());
        });
        var checkboxValue=checkboxValue.join(",");
        //alert(checkboxValue);
        if(checkboxValue=="")
        {
            alert('Please Select Category!');
        }
        var base_url='<?php echo base_url(); ?>admin_category/delete_category';
        $.ajax(
        {
            type: "POST",
            dataType:'text',
            url:base_url,
            data: { id: checkboxValue},
            async: false,
            success: function(data)
            {
                    $.each($("input[name='chk_status']:checked"), function()
                    {
                        $("#category_row_id_"+$(this).val()).hide();
                    });
            }
        });
      }

    }
</script>