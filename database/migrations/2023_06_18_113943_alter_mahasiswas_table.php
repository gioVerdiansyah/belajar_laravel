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
        Schema::table('mahasiswas', function (Blueprint $table) {
            // $table->renameColumn('nama', 'nama_lengkap');
            // mengubah nama kolom 'nama' menjadi 'nama_lengkap'.
            // $table->text('alamat')->after('tanggal_lahir');
            // menambah kolom 'alamat' dengan tipe data TEXT, yang posisinya ditempatkan setelah kolom 'tanggal_lahir'
            // $table->dropColumn('ipk');
            // menghapus kolom 'ipk'


            // Case untuk soft delete
            $table->softDeletes()->default(NUll);
        });
    }

    // ! Ketika perubahan di method up() ini harus kita balik di method down()

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            // $table->renameColumn('nama_lengkap', 'nama');
            //  mengubah kembali nama kolom dari 'nama_lengkap' menjadi 'nama'.
            // $table->dropColumn('alamat');
            // menghapus kolom 'alamat'
            // $table->decimal('ipk', 3, 2)->default(1.00);
            // membuat kembal kolom 'ipk' dengan tipe data DECIMAL(3,2) dan nilai default 1.00


            // Case untuk soft delete
            $table->dropSoftDeletes();
        });
        // ? Apabila setelah beberapa saat terjadi masalah atau kita berubah pikiran, perubahan ini bisa di rollback dengan php artisan migrate:rollback --step=1
        // Dengan method down() maka keadaan akan kembali sesuai yang ada di mwthod down()
    }
};