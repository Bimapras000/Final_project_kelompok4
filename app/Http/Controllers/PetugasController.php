<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $petugas = User::all();
            return view ('admin.petugas.index', compact('petugas'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:45',
            'alamat' => 'required|max:45',
            'no_tlp' => 'required|max:13',
            'tgl_bergabung' => 'required',
            'email' => 'required|unique:users|max:50',
            'password' => 'required|min:8',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            // 'foto' => 'required|min:8',
        ],
        [
            'name.max' => 'Nama maximal 45 karakter',
            'name.required' => 'Nama wabjib diisi',
            
            'foto.max' => 'Maksimal 2 MB',
            'foto.image' => 'File ekstensi harus jpg,jpeg,gif,svg,png,webp',

            'alamat.required' => 'Alamat wajib diisi',
            'alamat.max' => 'Alamat maksimal 45 karakter',
            'no_tlp.required' => 'Nomor Telepon wajib diisi',
            'no_tlp.max' => 'Nomor Telepon maksimal 13 karakter',
            'tgl_bergabung.required' => 'Tanggal Bergabung wajib diisi',
            
            'email.required' => 'Email wajib diisi',
            'email.max' => 'Email maksimal 50 karakter',
            'email.unique' => 'Email sudah digunakan pada Petugas lain',

            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',

            // 'foto.required' => 'Foto harus diisi',
            
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName(); // Memberikan nama unik untuk file
            $file->move(public_path('storage/fotos/'), $fileName); 
        } else {
            $fileName = null; // Atau beri nilai default jika tidak ada file yang diunggah
        }

        DB::table('users')->insert([
        'foto' => $fileName,
        'name' => $request->name,
        'alamat' => $request->alamat,
        'no_tlp' => $request->no_tlp,
        'tgl_bergabung' => $request->tgl_bergabung,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role = 'petugas',
        
        ]);
        return redirect('admin/petugas')->with('success', 'Berhasil Menambahkan Petugas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::find($id);

        if (!$user) {
            return redirect('admin/petugas')->with('error', 'petugas tidak ditemukan');
        }
    
        return view('admin.petugas.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::all()->where('id', $id);
        $roles = User::distinct('role')->pluck('role');
        return view('admin.petugas.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'name' => 'required|max:45',
            'alamat' => 'required|max:45',
            'no_tlp' => 'required|max:13',
            'tgl_bergabung' => 'required',
            'email' => 'required|max:50',
            'password' => 'required|min:8',
            'role' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            // 'foto' => 'required|min:8',
        ],
        [
            'name.max' => 'Nama maximal 45 karakter',
            'name.required' => 'Nama wabjib diisi',
            

            'foto.max' => 'Maksimal 2 MB',
            'foto.image' => 'File ekstensi harus jpg,jpeg,gif,svg,png,webp',

            'alamat.required' => 'Alamat wajib diisi',
            'alamat.max' => 'Alamat maksimal 45 karakter',
            'no_tlp.required' => 'Nomor Telepon wajib diisi',
            'no_tlp.max' => 'Nomor Telepon maksimal 13 karakter',
            'tgl_bergabung.required' => 'Tanggal Bergabung wajib diisi',
            
            'email.required' => 'Email wajib diisi',
            'email.max' => 'Email maksimal 50 karakter',

            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',

            'role.required' => 'Role harus diisi',
            // 'foto.required' => 'Foto harus diisi',
            
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName(); // Memberikan nama unik untuk file
            $file->move(public_path('storage/fotos/'), $fileName); 
        } else {
            $fileName = null; // Atau beri nilai default jika tidak ada file yang diunggah
        }

        DB::table('users')->where('id', $request->id)->update([
        'foto' => $fileName,
        'name' => $request->name,
        'alamat' => $request->alamat,
        'no_tlp' => $request->no_tlp,
        'tgl_bergabung' => $request->tgl_bergabung,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role ,
        

        
        ]);
        return redirect('admin/petugas')->with('success', 'Berhasil Mengedit Petugas!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('users')->where('id',$id)->delete();
        return redirect('admin/petugas')->with('success', 'Petugas Berhasil DiHapus!');;
    }

    public function petugasPDF(){
        $petugas = User::get();
        $pdf = PDF::loadView('admin.petugas.petugasPDF', ['petugas' => $petugas])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
