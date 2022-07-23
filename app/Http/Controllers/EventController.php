<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Event\ShowEventRequest;
use App\Http\Resources\Api\Event\EventResource;
use App\Services\JalaliEvents;


class EventController extends Controller
{
    private $jalaliEventsService;

    public function __construct()
    {
        $this->jalaliEventsService = resolve(JalaliEvents::class);
    }

    public function show(ShowEventRequest $request)
    {
        $events = $this->jalaliEventsService->fetchEvents(...$request->jDateArray())->toArray();

        return EventResource::collection($events);
    }
}
