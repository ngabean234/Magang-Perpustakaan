@extends('layouts.master')

@section('content')

@if (\Auth::user()->role_id == 1)
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <form role="form" method="post" enctype="multipart/form-data"
                action="{{ url('book/edit/update', $dt->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">{{$title}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Judul</label>
                                    <input id="judul" type="text"
                                        class="form-control @error('judul') is-invalid @enderror" name="judul"
                                        value="{{ $dt->judul }}" placeholder="Masukan Judul Buku" autocomplete="off">

                                    @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Penulis</label>
                                    <input id="penulis" type="text"
                                        class="form-control @error('penulis') is-invalid @enderror" name="penulis"
                                        value="{{ $dt->penulis }}" placeholder="Masukan nama penulis">

                                    @error('penulis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Penerbit</label>
                                    <input id="penerbit" type="text"
                                        class="form-control @error('penerbit') is-invalid @enderror" name="penerbit"
                                        value="{{ $dt->penerbit }}" placeholder="Masukan Judul Penerbit">

                                    @error('penerbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jumlah halaman</label>
                                    <input id="jml_halaman" type="number"
                                        class="form-control @error('jml_halaman') is-invalid @enderror"
                                        name="jml_halaman" value="{{ $dt->jml_halaman }}"
                                        placeholder="Masukan Jumlah halaman buku">

                                    @error('jml_halaman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ringkasan</label>
                                    <textarea class="textarea" placeholder="Place some text here" name="ringkasan"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                         {{ $dt->ringkasan }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Cover Buku</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                Browse… <input id="imgInp" type="file"
                                                    class="form-control @error('cover') is-invalid @enderror"
                                                    name="cover" value="{{ old('cover') }}">

                                                @error('cover')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" value="Pilih Cover" readonly>
                                    </div>
                                    <hr>
                                    <img src="{{ url('cover/', $dt->cover) }}" id='img-upload' width="100%" />
                                    <center>
                                        <p>Image Preview</p>
                                    </center>
                                    <small class="form-text text-muted">
                                        Biarkan kosong jika tidak ingin mengubah gambar (jpg/png) dan Max 10MB
                                    </small>
                                    <hr>
                                </div>

                                <div class="form-group">
                                    <label for="file_buku">File Buku (PDF)</label>
                                    @if($dt->file_path)
                                    <div class="mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="far fa-file-pdf text-danger mr-2" style="font-size: 20px;"></i>
                                            <a href="{{ asset('filebook/' . $dt->file_path) }}" 
                                               target="_blank"
                                               class="text-primary">
                                                <span class="mr-2">{{ $dt->file_path }}</span>
                                            </a>
                                        </div>
                                    </div>
                                    @endif

                                    <input type="file" 
                                           class="form-control @error('file_buku') is-invalid @enderror" 
                                           name="file_buku" 
                                           accept=".pdf">
                                    <small class="form-text text-muted">
                                        Biarkan kosong jika tidak ingin mengubah file PDF dan Max 20MB
                                    </small>
                                    
                                    @error('file_buku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                                <hr>
                                <div class="form-group" style="margin-top: -15px">
                                    <label>Category</label>
                                    <select class="form-control" style="width: 100%;" name="category_id">
                                        <option>Pilih Category</option>
                                        @foreach ($category as $ctg)
                                        <option value="{{ $ctg->id }}"
                                            {{($dt->category_id == $ctg->id ? 'selected' : '')}}>{{ $ctg->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save">
                                        Simpan</i></button>
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
                    $('#img-upload').attr('src', e.target.result).show();
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