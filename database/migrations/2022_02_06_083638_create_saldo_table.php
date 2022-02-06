<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pelanggan;
class CreateSaldoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pelanggan::class);
            $table->datetime('tanggal');
            $table->string('uraian');
            $table->integer('kredit')->nullable();
            $table->integer('debit')->nullable();
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
        Schema::dropIfExists('saldo');
    }
}
