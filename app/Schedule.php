<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

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
    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);//->withPivot('hotel_id', 'schedule_id');
    }

}
//}
// public function hotel()
// {
//     return $this->belongsTo(Hotel::class);
// }

/**
 * Get the authors who wrote the book
 *
 */



