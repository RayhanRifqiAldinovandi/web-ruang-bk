<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex flex-row">
        @include('components.drawerUP')
        <div id="main-content" class="mx-5 my-5 h-screen transition-all duration-300">
            <div class="card bg-base-200 w-64 shadow-xl">
                <div class="card-body">
                  <h2 class="card-title">Selamat Datang</h2>
                  <p>{{auth()->User()->name}}</p>
                </div>
              </div>
        </div>

    @include('components.drawerDown')
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>
