@extends('layouts.master')

@section('content')
<div class="row mt-2">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3>{{ $gallery->title }}</h3>
                            <hr>
                            <small>Posted By <strong>{{ $gallery->author }}</strong> at {{ \Carbon\Carbon::parse($gallery->created_at)->diffForHumans() }}</small>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset($gallery->image_path) }}" class="img-fluid" alt="{{ $gallery->title }}">
                            </div>