<head>
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="src/css/header.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .dark-light {
            color: #fff;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen'></i>
            <div class="flex justify-center items-center">
                <img class="h-10 mx-2 logo"
                    src="https://cdn.discordapp.com/attachments/1039243066571227136/1039541584183705610/daily_quest_wlogo.png">
                <!-- <img class="h-10 dark_logo" src="https://cdn.discordapp.com/attachments/972503652310843552/1005902444624105502/logo_dark.png"> -->
                <!-- <img class="h-10 light_logo" src="https://cdn.discordapp.com/attachments/972503652310843552/1005902445282603028/logo.png"> -->
                <span class="logo navLogo">
                    <a href="#">
                        Daily Quester
                    </a>
                </span>
            </div>

            <div class="menu">
                <div class="logo-toggle inline-flex">
                    <span class="logo"><a href="#">Daily Quester</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                    <li><a href="./index">Home</a></li>
                    <!-- <li><a href="./download">Download</a></li> -->
                    <li><a href="./about">About</a></li>
                    <li><a href="./contact">Contact</a></li>
                    <!-- <li><a href="./login">Login</a></li> -->
                </ul>
            </div>

            <div class="darkLight-searchBox">
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>
            </div>
        </div>
    </nav>
    <script>
        const body = document.querySelector("body"),
            nav = document.querySelector("nav"),
            footer = document.querySelector("footer"),
            modeToggle = document.querySelector(".dark-light"),
            searchToggle = document.querySelector(".searchToggle"),
            sidebarOpen = document.querySelector(".sidebarOpen"),
            siderbarClose = document.querySelector(".siderbarClose");

        let getMode = localStorage.getItem("mode");
        if (getMode == null) {
            getMode = "dark-mode"
        }
        if (getMode && getMode === "dark-mode") {
            body.classList.add("dark");
        }

        // js code to toggle dark and light mode
        modeToggle.addEventListener("click", () => {
            modeToggle.classList.toggle("active");
            body.classList.toggle("dark");


            // js code to keep user selected mode even page refresh or file reopen
            if (!body.classList.contains("dark")) {
                localStorage.setItem("mode", "light-mode");
            } else {
                localStorage.setItem("mode", "dark-mode");
            }
        });


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
