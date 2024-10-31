<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function add()
    {
        // Anda bisa menyiapkan data untuk view ini jika perlu
        return view('gallery.add', [
            'title' => 'Tambah Foto'
        ]);
    }

    // Menyimpan data gambar baru ke database
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Simpan file gambar di storage
    $path = $request->file('image')->store('public/gallery');

    // Simpan data galeri ke database
    Gallery::create([
        'title' => $request->title,
        'description' => $request->description,
        'image_path' => $path,
    ]);

    return redirect()->route('gallery.index')->with('success', 'Foto berhasil ditambahkan ke galeri!');
}


    // Menampilkan semua gambar di galeri
    public function index()
    {
        $galleries = Gallery::paginate(100); // Mengambil data dengan pagination
        $title = 'Galeri Foto'; // Atur judul sesuai kebutuhan
        return view('gallery.index', compact('galleries', 'title')); // Pastikan untuk menyertakan $title
    }
}
