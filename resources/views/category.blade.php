@extends('layouts.master')


@section('content')
@include('layouts.search')
<div class="row">
    <div class="d-none d-md-block">
       @include('layouts.deskkategori')
        <div class="row">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> <i class="fa fa-tag"></i>
                    Kategori : {{ $category->name }}</a>
            </div>
        </div>
        <div class="row mt-3">
            @if ($category->artikels->count() > 0 )
            @foreach ($category->artikels as $bk)
            <div class="col-md-3">
                <a href="{{ url('book/details', $bk->slug)}}" style="color: black">
                    <div class="card shadow card-book">
                        <img src="{{ url('cover/', $bk->cover) }}" class="card-img-top" height="350px" alt="...">
                        <div class="card-body">
                            <h6 style="font-size: 18px">{{ $bk->judul }}</h6>
                            <small style="text-center" style="font-size: 14px"> <i class="fa fa-book"></i> Dibaca (
                                {{ $bk->view_count }} ) Kali . <i class="fa fa-tag"></i>
                                {{ $bk->categories->name }}</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
                @include('layouts.notfound')
            @endif
        </div>
    </div>

    <div class="d-sm-block d-md-none">
        @include('layouts.mobilekategori')
        <div class="row">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> <i class="fa fa-tag"></i>
                    Kategori : {{ $category->name }}</a>
            </div>
        </div>
        <div class="row mt-3">
            @if ($category->artikels->count() > 0 )
            @foreach ($category->artikels as $bk)
            <div class="col-6">
                <a href="{{ url('book/details', $bk->slug)}}" style="color: black">
                    <div class="card shadow card-book">
                        <img src="{{ url('cover/', $bk->cover) }}" class="card-img-top" height="200px" alt="...">
                        <div class="card-body">
                            <h6 style="font-size: 18px">{{ $bk->judul }}</h6>
                            <small style="text-center" style="font-size: 11px"> <i class="fa fa-book"></i> Dibaca (
                                {{ $bk->view_count }} ) Kali <br> <i class="fa fa-tag"></i>
                                {{ $bk->categories->name }}</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
                @include('layouts.notfound')
            @endif
        </div>
    </div>
</div>

<div class="row align-center">
    <ul class="pagination">
        <li class="page-item">
            {!! $category->paginate(8) !!}
        </li>
    </ul>
</div>


@endsection
