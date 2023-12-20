<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Product</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol>
                        </div>
                        <!--/Page-Header-->

                        <div class="row">                           
                            <!-- end col -->
                            <div class="col-xl-12">
                                 <?php message(); ?>
                                 <div id="errorMsgDiv"></div>
                                <div class="card m-b-20">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Product</h3>
                                    </div>
                                    <div class="card-body mb-0">

                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_product/add_product_submit" role="form" method="post" enctype="multipart/form-data">
                                           

                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Item Title</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text" required="" name="item_title" id="item_title" >
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Category</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                         <select class="form-control show-tick" name="parent_category[]" required="" id="parent_category" onchange="" multiple>
                                                        <!-- <option value="0">Select</option> -->
                                                        <?php foreach ($category_list as $parent_category) { ?>
                                                        <option value="<?php echo $parent_category->category_id; ?>"><?php echo getMenuList($parent_category->category_id);?></option>
                                                        <?php } ?>
                                                    </select>  
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Brand Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control show-tick" name="brand_name" required="" id="brand_name" onchange="" >
                                                        <!-- <option value="0">Select</option> -->
                                                        <?php foreach ($brand_list as $brand) { ?>
                                                        <option value="<?php echo $brand->brand_id; ?>"><?php echo getBrandList($brand->brand_id);?></option>
                                                        <?php } ?>
                                                    </select> 
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Class Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control show-tick" name="class_name" required="" id="class_name" onchange="" >
                                                        <!-- <option value="0">Select</option> -->
                                                        <?php foreach ($class_list as $class) { ?>
                                                        <option value="<?php echo $class->class_id; ?>"><?php echo getClassList($class->class_id);?></option>
                                                        <?php } ?>
                                                    </select> 
                                                    </div>
                                                </div>
                                            </div>

                                               <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Board Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control show-tick" name="board_name" required="" id="board_name" onchange="" >
                                                        <!-- <option value="0">Select</option> -->
                                                        <?php foreach ($board_list as $board) { ?>
                                                        <option value="<?php echo $board->board_id; ?>"><?php echo getboardList($board->board_id);?></option>
                                                        <?php } ?>
                                                    </select> 
                                                    </div>
                                                </div>
                                            </div>

                                               <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Batch Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control show-tick" name="batch_name" required="" id="batch_name" onchange="" >
                                                        <!-- <option value="0">Select</option> -->
                                                        <?php foreach ($batch_list as $batch) { ?>
                                                        <option value="<?php echo $batch->batch_id; ?>"><?php echo getbatchList($batch->batch_id);?></option>
                                                        <?php } ?>
                                                    </select> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Product Short Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control"  name="product_short_description" id="product_short_description" required=""  rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>



                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Product Long Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control"  name="product_description" id="product_description"  rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </div>


                                             <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Sort Order</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                       <input class="form-control" type="text" name="product_sort" id="product_sort" >
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Image</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                         <img id="upload_pic" class="img-thumbnail" src="<?php echo base_url() ?>../camera_icon.png" alt="no-image">

                                                       <input type="file" name="img_upload[]" id="img_upload" onchange="readURL(this);" style="padding: 12px 0px;width:206px;margin-left:0px;outline:none">
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Select multiple files:</label>
                                                    </div>
                                                    <div class="col-md-9">                                                         
                                                       <input id="files" type="file" name="img_upload[]" multiple style="outline:none"/>
                                                        <div class="col-md-12" id="output_img" style="margin-bottom: 12px;">
                                                            <output id="result" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputPassword5">Video File</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="file" name="video_upload[]" id="video_upload"  multiple style="padding: 12px 5px;width:206px;margin-left:0px;outline:none">    
                                                        <span>File format should be mp4</span>                
                                                    </div>
                                                </div>
                                            </div> 

                                            <div id="product_video"> 
                                                <div class="row clearfix" id="form_vd_id_0">
                                                    <div class="col-md-3">
                                                        <label for="">Video Url Link</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input class="form-control" type="text" name="video_link[]" id="video_link_0" placeholder="http://your-domain.com/video-url">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                                                        <button  type="button" class="btn btn-info" onclick="return product_video()"><i class="fa fa-plus"></i> Add</button>                                     
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Title</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Tag Title">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control no-resize" id="meta_description" name="meta_description" rows="3" cols="80" placeholder="Meta Tag Description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="inputEmail3">Meta Tag Keyword</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control no-resize" id="meta_keyword" name="meta_keyword" rows="3" cols="80" placeholder="Meta Tag Keyword"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="product_feature" >
                                                <div class="row clearfix" id="form_gr_id_0">
                                                <div class="col-md-3">
                                                    <label for="">Product Features</label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input class="form-control" type="text" name="product_feature[]" id="product_feature_0" >
                                                        </div> 
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
                                                    <button  type="button" class="btn btn-info" onclick="return product_feature()"><i class="fa fa-plus"></i> Add</button>                                     
                                                </div>
                                            </div> 
                                            </div>

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Product Type</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control"  name="product_type" id="product_type" >
                                                        <option value="1">Online</option>
                                                        <option value="2">Offline</option>
                                                    </select> 
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Status</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control"  name="product_status" id="product_status" >
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select> 
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group mb-0 row justify-content-end">
                                                <div class="col-md-9 float-end">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="return validateForm()">Submit</button>
                                                     <button type="button" class="btn btn-danger waves-effect waves-light" onclick="window.history.back()">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<script>
    CKEDITOR.replace( 'product_description' );
</script>
<script>
    function product_attribute()
    {
        var select=$("#attribute_name_0").html();
        var count= $('#product_tag').children('.row').length;
        $("#product_tag").append(`<div class="row clearfix" id="form_gr_id_`+count+`">
            <div class="col-lg-2 col-md-2 col-sm-3 col-12 form-control-label">
                <label for="">Product Attributes <span style="color:red">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-3 col-12">
                <div class="form-group">
                    <div class="form-line">
                        <select name="attribute_name[]" id="attribute_name_`+count+`" required="" class="form-control" onchange="getAttrValue(this.value,`+count+`)">
                            `+select+`                                                       
                        </select>
                    </div> 
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-8">
                <div class="form-group">
                    <div class="form-line" id="attribute_value_`+count+`">
                    <input class="form-control" type="text" name="product_attribute[]" required="" id="" >
                    </div>  
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                <button type="button" style="" class="btn bg-red wave-effects" id="remove_`+count+`" value="remove" onclick="return remove_product_tag(`+count+`)"><i class="fa fa-times"></i> Remove</button>                                         
            </div>
        </div>`);
       
    }
    function remove_product_tag(value)
    {
        $("#form_gr_id_"+value).remove();
    }
</script>
<script>
    function product_feature()
    {
        var count= $('#product_feature').children('.row').length;
        $("#product_feature").append(`<div class="row clearfix" id="form_gr_id_`+count+`">
                                    <div class="col-md-3">
                                        <label for="">Product Features</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" type="text" name="product_feature[]" id="product_feature_`+count+`" >
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
                                        <button type="button" style="" class="btn bg-red wave-effects" id="remove_`+count+`" value="remove" onclick="return remove_product_feature(`+count+`)"><i class="fa fa-times"></i> Remove</button>
                                    </div>
                                </div> `);
    }
    function remove_product_feature(value)
    {
        $("#form_gr_id_"+value).remove();
    }
</script>
<script>
    function product_video()
    {

        var count= $('#product_video').children('.row').length;
        console.log(count)
        $("#product_video").append(`<div class="row clearfix" id="form_vd_id_`+count+`">
            <div class="col-md-3">
                <label for="">Video Url Link</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                <div class="form-group">
                    <div class="form-line">
                        <input class="form-control" type="text" name="video_link[]" id="video_link_`+count+`" >
                    </div> 
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                <button type="button" style="" class="btn bg-red wave-effects" id="remove_`+count+`" value="remove" onclick="return remove_product_video(`+count+`)"><i class="fa fa-times"></i> Remove</button>
            </div>
        </div> `);
    }
    function remove_product_video(value)
    {
        $("#form_vd_id_"+value).remove();
    }
</script>
<script>
    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#upload_pic')
                    .attr('src', e.target.result)
                    .width(160)
                    .height(140);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    window.onload = function(){
        //Check File API support
        if(window.File && window.FileList && window.FileReader)
        {
            var filesInput = document.getElementById("files");

            filesInput.addEventListener("change", function(event){

                var files = event.target.files; //FileList object
                var output = document.getElementById("result");
                //output.innerHTML="";
                for(var i = 0; i< files.length; i++)
                {
                    var file = files[i];

                    //Only pics
                    if(!file.type.match('image'))
                        continue;

                    var picReader = new FileReader();

                    picReader.addEventListener("load",function(event){

                        var picFile = event.target;

                        var div = document.createElement("div");

                        div.innerHTML = "<img style='height:170px;float:left;' class='thumbnail' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/> ";

                        output.insertBefore(div,null);
                        div.children[1].addEventListener("click", function(event){
                            div.parentNode.removeChild(div);
                        });

                    });
                    $('#output_img').on({
                        'click': function(e) {
                            if (e.target.id == 'el') return;
                            e.preventDefault();
                            e.stopPropagation();
                        }
                    })

                    //Read the image
                    picReader.readAsDataURL(file);
                }

            });
        }
        else
        {
            console.log("Your browser does not support File API");
        }
    }

    function getAttrValue(id,val)
    {
        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>admin_product/getAttrValue",
                data: {attribute_id: id},
                async: false,
                success: function(data)
                {
                    //alert(data);
                    var html="";
                    var dataLength=data.length;
                    if(dataLength>0)
                    {   
                        html +=`<select name="product_attribute[]" id="" required="" class="form-control" >`;
                        for (var i = 0; i < dataLength; i++) {
                            html +=`<option value="`+data[i].value+`">`+data[i].value+`</option>`;
                        }
                        html +=`</select>`;                      
                    }
                    else
                    {
                        html +=`<input class="form-control" type="text" required="" name="product_attribute[]" id="" >`;
                    }
                    $("#attribute_value_"+val).html(html);

                }
            });
    }
    function getOptionValue(id) 
    {
        var value=$("#option_name").val();
        console.log(value)
    }
</script>
<script>
function showProductOptoin(id,chk) {
    if(chk==true)
    {
        $('#product_option_div_'+id).show();
    }
    else
    {
        $('#product_option_div_'+id).hide();
        $('#product_option_div_'+id+ ' select').selectpicker('deselectAll');
        $('#product_option_div_'+id+ ' input').removeAttr('checked');
    }
}
</script>
<script>
    function saveOption(){
        var option =$("#options select").serializeArray();
        var check =$("#options input:checkbox").serializeArray();
        var name =$("#options input:hidden").serializeArray();

        $.ajax({
                type: "post",
                dataType:'html',
                url:"<?php echo base_url();?>admin_product/saveOption",
                data: {option: option,check: check,name:name},
                success: function(data)
                {
                    $('#variation_div_first').html(data);
                    $('#variation_div').html('');
                }
            });        
    }
</script>
<script>
    function addVariation(){
        var html=$('#hidden_variation').html();
        $('#variation_div').append(html);        
    }
</script>
<script>
    $(document).on("click", ".removeVariation", function() {
       $(this).closest('.row').remove()
    });
</script>
<script>
    $(document).on("click", ".expandVariation", function() {       
       var display_next=$(this).closest('div').next('.expand_variation');
       var display=display_next.css("display");
       $('.expand_variation').css({"display": "none"});
       $('.expandVariation').html('<i class="fa fa-arrow-down"></i>');   

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
    function validateForm(){
        var item_title=$("#item_title").val();
        var parent_category=$("#parent_category").val();
       // var seller_sku=$("#seller_sku").val();
        var product_short_description=$("#product_short_description").val();
       // var price=$("#price").val();

        var file1=document.getElementById("img_upload").files.length;
        var file2=document.getElementById("files").files.length;
        var file_length=parseInt(file1)+parseInt(file2);

        var message="";
        if($.trim(item_title)==""){
            message +="<span>Title should not be empty.</span>";            
        }
        if(parent_category== "" || parent_category== null){
            message+="<span>Category should not be empty.</span>"; 
        }
        // if($.trim(seller_sku)==""){
        //     message+="<span>SKU should not be empty.</span>";
        // }       
        if($.trim(product_short_description)==""){
            message+="<span>Short Description should not be empty.</span>";
        }       
        // if($.trim(price)==""|| parseFloat(price) < 0){
        //     message+="<span>Price should not be empty or Zero.</span>";
        // }       
        if(parseInt(file_length) == 0){
            message+="<span>Image should not be empty.</span>";
        }

        $("#errorMsgDiv").html("");
        $("#errorMsgDiv").html(message);
        if(message.length){
            return false;
        }else{
            return true;
        }       
        
    }
</script>