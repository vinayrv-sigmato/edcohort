$(document).ready(function(){  
    var url=base_url+'load-more-course?page='; 
    if(segment_1=="course"){
        pagination(url);
    }      
    
    $('#form input').change(function() {
       submitForm();
    }); 
    
});
function submitForm() {
    var url=base_url+'load-more-course?page='; 
    loadMoreData(url); 
}
function pagination(argument) {  
    loadMoreData(argument);    
}
function setFilter()
{
    var html='';
    $.each($("input[name='board']"), function(){    
            html +='';
            html +='<span class="form-item last"> ';
            html +='    <span> ';
            html +='        <span class="filterDisplayName">'+ $(this).attr('data-item') +'</span>';
            html +='    </span> ';
            html +='</span>';
    });
    $.each($("input[name='class']"), function(){    
            html +='';
            html +='<span class="form-item last"> ';
            html +='    <span> ';
            html +='        <span class="filterDisplayName">'+ $(this).attr('data-item') +'</span>';
            html +='    </span> ';
            html +='</span>';
    });
    $.each($("input[name='batch']"), function(){    
            html +='';
            html +='<span class="form-item last"> ';
            html +='    <span> ';
            html +='        <span class="filterDisplayName">'+ $(this).attr('data-item') +'</span>';
            html +='    </span> ';
            html +='</span>';
    });
    //alert(html);
    $("#filter_item").html(html);
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

        setFilter();
        var text_color="";
        var display=$("#display").val();
        var per_page=$("#per_page").val();
        var sort=$("#sort").val();
        var value_form = $('#form').serialize()+'&'+$.param({ "per_page": per_page, "sort": sort});
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
                var details_length=details.length;                
                $("#pagination-div-id").html(page_link);
                $('#pagination-div-id a').each(function () {
                    var a=$(this).attr("href");
                    $(this).attr("onclick",'pagination("'+a+'")');
                    $(this).attr("href","javascript:void(0)");
                }); 
 
                var html="";
                for(var i=0;i<details_length;i++)
                {           
                    
                    var product_name,product_price;    
                    if(details[i].product_name!=null){ var product_name=details[i].product_name; }else{ var product_name=""; }
                    if(details[i].product_slug!=null){ var product_slug=details[i].product_slug; }else{ var product_slug=""; }
                    if(details[i].product_image!=null){ var product_image=details[i].product_image; }else{ var product_image=""; }
                   
                    if(display=="grid")
                    {

                        html +='<div class="popular-col">';
                        html +='<a href="'+product_slug+'">';
                        html +='<div class="popular-col-image"><img src="'+base_url+'uploads/brand/'+product_image+'" alt=""></div>';
                        html +='<h3>'+product_name+'</h3>';
                        html +='<div></div>';
                        html +='<div class="popular-col-rating">';
                        html +='<div class="popular-star-rating"><img src="'+base_url+'assets/images/rating.png" alt=""></div>';
                        html +='<span class="rating-number"><img src="'+base_url+'assets/images/Star.png" alt="">3.2</span>';
                        html +='</div>';
                        html +='</a>';
                        html +='</div>';
                  
                    }

                }
                $("#total_records").html(total_records);
                $(".total_records").html(total_records);
                $("#add_data").html(html);       
            },
            beforeSend: function () {
                $("#page-loader").show();
            },
            complete: function () {
                $("#page-loader").fadeOut();
                $('html, body').animate({ scrollTop: 0 }, 1000);
                $('[data-toggle="tooltip"]').tooltip(); 
            }  

        });
    } 



    