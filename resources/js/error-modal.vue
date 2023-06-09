<template>
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg model">
            <button type="button"
                class="absolute top-3 right-2.5 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                data-modal-hide="error_modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-red-600">
                    ERROR!
                </h3>
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-red-700" v-if="error == 'server_err'">
                        <strong>Server Failed To Respond</strong><br><br> Please try again later in some time. <br><br>

                        <strong>ERROR CODE: SERVER DOWN</strong>
                    </p>
                    <p class="text-base leading-relaxed text-red-700" v-else-if="error == 'invalid_credentials'">
                        <strong>Invalid Credentials .</strong> <br><br> Invalid Auth Key.<br><br>
                        <strong>ERROR CODE: INVALID CREDENTIALS </strong>
                    </p>
                    <!-- <p class="text-sm leading-relaxed text-red-600" v-if="hasErro">
                        <strong>These credentials have to be stored somewhere</strong> and a copy has been sent to your
                        email address for your records.
                    </p> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Modal } from 'flowbite';
const modal_element = document.querySelector('#error_modal');
export default {
    data() {
        return {
            showErrorModal: false,
            error: ""
        }
    },
    mounted() {
        this.showErrorModal = window.showErrorModal;
        this.error = window.error;
        if (this.showErrorModal == true) {
            const modal = new Modal(modal_element);
            modal.show();
        }
    }
}
</script>
