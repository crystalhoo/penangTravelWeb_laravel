<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_schedule', function (Blueprint $table) {
            $table->unsignedInteger('hotel_id');
            $table->unsignedInteger('schedule_id');

            $table->primary(['hotel_id', 'schedule_id']);
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('schedule_id')->references('id')->on('schedules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_schedule');
    }
}
