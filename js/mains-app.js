// modal close btn
$('.modal-box .close-btn').on('click', function () {
    $(this).closest('.modal').fadeOut();
    $(this).closest('.cookies').fadeOut();
    console.log(1234);
});

// focus on input
// $('.search-form .input--search')
//     .on('focus', function () {
//         $(this).parent().addClass('has-focused');
//     })
//     .on('keyup', function () {
//         $(this).parent().removeClass('has-focused');
//     })
//     .on('blur', function () {
//         if ($(this).val() != "") {
//             $(this).parent().removeClass('has-focused');
//         }
//         else {
//             $(this).parent().addClass('has-focused');
//         }
//     });

let intViewportHeight = window.innerHeight;
let headerTopHeight = $('.main-menu-top').height();
let headerBottomHeight = $('.main-menu-bottom').height();
let headerHeight = headerTopHeight + headerBottomHeight;
let burgerHeight = $('.new-header').height();
let fullWindowHeightMob = intViewportHeight - burgerHeight;
let fullWindowHeightDesk = intViewportHeight - headerHeight;

if (jQuery(window).width() < 992) {
    $('.header-slider.new').css('height', fullWindowHeightMob * 0.5);
    $('.header-slider.new .slide_new .image').css('height', fullWindowHeightMob * 0.5);
} else {
    $('.header-slider.new').css('height', fullWindowHeightDesk * 0.65);
    $('.header-slider.new .slide_new .image').css('height', fullWindowHeightDesk  * 0.65);
}

// --- fixed share on scroll
// --- gsap
let share = $('.article-page .share');
if (jQuery(window).width() > 767 && jQuery(window).width() < 992) {
    var stickyShare  = new TimelineLite({ paused: true })
        .to(share, 0, {position: 'fixed', top: 80, left: "50%", x: -292, ease: Linear.easeNone});
} else if (jQuery(window).width() > 991 && jQuery(window).width() < 1200) {
    var stickyShare  = new TimelineLite({ paused: true })
        .to(share, 0, {position: 'fixed', top: 100, left: "50%", x: -402, ease: Linear.easeNone});
} else if (jQuery(window).width() > 1199) {
    var stickyShare  = new TimelineLite({ paused: true })
        .to(share, 0, {position: 'fixed', top: 100, left: "50%", x: -217, ease: Linear.easeNone});
}
var scrollPos = share.offset().top - 80;
// var blogPos = $('.article-page .section-blog').offset().top - 200;
if (jQuery(window).width() > 767) {
    $(window).on('scroll', function () {
        var st = $(this).scrollTop();
        if (st > scrollPos) {
            stickyShare.play();
        } else {
            stickyShare.reverse();
        }
        // if (st > blogPos) {
        //     share.hide();
        // } else {
        //     share.show();
        // }
    });
}
$('.modal-box .close-btnz').on('click', function () {
    $(this).closest('.modal').fadeOut();
    console.log(1234);
});

function clozz(){
    // cookies
    $('.cookies-wrap .right .theme-btn').on('click', function () {
        $(this).closest('.modal').fadeOut();
        $(this).closest('.cookies').fadeOut();
        console.log(1234);
    });
}

if($('.personals-page').length) {
    $('.preloader').css('display', 'none')
}