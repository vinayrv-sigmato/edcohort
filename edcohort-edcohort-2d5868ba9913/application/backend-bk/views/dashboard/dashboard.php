<!--App-Content-->
        <div class="app-content my-3 my-md-5">
          <div class="side-app">
            <div class="page-header">
              <h4 class="page-title">Dashboard 1</h4>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard 1</li>
              </ol>
            </div>

            <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card">
                  <div class="card-body">
                    <div class="counter-status dash3-counter d-flex">
                      <div class="counter-icon bg-primary-dark my-auto br-100">
                        <i class="mdi mdi-account-multiple leading-loose"></i>
                      </div>
                      <div class="ms-auto">
                        <h5 class="mb-0">Total Students</h5>
                        <h2 class="counter mb-0"><?php echo $customer_total['0']->customer_total; ?></h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card">
                  <div class="card-body text-center">
                    <div class="counter-status dash3-counter d-flex">
                      <div class="counter-icon bg-primary-dark my-auto br-100">
                        <i class="zmdi zmdi-graduation-cap leading-loose"></i>
                      </div>
                      <div class="ms-auto">
                        <h5 class="mb-0">Total Graduates</h5>
                        <h2 class="counter mb-0"><?php echo $customer_total['0']->customer_total; ?></h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 ">
                <div class="card">
                  <div class="card-body text-center">
                    <div class="counter-status dash3-counter d-flex">
                      <div class="counter-icon bg-primary-dark my-auto br-100">
                        <i class="zmdi zmdi-assignment leading-loose"></i>
                      </div>
                      <div class="ms-auto">
                        <h5 class="mb-0">Total Courses</h5>
                        <h2 class="counter mb-0"><?php echo $customer_total['0']->customer_total; ?></h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card">
                  <div class="card-body text-center">
                    <div class="counter-status dash3-counter d-flex">
                      <div class="counter-icon bg-primary-dark my-auto br-100">
                        <i class="mdi mdi-account-plus leading-loose"></i>
                      </div>
                      <div class="ms-auto">
                        <h5 class="mb-0">New Students</h5>
                        <h2 class="counter mb-0"><?php echo $customer_total['0']->customer_total; ?></h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-8 col-lg-12 col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Merit Overview</h3>
                  </div>
                  <div class="pt-4">
                    <div class="sales-chart text-center">
                      <span class="me-5"><span class="dot-label mycanvs1 me-2"></span>Course Visit</span>
                      <span class=""><span class="dot-label mycanvs2"></span>Course Sale</span>
                    </div>
                  </div>
                  <div class="card-body border-top-0">
                    <div class="chart-wrapper">
                      <canvas id="sales-status" class="chart-dropshadow"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-12 col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Professors List</h3>
                  </div>
                  <div class="card-body p-0">
                    <div class="media mb-0 mt-2 border-bottom align-items-center ps-5 pe-5 pt-3 pb-3">
                      <img src="<?php echo base_url(); ?>assets/images/users/female/8.jpg" alt="" class="me-3 rounded-circle">
                      <div class="media-body">
                        <div class="time-activity mb-0">
                          <div class="item-activity">
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                <p class="mb-0 h6"><b>Julia Hardacre</b></p>
                              </div>
                              <small class="mb-0 ms-auto text-primary"><b>Available</b></small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                <p class="mb-0 text-muted">Web Designer</p>
                              </div>
                              <small class="mb-0 ms-auto"><b>Daily: 2Hours</b></small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="media mb-0 mt-0 border-bottom align-items-center pb-3 ps-5 pe-5 pt-3">
                      <img src="<?php echo base_url(); ?>assets/images/users/male/8.jpg" alt="" class="me-3 rounded-circle">
                      <div class="media-body">
                        <div class="time-activity mb-0">
                          <div class="item-activity">
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                <p class="mb-0 h6"><b>John Joya</b></p>
                              </div>
                              <small class="mb-0 ms-auto text-primary"><b>Available</b></small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                <p class="mb-0 text-muted">3D Animation Trainer</p>
                              </div>
                              <small class="mb-0 ms-auto"><b>Daily: 3Hours</b></small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="media mb-0 mt-0 border-bottom align-items-center pb-3 ps-5 pe-5 pt-3">
                      <img src="<?php echo base_url(); ?>assets/images/users/female/10.jpg" alt="" class="me-3 rounded-circle">
                      <div class="media-body">
                        <div class="time-activity mb-0">
                          <div class="item-activity">
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                <p class="mb-0 h6"><b>Irene Hunter</b></p>
                              </div>
                              <small class="mb-0 ms-auto text-danger"><b>Not Available</b></small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                <p class="mb-0 text-muted">Digital Marketing</p>
                              </div>
                              <small class="mb-0 ms-auto"><b>Daily: 1Hours</b></small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="media mb-0 mt-0 border-bottom align-items-center pb-3 ps-5 pe-5 pt-3">
                      <img src="<?php echo base_url(); ?>assets/images/users/female/15.jpg" alt="" class="me-3 rounded-circle">
                      <div class="media-body">
                        <div class="time-activity mb-0">
                          <div class="item-activity">
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                <p class="mb-0 h6"><b>Lilly Potter</b></p>
                              </div>
                              <small class="mb-0 ms-auto text-primary"><b>Available</b></small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                <p class="mb-0 text-muted">App Developer</p>
                              </div>
                              <small class="mb-0 ms-auto"><b>Daily: 2Hours</b></small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="media mb-0 mt-0 border-bottom align-items-center pb-3 ps-5 pe-5 pt-3">
                      <img src="<?php echo base_url(); ?>assets/images/users/female/20.jpg" alt="" class="me-3 rounded-circle">
                      <div class="media-body">
                        <div class="time-activity mb-0">
                          <div class="item-activity">
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                <p class="mb-0 h6"><b>Pedro Cox</b></p>
                              </div>
                              <small class="mb-0 ms-auto text-primary"><b>Not Available</b></small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                <p class="mb-0 text-muted">Beautician</p>
                              </div>
                              <small class="mb-0 ms-auto"><b>Daily: 1Hours</b></small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="media mt-0 align-items-center ps-5 pe-5 pb-5 pt-3">
                      <img src="<?php echo base_url(); ?>assets/images/users/female/21.jpg" alt="" class="me-3 rounded-circle">
                      <div class="media-body">
                        <div class="time-activity mb-0">
                          <div class="item-activity">
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                <p class="mb-0 h6"><b>Rebacca wisely</b></p>
                              </div>
                              <small class="mb-0 ms-auto text-danger"><b>Not Available</b></small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="d-flex align-items-center">
                                <p class="mb-0 text-muted">Java Developer</p>
                              </div>
                              <small class="mb-0 ms-auto"><b>Daily: 2Hours</b></small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">New Courses</h3>
                  </div>
                  <div class="card-body">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                      <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                          <div class="card bg-transparent shadow-none overflow-hidden">
                            <div class="item-card7-img pt-5 px-5">
                              <div class="item-card7-imgs">
                                <a href="javascript:void(0)"></a>
                                <img src="<?php echo base_url(); ?>assets/images/media/0-4.jpg" alt="img" class="cover-image br-7 border">
                              </div>
                              <div class="item-card7-overlaytext">
                                <h4 class="mb-0">$875</h4>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="item-card7-desc">
                                <small class="text-muted">-- language</small>
                                <div class="item-card7-text mt-1">
                                  <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-semibold mb-1"> Literature Classes</h4></a>
                                </div>
                                <div class="pt-2 mb-2">
                                  <a class="me-4"><i class="fe fe-calendar"></i><span class=""> 9 Months</span></a>
                                  <a class="me-4 float-end"><i class="fe fe-clock"></i><span class=""> 1 hour / everyday</span></a>
                                </div>
                                <p class="mb-0 text-muted">Nemo enim ipsam voluptatem voluptas sit aspernatur ratione voluptatem sequi nesciunt..</p>
                              </div>
                            </div>
                            <div class="card-footer">
                              <div class="d-flex">
                                <div class="d-flex mb-0">
                                  <div class="star-ratings start-ratings-main clearfix me-3">
                                    <div class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                      <div class="br-wrapper br-theme-fontawesome-stars">
                                        <select class="example-fontawesome" name="rating" autocomplete="off" style="display: none;">
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5" selected="">5</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <span class="">968 reviews</span>
                                </div>
                                <div class="ms-auto d-flex">
                                  <a class="viewmore-btn-icon mx-1" href="javascript:void(0)"><i class="fe fe-heart"></i></a>
                                  <a class="viewmore-btn-icon mx-1" href="javascript:void(0)"><i class="fe fe-share-2"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                          <div class="card bg-transparent shadow-none overflow-hidden">
                            <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><img src="<?php echo base_url(); ?>assets/images/png/power.png" class=""></span></div>
                            <div class="item-card7-img pt-5 px-5">
                              <div class="item-card7-imgs">
                                <a href="javascript:void(0)"></a>
                                <img src="<?php echo base_url(); ?>assets/images/media/0-5.jpg" alt="img" class="cover-image br-7 border">
                              </div>
                              <div class="item-card7-overlaytext">
                                <h4 class="mb-0">$854 <del class="fs-12">$999</del></h4>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="item-card7-desc">
                                <small class="text-muted">-- Networking</small>
                                <div class="item-card7-text mt-1">
                                  <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-semibold mb-1"> Networking Classes</h4></a>
                                </div>
                                <div class="pt-2 mb-2">
                                  <a class="me-4"><i class="fe fe-calendar"></i><span class=""> 9 Months</span></a>
                                  <a class="me-4 float-end"><i class="fe fe-clock"></i><span class=""> 1 hour / everyday</span></a>
                                </div>
                                <p class="mb-0 text-muted">Nemo enim ipsam voluptatem voluptas sit aspernatur ratione voluptatem sequi nesciunt..</p>
                              </div>
                            </div>
                            <div class="card-footer">
                              <div class="d-flex">
                                <div class="d-flex mb-0">
                                  <div class="star-ratings start-ratings-main clearfix me-3">
                                    <div class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                      <div class="br-wrapper br-theme-fontawesome-stars">
                                        <select class="example-fontawesome" name="rating" autocomplete="off" style="display: none;">
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4" selected="">4</option>
                                          <option value="5" >5</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <span class="">785 reviews</span>
                                </div>
                                <div class="ms-auto d-flex">
                                  <a class="viewmore-btn-icon mx-1" href="javascript:void(0)"><i class="fe fe-heart"></i></a>
                                  <a class="viewmore-btn-icon mx-1" href="javascript:void(0)"><i class="fe fe-share-2"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                          <div class="card bg-transparent shadow-none overflow-hidden">
                            <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><img src="<?php echo base_url(); ?>assets/images/png/power.png" class=""></span></div>
                            <div class="item-card7-img pt-5 px-5">
                              <div class="item-card7-imgs">
                                <a href="javascript:void(0)"></a>
                                <img src="<?php echo base_url(); ?>assets/images/media/0-1.jpg" alt="img" class="cover-image br-7 border">
                              </div>
                              <div class="item-card7-overlaytext">
                                <h4 class="mb-0">$985 <del class="fs-12">$1560</del></h4>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="item-card7-desc">
                                <small class="text-muted">-- Marketing</small>
                                <div class="item-card7-text mt-1">
                                  <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-semibold mb-1"> Business Classes</h4></a>
                                </div>
                                <div class="pt-2 mb-2">
                                  <a class="me-4"><i class="fe fe-calendar"></i><span class=""> 9 Months</span></a>
                                  <a class="me-4 float-end"><i class="fe fe-clock"></i><span class=""> 1 hour / everyday</span></a>
                                </div>
                                <p class="mb-0 text-muted">Nemo enim ipsam voluptatem voluptas sit aspernatur ratione voluptatem sequi nesciunt..</p>
                              </div>
                            </div>
                            <div class="card-footer">
                              <div class="d-flex">
                                <div class="d-flex mb-0">
                                  <div class="star-ratings start-ratings-main clearfix me-3">
                                    <div class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                      <div class="br-wrapper br-theme-fontawesome-stars">
                                        <select class="example-fontawesome" name="rating" autocomplete="off" style="display: none;">
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5" selected="">5</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <span class="">875 reviews</span>
                                </div>
                                <div class="ms-auto d-flex">
                                  <a class="viewmore-btn-icon mx-1" href="javascript:void(0)"><i class="fe fe-heart"></i></a>
                                  <a class="viewmore-btn-icon mx-1" href="javascript:void(0)"><i class="fe fe-share-2"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                          <div class="card bg-transparent shadow-none overflow-hidden">
                            <div class="item-card7-img pt-5 px-5">
                              <div class="item-card7-imgs">
                                <a href="javascript:void(0)"></a>
                                <img src="<?php echo base_url(); ?>assets/images/media/0-3.jpg" alt="img" class="cover-image br-7 border">
                              </div>
                              <div class="item-card7-overlaytext">
                                <h4 class="mb-0">$965</h4>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="item-card7-desc">
                                <small class="text-muted">-- Software</small>
                                <div class="item-card7-text mt-1">
                                  <a href="javascript:void(0)" class="text-dark"><h4 class="font-weight-semibold mb-1"> Coding Training Classes</h4></a>
                                </div>
                                <div class="pt-2 mb-2">
                                  <a class="me-4"><i class="fe fe-calendar"></i><span class=""> 9 Months</span></a>
                                  <a class="me-4 float-end"><i class="fe fe-clock"></i><span class=""> 1 hour / everyday</span></a>
                                </div>
                                <p class="mb-0 text-muted">Nemo enim ipsam voluptatem voluptas sit aspernatur ratione voluptatem sequi nesciunt..</p>
                              </div>
                            </div>
                            <div class="card-footer">
                              <div class="d-flex">
                                <div class="d-flex mb-0">
                                  <div class="star-ratings start-ratings-main clearfix me-3">
                                    <div class="stars stars-example-fontawesome stars-example-fontawesome-sm">
                                      <div class="br-wrapper br-theme-fontawesome-stars">
                                        <select class="example-fontawesome" name="rating" autocomplete="off" style="display: none;">
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4" selected="">4</option>
                                          <option value="5">5</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <span class="">635 reviews</span>
                                </div>
                                <div class="ms-auto d-flex">
                                  <a class="viewmore-btn-icon mx-1" href="javascript:void(0)"><i class="fe fe-heart"></i></a>
                                  <a class="viewmore-btn-icon mx-1" href="javascript:void(0)"><i class="fe fe-share-2"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">New Students List</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive mb-0 ">
                      <table class="data-table-example table table-striped table-bordered table-hover text-nowrap mb-0">
                        <thead>
                          <tr>
                            <th>S.no</th>
                            <th>Student Name</th>
                            <th>Course Name</th>
                            <th>Assigned Coach</th>
                            <th>Start Date</th>
                            <th>Course Duration</th>
                            <th>Cost</th>
                            <th>Details</th>
                            <th>Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Vera Guzman</td>
                            <td>IT Courses</td>
                            <td>Adam Berry</td>
                            <td>07-02-2021</td>
                            <td>3 Months</td>
                            <td class="font-weight-semibold fs-16">$893</td>
                            <td>
                              <a href="javascript:void(0)" class="btn btn-primary btn-sm">View Details</a>
                            </td>
                            <td>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Blanche Henderson</td>
                            <td>Data Courses</td>
                            <td>Irene Hunter</td>
                            <td>12-01-2021</td>
                            <td>6 Months</td>
                            <td class="font-weight-semibold fs-16">$254</td>
                            <td>
                              <a href="javascript:void(0)" class="btn btn-primary btn-sm">View Details</a>
                            </td>
                            <td>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Pedro Cox</td>
                            <td>Business Courses</td>
                            <td>John Payne</td>
                            <td>15-03-2021</td>
                            <td>2 Months</td>
                            <td class="font-weight-semibold fs-16">$352</td>
                            <td>
                              <a href="javascript:void(0)" class="btn btn-primary btn-sm">View Details</a>
                            </td>
                            <td>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Heather Bell</td>
                            <td>Digital-Marketing Courses</td>
                            <td>Julia Hardacre</td>
                            <td>10-04-2021</td>
                            <td>4 Months</td>
                            <td class="font-weight-semibold fs-16">$643</td>
                            <td>
                              <a href="javascript:void(0)" class="btn btn-primary btn-sm">View Details</a>
                            </td>
                            <td>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Joel Anderson</td>
                            <td>Photography Courses</td>
                            <td>Rutherford</td>
                            <td>07-01-2021</td>
                            <td>2 Months</td>
                            <td class="font-weight-semibold fs-16">$392</td>
                            <td>
                              <a href="javascript:void(0)" class="btn btn-primary btn-sm">View Details</a>
                            </td>
                            <td>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td>Glenda Long</td>
                            <td>Beautician Courses</td>
                            <td>Lambert</td>
                            <td>31-02-2021</td>
                            <td>6 Months</td>
                            <td class="font-weight-semibold fs-16">$295</td>
                            <td>
                              <a href="javascript:void(0)" class="btn btn-primary btn-sm">View Details</a>
                            </td>
                            <td>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td>Joanne Nash</td>
                            <td>Cloud Computing</td>
                            <td>Tanner Mallari</td>
                            <td>07-03-2021</td>
                            <td>3 Months</td>
                            <td class="font-weight-semibold fs-16">$993</td>
                            <td>
                              <a href="javascript:void(0)" class="btn btn-primary btn-sm">View Details</a>
                            </td>
                            <td>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td>Aracely Bashore</td>
                            <td>web Development Courses</td>
                            <td>Rutherford</td>
                            <td>07-04-2021</td>
                            <td>2 Months</td>
                            <td class="font-weight-semibold fs-16">$392</td>
                            <td>
                              <a href="javascript:void(0)" class="btn btn-primary btn-sm">View Details</a>
                            </td>
                            <td>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>Julia Hardacre</td>
                            <td>web Designing Courses</td>
                            <td>John Joya</td>
                            <td>07-01-2021</td>
                            <td>2 Months</td>
                            <td class="font-weight-semibold fs-16">$492</td>
                            <td>
                              <a href="javascript:void(0)" class="btn btn-primary btn-sm">View Details</a>
                            </td>
                            <td>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td>Irene Hunter</td>
                            <td>App Development Courses</td>
                            <td>Lilly Potter</td>
                            <td>17-02-2021</td>
                            <td>4 Months</td>
                            <td class="font-weight-semibold fs-16">$692</td>
                            <td>
                              <a href="javascript:void(0)" class="btn btn-primary btn-sm">View Details</a>
                            </td>
                            <td>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fe fe-edit-2 fs-16"></i></a>
                              <a class="btn btn-outline-light btn-sm waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fe fe-trash fs-16"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
