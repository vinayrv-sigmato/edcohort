$(document).ready(function(){
    var url=base_url+'getOrderAjax?page='; 
    pagination(url);
   
    //alert(base_url); 
    $('#pagination-div-id a').each(function () {
        var a=$(this).attr("href");
        $(this).attr("onclick",'pagination("'+a+'")');
        $(this).attr("href","javascript:void(0)");
    }); 
    $('#form_order input').change(function() {
        
       //submitForm();       
    });
});
function submitForm() {
    var url=base_url+'getOrderAjax?page=';    
    loadMoreData(url);
}
function pagination(argument) {  
    loadMoreData(argument);
}
 $(function () {
    $("#checkAll").click(function () {
        if ($("#checkAll").is(':checked')) {
            $(".tr_checkbox").prop("checked", true);
        } else {
            $(".tr_checkbox").prop("checked", false);
        }
    });
});

    function loadMoreData(url_data){ 
        var per_page=$("#per_page").val();
        var value_form = $('#form_order').serialize()+'&'+$.param({ "per_page": per_page});
      
        $.ajax({
            url: url_data,
            dataType: 'json',
            type: 'get',            
            data: value_form,                                       
            success: function(data){
                
                var details=data.records; 
                var details_length=details.length; 
                var page_link=data.page_link;               
                var total_records=data.total_records;  
                  
                $("#pagination-div-id").html(page_link);
                $('#pagination-div-id a').each(function () {
                    var a=$(this).attr("href");
                    $(this).attr("onclick",'pagination("'+a+'")');
                    $(this).attr("href","javascript:void(0)");
                }); 
                var html='';

                for(i=0;i<details_length;i++) {
                    html +='<div class="panel panel-info radius-flat">';
                    html +='    <div class="col-lg-12 radius-flat bg-dark-gray order-header">';
                    html +='        <div class="col-lg-2 white-text"><p>Order Placed</p> '+moment(details[i].date_added).format('MMM Do YYYY')+' </div>';
                    html +='        <div class="col-lg-2 white-text"><p>Ship To</p> '+details[i].shipping_firstname+' '+details[i].shipping_lastname+'</div>';
                    html +='        <div class="col-lg-2 white-text"><p>Total </p>$ '+Math.round(details[i].total)+'</div>';
                    html +='        <div class="col-lg-3 white-text pull-right">';
                    html +='            <p>Order# '+details[i].order_reference+'</p> ';
                    html +='            <p><a href="'+base_url+'order-details/'+details[i].order_reference+'" class="yellow-text">Order Details</a> </p>'; 
                    html +='        </div>';
                    html +='    </div>';
                    html +='    <div class="clearfix"></div>';
                    html +='    <div class="panel-body">';
                    html +='        <div class="col-lg-9">';
                    html +='            <div class="col-lg-12 size-medium"><strong>'+details[i].order_status+'</strong></div>';
                    html +='            <div class="col-lg-12">Delivery Description</div>';
                    html +='            <div class="col-lg-12">';
                    html +='                <div class="image col-md-4 col-lg-4 col-sm-4 col-xs-12">';
                    html +='              <img src="'+base_url+details[i].image+'" height="80">';
                    html +='          </div>';
                    html +='          <div class="col-lg-8">';
                    html +='            <a href="'+base_url+details[i].product_type+'-details/'+details[i].product_slug+'" target="_blank" > '+details[i].order_product_name+'</a>';
                    html +='            </div>';                    
                    html +='        </div>';
                    html +='        </div>';
                    html +='        <div class="col-lg-3">';
                    html +='            <button class="btn btn-default radius-flat  btn-block">Track Package</button>';
                    if (details[i].order_status!='cancelled'){
                        var product_type="'"+details[i].product_type+"'";
                      html +='<button class="btn btn-danger radius-flat  btn-block" onclick="cancelOrder('+product_type+','+details[i].order_id+')">Cancel Order</button>';
                    }                            
                    html +='</div>';
                    html +='    </div>';
                    html +='  </div>';
                }

                // details.forEach(function(element, index) {
                //     html +=`<div class="panel panel-info radius-flat">
                //         <div class="col-lg-12 radius-flat order-header">
                //             <div class="col-lg-2"><p>Order Placed</p> `+moment(element.date).format('MMM Do YYYY')+` </div>
                //             <div class="col-lg-2"><p>Ship To</p> `+element.shipping_fname+` `+element.shipping_lname+`</div>
                //             <div class="col-lg-2"><p>Total </p>$ `+Math.round(element.total_price)+`</div>
                //             <div class="col-lg-3 pull-right">
                //                 <p>Order# `+element.reference_id+`</p> 
                //                 <p><a href="`+base_url+`order-details/`+element.reference_id+`">Order Details</a> </p> 
                //             </div>
                //         </div>
                //         <div class="clearfix"></div>
                //         <div class="panel-body">
                //             <div class="col-lg-10">
                //                 <div class="col-lg-12 size-medium"><strong>`+element.order_status+`</strong></div>
                //                 <div class="col-lg-12">Delivery Description</div>
                //                 <div class="col-lg-12">
                //                     <div class="image col-md-4 col-lg-4 col-sm-4 col-xs-12">
                //                   <img src="`+base_url+element.image+`" height="80">
                //               </div>
                //               <div class="col-lg-8">
                //                 <a href="`+base_url+element.product_type+`-details/`+element.product_id+`" target="_blank" > `+element.description+`</a>
                //                 </div>                    
                //             </div>
                //             </div>
                //             <div class="col-lg-2">
                //                 <button class="btn btn-default radius-flat  btn-block">Track Package</button>`;
                //             if (element.order_status!='cancelled'){
                //               html +=`<button class="btn btn-danger radius-flat  btn-block" onclick="cancelOrder('`+element.product_type+`','`+element.order_id+`')">Cancel Order</button>`;
                //             }                            
                //     html +=`</div>
                //         </div>
                //       </div>`;
                // });               

                $("#total_records").html('Total orders: '+total_records);
                $("#add_data").html(html);
            },
            beforeSend: function () {
                $("#loadingDiv").show();
                $("#body").addClass('opacity-body');
            },
            complete: function () {
                $("#loadingDiv").fadeOut();
                $("#body").removeClass('opacity-body');
            }    

        });
    }


    