<?php

namespace App\Http\Controllers\University;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// ! ====Eloquent ORM====
// Eloquent ORM adalah cara pengaksesan database dimana setiap baris tabel dianggap sebagai sebuah object. Kata ORM sendiri merupakan singkatan dari Object-relational mapping, yakni suatu teknik programming untuk mengkonversi data ke dalam bentuk object.

// Eloquent ORM memerlukan Model untuk proses konversi data tabel menjadi object. Object inilah yang nantinya akan kita akses dari dalam controller. Sama seperti pembuatan berbagai file di Laravel, tersedia perintah php artisan untuk membuat Model. Berikut format dasar perintah yang digunakan:
// php artisan make:model <namaModel>

use App\Models\Mahasiswas; // File dari pembuatan model

class MahasiswasController extends Controller
{
    public function __invoke()
    {
        return "Ini adalah page untuk mengatur siswa";
    }
    public function cekObject()
    {
        $mahasiswa = new Mahasiswas;

        dump($mahasiswa);
    }
    public function insert()
    {
        $mahasiswa = new Mahasiswas;

        $mahasiswa->nim = "11009887";
        $mahasiswa->nama = "Verdiansyah";
        $mahasiswa->tempat_lahir = "Madiun";
        $mahasiswa->tanggal_lahir = "2007-06-24";
        $mahasiswa->fakultas = "HAMTIKA";
        $mahasiswa->jurusan = "Informatika";
        $mahasiswa->ipk = 3.8;
        $mahasiswa->save();
        // Tidak semua kolom harus diisi
        // ? created_at dan updated_at sudah otomatis terisi

        dump($mahasiswa);
    }

    public function massAssignment()
    {
        // teknik mass assignment. Disebut seperti ini karena kita bisa mengisi banyak property untuk object Mahasiswa dalam sekali proses.

        Mahasiswas::create(
            [
                'nim' => '12433567',
                'nama' => 'Adi Kurniawan',
                'tempat_lahir' => 'Sirapan',
                'tanggal_lahir' => '2006-03-12',
                'fakultas' => 'HAMTIKA',
                'jurusan' => 'Ilmu Komputer',
                'ipk' => 3.5
            ]
        );
        // Error: Add [nim] to fillable property to allow mass assignment on [App\Models\Mahasiswas]
        // Error ini terjadi karena Laravel membatasi akses ke sebuah tabel ketika di proses menggunakan mass assignment.
        // Pembatasan ini dibuat karena mass assignment sering dipakai dengan nilai yang langsung berasal dari form

        // Dalam contoh ini, saya harus mendaftarkan kolom 'nim', 'nama', 'tempat_lahir', 'tanggal_lahir', 'fakultas', 'jurusan' dan 'ipk' ke dalam property $fillable yang ada di model Mahasiswa. Property ini memang tidak ada sebelumnya dan harus kita tambah manual

        // Cara lain untuk mengizinkan nama kolom bisa diakses dari mass assignment adalah menggunakan property $guarded
        //  property $guarded dipakai untuk menulis nama kolom apa saja yang tidak boleh diisi.

        return "Berhasil di proses";
    }


    public function massAssignment2()
    {
        $mhs1 = new Mahasiswas;
        $mhs1->nim = "19005582";
        $mhs1->nama = "Beta Dwi";
        $mhs1->tempat_lahir = "Kaligunting";
        $mhs1->tanggal_lahir = "2006-08-21";
        $mhs1->fakultas = "UnipTa";
        $mhs1->jurusan = "Sistem Informasi";
        $mhs1->ipk = 3.6;
        $mhs1->save();

        dump($mhs1);

        $mhs1 = new Mahasiswas;
        $mhs1->nim = "19015672";
        $mhs1->nama = "Ines";
        $mhs1->tempat_lahir = "Kaligunting";
        $mhs1->tanggal_lahir = "2007-02-08";
        $mhs1->fakultas = "UnipSa";
        $mhs1->jurusan = "Teknik Informatika";
        $mhs1->ipk = 3.5;
        $mhs1->save();

        dump($mhs1);

        $mhs1 = new Mahasiswas;
        $mhs1->nim = "19100345";
        $mhs1->nama = "Asti";
        $mhs1->tempat_lahir = "Garon";
        $mhs1->tanggal_lahir = "2006-02-11";
        $mhs1->fakultas = "UnigTa";
        $mhs1->jurusan = "Digital Marketing";
        $mhs1->ipk = 3.65;
        $mhs1->save();

        dump($mhs1);
    }

    public function update()
    {
        $mhs = Mahasiswas::find(20);
        $mhs->jurusan = "Sarjana Komputer";
        $mhs->ipk = 3.75;
        $mhs->save();

        dump($mhs);
    }
    public function updateWhere()
    {
        $mhs = Mahasiswas::where('nim', '12133567')->first();
        $mhs->jurusan = "Sarjana Komedi";
        $mhs->ipk = 3.7;
        $mhs->save();

        dump($mhs);
    }
    public function massUpdate()
    {
        Mahasiswas::where('nim', '19015672')->first()->update(
            [
                'ipk' => 3.71
            ]
        );

        return "Berhasil di Update";
    }

    public function delete()
    {
        $mhs = Mahasiswas::find(20);
        $mhs->delete();

        dump($mhs);
    }
    public function destroy()
    {
        $mhs = Mahasiswas::destroy(20);
        // mirip dengan delete namun jika id tidak ditemukan maka akan mengembalikan angka 0

        dump($mhs);

        // Method destroy() juga bisa diisi dengan array atau collection yang terdiri dari kumpulan id seperti contoh berikut:
        // Mahasiswa::destroy([3, 9, 10]);
        // Mahasiswa::destroy(collect([3, 9, 10]));
        // Jika method di atas dijalankan, maka data id 3, 9 dan 10 akan dihapus dari tabel mahasiswas.
    }

    public function massDelete()
    {
        $mhs = Mahasiswas::where('ipk', '<', 3.6)->delete();

        dump($mhs);
    }

    public function all()
    {
        $mahasiswas = Mahasiswas::all();

        foreach ($mahasiswas as $mhs) {
            echo
                "
                <ul>
                    <li>Nim: {$mhs->nim}</li>
                    <li>Nama: {$mhs->nama}</li>
                    <li>Tempat Lahir: {$mhs->tempat_lahir}</li>
                    <li>Tanggal Lahir: {$mhs->tanggal_lahir}</li>
                    <li>Fakultas: {$mhs->fakultas}</li>
                    <li>Jurusan: {$mhs->jurusan}</li>
                    <li>IPK: {$mhs->ipk}</li>
                </ul>
                <hr>
            ";
        }
    }

    public function allView()
    {
        $datasMhs = Mahasiswas::all();

        return view('school.Mahasiswas', ['mahasiswas' => $datasMhs]);
    }


    public function getWhere()
    {
        $datasMhs = Mahasiswas::where('ipk', '>', 3.7)->orderBy('nama', 'ASC')->get();

        return view('school.Mahasiswas', ['mahasiswas' => $datasMhs]);
    }
    public function first()
    {
        $dataMhs = Mahasiswas::where('nim', '12133567')->first();
        // Perbedaan first dan get adalah jika get rbentuk collection, bukan 1 object model Mahasiswa. Jika yang kita inginkan adalah 1 object saja, bisa memakai method first() sebagai penganti get():

        return view('school.Mahasiswas', ['mahasiswas' => [$dataMhs]]);
        // dump($dataMhs);
    }

    public function find()
    {
        // Method find() bisa dipakai untuk mencari data Model berdasarkan kolom id
        $dataMhs = Mahasiswas::find(18);

        return view('school.Mahasiswas', ['mahasiswas' => [$dataMhs]]);
    }

    public function latest()
    {
        // Method latest() berguna untuk mengambil collection yang sudah di urutkan berdasarkan tanggal pembuatan secara menurun, data paling akhir yang diinput akan ada di urutan pertama.

        $datasMhs = Mahasiswas::latest()->get();

        return view('school.Mahasiswas', ['mahasiswas' => $datasMhs]);

        // Bisa digunakan untuk pembuatan versi-versi
    }

    public function limit()
    {
        // Method limit() bisa dipakai untuk membatasi hasil collection. Method ini butuh sebuah argument berupa angka. Sebagai contoh, limit(1) hanya akan mengambil 1 object, sedangkan limit(3) akan mengambil 3 object teratas dari collection

        $datasMhs = Mahasiswas::latest()->limit(2)->get(); //mengambil 2 data terbaru

        return view('school.Mahasiswas', ['mahasiswas' => $datasMhs]);
    }

    public function skipTake()
    {
        //  Method skip() berfungsi untuk melompati beberapa data, sedangkan method take() dipakai untuk mengambil sejumlah data tabel.

        $datasMhs = Mahasiswas::skip(1)->take(2)->get();

        return view('school.Mahasiswas', ['mahasiswas' => $datasMhs]);
    }


    // ! Soft Delete
    // Di SQL jika data tidak sengaja di hapus maka data tidak bisa di Undo, tetapi di Elequent ini bisa! eloquent tidak benar-benar menghapus data dari dalam tabel, tapi menambah satu kolom khusus sebagai penanda data yang telah dihapus. Jika data ingin kembali di tampilkan maka cukup hapus penanda tersebut

    public function softDelete()
    {
        // Ada syarat untuk membuat soft delete yaitu menambah deleted_at pada tabel
        // cara ini bisa kita tambah di $table->softDeletes() saat membuat tabel atau di alter

        Mahasiswas::where('nim', '19015672')->delete();
        // Jika kita lihat di tabel maka data masih belum benar-benar di hapus melainkan column deleted_at berisi tanggal penghapusannya
        // Namun jika kita lihat di view maka data ini tidak akan tampil

        return "Data berahasil di hapus!";
    }

    public function withTrashed()
    {
        // Jika ingin menampilkan data yang telah di sembunyikan oleh soft delete maka kita bisa menggunakan method withTrashed()

        $datasMhs = Mahasiswas::withTrashed()->get();

        return view('school.Mahasiswas', ['mahasiswas' => $datasMhs]);
    }

    public function restore()
    {
        // menghilangkan status data terhapus
        Mahasiswas::withTrashed()->where('nim', '19015672')->restore();

        return "Data berhasil di restore";
    }

    public function forceDelete()
    {
        // menhapus data permanent
        Mahasiswas::where('nim', '19015672')->forceDelete();

        return "Data berhasil di hapus secara permanent";
    }
}