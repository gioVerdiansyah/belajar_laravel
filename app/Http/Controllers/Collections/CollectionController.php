<?php

namespace App\Http\Controllers\Collections;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CollectionController extends Controller
{

    private $myArry = [1, 9, 3, 4, 5, 3, 5, 7], $arrayAssoc = [
        "nama" => "Verdi",
        "sekolah" => "SMKN 1 Mejayan",
        "jurusan" => "RPL",
        "alamat" => "Balerejo"
    ];

    // ! Membuat Collection
    public function collectionSatu()
    {
        // ? Menggunakan class
        // $myArry = [1, 5, 3, 7, 2, 9, 6, 2];
        // $collection1 = new \Illuminate\Support\Collection($myArry);

        // ? Menggunakan helper function
        $collection2 = collect($this->myArry);
        echo "<pre>";
        dump($collection2);
        echo "</pre>";
    }

    // ! Mengakses Collection
    public function collectionDua()
    {
        $collection = collect($this->myArry);
        echo $collection[0] . "<br>";
        echo $collection[3] . "<br>";
        foreach ($collection as $item) {
            echo $item;
        }
        // Atau kita bisa langsung mengaksesnya dengan echo
        echo "<br>" . $collection; //[1,5,3,7,2,9,6,2]

        // ? Collection dari associative array
        $collectionAssoc = collect($this->arrayAssoc);
        echo "<br>" . $collectionAssoc; //berformat JSON
        // Ketika collection berisi associative array dengan key yang tidak berurutan atau key nonnumeric, maka ketika di echo hasilnya akan berbentuk JSON.

        // ? Jika indexnya berurusan maka ketika di cetak masih akan berbentuk array
        $varA = [1, 2, 3];
        $varB = ["0" => 1, "1" => 2, "2" => 3];
        dump($varA === $varB);
        echo collect($varB);
        echo collect($varA);

        // ? namun jika salah satu urutanya berbeda maka akan berbentuk JSON
        $varC = ["1" => 1, "2" => 2, "3" => 3];
        dump($varA === $varC); //false
        echo collect($varA);
        echo collect($varC); //{"1":1,"2":2,"3":3}
    }

    // ! Method sum(), avg(), max(), min() dan median()
    public function collectionTiga()
    {
        $dataCollection = collect($this->myArry);
        echo "Data : " . collect($this->myArry) . "<br>Jumlah Semua data : ";
        dump($dataCollection->sum()); //menjumlah semua data array
        echo "rata-rata data : ";
        dump($dataCollection->avg()); //rata-rata data
        echo "Data paling tinggi : ";
        dump($dataCollection->max()); // max data dari array
        echo "Data paling rendah : ";
        dump($dataCollection->min()); // min data dari array
        echo "Median data : ";
        dump($dataCollection->median()); // data tengah (4 adalah urutan element ke 4)

        // ? Method Random
        // berguna untuk mengambil 1 element acak setiap kali method dijalankan.
        echo "Data random : ";
        dump($dataCollection->random()); // mengambil angka random dalam array

        // ? Method Concat
        // Berfungsi untuk menambah element ke dalam collection.
        echo "Concat data : <br>";
        echo $dataCollection->concat([12, 10, 15]); // menambahkan angka array di bagian belakang

        // ? Method Contains
        // dipakai untuk memeriksa apakah sebuah nilai ada di dalam collection atau tidak.
        echo "<br>Apakah ada data 3 dan 8 ?";
        dump($dataCollection->contains(3)); // true
        dump($dataCollection->contains(8)); // false

        // ? Method Unique
        // Method unique() akan men-filter isi collection dan mengembalikan nilai yang unik saja (nilai yang tidak berulang)
        echo "Method Unique : ";
        dump($dataCollection->unique());

        // ? Method All
        // berfungsi untuk mengkonversi collection menjadi array.
        echo "Method All : ";
        dump($dataCollection->all());

        // Method all() ini akan sering kita pakai ketika memproses data dari database

        // ! Collection vs Array
        // Kedua tipe data ini serupa tapi tidak sama. Sering terjadi error karena kita menganggap sebuah kode program menghasilkan array tapi memprosesnya sebagai collection, begitu juga sebaliknya.
        // Gunakan fungsi dump() untuk mengeceknya
        echo "Collection vs Array";
        $varA = [1, 2, 3];
        $varB = collect([1, 2, 3]);
        dump($varA); // Array
        dump($varB); // Collection
        // keduanya sama-sama bisa diakses menggunakan key seperti $varA[1] maupun $varB[1].

        // ? Method first() dan last()
        // dipakai untuk mengambil 1 element yang berada di urutan pertama dan urutan terakhir dari sebuah collection
        echo "Method first() dan last()<br>" . $dataCollection->first() . "<br>"; // 1
        echo $dataCollection->last(); // 7

        // ? Method count()
        // digunakan untuk menghitung panjang isi array
        echo "<br>Method count()";
        dump($dataCollection->count()); // 8

        // ? Method Sort()
        // berguna untuk mengurutkan isi collection. Proses pengurutan ini tetap mempertahankan key yang sudah ada:
        echo "Method sort()";
        dump($dataCollection->sort());
    }

    public function collectionEmpat()
    {
        $collection = collect($this->arrayAssoc);
        echo "Data : ";
        dump($collection);


        // ? Method get()
        //  dipakai untuk mengambil 1 element array berdasarkan key yang diinput sebagai argument:
        echo "Method get()";
        dump($collection->get('nama')); // ambil data berdasarkan key
        dump($collection->get('kelas', 'X RPL 2')); // Parameter kedua ini berfungsi sebagai nilai default jika key yang dituju tidak ada


        // ? Method has()
        // dipakai untuk memeriksa apakah sebuah key ada di dalam collection atau tidak. Hasil dari method ini berupa boolean true atau false.
        echo "Method has()";
        dump($collection->has('alamat'));
        dump($collection->has('umur'));

        // ? Method replace()
        //  berguna untuk mengganti nilai yang ada di dalam collection.
        echo "Method replace()";
        $result = $collection->replace([
            "nama" => "Verdiansyah",
            "alamat" => "Sogo"
        ]);
        dump($result);


        // ? Method forget()
        // bisa dipakai untuk menghapus salah satu element yang ada di dalam collection
        echo "Method forget()";
        dump($collection->forget('alamat'));


        // ? Method flip()
        // bisa dipakai untuk membalik key element menjadi value, dan valuenya menjadi key
        echo "Method flip()";
        dump($collection->flip());


        // ? Method keys() dan values()
        // berfungsi untuk mengambil semua nilai key dari collection. Dan method values() dipakai untuk mengambil semua nilai value dari collection. Kedua method ini mengembalikan sebuah collection baru
        echo "Method keys() dan values()";
        dump($collection->keys());
        dump($collection->values());


        // ? Method search()
        // berfungsi untuk mencari sebuah nilai di dalam collection, kemudian mengembalikan index dari nilai tersebut
        echo "Method search()";
        dump($collection->search('Verdi'));

        // ? Method each()
        // merupakan cara penulisan lain dari perulangan foreach. Argument untuk method ini berbentuk sebuah closure atau anonymous function. Closure tersebut menerima 2 argument yang merujuk ke key dan value dari element collection.
        echo "Method search()<br>";
        $collection->each(function ($val, $key) {
            echo "$key : $val <br>";
        }); //! value dulu baru key

        // versi foreach
        echo "<br>versi foreach : <br>";
        foreach ($collection as $key => $val) {
            echo "$key : $val <br>";
        } //! kalo foreach key dulu baru value
    }

    // ! Nested Array Collection Method
    public function collectionLima()
    {
        // Beberapa method bawaan collection ada yang lebih cocok dipakai untuk element yang lebih kompleks, seperti nested array.
        $nestedArry = collect([
            ["produk" => "Mouse G5", "harga" => 60000],
            ["produk" => "Laptop Axioo", "harga" => 3000000],
            ["produk" => "Keyboard Fantech", "harga" => 150000],
        ]); // truktur seperti ini sebagai simulasi data yang berasal dari tabel MySQL
        dump($nestedArry);


        // ? Method sortBy() dan sortByDesc()
        // Method sortBy() dan sortByDesc() merupakan variasi dari method sort(). Di sini kita bisa menentukan nama key yang menjadi penentu urutan:
        echo "Method sortBy() dan sortByDesc()";
        dump($nestedArry->sortBy('harga')->all()); // harga terendah ke harga tertinggi
        // jika menggunakan all maka akan menggembalikan berupa array bukan collection

        dump($nestedArry->sortByDesc('harga')); // harga tertinggi ke harga terendah

        $nestedArry->sortByDesc('harga')->each(function ($val, $key) {
            echo "{$val['produk']}<br>";
            // Sudah diurutkan lalu panggil valunya berdasarkan key produk
        });


        // ? Method filter()
        // Method ini juga butuh argument berupa closure yang berisi kode untuk menentukan syarat yang harus dipenuhi
        echo "Method filter()";
        $result = $nestedArry->filter(function ($val, $key) {
            return $val['harga'] < 2000000;
        });
        dump($result); // laptop tidak tampil karena harganya lebih dari 2jt


        // ? Method where() dan firstWhere()
        // Kedua method ini dipakai untuk mencari element collection dengan syarat tertentu mirip WHERE di SQL
        echo "Method where() dan firstWhere()";
        dump($nestedArry->where('harga', 60000)); // Cari harga yang 60rb
        dump($nestedArry->where('harga', '>=', 150000)); // cari yang harganya lebih dari 150rb

        // Jika kita yakin hasil pencarian hanya akan berisi 1 element, maka bisa disambung dengan method first() supaya berubah menjadi array biasa
        echo $nestedArry->where('harga', 60000)->first()['produk'] . "<br>";

        // Ada satu lagi yang merupaka gabungan dari first dan where
        echo $nestedArry->firstWhere('harga', 60000)['produk'] . "<br>";

        // Jika hasil dari method where() lebih dari 1 element, bisa juga digabung dengan method all() agar hasilnya di konversi menjadi array

        foreach ($nestedArry->where('harga', '>=', 150000)->all() as $item) {
            echo "{$item['produk']} <br>";
        }


        // ? Method whereBetween() dan whereNotBetween()
        // Method whereBetween() merupakan variasi dari method where() yang bisa dipakai untuk mencari element collection dalam sebuah jangkauan (range)
        echo "Method whereBetween() dan whereNotBetween()";
        dump($nestedArry->whereBetween('harga', [100000, 3000000])); // harga 100rb - 3jt
        dump($nestedArry->whereNotBetween('harga', [100000, 3000000])); // selain


        // ? Method whereIn() dan whereNotIn()
        // a pencarian key bukan dalam bentuk jangkauan, tapi dari beberapa pilihan nilai yang ditulis sebagai array di argument kedua. Sedangkan method whereNotIn() dipakai untuk mencari element di luar nilai tersebut.
        echo "Method whereIn() dan whereNotIn()";
        dump($nestedArry->whereIn('harga', [1000000, 2000000, 3000000])); // cari dari 3 nilai tersebut jika ada tampillkan
        dump($nestedArry->whereNotIn('harga', [1000000, 2000000, 3000000])); // selain dari nilai yang ditentukan


        // ? Method pluck()
        // Method pluck() mirip seperti method values(), yakni mengambil seluruh nilai dari sebuah key. Bedanya, method pluck() bisa menerima argument untuk menentukan key yang akan diambil.
        echo "Method pluck()";
        dump($nestedArry->pluck('produk')); // Hasilnya berupa collection baru dengan key numeric
    }

    // ! Object Array Collection Method
    public function collectionEnam()
    {
        // Materi kali ini membahas collection dalam bentuk yang lebih kompleks lagi: array dari object. Struktur tersebut sangat mirip dengan hasil yang kita terima dari sebuah Model dalam Laravel

        $siswa00 = new \stdClass; //  stdClass merupakan class 'generic' atau class 'kosong' yang tersedia di PHP
        $siswa00->nama = "Verdi";
        $siswa00->kelas = "X RPL 2";
        $siswa00->alamat = "Balerjo";

        $siswa01 = new \stdClass;
        $siswa01->nama = "Adi";
        $siswa01->kelas = "X RPL 1";
        $siswa01->alamat = "Sirapan";

        $siswa02 = new \stdClass;
        $siswa02->nama = "Beta";
        $siswa02->kelas = "X RPL 1";
        $siswa02->alamat = "Kaligunting";

        $siswas = collect([
            0 => $siswa00,
            1 => $siswa01,
            2 => $siswa02
        ]); // nama siswas di ambil dari bentuk jamak

        dump($siswas);


        // ? Mengaksesnya
        echo $siswas[0]->nama . "<br>";
        echo $siswas[0]->alamat . "<br><br>";

        foreach ($siswas as $siswa) {
            echo $siswa->nama . "<br>";
        }

        echo "<br>";

        // ? Method yang sebelumnya juga bisa kita terapkan
        echo $siswas->where('nama', 'Adi')->first()->alamat; // Jika satu data saja

        dump($siswas->where('kelas', 'X RPL 1'));

        $siswas->where('kelas', 'X RPL 1')->each(function ($val, $key) {
            echo "{$key}. {$val->nama} dari kelas {$val->kelas} dan berasal dari {$val->alamat}<br>";
        }); // Pilih berdasarkan kelas lalu pecah belah


        // menggunakan get
        $siswaVerdi = $siswas->get(0);
        echo "{$siswaVerdi->nama}, {$siswaVerdi->kelas} | {$siswaVerdi->alamat}";

        // ? Method groupBy()
        //  mirip seperti query GROUP BY di dalam bahasa SQL, yakni dipakai untuk mengelompokkan array berdasarkan key yang diinput sebagai argument.
        $dataKelompokSiswa = $siswas->groupBy('kelas');
        dump($dataKelompokSiswa); // Jika ada key yang sama maka data tersebut akan dikelompokkan

        // menampilkan semua nama siswa yang sekelas
        $siswaKelasXRPL1 = $siswas->groupBy('kelas')->get('X RPL 1')->pluck('nama')->all();
        echo "Nama siswa yang sekelas : " . implode(', ', $siswaKelasXRPL1);
    }


    public function exercise()
    {
        $matkul00 = new \stdClass();
        $matkul00->namaMatkul = "Sistem Operasi";
        $matkul00->jumlahSks = 3;
        $matkul00->semester = 3;

        $matkul01 = new \stdClass();
        $matkul01->namaMatkul = "Algoritma dan Pemrograman";
        $matkul01->jumlahSks = 4;
        $matkul01->semester = 1;

        $matkul02 = new \stdClass();
        $matkul02->namaMatkul = "Kalkulus Dasar";
        $matkul02->jumlahSks = 2;
        $matkul02->semester = 1;

        $matkul03 = new \stdClass();
        $matkul03->namaMatkul = "Basis Data";
        $matkul03->jumlahSks = 2;
        $matkul03->semester = 3;

        $matkuls = collect([$matkul00, $matkul01, $matkul02, $matkul03]);

        dump($matkuls);

        $matkulSemester3 = $matkuls->groupBy("semester")->get(3)->pluck("namaMatkul")->all();
        echo "Nama mata kuliah di semester 3: " . implode(', ', $matkulSemester3);

        echo "<br>Nama mata kuliah : ";
        $matkuls->sortByDesc('jumlahSks')->each(function ($val, $key) {
            echo "{$val->namaMatkul} ({$val->jumlahSks}), ";
        });
    }
}