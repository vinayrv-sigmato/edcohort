$(document).ready(function(){
    var url=base_url+'jewelry-compare-ajax?page='; 
    loadMoreData(url);

});

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
        var value_form = base_url+'jewelry-compare-ajax?page=';      
        $.ajax({
            url: url_data,
            dataType: 'json',
            type: 'get',            
            data: {},                                       
            success: function(data){                
                var details=data.records;                     
                var html='';
                var details_length=details.length;
                if(!details_length)
                {
                    $("#add_data").html('');
                    alert_boot('Please Add Atleast Two Item to Compare.');
                }
                for(i=0;i<details_length;i++) {
                    if(details[i].stone_weight!=null){ stone_weight=details[i].stone_weight; }else{ stone_weight=""; }
                    if(details[i].diamond_weight!=null){ diamond_weight=details[i].diamond_weight; }else{ diamond_weight=""; }
                    if(details[i].net_alloy!=null){ net_alloy=details[i].net_alloy; }else{ net_alloy=""; }
                    if(details[i].metal_color!=null){ metal_color=details[i].metal_color; }else{ metal_color=""; }
                    if(details[i].metal_type!=null){ metal_type=details[i].metal_type; }else{ metal_type=""; }
                    if(details[i].product_price!=null){ product_price=parseInt(details[i].product_price); }else{ product_price=""; }
                    if(details[i].product_name!=null){ product_name=details[i].product_name; }else{ product_name=""; }
                    if(details[i].product_short_description!=null){ product_short_description=details[i].product_short_description; }else{ product_short_description=""; }
                    if(details[i].product_sale_price > 0){ var price_sale='<span class="price price--rrp">$'+details[i].product_price+'</span>' }else{ price_sale=""; }
                    
                    html +='<div class="diamond column labels" id="div_compare_'+details[i].product_id+'">';
                    html +='            <div class="c_body"><span><button class="btn btn-danger btn-xs radius-flat" onclick="remove('+details[i].product_id+')"><i class="fa fa-times"></i> Remove</button></span></div>';
                    html +='            <div class="c_body"><img src="'+details[i].image_show+'" height="100"></div>';
                    html +='            <div class="c_body"><span><a class="btn btn-primary btn-xs radius-flat" href="'+base_url+'jewelry-details/'+details[i].product_slug+'" target="_blank">View Details</a></span></div>';
                    html +='            <div class="c_body">';
                    //html +='                <a href="javascript:void(0)" onclick="add_cart('+details[i].product_id+')" title="Add To Cart" >';
                    //html +='                <span class="fa fa-shopping-cart" ></span></a>';
                    html +='                <a href="javascript:void(0)" onclick="add_wish('+details[i].product_id+')" title="Add To Wishlist">';
                    html +='                <span class="fa fa-heart" aria-hidden="true" ></span></a> ';
                    html +='            </div>';
                    html +='            <div class="c_body name"><span>'+product_name+'</span></div>';
                    html +='            <div class="c_body">'+price_sale+' <span>'+details[i].product_price_show+'</span></div>';                    
                    html +='            <div class="c_body"><span>'+metal_color+'</span></div>';
                    html +='            <div class="c_body"><span>'+metal_type+'</span></div>';
                    //html +='            <div class="c_body"><span>'+product_short_description+'</span></div>';
                    // html +='            <div class="c_body"><span>'+stone_weight+'</span></div>';
                    // html +='            <div class="c_body"><span>'+diamond_weight+'</span></div>';
                    // html +='            <div class="c_body"><span>'+net_alloy+'</span></div>';
                    html +='        </div>';
                }

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
        var url_data = base_url+'remove-compare-jewelry?page=';      
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
function add_cart(jewelry_id,e,grid){        

    var cart_size=$("#cart_size").val();
    var attr="";
    if(cart_size!="" && jQuery.type(cart_size)!=='undefined')
    {
        attr +='Size : '+cart_size;
    }

      $.ajax({
        url: base_url+'add-cart-jewelry',
        dataType: 'json',
        type: 'get',            
        data: { "jewelry_id": jewelry_id, attribute: attr},                                         
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
    