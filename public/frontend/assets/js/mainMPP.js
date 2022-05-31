/*
|--------------------------------------------------------------------------
    Slick Slider
|--------------------------------------------------------------------------
*/
$('.hot-deal').slick({
    responsive: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
});
$('.left').click(function () {
    $('.hot-deal').slick('slickPrev');
})
$('.right').click(function () {
    $('.hot-deal').slick('slickNext');
})

