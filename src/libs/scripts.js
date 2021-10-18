import gsap from 'gsap';
import cursor from '../libs/modules/cursor.js';
import burgerMenu from '../libs/modules/burger-menu.js';
import mainScreenSlider from '../libs/modules/mainScreenSlider.js';
import productSlider from '../libs/modules/productSlider.js';
import newsSlider from '../libs/modules/newsSlider.js';
import aboutProductSlider from '../libs/modules/aboutProductSlider.js';
import postSlider from '../libs/modules/postSlider.js';
import modal from '../libs/modules/modal.js';
import gsReveal from '../libs/modules/gsReveal.js';
import reveal from '../libs/modules/reveal';
import indexAnimation from '../libs/modules/index-animation.js';
import instafeed from '../libs/modules/instafeed.js';

document.addEventListener('DOMContentLoaded', function(e) {

    gsap.config({
        nullTargetWarn: false
    });
    
    cursor.init();
    burgerMenu.init();
    modal.init();
    mainScreenSlider.init();
    productSlider.init();
    newsSlider.init();
    aboutProductSlider.init();
    postSlider.init();
    gsReveal.init();
    reveal.init();
    indexAnimation.init();
    instafeed.init();
    
});