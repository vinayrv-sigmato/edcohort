<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Banner</h4>
                            <ol class="breadcrumb">
                            <section class="content-header">
                            <h1>
                                <a href="<?= site_url('admin_banner') ?>" class="btn btn-info">Manage</a>
                            </h1>
                            </section>
                            </ol>
                        </div>
                        <!--/Page-Header-->

                        <div class="row">                           
                            <!-- end col -->
                            <div class="col-xl-12">
                                 <?php message(); ?>
                                <div class="card m-b-20">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Banner</h3>
                                    </div>
                                    <div class="card-body mb-0">
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_banner/add_Banner_submit" method="post" enctype="multipart/form-data">
                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Banner <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="col-md-3" style="border: 1px solid #DDDDDD;width:193px;padding-top:12px;padding-bottom:12px"><img id="upload_pic" src="<?php echo base_url() ?>../camera_icon.png" alt="no-image"></div>
                     									<div class="col-md-3" style="background-color:#CCCCCC;width:300px">
                        <input type="file" name="img_upload[]" id="img_upload" onChange="readURL(this);" style="padding: 12px 0px;width:206px;margin-left:0px;outline:none" required>
                      </div>
														
                   										 <div class="col-md-12" id="output_img" style="margin-bottom: 12px;">
                      <output id="result" />
                    </div>
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
                                                            <option value="active" >Active</option>
                                                            <option value="inactive" >Inactive</option>
                                                          </select>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group mb-0 row justify-content-end">
                                                <div class="col-md-9 float-end">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" onClick="return validateForm()">Submit</button>
                                                     <button type="button" class="btn btn-danger waves-effect waves-light" onClick="window.history.back()">Cancel</button>
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

    function readURL(input)

    {
		//alert();

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



   

   

</script>
