    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css" />
  <link href="<?php echo base_url(); ?>assets/plugins/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />
 <section class="content">
    <div class="container-fluid">
        <div class="row row-header">
            <div class="col-md-8">
            <h2>Currency <small>Currency List</small></h2>
            </div>
            
        </div>
    <?php message(); ?>
    <?php
      $filter_name=$this->input->get('filter_name');
      $filter_sku=$this->input->get('filter_sku');
      $filter_model=$this->input->get('filter_model');
      $filter_status=$this->input->get('filter_status');
    ?>
        <!-- Basic Examples -->


        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="header">
                        <span class="header_span">Currency (Total: <span id="total_records"></span>)</span>     
                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                          <form action="" id="per_page_form">
                          <span>Show <select name="per_page" id="per_page" class="" onchange="submitForm()">
                            <option value="10" >10</option>
                            <option value="20" >20</option>
                            <option value="30" >30</option>
                            <option value="50" >50</option>
                            <option value="100" selected>100</option>
                            <option value="200" >200</option>
                            <option value="500" >500</option>
                        </select> entries</span></form>
                        </div>                    
                        <div class="col-lg-3 col-md-3 col-sm-3 col-12 pull-right">
                            <form class="form-inline" action="javascript:void(0)" method="post">
                                <div class="row clearfix col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="action" id="action">
                                                    <option value="">Select Action</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                    <option value="delete">Delete</option>
                                                </select>                            
                                            </div>      
                                            <input type="hidden" name="product_id" id="product_id" value="">                                     
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3">
                                        <button class="btn bg-red btn-sm" type="button" onclick="delete_product()"> Submit</button>
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
                                <th>Title</th>
                                <th>Value</th>                                
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
<script src="<?php echo base_url(); ?>assets/ajax/manage_currency_ajax.js"></script>
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
<script src="<?php echo base_url(); ?>assets/plugins/ion-rangeslider/js/ion.rangeSlider.js"></script>

 <script>
  var price_value=[0,1,3,5,7,10,30,40,50,60,70,80,90,100,150,200,283,300,350,400,450,500,550,600,650,700,750,800,850,900,950,1000,1050,1100,1150,1200,1300,1400,1500,1600,1700,1800,1900,2000,2100,2200,2300,2400,2500,2600,2700,2800,2900,3000,3100,3200,3300,3400,3500,3600,3700,3800,3900,4000,4100,4200,4300,4400,4500,4600,4700,4800,4900,5000,5100,5200,5300,5400,5500,5600,5700,5800,5900,6000,6100,6200,6300,6400,6500,6600,6700,6800,6900,7000,7100,7200,7300,7400,7500,7600,7700,7800,7900,8000,8100,8200,8300,8400,8500,8600,8700,8800,8900,9000,9100,9200,9300,9400,9500,9600,9700,9800,9900,10000,10100,10200,10300,10400,10500,10600,10700,10800,10900,11000,11100,11200,11300,11400,11500,11600,11700,11800,11900,12000,12500,13000,13500,14000,14500,15000,15500,16000,16500,17000,17500,18000,18500,19000,19500,20000,20500,21000,21500,22000,22500,23000,23500,24000,25000,26000,27000,28000,29000,30000,31000,32000,33000,34000,35000,36000,37000,38000,39000,40000,45000,50000,55000,60000,65000,70000,75000,80000,85000,90000,95000,100000,150000,200000,250000,300000,350000,400000,450000,500000,600000,700000,800000,900000,1000000];

  function find_range(range_from,range_to)
  {
      var array=[];
      from_index = price_value.indexOf(range_from);
      to_index = price_value.indexOf(range_to);
      for (i=from_index; i <= to_index; i++) { 
          array.push(price_value[i]);
      }
      price_value=array;  

      // $('#range_55_input_from').val(range_from);
      // $('#range_55_input_to').val(range_to);

      return array;          
  }

 </script>
<script>
    $(document).ready(function () {
    /////////////////Price ///////////////////////////
        var from_price = 0;
        var to_price = 1000000; 
        var price_value1 = [parseInt(from_price),parseInt(to_price)];  
        var price_value2 = price_value.concat(price_value1);
        price_value2.sort(function(a, b){return a-b});
        //console.log(price_value2);
        from_price = price_value2.indexOf(parseInt(from_price));
        to_price = price_value2.indexOf(parseInt(to_price));


    $("#range_55").ionRangeSlider({
        type: "double",
        from: from_price,
        to: to_price,
        values : price_value2,
        onStart: function (data){
            from_value = data.from_value;
            to_value = data.to_value;    
            $('#range_55_input_from').val(from_value);
            $('#range_55_input_to').val(to_value);
        },
        onChange:  function (data){
      
            from_value = data.from_value;
            to_value = data.to_value;    
            $('#range_55_input_from').val(from_value);
            $('#range_55_input_to').val(to_value);        
        },
        onFinish:  function (data) {
          //submitForm();
            //console.log(data);
        },
        onUpdate:  function (data) {
           //submitForm();
        }
    });
    var slider_range_55 = $("#range_55").data("ionRangeSlider");
    setSliderFromTo = function() {

    var from=$('#range_55_input_from').val();

    var to=$('#range_55_input_to').val();

    var price_value1 = [from,to];  
    var price_value2 = price_value.concat(price_value1);
        price_value2.sort(function(a, b){return a-b});  

        from = price_value2.indexOf(from);
        to = price_value2.indexOf(to);

        slider_range_55.update({
            min: 0,
            max: 100,
            from: from,
            to: to,
            values : price_value2
        });
    };
});
</script>