/**
 * Created by jyothish on 01-08-2017.
 */
$(function() {
    $('.banner').addClass('active');
});

//var bottom = $('.banner_2').offset().top;
//$(window).scroll(function(){
//    if ($(this).scrollTop() > bottom){
//        alert("ss");
//    }
//    else{
//
//    }
//});


$(document).ready(function() {
    $(window).on('scroll', function() {
        yPos = window.pageYOffset;
        shift = yPos * -0.3 + 'px';
        $('.banner').css('top', shift);
    });

});


function men_act() {
    $(".banner").toggleClass("active_menu");
}


function init() {
    $('.ham_icon').click(men_act);
}
$(document).ready(init);