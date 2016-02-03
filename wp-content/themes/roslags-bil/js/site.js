/*
 * site.js
 * Detta är den globala JS filen för sidan.
 */

$(function () {

    jQuery(".toTop").click(function () {
        $("html,body").animate({"scrollTop": 0});
        return false;
    });

    /* Mobil meny
     $('.menu-expand-button').click(function(){
     if(!$('#mobilemenu').is(':visible')){
     $('#mobilemenu').slideDown();
     }else{
     $('#mobilemenu').slideUp();
     }
     });
     $('.menu-item-has-children > a').click(function(e){
     if($(window).width() < 980){
     e.preventDefault();
     $(this).parent().children('ul').slideToggle();
     if(!$(this).hasClass('open')){
     $(this).addClass('open');
     }else{
     $(this).removeClass('open');
     }
     }
     });

     // Form validation
     $('.wpcf7-submit').click(function(){
     setTimeout(function(){
     alert($('#formresponsemessage > div').html());
     },1000);
     });

     $('.menu-item-has-children > a').click(function(e){
     $(this).parent().children('ul').toggle();
     if(!$(this).hasClass('open')){
     $(this).addClass('open');
     }else{
     $(this).removeClass('open');
     }
     });

     $('.menu-item-has-children > a').click(function(e){
     $(this).parent().children('ul').addClass('open');
     if(!$(this).hasClass('open')){
     $(this).addClass('open');
     }else{
     $(this).removeClass('open');
     }
     });*/
});

/* Denna funktion används för att scrolla ner till Finansiering på detaljsidan för bilar */
function scrollDown() {
    $('body').animate({scrollTop: $('#finance').offset().top}, 500);
}
/* Scrollanimation till Sök, Lagerbilar och Detaljsidan för bilar */
var loadScroll = function () {
    $('body').animate({scrollTop: (($('.page-title').offset().top) + ($('.page-title').height()))}, 1000);
}

var sliderSlide = function () {
    setTimeout(function () {
        $('#carslider .slides').fadeIn(200);
    }, 700);
}
