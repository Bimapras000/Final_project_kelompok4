<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Petugas;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

class DashboardController extends Controller
{
    //fungsi index 
    public function index(){
        $users = User::count();
        $totalAnggota = User::where('role', 'anggota')->count();
        $totalPetugas = User::where('role', 'petugas')->count();
        $buku = Buku::count();
        $kategori = Kategori::count();
        $peminjaman = Peminjaman::count();
        $pengembalian = Pengembalian::count();
        // $penerbit_id = DB::table('buku')
        // ->selectRaw('penerbit_id, count(penerbit_id) as jumlah')
        // ->groupBy('penerbit_id')
        // ->get();
        $penerbit_info = Buku::join('penerbit', 'buku.penerbit_id', '=', 'penerbit.id')
        ->selectRaw('penerbit.nama, count(buku.penerbit_id) as jumlah')
        ->groupBy('buku.penerbit_id', 'penerbit.nama')
        ->get();
        $kategori_info = Buku::join('kategori', 'buku.kategori_id', '=', 'kategori.id')
        ->select('kategori.nama as nama', DB::raw('COUNT(buku.id) as total'))
        ->groupBy('kategori.nama')
        ->get();
        return view('admin.dashboard', compact('users','totalAnggota','totalPetugas', 'buku', 'kategori', 'pengembalian','penerbit_info', 'kategori_info'));

    }

    public function show(){
        
        $user = User::findOrFail(Auth::id());
        return view('admin.resetpassword', compact('user'));
    }

    public function update(Request $request)
{
    $request->validate([
        'old_password' => 'nullable|string',
        'password' => 'nullable|required_with:old_password|string|confirmed|min:6'
    ]);

    $user = Auth::user();

    if ($request->filled('old_password')) {
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save(); // Simpan perubahan password ke dalam database
        } else {
            return back()
                ->withErrors(['old_password' => __('Tolong Periksa Password')])
                ->withInput();
        }
    }
    return redirect()->back()->with('success', 'Password berhasil diubah');
}

    public function showprofile(){

        $user = User::findOrFail(Auth::id());
        return view('admin.profile', compact('user'));
    }

    public function updateprofil(Request $request, $id){
    
        $user = User::find($id);

    // if ($request->hasFile('foto')) {
    //     if ($user->foto && file_exists(storage_path('app/public/fotos/' . $user->foto))) {
    //         Storage::delete('app/public/fotos/' . $user->foto);
    //     }
        
    //     $file = $request->file('foto');
    //     $fileName = $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
    //     $file->move(storage_path('app/public/fotos/'), $fileName);
        
    //     // Perbarui nama file foto di database
    //     $user->foto = $fileName;
    // }

    // Simpan data lain yang diperlukan
    // $user->save();

    // return back()->with('status','Profil Update!');
    
    if ($request->hasFile('foto')) {
        if ($user->foto && file_exists(storage_path('app/public/fotos/' . $user->foto))) {
            Storage::delete('app/public/fotos/' . $user->foto);
        }
        $file = $request->file('foto');
        $fileName = $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
        $file->move(storage_path('app/public/fotos/'), $fileName);
        $user->foto = $fileName;
    $user->save();
    return back()->with('status','Profil Update!');

    }
}

}
