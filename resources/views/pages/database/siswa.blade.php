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
            <div id="main-content" class=" mx-5 mb-10 flex-grow transition-all duration-300">
                <div class="font-bold size my-5 text-2xl font-customFont">
                    <h1>Data Siswa</h1>
                </div>
                <div class="font-medium size my-3 text-lg font-customFont">
                    <h1>{{now()->format('l, F Y')}}</h1>    
                </div>
                @if(session('success'))
                <div id="toast" class="fixed top-4 right-4 bg-green-600 font-customFont text-white p-4 rounded shadow-lg transition transform duration-1000">
                    {{ session('success') }}
                </div>
                @endif
                <div class="mt-5 mb-5 mx-8 font-customFont">
                    <div class="flex flex-row gap-3">
                        <button class="btn bg-orange-500 hover:bg-orange-600 text-white" onclick="my_modal_4.showModal()">Tambah Siswa</button>
                        <form action="/siswa/search" method="GET">
                            <input type="text" name="search" placeholder="Cari Siswa" class="border input input-bordered w-full max-w-xs" />
                            <button type="submit" class="hidden"></button>
                        </form>
                    </div>
                    <dialog id="my_modal_4" class="modal font-customFont">
                        <div class="modal-box w-1/2 max-w-5xl">
                            <h3 class="text-lg font-bold">Tambah Siswa</h3>
                            <form id="kelasForm" action="/siswa/store" method="POST">
                                @csrf
                                <div class="py-4">
                                    <label for="nama_siswa" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                                    <input type="text" name="nama_siswa" id="nama_siswa" class=" border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="py-4">
                                    <select name="kelas_id" class="select select-bordered w-full max-w-xs">
                                        @foreach ($list_kelas as $kelas)    
                                        <option value="{{$kelas->id}}">{{$kelas->kelas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="py-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="email" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="py-4">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Ortu</label>
                                    <input type="phone" name="nomor_ortu" id="phone" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="py-4">
                                    <select name="jenis_kelamin" class="select select-bordered w-full max-w-xs">
                                        <option>Laki-Laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>
                                <div class="modal-action">
                                    <button type="submit" class="btn bg-orange-400 hover:bg-orange-500">Simpan</button>
                                    <button type="button" class="btn" onclick="my_modal_4.close()">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </dialog>
                </div>
                <div>
                    @if($list->isEmpty())
                <div class="flex justify-center mt-10">
                    <p class="text-3xl font-bold mx-8">Belum ada data siswa</p>
                </div>
                @else
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-8">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 font-customFont">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama Siswa
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kelas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jenis Kelamin
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)    
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{$item->nama_siswa}}
                                </th>
                                <td class="px-6 py-4">
                                    <!--access 'kelas' relationship with 'siswa'-->
                                    {{$item->kelas->kelas}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->email}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->jenis_kelamin}}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="/siswa/edit/{{$item->id}}" method="GET">
                                        @csrf
                                        <button type="submit" class=" text-blue-500 hover:text-blue-700">
                                            Ubah
                                        </button>
                                    </form>
                                    <form action="/siswa/delete/{{$item->id}}" method="POST">
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
        </div>
        @include('components.drawerDown')
    </div>
<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>