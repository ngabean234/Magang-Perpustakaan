@extends('layouts.master')

@section('content')
@if (Auth::user()->role_id == 1)
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header" style="margin-top: 20px; margin-left: 2px;">
                <p>
                    <a href="{{ route('galeris.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</a>
                </p>
            </div>
            <div class="card">
                <div class="card-header" style="background-color: var(--blue); color: white;">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Foto</th>
                                    <th>Gambar</th>
                                    <th>Fotografer</th>
                                    <th>Tanggal Ambil Foto</th>
                                    <th>Lokasi</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galleries as $key => $gallery)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $gallery->title }}</td>
                                    <td>
                                        <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title }}" width="100">
                                    </td>
                                    <td>{{ $gallery->author }}</td> <!-- Menampilkan Penulis -->
                                    <td>{{ \Carbon\Carbon::parse($gallery->date_taken)->format('d F Y') }}</td> <!-- Menggunakan nama kolom yang benar -->
                                    <td>{{ $gallery->location }}</td> <!-- Menggunakan nama kolom yang benar -->
                                    <td>{{ $gallery->created_at->format('d F Y') }}</td>
                                    <td>
                                        <a href="{{ route('galeris.edit', $gallery->id) }}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('galeris.destroy', $gallery->id) }}" class="btn btn-sm btn-flat btn-danger btn-hapus">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="{{ route('galeris.show', $gallery->id) }}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Foto</th>
                                    <th>Gambar</th>
                                    <th>Fotografer</th>
                                    <th>Tanggal Ambil Foto</th>
                                    <th>Lokasi</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
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
