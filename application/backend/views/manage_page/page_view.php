    <section class="content">
        <div class="container-fluid">
            <div class="row row-header">
                <div class="col-md-4">
                <h2>Manage Page <small>Page List</small></h2>
                </div>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="header">
                          <span class="header_span">Page List</span>
                          <div class="col-lg-3 col-md-3 col-sm-3 col-12 pull-right">                            
                                <div class="row clearfix col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 pull-right">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 pull-right">
                                        
                                    </div>
                                </div> 
                            </div>
                        </div>                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered  table-responsive table-striped table-hover table-condensed js-basic-example dataTable">
                                  <thead class="bg-teal">
                                  <tr>
                                    <th>S.no.</th>
                                    <th>Slug</th>
                                    <th>Title</th>
                                    <th>Controller</th>
                                    <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php $i=1; foreach($page_list as $page) { ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><strong><?php echo $page->slug;?></strong></td>
                                        <td><?php echo $page->page_title;?></td>
                                        <td><?php echo $page->controller;?></td>
                                        <td>
                                            <a href="<?php echo base_url()?>index.php/admin_manage_page/edit_page/<?php echo $page->id;?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                        </td>
                                     </tr>
                                    <?php $i++; } ?>                
                                  </tbody>          
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

        </div>
    </section>
<script>
    $("#checkAll").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });


    function delete_content()
    {
        var favorite = [];
        $.each($("input[name='check']:checked"), function(){
            favorite.push($(this).val());
        });

        var value=favorite;
        if(value=="")
        {
            alert('Please Select A Coupon..!');
        }
        else
        {
            $.ajax(
                {
                    type: "POST",
                    //dataType:'json',
                    url:"<?php echo base_url(); ?>admin_content/delete_multiple_content",
                    data: {id:value},
                    async: false,
                    success: function(data)
                    {
                        //alert('Seleted datas are deleted.');
                        location.reload();
                    }
                });
        }

    }
</script>