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
    <div class="relative flex items-center justify-center h-screen bg-gray-800 font-customFont">
        <img src="{{ asset('storage/Kota tarakan 34.jpg') }}" alt="" class="absolute inset-0 object-cover w-full h-full opacity-40">
        
        <div class="relative z-10 p-5 bg-white rounded-md shadow-lg">
            <h1 class="text-5xl font-customFont mb-10">Registrasi User</h1>
            <form action="/registerProcess" method="POST">
                @csrf
                <div class="py-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email"  class="input input-bordered w-full max-w-xs" required />
                    @error('email')
                        <span class="label-text-alt text-red-600">Tolong masukkan nama</span>
                    @enderror
                </div>
                <div class="py-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" class="input input-bordered w-full max-w-xs" required/>
                    @error('name')
                        <span class="label-text-alt text-red-600">Email tidak valid</span>
                    @enderror
                </div>
                <div class="py-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="input px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required >
                    @error('password')
                        <span class="label-text-alt text-red-600">Password minimal 8 karakter</span>
                    @enderror
                </div>
                <div class="card-actions justify-end">
                    <button class="btn bg-orange-400 hover:bg-orange-500">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
