{{-- @include('layout.header', ["title" => "Data Siswa"]) --}}
{{-- Me include sambil mengirim data  --}}

{{-- ! Menggunakan versi extends --}}
@extends('layout.master')
@section('title', 'Data Siswa')
@section('menuSiswa', 'active')
    
    
@section('content')
@parent
{{-- kita bisa menampilkan @section('content') milik parent view, sekaligus isi @section('content') kepunyaan child view --}}
    <div class="container text-center mt-4">
        <h2>Daftar siswa :</h2>
        <div class="row">
            <div class="col-sm-8 col-md-6 m-auto">
                <ol class="list-group my-4">
                    @foreach ($siswa as $item)
                        <li class="list-group-item"><p class="text-center">{{$item}}</p></li>
                    @endforeach
                </ol>
            </div>
        <div >
    <div >

@endsection

{{-- @include('layout.footer') --}}