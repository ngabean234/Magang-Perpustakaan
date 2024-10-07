<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllbookController extends Controller
{
    public function index()
    {
        $title= 'Daftar Buku';
        $book = Book::where('user_id', 1)->latest()->paginate(8);
        $kategori = Category::all();
        return view('books.index', compact('title','book','kategori'));
    }


    public function livesearch(Request $request)
    {
        if ($request->get('query')) 
        {
            $query = $request->get('query');
            $data = DB::table('books')
            ->where('judul', 'LIKE', "%{$query}%")
            ->limit(5)
            ->get();
            $output = '<li class="list-group-item link-class">';
            
            foreach ($data as $row) {
                if($row->user_id == 1){
                    $output .= '
                    <img src="/cover/'.$row->cover.'" height="50" width="40" /> <a style="font-size: 16px" href="/book/details/'.$row->slug.'">' . $row->judul . '</a><hr>
                    ';
                }   
            }
            $output .= '<center><button type="submit" class="btn btn-primary">Lihat Semua Pencarian</button></center> </li>';
            echo $output;
        }
    }
}
