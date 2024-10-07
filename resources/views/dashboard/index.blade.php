@extends('layouts.master')

@section('content')

@if (\Auth::user()->role_id == 1)

@include('layouts.boxes')

@else

@if (\Auth::user()->is_block == 1)
<div class="row mt-2">
    <div class="col">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="icon fas fa-info"></i> PERINGATAN !<br>
            Dikarenakan anda telah melanggar komunitas kami, maka
            akun anda kami blokir sementara, silahkan hubungi admin untuk aktivasi kembali. 
            Terimakasih.
            <br>
            <br>
            <br>
            <br>
            <center>~~ Admin ~~</center> 
        </div>
    </div>
</div>
@else
@include('layouts.perpus')
@endif

@endif

@endsection
