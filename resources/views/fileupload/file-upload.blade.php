@extends('layout.master-normal')
@section('title', 'File Upload')

@section('content')

<main class="content mt4 p-5">
    <h2 class="text-center">File Upload</h2>
    <hr>

    <form action="{{ route('fileUpload.exercise') }}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="mb-3">
            <label for="fileName" class="form-label">Nama File:</label><br>
            <input type="text" name="fileName" id="fileName" class="form-control w-25">
            @error('fileName')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="berkas" class="form-label">Gambar Profile</label>
            <input type="file" class="form-control" id="berkas" name="berkas">
            @error('berkas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary my-2">Upload</button>
    </form>
</main>

@endsection
