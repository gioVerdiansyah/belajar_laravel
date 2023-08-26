<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    {{-- mengambil data saat di include --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="/css/my-style.css" rel="stylesheet">
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
                <a class="nav-link active" href="/data-siswa">Data siswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/guru">GuruKu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/my-gallery">My Gallery</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>