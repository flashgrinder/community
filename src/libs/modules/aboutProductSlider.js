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
        zoom: {
            toggle: true,
            maxRatio: 3,
            minRatio: 1,
        },
        edgeSwipeThreshold: 150,
        edgeSwipeThreshold: 150,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        thumbs: {
            swiper: aboutProductSliderThumb
        }
    });

    let swiperSlide = document.querySelectorAll('.about-product__swiper-slide--full');

    for(let i = 0; i< swiperSlide.length; i++){

        swiperSlide[i].addEventListener('click',function(e){
            aboutProductSliderFull.zoom.in();
        })

        swiperSlide[i].addEventListener('mouseout',function(e){
            aboutProductSliderFull.zoom.out();
        })
    }

}

export default { init }