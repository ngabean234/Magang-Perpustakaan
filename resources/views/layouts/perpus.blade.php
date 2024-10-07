@include('layouts.search')
<div class="row">
    <div class="d-none d-md-block">
        @include('layouts.deskkategori')
        <div class="row mt-3">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> <i class="fa fa-rocket"></i>
                    Terpopuler</a>
            </div>
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-right" href="{{ url('books') }}"> <i
                        class="fa fa-list"></i> Lihat Semua</a>
            </div>
        </div>

        <div class="row mt-3">
            @foreach ($book as $bk)
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
        </div>
    </div>

    <div class="d-sm-block d-md-none">
        @include('layouts.mobilekategori')
        <div class="row mt-3">
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> <i class="fa fa-rocket"></i>
                    Terpopuler</a>
            </div>
            <div class="col">
                <a class="btn btn-primary btn-sm btn-flat float-right" href="{{ url('books') }}"> <i
                        class="fa fa-list"></i> Lihat Semua</a>
            </div>
        </div>

        <div class="row mt-3">
            @foreach ($book as $bk)
            <div class="col-6">
                <a href="{{ url('book/details', $bk->slug)}}" style="color: black">
                    <div class="card shadow card-book">
                        <img src="{{ url('cover/', $bk->cover) }}" height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 style="font-size: 14px">{{ $bk->judul }} </h6>
                            <small style="font-size: 11px"> <i class="fa fa-book"></i> Dibaca ( {{ $bk->view_count }} )
                                Kali <br> <i class="fa fa-tag"></i>
                                {{ $bk->categories->name }}</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
