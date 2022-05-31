/*-----------------------------------------------------------------------------------
 Template Name:Bigdeal
 Template URI: themes.pixelstrap.com/bigdeal
 Description: This is E-commerce website
 Author: Pixelstrap
 Author URI: https://themeforest.net/user/pixelstrap
 ----------------------------------------------------------------------------------- */
// 01. Slick slider
// 02. header js
// 03.footer js
// 04. Image to background js
// 05 toggle nav
// 06 navbar mobile nav
// 07 menu js
// 08. Product page
// 09. category page
// 10. Product page Quantity Counter
// 11. filter sidebar js
// 12. Filter js
// 13. tab js
// 14. RTL & Dark Light
// 15. Add to cart
// 16.  Add to wishlist
// 17. Tap on Top
// 18. loader
// 19. add to cart sidebar js
// 20. Color Picker
// 21. Add to cart quantity Counter


(function ($) {
    "use strict";
    /*=====================
     01. Slick slider
     ==========================*/

     $('.slide-1 ').slick({
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 500,
        autoplaySpeed: 2500,
    });

    $('.slide-1-section').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 490,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
    $('.slide-4').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }

        ]
    });
    $('.slide-5').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        centerPadding: '15px',
        responsive: [
            {
                breakpoint: 1470,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 820,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            }
        ]
    });
    $('.slide-6').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 6,
        autoplay: false,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }

        ]
    });
    $('.slide-7').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 7,
        slidesToScroll: 7,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
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
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.slide-bpp-7').slick({
        dots: false,
        infinite: true,
        speed: 3000,
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 300,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
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
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.slide-10').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 10,
        slidesToScroll: 10,
        responsive: [
            {
                breakpoint: 1700,
                settings: {
                    slidesToShow: 8,
                    slidesToScroll: 8
                }
            },
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    $('.center-product-4').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 2,
                    infinite: true
                }
            },

        ]
    });
    $('.team-4').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 586,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.blog-slide').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
    $('.blog-slide-4').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1700,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
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
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 0,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
    $('.media-slide').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true
                }
            },
            {
                breakpoint: 577,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            },

        ]
    });
    $('.hotdeal-right-slick').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.hotdeal-right-nav'
    });
    if ($(window).width() > 768) {
        $('.hotdeal-right-nav').slick({
            vertical: true,
            verticalSwiping: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.hotdeal-right-slick',
            arrows: false,
            infinite: true,
            dots: false,
            centerMode: false,
            focusOnSelect: true
        });
    } else {
        $('.hotdeal-right-nav').slick({
            vertical: false,
            verticalSwiping: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.hotdeal-right-slick',
            arrows: false,
            infinite: true,
            centerMode: false,
            dots: false,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    $('.hotdeal-right-slick-1').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        arrows: true,
        fade: true,
        asNavFor: '.hotdeal-right-nav-1'
    });
    if ($(window).width() > 575) {
        $('.hotdeal-right-nav-1').slick({
            vertical: true,
            verticalSwiping: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.hotdeal-right-slick-1',
            arrows: false,
            infinite: true,
            dots: false,
            centerMode: false,
            focusOnSelect: true
        });
    } else {
        $('.hotdeal-right-nav-1').slick({
            vertical: false,
            verticalSwiping: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.hotdeal-right-slick-1',
            arrows: false,
            infinite: true,
            centerMode: false,
            dots: false,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    $('.category-slide4').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
        ]
    });
    $('.category-slide5').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
        ]
    });
    $('.category-slide5two').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1470,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },

            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 520,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
        ]
    });
    $('.category-slide6').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 6,
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
                breakpoint: 900,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 525,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 361,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            },

        ]
    });
    $('.category-slide7').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 7,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1470,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    infinite: true
                }
            },

            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
        ]
    });
    $('.services-slide4').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 850,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
        ]
    });
    $('.services-slide5').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 1120,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },

            {
                breakpoint: 420,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            },

        ]
    });
    $('.services-slide6').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 1120,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },

            {
                breakpoint: 420,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            },

        ]
    });
    $('.testimonial-slide3').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            },

        ]
    });

    $('.gallery-slide').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 567,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
        ]
    });
    $('.team-slide4').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1471,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 1060,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
        ]
    });

    $('.pricing-slide4').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1680,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 881,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },

        ]
    });

    $('.autoplay').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });

    $('.testimonial-top-slide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.testimonial-bottom-slide'
    });
    $('.testimonial-bottom-slide').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.testimonial-top-slide',
        focusOnSelect: true,
        centerPadding: '50px',
    });

    $('.brand-slide12').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>',
        responsive: [
            {
                breakpoint: 1680,
                settings: {
                    slidesToShow: 10,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 1470,
                settings: {
                    slidesToShow: 9,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 1368,
                settings: {
                    slidesToShow: 8,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 7,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 360,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
        ]
    });


    $('.brand-slide3').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        rows: 2,
        className: "center",
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    rows: 1,
                    slidesToShow: 7,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    rows: 1,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 800,
                settings: {
                    rows: 1,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 650,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
        ]
    });


    $('.hotdeal-slide3').slick({
        dots: false,
        infinite: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 890,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
        ]
    });


    $('.pro-top-slide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.pro-bottom-slide'
    });
    $('.pro-bottom-slide').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.pro-top-slide',
        dots: false,
        focusOnSelect: true
    });


    $('.feature-slide').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 10,
        slidesToScroll: 2,
        responsive: [

            {
                breakpoint: 1470,
                settings: {
                    slidesToShow: 9,
                    slidesToScroll: 2
                }
            },

            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 8,
                    slidesToScroll: 2
                }
            },

            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 7,
                    slidesToScroll: 2
                }
            },


            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 2
                }
            },
        ]
    });


    /*=====================
     02. header js
     ==========================*/

    // language  block//
    $('.language-dropdown-open').slideUp();
    $('.language-dropdown-click').on('click', function () {
        $('.language-dropdown-open').slideToggle()
    });
    $('.curroncy-dropdown-open').slideUp();
    $('.curroncy-dropdown-click').on('click', function () {
        $('.curroncy-dropdown-open').slideToggle()
    })
    $('.pro-up').hide();
    $('.mor-slide-open').slideUp();
    $('.mor-slide-click').on('click', function () {
        $('.mor-slide-open').slideToggle();
        $('.pro-up').toggle();
        $('.pro-down').toggle();
    })

    $('.category-toggle').on('click', function (e) {
        // $('.show').slideToggle()
        // $('.category-heandle').toggleClass('open')
        // $('.collapse-category').toggleClass('open')
    });

    $('.category-toggle').on('click', function (e) {
        // $('.hide').slideToggle()
    });



    // $('.category-toggle').on('click', function(e) {
    //     $(this).siblings().toggleClass("hide");
    // });

    $('.mobilecat-toggle').on('click', function (e) {
        $('.collapse-category').toggleClass('open')
    });
    $('.back-btn').on('click', function (e) {
        $('.collapse-category').toggleClass('open')
    });

    // mobile search //
    $('.search-overlay').hide();
    $('.close-mobile-search').on('click', function () {
        $('.search-overlay').fadeOut();
    })
    $('.mobile-search').on('click', function () {
        $('.search-overlay').show();
    });


    $('.mobile-search').on('click', function () {
        $('.searchbar-input').addClass('open');
    });

    $('.close-searchbar').on('click', function () {
        $('.searchbar-input').removeClass('open');
    });




    // sticky header //
    // $(window).scroll(function() {
    // if ($(this).scrollTop() > 400){
    //     // $('header').addClass("sticky");
    //     $('.product-top-sticky').addClass("sticky");
    //   }
    //   else{
    //     // $('header').removeClass("sticky");
    //     $('product-top-sticky').removeClass("sticky");
    //   }
    // });


    // $(window).scroll(function () {
    //   if ($(this).scrollTop() > 300) {
    //     $('header').addClass("sticky");
    //   } else {
    //     $('header').removeClass("sticky");
    //   }
    // });




    // header category //

    var contentwidth = jQuery(window).width();
    if ((contentwidth) < '1200') {
        jQuery('.cat-title').on('click', function () {
            jQuery(this).parents('li').siblings().children('.collapse-mega').slideUp('normal');
            jQuery(this).parent().siblings().children('.collapse-mega').slideUp('normal');
            jQuery(this).parent().siblings().children('.collapse-mega').children().find('.collapse-mega').slideUp('normal');
            jQuery(this).parents('li').siblings().children('.sub-collapse').slideUp('normal');
            jQuery(this).parent().siblings().children('.sub-collapse').slideUp('normal');
            jQuery(this).parent().siblings().children('.sub-collapse').children().find('.sub-collapse').slideUp('normal');
            if (jQuery(this).next().is(':hidden') == true) {
                jQuery(this).addClass('active');
                jQuery(this).next().slideDown('normal');
            }
        });

        jQuery('.sub-collapse').hide();
        jQuery('.collapse-mega').hide();
    }
    $('span.sub-arrow').on('click', function () {
        $('.categoryone .collapse-mega .mega-box ul').removeClass('open');
        $(this).parent().next().toggleClass('open');
    });




    /*=====================
     03.footer js
     ==========================*/
    var contentwidth = jQuery(window).width();
    if ((contentwidth) < '767') {
        jQuery('.footer-title h5').append('<span class="according-menu"></span>');
        jQuery('.footer-title').on('click', function () {
            jQuery('.footer-title').removeClass('active');
            jQuery('.footer-contant').slideUp('normal');
            if (jQuery(this).next().is(':hidden') == true) {
                jQuery(this).addClass('active');
                jQuery(this).next().slideDown('normal');
            }
        });
        jQuery('.footer-contant').hide();
    } else {
        jQuery('.footer-contant').show();
    }





    /*=====================
     04. Image to background js
     ==========================*/
    $(".bg-top").parent().addClass('b-top');
    $(".bg-bottom").parent().addClass('b-bottom');
    $(".bg-center").parent().addClass('b-center');
    $(".bg_size_content").parent().addClass('b_size_content');
    $(".bg-img").parent().addClass('bg-size');

    jQuery('.bg-img').each(function () {

        var el = $(this),
            src = el.attr('src'),
            parent = el.parent();

        parent.css({
            'background-image': 'url(' + src + ')',
            'background-size': 'cover',
            'background-position': 'center',
            'display': 'block'
        });

        el.hide();
    });

    /*=====================
     05 toggle nav
     ==========================*/
    $('.toggle-nav').on('click', function () {
        $('.sm-horizontal').css("right", "0px");
    });
    $(".mobile-back").on('click', function () {
        $('.sm-horizontal').css("right", "-410px");
    });

    /*=====================
     06 navbar mobile nav
     ==========================*/
    $('.sm-nav-btn').on('click', function () {
        $('.nav-slide').css("left", "0px");
    });
    $(".nav-sm-back").on('click', function () {
        $('.nav-slide').css("left", "-410px");
    });

    $('.toggle-nav-desc').on('click', function () {
        $('.desc-horizontal').css("right", "0px");
    });
    $(".desc-back").on('click', function () {
        $('.desc-horizontal').css("right", "-410px");
    });

    /*=====================
     07 menu js
     ==========================*/

    function openNav() {
        document.getElementById("mySidenav").classList.add('open-side');
    }
    function closeNav() {
        document.getElementById("mySidenav").classList.remove('open-side');
    }
    $(function () {
        $('#main-menu').smartmenus({
            subMenusSubOffsetX: 1,
            subMenusSubOffsetY: -8
        });
        $('#sub-menu').smartmenus({
            subMenusSubOffsetX: 1,
            subMenusSubOffsetY: -8
        });
    });

    /*=====================
     08. Product page
     ==========================*/

    $('.product-slick').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.slider-nav'
    });

    $('.slider-nav').slick({
        vertical: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.product-slick',
        arrows: false,
        dots: false,
        focusOnSelect: true
    });

    $('.product-right-slick').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.slider-right-nav'
    });
    if ($(window).width() > 575) {
        $('.slider-right-nav').slick({
            vertical: true,
            verticalSwiping: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.product-right-slick',
            arrows: false,
            infinite: true,
            dots: false,
            centerMode: false,
            focusOnSelect: true
        });
    } else {
        $('.slider-right-nav').slick({
            vertical: false,
            verticalSwiping: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.product-right-slick',
            arrows: false,
            infinite: true,
            centerMode: false,
            dots: false,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }






    /*=====================
     09. category page
     ==========================*/
    $('.collapse-block-title').on('click', function (e) {
        e.preventDefault;
        var speed = 300;
        var thisItem = $(this).parent(),
            nextLevel = $(this).next('.collection-collapse-block-content');
        if (thisItem.hasClass('open')) {
            thisItem.removeClass('open');
            nextLevel.slideUp(speed);
        }
        else {
            thisItem.addClass('open');
            nextLevel.slideDown(speed);
        }
    });

    $('.color-selector ul li > div').on('click', function (e) {
        $(".color-selector ul li > div").removeClass("active");
        $(this).addClass("active");
    });

    // $('.size-box ul li').on('click', function(e) {
    //   $(".size-box ul li").removeClass("active");
    //   $(this).addClass("active");
    // });

    $('.image-swatch li ').on('click', function (e) {
        $(".image-swatch li ").removeClass("active");
        $(this).addClass("active");
    });

    $('.show-offer').on('click', function (e) {
        $(".offer-sider").slideToggle();
        $(".more-offer").fadeToggle();
        $(".less-offer").fadeToggle();
    });



    $('.size-box ul li').on('click', function (e) {
        $(".size-box ul li").removeClass("active");
        $('#selectSize').removeClass('cartMove');
        $(this).addClass("active");
        $(this).parent().addClass('selected');
    });



    $('#cartEffect').on('click', function (e) {
        if ($("#selectSize .size-box ul").hasClass('selected')) {
            $('#cartEffect').text("Added to bag ");
            $('.added-notification').addClass("show");
            setTimeout(function () {
                $('.added-notification').removeClass("show");
            }, 5000);
        } else {
            $('#selectSize').addClass('cartMove');
        }
    });







    //list layout view
    $('.list-layout-view').on('click', function (e) {
        $('.collection-grid-view').css('opacity', '0');
        $(".product-wrapper-grid").css("opacity", "0.2");
        $('.shop-cart-ajax-loader').css("display", "block");
        $('.product-wrapper-grid').addClass("list-view");
        $(".product-wrapper-grid").children().children().removeClass();
        $(".product-wrapper-grid").children().children().addClass("col-lg-12");
        setTimeout(function () {
            $(".product-wrapper-grid").css("opacity", "1");
            $('.shop-cart-ajax-loader').css("display", "none");
        }, 500);
    });
    //grid layout view
    $('.grid-layout-view').on('click', function (e) {
        $('.collection-grid-view').css('opacity', '1');
        $('.product-wrapper-grid').removeClass("list-view");
        $(".product-wrapper-grid").children().children().removeClass();
        $(".product-wrapper-grid").children().children().addClass("col-lg-3");

    });
    $('.product-2-layout-view').on('click', function (e) {
        if ($('.product-wrapper-grid').hasClass("list-view")) { }
        else {
            $(".product-wrapper-grid").children().children().removeClass();
            $(".product-wrapper-grid").children().children().addClass("col-lg-6");
        }
    });
    $('.product-3-layout-view').on('click', function (e) {
        if ($('.product-wrapper-grid').hasClass("list-view")) { }
        else {
            $(".product-wrapper-grid").children().children().removeClass();
            $(".product-wrapper-grid").children().children().addClass("col-lg-4");
        }
    });
    $('.product-4-layout-view').on('click', function (e) {
        if ($('.product-wrapper-grid').hasClass("list-view")) { }
        else {
            $(".product-wrapper-grid").children().children().removeClass();
            $(".product-wrapper-grid").children().children().addClass("col-lg-3");
        }
    });
    $('.product-6-layout-view').on('click', function (e) {
        if ($('.product-wrapper-grid').hasClass("list-view")) { }
        else {
            $(".product-wrapper-grid").children().children().removeClass();
            $(".product-wrapper-grid").children().children().addClass("col-lg-2");
        }
    });


    /*=====================
     10. Product page Quantity Counter
     ==========================*/
    // $('.qty-box .quantity-right-plus').on('click', function () {
    //   var $qty = $('.qty-box .input-number');
    //   var currentVal = parseInt($qty.val(), 10);
    //   if (!isNaN(currentVal)) {
    //     $qty.val(currentVal + 1);
    //   }
    // });
    // $('.qty-box .quantity-left-minus').on('click', function () {
    //   var $qty = $('.qty-box .input-number');
    //   var currentVal = parseInt($qty.val(), 10);
    //   if (!isNaN(currentVal) && currentVal > 1) {
    //     $qty.val(currentVal - 1);
    //   }
    // });




    /*=====================
     11. filter sidebar js
     ==========================*/
    $('.sidebar-popup').on('click', function (e) {
        $('.open-popup').toggleClass('open');
        $('.collection-filter').css("left", "-15px");
    });
    $('.filter-main-btn').on('click', function (e) {
        $('.collection-filter').css("left", "-15px");
    });
    $('.filter-back').on('click', function (e) {
        $('.collection-filter').css("left", "-365px");
        $('.sidebar-popup').trigger('click');
    });

    $('.account-sidebar').on('click', function (e) {
        $('.dashboard-left').css("left", "0");
    });
    $('.filter-back').on('click', function (e) {
        $('.dashboard-left').css("left", "-365px");
    });

    $(function () {
        $(".col-grid-box").slice(0, 8).show();
        $(".loadMore").on('click', function (e) {
            e.preventDefault();
            $(".col-grid-box:hidden").slice(0, 4).slideDown();
            if ($(".col-grid-box:hidden").length == 0) {
                $(".load-more-sec").text('no more products');
            }
        });
    });

    $('.horizontal-filter-toggle').on('click', function (e) {
        $('.horizontal-filter').slideToggle('');
    });

    $('.close-filter').on('click', function (e) {
        $('.horizontal-filter').slideToggle('');
    });






    /*=====================
    12. Filter js
     ==========================*/
    $(".filter-button").on('click', function () {
        $(this).addClass('active').siblings('.active').removeClass('active');
        var value = $(this).attr('data-filter');
        if (value == "all") {
            $('.filter').show('1000');
        }
        else {
            $(".filter").not('.' + value).hide('3000');
            $('.filter').filter('.' + value).show('3000');
        }
    });

    $("#formButton").on('click', function () {
        $("#form1").toggle();
    });


    /*=====================
      13. Tab js
     ==========================*/
    $("#tab-1").css("display", "Block");
    $(".default").css("display", "Block");
    $(".tabs li a").on('click', function () {
        event.preventDefault();
        $('.tab_product_slider').slick('unslick');
        $('.product-4').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        $(".product-4").slick({
            arrows: true,
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });


    $("#tab-1").css("display", "Block");
    $(".default").css("display", "Block");
    $(".tabs li a").on('click', function () {
        event.preventDefault();
        $('.tab_product_slider').slick('unslick');
        $('.product-slide').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        $(".product-slide").slick({
            arrows: true,
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });

    // new tab
    $("#tab-1").css("display", "Block");
    $(".default").css("display", "Block");
    $(".tabs li a").on('click', function () {
        event.preventDefault();
        $('.tab_product_slider').slick('unslick');
        $('.product-slide-6').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        $(".product-slide-6").slick({
            arrows: true,
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 6,
            responsive: [
                {
                    breakpoint: 1700,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 5,
                        infinite: true
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        infinite: true
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }
            ]
        });
    });

    // product-4
    $("#tab-1").css("display", "Block");
    $(".default").css("display", "Block");
    $(".tabs li a").on('click', function () {
        event.preventDefault();
        $('.tab_product_slider').slick('unslick');
        $('.product-slide-4').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        $(".product-slide-4").slick({
            arrows: true,
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true
                    }
                },
                {
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true
                    }
                },
            ]
        });
    });


    // product-5
    $("#tab-1").css("display", "Block");
    $(".default").css("display", "Block");
    $(".tabs li a").on('click', function () {
        event.preventDefault();
        $('.tab_product_slider').slick('unslick');
        $('.slide-5').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        $('.slide-5').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            centerPadding: '15px',
            responsive: [
                {
                    breakpoint: 1470,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        infinite: true
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true
                    }
                },
                {
                    breakpoint: 820,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true
                    }
                },
                {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true
                    }
                }
            ]
        });
    });


    $("#tab-1").css("display", "Block");
    $(".default").css("display", "Block");
    $(".tabs li a").on('click', function () {
        event.preventDefault();
        $('.tab_product_slider').slick('unslick');
        $('.product-slide-5').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        $(".product-slide-5").slick({
            arrows: true,
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1700,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 5,
                        infinite: true
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        infinite: true
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }
            ]
        });
    });




    // product-3
    $("#tab-1").css("display", "Block");
    $(".default").css("display", "Block");
    $(".tabs li a").on('click', function () {
        event.preventDefault();
        $('.tab_product_slider').slick('unslick');
        $('.product-slide-3').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        $(".product-slide-3").slick({
            arrows: true,
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 2,
            responsive: [
                {
                    breakpoint: 1420,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true
                    }
                },
                {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true
                    }
                },
            ]
        });
    });


    // gallery slide //
    $("#tab-1").css("display", "Block");
    $(".default").css("display", "Block");
    $(".tabs li a").on('click', function () {
        event.preventDefault();
        $('.tab_product_slider').slick('unslick');
        $('.gallery-slide').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        $('.gallery-slide').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 567,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
            ]
        });
    });


    // media product slide 5

    $("#tab-7").css("display", "Block");
    $(".default").css("display", "Block");
    $(".tabs li a").on('click', function () {
        event.preventDefault();
        $('.tab_product_slider').slick('unslick');
        $('.media-slide-5').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        $('.media-slide-5').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            centerPadding: '15px',
            responsive: [
                {
                    breakpoint: 1470,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        infinite: true
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true
                    }
                },
                {
                    breakpoint: 820,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true
                    }
                }
            ]
        });
    });





    $('.media-slide-5').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        centerPadding: '15px',
        responsive: [
            {
                breakpoint: 1470,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 820,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            }
        ]
    });





    // new tab
    $(".product-slide-3").slick({
        arrows: true,
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1420,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true
                }
            },
            {
                breakpoint: 420,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
        ]
    });
    $(".product-slide-4").slick({
        arrows: true,
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
        ]
    });
    $(".product-slide-5").slick({
        arrows: true,
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1700,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });
    $(".product-slide-6").slick({
        arrows: true,
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1700,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });
    $('.product-4').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 420,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.product-slide').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 6,
        responsive: [
            {
                breakpoint: 1700,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true
                }
            },
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
    $('.product_4').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1430,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 420,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.product-6').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 6,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 420,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.sale-slider').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 6000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 680,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    $('.hot-deals-slider').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 6000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 680,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });



    /*=====================
     14. Dark Light and color picker
     ==========================*/
    // $('<div class="theme-pannel-main"><ul><li class="sidebar-btn dark-light-btn"><a href="javascript:void(0)" class="dark-light"><span class="theme-layout-version">Dark</span></a></li></ul></div><div class="color-picker"> <a href="#" class="handle title"> <img class="img-fluid" src="../assets/images/paint.png"/> </a> <div> <h4>Choose color</h4> <ul class="colors"> <li class="color1"></li><li class="color2"></li><li class="color3"></li><li class="color4"></li><li class="color5"></li><li class="color6"></li><li class="color7"></li><li class="color8"></li><li class="color9"></li><li class="color10"></li><li class="color11"></li><li class="color12"></li><li class="color13"></li><li class="color14"></li><li class="color15"></li></ul> </div></div>').appendTo($('body'));
    // $('<div class="theme-pannel-main"><ul><li class="sidebar-btn dark-light-btn"><a href="javascript:void(0)" class="dark-light"><span class="theme-layout-version">Dark</span></a></li></ul></div><div class="color-picker"> <a href="#" class="handle title"> <img class="img-fluid" src="../assets/images/paint.png"/> </a> <div> <h4>Choose color</h4> <ul class="colors"> <li class="color1"></li><li class="color2"></li><li class="color3"></li><li class="color4"></li><li class="color5"></li><li class="color6"></li><li class="color7"></li><li class="color8"></li><li class="color9"></li><li class="color10"></li><li class="color11"></li><li class="color12"></li><li class="color13"></li><li class="color14"></li><li class="color15"></li></ul> </div></div>').appendTo($('body'));

    (function () {
    })();
    // $('#ltr_btn').hide();
    // $("#ltr_btn").on('click', function () {
    //   $('body').addClass('ltr');
    //   $('body').removeClass('rtl');
    //   $('#ltr_btn').hide();
    //   $('#rtl_btn').show();
    // });
    // $("#rtl_btn").on('click', function () {
    //   $('body').addClass('rtl');
    //   $('body').removeClass('ltr');
    //   $('#rtl_btn').hide();
    //   $('#ltr_btn').show();
    // });
    // $(".setting_buttons li").on('click', function () {
    //   $(this).addClass('active').siblings().removeClass('active');
    // });
    // $(".color-picker li").on('click', function () {
    //   $(this).addClass('active').siblings().removeClass('active');
    // });

    // dark layout //
    var body_event = $("body");
    body_event.on("click", ".theme-layout-version", function () {
        $(this).toggleClass('dark');
        $('body').removeClass('dark');
        if ($('.theme-layout-version').hasClass('dark')) {
            $('.theme-layout-version').text('Light');
            $('body').addClass('dark');
        } else {
            $('#theme-dark').remove();
            $('.theme-layout-version').text('Dark');
        }

        return false;
    });




    /*=====================
     15. Add to cart
     ==========================*/
    $('.add-cartnoty').on('click', function () {
        $.notify({
            icon: 'fa fa-check',
            title: 'Success!',
            message: 'Item Successfully added to your cart'
        }, {
            element: 'body',
            position: null,
            type: "success",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "left"
            },
            offset: 20,
            spacing: 10,
            z_index: 10000,
            delay: 1000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });
    });

    /*=====================
     16.  Add to wishlist
     ==========================*/
    $('.add-to-wish').on('click', function () {

        $.notify({
            icon: 'fa fa-check',
            title: 'Success!',
            message: 'Item Successfully added in wishlist'
        }, {
            element: 'body',
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });
    });



    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 600) {
            $('.tap-top').addClass('top-cls');

        } else {
            $('.tap-top').removeClass('top-cls');
        }
    });

    $(' <div class="tap-top" style="display: block;"><i class="fas fa-arrow-up"></i></div>').appendTo($('body'));
    (function () {
    })();
    $('.tap-top').on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    /*=====================
       18. loader
       ==========================*/

    $('.loader-wrapper').fadeOut('slow', function () {
        $(this).remove();
    });


    /*=====================
     19. add to cart sidebar js
     ==========================*/
    function openCart() {
        document.getElementById("cart_side").classList.add('open-side');
    }
    function closeCart() {
        document.getElementById("cart_side").classList.remove('open-side');
    }

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        var width_content = jQuery(window).width();
        if ((width_content) > '576') {
            if (scroll >= 800) {
                $("body").addClass("stickyCart");
            } else {
                $("body").removeClass("stickyCart");
            }
        }
    });


    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 800) {
            $('.bottom-cart-sticky').addClass('open-cart');
        } else {
            $('.bottom-cart-sticky').removeClass('open-cart');
        }
    });





    /*=====================
    20. Color Picker
     ==========================*/
    var body_event = $("body");
    body_event.on("click", ".color1", function () {
        $("#color").attr("href", "../assets/css/color1.css");
        return false;

    });
    body_event.on("click", ".color2", function () {
        $("#color").attr("href", "../assets/css/color2.css");
        return false;
    });
    body_event.on("click", ".color3", function () {
        $("#color").attr("href", "../assets/css/color3.css");
        return false;
    });
    body_event.on("click", ".color4", function () {
        $("#color").attr("href", "../assets/css/color4.css");
        return false;
    });
    body_event.on("click", ".color5", function () {
        $("#color").attr("href", "../assets/css/color5.css");
        return false;
    });
    body_event.on("click", ".color6", function () {
        $("#color").attr("href", "../assets/css/color6.css");
        return false;
    });
    body_event.on("click", ".color7", function () {
        $("#color").attr("href", "../assets/css/color7.css");
        return false;
    });
    body_event.on("click", ".color8", function () {
        $("#color").attr("href", "../assets/css/color8.css");
        return false;
    });
    body_event.on("click", ".color9", function () {
        $("#color").attr("href", "../assets/css/color9.css");
        return false;
    });
    body_event.on("click", ".color10", function () {
        $("#color").attr("href", "../assets/css/color10.css");
        return false;
    });
    body_event.on("click", ".color11", function () {
        $("#color").attr("href", "../assets/css/color11.css");
        return false;
    });
    body_event.on("click", ".color12", function () {
        $("#color").attr("href", "../assets/css/color12.css");
        return false;
    });
    body_event.on("click", ".color13", function () {
        $("#color").attr("href", "../assets/css/color13.css");
        return false;
    });
    body_event.on("click", ".color14", function () {
        $("#color").attr("href", "../assets/css/color14.css");
        return false;
    });
    body_event.on("click", ".color15", function () {
        $("#color").attr("href", "../assets/css/color15.css");
        return false;
    });

    $('.color-picker').animate({ right: '-150px' });

    body_event.on("click", ".color-picker a.handle", function (e) {
        e.preventDefault();
        var div = $('.color-picker');
        if (div.css('right') === '-150px') {
            $('.color-picker').animate({ right: '0px' });
        }
        else {
            $('.color-picker').animate({ right: '-150px' });
        }
    });

    /*=====================
    21. Add to cart quantity Counter
     ==========================*/
    $('button.add-button').on('click', function () {
        $(this).next().addClass("open");
        $(".qty-input").val('1kg');
    });
    $('.quantity-right-plus').on('click', function () {
        var $qty = $(this).siblings(".qty-input");
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal)) {
            $qty.val(currentVal + 1 + 'kg');
        }
    });
    $('.quantity-left-minus').on('click', function () {
        var $qty = $(this).siblings(".qty-input");
        var _val = $($qty).val();
        if (_val == '1kg') {
            var _removeCls = $(this).parents('.cart_qty');
            $(_removeCls).removeClass("open");
        }
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal) && currentVal > 0) {
            $qty.val(currentVal - 1 + 'kg');
        }
    });




    /*================================
     22. counter js
    ===================================*/

    $('.counter-count').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {

            //chnage count up speed here
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });




    /*=============
     23. Tooltip js
    ===============*/
    tippy('.tooltip-top', {
        content: 'My tooltip!',
        placement: 'top',
    });

    tippy('.tooltip-left', {
        content: 'My tooltip!',
        placement: 'left',
    });

    tippy('.tooltip-right', {
        content: 'My tooltip!',
        placement: 'right',
    });

    tippy('.tooltip-bottom', {
        content: 'My tooltip!',
        placement: 'bottom',
    });


    /*=====================
     26. Cookiebar
     ==========================*/
    window.setTimeout(function () {
        $(".cookie-bar").addClass('show')
    }, 5000);

    $('.cookie-bar .btn, .cookie-bar .btn-close').on('click', function () {
        $(".cookie-bar").removeClass('show')
    });




    /*=====================
     27. Floating Cart
     ==========================*/
    $('#cart-float-button').on('click', function () {

    });

})(jQuery);

function openCart() {
    const cartSide = document.getElementById("cart_side");
    const mainContents = document.getElementById('main-content');
    cartSide.classList.add('open-side');
    mainContents.classList.add('cart-open');
}

function closeCart() {
    document.getElementById("cart_side").classList.remove('open-side');
    const mainContents = document.getElementById('main-content');
    mainContents.classList.remove('cart-open');
}

function openAccount() {
    document.getElementById("myAccount").classList.add('open-side');
}
function closeAccount() {
    document.getElementById("myAccount").classList.remove('open-side');
}

function openWishlist() {
    document.getElementById("wishlist_side").classList.add('open-side');
}
function closeWishlist() {
    document.getElementById("wishlist_side").classList.remove('open-side');
}
function openSetting() {
    document.getElementById("mySetting").classList.add('open-side');
}
function closeSetting() {
    document.getElementById("mySetting").classList.remove('open-side');
}
function toggleSearch() {
    document.getElementById("search-box-container").classList.toggle('d-block');
}
function closeSearch() {
    document.getElementById("search-box-container").classList.remove('d-block');
}




// ------------------------  Add New Item to Cart ------------------------
function addItemToCart() {
    const cart_product_container = document.getElementById('cart_product_container');
    const li_Node = document.createElement("li");
    li_Node.classList.add('cart-item');
    const newCartItem =
        `<div class="media">
        <a href="product-page(left-sidebar).html">
        <img alt="megastore1" class="me-3" src="../assets/images/mega-store/product/1.jpg">
        </a>
      <div class="media-body">
        <a href="product-page(left-sidebar).html">
          <h4>women fashion shoes</h4>
        </a>
       <h6>
          $80.00 <span>$120.00</span>
       </h6>
       <div class="addit-box">
          <div class="qty-box">
             <div class="input-group">
                 <button onclick="cartQuantityDecrement(event)" class="qty-minus"><i class="fas fa-minus"></i></button>
                 <input class="qty-adj form-control" type="number" value="1" />
                 <button onclick="cartQuantityIncrement(event)" class="qty-plus"><i class="fas fa-plus"></i></button>
             </div>
          </div>
        </div>
      </div>
    </div>  `;

    li_Node.innerHTML = newCartItem;
    cart_product_container.appendChild(li_Node);
    openCart();
}




// ------------------------  Cart Quantity Increment/Decrement -------------------------
function cartQuantityIncrement(e) {
    if (e.target.previousElementSibling === null) {
        e.target.parentElement.previousElementSibling.value++;
    }
    else {
        e.target.previousElementSibling.value++;
    }
}

function cartQuantityDecrement(e) {
    if (e.target.nextElementSibling === null) {
        if (e.target.parentElement.nextElementSibling.value > 1) {
            e.target.parentElement.nextElementSibling.value--;
        } else {
            e.target.closest('.cart-item').remove();
        }
    }
    else {
        if (e.target.nextElementSibling.value > 1) {
            e.target.nextElementSibling.value--;
        } else {
            e.target.closest('.cart-item').remove();
        }
    }
}





// ------------------------  Product Quickview - change quick view product image -------------------------
function changeQuickViewImage(newImage) {
    // Get the expanded image
    var imageCanvas = document.querySelector(".product-quickview-image");   

    // Use the same src in the expanded image as the image being clicked on from the grid
    imageCanvas.setAttribute('src', newImage.src);

    // Use the value of the alt attribute of the clickable image as text inside the expanded image
    expandImg.parentElement.style.display = "block";
}



// ------------------------  Product Quickview - change quick view product quantity -------------------------
function quickViewQunatityIncr(e) {
    if (e.target.nextElementSibling === null) {
        e.target.parentElement.nextElementSibling.value++;
    }
    else {
        e.target.nextElementSibling.value++;
    }
}


function quickViewQunatityDec(e) {
    if (e.target.previousElementSibling === null) {
        if (e.target.parentElement.previousElementSibling.value > 1) {
            e.target.parentElement.previousElementSibling.value--;
        }
    }
    else {
        if (e.target.previousElementSibling.value > 1) {
            e.target.previousElementSibling.value--;
        }
    }
}




// ------------------------  Sidemenu Toggle -------------------------
function toggleCategorySidemenu() {
    const sidemenuContainer = document.getElementById('sidemenu-container');
    const mainContents = document.querySelector('.main-content');
    openCloseFooter(sidemenuContainer);
    if (sidemenuContainer.classList.contains('hide-menu')) {
        sidemenuContainer.classList.remove('hide-menu');
        mainContents.classList.remove('category-closed');
        sessionStorage.setItem('sidemenu', 'open');
    }
    else {
        sidemenuContainer.classList.add('hide-menu');
        mainContents.classList.add('category-closed');
        sessionStorage.setItem('sidemenu', 'close');
    }
}

function openCloseFooter(sidemenuContainer) {
    const mainContents = document.querySelector('#main-content-footer');
    if (sidemenuContainer.classList.contains('hide-menu')) {
        mainContents.classList.remove('category-closed');
    }
    else {
        mainContents.classList.add('category-closed');
    }
}



// // ------------------------  Sidemenu Toggle -------------------------
// function toggleCategorySidemenu() {
//     const sidemenuContainer = document.getElementById('sidemenu-container');
//     const mainContents = document.querySelector('.main-content');
//     openCloseFooter(sidemenuContainer);
//     if(sidemenuContainer.classList.contains('hide-menu')){
//       sidemenuContainer.classList.remove('hide-menu');
//       mainContents.classList.remove('category-closed');
//     }
//     else{
//       sidemenuContainer.classList.add('hide-menu');
//       mainContents.classList.add('category-closed');
//     }
//   }
//   function openCloseFooter (sidemenuContainer) {
//       const mainContents = document.querySelector('#main-content-footer');
//       if(sidemenuContainer.classList.contains('hide-menu')){
//           mainContents.classList.remove('category-closed');
//       }
//       else{
//           mainContents.classList.add('category-closed');
//       }
//   }


//-------------------------- Nav Icon Block -----------------------------
function toggleNavIconBlock() {
    const iconBlock = document.getElementById('icon-block');

    if (iconBlock.classList.contains('icon-block-show')) {
        iconBlock.classList.remove('icon-block-show');
    }
    else {
        iconBlock.classList.add('icon-block-show');
    }
}


//-------------------------- Category Filter Toggle -----------------------------
function categoryFilterToggle() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");

    if (dots.style.display === "none") {
        dots.style.display = "block";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        moreText.style.display = "block";
    }
}


$(document).ready(function () {
    const sidemenuContainer = document.getElementById('sidemenu-container');
    const mainContents = document.querySelector('.main-content');
    const mainContentsFooter = document.querySelector('#main-content-footer');

    const sidemenuStatus = sessionStorage.getItem('sidemenu');
    if (sidemenuStatus === 'close') {
        mainContents.classList.add('category-closed');
        sidemenuContainer.classList.add('hide-menu');
        mainContentsFooter.classList.add('category-closed');
    }
    else {
        mainContents.classList.remove('category-closed');
        sidemenuContainer.classList.remove('hide-menu');
        mainContentsFooter.classList.remove('category-closed');
    }
});




// new modle design 
function showText() {
    document.getElementById('hidePhoneText').style.opacity = '1';
    document.getElementById('number').style.borderBottom = '2px solid #FF7517';
  }
  function next(){
    document.getElementById('loginWithEmail').style.display = "none";
    document.getElementById('loginWithPassword').style.display = "block";
  }
  function prev(){
    document.getElementById('loginWithPassword').style.display = "none";
    document.getElementById('loginWithEmail').style.display = "block";
  }
//   function sentCodeInPhone () {
//     document.getElementById('sent-phone-code-wrapper').classList.remove('d-none');
//     document.getElementById('phone-container-wrapper').classList.add('d-none');
//     document.getElementById('facebookLogin').classList.add('d-none')
//   }






