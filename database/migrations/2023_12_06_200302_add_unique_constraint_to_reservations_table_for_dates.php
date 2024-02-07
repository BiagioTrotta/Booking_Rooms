<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueConstraintToReservationsTableForDates extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->unique(['room_id', 'check_in']);
            $table->unique(['room_id', 'check_out']);
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropUnique(['room_id', 'check_in']);
            $table->dropUnique(['room_id', 'check_out']);
        });
    }
};
