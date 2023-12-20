$(document).ready(function () {
	//alert();
	var url=base_url+'header-search'; 
    $("#search").keyup(function () {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                keyword: $("#search").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownSearch').empty();
                    $('#search').attr("data-toggle", "dropdown");
                    $('#DropdownSearch').dropdown('toggle');
                    $('#searchform').addClass('open');
                }
                else if (data.length == 0) {
                    $('#search').attr("data-toggle", "");
                    $('#searchform').removeClass('open');
                }

                $.each(data, function (key,value) {
                    if (data.length >= 0)
                       $('#DropdownSearch').append('<li role="displaySearch" class="liclickedclass"  value="' + value['product_name'] + '"><a role="menuitem dropdownSearchli" class="dropdownlivalue">' + value['product_name'] + '</a></li>');
                       
                });
            }
        });
    });
    $('ul.txtsearch').on('click', 'li a', function () {
        $('#search').val($(this).text()); 
        $("#searchform").submit();       
    });


});


