<?php

namespace App\Services;

use Illuminate\Support\Collection;
use simplehtmldom\HtmlWeb;

class JalaliEvents
{
    const TIME_IR_BASE_URI = "https://www.time.ir/fa/event/list/0/";

    public function fetchEvents(int $year, int $month, int $day = null): Collection
    {
        $date = $this->makeDateString($year, $month, $day);
        $client = new HtmlWeb();
        $html = $client->load(self::TIME_IR_BASE_URI . $date);

        return collect($html->find("ul[class=list-unstyled] > li"))->map(function ($event) use ($year, $month, $day) {
            $additionalDescription = optional($event->find('span[style=white-space: nowrap] > span[dir=ltr]', 0))->text();
            return [
                'date' => $this->makeDateString($year, $month, $day ?? fa_to_en(explode(' ', trim($event->find('span', 0)->innertext))[0]), '-'),
                'day' => trim($event->find('span', 0)->innertext),
                'description' => trim($event->nodes[1]->innertext),
                'additional_description' => !is_null($additionalDescription) ? trim(preg_replace("/\[|\]/", "", $additionalDescription)) : null,
                'is_holiday' => $event->getAttribute('class') == 'eventHoliday',
            ];
        });
    }

    private function makeDateString(int $year, int $month, int $day = null, $splitter = '/'): string
    {
        $month = (strlen($month) == 1) ? "0{$month}" : $month;
        $day = (!is_null($day) && strlen($day) == 1) ? "0{$day}" : $day;
        return is_null($day) ? "{$year}{$splitter}{$month}" : "{$year}{$splitter}{$month}{$splitter}{$day}";
    }
}
