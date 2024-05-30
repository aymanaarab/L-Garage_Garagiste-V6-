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
        //
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reparationID')->constrained('reparations')->onDelete('cascade');
            $table->decimal('charges_supplementaires', 8, 2)->nullable();
            $table->decimal('montant_total', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
