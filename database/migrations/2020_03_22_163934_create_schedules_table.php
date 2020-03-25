<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {

                $table->increments('id');
    
                $table->unsignedInteger('hotel_id')->nullable();
    
                $table->integer('day_number');
    
                $table->time('start_time');
    
                $table->string('title');
    
                $table->longText('full_description')->nullable();
    
                $table->foreign('hotel_id')->references('id')->on('hotels');
    
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
        Schema::dropIfExists('schedules');
    }
}
