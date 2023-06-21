<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('kategorijes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('naslov');
            $table->string('src_slike');
        });

        Schema::create('proizvodis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('naslov');
            $table->string('opis');
            $table->unsignedBigInteger('kategorije_id');
            $table->foreign('kategorije_id')->references('id')->on('kategorijes');
            $table->float('cena');
            $table->string('src_slike');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
