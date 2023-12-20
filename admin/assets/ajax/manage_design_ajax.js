$(document).ready(function(){
    var url=base_url+'design/load_more_data?page='; 
    pagination(url);
   
    //alert(base_url); 
    $('#pagination-div-id a').each(function () {
        var a=$(this).attr("href");
        $(this).attr("onclick",'pagination("'+a+'")');
        $(this).attr("href","javascript:void(0)");
    }); 
    $('#form input').change(function() {
       submitForm();       
    });
});
function submitForm() {
    var url=base_url+'design/load_more_data?page='; 
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
                var co_text="'Are You Sure?'";              
                //alert(total_records);
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
                    var a= "'"+details[i].design_id+"'";
                    html +='<tr style="font-size:12px; font-weight:bold;" id="tr_'+details[i].design_id+'">';
                   html +='    <td>';  
                   html +='      <a class="btn btn-default" href="'+base_url+'design/design_details/'+details[i].design_id+'">';                                     
                   html +='        <i class="fa fa-search-plus"  title="View details" data-toggle="tooltip" style=""></i>';
                   html +='      </a>';
                   html +='      <a  class="btn btn-primary" href="'+base_url+'design/design_edit/'+details[i].design_id+'">';                                     
                   html +='        <i class="fa fa-edit"  title="Edit details" data-toggle="tooltip" style=""></i>';
                   html +='      </a>';
                   html +='      <a href="'+base_url+'design/delete/'+details[i].design_id+'" onclick="return confirm('+co_text+')">';                                     
                   html +='        <button class="btn btn-danger"><i class="fa fa-trash"  title="Delete" data-toggle="tooltip" style=""></i></button>';
                   html +='      </a>';
                   html +='    </td>';
                  // html +='    <td>';
                   //html +='        <input type="checkbox" name="checkbox_record[]" id="" value="'+details[i].design_id+'" class="tr_checkbox" onclick="change_color('+a+')">';
                   //html +='    </td>';                    
                   if(details[i].create_date != null){ var date= details[i].create_date;
                                                        var d=new Date(date.split("/").reverse().join("-"));
                                                        var dd=d.getDate();
                                                        var mm=d.getMonth()+1;
                                                        var yy=d.getFullYear(); 
                                                        var create_date = mm+"/"+dd+"/"+yy;
                                                      }else{ var create_date=""; }
                    html +='    <td>'+create_date+'</td>'; 
                     if(details[i].status != null){ var status=details[i].status; }else{ var status=""; }
                    html +='    <td>'+status+' </td>';

                    if(details[i].processing_status != null){ var processing_status=details[i].processing_status; }else{ var processing_status=""; }
                     if(processing_status == 1){ var processing_status = 'New Quote';}
                     if(processing_status == 2){ var processing_status = 'Sent Quote';}
                     if(processing_status == 3){ var processing_status = 'Approved';}
                     if(processing_status == 4){ var processing_status = 'Sent CAD';}
                     if(processing_status == 5){ var processing_status = 'CAD Approved';}
                     if(processing_status == 6){ var processing_status = 'Finished';}
                    html +='    <td>'+processing_status+' </td>';

                     if(details[i].is_approved != null){ var is_approved=details[i].is_approved; }else{ var is_approved=""; }
                     if(is_approved == 0){ var approval = 'Pending';}
                     if(is_approved == 1){ var approval = 'Approved';}
                     if(is_approved == 2){ var approval = 'Reject';}
                    html +='    <td>'+approval+' </td>';
                     if(details[i].job_no != null){ var job_no=details[i].job_no; }else{ var job_no=""; }
                    html +='    <td>'+job_no+' </td>'; 
                     if(details[i].reference_number != null){ var reference_number=details[i].reference_number; }else{ var reference_number=""; }
                    html +='    <td>'+reference_number+' </td>';   
                   if(details[i].company != null){ var company=details[i].company; }else{ var company=""; }
                    html +='    <td>'+company +'</td>';
                    if(details[i].name != null){ var name=details[i].name; }else{ var name=""; }
                    html +='    <td class="text-uppercase">'+name +'</td>';
                    if(details[i].contact != null){ var contact=details[i].contact; }else{ var contact=""; }
                    html +='    <td>'+contact+' </td>';
                    if(details[i].email != null){ var email=details[i].email; }else{ var email=""; }
                    html +='    <td>'+email+' </td>'; 
                   
                                    
                    if(details[i].msg != null){ var msg=details[i].msg; }else{ var msg=""; }
                    html +='    <td><textarea cols="70">'+msg+' </textarea></td>';
                    if(details[i].frame != null){ var frame=details[i].frame; }else{ var frame=""; }
                    html +='    <td>'+frame+' </td>';
                    if(details[i].size != null){ var size=details[i].size; }else{ var size=""; }
                    html +='    <td>'+size+' </td>';
                    if(details[i].metal != null){ var metal=details[i].metal; }else{ var metal=""; }
                    html +='    <td>'+metal+' </td>';
                    if(details[i].center_diamond != null){ var center_diamond=details[i].center_diamond; }else{ var center_diamond=""; }
                    html +='    <td>'+center_diamond+' </td>';
                    if(details[i].remark != null){ var remark=details[i].remark; }else{ var remark=""; }
                    html +='    <td>'+remark+' </td>';
                   
                   // if(details[i].type != null){ var type=details[i].type; }else{ var type=""; }
                   // html +='    <td>'+type+' </td>';                   
                   // if(details[i].item_no != null){ var item_no=details[i].item_no; }else{ var item_no=""; }
                   // html +='    <td>'+item_no+' </td>';
                   // if(details[i].product_title != null){ var product_title=details[i].product_title; }else{ var product_title=""; }
                   // html +='    <td>'+product_title+' </td>';
                   // if(details[i].size != null){ var size=details[i].size; }else{ var size=""; }
                   // html +='    <td>'+size+'</td>'; 
                   // if(details[i].metal != null){ var metal=details[i].metal; }else{ var metal=""; }
                   // html +='    <td>'+metal+'</td>';
                   // if(details[i].diamond_clarity != null){ var diamond_clarity=details[i].diamond_clarity; }else{ var diamond_clarity=""; }
                   // html +='    <td>'+diamond_clarity+'</td>';
                                            
                   // if(details[i].diamond_weight != null){ var diamond_weight=details[i].diamond_weight; }else{ var diamond_weight=""; }      
                   // html +='    <td>'+diamond_weight+'</td>';
                   // if(details[i].engraving != null){ var engraving=details[i].engraving; }else{ var engraving=""; }
                   // html +='    <td>'+engraving+'</td>';

                   
                    
                //    if(details[i].cost_carat != null){ var cost_carat=parseInt(details[i].cost_carat); }else{ var cost_carat=""; }
                //    html +='    <td>'+cost_carat+'</td>';
                 //   if(details[i].rapnet != null){ var rapnet=parseInt(details[i].rapnet); }else{ var rapnet=""; }
                //    html +='    <td>'+rapnet+'</td>';
                   
                //    if(details[i].lab != null){ var lab=details[i].lab; }else{ var lab=""; }
                //    html +='    <td><span title="'+lab+'" data-toggle="tooltip">';
                //    if(lab=='GIA')
                //    {
               //         html +='<a target="_blank" href="https://www.gia.edu/report-check?reportno='+details[i].UDF4+'">'+lab+'</a>';
                //    }
               //     else
                //    {
                //        html +=lab;
                //    }
                    
               //     html +='</span></td>';
                    
               //     if(details[i].measurements != null){ var measurements=details[i].measurements; }else{ var measurements=""; }
               //     html +='    <td>'+measurements+'</td>';
                    // if(details[i].create_date != null){ var create_date=details[i].create_date; }else{ var create_date=""; }
                    // html +='    <td>'+create_date+'</td>';
                    
                    html +='</tr>';

                }
                //alert(html);               

                $("#total_records").html(total_records);
                $("#add_data").html(html);

                // $('#example').DataTable( {                    
                //     "retrieve": true,
                //     "scrollY": 650,
                //     "scrollX": true,
                //     "paging": false,
                //     "info":     false,
                    
                //   } );

                 $('#example').dataTable().fnDestroy();
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
                $("#loadingDiv").hide();
                $("#body").removeClass('opacity-body');
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
         //ConfirmDialog('Are you sure');
         bootbox.confirm({
            title: "cincostar.com",
            message: "Are you sure! you want to delete Inventory?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-primary'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if(result)
                {
                    $.ajax({
                        url: base_url+'diamond/delete_diamond',
                        dataType: 'json',
                        type: 'get',            
                        data: { "all_id": checkbox_arr, },                                         
                        success: function(data){
                            
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
            }
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
                html +='<th >Stock #</th>'; 
                html +='<th >Shape</th>'; 
                html +='<th >Qt Wt.</th>'; 
                html +='<th >Color</th>'; 
                html +='<th >Grade</th>'; 
                html +='<th >Cut</th>'; 
                html +='<th >Polish</th>'; 
                
                html +='<th >Sym</th>'; 
                html +='<th >Flour</th>'; 
                html +='<th >Disc%</th>'; 
                html +='<th  >Depth%</th>'; 
                html +='<th  >Table%</th>'; 
                //html +='<th  >Rap.($)</th>'; 
                html +='<th  >$/Carat</th>'; 
                html +='<th  >Total $</th>'; 
                //html +='<th  >Desc</th>'; 
                html +='<th  >Lab</th>'; 
                //html +='<th  >Pic</th>'; 
                //html +='<th  >Brand</th>'; 
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
            url: base_url+'diamond/print_data',
            dataType: 'json',
            type: 'get',            
            data: { "all_id": checkbox_arr },            
            success: function(data){
                    //alert(data);
                    var data=data.records;
                    var data_length=data.length;
                    //alert(data.length);
                    for(i=0;i<data_length;i++)
                    {
                        count=parseInt(i)+1;
                        var a= "'"+data[i].stock_id+"'";
                        html +='<tr style="font-size:12px; font-weight:bold;" id="tr_'+data[i].stock_id+'">';                    
                        html +='    <td>'+count+'</td>';
                        html +='    <td>'+data[i].stock_id+'</td>';
                        if(data[i].shape != null){ var shape=data[i].shape; }else{ var shape=""; }
                        html +='    <td>'+shape +'</td>';
                        if(data[i].weight != null){ var weight=parseFloat(data[i].weight).toFixed(2); }else{ var weight=""; }
                        html +='    <td>'+weight+' </td>';
                        if(data[i].color != null){ var color=data[i].color; }else{ var color=""; }
                        html +='    <td>'+color+' </td>';
                        if(data[i].grade != null){ var grade=data[i].grade; }else{ var grade=""; }
                        html +='    <td>'+grade+' </td>';
                        if(data[i].cut != null){ var cut=data[i].cut; }else{ var cut=""; }
                        html +='    <td>'+cut+' </td>';
                        if(data[i].polish != null){ var polish=data[i].polish; }else{ var polish=""; }
                        html +='    <td>'+polish+' </td>';
                        if(data[i].symmetry != null){ var symmetry=data[i].symmetry; }else{ var symmetry=""; }
                        html +='    <td>'+symmetry+'</td>';
                        if(data[i].fluorescence_int != null){ var fluorescence_int=data[i].fluorescence_int; }else{ var fluorescence_int=""; }
                        html +='    <td>'+fluorescence_int+'</td>';
                        if(data[i].rapnet_discount != null){ var rapnet_discount=parseFloat(data[i].rapnet_discount).toFixed(1); }else{ var rapnet_discount=""; }
                        html +='    <td>'+rapnet_discount+'</td>';
                              
                        if(data[i].depth != null){ var depth=parseFloat(data[i].depth).toFixed(1); }else{ var depth=""; }      
                        html +='    <td>'+depth+'</td>';
                        if(data[i].table != null){ var table=parseInt(data[i].table); }else{ var table=""; }
                        html +='    <td>'+table+'</td>';
                        if(data[i].cost_carat != null){ var cost_carat=parseInt(data[i].cost_carat); }else{ var cost_carat=""; }
                        html +='    <td>'+cost_carat+'</td>';
                        
                        if(data[i].rapnet != null){ var rapnet=parseInt(data[i].rapnet); }else{ var rapnet=""; }
                        html +='    <td>'+parseInt(rapnet)+'</td>';
                       if(data[i].report_no != null){ var report_no=data[i].report_no; }else{ var report_no=""; }
                        if(data[i].lab != null){ var lab=data[i].lab; }else{ var lab=""; }
                        html +='    <td><a href="https://www.gia.edu/report-check?reportno='+report_no+'">'+lab+'</a></td>';
                       
                        
                        if(data[i].measurements != null){ var measurements=data[i].measurements; }else{ var measurements=""; }
                        html +='    <td>'+measurements+'</td></tr>';
                    }
                    html +='    </table>';
                    //alert(html);
                    print(html);                    
                },            
            });              
        }
        else
        {
            
             //alert('Please, Select atleast one stone for print list.');
            // $("#alert_modal_message").text('Please, Select atleast one stone for print list.'); 
            // $("#alert_modal").modal('show');
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
            url: base_url+'diamond/download_file',
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
      location.href=base_url+'diamond/export_diamond?all_id='+checkbox_arr    
  }
  else
  {
      if(confirm('Do You Want To Download All Record ?'))
      {
          location.href=base_url+'diamond/export_diamond?all_id='
      }
      //$("#alert_modal_message").text('Do You Want To Download All Record ?'); 
      //$("#alert_modal").modal();
  }            
        

}
    