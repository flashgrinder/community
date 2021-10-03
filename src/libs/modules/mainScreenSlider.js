import Swiper, { EffectFade, Autoplay } from 'swiper';

function init() {

    Swiper.use([EffectFade, Autoplay]);

    const mainScreenSlider = new Swiper(".main-screen__swiper", {
        slidesPerView: 1,
        allowTouchMove: false,
        loop: true,
        zoom: true,
        effect: 'fade',
        autoplay: {
            delay: 5000,
        },
        fadeEffect: {
            crossFade: true
        }
    });

}

export default { init }