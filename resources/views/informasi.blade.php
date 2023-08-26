@extends('layout.master')
@section('title', "Info User")
@section('menuInfo', 'active')

@section('content')

    <div ></div>
    <div class="container text-center mt-3 p-4 bg-white">
        <h2>Hallo nama saya adalah {{$data[0]}} dari jurusan {{$data[1]}} </h2>
    </div>

@endsection