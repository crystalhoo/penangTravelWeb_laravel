<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Spatie\MediaLibrary\HasMedia\HasMedia;
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
// use Spatie\MediaLibrary\Models\Media;

class Plan extends Model
{
    public $table = 'plans';

    // protected $appends = [
    //     'photo',
    // ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
    ];

    // public function registerMediaConversions(Media $media = null)
    // {
    //     $this->addMediaConversion('thumb')->width(50)->height(50);
    // }

    //change here
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    // public function getPhotoAttribute()
    // {
    //     $file = $this->getMedia('photo')->last();

    //     if ($file) {
    //         $file->url       = $file->getUrl();
    //         $file->thumbnail = $file->getUrl('thumb');
    //     } 

    //     return $file;
    // }

}
