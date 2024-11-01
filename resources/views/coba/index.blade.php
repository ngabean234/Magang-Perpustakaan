@extends('layouts.master')

@section('content')
@include('layouts.search')
<div class="row">
    <div class="d-none d-md-block">
        @include('layouts.deskkategori')
        <div class="row mt-2">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> <i class="fa fa-images"></i> Semua Galeri</a>
            </div>
        </div>
        <div class="row mt-3">
            @foreach ($gallery as $item) <!-- Ganti $book menjadi $gallery -->
            <div class="col-md-3">
                <a href="{{ url('gallery/details', $item->id)}}" style="color: black"> <!-- Ganti $bk->slug menjadi $item->id -->
                    <div class="card shadow card-gallery">
                        <img src="{{ url('storage/gallery/', $item->image_path) }}" class="card-img-top" height="350px" alt="..."> <!-- Pastikan path gambar sesuai -->
                        <div class="card-body">
                            <h6 style="font-size: 18px">{{ $item->title }}</h6> <!-- Ganti $bk->judul menjadi $item->title -->
                            <small style="text-center" style="font-size: 14px">{{ $item->description }}</small> <!-- Tambahkan deskripsi -->
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="d-sm-block d-md-none">
        @include('layouts.mobilekategori')
        <div class="row mt-2">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> <i class="fa fa-images"></i> Semua Galeri</a>
            </div>
        </div>
        <div class="row mt-3">
            @foreach ($gallery as $item) <!-- Ganti $book menjadi $gallery -->
            <div class="col-6">
                <a href="{{ url('gallery/details', $item->id)}}" style="color: black"> <!-- Ganti $bk->slug menjadi $item->id -->
                    <div class="card shadow card-gallery">
                        <img src="{{ url('storage/gallery/', $item->image_path) }}" height="200px" class="card-img-top" alt="..."> <!-- Pastikan path gambar sesuai -->
                        <div class="card-body">
                            <h6 style="font-size: 14px">{{ $item->title }}</h6> <!-- Ganti $bk->judul menjadi $item->title -->
                            <small style="font-size: 12px">{{ $item->description }}</small> <!-- Tambahkan deskripsi -->
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="row align-center">
    <ul class="pagination">
        <li class="page-item">
            {!! $gallery->links() !!} <!-- Ganti $book->links() menjadi $gallery->links() -->
        </li>
    </ul>
</div>

@endsection
