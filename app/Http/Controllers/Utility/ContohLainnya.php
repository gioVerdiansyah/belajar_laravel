<?php
namespace App\Http\Controllers\Utility;

class ContohLainnya
{
    public function __invoke($a = 0, $b = 0)
    {
        return $a + $b;
    }

    public function typeHintInt(int $a = 0, int $b = 0)
    {
        // tambahan int adalah agar tipe data yang dipanggil hanya integer saja
        return $a + $b;
    }

    public function typeHintFloatToInt($a = 0, $b = 0): int
    {
        return $a + $b;
    }

    public function getEnvVariabel()
    {
        return env('DB_HOST');
    }
}
