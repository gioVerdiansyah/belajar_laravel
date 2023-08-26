<?php

namespace App\Http\Controllers\CobaMiddleware;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MiddlewareController extends Controller
{
    // me aktifkan meddleware dari controller
    public function __construct()
    {
        // untuk semua yang ada di controller ini
        // $this->middleware('test');

        // method tertentu
        // $this->middleware('test')->only('daftarMahasiswa');

        // lebih dari satu method
        // $this->middleware('test')->only('daftarMahasiswa', 'tableMahasiswa');

        // kecuali method tertentu
        $this->middleware('test')->except('tabelMahasiswa');
    }
    public function daftarMahasiswa()
    {
        return "Hello ini adalah tempat untuk daftar Mahasiswa";
    }
    public function tabelMahasiswa()
    {
        return "Ini adalah halaman table mahasiswa";
    }
    public function blogMahasiswa()
    {
        return "Halaman ini untuk mengurus blog-blog mahasiswa";
    }
}