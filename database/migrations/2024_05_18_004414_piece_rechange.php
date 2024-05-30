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
        Schema::create('piece_rechange', function (Blueprint $table) {
            $table->id();
            $table->string('nom_piece');
            $table->string('référence_piece');
            $table->string('fournisseur');
            $table->decimal('prix', 8, 2);
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piece_rechange');
    }
};
