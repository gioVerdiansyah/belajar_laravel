<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Silahkan kunjungi :</h1>
    <h3>Controller yang tersedia</h3>
    <br>
    <a href="{{route('sc_siswa')}}">method SchoolController siswa</a>
    <br>
    <a href="{{route('sc_siswa_ops', ["Verdi", 25, "RPL"])}}">method SchoolController siswa-siswi</a>
    <br>
    <a href="{{route('sc_data_siswa')}}">method SchoolController data siswa</a>
    <br>
    <a href="{{route('sc_admin')}}">method SchoolController admin</a>
    <br>
    <a href="{{route('guru')}}">method SchoolController guru</a>
    <br>
    <a href="{{route('gallery')}}">method SchoolController gallery</a>
    <br>
    <a href="{{route('info')}}">method SchoolController info</a>
</body>
</html>
