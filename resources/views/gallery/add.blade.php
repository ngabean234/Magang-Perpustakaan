@extends('layouts.master')

@section('content')
@if (\Auth::user()->role_id == 1)
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <form role="form" method="post" action="{{ url('gallery/add/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">{{$title}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title') }}" required placeholder="Masukkan Judul Foto" autocomplete="off">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>* Masukkan judul foto</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="textarea @error('description') is-invalid @enderror"
                                        placeholder="Masukkan deskripsi foto" name="description"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        {{ old('description') }}</textarea>
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
                            <div class="card-header">
                                <h3 class="card-title">Upload Foto</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                Browse… <input id="imgInp" type="file"
                                                    class="form-control @error('image_path') is-invalid @enderror"
                                                    name="image_path" value="{{ old('image_path') }}" required>

                                                @error('image_path')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong> * Upload Gambar</strong>
                                                </span>
                                                @enderror
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" value="Pilih Gambar" readonly>
                                    </div>
                                    <hr>
                                    <img src="" id='img-upload' width="100%" />
                                    <center>
                                        <p>Preview Gambar</p>
                                    </center>
                                    <hr>
                                </div>
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Simpan</button>
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
            var input = $(this).parents('.input-group').find(':text'),
                log = label;

            if (input.length) {
                input.val(log);
            } else {
                if (log) alert(log);
            }
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
