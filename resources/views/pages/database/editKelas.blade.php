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
            <h1>Ubah Data Siswa</h1>
        </div>
        @foreach($item as $i)
        <form id="kelasForm" action="/kelas/edit/{{$i->id}}" method="POST">
            @csrf
            <div class="py-4">
                <label for="nama_siswa" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                <input type="text" value="{{$i->kelas}}" name="kelas" id="kelas" class=" input input-bordered px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="py-4">
                <label for="kelas" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text"value="{{$i->tingkatan}}" name="tingkatan" id="kelas" class="input input-bordered px-3 py-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            </div>
            <div class="modal-action">
                <button type="submit" class="btn bg-orange-400 hover:bg-orange-500">Simpan</button>
            </div>
        </form>
        @endforeach
    </div>
</body>
</html>