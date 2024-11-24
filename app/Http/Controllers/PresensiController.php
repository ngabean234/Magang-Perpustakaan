<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;

class PresensiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_pengunjung' => 'required',
            'nama' => 'required'
        ]);

        Presensi::create([
            'kode_pengunjung' => $request->kode_pengunjung,
            'nama' => $request->nama,
            'tanggal' => now()
        ]);

        return redirect()->back()->with('success', 'Presensi berhasil disimpan');
    }
} 