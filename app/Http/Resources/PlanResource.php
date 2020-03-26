<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
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
            'title' => $this->when(!is_null($this->title), $this->title),
            'description' => $this->when(!is_null($this->description), $this->description),
            'schedules' => ScheduleResource::collection($this->whenLoaded('schedules')),
        ];

    }
}
