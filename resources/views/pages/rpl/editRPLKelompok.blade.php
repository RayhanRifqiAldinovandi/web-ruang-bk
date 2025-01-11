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
    <div class="my-10 mx-5 font-customFont">
        <div class="font-bold size my-5 text-2xl">
            <h1>Ubah Data RPL Kelompok</h1>
        </div>
        @foreach ($item as $i)    
        <form id="RPLKonsulKelompokForm" action="/rpl-konseling-kelompok/{{$i->id}}/update" method="POST">
            @csrf
            <div class="py-4">
                <label for="nama_siswa" class="block text-sm font-medium text-gray-700">Nama Konseli (nama-nama anggota kelompok/inisial)</label>
                <input type="text" value="{{$i->nama_siswa}}" name="nama_siswa" id="kelas" class=" border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Hari/Tanggal</label>
                <input type="date" value="{{$i->tanggal_kegiatan}}" name="tanggal_kegiatan" id="kelas" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="pertemuan_ke" class="block text-sm font-medium text-gray-700">Pertemuan Ke</label>
                <input type="text" value="{{$i->pertemuan_ke}}" name="pertemuan_ke" id="pertemuan_ke" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu</label>
                <input type="time" value="{{$i->waktu}}" name="waktu" id="waktu" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="tempat" class="block text-sm font-medium text-gray-700">Tempat</label>
                <input type="text" value="{{$i->tempat}}" name="tempat" id="tempat" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="topik_permasalahan" class="block text-sm font-medium text-gray-700">Topik Permasalahan</label>
                <input type="text" value="{{$i->topik_permasalahan}}" name="topik_permasalahan" id="topik_permasalahan" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="media" class="block text-sm font-medium text-gray-700">Media Yang Diperlukan</label>
                <input type="text" name="media" id="media" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4 hidden">
                <input type="text" value="rpl_kelompok" name="tipe_dokumen" id="kelas" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="modal-action">
                <button type="submit" class="btn bg-orange-400 hover:bg-orange-500">Simpan</button>
            </div>
        </form>
        @endforeach
    </div>
</body>
</html>