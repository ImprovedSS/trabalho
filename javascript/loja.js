const metaDado = document.getElementById('meta-dado');
const modalStatus = document.getElementById('modal-status');
const fadeStatus = document.getElementById('fade');
const closeModalStatus = document.getElementById('btn-fechar-status');
const body = document.querySelector('body');

function verificiarStatus() {
    if (metaDado.value != 0) {
        const toggleModal = () => {
            [modalStatus, fadeStatus].forEach((elemento) => {
                elemento.classList.toggle('hide');
            });
        };

        [fadeStatus, closeModalStatus].forEach((elemento) => {
            elemento.addEventListener('click', toggleModal)
        });
    };
};

const toggleModal = () => {
    [modalStatus, fadeStatus, body].forEach((elemento) => elemento.classList.toggle('hide'));
};

[fadeStatus, closeModalStatus].forEach((elemento) => {
    elemento.addEventListener('click', () => toggleModal());
});