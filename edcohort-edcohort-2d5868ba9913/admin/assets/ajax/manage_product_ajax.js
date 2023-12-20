$(document).ready(function(){ 
    var url=base_url+'admin_product/loadData?page='; 
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
    var set_url=base_url+'admin_product?'+value_form;
    window.history.replaceState({url: "" + set_url + ""}, 'targetTitle', set_url);

    var url=base_url+'admin_product/loadData?page='; 
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
                if(details[i].SN_CREATED_BY =='1'){ var SN_CREATED_BY='SELF'; }else{ var SN_CREATED_BY=details[i].NM_USER_FULLNAME; }  
                if(details[i].product_sale_price > 0){ var price_sale='<strike>$'+details[i].product_price+'</strike>' }else{ price_sale=""; }
                if(details[i].product_is_price=='0'){ var product_is_price='<span class="label label-info pull-right" title="Show Price Disabled">P</span>' }else{ var product_is_price='' }
                if(details[i].product_is_get_quote=='1'){ var product_is_get_quote='<span class="label label-danger pull-right" title="Get Quote Enabled">Q</span>' }else{ var product_is_get_quote='' }
                 
                if(details[i].product_sale_allow=='yes'){ var sale='sale' }else{ sale=""; }          
                    html +='<tr id="tr_'+details[i].product_id+'">';
                    html +='    <td><input type="checkbox" class="multi-chk-complete"  id="basic_'+details[i].product_id+'" name="check" value="'+details[i].product_id+'" />   ';
                    html +='        <label for="basic_'+details[i].product_id+'"></label></td>                                                                   ';
                    html +='    <td><a href="'+base_url+'../jewelry-details/'+details[i].product_slug+'" target="_blank">';
                    html +='    <strong>'+details[i].product_name+'</strong></a><span class="label label-warning pull-right" id="sale_status_'+details[i].product_id+'">'+sale+'</span></td>';
                    html +='    <td>'+details[i].product_category_show+'</td>';
                    html +='    <td>'+details[i].product_sku+'</td>';
                    //html +='    <td>'+details[i].product_model+'</td>';
                    html +='    <td>'+price_sale+' '+details[i].product_price_show+' '+product_is_price+' '+product_is_get_quote+'</td>';
                    //html +='    <td><span class="label label-success">'+details[i].product_quantity+'</span></td>';
                    html +='    <td><span class="badge label-primary">'+details[i].product_view+'</span></td>';
                    html +='    <td><span class="badge label-primary">'+details[i].product_sort+'</span></td>';
                    html +='    <td><strong id="status_'+details[i].product_id+'">'+details[i].product_status+'</strong></td>';
                    //html +='    <td>'+SN_CREATED_BY+'</td>';
                    html +='    <td>';
                    html +='        <a href="'+base_url+'admin_product/edit_product/'+details[i].product_id+'" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>';
                    html +='    </td>';
                    html +='</tr>';
                }

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
function delete_product()
{
    var checkboxArr=[];
    var action =$("#action").val();
    $("input[class='multi-chk-complete']:checked").each( function()
    {
        checkboxArr.push($(this).val());
    });     

    if(!checkboxArr.length)
    {
        alert_boot("Please Select Product!");
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
                    url: base_url+'admin_product/product_action',
                    dataType: 'json',
                    type: 'post',            
                    data: { "product_id": checkboxArr, action: action},                                         
                    success: function(data){
                        checkboxArr.forEach(function(element,index) {        
                            if(action=='delete') 
                            {
                                $("#tr_"+element).remove();
                            } 
                            else if(action=='active' || action=='inactive' ) 
                            {
                                $("#status_"+element).html(action);
                            }
                            else if(action=='sale') 
                            {
                                $("#sale_status_"+element).html(action);
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



    