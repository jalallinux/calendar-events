<?php

namespace App\Http\Resources\Api\Event;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'date' => $this->resource['date'],
            'day' => $this->resource['day'],
            'description' => $this->resource['description'],
            'additional_description' => $this->resource['additional_description'],
            'is_holiday' => $this->resource['is_holiday'],
        ];
    }
}
