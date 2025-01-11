<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\siswa;
use App\Models\kelas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class database extends Controller
{
    public function registerPage(){
        return view("register");
    }

    public function registerStore(Request $request){
        $credentials = $request->validate(
            [
                'name'=> 'required|string|max:255',
                'email' => 'required|string|max:255',
                'password' => 'required|min:8|max:255'
            ]
            );
            $credentials['password'] = bcrypt($credentials['password']); 
            User::create($credentials);

            session()->flash("success","Sukses Registrasi User, Silakan Login");
            return redirect('/login');
    }

    public function loginPage(){
        return view("login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
    
                'email' => 'required|string|max:255',
                'password' => 'required|min:8|max:255'
            ]
            );
        
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
               return redirect()->intended('/');
            }
        
            return back()->with("failed","Login Gagal");
        
    }

    public function logout (Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }

    //
    public function indexSiswa (){
        return view("pages/database/siswa");
    }

    public function fetchSiswa(){
        $list = siswa::all();
        $list_kelas = kelas::all();
        return view("pages/database/siswa",compact('list','list_kelas'));
    }
    
    public function fetchKelas()
    {
        $list = kelas::withCount('Siswa')->get();
        return view("pages/database/kelas",compact('list'));
    }

    public function addSiswa(Request $request)
    {
        $data = $request->all();
        siswa::create($data);
        session()->flash('success','Siswa Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function fetchWhere(){
        $id = Route::current()->parameter('id');
        $item = DB::table('siswa')->where('id', '=', $id)->get();
        $item_kelas = kelas::all();
        return view('pages/database/editSiswa', compact('item','item_kelas'));
      }

    public function updateSiswa(Request $request)
    {
        // Get the ID from the route parameters
    $id = Route::current()->parameter('id');
    
    // Validate the incoming request data
    $request->validate([
        'nama_siswa' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'kelas_id' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string',
    ]);

    // Update the student's data in the database
    DB::table('siswa')->where('id', $id)->update([
        'nama_siswa' => $request->input('nama_siswa'),
        'email' => $request->input('email'),
        'kelas_id'=>$request->input('kelas_id'),
        'jenis_kelamin' => $request->input('jenis_kelamin'),
    ]);

    // Redirect to the /siswa route with a success message
    return redirect('/siswa')->with('success', 'Data Siswa Berhasil Diubah!');
    }

    public function addKelas(Request $request)
    {
        $data = $request->all();
        kelas::create($data);
        return redirect()->back()->with('success','Data Kelas Berhasil Ditambahkan');
    }

    public function fetchWhereKelas(){
        $id = Route::current()->parameter('id');
        $item = DB::table('kelas')->where('id', '=', $id)->get();
        return view('pages/database/editKelas', compact('item'));
    }


    public function editKelas(Request $request){
        $id = Route::current()->parameter('id');
        DB::table('kelas')->where('id',$id)->update([
            'kelas'=>$request->input('kelas'),
        'tingkatan'=>$request->input('tingkatan')
        ]);
        return redirect('/kelas')->with('success','Data Kelas Berhasil Diubah');
    }

    public function deleteKelas(){
        $id = Route::current()->parameter('id');
        DB::table('kelas')->where('id',$id)->delete();
        DB::table('siswa')->where('kelas_id',$id)->delete();
        return redirect('/kelas')->with('success', 'Data Kelas Berhasil Dihapus!');
    }

    public function deleteRplKonselingKelompok(Request $request)
    {
        $id = Route::current()->parameter('id');
        DB::table('kelas')->where('id',$id)->delete();
        return redirect('/kelas')->with('success','Data Kelas Berhasil Dihapus');
    }

    public function deleteSiswa(){
        $id = Route::current()->parameter('id');

        DB::table('siswa')->where('id',$id)->delete();

        return redirect('/siswa')->with('success', 'Data Siswa Berhasil Dihapus!');
    }

    public function searchSiswa(Request $request){
        $cari = $request->search;
        $list_kelas = Kelas::all(); // Assuming Kelas is a model and it's capitalized based on convention
        $list = Siswa::where('nama_siswa', 'like', "%".$cari."%")->paginate();
        return view("pages/database/siswa", compact('list','list_kelas'));
    }
}
