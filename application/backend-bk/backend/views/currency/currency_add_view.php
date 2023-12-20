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
        #variation_div .row_var{
            border-bottom: 2px solid #eee;
            margin-bottom: 9px;
        }
        #variation_div .col-xs-6, #variation_div .col-sm-4, #variation_div .col-md-1, #variation_div .col-lg-1 {
            margin-bottom: 10px !important;
        }
        .bottom-border{
            border-bottom: 2px solid #eee;
            margin-bottom: 9px;
        }
        #variation_div_first .bottom-border .col-xs-6, #variation_div_first .bottom-border .col-sm-4, 
        #variation_div_first .bottom-border .col-md-2, #variation_div_first .bottom-border .col-lg-2 {
            margin-bottom: 10px !important;
        }
        .expand_variation {
            border-top: 1px solid #eee;
            margin-bottom: 0px !important;
            padding: 10px;
        }
        .expand_variation .form-group {
            margin-bottom: 0px;
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
            <h2>Currency <small>Add Currency</small></h2>
            </div>
        </div>
        <div id="errorMsgDiv"></div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="<?php echo base_url(); ?>admin_currency/add_currency_submit" role="form" method="post" enctype="multipart/form-data" >

                <div class="card">
                    <div class="header">
                        <h2>Add Currency </h2>      
                        <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4 pull-right">
                            <a href="<?php echo base_url()?>admin_currency" class="btn bg-red btn-block btn-lg waves-effect" style="">Cancel</a>
                        </div>                         
                        <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4 pull-right">
                            <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect" onclick="return validateForm()">Add</button>
                        </div>                       
                    </div>                        
                    <div class="body">
          
                    
             
                    <div class="clearfix" style="margin-top: 15px;">
                        <div class="tab-content clearfix">

                            <div id="vital_info" class="tab-pane fade in active">
                                    
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                            <label for=""> Title <span style="color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" type="text" required="" name="title_1" id="title_1" >                                                 
                                                </div>                                           
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                            <label for=""> Value <span style="color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" type="text" required="" name="title_2" id="title_2" >                                                 
                                                </div>                                           
                                            </div>
                                        </div>
                                    </div>
                                    
                                  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Currency Status <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control"  name="status" id="status" >
                                                    <option value="active" >Active</option>
                                                    <option value="inactive" >Inactive</option>
                                                </select>                                                
                                            </div>  
                                        </div>
                                    </div>
                                </div> 
                                   
                            </div>
                   
                </div>


                </div>
            </div>
        </form>
        </div>
    </div>

</div>
</section>




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

   
   
</script>




