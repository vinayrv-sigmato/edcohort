$(window).scroll(function() {    
    var scroll = $(window).scrollTop();    
    if (scroll >= 0.4 * $(window).height()) {
        $(".quote-box").addClass('open');
    } else {
        $(".quote-box").removeClass('open');
    }
});
 
 
/************
Menu
*************/ 

$("#toggle_button").click(function(){
    $("#menu").addClass("open");
	$("body").addClass("menu-open");
});

$(".close_button").click(function(){
    $("#menu").removeClass("open");
	$("body").removeClass("menu-open");
});

$(".parent").click(function(){
    $(this).parent().toggleClass("open");
});