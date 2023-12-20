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
            <h2>Product <small>Edit Product</small></h2>
            </div>
        </div>
         <?php message(); ?>
         <div id="errorMsgDiv"></div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="<?php echo base_url(); ?>admin_product/edit_product_submit" role="form" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="header">                       
                        <h2 class="">Edit Product </h2>
                        <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4 pull-right">
                            <a href="<?php echo base_url()?>admin_product" class="btn bg-red btn-block btn-lg waves-effect" style="">Cancel</a>
                        </div>                         
                        <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4 pull-right">
                            <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect" onclick="return validateForm()">Update</button>
                        </div>                                                   
                    </div>                        
                    <div class="body">
                        <?php foreach ($product_detail as $row): ?>
                        <input type="hidden" value="<?php echo $row->product_id; ?>" name="product_id" id="product_id">
                    <div class="">
                        <ul class="nav nav-tabs tab-nav-right">
                            <li class="active"><a data-toggle="tab" href="#vital_info">Vital Info</a></li>
                            <!-- <li><a data-toggle="tab" href="#attribute">Attributes</a></li> -->
                            <li><a data-toggle="tab" href="#options">Options</a></li>
                            <li><a data-toggle="tab" href="#variations" onclick="getVariation('<?php echo $row->product_id; ?>')">Variations</a></li>                   
                            <li><a data-toggle="tab" href="#offer">Offer</a></li>
                            <li><a data-toggle="tab" href="#images">Images</a></li>
                            <li><a data-toggle="tab" href="#for_shipping">For Shipping</a></li>
                            <li><a data-toggle="tab" href="#other_detail">Other Details</a></li>
                            <li><a data-toggle="tab" href="#seo">SEO</a></li>
                        </ul>
                    </div>                 
                   
                    <div class="clearfix" style="margin-top: 15px;">
                        <div class="tab-content">

                            <div id="vital_info" class="tab-pane fade in active">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Item Title <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" type="text" value="<?php echo $row->product_name; ?>" required="" name="item_title" id="item_title" >                                                 
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Category <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="parent_category[]" required="" id="parent_category" multiple>
                                                    
                                                    <?php foreach ($category_list as $parent_category) { ?>
                                                    <option value="<?php echo $parent_category->category_id; ?>" <?php  if(in_array($parent_category->category_id,$category_array)){ echo 'selected'; }  ?>><?php echo getMenuList($parent_category->category_id);?></option>
                                                    <?php } ?>
                                                </select>                                                 
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Manufacturer </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                        <input class="form-control" type="text" value="<?php echo $row->manufacturer_id; ?>"  name="manufacturer" id="manufacturer" >
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Brand Name </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                        <input class="form-control" type="text" value="<?php echo $row->product_brand; ?>" name="brand_name" id="brand_name" >
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Model Number </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                        <input class="form-control" type="text" value="<?php echo $row->product_model; ?>" name="model_num" id="model_num" >
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Seller SKU <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                        <input class="form-control" type="text" value="<?php echo $row->product_sku; ?>" required="" name="seller_sku" id="seller_sku" >
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Product Description <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                        <textarea class="form-control"  name="product_short_description" id="product_short_description" required=""  rows="2"><?php echo $row->product_short_description; ?></textarea>
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Product Description </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                        <textarea class="form-control"  name="product_description" id="product_description"  rows="4"><?php echo $row->product_description; ?></textarea>
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                 
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Product Status <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control"  name="product_status" id="product_status" >
                                                    <option value="active" <?php if ($row->product_status=='active') { echo 'selected'; } ?> >Active</option>
                                                    <option value="inactive" <?php if ($row->product_status=='inactive') { echo 'selected'; } ?>>Inactive</option>
                                                </select>                                                
                                            </div>  
                                        </div>
                                    </div>
                                </div>                                   
                                   
                            </div>

                            <div id="offer" class="tab-pane fade">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Your price <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" value="<?php echo $row->product_price; ?>" required="" type="text" name="price" id="price" >                                                
                                            </div>  
                                        </div>
                                    </div>
                                </div>  
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Sale price </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                        <input class="form-control" type="text" value="<?php echo $row->product_sale_price; ?>" name="sale_price" id="sale_price" >
                                            </div>  
                                        </div>
                                    </div>
                                </div> 

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Show Price </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control"  name="product_is_price" id="product_is_price" >
                                                    <option value="1" <?php if ($row->product_is_price=='1') { echo 'selected'; } ?>>Yes</option>
                                                    <option value="0" <?php if ($row->product_is_price=='0') { echo 'selected'; } ?>>No</option>
                                                </select>                                                
                                            </div>  
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Get Quote</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="product_is_get_quote" id="product_is_get_quote" >
                                                    <option value="0" <?php if ($row->product_is_get_quote=='0') { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if ($row->product_is_get_quote=='1') { echo 'selected'; } ?>>Yes</option>                                                    
                                                </select>                                                
                                            </div>  
                                        </div>
                                    </div>
                                </div>
 
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Available Quantity </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" value="<?php echo $row->product_quantity; ?>" type="text" name="available_quantity" id="available_quantity" >                                          
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix" >
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Manage Stock </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="subtract_stock" id="subtract_stock" >
                                                    <option value="no" <?php if ($row->product_subtract_stock=='no') { echo 'selected'; } ?>>No</option>
                                                    <option value="yes" <?php if ($row->product_subtract_stock=='yes') { echo 'selected'; } ?>>Yes</option>
                                                </select>                                            
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Minimum Order Quantity </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                        <input class="form-control" type="text" value="<?php echo $row->product_minimum_quantity; ?>" name="min_quantity" id="min_quantity" >
                                            </div>  
                                        </div>
                                    </div>
                                </div> 
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Maximum Order Quantity </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                        <input class="form-control" type="text" value="<?php echo $row->product_maximum_quantity; ?>" name="max_quantity" id="max_quantity" >
                                            </div>  
                                        </div>
                                    </div>
                                </div>                               
                               
                            </div>

                            <div id="images" class="tab-pane fade">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="col-md-3" style="border: 1px solid #DDDDDD;width:193px;padding-top:12px;padding-bottom:12px">

                                            <img id="upload_pic" src="<?php echo base_url() ?>../camera_icon.png" alt="no-image">
                                        </div>
                                        <div class="col-md-3" style="background-color:#CCCCCC;width:300px">
                                            <input type="file" class="img_upload" name="img_upload[]" id="img_upload" onchange="readURL(this);" style="padding: 12px 0px;width:206px;margin-left:0px;outline:none">
                                        </div>
                                    </div>
                                    <div class="col-md-8" >
                                        <p><span style="color:#666666">Product images style guideline</span></p>
                                        <p>
                                            Choose images that are clear, information-rich, and attractive.
                                        </p>
                                        <p>Images should meet the following requirements :</p>
                                        <ul>
                                            <li style="margin-bottom: 8px;font-size: 13px;color: #ad2b31">
                                                Products should fill at least 85% of the image. Images should show only the product that is for sale, with few or no props and with no logos, watermarks, or inset images.
                                                Images may only contain text that is a part of the product.
                                            </li>
                                            <li style="margin-bottom: 8px;font-size: 13px;color: #ad2b31">
                                                Main images should have a pure white background,
                                                should be a photo (not a drawing), and should not contain excluded accessories.
                                            </li>
                                            <li style="margin-bottom: 8px;font-size: 13px;color: #ad2b31">
                                                Images should be at least 1000 pixels on the longest side and at least 500 pixels on the shortest side to be zoom-able.
                                            </li>
                                            <li style="margin-bottom: 8px;font-size: 13px;color: #ad2b31">
                                                Images should not exceed 10000 pixels on the longest side.
                                            </li>
                                            <li style="font-size: 13px;color: #ad2b31">
                                                JPEG is the preferred image format, but you also may use TIFF and GIF files.
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="files">Select multiple files: </label>
                                        <input id="files" class="img_upload" type="file" name="img_upload[]" multiple style="outline:none"/>
                                    </div>
                                    <div class="col-md-12" id="output_img" style="margin-bottom: 12px;">
                                        <output id="result" />
                                    </div>
                                    <input type="hidden" id="product_image_count" value="<?php echo count($product_image); ?>">
                                    <?php foreach ($product_image as $pro_image): ?>
                                        <div>
                                            <img style='height:170px;float:left;' class='thumbnail' src='<?php echo base_url(); ?>../ftp_upload/<?php echo $this->session->userdata('jw_admin_folder'); ?>/product/image/<?php echo $pro_image->product_image; ?>' title=''/>
                                            <a style="float:left;margin-right: 10px;font-weight: bold;" href="javascript:void(0)" class="remove_pict btn bg-red" onclick="removeImage('<?php echo $pro_image->product_image; ?>',this)">X</a>
                                            <!-- <a style="float:left;margin-right: 10px;font-weight: bold;" href="javascript:void(0)" class="remove_pict btn bg-blue" onclick="editImage('<?php echo $pro_image->product_image; ?>',this)">
                                                <i class="fa fa-edit" style="font-size: 12px;font-weight: 600;position: relative;top: 0px;"></i></a> -->
                                        </div>
                                    <?php endforeach ?>
                                    
                                    <div class="clearfix"></div>
                                    <div class="box-footer">
                                    </div>
                                </div>
                            </div>

                            <div id="for_shipping" class="tab-pane fade">
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                            <label for="">Is Shipping Free?   </label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control"  name="free_shipping" id="free_shipping" >
                                                        <option value="no" <?php if ($row->product_shipping_free=='no') { echo 'selected'; } ?>>No</option>
                                                        <option value="yes" <?php if ($row->product_shipping_free=='yes') { echo 'selected'; } ?>>Yes</option>
                                                    </select>                                                
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                            <label for="">Shipping Support   </label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control"  name="shipping_support" id="shipping_support" >
                                                        <option value="self">Self Shipping</option>                                                       
                                                    </select>                                                
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                            <label for="">Shipping Weight  </label>
                                        </div>
                                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" value="<?php echo $row->product_shipping_weight; ?>" name="shipping_weight" id="shipping_weight" placeholder="weight"/>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control" name="shipping_weight_class" id="shipping_weight_class" >
                                                       <?php foreach ($weight_class as $wrow): ?>
                                                             <option value="<?php echo $wrow->weight_class_id; ?>" <?php if($row->product_shipping_dimension_class==$wrow->weight_class_id){ echo 'selected'; } ?>><?php echo $wrow->weight_class; ?></option>
                                                        <?php endforeach ?> 
                                                    </select>                                                
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                            <label for="">Package Dimensions (L x W x H)  </label>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" value="<?php echo $row->product_shipping_length; ?>" name="shipping_product_length" id="shipping_product_length"  placeholder="length"/>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo $row->product_shipping_width; ?>" name="shipping_product_width" id="shipping_product_width"  placeholder="width"/>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo $row->product_shipping_height; ?>" name="shipping_product_height" id="shipping_product_height"  placeholder="height"/>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control" name="shipping_dimension_class" id="shipping_dimension_class" >
                                                        <?php foreach ($dimension_class as $drow): ?>
                                                             <option value="<?php echo $drow->dimension_class_id; ?>" <?php if($row->product_shipping_weight_class==$drow->dimension_class_id){ echo 'selected'; } ?>><?php echo $drow->dimension_class; ?></option>
                                                        <?php endforeach ?>  
                                                    </select>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                    
                            </div>

                            <div id="seo" class="tab-pane fade">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Meta Title</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input class="form-control" type="text" value="<?php echo $row->product_meta_title; ?>" name="meta_title" id="meta_title" >
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Meta Keyword</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input class="form-control" type="text" value="<?php echo $row->product_meta_keyword; ?>" name="meta_keyword" id="meta_keyword" >
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Meta Description</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" type="text" value="<?php echo $row->product_meta_description; ?>" name="meta_description" id="meta_description" >
                                            </div>  
                                        </div>
                                    </div>
                                </div> 

                            </div>

                            <div id="other_detail" class="tab-pane fade">                                                              
                                <div class="row clearfix" id="">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Global Addons</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control"  name="global_addons" id="global_addons" >
                                                        <option value="active" <?php if ($row->product_global_addons=='active') { echo 'selected'; } ?>>Active</option>                                                       
                                                        <option value="inactive" <?php if ($row->product_global_addons=='inactive') { echo 'selected'; } ?>>Inactive</option>                                                       
                                                </select>
                                            </div> 
                                            
                                        </div>
                                    </div>
                                    
                                </div>

                                <div id="product_feature" >
                                     <?php if (!count($product_feature)): ?>
                                    <div class="row clearfix" id="form_gr_id_0">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                            <label for="">Product Features</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" type="text" name="product_feature[]" id="product_feature_0" >
                                                </div> 
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                                            <button  type="button" class="btn btn-info" onclick="return product_feature()"><i class="fa fa-plus"></i> Add</button>                                     
                                        </div>
                                    </div>
                                    <?php endif ?>
                                    <?php foreach ($product_feature as $key => $value): ?>
                                    <div class="row clearfix" id="form_gr_id_<?php echo $key; ?>">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                            <label for="">Product Features</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="form-control" type="text" value="<?php echo $value->product_feature; ?>" name="product_feature[]" id="product_feature_<?php echo $key; ?>" >
                                                </div> 
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                                            <?php if($key=='0'){ ?>
                                            <button type="button" class="btn btn-info" onclick="return product_feature()"><i class="fa fa-plus"></i> Add</button>
                                            <?php }else{ ?>
                                            <button type="button" class="btn bg-red wave-effects" id="remove_<?php echo $key; ?>" value="remove" onclick="return remove_product_feature(<?php echo $key; ?>)"><i class="fa fa-times"></i> Remove</button>                                         
                                            <?php } ?>                                    
                                        </div>
                                    </div>
                                    <?php endforeach ?> 
                                </div>
                                 
                                
                            </div>  

<!--                             <div id="attribute" class="tab-pane fade">
                                <div id="product_tag" >
                                    <?php if (!count($product_attribute)): ?>
                                        <div class="row clearfix" id="form_gr_id_0">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-12 form-control-label">
                                            <label for="">Product Attributes <span style="color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select name="attribute_name[]" id="attribute_name_0" required="" class="form-control" onchange="getAttrValue(this.value,0)">
                                                        <option value="">Select</option>
                                                        <?php foreach ($attribute_list as $row): ?>
                                                            <option value="<?php echo $row->attribute_id; ?>"><?php echo $row->name; ?></option>
                                                        <?php endforeach ?>                                                        
                                                    </select>
                                                </div>                                                                                 
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                            <div class="form-group">
                                                <div class="form-line" id="attribute_value_0">
                                                    <input class="form-control" type="text" required="" name="product_attribute[]" id="" >
                                                </div>                                   
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                                             <button  type="button" class="btn btn-info" onclick="return product_attribute()"><i class="fa fa-plus"></i> Add</button>
                                        </div>
                                    </div>
                                    <?php endif ?>
                                    <?php foreach ($product_attribute as $key => $value): ?>
                                    <div class="row clearfix" id="form_gr_id_<?php echo $key; ?>">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-12 form-control-label">
                                            <label for="">Product Attributes <span style="color:red">*</span></label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select name="attribute_name[]" id="attribute_name_<?php echo $key; ?>" required="" class="form-control" onchange="getAttrValue(this.value,0)">
                                                        <option value="">Select</option>
                                                        <?php foreach ($attribute_list as $row): ?>
                                                            <option value="<?php echo $row->attribute_id; ?>" <?php if($row->attribute_id==$value->attribute_id){ echo 'selected'; } ?>><?php echo $row->name; ?></option>
                                                        <?php endforeach ?>                                                        
                                                    </select>
                                                </div>                                                                                 
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                            <div class="form-group">
                                                <div class="form-line" id="attribute_value_<?php echo $key; ?>">
                                                    <input class="form-control" type="text" required="" name="product_attribute[]" id="" value="<?php echo $value->value; ?>">
                                                </div>                                   
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                                            <?php if($key=='0'){ ?>
                                            <button type="button" class="btn btn-info" onclick="return product_attribute()"><i class="fa fa-plus"></i> Add</button>
                                            <?php }else{ ?>
                                            <button type="button" class="btn bg-red wave-effects" id="remove_<?php echo $key; ?>" value="remove" onclick="return remove_product_tag(<?php echo $key; ?>)"><i class="fa fa-times"></i> Remove</button>                                         
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-lg-1 col-md-2 col-sm-4 col-xs-6">
                                            <button type="button" class="btn bg-cyan btn-block btn-lg waves-effect">Save Changes</button>
                                        </div>                                        
                                    </div>
                                </div>
                            </div> -->   

                            <div id="variations" class="tab-pane fade">
                                <div class="form-group"> 
                                <?php //echo $html ?>                   
                                     <div id="variation_div_first"><h4>Add Options For Variation!</h4></div>
                                    
                                    <!--<div id="variation_div"></div> -->
                                </div>
                            </div>

                             <div id="options" class="tab-pane fade">
                                <div class="row clearfix" id="" style="margin-bottom: 20px;">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Product Option <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-7 col-sm-7 col-12">                                        
                                        <div class="">
                                            <a data-toggle="collapse" class="btn bg-indigo btn-block btn-lg waves-effect" href="#collapseProductOption">Select Option <span class="caret"></span></a>
                                        </div>
                                        <div class="collapse  dropdown-menu" id="collapseProductOption">
                                          <?php foreach ($option_list as $row): ?>
                                            <label class="droplist">
                                                <input type="checkbox" id="optionCheck_<?php echo $row->option_id; ?>" class="filled-in" <?php  if(in_array($row->option_id,$option_array)){ echo 'checked'; }  ?> name="" onclick="showProductOptoin(this.value,this.checked)" value="<?php echo $row->option_id; ?>"> 
                                                <label for="optionCheck_<?php echo $row->option_id; ?>"></label> <?php echo $row->name; ?>
                                            </label>
                                          <?php endforeach ?>                             
                                        </div>                                           
                                    </div>                                    
                                </div>
                                <?php foreach ($option_list as $row): ?>                                    
                                <div id="product_option_div_<?php echo $row->option_id; ?>" style="display: <?php  if(!in_array($row->option_id,$option_array)){ echo 'none'; }  ?>">
                                    <div class="row clearfix col-lg-12 col-md-12 col-sm-12 col-12" >
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-12 form-control-label">
                                            <input type="hidden" name="option_name[]" value="<?php echo $row->name; ?>">
                                            <label for=""><?php echo $row->name; ?></label>
                                        </div>
                                        <?php $where=array('option_id'=>$row->option_id);
                                        $op_value=$this->admin_model->selectWhere('tbl_option_value',$where); ?>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <?php if(count($op_value)){ ?>
                                                    <select class="form-control" name="product_option_<?php echo $row->option_id; ?>[]" id="" multiple>
                                                        <?php foreach ($op_value as $row): ?>
                                                        <option value="<?php echo $row->value; ?>" <?php foreach ($product_option as $po_row) {
                                                            if($po_row->option_id==$row->option_id && $po_row->value==$row->value)
                                                            {
                                                                echo 'selected';
                                                            }
                                                        } ?> > <?php echo $row->value; ?></option>
                                                        <?php endforeach ?> 
                                                    </select>
                                                    
                                                    <?php } else { ?>   
                                                        <!-- <input class="form-control" type="text" required="" name="product_option[]" id="" > -->
                                                    <?php } ?>                                         
                                                </div> 
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="checkbox" id="pr_visible_<?php echo $row->option_id; ?>" <?php foreach ($product_option as $po_row) {
                                                            if($po_row->is_visible=='1' && $po_row->option_id==$row->option_id)
                                                            {
                                                                echo 'checked';
                                                                break;
                                                            }
                                                        } ?> class="filled-in" name="pr_visible_<?php echo $row->option_id; ?>[]"  value="<?php echo $row->option_id; ?>"> 
                                                    <label for="pr_visible_<?php echo $row->option_id; ?>"></label>Visible on the product page                                         
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="checkbox" id="pr_variation_<?php echo $row->option_id; ?>" <?php foreach ($product_option as $po_row) {
                                                            if($po_row->is_variation=='1' && $po_row->option_id==$row->option_id)
                                                            {
                                                                echo 'checked';
                                                                break;
                                                            }
                                                        } ?> class="filled-in" name="pr_variation_<?php echo $row->option_id; ?>[]"  value="<?php echo $row->option_id; ?>"> 
                                                    <label for="pr_variation_<?php echo $row->option_id; ?>"></label>Used for variations                                         
                                                </div> 
                                            </div>
                                        </div>
                                        
                                    </div> 
                                </div>                                      
                                <?php endforeach ?>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-lg-10 col-md-10 col-sm-8 col-12">
                                        <button type="button" onclick="saveOption()" class="btn bg-cyan  waves-effect">Save Option</button>
                                    </div>                                    
                                </div>                                 

                        </div>
                    </div>
                    <!-- <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-lg-2 col-md-2 col-sm-4 col-xs-6">
                            <button type="submit" class="btn bg-teal btn-block btn-lg waves-effect">Submit</button>
                        </div>
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-lg-2 col-md-2 col-sm-4 col-xs-6">
                            <a href="<?php echo base_url()?>admin_product" class="btn bg-red btn-block btn-lg waves-effect" style="">Cancel</a>
                        </div>
                    </div> -->
                    
                     <?php endforeach ?>

                </div>
                </form>

                </div>
            </div>
        </div>
    </div>
        <!-- #END# Basic Examples -->

</div>
</section>
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
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 form-control-label">
                                        <label for="">Product Features</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" type="text" name="product_feature[]" id="product_feature_`+count+`" >
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
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
        alertify.confirm(
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