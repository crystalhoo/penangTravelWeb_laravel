<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_schedule', function (Blueprint $table) {
            $table->unsignedInteger('plan_id');
            $table->unsignedInteger('schedule_id');
            $table->primary(['plan_id', 'schedule_id']);
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans_schedules');
    }
}
