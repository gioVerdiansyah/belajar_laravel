<?php
// Di folder inilah kita akan membuat class class yang akan mendukung kebutuhan kita
namespace App\Http\Controllers\ClassHelper;

class Foo
{
    public function sampleTest()
    {
        return "Hello ini adalah semple test di class Foo";
    }

    public static function staticMethodTest()
    {
        return "Ini adalah sample test dari method statik";
    }
}
