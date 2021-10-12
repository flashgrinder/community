import gsap from 'gsap';

function init(container = document) {
    const firstWords = container.querySelector('.js-words-first');
    const secondWords = container.querySelector('.js-words-second');
    const thirdWords = container.querySelector('.js-words-third');
    const pathsHor = Array.from(container.querySelectorAll('.js-word-path-hor'));
    const pathsVer = Array.from(container.querySelectorAll('.js-word-path-ver'));
    const header = container.querySelector('.js-header');
    const indexSlider = container.querySelector('.js-index-slider');
    const indexLetters = Array.from(container.querySelectorAll('.js-word-letter'));
    const indexDescr = container.querySelector('.js-index-descr');

    pathsHor.forEach(path => {
        const tl = gsap.timeline({
           yoyo: true, repeat: -1
        });
        const directions = ['left', 'right'];
        let curTransformOrigin = directions[Math.floor(Math.random() * 2)];
        gsap.set(path, {transformOrigin: curTransformOrigin})
        tl.from(path,
            {
                scaleX: 0,
                duration: 10,
                onComplete: () => {
                    if (curTransformOrigin === 'left') {
                        gsap.set(path, {transformOrigin: 'right'})
                    } else {
                        gsap.set(path, {transformOrigin: 'left'})
                    }
                }
            },
             0)
    })

    pathsVer.forEach(path => {
        const tl = gsap.timeline({
           yoyo: true, repeat: -1
        });
        const directions = ['top', 'bottom'];
        let curTransformOrigin = directions[Math.floor(Math.random() * 2)];
        gsap.set(path, {transformOrigin: curTransformOrigin})
        tl.from(path,
            {
                scaleY: 0,
                duration: 10,
                onComplete: () => {
                    if (curTransformOrigin === 'top') {
                        gsap.set(path, {transformOrigin: 'bottom'})
                    } else {
                        gsap.set(path, {transformOrigin: 'top'})
                    }
                }
            },
             0)
    })

    const duration = 0.6;

    const tl = gsap.timeline({defaults: {duration: 1}});
    tl.fromTo(firstWords, {clipPath: 'polygon(110% 110%, 110% 110%, 110% -10%, 110% -10%)', x: '-100%'}, {clipPath: 'polygon(0% 110%, 110% 110%, 110% -10%, -10% -10%)', x: 0})
        .fromTo(secondWords, {clipPath: 'polygon(110% 110%, 110% 110%, 110% -10%, 110% -10%)', x: '-100%'}, {clipPath: 'polygon(-10% 110%, 110% 110%, 110% -10%, -10% -10%)', x: 0}, 0.1)
        .fromTo(thirdWords, {clipPath: 'polygon(-10% 110%, 110% 110%, 110% 110%, -10% 110%)', y: '-100%'}, {clipPath: 'polygon(-10% 110%, 110% 110%, 110% -10%, -10%  -10%)', y: 0}, 0.2)
        .from(header, {y: '-100%', duration: 0.4})
        .from(indexSlider, {opacity: 0, duration: 0.6}, '-=0.4')
        .to(indexLetters, {fill: 'transparent', stroke: 'white', duration: 0.4}, '-=0.6')
        .from(indexDescr, {opacity: 0, y: 20}, '-=0.2')

}

export default { init }