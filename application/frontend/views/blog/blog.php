
<!--Section-->
 <div class="header-main"> 
        <!--Section-->
        <div class="cover-image bg-background-1" data-bs-image-src="assets/images/banners/banner1.jpg">
        <section>
          <div class="sptb-2 bannerimg">
            <div class="header-text mb-0">
              <div class="container">
                <div class="text-center text-white py-7">
                  <h1 class="">Blog</h1>
                  <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Blog</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </section><!--/Section-->
      </div>
    </div>
</div>


    <!-- Shape Start -->
        <div class="relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmsns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="#f5f4f9"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->


        <!--Section-->
    <section class="sptb">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="row blog-grid">
              <?php foreach($blog_list as $blog){  ?>
              <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card p-5">
                  <div class="item7-card-img br-7 border">
                    <a href="javascript:void(0)"></a>
                    <img src="<?php echo base_url(); ?>uploads/blog/<?php echo $blog->blog_image; ?>" alt="<?php echo $blog->blog_title; ?>" class="cover-image">
                  </div>
                  <div class="card-body pt-4 pb-0 ps-0 pe-0">
                    <div class="mb-3">
                      <?php $category = explode(",",$blog->category); foreach($category as $cat){ ?> <span class="item-card-badge mb-2"><?php echo ucfirst($cat); ?> </span> <?php  } //echo $blog->category; ?>
                      <a href="<?php echo base_url(); ?>blog-detail/<?php echo $blog->blog_slug; ?>" class=""><h3 class="font-weight-semibold fs-16"><?php echo $blog->blog_title; ?></h3></a>
                      <p class=""><?php echo substr($blog->blog_dec, 0, 150); ?>...</p>
                    </div>
                    <div class="d-flex align-items-center pt-2 mt-auto">
                      <img src="<?php echo base_url(); ?>assets/images/users/user.jpg" class="avatar brround avatar-md me-3" alt="avatar-img">
                      <div>
                        <a href="javascript:void(0)" class="text-default font-weight-bold">Admin</a>
                        <small class="d-block text-muted"><?php echo date('d M Y',strtotime($blog->created_at)); ?></small>
                      </div>
                      <div class="ms-auto text-muted">
                        <a href="javascript:void(0)" class=""><i class="fa fa-comment-o me-2"></i><?php echo $blog->comment_count; ?> Comments</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php  } ?> 
            </div>
            
           
            <div class="center-block text-center">
              <ul class="pagination mb-0">
                <?php echo $page_link; ?>                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/Section-->



    



    