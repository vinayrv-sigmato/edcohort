function change_color(id)
{
    $("#tr_"+id).toggleClass("trColor");
}

$(document).ready(function(){
           $("label").click(function(){
            //var cls = $(this).attr("class");
            var ids = $(this).attr("id");                     

                if(ids=="label_make_3X")
                {
                    $(".yellow-color").removeClass("active1");
                   $(this).toggleClass("active1");
                }
                if(ids=="label_make_3EX")
                {
                    $(".yellow-color").removeClass("active1");
                   $(this).toggleClass("active1");
                }
                if(ids=="label_make_reset")
                {
                    $(".yellow-color").removeClass("active1");
                   $(this).toggleClass("active1");
                }

           });
        });
        $(document).ready(function(){
           $("label").click(function(){
            var cls = $(this).attr("class");
            
                if(cls=="labelShape" || cls=="labelShape activeColor")
                {
                    $(this).toggleClass("activeColor");
                }
                else if(cls=="yellow-color")
                {
                   $(this).toggleClass("active1");
                }      

    
           });
        });       
       
        $(document).ready(function(){
            $("#col_group_def").click(function(){                   
                if ($('#idDEF').is(":checked"))
                {                         
                  $(".col_def").prop('checked', false);
                }
                else
                {
                    $(".col_def").prop('checked', true);
                }                           
                $('label[for="idcolorD"]').toggleClass("active1"); 
                $('label[for="idcolorE"]').toggleClass("active1"); 
                $('label[for="idcolorF"]').toggleClass("active1");
            });
        });
        $(document).ready(function(){
            $("#col_group_gh").click(function(){                    
                if ($('#idGH').is(":checked"))
                {                         
                  $(".col_gh").prop('checked', false);
                }
                else
                {
                    $(".col_gh").prop('checked', true);
                }                           
                $('label[for="idcolorG"]').toggleClass("active1"); 
                $('label[for="idcolorH"]').toggleClass("active1"); 
            });
        });
        $(document).ready(function(){
            $("#col_group_ij").click(function(){                    
                if ($('#idIJ').is(":checked"))
                {                         
                  $(".col_ij").prop('checked', false);
                }
                else
                {
                    $(".col_ij").prop('checked', true);
                }                           
                $('label[for="idcolorI"]').toggleClass("active1"); 
                $('label[for="idcolorJ"]').toggleClass("active1"); 
            });
        });
        $(document).ready(function(){
            $("#col_group_klm").click(function(){                   
                if ($('#idKLM').is(":checked"))
                {                         
                  $(".col_klm").prop('checked', false);
                }
                else
                {
                    $(".col_klm").prop('checked', true);
                }                           
                $('label[for="idcolorK"]').toggleClass("active1"); 
                $('label[for="idcolorL"]').toggleClass("active1"); 
                $('label[for="idcolorM"]').toggleClass("active1"); 
            });
        });
        $(document).ready(function(){
            $("#label_make_3X").click(function(){                   
                    if ($('#idmake3X').is(":checked"))
                    {                                                 
                        $("#idcutEX").prop('checked', false);
                        $("#idpolishEX").prop('checked', false);
                        $("#idsymmEX").prop('checked', false);

                        $('label[for="idcutEX"]').removeClass("active1"); 
                        $('label[for="idpolishEX"]').removeClass("active1"); 
                        $('label[for="idsymmEX"]').removeClass("active1");                         
                    }
                    else
                    {                            
                        $("#idcutEX").prop('checked', true);
                        $("#idpolishEX").prop('checked', true);
                        $("#idsymmEX").prop('checked', true);

                        $('label[for="idcutEX"]').addClass("active1"); 
                        $('label[for="idpolishEX"]').addClass("active1"); 
                        $('label[for="idsymmEX"]').addClass("active1");                          
                    }   
                });
        });
        $(document).ready(function(){
            $("#label_make_3EX").click(function(){                  
                if ($('#idmake3EX-NONE').is(":checked"))
                {                         
                    $("#idcutEX").prop('checked', false);
                    $("#idpolishEX").prop('checked', false);
                    $("#idsymmEX").prop('checked', false);
                    $("#idflourNON").prop('checked', false);

                    $('label[for="idcutEX"]').removeClass("active1"); 
                    $('label[for="idpolishEX"]').removeClass("active1"); 
                    $('label[for="idsymmEX"]').removeClass("active1");
                    $('label[for="idflourNON"]').removeClass("active1");
                }
                else
                {
                    $("#idcutEX").prop('checked', true);
                    $("#idpolishEX").prop('checked', true);
                    $("#idsymmEX").prop('checked', true);
                    $("#idflourNON").prop('checked', true);

                    $('label[for="idcutEX"]').addClass("active1"); 
                    $('label[for="idpolishEX"]').addClass("active1"); 
                    $('label[for="idsymmEX"]').addClass("active1");
                    $('label[for="idflourNON"]').addClass("active1");
                }   
            });
        });
        $(document).ready(function(){
            $(':checkbox:checked').each(function(){
              var val = $(this).attr('id');
              var val_class = $(this).attr('name');
              //alert(val_class);
              if(val_class=="checkbox[]")
              {
                $('label[for="' + val + '"]').addClass("activeColor");
              }
              else
              {
                $('label[for="' + val + '"]').addClass("active1"); 
              }
            });
        });
// ++++++++++++++++++++Advance Search++++++++++++++++++++++++++++++++++++++++++
function show_search(){               
    $("#search_div").slideDown("3000");                
    $(".hide_show").html('<span class="nav-toggle" onclick="hide_search()" id="hide_advance"><i class="fa fa-arrow-circle-up"></i> Hide Filter</span>');        
}
function hide_search(){
    $("#search_div").slideUp("3000");               
    $(".hide_show").html('<span class="nav-toggle" onclick="show_search()" id="show_advance"><i class="fa fa-arrow-circle-down"></i> Show Filter</span>');
    //document.body.scrollTop = 0; // For Chrome, Safari and Opera 
    //document.documentElement.scrollTop = 0; // For IE and Firefox
}   
