<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->nullable();
            $table->enum('jenis_surat', ['izin kp', 'kegiatan', 'undangan', 'tugas', 'pribadi' ,'berita acara']);
            $table->enum('status', ['proses', 'ditolak', 'disetujui']);
            $table->text('alasan_ditolak')->nullable();
            $table->string('nama_mitra')->nullable();
            $table->string('lokasi_pelaksanaan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->string('judul')->nullable();
            $table->string('tema')->nullable();
            $table->unsignedBigInteger('pengirim_id');
            $table->foreign('pengirim_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ruang')->nullable();
            $table->string('nama_tamu')->nullable();
            $table->unsignedBigInteger('sign_id')->nullable();
            $table->foreign('sign_id')->references('id')->on('signs')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surats');
    }
}
