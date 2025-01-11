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
        <div id="main-content" class="mx-5 flex-grow transition-all duration-300">
            <div class="font-bold size my-5 text-2xl">
                <h1>Jurnal Bulanan BK</h1>
            </div>
            <div class="font-medium size my-3 text-lg">
                <h1>{{now()->format('l, F Y')}}</h1>    
            </div>
            @if($item->isNotEmpty()) 
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Bulan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item as $i)    
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$i->id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$i->month}}
                            </td>
                            <td class="px-6 py-4">
                                <form action="/rpl-bulanan/listRpl/{{$i->month}}" method="GET">
                                    <button type="submit" class=" text-orange-500 hover:text-orange-600">
                                        Isi kegiatan
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach   
                    </tbody>     
                </table>   
            </div>
            @endif
            <div class="mt-10 mb-10 flex-col">
                <!----SM IS WHEN THE SCREEN IS LARGE (SM = When the screen is larger than small/ when its not on mobile phone)!-->
                <div class="artboard artboard-horizontal  phone-3 bg-slate-100 rounded-md flex-col flex items-center justify-center max-w-xs sm:max-w-2xl">
                    @if($item->isEmpty())
                    <p class=" font-md text-lg my-5">Belum ada RPL, buat RPL?</p>
                    @endif
                    <button class="btn bg-orange-400 hover:bg-orange-500" onclick="my_modal_1.show()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"/></svg>
                        Tambah RPL
                      </button>
                      <dialog id="my_modal_1" class="modal">
                        <div class="modal-box w-fit  max-w-5xl">
                            <h3 class="text-lg font-bold">Tambah RPL</h3>
                            <form id="bulanForm" action="/rpl-bulanan/storeMonth" method="POST">
                                @csrf
                                <div class="py-4">
                                    <label for="month" class="block text-sm font-medium text-gray-700">Bulan</label>
                                    <input type="text" name="month" id="month" class="px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
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
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>