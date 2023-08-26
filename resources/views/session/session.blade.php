@extends('layout.master-normal')
@section('title', 'Ini Session')

@section('content')
    <main class="d-flex justify-content-center align-items-center mt-5">
        <ul class="list-group w-50 text-center">
            <li class="list-group-item"><a href="{{ route('session.buat') }}">Buat Session</a></li>
            <li class="list-group-item"><a href="{{ route('session.akses') }}">Akses Session</a></li>
            <li class="list-group-item"><a href="{{ route('session.hapus') }}">Hapus Session</a></li>
            <li class="list-group-item"><a href="{{ route('session.flash') }}">Flash Session</a></li>
        </ul>
    </main>
@endsection
