import cursor from '../libs/modules/cursor.js';
import mainScreenSlider from '../libs/modules/mainScreenSlider.js';
import productSlider from '../libs/modules/productSlider.js';
import newsSlider from '../libs/modules/newsSlider.js';
import aboutProductSlider from '../libs/modules/aboutProductSlider.js';
import modal from '../libs/modules/modal.js';

document.addEventListener('DOMContentLoaded', function(e) {
    
    cursor.init();
    modal.init();
    mainScreenSlider.init();
    productSlider.init();
    newsSlider.init();
    aboutProductSlider.init();
    
});