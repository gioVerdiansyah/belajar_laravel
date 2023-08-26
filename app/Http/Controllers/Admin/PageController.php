<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str as StringMagic; // mengakses Facade dengan use
use App\Http\Controllers\ClassHelper\Foo;
use App\Http\Controllers\ClassHelper\TraitTest; // memanggil trait 

// ! Membuat controller secara manual
class PageController extends Controller
{
    public function index()
    {
        return "<h1>Controller index()</h1>";
    }

    public function siswa()
    {
        // ! Mengakses View dari Controller
        return view('view_route.pc_siswa')->with('dataSiswa', [
            "Risa Lestari",
            "Rudi Hermawan",
            "Bambang Kusumo",
            "Lisa Permata"
        ]);
    }

    // ! Mencoba mengakses Facade
    // facade adalah kumpulan helper function yang 'dibungkus' dalam bentuk class
    public function tryToAccessFacade()
    {
        // Akses Facade secara Langsung
        echo \Illuminate\Support\Str::snake('KenapaMemahamiWanita');
        echo '<br>';
        // Mengakses Facade menggunakan use
        echo StringMagic::kebab('LebihSulitDariPadaMemahami');
        echo '<br>';
        echo StringMagic::camel('BahasaPemrograman?');

        // kode Str adalah memanipulasi string menjadi gaya penulisan snake, kebab, dan camel
    }

    // ! Membuat class helper
    //  membuat class sendiri agar bisa diakses dari beberapa controller terpisah.

    // ! mengakses trait
    use TraitTest;
    public function classHelper()
    {
        // menggunakan class helper
        $foo = new \App\Http\Controllers\ClassHelper\Foo;
        echo $foo->sampleTest();

        echo "<br>";

        // class helper static method
        echo Foo::staticMethodTest();

        echo "<br>";

        // ! Menggunakan trait
        echo $this->sampleTestTrait();
    }

}

?>
<!-- Dipindah ka Admin karena Pembuatan folder admin seolah-olah dipakai untuk menampung semua controller yang berkaitan dengan pemrosesan admin. -->
