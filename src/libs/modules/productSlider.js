import Swiper, { Navigation } from 'swiper';

function init() {

    Swiper.use([Navigation]);

    const productSlider = new Swiper(".product-slider__swiper", {
        slidesPerView: 2,
        slidesPerColumn: 1,
        slidesPerColumnFill: 'row',
        spaceBetween: 40,
        navigation: {
            nextEl: '.product-slider__arrow--next',
            prevEl: '.product-slider__arrow--prev'
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
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
                slidesPerView: 4,
                spaceBetween: 50
            }
        }
    });

}

export default { init }