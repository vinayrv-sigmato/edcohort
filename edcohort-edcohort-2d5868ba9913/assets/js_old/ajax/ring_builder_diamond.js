$(document).ready(function(){
    var url=base_url+'load-ring-builder-diamond?page=';
    if(segment_1=="ring-builder-diamond"){
        pagination(url);
    }
    //alert(base_url); 
 
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
    //console.log(cert_str);

    var per_page=$("#per_page").val();
    var value_form = $('#form').serialize()+'&'+$('#form1').serialize()+'&'+$.param({ "per_page": per_page});
    var set_url=base_url+'ring-builder-diamond?'+value_form+'&'+$.param({ "shape": checkbox_str,"certificate": cert_str});
    window.history.replaceState({url: "" + set_url + ""}, 'targetTitle', set_url);

    var url=base_url+'load-ring-builder-diamond?page='; 
   
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
                for(i=0;i<details_length;i++)
                {                   
                    if(compare_session.search(details[i].diamond_id)>=0){
                        text_color="text-red";
                        compare_title="Remove From Compare"
                    }else{
                        text_color="";
                        compare_title="Add To Compare";
                    }

                    if(details[i].stock_id != null){ var stock_id=details[i].stock_id; }else{ var stock_id=""; }
                    if(details[i].shape_full != null){ var shape=details[i].shape_full; }else{ var shape=""; }
                    if(details[i].weight != null){ var weight=parseFloat(details[i].weight).toFixed(2); }else{ var weight=""; }
                    if(details[i].color != null){ var color=details[i].color; }else{ var color=""; }
                    if(details[i].grade != null){ var grade=details[i].grade; }else{ var grade=""; }
                    if(details[i].cut_full != null){ var cut=details[i].cut_full; }else{ var cut=""; }
                    if(details[i].polish_full != null){ var polish=details[i].polish_full; }else{ var polish=""; }
                    if(details[i].symmetry_full != null){ var symmetry=details[i].symmetry_full; }else{ var symmetry=""; }
                    if(details[i].fluor_full != null){ var fluorescence_int=details[i].fluor_full; }else{ var fluorescence_int=""; }
                    if(details[i].rapnet_discount != null){ var rapnet_discount=parseFloat(details[i].rapnet_discount).toFixed(1); }else{ var rapnet_discount=""; }
                    if(details[i].depth != null){ var depth=parseFloat(details[i].depth).toFixed(1); }else{ var depth=""; }
                    if(details[i].table_d != null){ var table_d=parseInt(details[i].table_d); }else{ var table_d=""; }
                    //if(details[i].cost_carat != null){ var cost_carat=Math.round(details[i].cost_carat); }else{ var cost_carat=""; }
                    if(details[i].total_price != null){ var total_price=Math.round(details[i].total_price); }else{ var total_price=""; }
                    if(details[i].lab != null){ var lab=details[i].lab; }else{ var lab=""; }
                    if(details[i].measurements != null){ var measurements=details[i].measurements; }else{ var measurements=""; }
            
                    html +='<tr style="font-size:12px; font-weight:bold;" id="tr_'+details[i].stock_id+'">';
                    html +=' <td>';
                    html +='      <input type="checkbox" name="checkbox_record[]" value="'+details[i].stock_id+'" class="tr_checkbox pull-left" >';
                    html +='        <a href="javascript:void(0)" onclick="add_compare('+details[i].stock_id+')" ><i class="fa fa-exchange '+text_color+'" title="'+compare_title+'" id="fa_compare_'+details[i].stock_id+'" aria-hidden="true" data-toggle="tooltip" data-placement="right"></i></a>';
                    html +='    </td>';
                    html +='    <td> ';
                    html +='      <a href="'+base_url+'ring-builder-diamond-details/'+details[i].stock_id+'">';                          
                    html +='        <i class="fa fa-search-plus"  title="View details" data-toggle="tooltip"  data-placement="right"></i>';
                    html +='      </a>';
                    html +='    </td>';
                    html +='    <td class="text-uppercase">'+shape +'</td>';
                    html +='    <td>'+weight+' </td>';
                    html +='    <td>'+color+' </td>';
                    html +='    <td>'+grade+' </td>';
                    html +='    <td>'+cut+' </td>';
                    html +='    <td>'+polish+' </td>';
                    html +='    <td>'+symmetry+'</td>';
                    html +='    <td>'+fluorescence_int+'</td>';
                    html +='    <td>'+depth+'</td>';
                    html +='    <td>'+table_d+'</td>';
                    //html +='    <td>'+cost_carat+'</td>';
                    html +='    <td>$'+total_price+'</td>  ';
                    html +='    <td><span title="'+lab+'" data-toggle="tooltip">';
                    html +=lab;                                        
                    html +='</span></td>';                    
                    html +='    <td>'+measurements+'</td>';                    
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
        var html='<table border="" style="border-collapse: collapse;">';
        html +='<tr> '; 
                html +='<th>S.No.</th>'; 
                html +='<th >Stock#</th>'; 
                html +='<th >Shape</th>'; 
                html +='<th >Qt.Wt.</th>'; 
                html +='<th >Color</th>'; 
                html +='<th >Grade</th>'; 
                html +='<th >Cut</th>'; 
                html +='<th >Polish</th>';
                html +='<th >Sym</th>'; 
                html +='<th >Flour</th>'; 
               
                html +='<th  >Depth%</th>'; 
                html +='<th  >Table%</th>'; 
                 //html +='<th >Disc%</th>'; 
                //html +='<th  >$/Carat</th>'; 
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
            url: base_url+'print-diamond',
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
                        var a= "'"+data[i].stock_id+"'";
                        html +='<tr style="font-size:12px; font-weight:bold;" id="tr_">';                    
                        html +='    <td>'+count+'</td>';
                        html +='    <td>'+data[i].stock_id+'</td>';
                        if(data[i].shape_full != null){ var shape_full=data[i].shape_full; }else{ var shape_full=""; }
                        html +='    <td>'+shape_full +'</td>';
                        if(data[i].weight != null){ var weight=parseFloat(data[i].weight).toFixed(2); }else{ var weight=""; }
                        html +='    <td>'+weight+' </td>';
                        if(data[i].color != null){ var color=data[i].color; }else{ var color=""; }
                        html +='    <td>'+color+' </td>';
                        if(data[i].grade != null){ var grade=data[i].grade; }else{ var grade=""; }
                        html +='    <td>'+grade+' </td>';
                        if(data[i].cut_full != null){ var cut_full=data[i].cut_full; }else{ var cut_full=""; }
                        html +='    <td>'+cut_full+' </td>';
                        if(data[i].polish_full != null){ var polish_full=data[i].polish_full; }else{ var polish_full=""; }
                        html +='    <td>'+polish_full+' </td>';
                        if(data[i].symmetry_full != null){ var symmetry_full=data[i].symmetry_full; }else{ var symmetry_full=""; }
                        html +='    <td>'+symmetry_full+'</td>';
                        if(data[i].fluor_full != null){ var fluor_full=data[i].fluor_full; }else{ var fluor_full=""; }
                        html +='    <td>'+fluor_full+'</td>';                       
                              
                        if(data[i].depth != null){ var depth=parseFloat(data[i].depth).toFixed(1); }else{ var depth=""; }      
                        html +='    <td>'+depth+'</td>';
                        if(data[i].table_d != null){ var table_d=parseInt(data[i].table_d); }else{ var table_d=""; }
                        html +='    <td>'+table_d+'</td>';
                        //  if(data[i].FL_RAPNET_DISCOUNT != null){ var FL_RAPNET_DISCOUNT=parseFloat(data[i].FL_RAPNET_DISCOUNT).toFixed(1); }else{ var FL_RAPNET_DISCOUNT=""; }
                        // html +='    <td>'+FL_RAPNET_DISCOUNT+'</td>';

                        // Comment by Tarun for Price
                        //if(data[i].cost_carat != null){ var cost_carat=Math.round(data[i].cost_carat); }else{ var cost_carat=""; }
                        //html +='    <td>'+cost_carat+'</td>';
                   
                        if(data[i].total_price != null){ var total_price=Math.round(data[i].total_price); }else{ var total_price=""; }
                        html +='    <td>'+total_price+' </td>';

                        if(data[i].lab != null){ var lab=data[i].lab; }else{ var lab=""; }
                        html +='    <td><a href="https://www.gia.edu/report-check?reportno='+lab+'">'+lab+'</a></td>';
                        
                        if(data[i].measurements != null){ var MEASUREMENTS=data[i].measurements; }else{ var MEASUREMENTS=""; }
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
            url: base_url+'print-details-diamond',
            dataType: 'json',
            type: 'get',            
            data: { "diamond_id": diamond_id },            
            success: function(result){
                    console.log(result);
                    var data=result.records.records;                    
                    var image=result.records.image_array;
                    var data_length=data.length;
                    for(i=0;i<data_length;i++)
                    {
                        count=parseInt(i)+1;
                        var a= "'"+data[i].stock_id+"'";
                        //if(data[i].shape_full != null){ var shape_full=data[i].shape_full; }else{ var shape_full=""; }
                        if(data[i].shape_full != null){ var shape_full=data[i].shape_full; }else{ var shape_full=""; }
                        if(data[i].weight != null){ var weight=parseFloat(data[i].weight).toFixed(2); }else{ var weight=""; }
                        if(data[i].color != null){ var color=data[i].color; }else{ var color=""; }
                        if(data[i].grade != null){ var grade=data[i].grade; }else{ var grade=""; }
                        if(data[i].cut_full != null){ var cut_full=data[i].cut_full; }else{ var cut_full=""; }
                        if(data[i].polish_full != null){ var polish_full=data[i].polish_full; }else{ var polish_full=""; }
                        if(data[i].symmetry_full != null){ var symmetry_full=data[i].symmetry_full; }else{ var symmetry_full=""; }
                        if(data[i].fluor_full != null){ var fluor_full=data[i].fluor_full; }else{ var fluor_full=""; }
                        if(data[i].depth != null){ var depth=parseFloat(data[i].depth).toFixed(1); }else{ var depth=""; } 
                        if(data[i].table_d != null){ var table_d=parseInt(data[i].table_d); }else{ var table_d=""; }
                        if(data[i].cost_carat != null){ var cost_carat=Math.round(data[i].cost_carat); }else{ var cost_carat=""; }
                        if(data[i].total_price != null){ var total_price=Math.round(data[i].total_price); }else{ var total_price=""; }
                        if(data[i].lab != null){ var lab=data[i].lab; }else{ var lab=""; }
                        if(data[i].measurements != null){ var MEASUREMENTS=data[i].measurements; }else{ var MEASUREMENTS=""; }
                        if(data[i].report_no != null){ var report_no=data[i].report_no; }else{ var report_no=""; }
                        if(data[i].culet != null){ var culet=data[i].culet; }else{ var culet=""; }
                        if(data[i].crown_ht != null){ var crown_ht=data[i].crown_ht; }else{ var crown_ht=""; }
                        if(data[i].crown_angle != null){ var crown_angle=data[i].crown_angle; }else{ var crown_angle=""; }
                        if(data[i].pavillion_angle != null){ var pavillion_angle=data[i].pavillion_angle; }else{ var pavillion_angle=""; }
                        if(data[i].pavillion_depth != null){ var pavillion_depth=data[i].pavillion_depth; }else{ var pavillion_depth=""; }

                       
                       html +='<div id="description" class="tab-pane fade in active" role="tabpanel">';
                       html +='  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">';
                       html +='     <h3>Stock# : '+data[i].stock_id+'</h3>';
                       html +='<table width="100%" border="0">';
                       html +='       <tr>';                      
                       html +='         <td colspan="2"><img width="70%" src="'+ image +'"></td>';                                                                          
                       html +='         <td colspan="2">'+ weight +' CARAT '+ shape_full +' DIAMOND '+ color +' COLOR '+ cut_full +' CUT</td>';
                       html +='       </tr>';
                       html +='       <tr>';                       
                       html +='       <tr>';
                       html +='       <tr>';                      
                       html +='         <td colspan="4"><h3>Product Details</h3></td>'; 
                       html +='       </tr>';
                       html +='       <tr>';                       
                       html +='       <tr>';
                       html +='         <td>Stock# : </td>'; 
                       html +='         <td>'+data[i].stock_id+'</td>';
                       html +='         <td>Report No :</td>';                                                   
                       html +='         <td>'+ report_no +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Total :</td>';                                                   
                       html +='         <td>'+ total_price +' </td>';
                       html +='         <td></td>'; 
                       html +='         <td></td>';                       
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Shape : </td>'; 
                       html +='         <td>'+shape_full+'</td>';
                       html +='         <td>Cts :</td>';                                                   
                       html +='         <td>'+ weight +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Color : </td>'; 
                       html +='         <td>'+color+'</td>';
                       html +='         <td>Clarity :</td>';                                                   
                       html +='         <td>'+ grade +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Cut : </td>'; 
                       html +='         <td>'+cut_full+'</td>';
                       html +='         <td>Polish :</td>';                                                   
                       html +='         <td>'+ polish_full +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Symmetry : </td>'; 
                       html +='         <td>'+symmetry_full+'</td>';
                       html +='         <td>Fluorescence :</td>';                                                   
                       html +='         <td>'+ fluor_full +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Depth% : </td>'; 
                       html +='         <td>'+depth+'</td>';
                       html +='         <td>Table% :</td>';                                                   
                       html +='         <td>'+ table_d +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Measurements : </td>'; 
                       html +='         <td>'+MEASUREMENTS+'</td>';
                       // html +='         <td>Culet :</td>';                                                   
                       // html +='         <td>'+ culet +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Culet : </td>'; 
                       html +='         <td>'+culet+'</td>';
                       html +='         <td>Crown Height :</td>';                                                   
                       html +='         <td>'+ crown_ht +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Crown Angle : </td>'; 
                       html +='         <td>'+crown_angle+'</td>';
                       html +='         <td>Pavilion Angle :</td>';                                                   
                       html +='         <td>'+ pavillion_angle +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Pavilion Depth : </td>'; 
                       html +='         <td>'+pavillion_depth+'</td>';
                       html +='         <td>Lab :</td>';                                                   
                       html +='         <td>'+ lab +' </td>';
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
        url: base_url+'add-cart-diamond',
        dataType: 'json',
        type: 'get',            
        data: { "diamond_id": diamond_id },                                         
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
function choose_setting(stock_id){        

      $.ajax({
        url: base_url+'add-ring-diamond-setting',
        dataType: 'json',
        type: 'get',            
        data: { "stock_id": stock_id },                                         
        success: function(data){
            var details=data.records;
            var html="";
            var sum=0.00; 
            if(data.message=='ok')
            {
                var details = data.records;
                //$("#total_cart_count_d").html(details.quantity);
                //$(".icon-bag").effect("bounce",{ times:3,distance:7 },'slow');

                window.location.href = base_url+"ring-builder-review";

                //edited by arti start
                // if(ring_setting_diamond_data != '')
                // {
                //     window.location.href = base_url+"ring-builder-review";
                // }else if(ring_setting_diamond_data == '')
                // {
                //     window.location.href = base_url+"ring-builder";
                // }

                //window.location.href = base_url+"ring-builder";
                //edited by arti end
                
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
        url: base_url+'add-wish-diamond',
        dataType: 'json',
        type: 'get',            
        data: { "diamond_id": diamond_id },                                         
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
                            location.href=base_url+'export-diamond?all_id='+checkbox_arr+'&dis_value='+dis_value 
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
    //                   location.href=base_url+'diamond/export_diamond?all_id='+checkbox_arr+'&dis_value='+dis_value    
    //               }
    //               else
    //               {
    //                   alertify.confirm(
    //                     'Certificate One.com', 
    //                     'Are you sure! you want to Download All Inventory?', 
    //                     function(evt, value)
    //                     {                             
    //                         location.href=base_url+'diamond/export_diamond?all_id=&dis_value='+dis_value                            
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
       $("#alert_emailmodal_message").text('You have selected '+checkbox_arr.length+' stone(s). Your recipient will recieve the details of your selected stone(s).');
       $("#checkbox_arr").val(checkbox_arr);
       $("#alert_emailmodal").modal('show');
    }
    else
    {            
       alert_boot('Please, Select atleast one stone for send email.');            
    }
} 



    