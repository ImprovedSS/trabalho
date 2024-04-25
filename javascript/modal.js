// modal entrar
const openModalButton = document.querySelector('#btn-entrar');
const openModalButtonTwo = document.querySelector('#btn-redirecionamento-entrar');
const closeModalButton = document.querySelector('#btn-fechar');
const modal = document.querySelector('#modal');
const fade = document.querySelector('#fade');
const body = document.querySelector('body');

const toggleModal = () => {
    [modal, fade, body].forEach((elemento) => elemento.classList.toggle('hide'));
};

[openModalButton, openModalButtonTwo, closeModalButton, fade].forEach((elemento) => {
    elemento.addEventListener('click', () => toggleModal());
});

// modal btn show/hide password - modal entrar
const inputPassword = document.getElementById('modal-input-password');
const btnShowPassword = document.getElementById('modal-btn-password');

btnShowPassword.addEventListener('click', () => {
    if (inputPassword.type === 'password') {
        inputPassword.setAttribute('type', 'text');
        btnShowPassword.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        inputPassword.setAttribute('type', 'password');
        btnShowPassword.classList.replace('fa-eye-slash', 'fa-eye');
    };
});

// modal cadastrar
const openModalButtonCadastrar = document.querySelector('#btn-ir-cadastrar');
const closeModalButtonCadastrar = document.querySelector('#btn-fechar-cadastro');
const closeModalButtonCadastrarTwo = document.querySelector('#btn-ir-entrar');
const modalCadastrar = document.querySelector('#modal-cadastro');
const fadeCadastrar = document.querySelector('#fade2');

const toggleModalCadastrar = () => {
    [modalCadastrar, fadeCadastrar, modal, fade].forEach((elemento) => elemento.classList.toggle('hide'));
};

[openModalButtonCadastrar, closeModalButtonCadastrar, closeModalButtonCadastrarTwo, fadeCadastrar].forEach((elemento) => {
    elemento.addEventListener('click', () => toggleModalCadastrar());
});

// modal btn show/hide password - modal cadastrar
const inputSenha = document.getElementById('cadastro-senha');
const inputConfirmarSenha = document.getElementById('cadastro-confirmar-senha');
const btnMostrarSenha = document.getElementById('btn-cadastro-senha');
const btnMostrarConfirmarSenha = document.getElementById('btn-cadastro-confirmar-senha');

btnMostrarSenha.addEventListener('click', () => {
    if (inputSenha.type === 'password') {
        inputSenha.setAttribute('type', 'text');
        btnMostrarSenha.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        inputSenha.setAttribute('type', 'password');
        btnMostrarSenha.classList.replace('fa-eye-slash', 'fa-eye')
    };
});

btnMostrarConfirmarSenha.addEventListener('click', () => {
    if (inputConfirmarSenha.type === 'password') {
        inputConfirmarSenha.setAttribute('type', 'text');
        btnMostrarConfirmarSenha.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        inputConfirmarSenha.setAttribute('type', 'password');
        btnMostrarConfirmarSenha.classList.replace('fa-eye-slash', 'fa-eye')
    };
});
