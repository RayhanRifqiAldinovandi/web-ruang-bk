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
            <div id="main-content" class="mx-5 mb-10 flex-grow transition-all duration-300 font-customFont">
                <div class="font-bold size my-5 text-2xl font-customFont">
                    <h1>Data Kelas</h1>
                </div>
                <div class="font-medium size my-3 text-lg">
                    <h1>{{now()->format('l, F Y')}}</h1>    
                </div>
                @if(session('success'))
                <div id="toast" class="fixed top-4 right-4 bg-green-600 font-customFont text-white p-4 rounded shadow-lg transition-transform duration-1000 transform translate-x-0">
                    {{ session('success') }}
                </div>
                @endif        
                <div class="mt-5 mb-5 mx-8">
                    <button class="btn bg-orange-500 hover:bg-orange-600 text-white" onclick="my_modal_4.showModal()">Tambah Kelas</button>
                    <dialog id="my_modal_4" class="modal">
                        <div class="modal-box w-1/2 max-w-5xl">
                            <h3 class="text-lg font-bold">Tambah Kelas</h3>
                            <form id="kelasForm" action="/kelas/store" method="POST">
                                @csrf
                                <div class="py-4">
                                    <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                                    <input type="text" name="kelas" id="kelas" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="py-4">
                                    <label for="tingkatan" class="block text-sm font-medium text-gray-700">Tingkatan</label>
                                    <input type="text" name="tingkatan" id="tingkatan" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="py-4">

                                    @php
                                        $randomString = substr(str_shuffle(MD5(microtime())), 0, 4);
                                    @endphp
                                    <label for="kelas" class="block text-sm font-medium text-gray-700">Kode Kelas</label>
                                    <input type="text" name="kode_kelas" id="kelas" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{$randomString}}" readonly>
                                </div>
                                <div class="modal-action">
                                    <button type="submit" class="btn bg-orange-400 hover:bg-orange-500">Simpan</button>
                                    <button type="button" class="btn" onclick="my_modal_4.close()">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </dialog>
                </div>
                @if($list->isEmpty())
                <div class="flex justify-center mt-10">
                    <p class="text-3xl font-bold mx-8">Belum ada data kelas</p>
                </div>
                @else
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-8">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Kelas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tingkatan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kode Kelas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jumlah Siswa
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)    
                            <tr class="bg-white border-b  hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{$item->kelas}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$item->tingkatan}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->kode_kelas}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->siswa_count}}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="/kelas/edit/{{$item->id}}" method="GET">
                                        @csrf
                                        <button type="submit" class=" text-blue-500 hover:text-blue-700">
                                            Ubah
                                        </button>
                                    </form>
                                    <form action="/kelas/delete/{{$item->id}}" method="POST">
                                        @csrf
                                        <button type="submit" class=" text-red-500 hover:text-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                </div>
                @endif
        </div>
        @include('components.drawerDown')
    </div>
<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>