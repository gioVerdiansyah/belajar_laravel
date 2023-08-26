<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Contoh menggunakan isi array assoc yang ada di file Localization --}}
    <title>{{__('test.title')}}</title>
</head>

<body>
    <h1>{{__('test.sample_test')}}</h1>
    {{-- Perintah __() merupakan function khusus blade untuk menampilkan teks localization. --}}
    {{-- Alternatif cara lain bisa dengan perintah @lang seperti berikut: --}}
    </p>@lang('test.sample_test')</p>

    <h1 style="text-align: center">@lang('test.home.title')</h1>
</body>

</html>
