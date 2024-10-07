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
                                Note : Jangan delete data kategori selama kategori dipakai untuk post buku, silahkan edit /
                                ubah jika perlu dan bisa di delete jika sudah tidak terhubung dengan post buku (untuk
                                mencegah error saat menampilkan data buku)
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" style="background-color: var(--blue);color: white">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Logo</th>
                                            <th>Dibuat</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $dt)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $dt->name }}</td>
                                                <td>
                                                    <center><img src="{{ url('category', $dt->photo) }}"
                                                            style="border-radius: 50%" width="70px" alt="">
                                                    </center>
                                                </td>
                                                <td>{{ date('d F Y', strtotime($dt->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('kategory/edit', $dt->id) }}" id="edit"
                                                        class="btn btn-sm btn-flat btn-success"><i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('kategory/delete', $dt->id) }}" id="delete"
                                                        class="btn btn-sm btn-flat btn-danger btn-hapus"><i
                                                            class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Logo</th>
                                            <th>Dibuat</th>
                                            <th>action</th>
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
            @include('kategory.add')
        </div>
    @else
        @include('layouts.404')
    @endif
@endsection
