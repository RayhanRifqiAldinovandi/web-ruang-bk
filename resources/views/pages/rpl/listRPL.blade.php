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
        <div class="flex flex-row font-customFont">
            @include('components.drawerUP')
            <div id="main-content" class="mx-8 mb-10 flex-shrink transition-all duration-300">
                <div class="font-bold size my-5 text-2xl">
                    <h1>Jurnal Bulanan</h1>
                </div>
                <div class="font-medium size my-3 text-lg">
                    <h1>{{now()->format('l, F Y')}}</h1>    
                </div> 
                @if(session('success'))
                <div id="toast" class="fixed top-4 right-4 bg-green-600 font-customFont text-white p-4 rounded shadow-lg transition-transform duration-1000 transform translate-x-0">
                    {{ session('success') }}
                </div>
                @endif
                <div class="overflow-x-auto shadow-md sm:rounded-lg mr-5">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Siswa
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Deskripsi Pelanggaran
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jenis Pelanggaran
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Layanan Yang Diberikan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tindak Lanjut
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Keterangan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item as $i)    
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    {{$i->tanggal_kegiatan}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$i->nama_siswa}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$i->deskripsi_pelanggaran}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$i->jenis_pelanggaran}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$i->layanan}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$i->tindak_lanjut}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$i->keterangan}}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="/rpl-bulanan-save/{{$i->id}}/pdfRPLBulanan" method="GET">
                                        @csrf
                                        <button type="submit" class=" text-green-500 hover:text-green-700" >
                                            Unduh
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <button type="submit" class=" text-orange-500 hover:text-orange-700" onclick="my_modal_4.show()">
                                        Kirim ke Email Orangtua
                                    </button>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="/rpl-bulanan/listRpl/{{$i->id}}/delete" method="POST">
                                        @csrf
                                        <button type="submit" class=" text-red-500 hover:text-red-700" >
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="/rpl-bulanan/listRpl/{{$i->id}}/" method="POST">
                                        @csrf
                                        <button type="submit" class=" text-blue-500 hover:text-blue-700" >
                                            Ubah
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach   
                        </tbody>     
                    </table>   
                </div>
                @if($item->isEmpty())

                @else
                <dialog id="my_modal_4" class="modal">
                    <div class="modal-box w-fit  max-w-5xl">
                        <h3 class="text-lg font-bold">Masukkan Email Orangtua</h3>
                        <form id="emailForm" action="/rpl-print/{{$i->id}}/pdfRPLBulanan" method="GET">
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
                    <div class="artboard artboard-horizontal phone-3 bg-slate-100 rounded-md  flex-col flex items-center justify-center max-w-xs sm:max-w-2xl">
                        @if($item->isEmpty())
                        <p class=" font-md text-lg my-5">Belum ada RPL, buat RPL?</p>
                        @endif
                        <button class="btn bg-orange-400 hover:bg-orange-500" onclick="my_modal_1.show()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"/></svg>
                            Tambah RPL
                          </button>
                          <dialog id="my_modal_1" class="modal">
                            <div class="modal-box w-1/2 max-w-5xl">
                                <h3 class="text-lg font-bold">Tambah RPL</h3>
                                <form id="rplForm" action="/rpl-bulanan/{{$month}}/listRplStore" method="POST">
                                    @csrf
                                    <div class="py-4">
                                        <label for="tanggal_kegiatan" class="block text-sm font-medium text-gray-700">Tanggal</label>
                                        <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan" class="input px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    </div>
                                    <div class="py-4">
                                        <label for="nama_siswa" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                                        <input type="text" name="nama_siswa" id="nama_siswa" class="input px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    </div>
                                    <div class="py-4">
                                        <label for="deskripsi_pelanggaran" class="block text-sm font-medium text-gray-700">Deskripsi Pelanggaran</label>
                                        <input type="text" name="deskripsi_pelanggaran" id="deskripsi_pelanggaran" class="input px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    </div>
                                    <div class="py-4">
                                        <label for="jenis_pelanggaran" class="mb-2 block text-sm font-medium text-gray-700">Jenis Pelanggaran</label>
                                        <select name="jenis_pelanggaran" class="select select-bordered w-full max-w-xs">    
                                            <option class="text-red-500">Berat</option>
                                            <option class="text-yellow-500">Sedang</option>
                                            <option class="text-green-500">Ringan</option>
                                          </select>
                                    </div>
                                    <div class="py-4">
                                        <label for="layanan" class="block text-sm font-medium text-gray-700">Layanan Yang Diberikan</label>
                                        <input type="text" name="layanan" id="layanan" class="input px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    </div>
                                    <div class="py-4">
                                        <label for="tindak_lanjut" class="block text-sm font-medium text-gray-700">Tindak Lanjut</label>
                                        <input type="text" name="tindak_lanjut" id="tindak_lanjut" class="input px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    </div>
                                    <div class="py-4">
                                        <label for="keterangan" class="mb-2 block text-sm font-medium text-gray-700">Keterangan</label>
                                        <select name="keterangan" class="select select-bordered w-full max-w-xs">    
                                            <option>Mengetahui Orangtua</option>
                                            <option>Mengetahui Wali Kelas, BK</option>
                                          </select>
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