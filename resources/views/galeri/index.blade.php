@extends('layouts.master')

@section('content')
@include('layouts.search')
<div class="row">
    <div class="d-none d-md-block">
        <div class="row mt-2">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> <i class="fa fa-image"></i> Galeri Foto</a>
            </div>
        </div>
        <div class="row mt-3">
            @foreach ($galleries as $gallery)
            <div class="col-md-3">
                <a href="#" data-toggle="modal" data-target="#modal-{{ $gallery->id }}" style="color: black">
                    <div class="card shadow card-book">
                        <img src="{{ asset($gallery->image_path) }}" class="card-img-top" height="350px" alt="{{ $gallery->title }}">
                        <div class="card-body">
                            <h6 style="font-size: 18px">{{ $gallery->title }}</h6>
                            <small style="text-center" style="font-size: 14px"> 
                                <i class="fa fa-camera"></i> {{ $gallery->author }} <br>
                                <i class="fa fa-calendar"></i> {{ date('d F Y', strtotime($gallery->date_taken)) }}
                            </small>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Modal for each photo -->
            <div class="modal fade" id="modal-{{ $gallery->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $gallery->title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <td>
                                <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title }}" class="image">
                            </td>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Fotografer</th>
                                    <td>{{ $gallery->author }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $gallery->location }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Ambil</th>
                                    <td>{{ date('d F Y', strtotime($gallery->date_taken)) }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $gallery->description }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="d-sm-block d-md-none">
        <div class="row mt-2">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> <i class="fa fa-image"></i> Galeri Foto</a>
            </div>
        </div>
        <div class="row mt-3">
            @foreach ($galleries as $gallery)
            <div class="col-6">
                <a href="#" data-toggle="modal" data-target="#modal-mobile-{{ $gallery->id }}" style="color: black">
                    <div class="card shadow card-book">
                        <img src="{{ asset($gallery->image_path) }}" height="200px" class="card-img-top" alt="{{ $gallery->title }}">
                        <div class="card-body">
                            <h6 style="font-size: 14px">{{ $gallery->title }}</h6>
                            <small style="font-size: 12px"> 
                                <i class="fa fa-camera"></i> {{ $gallery->author }} <br>
                                <i class="fa fa-calendar"></i> {{ date('d F Y', strtotime($gallery->date_taken)) }}
                            </small>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Modal for mobile -->
            <div class="modal fade" id="modal-mobile-{{ $gallery->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $gallery->title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset($gallery->image_path) }}" class="img-fluid mb-3" alt="{{ $gallery->title }}">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Fotografer</th>
                                    <td>{{ $gallery->author }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $gallery->location }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Ambil</th>
                                    <td>{{ date('d F Y', strtotime($gallery->date_taken)) }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $gallery->description }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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