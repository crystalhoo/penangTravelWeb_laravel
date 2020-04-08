<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
            'plan' => new PlanResource($this->whenLoaded('plan')),
            'day_number' => $this->when(!is_null($this->day_number), $this->day_number),
            'start_date' => $this->when(!is_null($this->start_date), $this->start_date),
            'title' => $this->when(!is_null($this->title), $this->title),
            'full_description' => $this->when(!is_null($this->full_description), $this->full_description),
            'hotels' => HotelResource::collection($this->whenLoaded('hotels')),
        ];
    }
}
