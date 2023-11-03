const $ = jQuery;
const frms = parseInt(frames.value);

$(document).ready(function() {
    // frames.value is global variable.
    $('.hfo-slider').slick({
        slidesToShow: frms,
        slidesToScroll: frms,
        arrows: true,
    });
});
