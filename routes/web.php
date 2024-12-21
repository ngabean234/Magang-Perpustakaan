<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\CategoryGalleryController;

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

    //galeris
    Route::get('galeris', [GalleryController::class, 'index']);
    Route::get('galeris/create', [GalleryController::class, 'create']);
    Route::get('galeris/{id}', [GalleryController::class, 'show']);
    Route::get('galeri', [GalleryController::class, 'userIndex'])->name('galeri.index');
    Route::get('galeri/details/{id}', [GalleryController::class, 'show'])->name('galeri.show');
    Route::get('/galeri/search', [GalleryController::class, 'userSearch'])->name('galeri.search');
    Route::post('/galeri/livesearch', [GalleryController::class, 'livesearch'])->name('galeri.autocomplete');
    Route::get('/galeri/details/{id}', [GalleryController::class, 'details'])->name('galeri.details');
    Route::post('/galeri/autocomplete', [GalleryController::class, 'livesearch'])->name('galeri.autocomplete');
    Route::get('/galeri/search', [GalleryController::class, 'search'])->name('galeri.search');

    //about
    Route::get('about', [AboutController::class, 'index']);

    //sumbang
    //Route::get('sumbang',[SumbangController::class, 'index']);
    //Route::post('sumbang/add/store',[SumbangController::class, 'store']);

    //chat
    Route::get('chat', [ChatController::class, 'index']);

    //books
    Route::get('books', [AllbookController::class, 'index']);

    //galeri
    Route::resource('galeris', GalleryController::class);
    Route::delete('galeris/{id}', [GalleryController::class, 'destroy'])->name('galeris.destroy');
    Route::get('/galeri/category/{slug}', [GalleryController::class, 'showCategory'])->name('galeri.category-gallery');

    //serach
    Route::post('autocomplete/search', [AllbookController::class, 'livesearch'])->name('autocomplete.search');
    Route::post('galeri/autocomplete', [GalleryController::class, 'livesearch'])->name('galeri.autocomplete');
    Route::get('search', [SearchController::class, 'search']);
    Route::get('galeri/search', [GalleryController::class, 'userSearch'])->name('galeri.search');

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

    // Routes untuk kategori galeri
    Route::get('kategory galeri', [CategoryGalleryController::class, 'index'])->name('category-gallery.index');
    Route::get('kategory galeri/create', [CategoryGalleryController::class, 'create'])->name('category-gallery.create');
    Route::post('kategory galeri', [CategoryGalleryController::class, 'store'])->name('category-gallery.store');
    Route::get('kategory galeri/{id}/edit', [CategoryGalleryController::class, 'edit'])->name('category-gallery.edit');
    Route::put('kategory galeri/{id}', [CategoryGalleryController::class, 'update'])->name('category-gallery.update');
    Route::delete('kategory galeri/{id}', [CategoryGalleryController::class, 'destroy'])->name('category-gallery.destroy');

    Route::resource('category-gallery', CategoryGalleryController::class);
});

Route::get('/home', function () {
    return redirect('dashboard');
});

Route::get('/keluar', function () {
    Auth::logout();
    return redirect('/');
});

require __DIR__ . '/auth.php';
