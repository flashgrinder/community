import Swiper, { Navigation, EffectFade } from 'swiper';

function init() {

    Swiper.use([Navigation, EffectFade]);

    const newsSlider = new Swiper(".news-slider__swiper--noreverse", {
        slidesPerView: 1,
        allowTouchMove: false,
        loop: true,
        effect: 'fade',
        speed: 1000,
        fadeEffect: {
            crossFade: true
        },
        navigation: {
            nextEl: '.news-slider__arrow--next-noreverse',
            prevEl: '.news-slider__arrow--prev-noreverse'
        }
    });

    const newsSliderRevers = new Swiper(".news-slider__swiper--reverse", {
        slidesPerView: 1,
        allowTouchMove: false,
        loop: true,
        effect: 'fade',
        speed: 1000,
        fadeEffect: {
            crossFade: true
        },
        navigation: {
            nextEl: '.news-slider__arrow--next-reverse',
            prevEl: '.news-slider__arrow--prev-reverse'
        }
    });

}

export default { init }