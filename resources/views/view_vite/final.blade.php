<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel + Vite</title>
    @vite('resources/sass/style.scss')
    <link rel="stylesheet" href="{{asset('build/assets/app-ba53db02.css')}}">
</head>
<body>
    <div class="container text-center py-4">
        <h1>Belajar Vite</h1>

        <p>Anda menekan h1 sebanya <span id="count">0</span></p>

        <button id="myPopover" type="button" class="btn btn-lg btn-danger mt-4"
        data-bs-toggle="popover" title="Lagi serius..." data-bs-content="Buku Laravel Uncover top bgt!"> Belajar Laravel </button>
    </div>
</body>
@vite('resources/js/app.js')
<script src="{{asset('build/assets/app-5f637156.js')}}"></script>
</html>
{{--! kode vite di atas adalah untuk mengakses file assets --}}
{{-- Selain itu di dalam kode HTML terdapat beberapa class bawaan Bootstrap untuk memastikan file Bootstrap sudah berhasil dibundle --}}

{{-- Anda bebas apakah ingin menjalankan Laravel Vite dengan perintah npm run dev, atau langsung men-generate file assets dengan perintah npm run build. --}}
