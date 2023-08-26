{{-- Secara garis besar blade adalah teknik untuk mempersingkat penggunaan tag PHP dalam HTML --}}
{{-- Contoh penggunaan --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>blade</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <p>hallo {{$nama}}</p>

    {{-- Tanda kurung blade {{  }} sebenarnya tidak hanya menggantikan perintah echo saja, tapi
    juga menjalankan function htmlspecialchars() sebelum menampilkan data tersebut. --}}
    <div class="text-center">
        <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{!! $nama_siswa !!}</h1>
        <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{$nilai}}</h1>
        <h1 class="bg-dark px-3 py-1 text-white d-inline-block">{{$grade}}</h1>
        <br>

        {{-- menggunakan pengkondisian --}}
        @if (($nilai >= 0) and ($nilai < 50))
            <div class="alert alert-danger d-inline-block">
                Maaf, anda tidak lulus
            </div>
        @elseif(($nilai >= 50) and ($nilai <= 100))
            <div class="alert alert-success d-inline-block">
                Selamat, anda lulus
            </div>
        @else
            <div class="alert alert-dark d-inline-block">Nilai tidak valid</div>
        @endif

        {{-- Menggunakan Switch Case --}}
        @switch($grade)
            @case('A')
                <div class="alert alert-success d-inline-block">Grade yang Sempurna!</div>
                @break
            @case('B')
                <div class="alert alert-success d-inline-block">Grade yang Bagus!!</div>
                @break
            @case('C')
                <div class="alert alert-warning d-inline-block">Grade yang cukup bagus!</div>
                @break
            @case('D')
                <div class="alert alert-warning d-inline-block">Tingkatkan Skills kamu!!</div>
                @break
            @case('E')
                <div class="alert alert-danger d-inline-block">Grade kamu buruk!! Coba lebih giat lagi</div>
                @break
            @default
                <div class="alert alert-dark d-inline-block">Nilai grade hanya sampe E</div>
        @endswitch

        <br>

        {{-- Menggunakan perulangan --}}
        @for ($i = 0; $i <= 2; $i++)
            <div class="alert alert-success d-inline-block">Perulangan angka ke-{{($i+1)}}</div>
        @endfor

    <br>

    {{-- Perulangan forelse --}}
    @forelse ($array as $val)
        @if (($val >= 0) and ($val < 50))
            <div class="alert alert-danger d-inline-block">
                {{$val}}
            </div>
        @elseif (($val >= 50) and ($val <= 100))
            <div class="alert alert-success d-inline-block">
                {{$val}}
            </div>
        @endif
    @empty
        <div class="alert alert-dark d-inline-block">Tidak ada nilai...</div>
    @endforelse
    {{-- mirip dengan foreach tapi jika variabel $array berisi array atau tidak --}}

        <br>

    {{-- Menggunakan continue dan break --}}
    @foreach ($array as $val)
        @if ($val < 50)
            @continue
            {{-- Jika ada nilai yang kurang dari 50 di lewati atau eksekusi nilai selanjutnya --}}

            {{-- @break --}}
            {{-- jika ketemu nilai yang kurang dari 50 maka program if else di hentikan --}}
        @else
             <div class="alert alert-success d-inline-block">
                {{$val}}
            </div>
        @endif
    @endforeach

    <br>

    {{-- di blade juga menyediakan tag php --}}
    @php
        echo "!true adalah ";
        var_dump(!true);
    @endphp
    </div>

</body>
</html>