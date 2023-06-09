import 'flowbite';
import { createApp } from 'vue';
import user_modal from "./user-pass-modal.vue";
import error_modal from "./error-modal.vue";
import loggedin_modal from "./loggedin-modal.vue";
import register_modal from "./register-modal.vue";
import tologin_modal from "./tologin-modal.vue";

createApp(tologin_modal).mount("#tologin_modal");
createApp(user_modal).mount("#user-pass-modal");
createApp(register_modal).mount("#register-modal");
createApp(error_modal).mount("#error_modal");
createApp(loggedin_modal).mount("#loggedin_modal");

