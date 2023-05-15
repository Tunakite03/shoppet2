(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 500);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow');
            } else {
                $('.fixed-top').removeClass('bg-white shadow');
            }
        } else {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow').css('top', -45);
            } else {
                $('.fixed-top').removeClass('bg-white shadow').css('top', 0);
            }
        }
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 310) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 500, 'easeInOutExpo');
        return false;
    });

    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        dots: false,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });



    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            items: 1, // number of items per slide
            loop: true, // infinite loop
            autoplay: true, // autoplay
            autoplayTimeout: 3000, // autoplay delay
            nav: true, // navigation arrows
            dots: false, // dots navigation
            autoplayHoverPause: true, // Add this line to pause the slider on hover
            navContainer: '.owl-buttons',
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                // responsive breakpoints
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    });



//     /*-----------------------
//        Price Range Slider
//    ------------------------ */
//     var rangeSlider = $(".price-range"),
//         minamount = $("#minamount"),
//         maxamount = $("#maxamount");

//     rangeSlider.slider({
//         range: true,
//         min: 0,
//         max: 500,
//         values: [10, 490],
//         slide: function (event, ui) {
//             minamount.val('$' + ui.values[0]);
//             maxamount.val('$' + ui.values[1]);
//         }
//     });
//     minamount.val('$' + rangeSlider.slider("values", 0));
//     maxamount.val('$' + rangeSlider.slider("values", 1));



})(jQuery);

