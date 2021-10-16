import gsap from 'gsap';

function init(container = document) {

    const header = container.querySelector('.js-header');

    const tl = gsap.timeline({defaults: {duration: 1}});
    tl.from(header, {y: '-100%', duration: 1})

}

export default { init }