@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('message') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@extends('layout.master-normal')
@section('title', 'Biodata Mahasiswas')

@section('content')
<main class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="pt-3">
                <h1 class="h2">Biodata {{$studentid->nama}}</h1>
                <div class="d-flex">
                    <a href="{{ route('students.edit', ['id' => $studentid->id]) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('students.destroy', ['studentid' => $studentid->id]) }}" method="POST">
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ms-3 me-3">Hapus</button>
                        @csrf
                    </form>
                    <a href="{{ route('students.index') }}" class="btn btn-success">Kembali</a>
                </div>
            </div>
            <hr>
            <ul>
                <li>NIM: {{$studentid->nim}} </li>
                <li>Nama: {{$studentid->nama}} </li>
                <li>Jenis Kelamin: {{$studentid->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki'}}</li>
                <li>Jurusan: {{$studentid->jurusan}} </li>
                <li>Alamat: {{$studentid->alamat == '' ? 'N/A' : $studentid->alamat}}</li>
            </ul>
        </div>
    </div>
</main>
@endsection
