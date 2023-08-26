<?php
// ini adalah chellenge memindahkan controller siswa view memnjadi contoller view
namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SekolahController
{
    public function __invoke(): Response
    {
        return response()->view('school.controller');
        // Efek yang dihasilkan sama saja jika kita langsung memanggil method view(), hanya saja data yang ingin dikirim ke view harus ditulis sebagai argument kedua, tidak bisa lagi menggunakan method with()
    }
    public function siswa()
    {
        $myArray = [
            ["Verdi", "X RPL 2"],
            ["Adi", "X RPL 1"],
            ["Beta", "X RPL 1"]
        ];
        return view('school.siswa', ["siswa" => $myArray]);
    }

    public function siswaSiswi($nama, $no, $jurusan)
    {
        return view('school.siswa-siswi')
            ->with("nama", $nama)
            ->with("no_absen", $no)
            ->with("jurusan", $jurusan);
    }

    public function admin()
    {
        return view('admin');
    }
    public function dataSiswa()
    {
        $myArray = ["Verdi", "Adi", "Beta",];
        return view('school.data-siswa', ["siswa" => $myArray]);
    }

    public function guru()
    {
        $dataGuru = ["Pak Sudarmanto", "Pak Ananda", "Pak Rofik", "Pak Agung"];

        return view('school.guru')->with("guru", $dataGuru);
    }

    public function gallery()
    {
        return view('school.my-gallery');
    }

    public function info($nama = "<User>", $jurusan = "<Pilih_jurusan>")
    {
        return view('informasi')->with('data', [$nama, $jurusan]);
    }
}