@extends('layouts.master')

@section('content')

@if (\Auth::user()->role_id == 1)
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header" style="margin-top: 20px;margin-left: 2px">
                <p>
                    <a href="{{ url('anggota/add') }}" class="btn btn-primary btn-flat"><i
                            class="fa fa-plus"></i> Tambah</a>
                    <hr>
                </p>
            </div>

            <div class="card">
                <div class="card-header" style="background-color: var(--blue);color: white">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur</th>
                                    <th>action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key=>$dt)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $dt->name }}</td>
                                    <td>{{ $dt->email }}</td>
                                    <td>{{ $dt->jk }}</td>
                                    <td>{{ $dt->umur }}</td>
                                    <td>
                                        @if ($dt->is_block == 0)
                                        <a href="{{url('anggota/block', $dt->id)}}" id=""
                                            onclick="return confirm('Yakin blokir {{ $dt->name }} ?')" 
                                            class="btn btn-sm btn-flat btn-danger"> Blokir
                                        </a>
                                        @else
                                        <a href="{{url('anggota/aktifkan', $dt->id)}}" id=""
                                            onclick="return confirm('Yakin aktifkan kembali {{ $dt->name }} ?')" 
                                            class="btn btn-sm btn-flat btn-success"> Aktifkan
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
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
