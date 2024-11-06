@extends('layouts.master')

@section('content')
<div class="card card-solid mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="col-12">
                    <img src="{{ asset($gallery->image_path) }}" class="product-image" alt="{{ $gallery->title }}">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3" style="font-size: 22px">{{ $gallery->title }}</h3>
                <table style="font-size: 16px">
                    <tr>
                        <th>Fotografer</th>
                        <td>:</td>
                        <td>{{ $gallery->author }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Diambil</th>
                        <td>:</td>
                        <td>{{ date('d F Y', strtotime($gallery->date_taken)) }}</td>
                    </tr>
                    <tr>
                        <th>Lokasi</th>
                        <td>:</td>
                        <td>{{ $gallery->location }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>:</td>
                        <td></td>
                    </tr>
                </table>
                <p>{!! $gallery->description !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection
