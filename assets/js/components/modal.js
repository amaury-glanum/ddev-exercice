export const modalToggle = () => {

    const openModal = () => {
        document.querySelector('.modal').classList.toggle('modal-opened');
        document.querySelector('body').classList.toggle('has-modal');
    }

    document.querySelectorAll('.modal-close-btn, .modal-open-btn').forEach(function (element) {
        element.removeEventListener('click', openModal);
        element.addEventListener('click', openModal);
    });
};
