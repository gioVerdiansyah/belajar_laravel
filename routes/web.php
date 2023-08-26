<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// ! ====ROUTE====


// Route::<jenis method>(<alamat URL>,<proses yang dijalankan>)
// Isi dari anonymous function ini juga bisa berbentuk kode PHP biasa, tidak harus perintah return.

Route::get('/', function () {
    return view('home');
});

// ! MEMBUAT ROUTE

Route::get('/about', function () {
    return '<h1>Selamat datang di halaman About</h1>';
});

// ! ROUTE PARAMETER

Route::get('/about/{nama}', function ($nama) {
    return "<h1>Selamat datang $nama</h1>";
});

Route::get('/about/{nama}/{jurusan}', function ($nama, $jurusan) {
    // Penulisan nama variabel di anonymous function sebenarnya tidak harus sama dengan nilai route parameter.

    return "<h1>Selamat datang $nama dari jurusan $jurusan</h1>";
});

// ! OPTIONAL PARAMETER
Route::get('/cek_stock/{jenis_barang?}/{merk_barang2?}', function ($a = "laptop", $b = "AXIOO") {
    return "<p>Sisa stock $a $b tersisa 5</p>";
});


// ! Regular Expression
Route::get('/user/{id}', function ($id) {
    return "Tampilkan user dengan id = $id";
})->where('id', '[0-9]+');
// Artinya kita hanya bisa menulis angka saja di URL
// Kode ini artinya saya ingin agar
// parameter 'id' hanya bisa diakses jika memenuhi pola regular expression '[0-9]+'. Pola ini
// berarti segmen 'id' hanya bisa diisi dengan angka 0 – 9 sebanyak 1 karakter atau lebih. Selain
// itu, route tidak bisa diakses


Route::get('/uid/{id}', function ($id) {
    return "Menampilkan user id = $id";
})->where('id', '[A-Z]{2}[0-9]+');
// Pola '[A-Z]{2}[0-9]+' berarti segmen id harus diawali dengan 2 huruf besar, lalu diikuti
// dengan 1 atau lebih angka


// ! Route Redirect
Route::get('/hubungi-kami', function () {
    return "<p>Silahkan hubungi pada nomer perusahaan kami <br> 08976554321</p>";
});

Route::redirect('/contact-us', '/hubungi-kami');
// ketika ada user meakses alamat localhost:8000/contact-us, maka halaman langsung dialihkan ke
// localhost:8000/hubungi-kami.


// ! Route Group
// Dengan menggunakan route group, beberapa route bisa di proses sebagai satu kesatuan.
// ? Contoh
// Route::get('/admin/mahasiswa', function () {
//     return "<h1>Daftar Mahasiswa</h1>";
// });

// Route::get('/admin/dosen', function () {
//     return "<h1>Daftar Dosen</h1>";
// });

// Route::get('/admin/karyawan', function () {
//     return "<h1>Daftar Karyawan</h1>";
// });

// Tidak ada yang salah dari cara ini. Namun karena semua route menggunakan awalan segmen
// 'admin/', kita bisa memanfaatkan route group dengan tambahan method Route::prefix():

// ? Penggunaan yang lebih tepat:
Route::prefix('/admin')->group(function () {
    Route::get('/mahasiswa', function () {
        return "<h1>Daftar Mahasiswa</h1>";
    });

    Route::get('/dosen', function () {
        return "<h1>Daftar Dosen</h1>";
    });

    Route::get('/karyawan', function () {
        return "<h1>Daftar Karyawan</h1>";
    });
});


// ! Route Fallback
Route::fallback(function ($url) {
    return "<h2 style='text-align:center;'>Maaf Halaman <strong style='text-decoration:underline;'>/$url</strong> tidak ditemukan!!!</h2>";
});


// ! Route Priority
Route::get('/buku/1', function () {
    return "Buku ke-1";
});
Route::get('/buku/1', function () {
    return "Buku saya ke-1";
});
Route::get('/buku/1', function () {
    return "Buku kita ke-1";
});
// Di sini saya menulis 3 route yang semuanya berisi alamat URL yang sama: '/buku/1'. Ketika
// alamat http://localhost:8000/buku/1 diakses, yang tampil di web browser adalah "Buku kita ke-1",

// ? Namun saat menggunakan parameter hasilnya akan berbeda
Route::get('/buku/{a}', function ($a) {
    return "Buku ke-$a";
});
Route::get('/buku/{b}', function ($b) {
    return "Buku saya ke-$b";
});
Route::get('/buku/{c}', function ($c) {
    return "Buku kita ke-$c";
});

// Ketika mengakses http://localhost:8000/buku/2, yang tampil adalah "Buku ke-2"


// ! Penulisan URL Route
// Dalam beberapa referensi, penulisan route juga bisa diawali tanpa forward slash, seperti berikut:
Route::get('mahasiswa/verdi', function () {
    return "Ini adalah salah satu mahasiswa yang spesial:v";
});
// Penulisan ini tidak beda dengan /mahasiswa/verdi
// Kedua route sama-sama merujuk ke alamat URL localhost:8000/mahasiswa/andi. Tambahan tanda '/' di awal penulisan route hanya "kesukaan saja"


// !  Melihat Daftar Route
// Kita bisa meilihat semua daftar route yang sudah kita tulis di CMD dengan perintah berikut:
// php artisan route:list

// jika kita ingin route internal bawaan Laravel tidak ikut ditampilkan, bisa menambah flag --except-vendor
// php artisan route:list --except-vendor






// ! ====Error Display & Proses Debugging====
Route::get('/error', function () {
    return "Contoh kesalahan misal kurang titik koma";
});
// Pada dasarnya jika hanya lupa titik koma atau lupa menutup tanda kutip teks editor sudah bisa mengenali dan mengasih tanda mark pada baris yang dituju dan mengasih pesannya

// Namun jika kita salah ketik nama, misal nama method nya, maka otomatis teks editor tidak akan mengenalinya. Tetapi pada Error displaynya milik laravel/php native akan langsung mengenalinya

// Namun pada Laravel, error ini tidak akan langsung mengarah ke file yang sedang kita ketik, alih-alih error yang di tampilkan berasal dari error yang ada di framework Laravel itu sendiri


// ! File Konfigurasi Laravel
// Pesan error. Selain bisa membuat bingung pengguna aplikasi (user), pesan error juga bisa menjadi sumber berharga bagi pihak yang ingin membobol aplikasi kita.

// untuk menyembunyikan pesan error di Laravel sangat mudah. Kita hanya perlu mengatur 1 baris perintah di file konfigurasi Laravel
// Laravel memiliki 2 tempat mengatur file konfigurasi: di file .env dan di folder config. File .env berisi pengaturan ringkas, sedangkan konfigurasi utama ada di folder config.

// Agar pesan error tidak tampil, ubah pengaturan ini menjadi APP_DEBUG=false lalu save file .env
// Sekarang jika error maka akan muncul tampilan "500 SERVER ERROR"

// Namun masalahnya, dari mana kita bisa tau apa yang menyebabkan error? Laravel menyimpan history error ke dalam file laravel.log yang ada di folder storage\logs\




// ! ====Debugging====
// kita sering menggunakan fungsi var_dump() atau print_r() untuk menampilkan struktur detail dari suatu
// variabel, terutama variabel yang berisi data kompleks seperti array
Route::get('/test_error', function () {
    $val = "Hello World";
    $myArry = ["satu" => "One", "two", "2D" => ["Verdi", "Adi"]];
    // var_dump($val);
    // die();

    // dd($myArry);

    dump($myArry);

    // print_r($myArry);

    // return $val;
    return $myArry;
});
// Menampilkan 2 kali karena kita cek variabel tersebut dengan var_dump lalu kita returnnya
// jika ingin kode setelah di debug berhenti maka kita bisa menggunakan fungsi die() setelah fungsi debug
// selain die() kita bisa menggunakan dd() "dump and die" merupakan fungsi khusus yang men-upgrade tampilan var_dump() bawaan PHP
// Laravel juga menyediakan function dump(). Bedanya dengan dd() adalah, function dump() tidak langsung menghentikan kode program, hanya menampilkan isi variabel saja
// ika sebuah array langsung di echo atau di return, Laravel otomatis menampilkannya dalam format JSON
// Alternatif lain kita bisa menggunakan print_r() untuk menampilkan struktur array


// ! ====Membuat View====
Route::get('/hello', function () {
    return view('home'); //akan menampilkan halaman yang ada di resource/views <nama_view>.blade.php
});


// Route::get('/siswa', function () {
// return View::make('school.siswa'); //sama saja
// view() adalah sebuah helper function
// sedangkan View::make()  Sedangkan dikenal dengan istilah facade.
// Tanda titik di dalam penulisan view() berfungsi sebagai penanda nama folder
// });


// ! Mengirim Data ke View
Route::get('/siswa', function () {
    // return view('school.siswa', [
    //     "siswa1" => ["Verdi", "X RPL 2"],
    //     "siswa2" => ["adi", "X RPL 1"],
    //     "siswa3" => ["Betod", "X RPL 1"]
    // ]);

    // Agar lebih rapi kita bisa pisahkan dahulu
    $myArray = [
        ["Verdi", "X RPL 2"],
        ["Adi", "X RPL 1"],
        ["Beta", "X RPL 1"]
    ];
    return view('school.siswa', ["siswa" => $myArray]);

    // ! Mengirim menggunakan method with()
    //? return view('school.siswa')->with("siswa", $myArray);
    // Method with() butuh 2 argument, argument pertama berupa nama variabel yang akan dikirim, serta argument kedua untuk menampung nilai yang dikirim.
    // method view() ini bisa dipanggil beberapa kali dengan cara di chaining (di sambung) satu sama lain

    //? return view("school.siswa")
    //     ->with("siswa", "verdi")
    //     ->with("siswa", "Adi")
    //     ->with("siswa", "Beta");


    // ! Function compact()
    // $siswa1 = "Verdi";
    // $siswa2 = "Adi";
    // $siswa3 = "Beta";

    // return view('school.siswa')->with(compact("siswa1", "siswa2", "siswa3"));
});

// setelah mempelajari diatas kita bisa membuat begini
Route::get('/siswa/{nama}/{no_absen}/{kelas}', function ($nama, $no, $jurusan) {
    return view('school.siswa-siswi')
        ->with("nama", $nama)
        ->with("no_absen", $no)
        ->with("jurusan", $jurusan);
})->where("no_absen", "[0-9]{2}");


// ! ====Route untuk Blade====
Route::get('/blade/{nama}', function ($nama) {
    return view('blade', [
        "nama" => $nama,
        "nama_siswa" => "<u>Verdiansyah</u>",
        "nilai" => 100,
        "grade" => 'A',
        "array" => [100, 80, 49, 70, 40]
    ]);
});



// ! ====Mengatur Layout====
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/data-siswa', function () {
    $myArray = ["Verdi", "Adi", "Beta",];
    return view('school.data-siswa', ["siswa" => $myArray]);
});

// ! Named Route

Route::get('/masuk/sebagai/admin/guru', function () {
    $dataGuru = ["Pak Sudarmanto", "Pak Ananda", "Pak Rofik", "Pak Agung"];

    return view('school.guru')->with("guru", $dataGuru);
})->name('guru');
// Bayangkan jika kita harus mengetik hal yang sama jika ingin memanggilya di tag anchor misalnya

Route::get('/my-gallery', function () {
    return view('school.my-gallery');
})->name('gallery');

// ! Named Routes Parameter
Route::get('/informasi/{nama?}/{jurusan?}/', function ($nama = "<User>", $jurusan = "<Pilih_jurusan>") {
    return view('informasi')->with('data', [$nama, $jurusan]);
})->name('info');



// ! ====Belajar Vite====
Route::get('/vite', function () {
    return view('view_vite.welcome');
});

Route::get('final-vite', function () {
    return view('view_vite.final');
});


// ! ====Controller====
// Sebetulnya file ini sudah bisa disebut dengan controller
Route::get('/route', function () {
    // ini dinamakan dengan closure atau anonymous function
    return view('view_route.welcome');
});

use App\Http\Controllers\Admin\PageController as PC;

// Sebagai contoh, untuk memanggil method index() di controller bernama PageController, penulisan route-nya adalah: Route::get('/', [App\Http\Controllers\Admin\PageController::class,'index']);
Route::get('/route/pagecontroller', [PC::class, 'index'])->name('pc_index');

// misal jika saya ingin memanggil method tampil() di class PageController maka
Route::get('/route/pagecontroller/siswa', [PC::class, 'siswa'])->name('pc_siswa');

// Atau bisa dengan menulis bagini
// use Illuminate\Support\Facades\Route;
// App\Http\Controllers\PageController;
// Di bagian paling atas
// dengan memanggilnya :
// Route::get('/', [PageController::class,'index']);
// Route::get('/mahasiswa',[PageController::class,'tampil']);


// ? Mengakses Laravel Facade
// facade adalah kumpulan helper function yang 'dibungkus' dalam bentuk class
Route::get('/route/facade', [PC::class, 'tryToAccessFacade'])->name('tryFacade');

// ? Membuat class helper
Route::get('/route/class-helper', [PC::class, 'classHelper'])->name('classHelper');


// tantangan membuat tampilan siswa dipindah kedalam controller
use \App\Http\Controllers\School\SekolahController as School;

Route::get('/controller', ['uses' => School::class, '__invoke']);
Route::prefix('/controller')->group(function () {
    Route::get('/siswa', [School::class, 'siswa'])->name('sc_siswa');

    Route::get('/siswa/{nama}/{no_absen}/{kelas}', [School::class, 'SiswaSiswi'])->where("no_absen", "[0-9]{2}")->name('sc_siswa_ops');
    ;

    Route::get('/admin', [School::class, 'admin'])->name('sc_admin');
    Route::get('/data-siswa', [School::class, 'dataSiswa'])->name('sc_data_siswa');

    Route::get('/guru', [School::class, 'guru'])->name('guru');
    Route::get('/my-gallery', [School::class, 'gallery'])->name('gallery');

    Route::get('/informasi/{nama?}/{jurusan?}', [School::class, 'info'])->name('info');
});


// ! Single Action Controllers
Route::get('/invoke', \App\Http\Controllers\InvokeController::class);
// method __invoke bisa ditulis tanpa menuliskan namanya "__invoke" tapi juga bisa juga jika ingin menulis namanya
Route::get('/invoke/item', App\Http\Controllers\ItemController::class);


// ? UTILITY
use \App\Http\Controllers\Utility\ContohLainnya as Etc;

Route::prefix('/utility')->group(function () {
    // ! Type Hint dan Return Type

    Route::get('/get-data/{nilai_a?}/{nilai_b?}', Etc::class);
    // kita bisa gunakan method ini misal
    // 10 + 5
    // atau "10 Ayam" + "5 Sapi" meski PHP 8 disertai pesan error

    // Harus Integer
    Route::get('/int/{nilai_a?}/{nilai_b?}', [Etc::class, 'typeHintInt']);

    // Float ke Integer
    Route::get('/float-to-int/{nilai_a?}/{nilai_b?}', [Etc::class, 'typeHintFloatToInt']);

    Route::get('/get-variabel-env', [Etc::class, 'getEnvVariabel']);
});





// ! ====Collection====
// Collection adalah object khusus Laravel yang dipakai untuk menampung data. Atau pengertian yang lebih sederhana, collection adalah array dengan superpower.

use \App\Http\Controllers\Collections\CollectionController as Items;

Route::prefix('/collections')->group(function () {
    Route::get('/satu', [Items::class, 'collectionSatu']);
    Route::get('/dua', [Items::class, 'collectionDua']);
    Route::get('/tiga', [Items::class, 'collectionTiga']);
    Route::get('/empat', [Items::class, 'collectionEmpat']);
    Route::get('/lima', [Items::class, 'collectionLima']);
    Route::get('/enam', [Items::class, 'collectionEnam']);
    Route::get('/exercise', [Items::class, 'exercise']);
});



// ! ====DB Facade====
use \App\Http\Controllers\School\MahasiswasController as Mhs;

Route::prefix('/school')->group(function () {
    Route::get('/', Mhs::class);

    // ? Route untuk Model
    Route::get('/insert-sql', [Mhs::class, 'insertSql']);
    Route::get('/insert-timestamp', [Mhs::class, 'inserTimestamp']);
    Route::get('/insert-prepared', [Mhs::class, 'insertPrepared']);
    Route::get('/insert-binding', [Mhs::class, 'insertBinding']);
    Route::get('/update', [Mhs::class, 'update']);
    Route::get('/delete', [Mhs::class, 'delete']);
    Route::get('/select', [Mhs::class, 'select']);
    Route::get('/select-tampil', [Mhs::class, 'selectTampil']);
    Route::get('/select-view', [Mhs::class, 'selectView']);
    Route::get('/select-where', [Mhs::class, 'selectWhere']);
    Route::get('/statement', [Mhs::class, 'statement']);
});


// ! ====Query Builder====
use App\Http\Controllers\University\MahasiswaController as Uni;

Route::prefix('/university')->group(function () {
    Route::get('/', Uni::class);

    Route::get('/insert', [Uni::class, 'insert']);
    Route::get('/insert-banyak', [Uni::class, 'insertBanyak']);
    Route::get('/update', [Uni::class, 'update']);
    Route::get('/update-where', [Uni::class, 'updateWhere']);
    Route::get('/update-or-insert', [Uni::class, 'updateOrInsert']);
    Route::get('/delete', [Uni::class, 'delete']);
    Route::get('/get', [Uni::class, 'get']);
    Route::get('/get-tampil', [Uni::class, 'getTampil']);
    Route::get('/get-view', [Uni::class, 'getView']);
    Route::get('/get-where', [Uni::class, 'getWhere']);
    Route::get('/select', [Uni::class, 'select']);
    Route::get('/take', [Uni::class, 'take']);
    Route::get('/first', [Uni::class, 'first']);
    Route::get('/find', [Uni::class, 'find']);
    Route::get('/raw', [Uni::class, 'raw']);

    // Study khasus
    Route::get('/mahasiswa', [Uni::class, 'mahasiswas']);
    Route::get('/mahasiswa/dengan/nim/{nim}', [Uni::class, 'getDetailMhs']);
});


// ! ====Eloquent ORM====
use App\Http\Controllers\University\MahasiswasController as Mahasiswas;

Route::prefix('/university/mahasiswas')->group(function () {
    Route::get('/', Mahasiswas::class);

    Route::get('/cek-object', [Mahasiswas::class, 'cekObject']);

    Route::get('/insert', [Mahasiswas::class, 'insert']);
    Route::get('/mass-assignment', [Mahasiswas::class, 'massAssignment']);
    Route::get('/mass-assignment2', [Mahasiswas::class, 'massAssignment2']);

    Route::get('/update', [Mahasiswas::class, 'update']);
    Route::get('/update-where', [Mahasiswas::class, 'updateWhere']);
    Route::get('/mass-update', [Mahasiswas::class, 'massUpdate']);

    Route::get('/delete', [Mahasiswas::class, 'delete']);
    Route::get('/destroy', [Mahasiswas::class, 'destroy']);
    Route::get('/mass-delete', [Mahasiswas::class, 'massDelete']);

    Route::get('/all', [Mahasiswas::class, 'all']);
    Route::get('/all-view', [Mahasiswas::class, 'allView']);
    Route::get('/get-where', [Mahasiswas::class, 'getWhere']);
    Route::get('/test-where', [Mahasiswas::class, 'testWhere']);
    Route::get('/first', [Mahasiswas::class, 'first']);
    Route::get('/find', [Mahasiswas::class, 'find']);
    Route::get('/latest', [Mahasiswas::class, 'latest']);
    Route::get('/limit', [Mahasiswas::class, 'limit']);
    Route::get('/skip-take', [Mahasiswas::class, 'skipTake']);

    Route::get('/soft-delete', [Mahasiswas::class, 'softDelete']);
    Route::get('/with-trashed', [Mahasiswas::class, 'withTrashed']);
    Route::get('/restore', [Mahasiswas::class, 'restore']);
    Route::get('/force-delete', [Mahasiswas::class, 'forceDelete']);
});



// ! ====Form Processing dan Form Validation====
// Form merupakan salah satu fitur terpenting di sebuah web yang sekaligus paling kompleks karena melibatkan banyak hal, mulai dari perancangan form, design tampilan, proses penerimaan data, validasi inputan form, hingga menyimpan data hasil form ke dalam database.

use App\Http\Controllers\University\FormMahasiswasController as FMhs;

Route::prefix('/university/form')->group(function () {
    Route::get('/', FMhs::class);

    Route::get('/proses-form-get', [FMhs::class, 'prosesFormGet']);
    Route::post('/proses-form-post', [FMhs::class, 'prosesFormPost']);
    Route::post('/validate-form', [FMhs::class, 'validateData']);
    Route::post('/validator-form', [FMhs::class, 'validatorData']);
    Route::post('/proses-form-request', [FMhs::class, 'prosesFormRequest']);
});

// ! ====Localization====
use App\Http\Controllers\Localization\LocalizationController as LC;

Route::prefix('/localization')->group(function () {
    Route::get('/', LC::class);
    Route::post('/form/validate-data-with-local', [FMhs::class, 'validateDataWithLocal']);

    Route::get('/form-pendaftaran', [FMhs::class, 'formPendaftaranMahasiswa']);
    // Route::get('/form-pendaftaran/en', [FMhs::class, 'formPendafaranEn']);
    // Route::get('/form-pendaftaran/id', [FMhs::class, 'formPendafaranId']);

    // Menggunakan Parameter
    Route::get('/form-pendaftaran/{lang?}', [FMhs::class, 'formPendaftaran']);
});




// ! ====CRUD====
use App\Http\Controllers\School\StudentController as SC;

// php artisan make:model Barang -mcr
// Perintah ini akan membuat file migration, model, dan controller sekaligus

Route::prefix('/students')->group(function () {
    Route::get('/', SC::class)->name('students.index');

    Route::get('/create/{lang?}', [SC::class, 'create'])->name('students.create');
    Route::post('/', [SC::class, 'store'])->name('students.store');
    Route::get('/{studentid}', [SC::class, 'show'])->name('students.show');
    Route::get('/{id}/edit', [SC::class, 'edit'])->name('students.edit');
    Route::put('/{student}', [SC::class, 'update'])->name('students.update');
    Route::delete('/{studentid}', [SC::class, 'destroy'])->name('students.destroy');
    // Penamaan variabel di dalam kurung kurawal route harus sama saat pemanggilan baik nama valirabel di paramter dan nama assoc array

    // ! Resource Controllers
    // Diatas adalah contoh penerapan Resource Controllers dengan nama dan urutan yang bagus
});


// ! ====File Upload====
use App\Http\Controllers\FileUpload\FileUploadController as FUC;

Route::prefix('/file-upload')->group(function () {
    Route::get('/', FUC::class);

    Route::post('/info-file', [FUC::class, 'informasiFileUpload']);
    Route::post('/validasi-file', [FUC::class, 'validasiFileUpload']);
    Route::post('/pindah-file', [FUC::class, 'pindahFileUpload']);

    // Exercise
    Route::post('/', [FUC::class, 'prosesFileUpload'])->name('fileUpload.exercise');
});


// ! ====Middleware====
// Digunakan untuk mengecek apakah user sudah login apa belum
// ? Membuat Middleware:
// php artisan make:middleware CobaMiddleware
// File tersebut terletak di app\Http\Middleware\

use App\Http\Controllers\CobaMiddleware\MiddlewareController as MC;

Route::prefix('/middleware')->group(function () {
    Route::get('/daftar-mahasiswa', [MC::class, 'daftarMahasiswa']);
    // ->middleware('test');
    //me aktifkan middleware satu saja, jika ingin 2 sekaligus maka bisa begini:
    //  ->middleware('one','two')

    Route::get('/tabel-mahasiswa', [MC::class, 'tabelMahasiswa'])->name('middleware.tabelMahasiswa');
    Route::get('/blog-mahasiswa', [MC::class, 'blogMahasiswa']);
});



// ! ====Session====
use App\Http\Controllers\Session\SessionController as Sesi;

Route::prefix('/session')->group(function () {
    Route::get('/', Sesi::class);

    Route::get('/buat', [Sesi::class, 'buatSession'])->name('session.buat');
    Route::get('/akses', [Sesi::class, 'aksesSession'])->name('session.akses');
    Route::get('/hapus', [Sesi::class, 'hapusSession'])->name('session.hapus');
    Route::get('/flash', [Sesi::class, 'flashSession'])->name('session.flash');
});


// ! ====Case Login====
use App\Http\Controllers\Karyawan\KaryawanController as Karyawan;

Route::prefix('/karyawan')->group(function () {

    Route::get('/login', [Karyawan::class, 'login'])->name('karyawan.login');
    Route::post('/login', [Karyawan::class, 'prosesLogin']);

    Route::get('/logout', [Karyawan::class, 'logout'])->name('karyawan.logout');

    Route::redirect('/', '/karyawan/login');

    Route::get('/daftar-karyawan', [Karyawan::class, 'daftarKaryawan'])->middleware('login')->name('karyawan.daftar');
    Route::get('/tabel-karyawan', [Karyawan::class, 'tabelKaryawan'])->middleware('login')->name('karyawan.tabel');
    Route::get('/blog-karyawan', [Karyawan::class, 'blogKaryawan'])->middleware('login')->name('karyawan.blog');
});


// ! ====Authentication====
// penginstallannya:
// composer require laravel/ui
// selanjutnya memilih preset React,Vue, atau Bootstrap
// php artisan ui bootstrap --auth
