@extends('layouts.master')

@section('content')
@if (\Auth::user()->role_id == 1)
<div class="row mt-2">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3>Detail Galeri</h3>
                            <hr>
                            <small>Posted By <strong>Admin</strong> at {{ \Carbon\Carbon::parse($gallery->created_at)->diffForHumans() }}</small>
                        </div>
                        <div class="card-body">
                            <div class="mt-3 text-center">
                                <h5>Deskripsi</h5> <!-- Judul tetap di tengah -->
                            </div>
                            <p>{{ strip_tags(html_entity_decode($gallery->description)) }}</p> <!-- Teks deskripsi di sebelah kiri tanpa tag HTML atau entitas -->
                        </div>                                               
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Galeri</h3>
                        </div>
                        <div class="card-body">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Judul</th>
                                        <td>:</td>
                                        <td>{{ $gallery->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fotografer</th>
                                        <td>:</td>
                                        <td>{{ $gallery->author }}</td>
                                    </tr>
                                    <tr>
                                        <th>Diambil Tanggal</th>
                                        <td>:</td>
                                        <td>{{ date('d F Y', strtotime($gallery->date_taken)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lokasi</th>
                                        <td>:</td>
                                        <td>{{ $gallery->location }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat</th>
                                        <td>:</td>
                                        <td>{{ date('d F Y', strtotime($gallery->created_at)) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                
                    <div class="card card-outline card-info mt-3"> <!-- Tambahkan mt-3 untuk jarak -->
                        <div class="card-header">
                            <h3 class="card-title">Foto</h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center"> <!-- Tambahkan text-center untuk meratakan gambar -->
                                <img src="{{ asset($gallery->image_path) }}" alt="Cover {{ $gallery->title }}" class="img-fluid"> <!-- Ganti style dengan class Bootstrap img-fluid -->
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
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
