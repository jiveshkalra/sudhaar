import './bootstrap';
import 'flowbite';
import { createApp } from 'vue';
import { Modal } from 'flowbite';
import user_modal from "./user-pass-modal.vue";

createApp(user_modal).mount("#user-pass-modal");