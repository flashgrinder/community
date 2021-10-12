import Swiper, { Navigation } from 'swiper';

function init() {

    Swiper.use([Navigation]);

    const postSlider = new Swiper(".post-slider__swiper", {
        slidesPerView: 1,
        loop: true,
        spaceBetween: 30,
        navigation: {
            nextEl: '.post-slider__arrow--next',
            prevEl: '.post-slider__arrow--prev'
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 3
            }
        }
    });

}

export default { init }