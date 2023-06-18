import "./bootstrap";
const axios = require("axios");
const form = document.getElementById("chatbox");
const inputMessage = document.getElementById("msg-input");
const listMessage = document.getElementById("msg_list");
form.addEventListener("submit", (event) => {
    event.preventDefault();
    const userInput = inputMessage.value;
    axios.post("/send-message", {
        message: userInput,
    });
});
axios
    .get("/check_login_status")
    .then((response) => {
        const sessionData = response.data;
        console.log(sessionData)
        if (sessionData.isLoggedIn==true) {
            const channel = Echo.channel("public.chat.1");
            channel.subscribe(() => {
                console.log("SUBSCRIBED");
            });
            channel.listen("SendMessage", (e) => {
                console.log(e);
                const message = e.message;
                const li = document.createElement("li");
                li.textContent = message;
                listMessage.append(li);
            });
        } else {
            // User is not logged in
            // Perform actions or render content for non-authenticated users
            console.log("NOT LOGGED IN")
        }
    })
    .catch((error) => {
        console.error("Error fetching session data:", error);
    });
