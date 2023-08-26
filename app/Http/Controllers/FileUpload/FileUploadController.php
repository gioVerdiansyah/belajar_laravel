<?php

namespace App\Http\Controllers\FileUpload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FileUploadController extends Controller
{
    public function __invoke()
    {
        return view('fileupload.file-upload');
    }


    public function informasiFileUpload(Request $request)
    {
        if ($request->hasFile('berkas')) {
            echo "
        <ul>
            <li>path(): {$request->berkas->path()}</li>
            <li>extension(): {$request->berkas->extension()}</li>
            <li>getClientOriginalExtension(): {$request->berkas->getClientOriginalExtension()}</li>
            <li>getMimeType(): {$request->berkas->getMimeType()}</li>
            <li>getClientOriginalName(): {$request->berkas->getClientOriginalName()}</li>
            <li>getSize(): {$request->berkas->getSize()}</li>
        </ul>
        ";
        } else {
            echo "Tidak ada berkas yang di upload!";
        }
    }


    public function validasiFileUpload(Request $request)
    {
        $request->validate([
            'berkas' => 'required|file|mimes:pdf, ppg|max:3000',
            // 'berkas' => 'required|file|mimes:pdf, ppg|max:3000', jika ingin mengupload file pertipe pdf dan gambar sekaligus
        ]);

        echo "File {$request->berkas->getClientOriginalName()} berhasil lolos validasi!";
    }


    public function pindahFileUpload(Request $request)
    {
        $request->validate([
            'berkas' => 'required|file|image|max:5000'
        ]);

        // Laravel menyediakan beragam cara untuk memindahkan file ini, diantaranya method store(), storeAs(), dan move()

        // ? store()
        // $path = $request->berkas->store('uploads'); //akan memindahkan file upload ke folder storage\app\uploads


        // ? storeAs()
        // ini digunakan untuk jika kita ingin menamai sendiri file gambarnya agar tidak acak
        // argumen pertama berupa nama folder yang akan disimpan, argumen kedua berupa nama filenya

        // $path = $request->berkas->storeAs('uploads', 'Photo_Saya.' . $request->berkas->extension());
        // Harus beserta ekstensi filenya

        // dengan penanggalan
        // $path = $request->berkas->storeAs('uploads', 'user-' . time() . '.' . $request->berkas->getClientOriginalExtension());

        $fileName = 'userpp-' . time() . '.' . $request->berkas->getClientOriginalExtension();

        // $request->berkas->storeAs('public', $fileName);


        // ? move()
        // jika tidak ingin menggunakan symlink maka kita bisa menggunakan method move yang langsung tersimpan di public/img

        $path = $request->berkas->move('uploads', $fileName);
        $path = str_replace('\\', '/', $path);
        echo "variabel berisi {$path}";

        echo "
        File {$request->berkas->getClientOriginalName()} berada di {$path}
        <br>
        Proview:
        <br>
        <img src='/{$path}' width='50' alt='photo profil {$fileName}'>
        ";
    }


    // Exersice
    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'fileName' => 'nullable|regex:/^[\w\-]+$/|max:10',
            'berkas' => 'required|file|image|max:3000'
        ], [
            'fileName.regex' => 'Inputan nama hanya boleh mengandung karakter "-", "_" dan alfanumerik.',
            'fileName.max' => 'Panjang maksimal nama adalah 10 karakter.',
        ]);

        $fileNameInput = $request->fileName ?? 'userpp';
        $fileName = $fileNameInput . '_' . time() . '.' . $request->berkas->getClientOriginalExtension();
        $path = $request->berkas->move('uploads', $fileName);
        $path = str_replace('\\', '/', $path);
        $newPath = asset($path);

        echo "File {$request->berkas->getClientOriginalName()} berada di <a href='{$newPath}'>$newPath</a><br><img src='/{$path}' alt='Photo Profile {$fileName}' width='70'>";
    }
}
