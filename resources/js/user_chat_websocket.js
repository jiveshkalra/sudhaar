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

axios.get("/check_login_status")
    .then((response) => {
        const sessionData = response.data;
        if (sessionData.isLoggedIn==true) {
        console.log(sessionData)
        const channel_id = "chat."+sessionData.id
            const channel = Echo.private(channel_id);
            console.log(channel)
            channel.subscribe(() => {
                setTimeout(() => {
                    console.log("SUBSCRIBED");
                    console.log("SUBSCRIBED");
                }, 3000); // Adjust the timeout duration as needed
            });
            console.log("Running");
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
