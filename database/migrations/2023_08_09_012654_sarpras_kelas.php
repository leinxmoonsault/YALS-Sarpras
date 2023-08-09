<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SarprasKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarpras_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('id_kelas');
            $table->string('nama_barang', 100);
            $table->string('jumlah_barang', 15);
            $table->string('kondisi', 25);
            $table->string('update_by', 100);
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
        Schema::dropIfExists('sarpras_kelas');
    }
}
