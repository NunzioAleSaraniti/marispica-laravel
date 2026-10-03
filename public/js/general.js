function onThreeDivMenu() {
    mobileMenu.classList.toggle('mobile_hidden');
}

function onChatButton() {
    chatModal.classList.toggle(show);
}

function onSendMessage() {

    let msgToSend = chatInput.value;
    const msgSection = document.createElement('div');
    msgSection.classList.add('msg_section', 'right_msg');

    const chatMsg = document.createElement('div');
    chatMsg.classList.add('chat_msg');

    const msgValue = document.createElement('p');
    msgValue.textContent = msgToSend;

    const chatIcon = document.createElement('div');
    chatIcon.classList.add('chat_icon', 'circle_div', 'user_msg_icon');

    console.log('valore chat: ' + msgToSend);

    chatMsg.appendChild(msgValue);
    msgSection.appendChild(chatMsg);
    msgSection.appendChild(chatIcon);
    chatBody.appendChild(msgSection);

    fetchSendMessage(msgToSend);
    
    chatInput.value = '';

}

function fetchSendMessage(inputChatMsg) {
	
	const rest_url = "/api/chat";
    const task = 'Ti chiami Gelsomino, sei un assistente per un villaggio turistico, in particolare il villaggio Marispica che si trova a Santa Maria del Focallo, in Sicilia. Devi dare informazioni solamente sul villaggio, sulla città di Ispica, sulla provincia di Ragusa e Siracusa, sulle attività (noleggio mezzi, escursioni ecc.) sul luogo e sui dintorni. Se ti viene chiesta qualche cosa fuori dalle specifiche rispondi dicendo che non è quello il tuo scopo. Ricordati di rispondere nella stessa lingua in cui ti viene fatta la richiesta.';

    fetch(rest_url, {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
    },
    body: JSON.stringify({
        model: "gpt-3.5-turbo",
        messages: [
        { role: "system", content: task },
        { role: "user", content: inputChatMsg }
        ]
    })
    }).then(onResponse).then(onChatGPTData);

}

function onChatGPTData(json) {
    
    if (!json || !json.choices || !json.choices[0] || !json.choices[0].message || !json.choices[0].message.content) {

        console.log('Chat non ha risposto perché fallita richiesta');
        return;

    } else {
        
        console.log('risposta al messaggio: ' + json.choices[0].message.content);

        const msgSection = document.createElement('div');
        msgSection.classList.add('msg_section');

        const chatMsg = document.createElement('div');
        chatMsg.classList.add('chat_msg');

        const msgValue = document.createElement('p');
        msgValue.textContent = json.choices[0].message.content;

        const chatIcon = document.createElement('div');
        chatIcon.classList.add('chat_icon', 'circle_div');

        chatMsg.appendChild(msgValue);
        msgSection.appendChild(chatIcon);
        msgSection.appendChild(chatMsg);
        chatBody.appendChild(msgSection);

    }
}

const chatButton = document.querySelector('#chat_button');


    
    chatButton.addEventListener('click', onChatButton);
    const closeChat = document.querySelector('#close_chat')
    closeChat.addEventListener('click', onChatButton);

    const chatInput = document.querySelector('#chat_value_input');
    const sendButton = document.querySelector('#send_msg');
    sendButton.addEventListener('click', onSendMessage);
    
    const chatModal = document.querySelector('#chat_modal');
    const chatBody = document.querySelector('#chat_body');

const show = 'show';
