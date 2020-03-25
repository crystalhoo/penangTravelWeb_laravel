<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\Resource;

class HotelResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->when(!is_null($this->id), $this->id),
            'name' => $this->when(!is_null($this->name), $this->name),
            'address' => $this->when(!is_null($this->address), $this->address),
            'description' => $this->when(!is_null($this->description), $this->description),
            'rating' => $this->when(!is_null($this->rating), $this->rating),
            'schedules' => ScheduleResource::collection($this->whenLoaded('schedules')),
        ];
    }
}
