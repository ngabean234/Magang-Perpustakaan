<div class="row mt-2">
    <div class="col">
        <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> <i class="fa fa-tag"></i> Kategori Buku</a>
    </div>
</div>

<div class="row mt-2">
    @foreach ($kategori as $ct)
    <div class="col-2">
        <a href="{{ url('category/book', $ct->slug) }}" style="color: black">
            <img src="{{ url('category/', $ct->photo) }}" width="20px"
                style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px" class="card-img-top" alt="...">
            <p class="text-center" style="font-size: 9px">{{ $ct->name }}</p>
        </a>
    </div>
    @endforeach
</div>
<hr>
