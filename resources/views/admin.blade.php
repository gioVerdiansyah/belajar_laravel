<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <title>Admin Dashboard</title>
</head>
<body>
<div class="container text-center mt-3 p-4 bg-white">
  <h1 class="mb-3">Halaman Admin</h1>
  <div class="row">
    <div class="col-12">

      @component('layout.alert', ["class" => "warning", "judul" => "Peringatan"])
      {{-- alternatif lain jika tidak menggunakan @slot bisa di tambahkan parameter setelah alamat --}}
        100 data mahasiswa perlu di perbaiki
      @endcomponent

      @component('layout.alert')
      @slot('judul')
          Awas!
      @endslot
      @slot('class')
          danger
      @endslot
        Hari ini deadline laporan perjalanan dinas!
      @endcomponent

      @component('layout.alert')
      @slot('judul')
          Horee
      @endslot
      @slot('class')
          success
      @endslot
        2 minggu lagi akan diadakan libur panjang
      @endcomponent
    </div>
  </div>
</div>

<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
