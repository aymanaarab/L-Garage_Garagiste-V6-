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

        Schema::create('reparations', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->enum('statut', ['En attente', 'En cours', 'Terminée']);
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->text('notes_mecanicien')->nullable();
            $table->text('notes_client')->nullable();
            $table->foreignId('mecanicienID')->constrained('mecaniciens')->onDelete('cascade');
            $table->foreignId('vehiculeID')->constrained('vehicules')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparations');
    }
};
