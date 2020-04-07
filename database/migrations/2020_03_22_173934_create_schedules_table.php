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
    
                
                $table->integer('day_number')->nullable();
    
                $table->time('start_time')->nullable();
    
                $table->string('title')->indexed();;
    
                $table->longText('full_description')->nullable();
    
              
    
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
//php artisan make:migration add_tourguide_and_plan_to_schedules_table --table=schedules