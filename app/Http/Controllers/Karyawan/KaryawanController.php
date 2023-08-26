<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function daftarKaryawan()
    {
        return view('halaman.index', ['judul' => 'Daftar Karyawan']);
    }
    public function tabelKaryawan()
    {
        return view('halaman.index', ['judul' => 'Judul Karyawan']);
    }
    public function blogKaryawan()
    {
        return view('halaman.index', ['judul' => 'blog Karyawan']);
    }

    public function login()
    {
        return view('halaman.login');
    }
    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string'
        ]);

        $validUsername = ['andi', 'rani', 'lisa', 'joko'];
        // Jika inputan sama yang ada di dalam array maka
        if (in_array($request->username, $validUsername)) {
            session(['username' => $request->username]);

            return redirect()->route('karyawan.daftar');
        } else {
            // jika kita mengetik selain yang ada didalam array maka
            return back()->withInput()->with('message', "username tidak ada di dalam daftar!");

            // back() mirip dengan redirect namun hanya akan kembali ke halaman sebelumnya
        }
    }

    public function logout()
    {
        session()->forget('username');
        return redirect()->route('karyawan.login')->with('message', "Logout Berhasil");
    }
}