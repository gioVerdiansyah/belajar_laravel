<?php
namespace App\Http\Controllers\ClassHelper;

// simple test menggunakan trait
// Dalam PHP, sebuah class hanya bisa diturunkan dari satu class saja (single inheritance). Jika kita butuh mengakses class lain dan ingin membuat suatu hubungan, trait bisa menjadi solusi. Dengan kata lain, trait dirancang untuk mengatasi single inheritance.

// ! Salah satu ciri utama dari trait ada di penggunaan perintah use di dalam class
trait TraitTest
{
    public function sampleTestTrait()
    {
        return "Ini adalah sample test menggunakan trait";
    }
}
