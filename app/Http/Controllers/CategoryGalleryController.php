<?php

namespace App\Http\Controllers;

use App\Models\CategoryGallery;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryGalleryController extends Controller
{
    public function index()
    {
        $title = 'Daftar Kategori Galeri';
        $category_gallery_id = CategoryGallery::withCount('galleries')->get();
        return view('kategory galeri.index', compact('category_gallery_id', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Kategori';
        return view('kategory galeri.add', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required|max:10124'
        ]);

        $data = new CategoryGallery();
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);

        $file = $request->file('photo');

        if ($file) {
            $nama_gambar = $file->getClientOriginalName();
            $file->move('kategori', $nama_gambar);
            $data->photo = $nama_gambar;
        }

        $data->save();

        session()->flash('sukses', 'Data Kategori Galeri berhasil dibuat !');

        return redirect('category-gallery');
    }

    public function edit($id)
    {
        $title = CategoryGallery::findOrFail($id);
        $dt = 'Edit Kategori Galeri';
        return view('kategory galeri.edit', compact('title', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:10124'
        ]);

        $data = CategoryGallery::find($id);
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);

        $file = $request->file('photo');

        if ($file) {
            // Hapus foto lama jika ada
            if ($data->photo && file_exists(public_path('kategori/' . $data->photo))) {
                unlink(public_path('kategori/' . $data->photo));
            }
            
            $nama_gambar = $file->getClientOriginalName();
            $file->move('kategori', $nama_gambar);
            $data->photo = $nama_gambar;
        }

        $data->save();

        session()->flash('sukses', 'Data Kategori Galeri berhasil diubah !');

        return redirect('category-gallery');
    }

    public function destroy($id)
    {
        $category = CategoryGallery::find($id);
        
        // Cek apakah kategori masih digunakan oleh galeri
        $galleriesCount = Gallery::where('category_gallery_id', $id)->count();
        if ($galleriesCount > 0) {
            session()->flash('gagal', 'Gagal menghapus kategori karena masih digunakan oleh Galeri.');
            return redirect()->back();
        }

        try {
            // Hapus file foto jika ada
            if ($category->photo && file_exists(public_path('kategori/' . $category->photo))) {
                unlink(public_path('kategori/' . $category->photo));
            }
            
            $category->delete();
            session()->flash('sukses', 'Data berhasil dihapus!');
            
        } catch(\Exception $e) {
            session()->flash('gagal', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->back();
    }
}