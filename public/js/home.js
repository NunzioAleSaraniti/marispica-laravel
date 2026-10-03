function getToken () {

    const meta_element = document.querySelector('meta[name="csrf-token"]');
    const csrf_token = meta_element.content;

    const form_data = new FormData();
    form_data.append('_token', csrf_token);

    return form_data;
}

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

function checkEmptyField(event) {

    const field = event.currentTarget;
    let result = false;

    if (field.value.length > 0) {
        removeRedField(field.parentNode.classList[0]);
        result = true;
        console.log('Rimuovo campo rosso');

    } else {
        addRedField(field.parentNode.classList[0]);
        result = false;
        console.log('Aggiungo campo rosso');
    }

    return result;
}

function hideHeaders() {
    document.querySelector('header').classList.toggle(hidden);
    document.querySelector('#big_header').classList.toggle(hidden);
}

function onCloseButton() {

    album.classList.remove(show);
    infoModal.classList.remove(show);
    hideHeaders();

}

function onInfoButton () {
    infoModal.classList.add(show);
    hideHeaders();
}

function onAlbumOpen() {
    album.classList.toggle(show);
    document.body.classList.toggle(noScroll);
    hideHeaders();
}

function fetchGetMeteo() {  
        
    console.log('Eseguo ricerca');
    const rest_url = "/api/weather";    console.log('URL: ' + rest_url);
    fetch(rest_url).then(onResponse).then(onMeteoJson);

}

function changeImage(event) {
    
    const clickedMiniature = event.target.getAttribute('src');
    frontImage.src = clickedMiniature;

}

function onHeartClick(event) {

    const colored = 'full_color';
    const roomEvent = event.currentTarget
    const roomIn = event.currentTarget.dataset.room;

    if (roomEvent.classList.contains(colored)) {
        roomEvent.classList.remove(colored);
        const noFav = 'noFav';
        fetchHandleLike(noFav);
        

    } else {
        
        for (let heart of hearts) {
        heart.classList.remove(colored);
        }

        roomEvent.classList.add(colored);
        fetchHandleLike(roomIn);
    }
}



function fetchHandleLike(roomIn) {

    const form_data = getToken();
    console.log('URL chiamata:', BASE_URL + 'like/fav/' + encodeURIComponent(roomIn));

    fetch(BASE_URL + 'like/fav/' + encodeURIComponent(roomIn), {
        method: 'POST',
        body: form_data})
        .then(onResponse)
        .then(onDataJson);

    fetchGetImageRoom(roomIn);
        
}

function fetchGetLike() {
    fetch(BASE_URL + 'like/room').then(onResponse).then(getLikeJson);
}

function getLikeJson(json) {

    let room;
    if (typeof json === "string") {
        room = json;
    } else if (typeof json === "object" && json !== null) {
        room = json.room;
    }


    if (room !== 'noFav') { 
   
        const roomType = document.querySelector('[data-room="' + room +'"]');
        roomType.classList.add('full_color');
        fetchGetImageRoom(room);

    } else {
        fetchGetImageRoom(room); 
    }

}

function fetchGetImageRoom(room) {

    if (room === 'noFav') {

        const defaultRoom= 'Cottage Deluxe';
        fetch(BASE_URL + 'like/image/' + encodeURIComponent(defaultRoom))
        .then(onResponse)
        .then(onChangeSrcJson);
        return;
    }
        fetch(BASE_URL + 'like/image/' + encodeURIComponent(room))
        .then(onResponse)
        .then(onChangeSrcJson);
}

function onChangeSrcJson(json) {

    const roomImg = document.querySelector('#img_4');
    const SRC = '/images/Rooms/';

    if (json) {
        roomImg.src = SRC + json.src;
    } else {
        console.log('json non trovato');
    }
    
}

function fetchHandleFeedback() {

    const DOM_title_feedback = findField('fb_title input');
    const DOM_body_feedback = findField('fb_message textarea');
    const form_data = getToken();

    if (!checkEmptyField({ currentTarget: DOM_title_feedback }) ||
        !checkEmptyField({ currentTarget: DOM_body_feedback })) {

        if (!checkEmptyField({ currentTarget: DOM_body_feedback }) ||
            !checkEmptyField({ currentTarget: DOM_title_feedback })) {
            return;
        }
    }

    const titleFeedback = DOM_title_feedback.value;
    const bodyFeedback = DOM_body_feedback.value;

    console.log('Questo è il titolo:' + titleFeedback);
    console.log('Questo è il messaggio:' + bodyFeedback);

    fetch(BASE_URL + 'feedback/send/' + encodeURIComponent(titleFeedback) + '/' + encodeURIComponent(bodyFeedback), {
        method: 'POST',
        body: form_data})
        .then(onResponse)
        .then(onDataJson);
    
    DOM_title_feedback.value = '';
    DOM_body_feedback.value = '';

    fetchLoadAllFeedback();
}

function fetchLoadAllFeedback() {

    fetch(BASE_URL + 'feedback/get/all')
        .then(onResponse)
        .then(appendAllFeedbackJson);
}

function appendAllFeedbackJson(jsonArray) {

    const fbSection = findField('central_builder_three_columns');
   
    fbSection.innerHTML = '';

    if (!jsonArray || jsonArray.length === 0) {

        console.log('nessuna recensione, json null');

        const disclamerBox = document.createElement('div');
        disclamerBox.classList.add('classic_wrap');
        
        const fbDisclamer = document.createElement('h3');
        fbDisclamer.textContent = 'Nessuna recensione presente, scrivi la prima!';
        
        disclamerBox.appendChild(fbDisclamer);
        fbSection.appendChild(disclamerBox);
        return;

    } 

    for (let json of jsonArray) {

        const fbBox = document.createElement('div');
        const fbTitle = document.createElement('h3');
        const fbUser = document.createElement('h4');
        const fbBody = document.createElement('p');

        fbBox.classList.add('classic_wrap');

        console.log('Json Feedback ricevuto');

        fbTitle.textContent = json.title;
        fbUser.textContent = json.username;
        fbBody.textContent = json.body;

        fbBox.appendChild(fbTitle);
        fbBox.appendChild(fbUser);
        fbBox.appendChild(fbBody);

        if (json.user_id == USER_JS) {
             const buttonDelete = document.createElement('div');
            const spanDelete = document.createElement('span');
    
            buttonDelete.classList.add('x_button','buttons');
            buttonDelete.setAttribute('data-id', json.id);
            spanDelete.textContent = 'x';

            buttonDelete.addEventListener('click', deleteFeedback);
            buttonDelete.appendChild(spanDelete);
            fbBox.appendChild(buttonDelete);
        }

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


function onResponse(response) {
    console.log('Risposta alla fetch ricevuta');
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

function onMeteoJson(json) {
    console.log('JSON RICEVUTO', json);
    const weatherInfo = document.querySelector('#weather_api');
    weatherInfo.innerHTML = '';
        
    const loc = json.location.name;
    const temp = json.current.temperature + ' °C';
    const desc = json.current.weather_descriptions[0];

    const textContainer = document.createElement('section');
    const container = document.createElement('div');
    const title = document.createElement('h2');
    const temperature = document.createElement('p');
    const description = document.createElement('p');
    const wImage = document.createElement('img');

    title.textContent = loc;
    temperature.textContent = temp;
    description.textContent = desc;

    if (desc === 'Sunny') {
        wImage.src = '/images/Album/image_1.jpg';
    }
     else {
        wImage.src = '/images/Immagini_Varie/Nuvole.jpg';
    }


    textContainer.appendChild(title);
    textContainer.appendChild(temperature);
    textContainer.appendChild(description);
   
    container.appendChild(textContainer);
    container.appendChild(wImage);

    weatherInfo.appendChild(container);

}

function onTicketJson(json) {
    
    console.log('JSON RICEVUTO', json);

    const eventsInfo = document.querySelector('#events_api');
    eventsInfo.innerHTML = '';

    if (!json._embedded || !json._embedded.events) {
        
        console.log('Non esistono eventi');
        eventsInfo.innerHTML = '<br/><p>Nessun Evento in programma </p>'

    } else {

        const events = json._embedded.events;
        
        for (let event of events) {

            const eventContainer = document.createElement('div');
            const eventTextContainer = document.createElement('div');
            eventTextContainer.classList.add('name_event');

            const nameEvent = document.createElement('h4');
            const imgEvent = document.createElement('img');
            
            const addButton = document.createElement('div');
            addButton.classList.add('x_button', 'buttons');
            addButton.setAttribute('data-img', event.images[0].url);
            addButton.setAttribute('data-name', event.name);

            const spanButton = document.createElement('span');
            spanButton.textContent = "+";
            addButton.appendChild(spanButton);
            
            
            nameEvent.textContent = event.name;
            imgEvent.src = event.images[0].url;
            
            eventTextContainer.appendChild(nameEvent);     
            eventContainer.appendChild(imgEvent);
            eventContainer.appendChild(eventTextContainer);
            eventContainer.appendChild(addButton);
            
            eventsInfo.appendChild(eventContainer);
            addButton.addEventListener('click', fetchSaveEventProfile);
        }
    }
}

function fetchSaveEventProfile(event) {
    const eventImg = event.currentTarget.dataset.img;
    const eventName = event.currentTarget.dataset.name;

    console.log("Invio img:", eventImg);
    console.log("Invio name:", eventName);

    const form_data = getToken();
    form_data.append('img', eventImg);
    form_data.append('name', eventName);

    fetch(BASE_URL + 'event/save', {
        method: 'POST',
        body: form_data
    })
    .then(onResponse)
    .then(onDataJson)
    .catch(err => console.error("Errore nella fetch:", err));


    const addButton = document.querySelector('#api_section .x_button');
    addButton.classList.add('added');

}

    
function searchEvents() {
    
    const authorField = findField('author input');
    const placeField = findField('place input');

    if (!checkEmptyField({ currentTarget: authorField }) ||
        !checkEmptyField({ currentTarget: placeField })) {

        if (!checkEmptyField({ currentTarget: placeField }) ||
            !checkEmptyField({ currentTarget: authorField })) {
            return;
        }
    }

    const eventPlace = document.querySelector('#event_place');
    const eventPlaceValue = encodeURIComponent(eventPlace.value);
    const author = document.querySelector('#author');
    const authorValue = encodeURIComponent(author.value);

    fetch('/api/events?city=' + encodeURIComponent(eventPlaceValue) + '&keyword=' + encodeURIComponent(authorValue))
    .then(onResponse)
    .then(onTicketJson);
    
}

const hidden = 'hidden';
const noScroll = 'no_scroll';

const closeButtons = document.querySelectorAll('.close_button');
closeButtons.forEach(button => {
    button.addEventListener('click', onCloseButton);
});

const errorLabel = 'error_label_js';
const visible = 'visible';

const albumOpenButton = document.querySelector('#album_button');
const album = document.querySelector('#img_album');

albumOpenButton.addEventListener('click', onAlbumOpen);

const miniatures = document.querySelectorAll('.miniature_photo');
const frontImage = document.querySelector('#front_image'); 

for (let i = 0; i < miniatures.length; i++) {
    miniatures[i].addEventListener('click', changeImage);
}

const hearts = document.querySelectorAll('.like');

for (let heart of hearts) {
    heart.addEventListener('click', onHeartClick);
}

const infoButton = document.querySelectorAll('.more_info');
const infoModal = document.querySelector('#modal_info');

for (let button of infoButton) {
   button.addEventListener('click', onInfoButton);
}

if (USER_JS) {

    const authorInput = findField('author input');
    authorInput.addEventListener('blur', checkEmptyField);

    const placeInput = findField('place input');
    placeInput.addEventListener('blur', checkEmptyField);

    const eventsButton = document.querySelector('#events_button');
    eventsButton.addEventListener('click', searchEvents);

    titleInput = findField('fb_title input');
    titleInput.addEventListener('blur', checkEmptyField);

    messageInput = findField('fb_message textarea');
    messageInput.addEventListener('blur', checkEmptyField);

    const fbButton = document.querySelector('#fb_button');
    fbButton.addEventListener('click', fetchHandleFeedback);

}

fetchGetMeteo();
fetchGetLike();
fetchLoadAllFeedback();