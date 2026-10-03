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

function checkTelephone() {
    const input = findField('telephone input');
    form[input.name] = input.value.length > 0 && /^\d+$/.test(input.value);
    let result = false;

    
    if(form[input.name]) {   
        removeRedField(input.name);
        result = true;

    } else {
        addRedField(input.name);
        result = false;
    }
    
    return result;
}

function onResponse(response) {
    return response.json();
}

function checkEmail() {
    const input = findField('email input');
    let result = false;

    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(input.value).toLowerCase())) {
        
        document.querySelector('.email .wrong span').textContent = "Email non valida";
        addRedField(input.name);
        form.email = false;
        result = false;

    } else {
       removeRedField(input.name);
        form.email = true;
        result = true;
    }

    return result;
}

function checkMembers() {

    const input = findField('members input');
    form[input.name] = input.value.length > 0;

    let result = false;
    console.log(form[input.value])

    if (form[input.name] && input.value > 0 && input.value <= 6) {
        removeRedField(input.name);
        result = true;

    } else {

        addRedField(input.name);
        result = false;

    }

    return result;

}

function checkAnimals() {

    const input = findField('animals input');
    form[input.name] = input.value.length > 0;

    let result = false;

    if (form[input.name] && input.value === 'Si' || input.value === 'No') {
        removeRedField(input.name);
        result = true;

    } else {

        addRedField(input.name);
        result = false;

    }

    return result;

}

function checkValidRoom (room) {

    const rooms = ['Suite', 'Superior', 'Classica', 'Cottage', 'Cottage Deluxe'];
    
    if(rooms.includes(room)) {
        return true;
    } else {
        return false;
    }
}

function checkRoom() {

    const input = findField('room input');
    const room = input.value;
    const validRoom = checkValidRoom(room);
    form[input.name] = input.value.length > 0;

    let result = false;

    if (form[input.name] && validRoom) {
        removeRedField(input.name);
        result = true;

    } else {

        addRedField(input.name);
        result = false;

    }

    return result;

}

function validateDate() {

    const check_in = findField('check_in input');
    const check_out = findField('check_out input');
    let result = false;

    if (check_in.value < check_out.value) {
        result = true;
    } else {
        result = false;
    }

    return result;
 
}

function checkCheckIn() {
    const input = findField('check_in input');
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

function checkCheckOut() {
    const input = findField('check_out input');
    const check_out_label = findField('check_out .change_desc');


    form[input.name] = input.value.length > 0;
    let result = false;

    if (form[input.name]) {

        if(validateDate()) {

            removeRedField(input.name);
            result = true;

        } else {
            addRedField(input.name);
            check_out_label.textContent = "Inserisci una data successiva al Check-In";
            result = false;
            form[input.name] = false;
        }
    
    } else {
        addRedField(input.name);
        result = false;
    }
    
    return result;

}

function checkAllow() {
    const input = findField('allow input');
    
    let result = false;

    if (input.checked) {
        removeRedField(input.name);
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
     if(!checkTelephone()) {
        event.preventDefault();
    }
    if(!checkEmail()) {
        event.preventDefault();
    }
    if(!checkMembers()) {
        event.preventDefault();
    }
    if(!checkAnimals()) {
        event.preventDefault();
    }
    if(!checkRoom()) {
        event.preventDefault();
    }
    if(!checkCheckIn()) {
        event.preventDefault();
    }
    if(!checkCheckOut()) {
        event.preventDefault();
    }
    if(!checkAllow()) {
        event.preventDefault();
    }
    
}


const form = {'upload': true};
const errorLabel = 'error_label_js';
const visible = 'visible';

findField('name input').addEventListener('blur', checkName);
findField('surname input').addEventListener('blur', checkSurname);
findField('telephone input').addEventListener('blur', checkTelephone);
findField('email input').addEventListener('blur', checkEmail);
findField('members input').addEventListener('blur', checkMembers);
findField('animals input').addEventListener('blur', checkAnimals);
findField('room input').addEventListener('blur', checkRoom);
findField('check_in input').addEventListener('input', checkCheckIn);
findField('check_in input').addEventListener('blur', checkCheckIn);
findField('check_out input').addEventListener('input', checkCheckOut);
findField('check_out input').addEventListener('blur', checkCheckOut);
findField('allow input').addEventListener('click', checkAllow);

document.querySelector('form').addEventListener('submit', checkSignup);

