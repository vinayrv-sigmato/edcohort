$(document).ready(function(){ 
    var url=base_url+'admin_subscribe/loadData?page='; 
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
    var set_url=base_url+'admin_subscribe?'+value_form;
    window.history.replaceState({url: "" + set_url + ""}, 'targetTitle', set_url);

    var url=base_url+'admin_subscribe/loadData?page='; 
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
                if(details[i].status=='1'){ status='Active'; }else{ status='Inactive'; }                
                if(details[i].date_edited!=null){ date_edited=moment(details[i].date_edited).format('MMM Do YYYY'); }else{ date_edited=''; }               
                    html +='<tr id="tr_'+details[i].id+'">';
                    html +='            <td><input type="checkbox" class="multi-chk-complete"  id="basic_'+details[i].id+'" name="check" value="'+details[i].id+'" />';   
                    html +='                <label for="basic_'+details[i].id+'"></label></td>';   
                    html +='            <td><strong>'+details[i].email+'</strong></td>';                                                      
                    html +='            <td>'+status+'</td>';                    
                    html +='            <td>'+moment(details[i].date_added).format('MMM Do YYYY')+'</td>';         
                    // html +='            <td>'+details[i].stock_name+'</td>';
                    // html +='            <td>'+details[i].vendor_name+'</td>';
                    // html +='            <td>'+details[i].vendor_mobile+'</td>';
                    // html +='            <td>'+details[i].vendor_email+'</td>';
                   // html +='            <td>';
                   // html +='                <a href="'+base_url+'admin_customer/customer_details/'+details[i].customer_id+'" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i> View</a>';
                   // html +='            </td>';
                    html +='        </tr>';
                }

               
               // alert(html);
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
    if(action=='1')
    {
        action='active';
    }
    else if(action=='0')
    {
        action='inactive';
    }
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
       // alert();
        alertify.confirm(
            siteName, 
            'Are you sure ?', 
            function(evt, value)
            {                             
                $.ajax({
                    url: base_url+'admin_subscribe/action',
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



    