function panel_select()
{
    var id = $(this).attr('data-id');
    $('.common_panel').css({'display':'none'});
    $(id).css({'display':'block'});
    $('.tab_nav').removeClass('active_tab');
    $(this).addClass('active_tab');
}
function active_popup()
{
    $(".slider_popup").addClass('active');
}
function close_popup()
{
    $(".slider_popup").removeClass('active');
}
function check_toggle()
{
    $(this).toggleClass('active_ck');
}



function init() {
    $('.tab_nav').click(panel_select);
    $('.panel_blocks').click(active_popup);
    $('.slideshow').click(active_popup);
    $('.slide_close').click(close_popup);
    $('.check_slide').click(check_toggle);
}
$(document).ready(init);