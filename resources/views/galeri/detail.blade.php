@extends('layouts.master')
@section('content')
@if (\Auth::user()->role_id == 1)
<div class="row mt-2">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="row">
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3>Detail Buku</h3>
                            <hr>
                            <small>Posted By <strong>{{ $dt->user->name }}</strong> at
                                {{ \Carbon\Carbon::parse($dt->created_at)->diffForHumans() }}
                            </small>
                        </div>
                        <div class="card-body">
                            <iframe style="width:100%;height:745px" src="{{$dt->embed}}"  seamless="seamless" scrolling="no" 
                                frameborder="0" allowtransparency="true" allowfullscreen="true" >
                            </iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="card-body">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Judul</th>
                                        <td>:</td>
                                        <td>{{ $dt->judul }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penulis</th>
                                        <td>:</td>
                                        <td>{{ $dt->penulis }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penerbit</th>
                                        <td>:</td>
                                        <td>{{ $dt->penerbit }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td>:</td>
                                        <td>{{ $dt->categories->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat</th>
                                        <td>:</td>
                                        <td>{{ date('d F Y', strtotime($dt->created_at)) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="card-body">
                            <p>Ringkasan :</p>
                            {!! $dt->ringkasan !!}
                        </div>
                    </div>

                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title"> Cover</h3>
                        </div>
                        <div class="card-body">
                            <img src="{{ url('cover', $dt->cover) }}" alt="" style="width: 100%">
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
