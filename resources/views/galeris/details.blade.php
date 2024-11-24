@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="card-title">Detail Foto</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <img src="{{ asset($gallery->image_path) }}" class="img-fluid rounded" alt="{{ $gallery->title }}" style="max-height: 500px;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Deskripsi</h5>
                        </div>
                        <div class="card-body">
                            <div class="mt-3">
                                <p>{!! nl2br(html_entity_decode($gallery->description)) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Informasi Foto</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Judul</th>
                                        <td>{{ $gallery->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fotografer</th>
                                        <td>{{ $gallery->author }}</td>
                                    </tr>
                                    <tr>
                                        <th>Diambil Tanggal</th>
                                        <td>{{ date('d F Y', strtotime($gallery->date_taken)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lokasi</th>
                                        <td>{{ $gallery->location }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card-footer">
            <a href="{{ route('galeri.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali ke Galeri</a>
        </div> --}}
    </div>
</div>
@endsection

@section('styles')
<style>
    .card-header {
        background-color: #f8f9fa;
    }
    .table th {
        width: 40%;
        background-color: #f8f9fa;
    }
    .table td {
        vertical-align: middle;
    }
    .card-body p {
        font-size: 15px;
        color: #333;
        line-height: 1.6;
    }
</style>
@endsection