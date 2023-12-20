<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Product Review Reply</h4>
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
                                        <h3 class="card-title">Edit Reply</h3>
                                    </div>
                                    <div class="card-body mb-0">

                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_review/edit_product_review_reply_submit" role="form" method="post" enctype="multipart/form-data">
                                            <?php foreach ($product_review_detail as $row): ?>

                                            <input type="hidden" value="<?php echo $row->prr_id; ?>" name="prr_id" id="prr_id">
                                            <input type="hidden" value="<?php echo $row->review_id; ?>" name="review_id" id="review_id">
                                           
                                           <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2"> Product </label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <?php echo $row->product_name; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                             <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2"> Review Title </label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <?php echo $row->product_review_title; ?>
                                                    </div>
                                                </div>
                                            </div>


                                            



                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Reply</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control"  name="reply" id="reply" required=""  rows="2"><?php echo $row->reply; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
											
                                           
                                            
                                            
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Status</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control"  name="status" id="status" >
                                                            <option value="1" <?php if ($row->status=='1') { echo 'selected'; } ?> >Active</option>
                                                            <option value="0" <?php if ($row->status=='0') { echo 'selected'; } ?>>Inactive</option>
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
                                        <?php endforeach ?>
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
            <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                <label for="">Video Url Link</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                <div class="form-group">
                    <div class="form-line">
                        <input class="form-control" type="text" name="video_link[]" id="video_link_`+count+`" >
                    </div> 
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
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
    function removeVideo(video,e)
    {
        var product_video_count=$("#product_video_count").val();
        confirm(
                siteName, 
                'Are you sure! you want to Delete?', 
                function(evt, value)
                {                             
                    $.ajax(
                        {
                            type: "POST",
                            dataType:'json',
                            url:"<?php echo base_url();?>admin_product/removeVideo",
                            data: {video: video},
                            async: false,
                            success: function(data)
                            {   
                                $("#product_video_count").val(parseInt(product_video_count)-1);                 
                                $(e).parent('div').remove();
                            }
                        });                 
                }
                ,function(){ 
             }); 
        
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
                output.innerHTML="";
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
        //console.log(value)
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
    function removeImage(image,e)
    {
        var product_image_count=$("#product_image_count").val();

        confirm(
                siteName, 
                'Are you sure! you want to Delete?', 
                function(evt, value)
                {  

                    $.ajax(
                        {
                            type: "POST",
                            dataType:'json',
                            url:"<?php echo base_url();?>admin_product/removeImage",
                            data: {image: image},
                            async: false,
                            success: function(data)
                            {   
                                $("#product_image_count").val(parseInt(product_image_count)-1);                 
                                $(e).parent('div').remove();
                            }
                        });                 
                }
                ,function(){ 
             }); 
        
    }
</script>
<script>
    function saveOption(){
        var option =$("#options select").serializeArray();
        var check =$("#options input:checkbox").serializeArray();
        var name =$("#options input:hidden").serializeArray();
        var product_id =$("#product_id").val();
        $.ajax({
                type: "post",
                dataType:'html',
                url:"<?php echo base_url();?>admin_product/saveOption",
                data: {option: option,check: check,name:name,product_id:product_id},
                success: function(data)
                {
                    //$('#variation_div_first').html(data);
                    //$('#variation_div').html('');
                }
            });        
    }
</script>
<script>
    function getVariation(product_id){
        $.ajax({
                type: "post",
                dataType:'html',
                url:"<?php echo base_url();?>admin_product/updateSaveOption",
                data: {product_id: product_id},
                success: function(data)
                {
                    $('#variation_div_first').html(data);
                    //$('#variation_div').html('');
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
    $(document).ready(function(){
        var product_id=$("#product_id").val();
        getVariation(product_id);
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
        var product_image_count=$("#product_image_count").val();
        var file_length=parseInt(file1)+parseInt(file2)+parseInt(product_image_count);

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