$(document).ready(function(){
    var names = [];
    $('.if_selected').hide();
    $('.panel_blocks_duplicate').click(function(){
        var imageName = $(this).children('.panel_name').children('.image_name').text();
        if($.inArray(imageName, names) !== -1){
            names.splice(names.indexOf(imageName), 1);
            $(this).children('.if_selected').toggle();
        }
        else{
            names.push(imageName);
            $(this).children('.if_selected').toggle();
        }
    });
    $('#submit_images').click(function(){
        if(names.length>0){
            $.post("../dashboard/submitSelected.php", {namesArray: names}, function(result){
                if(result==1){
                    window.location = "../dashboard/photo_list.php";
                }
                else{
                    // Some issue with server
                }
            });
        }
        else{
            // Error not selected photos
        }
    });
});