//parâmetros para email
const emailRegex = new RegExp(/^[a-zA-Z][a-zA-z0-9._-]*@(gmail|outlook|hotmail|yahoo)\.com(\.[a-z]+)?$/);


//verificação do modal de cadastro
const formCadastro = document.getElementById('form-cadastrar');
const campoCadastro = document.querySelectorAll('.modal-cadastro-input-campo');
const msgCadastro = document.querySelectorAll('.modal-cadastro-input-erro');

//verificação dos dados do formulário de cadastro
formCadastro.addEventListener('submit', (event) => {
    event.preventDefault();
    if (validateCadastroUsuario() && validateCadastroEmail() && validateCadastroSenha() && validateCadastroConfirmarSenha()) {
        formCadastro.submit();
    } else {
        validateCadastroUsuario();
        validateCadastroEmail();
        validateCadastroSenha();
        validateCadastroConfirmarSenha();
    }
})

//apresentar e remover interações de erro
function setErrorCadastro(index) {
    campoCadastro[index].style.border = "3px solid white";
    msgCadastro[index].style.display = "block";

    if (index == 1) {
        campoCadastro[index].setAttribute('placeholder', 'exemplo@exemplo.com.opcional')
    }

};

function removeErrorCadastro(index) {
    campoCadastro[index].style.border = "none";
    msgCadastro[index].style.display = "none";
};

//validar campo usuário
function validateCadastroUsuario() {
    if (campoCadastro[0].value.length < 3) {
        setErrorCadastro(0);
        return false;
    } else {
        removeErrorCadastro(0);
        return true;
    };
};

//validar campo email
function validateCadastroEmail() {
    if (!emailRegex.test(campoCadastro[1].value)) {
        setErrorCadastro(1);
        return false;
    } else {
        removeErrorCadastro(1); 
        return true;
    };
};

//validar campo senha
function setErrorCadastroSenha(index) {
    itemCadastroSenha[index].style.display = "flex";
};

function removeErrorCadastroSenha(index) {
    itemCadastroSenha[index].style.display = "none";
};
const eyeBtnCadastroSenha = document.getElementById('btn-cadastro-senha');
const senhaCaracterRegex = new RegExp(/[*_\.]/);
const senhaMaiuscRegex = new RegExp(/[A-Z]/);
const senhaMinusRegex = new RegExp(/[a-z]/);
const senhaSpaceRegex = new RegExp(/[\s]/);
const senhaNumRegex = new RegExp(/[0-9]/);
const itemCadastroSenha = document.querySelectorAll('.modal-cadastro-erro-senha-item');
var allErrors = 0;
var lengthError = 0;
var maiuscError = 0;
var minusError = 0;
var caracterError = 0;
var numError= 0;
var spaceError = 0;
var oneLineError = 0;
var twoLinesError = 0;
var valor = '';

function validateCadastroSenha() {
    if (campoCadastro[2].value.length < 8 || !senhaMaiuscRegex.test(campoCadastro[2].value) || !senhaMinusRegex.test(campoCadastro[2].value) || !senhaCaracterRegex.test(campoCadastro[2].value) || !senhaNumRegex.test(campoCadastro[2].value) || senhaSpaceRegex.test(campoCadastro[2].value)) {
        setErrorCadastro(2);
        // eyeBtnCadastroSenha.style.top = '12.5%';
        if (campoCadastro[2].value.length < 8) {
            setErrorCadastroSenha(0);
            lengthError = 1;
        } else {
            removeErrorCadastroSenha(0);
            lengthError = 0;
        };
    
        if (!senhaMaiuscRegex.test(campoCadastro[2].value)) {
            setErrorCadastroSenha(1);
            maiuscError = 1;
        } else {
            removeErrorCadastroSenha(1);
            maiuscError = 0;
        };
    
        if (!senhaMinusRegex.test(campoCadastro[2].value)) {
            setErrorCadastroSenha(2);
            minusError = 1;
        } else {
            removeErrorCadastroSenha(2);
            minusError = 0;
        };
    
        if (!senhaCaracterRegex.test(campoCadastro[2].value)) {
            setErrorCadastroSenha(3);
            caracterError = 1;
        } else {
            removeErrorCadastroSenha(3);
            caracterError = 0;
        };

        if (!senhaNumRegex.test(campoCadastro[2].value)) {
            setErrorCadastroSenha(4);
            numError = 1;
        } else {
            removeErrorCadastroSenha(4);
            numError = 0;
        }
    
        if(senhaSpaceRegex.test(campoCadastro[2].value)) {
            setErrorCadastroSenha(5);
            spaceError = 1;
        } else {
            removeErrorCadastroSenha(5);
            spaceError = 0;

        };
        oneLineError = lengthError + numError + spaceError; //poderia ter feito outra div para não ter todo esse trabalho
        twoLinesError = maiuscError + minusError + caracterError;

        allErrors = lengthError + maiuscError + minusError + caracterError + numError + spaceError;
        if (allErrors == 1) {
            if (oneLineError == 1) {
                valor = '37.5%'
            } else if (twoLinesError == 1) {
                valor = '30%';
            };
        } else if (allErrors == 2) {
            if (oneLineError == 2) {
                valor = '27.5%';
            } else if (twoLinesError == 2) {
                valor = '20%';
            } else if (oneLineError == 1 && twoLinesError == 1) {
                valor = '23.75%';
            };
        } else if (allErrors == 3) {
            if (oneLineError == 3) {
                valor = '22.5%'; 
            } else if (twoLinesError == 3) {
                valor = '15%';
            } else if (oneLineError == 1 && twoLinesError == 2) {
                valor = '17.5%';
            } else if (oneLineError == 2 && twoLinesError == 1) {
                valor = '20%';
            };
        } else if (allErrors == 4) {
            if (oneLineError == 3 && twoLinesError == 1) {
                valor = '17.5%';
            } else if (oneLineError == 2 && twoLinesError == 2) {
                valor = '15.625%';
            } else if (oneLineError == 1 && twoLinesError == 3) {
                valor = '13.5%';
            };
        } else if (allErrors == 5) {
            if (oneLineError == 3 && twoLinesError == 2) {
                valor = '13.75%'; 
            } else if (oneLineError == 2 && twoLinesError == 3) {
                valor = '12.5%'
            };
        } else if (allErrors == 6) {
            valor = '11.75%';
        };

        eyeBtnCadastroSenha.style.top = valor;
        validateCadastroConfirmarSenha();
        return false;
    } else {
        eyeBtnCadastroSenha.style.top = '50%';
        removeErrorCadastro(2);
        validateCadastroConfirmarSenha();
        return true;
    };
};

// validar campo confirmar senha
const eyeBtnCadastroConfirmarSenha = document.getElementById('btn-cadastro-confirmar-senha');

function validateCadastroConfirmarSenha() {
    if (campoCadastro[3].value != campoCadastro[2].value) {
        setErrorCadastro(3);
        eyeBtnCadastroConfirmarSenha.style.top = '37.5%';
        return false;
    } else {
        removeErrorCadastro(3);
        eyeBtnCadastroConfirmarSenha.style.top = '50%';
        return true;
    };
}