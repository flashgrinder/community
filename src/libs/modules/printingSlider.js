import Swiper, { Navigation, EffectCoverflow } from 'swiper';

function init() {

    Swiper.use([Navigation, EffectCoverflow]);

    const printingSlider = new Swiper(".printing-slider__swiper", {
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 1,
        loop: true,
        effect: 'coverflow',
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 33,
            slideShadows: false,
        },
        navigation: {
            nextEl: '.printing-slider__arrow--next',
            prevEl: '.printing-slider__arrow--prev'
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 1,
            },
            768: {
                depth: 20,
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });

}

export default { init }