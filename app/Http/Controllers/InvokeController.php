<?php

namespace App\Http\Controllers;


class InvokeController extends Controller
{
    public function __invoke()
    {
        // method invoke digunakan agar pemanggilan route lebih sederhana
        return "Method __invoke di jalankan";
    }
}

// Di Terminal juga bisa langsung menuliskan method invoke
// php artisan make:controller ItemController --invokable