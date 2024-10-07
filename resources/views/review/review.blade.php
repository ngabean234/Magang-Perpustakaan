@extends('layouts.master')

@section('content')
@if (\Auth::user()->role_id == 1)
    <!-- Post -->
<div class="post clearfix mt-4">
    <div class="user-block">
        @if ($dt->user->photo == null)
            <img class="img-circle img-bordered-sm" src="https://cdn.iconscout.com/icon/free/png-512/avatar-372-456324.png" alt="User Image" width="30%">
        @else
            <img class="img-circle img-bordered-sm" src="{{ url('uploads/', $dt->user->photo) }}" alt="User Image" width="30%">
        @endif
        <span class="username">
            <a href="#">{{ $dt->user->name }}</a>
            <a href="#" class="float-right btn-tool"></a>
        </span>
        <span class="description">Pada buku "{{ $dt->book->judul }}" -  {{ \Carbon\Carbon::parse($dt->created_at)->diffForHumans() }}</span>
    </div>
    <!-- /.user-block -->
    <p>
        {!! $dt->text !!}
    </p>

    <form class="form-horizontal" method="POST" action="{{ route('balas.review.store', $dt) }}">
        @csrf
        <div class="input-group input-group-sm mb-0">
            <input type="hidden" name="book_id" value="{{ $dt->book->id }}">
            <input class="form-control form-control-sm" name="text" placeholder="Balas Review">
            <div class="input-group-append">
                <button type="submit" class="btn btn-danger">Send</button>
            </div>
        </div>
    </form>
</div>
<!-- /.post -->
@else
    @include('layouts.404')
@endif
@endsection
