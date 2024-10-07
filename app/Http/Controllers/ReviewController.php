<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $title = 'Data Review Anggota';
        $data = Comment::orderBy('created_at', 'desc')->where('role_id', 2)->get();
        return view('review.index', compact('title','data'));
    }

    public function review($id)
    {
        $title = 'Detail Review';
        $dt = Comment::find($id);
        return view('review.review', compact('title', 'dt'));
    }

    public function delete($id)
    {
        Comment::find($id)->delete();

        \Session::flash('sukses', 'Data Berhasil diHapus');

        return redirect()->back();
    }

    public function store(Request $request, Comment $id)
    {

        $data = new Comment();
        $data->book_id = $request->book_id;
        $data->text = $request->text;
        $data->user_id = Auth::id();
        $data->role_id = 1;

        $data->save();

        \Session::flash('sukses','Komentar berhasil terkirim ');
        return redirect('review');
    }
}
