<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Dashboard';
        $kategori = Category::all();
        $book = Book::where('user_id', 1)->orderBy('view_count','desc')->limit(8)->get();
        $books = Book::get()->count();
        $galeri = Gallery::get()->count();
        $categories = Category::get()->count();
        $anggota = User::where('role_id', 2)->count();
        $comment = Comment::get()->count();
        $ip = $request->ip();
        $count = Visitor::where('ip_visitor', $ip)->whereDay('created_at', '=', date('d'))->count();
        if ($count == 0) {
            Visitor::insert([
                'ip_visitor' => $ip,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        $data = Visitor::orderBy('created_at', 'desc')->get();
        $hari_ini = Visitor::whereDay('created_at', '=', date('d'))->count();
        $bulan_ini = Visitor::whereMonth('created_at', '=', date('m'))->count();
        $tahun_ini = Visitor::whereYear('created_at', '=', date('Y'))->count();
        $lk= User::where('jk',['L'])->count();
        $pr = User::where('jk',['P'])->count();
        //$jmlumr = User::where('role_id', 2)->count();
        //$umr = User::get()->avg('umur');

        //$totumr = $umr;
        //$roundnumber = round($totumr);

        $mostFrequentAge = User::select('umur', DB::raw('count(*) as occurrences'))
        ->groupBy('umur')
        ->orderBy('occurrences', 'desc')
        ->first();

        $ageavg = $mostFrequentAge->umur;
        
        return view('dashboard.index', compact('title','kategori','galeri', 'book','ip','data','books','categories','anggota','hari_ini','bulan_ini','tahun_ini','comment','lk','pr','ageavg'));
    }
}
