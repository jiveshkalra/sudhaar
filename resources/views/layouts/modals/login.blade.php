<div id="login-modal" data-modal-target="login-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative rounded-lg model">
                <button type="button"
                    class="absolute top-3 right-2.5 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="login-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium">Login</h3>
                    <form class="space-y-6" action="{{ url('/') }}/login" method="post">
                        @csrf
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium">Your Username</label>
                            <input type="text" name="username" id="username"
                                class="border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                placeholder="Username" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium">Your Password</label>
                            <input type="password" name="password" id="password"
                                class="border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                placeholder="••••••••" required>
                        </div>
                        <div class="flex justify-between">
                            <a href="#" class="text-sm text-blue-700 hover:underline ">Lost Password?</a>
                        </div>
                        <button type="submit"
                            class="w-full font-medium rounded-lg text-sm px-5 py-2.5 text-center register-btn"
                            style="background-color:#20798d;">Login</button>
                        <div class="text-sm font-medium text-gray-700">
                            Not registered? <a data-modal-hide="login-modal" data-modal-target="registeration-modal"
                                data-modal-toggle="registeration-modal" class="text-blue-700 hover:underline">Create
                                account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>