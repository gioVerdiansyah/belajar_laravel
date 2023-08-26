@extends('layout.master-normal')
@section('title', 'Data Mahasiswa')

@section('content')

<main>
    <h1 class="text-center">Daftar Mahasiswa: </h1>
    <div class="container d-flex flex-row flex-wrap justify-content-around mt-5">
        <ol class="list-group list-group-numbered">
        @forelse ($mahasiswas as $mahasiswa)
            <li class="list-group-item">
                <a href='{{url("/university/mahasiswa/dengan/nim/$mahasiswa->nim")}}'><p>{{$mahasiswa->nama}}</p></a>
            </li>
            @empty
                <div class="alert alert-dark d-inline-block">Tidak ada data...</div>
            @endforelse
        </ol>
    </div>
</main>

@endsection
