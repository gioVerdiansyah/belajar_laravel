{{-- @include('layout.header',["title" => "GuruKu"]) --}}

@extends('layout.master')
@section('title', 'Daftar Guru')
@section('menuGuru', 'active')
    
@section('content')
    
    <div class="container text-center mt-4">
        <h2>Daftar guru :</h2>
        <div class="row">
            <div class="col-sm-8 col-md-6 m-auto">
                <ol class="list-group my-4">
                    @foreach ($guru as $item)
                        <li class="list-group-item"><p class="text-center">{{$item}}</p></li>
                    @endforeach
                </ol>
            </div>
        <div >
    <div >

@endsection

{{-- @include('layout.footer') --}}