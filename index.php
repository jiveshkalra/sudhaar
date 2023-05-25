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
        .search_bar{
            background : #dce4fd;
            border-color: #C2185B;
            border-width: 2px;
        }
        .search_btn:focus-visible {
            outline: 2px solid black;
        }
        .dark .heading{
            color: #C2185B;
        }
        .dark .heading-2{
            color: #3481cc;
        }
        .dark .search_bar{
            background : #27292a;
            border-color: #C2185B;
            border-width: 2px;
            color: white;
        }
        .dark .search_btn{
            background: #C2185B;
        }
        .dark .search_btn:focus-visible {
            outline: 2px solid black;
        }
        .search_bar:focus {
        outline: none;
        }
        .result{
            background: #DCE4FD;
            color: #525353;
        }
        .dark .result{
            background: #27292A;
            color: white;
        }
        .result_heading{
            color: #34383A;
        }
        .dark .result_heading{
            color:  #E1E1E1;
        }
        .dark .res-text{
            background: #2c2f2f;            
        }
    </style>
</head>
<body>
<!-- <body class="bg-gradient-to-r from-green-500 via-sky-500 to-purple-500"> -->
    <?php require('components/header.php')?>
    <div class="flex items-center justify-center min-h-screen">
        <div class="flex flex-col text-center w-full m-4 sm:m-8 md:m-12 lg:m-20 ">
            <h1 class="text-2xl md:text-3xl lg:text-5xl font-semibold lg:font-bold px-10 heading my-2 text-blue-700 search_title">SUDHAAR</h1>
            <h1 class="text-2xl md:text-3xl lg:text-5xl font-semibold lg:font-bold px-10 heading-2 my-2 text-blue-700 search_title">DAV Public School Sector 14 Gurugram</h1>
            <form class="flex items-center"  method="GET" action ="<?php $_PHP_SELF ?>">   
                <!-- <label for="query" class="sr-only">Sudhaar - DAV Public School Sector 14 Gurugram</label> -->
                <!-- <div class="relative w-full"> -->
                    <!-- <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div> -->
                    <!-- <input type="text" id="query" name='query' class="text-sm rounded-lg block w-full pl-10 p-2.5 search_bar border-2 border-blue-700" placeholder="Search" required> -->
                <!-- </div> -->
                <!-- <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-white search_btn">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">Search</span>
                </button> -->
            </form>
            <!-- <div class="result rounded-2xl border-2 m-1 p-2 md:m-4 md:p-4 sm:m-2 sm:p-2">
                <span class="result_heading uppercase text-base sm:text-xl md:text-2xl lg:text-3xl"> < Lorem ></span>
                <div class="result res-text rounded-2xl border-2 m-1 p-2 md:m-4 md:p-4 sm:m-2 sm:p-2 bg-white">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus quos et iure, iusto illum necessitatibus sequi libero sint ducimus excepturi corporis, quod, quasi incidunt eum minus! Nemo voluptatibus maxime dignissimos quisquam deserunt suscipit, excepturi nihil repudiandae eum numquam perferendis dolores nulla quasi voluptatum eaque velit fugit ipsum nostrum consectetur perspiciatis necessitatibus alias tenetur. Blanditiis quis nemo, nulla doloremque reprehenderit, sit vel a magni laboriosam quae, asperiores obcaecati maxime voluptates eveniet at minima! Delectus, illum praesentium, nam officiis labore, deleniti possimus sequi recusandae suscipit esse expedita culpa necessitatibus? Quos perferendis cumque dolorum iure accusantium? Eveniet eligendi quis ipsa. Sequi, adipisci ad et quod nostrum vel, aut nobis dignissimos rem accusantium consequuntur ex modi aliquid minima molestias deserunt incidunt, laboriosam eveniet aspernatur.
                </div>
            </div> -->
            <?php
            if(isset($_GET['query'])) {
                $query = urlencode($_GET['query']);
            
            // Google API
            // $url = "https://www.googleapis.com/customsearch/v1?key=AIzaSyC3Jbup8HdhsfW_QEMIAZc81fnbE-aYupY&cx=76394ecd2b7984312&q=".$query;
            // $data = file_get_contents($url); //data read from json file
            // print_r($data)
            
            // Wikipedia APi
            $url = "https://en.wikipedia.org/w/api.php?action=query&origin=*&format=json&generator=search&gsrnamespace=0&gsrlimit=5&gsrsearch=".$query;
            $data = file_get_contents($url); //data read from json file
            $json = json_decode($data);
            // if(file_exists('wiki.json')){
            //     $filename = 'wiki.json';
            //     $data = file_get_contents($filename); //data read from json file
            //     $json = json_decode($data);
            // }
            // else{}
            foreach($json->query->pages as $mypage){
                // echo($mypage->title);
                echo '<div class="result rounded-2xl border-2 m-4 p-4 ">';
                echo('<span class="result_heading uppercase text-xl md:text-2xl lg:text-3xl"> < '. $mypage->title . ' ></span>');
                echo '<div class="result res-text rounded-2xl border-2 m-4 p-4 bg-white">';
                $url = "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=".urlencode($mypage->title);
                $data = file_get_contents($url); //data read from json file
                $json = json_decode($data);
                foreach($json->query->pages as $mypg){
                    echo($mypg->extract);
                }
                echo "</div>";
                echo "</div>";
                echo("<br><br>");
            }


        } else {
            $query = '';
        }
            ?>
        </div>
    </div>
    <?php require('components/footer.php') ?>
</body>
</html>