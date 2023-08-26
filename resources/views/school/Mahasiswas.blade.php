@extends('layout.master-normal')
@section('title', 'Data Mahasiswa')

@section('content')

<main>
    <h1 class="text-center">Daftar Data Mahasiswa: </h1>
    <div style="width: 70%" class="container d-flex flex-row flex-wrap justify-content-around mt-5">
    @forelse ($mahasiswas as $mahasiswa)
        <ul>
            <li>
                <p>Nim:{{$mahasiswa->nim}}</p>
            </li>
            <li>
                <p>Nama:{{$mahasiswa->nama}}</p>
            </li>
            <li>
                <p>Tempat Lahir:{{$mahasiswa->tempat_lahir}}</p>
            </li>
            <li>
                <p>Tanggal Lahir:{{$mahasiswa->tanggal_lahir}}</p>
            </li>
            <li>
                <p>Fakultas:{{$mahasiswa->fakultas}}</p>
            </li>
            <li>
                <p>Jurusan:{{$mahasiswa->jurusan}}</p>
            </li>
            <li>
                <p>IPK:{{$mahasiswa->ipk}}</p>
            </li>
        </ul>
        @empty
            <div class="alert alert-dark d-inline-block">Tidak ada data...</div>
        @endforelse
    </div>
</main>

@endsection
