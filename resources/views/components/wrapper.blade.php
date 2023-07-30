<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laranote - by Adeoti</title>
    @vite('resources/css/app.css')
    <style>
        .message{
            position: fixed;
            top:100px;
            left:20px;
        }
    </style>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>

    @if(session() -> has('message'))
<div x-data="{open: true}" x-init="setTimeout(function(){open=false}, 3000)">
    <div x-show="open" class="message bg-gray-800 text-white p-3 text-center font-semibold">
        <p>{{session('message')}}</p>
    </div>
</div>
    @endif
    <div class="header py-2 pt-6 px-5 text-white bg-red-500 text-center font-bold">
        <div class="flex justify-between item-center">
            <div class="title text-lg">
                
                <a href="/">
                    Laravel Note Keeper
                </a>
            </div>
            <div class="search p-7 text-center">
                <form action="" method="GET">
                    <input type="text" name="search" placeholder="Search notes..." id="search" class="p-2 w-full font-normal border-teal-200 text-black">
                </form>
            </div>
            <div class="auth-admin font-light flex gap-3">
               @auth
               <p class="font-semibold">Welcome {{auth() -> user() -> name}}</p> |
               <a href="/dashboard">dashboard</a> |
                <form class="inline" action="/auth/logout" method="post">
                    @csrf
                    <button>logout</button>
                </form>
               @else
                <a href="/register">register</a> |
                <a href="/login">login</a>
               @endauth
            </div>
        </div>
    </div>
    {{$slot}}
    <footer class="footer bg-gray-300 text-center font-bold py-6">
        &copy; 2023. Laravel Note Keeper...
    </footer>
</body>
</html>