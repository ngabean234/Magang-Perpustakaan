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
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galleries as $key => $gallery)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $gallery->title }}</td>
                                    <td>{{ Str::limit($gallery->description, 50) }}</td>
                                    <td>
                                        <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title }}" width="100">
                                    </td>
                                    <td>{{ $gallery->created_at->format('d F Y') }}</td>
                                    <td>
                                        <a href="{{ route('galeris.edit', $gallery->id) }}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('galeris.destroy', $gallery->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-flat btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                        <a href="{{ route('galeris.show', $gallery->id) }}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@else
    @include('layouts.404')
@endif
@endsection
