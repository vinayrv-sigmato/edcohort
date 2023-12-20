$(document).ready(function(){ 
    var url=base_url+'admin_product/loadReviews?page='; 
    pagination(url);
   
    //alert(base_url); 
    $('#pagination-div-id a').each(function () {
        var a=$(this).attr("href");
        $(this).attr("onclick",'pagination("'+a+'")');
        $(this).attr("href","javascript:void(0)");
    }); 

});
function submitForm() {
    //$('#filter_status').val('1');    

    var per_page=$("#per_page").val();
    var value_form = $('#form').serialize()+'&'+$.param({ "per_page": per_page});
    var set_url=base_url+'admin_product?'+value_form;
    window.history.replaceState({url: "" + set_url + ""}, 'targetTitle', set_url);

    var url=base_url+'admin_product/loadReviews?page='; 
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
                         
                    html +='<tr id="tr_'+details[i].product_review_id+'">';
                    html +='            <td><input type="checkbox" class="multi-chk-complete"  id="basic_'+details[i].product_review_id+'" name="check" value="'+details[i].product_review_id+'" />   ';
                    html +='                <label for="basic_'+details[i].product_review_id+'"></label></td> ';
                    html +='            <td><a target="_blank" href="'+base_url+'admin_customer/customer_details/'+details[i].user_id+'">'+details[i].firstname+' '+details[i].lastname+'</a></td>';
                    html +='            <td><a target="_blank" href="'+base_url+'admin_product/edit_product/'+details[i].product_id+'">'+details[i].product_name+'</a></td>';
                    html +='            <td><strong>'+details[i].product_rating+' Star</strong></td>';
                    html +='            <td>'+details[i].product_review_title+'</td>';
                    html +='            <td><textarea cols="80" readonly>'+details[i].product_review+'</textarea></td>';
                    html +='            <td>'+details[i].product_review_added+'</td>';                    
                    html +='            <td><strong id="status_'+details[i].product_review_id+'">'+details[i].status+'</strong></td>';                    

                    html +='        </tr>';

                }

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
function delete_review()
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
                    url: base_url+'admin_product/review_action',
                    dataType: 'json',
                    type: 'post',            
                    data: { "product_review_id": checkboxArr, action: action},                                         
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



    