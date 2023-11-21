<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Support\Facades\DB;
use PDF;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $petugas = Petugas::all();
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
            'nama' => 'required|max:45',
            'email' => 'required|max:50',
            'username' => 'required|max:45',
            'password' => 'required|min:8',
        ],
        [
            'nama.max' => 'Nama maximal 45 karakter',
            'nama.required' => 'Nama wabjib diisi',
            'email.required' => 'Email wajib diisi',
            'email.max' => 'Email maksimal 50 karakter',
            'username.required' => 'Username wajib diisi',
            'username.max' => 'username maksimal 45 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            
        ]);

        DB::table('petugas')->insert([
        'nama' => $request->nama,
        'email' => $request->email,
        'username' => $request->username,
        'password' => $request->password,

        ]);
        return redirect('admin/petugas')->with('success', 'Berhasil Menambahkan Petugas');
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
        $petugas = Petugas::all()->where('id', $id);
        return view('admin.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'nama' => 'required|max:45',
            'email' => 'required|max:50',
            'username' => 'required|max:45',
            'password' => 'required|min:8',
        ],
        [
            'nama.max' => 'Nama maximal 45 karakter',
            'nama.required' => 'Nama wabjib diisi',
            'email.required' => 'Email wajib diisi',
            'email.max' => 'Email maksimal 50 karakter',
            'username.required' => 'Username wajib diisi',
            'username.max' => 'username maksimal 45 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            
        ]);

        DB::table('petugas')->where('id', $request->id)->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'username' => $request->username,
        'password' => $request->password,

        ]);
        return redirect('admin/petugas')->with('success', 'Berhasil Update Petugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('petugas')->where('id',$id)->delete();
        return redirect('admin/petugas')->with('success', 'Petugas Berhasil DiHapus!');;
    }

    public function petugasPDF(){
        $petugas = Petugas::get();
        $pdf = PDF::loadView('admin.petugas.petugasPDF', ['petugas' => $petugas])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
