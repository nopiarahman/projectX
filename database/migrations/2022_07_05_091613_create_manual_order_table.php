<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manualOrder', function (Blueprint $table) {
            $table->id();
            $table->datetime('tanggal');
            $table->string('nama',255);
            $table->string('noTelp',255);
            $table->string('alamat',255);
            $table->string('kelurahan',255);
            $table->string('kecamatan',255);
            $table->string('jenis',255);
            $table->string('berat',255);
            $table->string('status',100);
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
        Schema::dropIfExists('manual_order');
    }
};
