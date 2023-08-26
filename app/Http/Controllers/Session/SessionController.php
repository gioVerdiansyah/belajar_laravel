<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function __invoke()
    {
        return view('session.session');
    }

    public function buatSession(Request $request)
    {
        // Ada 3 cara untuk membuat session, 1 yaitu menggunakan function helper, 2 menggunakan method put dari variabel $request, 3 menggunakan method put dari class Session

        // cara satu
        session(['hakAkses' => 'admin']);

        // cara dua
        $request->session()->put('hakMasuk', 'User,Admin');

        // cara tiga
        Session::put('hakEdit', 'admin');


        // Banyak session sekaligus:
        session(['satu' => 'Verdi', 'dua' => 'Adi']);
        $request->session()->put(['first' => 'Ines', 'second' => 'Beta']);
        Session::put(['siji' => 'BHagas', 'loro' => 'Tegar']);

        // dengan nested array
        session(['siswas' => ['Verdi', 'Adi', 'Beta', 'Ines']]);

        return "session berhasil di buat";
    }
    public function aksesSession(Request $request)
    {
        // pesan dari flash
        if (session()->has('message')) {
            echo session('message') . "<br>";
        }
        // Sama, ada 3 cara juga untuk mengakses session

        // helper function
        echo session('hakAkses') . " " . session('satu') . " " . session('dua') . "<hr>";

        // request object
        echo $request->session()->get('hakMasuk') . " " . $request->session()->get('first') . " " . $request->session()->get('second') . "<hr>";

        // facade session
        echo Session::get('hakEdit') . " " . Session::get('siji') . " " . Session::get('loro') . "<hr>";


        // memeriksa session ada atau tidak?
        if (session()->has('hakAkses')) {
            echo "Sistem medeteksi hak akses adalah " . session('hakAkses');
        }

        if (session()->has('siswas')) {
            foreach (session('siswas') as $siswa) {
                echo "{$siswa} <br>";
            }
        }


        // ! Mengakses semua session sekaligus!
        dump(session()->all());
        // dump($request->session()->all());
        // dump(Session::all());
        // sama semua

        // memberikan nilai default
        $sessionValue = session()->get('alaamt', 'Jakarta');
        echo "Session default value adalah {$sessionValue}";
    }
    public function hapusSession(Request $request)
    {
        // Menghapus session juga sama, ada 3 cara

        // helper function
        // session()->forget('hakAkses');

        // request object
        // $request->session()->forget('hakMasuk');

        // facade session
        // Session::forget('hakEdit');

        // return "session \"hakAkses\" \"hakMasuk\" \"hakEdit\" telah di hapus!";

        // ! menghapus semua session
        session()->flush();

        $request->session()->flush();

        Session::flush();

        return "Semua session sudah di hapus!";
    }
    public function flashSession(Request $request)
    {
        // flash session adalah session yang hanya sekali pakai, setelah di refresh maka akan terhapus
        // penggunaan flash session juga sama ada 3 cara


        session()->flash('hakAkses', 'Verdiansyah');
        $request->session()->flash('hakMasuk', 'User');
        Session::flash('hakEdit', 'Admin');

        // contoh penggunaan dengan redirect dengan flash di chaining
        return redirect()->route('session.akses')->with('message', "session \"hakAkses\" \"hakMasuk\" \"hakEdit\" telah di buat!");
    }
}