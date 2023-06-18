<template>
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg model">
            <button type="button"
                class="absolute top-3 right-2.5 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                data-modal-hide="tologin_modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-2xl font-medium text-red-500">
                    PLEASE LOGIN!
                </h3>
                <div class="p-6 space-y-6">
                    <p class="text-xl leading-relaxed text-red-700">
                        You need to login before you can talk to any counselor anonymously <br>
                    </p>
                </div>
                <div class="login_register_btns">
                    <button class="text-white focus:outline-none focus:ring-4 font-medium rounded-full text-lg px-5 py-2.5 text-center w-full mr-2 mb-2 auth_btns" style="background-color:#20798d;" data-modal-target="login-modal" data-modal-toggle="login-modal" data-modal-hide="tologin_modal">Login</button>
                    <button class="text-white focus:outline-none focus:ring-4 font-medium rounded-full text-lg px-5 py-2.5 text-center w-full mr-2 mb-2 auth_btns" style="background-color:#20798d;" data-modal-target="register-modal" data-modal-toggle="register-modal" data-modal-hide="tologin_modal">Register</button>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.login_register_btns{
    display: flex;
    justify-content: space-evenly;
}
</style>
<script>
import { Modal } from 'flowbite';
const modal_element = document.querySelector('#tologin_modal');
export default {
    data() {
        return {
            showToLogInModal: false,
        }
    },
    mounted() {
        this.showToLogInModal = window.showToLogInModal;
        if (this.showToLogInModal == true) {
            const modal = new Modal(modal_element);
            modal.show();
        }
    }
}
</script>
