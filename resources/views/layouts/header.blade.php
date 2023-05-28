<head>
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="src/css/header.css">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .model {
            color: #000;
            background-color: #eee;
        }

        .register-btn {
            color: #fff;
            background-color: #144d5a;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen'></i>
            <div class="flex justify-center items-center">
                <img class="h-16 mx-2 logo" src="src/img/logo_white.png">
                <span class="logo navLogo">
                    <a href="/">Sudhaar</a>
                </span>
            </div>

            <div class="menu">
                <div class="logo-toggle inline-flex">
                    <span class="logo"><a href="/">Sudhaar</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                    <li><a href="./">Home</a></li>
                    <li><a href="./about">About</a></li>
                    <li><a href="./contact">Contact</a></li>
                    {{-- <li><a data-modal-target="registeration-modal" data-modal-toggle="registeration-modal">Register</a></li> --}}
                    <li><a data-modal-target="login-modal" data-modal-toggle="login-modal">Login</a></li>
                    <li><a data-modal-target="user-pass-modal" data-modal-toggle="user-pass-modal">User-pass</a></li>
                </ul>
            </div>

        </div>
    </nav>
    @php
        $from_register = request()->cookie('from_register');
    @endphp
    @if (Session::has('username') && Session::has('password') && $from_register == '1')
        <script>
            // Show the popup using JavaScript or any library of your choice
            // Pass the username and password to the popup and display them
            var username = "{{ Session::get('username') }}";
            var password = "{{ Session::get('password') }}";
            
            console.log(username);
            console.log(password);
            const user_pass_modal = document.getElementById('user_pass_modal');
            const modal = new Modal(user_pass_modal);
            modal.show()
        </script>
    @endif
    <!-- Register -->
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
    <!-- Login -->
    <div id="login-modal" tabindex="-1" aria-hidden="true"
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
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox" value=""
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                                        required>
                                </div>
                                <label for="remember" class="ml-2 text-sm font-medium text-gray-900 ">Remember
                                    me</label>
                            </div>
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
    <!-- Show uername nd pass -->
    <div id="user-pass-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    </div>

    <script>
        const body = document.querySelector("body"),
            nav = document.querySelector("nav"),
            footer = document.querySelector("footer"),
            modeToggle = document.querySelector(".dark-light"),
            searchToggle = document.querySelector(".searchToggle"),
            sidebarOpen = document.querySelector(".sidebarOpen"),
            siderbarClose = document.querySelector(".siderbarClose");

        //   js code to toggle sidebar
        sidebarOpen.addEventListener("click", () => {
            nav.classList.add("active");
        });

        body.addEventListener("click", e => {
            let clickedElm = e.target;

            if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")) {
                nav.classList.remove("active");
            }
        });
        
    </script>

</body>
