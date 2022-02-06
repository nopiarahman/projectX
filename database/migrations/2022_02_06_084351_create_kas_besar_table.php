<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasBesarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_besar', function (Blueprint $table) {
            $table->id();
            $table->datetime('tanggal');
            $table->string('uraian');
            $table->integer('kredit')->nullable();
            $table->integer('debit')->nullable();
            $table->integer('sumber')->nullable();
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
        Schema::dropIfExists('kas_besar');
    }
}
