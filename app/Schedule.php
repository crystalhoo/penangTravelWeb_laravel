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

        'hotel_id',
        'day_number',
        'start_time',
        'title',
        'full_description'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function plans()
    {
    return $this->belongsToMany(Plan::class)->withPivot('plan_id', 'schedule_id');
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



