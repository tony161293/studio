$(document).ready(function(){
    $('.if_selected').hide();
    $('.panel_blocks_duplicate').click(function(){
        var names = [];
        names.push($(this).children('.panel_name').children('.image_name').text());
        $(this).children('.if_selected').show();
    });
});