$(document).ready(function() {


$('form').on('submit', function() {
//var captcha = grecaptcha.getResponse();
var urls = $(this).attr('action');
var autosubmit = $(this).attr('data-autosubmit');
if(autosubmit=='true') {
var str = $(this).serialize();
$.ajax({
type: "POST",
data: str,
url: urls,
dataType: "html", 
success: function(data){
var zzz = data;
if(zzz==='Успешно отправлено!') {
var success = "<a href='javascript:void(0)' class='close-btn'></a><h3>Успешно отправлено!</h3>";
$('form')[0].reset();
$('.modal').fadeOut();
location.href='/thankyou/';
}
else {
alert(zzz);
}
}
});
return false;
}
else if(autosubmit=='trues') {
var str = $(this).serialize();
if(captcha!='') {
$.ajax({
type: "POST",
data: str,
url: urls,
dataType: "html", 
success: function(data){
var zzz = data;
if(zzz==='Успешно отправлено!') {
var success = "<a href='javascript:void(0)' class='close-btn'></a><h3>Успешно отправлено!</h3>";
$('form')[0].reset();
$('.modal').fadeOut();
location.href='/thankyou/';
}
else {
alert(zzz);
}
}
});
}
else {
	alert('Invalid Captcha');
}
return false;
}
});
});

$(window).on('load', function() {
setTimeout(function(){
$('.preloader').fadeOut(700);
},1500);
});


$(document).scroll(function() {
	var top = $(window).scrollTop()
	var menuTop = $(".main-menu-top")
	header = $('.head-menu')
	if(top >=96){header.addClass("fix-menu"); menuTop.addClass("mb")}
	else{header.removeClass("fix-menu");menuTop.removeClass("mb")}
})

$(document).ready(function(){

var aloe = {
topOffset: 300,
checkTop: checkScrollTop,
initScroll: scrollSection
}

aloe.checkTop();
aloe.initScroll();



function checkScrollTop(){

var top = $(window).scrollTop(),
firstSection = 300,
header = $('.head-menu')


if(top > firstSection){
header.addClass('hide-menu')
// header.addClass('fixed-menu');

}
}


function scrollSection(){
var limit = 100,
tempScrollTop = 0,
currentScrollTop = 0,
header = $('.head-menu');




// $(document).scroll(function(e) {
// currentScrollTop = $(document).scrollTop();
// if (tempScrollTop < currentScrollTop && currentScrollTop > limit) {     

// tempScrollTop = $(document).scrollTop();      
// header.addClass('fixed-menu');  
// header.addClass('hide-menu')    
// }
// else if (tempScrollTop > currentScrollTop && currentScrollTop < limit) {

// tempScrollTop = $(document).scrollTop();
// header.removeClass('fixed-menu');

// }  
// }); 
}


$('.error-prev').on('click', function(e){
e.preventDefault();
history.back();
});

$(".new-header .header-burger .new-hamburger").click(function(){
	$(this).toggleClass("active")
	$(".new-header .new-mobile-menu").toggleClass("active")
	$('html').toggleClass("no-scroll")
	$(".modal").hide()
})

$(".new-header .new-menu-header .new-item .new-title").click(function(){
	$(this).toggleClass("active").closest(".new-item").find(".new-drop").slideToggle()
})
$(".new-header .new-menu-section .new-section li .new-title").click(function(){
	$(this).toggleClass("active").closest("li").find(".new-drop").slideToggle()
})
$(".new-header .new-call-modal").click(function(){
	$(".new-header .header-burger .new-hamburger").removeClass("active")
	$('html').removeClass("no-scroll")
	$(".new-header .new-mobile-menu").removeClass("active")
	$('#appointment').show()
})
$(".new-header .new-mobile-menu").addClass("sl--scrollable")


$('.instagram').hover(
function(){
$('img', this).attr('src', 'img/instagram-hover.svg?ver=1.0');
},
function(){
$('img', this).attr('src', 'img/instagram.svg?ver=1.0');
});
$('.facebook').hover(
function(){
$('img', this).attr('src', 'img/fb-hover.svg?ver=1.0');
},
function(){
$('img', this).attr('src', 'img/fb.svg?ver=1.0');
});
$('.google').hover(
function(){
$('img', this).attr('src', 'img/google-plus-hover.svg?ver=1.0');
},
function(){
$('img', this).attr('src', 'img/google-plus.svg?ver=1.0');
});
$('.youtube').hover(
function(){
$('img', this).attr('src', 'img/youtube-hover.svg?ver=1.0');
},
function(){
$('img', this).attr('src', 'img/youtube.svg?ver=1.0');
});

$('.header-slider-bot-arrow').on('click', function() {
var top = $('.main-about').offset().top;
$('body,html').animate({scrollTop: top}, 700);
});


$('.staff-link').on('click', function(){
$('.staff-modal-box .cert-slider').slick('setPosition', 0);
});

$(".modal-trigger").click(function(e){  
e.preventDefault();
dataModal = $(this).attr("data-modal");
$("#" + dataModal).css({"display":"flex"});
});
$(".close-modal, .modal-sandbox").click(function(){
$(".modal").css({"display":"none"});


});

$(function($){
$("#phone").mask("+38(999) 999-99-99");
});
$(function($){
$("#phone-callback").mask("+38(999) 999-99-99");
});

$('#open-menu').click(function(event){

$('body').toggleClass('menu-is-open');
$('.mobile-menu').toggleClass('position-fixed');
event.preventDefault();
});

$('.header-slider').slick({
loop: true,
accessibility: false,
dots: true,
autoplay: true
});

$('.spine-slider').removeClass("hidden")
$('.cert-slider').slick({
lazyLoad: 'ondemand',
loop: true,
autoplay: true,
responsive: [
{
breakpoint: 10000,
settings: {
slidesToShow: 3,
slidesToScroll: 3
}
},
{
breakpoint: 992,
settings: {
slidesToShow: 2,
slidesToScroll: 2
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 1,
slidesToScroll: 1
}
}

]
});
$('.tomograph-slider').slick({
loop: true,
arrows: true,
});
// $('.spine-block .spine-slider').slick({
// loop: true,
// arrows: true,
// initialSlide: 2,
// });
// $('.sport-block .spine-slider').slick({
// 	loop: true,
// 	arrows: true,
// 	initialSlide: 2,
// 	});
// $('.sport-block .spine-slider').slick('slickGoTo', 1);
// $('.spine-block .spine-slider').slick('slickGoTo', 1);
$('.publication-slider').slick({
loop: true,
arrows: true,
autoplay: true,
responsive: [
{
breakpoint: 10000,
settings: {
slidesToShow: 4,
slidesToScroll: 2
}
},
{
breakpoint: 992,
settings: {
slidesToShow: 2,
slidesToScroll: 2
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 1,
slidesToScroll: 1
}
}

]
});
$('.reviews-slider').slick({
loop: true,
arrows: true,
dots: true,
autoplay: true,
responsive: [
{
breakpoint: 10000,
settings: {
slidesToShow: 3,
slidesToScroll: 1
}
},
{
breakpoint: 992,
settings: {
slidesToShow: 2,
slidesToScroll: 2
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 1,
slidesToScroll: 1
}
}

]
});

$('.tomograph-images .thumbnails .tomograph-thumbnails').on('click', function(e) {
e.preventDefault();
var img = $('img', this).attr('src');
var imgLink = $('.main-img-tomograph img');
//var imgHref = $('.main-img-tomograph a');
imgLink.attr('src', img);
//imgHref.attr('href', img);
});
$('.spine-images .thumbnails .spine-thumbnails').on('click', function(e) {
e.preventDefault();
var img = $('img', this).attr('src');
var imgLink = $('.main-img-spine img');
//var imgHref = $('.main-img-spine a');
imgLink.attr('src', img);
//imgHref.attr('href', img);
});


$('.cert-image a').on('click', function(e) {
e.preventDefault();
var img = $('img', this).attr('data-big');
var imgLink = $(this);
imgLink.attr('href', img);  
});
/*
$('.tomograph-images').magnificPopup({
delegate: 'a',
type: 'image',
mainClass: 'mfp-with-zoom',
zoom: {
enabled: true,
duration: 300,
easing: 'ease-in-out',
opener: function(openerElement) {
return openerElement.is('img') ? openerElement : openerElement.find('img');
}
}
});
$('.spine-images').magnificPopup({
delegate: 'a',
type: 'image',
mainClass: 'mfp-with-zoom',
zoom: {
enabled: true,
duration: 300,
easing: 'ease-in-out',
opener: function(openerElement) {
return openerElement.is('img') ? openerElement : openerElement.find('img');
}
}
});*/
$('.about-video-box').magnificPopup({
delegate: 'a',
type: 'iframe',
mainClass: 'mfp-with-zoom',
zoom: {
enabled: true,
duration: 300,
easing: 'ease-in-out',
opener: function(openerElement) {
return openerElement.is('img') ? openerElement : openerElement.find('img');
}
}
});

$('.about-page .banner-wrap').magnificPopup({
	delegate: 'a',
	type: 'iframe',
	mainClass: 'mfp-with-zoom',
	zoom: {
	enabled: true,
	duration: 300,
	easing: 'ease-in-out',
	opener: function(openerElement) {
	return openerElement.is('img') ? openerElement : openerElement.find('img');
	}
	}
	});

$('.cert-image').magnificPopup({
delegate: 'a',
type: 'image',
mainClass: 'mfp-with-zoom',
gallery:{
enabled:false
},
zoom: {
enabled: true,
duration: 300,
easing: 'ease-in-out',
opener: function(openerElement) {
return openerElement.is('img') ? openerElement : openerElement.find('img');
}
}
});
$(".spine-slide").removeClass(".hidden")
// $('.spine-block .slick-prev').fadeOut();
// $('.spine-block .slick-next').fadeOut();
// $('.spine-block-large').fadeOut();
// $('.spine-text-min').fadeOut();
// $('.spine-button-min').fadeOut();

// $('a.tomograph').on('click', function(e) {
// 	e.preventDefault();
// 	$(this).addClass('active');//класс кнопке
// 	$('a.spine').removeClass('active');//удаляем класс второй кнопке
// 	$('img', this).attr('src', 'img/tmograph-main.svg?ver=1.0');//меняем свг
// 	$('a.spine img').attr('src', 'img/spine-white.svg?ver=1.0');//меняем свг
// 	// $('.spine-block .slick-prev').fadeOut(1);
// 	// $('.spine-block .slick-next').fadeOut(1);
// 	// $('.tomograph-block .slick-prev').fadeIn(1);
// 	// $('.tomograph-block .slick-next').fadeIn(1);
// 	// $('.tomograph-slide').removeClass('hidden');
// 	// $('.spine-slide').addClass('hidden');
// 	$('.spine-block-large').fadeOut(750);//прячем
// 	$('.spine-text-min').fadeOut(10);//прячем
// 	$('.spine-button-min').fadeOut(10);//прячем

// 	setTimeout(function() {//показываем
// 	$('.tomograph-block-large').fadeIn(10);
// 	$('.tomograph-text-min').fadeIn(10);
// 	$('.tomograph-button-min').fadeIn(10);
// 	},600);
// });

// $('a.spine').on('click', function(e) {

// 	e.preventDefault();
// 	$('a.tomograph').removeClass('active');
// 	$(this).addClass('active');
// 	$('img', this).attr('src', 'img/spine-main.svg?ver=1.0');
// 	$('a.tomograph img').attr('src', 'img/tmograph-white.svg?ver=1.0');
// 	// $('.tomograph-block .slick-prev').fadeOut(1);
// 	// $('.tomograph-block .slick-next').fadeOut(1);
// 	// $('.spine-block .slick-prev').fadeIn(1);
// 	// $('.spine-block .slick-next').fadeIn(1);
// 	// $('.tomograph-slide').addClass('hidden');
// 	// $('.spine-slide').removeClass('hidden');
// 	$('.tomograph-block-large').fadeOut(750);
// 	$('.tomograph-text-min').fadeOut(10);
// 	$('.tomograph-button-min').fadeOut(10);

// 	setTimeout(function() {
// 	$('.spine-block-large').fadeIn(10);
// 	$('.spine-text-min').fadeIn(10);
// 	$('.spine-button-min').fadeIn(10);
// 	},600);
// });
// $(".tomograph-block").removeClass("hidden-block");
// $(".sport-block").addClass("hidden-block");
$('.main-specialization a.button.sport img').attr('src', 'img/sport-white.svg?ver=1.0');
$(".spine-block").fadeOut(0);
$(".sport-block").fadeOut(0);
$(".main-specialization .resize a.button").click(function(e){
	e.preventDefault();
	$(this).siblings().removeClass("active")
	$(this).addClass("active")
	var that = $(this)
	$(".tomograph-block").removeClass("hidden-block")
	$(".spine-block").removeClass("hidden-block")
	$(".sport-block").removeClass("hidden-block")

	$(".tomograph-block").fadeOut(200)
	$(".spine-block").fadeOut(200)
	$(".sport-block").fadeOut(200)

	setTimeout(function() {
		if($(that).hasClass("spine")){
			$('img', that).attr('src', 'img/spine-main.svg?ver=1.0');
			$('a.tomograph img').attr('src', 'img/tmograph-white.svg?ver=1.0');
			$('a.sport img').attr('src', 'img/sport-white.svg?ver=1.0');
			$(".spine-block").fadeIn(200);
			$('.spine-block .spine-slider').slick({
				loop: true,
				arrows: true,
				initialSlide: 2,
				});
			// $(".spine-block .spine-slider").slick('slickGoTo', 1);
		}
		if($(that).hasClass("tomograph")){
			$(".tomograph-block").fadeIn(200)
			$('img', that).attr('src', 'img/tmograph-main.svg?ver=1.0');
			$('a.spine img').attr('src', 'img/spine-white.svg?ver=1.0');
			$('a.sport img').attr('src', 'img/sport-white.svg?ver=1.0');
		}
		if($(that).hasClass("sport")){
			$(".sport-block").fadeIn(200)
			$('img', that).attr('src', 'img/sport-main.svg?ver=1.0');
			$('a.tomograph img').attr('src', 'img/tmograph-white.svg?ver=1.0');
			$('a.spine img').attr('src', 'img/spine-white.svg?ver=1.0');
			$('.sport-block .spine-slider').slick({
				loop: true,
				arrows: true,
				initialSlide: 2,
				});
			// $(".sport-block .spine-slider").slick('slickGoTo', 1);
		}
	},198);
})

$(".spine-slide .slick-track")
var tomographTabLink = $('.tomograph-tab');
var spineTabLink = $('.spine-tab');
var newTabLink = $('.new-tab');
var tomographTab = $('.tab-tomograph');
var spineTab = $('.tab-spine');
var newTab = $('.tab-new');
var tomographImg = $('.tomograph-tab a img');
var spineImg = $('.spine-tab a img');

spineTab.fadeOut();
newTab.fadeOut();

tomographTabLink.on('click', function(a) {
a.preventDefault();
tomographImg.attr('src','img/tmograph-white.svg?ver=1.0');
tomographTabLink.addClass('active');
spineTabLink.removeClass('active');
spineImg.attr('src', 'img/spine-main.svg?ver=1.0');
newTabLink.removeClass('active');

spineTab.fadeOut(601);
newTab.fadeOut(601);
setTimeout(function(){
tomographTab.fadeIn();
},600);
});
spineTabLink.on('click', function(a) {
a.preventDefault();
spineImg.attr('src','img/spine-white.svg?ver=1.0');
spineTabLink.addClass('active');
tomographTabLink.removeClass('active');
tomographImg.attr('src', 'img/tmograph-main.svg?ver=1.0');
newTabLink.removeClass('active');
tomographTab.fadeOut(601);
newTab.fadeOut(601);
setTimeout(function(){
spineTab.fadeIn();
},600);
});
newTabLink.on('click', function(a) {
a.preventDefault();
newTabLink.addClass('active');
tomographTabLink.removeClass('active');
spineTabLink.removeClass('active');
tomographImg.attr('src','img/tmograph-main.svg?ver=1.0');
spineImg.attr('src', 'img/spine-main.svg?ver=1.0');
spineTab.fadeOut(601);
tomographTab.fadeOut(601);
setTimeout(function(){
newTab.fadeIn();
},600);
});


$(window).on("load",function(){
$(".content-text-box").mCustomScrollbar({
scrollbarPosition: "outside"
});
});
$(window).on("load",function(){
$(".tomograph-text-large").mCustomScrollbar({

});
});
$(window).on("load",function(){
$(".spine-text-large").mCustomScrollbar({

});
});
$(window).on("load",function(){
$(".science-scroll").mCustomScrollbar({

});
});

$(window).on("load",function(){
$(".general-scroll").mCustomScrollbar({

});
});


var Menu = {

el: {
ham: $('.menu-btn'),
menuTop: $('.menu-top'),
menuMiddle: $('.menu-middle'),
menuBottom: $('.menu-bottom')
},

init: function() {
Menu.bindUIactions();
},

bindUIactions: function() {
Menu.el.ham
.on(
'click',
function(event) {
Menu.activateMenu(event);
event.preventDefault();
}
);
},

activateMenu: function() {
Menu.el.menuTop.toggleClass('menu-top-click');
Menu.el.menuMiddle.toggleClass('menu-middle-click');
Menu.el.menuBottom.toggleClass('menu-bottom-click');
$('.footer-mobile-menu nav').toggleClass('nav-top');
$('.second-footer-box').toggleClass('second-height');

}
};

Menu.init();


$(document).ready(function() {
$('.header-slider .slick-dots').addClass('start column').css('bottom', '110px').css('align-items','flex-start');
});
$(document).ready(function() {
$('.reviews-slider .slick-dots').addClass('start column').css('top', '44%').css('align-items','flex-start').css('width','43px');
});

$('.arrow-top').click(function() {      
$('body,html').animate({
scrollTop : 0             
}, 500);
});



var array = $('.review-slide-array');
var arrayLenght = array.length;
var mainColor = '<div class="container-fluid main-color"><div class="row"><div class="container"><div class="row"></div></div></div></div>';
var whiteColor = '<div class="container-fluid white-color"><div class="row"><div class="container"><div class="row"></div></div></div></div>';
var count = arrayLenght;
var i=0;
var newArrayLog = [];
while (i<=count) {
newArrayLog.push(array.slice(i,i+3));
i+=3;
}
var mainArr =[];
var mainArrWhite =[];
for(j=0; j<= newArrayLog.length-1; j++){
if (j%2 ===0){
mainArr.push(newArrayLog[j]);
}
else{
mainArrWhite.push(newArrayLog[j])
}
}
mainArr.forEach(function(item){
item.wrapAll(mainColor);
});
mainArrWhite.forEach(function(item){
item.wrapAll(whiteColor);
});



var array = $('.staff-box');
var arrayLenght = array.length;
var mainColor = '<div class="container-fluid staff-block-main"><div class="row"><div class="container"><div class="row"></div></div></div></div>';
var whiteColor = '<div class="container-fluid staff-block-white"><div class="row"><div class="container"><div class="row"></div></div></div></div>';
var count = arrayLenght;
var i=0;
var newArrayLog = [];
while (i<=count) {
newArrayLog.push(array.slice(i,i+2));
i+=2;
}
var mainArr =[];
var mainArrWhite =[];
for(j=0; j<= newArrayLog.length-1; j++){
if (j%2 ===0){
mainArr.push(newArrayLog[j]);
}
else{
mainArrWhite.push(newArrayLog[j])
}
}
mainArr.forEach(function(item){
item.wrapAll(mainColor);
});
mainArrWhite.forEach(function(item){
item.wrapAll(whiteColor);
});


var wrapper = $( ".file_upload" ),
inp = wrapper.find( "input" ),
btn = wrapper.find( "button" ),
lbl = wrapper.find( "div" );
btn.focus(function(){
inp.focus()
});

inp.focus(function(){
wrapper.addClass( "focus" );
}).blur(function(){
wrapper.removeClass( "focus" );
});

btn.add( lbl ).click(function(){
inp.click();
});

btn.focus(function(){
wrapper.addClass( "focus" );
}).blur(function(){
wrapper.removeClass( "focus" );
});
var file_api = ( window.File && window.FileReader && window.FileList && window.Blob ) ? true : false;

inp.change(function(){
var file_name;
if( file_api && inp[ 0 ].files[ 0 ] )
file_name = inp[ 0 ].files[ 0 ].name;
else
file_name = inp.val().replace( "C:\\fakepath\\", '' );

if( ! file_name.length )
return;

if( lbl.is( ":visible" ) ){
lbl.text( file_name );
btn.text( "Добавлен файл:" );
}else
btn.text( file_name );
}).change();
$( window ).resize(function(){
$( ".file_upload input" ).triggerHandler( "change" );
});

});

function coffee_now() {
	alert('Uno momento!');
	$('.wrapper.main').before("<img src='https://i.giphy.com/inECjKmGYzGms.gif'>");
}

