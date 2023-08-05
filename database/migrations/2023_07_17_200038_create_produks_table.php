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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk', 30)->unique();
            $table->string('nama_produk', 100);
            $table->foreignId('kode_kategori');
            $table->double('harga', 10, 2);
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->string('status')->default('Belum Terjual');
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
        Schema::dropIfExists('produks');
    }
};
