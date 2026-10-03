<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsInBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('members');
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('members')->after('email');
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('animals');
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->string('animals', 255)->after('members');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['animals', 'members']);
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('animals')->nullable()->after('room');
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('members')->after('email');
        });
    }
}

