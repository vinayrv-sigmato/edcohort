
<div class="app-content  my-3 my-md-5">
                    <div class="side-app">
                        <div class="page-header">
                            <h4 class="page-title">Product Review</h4>
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
                                 <div id="errorMsgDiv" style="color:#F00" ></div>
                                <div class="card m-b-20">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Product Review</h3>
                                    </div>
                                    <div class="card-body mb-0">

                                        <form class="form-horizontal" action="<?php echo base_url(); ?>admin_review/edit_product_review_submit" role="form" method="post" enctype="multipart/form-data">
                                            <?php foreach ($product_review_detail as $row): ?>

                                            <input type="hidden" value="<?php echo $row->product_review_id; ?>" name="product_review_id" id="product_review_id">
                                           
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
                                                        <label class="form-label" id="examplenameInputname2"> Title</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text"  name="product_review_title" id="product_review_title" value="<?php echo $row->product_review_title; ?>" required="">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group ">                                                
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label" id="examplenameInputname2">Product Review</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control"  name="product_review" id="product_review" required=""  rows="2"><?php echo $row->product_review; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
											
                                           <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Product Rating</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control"  name="product_rating" id="product_rating" >
                                                            <option value="1" <?php if ($row->product_rating=='1') { echo 'selected'; } ?> >1</option>
                                                            <option value="2" <?php if ($row->product_rating=='2') { echo 'selected'; } ?>>2</option>
                                                            <option value="3" <?php if ($row->product_rating=='3') { echo 'selected'; } ?> >3</option>
                                                            <option value="4" <?php if ($row->product_rating=='4') { echo 'selected'; } ?>>4</option>
                                                            <option value="5" <?php if ($row->product_rating=='5') { echo 'selected'; } ?> >5</option>
                                                            
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
                                                        <select class="form-control"  name="status" id="status" >
                                                            <option value="active" <?php if ($row->status=='active') { echo 'selected'; } ?> >Active</option>
                                                            <option value="inactive" <?php if ($row->status=='inactive') { echo 'selected'; } ?>>Inactive</option>
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
    function validateForm(){
        var item_title=$("#product_review_title").val();
        var product_short_description=$("#product_review").val();
      
        var message="";
        if($.trim(item_title)==""){
            message +="<span>Title should not be empty.</span>";            
        }
        if($.trim(product_short_description)==""){
            message+="<span>Review should not be empty.</span>";
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