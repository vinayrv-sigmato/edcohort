    <section class="content">
        <div class="container-fluid">
            <div class="row row-header">
                <div class="col-md-6">
                <h2>Addons <small>Edit Addons</small></h2>
                </div>
                <div class="col-md-6">
                  
                </div>
            </div>
            <?php message(); ?>
            <?php $addons_row=$addons_detail['0']; ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Addons</h2>                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="<?php echo base_url()?>admin_addons/edit_submit" id="main" method="post" >
                                                                                            
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Addons Name <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $addons_row->addons_name; ?>" required="required" name="addons_name" id="addons_name">
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo $addons_row->addons_id; ?>" name="addons_id">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Priority</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" value="<?php echo $addons_row->sort; ?>"  name="priority" id="priority">
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Applied To <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="category[]" required="" id="category" multiple data-multiple-separator=" | " data-live-search="true">
                                                    <option value="0" <?php if(in_array(0, $addons_category)){ echo 'selected'; } ?>>All Products</option>
                                                    <?php foreach ($category_list as $parent_category) { ?>
                                                    <option value="<?php echo $parent_category->category_id; ?>" <?php if(in_array($parent_category->category_id, $addons_category)){ echo 'selected'; } ?>>Category: <?php echo getMenuList($parent_category->category_id);?></option>
                                                    <?php } ?>
                                                </select>                                                 
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>

                            <div id="product_tag" >
                                <?php foreach ($addons_group as $keyag => $valueag): ?> 
                                <div class="addon-row" >
                                    <div class="row clearfix"><hr></div>
                                    <div class="row clearfix ">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                            <label for="">Group  </label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                            <div class="form-group">
                                                <div class="form-line ">                                                   
                                                    <select class="form-control show-tick ms" name="group_type[<?php echo $keyag; ?>]" >
                                                        <?php foreach ($form_field_list as $form_field) { ?>
                                                        <option value="<?php echo $form_field->value; ?>" <?php if($valueag->group_type==$form_field->value){ echo 'selected'; }  ?>><?php echo $form_field->name;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>                                           
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 pull-right">
                                            <button type="button" class="btn bg-teal expandVariation"  title="Expand/Close "><i class="fa fa-arrow-up"></i> </button>                                          
                                            <button type="button" class="btn bg-red removeVariation" onclick="" title="Remove "><i class="fa fa-times"></i> </button>                                                                              
                                        </div>
                                    </div>
                                     
                                    <div class="addon-row-second" style="display: block">
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                            <label for="">Group Name </label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <div class="form-line ">
                                                    <input type="text" class="form-control" value="<?php echo $valueag->group_name; ?>"  name="group_name[<?php echo $keyag; ?>]"  >
                                                </div>                                           
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-2 col-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="checkbox" id="group_required[<?php echo $keyag; ?>]" class="filled-in" <?php if ($valueag->required){ echo 'checked'; } ?> name="group_required[<?php echo $keyag; ?>]"  value="1"> 
                                                    <label for="group_required[<?php echo $keyag; ?>]"></label> Required Field                                         
                                                </div> 
                                            </div>
                                        </div>                                    
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                            <label for="">Group Description </label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                            <div class="form-group">
                                                <div class="form-line ">
                                                    <textarea class="form-control" name="group_description[<?php echo $keyag; ?>]" cols="30" rows="2"><?php echo $valueag->group_description; ?></textarea>
                                                </div>                                           
                                            </div>
                                        </div>                                    
                                    </div>
                                 
                                    <div class="row clearfix">                                
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-12 table-responsive">
                                            <table class="table table-responsive">
                                                <thead class="bg-grey">
                                                    <tr>
                                                        <th>Option Label</th>
                                                        <th>Option Price</th>
                                                        <th>Min</th>
                                                        <th>Max</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($valueag->value_list as $keyvl => $valuevl): ?>
                                                    <tr>
                                                        <td><input type="text" class="form-control" value="<?php echo $valuevl->label; ?>" name="addon_option_label[<?php echo $keyag; ?>][]" ></td>
                                                        <td><input type="text" class="form-control" value="<?php echo $valuevl->price; ?>" name="addon_option_price[<?php echo $keyag; ?>][]" ></td>
                                                        <td><input type="text" class="form-control" value="<?php echo $valuevl->min; ?>" name="addon_option_min[<?php echo $keyag; ?>][]" ></td>
                                                        <td><input type="text" class="form-control" value="<?php echo $valuevl->max; ?>" name="addon_option_max[<?php echo $keyag; ?>][]" ></td>
                                                        <td><button class="btn bg-grey removeOption">X</button></td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                                <tfoot>                         
                                                    <tr>                                
                                                        <td colspan="5"><button type="button" data-value="<?php echo $keyag; ?>" class="addAddonOption btn bg-grey">New Option</button></td>                         
                                                    </tr>                       
                                                </tfoot>
                                            </table>
                                        </div>                                    
                                        </div>                                    
                                    </div>
                                </div> 
                                <?php endforeach ?>
                            </div>
                           
                            <div class="row clearfix"><hr></div> 
                            <div class="row clearfix"> 
                                <div class="pull-right col-lg-2 col-md-2 col-sm-2 col-xs-3">
                                    <div class="form-group">
                                        <div class="form-line ">
                                           <button  type="button" class="btn btn-info" onclick="return newGroup()"><i class="fa fa-plus"></i> New Addon Group</button>
                                        </div>                                            
                                    </div>
                                </div>
                            </div>                           
                               
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect">Submit</button>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <a href="<?php echo base_url()?>admin_addons" class="btn bg-red btn-block btn-lg waves-effect" style="">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>
 <div class="hidden" style="display: none;">
    <input type="hidden" id="group_counter" value="<?php if($keyag!=""){ echo $keyag+1; }else{ echo '0'; }; ?>">
     <select class="ms" name="group_type" id="group_type" style="display: none;">
        <?php foreach ($form_field_list as $form_field) { ?>
        <option value="<?php echo $form_field->value; ?>"><?php echo $form_field->name;?></option>
        <?php } ?>
    </select>
 </div>


<script>
    function newGroup(){
        var select=$("#group_type").html();
        var count= $('#group_counter').val();
        var html=`<div class="addon-row" >
        <div class="row clearfix"><hr></div>
        <div class="row clearfix ">
            <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                <label for="">Group  </label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                <div class="form-group">
                    <div class="form-line ">
                        <select class="form-control show-tick ms" name="group_type[`+count+`]" required="" id="">
                            `+select+`
                        </select>
                    </div>                                           
                </div>
            </div>
            
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 pull-right">
                <button type="button" class="btn bg-teal expandVariation"  title="Expand/Close "><i class="fa fa-arrow-up"></i> </button>                                          
                <button type="button" class="btn bg-red removeVariation" onclick="" title="Remove "><i class="fa fa-times"></i> </button>                                                                              
            </div>
        </div>
         
        <div class="addon-row-second" style="display: block">
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                <label for="">Group Name </label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="form-group">
                    <div class="form-line ">
                        <input type="text" class="form-control"  name="group_name[`+count+`]"  id="" >
                    </div>                                           
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-2 col-12">
                <div class="form-group">
                    <div class="form-line">
                        <input type="checkbox" id="group_required[`+count+`]" class="filled-in" name="group_required[`+count+`]"  value="1"> 
                        <label for="group_required[`+count+`]"></label> Required Field                                         
                    </div> 
                </div>
            </div>                                    
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                <label for="">Group Description </label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                <div class="form-group">
                    <div class="form-line ">
                        <textarea class="form-control" name="group_description[`+count+`]" id="" cols="30" rows="2"></textarea>
                    </div>                                           
                </div>
            </div>                                    
        </div>
     
        <div class="row clearfix">                                
            <div class="col-lg-10 col-md-10 col-sm-10 col-12 table-responsive">
                <table class="table table-responsive">
                    <thead class="bg-grey">
                        <tr>
                            <th>Option Label</th>
                            <th>Option Price</th>
                            <th>Min</th>
                            <th>Max</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>                         
                        <tr>                                
                            <td colspan="5"><button type="button" data-value="`+count+`" class="addAddonOption btn bg-grey">New Option</button></td>                         
                        </tr>                       
                    </tfoot>
                </table>
            </div>                                    
            </div>                                    
        </div>
        </div>`;
        //console.log(html);
        $("#product_tag").append(html);
        $('#group_counter').val(parseInt(count)+1);
    }
</script>
<script>
    $(document).on("click", ".removeVariation", function() {
       $(this).closest('.addon-row').remove();
    });
</script>
<script>
    $(document).on("click", ".addAddonOption", function() {
        var parent_count=$(this).attr('data-value');        
        var count= $(this).closest('table').children('tbody').children('tr').length;
        $(this).closest('table').children('tbody').append(`<tr>
                            <td><input type="text" class="form-control" name="addon_option_label[`+parent_count+`][]" ></td>
                            <td><input type="text" class="form-control" name="addon_option_price[`+parent_count+`][]" ></td>
                            <td><input type="text" class="form-control" name="addon_option_min[`+parent_count+`][]" ></td>
                            <td><input type="text" class="form-control" name="addon_option_max[`+parent_count+`][]" ></td>
                            <td><button class="btn bg-grey removeOption">X</button></td>
                        </tr>`);
    });
</script>
<script>
    $(document).on("click", ".removeOption", function() {
       $(this).closest('tr').remove();       
    });
</script>
<script>
    $(document).on("click", ".expandVariation", function() {  
    //$(this).closest('.addon-row').remove();     
       var display_next=$(this).closest('.addon-row').children('.addon-row-second');
       var display= display_next.css("display");
       // $(this).closest('.addon-row').css({"display": "none"});
       // $('.expandVariation').html('<i class="fa fa-arrow-down"></i>');   

       if (display === "block") {
            display_next.css({"display": "none"});
            $(this).html('<i class="fa fa-arrow-down"></i>');            
        } else {
            display_next.css({"display": "block"});
            $(this).html('<i class="fa fa-arrow-up"></i>');         
        }
    });
</script>
<script>
    $(document).ready(function(){
        $(".form-line").removeClass('focused');
    });
</script>