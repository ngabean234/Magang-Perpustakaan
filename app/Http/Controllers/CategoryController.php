<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Book;

class CategoryController extends Controller
{
    public function index()
    {
        $title = 'Tambah Kategori';
        $data = Category::all();
        return view('kategory.index', compact('title', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required|max:10124'
        ]);

        $data = new Category();
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);

        $file = $request->file('photo');

        if ($file) {
            $nama_gambar = $file->getClientOriginalName();
            $file->move('category', $nama_gambar);
            $data->photo = $nama_gambar;
        }

        $data->save();

        session()->flash('sukses', 'Data Kategori berhasil dibuat !');

        return redirect('kategory');
    }

    public function edit($id)
    {
        $title = 'Edit Kategori';
        $dt = Category::find($id);
        return view('kategory.edit', compact('title', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:10124'
        ]);

        $data = Category::find($id);
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);

        $file = $request->file('photo');

        if ($file) {
            if ($data->photo && file_exists(public_path('category/' . $data->photo))) {
                unlink(public_path('category/' . $data->photo));
            }

            $nama_gambar = $file->getClientOriginalName();
            $file->move('category', $nama_gambar);
            $data->photo = $nama_gambar;
        }

        $data->save();

        session()->flash('sukses', 'Data Kategori berhasil diubah !');

        return redirect('kategory');
    }

    public function postbyCategory(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->load(['artikels' => function ($q) {
            $q->orderBy('created_at', 'asc')->paginate(8);
        }]);
        $title = "Kategori : $category->name";
        $kategori = Category::all();
        return view('category', compact('category', 'title', 'kategori'));
    }

    public function delete($id)
    {
        $category = Category::find($id);

        // Cek apakah kategori masih digunakan oleh buku
        $booksCount = Book::where('category_id', $id)->count();
        if ($booksCount > 0) {
            session()->flash('gagal', 'Gagal menghapus kategori karena masih digunakan oleh Buku.');
            return redirect()->back();
        }

        try {
            // Hapus file foto jika ada
            if ($category->photo && file_exists(public_path('category/' . $category->photo))) {
                unlink(public_path('category/' . $category->photo));
            }

            $category->delete();
            session()->flash('sukses', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            session()->flash('gagal', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->back();
    }
}
