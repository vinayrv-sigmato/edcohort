<style>
    .x_panel {
    width: 100%;
    padding: 10px 17px;
    display: inline-block;
    background: #fff;
    border: 1px solid #E6E9ED;
    -webkit-column-break-inside: avoid;
    -moz-column-break-inside: avoid;
    column-break-inside: avoid;
    opacity: 1;
    transition: all .2s ease;
}

.x_panel, .x_title {
    margin-bottom: 10px;
}

.degrees:after, .x_content, .x_panel {
    position: relative;
}
.x_title {
    border-bottom: 2px solid #E6E9ED;
    padding: 1px 5px 6px;
}

.x_panel, .x_title {
    margin-bottom: 10px;
}
.custom_heading h2 {
    float: none !important;
}

.x_title h2 {
    margin: 5px 0 6px;
    float: left;
    display: block;
}

.overflow_hidden, .sidebar-widget, .site_title, .tile, .weather-days .col-sm-2, .x_title h2, table.tile_info td p {
   /* overflow: hidden;*/
}

h2 {
    font-size: 18px;
    font-weight: 400;
}
.small, small {
    font-size: 15px;
    display: inline-block;
    padding-left: 4px;
    font-weight: 300;
}
.form-design {
    display: flex;
}
.form-group {
    margin-bottom: 10px;
}
.import_csv img {
    margin: auto auto 16px;
    width: 93px;
}
</style>

 <section class="content">
    <div class="container-fluid">
        <div class="row row-header">
            <div class="col-md-8">
              <h2>Diamond <small>Diamond Upload</small></h2>
            </div>
        </div>
        <?php message(); ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="header">
                        <span class="header_span">Upload Your Data File</span> <a href="">Download</a> <small> Accepted Format  .csv | .xlsx</small>                                                   
                    </div>               
                    <div class="body">
                      <div class="col-12">                              
                        <div class="col-md-9">
                          <form action="<?php echo base_url(); ?>admin_lab_grown_diamond/upload_diamond_submit" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <?php echo csrf(); ?> 
                            <div class="form-group form-design">
                              <label class="control-label col-md-3 col-sm-3 col-12">Select Your File</label>
                              <div class="col-md-9 col-sm-9 col-12">
                                  <input type="file" name="userfile"  required="">
                              </div>
                            </div>
                            <div class="form-group form-design">
                              <label class="control-label col-md-3 col-sm-3 col-12">Select Option</label>
                              <div class="col-md-9 col-sm-9 col-12">                                      
                                  <input type="radio" checked="" name="replace_all[]" id="replace_all" value="replace_all" class="flat" >
                                  <label for="replace_all">Replace All:</label>
                                
                                  <input type="radio" value="AddUpload" id="AddUpload" name="replace_all[]" class="flat">
                                  <label for="AddUpload">Add &amp; Update:</label>                                         
                              </div>
                            </div>
                            <button class="btn bg-teal waves-effect" type="submit">Upload File</button>
                          </form>
                        </div>
                        <div class="col-md-3">
                            <div class="import_csv"> <img src="<?php echo base_url(); ?>assets/images/icon_csv.png" class="img-responsive"> </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="header">
                        <span class="header_span">Upload Diamond Images</span>   <small> Accepted Format  .jpg</small>                                                   
                    </div>               
                    <div class="body">
                      <div class="col-12">                              
                        <div class="col-md-9">
                             <form action="<?php echo base_url(); ?>admin_lab_grown_diamond/upload_diamond_image" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <?php echo csrf(); ?> 
                              <div class="form-group form-design">
                                <label class="control-label col-md-3 col-sm-3 col-12">Select Your File</label>
                                <div class="col-md-9 col-sm-9 col-12">
                                    <input type="file" name="userfile[]" multiple  required="">
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group form-design">
                                <label class="control-label col-md-3 col-sm-3 col-12"></label>
                                <div class="col-md-9 col-sm-9 col-12">                                     
                                </div>
                              </div>
                              <button class="btn bg-teal waves-effect" type="submit">Upload File</button>
                            </form>
                          </div>
                          <div class="col-md-3">
                              <div class="import_csv"> <img src="<?php echo base_url(); ?>assets/images/jpg.png" class="img-responsive"> </div>                                
                          </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="header">
                        <span class="header_span">Upload Diamond Video</span>   <small> Accepted Format  .mp4</small>                                                   
                    </div>               
                    <div class="body">
                      <div class="col-12">                              
                         <div class="col-md-9">
                           <form action="<?php echo base_url(); ?>admin_lab_grown_diamond/upload_diamond_video" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <?php echo csrf(); ?> 
                            <div class="form-group form-design">
                              <label class="control-label col-md-3 col-sm-3 col-12">Select Your File</label>
                              <div class="col-md-9 col-sm-9 col-12">
                                  <input type="file" name="userfile[]" multiple  required="">
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group form-design">
                              <label class="control-label col-md-3 col-sm-3 col-12"></label>
                              <div class="col-md-9 col-sm-9 col-12">                                     
                              </div>
                            </div>
                            <button class="btn bg-teal waves-effect" type="submit">Upload File</button>
                          </form>
                        </div>
                        <div class="col-md-3">
                            <div class="import_csv"> <img src="<?php echo base_url(); ?>assets/images/video-icon.png" class="img-responsive"> </div>                          
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="header">
                        <span class="header_span">Upload Diamond Certificate</span>   <small> Accepted Format  .pdf</small>                                                   
                    </div>               
                    <div class="body">
                      <div class="col-12">                              
                         <div class="col-md-9">
                           <form action="<?php echo base_url(); ?>admin_lab_grown_diamond/upload_diamond_certificate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                              <?php echo csrf(); ?> 
                            <div class="form-group form-design">
                              <label class="control-label col-md-3 col-sm-3 col-12">Select Your File</label>
                              <div class="col-md-9 col-sm-9 col-12">
                                  <input type="file" name="userfile[]" multiple  required="">
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group form-design">
                              <label class="control-label col-md-3 col-sm-3 col-12"></label>
                              <div class="col-md-9 col-sm-9 col-12">                                     
                              </div>
                            </div>
                            <button class="btn bg-teal waves-effect" type="submit">Upload File</button>
                          </form>
                        </div>
                        <div class="col-md-3">
                            <div class="import_csv"> <img src="<?php echo base_url(); ?>assets/images/pdf-icon.png" class="img-responsive"> </div>                          
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>





