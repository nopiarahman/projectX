<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Penjualan;
use App\Models\Barang;
class CreateDetailPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Penjualan::class);
            $table->foreignIdFor(Barang::class);
            $table->float('jumlah');
            $table->bigInteger('harga');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('detail_penjualan');
    }
}
