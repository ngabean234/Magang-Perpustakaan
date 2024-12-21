@extends('layouts.master')

@section('content')
@if (\Auth::user()->role_id == 1)
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <form role="form" method="post" action="{{ route('galeris.update', $gallery->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">{{$title}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Nama Foto</label>
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $gallery->title) }}" required placeholder="Masukan nama foto" autocomplete="off">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>* Masukan Nama Foto</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="author">Fotografer</label>
                                    <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author', $gallery->author) }}" required placeholder="Masukan nama pengambil foto">
                                    @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>* Masukan nama pengambil foto</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="date_taken">Tanggal Pengambilan Foto</label>
                                    <input id="date_taken" type="date" class="form-control @error('date_taken') is-invalid @enderror" name="date_taken" value="{{ old('date_taken', $gallery->date_taken) }}" required>
                                    @error('date_taken')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>* Masukan tanggal pengambilan foto</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="location">Lokasi</label>
                                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location', $gallery->location) }}" required placeholder="Masukan lokasi">
                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>* Masukan lokasi</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="textarea @error('description') is-invalid @enderror"
                                        placeholder="Place some text here" name="description"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description', $gallery->description) }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-outline card-info">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                Browse… <input type="file" id="imgInp" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" value="Pilih Gambar" readonly>
                                    </div>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>* Upload Gambar</strong>
                                    </span>
                                    @enderror
                                    <hr>
                                    <img src="{{ asset($gallery->image_path) }}" id='img-upload' width="100%" />
                                    <center>
                                        <p>Image Preview</p>
                                    </center>
                                    <hr>
                                    <div class="form-group">
                                        <label for="category_gallery_id">Kategori Galeri</label>
                                        <select name="category_gallery_id" class="form-control @error('category_gallery_id') is-invalid @enderror" required>
                                            <option value="">Pilih Kategori Galeri</option>
                                            @foreach($categoryGalleries as $category)
                                                <option value="{{ $category->id }}" 
                                                    {{ (old('category_gallery_id', $gallery->category_gallery_id) == $category->id) ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_gallery_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Simpan</button>
                                <br>
                                <p>* Pastikan untuk mengisi semua kolom yang diperlukan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@else
@include('layouts.404')
@endif
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function (event, label) {
            var input = $(this).parents('.input-group').find(':text');
            input.val(label);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    });
</script>
@endsection
