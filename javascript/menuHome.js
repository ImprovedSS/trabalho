const openModalButton = document.querySelector('#credito');
const modal = document.querySelector('#modal-creditos');
const fade = document.querySelector('#fade2');
const body = document.querySelector('body');

const toggleModal = () => {
    [modal, fade, body].forEach((elemento) => elemento.classList.toggle('hide'));
};

[openModalButton, fade].forEach((elemento) => {
    elemento.addEventListener('click', () => toggleModal());
});