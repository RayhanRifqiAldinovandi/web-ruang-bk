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
    
    <div class="my-5 mx-5 font-customFont">
        <div class="font-bold size my-5 text-2xl">
            <h1>Ubah Data RPL</h1>
        </div>
        @foreach($item as $i)
        <form id="rplForm" action="/rpl-bulanan/listRpl/{{$i->id}}/update" method="POST">
            @csrf
            <div class="py-4">
                <label for="tanggal_kegiatan" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" value="{{$i->tanggal_kegiatan}}"  name="tanggal_kegiatan" id="tanggal_kegiatan" class="input px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="nama_siswa" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                <input type="text" value="{{$i->nama_siswa}}" name="nama_siswa" id="nama_siswa" class="input px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="deskripsi_pelanggaran" class="block text-sm font-medium text-gray-700">Deskripsi Pelanggaran</label>
                <input type="text" value="{{$i->deskripsi_pelanggaran}}" name="deskripsi_pelanggaran" id="deskripsi_pelanggaran" class="input px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
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
                <input type="text" value="{{$i->layanan}}" name="layanan" id="layanan" class="input px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="tindak_lanjut" class="block text-sm font-medium text-gray-700">Tindak Lanjut</label>
                <input type="text" value="{{$i->tindak_lanjut}}" name="tindak_lanjut" id="tindak_lanjut" class="input px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
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
            </div>
        </form>
        @endforeach
    </div>
</body>
</html>