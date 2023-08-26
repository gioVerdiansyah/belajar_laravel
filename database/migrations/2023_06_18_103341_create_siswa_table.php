<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->char('nim', 8)->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('fakultas');
            $table->string('jurusan');
            $table->decimal('ipk', 3, 2)->default(1.00);
            $table->timestamps();
        });
    }

    /**
     * ----------------------------------
     *             Keterangan
     * ----------------------------------
     *
     * Format penulisan nama kolom tabel adalah sebagai berikut:
     * $table-><tipe_data_kolom>('<nama_kolom>')
     *
     * Daftar lengkap jenis-jenis tipe data:
     * https://laravel.com/docs/10.x/migrations#available-column-types
     *
     * contoh, untuk men-set kolom 'nim' agar tidak bisa diinput dengan nilai yang sama:
     * $table->char('nis',8)->unique()
     *
     * Menaruh nilai default:
     * $table->decimal('ipk', 3, 2)->default(1.00)
     *
     * ! DBAL (DataBase Abstraction Layer)
     * Perubahan struktur tabel di Laravel 10 sebenarnya sudah bisa tanpa library Doctrine DBAL, akan
     * tetapi hanya berlaku di database MySQL versi terbaru saja. Ketika saya coba, masih tidak bisa
     * jalan di database MariaDB 10.4 bawaan XAMPP 8.2, sehingga dalam praktek ini kita tetap perlu
     * Doctrine DBAL
     *
     *Silahkan buat file migration baru dengan nama alter_mahasiswas_table
     *
     */


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};