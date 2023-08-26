<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Sistem Informasi Siswa')</title>
    {{-- Parameter kedua adalah nilai Default --}}
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    {{-- ! Asset dan Url Function Helper URL ke folder public--}}
    <link href="{{asset('/css/my-style.css')}}" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link @yield('menuSiswa')" href="/data-siswa">Data siswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('menuGuru')" href="{{route('guru')}}">GuruKu</a>
                {{-- misal route untuk guru seperti /masuk/sebagai/admin/guru maka akan saat melelahkan jika saya memiliki anchor dan memiliki nama yang panjang seperti itu, maka kita bisa menggunakan teknik Named Route dengan method name() di Route--}}
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('menuGallery')" href="{{route('gallery')}}">My Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('menuInfo')" href="{{route('info', ['nama' => 'Verdi', 'jurusan' => 'RPL'])}}">Info</a>
                {{-- Route associative array --}}
              </li>
            </ul>
          </div>
        </div>
      </nav>

      @section('content')
        <div class="alert alert-primary text-center m-auto">Sistem Informasi Mahasiswa</div>
      @show
      {{-- akan diisi kontent saat panggil --}}
      {{-- Perintah @yield dipakai untuk menandai bagian yang bisa ditimpa oleh view turunan nantinya. Teks di dalam tanda kurung merupakan nama atau id dari yield tersebut --}}
      {{-- jika diawali dengan @section dan di akhiri @show dan di dalamnya adalah nilai default yang ditampilkan jika ada salah satu file yang hanya me extends saja --}}

    <footer class="bg-dark py-4 text-white mt-4 position-absolute bottom-0 start-0 w-100">
        <div class="container text-center">
            Copyright © | {{date("Y")}}
            {{-- ! Asset dan Url Function Helper  URL relative dengan domain --}}
            <a href="{{url('informasi/Verdi/RPL')}}">Verdi</a>
        </div>
    </footer>

</body>
<script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/js/script.js')}}"></script>
</html>
