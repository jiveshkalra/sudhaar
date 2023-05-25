<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <title>Daily Quester</title>
  <style>
    body {
      background: #073B4C;
    }
    .heading {
      color: white;
    }
    .dark .heading{
      color: #c2185b;
    }
  </style>
</head>

<body><?php require('components/header.php') ?>
  <div class="pt-6 sm:pt-8 lg:pt-12">
    <div class="max-w-screen-2xl px-4 md:px-8 mx-autoflex">
      <h2 class="heading text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-8 mt-20">LOGIN</h2>
      <form class="max-w-lg border rounded-lg mx-auto mb-10" action="<?php $_PHP_SELF ?>" method="post">
        <div class="flex flex-col gap-4 p-4 md:p-8 bg-white">
          <div>
            <label for="email" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Email</label>
            <input name="email" id="email" type="email" placeholder="Username OR example@email.com" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
          </div>

          <div>
            <label for="password" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Password</label>
            <input name="password" autocomplete="off" id="password" placeholder="PASSWORD@123" type=password class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
          </div>
          <div class="m-auto">
            <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
            <label class="form-check-label" for="remember_me">Remember Me</label>
          </div>

          <button class="block bg-gray-800 hover:bg-gray-700 active:bg-gray-600 focus-visible:ring ring-gray-300 text-white text-sm md:text-base font-bold text-center rounded-lg outline-none transition duration-100 px-8 py-3" type="submit">Login</button>
        </div>
      </form>
      
      <div class="max-w-lg border rounded-lg mx-auto bg-white" style="margin-bottom: 150px;">
        <div class="flex justify-center items-center">
          <button id="register" class="m-2 block justify-center items-center bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus-visible:ring ring-blue-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 gap-2 px-8 py-3" onclick="window.location.href ='http://artificial-doctor.epizy.com/register' ">Register
          </button>
          <button class="m-2 block justify-center items-center bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus-visible:ring ring-blue-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 gap-2 px-8 py-3" onclick="window.location.href='http://artificial-doctor.epizy.com/forgot_password'">Forgot Password
          </button>
        </div>
      </div>
    </div>
    <?php require('components/footer.php') ?>
</body>

</html>