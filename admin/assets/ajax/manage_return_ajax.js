$(document).ready(function(){ 
    var url=base_url+'admin_return/loadData?page='; 
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
    var set_url=base_url+'admin_return?'+value_form;
    window.history.replaceState({url: "" + set_url + ""}, 'targetTitle', set_url);

    var url=base_url+'admin_return/loadData?page='; 
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
                    html +='<tr id="tr_'+details[i].return_id+'">';
                     html +='            <td><input type="checkbox" class="multi-chk-complete"  id="basic_'+details[i].return_id+'" name="check" value="'+details[i].return_id+'" />   ';
                     html +='                <label for="basic_'+details[i].return_id+'"></label></td>   ';
                     html +='            <td><strong>'+details[i].return_id+'</strong></td>';
                     html +='            <td><strong>'+details[i].order_id+'</strong></td>';
                     html +='            <td>'+details[i].firstname+' '+details[i].lastname+'</td>  ';
                     html +='            <td><strong>'+details[i].product+'</strong></td>     ';
                     html +='            <td><strong>'+details[i].model+'</strong></td>     ';
                     html +='            <td><strong id="status_'+details[i].return_id+'">'+details[i].return_status+'</strong></td>';
                     html +='            <td>'+details[i].date_added+'</td>';
                     html +='            <td>'+details[i].date_modified+'</td>';
                     html +='            <td>';
                     html +='                <a href="'+base_url+'admin_return/return_details/'+details[i].return_id+'" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i> View</a>';
                     html +='            </td>';
                     html +='        </tr>';
                }

                // details.forEach(function(element, index) {                  
                //     html +=`<tr id="tr_`+element.return_id+`">
                //                 <td><input type="checkbox" class="multi-chk-complete"  id="basic_`+element.return_id+`" name="check" value="`+element.return_id+`" />   
                //                     <label for="basic_`+element.return_id+`"></label></td>   
                //                 <td><strong>`+element.return_id+`</strong></td>
                //                 <td><strong>`+element.order_id+`</strong></td>
                //                 <td>`+element.firstname+` `+element.lastname+`</td>  
                //                 <td><strong>`+element.product+`</strong></td>     
                //                 <td><strong>`+element.model+`</strong></td>     
                //                 <td><strong id="status_`+element.return_id+`">`+element.return_status+`</strong></td>           
                //                 <td>`+element.date_added+`</td>
                //                 <td>`+element.date_modified+`</td>
                //                 <td>
                //                     <a href="`+base_url+`admin_return/return_details/`+element.return_id+`" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i> View</a>
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
                    url: base_url+'admin_return/action',
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
    $("#filter_product").autocomplete({
      source: function(request,response){
        var url=base_url+'admin_return/loadFilter'; 
        $.ajax({
            url: url,
            dataType: "json",
            data: {
                searchText: request.term,
                select: 'product'
            },
            success: function (data) {
                response($.map(data.list, function (item) {
                    return {
                        label: item.product
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
        var url=base_url+'admin_return/loadFilter'; 
        $.ajax({
            url: url,
            dataType: "json",
            data: {
                searchText: request.term,
                select: 'model'
            },
            success: function (data) {
                response($.map(data.list, function (item) {
                    return {
                        label: item.model
                    };
                }));
            }
        });
      },
      minLength: 2
    });
});


$(document).ready(function () {
$("#filter_customer").autocomplete({
  source: function(request,response){
    var url=base_url+'admin_return/loadFilter'; 
    $.ajax({
        url: url,
        dataType: "json",
        data: {
            searchText: request.term,
            select: 'firstname'
        },
        success: function (data) {
            response($.map(data.list, function (item) {                
                return {
                        label: item.firstname
                    };
            }));
        }
    });
  },
      minLength: 2
    });
});



    