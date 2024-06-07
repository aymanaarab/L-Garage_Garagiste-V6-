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
        Schema::create('rendez_vous', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clientID')->constrained('clients')->onDelete('cascade');
            $table->date('date_rendez_vous');
            $table->time('heure_rendez_vous');
            $table->enum('statut', ['Demandé', 'Confirmé', 'Terminé']);
            $table->string('etat_vehicule')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendez_vous');
    }
};
