<head>
    <!-- ===== CSS ===== -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.3.4/vue.global.min.js" integrity="sha512-Wbf9QOX8TxnLykSrNGmAc5mDntbpyXjOw9zgnKql3DgQ7Iyr5TCSPWpvpwDuo+jikYoSNMD9tRRH854VfPpL9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
</head>

<body>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen'></i>
            <div class="flex justify-center items-center">
                <img class="h-16 mx-2 logo" src="{{ asset('src/img/logo_white.png') }}">
                <span class="logo navLogo">
                    <a href="{{ url('/') }}">Sudhaar</a>
                </span>
            </div>

            <div class="menu">
                <div class="logo-toggle inline-flex">
                    <span class="logo"><a href="/">Sudhaar</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                    <li><a class="nav-links-a text-white" href="{{ url('/') }}">Home</a></li>
                    <li><a class="nav-links-a text-white" href="{{ url('/') }}">About</a></li>
                    <li><a class="nav-links-a text-white" href="{{ url('/') }}">Contact</a></li>
                    @if (auth()->check())
                    <li><a class="nav-links-a authentication_btn" href="{{ url('/logout') }}">Logout</a></li>
                    @else
                    <li><a class="nav-links-a authentication_btn" data-modal-target="login-modal" data-modal-toggle="login-modal">Login</a></li>
                    <li><a class="nav-links-a authentication_btn " data-modal-target="register-modal" data-modal-toggle="register-modal">Register</a></li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>
    <!-- Register -->
    <div id="register-modal" data-modal-target="register-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    </div>

    <!-- Login -->
    @include('/layouts/modals/login')
    <!-- Crendentials Modal -->
    <div id="user-pass-modal" data-modal-target="user-pass-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    </div>
    <!-- Error Modal -->
    <div id="error_modal" data-modal-target="error_modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    </div>
    <!-- After Login Modal -->
    <div id="loggedin_modal" data-modal-target="loggedin_modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    </div>
    <!-- To Login Modal -->
    <div id="tologin_modal" data-modal-target="tologin_modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    </div>
    @php
        $registered = request()->cookie('registered');
    @endphp

    @if (auth()->check() && is_null($registered))
        <script>
            // hide_img_box()
            window.showLoggedinModal = true;
        </script>
    @elseif ($registered)
        <script>
            // hide_img_box()
            window.showUserModal = true;
        </script>
    @else
        <script>
            window.showToLogInModal = true;
        </script>
    @endif

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
    <script src="{{ asset('js/app.js') }}"></script>

</body>