<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PeminjamanCone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_cone', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->string('email');
            $table->string('no_hp');
            $table->integer('jumlah_peminjaman');
            $table->string('lembaga');
            $table->string('alamat');
            $table->string('alasan_peminjaman');
            $table->string('surat_peminjaman');
            $table->timestamp('waktu_mulai');
            $table->timestamp('waktu_pengembalian');
            $table->integer('status_peminjaman');
            $table->integer('jumlah_kerusakan');
            $table->integer('keterlambatan_pengembalian');
            $table->string('alasan_keterlambatan');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
