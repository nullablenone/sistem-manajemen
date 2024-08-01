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
        Schema::create('sepatu_sendal_ukuran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sepatusendal_id')->constrained('sepatu_sendals')->onDelete('cascade');
            $table->foreignId('ukuran_id')->constrained('ukurans')->onDelete('cascade');
            $table->integer('stok')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sepatu_sendal_ukuran');
    }
};
