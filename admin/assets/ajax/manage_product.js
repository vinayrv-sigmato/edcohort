        function change_color(id)
        {
            $("#tr_"+id).toggleClass("trColor");
        }
        $(document).ready(function(){
           $("label").click(function(){            

            var cls = $(this).attr("class");

                if(cls=="labelShape" || cls=="labelShape activeColor")
                {
                    $('.cls').toggleClass("activeColor");
                }
                else
                {
                   $('.cls').toggleClass("active");
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
                $('label[for="idcolorD"]').toggleClass("active"); 
                $('label[for="idcolorE"]').toggleClass("active"); 
                $('label[for="idcolorF"]').toggleClass("active");
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
                $('label[for="idcolorG"]').toggleClass("active"); 
                $('label[for="idcolorH"]').toggleClass("active"); 
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
                $('label[for="idcolorI"]').toggleClass("active"); 
                $('label[for="idcolorJ"]').toggleClass("active"); 
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
                $('label[for="idcolorK"]').toggleClass("active"); 
                $('label[for="idcolorL"]').toggleClass("active"); 
                $('label[for="idcolorM"]').toggleClass("active"); 
            });
        });
        $(document).ready(function(){
            $("#label_make_3X").click(function(){                   
                    if ($('#idmake3X').is(":checked"))
                    {                                                 
                        $("#idcutEX").prop('checked', false);
                        $("#idpolishEX").prop('checked', false);
                        $("#idsymmEX").prop('checked', false);

                        $('label[for="idcutEX"]').removeClass("active"); 
                        $('label[for="idpolishEX"]').removeClass("active"); 
                        $('label[for="idsymmEX"]').removeClass("active");                         
                    }
                    else
                    {                            
                        $("#idcutEX").prop('checked', true);
                        $("#idpolishEX").prop('checked', true);
                        $("#idsymmEX").prop('checked', true);

                        $('label[for="idcutEX"]').addClass("active"); 
                        $('label[for="idpolishEX"]').addClass("active"); 
                        $('label[for="idsymmEX"]').addClass("active");                          
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

                    $('label[for="idcutEX"]').removeClass("active"); 
                    $('label[for="idpolishEX"]').removeClass("active"); 
                    $('label[for="idsymmEX"]').removeClass("active");
                    $('label[for="idflourNON"]').removeClass("active");
                }
                else
                {
                    $("#idcutEX").prop('checked', true);
                    $("#idpolishEX").prop('checked', true);
                    $("#idsymmEX").prop('checked', true);
                    $("#idflourNON").prop('checked', true);

                    $('label[for="idcutEX"]').addClass("active"); 
                    $('label[for="idpolishEX"]').addClass("active"); 
                    $('label[for="idsymmEX"]').addClass("active");
                    $('label[for="idflourNON"]').addClass("active");
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
                $('label[for="' + val + '"]').addClass("active"); 
              }
            });
        });

         $(document).ready(function(){
            $("#status").click(function(){          
                    if ($('#quote').is(":checked"))
                    {                                           
                        $("#quote").prop('checked', true);
                        $('label[for="quote"]').addClass("active");                            
                    }
                    else
                    {                            
                        $("#quote").prop('checked', false); 
                        $('label[for="quote"]').removeClass("active");     
                    }  

                    if ($('#order').is(":checked"))
                    {                                           
                        $("#order").prop('checked', true);
                        $('label[for="order"]').addClass("active");                            
                    }
                    else
                    {                            
                        $("#order").prop('checked', false); 
                        $('label[for="order"]').removeClass("active");     
                    }  
                    if ($('#processed').is(":checked"))
                    {                                           
                        $("#processed").prop('checked', true);
                        $('label[for="processed"]').addClass("active");                            
                    }
                    else
                    {                            
                        $("#processed").prop('checked', false); 
                        $('label[for="processed"]').removeClass("active");     
                    }   

                     if ($('#completed').is(":checked"))
                    {                                           
                        $("#completed").prop('checked', true);
                        $('label[for="completed"]').addClass("active");                            
                    }
                    else
                    {                            
                        $("#completed").prop('checked', false); 
                        $('label[for="completed"]').removeClass("active");     
                    }   
                });
              $("#approval_status").click(function(){          
                    if ($('#pending_status').is(":checked"))
                    {                                           
                        $("#pending_status").prop('checked', true);
                        $('label[for="pending_status"]').addClass("active");                            
                    }
                    else
                    {                            
                        $("#pending_status").prop('checked', false); 
                        $('label[for="pending_status"]').removeClass("active");     
                    }   

                     if ($('#approved_status').is(":checked"))
                    {                                           
                        $("#approved_status").prop('checked', true);
                        $('label[for="approved_status"]').addClass("active");                            
                    }
                    else
                    {                            
                        $("#approved_status").prop('checked', false); 
                        $('label[for="approved_status"]').removeClass("active");     
                    }   
                });
                $("#processing_status").click(function(){          
                    if ($('#new_quote').is(":checked"))
                    {                                           
                        $("#new_quote").prop('checked', true);
                        $('label[for="new_quote"]').addClass("active");                            
                    }
                    else
                    {                            
                        $("#new_quote").prop('checked', false); 
                        $('label[for="new_quote"]').removeClass("active");     
                    }  

                    if ($('#sent_quote').is(":checked"))
                    {                                           
                        $("#sent_quote").prop('checked', true);
                        $('label[for="sent_quote"]').addClass("active");                            
                    }
                    else
                    {                            
                        $("#sent_quote").prop('checked', false); 
                        $('label[for="sent_quote"]').removeClass("active");     
                    }  
                    if ($('#approved').is(":checked"))
                    {                                           
                        $("#approved").prop('checked', true);
                        $('label[for="approved"]').addClass("active");                            
                    }
                    else
                    {                            
                        $("#approved").prop('checked', false); 
                        $('label[for="approved"]').removeClass("active");     
                    }   

                     if ($('#sent_cad').is(":checked"))
                    {                                           
                        $("#sent_cad").prop('checked', true);
                        $('label[for="sent_cad"]').addClass("active");                            
                    }
                    else
                    {                            
                        $("#sent_cad").prop('checked', false); 
                        $('label[for="sent_cad"]').removeClass("active");     
                    }  
                      if ($('#cad_approved').is(":checked"))
                    {                                           
                        $("#cad_approved").prop('checked', true);
                        $('label[for="cad_approved"]').addClass("active");                            
                    }
                    else
                    {                            
                        $("#cad_approved").prop('checked', false); 
                        $('label[for="cad_approved"]').removeClass("active");     
                    }
                      if ($('#finished').is(":checked"))
                    {                                           
                        $("#finished").prop('checked', true);
                        $('label[for="finished"]').addClass("active");                            
                    }
                    else
                    {                            
                        $("#finished").prop('checked', false); 
                        $('label[for="finished"]').removeClass("active");     
                    } 
                });
         });

        
// ++++++++++++++++++++Advance Search++++++++++++++++++++++++++++++++++++++++++
function show_search(){               
    $("#search_div").slideDown("3000");                       
    $(".hide_show").html('<span class="btn btn-danger btn-flat" onclick="hide_search()" id="hide_advance"><i class="fa fa-arrow-circle-up"></i> Hide Filter</span>');        
}
function hide_search(){
    $("#search_div").slideUp("3000");               
    $(".hide_show").html('<span class="btn btn-primary btn-flat" onclick="show_search()" id="show_advance"><i class="fa fa-arrow-circle-down"></i> Show Filter</span>');
    
}  
function show_advance(){
    
        $("#more_filter").slideDown("3000");                
        $(".hide_show").html('<span class="btn btn-sm btn-danger btn-flat" onclick="hide_advance()" id="hide_advance"><i class="fa fa-arrow-circle-up"></i> Less Filter</span>');
}
function hide_advance(){
    
        $("#more_filter").slideUp("3000");               
        $(".hide_show").html('<span class="btn btn-sm btn-primary btn-flat" onclick="show_advance()" id="show_advance"><i class="fa fa-arrow-circle-down"></i> More Filter</span>');
}