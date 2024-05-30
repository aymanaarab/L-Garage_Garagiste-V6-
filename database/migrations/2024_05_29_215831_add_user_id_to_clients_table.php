<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToClientsTable extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            // Add the missing userId column
            $table->unsignedBigInteger('userId')->after('tel')->nullable();

            // Add the foreign key constraint if it doesn't exist already
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            // Drop the foreign key and the column
            $table->dropForeign(['userId']);
            $table->dropColumn('userId');
        });
    }
}
