    <section class="content">
        <div class="container-fluid">
            <div class="row row-header">
                <div class="col-md-6">
                <h2>Attribute <small>Add Attribute</small></h2>
                </div>
                <div class="col-md-6">
                  
                </div>
            </div>
            <?php message(); ?>
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Attribute</h2>                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="<?php echo base_url()?>admin_attribute/add_attribute_submit" id="main" method="post" enctype="multipart/form-data">
                                                                                            
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Attribute Name <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control" required="required" name="attribute_name" id="attribute_name">
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>

                               <div class="row clearfix"><hr></div> 

                            <div id="product_tag" >
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Attribute Value <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" class="form-control"  name="attribute_value[]"  id="" onchange="getAttrValue(this.value,0)">
                                            </div>                                           
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                                        <div class="form-group">
                                            <div class="form-line ">
                                               <button  type="button" class="btn btn-info" onclick="return product_attribute()"><i class="fa fa-plus"></i> Add</button>
                                            </div>                                            
                                        </div>
                                    </div>

                                </div>
                            </div>                            
                               
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect">Submit</button>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <a href="<?php echo base_url()?>admin_attribute" class="btn bg-red btn-block btn-lg waves-effect" style="">Cancel</a>
                                    </div>
                                </div>
                            </form>
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
                <label for="">Attribute Value <span style="color:red">*</span></label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                <div class="form-group">
                    <div class="form-line">                       
                        <input type="text" class="form-control" required="" name="attribute_value[]"  id="attribute_name_`+count+` onchange="getAttrValue(this.value,`+count+`)">
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