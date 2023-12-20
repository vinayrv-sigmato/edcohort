$(document).ready(function(){
    var url=base_url+'load-more-match-diamond'; 
    pagination(url);
   
    //alert(base_url); 
    $('#pagination-div-id a').each(function () {
        var a=$(this).attr("href");
        $(this).attr("onclick",'pagination("'+a+'")');
        $(this).attr("href","javascript:void(0)");
    }); 
});
function submitForm() {
    // $("#loadingDiv").show();
    // $("#body").addClass('opacity-body');

    // $("#total_records").html('0');    
    // $('#example').dataTable().fnClearTable();
    // $("#per_page").val('200');
    // $("#page").val('0');

    var checkbox_arr = [];
        $.each($("input[name='checkbox[]']:checked"), function(){            
            checkbox_arr.push($(this).val());
    });
    var checkbox_str=checkbox_arr.toString();

    var cert_arr = [];
        $.each($("input[name='cert[]']:checked"), function(){            
            cert_arr.push($(this).val());
    });
    var cert_str=cert_arr.toString();
    //console.log(cert_str);

	/*var per_page=$("#per_page").val();
    var value_form = $('#form').serialize()+'&'+$('#form1').serialize()+'&'+$.param({ "per_page": per_page});
    var set_url=base_url+'match-diamond?'+value_form+'&'+$.param({ "shape": checkbox_str,"certificate": cert_str});
    window.history.replaceState({url: "" + set_url + ""}, 'targetTitle', set_url);*/

    var url=base_url+'load-more-match-diamond'; 
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

// $(window).scroll(function() {
//         if($(window).scrollTop() + $(window).height() >= $(document).height()) {
//             var per_page=$("#per_page").val();
//             var page=$("#page").val();
//             $("#page").val(parseInt(page)+parseInt(per_page));                    
//             var url=base_url+'load-more-match-diamond';             
//             loadMoreData(url);
//         }
//     });

function isEven(n) {
   return n % 2 == 0;
}
function isOdd(n) {
   return Math.abs(n % 2) == 1;
}
    function loadMoreData(url_data){        
        //var range_59=parseFloat($("input[name='total_size']").val());
        var total_records=0;      
        var total_count=0; 
        var records_count=0;
        var per_page=$("#per_page").val();
        var page=$("#page").val();
        var value_form = $('#form').serialize()+'&'+$('#form1').serialize()+'&'+$.param({ "per_page": per_page});
      
        //alert(page);
        $.ajax({
            url: url_data,
            dataType: 'json',
            type: 'post',            
            data: value_form, 
                                      
            success: function(data){                
                //alert(base_url);
                var compare_session=$("#compare_session").val();
                var text_color="";
                var compare_title="Add To Compare";
                var details=data.records;  
                var page_link=data.page_link;  
                 total_records=data.total_records;      
                 total_count=data.total_count; 
                var isLogin=data.isLogin;             
                
                $("#pagination-div-id").html(page_link);
                $('#pagination-div-id a').each(function () {
                    var a=$(this).attr("href");
                    $(this).attr("onclick",'pagination("'+a+'")');
                    $(this).attr("href","javascript:void(0)");
                }); 
 
                var html="";
                var details_length=details.length;

                for(i=0;i<details_length;i++)
                { 
                    var tr_color ='';
                    if(isEven(i)){ 
                        tr_color ='tr_color_even'; 
                    }
                    else{
                        tr_color ='tr_color_odd';
                    }
                    var object = details[i]; 
                    for(var j=0;j<object.length;j++)
                    {   
                        if(compare_session.search(object[j].diamond_id)>=0){
                            text_color="text-red";
                            compare_title="Remove From Compare"
                        }else{
                            text_color="";
                            compare_title="Add To Compare";
                        }                                            
                        var stock_id = (object[j].stock_id) ? object[j].stock_id : '';
                        var shape = (object[j].shape) ? object[j].shape : '';
                        var weight = (object[j].weight) ? parseFloat(object[j].weight).toFixed(2) : '';
                        var color = (object[j].color) ? object[j].color : '';
                        var grade = (object[j].grade) ? object[j].grade : '';
                        var cut = (object[j].cut) ? object[j].cut : '';
                        var polish = (object[j].polish) ? object[j].polish : '';
                        var symmetry = (object[j].symmetry) ? object[j].symmetry : '';
                        var fluorescence_int = (object[j].fluorescence_int) ? object[j].fluorescence_int : '';
                        var depth = (object[j].depth) ? parseFloat(object[j].depth).toFixed(1) : '';   
                        var table_d = (object[j].table_d) ? parseInt(object[j].table_d) : '';
                        var rapnet = (object[j].rapnet) ? '$' + Math.round(object[j].rapnet) : '';                       
                        var rapnet_discount = (object[j].rapnet_discount) ? parseFloat(object[j].rapnet_discount).toFixed(1) + '%' : '';
                        var cost_carat = (object[j].cost_carat) ? '$' + Math.round(object[j].cost_carat) : '';
                        var total_price = (object[j].total_price) ? '$' + Math.round(object[j].total_price) : '';
                        var lab = (object[j].lab) ? object[j].lab : '';
                        var measurements = (object[j].measurements) ? object[j].measurements : '';
                        var a= "'"+object[j].diamond_id+"'";   

                        html +='<tr style="font-size:12px; font-weight:bold;" class="'+tr_color+'" id="tr_'+object[j].diamond_id+'">';
                        html +='    <td>';
                        html +='        <input type="checkbox" name="checkbox_record[]" id="" value="'+object[j].diamond_id+'" class="tr_checkbox">';
                        html +='    </td>';                    
                        html +='    <td>';                     
                        html +='        <a href="'+base_url+'diamond-details/'+stock_id+'">';                  
                        html +='        <i class="fa fa-search-plus"  title="View details" data-toggle="tooltip" data-placement="right"></i>';
                        html +='        </a>';
                        html +='        <a href="javascript:void(0)" onclick="add_compare('+object[j].diamond_id+')" ><i class="fa fa-exchange '+text_color+'" title="'+compare_title+'" id="fa_compare_'+details[i].diamond_id+'" data-toggle="tooltip" data-placement="right" aria-hidden="true"></i></a>';
                        html +='    </td>';   
                        html +='    <td>'+stock_id +'</td>';
                        html +='    <td>'+shape +'</td>';
                        html +='    <td>'+weight+' </td>';                       
                        html +='    <td>'+color+' </td>';
                        html +='    <td>'+grade+' </td>';
                        html +='    <td>'+cut+' </td>';
                        html +='    <td>'+polish+' </td>';
                        html +='    <td>'+symmetry+'</td>';
                        html +='    <td>'+fluorescence_int+'</td>';
                        html +='    <td>'+depth+'</td>';
                        html +='    <td>'+table_d+'</td>';
                        if(isLogin) {                        
                            html +='    <td>'+rapnet_discount+'</td>';
                            html +='    <td>'+rapnet+'</td>  ';
                            html +='    <td>'+cost_carat+'</td>';
                            html +='    <td>'+total_price+'</td>';
                        } else {
                            html +='    <td>*****</td>';
                            html +='    <td>*****</td>';
                            html +='    <td>*****</td>';
                            html +='    <td>*****</td>';
                        }                      
                        html +='    <td>'+lab+'</td>';                        
                        html +='    <td>'+measurements+'</td>';                   
                        html +='</tr>';
                    }
                }
                
                $('#example').dataTable().fnDestroy();

                $("#total_records").html(total_records);
                $("#add_data").html(html);

                $('#example').DataTable({                    
                    "retrieve": true,
                    "autoWidth": false,               
                    "scrollY": '800',   
                    "scrollX": true,
                    "ordering": false,
                    "paging": false,
                    "searching": false,
                    "info": false,                                    
                });                        
            },
            beforeSend: function () {
                $("#page-loader").show();
            },
            complete: function () {
                $("#page-loader").fadeOut();
                $('[data-toggle="tooltip"]').tooltip(); 
            }     

        });
    }
    //+++++++++++++ Print Data List+++++++++++++++
function print_data()
{
     //alert('print data');
        var html='<table border="" style="border-collapse: collapse;">';
        html +='<tr> ';                 
        html +='<th>S.No.</th>'; 
        html +='<th>Stock#</th>'; 
        html +='<th>Shape</th>'; 
        html +='<th>Cts</th>'; 
        html +='<th>Color</th>'; 
        html +='<th>Clarity</th>'; 
        html +='<th>Cut</th>'; 
        html +='<th>Polish</th>';
        html +='<th>Symmmetry</th>'; 
        html +='<th>Flour</th>';
        html +='<th>Depth%</th>'; 
        html +='<th>Table%</th>'; 
        html +='<th>Disc.</th>'; 
        html +='<th>Rap Price</th>'; 
        html +='<th>$/Carat</th>'; 
        html +='<th>Total$</th>'; 
        html +='<th>Lab</th>';  
        html +='<th>Measurements</th>'; 
        html +='</tr>';  

        var matching_count=$("#matching_count").val();
        var checkbox_arr = [];
        $.each($("input[name='checkbox_record[]']:checked"), function(){            
            checkbox_arr.push($(this).val());
        });
       
        if(checkbox_arr.length)
        {
            $.ajax({
            url: base_url+'print-match-diamond',
            dataType: 'json',
            type: 'post',            
            data: { "all_id": checkbox_arr ,"matching_count": matching_count },            
            success: function(data){
                    var details=data.records;
                    var data_length=details.length;
                    var isLogin = data.isLogin;
                    var j=0;
                    for(i=0;i<data_length;i++)
                    {                        
                        var stock_id = (details[i].stock_id) ? details[i].stock_id : '';
                        var shape = (details[i].shape) ? details[i].shape : '';
                        var weight = (details[i].weight) ? parseFloat(details[i].weight).toFixed(2) : '';
                        var color = (details[i].color) ? details[i].color : '';
                        var grade = (details[i].grade) ? details[i].grade : '';
                        var cut = (details[i].cut) ? details[i].cut : '';
                        var polish = (details[i].polish) ? details[i].polish : '';
                        var symmetry = (details[i].symmetry) ? details[i].symmetry : '';
                        var fluorescence_int = (details[i].fluorescence_int) ? details[i].fluorescence_int : '';
                        var depth = (details[i].depth) ? parseFloat(details[i].depth).toFixed(1) : '';   
                        var table_d = (details[i].table_d) ? parseInt(details[i].table_d) : '';
                        var rapnet = (details[i].rapnet) ? '$' + Math.round(details[i].rapnet) : '';                       
                        var rapnet_discount = (details[i].rapnet_discount) ? parseFloat(details[i].rapnet_discount).toFixed(1) + '%' : '';
                        var cost_carat = (details[i].cost_carat) ? '$' + Math.round(details[i].cost_carat) : '';
                        var total_price = (details[i].total_price) ? '$' + Math.round(details[i].total_price) : '';
                        var lab = (details[i].lab) ? details[i].lab : '';
                        var measurements = (details[i].measurements) ? details[i].measurements : '';
                        var count = '.';
                        if(stock_id) { count = parseInt(j)+1; j++; }

                        html +='<tr style="font-size:12px; font-weight:bold;">';                    
                        html +='    <td>'+count+'</td>';
                        html +='    <td>'+stock_id+'</td>';
                        html +='    <td>'+shape+'</td>';
                        html +='    <td>'+weight+'</td>';
                        html +='    <td>'+color+'</td>';
                        html +='    <td>'+grade+'</td>';
                        html +='    <td>'+cut+'</td>';
                        html +='    <td>'+polish+'</td>';
                        html +='    <td>'+symmetry+'</td>';
                        html +='    <td>'+fluorescence_int+'</td>';
                        html +='    <td>'+depth+'</td>';
                        html +='    <td>'+table_d+'</td>';
                        if(isLogin) {                        
                            html +='    <td>'+rapnet_discount+'</td>';
                            html +='    <td>'+rapnet+'</td>';
                            html +='    <td>'+cost_carat+'</td>';
                            html +='    <td>'+total_price+'</td>';
                        } else if(stock_id) {
                            html +='    <td>*****</td><td>*****</td><td>*****</td><td>*****</td>';
                        } else {
                            html +='    <td></td><td></td><td></td><td></td>';
                        }
                        html +='    <td>'+lab+'</td>';                    
                        html +='    <td>'+measurements+'</td>';
                        html +='    </tr>';
                    }
                    html +='    </table>';
                    print(html);                    
                },            
            });              
        }
        else
        {    
            alert_boot('Please, Select atleast one Record to print list.');
        }
  }   
  function print(html)
  {
    var mywindow = window.open();
    mywindow.document.write('<html><head><title>print stone</title>');            
    mywindow.document.write('</head><body >');
    mywindow.document.write(html);
    mywindow.document.write('</body></html>');
    mywindow.print();
    mywindow.close();
    return true;
  }
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function add_compare(diamond_id){ 
    $.ajax({
    url: base_url+'add-compare-diamond',
    dataType: 'json',
    type: 'get',            
    data: { "diamond_id": diamond_id, },
    success: function(data){
            if(data.message!=""){
               alertify.set('notifier','position', 'top-right');
               alertify.success(data.message);             
            }
            $('#fa_compare_'+diamond_id).toggleClass('text-red');
            if($('#fa_compare_'+diamond_id).attr('title')=="Add To Compare"){
                $('#fa_compare_'+diamond_id).attr('title','Remove From Compare');
            }else{
                $('#fa_compare_'+diamond_id).attr('title','Add To Compare')
            }
        }, 
    });
}
  
  function view_data(){
    //alert(id);
   var checkbox_arr = [];
   var checkbox = [];
  $.each($("input[name='checkbox_record[]']:not(:checked)"), function(){            
      checkbox_arr.push($(this).val());
  });
  $.each($("input[name='checkbox_record[]']:checked"), function(){            
      checkbox.push($(this).val());
  });

  //alert(checkbox_arr);
  if(checkbox.length)
  {
        $.each(checkbox_arr, function (index, value) {
            //console.log(value);
            $("#tr_"+value).remove();
        });
        $.each(checkbox, function (index, value) {
            //console.log(value);
            $("#tr_"+value).removeClass('trColor');
            $(".tr_checkbox").prop("checked", false);
        });
      
  }
  else
  {                
        alert_boot('Please,Select atleast one record.');    
  }     
     
 }
 //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 
function showSlides(n) 
{
    $(".mySlides").hide();
    $("#easy_zoom").hide();    
    $("#slides_"+n).show();  
}
function open_windows(src)
{   
    window.open(src, "Diamond", "width=500, height=500");
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++
function send_message(id)
{
    $("#send_message_inventory_id").val(id);
    $("#diamond_send_message_modal").modal('show');
}

function reply_message(id)
{
	//alert();
    $("#send_reply_id").val(id);
    $("#diamond_reply_message_modal").modal('show');
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function export_list()
{ 
    var matching_count=$("#matching_count").val();
    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function(){            
      checkbox_arr.push($(this).val());
    });
    if(checkbox_arr.length)
    {
        alertify.confirm(
            'Sagar Star', 
            'Are you sure! you want to Download Inventory?', 
            function(evt, value){ 
                //var dis_value=value;
                var dis_value=0;            
                            
                   location.href=base_url+'export-match-diamond?all_id='+checkbox_arr+'&dis_value='+dis_value +'&matching_count='+matching_count   
               
            },function(){ }); 
    }
    else
    {                
        alert_boot('Please,Select atleast one record.');    
    } 
}

//------------------ Send Email -------------------------------------//
function send_data()
{          
    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function(){            
        checkbox_arr.push($(this).val());
    });
    
    if(checkbox_arr.length)
    {       		
       $("#alert_emailmodal_message").text('You have selected '+checkbox_arr.length+' stone(s). Your recipient will recieve the details on your selected stone(s).');
       $("#checkbox_arr").val(checkbox_arr);  			
       $("#alert_emailmodal").modal('show');                          
    }
    else
    {            
       alert_boot('Please, Select atleast one stone for send email.');            
    }
}
function send_data_submit(){ 
    var value_form = $('#sendemail').serialize();
    $.ajax({
        url: base_url+'send-data',
        dataType: 'json',
        type: 'post',            
        data: value_form,
        success: function(data){
            if(data.status){
               document.getElementById("sendemail").reset();
               $("#alert_emailmodal_message").text('');
               $("#checkbox_arr").val('');
               $("#alert_emailmodal").modal('hide');

               alertify.set('notifier','position', 'top-right');
               alertify.success(data.message);             
            }
            
        }, 
        beforeSend: function () {
            $("#page-loader").show();
        },
        complete: function () {
            $("#page-loader").fadeOut();
        }
    });
}
  
function checkAvail()
{
    //alert();          
    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function(){            
        checkbox_arr.push($(this).val());
    });
    
    if(checkbox_arr.length)
    {               
       $("#check_avail_arr").val(checkbox_arr);
       $("#check_avail_modal").modal('show');
    }
    else
    {            
       alert_boot('Please, Select atleast one stone.');            
    }
} 
function checkAvailSubmit(){ 
    var value_form = $('#check_avail_form').serialize();
    $.ajax({
        url: base_url+'check-avail',
        dataType: 'json',
        type: 'post',            
        data: value_form,
        success: function(data){
            if(data.status){
               document.getElementById("check_avail_form").reset();
               $("#check_avail_arr").val('');
               $("#check_avail_modal").modal('hide');

               alertify.set('notifier','position', 'top-right');
               alertify.success(data.message);             
            }
            
        }, 
        beforeSend: function () {
            $("#page-loader").show();
        },
        complete: function () {
            $("#page-loader").fadeOut();
        }
    });
}