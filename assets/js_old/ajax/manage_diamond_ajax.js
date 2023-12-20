$(document).ready(function () {
    var url = base_url + 'load-more-diamond?page=';
    if (segment_1 == "diamond") {
        pagination(url);
    }
    //alert(base_url); 

    $('#form input').change(function () {
        //submitForm();       
    });
});



function submitForm() {
    var checkbox_arr = [];
    $.each($("input[name='checkbox[]']:checked"), function () {
        checkbox_arr.push($(this).val());
    });
    var checkbox_str = checkbox_arr.toString();

    var cert_arr = [];
    $.each($("input[name='cert[]']:checked"), function () {
        cert_arr.push($(this).val());
    });
    var cert_str = cert_arr.toString();
    //console.log(cert_str);

    var per_page = $("#per_page").val();
    var value_form = $('#form').serialize() + '&' + $('#form1').serialize() + '&' + $.param({"per_page": per_page});
    var set_url = base_url + 'diamond?' + value_form + '&' + $.param({"shape": checkbox_str, "certificate": cert_str});
    window.history.replaceState({url: "" + set_url + ""}, 'targetTitle', set_url);

    var url = base_url + 'load-more-diamond?page=';

    loadMoreData(url);
}
function pagination(argument) {
    loadMoreData(argument);
}
$(function () {
    $("#checkAll").click(function () {

        if ($("#checkAll").is(':checked')) {
           $(".tr_checkbox").prop("checked", true);
           $(".tr_checkbox").closest('tr').addClass('tr_selected');

       } else {
        $(".tr_checkbox").prop("checked", false);
        $(".tr_checkbox").closest('tr').removeClass('tr_selected');

    }
});
});

$('#all_shapes').click(function(){
    var shapes = $(this);
    shapes.siblings().removeClass();
    if(shapes.hasClass('active')){
     shapes.removeClass('active').addClass('inactive')
     $("#idshaperound").closest("li").addClass("active1");
     $("#idshapeprinces").closest("li").addClass("active1");
     $("#idshapecushion").closest("li").addClass("active1");
     $("#idshaperadiant").closest("li").addClass("active1");
     $("#idshapeasscher").closest("li").addClass("active1");
     $("#idshapeemerald").closest("li").addClass("active1");
     $("#idshapeoval").closest("li").addClass("active1");
     $("#idshapepear").closest("li").addClass("active1");
     $("#idshapemarquise").closest("li").addClass("active1");
     $("#idshapeheart").closest("li").addClass("active1");
     $("#idshapeother").closest("li").addClass("active1");
 }else{
     shapes.removeClass('inactive').addClass('active');
     $("#idshaperound").closest("li").removeClass("active1");
     $("#idshapeprinces").closest("li").removeClass("active1");
     $("#idshapecushion").closest("li").removeClass("active1");
     $("#idshaperadiant").closest("li").removeClass("active1");
     $("#idshapeasscher").closest("li").removeClass("active1");
     $("#idshapeemerald").closest("li").removeClass("active1");
     $("#idshapeoval").closest("li").removeClass("active1");
     $("#idshapepear").closest("li").removeClass("active1");
     $("#idshapemarquise").closest("li").removeClass("active1");
     $("#idshapeheart").closest("li").removeClass("active1");
     $("#idshapeother").closest("li").removeClass("active1");
 }

});
function trSelect(e){
    $(e).closest('tr').toggleClass('tr_selected');
}


function validateInput(event) {
    var keycode = event.keyCode
    if (keycode != 46 && (keycode < 48 || keycode > 57)) {
        event.preventDefault();
    }
}
function validateInputValue(id, index, text) {
    var from_val = $("#" + id + "_from").val();
    var to_val = $("#" + id + "_to").val();

    if (parseFloat(from_val) > parseFloat(to_val)) {
        msg = text + ' from can not be greater than ' + text + ' to ';
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning(msg);
        $("#" + id + "_to").val(from_val);
    }
}
// $(window).scroll(function() {
//         if($(window).scrollTop() + $(window).height() >= $(document).height()) {
//            var page=$("#page_scroll").val();
//             loadMoreData(page);
//             alert(page);
//         }
//     });

// $(window).scroll(function() {
//         if($(window).scrollTop() + $(window).height() >= $(document).height()) {
//            var page=$("#page_scroll").val();
//             loadMoreData(page);
//             alert(page);
//         }
//     });
function loadMoreData(url_data) {
    var compare_session = $("#compare_session").val();
    var text_color = "";
    var compare_title = "Add To Compare";
    var per_page = $("#per_page").val();
    var value_form = $('#form').serialize() + '&' + $.param({"per_page": per_page});

    $.ajax({
        url: url_data,
        dataType: 'json',
        type: 'post',
        data: value_form,

        success: function (data) {
            var details = data.records;
            var page_link = data.page_link;
            var login = data.login;

            var total_records = data.total_records;


            $("#pagination-div-id").html(page_link);
            $('#pagination-div-id a').each(function () {
                var a = $(this).attr("href");
                $(this).attr("onclick", 'pagination("' + a + '")');
                $(this).attr("href", "javascript:void(0)");
            });

            var html = "";
            var details_length = details.length;
            for (i = 0; i < details_length; i++)
            {
                if (compare_session.search(details[i].diamond_id) >= 0) {
                    text_color = "text-red";
                    compare_title = "Remove From Compare"
                } else {
                    text_color = "";
                    compare_title = "Add To Compare";
                }

                if (details[i].stock_id != null) {
                    var stock_id = details[i].stock_id;
                } else {
                    var stock_id = "";
                }
                if (details[i].report_no != null) {
                    var report_no = details[i].report_no;
                } else {
                    var report_no = "";
                }
                if (details[i].shape_full != null) {
                    var shape = details[i].shape_full;
                } else {
                    var shape = "";
                }
                if (details[i].weight != null) {
                    var weight = parseFloat(details[i].weight).toFixed(2);
                } else {
                    var weight = "";
                }
                if (details[i].color != null) {
                    var color = details[i].color;
                } else {
                    var color = "";
                }
                if (details[i].grade != null) {
                    var grade = details[i].grade;
                } else {
                    var grade = "";
                }
                if (details[i].cut_full != null) {
                    var cut = details[i].cut_full;
                } else {
                    var cut = "";
                }
                if (details[i].polish_full != null) {
                    var polish = details[i].polish_full;
                } else {
                    var polish = "";
                }
                if (details[i].symmetry_full != null) {
                    var symmetry = details[i].symmetry_full;
                } else {
                    var symmetry = "";
                }
                if (details[i].fluor_full != null) {
                    var fluorescence_int = details[i].fluor_full;
                } else {
                    var fluorescence_int = "";
                }
                if (details[i].rapnet_discount != null) {
                    var rapnet_discount = parseFloat(details[i].rapnet_discount).toFixed(1);
                } else {
                    var rapnet_discount = "";
                }
                if (details[i].depth != null) {
                    var depth = parseFloat(details[i].depth).toFixed(1);
                } else {
                    var depth = "";
                }
                if (details[i].table_d != null) {
                    var table_d = parseInt(details[i].table_d);
                } else {
                    var table_d = "";
                }
                if (details[i].cost_carat != null) {
                    var cost_carat = Math.round(details[i].cost_carat);
                } else {
                    var cost_carat = "";
                }
                if (details[i].total_price != null) {
                    var total_price = Math.round(details[i].total_price);
                } else {
                    var total_price = "";
                }
                if (details[i].lab != null) {
                    var lab = details[i].lab;
                } else {
                    var lab = "";
                }
                if (details[i].measurements != null) {
                    var measurements = details[i].measurements;
                } else {
                    var measurements = "";
                }
                if (details[i].origin != null) {
                    var origin = details[i].origin;
                } else {
                    var origin = "";
                }
                if (details[i].country != null) {
                    var country = details[i].country;
                } else {
                    var country = "";
                }
                if (details[i].availability != null) {
                    var availability = details[i].availability;
                } else {
                    var availability = "";
                }
                if (details[i].new_discount != null) {
                    var new_discount = parseFloat(details[i].new_discount).toFixed(2);
                    ;
                } else {
                    var new_discount = "";
                }
                if (details[i].brand != null) {
                    var brand = details[i].brand;
                } else {
                    var brand = "";
                }
                if (details[i].rapnet != null) {
                    var rapnet = parseFloat(details[i].rapnet).toFixed(0);
                } else {
                    var rapnet = "";
                }
                if (details[i].cn != null) {
                    var cn = details[i].cn;
                } else {
                    var cn = "";
                }
                if (details[i].sn != null) {
                    var sn = details[i].sn;
                } else {
                    var sn = "";
                }
                if (details[i].cw != null) {
                    var cw = details[i].cw;
                } else {
                    var cw = "";
                }
                if (details[i].sw != null) {
                    var sw = details[i].sw;
                } else {
                    var sw = "";
                }

                if (details[i].memotootltip != null) {
                    var memotootltip = details[i].memotootltip;
                } else {
                    var memotootltip = "";
                }

                if (report_no) {
                 var cert_link = details[i].report_no;
             } else {
                 var cert_link = '';
             }

             if (details[i].report_filename != null) {
                var report_filename = details[i].report_filename;
            } else {
                var report_filename = "";
            }

            if(details[i].vendor_id  == 26) {
                var classgreen ="green";
            } else {
                var classgreen = '';
            }

            if(details[i].report_no != null)
                { var report_no = details[i].report_no;
                }  else{ 
                    var report_no = ""; }

                    if(details[i].currency != null){
                     var currency = parseFloat(details[i].currency).toFixed(0);
                 }  else { 
                    var currency = ""; }

                    if(details[i].diamond_image != null)
                        { var diamond_image = details[i].diamond_image;
                        }  else{ 
                            var diamond_image = ""; }

                            if(details[i].diamond_video != null)
                                { var diamond_video = details[i].diamond_video;
                                }  else{ 
                                    var diamond_video = ""; }

                                    if(details[i].report_filename != null)
                                        { var report_filename = details[i].report_filename;
                                        }  else{ 
                                            var report_filename = ""; }

                                            var detailStr = JSON.stringify([details[i]]);

                                            var a = "'" + stock_id + "'";

                                            html += '<tr class="memo_'+availability+' '+classgreen+'" style="font-size:12px; font-weight:bold;" id="tr_' + stock_id + '">';
                                            html += '<td class="w_check">';
                                            html += '    <i class="fa fa-plus-circle" id="i_' + stock_id + '" onclick="detailOpen(' + a + ')"></i>';
                                            html += '    <i style="display: none" id="id_' + stock_id + '">' + detailStr + '</i>';
                                            html += '</td>';
                                            html += ' <td>';
                                            html += '      <input type="checkbox" name="checkbox_record[]" value="' + details[i].diamond_id + '" onclick="trSelect(this)" data-report="'+ report_no +'"  class="tr_checkbox pull-left" >';
                // html +='        <a href="javascript:void(0)" onclick="add_compare('+details[i].diamond_id+')" ><i class="fa fa-exchange '+text_color+'" title="'+compare_title+'" id="fa_compare_'+details[i].diamond_id+'" data-toggle="tooltip" data-placement="right" aria-hidden="true"></i></a>';
                html += '    </td>';
                  if(details[i].vendor_id  == 24) {
                    html += '    <td> ';
                    html += '       <a target="_blank" onclick="dnaOpen('+stock_id+')" ">';
                    html += '        <img src="' + base_url + 'assets/images/camera-1.png"  data-toggle="tooltip" style="margin: 0;" height="auto" width="20px">';
                    html += '      </a>';
                    html += '    </td>';
                } else {
                    html += '    <td> ';
                    html += '       <a target="_blank" href="' + base_url + 'diamond-details/' + details[i].diamond_id + '">';
                    html += '        <img src="' + base_url + 'assets/images/camera-1.png"  data-toggle="tooltip" style="margin: 0;" height="auto" width="20px">';
                    html += '      </a>';
                    html += '    </td>';
                }
                html += '    <td> ';
                html += '       <a target="_blank" href="' + details[i].diamond_image + '">';
                html += '       <i class="fas fa-images"></i>';
                html += '      </a>';
                
                html += '       <a target="_blank" href="' + details[i].diamond_video + '">';
                html += '       <i class="fas fa-video"></i>';
                html += '      </a>';

                html += '       <a target="_blank" href="' + details[i].report_filename + '">';
                html += '        <i class="fas fa-file-certificate"></i>';
                html += '      </a>';
                html += '    </td>';
               // html += '    <td>' + stock_id + ' </td>';
               html += '    <td> ';
               html += '       <a target="_blank" href="' + base_url + 'diamond-details/' + details[i].diamond_id + '">';
               html += stock_id;
               // html += '        <img src="' + base_url + 'assets/images/camera.png"  data-toggle="tooltip" style="margin: 0;" height="auto" width="20px">';
               html += '      </a>';
               html += '    </td>';
               

                // html += '    <td><span title="' + memotootltip + '" data-toggle="tooltip">';
                // html +=   availability;
                // html += '</span></td>';
                html += '    <td class="text-uppercase">' + shape + '</td>';
                html += '    <td>' + weight + ' </td>';
                html += '    <td>' + color + ' </td>';
                html += '    <td>' + grade + ' </td>';
                html += '    <td>' + cut + ' </td>';
                html += '    <td>' + polish + ' </td>';
                html += '    <td>' + symmetry + '</td>';
                html += '    <td>' + fluorescence_int + '</td>';
               // html += '    <td>' + cn + '</td>';
               // html += '    <td>' + sn + '</td>';
               // html += '    <td>' + cw + '</td>';
               // html += '    <td>' + sw + '</td>';
               
               html += '    <td>' + depth + '</td>';
               html += '    <td>' + table_d + '</td>';
               html += '    <td>' + rapnet + '</td>';
               html += '    <td >$' + cost_carat + '</td>  ';
                // if(login){
                // html +='    <td>$'+cost_carat+'</td>';
                // }else{
                //     html +='    <td> <span class="login" onclick="loginFunction()">Login</span> </td>';
                //   }
                // if(login){
                // html +='    <td>$'+total_price+'</td>';
                // }else{
                //     html +='    <td> <span class="login" onclick="loginFunction()">Login</span> </td>';
                //   }
                html += '    <td class="color-red">' + new_discount + '</td>';
                html += '    <td class="color-green">$' + total_price + '</td>  ';
                html += '    <td class="color-blue">' + currency + '</td>';
                html += '<td><a class="gia_link" href="' + report_filename + '" target="_blank"><span title="' + lab + '" data-toggle="tooltip" class="color-orange">' + lab + '</span></a></td>';
                html += lab;
                html += '</span></td>';
              
               // html += '    <td>' + brand + '</td>';
               html += '    <td>' + measurements + '</td>';
               // html += '    <td>' + country + '</td>';

               html += '</tr>';

           }

           $('#example').dataTable().fnDestroy();

           $("#total_records").html(total_records);

           $("#add_data").html(html);

           $('#example').DataTable({
            "retrieve": true,
            "autoWidth": false,
            "scrollY": 800,
            "scrollX": true,
            "ordering": true,
            "paging": false,
            "searching": false,
            "info": false,
            "order": []
        });

       },
       beforeSend: function () {
        $("#page-loader").show();
    },
    complete: function () {
        $("#page-loader").fadeOut();
        $('[data-toggle="tooltip"]').tooltip();
    }

});
}
function dnaOpen(stock_id) {
    window.open('https://dna2.dnalinks.in/d/'+stock_id);
}
function detailOpen(id) {
    var idetail = $("#id_" + id).html();
    if ($("#i_" + id).hasClass("fa-plus-circle"))
    {
        $("#i_" + id).removeClass("fa-plus-circle").addClass("fa-minus-circle");

        var details = JSON.parse(idetail);

        if (details['0'].stock_id != null) {
            var stock_id = details['0'].stock_id;
        } else {
            var stock_id = "";
        }
        if (details['0'].shape_full != null) {
            var shape = details['0'].shape_full;
        } else {
            var shape = "";
        }
        if (details['0'].weight != null) {
            var weight = parseFloat(details['0'].weight).toFixed(2);
        } else {
            var weight = "";
        }
        if (details['0'].color != null) {
            var color = details['0'].color;
        } else {
            var color = "";
        }
        if (details['0'].grade != null) {
            var grade = details['0'].grade;
        } else {
            var grade = "";
        }
        if (details['0'].cut_full != null) {
            var cut = details['0'].cut_full;
        } else {
            var cut = "";
        }
        if (details['0'].polish_full != null) {
            var polish = details['0'].polish_full;
        } else {
            var polish = "";
        }
        if (details['0'].symmetry_full != null) {
            var symmetry = details['0'].symmetry_full;
        } else {
            var symmetry = "";
        }
        if (details['0'].fluor_full != null) {
            var fluorescence_int = details['0'].fluor_full;
        } else {
            var fluorescence_int = "";
        }
        if (details['0'].rapnet_discount != null) {
            var rapnet_discount = parseFloat(details['0'].rapnet_discount).toFixed(1);
        } else {
            var rapnet_discount = "";
        }
        if (details['0'].depth != null) {
            var depth = parseFloat(details['0'].depth).toFixed(1);
        } else {
            var depth = "";
        }
        if (details['0'].table_d != null) {
            var table_d = parseInt(details['0'].table_d);
        } else {
            var table_d = "";
        }
        if (details['0'].cost_carat != null) {
            var cost_carat = Math.round(details['0'].cost_carat);
        } else {
            var cost_carat = "";
        }
        if (details['0'].total_price != null) {
            var total_price = Math.round(details['0'].total_price);
        } else {
            var total_price = "";
        }
        if (details['0'].lab != null) {
            var lab = details['0'].lab;
        } else {
            var lab = "";
        }
        if (details['0'].measurements != null) {
            var measurements = details['0'].measurements;
        } else {
            var measurements = "";
        }
        if (details['0'].origin != null) {
            var origin = details['0'].origin;
        } else {
            var origin = "";
        }
        if (details['0'].availability != null) {
            var availability = details['0'].availability;
        } else {
            var availability = "";
        }
        if (details['0'].new_discount != null) {
            var new_discount = parseFloat(details['0'].new_discount).toFixed(2);
            ;
        } else {
            var new_discount = "";
        }
        if (details['0'].brand != null) {
            var brand = details['0'].brand;
        } else {
            var brand = "";
        }
        if (details['0'].rapnet != null) {
            var rapnet = details['0'].rapnet;
        } else {
            var rapnet = "";
        }
        if (details['0'].cn != null) {
            var cn = details['0'].cn;
        } else {
            var cn = "";
        }
        if (details['0'].sn != null) {
            var sn = details['0'].sn;
        } else {
            var sn = "";
        }
        if (details['0'].cw != null) {
            var cw = details['0'].cw;
        } else {
            var cw = "";
        }
        if (details['0'].sw != null) {
            var sw = details['0'].sw;
        } else {
            var sw = "";
        }
        if (details['0'].report_no != null) {
            var report_no = details['0'].report_no;
        } else {
            var report_no = "";
        }
        if (details['0'].culet != null) {
            var culet = details['0'].culet;
        } else {
            var culet = "";
        }
        if (details['0'].crown_ht != null) {
            var crown_ht = details['0'].crown_ht;
        } else {
            var crown_ht = "";
        }
        if (details['0'].crown_angle != null) {
            var crown_angle = details['0'].crown_angle;
        } else {
            var crown_angle = "";
        }
        if (details['0'].pavillion_angle != null) {
            var pavillion_angle = details['0'].pavillion_angle;
        } else {
            var pavillion_angle = "";
        }
        if (details['0'].pavillion_height != null) {
            var pavillion_height = details['0'].pavillion_height;
        } else {
            var pavillion_height = "";
        }
        if (details['0'].m_length != null) {
            var m_length = details['0'].m_length;
        } else {
            var m_length = "";
        }
        if (details['0'].m_depth != null) {
            var m_depth = details['0'].m_depth;
        } else {
            var m_depth = "";
        }
        if (details['0'].m_width != null) {
            var m_width = details['0'].m_width;
        } else {
            var m_width = "";
        }
        if (details['0'].pavillion_depth != null) {
            var pavillion_depth = details['0'].pavillion_depth;
        } else {
            var pavillion_depth = "";
        }
        if (details['0'].report_dt != null) {
            var report_dt = details['0'].report_dt;
        } else {
            var report_dt = "";
        }
        if (details['0'].keytosymb != null) {
            var keytosymb = details['0'].keytosymb;
        } else {
            var keytosymb = "";
        }
        if (details['0'].diamond_image != null) {
            var diamond_image = details['0'].diamond_image;
        } else {
            var diamond_image = "";
        }
        if (details['0'].currency != null) {
            var currency = parseFloat(details['0'].currency).toFixed(0);
        } else {
            var currency = "";
        }
       // alert(diamond_image);
       var html = '';
       html += '<tr id="tr_ic_' + stock_id + '" styel="opacity: 0"><td colspan="27">';
       html += '    <table frame="void" style="margin-bottom: 0;width:0;" cellspacing="0" cellpadding="0" border="0">';
       html += '    <tbody>';
       html += '        <tr>';
       html += '            <td style="border-style: hidden;" valign="top">';
       html += '                <div style="vertical-align: top; text-align: left; border: medium none;">';
       html += '                    <div class="MainBg">';
       html += '                        <table class="Thumtbl" style="margin: auto;border: none;" cellspacing="0" cellpadding="0" border="0" align="center">';
       html += '                            <tbody>';
       if (diamond_image == '') {
        html += '                                <tr>';
        html += '                                    <td class="padding-border">';
        html += '                                        <a class="ThumbnailImg" style="text-decoration:underline;color: #0204ae;" href="https://asdia.s3.amazonaws.com/' + stock_id + '/still.jpg" target="_blank">';
        html += '                                            <img src="' + base_url + 'assets/no_image.png" title="RealImages" class="" style="cursor:pointer;" id="">';
        html += '                                        </a>';
        html += '                                    </td>';
        html += '                                </tr>';
    } else {
        html += '                                <tr>';
        html += '                                    <td class="padding-border">';
        html += '                                            <img src="' + diamond_image + '" title="RealImages" class="expand-image" style="cursor:pointer;" id="">';
        html += '                                    </td>';
        html += '                                </tr>';
    }
    html += '                            </tbody>';
    html += '                        </table>';
    html += '                    </div>';
    html += '                </div>';
    html += '            </td>';
    html += '            <td style="border-style: hidden;" valign="top">';
    html += '                <div id="DiamondDetail" style="vertical-align: top;text-align:left">';
    html += '                    <table style="border-style: none;z-index:-99;" class="lightPro" cellspacing="0" cellpadding="0">';
    html += '                        <tbody>';
    html += '                            <tr>';
    html += '                                <td>';
    html += '                                    <table cellspacing="0" cellpadding="0">';
    html += '                                        <tbody>';
    html += '                                            <tr style="border-style: none"><th>Lab</th><td class="Lab">' + lab + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Stock#</th> <td>' + stock_id + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Report No</th> <td>' + report_no + '</td> </tr>';
    html += '                                            <tr style="border-style: none"><th>Shape</th> <td>' + shape + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Cts</th><td>' + weight + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Color</th><td>' + color + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Clarity</th><td>' + grade + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Disc %</th><td>' + new_discount + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Rap.($)</th><td>' + rapnet + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>$/Carat</th><td>' + cost_carat + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Total $</th><td>' + total_price + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Thai Baht &#3647;</th><td>' + currency + '</td></tr>';
    html += '                                        </tbody>';
    html += '                                    </table>';
    html += '                                </td>';
    html += '                                <td>';
    html += '                                    <table cellspacing="0" cellpadding="0">';
    html += '                                        <tbody>';
    html += '                                            <tr style="border-style: none"><th>Cut</th><td>' + cut + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Pol</th><td>' + polish + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Sym</th><td>' + symmetry + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Flour</th><td>' + fluorescence_int + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Depth%</th><td>' + depth + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Table%</th><td>' + table_d + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Length</th><td>' + m_length + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Width</th><td>' + m_width + '</td></tr>';
    html += '                                            <tr style="border-style: none"><th>Depth</th><td>' + m_depth + '</td></tr>';
        // html += '                                            <tr style="border-style: none"><th>Ratio</th><td>'+Ratio+'</td></tr>';
        html += '                                            <tr style="border-style: none"><th>Culet</th><td>' + culet + '</td></tr>';
        html += '                                        </tbody>';
        html += '                                    </table>';
        html += '                                </td>';
        html += '                                <td>';
        html += '                                    <table cellspacing="0" cellpadding="0">';
        html += '                                        <tbody>';
        html += '                                            <tr style="border-style: none"><th>C/A</th><td>' + crown_angle + '</td></tr>';
        html += '                                            <tr style="border-style: none"><th>C/H</th><td>' + crown_ht + '</td></tr>';
        html += '                                            <tr style="border-style: none"><th>P/A</th><td>' + pavillion_angle + '</td></tr>';
        html += '                                            <tr style="border-style: none"><th>P/H</th><td>' + pavillion_height + '</td></tr>';
        html += '                                            <tr style="border-style: none"><th>Brand</th><td>' + brand + '</td></tr>';
        html += '                                            <tr style="border-style: none"><th>CN</th><td>' + cn + '</td></tr>';
        html += '                                            <tr style="border-style: none"><th>SN</th><td>' + sn + '</td></tr>';
        html += '                                            <tr style="border-style: none"><th>CW</th><td>' + cw + '</td></tr>';
        html += '                                            <tr style="border-style: none"><th>SW</th><td>' + sw + '</td></tr>';
        html += '                                            <tr style="border-style: none"><th>Report Comments</th><td>' + report_dt + '</td></tr>';
        html += '                                            <tr style="border-style: none"><th>Key to Symbols</th><td width="70px">' + keytosymb + '</td></tr>';
        html += '                                        </tbody>';
        html += '                                    </table>';
        html += '                                </td>';
        html += '                                <td>';
        html += '                                    <table cellspacing="0" cellpadding="0" style="margin-bottom:208px;">';
        html += '                                        <tbody>';
        // if(COUNTRY_OF_ORIGIN){        
        //     html += '                                            <tr style="border-style: none">';
        //     html += '                                                <th>COUNTRY OF ORIGIN</th>';
        //     html += '                                                <td>'+COUNTRY_OF_ORIGIN+'</td>';
        //     html += '                                            </tr>';    
        // }
        // if(HCN){        
        //     html += '                                            <tr style="border-style: none">';
        //     html += '                                                <th>HCA</th>';
        //     html += '                                                <td>'+HCN+'</td>';
        //     html += '                                            </tr>';
        // }
        html += '                                        </tbody>';
        html += '                                    </table>';
        html += '                                </td>';
        html += '                            </tr>';
        html += '                        </tbody>';
        html += '                    </table>';
        html += '                </div>';
        html += '            </td>';
        html += '            <td valign="top"></td>';
        html += '        </tr>';
        html += '    </tbody>';
        html += '</table>';
        html += '</td></tr>';


        $("#tr_" + id).after(html);
    } else {
        $("#i_" + id).removeClass("fa-minus-circle").addClass("fa-plus-circle");
        $("#tr_ic_" + id).remove();
    }
}

function showCalc(diamond_id) {
    var html = "";
    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox_arr.push($(this).val());
    });
    if (checkbox_arr.length) {

        var weight_total = 0;   
        var net_value_total = 0;   
        var total_attr = 0;

        var new_disc_input = ($("#new_disc_input").val()) ? $("#new_disc_input").val() : 0;

    // if(parseInt(new_disc_input)<=10 && parseInt(new_disc_input)>=0) {     
        var weight_total = 0;   
        var new_net_value_total= 0;   
        var total_attr = 0;

        $.ajax({
            url: base_url + 'show-calc',
            dataType: 'json',
            type: 'get',
            data: {"diamond_id": checkbox_arr, "new_disc_input": new_disc_input},
            success: function (data) {
                var details = data.records;
                var data_length = details.length;

                for (var i = 0; i < data_length; i++) {
                    if (details[i].stock_id != null) {
                        var stock_id = details[i].stock_id;
                    } else {
                        var stock_id = "";
                    }
                    if(details[i].report_no != null) {
                        var report_no = details[i].report_no;
                    } else {
                        var report_no = "";
                    }
                    if (details[i].shape_full != null) {
                        var shape_full = details[i].shape_full;
                    } else {
                        var shape_full = "";
                    }
                    if (details[i].weight != null) {
                        var weight = parseFloat(details[i].weight).toFixed(2);
                    } else {
                        var weight = "";
                    }
                    if (details[i].color != null) {
                        var color = details[i].color;
                    } else {
                        var color = "";
                    }
                    if (details[i].grade != null) {
                        var grade = details[i].grade;
                    } else {
                        var grade = "";
                    }
                    if (details[i].cut_full != null) {
                        var cut_full = details[i].cut_full;
                    } else {
                        var cut_full = "";
                    }
                    if (details[i].polish_full != null) {
                        var polish_full = details[i].polish_full;
                    } else {
                        var polish_full = "";
                    }
                    if (details[i].symmetry_full != null) {
                        var symmetry_full = details[i].symmetry_full;
                    } else {
                        var symmetry_full = "";
                    }
                    if (details[i].fluor_full != null) {
                        var fluor_full = details[i].fluor_full;
                    } else {
                        var fluor_full = "";
                    }
                    if (details[i].depth != null) {
                        var depth = parseFloat(details[i].depth).toFixed(1);
                    } else {
                        var depth = "";
                    }
                    if (details[i].table_d != null) {
                        var table_d = parseInt(details[i].table_d);
                    } else {
                        var table_d = "";
                    }
                    if (details[i].cost_carat != null) {
                        var cost_carat = Math.round(details[i].cost_carat);
                    } else {
                        var cost_carat = "";
                    }
                    if (details[i].total_price != null) {
                        var total_price = Math.round(details[i].total_price);
                    } else {
                        var total_price = "";
                    }
                    if (details[i].lab != null) {
                        var lab = details[i].lab;
                    } else {
                        var lab = "";
                    }
                    
                    if (details[i].rapnet != null) {
                        var rapnet = parseFloat(details[i].rapnet).toFixed(1);
                    } else {
                        var rapnet = "";
                    }
                    if (details[i].new_discount != null) {
                        var new_discount = parseFloat(details[i].new_discount);
                        ;
                    } else {
                        var new_discount = "";
                    }

                    if (details[i].report_filename != null) {
                        var report_filename = details[i].report_filename;
                    } else {
                        var report_filename = "";
                    }



                    weight_total = parseFloat(weight_total) + parseFloat(weight);
                    net_value_total = parseFloat(net_value_total) + parseFloat(total_price);
                    total_attr = parseFloat(total_attr)+(parseFloat(rapnet));

                    var new_disc = parseFloat(new_discount) + parseFloat(new_disc_input);
                    var new_cpc = parseFloat(rapnet) + ((parseFloat(rapnet)*parseFloat(new_disc))/100);
                    var new_total = new_cpc * parseFloat(weight);
                    new_net_value_total = parseFloat(new_net_value_total) + parseFloat(new_total);

             //$("#show_total_new").html(Math.round(new_net_value_total));

             html +='<tr style="text-align: center;">';
             html +='<td>'+stock_id+'</td>';
             html +='<td>'+shape_full+'</td>';
             html +='<td class="color-yellow">'+weight+'</td>';
             html +='<td>'+color+'</td>';
             html +='<td>'+grade+'</td>';
             html +='<td>'+cut_full+'</td>';
             html +='<td>'+polish_full+'</td>';
             html +='<td>'+symmetry_full+'</td>';
             html +='<td>'+fluor_full+'</td>';   
             html +='<td>'+depth+'</td>';
             html +='<td>'+table_d+'</td>';
             html +='<td>'+rapnet+'</td>';
             html +='<td class="color-red">'+new_discount+'</td>';
             html +='<td class="color-orange">'+cost_carat+'</td>';
             html +='<td class="color-green">'+total_price+'</td>';
             html +='<td class="color-orange"><a href="'+report_filename+'.pdf" target="_blank">'+lab+'</a></td>';
            //html +='<td></td>';
            // html +='<td class="color-blue">'+ new_disc +'</td>';
            // html +='<td class="color-blue">'+ new_cpc +'</td>';
            // html +='<td class="color-blue">'+ new_total +'</td>';
            html +='</tr>';
        }
        html +='  </table>';

         // var DISC_PER_AVG = parseFloat(parseFloat(1 - (parseFloat(net_value_total) / parseFloat(total_attr))) * 100);

         // $("#calc_total_stone").html(checkbox_arr.length);
         // $("#calc_total_cts").html(parseFloat(weight_total).toFixed(2));
         // $("#calc_NET_VALUE_TOTAL").html(Math.round(net_value_total));
         $("#show_calc_tbody").html(html);
         $("#showcalc").modal('show');

     },
 });
 // }
 //    else
 //    { 
 //        alert_boot('Please enter discount between 1 to 10 number!');
 //        $("#new_disc_input").val(0);

 //    }

}
else {
    alert_boot('Please, Select atleast one stone.');
}

}
//+++++++++++++ Print Data List+++++++++++++++
function print_data()
{
    var html = '<table border="" style="border-collapse: collapse;">';
    html += '<tr> ';
    html += '<th>S.No.</th>';
    html += '<th >Stock#</th>';
    html += '<th >Shape</th>';
    html += '<th >Qt.Wt.</th>';
    html += '<th >Color</th>';
    html += '<th >Grade</th>';
    html += '<th >Cut</th>';
    html += '<th >Polish</th>';
    html += '<th >Sym</th>';
    html += '<th >Flour</th>';
    html += '<th  >Depth%</th>';
    html += '<th  >Table%</th>';
    html += '<th >Disc%</th>';
    html += '<th  >Rap.($)</th>';
    html += '<th  >$/Carat</th>';
    html += '<th  >Description</th>';
    html += '<th  >Lab</th>';
    html += '<th  >Report No</th>';
    // html += '<th  >Brand</th>';
    html += '<th  >Measurements</th>';

    html += '</tr>';
    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox_arr.push($(this).val());
    });
    //alert(checkbox_arr);
    if (checkbox_arr.length)
    {
        //alert(checkbox_arr.length);
        $.ajax({
            url: base_url + 'print-diamond',
            dataType: 'json',
            type: 'POST',
            data: {"all_id": checkbox_arr},
            success: function (data) {
                //console.log(data);
                var data = data.records;
                var data_length = data.length;
                //alert(data.length);
                for (i = 0; i < data_length; i++)
                {
                    count = parseInt(i) + 1;
                    var a = "'" + data[i].stock_id + "'";
                    html += '<tr style="font-size:12px; font-weight:bold;" id="tr_">';
                    html += '    <td>' + count + '</td>';
                    html += '    <td>' + data[i].stock_id + '</td>';
                    if (data[i].shape_full != null) {
                        var shape_full = data[i].shape_full;
                    } else {
                        var shape_full = "";
                    }
                    html += '    <td>' + shape_full + '</td>';
                    if (data[i].weight != null) {
                        var weight = parseFloat(data[i].weight).toFixed(2);
                    } else {
                        var weight = "";
                    }
                    html += '    <td>' + weight + ' </td>';
                    if (data[i].color != null) {
                        var color = data[i].color;
                    } else {
                        var color = "";
                    }
                    html += '    <td>' + color + ' </td>';
                    if (data[i].grade != null) {
                        var grade = data[i].grade;
                    } else {
                        var grade = "";
                    }
                    html += '    <td>' + grade + ' </td>';
                    if (data[i].cut_full != null) {
                        var cut_full = data[i].cut_full;
                    } else {
                        var cut_full = "";
                    }
                    html += '    <td>' + cut_full + ' </td>';
                    if (data[i].polish_full != null) {
                        var polish_full = data[i].polish_full;
                    } else {
                        var polish_full = "";
                    }
                    html += '    <td>' + polish_full + ' </td>';
                    if (data[i].symmetry_full != null) {
                        var symmetry_full = data[i].symmetry_full;
                    } else {
                        var symmetry_full = "";
                    }
                    html += '    <td>' + symmetry_full + '</td>';
                    if (data[i].fluor_full != null) {
                        var fluor_full = data[i].fluor_full;
                    } else {
                        var fluor_full = "";
                    }
                    html += '    <td>' + fluor_full + '</td>';
    
                    if (data[i].depth != null) {
                        var depth = parseFloat(data[i].depth).toFixed(1);
                    } else {
                        var depth = "";
                    }
                    html += '    <td>' + depth + '</td>';
                    if (data[i].table_d != null) {
                        var table_d = parseInt(data[i].table_d);
                    } else {
                        var table_d = "";
                    }
                    html += '    <td>' + table_d + '</td>';
                    if (data[i].new_discount != null) {
                        var new_discount = parseFloat(data[i].new_discount).toFixed(2);
                    } else {
                        var new_discount = "";
                    }
                    html += '    <td>' + new_discount + '</td>';
                    if (data[i].rapnet != null) {
                        var rapnet = parseInt(data[i].rapnet);
                    } else {
                        var rapnet = "";
                    }
                    html += '    <td>' + rapnet + '</td>';

                    // Comment by Tarun for Price
                    if (data[i].cost_carat != null) {
                        var cost_carat = Math.round(data[i].cost_carat);
                    } else {
                        var cost_carat = "";
                    }
                    html += '    <td>' + cost_carat + '</td>';

                    if (data[i].origin != null) {
                        var origin = data[i].origin;
                    } else {
                        var origin = "";
                    }
                    html += '    <td>' + origin + '</td>';


                    if (data[i].lab != null) {
                        var lab = data[i].lab;
                    } else {
                        var lab = "";
                    }
                    html += '    <td>' + lab + '</td>';

                    if (data[i].report_no != null) {
                        var report_no = data[i].report_no;
                    } else {
                        var report_no = "";
                    }
                    html += '    <td>' + report_no + ' </td>';

                    // if (data[i].brand != null) {
                    //     var brand = data[i].brand;
                    // } else {
                    //     var brand = "";
                    // }
                    // html += '    <td>' + brand + '</td></tr>';

                    if (data[i].measurements != null) {
                        var MEASUREMENTS = data[i].measurements;
                    } else {
                        var MEASUREMENTS = "";
                    }
                    html += '    <td>' + MEASUREMENTS + '</td>';


                }
                html += '    </table>';
                //alert(html);
                print(html);
            },

        });
} else
{
    alert_boot('Please, Select atleast one Record to print list.');
}
}

//+++++++++++++ Print pfd List+++++++++++++++
function print_pdf()
{
    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox_arr.push($(this).val());
    });
    var dis_value = 0;

    if (checkbox_arr.length)
    {
        alertify.confirm(
            'Shakti Jewel',
            'Are you sure! you want to Generate PDF?',
            function (evt, value)
            {
                location.href = base_url + 'print-pdf?all_id=' + checkbox_arr + '&dis_value=' + dis_value
            }
            , function () {
            });
    } else
    {
        alert_boot('Please, Select atleast one Record to Generate PDF.');
    }
}


//-------- print detail-----//

//+++++++++++++ Print Data List+++++++++++++++
function print_detail(diamond_id)
{
    var html = '';
    //alert(checkbox_arr);        
    //alert(checkbox_arr.length);
    $.ajax({
        url: base_url + 'print-details-diamond',
        dataType: 'json',
        type: 'get',
        data: {"diamond_id": diamond_id},
        success: function (result) {
            var data = result.records;

            var image = result.image_array;
            var data_length = data.length;
            for (i = 0; i < data_length; i++)
            {
                count = parseInt(i) + 1;
                var a = "'" + data[i].stock_id + "'";
                //if(data[i].shape_full != null){ var shape_full=data[i].shape_full; }else{ var shape_full=""; }
                if (data[i].shape_full != null) {
                    var shape_full = data[i].shape_full;
                } else {
                    var shape_full = "";
                }
                if (data[i].weight != null) {
                    var weight = parseFloat(data[i].weight).toFixed(2);
                } else {
                    var weight = "";
                }
                if (data[i].color != null) {
                    var color = data[i].color;
                } else {
                    var color = "";
                }
                if (data[i].grade != null) {
                    var grade = data[i].grade;
                } else {
                    var grade = "";
                }
                if (data[i].cut_full != null) {
                    var cut_full = data[i].cut_full;
                } else {
                    var cut_full = "";
                }
                if (data[i].polish_full != null) {
                    var polish_full = data[i].polish_full;
                } else {
                    var polish_full = "";
                }
                if (data[i].symmetry_full != null) {
                    var symmetry_full = data[i].symmetry_full;
                } else {
                    var symmetry_full = "";
                }
                if (data[i].fluor_full != null) {
                    var fluor_full = data[i].fluor_full;
                } else {
                    var fluor_full = "";
                }
                if (data[i].depth != null) {
                    var depth = parseFloat(data[i].depth).toFixed(1);
                } else {
                    var depth = "";
                }
                if (data[i].table_d != null) {
                    var table_d = parseInt(data[i].table_d);
                } else {
                    var table_d = "";
                }
                if (data[i].cost_carat != null) {
                    var cost_carat = Math.round(data[i].cost_carat);
                } else {
                    var cost_carat = "";
                }
                if (data[i].total_price != null) {
                    var total_price = Math.round(data[i].total_price);
                } else {
                    var total_price = "";
                }
                if (data[i].lab != null) {
                    var lab = data[i].lab;
                } else {
                    var lab = "";
                }
                if (data[i].measurements != null) {
                    var MEASUREMENTS = data[i].measurements;
                } else {
                    var MEASUREMENTS = "";
                }
                if (data[i].origin != null) {
                    var origin = data[i].origin;
                } else {
                    var origin = "";
                }
                if (data[i].report_no != null) {
                    var report_no = data[i].report_no;
                } else {
                    var report_no = "";
                }
                if (data[i].culet != null) {
                    var culet = data[i].culet;
                } else {
                    var culet = "";
                }
                if (data[i].crown_ht != null) {
                    var crown_ht = data[i].crown_ht;
                } else {
                    var crown_ht = "";
                }
                if (data[i].crown_angle != null) {
                    var crown_angle = data[i].crown_angle;
                } else {
                    var crown_angle = "";
                }
                if (data[i].pavillion_angle != null) {
                    var pavillion_angle = data[i].pavillion_angle;
                } else {
                    var pavillion_angle = "";
                }
                if (data[i].pavillion_depth != null) {
                    var pavillion_depth = data[i].pavillion_depth;
                } else {
                    var pavillion_depth = "";
                }
                if (data[i].availability != null) {
                    var availability = data[i].availability;
                } else {
                    var availability = "";
                }
                if (data[i].new_discount != null) {
                    var new_discount = parseFloat(data[i].new_discount).toFixed(2);
                    ;
                } else {
                    var new_discount = "";
                }
                if(data[i].currency != null){
                    var currency = parseFloat(data[i].currency).toFixed(0);
                } else {
                    var currency = "";
                }



                html += '<div id="description" class="tab-pane fade in active" role="tabpanel">';
                html += '  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">';
                html += '     <h3>Stock# : ' + data[i].stock_id + '</h3>';
                html += '<table width="100%" border="0">';
                html += '       <tr>';
                html += '         <td colspan="2"><img width="70%" src="' + image + '"></td>';
                html += '         <td colspan="2">' + weight + ' CARAT ' + shape_full + ' DIAMOND ' + color + ' COLOR ' + cut_full + ' CUT</td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '       <tr>';
                html += '       <tr>';
                html += '         <td colspan="4"><h3>Product Details</h3></td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '       <tr>';
                html += '         <td>Stock# : </td>';
                html += '         <td>' + data[i].stock_id + '</td>';
                html += '         <td>Report No :</td>';
                html += '         <td>' + report_no + ' </td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '         <td>Disc% :</td>';
                html += '         <td>' + new_discount + ' </td>';
                html += '         <td></td>';
                html += '         <td></td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '       <tr>';
                html += '         <td>$/Carat :</td>';
                html += '         <td>' + cost_carat + ' </td>';
                html += '         <td></td>';
                html += '         <td></td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '       <tr>';
                html += '         <td>Total :</td>';
                html += '         <td>' + total_price + ' </td>';
                html += '         <td></td>';
                html += '         <td></td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '         <td>Thai Baht :</td>';
                html += '         <td>' + currency + ' </td>';
                html += '         <td></td>';
                html += '         <td></td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '         <td>Shape : </td>';
                html += '         <td>' + shape_full + '</td>';
                html += '         <td>Cts :</td>';
                html += '         <td>' + weight + ' </td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '         <td>Color : </td>';
                html += '         <td>' + color + '</td>';
                html += '         <td>Clarity :</td>';
                html += '         <td>' + grade + ' </td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '         <td>Cut : </td>';
                html += '         <td>' + cut_full + '</td>';
                html += '         <td>Polish :</td>';
                html += '         <td>' + polish_full + ' </td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '         <td>Symmetry : </td>';
                html += '         <td>' + symmetry_full + '</td>';
                html += '         <td>Fluorescence :</td>';
                html += '         <td>' + fluor_full + ' </td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '         <td>Depth% : </td>';
                html += '         <td>' + depth + '</td>';
                html += '         <td>Table% :</td>';
                html += '         <td>' + table_d + ' </td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '         <td>Measurements : </td>';
                html += '         <td>' + MEASUREMENTS + '</td>';
                // html +='         <td>Culet :</td>';                                                   
                // html +='         <td>'+ culet +' </td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '         <td>Origin : </td>';
                html += '         <td>' + origin + '</td>';
                // html +='         <td>Culet :</td>';                                                   
                // html +='         <td>'+ culet +' </td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '         <td>Culet : </td>';
                html += '         <td>' + culet + '</td>';
                html += '         <td>Crown Height :</td>';
                html += '         <td>' + crown_ht + ' </td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '         <td>Crown Angle : </td>';
                html += '         <td>' + crown_angle + '</td>';
                html += '         <td>Pavilion Angle :</td>';
                html += '         <td>' + pavillion_angle + ' </td>';
                html += '       </tr>';
                html += '       <tr>';
                html += '         <td>Pavilion Depth : </td>';
                html += '         <td>' + pavillion_depth + '</td>';
                html += '         <td>Lab :</td>';
                html += '         <td>' + lab + ' </td>';
                html += '       </tr>';
                html += '    </table>';
                html += '     </div>';
                html += '   </div>';
                // html += '     <div align="center" style="margin-top:250px !important;">';
                // html += '     <a>' + base_url + '</a>';
                // html += '     </div>';

            }
            html += '    </table>';
            //alert(html);
            print(html);
        },
    });
}



function print(html)
{
    //alert(html);
    var mywindow = window.open();
    mywindow.document.write('<html><head><title>print stone</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write(html);
    mywindow.document.write('</body></html>');

    mywindow.print();
    mywindow.close();

    return true;
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function view_data() {
    //alert(id);
    var checkbox_arr = [];
    var checkbox = [];
    $.each($("input[name='checkbox_record[]']:not(:checked)"), function () {
        checkbox_arr.push($(this).val());
    });
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox.push($(this).val());
    });

    //alert(checkbox_arr);
    if (checkbox.length)
    {
        $.each(checkbox_arr, function (index, value) {
            //console.log(value);
            $("#tr_" + value).remove();
        });
        $.each(checkbox, function (index, value) {
            //console.log(value);
            $("#tr_" + value).removeClass('trColor');
            $(".tr_checkbox").prop("checked", false);
        });

    } else
    {
        alert_boot('Please,Select atleast one record.');
    }

}
//++++++++++++++++++++++++ More Details ++++++++++++++++++++++++++
function showSlides(n)
{
    $(".mySlides").hide();
    $("#easy_zoom").hide();

    $("#slides_" + n).show();
}
function open_windows(src)
{
    window.open(src, "Diamond", "width=800, height=800");
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
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function add_cart() {
    //alert('test');
    // $.ajax({
    //     url: base_url + 'add-cart-diamond',
    //     dataType: 'json',
    //     type: 'get',
    //     data: {"diamond_id": diamond_id},
    //     success: function (data) {
    //         console.log(data);
    //         var details = data.records;
    //         var html = "";
    //         var sum = 0.00;
    //         if (data.message == 'ok')
    //         {
    //             var details = data.records;
    //             $("#total_cart_count_d").html(details.quantity);
    //             $(".icon-bag").effect("bounce", {times: 3, distance: 7}, 'slow');
    //         } else if (data.message == 'login')
    //         {
    //             $("#login_modal").modal('show');
    //         }
    //     },
    // });
    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox_arr.push($(this).val());
    });

    if (checkbox_arr.length > 0)
    {

        $.ajax({
            url: base_url+'add-cart-diamond',
            dataType: 'json',
            type: 'get',            
            data: { "diamond_id": checkbox_arr },                                         
            success: function(data){
               // console.log(data);
               var details=data.records;
               var html="";
               var sum=0.00;
               if(data.message != '')
               {
                var details=data.records;
                $("#total_cart_count_d").html(details.quantity);                 
                alertify.confirm('Shakti Jewel', data.message, 
                    function(){ 
                      location.href = base_url+"cart-diamond";
                  }, 
                  function(){  }).set('labels', { ok:'Go to cart', cancel:'Go to Search' });
                
            } else if (data.message == 'login')
            {
                $("#login_modal").modal('show');
            }
        },
    });

    }
    else
    {
        alert_boot('Please,Select atleast one stone.');                    
    }

}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function add_wish() {

    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox_arr.push($(this).val());
    });

    if (checkbox_arr.length > 0)
    {

        $.ajax({
            url: base_url+'add-wish-diamond',
            dataType: 'json',
            type: 'get',            
            data: { "diamond_id": checkbox_arr },                                         
            success: function(data){
                var details=data.records;
                var html="";
                var sum=0.00;
                if(data.message != '')
                {
                    var details=data.records;
                    $("#total_wish_count_d").html(details.quantity);                 
                    alertify.confirm('Shakti Jewel', data.message, 
                        function(){ 
                          location.href = base_url+"wishlist-diamond";
                      }, 
                      function(){  }).set('labels', { ok:'Go to Wishlist', cancel:'Go to Search' });

                } else if (data.message == 'login')
                {
                    $("#login_modal").modal('show');
                }
            },
        });

    }
    else
    {
        alert_boot('Please,Select atleast one stone.');                    
    }

}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function export_list()
{
    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox_arr.push($(this).val());
    });
    var dis_value = 0;

    if (checkbox_arr.length)
    {
        alertify.confirm(
            'Shakti Jewel',
            'Are you sure! you want to Download Inventory?',
            function (evt, value)
            {
                location.href = base_url + 'export-diamond?all_id=' + checkbox_arr + '&dis_value=' + dis_value
            }
            , function () {
            });
    } else
    {
        //alert_boot('Please,Select atleast one record.'); 
        alertify.confirm(
            'Shakti Jewel',
            'Are you sure! you want to Download Full Inventory?',
            function (evt, value)
            {
                location.href = base_url + 'export-all-diamond?all_id=' + checkbox_arr + '&dis_value=' + dis_value
            }
            , function () {
            });
    }
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function add_compare(diamond_id) {

    var html_thead = '<thead><tr><td></td>';
    var html_stock = '<tbody><tr><td class="heads">Stock#</td>';
    var html_shape = '<tr><td class="heads">Shape</td>';
    var html_cts = '<tr><td class="heads">Cts</td>';
    var html_color = '<tr><td class="heads">Color</td>';
    var html_clarity = '<tr><td class="heads">Clarity</td>';
    var html_cut = '<tr><td class="heads">Cut</td>';
    var html_pol = '<tr><td class="heads">Pol</td>';
    var html_sym = '<tr><td class="heads">Sym</td>';
    var html_fluor = '<tr><td class="heads">Fluor</td>';
    var html_depth = '<tr><td class="heads">Depth%</td>';
    var html_table = '<tr><td class="heads">Table%</td>';
    var html_rap = '<tr><td class="heads">Rap.($)</td>';
    var html_cpc = '<tr><td class="heads">$/Carat</td>';
    var html_disc = '<tr><td class="heads">Disc%</td>';
    var html_total = '<tr><td class="heads">Total $</td>';
    var html_thai_bhat = '<tr><td class="heads">Thai Baht &#3647;</td>';
    var html_descr = '<tr><td class="heads">Descrip</td>';
    var html_lab = '<tr><td class="heads">Lab</td>';
    // var html_pic = '<tr><td class="heads">Pic</td>';
    // var html_brand = '<tr><td class="heads">Brand</td>';
    var html_meas = '<tr><td class="heads">Measurements</td>';
    var html_image = '<tr><td class="heads">Image</td>';
    var html_video = '<tr><td class="heads">Video</td>';
    var html_cert = '<tr><td class="heads">Certificate</td>';
    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox_arr.push($(this).val());
    });
    var checkbox_str = checkbox_arr.toString();

    if (checkbox_arr.length  && checkbox_arr.length <=3) {

        $.ajax({
            url: base_url + 'add-compare-diamond',
            dataType: 'json',
            type: 'get',
            data: {"diamond_id": checkbox_arr},
            success: function (data) {
               // console.log(data);
                //var image = data.image_array;
                var data_length = data.length;
                for (var i = 0; i < data_length; i++) {
                    count = parseInt(i) + 1;
                    var a = "'" + data[i].stock_id + "'";
                    if (data[i].stock_id != null) {
                        var stock_id = data[i].stock_id;
                    } else {
                        var stock_id = "";
                    }
                    if (data[i].shape_full != null) {
                        var shape_full = data[i].shape_full;
                    } else {
                        var shape_full = "";
                    }
                    if (data[i].weight != null) {
                        var weight = parseFloat(data[i].weight).toFixed(2);
                    } else {
                        var weight = "";
                    }
                    if (data[i].color != null) {
                        var color = data[i].color;
                    } else {
                        var color = "";
                    }
                    if (data[i].grade != null) {
                        var grade = data[i].grade;
                    } else {
                        var grade = "";
                    }
                    if (data[i].cut_full != null) {
                        var cut_full = data[i].cut_full;
                    } else {
                        var cut_full = "";
                    }
                    if (data[i].polish_full != null) {
                        var polish_full = data[i].polish_full;
                    } else {
                        var polish_full = "";
                    }
                    if (data[i].symmetry_full != null) {
                        var symmetry_full = data[i].symmetry_full;
                    } else {
                        var symmetry_full = "";
                    }
                    if (data[i].fluor_full != null) {
                        var fluor_full = data[i].fluor_full;
                    } else {
                        var fluor_full = "";
                    }
                    if (data[i].depth != null) {
                        var depth = parseFloat(data[i].depth).toFixed(1);
                    } else {
                        var depth = "";
                    }
                    if (data[i].table_d != null) {
                        var table_d = parseInt(data[i].table_d);
                    } else {
                        var table_d = "";
                    }
                    if (data[i].cost_carat != null) {
                        var cost_carat = Math.round(data[i].cost_carat);
                    } else {
                        var cost_carat = "";
                    }
                    if (data[i].total_price != null) {
                        var total_price = Math.round(data[i].total_price);
                    } else {
                        var total_price = "";
                    }
                    if (data[i].lab != null) {
                        var lab = data[i].lab;
                    } else {
                        var lab = "";
                    }
                    if (data[i].measurements != null) {
                        var measurements = data[i].measurements;
                    } else {
                        var measurements = "";
                    }
                    if (data[i].origin != null) {
                        var origin = data[i].origin;
                    } else {
                        var origin = "";
                    }
                    if (data[i].rapnet != null) {
                        var rapnet = data[i].rapnet;
                    } else {
                        var rapnet = "";
                    }
                    if (data[i].brand != null) {
                        var brand = data[i].brand;
                    } else {
                        var brand = "";
                    }

                    if (data[i].new_discount != null) {
                        var new_discount = parseFloat(data[i].new_discount).toFixed(2);
                        ;
                    } else {
                        var new_discount = "";
                    }

                    if (data[i].currency != null) {
                        var currency = parseFloat(data[i].currency).toFixed(0);
                        ;
                    } else {
                        var currency = "";
                    }
                    if (data[i].diamond_image != null) {
                        var image = data[i].diamond_image;
                        ;
                    } else {
                        var image = "";
                    }
                    if (data[i].diamond_video != null) {
                        var video = data[i].diamond_video;
                        ;
                    } else {
                        var video = "";
                    }
                    if (data[i].report_filename != null) {
                        var certificate = data[i].report_filename;
                        ;
                    } else {
                        var certificate = "";
                    }


                    html_thead += '   <td class="text-center">';
                    html_thead += '       <div class="col-md-12">';
                    html_thead += '           <div class="clsimages">';
                    // html_thead += '               <a href="https://dnalink.in/Imaged/'+PACKET_NO+'/still.jpg" target="_blank">';
                    // html_thead += '                   <img src='+stock_id+'>';
                    // html_thead += '               </a>';
                    html_thead += '          </div>';
                    html_thead += '      </div>';
                    html_thead += '  </td>';

                    html_stock += '<td>' + stock_id + '</td>';
                    html_shape += '<td>' + shape_full + '</td>';
                    html_cts += '<td>' + weight + '</td>';
                    html_color += '<td>' + color + '</td>';
                    html_clarity += '<td>' + grade + '</td>';
                    html_cut += '<td>' + cut_full + '</td>';
                    html_pol += '<td>' + polish_full + '</td>';
                    html_sym += '<td>' + symmetry_full + '</td>';
                    html_fluor += '<td>' + fluor_full + '</td>';
                    html_depth += '<td>' + depth + '</td>';
                    html_table += '<td>' + table_d + '</td>';
                    html_rap += '<td>' + rapnet + '</td>';
                    html_cpc += '<td>' + cost_carat + '</td>';
                    html_disc += '<td class="color-red">' + new_discount + '</td>';
                    html_total += '<td class="color-green">' + total_price + '</td>';
                    html_thai_bhat += '<td class="color-blue">' + currency + '</td>';
                    html_descr += '<td>' + origin + '</td>';
                    html_lab += '<td>' + lab + '</td>';
                    // html_pic += '<td><a href="https://dna.dnalink.in/d/'+PACKET_NO+'" target="_blank">DNA</a></td>';
                   // html_brand += '<td>' + brand + '</td>';
                   html_image += '    <td> ';
                   html_image += '       <a target="_blank" href="' + image + '">';
                   html_image += '       <i class="fas fa-images"></i>';
                   html_image += '      </a>';
                   html_image += '     </td>';
                   html_video += '      <td>';
                   html_video += '       <a target="_blank" href="' + video + '">';
                   html_video += '       <i class="fas fa-video"></i>';
                   html_video += '      </a>';
                   html_video += '      </td>';
                   html_cert += '      <td>';
                   html_cert += '       <a target="_blank" href="' + certificate + '">';
                   html_cert += '        <i class="fas fa-file-certificate"></i>';
                   html_cert += '      </a>';
                   html_cert += '    </td>';
                   html_meas += '<td>' + measurements + '</td>';
                    // html_image += '<td>' + image + '</td>';
                    // html_video += '<td>' + video + '</td>';
                    // html_cert += '<td>' + certificate + '</td>';

                    var html = html_thead + '</tr></thead>' + html_stock + '</tr>' + html_shape + '</tr>' + html_cts + '</tr>' + html_color + '</tr>' + html_clarity + '</tr>' + html_cut + '</tr>'
                    + html_pol + '</tr>' + html_sym + '</tr>' + html_fluor + '</tr>'  + html_depth + '</tr>' + html_table + '</tr>' + html_rap + '</tr>'
                    + html_cpc + '</tr>' + html_disc + '</tr>' + html_total + '</tr>' + html_thai_bhat + '</tr>' + html_descr + '</tr>' + html_lab + '</tr>' + html_meas + '</tr>' + html_image + '</tr>' + html_video + '</tr>' + html_cert + '</tr></tbody>';

                }
                //    html += '    </table>';

                $('#CompareStone').append(html)
                $('#compare-stock').modal('show');
                $("#compare-stock").on("hidden.bs.modal", function(){
                    $("#CompareStone").html("");
                });
            },
        });
} else if(checkbox_arr.length > 3){
   alert_boot('The limit for comparison is not more than 3 stones.');   
}
else {
    alert_boot('Please, Select atleast one stone.');
}

}
//------------------ Send Quote -------------------------------------//
function send_quote()
{
    //alert();          
    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox_arr.push($(this).val());
    });

    if (checkbox_arr.length)
    {
        $("#get_quote_response").text('You have selected ' + checkbox_arr.length + ' stone(s).');
        $("#checkbox_quote_arr").val(checkbox_arr);
        $("#get_quote_modal").modal('show');
    } else
    {
        alert_boot('Please, Select atleast one stone for send email.');
    }
}

function get_quote() {
    var value_form = $('#send_quote').serialize();
    $.ajax({
        url: base_url+'send-quote',
        dataType: 'json',
        type: 'post',            
        data: value_form,
        success: function (data) {
            if (data.status) {
                document.getElementById("send_quote").reset();
                $("#get_quote_response").text('');
                $("#checkbox_quote_arr").val('');
                $("#get_quote_modal").modal('hide');
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(data.message);
                location.href = base_url+"diamond-orders";
            }

        },
        beforeSend: function () {
            $("#page-loader").show();
        },
        complete: function () {
            $("#page-loader").fadeOut();
        }
    });
}
//------------------ Send Email -------------------------------------//
function send_data()
{
    //alert();          
    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox_arr.push($(this).val());
    });

    if (checkbox_arr.length)
    {
        $("#alert_emailmodal_message").text('You have selected ' + checkbox_arr.length + ' stone(s). Your recipient will recieve the details of your selected stone(s).');
        $("#checkbox_arr").val(checkbox_arr);
        $("#alert_emailmodal").modal('show');
    } else
    {
        alert_boot('Please, Select atleast one stone for send email.');
    }
}

function send_data_submit() {
    var value_form = $('#sendemail').serialize();
    $.ajax({
        url: base_url + 'send-data',
        dataType: 'json',
        type: 'post',
        data: value_form,
        success: function (data) {
            if (data.status) {
                document.getElementById("sendemail").reset();
                $("#alert_emailmodal_message").text('');
                $("#checkbox_arr").val('');
                $("#alert_emailmodal").modal('hide');
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(data.message);
            }

        },
        beforeSend: function () {
            $("#page-loader").show();
        },
        complete: function () {
            $("#page-loader").fadeOut();
        }
    });
}
//------------------ check_avail Email -------------------------------------//
function checkAvail()
{
    //alert();          
    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox_arr.push($(this).val());
    });

    if (checkbox_arr.length)
    {
        $("#check_avail_arr").val(checkbox_arr);
        $("#check_avail_modal").modal('show');
    } else
    {
        alert_boot('Please, Select atleast one stone.');
    }
}
function checkAvailSubmit() {
    var value_form = $('#check_avail_form').serialize();
    $.ajax({
        url: base_url + 'check-avail',
        dataType: 'json',
        type: 'post',
        data: value_form,
        success: function (data) {
            if (data.status) {
                document.getElementById("check_avail_form").reset();
                $("#check_avail_arr").val('');
                $("#check_avail_modal").modal('hide');
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(data.message);
            }

        },
        beforeSend: function () {
            $("#page-loader").show();
        },
        complete: function () {
            $("#page-loader").fadeOut();
        }
    });
}



//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function imageDownload() {
    var checkbox_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox_arr.push($(this).val());
    });
    var checkbox_str = checkbox_arr.toString();
    if (checkbox_str)
    {
        location.href = base_url + 'diamond-download-file?type=image&stock=' + checkbox_str
    } else
    {
        alert_boot('Please,Select atleast one stone.');
    }
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function fileDownload(type) {
    var checkbox_arr = [];
    var cert_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox_arr.push($(this).val());
        //cert_arr.push($(this).attr('data-report'));
    });
    var checkbox_str = checkbox_arr.toString();
    var cert_str = cert_arr.toString();

    if (checkbox_arr.length && checkbox_arr.length <= 5) {
        location.href = base_url + 'diamond-download-file?type=' + type + '&stock=' + checkbox_str + '&report=' + cert_str
    } else if (checkbox_arr.length > 5) {
        alert_boot('You cannot Download more than 5 stones.');
    } else {
        alert_boot('Please,Select atleast one stone.');
    }
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

function fileEmail(type) {
    var checkbox_arr = [];
    var cert_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function () {
        checkbox_arr.push($(this).val());
        cert_arr.push($(this).attr('data-report'));
    });
    var checkbox_str = checkbox_arr.toString();
    var cert_str = cert_arr.toString();

    if (checkbox_arr.length > 0)
    {
        if (checkbox_arr.length > 5 && type == 'image') {
            alert_boot('You cannot Email Image more than 5 stones.');
        } else if (checkbox_arr.length > 1 && type == 'video') {
            alert_boot('You cannot Email Video more than 1 stones.');
        } else if (checkbox_arr.length > 1 && type == 'all') {
            alert_boot('You cannot Email more than 1 stones.');
        } else {
            $.ajax({
                url: base_url + 'diamond-email-file',
                dataType: 'json',
                type: 'get',
                data: {"stock": checkbox_str, "report": cert_str, "type": type},
                success: function (data) {
                    alert_boot(data.message);
                },
                beforeSend: function () {
                    $("#loading").show();
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }
    } else
    {
        alert_boot('Please,Select atleast one stone.');
    }
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

const shortLink_btn = document.querySelector('#shortLink');
shortLink_btn.addEventListener('click', function() {
    shortLink('1');
});
const shortLinkWOP_btn = document.querySelector('#shortLinkWOP');
shortLinkWOP_btn.addEventListener('click', function() {
    shortLink('0');
});

function shortLink(id)
{
    var html = "";
    var checkbox_arr = [];
    var cert_arr = [];
    $.each($("input[name='checkbox_record[]']:checked"), function(){
        checkbox_arr.push($(this).val());
        cert_arr.push($(this).attr('data-report'));
    });

    var checkbox_str=checkbox_arr.toString();
    var cert_str=cert_arr.toString(); 

    if(checkbox_arr.length > 0  && checkbox_arr.length < 11)
    {
        $.ajax({
            url: base_url+'short-link-diamond',
            dataType: 'json',
            type: 'get',            
            data: { "diamond_id": checkbox_arr,"report": cert_arr},
            success: function(data) {
             var details = data.records;
             var data_length = details.length;
             for (var i = 0; i < data_length; i++) {
                count = parseInt(i) + 1;
                if (details[i].diamond_id != null) { var diamond_id = details[i].diamond_image; } else { var diamond_id = "";}
                if (details[i].diamond_image != null) { var diamond_image = details[i].diamond_image; } else { var diamond_image = "";}
                if (details[i].diamond_video != null) { var diamond_video = details[i].diamond_video; } else { var diamond_video = "";}
                if (details[i].report_filename != null) { var report_filename = details[i].report_filename; } else { var report_filename = "";}
                if (details[i].stock_id != null) { var stock_id = details[i].stock_id; } else { var stock_id = "";}
                if (details[i].shape_full != null) { var shape_full = details[i].shape_full; } else { var shape_full = ""; }
                if (details[i].color != null) { var color = details[i].color;} else { var color = "";}
                if (details[i].grade != null) {var grade = details[i].grade;} else {var grade = "";}
                if (details[i].cut_full != null) {var cut_full = details[i].cut_full;} else {var cut_full = "";}
                if (details[i].polish_full != null) {var polish_full = details[i].polish_full;} else {var polish_full = "";}
                if (details[i].symmetry_full != null) {var symmetry_full = details[i].symmetry_full;} else {var symmetry_full = "";} 
                if (details[i].fluor_full != null) {var fluor_full = details[i].fluor_full;} else {var fluor_full = "";}
                if (details[i].report_no != null) {var report_no = details[i].report_no;} else {var report_no = "";}
                if (details[i].lab != null) {var lab = details[i].lab;} else {var lab = "";}
                if (details[i].weight != null) { var weight = details[i].weight;} else {var weight = "";}           
                if(details[i].new_discount != null){ var new_discount =  details[i].new_discount; } else {var new_discount = "";}
                if(details[i].cost_carat != null){ var cost_carat =  Math.round(details[i].cost_carat); } else {var cost_carat = "";}
                if(details[i].total_price != null){ var total_price =  Math.round(details[i].total_price); } else {var total_price = "";}
                if(details[i].currency != null){ var currency =  Math.round(details[i].currency); } else {var currency = "";}

                html += 'Stock#' +stock_id+ ' \r\n ' ;

                html += 'Image ' +diamond_image+ ' \r\n ' ;

                html += 'Video ' +diamond_video+ ' \r\n ' ;

                html += 'Cert ' +report_filename+ ' \r\n ' ;

                html += ' ' +shape_full+ '  ' ;
                html += ' - ' +color+ '  ' ;
                html += ' - ' +grade+ '  ' ;
                html += ' - ' +cut_full+ '  ' ;
                html += ' - ' +polish_full+ '  ' ;
                html += ' - ' +symmetry_full+ '  ' ;
                html += ' - ' +fluor_full+ '  ' ;
                html += ' - ' +lab+ '  ' ;
                html += ' - ' +report_no+ '  ' ;
                
                html += ' ' +weight+ ' Ct ' ;


                if(id > 0){
                    html += '  ' +new_discount+ '% off ' ;

                    html +=  ' P/Ct $' +cost_carat+ '  ' ;
                    
                    html += ' Total $' +total_price+ '   ' ;

                    html += ' Thai Bhat &#3647;' +currency+ '   ' ;
                }                 
            }
            $("#short-link-text").val(html);
            var copyText = document.getElementById('short-link-text');
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            var successful = document.execCommand("copy");
            if(successful) {   
             alertify.set('notifier', 'position', 'top-right');
             alertify.success('Stone details have been copied Press Ctrl +V on your WhatsApp Web to send in a Chat!');                     
         } else {
           alertify.set('notifier', 'position', 'top-right');
           alertify.error('Your browser has denied COPY action!');
       }     
   },
   beforeSend: function () {
    $("#loading").show();
},
complete: function () {
    $("#loading").hide();                
}
});
}
else if(checkbox_arr.length > 10){
    alert_boot('You can not select more than 10 stone.');        
}
else
{
    alert_boot('Please,Select atleast one stone.');                    
}
}

// function loginFunction() {
//    $("#login_modal").modal('show');
// }