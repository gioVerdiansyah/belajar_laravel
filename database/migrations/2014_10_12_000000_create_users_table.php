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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
// ! Menjalankan migration
// php artisan migrate

// ? Jika tabel ini tidak sengaja di hapus kita bisa me-rollback nya
// php artisan migrate:reset
// ini akan menghapus kembali tabel-tabel yang dibuat di file-file migrations
// ? Atau kita bisa menggunakan fresh jika ingin menghapus dan membuatnya lagi
// artisan migrate:fresh


// ! Migration Rollback
// Jika tiba-tiba terjadi masalah akibat penambahan tabel ini, kita bisa melakukan proses rollback sebagian terhadap file migration. Jadi seolah-olah kembali ke struktur database di hari sebelumnya. Untuk melihat daftar urutan migration, bisa dari perintah
// php artisan migrate:status.

// ? Jika kita ingin mengembalikan posisi sebelum file migration terakhir
// php artisan migrate:rollback --step=1
// Perintah diatas akan me-rollback 1 file migration terakhir dan juga menghapus tabelnya
// nilai step adalah nilai ingin mundur berapa tabel
// jika kita lihat menggunakan php artisan migrate:status maka 2019_12_14_000001_create_personal_access_tokens_table statusnya akan pending
// jika tabel tersebut sudah ada perubahan atau ingin menambakannya lagi maka kita bisa menambahkannya lagi dengan php artisan migrate

// ! Membuat migration
// php artisan make:migration <nama_migration> --create=<nama_tabel>