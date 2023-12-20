  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Blog List</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-12">
          <div class="box box-primary">
            <div class="box-header">
              <!-- <h3 class="box-title">Hover Data Table</h3> -->
              <!--<a href="<?php echo base_admin(); ?>group/add_group" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-plus"></i> Add Group</a>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">              
                <div class="row">
                  <div class="col-sm-12 table-responsive">
                    <table id="example2" class="table table-bordered table-hover table-condensed dataTable" role="grid" aria-describedby="example2_info">
                      <thead class="bg-primary text-uppercase">
                        <tr role="row">                        
                          <th class="sorting" >Title</th>
                          <!-- <th class="sorting" >Image</th> -->
                          <!-- <th class="sorting" >Content</th>  -->                          
                          <th class="sorting" >Created At</th>
                          <!-- <th class="sorting" >Edited By</th>   -->                        
                          <th class="sorting" >Status</th>
                          <th class="sorting" >Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>  
                      <?php foreach ($blog_list as $blog): ?>
                        <tr role="row" class="text-bold">
                          <td class=""><?php echo $blog->blog_title; ?></td>
                          <?php //if(!empty($blog->blog_image)){ $image =  base_url('uploads/blog/'.$blog->blog_image.'');}else{ 
                             //$image = base_url('assets/front/No_image.jpg'); } ?>
                         <!--  <td class=""><img src="<?php //echo $image; ?>" width="100px"></td> -->
                          <!-- <td class=""><?php //echo $blog->blog_dec; ?></td> -->                                                   
                          <td class=""><?php echo date('Y-m-d h:i A',strtotime($blog->created_at)); ?></td>
                          <!-- <td class=""><?php if($blog->edited_at!=""){ echo date('Y-m-d h:i A',strtotime($blog->edited_at)); } ?></td> -->
                          <td class=""><?php if($blog->status){ echo "Active"; }else{ echo "Inactive"; } ?></td>
                          <td class=""><a href="<?php echo base_admin(); ?>blog/edit_blog/<?php echo $blog->blog_id; ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</a> &nbsp;
                          <a href="<?php echo base_admin(); ?>blog/delete_blog/<?php echo $blog->blog_id; ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-pencil"></i> Delete</a></td>
                        </tr>
                      <?php endforeach ?>  
                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->