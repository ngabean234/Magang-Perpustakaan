@extends('layouts.master')

@section('content')
@if (\Auth::user()->role_id == 1)
<div class="row mt-2">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3>Detail Galeri</h3>
                            <hr>
                            <small>Posted By <strong>{{ $gallery->author }}</strong> at {{ \Carbon\Carbon::parse($gallery->created_at)->diffForHumans() }}</small>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="{{ asset($gallery->image_path) }}" class="img-fluid" alt="{{ $gallery->title }}" style="max-width: 100%; height: auto;">
                            </div>
                            <div class="mt-3">
                                <h5 class="text-center">Deskripsi</h5>
                                <p>{!! nl2br(e($gallery->description)) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Galeri</h3>
                        </div>
                        <div class="card-body">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Judul</th>
                                        <td>:</td>
                                        <td>{{ $gallery->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fotografer</th>
                                        <td>:</td>
                                        <td>{{ $gallery->author }}</td>
                                    </tr>
                                    <tr>
                                        <th>Diambil Tanggal</th>
                                        <td>:</td>
                                        <td>{{ date('d F Y', strtotime($gallery->date_taken)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lokasi</th>
                                        <td>:</td>
                                        <td>{{ $gallery->location }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat</th>
                                        <td>:</td>
                                        <td>{{ date('d F Y', strtotime($gallery->created_at)) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    @include('layouts.404')
@endif
@endsection