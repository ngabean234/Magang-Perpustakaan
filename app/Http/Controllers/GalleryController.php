<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\CategoryGallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    public function index()
    {
        $title = 'Daftar Galeri';
        $galleries = Gallery::with('category')->get();
        return view('galeris.index', compact('title', 'galleries'));
    }
    public function create()
    {
        $title = 'Tambah Galeri';
        $categoryGalleries = CategoryGallery::all();
        return view('galeris.create', compact('title', 'categoryGalleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'date_taken' => 'required|date',
            'location' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_gallery_id' => 'required|exists:category_galleries,id',
        ]);

        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('gallery'), $filename);

        Gallery::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'date_taken' => $request->date_taken,
            'location' => $request->location,
            'image_path' => 'gallery/' . $filename,
            'category_gallery_id' => $request->category_gallery_id,
        ]);

        return redirect()->route('galeris.index');
    }

    public function show($id)
    {
        $gallery = Gallery::findOrFail($id); // Mengambil data galeri berdasarkan ID
        $title = 'Detail Galeri'; // Atur judul yang diinginkan
        return view('galeris.show', compact('gallery', 'title')); // Mengirim data ke view
    }

    public function edit($id)
    {
        $title = 'Edit Galeri';
        $gallery = Gallery::findOrFail($id);
        $categoryGalleries = CategoryGallery::all();
        return view('galeris.edit', compact('title', 'gallery', 'categoryGalleries'));
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
            'category_gallery_id' => 'required|exists:category_galleries,id',
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
            'category_gallery_id' => $request->category_gallery_id,
            'image_path' => $galeri->image_path,
        ]);

        return redirect()->route('galeris.index');
    }

    public function userIndex()
    {
        $title = 'Galeri Foto';
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(12);
        $categoryGalleries = CategoryGallery::all();
        return view('galeri.index', compact('title', 'galleries', 'categoryGalleries'));
    }

    public function livesearch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = Gallery::where('title', 'LIKE', "%{$query}%")
                ->limit(5)
                ->get();
            $output = '<li class="list-group-item link-class">';

            foreach ($data as $row) {
                $output .= '
            <img src="' . asset($row->image_path) . '" height="50" width="40" style="object-fit: cover;"/> 
            <a style="font-size: 16px" href="' . route('galeri.details', $row->id) . '">' . $row->title . '</a>
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

    public function showCategory($slug)
    {
        $category = CategoryGallery::where('slug', $slug)->first();
        $title = 'Kategori ' . $category->name;
        $galleries = Gallery::where('category_gallery_id', $category->id)->paginate(12);
        $categoryGalleries = CategoryGallery::all();
        return view('galeri.index', compact('title', 'galleries', 'categoryGalleries'));
    }

    public function destroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            
            // Hapus file gambar
            if (file_exists(public_path($gallery->image_path))) {
                unlink(public_path($gallery->image_path));
            }
            
            $gallery->delete();
            
            return redirect()->route('galeris.index');
        } catch (\Exception $e) {
            return redirect()->route('galeris.index');
        }
    }
    
}
