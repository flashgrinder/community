
const modalService = () => {
    const d = document;
    const body = d.querySelector('body');
    const buttons = d.querySelectorAll('[data-modal-trigger]');

    for(let button of buttons) {
        triggerEvent(button);
    }
    
    function triggerEvent(button) {
      button.addEventListener('click', () => {
        const trigger = button.getAttribute('data-modal-trigger');
        const modal = d.querySelector(`[data-modal=${trigger}]`);
        const modalBody = modal.querySelector('.modal__body');
        const closeBtn = modal.querySelector('.modal__close');
        
        closeBtn.addEventListener('click', () => {
            modal.classList.remove('is-open')
            modal.classList.add('is-out');
            setTimeout(() => {
                modal.classList.remove('is-out');
            }, 1300);
        } )

        modal.addEventListener('click', () => {
            modal.classList.remove('is-open');
            modal.classList.add('is-out');
            setTimeout(() => {
                modal.classList.remove('is-out');
            }, 1300);
        } )
        
        modalBody.addEventListener('click', (e) => e.stopPropagation());
  
        modal.classList.add('is-open');
        
        body.addEventListener('keydown', (e) => {
                if(e.keyCode === 27) {
                    modal.classList.remove('is-open')
                }
            });
        });
    }
}

function init() {
    modalService();
}
  
export default { init }