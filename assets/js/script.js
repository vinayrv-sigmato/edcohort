$(document).ready(function () {
  
  $('.js-sidebar-menu').scrollToFixed({
      marginTop: 20,
      limit: $('.js-sidebar-holder').outerHeight() + 90 - $('.js-sidebar-menu').outerHeight()
    });

  $('.js-navigation-item').bind('click', function (e) {
    e.preventDefault();

    var target = $(this).attr("href");

    if (target.length > 1) {
        $('html, body').stop().animate({
          scrollTop: $(target).offset().top
        }, 600, function () {
          location.hash = target;
        });
    }

    return false;
  });
});

$(window).scroll(function () {
  var scrollDistance = $(window).scrollTop();

  $('.article-section').each(function (i) {
    if ($(this).position().top - 2 <= scrollDistance) {
      $('.js-navigation-list .js-navigation-item.active').removeClass('active');
      $('.js-navigation-list .js-navigation-item').eq(i).addClass('active');
    }
  });
}).scroll();

// Filter Toggle


 $(".filter-btn").click(function(){
        $(".review-left").toggleClass("open");
        $(".filter-btn").toggleClass("open");
    });



//Rich Editot 

$('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 100,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });   
      
      $('#summernotecomment').summernote({
        placeholder: 'Hello write comment',
        tabsize: 2,
        height: 100,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']],          
        ]
      });  

    