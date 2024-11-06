@extends('layouts.master')

@section('content')
@include('layouts.search')
<div class="row">
    <div class="d-none d-md-block">
        <div class="row mt-2">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> 
                    <i class="fa fa-camera"></i> Semua Foto
                </a>
            </div>
        </div>
        <div class="row mt-3">
            @if($galleries->count() > 0)
                @foreach ($galleries as $gallery)
                <div class="col-md-3">
                    <a href="{{ route('galeri.show', $gallery->id) }}" style="color: black">
                        <div class="card shadow card-book">
                            <img src="{{ asset($gallery->image_path) }}" 
                                 class="card-img-top" 
                                 alt="{{ $gallery->title }}" 
                                 height="350px"
                                 style="object-fit: cover;">
                            <div class="card-body">
                                <h6 style="font-size: 18px">{{ $gallery->title }}</h6>
                                <small style="font-size: 14px">
                                    <i class="fa fa-camera"></i> {{ $gallery->author }}
                                    <br>
                                    <i class="fa fa-map-marker"></i> {{ $gallery->location }}
                                </small>
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
        <div class="row mt-2">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> 
                    <i class="fa fa-camera"></i> Semua Foto
                </a>
            </div>
        </div>
        <div class="row mt-3">
            @if($galleries->count() > 0)
                @foreach ($galleries as $gallery)
                <div class="col-6">
                    <a href="{{ route('galeri.show', $gallery->id) }}" style="color: black">
                        <div class="card shadow card-book">
                            <img src="{{ asset($gallery->image_path) }}" 
                                 height="200px" 
                                 class="card-img-top" 
                                 alt="{{ $gallery->title }}"
                                 style="object-fit: cover;">
                            <div class="card-body">
                                <h6 style="font-size: 14px">{{ $gallery->title }}</h6>
                                <small style="font-size: 11px">
                                    <i class="fa fa-camera"></i> {{ $gallery->author }}
                                    <br>
                                    <i class="fa fa-map-marker"></i> {{ $gallery->location }}
                                </small>
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