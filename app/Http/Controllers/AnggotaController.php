<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\DB;
use PDF;


class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view ('admin.anggota.index', compact('anggota'));
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
            'nama' => 'required|max:45',
            'alamat' => 'required|max:45',
            'no_tlp' => 'required|max:13',
            'tgl_bergabung' => 'required',
            'email' => 'required|max:50',
            'username' => 'required|max:45',
            'password' => 'required|min:8',
        ],
        [
            'nama.max' => 'Nama maximal 45 karakter',
            'nama.required' => 'Nama wabjib diisi',
            
            'alamat.required' => 'Alamat wajib diisi',
            'alamat.max' => 'Alamat maksimal 45 karakter',
            'no_tlp.required' => 'Nomor Telepon wajib diisi',
            'no_tlp.max' => 'Nomor Telepon maksimal 13 karakter',
            'tgl_bergabung.required' => 'Tanggal Bergabung wajib diisi',
            
            'email.required' => 'Email wajib diisi',
            'email.max' => 'Email maksimal 50 karakter',
            'username.required' => 'Username wajib diisi',
            'username.max' => 'username maksimal 45 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            
        ]);

        DB::table('anggota')->insert([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'no_tlp' => $request->no_tlp,
        'tgl_bergabung' => $request->tgl_bergabung,
        'email' => $request->email,
        'username' => $request->username,
        'password' => $request->password,

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
        $anggota = Anggota::all()->where('id', $id);
        return view('admin.anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $anggota = Anggota::find($request->id);
        $anggota->nama = $request->nama;
        $anggota->alamat = $request->alamat;
        $anggota->no_tlp = $request->no_tlp;
        $anggota->tgl_bergabung = $request->tgl_bergabung;
        $anggota->email = $request->email;
        $anggota->username = $request->username;
        $anggota->password = $request->password;
        $anggota->save();
        return redirect('admin/anggota');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('anggota')->where('id',$id)->delete();
        return redirect('admin/anggota')->with('success', 'Anggota Berhasil Dihapus!');;
    }

    public function anggotaPDF(){
        $anggota = Anggota::get();
        $pdf = PDF::loadView('admin.anggota.anggotaPDF', ['anggota' => $anggota])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
