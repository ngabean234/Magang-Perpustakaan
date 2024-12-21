@extends('layouts.master')

@section('content')
<div class="row mt-3">
    <div class="col-md-12">
        <p class="text-center" style="font-size: 20px">Cari Foto</p>
        <form action="{{ route('galeri.search') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" id="searchGallery" autocomplete="off"
                    placeholder="Cari Nama Foto ...">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </div>
            {{ csrf_field() }}
            <ul class="list-group" id="galleryResult"></ul>
        </form>
    </div>
</div>
<hr>

<div class="row mt-2">
    <div class="col">
        <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> 
            <i class="fa fa-tag"></i> Kategori Galeri
        </a>
    </div>
</div>
{{-- <div class="row mt-3">
    @foreach ($categoryGalleries as $category)
    <div class="col-md-1">
        <a href="{{ route('galeri.category-gallery', $category->slug) }}" style="color: black">
            <img src="{{ url('kategori/', $category->photo) }}" 
                 width="30px" 
                 class="card-img-top"
                 style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px" 
                 alt="{{ $category->name }}">
            <p class="text-center">{{ $category->name }}</p>
        </a>
    </div>
    @endforeach
</div> --}}
<hr>

<div class="row">
    @if(isset($query))
        @if($galleries->count() > 0)
            @foreach ($galleries as $gallery)
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
        @else
            <div class="col-12">
                <h6 class="mt-2"> Ditemukan " {{ $galleries->count() }} " hasil dari pencarian " {{ $query }} "</h6>
                @include('layouts.notfound')
            </div>
        @endif
    @else
        {{-- Tampilan default galeri --}}
        @foreach ($galleries as $gallery)
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
    @endif
</div>

@if(isset($galleries))
<div class="row align-center">
    <ul class="pagination">
        <li class="page-item">
            {!! $galleries->appends(request()->query())->links() !!}
        </li>
    </ul>
</div>
@endif


@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#searchGallery').keyup(function () {
            var query = $(this).val();
            if (query !== '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('galeri.autocomplete') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function (data) {
                        $('#galleryResult').fadeIn();
                        $('#galleryResult').html(data);
                    }
                });
            } else {
                $('#galleryResult').fadeOut();
            }
        });

        $(document).on('click', 'li', function () {
            $('#galleryResult').fadeOut();
        });
    });
</script>
@endsection