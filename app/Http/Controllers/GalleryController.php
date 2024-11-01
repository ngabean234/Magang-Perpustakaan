<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    public function index()
{
    $title = 'Daftar Galeri'; // atau isi sesuai kebutuhan
    $galleries = Gallery::all();
    return view('galeris.index', compact('title', 'galleries'));
}


    public function create()
    {
        return view('galeris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('gallery'), $imageName);

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => 'gallery/' . $imageName,
        ]);

        return redirect()->route('galeris.index')->with('success', 'Image added successfully');
    }

    public function show(Gallery $galeri)
    {
        return view('galeris.show', compact('galeri'));
    }

    public function edit(Gallery $galeri)
    {
        return view('galeris.edit', compact('galeri'));
    }

    public function update(Request $request, Gallery $galeri)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('gallery'), $imageName);
            $galeri->image_path = 'gallery/' . $imageName;
        }

        $galeri->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $galeri->image_path,
        ]);

        return redirect()->route('galeris.index')->with('success', 'Image updated successfully');
    }

    public function destroy(Gallery $galeri)
    {
        if (file_exists(public_path($galeri->image_path))) {
            unlink(public_path($galeri->image_path));
        }
        $galeri->delete();

        return redirect()->route('galeris.index')->with('success', 'Image deleted successfully');
    }
}

