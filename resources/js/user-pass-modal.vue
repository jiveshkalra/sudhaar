<template>
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg model">
            <button
                type="button"
                class="absolute top-3 right-2.5 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                data-modal-hide="user-pass-modal"
            >
                <svg
                    aria-hidden="true"
                    class="w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3
                    class="mb-4 text-xl font-medium"
                    v-if="hasUsernameAndPassword"
                >
                    Your Username And Password is
                </h3>
                <h3 class="mb-4 text-xl font-medium text-red-600" v-else>
                    ERROR!
                </h3>
                <div class="p-6 space-y-6">
                    <p
                        class="text-base leading-relaxed"
                        v-if="hasUsernameAndPassword">
                        <strong>Username</strong>: {{ username }}
                    </p>
                    <p
                        class="text-base leading-relaxed"
                        v-if="hasUsernameAndPassword">
                        <strong>Password</strong>: {{ password }}
                    </p>
                    <p
                        class="text-sm leading-relaxed text-red-600"
                        v-if="hasUsernameAndPassword">
                        <strong
                            >These credentials have to be stored
                            somewhere</strong>
                        and a copy has been sent to your email address for your
                        records.
                    </p>
                    <p class="text-sm leading-relaxed text-red-600" v-else>
                        <strong>User not found, Please Register first!</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            hasUsernameAndPassword: false,
            username: "",
            password: "",
        };
    },
    created() {
        // Make an API request to fetch session data
        axios
            .get("/session")
            .then((response) => {
                const sessionData = response.data;
                if (sessionData.username && sessionData.password) {
                    this.hasUsernameAndPassword = true;
                    this.username = sessionData.username;
                    this.password = sessionData.password;
                } else {
                    this.hasUsernameAndPassword = false;
                }
            })
            .catch((error) => {
                console.error("Error fetching session data:", error);
            });
        axios.get("/api/session").then((response) => {
            console.log(response);
        });
    },
};
</script>
