@extends('layouts.master')


@section('content')
@include('layouts.search')
<div class="card card-solid mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-3">
                <div class="col-12">
                    <img src="{{ url('cover/', $book->cover) }}" class="product-image" alt="Product Image">
                </div>
            </div>
            <div class="col-12 col-sm-8">
                <h3 class="my-3" style="font-size: 22px">{{ $book->judul }}</h3>
                <table style="font-size: 16px">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <td>:</td>
                            <td>{{ $book->categories->name }}</td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td>:</td>
                            <td>{{ $book->penulis }}</td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td>:</td>
                            <td>{{ $book->penerbit }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Halaman</th>
                            <td>:</td>
                            <td>{{ $book->jml_halaman}}</td>
                        </tr>
                        <tr>
                            <th>Ringkasan</th>
                            <td>:</td>
                        </tr>
                    </thead>
                </table>
                <p>{!! $book->ringkasan !!}</p>
            </div>
            <a class="btn btn-primary btn-lg btn-block mt-2" href="{{ url('book/read', $book->slug) }}">
                <i class="fas fa-book"></i> Baca Sekarang
            </a>
        </div>
        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments"
                        role="tab" aria-controls="product-comments" aria-selected="false">Review
                        ({{ $book->comments()->count() }})</a>
                </div>
            </nav>
            <div class="row" id="komen">
                <div class="col-md-12">
                    <div class="tab-content p-3 mr-auto" id="nav-tabContent">
                        <div class="tab-pane fade" id="product-comments" role="tabpanel"
                            aria-labelledby="product-comments-tab">
                            <form action="{{ route('post.comment.add', $book) }}#nav-tabContent" method="POST">
                                @csrf
                                <div class="form-group">
                                    <textarea name="text" id="" class="form-control" cols="100%" rows="4"
                                        placeholder="Beri review .."></textarea>
                                </div>
                                <button class="btn btn-flat btn-primary btn-block"> <i class="fa fa-comments"></i>
                                    Review </button>
                            </form>
                            <hr>
                            <!-- Post -->
                            @foreach ($book->comments as $cm)
                            <div class="post clearfix mt-4">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                        src="https://cdn.iconscout.com/icon/free/png-512/avatar-372-456324.png"
                                        alt="User Image">
                                    @if ($cm->user->role_id == 1)
                                    <span class="username">
                                        <a href="#">{{ $cm->user->name }} <i class="fa fa-check-circle"
                                                style="color: blue;"></i></a>
                                    </span>
                                    <span class="description">Admin - Sent at
                                        {{ \Carbon\Carbon::parse($cm->created_at)->diffForHumans() }} </span>
                                    @else
                                    <span class="username">
                                        <a href="#">{{ $cm->user->name }}</a>
                                    </span>
                                    <span class="description">Sent at
                                        {{ \Carbon\Carbon::parse($cm->created_at)->diffForHumans() }} </span>
                                    @endif
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    {!! $cm->text !!}
                                </p>
                            </div>
                            @endforeach
                            <!-- /.post -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection
