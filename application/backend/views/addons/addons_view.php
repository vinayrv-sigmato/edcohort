    <section class="content">

        <div class="container-fluid">

            <div class="row row-header">

                <div class="col-md-4">

                <h2>Addons <small>Addons List</small></h2>

                </div>

            </div>

            <?php message(); ?>

            <!-- Basic Examples -->

            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="card">

                        <div class="header">

                            <span class="header_span">Addons List</span>



                             <div class="col-lg-3 col-md-3 col-sm-3 col-12 pull-right">

                            

                                <div class="row clearfix col-lg-12 col-md-12 col-sm-12 col-12 ">

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 pull-right">

                                      <button class="btn btn-danger btn-sm" type="button" onclick="delete_addons()"><i class="fa fa-trash" aria-hidden="true"></i> Delete Addons</button>

                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 pull-right">

                                       <a href="<?php echo base_url(); ?>admin_addons/add" class="">

                                          <span><button class="btn bg-teal btn-sm" ><i class="fa fa-plus"></i> Add Addons </button> </span>

                                        </a> 

                                    </div>

                                </div>                            

                           

                              </div>                             

                        </div>   



                                            

                        <div class="body">

                            <div class="">

                                <table id="example1" class="table table-bordered table-striped table-hover table-condensed js-basic-example dataTable">

                                  <thead class="bg-teal">

                                  <tr>

                                    <th><input type="checkbox" id="checkAll" name="checkAll" onclick="parent_check_checked(this.checked)">

                                            <label for="checkAll"></label>                 

                                    </th>

                                    <th>Option</th>   

                                    <th>Priority</th>   

                                    <th class="col-md-2">Action</th>

                                  </tr>

                                  </thead>

                                  <tbody>

                                    <?php foreach ($addons_list as $addons): ?>

                                        <tr id="category_row_id_<?php echo $addons->addons_id;  ?>">

                                            <td class="col-md-1">                                            

                                              <input type="checkbox" class="multi-chk-complete" id="basic_<?php echo $addons->addons_id;  ?>" name="chk_status" value="<?php echo $addons->addons_id;  ?>" />   

                                              <label for="basic_<?php echo $addons->addons_id;  ?>"></label>

                                            </td>

                                            

                                            <td><strong><?php echo $addons->addons_name;?></strong></td>                                            

                                            <td><strong><?php echo $addons->sort;?></strong></td>                                            

                                            <td>

                                                <a href="<?php echo base_url()?>admin_addons/edit/<?php echo $addons->addons_id;  ?>" class="btn-sm btn bg-navy-blue waves-effect"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

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

    function delete_addons()

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

            alert('Please Select Option!');

        }

        var base_url='<?php echo base_url(); ?>admin_addons/delete';

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