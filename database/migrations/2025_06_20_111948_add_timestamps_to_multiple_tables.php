<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    $tables = ['likes', 'images', 'bookings'];

    foreach ($tables as $table) {
        Schema::table($table, function (Blueprint $table) {
            $table->timestamps();
        });
    }
}

public function down()
{
    $tables = ['likes', 'images', 'bookings'];

    foreach ($tables as $table) {
        Schema::table($table, function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}

};
