

$(document).ready(function(){
	
	 $('.brands').slick({
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  autoplay:true,
  infinite:true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    
  ]

  });

  $('.slider-mainpage').slick({
   	dots: true,
   	autoplay:true,
   	infinite:true

  });

$('.video').slick({
  });

		/*pop-up registration and callback*/

	var height = $(window).height();
	var width = $(window).width();
	var left = (width/2-125) + 'px';


$('#welcome a.click').click(function(){
	var scrollTop = $($(window)).scrollTop();
	var top = (scrollTop + (height/2-189)) + 'px';
	$('.background').show();
	$('header .registration').show().css({'top':top, 'left':left});
})
$('.background').click(function(){
	$('.background').hide()
	$('header .registration').hide();
	$('header .callback').hide();
})


$('#header-callback').click(callBack);
$('#footer-callback').click(callBack);
$('#mobile-callback').click(callBack);

function callBack(){
	var scrollTop = $($(window)).scrollTop();
	var top = (scrollTop + (height/2-189)) + 'px';
	$('.background').show();
	$('header .callback').show().css({'top':top, 'left':left})
}
});




$(document).ready(function(){
  $('.main-product').slick({
   infinite: true,
  slidesToShow: 5,
  slidesToScroll: 1,
  responsive: [
  {
      breakpoint: 1200,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true
       
      }
    },

    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true
       
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
   
  ]
  });
});