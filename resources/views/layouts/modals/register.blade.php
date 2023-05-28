<div id="registeration-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg  model">
            <button type="button"
                class="absolute top-3 right-2.5 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                data-modal-hide="registeration-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium">Register</h3>
                <form class="space-y-6" action="{{ url('/') }}/register" method="post">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium">Your email</label>
                        <input type="email" name="email" id="email"
                            class="border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                            placeholder="name@company.com" required>
                        @error('email')
                            <span class='text-red-700'>
                                {{ $message }}
                            </span>
                        @enderror
                        <p class="text-red-600 text-xs italic pt-2"><strong>*Your data(email) will not be stored on
                                our server</strong>. Instead, we will send you an email containing your anonymous
                            user ID and password for maintaining anonymity.</p>
                    </div>
                    <button type="submit"
                        class="w-full font-medium rounded-lg text-sm px-5 py-2.5 text-center register-btn"
                        style="background-color:#20798d;">Get My Anonymous Account</button>
                </form>
            </div>
        </div>
    </div>
</div>