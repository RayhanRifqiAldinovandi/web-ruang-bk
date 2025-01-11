@if($list->isEmpty())
                <div class="flex justify-center mt-10">
                    <p class="text-3xl font-bold mx-8">Belum ada data siswa</p>
                </div>
                @else
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-8">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                <td class="px-6 py-4">
                                    <form action="/siswa/edit/{{$item->id}}" method="POST">
                                        @csrf
                                        <button type="submit" class=" hover:text-orange-500">
                                            Ubah
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                
                </div>
                @endifpl