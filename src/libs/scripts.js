import mainScreenSlider from '../libs/modules/mainScreenSlider.js';
import productSlider from '../libs/modules/productSlider.js';
import aboutProductSlider from '../libs/modules/aboutProductSlider.js';
import modal from '../libs/modules/modal.js';

document.addEventListener('DOMContentLoaded', function(e) {
    
    modal.init();
    mainScreenSlider.init();
    productSlider.init();
    aboutProductSlider.init();
    
});