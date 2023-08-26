{{-- ? memanggil pesan dari flash data --}}
@if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@extends('layout.master-normal')
@section('title', 'View Data Mahasiswas')

@section('content')
<main class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="py-4">
                <h2>Tabel Mahasiswa</h2>
                <a href="{{ route('students.create') }}" class="btn btn-success">Tambah</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($siswas as $siswa)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$siswa->nim}}</td>
                        <td>{{$siswa->nama}}</td>
                        <td>{{$siswa->jenis_kelamin == 'P'?'Perempuan':'Laki-laki'}}</td>
                        <td>{{$siswa->jurusan}}</td>
                        <td>{{$siswa->alamat == '' ? 'N/A' : $siswa->alamat}}</td>
                        <td class="d-flex">
                            <a href="{{ route('students.show', ['studentid' => $siswa->id]) }}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                @empty
                    <td colspan="6" class="text-center">Tidak ada data...</td>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
