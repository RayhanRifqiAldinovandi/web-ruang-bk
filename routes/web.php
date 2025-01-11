<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\database;
use App\Http\Controllers\RplController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware('auth');

route::get('/register',[database::class,'registerPage'])->middleware('guest');
route::post('/registerProcess',[database::class,'registerStore'])->middleware('guest');
route::get('/login',[database::class,'loginPage'])->middleware('guest')->name('login');
route::post('/loginProcess',[database::class,'login'])->middleware('guest');
Route::post('/logout', [database::class, 'logout'])->middleware('auth');

Route::get('/siswa', [database::class, 'index'])->name('siswa')->middleware('auth');
Route::get('/siswa',[database::class,'fetchSiswa'])->middleware('auth');

Route::get('/kelas',[database::class,'fetchKelas'])->middleware('auth');
Route::get('/kelas/edit/{id}',[database::class,'fetchWhereKelas'])->middleware('auth');
Route::post('/kelas/edit/{id}',[database::class,'editKelas'])->middleware('auth');
Route::post('/kelas/delete/{id}',[database::class,'deleteKelas'])->middleware('auth');

Route::post('/kelas/store',[database::class,'addKelas'])->middleware('auth');
Route::post('/siswa/store',[database::class,'addSiswa'])->middleware('auth');
Route::get('siswa/edit/{id}',[database::class,'fetchWhere'])->middleware('auth');

Route::post('siswa/delete/{id}',[database::class,'deleteSiswa'])->middleware('auth');
Route::get('siswa/search',[database::class,'searchSiswa'])->middleware('auth');

Route::post('siswa/store/{id}/update',[database::class,'updateSiswa'])->middleware('auth');
Route::get('/rpl-bulanan',[RplController::class,'fetchMonth'])->middleware('auth');
Route::get('/rpl-bulanan/listRpl/{month}',[RplController::class,'fetch'])->middleware('auth');
Route::post('/rpl-bulanan/{month}/listRplStore',[RplController::class,'store'])->middleware('auth');
Route::post('/rpl-bulanan/storeMonth',[RplController::class,'storeMonth'])->middleware('auth');
Route::get('/program-bk',[RplController::class,'storeMonth'])->middleware('auth');
Route::post('/rpl-bulanan/listRpl/{id}/',[RplController::class,'editRPLBulanan']);
Route::post('/rpl-bulanan/listRpl/{id}/update',[RplController::class,'editRPLBulananStore']);
Route::post('/rpl-bulanan/listRpl/{id}/delete',[RplController::class,'deleteRPLBulanan']);



Route::get('/laporan-konseling-individu',[RplController::class,'laporanKonselingIndiv'])->middleware('auth');
Route::post('/laporan-konseling-individu/store-laporan-konseling-individu',[RplController::class,'laporanKonselingIndivStore'])->middleware('auth');
Route::get('/laporan-konseling-individu/{id}',[RplController::class,'editLaporanKonselingIndiv'])->middleware('auth');
Route::post('/laporan-konseling-individu/{id}/delete',[RplController::class,'deleteLaporanKonselingIndiv'])->middleware('auth');
Route::post('/laporan-konseling-individu/{id}/update',[RplController::class,'editLaporanKonselingIndivStore'])->middleware('auth');


Route::get('/rpl-konseling-individu',[RplController::class,'rplKonselingIndiv'])->middleware('auth');
Route::post('/rpl-konseling-individu/store-rpl-konseling-individu',[RplController::class,'rplKonselingIndivStore'])->middleware('auth');
Route::get('/rpl-konseling-individu/{id}',[RplController::class,'fetchWhereRPLIndividu'])->middleware('auth');
Route::get('/rpl-konseling-individu/{id}/delete',[RplController::class,'deleteRPLKonselingIndiv'])->middleware('auth');

Route::get('/rpl-konseling-kelompok',[RplController::class,'rplKonselingKelompok'])->middleware('auth');
Route::post('/rpl-konseling-kelompok/store-rpl-konseling-kelompok',[RplController::class,'rplKonselingKelompokStore'])->middleware('auth');
Route::post('/rpl-konseling-kelompok/{id}/delete',[RplController::class,'rplKonselingKelompokDelete'])->middleware('auth');
Route::get('/rpl-konseling-kelompok/{id}',[RplController::class,'fetchWhereRPLKelompok'])->middleware('auth');
Route::post('/rpl-konseling-kelompok/{id}/update',[RplController::class,'updateRplKonselingKelompok'])->middleware('auth');

Route::get('/rpl-print/{id}/{document}',[RplController::class,'printPdf'])->middleware('auth'); 
Route::get('/laporan-print/{id}/',[RplController::class,'printPdfLaporanKonseling'])->middleware('auth');       
Route::post('/rpl-konseling-individu/{id}/update',[RplController::class,'updateRplKonselingIndividu'])->middleware('auth');
Route::get('/rpl-print',[RplController::class,'showPDF'])->middleware('auth');
Route::get('/rpl-bulanan-save/{id}/{document}',[RplController::class,'savePDF']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
