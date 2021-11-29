import Instafeed from 'instafeed.js';
import Swiper, { Navigation } from 'swiper';

function init() {

    function instafeedSlider() {

        Swiper.use([Navigation]);

        const instafeedSlider = new Swiper(".instafeed-slider__swiper", {
            slidesPerView: 1,
            loop: true,
            spaceBetween: 50,
            navigation: {
                nextEl: '.instafeed-slider__arrow--next',
                prevEl: '.instafeed-slider__arrow--prev'
            },
            breakpoints: {
                320: {
                    spaceBetween: 10
                },
                576: {
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 30
                }
            }
        })

    }

    fetch('https://ig.instant-tokens.com/users/bc4339ba-6e2d-4a4b-bfe1-dcbf8efaec6a/instagram/17841449477240552/token?userSecret=p2hcjf3vacg1d55bga0pq')
    .then(resp => resp.json())
    .then(data => {
            let feed = new Instafeed({
                accessToken: data.Token,
                target: 'instafeed',
                limit: 8,
                template: '<div class="instafeed-slider__swiper-slide swiper-slide"><a class="instafeed-slider__link" href="{{link}}" target="_blank"><img class="instafeed-slider__img" title="{{caption}}" src="{{image}}" /></a></div>',
                after: instafeedSlider
            });

            feed.run();

        });

}

export default { init }