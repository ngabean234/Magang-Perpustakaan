@extends('layouts.master')

@section('content')
@if (\Auth::user()->role_id == 1)
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">{{$dt}}</h3>
                </div>
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data"
                    action="{{ route('category-gallery.update', $title->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input id="name" 
                                   type="text" 
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name" 
                                   value="{{ $title->name }}" 
                                   placeholder="Masukan nama Kategori"
                                   autocomplete="off">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="photo">Gambar Logo Saat Ini</label>
                            <div class="mb-2">
                                <img src="{{ url('kategori', $title->photo) }}" 
                                     width="100px" 
                                     alt="Logo Kategori">
                            </div>
                            <input type="file" 
                                   name="photo" 
                                   class="form-control @error('photo') is-invalid @enderror">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah Gambar (jpg/png) dan Max 10MB</small>

                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@else
@include('layouts.404')
@endif
@endsection

@push('scripts')
<script>
// Menampilkan nama file yang dipilih
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
</script>
@endpush
