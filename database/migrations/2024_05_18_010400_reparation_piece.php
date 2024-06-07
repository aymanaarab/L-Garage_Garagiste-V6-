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
        Schema::create('reparation_pieces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reparationID')->constrained('reparations')->onDelete('cascade');
            $table->foreignId('piece_de_rechangeID')->constrained('piece_rechange')->onDelete('cascade');
            $table->integer('quantité');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparation_pieces');
    }
};
