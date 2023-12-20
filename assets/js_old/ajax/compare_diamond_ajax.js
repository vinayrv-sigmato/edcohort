$(document).ready(function(){
    var url=base_url+'diamond-compare-ajax?page='; 
    pagination(url);

    $('#form_order input').change(function() {
        
       //submitForm();       
    });
});
function submitForm() {
    var url=base_url+'diamond-compare-ajax?page=';    
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
        var value_form = base_url+'diamond-compare-ajax?page=';
      
        $.ajax({
            url: url_data,
            dataType: 'json',
            type: 'get',            
            data: {},                                       
            success: function(data){                
                var details = data.records;  
                var isLogin = data.isLogin;
                var sample_image_array=data.sample_image_array;
                var image_array=data.image_array;
                  
                var html='';
                var details_length=details.length;
                if(!details_length)
                {
                    $("#add_data").html('');
                    alert_boot('Please Add Atleast Two Item to Compare.');
                }

               for(i=0;i<details_length;i++) {
                    if(details[i].stock_id != null){ var stock_id=details[i].stock_id; }else{ var stock_id=""; }
                    if(details[i].shape_full != null){ var shape=details[i].shape_full; }else{ var shape=""; }
                    if(details[i].weight != null){ var weight=parseFloat(details[i].weight).toFixed(2); }else{ var weight=""; }
                    if(details[i].color != null){ var color=details[i].color; }else{ var color=""; }
                    if(details[i].grade != null){ var grade=details[i].grade; }else{ var grade=""; }
                    if(details[i].cut_full != null){ var cut=details[i].cut_full; }else{ var cut=""; }
                    if(details[i].polish_full != null){ var polish=details[i].polish_full; }else{ var polish=""; }
                    if(details[i].symmetry_full != null){ var symmetry=details[i].symmetry_full; }else{ var symmetry=""; }
                    if(details[i].fluor_full != null){ var fluorescence_int=details[i].fluor_full; }else{ var fluorescence_int=""; }
                    if(details[i].depth != null){ var depth=parseFloat(details[i].depth).toFixed(1); }else{ var depth=""; }
                    if(details[i].table_d != null){ var table_d=parseInt(details[i].table_d); }else{ var table_d=""; }
                    if(details[i].rapnet_discount != null){ var rapnet_discount=parseFloat(details[i].rapnet_discount).toFixed(1); }else{ var rapnet_discount=""; }
                    if(details[i].rapnet != null){ var rapnet=Math.round(details[i].rapnet); }else{ var rapnet=""; }
                    if(details[i].cost_carat != null){ var cost_carat=Math.round(details[i].cost_carat); }else{ var cost_carat=""; }
                    if(details[i].total_price != null){ var total_price=Math.round(details[i].total_price); }else{ var total_price=""; }
                    if(details[i].lab != null){ var lab=details[i].lab; }else{ var lab=""; }
                    if(details[i].measurements != null){ var measurements=details[i].measurements; }else{ var measurements=""; }
                        
                    html +='<div class="diamond column labels" id="div_compare_'+details[i].diamond_id+'">';
                    html +='       <div class="c_body"><span><button class="btn btn-danger btn-xs radius-flat" onclick="remove('+details[i].diamond_id+')"><i class="fa fa-times"></i> Remove</button></span></div>';
                    html +='       <div class="c_body"><img src="'+image_array[i]+'" height="100"></div>';
                    html +='       <div class="c_body"><span><a class="btn btn-primary btn-xs radius-flat" href="'+base_url+'diamond-details/'+details[i].stock_id+'" target="_blank">View Details</a></span></div>';
                    html +='       <div class="c_body">';
                    // html +='           <a href="javascript:void(0)" onclick="add_cart('+details[i].diamond_id+')" title="Add To Cart" >';
                    // html +='           <span class="fa fa-shopping-cart" ></span></a>';
                    html +='           <a href="javascript:void(0)" onclick="add_wish('+details[i].diamond_id+')" title="Add To Wishlist"> ';                      
                    html +='           <span class="fa fa-heart" aria-hidden="true" ></span></a> ';
                    html +='       </div>';
                    html +='       <div class="c_body"><span>'+details[i].stock_id+'</span></div>';
                    html +='       <div class="c_body"><span>'+shape+'</span></div>';
                    html +='       <div class="c_body"><span>'+weight+'</span></div>';
                    html +='       <div class="c_body"><span>'+color+'</span></div>';
                    html +='       <div class="c_body"><span>'+grade+'</span></div>';
                    html +='       <div class="c_body"><span>'+cut+'</span></div>';
                    html +='       <div class="c_body"><span>'+polish+'</span></div>';
                    html +='       <div class="c_body"><span>'+symmetry+'</span></div>';
                    html +='       <div class="c_body"><span>'+fluorescence_int+'</span></div>';
                    html +='       <div class="c_body"><span>'+depth+'</span></div>';
                    html +='       <div class="c_body"><span>'+table_d+'</span></div>';
                    if(isLogin) {
                        html +='       <div class="c_body"><span>'+rapnet_discount+'%</span></div>';
                        html +='       <div class="c_body"><span>$'+rapnet+'</span></div>';
                        html +='       <div class="c_body"><span>$'+cost_carat+'</span></div>';
                        html +='       <div class="c_body"><span>$'+total_price+'</span></div>';
                    } else {
                        html +='       <div class="c_body"><span>*****</span></div>';
                        html +='       <div class="c_body"><span>*****</span></div>';
                        html +='       <div class="c_body"><span>*****</span></div>';
                        html +='       <div class="c_body"><span>*****</span></div>';
                    }
                    html +='       <div class="c_body"><span>'+lab+'</span></div>';
                    html +='       <div class="c_body"><span>'+measurements+'</span></div>';
                    html +='   </div>';
                } 

                //$("#total_records").html('Total orders: '+total_records);
                $("#add_data").after(html); 
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

    function remove(id)
    {
        var url_data = base_url+'remove-compare-diamond?page=';      
        $.ajax({
            url: url_data,
            dataType: 'json',
            type: 'get',            
            data: {'id': id},                                       
            success: function(data){         

                $('#div_compare_'+id).remove();
            },               

        });
        
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
                 $("i.fa-shopping-cart").effect("bounce",{times:3,distance:7},'slow');
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
                 $("i.fa-heart").effect("bounce",{times:3,distance:7},'slow');
             }
             else if(data.message=='login')
             {
                $("#login_modal").modal('show');
             }
        },
    });
}

    