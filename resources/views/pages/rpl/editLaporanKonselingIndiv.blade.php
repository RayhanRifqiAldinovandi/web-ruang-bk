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
    <div class="my-10 mx-5">
        <div class="font-bold size my-5 text-2xl">
            <h1>Ubah Data Laporan RPL Individu</h1>
        </div>
        @foreach ($item as $i)    
        <form id="laporanKonselingIndividuForm" action="/laporan-konseling-individu/{{$i->id}}/update" method="POST">
            @csrf
            <div class="py-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Konseli</label>
                <input type="text" value="{{$i->nama}}"  name="nama" id="kelas" class=" max-w-2xl border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Kelas</label>
                <input type="text"  value="{{$i->kelas}}" name="kelas" id="kelas" class="max-w-2xl border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="kelas" class="block text-sm font-medium text-gray-700">Hari/Tanggal</label>
                <input type="date" value="{{$i->tanggal}}"  name="tanggal" id="kelas" class="max-w-2xl border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="kelas" class="block text-sm font-medium text-gray-700">Pertemuan Ke</label>
                <input type="text" value="{{$i->pertemuan_ke}}"  name="pertemuan_ke" id="kelas" class="max-w-2xl border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="kelas" class="block text-sm font-medium text-gray-700">Waktu</label>
                <input type="time" value="{{$i->waktu}}" name="waktu" id="kelas" class="max-w-2xl border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="kelas" class="block text-sm font-medium text-gray-700">Tempat</label>
                <input type="text"value="{{$i->tempat}}"  name="tempat" id="kelas" class="max-w-2xl border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="kelas" class="block text-sm font-medium text-gray-700">Gejala Yang Nampak</label>
                <textarea
                    name="gejala"
                    class="mt-1 text-left textarea textarea-bordered w-full">
                    {{$i->hasil}}
            </textarea>
            </div>
            <div class="py-4 hidden">
                <input type="text" name="tipe_dokumen" id="tipe_dokumen" value="laporan_individu" class="border px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="modal-action">
                <button type="submit" class="btn bg-orange-400 hover:bg-orange-500">Simpan</button>
            </div>
        </form>
        @endforeach
    </div>
</body>
</html>