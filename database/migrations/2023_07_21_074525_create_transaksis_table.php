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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->foreignId('kode_barang');
            // $table->unsignedBigInteger('barang_id');
            $table->enum('jenis_transaksi', ['masuk', 'keluar']);
            // $table->string('jenis_transaksi');
            $table->string('satuan');
            $table->integer('jumlah');
            $table->double('harga', 10.2);
            $table->double('total', 10.2);
            $table->timestamps();
    
            // $table->foreign('barang_id')->references('id')->on('barangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
