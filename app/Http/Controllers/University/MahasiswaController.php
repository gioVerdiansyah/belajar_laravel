<?php

namespace App\Http\Controllers\University;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// ! ====Query Bulider====
// Query builder adalah interface khusus yang disediakan Laravel untuk mengakses database. Berbeda dengan raw query yang mengharuskan kita menulis perintah SQL, di dalam query builder perintah SQL ini diakses menggunakan method. Artinya, kita tidak menulis langsung perintah SQL, cukup memanggil method-method saja.

class MahasiswaController extends Controller
{
    public function __invoke()
    {
        return "Ini adalah halaman untuk mengatur DataBase";
    }
    public function insert()
    {
        $result = DB::table('mahasiswas')->insert(
            [
                'nim' => "11009887",
                'nama' => "Verdiansyah",
                'tempat_lahir' => "Madiun",
                'tanggal_lahir' => "2007-06-24",
                'fakultas' => "HAMTIKA",
                'jurusan' => "Informatika",
                'created_at' => now(),
                'updated_at' => now(),
                'ipk' => 3.8,
            ]
        );
        dump($result);
    }
    public function insertBanyak()
    {
        $result = DB::table('mahasiswas')->insert(
            [
                //Array 2D
                [
                    'nim' => "12133567",
                    'nama' => "Adi Kurniawan",
                    'tempat_lahir' => "Sirapan",
                    'tanggal_lahir' => "2006-03-12",
                    'fakultas' => "HAMTIKA",
                    'jurusan' => "Ilmu Komputer",
                    'created_at' => now(),
                    'updated_at' => now(),
                    'ipk' => 3.5,
                ],
                [
                    'nim' => "19005582",
                    'nama' => "Beta Dwi",
                    'tempat_lahir' => "kaligunting",
                    'tanggal_lahir' => "2006-08-21",
                    'fakultas' => "UnipTa",
                    'jurusan' => "Sistem Informasi",
                    'created_at' => now(),
                    'updated_at' => now(),
                    'ipk' => 3.6,
                ]
            ]
        );
        dump($result);
    }

    public function update()
    {
        $result = DB::table('mahasiswas')
            ->where('nama', 'Verdiansyah')
            ->update(
                [
                    'tanggal_lahir' => '1999-06-24',
                    'ipk' => 4.0,
                    'updated_at' => now()
                ]
            );

        dump($result);
    }
    public function updateWhere()
    {
        $result = DB::table('mahasiswas')
            ->where('ipk', '<', 3.60)
            ->where('nama', '<>', 'Ines') //Kecuali yang bernama Ines
            ->update(
                [
                    'ipk' => 3.60,
                    'updated_at' => now()
                ]
            );

        dump($result);
    }
    public function updateOrInsert()
    {
        // Jika data yang ingin di update belum ada di tabel, maka jalankan proses insert
        $result = DB::table('mahasiswas')->updateOrInsert(
            [
                'nim' => '19000452'
            ],
            [
                'nama' => "Ines",
                'tempat_lahir' => "kaligunting",
                'tanggal_lahir' => "2007-02-08",
                'fakultas' => "UnipSa",
                'jurusan' => "Teknik Sistematika",
                'created_at' => now(),
                'updated_at' => now(),
                'ipk' => 3.45,
            ]
        );

        dump($result);
    }

    public function delete()
    {
        $result = DB::table('mahasiswas')
            ->where('ipk', '<', 3.50) // Hapus ipk yang kurang dari 3.6
            ->delete();

        dump($result);
    }

    public function get()
    {
        $result = DB::table('mahasiswas')->get();

        dump($result);
    }
    public function getTampil()
    {
        $result = DB::table('mahasiswas')->get();

        foreach ($result as $item) {
            echo "
            <ul>
            <li>Nim             : {$item->nim}</li>
            <li>Nama            : {$item->nama}</li>
            <li>Tempat Lahir    : {$item->tempat_lahir}</li>
            <li>Tanggal Lahir   : {$item->tanggal_lahir}</li>
            <li>Fakultas        : {$item->fakultas}</li>
            <li>Jurusan         : {$item->jurusan}</li>
            <li>IPK             : {$item->ipk}</li>
            </ul>";
        }
    }

    public function getView()
    {
        $result = DB::table('mahasiswas')->get();

        return view('school.Mahasiswas', ['mahasiswas' => $result]);
    }
    public function getWhere()
    {
        $result = DB::table('mahasiswas')
            ->where('ipk', '>', 3.50)
            ->orderBy('nama', 'DESC')
            ->get();

        return view('school.Mahasiswas', ['mahasiswas' => $result]);
    }

    public function select()
    {
        $result = DB::table('mahasiswas')
            ->select('nim', 'nama as nama_mhs')
            ->get();
        // hanya memilih nim dan nama yang di ganti menjadi nama_mhs

        dump($result);
    }

    public function take()
    {
        // Method skip() dipakai untuk melompati baris, sedangkan take() untuk mengambil baris

        $result = DB::table('mahasiswas')
            ->skip(1)->take(2)->get();

        return view('school.Mahasiswas', ['mahasiswas' => $result]);
    }
    public function first()
    {
        // method first() dipakai untuk mengambil 1 baris data pertama saja

        $result = DB::table('mahasiswas')
            ->where('nama', 'Verdiansyah')->first();

        // dump($result);

        // Jika kita ingin mengirimkannya ke view maka tidak bisa langsung, karena  variabel $mahasiswas bukan berisi array dari object, tapi sudah langsung object saja

        // ? Maka solusinya membungkusnya kedalam array :
        return view('school.Mahasiswas', ['mahasiswas' => [$result]]);
    }

    public function find()
    {
        // Method find() bisa dipakai secara cara singkat untuk mengambil 1 data tabel yang memiliki id tertentu

        $result = DB::table('mahasiswas')->find(8);

        return view('school.Mahasiswas', ['mahasiswas' => [$result]]);
    }

    public function raw()
    {
        // Method selectRaw() bisa dipakai untuk menjalankan query select dalam bentuk perintah raw SQL

        $result = DB::table('mahasiswas')
            ->selectRaw('count(*) as total_mhs')
            ->get();
        // menghitung jumlah baris yang terdapat di dalam tabel mahasiswas

        echo $result[0]->total_mhs;
    }


    // Study khasus
    public function mahasiswas()
    {
        $result = DB::table('mahasiswas')
            ->select('nim', 'nama')
            ->get();

        return view('school.daftar-mahasiswa', ['mahasiswas' => $result]);
    }
    public function getDetailMhs($nim)
    {
        $result = DB::table('mahasiswas')
            ->where('nim', $nim)
            ->first();

        return view('school.Mahasiswas', ['mahasiswas' => [$result]]);
        // dump($result);
    }
}