<template>
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg model">
            <button type="button"
                class="absolute top-3 right-2.5 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                data-modal-hide="user-pass-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium" v-if="registered">
                    Your Username And Password is
                </h3>
                <h3 class="mb-4 text-xl font-medium text-red-600" v-else>
                    ERROR!
                </h3>
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed data_box" v-if="registered">
                        <strong>Username : </strong> {{ username }}
                    </p>
                    <p class="text-base leading-relaxed data_box" v-if="registered">
                        <strong>Auth Key : </strong> {{ auth_key }}
                    </p>
                    <p class="text-lg leading-relaxed text-red-600" v-if="registered">
                        <strong>These credentials have to be stored somewhere</strong> 
                    </p>
                    <p class="text-sm leading-relaxed text-red-600" v-else>
                        <strong>User not found, Please Register first!</strong>
                    </p>
                    <button class="generate_btn w-full" v-if="registered"> <a href="./download_auth" >
                        Download Auth Key
                    </a>
                </button>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { Modal } from 'flowbite';
const modal_element = document.querySelector('#user-pass-modal');
export default {
    data() {
        return {
            registered: false,
            username: "",
            auth_key: "",
            showModal: false
        };
    },
    methods: {
    },
    created() {
        // Make an API request to fetch session data
        axios.get("/session")
            .then((response) => {
                const responseData = response.data;
                if (responseData.username && responseData.auth_key && responseData.fromRegister == '1') {
                    this.registered = true;
                    this.username = responseData.username;
                    this.auth_key = responseData.auth_key;

                    const modal = new Modal(modal_element);

                    modal.show();
                } else {
                    this.registered = false;
                }
            })
            .catch((error) => {
                console.error("Error fetching session data:", error);
            });
    }
};
</script>

<style scoped>
.generate_btn {
  background: #772522;
  color: #fff;
  font-weight: 500;
  cursor: pointer;
  transition: background 0.23s;
  border-radius: 20px;
  padding: 2.5vh;
  font-size: 15;
}

.data_box {
  background-color: #e7e7e7;
  text-align: center;
  padding: 1.5vh;
  border-radius: 15px;
  display: flex;
  flex-direction: row;
}
</style>