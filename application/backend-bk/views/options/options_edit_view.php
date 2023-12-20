    <section class="content">
        <div class="container-fluid">
            <div class="row row-header">
                <div class="col-md-6">
                <h2>Option <small>Edit Option</small></h2>
                </div>
                <div class="col-md-6">                
                   
                  
                </div>
            </div>
            <?php message(); ?>            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Option</h2>
                            
                        </div>
                        <div class="body">
                            <?php //print_ex($options_detail); ?>
                            <?php foreach ($options_detail as $option){  ?>
                            <form class="form-horizontal" action="<?php echo base_url()?>admin_options/edit_option_submit" id="main" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="option_id" value="<?php echo $option->option_id; ?>">                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Option Name <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                            <input type="text" class="form-control" name="option_name" id="option_name" required="" value="<?php echo $option->name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="row clearfix"><hr></div> 

                                <?php  ?>

                            <div id="product_tag" >
                                <?php foreach ($options_value_list as $key => $value): ?>
                                    <div class="row clearfix" id="form_gr_id_<?php echo $key; ?>">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                            <label for="">Option Value <span style="color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                            <div class="form-group">
                                                <div class="form-line ">
                                                    <input type="text" class="form-control" required="required" name="option_value[]"  id="" value="<?php echo $value->value; ?>" onchange="getAttrValue(this.value,'<?php echo $key; ?>')">
                                                </div>                                           
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                                            <div class="form-group">
                                                <div class="form-line ">
                                                    <?php if($key=='0'){ ?>
                                                    <button  type="button" class="btn btn-info wave-effects" onclick="return product_attribute()"><i class="fa fa-plus"></i> Add</button>
                                                    <?php }else{ ?>
                                                    <button type="button" class="btn bg-red wave-effects" id="remove_<?php echo $key; ?>" value="remove" onclick="return remove_product_tag('<?php echo $key; ?>')"><i class="fa fa-times"></i> Remove</button>
                                                    <?php } ?>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>                                

                            </div>   
                               
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4  col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect">Submit</button>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4  col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <a href="<?php echo base_url()?>admin_options" class="btn bg-red btn-block btn-lg waves-effect">Cancel</a>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>

<script>
    function product_attribute()
    {
        var select=$("#attribute_name_0").html();
        var count= $('#product_tag').children('.row').length;
        $("#product_tag").append(`<div class="row clearfix" id="form_gr_id_`+count+`">
            <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                <label for="">Option Value <span style="color:red">*</span></label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                <div class="form-group">
                    <div class="form-line">                       
                        <input type="text" class="form-control" required="" name="option_value[]"  id="attribute_name_`+count+` onchange="getAttrValue(this.value,`+count+`)">
                    </div>                                                             
                </div>
            </div> 

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                <div class="form-group">
                    <div class="form-line">                       
                        <button type="button"  class="btn bg-red wave-effects" id="remove_`+count+`" value="remove" onclick="return remove_product_tag(`+count+`)"><i class="fa fa-times"></i> Remove</button>  
                    </div> 
                                                           
                </div>
            </div>           
        </div>`);
       
    }
    function remove_product_tag(value)
    {
        $("#form_gr_id_"+value).remove();
    }
</script>