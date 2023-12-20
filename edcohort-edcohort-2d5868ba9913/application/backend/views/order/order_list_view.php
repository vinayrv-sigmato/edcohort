    <!-- Range Slider Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />

 <section class="content">
    <div class="container-fluid">
        <div class="row row-header">
            <div class="col-md-8">
            <h2>Order <small>Order List</small></h2>
            </div>
            <div class="col-md-4">
                <h2><a class="btn bg-pink waves-effect m-b-15 collapsed" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-filter"></i> Filter
                </a></h2>
            </div>
        </div>
        <?php message(); ?>
    <?php
      $filter_order_id=$this->input->get('filter_order_id');
      $filter_customer=$this->input->get('filter_customer');
      $filter_order_status=$this->input->get('filter_order_status');
      $filter_total=$this->input->get('filter_total');
    ?>
        <!-- Basic Examples -->
<div class="row collapse" id="collapseExample" aria-expanded="false">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="body ">
                <form id="form">
                <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Order ID </label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input name="filter_order_id" id="filter_order_id" value="<?php echo  $filter_order_id; ?>" class="form-control">                                                            
                            </div>                                           
                        </div>
                    </div>
                </div> 

                <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Customer </label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input name="filter_customer" id="filter_customer" value="<?php echo  $filter_customer; ?>"  class="form-control">                              
                            </div>                                           
                        </div>
                    </div>
                </div>

                <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Order Status </label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control" name="filter_order_status" id="filter_order_status">
                                    <option value="" >Select</option>
                                    <?php foreach ($filter_order_status_list as $fos_row): ?>
                                        <option value="<?php echo $fos_row->name; ?>" <?php if($filter_order_status==$fos_row->name){ echo "selected";} ?>><?php echo $fos_row->name; ?></option>
                                    <?php endforeach ?>
                                </select>                            
                            </div>                                           
                        </div>
                    </div>
                </div>
                <div class="row clearfix col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 form-control-label">
                        <label for="">Total Price</label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input name="filter_total" id="filter_total" value=""  class="">                           
                            </div>                                           
                        </div>
                    </div>
                </div>
                <div class="row clearfix col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="col-lg-offset-8 col-md-offset-8 col-sm-offset-8 col-lg-2 col-md-2 col-sm-2 col-xs-6">                        
                        <button type="button" class="btn bg-teal btn-block waves-effect" onclick="submitForm()"><i class="material-icons">search</i><span>SEARCH</span></button>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">                        
                        <a href="<?php echo base_url() ?>admin_order" class="btn bg-red btn-block waves-effect" ><i class="material-icons">refresh</i><span>RESET</span></a>
                    </div>
                </div>

                <div class="row clearfix"></div>               
                </form>
            </div>
        </div>
    </div>
</div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="header">
                        <span class="header_span">Order List</span>
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-12 pull-right">
                            <form class="form-inline" action="<?php echo base_url(); ?>/admin_product/product_action" method="post">
                                <div class="row clearfix col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="action" id="action">
                                                    <option value="">Select Action</option>
                                                        <?php foreach ($filter_order_status_list as $fos_row): ?>
                                                            <option value="<?php echo $fos_row->name; ?>" ><?php echo $fos_row->name; ?></option>
                                                        <?php endforeach ?>
                                                </select>                            
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3">
                                        <button class="btn bg-red btn-sm" type="button" onclick="setAction()"> Submit</button>
                                    </div>
                                </div>                            
                            </form>
                        </div>  
                                                    
                    </div> 
                                         
                    <div class="body">
                        <div class="table-responsive1">
                            <table id="example" class="table table-bordered table-responsive table-striped table-hover table-condensed js-basic-example1 dataTable">
                              <thead class="bg-teal">
                              <tr>
                                <th><input type="checkbox" id="selectall" name="checkAll" onclick="checkAll(this.checked)">
                                    <label for="selectall"></label>
                                </th>
                                <th>Order Id</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Total Price</th>
                                <th>Date Added</th>
                                <th>Date Modified</th>
                                <th>Vendor</th>
                                <th>Action</th>
                              </tr>
                              </thead>
                              <tbody id="add_data">
                                             
                              </tbody>          
                            </table>
                        </div>
                        <div id="pagination-div-id"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>


<!-- Custom JS -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/ajax/manage_order_ajax.js"></script>
<script type="text/javascript">
    function checkAll(chk)
    {
        if(chk==true)
        {
          $('.multi-chk-complete').each(function() {
              this.checked = true;
          });
        }
        else
        {
          $('.multi-chk-complete').each(function() {
              this.checked = false;
          });
        }
    }
</script>

    <!-- RangeSlider Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/ion-rangeslider/js/ion.rangeSlider.js"></script>
<script>
var parseQueryString = function(url) {
  var urlParams = {};
  url.replace(
    new RegExp("([^?=&]+)(=([^&]*))?", "g"),
    function($0, $1, $2, $3) {
      urlParams[$1] = $3;
    });  
    return urlParams;
}

var result_url;
var urlToParse='';
$(document).ready(function () {
     urlToParse = location.search;  
     result_url = parseQueryString(urlToParse );      
});
/////////////////Price ///////////////////////////
var price_value=[0,1,3,5,7,10,30,40,50,60,70,80,90,100,150,200,283,300,350,400,450,500,550,600,650,700,750,800,850,900,950,1000,1050,1100,1150,1200,1300,1400,1500,1600,1700,1800,1900,2000,2100,2200,2300,2400,2500,2600,2700,2800,2900,3000,3100,3200,3300,3400,3500,3600,3700,3800,3900,4000,4100,4200,4300,4400,4500,4600,4700,4800,4900,5000,5100,5200,5300,5400,5500,5600,5700,5800,5900,6000,6100,6200,6300,6400,6500,6600,6700,6800,6900,7000,7100,7200,7300,7400,7500,7600,7700,7800,7900,8000,8100,8200,8300,8400,8500,8600,8700,8800,8900,9000,9100,9200,9300,9400,9500,9600,9700,9800,9900,10000,10100,10200,10300,10400,10500,10600,10700,10800,10900,11000,11100,11200,11300,11400,11500,11600,11700,11800,11900,12000,12500,13000,13500,14000,14500,15000,15500,16000,16500,17000,17500,18000,18500,19000,19500,20000,20500,21000,21500,22000,22500,23000,23500,24000,25000,26000,27000,28000,29000,30000,31000,32000,33000,34000,35000,36000,37000,38000,39000,40000,45000,50000,55000,60000,65000,70000,75000,80000,85000,90000,95000,100000,150000,200000,250000,300000,350000,400000,450000,500000,600000,700000,800000,900000,1000000];
$(document).ready(function () {
var from_price = 0;
var to_price = 1000000; 

if(urlToParse.length){
  var price_url=result_url.filter_total;
  var price_url=price_url.split('%3B');
  if(price_url[1]!="")
  {
    from_price = price_url[0];
    to_price = price_url[1]; 
  }
}
var price_value1 = [parseInt(from_price),parseInt(to_price)];  
var price_value2 = price_value.concat(price_value1);
price_value2.sort(function(a, b){return a-b});
//console.log(price_value2);
from_price = price_value2.indexOf(parseInt(from_price));
to_price = price_value2.indexOf(parseInt(to_price));

$("#filter_total").ionRangeSlider({
    type: "double",
    from: from_price,
    to: to_price,
    values : price_value2,
    onStart: function (data){
        from_value = data.from_value;
        to_value = data.to_value;    
        //$('#filter_total_input_from').val(from_value);
        //$('#filter_total_input_to').val(to_value);
        $('#filter_total').val(from_value+';'+to_value);
    },
    onChange:  function (data){
  
        from_value = data.from_value;
        to_value = data.to_value;    
        //$('#filter_total_input_from').val(from_value);
        //$('#filter_total_input_to').val(to_value);  
        $('#filter_total').val(from_value+';'+to_value);      
    },
    onFinish:  function (data) {
      //submitForm();
    },
    onUpdate:  function (data) {
       //submitForm();
    }
});
var slider_filter_total = $("#filter_total").data("ionRangeSlider");
setSliderFromTo = function() {

var from=$('#filter_total_input_from').val();

var to=$('#filter_total_input_to').val();

var price_value1 = [from,to];  
var price_value2 = price_value.concat(price_value1);
    price_value2.sort(function(a, b){return a-b});  

    from = price_value2.indexOf(from);
    to = price_value2.indexOf(to);

    slider_filter_total.update({
        min: 0,
        max: 100,
        from: from,
        to: to,
        values : price_value2
    });
};

});
</script>





