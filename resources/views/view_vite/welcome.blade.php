<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello Vite</title>
    {{-- ! mengakses Vite --}}
    {{-- @vite('resources/css/app.css') --}}
    {{-- jika resouce yang dibutuhkan lebih dari satu maka kita bisa menulisnya dengan array assoc --}}
    {{-- @vite(['resources/css/app.css', 'resources/css/style.css']) --}}

    {{-- ? tidak perlu vite CSS karena JS pun juga bisa me import file CSS --}}

    @vite('resources/sass/style.scss')
</head>
<body>
    <h1>Ini adalah halaman untuk belajar Laravel Vite</h1>
    <p>Kamu meklik h1 sebanyak <span id="count">0</span></p>
</body>
@vite('resources/js/app.js')
{{-- @vite(['resources/js/app.js', 'resources/js/script.js']) --}}
</html>
{{-- perintah @vite akan otomatis mereload halaman jika ada perubahan file yang berhubungan dengan vite --}}


{{--! Bundling File Bootstrap --}}
{{-- kita perlu me install coompiler sass baru proses bundlingnya --}}
{{--
    npm add -D sass

    npm install bootstrap @popperjs/core
--}}
