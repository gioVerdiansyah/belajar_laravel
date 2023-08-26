@extends('layout.master-normal')
@section('title', 'Form Pendaftaran')

{{-- ! Menampilkan pesan error --}}
{{-- Pesan error ini disimpan dalam instance dari class Illuminate\Support\MessageBag, yang bisa di akses dari dalam view menggunakan variabel $errors --}}

@section('content')
<main>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
                {{-- ! Contoh penggunaan Localization --}}
                <h1>{{__('form.judul')}}:</h1>
                <hr>
                {{-- ! Cek pesan Error jika user tidak memenuhi validasi data --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <h4 class="text-danger">{{__('form.gagal_validasi_data_title')}}</h4>
                    <ul class="text-danger">
                    @foreach ($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                    </ul>
                </div>
                @endif

                {{-- ! Translation Strings --}}
                <p class="lead">{{__('form.nama_kampus')}}</p>
                <p class="lead">{{__('Universitas Siber dan Sandi Negara')}}</p>
                {{-- __('Universitas Siber dan Sandi Negara') ini sekarang di ambil dari id.json dan en.json --}}

                {{-- Jika kedua padanan kedua tersebut tidak di temukan maka teks tersebut akan tampil di browser --}}

                <form action="{{url('/localization/form/validate-data-with-local')}}" method="post">
                    <div class="mb-3">
                        <label for="nim">{{__('form.input.nim')}}</label><br>
                        <input type="number" class="form-control @error('nim') is-invalid @enderror" name="nim" id="nim"
                        {{-- Jika ada yang tidak lolos validasi kita bisa menetapkan nilai yang pernah di user menggunaka fungsi old() yang di simpan di SESSION --}}

                        value="{{old('nim')}}">
                        {{-- ! Menampilkan error terpisah --}}
                        @error('nim')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama">{{__('form.input.nama_lengkap')}}</label><br>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{old('nama')}}">
                        @error('nama')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email">{{__('form.input.email')}}</label><br>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('form.input.jenis_kelamin')}}</label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                id="laki_laki" value="L" {{old('jenis_kelamin') == 'L' ? 'checked' : ''}}>
                                <label class="form-check-label" for="laki_laki">{{__('form.input.pilihan_jenis_kelamin.laki_laki')}}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                id="perempuan" value="P"
                                {{-- ! Checked Laravel 9 --}}
                                @checked(old('jenis_kelamin') == 'L')
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
                                {{ old('jurusan')=='Teknik Informatika' ? 'selected': '' }}>
                                Teknik Informatika
                            </option>
                            <option value="Sistem Informasi"
                                {{-- ! Selected laravel 9 --}}
                                @selected(old('jurusan') == 'Sistem informasi')
                            >Sistem Informasi</option>
                            <option value="Ilmu Komputer"
                                 @selected(old('jurusan') == 'Sistem informasi')
                            >Ilmu Komputer</option>
                            <option value="Teknik Komputer"
                                 @selected(old('jurusan') == 'Sistem informasi')
                            >Teknik Komputer</option>
                            <option value="Teknik Telekomunikasi"
                                 @selected(old('jurusan') == 'Sistem informasi')
                            >Teknik Telekomunikasi</option>
                        </select>
                        @error('jurusan')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="alamat">{{__('form.input.alamat')}}</label>
                        <textarea class="form-control" id="alamat" rows="3" name="alamat">{{old('alamat')}}</textarea>
                    </div>
                    <input type="hidden" name="locale" value="{{ !empty($locale) ? $locale : 'en' }}" >

                    @csrf
                    {{-- CSRF Token --}}
                    <button type="submit" class="btn btn-primary mb-2">{{__('form.submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
