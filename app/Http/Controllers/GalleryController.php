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
        $title = 'Tambah Galeri';
        return view('galeris.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required', // Validasi untuk kolom author
            'description' => 'required',
            'date_taken' => 'required|date', // Validasi untuk kolom date_taken
            'location' => 'required', // Validasi untuk kolom location
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('gallery'), $imageName);

        Gallery::create([
            'title' => $request->title,
            'author' => $request->author, // Menyimpan nilai author
            'description' => $request->description,
            'date_taken' => $request->date_taken, // Menyimpan nilai date_taken
            'location' => $request->location, // Menyimpan nilai location
            'image_path' => 'gallery/' . $imageName,
        ]);

        return redirect()->route('galeris.index')->with('success', 'Image added successfully');
    }

    public function show($id)
    {
        $gallery = Gallery::findOrFail($id); // Mengambil data galeri berdasarkan ID
        $title = 'Detail Galeri'; // Atur judul yang diinginkan
        return view('galeris.show', compact('gallery', 'title')); // Mengirim data ke view
    }

    public function edit(Gallery $galeri)
    {

        $title = 'Edit Galeri'; // Atur judul sesuai kebutuhan
        return view('galeris.edit', compact('galeri', 'title')); // Kirim galeri dan title ke view
    }

    public function update(Request $request, Gallery $galeri)
{
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'description' => 'required', 
        'date_taken' => 'required|date',
        'location' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if (file_exists(public_path($galeri->image_path))) {
            unlink(public_path($galeri->image_path));
        }
        
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('gallery'), $imageName);
        $galeri->image_path = 'gallery/' . $imageName;
    }

    $galeri->update([
        'title' => $request->title,
        'author' => $request->author,
        'description' => $request->description,
        'date_taken' => $request->date_taken,
        'location' => $request->location,
        'image_path' => $galeri->image_path,
    ]);

    return redirect()->route('galeris.index')->with('success', 'Gallery updated successfully');
}

    public function userIndex()
    {
        $title = 'Galeri Foto';
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(12);
        return view('galeri.index', compact('title', 'galleries'));
    }

    public function livesearch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = Gallery::where('title', 'LIKE', "%{$query}%")
                ->orWhere('author', 'LIKE', "%{$query}%")
                ->orWhere('location', 'LIKE', "%{$query}%")
                ->limit(5)
                ->get();

            $output = '<li class="list-group-item link-class">';

            foreach ($data as $row) {
                $output .= '
            <img src="' . asset($row->image_path) . '" height="50" width="40" style="object-fit: cover;"/> 
            <a style="font-size: 16px" href="' . route('galeri.show', $row->id) . '">' . $row->title . '</a>
            <br>
            <small><i class="fa fa-camera"></i> ' . $row->author . ' - <i class="fa fa-map-marker"></i> ' . $row->location . '</small>
            <hr>
            ';
            }
            $output .= '<center><button type="submit" class="btn btn-primary">Lihat Semua Pencarian</button></center> </li>';
            echo $output;
        }
    }

    public function userSearch(Request $request)
    {
        $title = 'Hasil Pencarian';
        $query = $request->input('search');
        $galleries = Gallery::where('title', 'LIKE', "%$query%")
            ->orWhere('author', 'LIKE', "%$query%")
            ->orWhere('location', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->paginate(12);

        return view('galeri.index', compact('galleries', 'query', 'title'));
    }

    public function details($id)
{
    $gallery = Gallery::findOrFail($id);
    $title = 'Detail Foto';
    return view('galeris.details', compact('gallery', 'title'));
}

    public function destroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);

            // Hapus file gambar dari penyimpanan
            if (file_exists(public_path($gallery->image_path))) {
                unlink(public_path($gallery->image_path));
            }

            $gallery->delete();
            Session::flash('sukses', 'Data berhasil dihapus !');
        } catch (\Exception $e) {
            Session::flash('gagal', 'Data gagal dihapus: ' . $e->getMessage());
        }

        return redirect()->route('galeris.index');
    }
}
