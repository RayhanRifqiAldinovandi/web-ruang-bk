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
    <div class="flex h-screen font-customFont">
        @if(session('success'))
                <div id="toast" class="fixed top-4 right-4 bg-green-600 font-customFont text-white p-4 rounded shadow-lg transition transform duration-1000">
                    {{ session('success') }}
                </div>
                @endif
        <!-- Image Section -->
        <div class="w-3/5 flex items-center justify-center bg-gray-100">
            <img 
                src="{{ asset('storage/2024-01-18.jpg') }}"
                alt="Album" 
                class="object-cover w-full h-full" />
        </div>
        
        <!-- Form Section -->
        <div class="w-2/5 flex items-center justify-center bg-white p-8">
            <div class="w-full max-w-sm">
                <h1 class="text-3xl font-bold mb-6">Login</h1>
                <form action="/loginProcess" method="POST">
                    @csrf
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" class="input input-bordered w-full mb-4" required />
                    
                    @if(session('fail'))
                    <div class="label mb-4">
                        <span class="label-text-alt text-red-500">Bottom Left label</span>
                    </div>
                    @endif
                    
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password" class="input px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500  focus:ring-indigo-500 sm:text-sm" required />
                    
                    <div class="mt-6">
                        <button type="submit" class="btn bg-orange-500 text-white hover:bg-orange-600 w-full">Login</button>
                    </div>
                    <div class="mt-6">
                        <p>Belum terdaftar? Silahkan <a href="/register" class="text-blue-400">Registrasi</a></p>
                    </div>
                    <div class="mt-6">
                        <p>Lupa Password? Silahkan <a href="{{ route('password.request') }}" class="text-red-400">Reset Password</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>
