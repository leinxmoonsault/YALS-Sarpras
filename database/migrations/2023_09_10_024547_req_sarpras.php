<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReqSarpras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_sarpras_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('id_req', 20);
            $table->string('untuk_ruang', 20);
            $table->string('nama_barang', 100);
            $table->double('jumlah_barang', 3);
            $table->double('harga_barang', 15);
            $table->string('status', 100);
            $table->string('keterangan', 100);
            $table->date('tanggal_req');
            $table->string('req_by', 100);
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
        Schema::dropIfExists('request_sarpras_kelas');
    }
}
