<?php

namespace App\Http\Controllers;

use App\Models\LaporanKonselingIndividu;
use App\Models\laporanKonselingKelompok;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\rpl;
use App\Models\month;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\SendEmail;
use App\Models\LaporanKonseling;
use Illuminate\Support\Facades\Mail;

use PDO;

class RplController extends Controller
{
    public function fetch($month){
        $month = Route::current()->parameter('month');
        $item = DB::table('rpls')->where('month', '=', $month)->get();
        return view('pages/rpl/listRPL',compact('item','month'));
    }

    public function fetchMonth(){
        $item = month::all();
        return view('pages/rpl/jurnal_bulanan',compact('item'));
    }

    public function store(Request $request,$month){
        $data = $request->all();
        //Insert the value for these two column from the controller directly
        $data['tipe_dokumen'] = "rpl_bulanan";
        $data['month'] = $month;
        rpl::create($data);
        return redirect()->back()->with('success',"Data RPL Bulanan berhasil Ditambahkan!");
    }

    public function storeMonth(Request $request){
        $data = $request->all();
        month::create($data);
        return redirect()->back();
    }

    public function editRPLBulanan(){
        $id = Route::current()->parameter('id');
        $item = DB::table('rpls')->where('id','=',$id)->get();
        return view('pages/rpl/editListRPL',compact('item'));
    }

    public function editRPLBulananStore(Request $request){
        $id = Route::current()->parameter('id');
        DB::table('rpls')->where('id','=',$id)->update($request->except('_token'));
        $month = DB::table('rpls')->where('id','=',$id)->value('month');
        return redirect("/rpl-bulanan/listRpl/{$month}")->with('success', 'Data RPL Bulanan berhasil Diubah!');
    }

    public function deleteRPLBulanan(){
        $id = Route::current()->parameter('id');
        DB::table('rpls')->where('id','=',$id)->delete();
        return redirect()->back()->with('success',"Data RPL Bulanan Berhasil Dihapus!");
    }

    public function laporanKonselingIndiv(){
        $item = LaporanKonselingIndividu::all()->where('tipe_dokumen','=','laporan_individu');
        return view('pages/rpl/laporanKonselingIndividu',compact('item'));
    }

    public function laporanKonselingIndivStore(Request $request){
        $data = $request->all();
        LaporanKonselingIndividu::create($data);
        return redirect()->back()->with('success','Data Laporan Konseling Individu berhasil Ditambahkan!');
    }

    public function editLaporanKonselingIndiv(){
        $id =Route::current()->parameter('id');
        $item = DB::table('laporan_konselings')->where('id', '=', $id)->get();
        return view('pages/rpl/editLaporanKonselingIndiv',compact('item'));
    }

    public function editLaporanKonselingIndivStore(Request $request){
        $id =Route::current()->parameter('id');
        
        DB::table('laporan_konselings')->where('id', $id)->update($request->except('_token'));
        return redirect('/laporan-konseling-individu')->with("success","Data Laporan Konseling Individu Berhasil !");
    }

    public function deleteLaporanKonselingIndiv(){
        $id = Route::current()->parameter('id');
        DB::table('laporan_konselings')->where('id','=',$id)->delete();
        return redirect()->back()->with('success',"Data Laporan Konseling Individu berhasil Dihapus!");
    }

    public function rplKonselingIndiv(){
        $item = rpl::all()->where('tipe_dokumen','=','rpl_individu');
        return view('pages/rpl/rplKonsulIndividu',compact('item'));
    }

    public function deleteRPLKonselingIndiv(){
        $id = Route::current()->parameter('id');
        DB::table('rpls')->where('id','=',$id)->delete();
        return redirect()->back()->with('success','Data RPL Konseling Individu berhasil Dihapus!');
    }

    public function fetchWhereRPLIndividu(){
        $id = Route::current()->parameter('id');
        $item = DB::table('rpls')->where('id','=',$id)->get();
        return view('pages/rpl/editRPLIndividu',compact('item'));
    }

    public function editRPLKonselingIndiv(Request $request){
        $id = Route::current()->parameter('id');
        DB::table('rpls')->where('id','=',$id)->update($request->except('_token'));
        return redirect('rpl-konseling-individu')->with('success','Data RPL Konseling Individu berhasil !');
    }

    public function rplKonselingIndivStore(Request $request){
        $data = $request->all();
        rpl::create($data);
        return redirect()->back()->with('success','Data RPL Konseling Individu berhasil dibuat');
    }

    public function rplKonselingKelompok(){
        $item = rpl::all()->where('tipe_dokumen','=','rpl_kelompok');
        
        
        return view('pages/rpl/rplKonsulKelompok',compact('item'));
    }

    public function rplKonselingKelompokStore(Request $request){
        $data = $request->all();
        rpl::create($data);
        return redirect()->back()->with('success','Data RPL Konseling Kelompok berhasil dibuat');
        // rpl::create($data);
    }

    public function rplKonselingKelompokDelete(Request $request){
        $id = Route::current()->parameter('id');
        DB::table('rpls')->where('id',$id)->delete();
        return redirect()->back()->with('success','Data RPL Konseling Kelompok berhasil Dihapus!');
    }

    public function fetchWhereRPLKelompok(){
        $id = Route::current()->parameter('id');
        $item = rpl::all()->where('id','=',$id);
        return view('pages/rpl/editRPLKelompok',compact('item'));
    }

    public function updateRplKonselingKelompok(Request $request){
        $id =Route::current()->parameter('id');
        
        DB::table('rpls')->where('id', $id)->update($request->except('_token'));

        return redirect('/rpl-konseling-kelompok')->with("success","Data Laporan Konseling Individu Berhasil !");
    }


    public function showPDF(){
        $data = rpl::find(1);
        return view('pages/rpl/tempRPL',compact('data'));
    }

    public function printPdf(Request $request)
    {
        
        $id = Route::current()->parameter('id');
        $data = rpl::find($id); // Fetch the data as a model instance

        $document = Route::current()->parameter('document');

        if (!$data) {
            return redirect()->back()->withErrors('Data not found');
        }

        $pdf = Pdf::loadView("pages/rpl/$document", compact('data'));

        $currentDateTime = date('Y-m-d_H-i-s'); // Format: YYYY-MM-DD_HH-MM-SS

        // Generate the file path with the date and time as the filename
        $filePath = 'D:\Downloaded PDF\laporan-RPL-' . $currentDateTime . '.pdf';
    
        $pdf->save($filePath);

        // Prepare data for the email
        $emailData = [
            'message' => 'Here is your requested PDF file.'
        ];

        $emailOrangtua = $request->input('email'); 
        // Send the email with the PDF attachment
        Mail::to($emailOrangtua)->send(new SendEmail($emailData, $filePath));

// O    ptionally, delete the temporary file after sending the email
        // unlink($filePath);

        return redirect()->back()->with('success',"Email Berhasil dikirim");
    }

public function updateRplKonselingIndividu(Request $request)
    {
        // Get the ID from the route parameters
    $id = Route::current()->parameter('id');
    
    // Update the student's data in the database
    rpl::where('id', $id)->update([
        'kelas' => $request->input('kelas'),
        'tanggal_kegiatan' => $request->input('tanggal_kegiatan'),
        'nama_siswa'=>$request->input('nama_siswa'),
        'pertemuan_ke' => $request->input('pertemuan_ke'),
        'waktu' => $request->input('waktu'),
        'tempat' => $request->input('tempat'),
        'gejala' => $request->input('gejala'),
        'tipe_dokumen' => 'rpl_individu'
    ]);

    // Redirect to the /siswa route with a success message
    return redirect('/rpl-konseling-individu')->with('success', 'Data Siswa Berhasil Diubah!');
    }


public function savePDF(){
    $id = Route::current()->parameter('id');

    $document = Route::current()->parameter('document');
    $data = rpl::find($id); // Fetch the data as a model instance

    if (!$data) {
        return redirect()->back()->withErrors('Data not found');
    }

    $currentDateTime = date('Y-m-d_H-i-s'); // Format: YYYY-MM-DD_HH-MM-SS

    // Generate the file path with the date and time as the filename
    $filePath = 'D:\Downloaded PDF\laporan-' . $currentDateTime . '.pdf';

    $pdf = Pdf::loadView("pages/rpl/$document", compact('data'));
    // Save the PDF to a temporary location
    $month = DB::table('rpls')->where('id','=',$id)->value('month');
    $pdf->save($filePath);
    return redirect("/rpl-bulanan/listRpl/{$month}")->with('success','File berhasil di simpan ke folder D:\Downloaded PDF');
   
}

public function printPdfLaporanKonseling(Request $request)
{
    
    $id = Route::current()->parameter('id');
    $data = LaporanKonselingIndividu::find($id); // Fetch the data as a model instance

    

    if (!$data) {
        return redirect()->back()->withErrors('Data not found');
    }

    $pdf = Pdf::loadView("pages/rpl/pdfRplKonsulIndividu", compact('data'));

    // Save the PDF to a temporary location
    $filePath = 'D:\Downloaded PDF\laporan-hari-ini.pdf';
    $pdf->save($filePath);

    // Prepare data for the email
    $emailData = [
        'message' => 'Here is your requested PDF file.'
    ];

    $emailOrangtua = $request->input('email'); 
    // Send the email with the PDF attachment
    Mail::to($emailOrangtua)->send(new SendEmail($emailData, $filePath));

// O    ptionally, delete the temporary file after sending the email
    // unlink($filePath);

    return redirect()->back()->with('success',"Email Berhasil dikirim");
}


}

