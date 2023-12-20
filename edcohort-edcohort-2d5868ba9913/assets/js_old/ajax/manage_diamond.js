$(document).ready(function(){
   $(":checkbox").click(function(){
    var id = $(this).attr('id');
    var name = $(this).attr('name');
    var check = $(this).is(':checked');
    //console.log(name)
    if(name=="available[]" || name=="culet[]" || name=="color[]" || name=="fluorescence[]" || name=="hca[]" 
      || name=="clarity[]" || name=="cut[]" || name=="polish[]" || name=="symmetry[]" || name=="cert[]" || name=="pointer[]")
    {
       $(this).parent().toggleClass("active-label"); 
    }
    else if(name=="checkbox[]")
    { 
       $('label[for="' + id + '"]').toggleClass("active1");
    }
    else if(name=="ex3")
    {
        uncheckCPSF();
        $(this).closest("li").toggleClass("active-label");
        $('#ex3n,#fluor_None').prop("checked",false); 
        $('#ex3n,#fluor_None').closest("li").removeClass("active-label"); 
        //console.log(check)
        $('#cut_EX,#pol_EX,#sym_EX').prop("checked",check);
        if(check){
          $('#cut_EX,#pol_EX,#sym_EX').closest("li").addClass("active-label");
        }
        else{
          $('#cut_EX,#pol_EX,#sym_EX').closest("li").removeClass("active-label");
        } 
    }      
    else if(name=="ex3n")
    {
        uncheckCPSF();
        $(this).closest("li").toggleClass("active-label");
        $('#ex3').prop("checked",false); 
        $('#ex3').closest("li").removeClass("active-label"); 
        $('#cut_EX,#pol_EX,#sym_EX,#fluor_NON').prop("checked",check);
        if(check) {
          $('#cut_EX,#pol_EX,#sym_EX,#fluor_NON').closest("li").addClass("active-label");
        }
        else {
          $('#cut_EX,#pol_EX,#sym_EX,#fluor_NON').closest("li").removeClass("active-label");
        }
    }

   });
});

function uncheckCPSF() {
  $('.cut_check,.pol_check,.sym_check,.fluor_check').prop("checked",false);
  $('.cut_check,.pol_check,.sym_check,.fluor_check').closest("li").removeClass("active-label");
}
        
$(document).ready(function(){
    $(':checkbox:checked').each(function(){
      var val = $(this).attr('id');
      var val_class = $(this).attr('name');
      //alert(val_class);
      if(val_class=="checkbox[]")
      {
        $('label[for="' + val + '"]').addClass("active1");
      }
      else
      {
        $('label[for="' + val + '"]').addClass("active1"); 
      }
    });
});
// ++++++++++++++++++++Advance Search++++++++++++++++++++++++++++++++++++++++++
function show_search(){               
    $("#more_filter").slideDown("3000");                
    $(".hide_show").html('<a href="javascript:void(0)" class="btn"><span class="" onclick="hide_search()" id="hide_advance"><i class="plus-toggle fa fa-minus"> </i> Hide Advance Filter</span></a>');        
}
function hide_search(){
    $("#more_filter").slideUp("3000");               
    $(".hide_show").html('<a href="javascript:void(0)" class="btn"><span class="" onclick="show_search()" id="show_advance"><i class="plus-toggle fa fa-plus"> </i> Show Advance Filter</span></a>');
    //document.body.scrollTop = 0; // For Chrome, Safari and Opera 
    //document.documentElement.scrollTop = 0; // For IE and Firefox
}   
//+++++++++++++++++++ Match Diamond +++++++++++++++++++++++++++++++++
function show_parameters(){               
    $("#MatchFilterDiv").slideDown("3000");                
    $(".hide_show1").html('<a href="javascript:void(0)" class="btn"><span id="show_parameters" onclick="hide_parameters()"><i class="fa fa-arrow-circle-up"></i> Hide Parameters</span></a>');        
}
function hide_parameters(){
    $("#MatchFilterDiv").slideUp("3000");               
    $(".hide_show1").html('<a href="javascript:void(0)" class="btn"><span id="show_parameters" onclick="show_parameters()"><i class="fa fa-arrow-circle-down"></i> Show Parameters</span></a>');        
}

function onSort(e){    
    var sort_column = $(e).attr('data-sort');
    var sort_type = $(e).attr('data-sort-type');
    var THIS = $("[data-sort="+sort_column+"]");
    sort = '';

    defaultSort();

    if(sort_type=='default') {
        THIS.children('i').addClass('fa-sort-asc').removeClass('fa-sort');
        THIS.attr('data-sort-type','asc');
        sort = 'asc';
    }
    else if(sort_type=='asc') {
        THIS.children('i').addClass('fa-sort-desc').removeClass('fa-sort-asc');
        THIS.attr('data-sort-type','desc');
        sort = 'desc';
    }        
    else if(sort_type=='desc') {
        THIS.children('i').addClass('fa-sort-asc').removeClass('fa-sort-desc');
        THIS.attr('data-sort-type','asc');
        sort = 'asc';
    }
    sortData(sort_column,sort);
}
function defaultSort(){
    $(".header-sort").each(function() {
      $(this).attr('data-sort-type','default');
      $(this).children('i').addClass('fa-sort').removeClass('fa-sort-asc fa-sort-desc');
    });
}