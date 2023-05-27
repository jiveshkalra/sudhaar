@extends('layouts.main')

@section('main-content')
    <style>
        .content-container {
            display: grid;
            place-items: center;
            height: 100vh;
        }

        .msg-inputarea {
            display: flex;
            padding-left: 5vh;
            padding-right: 5vh;
            border-top: var(--border);
            background: #fff;
        }

        .msg-inputarea * {
            padding: 10px;
            border: none;
            border-radius: 3px;
            font-size: 1em;
        }

        .msg-input {
            flex: 1;
            background: #e2e5e7;

        }

        .msg-input:focus {
            outline: none;
        }

        .msg-send-btn {
            margin-left: 10px;
            background: #226877;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.23s;
        }

        .msg-send-btn:hover {
            background: #22535e;
        }
    </style>
    <link rel="stylesheet" href="src/css/index.css">
    <div class="content-container">
        <div class="grid place-items-center w-full"> {{-- m-4 sm:m-8 md:m-12 lg:m-20 --}}
            <img class="w-96 h-auto" src="src/img/counsellor.png" alt="Counsellor.png">
            <a style="display:none;" href="https://storyset.com/people">People illustrations by Storyset</a>
            <h1 class="text-lg md:text-xl lg:text-2xl font-semibold lg:font-bold px-10 heading my-5 text-blue-700">
                Empathy in Anonymity: Reach Out for Student Wellness</h1>
        </div>
        <div class="lower-box">
            <form class="msg-inputarea w-screen">
                <textarea rows="1" type="text" id="msg-input" class="msg-input" placeholder="Enter your message..."></textarea>
                <button type="submit" class="msg-send-btn">Send</button>
            </form>
        </div>
    </div>
    <script>
        const textarea = document.querySelector('#msg-input');
        const maxRows = 6;

        textarea.addEventListener('input', () => {
            const lines = textarea.value.split('\n');
            const rows = Math.min(lines.length, maxRows);
            textarea.rows = rows;
        });
    </script>
@endsection
