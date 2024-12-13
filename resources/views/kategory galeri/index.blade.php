@extends('layouts.master')

@section('content')
    @if (\Auth::user()->role_id == 1)
        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header" style="margin-top: 20px;margin-left: 2px">
                        <p>
                            <a href="#" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#addmodal"><i
                                    class="fa fa-plus"></i> Tambah</a>
                        </p>
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <i class="icon fas fa-info"></i>
                                Note : Jangan menghapus kategori yang masih digunakan di Galeri untuk menghindari error pada tampilan Galeri.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" style="background-color: var(--blue);color: white">
                            <h3 class="card-title">Kategori Galeri</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Logo</th>
                                            <th>Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category_gallery_id as $key => $category)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <center><img src="{{ url('kategori', $category->photo) }}"
                                                            style="border-radius: 50%" width="70px" alt="">
                                                    </center>
                                                </td>
                                                <td>
                                                    {{ $category->created_at ? $category->created_at->format('d F Y') : 'Tanggal tidak tersedia' }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('category-gallery.edit', $category->id) }}"
                                                        class="btn btn-sm btn-flat btn-success"><i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('category-gallery.destroy', $category->id) }}"
                                                        class="btn btn-sm btn-flat btn-danger btn-hapus"><i
                                                            class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('kategory galeri.add')
        </div>
    @else
        @include('layouts.404')
    @endif
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.btn-hapus').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            
            $('#modal-hapus').modal('show');
            $('#modal-hapus').find('form').attr('action', url);
        });

        @if(session('sukses'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('sukses') }}',
                timer: 3000, // waktu dalam milidetik
                showConfirmButton: false
            });
        @endif

        @if(session('gagal'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('gagal') }}',
                timer: 3000, // waktu dalam milidetik
                showConfirmButton: false
            });
        @endif
    });
</script>
@endsection