<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kebersihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kebersihan_lantai', function (Blueprint $table) {
            $table->id();
            $table->string('id_kebersihan', 20);
            $table->string('nama_assets', 100);
            $table->enum('kebersihan', ['Bersih','Tidak Bersih']);
            $table->date('tanggal_kebersihan');
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
        Schema::dropIfExists('kebersihan_lantai');
    }
}
