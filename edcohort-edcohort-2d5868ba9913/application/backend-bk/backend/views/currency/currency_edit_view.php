<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
<style>
        .card .body .col-xs-8, .card .body .col-sm-8, .card .body .col-md-8, .card .body .col-lg-8 {
            margin-bottom: 0px;
        }
        label {
            display: block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: bold;
        }
        #collapseProductOption.dropdown-menu {
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            -ms-border-radius: 0;
            border-radius: 0;
            margin-top: 0px !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            border: none;
            width: 386px;
            margin-left: 10px;
            background-color: #e9e9e9;
        }
        label.droplist {
            padding-left: 12px;
            padding-bottom: 5px;
            border-bottom: 1px solid #d4dcdb;
        }
        [type="checkbox"] + label {
            vertical-align: middle;
        }
        .card .header  h2 {
            width: 50%;
        }
        #errorMsgDiv > span {
            color: #fff;
            float: left;
            font-size: 16px;
            line-height: 18px;
            list-style: none;
            width: 100%;
            background: #ff6d63;
            padding: 5px;
            margin-bottom: 6px;         
        }
</style>
 <section class="content">
    <div class="container-fluid">
        <div class="row row-header">
            <div class="col-md-4">
            <h2>Currency <small>Edit Currency</small></h2>
            </div>
        </div>
         <?php message(); ?>
         <div id="errorMsgDiv"></div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="<?php echo base_url(); ?>admin_currency/edit_product_submit" role="form" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="header">                       
                        <h2 class="">Edit Currency </h2>
                        <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4 pull-right">
                            <a href="<?php echo base_url()?>admin_product" class="btn bg-red btn-block btn-lg waves-effect" style="">Cancel</a>
                        </div>                         
                        <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4 pull-right">
                            <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect" onclick="return validateForm()">Update</button>
                        </div>                                                   
                    </div>                        
                    <div class="body">
                        <?php foreach ($product_detail as $row): ?>
                        <input type="hidden" value="<?php echo $row->currency_id; ?>" name="currency_id" id="currency_id">
                                  
                   
                    <div class="clearfix" style="margin-top: 15px;">
                        <div class="tab-content">

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Title <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" type="text" value="<?php echo $row->currency_name; ?>" required="" name="title_1" id="title_1" >                                                 
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>

                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Value  <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" type="text" value="<?php echo $row->currency_value; ?>" required="" name="title_2" id="title_2" >                                                 
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                
                                 
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Status <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control"  name="status" id="status" >
                                                    <option value="active" <?php if ($row->status=='active') { echo 'selected'; } ?> >Active</option>
                                                    <option value="inactive" <?php if ($row->status=='inactive') { echo 'selected'; } ?>>Inactive</option>
                                                </select>                                                
                                            </div>  
                                        </div>
                                    </div>
                                </div>                                   
                                   
                            </div>
                    </div>
                   
                    
                     <?php endforeach ?>

                </div>
                </form>

                </div>
            </div>
        </div>
    </div>
        <!-- #END# Basic Examples -->

</div>



<script>
    $(document).ready(function() {
        $('.page-loader-wrapper').removeClass('page-loader-wrapper');
    });

    $(document).ready(function(){
        var currency_id=$("#currency_id").val();
        getVariation(currency_id);
    });
</script>

<script>
    function validateForm(){
        var title_1=$("#title_1").val();
        var parent_category=$("#parent_category").val();
        
        var file1=document.getElementById("img_upload").files.length;
       

        var message="";
        if($.trim(title_1)==""){
            message +="<span>Title should not be empty.</span>";            
        }
        if(currency_value== ""){
            message+="<span>Value should not be empty.</span>"; 

        $("#errorMsgDiv").html("");
        $("#errorMsgDiv").html(message);
        if(message.length){
            return false;
        }else{
            return true;
        }       
        
    }
</script>