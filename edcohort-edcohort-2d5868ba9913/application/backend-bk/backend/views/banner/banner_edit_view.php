<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Banner</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol>
                        </div>
                        <!--/Page-Header-->

                        <div class="row">                           
                            <!-- end col -->
  
 							 <div class="col-xl-12">
                             	 <div class="card m-b-20">
                                	<div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                  <form action="<?php echo base_url(); ?>admin_banner/edit_product_submit" role="form" method="post" enctype="multipart/form-data">
                                    <div class="card">
                                    <div class="header">
                                      <h2 class="">Edit Banner </h2>
                                    
                                    </div>
                                    <div class="body">
                                    <?php foreach ($product_detail as $row): ?>
                                    <input type="hidden" value="<?php echo $row->home_slider_id; ?>" name="home_slider_id" id="home_slider_id">
                                    <div class="clearfix" style="margin-top: 15px;">
                                      <div class="tab-content">
                                        <div id="vital_info" class="tab-pane fade in active">
                                          <div class="col-md-12">
                                          <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                              <label for="">Banner</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                              <div class="col-md-3" style="border: 1px solid #DDDDDD;width:193px;padding-top:12px;padding-bottom:12px"> <img id="upload_pic" src="<?php echo base_url() ?>../camera_icon.png" alt="no-image"> </div>
                                              <div class="col-md-3" style="background-color:#CCCCCC;width:300px">
                                                <input type="file" class="img_upload" name="img_upload[]" id="img_upload" onchange="readURL(this);" style="padding: 12px 0px;width:206px;margin-left:0px;outline:none">
                                              </div>
                                            </div>
                                            
                                            <div class="col-md-12" id="output_img" style="margin-bottom: 12px;">
                                              <output id="result" />
                                            </div>
                                            <input type="hidden" id="product_image_count" value="<?php echo count($row->home_slider_image); ?>">
                                            <div> <img style='height:170px;float:left;' class='thumbnail' src='<?php echo base_url(); ?>../uploads/banner/<?php echo $row->home_slider_image; ?>' title=''/> <a style="float:left;margin-right: 10px;font-weight: bold;" href="javascript:void(0)" class="remove_pict btn bg-red" onclick="removeImage('<?php echo $row->home_slider_image; ?>',this)">X</a> </div>
                                            <div class="clearfix"></div>
                                            <div class="box-footer"> </div>
                                          </div>
                                          
                                          
                                          
                                          <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                              <label for="">Banner Status <span style="color:red">*</span></label>
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
                                          
                                          <div class="form-group mb-0 row justify-content-end">
                                                <div class="col-md-9 float-end">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                     <button type="button" class="btn btn-danger waves-effect waves-light" onclick="window.history.back()">Cancel</button>
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
                            </div>

						</div>
                    </div>
                </div>



<!-- #END# Basic Examples -->

</div>
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



   

</script> 
<script>

    function removeImage(image,e)

    {

        var product_image_count=$("#product_image_count").val();

        alertify.confirm(

                siteName, 

                'Are you sure! you want to Delete?', 

                function(evt, value)

                {                             

                    $.ajax(

                        {

                            type: "POST",

                            dataType:'json',

                            url:"<?php echo base_url();?>admin_banner/removeImage",

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

        var home_slider_id=$("#home_slider_id").val();

        getVariation(home_slider_id);

    });

</script> 
<script>

    function validateForm(){

        var item_title=$("#item_title").val();

        var parent_category=$("#parent_category").val();

        var seller_sku=$("#seller_sku").val();

        var product_short_description=$("#product_short_description").val();

        var price=$("#price").val();



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

        if($.trim(seller_sku)==""){

            message+="<span>SKU should not be empty.</span>";

        }       

        if($.trim(product_short_description)==""){

            message+="<span>Short Description should not be empty.</span>";

        }       

        if($.trim(price)==""|| parseFloat(price) < 0){

            message+="<span>Price should not be empty or Zero.</span>";

        }       

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