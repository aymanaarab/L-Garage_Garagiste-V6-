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
        Schema::table('rendez_vous', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('mecanicienId')->after('clientID')->nullable();

            // Add the foreign key constraint if it doesn't exist already
            $table->foreign('mecanicienId')->references('id')->on('mecaniciens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rendez_vous', function (Blueprint $table) {
            //
            $table->dropForeign(['mecanicienId']);
            $table->dropColumn('mecanicienId');
        });
    }
};
