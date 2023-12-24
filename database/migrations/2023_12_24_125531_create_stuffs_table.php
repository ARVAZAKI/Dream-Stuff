<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stuffs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('image')->nullable();
            $table->date('deadline');
            $table->bigInteger('harga');
            $table->bigInteger('uang_masuk')->nullable();;
            $table->bigInteger('uang_keluar')->nullable();;
            $table->bigInteger('uang_sisa')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->ondelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stuffs');
    }
};
