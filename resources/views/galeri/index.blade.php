@extends('layouts.master')

@section('content')
@include('layouts.search')
<div class="row">
    <div class="d-none d-md-block">
        <div class="row">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> 
                    <i class="fa fa-camera"></i> Semua Foto
                </a>
            </div>
        </div>
        <div class="row mt-3">
            @if($galleries->count() > 0)
                @foreach ($galleries as $gallery)
                <div class="col-md-4 mb-3">
                    <a href="{{ route('galeri.show', $gallery->id) }}" style="color: black">
                        <div class="card shadow">
                            <img src="{{ asset($gallery->image_path) }}" 
                                 class="card-img-top gallery-image" 
                                 alt="{{ $gallery->title }}">
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

    <!-- Tampilan Mobile -->
    <div class="d-sm-block d-md-none">
        <div class="row">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> 
                    <i class="fa fa-camera"></i> Semua Foto
                </a>
            </div>
        </div>
        <div class="row mt-3">
            @if($galleries->count() > 0)
                @foreach ($galleries as $gallery)
                <div class="col-6 mb-3">
                    <a href="{{ route('galeri.show', $gallery->id) }}" style="color: black">
                        <div class="card shadow">
                            <img src="{{ asset($gallery->image_path) }}" 
                                 class="card-img-top gallery-image" 
                                 alt="{{ $gallery->title }}">
                            <div class="card-body">
                                <h6 class="card-title" style="font-size: 14px">{{ $gallery->title }}</h6>
                                <p class="card-text">
                                    <small style="font-size: 11px">
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