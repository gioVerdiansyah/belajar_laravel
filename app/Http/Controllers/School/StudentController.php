<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class StudentController extends Controller
{
    public function __invoke()
    {
        $siswas = Students::all();
        return view('crud.index', ['siswas' => $siswas]);
    }

    public function create($lang = 'en')
    {
        App::setLocale($lang);
        return view('crud.registration', ['locale' => $lang]);
    }

    public function store(Request $request)
    {
        App::setLocale($request->locale);
        $validate = $request->validate([
            'nim' => 'required|size:8|unique:students',
            //agar tidak boleh sama
            'nama' => 'required|min:5|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'jurusan' => 'required',
            'alamat' => ''
        ]);
        // dump($validate);

        // ? Send Data
        // $siswa = new Student;
        // $siswa->nim = $validate['nim'];
        // $siswa->nama = $validate['nama'];
        // $siswa->jenis_kelamin = $validate['jenis_kelamin'];
        // $siswa->jurusan = $validate['jurusan'];
        // $siswa->alamat = $validate['alamat'];
        // $siswa->save();

        Students::create($validate); //mass assignment

        // ! Flash Data
        // mengirimkan data sekali kedalam session
        // $request->session()->flash('message', "Berhasil menambah data {$validate['nama']} ke Database!");

        return redirect()->route('students.index')->with('message', "Berhasil menambah data {$validate['nama']} ke Database!");
    }

    public function show(Students $studentid) //Route Model Binding
    {
        // $siswa = Students::findOrFail($studentid); //Jika user mengetik id diluar id yang ada maka NOT FOUND
        return view('crud.show', ['studentid' => $studentid]);
    }


    public function edit(Students $id)
    {
        return view('crud.edit', ['siswas' => $id]);
    }


    public function update(Request $request, Students $student)
    {

        $validate = $request->validate([
            'nim' => 'required|size:8|unique:students,nim,' . $student->id,
            // Dengan tambahan syarat 'unique:mahasiswas,nim,2', Laravel akan mengabaikan validasi unique untuk kolom nim bagi mahasiswa yang ber-id = 2
            'nama' => 'required|min:5|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'jurusan' => 'required',
            'alamat' => ''
        ]);

        Students::where('id', $student->id)->update($validate);

        return redirect()->route('students.show', ['studentid' => $student->id])->with('message', "Berhasil mengubah data {$validate['nama']} di Database!");
    }


    public function destroy(Students $studentid)
    {
        $studentid->delete();

        return redirect()->route('students.index')->with('message', "Data {$studentid->nama} berhasil di hapus!");
    }
}
