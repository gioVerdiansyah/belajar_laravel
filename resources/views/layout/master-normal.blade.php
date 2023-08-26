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

    @yield('content')

    <footer class="bg-dark py-4 text-white mt-4 bottom-0 start-0 w-100">
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
