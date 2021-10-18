import gsap from 'gsap';

function init() {

    gsap.set('.follower',{xPercent:-50,yPercent:-50});
    gsap.set('.cursor',{xPercent:-50,yPercent:-50});

    var follow = document.querySelector('.follower');
    var cur = document.querySelector('.cursor');

    window.addEventListener('mousemove',e => {
        gsap.to(cur,0.1,{x:e.clientX,y:e.clientY});
        gsap.to(follow,0.2,{x:e.clientX,y:e.clientY});
    });

}

export default { init }