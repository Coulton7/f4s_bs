(function($){

$(document).ready(function () {
    "use strict";
    var nav = $('.navbar'),
        body = $('.main-container'),
        windowScreen = $(window),
        navOffset = nav.offset().top,
        previousScroll = 0;

    if (windowScreen.scrollTop() >= navOffset && !nav.hasClass('sticky')) {
        nav.addClass('sticky');
        $(body).css({paddingTop : nav.css('height')});
    }
    $(window).on('scroll', function () {

        if (windowScreen.scrollTop() >= navOffset && !nav.hasClass('sticky')) {
            nav.addClass('sticky');
            $(body).css({paddingTop : nav.css('height')});
        }

        if (windowScreen.scrollTop() < navOffset && nav.hasClass('sticky')) {
            nav.removeClass('sticky');
            $(body).css({paddingTop : 0});
        }

        if ($(window).scrollTop() === $(document).height() - $(window).height()) {
            window.console.log('done');
        }

    });
});
})(jQuery);
