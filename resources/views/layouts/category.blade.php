@extends('layouts.master')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <div class="row">
        @foreach($galleries as $gallery)
            <div class="col-md-4 col-sm-6 mb-4">
                <a href="{{ route('galeri.details', $gallery->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset($gallery->image_path) }}" 
                             class="card-img-top gallery-image" 
                             alt="{{ $gallery->title }}"
                             style="object-fit: cover; height: 200px;">
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
@endsection
