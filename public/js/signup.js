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

function checkEmptyField(name) {

    const field = findField(name + ' ' + 'input');
    let result = false;

    if (field.value.length > 0) {
        removeRedField(name);
        result = true;
        console.log('Aggiungo campo rosso');

    } else {
        addRedField(name)
        result = false;
        console.log('Rimuovo campo rosso');
    }

    return result;
}

function checkName() {
    const input = findField('name input');
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

function checkSurname() {
    const input = findField('surname input');
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

function jsonCheckUsername(json) {

    let result = false;

    console.log(json);
    if (!json) {
        removeRedField('username');
        form.username = true; 
        result = true;

    } else {

        document.querySelector('.username span').textContent = "Nome utente già utilizzato";
        addRedField('username');
        form.username = false; 
        result = false;

    }

    return result;
}

function jsonCheckEmail(json) {
    
    let result = false;

    console.log(json);
    if (!json) {
        removeRedField('email');
        form.email = true; 
        result = true;

    } else {

        document.querySelector('.email span').textContent = "Email già utilizzata";
        addRedField('email');
        form.email = false; 
        result = false;

    }

    return result;
}

function onResponse(response) {
    return response.json();
}

function checkUsername() {
    const input = findField('username input');

    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        input.parentNode.querySelector('span').textContent = "Inserisci username";
        addRedField(input.name);

        form.username = false;

    } else {
        fetch(BASE_URL + "check/username/" +encodeURIComponent(input.value)).then(onResponse).then(jsonCheckUsername);
    }    
}

function checkEmail() {
    const input = findField('email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(input.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        addRedField(input.name);

        form.email = false;

    } else {
        fetch(BASE_URL + "check/email/" +encodeURIComponent(String(input.value).toLowerCase())).then(onResponse).then(jsonCheckEmail);
    }
}

function isPasswordValid(password) {
    const specialChars = "!@#$%^&*()_+-=[]{}|;':\",.<>?/`~";
    const numbers = "0123456789";
    const lowerCase = "abcdefghijklmnopqrstuvwxyz";
    const upperCase =  lowerCase.toUpperCase();

    let hasSpecial = false;
    let hasNumber = false;
    let hasLower = false;
    let hasUpper = false;

    for (let i = 0; i < password.length; i++) {
        const char = password[i];
        if (specialChars.includes(char))
            hasSpecial = true;
        if (numbers.includes(char))
            hasNumber = true;
        if (lowerCase.includes(char))
            hasLower = true;
        if (upperCase.includes(char))
            hasUpper = true;
    }

    if (hasSpecial &&
        hasNumber && 
        hasLower && 
        hasUpper && 
        password.length >= 8) {
        return true;
    } else {
        return false;
    }
    
}

function checkPassword() {
    const input = findField('password input');
    form.password = isPasswordValid(input.value);
    
     let result = false;

    if (form.password) {
        removeRedField(input.name);
        result = true;

    } else {

        addRedField(input.name);
        result = false;

    }

    return result;

}

function checkConfirmPassword() {
    const input = findField('confirm_password input');
    const passwordInput = findField('password' + ' ' + 'input');
    form.confirmPassword = input.value;
    
    let result = false;

    if (form.confirmPassword  && form.confirmPassword === passwordInput.value) {
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
    const isPassword = "password";
    const icon = document.querySelector('#toggle_password');

    if (password.type === isPassword) {

        password.type = isText;
        icon.src = "/images/Immagini_Varie/hide_password.png";

    } else {

        password.type = isPassword;
        icon.src = "/images/Immagini_Varie/show_password.png";

    }
}

function checkAllow() {
    const input = findField('allow input');
    
    let result = false;

    if (input.checked) {
        removeRedField('allow');
        result = true;

    } else {
        addRedField(input.name);
        result = false;
    }

    return result;

}

function checkSignup(event) {

    if(!checkName()) {
        event.preventDefault();
    }
    if(!checkSurname()) {
        event.preventDefault();
    }
    if (!checkEmptyField('email')) {
        event.preventDefault();
    }
    if (!checkEmptyField('username')) {
        event.preventDefault();
    }
    if(!checkPassword()) {
        event.preventDefault();
    }
    if(!checkConfirmPassword()) {
        event.preventDefault();
    }
    if(!checkAllow()) {
        event.preventDefault();
    }

}


const errorLabel = 'error_label_js';
const visible = 'visible';

const form = {'upload': true};
document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkSurname);
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.confirm_password input').addEventListener('blur', checkConfirmPassword);
document.querySelector('.allow input').addEventListener('click', checkAllow);
document.querySelector('form').addEventListener('submit', checkSignup);

document.querySelector('#toggle_password').addEventListener('click', showPassword);

