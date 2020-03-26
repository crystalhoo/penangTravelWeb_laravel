<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ScheduleResource extends Resource
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
            'day_number' => $this->when(!is_null($this->day_number), $this->day_number),
            'start_time' => $this->when(!is_null($this->start_time), $this->start_time),
            'title' => $this->when(!is_null($this->title), $this->title),
            'full_description' => $this->when(!is_null($this->full_description), $this->full_description),
            'hotel' => new PublisherResource($this->whenLoaded('hotel')),
            'plans' => AuthorResource::collection($this->whenLoaded('plans')),
        ];
    }
}
