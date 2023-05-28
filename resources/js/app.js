import './bootstrap';
import 'flowbite';
import { createApp } from 'vue';
import user_modal from "./user-pass-modal.vue";
import error_modal from "./error-modal.vue";

createApp(user_modal).mount("#user-pass-modal");

createApp(error_modal).mount("#error_modal");