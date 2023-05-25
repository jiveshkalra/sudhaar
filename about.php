<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Daily Quester</title>
    <link rel="stylesheet" href="./src/css/index.css">
</head>

<body>
    <?php require('components/header.php') ?>
    <div class="flex items-center justify-center min-h-screen">
        <div class="flex flex-col text-center w-full mb-20">
            <h1 class="text-2xl md:text-3xl lg:text-5xl font-semibold lg:font-bold px-10 static-text">DAILY QUESTER IS</h1>
            <p class="mx-auto to_type text-2xl md:text-3xl lg:text-5xl px-10 font-semibold lg:font-bold"></p>
        </div>
    </div>

    <div class="py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="feature-product text-2xl md:text-3xl lg:text-5xl font-bold text-center mb-4 md:mb-6">FEATURES</h2>

                <!-- <p class="max-w-screen-md text-white md:text-xl text-lg lg:text-2xl text-center mx-auto">Features of our product</p> -->
            </div>
            <!-- text - end -->

            <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-8">
                <!-- feature - start -->
                <div class="flex features border rounded-lg divide-x">
                    <div class="flex items-center text-white p-2 md:p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 md:w-8 h-6 md:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <div class="p-4 md:p-6">
                        <h3 class="text-lg md:text-xl font-semibold mb-2 ">TIME SAVER</h3>
                        <p class="f-text">Our website helps you save your time in surfing by providing you with the main summary of any popular article.</p>
                    </div>
                </div>
                <!-- feature - end -->

                <!-- feature - start -->
                <div class="flex features border rounded-lg divide-x">
                    <div class="flex items-center text-white p-2 md:p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 md:w-8 h-6 md:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <div class="p-4 md:p-6">
                        <h3 class="text-lg md:text-xl font-semibold mb-2 ">Efficient</h3>
                        <p class="f-text">Instead of going to all the sites manaully you can read all the important content from the website post from just 1 site.</p>
                    </div>
                </div>
                <!-- feature - end -->

                <!-- feature - start -->
                <div class="flex features border rounded-lg divide-x">
                    <div class="flex items-center text-white p-2 md:p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 md:w-8 h-6 md:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <div class="p-4 md:p-6">
                        <h3 class="text-lg md:text-xl font-semibold mb-2 ">Fast</h3>
                        <p class="f-text">It gets all the famous articles regarding your query and quickly takes out the summary and presents the summary to you.</p>
                    </div>
                </div>
                <!-- feature - end -->

                <!-- feature - start -->
                <div class="flex features border rounded-lg divide-x">
                    <div class="flex items-center text-white p-2 md:p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 md:w-8 h-6 md:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <div class="p-4 md:p-6">
                        <h3 class="text-lg md:text-xl font-semibold mb-2 ">Simple</h3>
                        <p class="f-text">Its quite simple to use just search what ever you want to </p>
                    </div>
                </div>
                <!-- feature - end -->

                <!-- feature - start -->
                <div class="flex features border rounded-lg divide-x">
                    <div class="flex items-center text-white p-2 md:p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 md:w-8 h-6 md:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <div class="p-4 md:p-6">
                        <h3 class="text-lg md:text-xl font-semibold mb-2 ">User Friendly </h3>
                        <p class="f-text">Easy to understand and use</p>
                    </div>
                </div>
                <!-- feature - end -->
                <!-- feature - start -->
                <!-- <div class="flex features border rounded-lg divide-x">
                    <div class="flex items-center text-white p-2 md:p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 md:w-8 h-6 md:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <div class="p-4 md:p-6">
                        <h3 class="text-lg md:text-xl font-semibold mb-2 ">RETRIEVE PAST RECORDS</h3>
                        <p class="f-text">You can check our past health records from the device or show it to a doctor.</p>
                    </div>
                </div>-->
                <!-- feature - end -->
            </div>
        </div>
    </div>
    <?php require('components/footer.php') ?>
    <script src="./src/js/typed.js"></script>
    <script>
        var typed = new Typed('.to_type', {
            strings: [
                "USER FRIENDLY",
                "TIME SAVING",
                "EFFICIENT",
                "SIMPLE",
                "FAST"
            ],
            typeSpeed: 100
        });
    </script>
</body>

</html>