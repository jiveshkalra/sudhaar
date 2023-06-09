@include('layouts.header')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link href="{{ asset('css/index.css') }}" rel="stylesheet">

    {{-- <div class="content-container"> --}}
        <div class="img_box "> {{-- m-4 sm:m-8 md:m-12 lg:m-20 --}}
            <img class="w-96 h-auto" src="src/img/counsellor.png" alt="Counsellor.png">
            <a style="display:none;" href="https://storyset.com/people">People illustrations by Storyset</a>
            <h1 class="text-lg md:text-xl lg:text-2xl font-semibold lg:font-bold px-10 heading my-5 text-blue-700">
                Empathy in Anonymity: Reach Out for Student Wellness 
            </h1>
        </div>
        <div class="down_box absolute bottom-0 left-0 w-full">

            <form class="msg-inputarea px-2 sm:px-4 lg:px-6 xl:px-12  my-20 sm:my-14 lg:my-10 xl:my-5" action="" id="chatbox">
                <textarea rows="1" type="text" id="msg-input" class="msg-input" placeholder="Enter your message..." ></textarea>
                <button type="submit" class="msg-send-btn"><span class="material-symbols-outlined">
                    send
                    </span></button>
            </form>
            @include('layouts.footer')
        </div>
        
    <script src="{{asset('js/user_chat_websocket.js')}}"></script>
    <script>
        const textarea = document.querySelector('#msg-input');  
        const maxRows = 6;

        textarea.addEventListener('input', () => {
            const lines = textarea.value.split('\n');
            const rows = Math.min(lines.length, maxRows);
            textarea.rows = rows;
        });
    </script>