@extends('layouts.master')

@section('content')

<div class="row mt-3">
    <div class="col-md-12">
        <p class="text-center" style="font-size: 20px">Cari Foto</p>
        <form id="searchForm" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="query" id="search" autocomplete="off" placeholder="Cari judul foto, fotografer, atau lokasi...">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <ul class="list-group" id="result"></ul>
        </form>
    </div>
</div>
<hr>

<!-- Form pencarian yang sudah dibuat di atas -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color: var(--blue); color: white">
                <h3 class="card-title">
                    @if(isset($query))
                        Hasil Pencarian: "{{ $query }}" ({{ $galleries->total() }} hasil)
                    @else
                        Galeri Foto
                    @endif
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @if($galleries->count() > 0)
                        @foreach ($galleries as $gallery)
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('galeri.show', $gallery->id) }}" style="color: black">
                                <div class="card shadow">
                                    <img src="{{ asset($gallery->image_path) }}" 
                                         class="card-img-top" 
                                         alt="{{ $gallery->title }}" 
                                         style="height: 200px; object-fit: cover;">
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
                        <div class="col-12 text-center">
                            <p>Tidak ada hasil yang ditemukan.</p>
                        </div>
                    @endif
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('#search').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('galeri.autocomplete') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#result').fadeIn();
                        $('#result').html(data);
                    }
                });
            } else {
                $('#result').fadeOut();
            }
        });

        $(document).on('click', 'li', function() {
            $('#result').fadeOut();
        });
    });
</script>
@endsection