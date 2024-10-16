<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
   // database/migrations/xxxx_xx_xx_create_karyawans_table.php

public function up()
{
    Schema::create('karyawans', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('jabatan');
        $table->date('tanggal_masuk');
        $table->time('waktu_masuk')->nullable();   // Kolom untuk waktu masuk
        $table->time('waktu_keluar')->nullable();  // Kolom untuk waktu keluar
        $table->integer('gaji');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
