<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data siswa</title>
    <style>
    ul li p {
        margin: 0;
    }
    </style>
</head>

<body>
    <h1 style="text-align:center">Kumpulan data Siswa</h1>

      {{-- Cara ke pertama menggunakan assoc loop --}}

    {{--  for($i = 0; $i < 2; $i++): 
        <ul>
            <li><p> ${"siswa" . ($i+1)}[0] </p></li>
            <li><p> ${"siswa" . ($i+1)}[1] </p></li>
            {{-- ${"siswa" . $i} adalah konkatinasi nama variabel --}}
    {{--    </ul>
      endfor  --}}


      {{-- Cara ke dua tanpa assoc loop --}}
      @for ($i = 0; $i < count($siswa); $i++)
          <ul>
            <li>
                <p>{{$siswa[$i][0]}}</p>
            </li>
            <li>
                <p>{{$siswa[$i][1]}}</p>
            </li>
          </ul>
      @endfor

      {{-- menggunakan foreach --}}
      <h3>menggunakan foreach</h3>
      @foreach ($siswa as $item)
          <ul>
            <li>
                <h4>Siswa ke-{{$i++}}</h4>
            </li>
            <li>
                <p>{{$item[0]}}</p>
            </li>
            <li>
                <p>{{$item[1]}}</p>
            </li>
          </ul>
      @endforeach
    <footer>
        <p>Copyright © {{date("Y")}} Verdiansyah</p>
    </footer>
</body>

</html>