$(document).ready(function(){
    var url=base_url+'front/color_diamond/load_more_data?page='; 
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

    var color_arr = [];
        $.each($("input[name='color[]']:checked"), function(){            
            color_arr.push($(this).val());
    });
    var color_arr=color_arr.toString();    

    var clarity_arr = [];
        $.each($("input[name='clarity[]']:checked"), function(){            
            clarity_arr.push($(this).val());
    });
    var clarity_arr=clarity_arr.toString();    

    var intensity_arr = [];
        $.each($("input[name='intensity[]']:checked"), function(){            
            intensity_arr.push($(this).val());
    });
    var intensity_arr=intensity_arr.toString();
    //console.log(cert_str);

    var per_page=$("#per_page").val();
    var value_form = $('#form').serialize()+'&'+$('#form1').serialize()+'&'+$.param({ "per_page": per_page});
    var set_url=base_url+'color-diamond?'+value_form+'&'+$.param({ 
            "shape": checkbox_str,
            "certificate": cert_str,
            "color": color_arr,
            "clarity": clarity_arr,
            "intensity": intensity_arr
        });
    window.history.replaceState({url: "" + set_url + ""}, 'targetTitle', set_url);

    var url=base_url+'front/color_diamond/load_more_data?page='; 
   
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
//            // var page=$("#page_scroll").val();
//             //loadMoreData(page);
//             //alert(page);
//         }
//     });
    function loadMoreData(url_data){ 
        var compare_session=$("#compare_session").val();
        var text_color="";
        var compare_title="Add To Compare";
        var per_page=$("#per_page").val();
        var value_form = $('#form').serialize()+'&'+$.param({ "per_page": per_page});
      
        $.ajax({
            url: url_data,
            dataType: 'json',
            type: 'post',            
            data: value_form, 
                                      
            success: function(data){
                var details=data.records;   
                var page_link=data.page_link; 
               
                var total_records=data.total_records;  
                var price_min=data.price_min;
                var price_max=data.price_max;   
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
                    if(details[i].shape_full != null){ var SN_SHAPE=details[i].shape_full; }else{ var SN_SHAPE=""; }
                    if(details[i].QT_WEIGHT != null){ var QT_WEIGHT=parseFloat(details[i].QT_WEIGHT).toFixed(2); }else{ var QT_WEIGHT=""; }
                    if(details[i].SN_COLOR != null){ var SN_COLOR=details[i].SN_COLOR; }else{ var SN_COLOR=""; }
                    if(details[i].SN_GRADE != null){ var SN_GRADE=details[i].SN_GRADE; }else{ var SN_GRADE=""; }
                    if(details[i].cut_full != null){ var cut_full=details[i].cut_full; }else{ var cut_full=""; }
                    if(details[i].polish_full != null){ var polish_full=details[i].polish_full; }else{ var polish_full=""; }
                    if(details[i].symmetry_full != null){ var symmetry_full=details[i].symmetry_full; }else{ var symmetry_full=""; }
                    if(details[i].fluor_full != null){ var fluor_full=details[i].fluor_full; }else{ var fluor_full=""; }
                    if(details[i].PC_DEPTH != null){ var PC_DEPTH=parseFloat(details[i].PC_DEPTH).toFixed(1); }else{ var PC_DEPTH=""; }      
                    if(details[i].PC_TABLE != null){ var PC_TABLE=parseInt(details[i].PC_TABLE); }else{ var PC_TABLE=""; }
                    if(details[i].FL_CASH_PRICE != null){ var COST_CARAT=Math.round(details[i].FL_CASH_PRICE); }else{ var COST_CARAT=""; }
                    if(details[i].FL_RAPNET != null){ var FL_RAPNET=Math.round(details[i].FL_RAPNET); }else{ var FL_RAPNET=""; }
                    if(details[i].SN_LAB != null){ var SN_LAB=details[i].SN_LAB; }else{ var SN_LAB=""; }
                    if(details[i].MEASUREMENTS != null){ var MEASUREMENTS=details[i].MEASUREMENTS; }else{ var MEASUREMENTS=""; }
   
                    if(compare_session.search(details[i].CD_INVENTORY_ID)>=0){
                        text_color="text-red";
                        compare_title="Remove From Compare"
                    }else{
                        text_color="";
                        compare_title="Add To Compare";
                    }
                    var a= "'"+details[i].CD_INVENTORY_ID+"'";
                    html +='<tr style="font-size:12px; font-weight:bold;" id="tr_'+details[i].CD_INVENTORY_ID+'">';
                    html +='    <td>';
                    html +='       <input type="checkbox" name="checkbox_record[]" value="'+details[i].CD_INVENTORY_ID+'" class="tr_checkbox pull-left" >';
                    html +='       <a href="javascript:void(0)" onclick="add_compare('+details[i].CD_INVENTORY_ID+')" ><i class="fa fa-exchange '+text_color+'" title="'+compare_title+'" id="fa_compare_'+details[i].CD_INVENTORY_ID+'" aria-hidden="true"></i></a>';
                    html +='    </td>'; 
                    html +='    <td>';  
                    html +='        <a href="'+base_url+'color-diamond-details/'+details[i].CD_INVENTORY_ID+'">'; 
                    html +='    <i class="fa fa-search-plus"  title="View details"></i>';
                    html +='    </a>';
                    html +='    </td>';
                    html +='    <td>'+SN_SHAPE +'</td>';
                    html +='    <td>'+QT_WEIGHT+' </td>';
                    html +='    <td>'+SN_COLOR+' </td>';
                    html +='    <td>'+SN_GRADE+' </td>';
                    // html +='    <td>'+cut_full+' </td>';
                    // html +='    <td>'+polish_full+' </td>';
                    // html +='    <td>'+symmetry_full+'</td>';
                    // html +='    <td>'+fluor_full+'</td>';
                    // html +='    <td>'+PC_DEPTH+'</td>';
                    // html +='    <td>'+PC_TABLE+'</td>';
                    html +='    <td>'+COST_CARAT+'</td>';
                    html +='    <td>'+FL_RAPNET+'</td>';
                    // html +='    <td><span title="'+SN_LAB+'" data-toggle="tooltip">';
                    // if(SN_LAB=='GIA'){
                    //     html +='<a target="_blank" href="https://www.gia.edu/report-check?reportno='+details[i].UDF4+'">'+SN_LAB+'</a>';
                    // }
                    // else{
                    //     html +=SN_LAB;
                    // }                    
                    // html +='</span></td>';
                     html +='    <td><span title="'+SN_LAB+'" data-toggle="tooltip">';
                    if(SN_LAB=='GIA'){
                        html +='<a>'+SN_LAB+'</a>';
                    }
                    else{
                        html +=SN_LAB;
                    }                    
                    html +='</span></td>';                    
                    html +='    <td>'+MEASUREMENTS+'</td>';                    
                    html +='</tr>';
                }
                $('#example').dataTable().fnDestroy();

                $("#total_records").html(total_records);
                $("#add_data").html(html);

                $('#example').DataTable({                    
                    "retrieve": true, 
                    "autoWidth": false ,               
                    "scrollY": '800',  
                    "scrollX": true,
                    "ordering": true,
                    "paging": false,
                    "searching": false,
                    "info": false,           
                    "order": []                                               
                });

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
    //+++++++++++++ Print Data List+++++++++++++++
function print_data()
{
        var html='<table border="" style="border-collapse: collapse;">';
        html +='<tr> '; 
                html +='<th>S.No.</th>'; 
                html +='<th >Stock#</th>'; 
                html +='<th >Shape</th>'; 
                html +='<th >Qt.Wt.</th>'; 
                html +='<th >Color</th>'; 
                html +='<th >Grade</th>'; 
                html +='<th >Fancy Color</th>'; 
                html +='<th >Fancy Color Intensity</th>';
              
                html +='<th  >Depth%</th>'; 
                html +='<th  >Table%</th>'; 
                html +='<th  >$/Carat</th>'; 
                html +='<th  >Total$</th>'; 
                html +='<th  >Lab</th>';  
                html +='<th  >Measurements</th>'; 
            html +='</tr>';  
        var checkbox_arr = [];
        $.each($("input[name='checkbox_record[]']:checked"), function(){            
            checkbox_arr.push($(this).val());
        });
        //alert(checkbox_arr);
        if(checkbox_arr.length)
        {
            //alert(checkbox_arr.length);
            $.ajax({
            url: base_url+'front/color_diamond/print_data',
            dataType: 'json',
            type: 'POST',            
            data: { "all_id": checkbox_arr },            
            success: function(data){
                    //console.log(data);
                    var data=data.records;
                    var data_length=data.length;
                    //alert(data.length);
                    for(i=0;i<data_length;i++)
                    {
                        count=parseInt(i)+1;
                        var a= "'"+data[i].SN_SERIALNO+"'";
                        html +='<tr style="font-size:12px; font-weight:bold;" id="tr_">';                    
                        html +='    <td>'+count+'</td>';
                        html +='    <td>'+data[i].SN_SERIALNO+'</td>';
                        if(data[i].SN_SHAPE != null){ var SN_SHAPE=data[i].SN_SHAPE; }else{ var SN_SHAPE=""; }
                        html +='    <td>'+SN_SHAPE +'</td>';
                        if(data[i].QT_WEIGHT != null){ var QT_WEIGHT=parseFloat(data[i].QT_WEIGHT).toFixed(2); }else{ var QT_WEIGHT=""; }
                        html +='    <td>'+QT_WEIGHT+' </td>';
                        if(data[i].SN_COLOR != null){ var SN_COLOR=data[i].SN_COLOR; }else{ var SN_COLOR=""; }
                        html +='    <td>'+SN_COLOR+' </td>';
                        if(data[i].SN_GRADE != null){ var SN_GRADE=data[i].SN_GRADE; }else{ var SN_GRADE=""; }
                        html +='    <td>'+SN_GRADE+' </td>';
                        if(data[i].SN_FANCY_COLOR != null){ var SN_FANCY_COLOR=data[i].SN_FANCY_COLOR; }else{ var SN_FANCY_COLOR=""; }
                        html +='    <td>'+SN_FANCY_COLOR+' </td>';
                        if(data[i].SN_FANCY_COLOR_INTENSITY != null){ var SN_FANCY_COLOR_INTENSITY=data[i].SN_FANCY_COLOR_INTENSITY; }else{ var SN_FANCY_COLOR_INTENSITY=""; }
                        html +='    <td>'+SN_FANCY_COLOR_INTENSITY+' </td>';                       
                              
                        if(data[i].PC_DEPTH != null){ var PC_DEPTH=parseFloat(data[i].PC_DEPTH).toFixed(1); }else{ var PC_DEPTH=""; }      
                        html +='    <td>'+PC_DEPTH+'</td>';
                        if(data[i].PC_TABLE != ""){ var PC_TABLE=parseInt(data[i].PC_TABLE); }else{ var PC_TABLE=""; }
                        html +='    <td>'+PC_TABLE+'</td>';

                        if(data[i].FL_CASH_PRICE != null){ var FL_CASH_PRICE=Math.round(data[i].FL_CASH_PRICE); }else{ var FL_CASH_PRICE=""; }
                        html +='    <td>'+FL_CASH_PRICE+'</td>';                   
                        if(data[i].FL_RAPNET != null){ var FL_RAPNET=Math.round(data[i].FL_RAPNET); }else{ var FL_RAPNET=""; }
                        html +='    <td>'+FL_RAPNET+' </td>';
                        if(data[i].SN_LAB != null){ var SN_LAB=data[i].SN_LAB; }else{ var SN_LAB=""; }
                        html +='    <td><a href="https://www.gia.edu/report-check?reportno='+SN_LAB+'">'+SN_LAB+'</a></td>';
                        
                        if(data[i].MEASUREMENTS != null){ var MEASUREMENTS=data[i].MEASUREMENTS; }else{ var MEASUREMENTS=""; }
                        html +='    <td>'+MEASUREMENTS+'</td></tr>';
                    }
                    html +='    </table>';
                    //alert(html);
                    print(html);                    
                },            
            });              
        }
        else
        {    
            alert_boot('Please, Select atleast one Record to print list.');
        }
  }

//-------- print detail-----//

 //+++++++++++++ Print Data List+++++++++++++++
function print_detail(diamond_id)
{
    //alert();
        var html='';       
            //alert(checkbox_arr);        
            //alert(checkbox_arr.length);
            $.ajax({
            url: base_url+'front/color_diamond/print_details',
            dataType: 'json',
            type: 'get',            
            data: { "diamond_id": diamond_id },            
            success: function(result){
                    console.log(result);
                    var data=result.records.records;                    
                    var image=result.records.sample_image_array;
                   // alert(image);
                    var data_length=data.length;
                    //alert(image.length);
                    for(i=0;i<data_length;i++)
                    {
                        //alert(data[i].SN_SERIALNO);
                        count=parseInt(i)+1;
                        var a= "'"+data[i].SN_SERIALNO+"'";
                    if(data[i].SN_SHAPE != null){ var SN_SHAPE=data[i].SN_SHAPE; }else{ var SN_SHAPE=""; }
                    if(data[i].shape_full != null){ var shape_full=data[i].shape_full; }else{ var shape_full=""; }
                    if(data[i].QT_WEIGHT != null){ var QT_WEIGHT=parseFloat(data[i].QT_WEIGHT).toFixed(2); }else{ var QT_WEIGHT=""; }
                    if(data[i].SN_COLOR != null){ var SN_COLOR=data[i].SN_COLOR; }else{ var SN_COLOR=""; }
                    if(data[i].SN_GRADE != null){ var SN_GRADE=data[i].SN_GRADE; }else{ var SN_GRADE=""; }
                    if(data[i].SN_FANCY_COLOR != null){ var SN_FANCY_COLOR=data[i].SN_FANCY_COLOR; }else{ var SN_FANCY_COLOR=""; }
                    if(data[i].SN_FANCY_COLOR_INTENSITY != null){ var SN_FANCY_COLOR_INTENSITY=data[i].SN_FANCY_COLOR_INTENSITY; }else{ var SN_FANCY_COLOR_INTENSITY=""; }

                    if(data[i].PC_DEPTH != null){ var PC_DEPTH=parseFloat(data[i].PC_DEPTH).toFixed(1); }else{ var PC_DEPTH=""; } 
                    if(data[i].PC_TABLE != null){ var PC_TABLE=parseInt(data[i].PC_TABLE); }else{ var PC_TABLE=""; }
                    if(data[i].FL_CASH_PRICE != null){ var FL_CASH_PRICE=Math.round(data[i].FL_CASH_PRICE); }else{ var FL_CASH_PRICE=""; }
                    if(data[i].FL_RAPNET != null){ var FL_RAPNET=Math.round(data[i].FL_RAPNET); }else{ var FL_RAPNET=""; }
                    if(data[i].SN_LAB != null){ var SN_LAB=data[i].SN_LAB; }else{ var SN_LAB=""; }
                    if(data[i].MEASUREMENTS != null){ var MEASUREMENTS=data[i].MEASUREMENTS; }else{ var MEASUREMENTS=""; }
                    if(data[i].UDF4 != null){ var UDF4=data[i].UDF4; }else{ var UDF4=""; }

                       
                       html +='<div id="description" class="tab-pane fade in active" role="tabpanel">';
                       html +='  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">';
                       html +='     <h3>Stock# : '+data[i].SN_SERIALNO+'</h3>';
                       html +='<table width="100%" border="0">';
                       html +='       <tr>';                      
                       html +='         <td colspan="2"><img width="70%" src="'+base_url+''+ image +'">Sample Image</td>';                                                                          
                       html +='         <td colspan="2">'+ QT_WEIGHT +' CARAT '+ shape_full +' DIAMOND '+ SN_COLOR +' COLOR '+ SN_FANCY_COLOR_INTENSITY +' INTENSITY</td>';
                       html +='       </tr>';
                       html +='       <tr>';                       
                       html +='       <tr>';
                       html +='       <tr>';                      
                       html +='         <td colspan="4"><h3>Product Details</h3></td>'; 
                       html +='       </tr>';
                       html +='       <tr>';                       
                       html +='       <tr>';
                       html +='         <td>Stock# : </td>'; 
                       html +='         <td>'+data[i].SN_SERIALNO+'</td>';
                       //html +='         <td>Report No :</td>';                                                   
                      // html +='         <td>'+ UDF4 +' </td>';
                       html +='         <td>Lab :</td>';                                                   
                       html +='         <td>'+ SN_LAB +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>$/Carat :  </td>'; 
                       html +='         <td>'+FL_CASH_PRICE+'</td>';
                       html +='         <td>Total :</td>';                                                   
                       html +='         <td>'+ FL_RAPNET +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Shape : </td>'; 
                       html +='         <td>'+shape_full+'</td>';
                       html +='         <td>Cts :</td>';                                                   
                       html +='         <td>'+ QT_WEIGHT +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Color : </td>'; 
                       html +='         <td>'+SN_COLOR+'</td>';
                       html +='         <td>Clarity :</td>';                                                   
                       html +='         <td>'+ SN_GRADE +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Fancy Color : </td>'; 
                       html +='         <td>'+SN_FANCY_COLOR+'</td>';
                       html +='         <td>Fancy Color Intensity :</td>';                                                   
                       html +='         <td>'+ SN_FANCY_COLOR_INTENSITY +' </td>';
                       html +='       </tr>';

                       html +='       <tr>';
                       html +='         <td>Depth% : </td>'; 
                       html +='         <td>'+PC_DEPTH+'</td>';
                       html +='         <td>Table% :</td>';                                                   
                       html +='         <td>'+ PC_TABLE +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Measurements : </td>'; 
                       html +='         <td>'+MEASUREMENTS+'</td>';
                       html +='         <td>Culet :</td>';                                                   
                       html +='         <td>'+ UDF4 +' </td>';
                       html +='       </tr>';
                                            
                       html +='    </table>';                       
                       html +='     </div>';
                       html +='   </div>';
                       html +='     <div align="center" style="margin-top:250px !important;">';
                       html +='     <a>'+base_url+'</a>';
                       html +='     </div>';
                        
                    }
                    html +='    </table>';
                    //alert(html);
                    print(html);                    
                },            
            });              
        
  }
  

  function print(html)
  {
    //alert(html);
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
//++++++++++++++++++++++++ More Details ++++++++++++++++++++++++++
function showSlides(n) 
{
    $(".mySlides").hide();
    $("#easy_zoom").hide();
    
    $("#slides_"+n).show();  
}
function open_windows(src)
{   
    window.open(src, "Diamond", "width=800, height=800");
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
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function add_cart(diamond_id){        

      $.ajax({
        url: base_url+'front/color_diamond/add_cart',
        dataType: 'json',
        type: 'get',            
        data: { "diamond_id": diamond_id, },                                         
        success: function(data){
            var details=data.records;
            var html="";
            var sum=0.00; 
            if(data.message=='ok')
             {
                 var details=data.records;            
                 $("#total_cart_count_d").html(details.quantity);
                 $(".icon-bag").effect("bounce",{times:3,distance:7},'slow');
             }
             else if(data.message=='login')
             {
                $("#login_modal").modal('show');
             }
        }, 
    });    
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function add_wish(diamond_id){        

      $.ajax({
        url: base_url+'front/color_diamond/add_wish',
        dataType: 'json',
        type: 'get',            
        data: { "diamond_id": diamond_id, },                                         
        success: function(data){
            var details=data.records;
            var html="";
            var sum=0.00;
            if(data.message=='ok')
             {
                 var details=data.records;
            
                 $("#total_wish_count_d").html(details.quantity);                 
                 $(".fa-heart").effect("bounce",{times:3,distance:7},'slow');
             }
             else if(data.message=='login')
             {
                $("#login_modal").modal('show');
             }
        },
    });
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function export_list()
{ 
      var checkbox_arr = [];
      $.each($("input[name='checkbox_record[]']:checked"), function(){            
          checkbox_arr.push($(this).val());
      });
            var dis_value=0;
    
                  if(checkbox_arr.length)
                  {
                     alertify.confirm(
                        'Sagar Star', 
                        'Are you sure! you want to Download Inventory?', 
                        function(evt, value)
                        {
                            location.href=base_url+'front/color_diamond/export_diamond?all_id='+checkbox_arr+'&dis_value='+dis_value 
                        }
                        ,function(){ 
                     });   
                  }
                  else
                  {
                      alert_boot('Please,Select atleast one record.');                    
                  }            
            

    // alertify.prompt(
    //     'Certificate One.com', 
    //     'Please! Set Discount Value.',
    //     '0', 
    //     function(evt, value){ 
    //         var dis_value=value;            
    //         if(dis_value)
    //         {            
    //               if(checkbox_arr.length)
    //               {
    //                   location.href=base_url+'front/diamond/export_diamond?all_id='+checkbox_arr+'&dis_value='+dis_value    
    //               }
    //               else
    //               {
    //                   alertify.confirm(
    //                     'Certificate One.com', 
    //                     'Are you sure! you want to Download All Inventory?', 
    //                     function(evt, value)
    //                     {                             
    //                         location.href=base_url+'front/diamond/export_diamond?all_id=&dis_value='+dis_value                            
    //                     }
    //                     ,function(){ 
    //                  });                     
    //               }            
    //          }
    //     },function(){ alertify.error('Cancel')});     

}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function add_compare(diamond_id){        

        $.ajax({
        url: base_url+'front/color_diamond/add_compare',
        dataType: 'json',
        type: 'get',            
        data: { "diamond_id": diamond_id, },
        success: function(data){
                if(data.message!=""){
                   //alert_boot(data.message);
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
//------------------ Send Email -------------------------------------//
function send_data()
{
    //alert();          
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



    