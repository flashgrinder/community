import Swiper, { EffectFade, Autoplay } from 'swiper';

function init() {

    Swiper.use([EffectFade, Autoplay]);

    const mainScreenSlider = new Swiper(".main-screen__swiper", {
        slidesPerView: 1,
        allowTouchMove: false,
        loop: true,
        zoom: true,
        effect: 'fade',
        speed: 2000,
        autoplay: {
            delay: 6000,
        },
        fadeEffect: {
            crossFade: true
        }
    });

}

export default { init }