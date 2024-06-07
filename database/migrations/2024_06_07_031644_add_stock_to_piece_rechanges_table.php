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
        Schema::table('piece_rechanges', function (Blueprint $table) {
            //
            $table->decimal('stock', 8, 2);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('piece_rechanges', function (Blueprint $table) {
            //
            $table->dropColumn('stock');

        });
    }
};
