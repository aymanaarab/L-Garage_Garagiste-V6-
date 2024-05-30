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
        Schema::table('mecaniciens', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('userId')->after('tel')->nullable();

            // Add the foreign key constraint if it doesn't exist already
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mecaniciens', function (Blueprint $table) {
            //
            $table->dropForeign(['userId']);
            $table->dropColumn('userId');
        });
    }
};
