import gsap from 'gsap';

const burger = document.querySelector('.js-burger');
const menu = document.querySelector('.js-menu');
const phone = document.querySelector('.js-phone');
const search = document.querySelector('.js-search');
const modals = document.querySelectorAll('.js-modal');
let isOpen = burger.classList.contains('is-open');

let tl = gsap.timeline({defaults: {duration: .2, ease: 'power3.out'}});

tl.paused(true);
tl.to('.header__search', {opacity: 1, stagger: .1});
tl.to('.header__phone', {opacity: 1, stagger: .1});
tl.to('.header__menu-item', {opacity: 1, x: '0px', stagger: .1, ease: 'power3.out'});

function open() {
    burger.classList.add('is-open');
    menu.classList.add('is-open');
    phone.classList.add('is-open');
    search.classList.add('is-open');
    setTimeout(() => {
        tl.play();
    }, 250);
    isOpen = true;

    if(isOpen) {
        modals.forEach(modal => modal.classList.remove('is-open'));
    }
}

function close() {
    burger.classList.remove('is-open');
    menu.classList.remove('is-open');
    phone.classList.remove('is-open');
    search.classList.remove('is-open');
    tl.reverse(1);
    isOpen = false;
}

const anchorLinks = document.querySelectorAll('.js-anchor-link'); // .js-anchor-link .menu__link

anchorLinks.forEach(link => {
    link.addEventListener('click', () => {
        close();
    })
});

document.addEventListener('keydown', (e) => {if(e.keyCode === 27 || e.which === 27) {close()}});

function toggle() {
    isOpen ? close() : open();
}

function init() {
    burger.addEventListener('click', toggle);
    search.addEventListener('click', close);
}

function destroy() {
    burger.removeEventListener('click', toggle)
}

export default {init, destroy, toggle}