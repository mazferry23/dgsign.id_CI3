"use strict";
$('section.sound-toggle').hide();
$(document).ready(function(){
    AOS.init({duration:1200}
    ),
$("button.btn-open").click(function(){
    $('section.intro').fadeOut(1e3);
    $('.main-function').fadeIn(1e3);
    AOS.init();
	
	typeof $('audio')[0] !=='undefined' ? $('section.sound-toggle').show() : '';
	typeof $('audio')[0] !=='undefined' ? $('audio')[0].play() : '';
    typeof $('iframe') !=undefined ? $('iframe').attr('src',$('iframe').attr('src')) : '';
    typeof $('video')[0] !=='undefined' ? $('video')[0].pause() : '';
}),
$("#customSwitch1").click(function() {
    $("#customSwitch1:checkbox:checked").length > 0 ? ($(".intro").find(".cage-name").removeClass("active"), $(".intro").find(".cage-video").addClass("active")) : ($(".intro").find(".cage-name").addClass("active"), $(".intro").find(".cage-video").removeClass("active"))
}),
$('.cage-video').click(function(){
    typeof $('audio')[0] !=='undefined' ? $('audio')[0].pause() : '';
    $('#modalVideo').modal('show');
}),
$('.btn-close').click(function(){
    typeof $('iframe') !=undefined ? $('iframe').attr('src',$('iframe').attr('src')) : '';
    $('#modalVideo').modal('hide');
    typeof $('video')[0] !=='undefined' ? $('video')[0].pause() : '';
    typeof $('audio')[0] !=='undefined' ? $('audio')[0].play() : '';
})
,$("#return-to-top").click(function(t){t.preventDefault(),$("body,html").animate({scrollTop:0},1e3)})});