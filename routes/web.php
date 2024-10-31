<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SumbangController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AllbookController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GalleryController;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    //dashboard
    Route::get('dashboard', [DashboardController::class, 'index']);

    //category
    Route::get('kategory', [CategoryController::class, 'index']);
    Route::get('kategory/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('kategory/add', [CategoryController::class, 'store']);
    Route::get('kategory/edit/{id}', [CategoryController::class, 'edit']);
    Route::put('kategory/edit/update/{id}', [CategoryController::class, 'update']);
    Route::delete('kategory/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('category/book/{id}', [CategoryController::class, 'postbyCategory']);

    //book
    Route::get('book', [BookController::class, 'index']);
    Route::get('book/add', [BookController::class, 'add']);
    Route::post('book/add/store', [BookController::class, 'store']);
    Route::get('book/detail/{id}', [BookController::class, 'detail']);
    Route::get('book/details/{id}', [BookController::class, 'details']);
    Route::get('book/read/{id}', [BookController::class, 'read']);
    Route::get('book/edit/{id}', [BookController::class, 'edit']);
    Route::put('book/edit/update/{id}', [BookController::class, 'update']);
    Route::delete('book/delete/{id}', [BookController::class, 'delete']);
    Route::get('book/verify/{id}', [BookController::class, 'verify']);

    //gallery
    // Route::get('gallery',[GalleryController::class, 'index']);
    Route::get('gallery/add', [GalleryController::class, 'add'])->name('gallery.add');
    Route::post('gallery/store', [GalleryController::class, 'store'])->name('gallery.store');




    // Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    // Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');

    //about
    Route::get('about', [AboutController::class, 'index']);

    //sumbang
    //Route::get('sumbang',[SumbangController::class, 'index']);
    //Route::post('sumbang/add/store',[SumbangController::class, 'store']);

    //chat
    Route::get('chat', [ChatController::class, 'index']);

    //books
    Route::get('books', [AllbookController::class, 'index']);

    //galeris
    Route::get('galeris', [GalleryController::class, 'index']);

    //serach
    Route::post('autocomplete/search', [AllbookController::class, 'livesearch'])->name('autocomplete.search');
    Route::get('search', [SearchController::class, 'search']);

    //review
    Route::post('post/{post}/comment', [BookController::class, 'addreview'])->name('post.comment.add');

    //anggota
    Route::get('anggota', [AnggotaController::class, 'index']);
    Route::get('anggota/add', [AnggotaController::class, 'add']);
    Route::post('anggota/add/store', [AnggotaController::class, 'store']);
    Route::get('anggota/edit/{id}', [AnggotaController::class, 'edit']);
    Route::put('anggota/ubahprofile', [AnggotaController::class, 'updateprofile']);
    Route::put('anggota/ubahpassword', [AnggotaController::class, 'updatepassword']);
    Route::get('profile', [AnggotaController::class, 'profile']);
    Route::delete('anggota/delete/{id}', [AnggotaController::class, 'delete']);
    Route::get('anggota/block/{id}', [AnggotaController::class, 'blockanggota']);
    Route::get('anggota/aktifkan/{id}', [AnggotaController::class, 'verifyanggota']);

    //review
    Route::get('review', [ReviewController::class, 'index']);
    Route::get('review/{id}', [ReviewController::class, 'review']);
    Route::delete('review/delete/{id}', [ReviewController::class, 'delete']);
    Route::post('balas/{post}/comment', [ReviewController::class, 'store'])->name('balas.review.store');
});

Route::get('/home', function () {
    return redirect('dashboard');
});

Route::get('/keluar', function () {
    Auth::logout();
    return redirect('/');
});

require __DIR__ . '/auth.php';
