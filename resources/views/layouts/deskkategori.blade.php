 <div class="row mt-2">
     <div class="col">
         <a class="btn btn-primary btn-sm btn-flat float-left" href="#"> <i class="fa fa-tag"></i> Kategori Buku</a>
     </div>
 </div>
 <div class="row mt-3">
     @foreach ($kategori as $ct)
     <div class="col-md-1">
         <a href="{{ url('category/book', $ct->slug) }}" style="color: black">
             <img src="{{ url('category/', $ct->photo) }}" width="30px" class="card-img-top"
                 style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px" alt="...">
             <p class="text-center">{{ $ct->name }}</p>
         </a>
     </div>
     @endforeach
 </div>
<hr>