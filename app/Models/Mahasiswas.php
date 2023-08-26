<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//Factory adalah fitur Laravel untuk membuat "object Model"
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswas extends Model
{
    use HasFactory;
    protected
    // $fillable = [
    //     'nim',
    //     'nama',
    //     'tempat_lahir',
    //     'tanggal_lahir',
    //     'fakultas',
    //     'jurusan',
    //     'ipk'
    // ], //column tabel apa saja yang boleh di isi
    $guarded = [
        // 'ipk'
    ] /*column tabel apa saja yang tidak boleh diisi*/;

    // ! property $fillable dan $guarded tidak bisa dipakai bersamaan, tapi harus pilih salah satu

    // ? Jika variabel $guarded kosong maka semua column boleh masuk


    // ! menggunakan soft delete
    use SoftDeletes;
}