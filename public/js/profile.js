
function getToken () {
    
    const meta_element = document.querySelector('meta[name="csrf-token"]');
    const csrf_token = meta_element.content;
    
    const form_data = new FormData();
    form_data.append('_token', csrf_token);
    
    return form_data;
}

function checkName() {
    const input = document.querySelector('.name input');

    let result = false;

    if (input.value.length > 0) {
        input.parentNode.classList.remove('error_label_js');
        result = true;

    } else {
        input.parentNode.classList.add('error_label_js');
       result = false;
    }

    return result;
}

function checkSurname() {
    const input = document.querySelector('.surname input');

    let result = false;
    
    if (input.value.length > 0) {
        input.parentNode.classList.remove('error_label_js');
        result = true;

    } else {
        input.parentNode.classList.add('error_label_js');
       result = false;
    }

    return result;
}


function checkSaveMod(event) {

    if(!checkName()) {
        event.preventDefault();
    }
    if(!checkSurname()) {
        event.preventDefault();
    }

}

function onResponse(response) {
    if (!response.ok) {
        return noResults();
    };
    return response.json();
}

function onDataJson(json) {

    if(!json) {
        console.log('Nulla restituito');
    } else {
        console.log("id: " + json.user_id + " " + 
                    "body: " + json);
    }

}

function fetchDataUser() {
    console.log('fetchDataUser chiamata');
    fetch(BASE_URL + "info").then(onResponse).then(getDataUserJson);
}

function getDataUserJson(json) {
    
    console.log('JSON RICEVUTO', json);
    const userInfo = document.querySelector('#results');
    userInfo.innerHTML = '';

    const name = document.createElement('h5');
    const surname = document.createElement('h5');
    const email = document.createElement('h5');
    const username = document.createElement('h5');
    
    name.textContent = "Nome: " + json.name;
    surname.textContent = "Cognome: " + json.surname;
    email.textContent = "Email: " + json.email;
    username.textContent = "Username: " + json.username;
    
    
    userInfo.appendChild(name);
    userInfo.appendChild(surname);
    userInfo.appendChild(email);
    userInfo.appendChild(username);

}

function modDataUser() {

    document.querySelector('#modify_data').classList.toggle('show');
    document.querySelector('#name_input').addEventListener('blur', checkName);
    document.querySelector('#surname_input').addEventListener('blur', checkSurname);

}

function deleteUser() {

    const form_data = getToken();

    fetch(BASE_URL + 'user/delete', {
        method: 'POST',
        body: form_data})
    .then(onResponse)
    .then(onDataJson);

}

function fetchRoom() {
    console.log('fetchRoom chiamata');
    fetch(BASE_URL + "like/room").then(onResponse).then(getLikeJson);
}

function getLikeJson(json) {
    
    console.log('JSON RICEVUTO', json.room);
    const likeInfo = document.querySelector('#fav_room');
    likeInfo.innerHTML = '';

    let room;
    if (typeof json === "string") {
        room = json;
    } else if (typeof json === "object" && json !== null) {
        room = json.room;
    }

    if (room !== 'noFav') {

        console.log("Stanza preferita: " + room);
        
        fetchGetImageRoom(room); 

        const roomTitle = document.createElement('h3');
        roomTitle.textContent = room;
        likeInfo.appendChild(roomTitle);

    } else {

        const noFavorite = document.createElement('h3');
        noFavorite.textContent = "Nessuna camera preferita, sceglila adesso!";
        noFavorite.classList.add('no_fav_selected');
        document.querySelector('#fav_room_box').classList.add('left');
        likeInfo.appendChild(noFavorite);
        fetchGetImageRoom(room); 
    }
}

function fetchGetImageRoom(room) {

    if (room === 'noFav') {

        const defaultRoom = 'Draw';
        fetch(BASE_URL + 'like/image/' + encodeURIComponent(defaultRoom))
        .then(onResponse)
        .then(getImageJson);
        return;
    }

    fetch(BASE_URL + 'like/image/' + encodeURIComponent(room))
    .then(onResponse)
    .then(getImageJson);
}

function getImageJson(json) {

    if (json) {
        
        console.log('Source trovata: ' + json.src);
        
        const roomImg = document.createElement('img');
        const SRC = '/images/Rooms/';
        roomImg.src = SRC + json.src;
        document.querySelector('#fav_room_img').appendChild(roomImg);

    } else {
        console.log('json non trovato');
        return;
    }
}

function fetchLoadAllBookings() {

    fetch(BASE_URL + 'booking/get/all')
        .then(onResponse)
        .then(appendAllBookingsJson);
}

function appendAllBookingsJson(jsonArray) {
    
    console.log('JSON RICEVUTO', jsonArray);
    const bookingSection = document.querySelector('#bookings');
    bookingSection.innerHTML = '';

    if (!jsonArray || jsonArray.length === 0) {

        console.log('nessuna prenotazione, json null');

        const disclamerBox = document.createElement('div');
        disclamerBox.classList.add('classic_wrap');
        
        const bookingDisclamer = document.createElement('h3');
        bookingDisclamer.textContent = 'Nessuna prenotazione effettuata, effettuala ora!';
        
        disclamerBox.appendChild(bookingDisclamer);
        bookingSection.appendChild(disclamerBox);
        return;

    }

    for (let json of jsonArray) {

        const box = document.createElement('div');
        const idB = document.createElement('h5');
        const name = document.createElement('h5');
        const surname = document.createElement('h5');
        const telephone = document.createElement('h5');
        const email = document.createElement('h5');
        const members = document.createElement('h5');
        const animals = document.createElement('h5');
        const room = document.createElement('h5');
        const check_in = document.createElement('h5');
        const check_out = document.createElement('h5');
        const message = document.createElement('h5');
        box.classList.add('classic_wrap');

        idB.textContent = "Id Prenotazione: " + json.id ;
        name.textContent = "Nome: " + json.name;
        surname.textContent = "Cognome: " + json.surname;
        telephone.textContent = "Telefono: " + json.telephone;
        email.textContent = "Email: " + json.email;
        members.textContent = "Partecipanti: " + json.members;
        animals.textContent = "Animale Domestico: " + json.animals;
        room.textContent = "Stanza: " + json.room;
        check_in.textContent = "Inizio Soggiorno: " + json.check_in;
        check_out.textContent = "Fine Soggiorno: " + json.check_out;
        message.textContent = "Messaggio: " + json.message;

        box.appendChild(idB)
        box.appendChild(name);
        box.appendChild(surname);
        box.appendChild(telephone);
        box.appendChild(email);
        box.appendChild(members);
        box.appendChild(animals);
        box.appendChild(room);
        box.appendChild(check_in);
        box.appendChild(check_out);
        box.appendChild(message);

        const buttonDelete = document.createElement('div');
        const spanDelete = document.createElement('span');
        buttonDelete.classList.add('x_button','buttons');

        buttonDelete.setAttribute('data-id', json.id);
        spanDelete.textContent = 'x';

        buttonDelete.addEventListener('click', deleteBooking);
        
        buttonDelete.appendChild(spanDelete);
        box.appendChild(buttonDelete);
        
        bookingSection.appendChild(box);
        
    }
}

function deleteBooking(event) {
    const form_data = getToken();
    const bookingId = event.currentTarget.dataset.id;

    fetch(BASE_URL + 'booking/delete/' + bookingId, {
        method: 'POST',
        body: form_data})
    .then(onResponse)
    .then(onDataJson);

    fetchLoadAllBookings();
}

function fetchLoadAllEvents() {

    fetch(BASE_URL + 'event/get/all')
        .then(onResponse)
        .then(appendAllEventsJson);
}

function appendAllEventsJson(jsonArray) {
    
    console.log('JSON RICEVUTO', jsonArray);
    const bookingSection = document.querySelector('#events');
    bookingSection.innerHTML = '';

    if (!jsonArray || jsonArray.length === 0) {

        console.log('nessuna prenotazione, json null');

        const disclamerBox = document.createElement('div');
        disclamerBox.classList.add('classic_wrap');
        
        const bookingDisclamer = document.createElement('h3');
        bookingDisclamer.textContent = 'Nessun evento aggiunto, aggiungilo ora!';
        
        disclamerBox.appendChild(bookingDisclamer);
        bookingSection.appendChild(disclamerBox);
        return;

    }

    for (let json of jsonArray) {

        const box = document.createElement('div');
        box.classList.add('classic_wrap');

        const imgEvent = document.createElement('img');
        imgEvent.src = json.image_src;

        const nameEvent = document.createElement('h5');
        nameEvent.textContent = json.name;

        box.appendChild(imgEvent);
        box.appendChild(nameEvent);

        const buttonDelete = document.createElement('div');
        const spanDelete = document.createElement('span');
        buttonDelete.classList.add('x_button','buttons');

        buttonDelete.setAttribute('data-id', json.id);
        spanDelete.textContent = 'x';

        buttonDelete.addEventListener('click', deleteEvent);
        
        buttonDelete.appendChild(spanDelete);
        box.appendChild(buttonDelete);
        
        bookingSection.appendChild(box);
        
    }
}

function deleteEvent(event) {
    const form_data = getToken();
    const eventId = event.currentTarget.dataset.id;

    fetch(BASE_URL + 'event/delete/' + eventId, {
        method: 'POST',
        body: form_data})
    .then(onResponse)
    .then(onDataJson);

    fetchLoadAllEvents();
}

function noResults() {

    const container = document.getElementById('results');
    container.innerHTML = '';
    const noRes = document.createElement('h3');
    noRes.textContent = "Nessun risultato.";
    container.appendChild(noRes);

}

function fetchLoadAllFeedback() {

    fetch(BASE_URL + 'feedback/get/user')
        .then(onResponse)
        .then(appendAllFeedbackJson);
}

function appendAllFeedbackJson(jsonArray) {

    const fbSection = document.querySelector('#fb_list');
   
    fbSection.innerHTML = '';

    if (!jsonArray || jsonArray.length === 0) {

        console.log('nessuna recensione;');

        const disclamerBox = document.createElement('a');
        disclamerBox.classList.add('classic_wrap');
        
        const fbDisclamer = document.createElement('h3');
        fbDisclamer.textContent = 'Nessuna recensione presente, scrivi la prima!';
        disclamerBox.href = "home#input_feedback";
        
        disclamerBox.appendChild(fbDisclamer);
        fbSection.appendChild(disclamerBox);
        return;

    } 

    for (let json of jsonArray) {

        const fbBox = document.createElement('div');
        const fbTitle = document.createElement('h3');
        const fbUser = document.createElement('h4');
        const fbBody = document.createElement('p');
        const fbDelete = document.createElement('strong');

        fbBox.classList.add('classic_wrap');
        fbDelete.classList.add('delete');

        console.log('Json Feedback ricevuto');

        fbTitle.textContent = json.title;
        fbUser.textContent = json.username;
        fbBody.textContent = json.body;
        fbDelete.textContent = 'x';

        fbBox.appendChild(fbTitle);
        fbBox.appendChild(fbUser);
        fbBox.appendChild(fbBody);

        const buttonDelete = document.createElement('div');
        const spanDelete = document.createElement('span');
    
        buttonDelete.classList.add('x_button','buttons');
        buttonDelete.setAttribute('data-id', json.id);
        spanDelete.textContent = 'x';

        buttonDelete.addEventListener('click', deleteFeedback);
        
        buttonDelete.appendChild(spanDelete);
        fbBox.appendChild(buttonDelete);

        fbSection.appendChild(fbBox);
    }
}

function deleteFeedback(event) {
    const form_data = getToken();
    const feedbackId = event.currentTarget.dataset.id;

    fetch(BASE_URL + 'feedback/delete/' + feedbackId, {
        method: 'POST',
        body: form_data})
    .then(onResponse)
    .then(onDataJson);

    fetchLoadAllFeedback();
}

fetchRoom();
fetchLoadAllBookings();
fetchLoadAllFeedback();
fetchLoadAllEvents();
fetchDataUser();

document.querySelector('form').addEventListener('submit', checkSaveMod);
document.querySelector('.mod_user_button').addEventListener('click', modDataUser);
document.querySelector('.delete_user').addEventListener('click', deleteUser);