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
        <div id="main-content" class="mx-5 mb-10 flex-grow transition-all duration-300">
            <div class="font-bold size my-5 text-2xl">
                <h1>Laporan Konseling Individu</h1>
            </div>
            <div class="font-medium size my-3 text-lg">
                <h1>{{now()->format('l, F Y')}}</h1>    
            </div>
            @if(session('success'))
                <div id="toast" class="fixed top-4 right-4 bg-green-600 font-customFont text-white p-4 rounded shadow-lg transition transform duration-1000">
                    {{ session('success') }}
                </div>
                @endif
            @if($item->isNotEmpty()) 
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mr-9">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Konseli
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kelas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Hari/Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pertemuan Ke
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Waktu
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tempat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Teknik Konseling
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penjelasan Teknik Konseling
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Hasil Yang Dicapai
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item as $i)    
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{$i->nama}}
                            </td>
                            <td class="px-6 py-4">
                                {{$i->kelas}}
                            </td>
                            <td class="px-6 py-4">
                                {{$i->tanggal}}
                            </td>
                            <td class="px-6 py-4">
                                {{$i->waktu}}
                            </td>
                            <td class="px-6 py-4">
                                {{$i->pertemuan_ke}}
                            </td>
                            <td class="px-6 py-4">
                                {{$i->tempat}}
                            </td>
                            <td class="px-6 py-4">
                                {{$i->teknik_konseling}}
                            </td>
                            <td class="px-6 py-4">
                                {{$i->penjelasan}}
                            </td>
                            <td class="px-6 py-4">
                                {{$i->hasil}}
                            </td>
                            <td class="px-6 py-4">
                                <button type="submit" class=" text-orange-500 hover:text-orange-700" onclick="my_modal_4.show()">
                                    Kirim ke Email Orangtua
                                </button>
                            </td>
                            <td class="px-6 py-4">
                                <form action="/laporan-konseling-individu/{{$i->id}}/delete" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4">
                                <form action="/laporan-konseling-individu/{{$i->id}}" method="GET">
                                    <button type="submit" class=" text-blue-500 hover:text-blue-700">
                                        Ubah
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach   
                    </tbody>     
                </table>   
            </div>
            <dialog id="my_modal_4" class="modal">
                <div class="modal-box w-fit  max-w-5xl">
                    <h3 class="text-lg font-bold">Masukkan Email Orangtua</h3>
                    <form id="emailForm" action="/laporan-print/{{$i->id}}" method="GET">
                        @csrf
                        <div class="py-4">
                            <label for="kelas" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="text" name="email" id="email" class="px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                        <div class="modal-action">
                            <button type="submit" class="btn bg-orange-400 hover:bg-orange-500">Simpan</button>
                            <button type="button" class="btn" onclick="my_modal_4.close()">Tutup</button>
                        </div>
                    </form>
                </div>
            </dialog>
            @endif
            <div class="mt-10 flex-col">
                <div class="artboard artboard-horizontal phone-3 bg-slate-100 rounded-md  flex-col flex items-center justify-center">
                    @if($item->isEmpty())
                    <p class=" font-md text-lg my-5">Belum ada laporan, buat laporan?</p>
                    @endif
                    <button class="btn bg-orange-400 hover:bg-orange-500" onclick="my_modal_1.show()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"/></svg>
                        Tambah RPL
                      </button>
                      <dialog id="my_modal_1" class="modal">
                        <div class="modal-box w-1/2 max-w-5xl">
                            <h3 class="text-lg font-bold">Tambah RPL</h3>
                            <form id="laporanKonselingIndividuForm" action="/laporan-konseling-individu/store-laporan-konseling-individu" method="POST">
                                @csrf
                                <div class="py-4">
                                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Konseli</label>
                                    <input type="text" name="nama" id="nama" class=" border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="py-4">
                                    <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                                    <input type="text" name="kelas" id="kelas" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="py-4">
                                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Hari/Tanggal</label>
                                    <input type="date" name="tanggal" id="tanggal" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="py-4">
                                    <label for="pertemuan_ke" class="block text-sm font-medium text-gray-700">Pertemuan Ke</label>
                                    <input type="number" name="pertemuan_ke" id="pertemuan_ke" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="py-4">
                                    <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu</label>
                                    <input type="time" name="waktu" id="waktu" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="py-4">
                                    <label for="tempat" class="block text-sm font-medium text-gray-700">Tempat</label>
                                    <input type="text" name="tempat" id="tempat" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="py-4">
                                    <label for="teknik_konseling" class="block text-sm font-medium text-gray-700">Teknik Konseling</label>
                                    <input type="text" name="teknik_konseling" id="teknik_konseling" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="py-4">
                                    <label for="kelas" class="block text-sm font-medium text-gray-700">Penjelasan Teknik Konseling</label>
                                    <textarea
                                        name="penjelasan"
                                        placeholder="Bio"
                                        class="mt-1 text-left textarea textarea-bordered w-full">
                                    </textarea>
                                </div>
                                <div class="py-4">
                                    <label for="hasil" class="block text-sm font-medium text-gray-700">Hasil Yang Dicapai</label>
                                    <textarea
                                         name="hasil"
                                         placeholder="Bio"
                                         class=" mt-1 text-left textarea textarea-bordered w-full ">
                                    </textarea>
                                </div>
                                <div class="py-4 hidden">
                                    <input type="text" name="tipe_dokumen" id="tipe_dokumen" value="laporan_individu" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="modal-action">
                                    <button type="submit" class="btn bg-orange-400 hover:bg-orange-500">Simpan</button>
                                    <button type="button" class="btn" onclick="my_modal_1.close()">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </dialog>
        
                </div>
            </div>
    </div>
    @include('components.drawerDown')
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>