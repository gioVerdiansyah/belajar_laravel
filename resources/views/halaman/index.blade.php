@extends('layout.master-normal')
@section('title', $judul)

@section('content')
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between align-items-center" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{route('karyawan.daftar')}}"
                    >
                        Daftar Mahasiswa
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{route('karyawan.tabel')}}"
                    >
                        Tabel Mahasiswa
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{route('karyawan.blog')}}"
                    >
                        Blog Mahasiswa
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav mt-2 mt-md-0">
                <li class="nav-item">
                    <span class="text-light">Hello, {{ session('username')}} </span>
                    <a class="nav-link d-inline" href="{{ route('karyawan.logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main class="container">
    <h1 class="text-center my-4">{{ $judul }}</h1>
    <hr>
</main>
@endsection
