<?php

namespace App\Http\Controllers\University;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// ! Menggunakan validator class
use Illuminate\Support\Facades\Validator;
// ! Costum FormRequest Class
use App\Http\Requests\DaftarMahasiswa;
// ! Untuk Localization
use App; //Ini juga berfungsi tetapi sugesti nya aneh
use Illuminate\Support\Facades\App as FacadesApp;

class FormMahasiswasController extends Controller
{
    public function __invoke()
    {
        return view('school.form-pendaftaran');
    }

    public function prosesFormGet(Request $request)
    {
        // dump($data);
        // dump($request->query());
        echo "
        <ul>
        <li>Nim             : {$request->nim}</li>
        <li>Nama            : {$request->nama}</li>
        <li>Email           : {$request->email}</li>
        <li>Jenis Kelamin   : {$request->jenis_kelamin}</li>
        <li>Jurusan         : {$request->jurusan}</li>
        <li>Alamat          : {$request->alamat}</li>
        </ul>";

        echo "<hr>";
        // Selain itu isi varibel $request juga bisa di akses dengan cara berikut:
        echo $request->input('nim') . "<br>";
        echo $request->get('nim') . "<br>";
        echo request('nim') . "<br>";
        echo data_get($request, 'nim') . "<br>";
    }
    public function prosesFormPost(Request $request)
    {
        // dump($data);
        // dump($request->query());
        echo "
        <ul>
        <li>Nim             : {$request->nim}</li>
        <li>Nama            : {$request->nama}</li>
        <li>Email           : {$request->email}</li>
        <li>Jenis Kelamin   : {$request->jenis_kelamin}</li>
        <li>Jurusan         : {$request->jurusan}</li>
        <li>Alamat          : {$request->alamat}</li>
        </ul>";

        echo "<hr>";
        // Selain itu isi varibel $request juga bisa di akses dengan cara berikut:
        echo $request->input('nim') . "<br>";
        echo $request->get('nim') . "<br>";
        echo request('nim') . "<br>";
        echo data_get($request, 'nim') . "<br>";
    }

    public function validateData(Request $request)
    {
        $validate = $request->validate([
            'nim' => 'required|size:8',
            'nama' => 'required|min:5|max:50',
            'email' => 'required|email',
            'jenis_kelamin' => 'required|in:L,P',
            'jurusan' => 'required',
            'alamat' => ''
        ]);
        // Format penulisan syarat validasi adalah sebagai berikut:
        // <nama_inputan_form> => syarat1 | syarat2 | syarat3 | , dst...

        // Selain menggunakan format pipe " | ", syarat validasi juga bisa ditulis dalam bentuk nested array seperti contoh berikut:

        // $validateData = $request->validate([
        // 'nim' => ['required','size:8'],
        // 'nama' => ['required','min:3','max:50'],
        // 'email' => ['required','email'],
        // 'jenis_kelamin' => ['required','in:P,L'],
        // 'jurusan' => ['required'],
        // 'alamat' => [],
        // ]);

        dump($validate);

        // ? Jika ada user yang tidak memasukkan input sesuai di atas maka halaman akan seolah-olah merefresh halaman
        // karena ada data yang tidak lolos validasi, Laravel secara otomatis akan me-redirect kembali ke halaman asal form beserta pesan error. Namun pesan error ini tidak tampil karena harus di akses terlebih dahulu

        echo "
        <ul>
        <li>Nim             : {$validate['nim']}</li>
        <li>Nama            : {$validate['nama']}</li>
        <li>Email           : {$validate['email']}</li>
        <li>Jenis Kelamin   : {$validate['jenis_kelamin']}</li>
        <li>Jurusan         : {$validate['jurusan']}</li>
        <li>Alamat          : {$validate['alamat']}</li>
        </ul>";
    }
    public function validatorData(Request $request)
    {
        // Class yang akan menggunakan Validator Class milik Facades

        $validator = Validator::make($request->all(), [
            'nim' => 'required|size:8',
            'nama' => 'required|min:5|max:50',
            'email' => 'required|email',
            'jenis_kelamin' => 'required|in:L,P',
            'jurusan' => 'required',
            'alamat' => ''
        ], [
            'required' => ':attribute wajib diisi.',
            'size' => ':attribute harus berukuran :size karakter.',
            'max' => ':attribute maksimal berisi :max karakter.',
            'min' => ':attribute minimal berisi :min karakter.',
            'email' => ':harus diisi dengan alamat email yang valid.',
            'in' => ':attribute yang dipilih tidak valid.',
        ]);
        // Argument 1 berisi Assoc Array dari inputan
        // Argument 2 berisi Assoc Array yang berisi Syarat validasi
        // Argument 3 berisi Assoc Array pesan error jika tidak lolos validasi


        if ($validator->fails()) {
            return redirect('/university/form')->withErrors($validator)->withInput();
        } else {
            echo "
            <ul>
            <li>Nim             : {$request->nim}</li>
            <li>Nama            : {$request->nama}</li>
            <li>Email           : {$request->email}</li>
            <li>Jenis Kelamin   : {$request->jenis_kelamin}</li>
            <li>Jurusan         : {$request->jurusan}</li>
            <li>Alamat          : {$request->alamat}</li>
            </ul>";
        }
    }
    // ! Membuat Custom FormRequest Class
    // Tujuannya untuk memindahkan proses validasi dari dalam controller
    // Custom Request class berada di satu file terpisah. Dan seperti biasa, jika kita perlu membuat sebuah file baru, itu adalah tugas dari php artisan. Berikut format dasar perintahnya:
    // php artisan make:request <nama_request_class>

    public function prosesFormRequest(DaftarMahasiswa $request)
    {
        // Inilah cara penggunaan custom FormRequest class, dimana kita men-inject variabel $request sebagai instance dari object DaftarMahasiswa.

        $validatedData = $request->validated();
        dump($validatedData);
    }


    // ! ====Localization====
    public function validateDataWithLocal(Request $request)
    {
        FacadesApp::setLocale($request->locale);
        //Didapat dari isi parameter fungsi formPendaftaran($lang = 'id')
        $validate = $request->validate([
            'nim' => 'required|size:8',
            'nama' => 'required|min:5|max:50',
            'email' => 'required|email',
            'jenis_kelamin' => 'required|in:L,P',
            'jurusan' => 'required',
            'alamat' => ''
        ]);

        echo "
        <ul>
        <li>Nim             : {$validate['nim']}</li>
        <li>Nama            : {$validate['nama']}</li>
        <li>Email           : {$validate['email']}</li>
        <li>Jenis Kelamin   : {$validate['jenis_kelamin']}</li>
        <li>Jurusan         : {$validate['jurusan']}</li>
        <li>Alamat          : {$validate['alamat']}</li>
        </ul>";
    }
    public function formPendaftaranMahasiswa()
    {
        FacadesApp::setLocale('en');
        return view('school.form-pendaftaran');
    }
    public function formPendafaranEn()
    {
        FacadesApp::setLocale('en');
        return view('school.form-pendaftaran');
    }
    public function formPendafaranId()
    {
        FacadesApp::setLocale('id');
        return view('school.form-pendaftaran');
    }

    // ? Dengan parameter
    public function formPendaftaran($lang = 'id')
    {
        FacadesApp::setLocale($lang);
        return view('school.form-pendaftaran', ['locale' => $lang]);
    }
}
