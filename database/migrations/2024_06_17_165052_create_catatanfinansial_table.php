<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('catatanfinansial', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('tanggal_transaksi');
            $table->string('tipe_transaksi');
            $table->string('kategori_transaksi');
            $table->integer('nominal_transaksi');
            $table->text('deskripsi_transaksi')->nullable();
            $table->string('file_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatanfinansial');
    }
};
