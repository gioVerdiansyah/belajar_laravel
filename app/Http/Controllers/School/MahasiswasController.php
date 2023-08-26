<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


// ! ====DB Facade (Raw SQL Queries)====
// DB facade adalah facade class bawaan Laravel yang berisi berbagai method untuk menjalankan query SQL.

class MahasiswasController extends Controller
{
    public function __invoke()
    {
        return "Berhasil di Proses";
    }

    public function insertSql()
    {
        $result = DB::insert("INSERT INTO mahasiswas(nim, nama, tempat_lahir, tanggal_lahir, fakultas, jurusan, ipk) VALUES ('11009887', 'Verdiansyah', 'Madiun', '2007-06-24', 'HAMTIKA', 'Informatika', 3.8)");

        dump($result);
    }
    public function inserTimestamp()
    {
        $result = DB::insert("INSERT INTO mahasiswas(nim, nama, tempat_lahir, tanggal_lahir, fakultas, jurusan, created_at, updated_at, ipk) VALUES ('12133567', 'Adi Kurniawan', 'Sirapan', '2006-03-12', 'HAMTIKA', 'Ilmu Komputer', now(), now(), 3.5)");

        dump($result);
    }
    public function insertPrepared()
    {
        $result = DB::insert(
            "INSERT INTO mahasiswas(nim, nama, tempat_lahir, tanggal_lahir, fakultas, jurusan, created_at, updated_at, ipk) VALUES (?,?,?,?,?,?,?,?,?)",
            ['19005582', 'Beta Dwi', 'kaligunting', '2006-08-21', 'UnipTa', 'Sistem Informasi', now(), now(), 3.6]
        );

        dump($result);
    }
    public function insertBinding()
    {
        $result = DB::insert(
            "INSERT INTO mahasiswas(nim, nama, tempat_lahir, tanggal_lahir, fakultas, jurusan, created_at, updated_at, ipk) VALUES (:nim, :nama, :tempat_lahir, :tanggal_lahir, :fakultas, :jurusan, :created_at, :update_at, :ipk)",
            [
                'nim' => "19000452",
                'nama' => "Ines",
                'tempat_lahir' => "Kaligunting",
                'tanggal_lahir' => "2007-02-08",
                'fakultas' => "UnimSa",
                'jurusan' => "Teknik Sistematika",
                'created_at' => now(),
                'updated_at' => now(),
                'ipk' => 3.7,
            ]
        );

        dump($result);
    }

    public function update()
    {
        $result = DB::update("UPDATE mahasiswas SET created_at = now(), updated_at = now() WHERE nim = ?", ['11009887']);

        dump($result);
    }
    public function delete()
    {
        $result = DB::delete('DELETE FROM mahasiswas WHERE nama = ?', ['Ines']);

        dump($result);
    }
    public function select()
    {
        $result = DB::select('SELECT * FROM mahasiswas');

        dump($result);
    }
    public function selectTampil()
    {
        $result = DB::select('SELECT * FROM mahasiswas');

        foreach ($result as $data) {
            echo "
            <ul>
            <li>Nim             : {$data->nim}</li>
            <li>Nama            : {$data->nama}</li>
            <li>Tempat Lahir    : {$data->tempat_lahir}</li>
            <li>Tanggal Lahir   : {$data->tanggal_lahir}</li>
            <li>Fakultas        : {$data->fakultas}</li>
            <li>Jurusan         : {$data->jurusan}</li>
            <li>IPK             : {$data->ipk}</li>
            </ul>";
        }
    }
    public function selectView()
    {
        $result = DB::select('SELECT * FROM mahasiswas');

        return view('school.Mahasiswas', ["mahasiswas" => $result]);
    }
    public function selectWhere()
    {
        $result = DB::select('SELECT * FROM mahasiswas WHERE ipk > ?', [3.60]);

        return view('school.Mahasiswas', ["mahasiswas" => $result]);
    }
    public function statement()
    {
        $result = DB::statement('TRUNCATE mahasiswas');
        // menghapus semua data yang ada di tabel "mahasiswas"

        return "Data Table \"mahasiswas\" <strong style='color:red'>berhasil di kosongkan</strong>";
    }
}