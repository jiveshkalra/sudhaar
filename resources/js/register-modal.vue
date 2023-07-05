<template>
  <div class="relative w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative rounded-lg model">
      <button type="button"
        class="absolute top-3 right-2.5 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
        data-modal-hide="register-modal">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
      <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-4 text-xl font-medium">
          Your Anonymous Credentials
        </h3>
        <!-- <h3 class="mb-4 text-xl font-medium text-red-600"> -->

        <div class="p-6 space-y-6 flex justify-center align-items-center flex-col">
          <p class="text-base leading-relaxed username_input" v-if="username && auth_key">
            <strong>Username: </strong> <input v-model="username" class="username_input" required>
          </p>
          <p class="text-base leading-relaxed auth_key_box" v-if="username && auth_key">
            <strong>Auth Key: </strong> {{ auth_key }}
          </p>
          <h1 class="text-lg leading-relaxed text-red-600" v-if="username && auth_key">
            <strong>SAVE THIS AUTHENTICATION KEY WITH YOU.</strong>This key will be needed to you for the next time you
            login.
          </h1>
          <!-- <button class="generate_btn" v-on:click="register_user()" v-if="username && auth_key">
                Register Anonymous ID
              </button> -->
          <button class="generate_btn" v-on:click="register_user()" v-if="username && auth_key">
            Register Anonymous ID
          </button>

          <!-- <p class="text-sm leading-relaxed text-red-600" v-else> -->
          <!-- <strong>User not found, Please Register first!</strong> -->
          <!-- </p> -->
          <button class="generate_btn" v-on:click="generate_user_creds()" v-else>
            Generate Anonymous ID
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import Cookies from 'js-cookie';
const generateUsername = require("trendy-username");

export default {
  data() {
    return {
      username: null,
      auth_key: null,
      res_status: null,
      error: null,
      // ipAddress: null
    };
  },
  methods: {
    createCookie(cookie_name,cookie_value,expire_time) {
      Cookies.set(cookie_name, cookie_value, { expires: expire_time });
    },
    generate_user_creds() {
      let result = '';
      const length = 20; // Desired length of the auth_key
      const charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~`|}{[]\:;?><,./-='; // Characters to include in the auth_key
      
      for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        result += charset[randomIndex];
      }
      
      this.auth_key = result;
      this.username = generateUsername(1,'male')[0].toString()

    },
    register_user() {
      axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      axios.post('/register_user', {
        username: this.username,
        auth_key: this.auth_key
      })
        .then(response => {
          console.log(response)
          if (response.data.status == "success") {
            this.res_status ='success';
            const userData = JSON.stringify({"username": this.username,"auth_key" : this.auth_key,"token": "response.data.token"});
            this.createCookie('user_credentials', userData ,2);
            this.createCookie('registered', true,2);
            this.createCookie('from_register', '1', 0.10);
            // this.createCookie('token', response.data.token,600);
            window.location.href = "./";
          }
          else if (response.data.status == "error") {
            // this.res_status ='error';
            this.error = response.data.error;
            console.error(this.error);
            // window.location.href = "./auth_error?error=" + JSON.stringify(this.error);
          }
        })
        .catch(error => {
          console.error(error);
          // Handle the error as needed
        });
    }
  },
};
</script>

<style scoped>
.generate_btn {
  background: #226877;
  color: #fff;
  font-weight: 500;
  cursor: pointer;
  transition: background 0.23s;
  border-radius: 20px;
  padding: 2.5vh;
  font-size: 15;
}

.username_input {
  background-color: #e7e7e7;
  text-align: center;
  padding: 1.5vh;
  border-radius: 15px;
  display: flex;
  flex-direction: row;
  align-items: center;
}

.auth_key_box {
  background-color: #e7e7e7;
  text-align: center;
  padding: 1.5vh;
  border-radius: 15px;
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}
</style>