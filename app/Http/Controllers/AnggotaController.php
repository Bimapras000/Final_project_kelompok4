<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\DB;

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
        $anggota = new Anggota;
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
        return redirect('admin/anggota');
    }
}
