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
        Schema::create('peminjaman_buku_tanahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjam_id')->constrained('users');
            $table->foreignId('kelurahan_id')->constrained('kelurahans');
            $table->foreignId('peruntukan_id')->constrained('peruntukans');
            $table->string('jenis_hak');
            $table->string('nomor_hak');
            $table->string('nomor_su');
            $table->string('status');
            $table->date('tanggal_pinjam');
            $table->date('duedate_pengembalian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_buku_tanahs');
    }
};
