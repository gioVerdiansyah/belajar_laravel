@extends('layout.master-normal')
@section('title', 'Form Pendaftaran')

@section('content')
<main class="pb-5">
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
                <h1>{{__('form.judul')}}:</h1>
                <hr>

                <form action="{{ route('students.update', ['student' => $siswas->id]) }}" method="post">
                    @method('PUT')
                    {{-- ! UPDATE --}}
                    <div class="mb-3">
                        <label for="nim">{{__('form.input.nim')}}</label><br>
                        <input type="number" class="form-control @error('nim') is-invalid @enderror" name="nim" id="nim" value="{{ old('nim') ?? $siswas->nim }}">
                        {{-- ! Null coalescing operator --}}
                        {{-- Jika old tidak ada maka tampilkan siswas->nim jika ada maka tampilkan dirinya sendiri --}}
                        @error('nim')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama">{{__('form.input.nama_lengkap')}}</label><br>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{old('nama') ?? $siswas->nama }}">
                        @error('nama')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('form.input.jenis_kelamin')}}</label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                id="laki_laki" value="L" {{
                                (old('jenis_kelamin') ?? $siswas->jenis_kelamin) == 'L' ? 'checked' : ''}}>
                                <label class="form-check-label" for="laki_laki">{{__('form.input.pilihan_jenis_kelamin.laki_laki')}}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                id="perempuan" value="P"
                                {{-- ! Checked Laravel 9 --}}
                                @checked((old('jenis_kelamin') ?? $siswas->jenis_kelamin) == 'P')
                                >
                                <label class="form-check-label" for="perempuan">{{__('form.input.pilihan_jenis_kelamin.perempuan')}}</label>
                            </div>
                        </div>
                        @error('jenis_kelamin')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="jurusan">{{__('form.input.jurusan')}}</label>
                        <select class="form-select" name="jurusan" id="jurusan">
                            <option value="Teknik Informatika"
                                {{ (old('jurusan') ?? $siswas->jurusan)=='Teknik Informatika' ? 'selected': '' }}>
                                Teknik Informatika
                            </option>
                            <option value="Sistem Informasi"
                                {{-- ! Selected laravel 9 --}}
                                @selected((old('jurusan') ?? $siswas->jurusan) == 'Sistem informasi')
                            >Sistem Informasi</option>
                            <option value="Ilmu Komputer"
                                 @selected((old('jurusan') ?? $siswas->jurusan) == 'Ilmu Komputer')
                            >Ilmu Komputer</option>
                            <option value="Teknik Komputer"
                                 @selected((old('jurusan') ?? $siswas->jurusan) == 'Teknik Komputer')
                            >Teknik Komputer</option>
                            <option value="Teknik Telekomunikasi"
                                 @selected((old('jurusan') ?? $siswas->jurusan) == 'Teknik Telekomunikasi')
                            >Teknik Telekomunikasi</option>
                        </select>
                        @error('jurusan')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="alamat">{{__('form.input.alamat')}}</label>
                        <textarea class="form-control" id="alamat" rows="3" name="alamat">{{old('alamat') ?? $siswas->alamat}}</textarea>
                    </div>
                    <input type="hidden" name="locale" value="{{ !empty($locale) ? $locale : 'en' }}" >
                    @csrf
                    <button type="submit" class="btn btn-primary mb-2">{{__('form.submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
