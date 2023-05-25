<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Daily Quester</title> 
    <style>
        body{
            background: #073B4C;
        }        
        .heading{
            color: #000;
        }
        .text{
            color: #000;
        }
        .dark .heading{
            color: #C2185B;
        }
        .dark .text{
            color: #fff;
        }
    </style>
</head>

<body>
<!-- <body class="bg-gradient-to-r from-green-500 via-sky-500 to-purple-500"> -->
    <?php require('components/header.php') ?>
    <div class="py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
            <?php 
            if(isset($_GET['error'])){
                var_dump($_GET['error']);
                if ($_GET['error']=='0'){
                    echo '<div class="bg-blue-100 m-4 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert"  id="to_hide">
                    <p class="font-bold">Success!</p>
                    <p class="text-sm">Your message was send to our servers successfully.</p>
                  </div>';
                }
                else{
                    echo'<div class="bg-red-100 m-4 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert" id="to_hide">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">Sorry an error occured , 
                    Failed to send your message to our servers , 
                    Please try again later.</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg class="fill-current h-6 w-6 text-red-500" role="button" onclick="hide()"  iewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>';
                }
            }
            ?>
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="heading text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6 mt-20">CONTACT US</h2>

                <p class="max-w-screen-md text text-lg md:text-xl lg:text-2xl text-center mx-auto">Ask us any query if you have.</p>
            </div>
            <!-- text - end -->

            <!-- form - start -->
            <form class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto" action="./contact_backend.php"method="POST">
                <div>
                    <label for="first-name" class="inline-block text text-sm sm:text-base mb-2">First name*</label>
                    <input name="first-name" class="w-full bg-gray-50 border focus:ring ring-rose-400 rounded outline-none transition duration-100 px-3 py-2" required/>
                </div>

                <div>
                    <label for="last-name" class="inline-block text text-sm sm:text-base mb-2">Last name*</label>
                    <input name="last-name" class="w-full bg-gray-50 border focus:ring ring-rose-400 rounded outline-none transition duration-100 px-3 py-2" required/>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="inline-block text text-sm sm:text-base mb-2">Email*</label>
                    <input name="email" class="w-full bg-gray-50 border focus:ring ring-rose-400 rounded outline-none transition duration-100 px-3 py-2" required/>
                </div>

                <div class="sm:col-span-2">
                    <label for="subject" class="inline-block text text-sm sm:text-base mb-2">Subject*</label>
                    <input name="subject" class="w-full bg-gray-50 border focus:ring ring-rose-400 rounded outline-none transition duration-100 px-3 py-2" required/>
                </div>

                <div class="sm:col-span-2">
                    <label for="message" class="inline-block text text-sm sm:text-base mb-2">Message*</label>
                    <textarea name="message" class="w-full h-64 bg-gray-50 border focus:ring ring-rose-400 rounded outline-none transition duration-100 px-3 py-2"></textarea>
                </div>

                <div class="sm:col-span-2 flex justify-between items-center">
                    <button class="inline-blockactive:bg-indigo-700 focus-visible:ring ring-rose-400 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none px-4 py-3 transition ease-in-out delay-150 bg-indigo-500 hover:-translate-y-1 hover:scale-110 hover:bg-violet-500 duration-300">Send</button>

                    <span class="text text-sm">*Required</span>
                </div>

                <!-- <p class="text-gray-400 text-xs">By signing up to our newsletter you agree to our <a href="#" class="hover:text-indigo-500 active:text-indigo-600 underline transition duration-100">Privacy Policy</a>.</p> -->
            </form>
            <!-- form - end -->
        </div>
    </div>
    <?php require('components/footer.php') ?>
</body>
<script>
  function hide(){
    document.getElementById('to_hide').style.display = 'none';
    window.location.replace('./contact');
}
</script>
</html>