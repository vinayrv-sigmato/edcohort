$(document).ready(function(){ 
    var url=base_url+'admin_diamond_order/loadData?page='; 
    pagination(url);
   
    //alert(base_url); 
    $('#pagination-div-id a').each(function () {
        var a=$(this).attr("href");
        $(this).attr("onclick",'pagination("'+a+'")');
        $(this).attr("href","javascript:void(0)");
    }); 
    $('#form input').change(function() {
       //submitForm();       
    });
});
function submitForm() {
    //$('#filter_status').val('1');    

    var per_page=$("#per_page").val();
    var value_form = $('#form').serialize()+'&'+$.param({ "per_page": per_page});
    var set_url=base_url+'admin_diamond_order?'+value_form;
    window.history.replaceState({url: "" + set_url + ""}, 'targetTitle', set_url);

    var url=base_url+'admin_diamond_order/loadData?page='; 
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
        var value_form = $('#form').serialize()+'&'+$.param({ "per_page": per_page});        
        //console.log(value_form)
        $.ajax({
            url: url_data,
            dataType: 'json',
            type: 'get',            
            data: value_form, 
                                      
            success: function(data){ 
                var details=data.records; 
                var page_link=data.page_link;  
                var total_records=data.total_records;               
                
                $("#pagination-div-id").html(page_link);
                $('#pagination-div-id a').each(function () {
                    var a=$(this).attr("href");
                    $(this).attr("onclick",'pagination("'+a+'")');
                    $(this).attr("href","javascript:void(0)");
                }); 
 
                var html="";
                var details_length=details.length;
               for(i=0;i<details_length;i++) {   
                    if(details[i].date_modified != null){ var date_modified=moment(details[i].date_modified).format('MMM Do YYYY'); }else{ var date_modified=""; }               
                    html +='<tr id="tr_'+details[i].diamond_id+'">';
                    html +='            <td><input type="checkbox" class="multi-chk-complete"  id="basic_'+details[i].order_id+'" name="check" value="'+details[i].order_id+'" />   ';
                    html +='                <label for="basic_'+details[i].diamond_id+'"></label></td>   ';
                    html +='            <td><strong>'+details[i].stock_id+'</strong></td>';
                    html +='            <td>'+details[i].vendor_name+'</td>';
                    html +='            <td>'+details[i].shape+'</td>';
                    html +='            <td>'+details[i].weight+'</td>';
                    html +='            <td>'+details[i].color+'</td>';
                    html +='            <td>'+details[i].grade+'</td>';
                    html +='            <td>'+details[i].cut+'</td>';
                    html +='            <td>'+details[i].polish+'</td>';
                    html +='            <td>'+details[i].symmetry+'</td>';
                    html +='            <td>'+details[i].fluorescence_int+'</td>';
                    html +='            <td>'+details[i].total_price+'</td>';
                    html +='            <td><strong id="status_'+details[i].status+'">'+details[i].status+'</strong></td>';
                    html +='            <td>'+moment(details[i].created_at).format('MMM Do YYYY')+'</td>';
                    // html +='            <td>'+date_modified+'</td>';
                    // html +='            <td>'+details[i].NM_USER_FULLNAME+'</td>';
                    // html +='            <td>';
                    // html +='                <a href="'+base_url+'admin_order/order_details/'+details[i].order_id+'" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i> View</a>';
                    // html +='            </td>';
                    html +='        </tr>';
                }

                // details.forEach(function(element, index) {                  
                //     html +=`<tr id="tr_`+element.order_id+`">
                //                 <td><input type="checkbox" class="multi-chk-complete"  id="basic_`+element.order_id+`" name="check" value="`+element.order_id+`" />   
                //                     <label for="basic_`+element.order_id+`"></label></td>   
                //                 <td><strong>`+element.order_reference+`</strong></td>
                //                 <td>`+element.firstname+` `+element.lastname+`</td>       
                //                 <td><strong id="status_`+element.order_id+`">`+element.order_status+`</strong></td>                                
                //                 <td>`+element.total+`</td>
                //                 <td>`+element.date_added+`</td>
                //                 <td>`+element.date_modified+`</td>
                //                 <td>
                //                     <a href="`+base_url+`admin_order/order_details/`+element.order_id+`" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i> View</a>
                //                 </td>
                //             </tr>`;
                // });
                //alert(html);
                $('#example').dataTable().fnDestroy();

                $("#total_records").html(total_records);
                $("#add_data").html(html);

                $('#example').DataTable({
                    "retrieve": true,
                    "autoWidth": false ,
                    "scrollY": '600',
                    "scrollX": true,
                    "ordering": true,
                    "paging": false,
                    "searching": false,
                    "info": false,
                    "order": []
                });
        
            },
            beforeSend: function () {
                $(".page-loader-wrapper").show();                
            },
            complete: function () {
                $('.page-loader-wrapper').fadeOut();
            }
        });
    }
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   
function setAction()
{
    var checkboxArr=[];
    var action =$("#action").val();
    $("input[class='multi-chk-complete']:checked").each( function()
    {
        checkboxArr.push($(this).val());
    });     

    if(!checkboxArr.length)
    {
        alert_boot("Please Select Record!");
    }
    else if(action=="")
    {
        alert_boot("Please Select Action!");
    }
    else 
    {
        alertify.confirm(
            siteName, 
            'Are you sure ?', 
            function(evt, value)
            {                             
                $.ajax({
                    url: base_url+'admin_diamond_order/action',
                    dataType: 'json',
                    type: 'post',            
                    data: { "id": checkboxArr, action: action},                                         
                    success: function(data){
                        checkboxArr.forEach(function(element,index) {        
                            if(action=='delete') 
                            {
                                $("#tr_"+element).remove();
                            } 
                            else 
                            {
                                $("#status_"+element).html(action);
                            }                      
                            
                        });                            
                    } 
                });                          
            }
            ,function(){ 
         });
    }

}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$(document).ready(function () {
    $("#filter_name").autocomplete({
      source: function(request,response){
        var url=base_url+'admin_product/loadFilter'; 
        $.ajax({
            url: url,
            dataType: "json",
            data: {
                searchText: request.term,
                select: 'product_name'
            },
            success: function (data) {
                response($.map(data.list, function (item) {
                    return {
                        label: item.product_name
                    };
                }));
            }
        });
      },
      minLength: 2,
      select: function(event,ui){
        //log("Selected: "+ui.item.value+" aka "+ ui.item.id);
      }
    });
});

$(document).ready(function () {
    $("#filter_model").autocomplete({
      source: function(request,response){
        var url=base_url+'admin_product/loadFilter'; 
        $.ajax({
            url: url,
            dataType: "json",
            data: {
                searchText: request.term,
                select: 'product_model'
            },
            success: function (data) {
                response($.map(data.list, function (item) {
                    return {
                        label: item.product_model
                    };
                }));
            }
        });
      },
      minLength: 2
    });
});


$(document).ready(function () {
$("#filter_sku").autocomplete({
  source: function(request,response){
    var url=base_url+'admin_product/loadFilter'; 
    $.ajax({
        url: url,
        dataType: "json",
        data: {
            searchText: request.term,
            select: 'product_sku'
        },
        success: function (data) {
            response($.map(data.list, function (item) {                
                return {
                        label: item.product_sku
                    };
            }));
        }
    });
  },
      minLength: 2
    });
});



    