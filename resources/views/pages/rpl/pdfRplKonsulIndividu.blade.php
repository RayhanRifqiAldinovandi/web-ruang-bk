<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            margin: auto;
            padding: 10px;
            padding-top: 6px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 800px;
        }
        .header{
            width: 100%;
            display: flex;
            flex-direction: row;
        }
        .center {
            display: flex;
            justify-content: start;
            margin-bottom: 16px;
        }
        .center img {
            position: absolute;
            margin-left: 35px;
            height: 100px;
        }
        .text-center {
            width: 100%;
            text-align: center;
            margin-bottom: 16px;
        }
        hr{
            margin-left: 2px;
            margin-right:2px;
            height: 5px;
            width: 100%;
            background-color: black;
        }
        .text-lg {
            font-size: 1.125rem;
        }
        .text-sm {
            font-size: 0.875rem;
            color: #718096;
        }
        .border-top {
            border-top: 1px solid black;
        }
        .flex-col {
            display: flex;
            flex-direction: column;
            margin-bottom: 16px;
        }
        .text-right {
            text-align: right;
            margin-bottom: 8px;
        }
        .mt-4 {
            margin-top: 16px;
        }
        .mb-2 {
            margin-bottom: 8px;
        }
        .flex-end {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 16px;
        }
        .flex-1 {
            flex: 1;
            text-align: right;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="center">
            <img src="{{storage_path('app/public/logo-clean.jpg')}}" alt="Logo 1">
        </div>
        <div class="text-center">
            <h2 class="text-lg">PEMERINTAH PROVINSI KALIMANTAN UTARA</h2>
            <h2 class="text-lg">DINAS PENDIDIKAN DAN KEBUDAYAAN</h2>
            <h2 class="text-lg">SMA NEGERI 3 TARAKAN</h2>
            <p class="text-sm">Jl.Pangeran Aji Iskandar RT. 06 Juata Kerikil Tarakan Kode Pos: 77116 <br> Telp: (0551) 2053120 Email: sma3.tarakan@yahoo.com Website www.sma3tarakan.sch.id</p>
            <hr class="border-top">
    </div>
    </div>       
    <div class="flex-col">
        <div class="text-right">
            <p>No: 24/A/Sek-Panpel/KSRPMI/X/2013<br>Lamp: -<br>Hal: UNDANGAN</p>
        </div>

        <div class="mb-2">
            <p>Kepada Yth :<br>Orang Tua/Wali Siswa<br>An. {{$data->nama}}<br>Di -<br>Tempat</p>
        </div>

        <div class="mb-2">
            <p>Dengan hormat,</p>
        </div>

        <div class="mb-2">
            <p>Berdasarkan sesi konseling ruang BK SMAN 3 Tarakan, berikut keterangan hasil konseling siswa A/N {{$data->nama}} <br>
               Kelas: {{$data->kelas}}
               Tanggal Kegiatan: {{$data->tanggal}} <br>
               Waktu: {{$data->waktu}} <br>
               Tempat: {{$data->tempat}} <br>
               Gejala Yang Nampak: {{$data->gejala}} <br>
        </div>
    </div>
    
    <div class="mt-4">
        <p>Demikian panggilan ini kami buat, atas perhatian Bapak/Ibu kami ucapkan terima kasih.</p>
        <br>
        <br>
        <div class="flex-end">
            <div class="flex-1">
                <p>Sekretaris Panitia<br><br><br><br><br><img src="path_to_signature_2.png" alt="Signature 2"><br>Siti Sarah, SE., M.Si<br><br>Penata TK. I/ III-d<br>NIP:19640518 200701 2 006</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
