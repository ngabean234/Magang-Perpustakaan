@extends('layouts.master')

@section('content')
@include('layouts.search')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color: var(--blue); color: white">
                <h3 class="card-title">Galeri Foto</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($galleries as $gallery)
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('galeri.show', $gallery->id) }}" style="color: black">
                            <div class="card shadow">
                                <img src="{{ asset($gallery->image_path) }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $gallery->title }}</h5>
                                    <p class="card-text">
                                        <small>
                                            <i class="fa fa-camera"></i> {{ $gallery->author }} <br>
                                            <i class="fa fa-calendar"></i> {{ date('d F Y', strtotime($gallery->date_taken)) }}
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row align-center">
    <ul class="pagination">
        <li class="page-item">
            {!! $galleries->links() !!}
        </li>
    </ul>
</div>

@endsection