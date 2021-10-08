import Swiper, { Thumbs, Zoom, EffectFade } from 'swiper';


function init() {

    Swiper.use([Thumbs, Zoom, EffectFade]);

    const aboutProductSliderThumb = new Swiper(".about-product__swiper-thumb", {
        slidesPerView: 4,
        spaceBetween: 25,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        breakpoints: {
            320: {
                spaceBetween: 10
            }
        }
    });

    const aboutProductSliderFull = new Swiper(".about-product__swiper-full", {
        loop: true,
        zoom: true,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        thumbs: {
            swiper: aboutProductSliderThumb
        }
    });

}

export default { init }