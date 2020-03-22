<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $table = 'schedules';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [

        'plan_id',
        'day_number',
        'start_time',
        'title',
        'full_description'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
