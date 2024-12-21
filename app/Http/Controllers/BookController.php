<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $title = 'Data Buku';
        $data = Book::orderBy('created_at', 'asc')->get();
        return view('book.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah data buku';
        $category = Category::all();
        return view('book.add', compact('title', 'category'));
    }

    public function store(Request $request)
    {
        // Validasi untuk memastikan file yang diupload adalah PDF
        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'cover' => 'required|image|max:10240',  // Validasi cover harus gambar dan maksimal 10MB
            'file_buku' => 'required|mimes:pdf|max:10240',  // Validasi file PDF dan maksimal 10MB
        ]);

        // Membuat objek data buku baru
        $data = new Book();
        $data->judul = $request->judul;
        $data->slug = Str::slug($request->judul);
        $data->user_id = Auth::id();
        $data->ringkasan = $request->ringkasan;
        $data->penulis = $request->penulis;
        $data->penerbit = $request->penerbit;
        $data->jml_halaman = $request->jml_halaman;
        $data->category_id = $request->category_id;

        // Mengelola file cover
        if ($cover = $request->file('cover')) {
            $namacover = $cover->getClientOriginalName();
            $cover->move(public_path('cover'), $namacover);  // Menyimpan file di folder 'public/cover'
            $data->cover = $namacover;  // Menyimpan nama file cover
        }

        // Mengelola file PDF buku
        if ($file = $request->file('file_buku')) {
            $namafile = $file->getClientOriginalName();
            $file->move(public_path('filebook'), $namafile);  // Menyimpan file di folder 'public/filebook'
            $data->file_path = $namafile;  // Menyimpan nama file PDF
        }

        // Menyimpan data buku ke database
        $data->save();
        // Flash message untuk sukses
        session()->flash('sukses', 'Data berhasil dibuat');

        // Redirect kembali ke halaman daftar buku
        return redirect('book');
    }

    public function detail($id)
    {
        $dt = Book::find($id);
        $title = 'Detail Buku';
        return view('book.detail', compact('dt', 'title'));
    }

    public function details($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $title = 'Detail Buku';

        $postkey = 'post_' . $book->id;
        if (!Session::has($postkey)) {
            $book->increment('view_count');
            Session::put($postkey, 1);
        }

        $comment = Comment::all();
        return view('book.details', compact('book', 'title', 'comment'));
    }

    public function read($slug)
    {
        $book = Book::where('slug', $slug)->first();
        return view('book.read', compact('book'));
    }

    public function edit($id)
    {
        $title = 'Edit Buku';
        $dt = Book::find($id);
        $category = Category::all();
        return view('book.edit', compact('title', 'dt', 'category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'cover' => 'nullable|image|max:10240',  // Validasi cover opsional
            'file_buku' => 'nullable|mimes:pdf|max:30720',  // Validasi file PDF opsional
        ]);

        $data = Book::findOrFail($id);
        $data->judul = $request->judul;
        $data->slug = Str::slug($request->judul);
        $data->user_id = Auth::id();
        $data->ringkasan = $request->ringkasan;
        $data->penulis = $request->penulis;
        $data->penerbit = $request->penerbit;
        $data->jml_halaman = $request->jml_halaman;
        $data->category_id = $request->category_id;

        // Mengelola file cover jika ada upload baru
        if ($cover = $request->file('cover')) {
            // Hapus cover lama jika ada
            if ($data->cover && file_exists(public_path('cover/' . $data->cover))) {
                unlink(public_path('cover/' . $data->cover));
            }
            $namacover = $cover->getClientOriginalName();
            $cover->move(public_path('cover'), $namacover);
            $data->cover = $namacover;
        }

        // Mengelola file PDF jika ada upload baru
        if ($file = $request->file('file_buku')) {
            // Hapus file lama jika ada
            if ($data->file_path && file_exists(public_path('filebook/' . $data->file_path))) {
                unlink(public_path('filebook/' . $data->file_path));
            }
            $namafile = $file->getClientOriginalName();
            $file->move(public_path('filebook'), $namafile);
            $data->file_path = $namafile;
        }

        $data->save();

        session()->flash('sukses', 'Data berhasil diubah');
        return redirect('book');
    }

    public function addreview(Request $request, Book $post)
    {
        $request->validate([
            'text' => 'required'
        ]);

        $data = new Comment();
        $data->user_id = Auth::id();
        $data->book_id = $post->id;
        $data->text = $request->text;
        $data->role_id = 2;

        $data->save();

        session()->flash('sukses', 'Terimakasih atas reviewnya!');

        return redirect()->back();
    }

    public function delete($id)
    {
        try {
            $book = Book::findOrFail($id);
            
            // Hapus file cover jika ada
            if ($book->cover && file_exists(public_path('cover/' . $book->cover))) {
                unlink(public_path('cover/' . $book->cover));
            }

            // Hapus file PDF buku jika ada
            if ($book->file_path && file_exists(public_path('filebook/' . $book->file_path))) {
                unlink(public_path('filebook/' . $book->file_path));
            }

            // Hapus data dari database
            $book->delete();
            
            session()->flash('sukses', 'Data buku berhasil dihapus!');
            return redirect()->back();
            
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus buku: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
