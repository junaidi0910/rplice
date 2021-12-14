<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratDaftarHadirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_daftar_hadir', function (Blueprint $table) {
            $table->id();
            $table->string('kode_surat');
            $table->string('nama_kegiatan');
            $table->date('tanggal');
            $table->time('start');
            $table->time('end');
            $table->string('tempat');
            $table->string('pembicara');
            $table->char('jumlah_peserta', 11);
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
        Schema::dropIfExists('surat_daftar_hadir');
    }
}
