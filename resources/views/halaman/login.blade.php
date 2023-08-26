@extends('layout.master-normal')
@section('title', 'Halaman Login Karyawan')

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
        <div class="collapse navbar-collapse" id="navbar">
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
        </div>
    </div>
</nav>

<main class="container">
    <h2 class="my-4">Form Login</h2>
    <hr />

    @if(session()->has('message'))
    <div class="alert alert-info w-50">
        {{ session()->get('message') }}
    </div>
    @endif

    <form action="{{ route('karyawan.login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input
                type="text"
                class="form-control w-50"
                id="username"
                name="username"
                value="{{ old('username') }}"
            />
            @error('username')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary my-2">
            Login
        </button>
    </form>
</main>
@endsection
