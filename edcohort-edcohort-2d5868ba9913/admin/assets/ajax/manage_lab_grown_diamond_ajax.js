$(document).ready(function(){
    var url=base_url+'admin_lab_grown_diamond/load_more_data?page='; 
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
    //console.log(cert_str);

    var per_page=$("#per_page").val();
    var value_form = $('#form').serialize()+'&'+$('#form1').serialize()+'&'+$.param({ "per_page": per_page});
    var set_url=base_url+'admin_lab_grown_diamond?'+value_form+'&'+$.param({ "shape": checkbox_str,"certificate": cert_str});
    window.history.replaceState({url: "" + set_url + ""}, 'targetTitle', set_url);

    var url=base_url+'admin_lab_grown_diamond/load_more_data?page='; 
    loadMoreData(url);
}
function pagination(argument) {  
    loadMoreData(argument);
}
 $(function () {
    $("#checkAll").click(function () {
        //alert('hiiiii');
        if ($("#checkAll").is(':checked')) {
            $(".tr_checkbox").prop("checked", true);
            $("#add_data>tr").addClass('trColor');
        } else {
            $(".tr_checkbox").prop("checked", false);
            $("#add_data>tr").removeClass('trColor');
        }
    });
}); 

    function loadMoreData(url_data){        
        //var where=$("#where").val();
        
        var per_page=$("#per_page").val();
        var value_form = $('#form').serialize()+'&'+$.param({ "per_page": per_page});
      
        //alert(value_form);
        $.ajax({
            url: url_data,
            dataType: 'json',
            type: 'get',            
            data: value_form, 
                                      
            success: function(data){
                //alert(data);
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
                       
                    //if(details[i].SN_CREATED_BY =='1'){ var SN_CREATED_BY='Admin'; }else{ var SN_CREATED_BY=details[i].NM_USER_FULLNAME; }
                    //if(details[i].rap_seller != null){ var rap_seller=details[i].rap_seller; }else{ var rap_seller=""; }
                    if(details[i].stock_id != null){ var stock_id=details[i].stock_id; }else{ var stock_id=""; }
                    if(details[i].shape_full != null){ var shape=details[i].shape_full; }else{ var shape=""; }
                    if(details[i].weight != null){ var weight=parseFloat(details[i].weight).toFixed(2); }else{ var weight=""; }
                    if(details[i].color != null){ var color=details[i].color; }else{ var color=""; }
                    if(details[i].grade != null){ var grade=details[i].grade; }else{ var grade=""; }
                    if(details[i].cut_full != null){ var cut=details[i].cut_full; }else{ var cut=""; }
                    if(details[i].polish_full != null){ var polish=details[i].polish_full; }else{ var polish=""; }
                    if(details[i].symmetry_full != null){ var symmetry=details[i].symmetry_full; }else{ var symmetry=""; }
                    if(details[i].fluor_full != null){ var fluorescence_int=details[i].fluor_full; }else{ var fluorescence_int=""; }
                    //if(details[i].rapnet_discount != null){ var rapnet_discount=parseFloat(details[i].rapnet_discount).toFixed(1); }else{ var rapnet_discount=""; }
                    if(details[i].depth != null){ var depth=parseFloat(details[i].depth).toFixed(1); }else{ var depth=""; }
                    if(details[i].table_d != null){ var table_d=parseInt(details[i].table_d); }else{ var table_d=""; }
                    //if(details[i].cash_price != null){ var cash_price=parseFloat(details[i].cash_price).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'); }else{ var cash_price=""; }
                    if(details[i].total_price != null){ var total_price=parseFloat(details[i].total_price).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'); }else{ var total_price=""; }
                    if(details[i].lab != null){ var lab=details[i].lab; }else{ var lab=""; }
                    if(details[i].measurements != null){ var measurements=details[i].measurements; }else{ var measurements=""; }
                    //if(details[i].created_at != null){ var created_at=details[i].created_at; }else{ var created_at=""; }
            
                    html +='<tr style="font-size:12px; font-weight:bold;" id="tr_'+details[i].diamond_id+'">';
                    html +='    <td>';  
                    html +='      <a href="'+base_url+'admin_lab_grown_diamond/diamond_details/'+details[i].diamond_id+'">';                                     
                    html +='        <i class="fa fa-search-plus"  title="View details" data-toggle="tooltip" data-placement="right"></i>';
                    html +='      </a>';
                    html +='    </td>';
                    html +='    <td><input type="checkbox" class="multi-chk-complete"  id="basic_'+details[i].diamond_id+'" name="checkbox_record[]" value="'+details[i].diamond_id+'" />';   
                    html +='           <label for="basic_'+details[i].diamond_id+'"></label></td>';
                    html +='    <td>'+stock_id +'</td>';
                    html +='    <td class="text-uppercase">'+shape +'</td>';
                    html +='    <td>'+weight+' </td>';
                    html +='    <td>'+color+' </td>';
                    html +='    <td>'+grade+' </td>';
                    html +='    <td>'+cut+' </td>';
                    html +='    <td>'+polish+' </td>';
                    html +='    <td>'+symmetry+'</td>';
                    html +='    <td>'+fluorescence_int+'</td>';
                    //html +='    <td>'+rapnet_discount+'</td>';
                    html +='    <td>'+depth+'</td>';
                    html +='    <td>'+table_d+'</td>';
                    //html +='    <td>'+cash_price+'</td>';
                    html +='    <td>$'+total_price+'</td>  ';
                    html +='    <td>'+lab+'</td>';                    
                    html +='    <td>'+measurements+'</td>';
                    //html +='    <td>'+rap_seller+'</td>';
                    //html +='    <td>'+created_at+'</td>';                    
                    html +='</tr>';
                }
                      
                $('#example').dataTable().fnDestroy();              

                $("#total_records").html(total_records);
                $("#add_data").html(html);

                $('#example').DataTable({                    
                    "retrieve": true,                    
                    "responsive": true, 
                    "autoWidth": false ,               
                    "scrollY": '750',   
                    "scrollX": true,
                    "ordering": true,
                    "paging": false,
                    "searching": false,
                    "info": false,                                                          
                });        
            },
            beforeSend: function () {
                $(".page-loader-wrapper").show();
            },
            complete: function () {
                $(".page-loader-wrapper").fadeOut();
                $('[data-toggle="tooltip"]').tooltip(); 
            }
        });
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function delete_data()
{
     //alert('delete');
      var checkbox_arr = [];
      $.each($("input[name='checkbox_record[]']:checked"), function(){            
          checkbox_arr.push($(this).val());
      });
      if(checkbox_arr.length)
      {     
            alertify.confirm(
            siteName, 
            'Are you sure ?', 
            function(evt, value)
            {
                    $.ajax({
                        url: base_url+'admin_lab_grown_diamond/delete_diamond',
                        dataType: 'json',
                        type: 'get',            
                        data: { "all_id": checkbox_arr, },                                         
                        success: function(data){
                            location.reload();
                            $.each(checkbox_arr, function (index, value) {                      
                                  $("#tr_"+value).remove();
                            });
                            
                        },
                        beforeSend: function () {
                            $("#loadingDiv").show();
                            $("#body").addClass('opacity-body');
                        },
                        complete: function () {
                            $("#loadingDiv").hide();
                            $("#body").removeClass('opacity-body');
                        }
                     });
                }
            ,function(){ 
        });
      
      }
      else
      {      
          alert_boot('Please,Select atleast one stone.');
      }     
     
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

 // alert(checkbox_arr);
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
        // $("#alert_modal_message").text('Please,Select atleast one record!'); 
        // $("#alert_modal").modal();  
        alert_boot('Please,Select atleast one stone.');    
  }     
     
 }
    //+++++++++++++ Print Data List+++++++++++++++

 function print_data()
        {
     //alert('print data');
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
        //var html_1="";
        var checkbox_arr = [];
        $.each($("input[name='checkbox_record[]']:checked"), function(){            
            checkbox_arr.push($(this).val());
        });
        //alert(checkbox_arr);
        if(checkbox_arr.length)
        {
            //alert(checkbox_arr.length);
            $.ajax({
            url: base_url+'admin_lab_grown_diamond/print_data',
            dataType: 'json',
            type: 'get',            
            data: { "all_id": checkbox_arr },            
            success: function(data){
                    var data=data.records;
                    var data_length=data.length;
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
                        html +='    <td>'+lab+'</td>';
                        
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
            alert_boot('Please, Select atleast one stone for print list.');
        }
  }   
  function open_windows(src)
  {       
      window.open(src, "Diamond", "width=500, height=500");
  }
  function print(html)
  {
    //alert(html);
    var mywindow = window.open();
    mywindow.document.write('<html><head><title>Print Stone</title>');            
    mywindow.document.write('</head><body >');
    mywindow.document.write(html);
    mywindow.document.write('</body></html>');

    mywindow.print();
    mywindow.close();

    return true;
  }
  //+++++++++++++++++++++ Calculation Modal
  
//++++++++++++++++++++++++ More Details ++++++++++++++++++++++++++
function showSlides(n) 
{
    $(".mySlides").hide();
    $("#easy_zoom").hide();
    
    $("#slides_"+n).show();  
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

   function download(file_type)
   {    
        var checkbox_arr = [];
        $.each($("input[name='checkbox_record[]']:checked"), function(){            
            checkbox_arr.push($(this).val());
        });
        
        //alert(checkbox_arr);
        if(checkbox_arr.length)
        {
            //alert(checkbox_arr.length);
            $.ajax({
            url: base_url+'admin_lab_grown_diamond/download_file',
            dataType: 'json',
            type: 'get',            
            data: { "all_id": checkbox_arr },            
            success: function(data){
                    //alert(data);
                    var image_array=data.image_array;
                    var image_length=image_array.length;

                    var video_array=data.video_array;
                    var video_length=video_array.length;

                    var certificate_array=data.certificate_array;
                    var certificate_length=certificate_array.length;
                    //alert(image_length);
                    if(file_type=='image')
                    {
                        for(i=0;i<image_length;i++)
                        {     
                            //alert(image_array[0]);      
                            var link = document.createElement('a');                        
                            document.body.appendChild(link);
                            link.setAttribute("type", "hidden"); 
                            link.download = '../'+image_array[i];
                            link.href = '../'+image_array[i];
                            link.click();
                        }
                    }
                    else if(file_type=='video')
                    {
                        for(i=0;i<video_length;i++)
                        {          
                            var link = document.createElement('a');                        
                            document.body.appendChild(link);
                            link.setAttribute("type", "hidden"); 
                            link.download = '../'+video_array[i];
                            link.href = '../'+video_array[i];
                            link.click();
                        }
                    }
                    else if(file_type=='certificate')
                    {
                        for(i=0;i<certificate_length;i++)
                        {        
                            var link = document.createElement('a');                        
                            document.body.appendChild(link);
                            link.setAttribute("type", "hidden"); 
                            link.download = '../'+certificate_array[i];
                            link.href = '../'+certificate_array[i];
                            link.click();
                        }
                    }
                    
                }
            });
        }
        else
        {
            // $("#alert_modal_message").text('Please,Select atleast one stone.'); 
            // $("#alert_modal").modal();
            alert_boot('Please,Select atleast one stone.');
        }
   } 
    
  
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function add_cart(){        
  var checkbox_arr = [];
  $.each($("input[name='checkbox_record[]']:checked"), function(){            
      checkbox_arr.push($(this).val());
  });
  if(checkbox_arr.length)
  {
      $.ajax({
        url: base_url+'add-cart',
        dataType: 'json',
        type: 'post',            
        data: { "all_id": checkbox_arr, },                                         
        success: function(data){
            //alert(data.message);                
            $("#add_cart_message").text(data.message);      
        },   

    });
      //alert('added to cart!');
      $("#add_cart_modal").modal({backdrop: "static"});
  }
  else
  {
      $("#alert_modal_message").text('Please,Select atleast one stone.'); 
      $("#alert_modal").modal();
  }            
        
}
function remove_cart(){        
  var checkbox_arr = [];
  $.each($("input[name='checkbox_record[]']:checked"), function(){            
      checkbox_arr.push($(this).val());
  });
  if(checkbox_arr.length)
  {
      $.ajax({
        url: base_url+'remove-cart',
        dataType: 'json',
        type: 'post',            
        data: { "all_id": checkbox_arr, },                                         
        success: function(data){
            //alert(data);                
            $("#remove_cart_message").text(data.message);     
        },   

    });
      //alert('Removed Form Cart!');
      $("#remove_cart_modal").modal({backdrop: "static"});
      //location.reload();
  }
  else
  {
      //alert('Please,Select atleast one stone.');
      $("#alert_modal_message").text('Please,Select atleast one stone.'); 
      $("#alert_modal").modal();
  }            
        
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function export_list()
{

  var checkbox_arr = [];
  $.each($("input[name='checkbox_record[]']:checked"), function(){            
      checkbox_arr.push($(this).val());
  });
  if(checkbox_arr.length)
  {
      location.href=base_url+'admin_lab_grown_diamond/export_diamond?all_id='+checkbox_arr    
  }
  else
  {
      if(confirm('Do You Want To Download All Record ?'))
      {
          location.href=base_url+'admin_lab_grown_diamond/export_diamond?all_id='
      }
      //$("#alert_modal_message").text('Do You Want To Download All Record ?'); 
      //$("#alert_modal").modal();
  }            
        

}
    