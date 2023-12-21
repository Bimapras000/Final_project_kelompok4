<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;


class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
       
        return view ('admin.anggota.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.anggota.index');
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
            // 'foto' => 'required|min:8',
        ],
        [
            'name.max' => 'Nama maximal 45 karakter',
            'name.required' => 'Nama wabjib diisi',
            
            'alamat.required' => 'Alamat wajib diisi',
            'alamat.max' => 'Alamat maksimal 45 karakter',
            'no_tlp.required' => 'Nomor Telepon wajib diisi',
            'no_tlp.max' => 'Nomor Telepon maksimal 13 karakter',
            'tgl_bergabung.required' => 'Tanggal Bergabung wajib diisi',
            
            'email.required' => 'Email wajib diisi',
            'email.max' => 'Email maksimal 50 karakter',
            'email.unique' => 'Email sudah digunakan Anggota lain',

            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',

            // 'foto.required' => 'Foto harus diisi',
            
        ]);

        DB::table('users')->insert([
        // 'foto' => $request->foto,
        'name' => $request->name,
        'alamat' => $request->alamat,
        'no_tlp' => $request->no_tlp,
        'tgl_bergabung' => $request->tgl_bergabung,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role = 'anggota',
        
        ]);
        return redirect('admin/anggota')->with('success', 'Berhasil Menambahkan Anggota');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::all()->where('id', $id);
        $roles = User::distinct('role')->pluck('role');
        return view('admin.anggota.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:45',
            'alamat' => 'required|max:45',
            'no_tlp' => 'required|max:13',
            'tgl_bergabung' => 'required',
            'email' => 'required|max:50',
            'password' => 'required|min:8',
            'role' => 'required',
            // 'foto' => 'required|min:8',
        ],
        [
            'name.max' => 'Nama maximal 45 karakter',
            'name.required' => 'Nama wabjib diisi',
            
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

        DB::table('users')->where('id', $request->id)->update([
        // 'foto' => $request->foto,
        'name' => $request->name,
        'alamat' => $request->alamat,
        'no_tlp' => $request->no_tlp,
        'tgl_bergabung' => $request->tgl_bergabung,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role ,
        

        
        ]);
        return redirect('admin/anggota')->with('success', 'Berhasil Mengedit Anggota!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('users')->where('id',$id)->delete();
        return redirect('admin/anggota')->with('success', 'Anggota Berhasil Dihapus!');;
    }

    public function anggotaPDF(){
        $anggota = User::get();
        $pdf = PDF::loadView('admin.anggota.anggotaPDF', ['anggota' => $anggota])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
