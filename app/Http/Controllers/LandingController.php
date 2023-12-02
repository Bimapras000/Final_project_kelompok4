<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Buku;

class LandingController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('landingpage', compact('buku')); // Mengarahkan ke tampilan landing.blade.php
    }

    // Jika ada logika atau fungsi lain yang dibutuhkan untuk landing page, bisa ditambahkan di sini.
    
}
