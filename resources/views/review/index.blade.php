@extends('layouts.master')

@section('content')
@if (\Auth::user()->role_id == 1)
      <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
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
                                    <th>Review Buku</th>
                                    <th>Nama</th>
                                    <th>Waktu</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key=>$dt)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><a href="{{ url('book/detail', $dt->book->id) }}">{{ $dt->book->judul }}</a></td>
                                    <td>{{ $dt->user->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dt->created_at)->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{url('review',$dt->id)}}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-eye"></i> </a>
                                        <a href="{{url('review/delete',$dt->id)}}" class="btn btn-sm btn-flat btn-danger btn-hapus"><i class="fa fa-trash"></i> </a>
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