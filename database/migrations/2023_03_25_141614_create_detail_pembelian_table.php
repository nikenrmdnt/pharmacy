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
        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pembelian');
            $table->foreign('id_pembelian')->references('id')->on('pembelian')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tgl_kadaluarsa');
            $table->float('harga_beli');
            $table->integer('jumlah_beli');
            $table->double('sub_total_beli');
            $table->TinyInteger('persen_margin_jual');
            $table->double('harga_jual');
            $table->unsignedBigInteger('id_obat');
            $table->foreign('id_obat')->references('id')->on('obat')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detail_pembelian');
    }
};
