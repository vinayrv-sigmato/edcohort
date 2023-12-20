$(document).ready(function(){  
    var url=base_url+'load-product-review?page='; 

    //if(segment_1=="jewelry"){
        pagination(url);
    //}      
    //alert(base_url); 
    // $('#form input').change(function() {
    //    submitForm();
    // }); 
    
});
// function submitForm() {
//     var url=base_url+'load-more-product?page='; 
//     loadMoreData(url); 
// }
function pagination(argument) {  
    loadMoreData(argument);    
}
// function setFilter()
// {
//     var html='';
//     $.each($("input[name='metal_color_filter[]']:checked"), function(){    
//             html +='';
//             html +='<span class="form-item last"> ';
//             html +='    <span> ';
//             html +='        <span class="filterDisplayName">'+ $(this).attr('data-item') +'</span>';
//             html +='    </span> ';
//             html +='</span>';
//     });
//     $.each($("input[name='metal_type_filter[]']:checked"), function(){    
//             html +='';
//             html +='<span class="form-item last"> ';
//             html +='    <span> ';
//             html +='        <span class="filterDisplayName">'+ $(this).attr('data-item') +'</span>';
//             html +='    </span> ';
//             html +='</span>';
//     });
//     $.each($("input[name='total']:checked"), function(){    
//             html +='';
//             html +='<span class="form-item last"> ';
//             html +='    <span> ';
//             html +='        <span class="filterDisplayName">'+ $(this).attr('data-item') +'</span>';
//             html +='    </span> ';
//             html +='</span>';
//     });
//     $.each($("input[name='size']:checked"), function(){    
//             html +='';
//             html +='<span class="form-item last"> ';
//             html +='    <span> ';
//             html +='        <span class="filterDisplayName">'+ $(this).attr('data-item') +'</span>';
//             html +='    </span> ';
//             html +='</span>';
//     });
//     //alert(html);
//     $("#filter_item").html(html);
// }

//  $(function () {
//     $("#checkAll").click(function () {
        
//         if ($("#checkAll").is(':checked')) {
//             $(".tr_checkbox").prop("checked", true);
//         } else {
//             $(".tr_checkbox").prop("checked", false);
//         }
//     });
// }); 

    function loadMoreData(url_data){  

        //setFilter();

        // var compare_session=$("#compare_session").val();
        // if(compare_session===undefined)
        // {
        //      compare_session="";
        // }
        // var text_color="";
        // var compare_title="Add To Compare";      
        var product_id=$("#product_id").val();       
        var per_page=$("#per_page").val();  
        var sort=$("#sort").val();  
        var value_form = $.param({"product_id":product_id, "per_page": per_page, "sort": sort});
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
                //alert(details.length);
                $("#pagination-div-id").html(page_link);
                $('#pagination-div-id a').each(function () {
                    var a=$(this).attr("href");
                    $(this).attr("onclick",'pagination("'+a+'")');
                    $(this).attr("href","javascript:void(0)");
                }); 
 
                var html="";
                for(var i=0;i<details.length;i++)
                {      
                    // var product_name,product_price;    
                    // if(details[i].product_name!=null){ var product_name=details[i].product_name; }else{ var product_name=""; }
                    // if(details[i].product_price!=null){ var product_price=parseInt(details[i].product_price); }else{ var product_price=""; }
                    // if(details[i].product_sale_price > 0){ var price_sale='<span class="price price--rrp">$'+details[i].product_price+'</span>' }
                    // else{ price_sale=""; }

                    
                    //     html +=' <li class="wow fadeInUp" data-wow-delay="0.3s">';
                    //     html +='<div class="product-col product-space item position-relative product-overlay">';
                    //     html +='  <div class="product-div product-bg position-relative product-overlay">';
                    //     html +=' <a href="'+base_url+'jewelry-details/'+details[i].product_slug+'">';                        
                    //     html +='    <figcaption class="product-image"> <img src="'+base_url+details[i].image_show+'"> </figcaption>';
                    //     html +='    </a>';
                    //     html +='    <div class="quick-buy">';
                    //     html +='      <div class="product-share">'; 
                    //     html +='        <a href="javascript:void(0)" onClick="add_wish('+details[i].product_id+',this,0)" class="highlight-button-dark btn btn-small no-margin-right quick-buy-btn" title="Add to Wishlist" data-wow-duration="300ms"><i class="fa fa-heart-o"></i></a>';
                    //     html +='        <a href="javascript:void(0)"  onClick="add_compare('+details[i].product_id+',this,0)" class="'+text_color+' btn btn-small no-margin-right quick-buy-btn" title="'+compare_title+'" data-wow-duration="600ms"><i class="fa fa-refresh"></i></a>';
                    //     html +='        <a href="'+base_url+'jewelry-details/'+details[i].product_slug+'" class="highlight-button-dark btn btn-small no-margin-right quick-buy-btn" title="View Details" data-wow-duration="900ms"><i class="fa fa-eye"></i></a>'; 
                    //     html +='      </div>';
                    //     html +='    </div>';
                    //     html +='  </div>';
                    //     html +='  <div class="card-body">';
                    //     html +='    <h4 class="card-title fixed-height"> <a href="'+base_url+'jewelry-details/'+details[i].product_slug+'">'+product_name+'</a> </h4>';
                    //     html +='    <div class="card-text price-font-type" data-test-info-type="price">';
                    //     html +='      <div class="price-section price-section--withoutTax "> '+price_sale+' <span class="price price--withoutTax">'+details[i].product_price_show+'</span> </div>';
                    //     html +='    </div>';
                    //     html +='  </div>';
                    //     html +='</div>';  
                    //     html +=' </li>';    
                    if(details[i].product_review_title!=null){ var product_review_title=details[i].product_review_title; }else{ var product_review_title=""; }            
                    html +=`<div >
                      <div>
                        <span class="rewiew_name"><strong><i class="fa fa-user-circle-o"></i>`+ details[i].firstname+` `+details[i].lastname +`</strong></span> Gave 
                        <span class="rewiew_star">`; 
                          for (j=1; j <= 5 ; j++) { 
                            if(j<=details[i].product_rating){
                              html +=`<i class="fa fa-star"></i>`;
                            }else{
                               html +=`<i class="fa fa-star-o"></i>`;
                            }
                          } 
                        html +=`</span> On
                        <span class="rewiew_date"><strong> `+details[i].product_review_added+` </strong></span>
                      </div>
                      <div>
                        <strong>`+product_review_title+`</strong>
                        <p>`+ details[i].product_review+`</p>
                      </div>
                    </div>`; 
                }
                //alert(html);

                $("#total_records").html(total_records);
                $("#add_data").html(html);  
                //console.log(html)     
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
function print_detail(jewelry_id)
{
    //alert();
        var html='';       
            //alert(checkbox_arr);        
            //alert(checkbox_arr.length);
            $.ajax({
            url: base_url+'front/jewelry/print_details',
            dataType: 'json',
            type: 'get',            
            data: { "jewelry_id": jewelry_id },            
            success: function(result){
                    //console.log(result);
                    var data=result.records.records;                    
                    var image=result.records.image_array;
                   // alert(image);
                    var data_length=data.length;
                    //alert(image.length);
                    for(i=0;i<data_length;i++)
                    {
                       // alert(data[i].category);
                        count=parseInt(i)+1;
                        var a= "'"+data[i].jewelry_id+"'";
                    if(data[i].style != null){ var style=data[i].style; }else{ var style=""; }
                    if(data[i].category != null){ var category=data[i].category; }else{ var category=""; }
                    if(data[i].sub_category != null){ var sub_category=data[i].sub_category; }else{ var sub_category=""; }
                    if(data[i].short_description != null){ var short_description=data[i].short_description; }else{ var short_description=""; }
                    if(data[i].cash_price != null){ var cash_price=data[i].cash_price; }else{ var cash_price=""; }
                    if(data[i].metal_color != null){ var metal_color=data[i].metal_color; }else{ var metal_color=""; }
                    if(data[i].metal_type != null){ var metal_type=data[i].metal_type; }else{ var metal_type=""; }
                    if(data[i].diamond_weight != null){ var diamond_weight=data[i].diamond_weight; }else{ var diamond_weight=""; }
                    if(data[i].net_alloy != null){ var net_alloy=data[i].net_alloy; }else{ var net_alloy=""; }

                       
                       html +='<div id="description" class="tab-pane fade in active" role="tabpanel">';
                       html +='  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">';
                       html +='     <h3>STYLE : '+style+'</h3>';
                       html +='<table width="100%" border="0">';
                       html +='       <tr>';                      
                       html +='         <td colspan="2"><img width="70%" src="'+base_gb+''+ image +'"></td>';                                                                          
                       html +='         <td colspan="2">'+ style +' <br /> '+short_description+' </td>';
                       html +='       </tr>';
                       html +='       <tr>';                       
                       html +='       <tr>';
                       html +='       <tr>';                      
                       html +='         <td colspan="4"><h3>Product Details</h3></td>'; 
                       html +='       </tr>';
                       html +='       <tr>';                       
                       html +='       <tr>';
                       html +='         <td>Category : </td>'; 
                       html +='         <td>'+category+'</td>';
                       html +='         <td>Sub Category :</td>';                                                   
                       html +='         <td>'+ sub_category +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Style :  </td>'; 
                       html +='         <td>'+style+'</td>';
                       html +='         <td>Cash Price :</td>';                                                   
                       html +='         <td>'+ cash_price +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Metal Color : </td>'; 
                       html +='         <td>'+metal_color+'</td>';
                       html +='         <td>Metal Type :</td>';                                                   
                       html +='         <td>'+ metal_type +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Diamond Weight : </td>'; 
                       html +='         <td>'+diamond_weight+'</td>';
                       html +='         <td>Net Alloy :</td>';                                                   
                       html +='         <td>'+ net_alloy +' </td>';
                       html +='       </tr>';
                       html +='       <tr>';
                       html +='         <td>Description: </td>'; 
                       html +='         <td colspan="3">'+short_description+'</td>';                     
                       html +='       </tr>';                     
                       html +='    </table>';
                       html +='     </div>';
                       html +='   </div>';
                       html +='     <div align="center" style="margin-top:350px !important;">';
                       html +='     <a>'+base_url+'</a>';
                       html +='     </div>';
                      

                        
                    }
                    html +='    </table>';
                    //alert(html);
                    print(html);                    
                },            
            });              
        
  }

  //+++++++++++++++++++++++++++++++++++++++++

  function print(html)
  {
    //alert(html);
    var mywindow = window.open();
    mywindow.document.write('<html><head><title>Print</title>');            
    mywindow.document.write('</head><body >');
    mywindow.document.write(html);
    mywindow.document.write('</body></html>');

    mywindow.print();
    mywindow.close();

    return true;
  }
  
//++++++++++++++++++++++++ More Details ++++++++++++++++++++++++++
function showSlides(n) 
{
    //alert(n);
    $(".mySlides").hide();
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


  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function add_cart(jewelry_id,e,grid)
{  
    validate=1;
    var form = document.getElementById("cart_form").elements;
    for(var i = 0; i < form.length; i++){
      if(form[i].required == true && form[i].value.trim()==""){
        validate=0;
        $("[name='"+form[i].name+"']").focus();
        $("[name='"+form[i].name+"']").next('span').remove();
        $("[name='"+form[i].name+"']").after('<span class="text-danger">This Field Is Required!</span>');
      }
    }
    if(validate){
        var cart_quantity=$("#cart_quantity").val();
        
        var value_form = $('#cart_form').serialize()+'&'+$.param({ "jewelry_id": jewelry_id, "quantity": cart_quantity});

          $.ajax({
            url: base_url+'add-cart-jewelry',
            dataType: 'json',
            type: 'get',            
            data: value_form,                                         
            success: function(data){
                 if(data.status)
                 {
                    var details=data.records;
            
                    $("#total_cart_count_d").html(details.quantity);
                    $(".fa-shopping-cart").effect("bounce",{times:3,distance:7},'slow');                              
                 }
                 else if(data.message=='login')
                 {
                    $("#login_modal").modal('show');
                 }
                 else{
                    alert_boot(data.message);
                 }
                
            },
            // beforeSend: function () {
            //     $("#loadingDiv").show();
            //     $("#body").addClass('opacity-body');
            // },
            // complete: function () {
            //     $("#loadingDiv").hide();
            //     $("#body").removeClass('opacity-body');
            // } 

        });  
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
           
        
}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function add_wish(jewelry_id,e){        

      $.ajax({
        url: base_url+'add-wish-jewelry',
        dataType: 'json',
        type: 'get',            
        data: { "jewelry_id": jewelry_id, },                                         
        success: function(data){
             
             if(data.message=='ok')
             {
                 var details=data.records;
            
                 $("#total_wish_count_d").html(details.quantity);                 
                 $(".fa-heart").effect("bounce",{times:3,distance:7},'slow');

                 // $(e).attr('href',base_url+'wishlist');
                 // $(e).attr('onclick','');
                 // $(e).html('<span class="fa fa-heart" aria-hidden="true"></span> Go To Wishlist');
             }
             else if(data.message=='login')
             {
                $("#login_modal").modal('show');
             }
            
        },
        // beforeSend: function () {
        //     $("#loadingDiv").show();
        //     $("#body").addClass('opacity-body');
        // },
        // complete: function () {
        //     $("#loadingDiv").hide();
        //     $("#body").removeClass('opacity-body');
        // } 

    });                 
        
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function add_compare(jewelry_id,e){        

        $.ajax({
        url: base_url+'add-compare-jewelry',
        dataType: 'json',
        type: 'get',            
        data: { "jewelry_id": jewelry_id, },
        success: function(data){
                if(data.message!=""){
                   //alert_boot(data.message);
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(data.message);            
                }

                //$('#fa_compare_'+jewelry_id).toggleClass('text-red');
                if($(e).hasClass("highlight-button-orange")){
                    $(e).removeClass("highlight-button-orange").addClass("highlight-button-dark");
                }else{
                  $(e).removeClass("highlight-button-dark").addClass("highlight-button-orange");                    
                }
                if($(e).attr("title")=='Remove From Compare'){
                    $(e).attr("title","Add To Compare");
                }else{
                  $(e).attr("title","Remove From Compare");   
                }
            }, 
        });

}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


//------------------ Send Email -------------------------------------//
function send_data()
{
    // alert('send data');
       
        var checkbox_arr = [];
        $.each($("input[name='checkbox_record[]']:checked"), function(){            
            checkbox_arr.push($(this).val());
        });
        //alert(checkbox_arr);
        if(checkbox_arr.length)
        {
            // alert(checkbox_arr.length);
            
            $("#alert_emailmodal_message").text('You are selected '+checkbox_arr.length+' stones. Your recipient will recieve the details on your selected stones..');
            $("#checkbox_arr").val(checkbox_arr);           
            $("#alert_emailmodal").modal('show');
            
            $.ajax({
            url: base_url+'send-data',
            dataType: 'json',
            type: 'post',            
            data: { "all_id": checkbox_arr },            
            success: function(data){
                    //alert(data);
                    var data=data.records;
                    //alert(data.length);
                    for(i=0;i<data.length;i++)
                    {
                        count=parseInt(i)+1;
                        var a= "'"+data[i].SN_SERIALNO+"'";
                        html +='<tr style="font-size:12px; font-weight:bold;" id="tr_'+data[i].SN_SERIALNO+'">';                    
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
                        if(data[i].SN_CUT != null){ var SN_CUT=data[i].SN_CUT; }else{ var SN_CUT=""; }
                        html +='    <td>'+SN_CUT+' </td>';
                        if(data[i].SN_POLISH != null){ var SN_POLISH=data[i].SN_POLISH; }else{ var SN_POLISH=""; }
                        html +='    <td>'+SN_POLISH+' </td>';
                        if(data[i].SYMMETRY != null){ var SYMMETRY=data[i].SYMMETRY; }else{ var SYMMETRY=""; }
                        html +='    <td>'+SYMMETRY+'</td>';
                        if(data[i].FLUORESCENCE_INT != null){ var FLUORESCENCE_INT=data[i].FLUORESCENCE_INT; }else{ var FLUORESCENCE_INT=""; }
                        html +='    <td>'+FLUORESCENCE_INT+'</td>';
                        if(data[i].FL_RAPNET_DISCOUNT != null){ var FL_RAPNET_DISCOUNT=parseFloat(data[i].FL_RAPNET_DISCOUNT).toFixed(1); }else{ var FL_RAPNET_DISCOUNT=""; }
                        html +='    <td>'+FL_RAPNET_DISCOUNT+'</td>';
                              
                        if(data[i].PC_DEPTH != null){ var PC_DEPTH=parseFloat(data[i].PC_DEPTH).toFixed(1); }else{ var PC_DEPTH=""; }      
                        html +='    <td>'+PC_DEPTH+'</td>';
                        if(data[i].PC_TABLE != null){ var PC_TABLE=parseInt(data[i].PC_TABLE); }else{ var PC_TABLE=""; }
                        html +='    <td>'+PC_TABLE+'</td>';
                        if(data[i].COST_CARAT != null){ var COST_CARAT=parseInt(data[i].COST_CARAT); }else{ var COST_CARAT=""; }
                        html +='    <td>'+COST_CARAT+'</td>';
                        
                        if(data[i].FL_RAPNET != null){ var FL_RAPNET=parseInt(data[i].FL_RAPNET); }else{ var FL_RAPNET=""; }
                        html +='    <td>'+parseInt(data[i].FL_RAPNET)+'</td>';
                       if(data[i].UDF4 != null){ var UDF4=data[i].UDF4; }else{ var UDF4=""; }
                        if(data[i].SN_LAB != null){ var SN_LAB=data[i].SN_LAB; }else{ var SN_LAB=""; }
                        html +='    <td><a href="https://www.gia.edu/report-check?reportno='+UDF4+'">'+SN_LAB+'</a></td>';
                       
                        
                        if(data[i].MEASUREMENTS != null){ var MEASUREMENTS=data[i].MEASUREMENTS; }else{ var MEASUREMENTS=""; }
                        html +='    <td>'+MEASUREMENTS+'</td></tr>';
                    }
                    html +='    </table>';
                    alert(html);
                    print(html);                    
                },            
            });              
        }
        else
        {
            
             //alert('Please, Select atleast one stone for print list.');
            $("#alert_modal_message").text('Please, Select atleast one stone for send email.'); 
            $("#alert_modal").modal('show');
        }
  } 
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function get_subcategory(value)
    {
        //alert(value);
        
        $.ajax({
            url: base_url+'front/jewelry/get_subcategory',
            dataType: 'json',
            type: 'post',            
            data: { "category": value }, 
                                      
            success: function(data){
                //alert(data);
                 var details=data.records;
 
                var html="";
                for(i=0;i<details.length;i++)
                {   
                     html +='<label class="checkbox">';
                     html +='<input type="checkbox" name="sub_category_filter[]" value="'+details[i].sub_category+'" >';
                     html +='<i></i> '+details[i].sub_category+'</label>';

                }
                //alert(html);
                $("#sub_category_div").append(html);
        
            }, 
            beforeSend: function () {
                $("#loadingDiv").show();                
            },
            complete: function () {
                $("#loadingDiv").hide();                
            }  

        });
    }



    