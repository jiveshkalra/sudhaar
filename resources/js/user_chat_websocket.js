import './bootstrap';
const axios = require('axios');
const form = document.getElementById('chatbox');
const inputMessage = document.getElementById('msg-input');
form.addEventListener('submit',(event)=>{
    event.preventDefault();
    const userInput = inputMessage.value;
    axios.post('/send-message',{
        message:userInput
    });
})
const channel = Echo.channel('public.chat.1');

channel.subscribe(()=>{
    console.log('SUBSCRIBED')
})
channel.listen('SendMessage',(e)=>{
    console.log(e)
});

