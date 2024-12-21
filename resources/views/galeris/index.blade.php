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
                                    <th>Gambar Foto</th>
                                    <th>Nama Fotografer</th>
                                    <th>Kategori</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galleries as $key => $gallery)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $gallery->title }}</td>
                                    <td style="text-align: center;">
                                        <img src="{{ asset($gallery->image_path) }}" 
                                            alt="{{ $gallery->title }}" 
                                            style="width: 100px; height: 70px; object-fit: cover;">
                                    </td>
                                    <td>{{ $gallery->author }}</td> <!-- Menampilkan Penulis -->
                                    <td>{{ $gallery->category ? $gallery->category->name : 'Tanpa Kategori' }}</td>
                                    <td>{{ $gallery->created_at->format('d F Y') }}</td>
                                    <td>
                                        <a href="{{ route('galeris.edit', $gallery->id) }}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('galeris.destroy', $gallery->id) }}" 
                                           class="btn btn-sm btn-flat btn-danger btn-hapus">
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
                                    <th>Gambar Foto</th>
                                    <th>Nama Fotografer</th>
                                    <th>Kategori</th>
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


<script>
    function deleteData(id) {
        var url = '{{ route("galeris.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }
</script>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.btn-hapus').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            
            $('#modal-hapus').modal('show');
            $('#modal-hapus').find('form').attr('action', url);
        });
    });
</script>
@endsection
