{{-- @include('layout.header', ["title" => "My Gallery"]) --}}

@extends('layout.master')
@section('title', "Gallery Ku")
@section('menuGallery', 'active')
    
@section('content')

    <div class="container text-center mt-4">
        <h2>gallery Ku :</h2>
        <div class="row flex-row flex-wrap w-50 m-auto">
            @for ($i = 1; $i <= 4; $i++)
            <div class="col-md-6 mt-3">
                <img src="/img/people{{$i}}.jpg" width="150" class="img-thumbnail m-2" alt="sample gambar">
            </div>
            @endfor
        <div >
    <div >

@endsection

{{-- @include('layout.footer') --}}