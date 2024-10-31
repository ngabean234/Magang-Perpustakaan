@extends('layouts.master')

@section('content')
@if (\Auth::user()->role_id == 1)
<div class="row">
    <div class="col-md-12">
        <form action="{{ url('gallery/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="image_path">Upload Gambar</label>
                <input type="file" name="image_path" class="form-control-file" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endif
@endsection
