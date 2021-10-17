let k = window.matchMedia('(min-width: 1024px)').matches ? '-10' : '0';
const revealItemsObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            revealItemsObserver.unobserve(entry.target);
            entry.target.classList.add('is-revealed');
        }
    });
},
{
    rootMargin: `${k}%`
}
);



function init(container = document) {
    Array.from(container.querySelectorAll('.js-reveal')).forEach((el) => {
        if (!el.classList.contains('is-reveal-inited')) {
            revealItemsObserver.observe(el);
            el.classList.add('is-reveal-inited');
        }
    });
    window.addEventListener('resize', onResize);
}

window.revealInit = init;

function destroy(container = document) {
    Array.from(container.querySelectorAll('.js-reveal')).forEach((el) => {
        revealItemsObserver.unobserve(el);
        el.classList.remove('is-reveal-inited');
    });
    window.removeEventListener('resize', onResize);
}

function onResize() {
    k = window.matchMedia('(min-width: 1024px)').matches ? '-10' : '0';
}

const _module = {init, destroy}

export default _module;