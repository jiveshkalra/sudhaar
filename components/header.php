<head>
    <!-- ===== CSS ===== -->
    <!-- <link rel="stylesheet" href="./src/css/header.css"> -->
    <style>
        /* ===== Google Font Import - Poppins ===== */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
  transition: all 0.4s ease;
}

/* ===== Colours ===== */
:root {
  --body-color: #bcccfb;
  --nav-color: #4070f4;
  --side-nav: #010718;
  --text-color: #fff;
}

body {
  height: 100vh;
  background-color: var(--body-color);
}

body.dark {
  --body-color: #18191a;
  --nav-color: #242526;
  --side-nav: #242526;
}

nav {
  position: fixed;
  top: 0;
  left: 0;
  height: 70px;
  width: 100%;
  background-color: var(--nav-color);
  z-index: 100;
}

body.dark nav {
  border: 1px solid #393838;
}

nav .nav-bar {
  position: relative;
  height: 100%;
  max-width: 1000px;
  width: 100%;
  background-color: var(--nav-color);
  margin: 0 auto;
  padding: 0 30px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

nav .nav-bar .sidebarOpen {
  color: var(--text-color);
  font-size: 25px;
  padding: 5px;
  cursor: pointer;
  display: none;
}

nav .nav-bar .logo a {
  font-size: 25px;
  font-weight: 500;
  color: var(--text-color);
  text-decoration: none;
}

.menu .logo-toggle {
  display: none;
}

.nav-bar .nav-links {
  display: flex;
  align-items: center;
}

.nav-bar .nav-links li {
  margin: 0 5px;
  list-style: none;
}

.nav-links li a {
  position: relative;
  font-size: 17px;
  font-weight: 400;
  color: var(--text-color);
  text-decoration: none;
  padding: 10px;
}

.nav-links li a::before {
  content: "";
  position: absolute;
  left: 50%;
  bottom: 0;
  transform: translateX(-50%);
  height: 6px;
  width: 6px;
  border-radius: 50%;
  background-color: var(--text-color);
  opacity: 0;
  transition: all 0.3s ease;
}

.nav-links li:hover a::before {
  opacity: 1;
}

.nav-bar .darkLight-searchBox {
  display: flex;
  align-items: center;
}

.dark-light i.sun {
  opacity: 0;
  pointer-events: none;
}

.dark-light.active i.sun {
  opacity: 1;
  pointer-events: auto;
}

.dark-light.active i.moon {
  opacity: 0;
  pointer-events: none;
}

@media (max-width: 790px) {
  nav .nav-bar .sidebarOpen {
    display: block;
  }

  .menu {
    position: fixed;
    height: 100%;
    width: 320px;
    left: -100%;
    top: 0;
    padding: 20px;
    background-color: var(--side-nav);
    z-index: 100;
    transition: all 0.4s ease;
  }

  nav.active .menu {
    left: -0%;
  }

  nav.active .nav-bar .navLogo a {
    opacity: 0;
    transition: all 0.3s ease;
  }

  .menu .logo-toggle {
    display: block;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .logo-toggle .siderbarClose {
    color: var(--text-color);
    font-size: 24px;
    cursor: pointer;
  }

  .nav-bar .nav-links {
    flex-direction: column;
    padding-top: 30px;
  }

  .nav-links li a {
    display: block;
    margin-top: 20px;
  }
}

    </style>
    <!-- <link rel="stylesheet" href="./src/css/main.css"> -->
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
                <img class="h-10 mx-2 logo" src="https://cdn.discordapp.com/attachments/1110309103517044807/1110309152401670154/Untitled.png">
                <!-- <img class="h-10 dark_logo" src="https://cdn.discordapp.com/attachments/972503652310843552/1005902444624105502/logo_dark.png"> -->
                <!-- <img class="h-10 light_logo" src="https://cdn.discordapp.com/attachments/972503652310843552/1005902445282603028/logo.png"> -->
                <span class="logo navLogo">
                    <a href="#">
                        Sudhaar
                    </a>
                </span>
            </div>

            <div class="menu">
                <div class="logo-toggle inline-flex">
                    <span class="logo"><a href="#">Sudhaar</a></span>
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