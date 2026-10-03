function findField(field) {
    const match = document.querySelector('.' + field);
    return match;
}

function addRedField(field) {

    const inputClassType = '.' + field;
    const spanClassType = inputClassType + ' ' + '.wrong';

    document.querySelector(inputClassType).classList.add(errorLabel);
    document.querySelector(spanClassType).classList.add(visible);
    console.log('Aggiungo errore');

}

function removeRedField(field) {

    const inputClassType = '.' + field;
    const spanClassType = inputClassType + ' ' + '.wrong';

    document.querySelector(inputClassType).classList.remove(errorLabel);
    document.querySelector(spanClassType).classList.remove(visible);
    console.log('Rimuovo errore');


}

function checkUsername() {
    const input = findField('username input');
    form[input.name] = input.value.length > 0;

    let result = false;

    if (form[input.name]) {
        removeRedField(input.name);
        result = true;

    } else {
       addRedField(input.name);
       result = false;
    }

    return result;
}

function checkPassword() {
    const input = findField('password input');
    form[input.name] = input.value.length > 0

    let result = false;
    
    if (form[input.name]) {
        removeRedField(input.name);
        result = true;

    } else {
       addRedField(input.name);
       result = false;
    }

    return result;
}

function showPassword () {
    const password = document.querySelector('#password_value');
    const isText = "text";
    const icon = document.querySelector('#toggle_password');

    password.type = isText;
    icon.src = "/images/Immagini_Varie/hide_password.png";
}

function hidePassword () {
    const password = document.querySelector('#password_value');
    const isPassword = "password";
    const icon = document.querySelector('#toggle_password');
        password.type = isPassword;
        icon.src = "/images/Immagini_Varie/show_password.png";
}

function checkLogin(event) {
    
    if(!checkUsername()) {
        event.preventDefault();
    }
    if(!checkPassword()) {
        event.preventDefault();
    }

}


const form = {'upload': true};
const errorLabel = 'error_label_js';
const visible = 'visible';

document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('form').addEventListener('submit', checkLogin);

document.querySelector('#toggle_password').addEventListener('pointerdown', showPassword);
document.querySelector('#toggle_password').addEventListener('pointerup', hidePassword);

