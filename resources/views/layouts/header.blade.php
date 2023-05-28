<head>
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="src/css/header.css">

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen'></i>
            <div class="flex justify-center items-center">
                <img class="h-16 mx-2 logo" src="src/img/logo_white.png">
                <span class="logo navLogo">
                    <a href="{{url('/')}}">Sudhaar</a>
                </span>
            </div>

            <div class="menu">
                <div class="logo-toggle inline-flex">
                    <span class="logo"><a href="/">Sudhaar</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/')}}">About</a></li>
                    <li><a href="{{url('/')}}">Contact</a></li>
                    @if(Session::has('username'))
                    <li><a href="{{url('/logout')}}">Logout</a></li>
                    @else
                    <li><a data-modal-target="login-modal" data-modal-toggle="login-modal">Login</a></li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>
    <!-- Register -->
    @include('/layouts/modals/register')
    
    <!-- Login -->
    @include('/layouts/modals/login')
    <!-- Crendentials Modal -->
    <div id="user-pass-modal" data-modal-target="user-pass-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    </div>
    <!-- Error Modal -->
    <div id="error_modal" data-modal-target="error_modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
