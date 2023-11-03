
console.log('check ' + frames.value)

const $ = jQuery;
const frms = parseInt(frames.value);

$('.hfo-slider').slick({
    slidesToShow: frms,
    slidesToScroll: frms,
    arrows: true,
});
