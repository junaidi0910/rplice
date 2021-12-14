<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSuratDaftarHadirAddSignId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_daftar_hadir', function (Blueprint $table) {
            $table->unsignedBigInteger('sign_id')->nullable();
            $table->foreign('sign_id')->references('id')->on('signs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_daftar_hadir', function (Blueprint $table) {
            //
        });
    }
}
