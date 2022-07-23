<?php

namespace App\Http\Resources\Api\Event;

use Illuminate\Http\Resources\Json\JsonResource;
use Morilog\Jalali\CalendarUtils;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'date' => $this->getDate($request->type),
//            'day' => $this->resource['day'],
            'description' => $this->resource['description'],
            'additional_description' => $this->resource['additional_description'],
            'is_holiday' => $this->resource['is_holiday'],
        ];
    }

    public function getDate(string $type)
    {
        return $type == 'gregorian' ? CalendarUtils::createCarbonFromFormat('Y-m-d', $this->resource['date'])->format('Y-m-d') : $this->resource['date'];
    }
}
