@extends('layouts.master')

@section('content')
@include('layouts.search')
<div class="row">
    <!-- Desktop View -->
    <div class="d-none d-md-block">
        <div class="row mt-2">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="{{ route('gallery.index') }}"> 
                    <i class="fa fa-image"></i> Semua Foto
                </a>
            </div>
        </div>
        <div class="row mt-3">
            @foreach ($galleries as $gallery)
            <div class="col-md-3">
                <a href="{{ route('gallery.details', $gallery->id) }}" style="color: black">
                    <div class="card shadow card-gallery">
                        <img src="{{ Storage::url($gallery->image_path) }}" class="card-img-top" height="350px" alt="{{ $gallery->title }}">
                        <div class="card-body">
                            <h6 style="font-size: 18px">{{ $gallery->title }}</h6>
                            <small style="font-size: 14px">{{ $gallery->description }}</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Mobile View -->
    <div class="d-sm-block d-md-none">
        <div class="row mt-2">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="{{ route('gallery.index') }}"> 
                    <i class="fa fa-image"></i> Semua Foto
                </a>
            </div>
        </div>
        <div class="row mt-3">
            @foreach ($galleries as $gallery)
            <div class="col-6">
                <a href="{{ route('gallery.details', $gallery->id) }}" style="color: black">
                    <div class="card shadow card-gallery">
                        <img src="{{ Storage::url($gallery->image_path) }}" height="200px" class="card-img-top" alt="{{ $gallery->title }}">
                        <div class="card-body">
                            <h6 style="font-size: 14px">{{ $gallery->title }}</h6>
                            <small style="font-size: 12px">{{ $gallery->description }}</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="row justify-content-center mt-4">
    {!! $galleries->links() !!}
</div>

@endsection
